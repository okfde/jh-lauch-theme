<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();
while ( have_posts() ) :
the_post(); ?>

  <section class="">
    <header class="c-page-offcenter-header">
      <h1 class="c-page-title"><?php the_title(); ?></h1>
      <div class="c-page-excerpt"><?php the_content(); ?></div>
    </header>

    <?php get_template_part('template-parts/video', 'project'); ?>
  </section>


  <section class="c-catnav c-catnav--slider p-r">
    <h2 class="c-catnav-title--rot"><?php echo __("Weiter geht's", 'lauch') ?></h2>
    <nav>
      <div class="tns-controls">
        <button class="tns-prev" title="Nach links"><?php render_svg('/images/icons/arrow-left.svg'); ?></button>
        <button class="tns-next" title="Nach rechts"><?php render_svg('/images/icons/arrow-right.svg') ?></button>
      </div>
      <?php
      $args = array('post_type' => 'video',
                    'posts_per_page' => 10,
                    'post__not_in' => array(get_the_ID()),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'tech',
                        'field'    => 'slug',
                        'terms'    => wp_get_post_terms(get_the_ID(), 'tech')[0]->slug,
                      ),
                      array(
                        'taxonomy' => 'type',
                        'field'    => 'slug',
                        'terms'    => 'project-presentation',
                      )
                    ));
      $the_query = new WP_Query( $args ); ?>

      <?php if ( $the_query->have_posts() ) : ?>
        <ul class="js-slider">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <li class="c-catnav-slide">
            <a href="<?php the_permalink() ?>" class="c-page-2col ai-c">
              <?php if (get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-highdpi')):  ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-highdpi'); ?>" alt="">
              <?php else : ?>
                <img src="https://img.youtube.com/vi/<?php echo the_field('youtubeid') ?>/default.jpg" alt="">
              <?php endif; ?>
              <div class="">
                <?php if(wp_get_post_terms(get_the_ID(), 'location') &&
                         wp_get_post_terms(get_the_ID(), 'year')) : ?>
                  <p class="c-catnav-meta">
                    <?php echo wp_get_post_terms(get_the_ID(), 'location')[0]->name; ?>
                    <?php echo wp_get_post_terms(get_the_ID(), 'year')[0]->name; ?>
                  </p>
                <?php endif; ?>
                <h3><span><?php the_title(); ?></span></h3>
              </div>
            </a>
          </li>

        <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </nav>
  </section>

<?php
endwhile; ?>

<?php
get_footer();
