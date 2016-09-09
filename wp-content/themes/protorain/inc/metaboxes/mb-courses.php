<?php
add_action( 'cmb2_init', 'cmb2_dates_metaboxes' );
function cmb2_dates_metaboxes() {

    $prefix = '_creativemeta_';

    // $cmb_cou = new_cmb2_box( array(
    //     'id'            => $prefix . 'dates_course',
    //     'title'         => __( 'Date', 'cmb2' ),
    //     'object_types'  => array( 'coursedetails', ), // Post type
    //     // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    //     // 'context'    => 'normal',
    //     // 'priority'   => 'high',
    //     // 'show_names' => true, // Show field names on the left
    //     // 'cmb_styles' => false, // false to disable the CMB stylesheet
    //     // 'closed'     => true, // true to keep the metabox closed by default
    // ) );

    // $cmb_cou->add_field( array(
    //     'name' => __( 'Test Date Picker', 'cmb2' ),
    //     'desc' => __( 'field description (optional)', 'cmb2' ),
    //     'id'   => $prefix . 'course_date',
    //     'type' => 'text_date',
    //     'taxonomy' => 'details',
    //     'repeatable'      => true,
    //     // 'date_format' => 'Y-m-d',
    // ) );

    // $cmb_cou->add_field( array(
    //     'id'          => 'dates_meta_group',
    //     'type'        => 'group',
    //     'options'     => array(
    //     'group_title'   => __( 'Dates {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
    //     'add_button'    => __( 'Add Date', 'cmb' ),
    //     'remove_button' => __( 'Remove Date', 'cmb' ),
    //     'sortable'      => true, // beta
    //     ),
    //     ) );

    // $cmb->add_group_field( $group_field_id, array(
    //     'name' => 'Course Title',
    //     'id'   => 'coursetitle',
    //     'type'    => 'text',
    //     ) );
}