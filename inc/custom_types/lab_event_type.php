<?php
/**
 * Custom Lab Event post type
 */

function lauch_lab_events_init() {
    $labels = array(
        'name'                  => _x( 'Lab-Events', 'Post type general name', 'lauch' ),
        'singular_name'         => _x( 'Lab-Event', 'Post type singular name', 'lauch' ),
        'menu_name'             => _x( 'Lab-Events', 'Admin Menu text', 'lauch' ),
        'name_admin_bar'        => _x( 'Lab-Event', 'Add New on Toolbar', 'lauch' ),
        'add_new'               => __( 'Neues hinzufügen', 'lauch' ),
        'add_new_item'          => __( 'Neues Lab-Event hinzufügen', 'lauch' ),
        'new_item'              => __( 'Neues Lab-Event', 'lauch' ),
        'edit_item'             => __( 'Lab-Event bearbeiten', 'lauch' ),
        'view_item'             => __( 'Lab-Event ansehen', 'lauch' ),
        'all_items'             => __( 'Alle Lab-Events', 'lauch' ),
        'search_items'          => __( 'Lab-Events durchsuchen', 'lauch' ),
        'parent_item_colon'     => __( 'Parent Lab-Events:', 'lauch' ),
        'not_found'             => __( 'No events found.', 'lauch' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'lauch' ),
        'featured_image'        => _x( 'Lab-Event-Bild', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'lauch' ),
        'set_featured_image'    => _x( 'Lab-Event-Bild bearbeiten', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'remove_featured_image' => _x( 'Lab-Event-Bild entfernen', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'use_featured_image'    => _x( 'Als Lab-Event-Bild ', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'archives'              => _x( 'Lab-Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'lauch' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'lauch' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'lauch' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'lauch' ),
        'items_list_navigation' => _x( 'Lab-Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'lauch' ),
        'items_list'            => _x( 'Events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'lauch' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'capability_type'    => 'event',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
        'menu_icon'  		     => 'dashicons-calendar-alt',
        'map_meta_cap'       => true,
    );

    register_post_type( 'lab_event', $args );
}

add_action( 'init', 'lauch_lab_events_init' );

// fix for https://core.trac.wordpress.org/ticket/16841
$blogusers = get_users( 'role=event-orga' );
foreach ( $blogusers as $user ) {
   $user->add_cap('level_1');
};
