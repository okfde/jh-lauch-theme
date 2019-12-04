<?php
/**
 * Template Name: Lernen
 */
get_header();
?>

<?php
while ( have_posts() ) :






the_post();
?>

<?php
endwhile;
get_footer();
