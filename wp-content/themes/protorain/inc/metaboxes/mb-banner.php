<?php
add_action( 'cmb2_init', 'cmb2_banner_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_banner_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_creativemeta_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'banner_metabox',
        'title'         => __( 'Banner', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-home.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'banner_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Banner {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Another Banner', 'cmb' ),
        'remove_button' => __( 'Remove Banner', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Banner Image',
        'id'   => 'banner_image',
        'type' => 'file',
        'desc'  => 'Images is best displayed if sized 1920px X 480px'
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Banner Title',
        'id'   => 'banner_title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Banner Desription',
        'id'   => 'banner_desc',
        'type'    => 'text',
        ) );
}


add_action( 'cmb2_init', 'cmb2_advantage_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_advantage_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_creativemeta_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'advantage_metabox',
        'title'         => __( 'Advantage', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'tpl-home.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'advantage_meta_group',
        'type'        => 'group',
        'options'     => array(
        'group_title'   => __( 'Advantage {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Advantage', 'cmb' ),
        'remove_button' => __( 'Remove Advantage', 'cmb' ),
        'sortable'      => true, // beta
        ),
        ) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Advantage Thumbnail',
        'id'   => 'advantage_thumbnail',
        'type' => 'file',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Advantage Title',
        'id'   => 'advantage_title',
        'type'    => 'text',
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Advantage Desription',
        'id'   => 'advantage_desc',
        'type'    => 'wysiwyg',
        ) );
}