<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lauch
 */

get_header();
?>

<div class="c-page-searchheader">

  <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="c-search--block">
    <label for="search-input" class="c-uppercase-title">Suche nach</label>
    <input type="text"
           id="search-input--black"
           placeholder="Wonach suchst du?"
           class="c-search-input--black"
           name="s"
           value="<?php the_search_query(); ?>">
    <input type="submit" value="Suche" class="c-search-submit--black">
  </form>

  <div class="c-page-header-illustration right-one">
    <img src="<?php echo get_template_directory_uri() ?>/images/JH-Illustration-Katze-Hund.svg" alt="" width="300">
  </div>
</div>

<div class="c-page-section white">
  <div class="c-search-counter">
    <?php
    global $wp_query;
    printf( esc_html__( '%s Suchergebnisse für "%s"', 'lauch' ), $wp_query->found_posts, '<span>' . get_search_query() . '</span>' ); ?>
  </div>
  <div class="needs-js">
    <?php
    if (have_posts()) {
      $term = sanitize_text_field($_GET['s']);
      echo do_shortcode('[ajax_load_more id="3352100625" loading_style="blue" search="'. $term .'" container_type="ul" post_type="any" button_label="Mehr Ergebnisse" container_type="ul" css_classes="c-search-results" scroll="false" transition_container="false" posts_per_page="15" destroy_after="3"]');

    } ?>

  </div>
  <noscript>
    <ul class="c-search-results">
      <?php
      while ( have_posts() ) :
      the_post();
      get_template_part( 'template-parts/content', 'search' );
      endwhile; ?>
    </ul>
    <?php
    the_posts_navigation(); ?>
  </noscript>
</div>
<?php
get_footer();
