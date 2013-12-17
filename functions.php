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
	wp_enqueue_script('google_maps','https://maps.googleapis.com/maps/api/js?sensor=false');
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

// Products
function product_register() {
	$labels = array(
		'name' => _x('Products', 'post type general name'),
		'singular_name' => _x('Product', 'post type singular name'),
		'add_new' => _x('Add New', 'product item'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product Item'),
		'new_item' => __('New Product Item'),
		'view_item' => __('View Product Item'),
		'search_items' => __('Search Products'),
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
		'menu_icon' => get_stylesheet_directory_uri() . '/images/product.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'taxonomies' => array('category'),
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'product' , $args );
}

function admin_init(){
  add_meta_box("product_teaser-meta", "Product Teaser", "product_teaser", "product", "normal", "low");
}

function product_teaser(){
  global $post;
  $custom = get_post_custom($post->ID);
  $product_teaser = $custom["product_teaser"][0];
  ?>
  <label>Product Teaser</label>
  <textarea name="product_teaser" cols="50" rows="5"><?php echo $product_teaser ?></textarea>
  <?php
}


add_action( 'wp_head', 'favicon_link' );
add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);
add_action('init', 'location_register');
add_action('init', 'product_register');
add_action('admin_init', 'admin_init');


// register_taxonomy("Skills", array("portfolio"), array("hierarchical" =&gt; true, "label" =&gt; "Skills", "singular_label" =&gt; "Skill", "rewrite" =&gt; true));
register_taxonomy("Branches", array("location"), array("hierarchical" => true, "label" => "Branches", "singular_label" => "Branch", "rewrite" => true));

?>