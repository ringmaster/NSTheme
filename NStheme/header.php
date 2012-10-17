<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>">
	<title><?php if ($request->display_entry && isset($post)) { echo "{$post->title} - "; } ?><?php Options::out( 'title' ) ?></title>
	<meta name="generator" content="Habari">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php Site::out_url( 'theme' ); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php Site::out_url( 'theme' ); ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php Site::out_url( 'theme' ); ?>/css/fonts.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php Site::out_url( 'theme' ); ?>/css/custom.css">
	<link rel="Shortcut Icon" href="<?php Site::out_url( 'theme' ); ?>/favicon.ico">
	<?php $theme->header(); ?>
</head>
<body>

	<div class="container"><section id="header">
		<div class="row">
			<div class="span12">
				<h1><a href="<?php Site::out_url( 'habari'); ?>" title="<?php Options::out( 'title' ); ?>"> <?php Options::out( 'title' ); ?></a></h1>
				<h3><em><?php Options::out( 'tagline' ); ?></em></h3>
			</div>
		</div>
	</section></div>

	<div class="container"><section id="nav">
		<div class="navbar"><div class="table">
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
		</div></div>
	</section></div>

<!--begin main container-->
	<div class="container"><section id="main">
