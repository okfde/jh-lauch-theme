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

    $posts = get_posts(array(
        'post_type' => 'video',
        'tax_query' => array(
            $loc_param,
            $year_param,
            $type_param,
        )
    ));

    $payload = [];

    foreach ($posts as $post) {
        //$meta = get_post_meta($post->ID);
        $item = array(
            'title' => $post->post_title,
            'id' => $post->ID,
            'youtubeid' =>  get_post_meta($post->ID, 'youtubeid', true),
            'tags' => wp_get_post_terms($post->ID, ['tech', 'topics'], true),
        );
        array_push($payload, $item);
    }
    return $payload;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'lauch/v1', '/retro_videos', array(
        'methods' => 'GET',
        'callback' => 'lauch_event_retro_videos',
    ));
});
