<?php
add_action( 'cmb2_init', 'cmb2_events_metaboxes' );
function cmb2_events_metaboxes() {

    $prefix = '_creativemeta_';

    $cmb_events = new_cmb2_box( array(
        'id'            => 'events_Place',
        'title'         => __( 'Event Details', 'cmb2' ),
        'object_types'  => array( 'events', ), // taxonomy , here is categories
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => false, // Keep the metabox closed by default
        ) );
    $cmb_events->add_field( array(
        'name' => __( 'Venue', 'cmb2' ),
        'desc' => __( 'Please Name the Event Venue', 'cmb2' ),
        'id'   => $prefix . 'eve_place',
        'type' => 'text',
        // 'repeatable' => true,
        ) );
    $cmb_events->add_field( array(
        'name' => __( 'City', 'cmb2' ),
        'desc' => __( 'Name the City ', 'cmb2' ),
        'id'   => $prefix . 'eve_location',
        'type' => 'text',
        // 'repeatable' => true,
        ) );
    $cmb_events->add_field( array(
        'name' => __( 'Number Of Seats Avaliable', 'cmb2' ),
        'desc' => __( 'Total Number of seats', 'cmb2' ),
        'id'   => $prefix . 'eve_seats_number',
        'type' => 'text',
        // 'repeatable' => true,
        ) );
    $cmb_events->add_field( array(
        'name' => __( 'Event Value', 'cmb2' ),
        'desc' => __( 'Event Price', 'cmb2' ),
        'id'   => $prefix . 'eve_money',
        'type' => 'text_money',
        // 'before_field' => '£', // override '$' symbol if needed
        // 'repeatable' => true,
        ) );
    $cmb_events->add_field( array(
        'name' => __( 'Event Dates', 'cmb2' ),
        'desc' => __( 'Select dates from Calendar', 'cmb2' ),
        'id'   => $prefix . 'eve_date',
        'type' => 'text_date',
        'repeatable' => true,
        // 'date_format' => 'Y-m-d',
        ) );
}

//taxonomy custom field
add_action( 'cmb2_admin_init', 'cmb2_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function cmb2_taxonomy_metabox() {
    $prefix = 'creativemetaicon_';
    /**
     * Metabox to add fields to categories and tags
     */
    $cmb_term = new_cmb2_box( array(
        'id'               => $prefix . 'edit',
        'title'            => __( 'Map' ), // Doesn't output for term boxes
        'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies'       => array( 'places' ), // Tells CMB2 which taxonomies should have these fields
        'new_term_section' => true, // Will display in the "Add New Category" section
        ) );
    $cmb_term->add_field( array(
        'name'     => __( 'Maps for Places' ),
        'desc'     => __( 'Copy Paste the google maps URL from iframe provided as shown in example. The example shows Statue of liberty code.' ),
        'id'       => $prefix . 'places_map',
        'type'     => 'title',
        'on_front' => false,
        ) );
    $cmb_term->add_field( array(
        'name' => __( 'Map code' ),
        'desc'     => __( 'Example: https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.306387423316!2d-74.04668908503916!3d40.68924937933435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25090129c363d%3A0x40c6a5770d25022b!2sStatue+of+Liberty+National+Monument!5e0!3m2!1sen!2snp!4v1466872733483' ),
        'default' => _(''),
        'id'   =>  'mapfield',
        'type' => 'textarea_code',
        ) );
}