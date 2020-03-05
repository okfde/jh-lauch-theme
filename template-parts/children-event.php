<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Lauch
*/

$event_color = get_field('event_color', get_the_ID());
?>
<li>
  <div class="events-list-item ai-c no-hover">
    <?php
    if (get_the_post_thumbnail(get_the_ID(), array(300, 200))) : ?>
      <picture class="events-list-image--overview">
        <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-s'); ?>"
                media="(max-width: 1900px)">
        <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-highdpi'); ?>"
                media="(min-resolution: 192dpi)">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-s'); ?>">
      </picture>
    <?php
    endif; ?>
    <div class="events-list-body">
      <h2 class="events-list-title">
        <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

      <?php
      $event = get_field('next_event');
      if ($event  && get_field('is_active', get_the_ID())) : ?>
        <time class="events-list-date" datetime="">
          <a href="<?php the_permalink() ?>"
             title="Mehr Infos zu <?php the_title() ?>">
            <?php the_field('datum', $event->ID); ?></a></time>
      <?php
      endif; ?>

      <?php if (get_field('is_active') == 1): ?>
        <div class="events-list-actions events-list-actions--overview active">
          <a href="<?php the_permalink(); ?>"
             title="Mehr Infos zu Jugend hackt in <?php the_title() ?>">
            <?php echo __('Mehr Infos', 'lauch'); ?></a>
          <?php if(get_field('anmeldungslink', $event->ID)
                   && get_field('anmeldungslink', $event->ID) != ""): ?>
            <a href="<?php the_field('anmeldungslink', $event->ID); ?>"
               title="Anmeldung für Jugend hackt in <?php the_title() ?>">
              <?php echo __('Anmelden', 'lauch'); ?></a>
          <?php endif ?>
        </div>
      <?php else: ?>
        <div class="events-list-actions events-list-actions--overview">
          <?php
          $the_query = new WP_Query( array(
            'post_type' => 'event',
            'tax_query' => array(
              array (
                'taxonomy' => 'location',
                'field' => 'slug',
                'terms' => get_the_terms(get_the_ID(), 'location')[0]->slug,
              )),
          ));
          if ( $the_query->have_posts() ):
                       while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
              <?php echo get_the_terms(get_the_ID(),  'year')[0]->slug; ?>
            </a>
          <?php
          endwhile;
          endif;
          wp_reset_postdata(); // resets _all_ post data. We're 2 levels deep at this point ?>
        </div>
      <?php endif; ?>

    </div>
    <div class="events-list-hover">
      <?php
      $svg = get_random_illustration();
      echo replace_svg_css_class_fill(get_svg_content($svg),
                                      "changecolor",
                                      "event-". get_the_ID() ."-" . $svg,
                                      $event_color); ?>

    </div>
  </div>
</li>
