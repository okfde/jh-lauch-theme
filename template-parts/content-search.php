<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

?>

<li <?php post_class(); ?>>
  <article class="c-compact-teaser">
    <a href="<?php the_permalink() ?>"  class="hover-line-trigger">
      <div class="teaser-image">
        <picture><?php the_post_thumbnail('events-teaser-highdpi'); ?></picture></div>
      <div class="teaser-meta">
        <?php
        $labels = get_post_type_object(get_post_type());
        if ($labels->name == 'post') {
          echo "Blog";
        } else {
          echo $labels->labels->singular_name;
        } ?>
      </div>

      <h2 class="teaser-title"><span class="hover-line"><?php the_title(); ?></span></h2>
      <?php if ($labels->name == 'post') :?>
        <div class="teaser-date">
          <time datetime="<?php echo get_the_date( 'Y-m-j'); ?>">
            <?php echo get_the_date('j. F Y'); ?></time>
        </div>
      <?php endif; ?>
    </a>
  </article>
</li>
