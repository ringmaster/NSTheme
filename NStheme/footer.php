<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
	<!--begin footer-->
	<div class="row">
		<div class="span12"><section id="footer">
			<p><?php Options::out('title'); ?> <?php _e('is powered by'); ?> <a href="http://www.habariproject.org/" title="Habari">Habari</a></p>
			<?php $theme->footer(); ?>
		</div></div>
	</div>
	<!--end footer-->
	
</section>
</div>
<!--end container-->
<!--javascript includes-->
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-alert.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-button.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-popover.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-transition.js"></script>
<script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/js/bootstrap-typeahead.js"></script>
<!--end js includes-->
</body>
</html>