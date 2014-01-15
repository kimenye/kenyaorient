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
	// wp_enqueue_script('google_maps','https://maps.googleapis.com/maps/api/js?sensor=false');
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

// Team
function team_member_register() {
	$labels = array(
		'name' => _x('Team Members', 'post type general name'),
		'singular_name' => _x('Team Member', 'post type singular name'),
		'add_new' => _x('Add New', 'team_member item'),
		'add_new_item' => __('Add New Team Member'),
		'edit_item' => __('Edit Team Member'),
		'new_item' => __('New Team Member'),
		'view_item' => __('View Team Member'),
		'search_items' => __('Search Team Members'),
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
		'menu_icon' => get_stylesheet_directory_uri() . '/images/team.png',
		'rewrite' => true,
		'capability_type' => 'post',
		// 'taxonomies' => array('category'),
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
  	);	 

	register_post_type( 'team_member' , $args );
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
	//add meta boxes
  	add_meta_box("product_teaser-meta", "Product Teaser", "product_teaser", "product", "normal", "low");
  	add_meta_box("team_role-meta", "Role", "team_role", "team_member", "normal", "low");
}

function team_role() {
	global $post;
	$custom = get_post_custom($post->ID);
	$team_role = $custom["team_role"][0];
	// if ( ! $state = get_post_meta( $post->ID, '_cpt_state', true ) ) $state = '';
	$category = $custom["team_category"][0];
	$categories = array('BOD' => 'Board of Directors', 'SM' => 'Senior Management');
	?>
	<label style="width:100px;display:block;">Role</label>
	<input name="team_role" value="<?php echo $team_role ?>" />
	<br /><br />
	<label style="width:100px;display:block;">Category</label>
	<select name="team_category">
		<?php
			foreach ($categories as $code => $label) {
				echo '<option value="'.$code.'"';
        		if ($category == $code) {
            		echo ' selected="selected"';
        		}
        		echo '>' . $label . '</option>';
			}
		?>
	</select>
	<?php
}

function team_role_metabox_save($post_id) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 


	// if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 

	if( isset( $_POST['team_role'] ) )  
        update_post_meta( $post_id, 'team_role', wp_kses_post( $_POST['team_role'] ) );

    if( isset( $_POST['team_category'] ))
    	update_post_meta( $post_id, 'team_category', wp_kses_post( $_POST['team_category'] ));
}

add_action( 'save_post', 'team_role_metabox_save' );  


function product_teaser(){
  global $post;
  $custom = get_post_custom($post->ID);
  $product_teaser = $custom["product_teaser"][0];
  ?>
  <label>Product Teaser</label>
  <textarea name="product_teaser" cols="50" rows="5"><?php echo $product_teaser ?></textarea>
  <?php
}

if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
		'label' => 'Secondary Image [Related]',
		'id' => 'secondary-image',
		'post_type' => 'product'
 	));
}


add_action('wp_head', 'favicon_link' );
add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);
add_action('init', 'location_register');
add_action('init', 'product_register');
add_action('init', 'team_member_register');
add_action('admin_init', 'admin_init');


// register_taxonomy("Skills", array("portfolio"), array("hierarchical" =&gt; true, "label" =&gt; "Skills", "singular_label" =&gt; "Skill", "rewrite" =&gt; true));
register_taxonomy("Branches", array("location"), array("hierarchical" => true, "label" => "Branches", "singular_label" => "Branch", "rewrite" => true));
register_taxonomy("Roles", array("team_role"), array("hierarchical" => true, "label" => "Roles", "singular_label" => "Role", "rewrite" => true));

?>