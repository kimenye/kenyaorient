<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="initial-scale=1.0" />

  <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="header" class="row">
  <div class="logo left">
    <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png"> </a>
  </div>
</div>
