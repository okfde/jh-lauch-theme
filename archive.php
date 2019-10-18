<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

get_header();
?>


<section class="">
  <header class="d-f jc-fe">
    <div class="c-bookmarklike">
      <div class="bookmark-right">
        <p class="bookmark-sub"><?php echo _('Alles zum Thema', 'lauch'); ?></p>
        <h1 class="bookmark-title"><?php single_term_title();  ?></h1>
        <?php //the_archive_description( '<div class="archive-description">', '</div>' ); ?>
      </div>
      <div class="bookmark-left">
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
           title="<?php echo __('Zurück zum Blog', 'lauch'); ?>"
           class="bookmark-back no-text"><?php echo __('Zurück zum Blog', 'lauch'); ?></a>
      </div>
    </div>
  </header>

  <div class="c-blog-list is-grid">
  <?php if ( have_posts() ) : ?>
    <ul>
    <?php
    while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'teaser');

    endwhile;

    the_posts_navigation(); ?>
  </ul>

  <?php  else :

  get_template_part( 'template-parts/content', 'none' );

  endif; ?>
  </div>
</section>

<?php
get_footer();
