<?php
/**
 * Custom Video post type
 */

function lauch_projects_init() {
    $labels = array(
        'name'                  => _x( 'Projekte', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Projekt', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Projekte', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Projekt', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Project', 'textdomain' ),
        'new_item'              => __( 'New Project', 'textdomain' ),
        'edit_item'             => __( 'Edit Project', 'textdomain' ),
        'view_item'             => __( 'View Project', 'textdomain' ),
        'all_items'             => __( 'All Projects', 'textdomain' ),
        'search_items'          => __( 'Search Projects', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Projects:', 'textdomain' ),
        'not_found'             => __( 'No videos found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No videos found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into video', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this video', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter videos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'custom-fields','page-attributes', 'thumbnail' ),
        'taxonomies'         => array('tech', 'topic', 'location', 'year'),
    );

    register_post_type( 'project', $args );
}

add_action( 'init', 'lauch_projects_init' );
