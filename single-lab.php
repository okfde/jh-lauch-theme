<?php
/**
 * The template for displaying all single labs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();
while ( have_posts() ) :
the_post(); ?>
<?php
endwhile; ?>

<header class="c-page-alpaca-header">
  <div class="c-page-alpaca-featured as-s addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>"
         alt="" class="clip-alpaka" >
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
              'value' => 'lab-overview.php'
            )
          )
        );
        $events_maybe = get_posts($args); ?>
        <li>
          <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
        </li>
        <li>
          <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </li>
      </ol>
    </nav>
    <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
    <div class="c-page-excerpt">
      <?php the_content(); ?>
    </div>
  </div>
  <?php if (get_field('illustration_right')) : ?>
    <div class="c-page-header-illustration right-top">
      <img src="<?php the_field('illustration_right'); ?>" alt="" width="200">
    </div>
  <?php endif; ?>
</header>

<section class="c-page-section">
</section>

<script>
 document.querySelector('html').style.setProperty("--event-single-color", "#e95197");
</script>

<?php
get_footer();
