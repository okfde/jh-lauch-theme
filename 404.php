<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lauch
 */

get_header();
?>

<section class="c-page-header p-r ml-10">
  <h1 class="c-page-title"><?php esc_html_e( 'Seite nicht gefunden', 'lauch' ); ?></h1>
  <div class="c-page-excerpt">
    <p><?php esc_html_e( 'Die gewünschte Seite konnte leider nicht gefunden werden.', 'lauch' ); ?></p>
    <p class="mt-3 ml-3"><a href="<?php echo home_url(); ?>" class="button event-button"><?php echo __('Zur Startseite', 'lauch') ?></a></p>
  </div>
  <div class="c-page-header-illustration right-two">
    <?php get_template_part('images/illustrations', 'search.svg' ); ?>
  </div>
</section>

<?php
get_footer();
