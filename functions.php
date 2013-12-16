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
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/images/favicon.ico" />' . "\n";
}

// Locations
function location_register() {
	$labels = array(
		'name' => _x('Locations', 'post type general name'),
		'singular_name' => _x('Location', 'post type singular name'),
		'add_new' => _x('Add New', 'location item'),
		'add_new_item' => __('Add New Location'),
		'edit_item' => __('Edit Location Item'),
		'new_item' => __('New Location Item'),
		'view_item' => __('View Location Item'),
		'search_items' => __('Search Locations'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/target.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'location' , $args );
}


add_action( 'wp_head', 'favicon_link' );
add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);
add_action('init', 'location_register');

// register_taxonomy("Skills", array("portfolio"), array("hierarchical" =&gt; true, "label" =&gt; "Skills", "singular_label" =&gt; "Skill", "rewrite" =&gt; true));
register_taxonomy("Branches", array("location"), array("hierarchical" => true, "label" => "Branches", "singular_label" => "Branch", "rewrite" => true));

?>