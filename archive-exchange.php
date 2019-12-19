<?php
/**
 * Template Name: Austausch Übersicht Neu
 */
get_header();
?>

<?php
$args = array(
  'post_type'  => 'page',
  'meta_query' => array(
    array(
      'key'   => '_wp_page_template',
      'value' => 'exchange-overview.php'
    )
  )
);

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    get_template_part( 'template-parts/header-alpaka', get_post_type() );

  }
}
wp_reset_postdata();
?>


<section class="c-events-list">
  <?php
  $args = array('post_type' => 'exchange',
                'posts_per_page' => -1,
                'meta_key' => 'is_current',
                'meta_value' => 1);
  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'exchange' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>
</section>


<section class="c-events-list">
  <h2 class="events-list-sectionheader"><?php echo __("Vergangene Events", "lauch"); ?></h2>
  <?php
  $args = array('post_type' => 'exchange',
                'posts_per_page' => -1,
                'meta_key' => 'is_current',
                'meta_value' => 0);
  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'exchange' ); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>

</section>

<?php
get_sidebar();
get_footer();
