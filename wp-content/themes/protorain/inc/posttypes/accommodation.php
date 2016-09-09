<?php 
// Register Custom Post Type
add_action('init', 'accommodation_init');
function accommodation_init() {
	$labels = array(
		'name' => _x('Accommodation', 'post type general name'),
		'singular_name' => _x('Accommodation', 'post type singular name'),
		'add_new' => _x('Add Accommodation', 'accommodation'),
		'add_new_item' => __('Add New Accommodation'),
		'edit_item' => __('Edit Accommodation'),
		'new_item' => __('New Accommodation'),
		'view_item' => __('View Accommodation'),
		'search_items' => __('Search Accommodation'),
		'not_found' => __('No Accommodation found'),
		'not_found_in_trash' => __('No Accommodation found in Trash'),
		'_builtin' => false,
		'parent_item_colon' => '',
		'menu_name' => 'Accommodations'
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'accommodations',
			'with_front' => false
			),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 9,
		'supports' => array('title', 'revisions','thumbnail')
		);
	register_post_type('accommodations', $args);
}
function accommodation_rewrite_flush() {
	accommodation_init();
	flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'accommodation_rewrite_flush');
function create_accc_place_tax() {
	$args = array(
		'label'             => __( 'Places' ),
    'hierarchical'      => true,//true for category type and false for tag
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    );
	register_taxonomy( 'acc_places', array( 'accommodations' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_accc_place_tax', 0 );
?>