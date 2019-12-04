<?php
/**
 * Custom API Endpoints
 */

function lauch_fill_tax_query( $tax, $term) {
  if ($term) {
    return array (
      'taxonomy' => $tax,
      'field' => 'slug',
      'terms' => $term,
    );
  } else {
    return null;
  }
}

function lauch_event_retro_videos( $data ) {
  $loc_param = lauch_fill_tax_query('location', $data->get_param('location'));
  $year_param = lauch_fill_tax_query('year', $data->get_param('year'));
  $type_param = lauch_fill_tax_query('type', $data->get_param('type'));
  $tech_param = lauch_fill_tax_query('tech', $data->get_param('tech'));
  $topics_param = lauch_fill_tax_query('topics', $data->get_param('topics'));

  $posts = get_posts(array(
    'post_type' => 'video',
    'tax_query' => array(
      $loc_param,
      $year_param,
      $type_param,
      $tech_param,
      $topics_param
    )
  ));

  $payload = [];

  foreach ($posts as $post) {
    print_r(get_field('youtubeid', $post));
    //$meta = get_post_meta($post->ID);
    $item = array(
      'title' => $post->post_title,
      'id' => $post->ID,
      'youtubeid' =>  get_field('youtubeid', $post->ID),
      'img' => get_the_post_thumbnail_url($post->ID, 'events-teaser-m'),
      //'tags' => wp_get_post_terms($post->ID, ['tech', 'topics'], true),
    );
    array_push($payload, $item);
  }
  return $payload;
}

function lauch_revolving_claims_endoint( $data ) {
  $tmp = get_theme_mod('revolving_claims', 'Code');
  if ($tmp) {
    $payload = explode(',', $tmp);
  }
  $response = new WP_REST_Response( $payload );
  return $response;
}


add_action( 'rest_api_init', function () {
  register_rest_route( 'lauch/v1', '/retro_videos', array(
    'methods' => 'GET',
    'callback' => 'lauch_event_retro_videos',
  ));

  register_rest_route( 'lauch/v1', '/revolving_claims', array(
    'methods' => 'GET',
    'callback' => 'lauch_revolving_claims_endoint',
  ));
});
