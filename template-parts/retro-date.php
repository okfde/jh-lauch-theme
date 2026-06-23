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
    <div class="c-page-alpaca-featured addon ">
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>" alt="" class="clip-alpaka">
    </div>
    <div class="c-page-alpaca-title">
      <nav class="c-breadcrumb" aria-label="breadcrumb">
          <ol>
              <?php
                  $args = array(
                      'post_type' => 'page',
                      'meta_query' => array(
                          array(
                              'key' => '_wp_page_template',
                              'value' => 'lab-overview.php'
                          )
                      )
                  );
                  $events_maybe = get_posts($args); ?>
              <li>
                  <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
              </li>
              <?php
                  $parent = get_field('parent');
                  $parent_post = get_post($parent->ID); ?>
              <li>
                  <a href="<?php echo get_post_permalink($parent_post->ID); ?>"><?php echo get_the_title($parent_post->ID); ?></a>
              </li>
        </ol>
      </nav>
      <?php the_title('<h1 class="c-page-title mb-1">', '</h1>')?>
      <p class="mb-1">
          <time class="c-flag c-flag--eventsingle mini points-bottom mb-1">
          <?php echo wp_date('D d.m.Y | G:i -', get_field('begin', $post->ID)); ?>

          <?php echo wp_date('G:i', get_field('end', $post->ID)); ?>
          </time>
      </p>
    </div>
  </div>
  <div class="c-page-section white c-page-cpital-first">
    <div class="c-page-standard wp-styles mb-5">
      <?php the_content() ?>
    </div>
  </div>
</section>

<script>
    document.querySelector('html').style.setProperty("--event-single-color", "<?php echo the_field('event_color', $parent->ID); ?>");
</script>
