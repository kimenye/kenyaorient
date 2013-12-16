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

	// wp_enqueue_style()
	 wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/app.css' );
}

add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);

?>