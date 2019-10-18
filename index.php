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

#$sticky = array_slice($latest_posts, 0, 1);
$firsts = array_slice($latest_posts, 0, 3);
$rests = array_slice($latest_posts, 3);

?>

<section class="c-blog-list is-feature">
  <div class="js-sticky-container c-compact-teaser">
    <article class="js-sticky">
      <a href="<?php echo get_permalink($sticky); ?>">
        <div class="teaser-image"><img src="https://placekitten.com/320/200" alt=""></div>
        <h2 class="teaser-title"><?php echo get_the_title($sticky); ?></h2>
        <div class="teaser-summary"><?php echo get_the_excerpt($sticky); ?></div>
        <div class="teaser-date">
          <time datetime="<?php echo get_the_date( 'Y-m-j',$sticky); ?>"><?php echo get_the_date( 'j. F Y', $sticky); ?></time></div>
      </a>
    </article>
  </div>

  <ul>
  <?php
  foreach ($firsts as $post): ?>
    <li>
      <article class="c-compact-teaser">
        <a href="<?php echo get_permalink($post->ID); ?>">
          <div class="teaser-image"><img src="https://placekitten.com/320/200" alt=""></div>
          <h2 class="teaser-title"><?php echo get_the_title($post->ID); ?></h2>
          <div class="teaser-summary"><?php echo get_the_excerpt($post->ID); ?></div>
          <div class="teaser-date">
            <time datetime="<?php echo get_the_date( 'Y-m-j',$post->ID); ?>"><?php echo get_the_date( 'j. F Y',$post->ID); ?></time></div>
        </a>
      </article>
    </li>
  <?php endforeach; ?>
  <ul>
</section>


<section class="c-catnav">
  <h2 class="c-catnav-title">Alles zum Thema</h2>
  <nav>
    <ul>
      <li class="c-catnav-item">
        <a href="#">
          <h3><span>Unterwegs mit</span></h3>
          <p>Lorem ipsum dolor sit amet</p>
        </a>
      </li>
      <li class="c-catnav-item">
        <a href="#">
          <h3>Mit Code die Um:welt verbessern</h3>
          <p>Lorem ipsum dolor sit amet</p>
        </a>
      </li>
      <li class="c-catnav-item">
        <a href="#">
          <h3>Vernetzte Welten</h3>
          <p>Lorem ipsum dolor sit amet</p>
        </a>
      </li>
      <li class="c-catnav-item">
        <a href="#">
          <h3>Open data</h3>
          <p>Lorem ipsum dolor sit amet</p>
        </a>
      </li>
    </ul>
  </nav>
</section>



<section class="c-blog-list is-grid">
  <ul>
    <?php
    foreach ($rests as $post): ?>
      <li>
        <article class="c-compact-teaser">
          <a href="<?php echo get_permalink($post->ID); ?>">
            <div class="teaser-image"><img src="https://placekitten.com/320/200" alt=""></div>
            <h2 class="teaser-title"><?php echo get_the_title($post->ID); ?></h2>
            <div class="teaser-summary"><?php echo get_the_excerpt($post->ID); ?></div>
            <div class="teaser-date">
              <time datetime="<?php echo get_the_date( 'Y-m-j',$post->ID); ?>"><?php echo get_the_date( 'j. F Y',$post->ID); ?></time></div>
          </a>
        </article>
      </li>
    <?php endforeach; ?>
    <ul>
</section>


<?php the_posts_pagination(); ?>


<?php
get_footer();
