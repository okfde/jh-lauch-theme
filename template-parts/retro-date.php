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
          <li>
            <a href="<?php echo get_post_type_archive_link('date') ?>">Kalender</a>
          </li>
        </ol>
      </nav>
      <?php the_title('<h1 class="c-page-title">', '</h1>')?>
      <time class="c-page-excerpt">Hat stattgefunden am <?php echo post_date_format_date()?></time>
    </div>
  </div>
  <div class="c-page-section white c-page-cpital-first">
    <div class="c-page-standard wp-styles mb-5">
      <?php the_content() ?>
    </div>
  </div>
</section>
