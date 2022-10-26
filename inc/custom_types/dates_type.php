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
        'add_new'               => __( 'Neuen hinzufügen', 'lauch' ),
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
        'set_featured_image'    => _x( 'Termin-Bild speichern', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lauch' ),
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
        'capability_type'    => 'date',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'rewrite'            => array( 'slug' => 'kalender', 'with_front' => false ),
        'supports'           => array( 'title', 'editor', 'author', 'custom-fields', 'thumbnail' ),
        'menu_icon'  		     => 'dashicons-calendar-alt',
        'map_meta_cap'       => true,
    );

    register_post_type( 'date', $args );
}

add_action( 'init', 'lauch_dates_init' );

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

function post_date_get_datetime($pos = 'begin', $post_id = false) {
  return DateTime::createFromFormat('U', get_field($pos, $post_id), wp_timezone())->getTimestamp();
}

function post_date_format_date() {
  $begin = post_date_get_datetime();
  $end = post_date_get_datetime('end');

  if (strftime('%Y-%m-%d', $begin) == strftime('%Y-%m-%d', $end)) {
      return date_i18n('D. d.m.Y | H:i', $begin) . date_i18n(' – H:i', $end);
  } else {
      return date_i18n('D. d.m.Y | H:i', $begin) . date_i18n(' – D. d.m.Y | H:i', $end);
  }
}

function post_date_format_date_simple($mit_jahr) {
  $begin = post_date_get_datetime();
  $end = post_date_get_datetime('end');

  

  if (strftime('%Y-%m-%d', $begin) == strftime('%Y-%m-%d', $end)) {
      return date_i18n('j. F', $begin) . $jahr;
  } else {
      return date_i18n('j.', $begin) . " - " . date_i18n('d. F', $end) . $jahr;
  }
}

function post_date_is_past($post) {
  $today = strtotime('today');
  return get_field('end', $post) <= $today;
}

function post_date_get_timed_query($should_be_past=true) {
  return array(
    'key' => 'begin', // name of custom field
    'value' => date("Y-m-d H:i:s", strtotime('today')),
    'compare' => $should_be_past ? '>=' : '<',
    'type' => 'DATETIME'
  );
}

function post_date_get_sorted($query) {
  $all_dates = array();
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      global $post;
      if (!post_date_is_past($post)) :
        $info = array('lab' => get_field('parent')->post_title,
          'link' => get_post_permalink(),
          'img' => get_post_thumbnail_id(),
          'content' => get_the_content(),
          'title' => $post->post_title,
          'date_technical' => post_date_get_datetime(),
          'date' => post_date_format_date());
        array_push($all_dates, $info);
      endif;
    endwhile;
    wp_reset_postdata();
  endif;

  usort($all_dates, function ($a, $b) {
    return $a['date_technical'] <=> $b['date_technical'];
  });

  usort($query->posts, function ($a, $b) {
    return post_date_get_datetime('begin', $a->ID) <=> post_date_get_datetime('begin', $b->ID);
  });
  return $all_dates;
}
