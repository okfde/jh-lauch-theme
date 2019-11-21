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
  <div>
    <?php if ( have_posts() ) : ?>
      <p class="c-search-counter">
	<?php
	/* translators: %s: search query. */
	printf( esc_html__( 'Suchergebnisse für: %s', 'lauch' ), '<span>' . get_search_query() . '</span>' );
	?>
      </p>
      <ul class="c-search-results">
        <?php
        /* Start the Loop */
        while ( have_posts() ) :
        the_post();

        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'search' );

        endwhile; ?>
      </ul>
      <?php
      the_posts_navigation();

      else :

      echo "keine ergebnisse";
      //get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>

  </div>
</div>
