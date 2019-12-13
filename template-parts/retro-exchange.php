<?php
/**
 * Template part for event and exchange reviews
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */
?>


<section>
  <div class="c-page-alpaca-header">
    <div class="c-page-alpaca-featured addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>" alt="" class="clip-alpaka">
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
                'value' => 'exchange-overview.php'
              )
            )
          );
          $events_maybe = get_posts($args); ?>
          <li>
            <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
          </li>
        </ol>
      </nav>
      <?php the_title('<h1 class="c-page-title">', '</h1>')?>
      <div class="c-page-excerpt"><p><?php the_field('retro_intro'); ?></p></div>
    </div>

    <?php if (get_field('illustration_right')) : ?>
      <div class="c-page-header-illustration right-bottom">
        <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
      </div>
    <?php endif ?>
  </div>

  <div class="c-page-section white c-page-cpital-first">
    <div class="c-page-standard wp-styles">
      <?php echo apply_filters( 'the_content', get_field('retro_text')); ?>
    </div>
  </div>
</section>
