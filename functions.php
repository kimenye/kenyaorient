<?php

// Enqueue CSS and scripts

function load_cornerstone_child_scripts() {
	wp_enqueue_style(
		'cornerstone_child_css',
		get_stylesheet_directory_uri() . '/style.css',
		array('foundation_css'),
		false,
		'all'
	);

	 wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/app.css' );
}


// Custom Function to Include
function favicon_link() {
    // echo '<link rel="shortcut icon" type="image/x-icon" href='.get_stylesheet_directory_uri()."images/favicon.ico" />' . "\n";
     echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/images/favicon.ico" />' . "\n";
}

add_action( 'wp_head', 'favicon_link' );

add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);

?>