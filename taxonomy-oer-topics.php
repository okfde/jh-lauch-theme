<?php
/**
 * Template Name: OER-Kategorien
 */
get_header();
$term = get_query_var('term');
$term = get_term_by('slug', $term, 'oer-topics');
$image = get_field('topic-picture', $term->taxonomy . '_' . $term->term_id);


$args = array(
  'post_type' => 'page',
  'meta_query' => array(
    array(
      'key' => '_wp_page_template',
      'value' => 'oer-overview.php'
    )
  )
);
$overview = get_posts($args);
?>

<header class="c-page-alpaca-header">
    <div class="c-page-alpaca-featured medium-up as-s p-r">
        <img src="<?php echo wp_get_attachment_image_src( $image, 'blog-alpaka' )[0]; ?>"
             alt="" class="clip-alpaka">
    </div>
    <div class="c-page-alpaca-title">
        <nav class="c-breadcrumb" aria-label="breadcrumb">
            <ol>
                <li>
                    <a href="<?php echo get_post_permalink($overview[0]->ID); ?>">OER</a>
                </li>
            </ol>
        </nav>
        <h1 class="c-page-title pt-1"><?= get_queried_object()->name;?></h1>
        <div class="c-page-excerpt">
            <?= get_queried_object()->description; ?>
        </div>
    </div>
</header>

  <section class="c-blog-list is-grid pt-5">
    <ul>
        <?php
        $term_posts = new WP_Query($query_string."&posts_per_page=-1");

        while ( $term_posts->have_posts() ) : $term_posts->the_post(); ?>

          <?php
          get_template_part( 'template-parts/children', 'oer' ) ?>

        <?php endwhile; ?>
    </ul>
  </section>


<?php
get_footer();
