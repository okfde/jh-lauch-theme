<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

get_header();
?>

<div class="wp-styles c-page-standard p-r">
  <?php
  while ( have_posts() ) :
  the_post();

  get_template_part( 'template-parts/content', 'page' );

  endwhile; // End of the loop.
  ?>
</div>
<?php
get_footer();
