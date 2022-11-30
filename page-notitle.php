<?php
/**
 * Template Name: Standard-T. ohne Titel
 */
get_header();
?>
<div class="wp-styles c-page-standard p-r"
  <?php
  while ( have_posts() ) :
  the_post();

  get_template_part( 'template-parts/content', 'page-notitle' );

  endwhile; // End of the loop.
  ?>
</div>
<?php
get_footer();
