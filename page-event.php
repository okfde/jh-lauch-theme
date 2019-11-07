<?php
/**
 * Template Name: 1 Event
 */

get_header();
?>
<?php
while ( have_posts() ) :
the_post();

  if (get_field('is_active') != true) {

    echo "Dieses event ist vorbei, hier sollte vielleicht ein Banner stehen";

  }

  get_template_part( 'template-parts/active', 'event' );

endwhile; ?>

<?php
get_footer();
