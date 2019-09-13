<?php
/**
 * Template Name: Auf Reisen Übersicht
 */
get_header();
?>

<?php
while ( have_posts() ) :
the_post();
?>

  <?php
  get_template_part( 'template-parts/header-alpaka', get_post_type() ); ?>

  <section class="c-page-section">

  </section>

<?php
endwhile;

get_sidebar();
get_footer();
