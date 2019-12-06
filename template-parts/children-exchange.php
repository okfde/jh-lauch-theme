<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Lauch
*/
?>

<li>
  <div class="events-list-item ai-c">
    <?php
    if (get_the_post_thumbnail(get_the_ID(), array(300, 200))) : ?>
      <picture class="events-list-image--overview">
        <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-s'); ?>"
                media="(max-width: 1900px)">
        <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-highdpi'); ?>"
                media="(min-resolution: 120dpi)">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-m'); ?>">
      </picture>
    <?php
    endif; ?>

    <div class="events-list-body">
      <h2 class="events-list-title"><?php the_title() ?></h2>

      <div class="events-list-actions">
        <a href="<?php the_permalink() ?>"
           title="Mehr Infos zu <?php the_title() ?>">
          <?php echo __('Mehr Infos', 'lauch'); ?></a>
        <?php
        if (get_field('is_current') == 1): ?>
          <a href="<?php the_field('anmeldungslink', $event->ID); ?>"
             title="Anmeldung für <?php the_title() ?>"><?php echo __('Anmelden', 'lauch'); ?>
        <?php endif; ?></a>
      </div>
    </div>
  </div>
</li>
