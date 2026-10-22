<?php
/**
 * The template for displaying all single events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */


get_header();

while ( have_posts() ) :
the_post(); ?>

  <?php get_template_part( 'template-parts/retro', 'date'); ?>

  <div class="c-page-section pb-0 white">
    <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
  </div>

<?php
endwhile; ?>

<?php
get_footer();
