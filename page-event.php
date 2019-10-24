<?php
/**
 * Template Name: 1 Event
 */

get_header();
?>
<?php
while ( have_posts() ) :
the_post();

  if (get_field('is_active') == true) {

    get_template_part( 'template-parts/active', 'event' );

  } else {

    get_template_part( 'template-parts/retro', 'event' );
  // hier auch eine liste an noch vergangeneren retros

  }

endwhile; ?>

<?php
get_footer();
