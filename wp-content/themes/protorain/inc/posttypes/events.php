<?php 

add_action('init', 'event_init');
function event_init() {
	$labels = array(
		'name' => _x('Event', 'post type general name'),
		'singular_name' => _x('Event', 'post type singular name'),
		'add_new' => _x('Add Event', 'Event'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Event'),
		'new_item' => __('New Event'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Event'),
		'not_found' => __('No Event found'),
		'not_found_in_trash' => __('No Event found in Trash'),
		'_builtin' => false,
		'parent_item_colon' => '',
		'menu_name' => 'Events'
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
			'slug' => 'events',
			'with_front' => false
			),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 9,
		'supports' => array('title', 'excerpt', 'revisions','editor','thumbnail')
		);
	register_post_type('events', $args);
}
function event_rewrite_flush() {
	event_init();
	flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'event_rewrite_flush');
/*:::::::::::::::::::: Taxo for Events ::::::::::::::::::::::::::::*/
function create_place_tax() {
	$args = array(
		'label'             => __( 'Places' ),
    'hierarchical'      => true,//true for category type and false for tag
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    );
	register_taxonomy( 'places', array( 'events' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_place_tax', 0 );