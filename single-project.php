<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();

        echo "DAS IST SINGLE-PROJECT template";

        get_template_part( 'template-parts/content', get_post_type() );

        $hackdash = get_post_meta($post->ID, 'hackdashurl', true);
        ?><p><a href="<?php echo $hackdash ?>">Project bei Hackdash</a></p><?php

        $video = get_post(get_post_meta($post->ID, '_video', true));
        $video_id = get_post_meta($video->ID, 'youtubeid', true)
        ?>
<iframe width="640" height="360" src="https://www.youtube-nocookie.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <?php

        the_post_navigation();

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
