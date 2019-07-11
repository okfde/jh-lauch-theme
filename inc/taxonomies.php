<?php
/**
 * Custom Taxonomies
 */
function lauch_register_tech_taxonomy() {
    $args = array(
        'label'        => __( 'Technology', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => false,
        'show_in_rest' => true,
    );

    register_taxonomy( 'tech', ['video', 'project'], $args );
}
add_action( 'init', 'lauch_register_tech_taxonomy', 0 );

function lauch_register_topics_taxonomy() {
    $args = array(
        'label'        => __( 'Topic', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => false,
        'show_in_rest' => true,
    );

    register_taxonomy( 'topics', ['video', 'project'], $args );
}
add_action( 'init', 'lauch_register_topics_taxonomy', 0 );

function lauch_register_location_taxonomy() {
    $args = array(
        'label'        => __( 'Location', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'location', ['video', 'project', 'page'], $args );
}
add_action( 'init', 'lauch_register_location_taxonomy', 0 );

function lauch_register_year_taxonomy() {
    $args = array(
        'label'        => __( 'Year', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'year', ['video', 'project', 'page'], $args );
}
add_action( 'init', 'lauch_register_year_taxonomy', 0 );

function lauch_register_type_taxonomy() {
    $args = array(
        'label'        => __( 'Type', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rest_base'    => 'talktype',
    );

    register_taxonomy( 'type', 'video', $args );
}
add_action( 'init', 'lauch_register_type_taxonomy', 0 );
