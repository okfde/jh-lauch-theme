<?php
/**
 * Custom Video post type
 */

function lauch_videos_init() {
    $labels = array(
        'name'                  => _x( 'Videos', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Video', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Videos', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Neues Video', 'textdomain' ),
        'add_new_item'          => __( 'Neues Video hinzufügen', 'textdomain' ),
        'new_item'              => __( 'Neues Video', 'textdomain' ),
        'edit_item'             => __( 'Video bearbeiten', 'textdomain' ),
        'view_item'             => __( 'Video ansehen', 'textdomain' ),
        'all_items'             => __( 'Alle Videos', 'textdomain' ),
        'search_items'          => __( 'Videos suchen', 'textdomain' ),
        'parent_item_colon'     => __( 'Elternvideos:', 'textdomain' ),
        'not_found'             => __( 'Keine Videos gefunden.', 'textdomain' ),
        'not_found_in_trash'    => __( 'Keine Videos im Papierkorb gefunden.', 'textdomain' ),
        'featured_image'        => _x( 'Video Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Video archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into video', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this video', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter videos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Videos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Videos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'video', 'with_front' => false ),
        'capability_type'    => 'video',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'custom-fields','page-attributes', 'thumbnail' ),
        'taxonomies'         => array('tech', 'topic', 'location', 'year', 'type'),
        'menu_icon'  		     => 'dashicons-format-video',
        'map_meta_cap'       => true,
    );

    register_post_type( 'video', $args );
}

add_action( 'init', 'lauch_videos_init' );
