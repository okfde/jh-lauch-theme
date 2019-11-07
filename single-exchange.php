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

  <?php

  if (get_field('is_current')) { ?>

    <?php get_template_part( 'template-parts/current', 'exchange'); ?>

    <div class="c-page-section pb-0">
      <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
    </div>

  <?php  } else { ?>

    <?php get_template_part( 'template-parts/retro', 'exchange'); ?>

    <div class="c-page-section pb-0 white">
      <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
    </div>

  <?php
  } ?>

<?php
endwhile; ?>

<script>
 document.querySelector('html').style.setProperty("--event-single-color", "#e95197");
</script>

<?php
get_footer();
