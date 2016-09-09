<?php 


add_action( 'cmb2_init', 'cmb2_dates_metaboxes' );
function cmb2_dates_metaboxes() {

	$prefix = '_creativemeta_';

	$cmb = new_cmb2_box( array(
		'id'            => 'date_metabox',
		'title'         => __( 'Course Dates', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type     
        //'pages' => array('post'), 
        'show_on' => array( 
        	'key' => 'taxonomy', 
        	'value' => array('category' => '') 
        	),
        // 'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-about.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left

        ) );

	$group_field_id = $cmb->add_field( array(
		'id'          => 'dates_meta_group',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( 'Dates {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Date', 'cmb' ),
        'remove_button' => __( 'Remove Date', 'cmb' ),
        'sortable'      => true, // beta
        ),
		) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Dates',
		'id'   => 'coursedates',
		'type'    => 'text',
		) );
}