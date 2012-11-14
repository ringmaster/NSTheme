<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
			
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <div class="table">
					<ul class="nav">
						<li><a href="<?php Site::out_url( 'habari' ); ?>"><?php _e('Home'); ?></a></li>
						<?php
						// List Pages
						foreach ( $pages as $page ) {
							echo '<li><a href="' . $page->permalink . '" title="' . $page->title . '">' . $page->title . '</a></li>' . "\n";
						}
						?>
						<li></li>
					</ul>
				</div>
      </div>
      
    </div>
  </div>
</div>