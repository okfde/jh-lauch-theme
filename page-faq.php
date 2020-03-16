<?php
/**
 * Template Name: FAQ
 */
get_header();
?>

<?php
while ( have_posts() ) :
the_post();
?>

  <?php
  get_template_part( 'template-parts/header-simple', get_post_type() ); ?>

  <div class="c-page-section white">
    <div class="c-toc">
      <ul class="c-toc-nav">
        <?php
        $aud = get_terms('audience', 'orderby=id');
        foreach ($aud as $audience) : ?>
          <li><a href="#<?php echo $audience->slug; ?>"><?php echo $audience->name; ?></a></li>
        <?php
        endforeach ?>
      </ul>

      <div class="c-toc-content c-page-copy">
        <?php
        foreach ($aud as $audience) : ?>
          <section id="<?php echo $audience->slug; ?>">
            <?php
            $faqs = get_posts(array('post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                      array(
                                        'taxonomy' => 'audience',
                                        'field' => 'slug',
                                        'terms' => $audience->slug,
                                        'include_children' => false
                                      ))));

            foreach ($faqs as $faq) : ?>
              <details>
                <summary><?php echo $faq->post_title; ?></summary>
                <?php echo apply_filters( 'the_content', $faq->post_content ); ?>
              </details>
            <?php
            endforeach; ?>
          </section>
        <?php
        endforeach; ?>

        <?php get_template_part( 'template-parts/contact-person', get_post_type() ); ?>
      </div>
    </div>
  </div>

<?php
endwhile;
get_footer();
