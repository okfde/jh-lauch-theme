<?php
/**
 * Template Name: 1 Event
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

    if (get_field('is_active') == true) {

      get_template_part( 'template-parts/active', 'event' );

    } else {

      get_template_part( 'template-parts/retro', 'event' );

      // hier auch eine liste an noch vergangeneren retros

    }

       // get_template_part( 'template-parts/children', 'event' );

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
