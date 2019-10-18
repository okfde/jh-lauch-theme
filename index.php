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
$blog = get_option( 'page_for_posts' ); ?>

<header class="c-page-offcenter-header">
  <h1 class="c-page-title"><?php echo get_the_title($blog);  ?></h1>
  <div class="c-page-excerpt"><?php echo get_post($blog)->post_content; ?></div>
</header>

<section class="c-blog-list is-feature">
  <div class="js-sticky-container c-compact-teaser">
    <?php
    $sticky = get_option( 'sticky_posts' );
    $args_sticky = array('post__in' => $sticky,
                         'posts_per_page' => 1);
    $the_query_sticks = new WP_Query( $args_sticky ); ?>

    <?php if ( $the_query_sticks->have_posts() ) : ?>
      <?php while ( $the_query_sticks->have_posts() ) : $the_query_sticks->the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'teaser'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>

  <?php
  $args1 = array('post__not_in' => $sticky,
                 'posts_per_page' => 3);
  $the_query = new WP_Query( $args1 ); ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
          <?php get_template_part( 'template-parts/content', 'teaser'); ?>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</section>


<section class="c-catnav" id="kategorien">
  <h2 class="c-catnav-title"><?php echo _('Alles zum Thema', 'lauch'); ?></h2>
  <nav>
    <ul>
      <?php $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
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
  <?php
  $args2 = array('post__not_in' => $sticky,
                 'posts_per_page' => 999,
                 'offset' => 3);
  $the_query2 = new WP_Query( $args2 ); ?>

  <?php if ( $the_query2->have_posts() ) : ?>
    <ul>
      <?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
        <li>
          <?php get_template_part( 'template-parts/content', 'teaser'); ?>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</section>

<?php
get_footer();
