<?php
/**
 * Custom Taxonomies
 */
function lauch_register_tech_taxonomy() {
    $args = array(
        'label'        => __( 'Technologie', 'textdomain' ),
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
        'label'        => __( 'Themenraum', 'textdomain' ),
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
        'label'        => __( 'Ort', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'location', ['video', 'project', 'page', 'event', 'post'], $args );
}
add_action( 'init', 'lauch_register_location_taxonomy', 0 );

function lauch_register_year_taxonomy() {
    $args = array(
        'label'        => __( 'Jahr', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'year', ['video', 'project', 'page', 'event', 'post', 'exchange'], $args );
}
add_action( 'init', 'lauch_register_year_taxonomy', 0 );

function lauch_register_type_taxonomy() {
    $args = array(
        'label'        => __( 'Videotyp', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rest_base'    => 'talktype',
    );

    register_taxonomy( 'type', 'video', $args );
}
add_action( 'init', 'lauch_register_type_taxonomy', 0 );

function lauch_register_exchange_program_taxonomy() {
  $args = array(
    'label'        => __( 'Austauschprogramm', 'textdomain' ),
    'public'       => true,
    'rewrite'      => false,
    'hierarchical' => true,
    'show_in_rest' => true,
  );

  register_taxonomy( 'exchange-program', ['exchange'], $args );
}
add_action( 'init', 'lauch_register_exchange_program_taxonomy', 0 );

function lauch_register_labs_taxonomy() {
$args = array(
'label'        => __( 'Lab Ort', 'textdomain' ),
'public'       => true,
'rewrite'      => false,
'hierarchical' => true,
'show_in_rest' => true,
);

register_taxonomy( 'lab-location', ['lab', 'person', 'post'], $args );
}
add_action( 'init', 'lauch_register_labs_taxonomy', 0 );

function lauch_register_oer_taxonomy() {
$args = array(
'label'        => __( 'Thema', 'textdomain' ),
'public'       => true,
'rewrite' => array( 'slug' => 'oer', 'with_front' => false ),
'hierarchical' => true,
'show_in_rest' => true,
);

register_taxonomy( 'oer-topics', ['oer'], $args );
}
add_action( 'init', 'lauch_register_oer_taxonomy', 0 );

function lauch_register_jobs_taxonomy() {
    $args = array(
        'label'        => __( 'Job', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'job', ['person'], $args );
}
add_action( 'init', 'lauch_register_jobs_taxonomy', 0 );


function lauch_register_audience_taxonomy() {
  $args = array(
    'label'        => __( 'Zielgruppe', 'textdomain' ),
    'public'       => true
,
    'rewrite'      => false,
    'hierarchical' => true,
    'show_in_rest' => true,
  );
  register_taxonomy( 'audience', ['faq'], $args );
}
add_action( 'init', 'lauch_register_audience_taxonomy', 0 );
