<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } 

if(!class_exists('lessc_formatter_compressed')){
	include_once 'inc/lessc.inc.php';
}

class NStheme extends theme{
	
	function autoCompileLess($inputFile, $outputFile) {
	  // load the cache
	  $cacheFile = $inputFile.".cache";
	
	  if (file_exists($cacheFile)) {
	    $cache = unserialize(file_get_contents($cacheFile));
	  } else {
	    $cache = $inputFile;
	  }
	
	  $less = new lessc;
	  $newCache = $less->cachedCompile($cache);
	
	  if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
	    file_put_contents($cacheFile, serialize($newCache));
	    file_put_contents($outputFile, $newCache['compiled']);
	  }
	}
	
	public function action_init_theme()
	{
		// Apply Format::autop() to comment content...
		Format::apply( 'autop', 'comment_content_out' );
		// Apply Format::tag_and_list() to post tags...
		Format::apply( 'tag_and_list', 'post_tags_out' );
		// Only uses the <!--more--> tag, with the 'more' as the link to full post
		Format::apply_with_hook_params( 'more', 'post_content_out', 'more' );
		// Creates an excerpt option. echo $post->content_excerpt;
		Format::apply( 'autop', 'post_content_excerpt' );
		Format::apply_with_hook_params( 'more', 'post_content_excerpt', 'more',60, 1 );
		
		$this->autoCompileLess(dirname(__FILE__)."/less/bootstrap.less",dirname(__FILE__)."/css/bootstrap.css");
		$this->autoCompileLess(dirname(__FILE__)."/less/custom.less",dirname(__FILE__)."/css/custom.css");
	}
	
	public function add_template_vars()
	{
		if ( !$this->template_engine->assigned( 'pages' ) ) {
			$this->assign( 'pages', Posts::get( 'page_list' ) );
		}
		//For Asides loop in sidebar.php
		$this->assign( 'asides', Posts::get( 'asides' ) );

		if ( $this->request->display_entries_by_tag ) {
			if ( count( $this->include_tag ) && count( $this->exclude_tag ) == 0 ) {
				$this->tags_msg = _t( 'Posts tagged with %s', array( Format::tag_and_list( $this->include_tag ) ) );
			}
			else if ( count( $this->exclude_tag ) && count( $this->include_tag ) == 0 ) {
				$this->tags_msg = _t( 'Posts not tagged with %s', array( Format::tag_and_list( $this->exclude_tag ) ) );
			}
			else {
				$this->tags_msg = _t( 'Posts tagged with %s and not with %s', array( Format::tag_and_list( $this->include_tag ), Format::tag_and_list( $this->exclude_tag ) ) );
			}
		}
		
		
		parent::add_template_vars();
		
	}
	/**
	 * Customize comment form layout with fieldsets.
	 */
	public function action_form_comment( $form ) { 
		//My custom comment form
		$form->append( 'fieldset', 'cf_commentbox', _t( 'Who Are You' ) );
		$form->cf_commentbox->class = "form-part-1";
		//move the Name ( cf_commenter) into the fieldset
		$form->cf_commenter->move_into( $form->cf_commentbox );
		$form->cf_commenter->caption = _t( 'Name:' ) . '<span class="required">' . ( Options::get( 'comments_require_id' ) == 1 ? ' *' . _t( 'Required' ) : '' ) . '</span></label>';
		//move the Email ( cf_email) into the Fieldset
		$form->cf_email->move_into( $form->cf_commentbox );
		$form->cf_email->caption = _t( 'Email Address:' ) . '<span class="required">' . ( Options::get( 'comments_require_id' ) == 1 ? ' *' . _t( 'Required' ) : '' ) . '</span></label>'; 
		//add a disclaimer/message
		$form->append('static','cf_disclaimer', _t( '<p><em><small>Email address is not published</small></em></p>' ) );
		//move the disclaimer into the fieldset
		$form->cf_disclaimer->move_into( $form->cf_commentbox );
		//remove the url piece
		$form->cf_url->remove();
		//add a second fieldset for the next two fields
		$form->append( 'fieldset', 'cf_contentsubmit', _t( 'Leave A Message' ) );
		$form->cf_contentsubmit->class = "form-part-2";
		//move the textarea into a second fieldset
		$form->cf_content->move_into( $form->cf_contentsubmit );
		$form->cf_content->caption = _t( 'Message: (Required)' );
		//move the submit button in too
		$form->cf_submit->move_into( $form->cf_contentsubmit );
		$form->cf_submit->caption = _t( 'Submit' );

	}

}





?>