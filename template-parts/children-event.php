<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

$children = get_pages( array(
  'title_li'    => '',
  'child_of'    => $post->ID,
  'show_date'   => 'modified',
  'parent'      => $post->ID,
) );

if ($children) : ?>
  <ul>
    <?php
    foreach($children as $child): the_row(); ?>
      <li class="">
        <div class="events-list-item">
          <?php
          if (get_the_post_thumbnail($child->ID, array(300, 200))) : ?>
            <picture class="events-list-image">
              <source srcset="<?php echo get_the_post_thumbnail_url($child->ID, 'events-teaser-s'); ?>"
                      media="(max-width: 1900px)">
              <img src="<?php echo get_the_post_thumbnail_url($child->ID, 'events-teaser-m'); ?>">
            </picture>
          <?php
          endif; ?>
        <div class="events-list-body">
          <h2 class="events-list-title"><?php echo $child->post_title ?></h2>

          <?php
          if (get_field('is_active', $child->ID) == 1):
          $event = get_field('next_event', $child->ID)[0];

          if ($event) : ?>
            <time class="events-list-date" datetime=""><?php the_field('datum', $event->ID); ?></time>
          <?php
          endif;
          endif; ?>

          <div class="events-list-actions">
            <a href="<?php echo $child->post_name; ?>"
               title="Mehr Infos zu Jugend hackt in <?php echo $child->post_title ?>">Mehr Infos</a>
            <?php if (get_field('is_active', $child->ID) == 1):  ?>
              <a href="<?php the_field('anmeldungslink', $event->ID); ?>"
                 title="Anmeldung für Jugend hackt in <?php echo $child->post_title ?>">Anmelden</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="events-list-hover">
          <?php the_field('event_color', $child->ID); ?>

          <?php
          $illustrations = array('wrestler', 'octopus');
          $rand_key = array_rand($illustrations, 1);

          $filename = get_template_directory() . "/images/illustrations/change-". $illustrations[$rand_key] .".svg";
          $handle = fopen($filename, "r");
          $contents = fread($handle, filesize($filename));
          fclose($handle);
          preg_match('/changecolor{fill:#([[0-9a-fA-F]+);}/i', $contents, $prev_color);
          $contents = str_replace("changecolor", $illustrations[$rand_key], $contents);
          $contents = str_replace('#'.$prev_color[1], get_field('event_color', $child->ID), $contents);
          echo $contents;

          ?>

          <?php //get_template_part('images/illustrations/change', 'wrestler.svg' ); ?>
        </div>
        </div>
      </li>
    <?php
    endforeach; ?>
  </ul>
<?php
endif;
