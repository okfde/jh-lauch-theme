<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();

while ( have_posts() ) :
the_post(); ?>

  <section>
    <div class="c-page-alpaca-header">
      <div class="c-page-alpaca-featured addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
      </div>
      <div class="c-page-alpaca-title large">
        <nav class="c-breadcrumb" aria-label="breadcrumb">
          <ol>
            <?php $blog = get_option( 'page_for_posts' ); ?>
            <li>
              <a href="<?php echo get_post_permalink($blog); ?>"><?php echo get_the_title($blog); ?></a>
            </li>
          </ol>
        </nav>
        <?php the_title('<h1 class="c-page-title">', '</h1>')?>
        <div class="c-page-excerpt"><?php the_field('retro_intro'); ?></div>
      </div>

      <?php if (get_field('illustration_right')) : ?>
        <div class="c-page-header-illustration right-bottom">
          <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="200">
        </div>
      <?php endif ?>
    </div>

    <div class="c-page-section white">
      <div class="c-page-standard wp-styles">
        <?php the_content(); ?>

        <?php echo do_shortcode("[contactperson person='". get_field('contact_person') ."']"); ?>
        <hr>
      </div>

      <div class="c-tags mt-2 c-page-slim">
        <h4 class="c-tag-title"><?php echo _("Tags", "lauch"); ?></h4>
        <ul class="c-tag-list d-f mt-1">
          <?php $terms = wp_get_post_tags($post->ID);
          foreach ($terms as $t): ?>
            <li><a href="<?php echo get_term_link($t, 'tag'); ?>"
                   class="c-tag"
                   title=""><?php echo $t->slug; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <section class=" pt-5">
    <h2 class="ta-c pb-2 c-uppercase-title"><?php echo _('Weitere Posts zum Thema', 'lauch'); ?></h2>
    <?php
    $args = array('post_type' => 'post',
                  'posts_per_page' => 3,
                  'post__not_in' => array($post->ID),
                  'orderby' => 'rand',
                  'tax-query' => array(
                    array(
                      'taxonomy' => 'category',
                      'field'    => 'slug',
                      'terms'    => array(get_the_category()[0]->slug)
                    )));
    $the_query = new WP_Query( $args ); ?>

    <?php if ( $the_query->have_posts() ) : ?>
      <ul class="c-page-3col c-blog-list is-grid">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <li>
            <?php get_template_part( 'template-parts/content', 'teaser'); ?>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    <?php endif; ?>
  </section>


<?php
endwhile; ?>

<?php
get_footer();
