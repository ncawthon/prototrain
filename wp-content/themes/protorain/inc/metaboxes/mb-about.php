<?php
add_action( 'cmb2_init', 'cmb2_teacher_metaboxes' );
function cmb2_teacher_metaboxes() {

    $prefix = '_creativemeta_';
    $cmb = new_cmb2_box( array(
        'id'            => 'teacher_metabox',
        'title'         => __( 'Teacher', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-about.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        ) );

    $cmb->add_field( array(
        'name'    => 'Section Title',
        'id'      => 'section_title',
        'type'    => 'text',
        ) );


    $group_field_id = $cmb->add_field( array(
        'id'          => 'teacher_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Teachers {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Teacher', 'cmb' ),
        'remove_button' => __( 'Remove Teacher', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Teacher Image',
        'id'   => 'teacher_image',
        'type' => 'file',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Teacher Title',
        'id'   => 'teacher_title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Teacher Desription',
        'id'   => 'teacher_desc',
        'type'    => 'wysiwyg',
        ) );
}


add_action( 'cmb2_init', 'cmb2_venue_metaboxes' );
function cmb2_venue_metaboxes() {

    $prefix = '_creativemetavenue_';

    $cmb = new_cmb2_box( array(
        'id'            => 'venue_metabox',
        'title'         => __( 'Venue', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-about.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        ) );

    $cmb->add_field( array(
        'name'    => 'Section Title',
        'id'      => 'section_title1',
        'type'    => 'text',
        ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'venue_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Venue {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add venue', 'cmb' ),
        'remove_button' => __( 'Remove venue', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Venue Thumbnail',
        'id'   => 'venue_thumbnail',
        'type' => 'file',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Venue Title',
        'id'   => 'venue_title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Venue Description',
        'id'   => 'venue_desc',
        'type'    => 'wysiwyg',
        ) );
}


add_action( 'cmb2_init', 'cmb2_protrain_metaboxes' );
function cmb2_protrain_metaboxes() {

    $prefix = '_creativemetaprotrain_';

    $cmb = new_cmb2_box( array(
        'id'            => 'protrain_metabox',
        'title'         => __( 'More Details', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-about.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        ) );

    $cmb->add_field( array(
        'name'    => 'Section Title',
        'id'      => 'section_title2',
        'type'    => 'text',
        ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'details_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Detail {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Details', 'cmb' ),
        'remove_button' => __( 'Remove Details', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Thumbnail',
        'id'   => 'thumbnail',
        'type' => 'file',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Description',
        'id'   => 'desc',
        'type'    => 'wysiwyg',
        ) );
}