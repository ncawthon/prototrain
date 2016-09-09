<?php 
include("inc/walkernav.php");
include("inc/themeoption.php");
include("inc/cmb.php");
include("inc/posttypes/events.php");
include("inc/posttypes/courses.php");
include("inc/posttypes/accommodation.php");


//scripts and styles
if( !is_admin()){
	wp_deregister_script('jquery');

}

function adim_scripts() {
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/assets/css/foundation.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/assets/css/owl.theme.default.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );


	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '', false);
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '', false );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/js/foundation.js', array(), '', false);
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '', false );
	wp_enqueue_script( 'matchheight', get_template_directory_uri() . '/assets/js/matchHeight.js', array(), '', false );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.min.js', array(), '', false );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '', false );
}

add_action( 'wp_enqueue_scripts', 'adim_scripts' );

/*******Remove wordpress version from css and jquery files*******/
function creativektm_remove_versions( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'creativektm_remove_versions', 9999 );
add_filter( 'script_loader_src', 'creativektm_remove_versions', 9999 );


//post meta - custom fields
add_post_meta($id, 'date', 'value');

//add async and defer to javascripts
// function wcs_defer_javascripts ( $url ) {
// 	if ( FALSE === strpos( $url, '.js' ) ) return $url;
// 	if ( strpos( $url, 'jquery.js' ) ) return $url;
// 	return "$url' async='async";
// }
// add_filter( 'clean_url', 'wcs_defer_javascripts', 11, 1 );




//register menu
register_nav_menus( array(
	'primary-left' => 'Top Left Primary Navigation',
	'primary-right' => 'Top Right Primary Navigation',
	'offcanvas-left' => 'Left Offcanvas Navigation',
	'offcanvas-right' => 'Right Offcanvas Navigation'
	) 
);


//post thumbnails
add_theme_support( 'post-thumbnails' ); 

//custom excerpt length for homepage
function wpe_excerpt( $length_callback = '', $more_callback = '' ) {

	if ( function_exists( $length_callback ) )
		add_filter( 'excerpt_length', $length_callback );

	if ( function_exists( $more_callback ) )
		add_filter( 'excerpt_more', $more_callback );

	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>'; // maybe wpautop( $foo, $br )
    echo $output;
}


function wpe_excerptlength_index( $length ) {
	return 15;
}



//register widget
if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
		'name' => 'Newsletter',
		'id'	=> 'newsletter',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p>',
		'after_title' => '</p>'
		));


}