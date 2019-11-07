<?php
/**
 * Template Name: Event Übersicht
 */
get_header();
?>
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/header-alpaka', get_post_type() );

endwhile; ?>

  <section class="c-events-list">

    <?php
    get_template_part( 'template-parts/children', 'event' ); ?>

  </section>

  <section class="c-events-list">
    <h2 class="events-list-sectionheader"><?php echo __("Vergangene Events", "lauch"); ?></h2>
    <?php
    get_template_part( 'template-parts/children', 'event-ended' ); ?>
  </section>
<?php
get_footer();
