<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();

while ( have_posts() ) :
the_post(); ?>

  <section>
    <div class="c-page-alpaca-header">
      <div class="c-page-alpaca-featured addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
      </div>
      <div class="c-page-alpaca-title">
        <nav class="c-breadcrumb" aria-label="breadcrumb">
          <ol>
            <?php $ancestors = get_post_ancestors( $post );
            foreach ($ancestors as $a): ?>
              <li>
                <a href="<?php echo get_post_permalink($a); ?>"><?php echo get_the_title($a); ?></a>
              </li>
            <?php endforeach; ?>
          </ol>
        </nav>
        <?php the_title('<h1 class="c-page-title">', '</h1>')?>
        <div class="c-page-excerpt"><?php the_field('retro_intro'); ?></div>
      </div>

      <?php if (get_field('illustration_right')) : ?>
        <div class="c-page-header-illustration right-bottom">
          <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
        </div>
      <?php endif ?>
    </div>

  <div class="c-page-section white">
    <div class="c-page-standard wp-styles">
      <?php the_content(); ?>
    </div>
  </div>

  autor

  tags
</section>

3 posts


<?php
endwhile; ?>

<?php
get_footer();
