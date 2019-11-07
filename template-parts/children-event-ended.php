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
      <?php if (get_field('is_active', $child->ID) != 1): ?>
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
          <div class="events-list-actions">
            <?php
            $the_query = new WP_Query( array(
              'post_type' => 'event',
              'tax_query' => array(
                array (
                  'taxonomy' => 'location',
                  'field' => 'slug',
                  'terms' => get_the_terms($child->ID, 'location')[0]->slug,
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
            wp_reset_postdata();  ?>
          </div>
        </div>
        <div class="events-list-hover">
          <?php
          $svg = get_random_illustration();
          echo replace_svg_css_class_fill(get_svg_content($svg),
                                          "changecolor",
                                          "event-". $child->ID ."-" . $svg,
                                          get_field('event_color', $child->ID)); ?>

        </div>
        </div>
      </li>
    <?php
    endif;
    endforeach; ?>
  </ul>
<?php
endif;
