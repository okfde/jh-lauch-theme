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
                'value' => 'event-overview.php'
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

      <?php
      $loc_term = wp_get_post_terms($post->ID, 'location');
      $city = get_posts(array(
      'post_type' => 'page',
      'posts_per_page' => 1,
      'tax_query' => array(
        lauch_fill_tax_query('location', $loc_term[0]->slug),
      )
      ));

      if ($city && get_field('is_active', $city[0]->ID) == true) :
         $event = get_field('next_event', $city[0]->ID)[0];
      ?>
        <a href="<?php echo get_field('anmeldungslink', $event->ID) ?>" class="button event-button">Anmelden für <?php echo date('Y') ?></a>
      <?php endif; ?>
    </div>

    <?php if (get_field('illustration_right')) : ?>
      <div class="c-page-header-illustration right-bottom">
        <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
      </div>
    <?php endif ?>
  </div>

  <div class="c-page-section white c-page-cpital-first">
    <div class="c-page-standard wp-styles mb-5">
      <?php echo apply_filters( 'the_content', get_field('retro_text')); ?>
    </div>

    <?php
      //$loc_term = wp_get_post_terms($post->ID, 'location');
      $year_term = wp_get_post_terms($post->ID, 'year');

    if ($loc_term[0]->slug && $year_term[0]->slug) {
      $has_posts = get_posts(array(
        'post_type' => 'video',
        'posts_per_page' => -1,
        'tax_query' => array(
          lauch_fill_tax_query('location', $loc_term[0]->slug),
          lauch_fill_tax_query('year', $year_term[0]->slug),
          lauch_fill_tax_query('type', 'project-presentation'),
        )
      ));
      if ($has_posts) {
        echo do_shortcode("[vuevideo type='project-presentation' location='". $loc_term[0]->slug ."' year='". $year_term[0]->slug ."']");
      }
    } ?>
  </div>
</section>

<?php if( have_rows('partner', $post->ID) ): ?>
<section class="c-page-section p-r">
  <div class="c-page-2col jc-sb ai-e">
    <div class="col-l">
      <h2 class="mt-2"><?php the_field('event_support_title', $post->ID); ?></h2>
      <div><?php the_field('event_support_text', $post->ID); ?></div>
    </div>
    <div class="col-xs c-event-illu--large">
      <img src="<?php the_field('event_support_illustration', $post->ID); ?>" alt="">
    </div>
  </div>
  <div class="c-page-section pb-2 mt-2 white ">
    <ul class="c-list-displayitems pt-2 js-slider" data-slider-preset="auto">
      <?php
      while( have_rows('partner', $post->ID) ): the_row(); ?>
        <li class="c-displayitem">
          <a href="<?php the_sub_field('partner_link'); ?>"
             title="Zur Website von <?php the_sub_field('partner_name'); ?> "
             class="hover-line-trigger">
            <?php $image = wp_get_attachment_image_src(get_sub_field('partner_img'), 'partner-teaser');  ?>
            <img src="<?php echo $image[0] ?>" alt="" class="white">
            <p class="c-displayitem-title">
              <span class="hover-line"><?php the_sub_field('partner_name'); ?></span>
            </p>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</section>
<?php endif; ?>
