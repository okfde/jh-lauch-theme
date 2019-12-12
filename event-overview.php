<?php
/**
 * Template Name: Event Übersicht
 */
get_header();
?>
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/header-alpaka', get_post_type() );

endwhile; ?>

<section class="c-events-list">
  <?php
  $args = array('post_type' => 'page',
                'post_parent' => get_the_ID(),
                'posts_per_page' => -1,
                'meta_key' => 'is_active',
                'meta_value' => 1);
  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'event' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
</section>


<section class="c-events-list">
  <h2 class="events-list-sectionheader"><?php echo __("Vergangene Events", "lauch"); ?></h2>
  <?php
  $args = array('post_type' => 'page',
                'post_parent' => get_the_ID(),
                'posts_per_page' => -1,
                'meta_key' => 'is_active',
                'meta_value' => 0);
  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'event' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
</section>
<?php
get_footer();
