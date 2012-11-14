<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display ( 'header' ); ?>


<div class="row">

	<div class="span8">
		<!--begin loop-->
		
			<div id="post-<?php echo $post->id; ?>" class="row post">
				<div class="span8 entry">
					
					<h2 class="post-title"><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2>
					<div class="content"><?php echo $post->content_out ?></div>
					
				</div>
			</div>
		
		<?php echo $theme->prev_page_link('&laquo; ' . _t('Newer Posts')); ?> <?php echo $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php echo $theme->next_page_link('&raquo; ' . _t('Older Posts')); ?>
	</div>
	
	<!-- sidebar -->
	<?php include 'sidebar.php' ?>
	
</div>


<?php $theme->display ( 'footer' ); ?>