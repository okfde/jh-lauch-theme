<?php
/**
* Template part for pproject teasers
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Lauch
 */

?>
<li>
  <article class="c-compact-teaser">
    <a href="<?php the_permalink() ?>" class="hover-line-trigger">
      <div class="teaser-image p-r">
        <picture>
          <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-large'); ?>" alt="">
        </picture>
        <?php if (get_field('illustration')): ?><img src="<?php echo the_field('illustration') ?>" alt="" loading="lazy"><?php endif; ?>
      </div>
      <h2 class="teaser-title"><span class="hover-line"><?php the_title() ?></span></h2>
      <div class="teaser-summary"><?php the_excerpt() ?></div>
    </a>
  </article>
</li>
