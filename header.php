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
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/javascript/app.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="header" class="row">
  <div class="logo left">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png"> 
    </a>
  </div>
  <div class="nav right">
    <?php
      // Left Nav Section
      if ( has_nav_menu( 'header-menu-left' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'header-menu-left',
            'container' => false,
            'depth' => 0,
            'items_wrap' => '<ul>%3$s</ul>',
            'fallback_cb' => false,
            'walker' => new cornerstone_walker( array(
                'in_top_bar' => true,
                'item_type' => 'li'
            ) ),
        ));        
      }
    ?>

    <!-- Social Media -->
    <div class="social">
      <a href="https://www.facebook.com/kenyaorientinsurance">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/fb.png" />
      </a>
      <a href="https://twitter.com/KenyaOrient">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tw.png">
      </a>
    </div>

    <!-- Search -->
    <div class="search">
      <a href=""></a>
    </div>
  </div>
</div>
