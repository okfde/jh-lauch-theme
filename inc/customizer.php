<?php
/**
 * Lauch Theme Customizer
 *
 * @package Lauch
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lauch_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  // revolving claims
  $wp_customize->add_setting( 'revolving_claims', array('default' => 'Code') );
  $wp_customize->add_setting( 'support_link', array('default' => 'https://freundeskreis.jugendhackt.org') );
  $wp_customize->add_section( 'lauch_variables_section' , array(
      'title'      => __( 'Lauch Variablen', 'lauch' ),
      'priority'   => 10,
  ) );

  $wp_customize->add_control( 'revolving_claims_setting', array(
      'label'      => __( 'Revolving Claims', 'lauch' ),
      'description' => __( 'Komma-separierte Liste, ohne Leerzeichen nach dem Komma.', 'lauch' ),
      'section'    => 'lauch_variables_section',
      'settings'   => 'revolving_claims',
      'type'       => 'text'
  ) );

  $wp_customize->add_control( 'support_link_setting', array(
    'label'      => __( '"Unterstützt uns" Link', 'lauch' ),
    'description' => __( 'Vermutlich der Freundeskreis Link', 'lauch' ),
    'section'    => 'lauch_variables_section',
    'settings'   => 'support_link',
    'type'       => 'text'
  ) );


  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector'        => '.site-title a',
      'render_callback' => 'lauch_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'lauch_customize_partial_blogdescription',
    ) );
  }
}
add_action( 'customize_register', 'lauch_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lauch_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lauch_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lauch_customize_preview_js() {
  wp_enqueue_script( 'lauch-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lauch_customize_preview_js' );
