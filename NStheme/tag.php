<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php $theme->display ( 'header' ); ?>

<div class="row">

	<div class="span8">
		<!--begin loop-->
		<h2 class="tagtitle"><?php echo $tags_msg; ?></h2>
		<?php foreach ( $posts as $post ) { ?>
			<div id="post-<?php echo $post->id; ?>" class="row post">
				<div class="span8 entry">
					
					<h2 class="post-title"><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2>
					<div class="content">
						<?php echo Format::more($post->content_out, $post); ?>
						<div class="postmeta">
							<div class="date">
								<?php echo _e("posted @"); ?> <?php echo $post->pubdate->out('H:i A, l, M j'); ?>
							</div>
							<?php if ( count( $post->tags ) ) { ?>
							<div class="tags"><i class="icon-tags"></i> <?php echo $post->tags_out; ?></div>
							<?php } ?>
							<div class="commentCount"><?php echo $theme->comments_link($post,'%d <i class="icon-comment"></i>','%d <i class="icon-comment"></i>','%d <i class="icon-comment"></i>'); ?></div>
						</div>
					</div>
					
				</div>
			</div>
		<?php } ?>
		
		<div class="row">
			<div class="span8 postnav">
				<p><?php echo $theme->prev_page_link('&laquo; ' . _t('Newer Posts')); ?> <?php echo $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php echo $theme->next_page_link(_t('Older Posts') . ' &raquo;'); ?></p>
			</div>
		</div>
	</div>
	
	<!-- sidebar -->
	<?php include 'sidebar.php' ?>
	
</div>


<?php $theme->display ( 'footer' ); ?>