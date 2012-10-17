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
		
		<?php include "comments.php"; ?>
	</div>
	
	<!-- sidebar -->
	<div class="span4">
		<div class="content">
			<h2>Sidebar</h2>
			<p>Some text here</p>
		</div>
	</div>
	
</div>


<?php $theme->display ( 'footer' ); ?>