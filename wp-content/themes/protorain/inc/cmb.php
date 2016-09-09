<?php 
//metaboxes
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';

} elseif ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';

}


include('metaboxes/mb-banner.php'); //homepgae banner
include('metaboxes/mb-about.php'); //about us page
include('metaboxes/mb-accomodation.php'); //about us page
//include('metaboxes/mb-courses.php'); //courses post type
include('metaboxes/mb-events.php'); //courses post type