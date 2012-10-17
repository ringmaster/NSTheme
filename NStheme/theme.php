<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } 

include('inc/lessc.inc.php');



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

class NStheme extends theme{
	
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

}


autoCompileLess(dirname(__FILE__)."/less/bootstrap.less",dirname(__FILE__)."/css/bootstrap.css");
autoCompileLess(dirname(__FILE__)."/less/custom.less",dirname(__FILE__)."/css/custom.css");

?>