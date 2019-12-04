<?php
/**
* Template part for lab children
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
        <div class="c-page-alpaca-friend--small">
        <?php
        $svg = get_random_illustration();
        echo replace_svg_css_class_fill(get_svg_content($svg),
                                        "changecolor",
                                        "event-". get_the_ID() ."-" . $svg,
                                        get_field('event_color')); ?></div>

      </div>
      <h2 class="teaser-title"><span class="hover-line"><?php the_title() ?></span></h2>
      <div class="teaser-summary"><?php the_excerpt() ?></div>
    </a>
  </article>
</li>
