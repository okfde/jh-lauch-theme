<?php
/**
 * Template Name: Home
 * The start page
 *
 * @package Lauch
 */

get_header();
?>


<?php
while ( have_posts() ) :
the_post();
endwhile;
?>

<header class="c-page-home-header pb-10">
  <h1>Mit <span class="js-scramle">Code</span> die<br> Welt verbessern</h1>
  <div class="c-page-content"><?php the_content(); ?></div>
</header>

<section class="c-page-section white">
  <div class="c-page-2col">
    <div class="col-s">
      eine box
    </div>
    <div class="col-m c-page-copy">
      <h2><?php echo __('Die nächsten Termine', 'lauch'); ?></h2>
      termine
    </div>
  </div>
</section>

<section class="c-page-section c-blog-list is-grid">
  <h2 class="c-flag mini softblue points-bottom upper mb-3"><?php echo __('Aus dem Blog', 'lauch'); ?></h2>
  <?php
  $args2 = array('posts_per_page' => 3);
  $the_query2 = new WP_Query( $args2 ); ?>

  <?php if ( $the_query2->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
        <li>
          <?php get_template_part( 'template-parts/content', 'teaser'); ?>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
  <div class="ta-c">
    <a href="<?php echo get_permalink( get_option( 'page_for_posts' )) ?>" class="button event-button"><?php echo __('Alle Blogposts', 'lauch') ?></a></div>
</section>

<section class="c-page-section">
  <?php
  $loc_term = get_field('term_location');
  $year_term = get_field('term_year');
  $topic_term = get_field('term_topics');
  $tech_term = get_field('term_tech');

  $out = "[vuevideo type='project-presentation' color='white'";
  if ($loc_term) {
    $out .= "location='". $loc_term->slug ."' ";
  }
  if ($year_term) {
    $out .= "year='". $year_term->slug ."' ";
  }
  if ($tech_term) {
    $out .= "tech='". $tech_term->slug ."' ";
  }
  if ($topic_term) {
    $out .= "topics='". $topic_term->slug ."' ";
  }
  $out .= "]";

  echo do_shortcode($out); ?>
</section>

<section class="c-page-section">
  <h2><?php echo __('So war es in', 'lauch'); ?></h2>
</section>


<section class="c-page-section">
  <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
</section>

<?php
get_footer();
