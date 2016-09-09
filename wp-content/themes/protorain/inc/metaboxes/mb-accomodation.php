<?php
add_action( 'cmb2_init', 'cmb2_accomodation_metaboxes' );
function cmb2_accomodation_metaboxes() {

    $prefix = '_creativemeta_';

    $cmb = new_cmb2_box( array(
        'id'            => 'accomodation1_metabox',
        'title'         => __( 'Accomodations', 'cmb2' ),
        'object_types'  => array( 'accommodations', ), // taxonomy , here is categories
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => false, // Keep the metabox closed by default
        ) );

    // $cmb->add_field( array(
    //     'name'    => 'Accomodation Title',
    //     'id'      => 'section_title1',
    //     'type'    => 'text',
    //     ) );
    // $cmb->add_field( array(
    //     'name'    => 'Accomodation Locat ion',
    //     'id'      => 'section_location1',
    //     'type'    => 'text',
    //     ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'accomodation1_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Accomodation {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add accomodation', 'cmb' ),
        'remove_button' => __( 'Remove accomodation', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );


    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Thumbnail',
        'id'   => 'acc1_thumbnail',
        'type' => 'file',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'acc1_title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name'        => __( 'Description', 'cmb2' ),
        'description' => __( 'Write a short description for this entry', 'cmb2' ),
        'id'          => 'description',
        'type'        => 'textarea_small',
    ) );

    //Airbnb
    // $group_field_id = $cmb->add_field( array(
    //     'id'          => 'accomodation2_meta_group',
    //     'type'        => 'group',
    //     'options'     => array(
    //     'group_title'   => __( 'Secondary Accomodation {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
    //     'add_button'    => __( 'Add accomodation', 'cmb' ),
    //     'remove_button' => __( 'Remove accomodation', 'cmb' ),
    //     'sortable'      => true, // beta
    //     ),
    //     ) );


    // $cmb->add_group_field( $group_field_id, array(
    //     'name' => 'Thumbnail',
    //     'id'   => 'acc2_thumbnail',
    //     'type' => 'file',
    //     ) );
    // $cmb->add_group_field( $group_field_id, array(
    //     'name' => 'Title',
    //     'id'   => 'acc2_title',
    //     'type'    => 'text',
    //     ) );
    // $cmb->add_group_field( $group_field_id, array(
    //     'name' => 'Description',
    //     'id'   => 'acc2_desc',
    //     'type'    => 'wysiwyg',
    //     ) );
}


//accomodation 2 meta boxes
//add_action( 'cmb2_init', 'cmb2_locations_metaboxes' );
function cmb2_locations_metaboxes() {

    $prefix = '_creativemeta2_';

    $cmb = new_cmb2_box( array(
        'id'            => 'locations_metabox',
        'title'         => __( 'Locations', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-accomodation.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'closed'     => true, // Keep the metabox closed by default
        ) );


    $group_field_id = $cmb->add_field( array(
        'id'          => 'locations_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Location {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Location', 'cmb' ),
        'remove_button' => __( 'Remove Location', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );


    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Name',
        'id'   => 'locationtitle',
        'type'    => 'text',
        ) );
}