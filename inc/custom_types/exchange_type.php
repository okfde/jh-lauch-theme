<?php
/**
 * Custom Exchange post type
 */

function lauch_exchanges_init() {
    $labels = array(
        'name'                  => _x( 'Austausche', 'Post type general name', 'lauch' ),
        'singular_name'         => _x( 'Austausch', 'Post type singular name', 'lauch' ),
        'menu_name'             => _x( 'Austausch', 'Admin Menu text', 'lauch' ),
        'name_admin_bar'        => _x( 'Austausch', 'Add New on Toolbar', 'lauch' ),
        'add_new'               => __( 'Neuen hinzufügen', 'lauch' ),
        'add_new_item'          => __( 'Add New Exchange', 'lauch' ),
        'new_item'              => __( 'New Exchange', 'lauch' ),
        'edit_item'             => __( 'Austausch bearbeiten', 'lauch' ),
        'view_item'             => __( 'Austausch ansehen', 'lauch' ),
        'all_items'             => __( 'Alle Austausche', 'lauch' ),
        'search_items'          => __( 'Search Exchanges', 'lauch' ),
        'parent_item_colon'     => __( 'Parent Exchanges:', 'lauch' ),
        'not_found'             => __( 'No events found.', 'lauch' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'lauch' ),
        'featured_image'        => _x( 'Exchange Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'lauch' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'archives'              => _x( 'Exchange archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'lauch' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'lauch' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'lauch' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'lauch' ),
        'items_list_navigation' => _x( 'Exchanges list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'lauch' ),
        'items_list'            => _x( 'Exchanges list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'lauch' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'austausch', 'with_front' => false ),
        'capability_type'    => 'exchange',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 34,
        'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'custom-fields', 'page-attributes', 'thumbnail' ),
        'taxonomies'         => array('exchange-program', 'year'),
        'menu_icon'  		     => 'dashicons-admin-site-alt3',
        'map_meta_cap'       => true,
    );

    register_post_type( 'exchange', $args );
}

add_action( 'init', 'lauch_exchanges_init' );
