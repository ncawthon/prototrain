<?php
//options panel 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/core/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/core/framework.php' );
}

if ( !isset( $adims ) && file_exists( dirname( __FILE__ ) . '//framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework.php' );
}

//disable demo
function removeDemoModeLink() { // Be sure to rename this function to something more unique
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
	}
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
	}
}
add_action('init', 'removeDemoModeLink');

