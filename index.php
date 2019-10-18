<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

get_header();
?>

<?php

$blog = get_option( 'page_for_posts' );

?>


<header class="c-page-offcenter-header">
  <h1 class="c-page-title"><?php echo get_the_title($blog);  ?></h1>
  <div class="c-page-excerpt"><?php echo get_post($blog)->post_content; ?></div>
</header>

<?php
$sticky = get_option( 'sticky_posts' );
$sticky = $sticky[0];

$args = array( 'exclude' => array($sticky));
$latest_posts = get_posts($args );

$firsts = array_slice($latest_posts, 0, 3);
$rests = array_slice($latest_posts, 3);

function render_post($id, $optional_class = "") { ?>
  <article class="c-compact-teaser <?php echo $optional_class; ?>">
    <a href="<?php echo get_permalink($id); ?>" title="Lies den ganzen Artikel zu <?php echo get_the_title($id); ?>">
      <div class="teaser-image">
        <picture>
          <source srcset="<?php echo get_the_post_thumbnail_url($id, 'blog-large-highdpi'); ?>"
                  media="(min-width: 1240px)"">
          <?php echo get_the_post_thumbnail($id, 'blog-large'); ?>
        </picture>
      </div>
      <h2 class="teaser-title"><?php echo get_the_title($id); ?></h2>
      <div>
        <div class="teaser-summary"><?php echo get_the_excerpt($id); ?></div>
        <div class="teaser-date">
          <time datetime="<?php echo get_the_date( 'Y-m-j', $id); ?>">
            <?php echo get_the_date( 'j. F Y', $id); ?></time>
        </div>
      </div>
    </a>
  </article>
<?php } ?>

<section class="c-blog-list is-feature">
  <div class="js-sticky-container c-compact-teaser">
    <?php render_post($post->ID, "js-sticky"); ?>
  </div>

  <ul>
  <?php
  foreach ($firsts as $post): ?>
    <li><?php render_post($post->ID); ?></li>
  <?php endforeach; ?>
  <ul>
</section>


<section class="c-catnav">
  <h2 class="c-catnav-title"><?php echo _('Alles zum Thema', 'lauch'); ?></h2>
  <nav>
    <ul>
      <?php $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false,
      ) );

      foreach ($terms as $term): ?>
        <li class="c-catnav-item">
          <a href="<?php echo get_term_link($term->slug, $term->taxonomy ); ?>"
             title="Alle Posts zu <?php echo $term->name ?>">
            <h3><span><?php echo $term->name; ?></span></h3>
            <p><?php echo $term->description; ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</section>

<section class="c-blog-list is-grid">
  <ul>
    <?php
    foreach ($rests as $post): ?>
      <li><?php render_post($post->ID); ?></li>
    <?php endforeach; ?>
    <ul>
</section>

<?php
get_footer();
