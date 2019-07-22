<?php
/**
 * Template Name: Event Rückblick
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        //$loc_term = wp_get_post_terms($post->ID, 'location');
//      $year_term = wp_get_post_terms($post->ID, 'year');
//echo do_shortcode("[vuevideo type='project-presentation' location='". $loc_term[0]->slug ."' year='". $year_term[0]->slug ."']");

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
