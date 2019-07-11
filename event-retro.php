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

print_r();

$taxonomies = get_post_taxonomies($post->ID);

if ($taxonomies) {
foreach($taxonomies as $taxonomy) {
    $term = wp_get_post_terms($post->ID, $taxonomy);

    echo $term[0]->taxonomy . ": ". $term[0]->slug . '<br>';
}
}

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
