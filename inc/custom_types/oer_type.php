<?php
/**
 * Custom Lab post type
 */

function lauch_oer_init() {
    $labels = array(
        'name'                  => _x( 'OERs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'OER', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'OERs', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'OER', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Neues hinzufügen', 'textdomain' ),
        'add_new_item'          => __( 'Neue OER hinzufügen', 'textdomain' ),
        'new_item'              => __( 'Neue OER', 'textdomain' ),
        'edit_item'             => __( 'OER bearbeiten', 'textdomain' ),
        'view_item'             => __( 'OER ansehen', 'textdomain' ),
        'all_items'             => __( 'Alle OERs', 'textdomain' ),
        'search_items'          => __( 'OERs durchsuchen', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent OERs:', 'textdomain' ),
        'not_found'             => __( 'No OERs found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No OERs found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'OER Bild', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'OER Bild bearbeiten', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'OER Bild entfernen', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'OER archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter OER list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'OER list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'OER list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'capability_type'    => 'oer',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 44,
        'supports'           => array( 'title', 'author', 'editor', 'excerpt', 'custom-fields', 'page-attributes', 'thumbnail' ),
        'taxonomies'         => array('oer-topics'),
        'menu_icon'  		     => 'dashicons-book-alt',
        'map_meta_cap'       => true,
    );

    register_post_type( 'oer', $args );
}

add_action( 'init', 'lauch_oer_init' );

function oer_rewrite() {
    global $wp_rewrite;
    $queryarg = 'post_type=oer&name=';
    $wp_rewrite->add_rewrite_tag( '%cpt_name%', '([^/]+)', $queryarg );
    $wp_rewrite->add_permastruct( 'oer', '/oer/projekte/%cpt_name%/', false );
}
add_action( 'init', 'oer_rewrite' );

function oer_permalink( $post_link, $id = 0, $leavename ) {
    global $wp_rewrite;
    $post = &get_post( $id );
    if ( is_wp_error( $post ) || get_post_type($post) != 'oer')
        return $post_link;

    $newlink = $wp_rewrite->get_extra_permastruct( 'oer' );
    $newlink = str_replace( '%cpt_name%', $post->post_name, $newlink );
    $newlink = home_url( user_trailingslashit( $newlink ) );
    return $newlink;
}
add_filter('post_type_link', 'oer_permalink', 1, 3);
