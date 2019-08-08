<?php
/**
 * Custom Person post type
 */

function lauch_persons_init() {
    $labels = array(
        'name'                  => _x( 'Persons', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Person', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Persons', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Person', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Person', 'textdomain' ),
        'new_item'              => __( 'New Person', 'textdomain' ),
        'edit_item'             => __( 'Edit Person', 'textdomain' ),
        'view_item'             => __( 'View Person', 'textdomain' ),
        'all_items'             => __( 'All Persons', 'textdomain' ),
        'search_items'          => __( 'Search Persons', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Persons:', 'textdomain' ),
        'not_found'             => __( 'No events found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Person Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Person archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Persons list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Persons list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => false,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'austausch' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'custom-fields', 'thumbnail' ),
        //'taxonomies'         => array('exchange-program', 'year'),
    );

    register_post_type( 'person', $args );
}

add_action( 'init', 'lauch_persons_init' );
