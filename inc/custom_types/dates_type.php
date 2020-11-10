<?php
/**
 * Custom Date post type
 */

function lauch_dates_init() {
    $labels = array(
        'name'                  => _x( 'Termine', 'Post type general name', 'lauch' ),
        'singular_name'         => _x( 'Termin', 'Post type singular name', 'lauch' ),
        'menu_name'             => _x( 'Termine', 'Admin Menu text', 'lauch' ),
        'name_admin_bar'        => _x( 'Termin', 'Add New on Toolbar', 'lauch' ),
        'add_new'               => __( 'Neues hinzufügen', 'lauch' ),
        'add_new_item'          => __( 'Neuen Termin hinzufügen', 'lauch' ),
        'new_item'              => __( 'Neuen Termin', 'lauch' ),
        'edit_item'             => __( 'Termin bearbeiten', 'lauch' ),
        'view_item'             => __( 'Termin ansehen', 'lauch' ),
        'all_items'             => __( 'Alle Termine', 'lauch' ),
        'search_items'          => __( 'Termine durchsuchen', 'lauch' ),
        'parent_item_colon'     => __( 'Parent Termine:', 'lauch' ),
        'not_found'             => __( 'No dates found.', 'lauch' ),
        'not_found_in_trash'    => __( 'No dates found in Trash.', 'lauch' ),
        'featured_image'        => _x( 'Termin-Bild', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'lauch' ),
        'set_featured_image'    => _x( 'Termin-Bild bearbeiten', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'remove_featured_image' => _x( 'Termin-Bild entfernen', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'use_featured_image'    => _x( 'Als Termin-Bild ', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'lauch' ),
        'archives'              => _x( 'Termin Archiv', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'lauch' ),
        'insert_into_item'      => _x( 'Insert into Termine', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'lauch' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this date', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'lauch' ),
        'filter_items_list'     => _x( 'Filter dates list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'lauch' ),
        'items_list_navigation' => _x( 'Termine list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'lauch' ),
        'items_list'            => _x( 'Termine list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'lauch' ),
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

    register_post_type( 'date', $args );
}

add_action( 'init', 'lauch_dates_init' );

// fix for https://core.trac.wordpress.org/ticket/16841
$blogusers = get_users( 'role=date-orga' );
foreach ( $blogusers as $user ) {
   $user->add_cap('level_1');
};

function rewrite_date_url( $url, $post ) {
  if ( 'date' == get_post_type( $post ) ) {
    $parent = get_field('parent', $post->ID);
    if (post_date_is_past($post)) {
      return $url;
    }
    return get_permalink($parent->ID);
  }
  return $url;
}
add_filter( 'post_type_link', 'rewrite_date_url', 10, 2 );

function save_date($id) {
  $parent = get_field('parent', $id);
  if (!$parent) return false;
  $taxonomies = get_object_taxonomies(get_post_type($parent->ID));

  remove_action( 'save_post_date', 'save_date' );
  foreach ($taxonomies as $tax) {
    $terms = get_the_terms($parent->ID, $tax);
    wp_set_object_terms($id, array_map(function($term) {
      return $term->term_id;
    }, $terms), $tax);
  }
  add_action( 'save_post_date', 'save_date' );
}
add_action( 'save_post_date', 'save_date' );

function post_date_get_datetime($pos = 'begin') {
  return DateTime::createFromFormat('U', get_field($pos), wp_timezone())->getTimestamp();
}

function post_date_format_date() {
  $begin = post_date_get_datetime();
  $end = post_date_get_datetime('end');
  setlocale(LC_TIME, get_locale());
  if (strftime('%Y-%m-%d', $begin) == strftime('%Y-%m-%d', $end)) {
      return strftime('%a. %d.%m. | %H:%M', $begin) . strftime(' - %H:%M', $end);
  } else {
      return strftime('%a. %d.%m. %H:%M', $begin) . strftime(' - %a. %d.%m. %H:%M', $end);
  }
}

function post_date_is_past($post) {
  $today = strtotime('today');
  return get_field('end', $post) <= $today;
}
