<?php
/**
 * Template Name: Volle Breite
 */
get_header();
?>
<?php
while ( have_posts() ) :
the_post();
endwhile; ?>

<div class="c-page-header">
    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
    <h1 class="c-page-title c-page-title-indent"><?php the_title()?></h1>
</div>

<div class="c-page-full-width">
  <?php the_content(); ?>
</div>


<?php
get_footer();
