<?php
/**
 * Custom Lab post type
 */

function lauch_labs_init() {
    $labels = array(
        'name'                  => _x( 'Labs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Lab', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Labs', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Lab', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Neues hinzufügen', 'textdomain' ),
        'add_new_item'          => __( 'Neues Lab hinzufügen', 'textdomain' ),
        'new_item'              => __( 'Neues Lab', 'textdomain' ),
        'edit_item'             => __( 'Lab bearbeiten', 'textdomain' ),
        'view_item'             => __( 'Lab ansehen', 'textdomain' ),
        'all_items'             => __( 'Alle Labs', 'textdomain' ),
        'search_items'          => __( 'Labs durchsuchen', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Labs:', 'textdomain' ),
        'not_found'             => __( 'No events found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Lab Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Lab archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Labs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Labs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'lab', 'with_front' => false ),
        'capability_type'    => 'lab',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 32,
        'supports'           => array( 'title', 'editor', 'author', 'custom-fields', 'page-attributes', 'thumbnail' ),
        'taxonomies'         => array('lab-location'),
        'menu_icon'  		     => 'dashicons-admin-multisite',
        'map_meta_cap'       => true,
    );

    register_post_type( 'lab', $args );
}

add_action( 'init', 'lauch_labs_init' );

// fix for https://core.trac.wordpress.org/ticket/16841
$blogusers = get_users( 'role=lab-orga' );
foreach ( $blogusers as $user ) {
   $user->add_cap('level_1');
};
