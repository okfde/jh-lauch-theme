<?php
/**
 * Template Name: Event Übersicht
 */
get_header();
?>
<?php
while ( have_posts() ) :
the_post();
?>
  <?php
  get_template_part( 'template-parts/header-alpaka', get_post_type() ); ?>

  <section class="c-events-list">

    <?php
    get_template_part( 'template-parts/children', 'event' ); ?>

  </section>

  <section class="c-events-list">
    <h2 class="events-list-sectionheader">Vergangene Events</h2>
  </section>
<?php
  endwhile;

get_sidebar();
get_footer();
