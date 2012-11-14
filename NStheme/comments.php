<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>

<div class="row">
	<div class="span8">
		<?php $post->comment_form()->out(); ?>
	</div>
</div>

<div class="row">
	<div class="span6 offset1">
		<h3><?php _e('Responses to'); ?> <?php echo $post->title; ?></h3>
		
		<?php if ( $post->comments->pingbacks->count ) : ?>
			<div id="pings">
			<h4><?php $theme->pingback_count($post); ?></h4>
				<ul id="pings-list">
					<?php foreach ( $post->comments->pingbacks->approved as $pingback ) : ?>
						<li id="ping-<?php echo $pingback->id; ?>">
								<div class="comment-content">
									<?php echo $pingback->content; ?>
								</div>
								<div class="ping-meta"><a href="<?php echo $pingback->url; ?>" title=""><?php echo $pingback->name; ?></a></div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		
		<h4 class="commentheading"><?php echo $post->comments->comments->approved->count; ?> <?php echo _n( 'Comment', 'Comments', $post->comments->comments->approved->count ); ?></h4>
		
			<ul id="commentlist">
				<?php
				if ( $post->comments->moderated->count ) {
					foreach ( $post->comments->comments->moderated as $comment ) {
						$class = 'class="comment';
						if ( $comment->status == Comment::STATUS_UNAPPROVED ) {
							$class.= '-unapproved';
						}
						$class.= '"';
						?>
						<li id="comment-<?php echo $comment->id; ?>" <?php echo $class; ?>>
							<div class="comment-content">
								<?php echo $comment->content_out; ?>
							</div>
							<div class="comment-meta">#<a href="#comment-<?php echo $comment->id; ?>" class="counter" title="<?php _e('Permanent Link to this Comment'); ?>"><?php echo $comment->id; ?></a> |
								<span class="commentauthor"><?php _e('Comment by'); ?> <?php $theme->comment_author_link($comment); ?></span>
								<span class="commentdate"> <?php _e('on'); ?> <a href="#comment-<?php echo $comment->id; ?>" title="<?php _e('Time of this comment'); ?>"><?php /* @locale Date formats according to http://php.net/manual/en/function.date.php */ $comment->date->out( _t( 'M j, Y h:ia' ) ); ?></a></span><h5><?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?> <em><?php _e('In moderation'); ?></em><?php endif; ?></h5>
							</div>
						</li>
				<?php
					}
				}
				else {
					_e('There are currently no comments.');
				}
				?>
			</ul>
	</div>
</div>