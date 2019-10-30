<?php
/**
 * The template for displaying all single events
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
            <?php
            $args = array(
              'post_type'  => 'page',
              'meta_query' => array(
                array(
                  'key'   => '_wp_page_template',
                  'value' => 'event-overview.php'
                )
              )
            );
            $events_maybe = get_posts($args); ?>
            <li>
              <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
            </li>
            <li>
              <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </li>
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
      <?php the_field('retro_text'); ?>
    </div>
  </div>
  </section>

  <section class="c-page-section p-r">
    <div class="c-page-2col jc-sb ai-e">
      <div class="col-l">
        <h2 class="mt-2"><?php the_field('event_support_title'); ?></h2>
        <div><?php the_field('event_support_text'); ?></div>
      </div>
    </div>
    <div class="c-page-section white pb-2 mt-2">
      <ul class="c-list-displayitems pt-2">
        <?php if( have_rows('event_supporters') ):
        while( have_rows('event_supporters') ): the_row(); ?>
          <li class="c-displayitem">
            <a href="<?php the_sub_field('link'); ?>"
               title="Zur Website von <?php the_sub_field('name'); ?> "
               class="hover-line-trigger">
              <img src="<?php the_sub_field('image'); ?>" alt="" class="">
              <h3 class="c-displayitem-title">
                <span class="hover-line"><?php the_sub_field('name'); ?></span>
              </h3>
            </a>
          </li>
        <?php endwhile;
        endif; ?>
      </ul>
    </div>
  </section>

  <div class="c-page-section pb-0 white">
    <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
  </div>

<?php
endwhile; ?>

<?php
get_footer();
