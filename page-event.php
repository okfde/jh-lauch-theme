<?php
/**
 * Template Name: 1 Event
 */

if (get_field('is_active', $post->ID) != true) {
  $the_query = new WP_Query( array(
    'post_type' => 'event',
    'tax_query' => array(
      array (
        'taxonomy' => 'location',
        'field' => 'slug',
        'terms' => get_the_terms($post->ID, 'location')[0]->slug,
      )),
  ));

while ( $the_query->have_posts() ) {
  $the_query->the_post();

  header("Location: ". get_the_permalink());
  die();
}

}

get_header();
?>
<?php
while ( have_posts() ) :
the_post();

  get_template_part( 'template-parts/active', 'event' );

endwhile; ?>

<?php
get_footer();
