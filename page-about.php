<?php
/**
 * Template Name: About
 */
get_header();
?>

<?php
while ( have_posts() ) :
the_post();
?>

  <?php
  get_template_part( 'template-parts/header-alpaka', get_post_type() ); ?>

  <section class="c-page-section white pt-5 pb-2">
    <div class="c-page-2col">
      <div class="col-s">
        <h2><?php the_field('section1_title'); ?></h2>
      </div>
      <div class="col-m c-page-copy">
        <?php the_field('section1_text'); ?>
      </div>
    </div>
    <div class="c-page-2col pt-5">
      <div class="col-s">
        <h2><?php the_field('publication_title'); ?></h2>
      </div>
      <div class="col-l">
        <?php if( have_rows('publications') ): ?>
        <ul class="c-list-flagitems">
          <?php while ( have_rows('publications') ): the_row(); ?>
          <li class="c-flagitem c-flag points-bottom">
            <h3 class="c-flagitem-title"><?php the_sub_field('pub_title'); ?></h3>
            <p>
              <?php if (get_sub_field('pub_pdf')) : ?>
                <a href="<?php the_sub_field('pub_pdf'); ?>"><?php echo __('download>Download [PDF]', 'lauch'); ?></a>
              <?php endif ?>
              <?php if (get_sub_field('pub_link')) : ?>
                <a href="<?php the_sub_field('pub_link'); ?>" target="_blank"><?php echo __('Onlineversion', 'lauch'); ?></a>
              <?php endif ?>
            </p>
          </li>
          <?php endwhile ?>
        </ul>
        <?php endif ?>
      </div>
    </div>
  </section>

  <section class="">
    <div class="c-page-video needs-js">
      <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('about_video_id') ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <noscript>Kein JavaScript? <a href="https://www.youtube.com/watch?v=<?php the_field('about_video_id') ?>">Sie dir das Video hier an!</a></noscript>
    </div>

    <div class="c-page-video-bottom">
      <h2 class="c-page-video-banner c-flag orange points-top"><img src="" alt="Unterwegs mit Jugend hackt"></h2>
      <div class="c-page-video-meta">
        <p><?php the_field('about_video_meta') ?></p>
      </div>
    </div>
  </section>

  <section class="c-page-section pt-10 pb-2">
    <div class="c-page-2col">
      <h2 class="col-s"><?php the_field('price_title'); ?></h2>
    </div>
    <div class="white c-page-section pb-2">
      <?php if( have_rows('prices') ): ?>
        <ul class="c-list-displayitems">
          <?php while ( have_rows('prices') ): the_row(); ?>
            <li class="c-displayitem">
              <img src="<?php print_r(get_sub_field('price_image')['sizes']['medium']); ?>" alt="Bild von <?php the_sub_field('price_title'); ?>">

              <p class="c-displayitem-title"><?php the_sub_field('price_title'); ?></p>
            </li>
          <?php endwhile ?>
        </ul>
      <?php endif ?>
    </div>
  </section>

  <section class="c-page-section pt-1">
    <h2 class="c-flag mini softblue points-bottom upper"><?php the_field('blog_title'); ?></h2>
    <div class="c-page-2col col-break-small jc-sb pt-1">
      <?php $post1 = get_field('post_1'); ?>
      <article class="col-l c-page-blog fg fs">
        <div class="p-r addon addon--alpaka addon--bottom addon--left">
          <?php echo get_the_post_thumbnail($post1->ID, 'blog-large'); ?>
        </div>
        <div class="c-page-2col ai-b">
          <h3 class="col-s"><?php echo $post1->post_title; ?></h3>
          <div class="col-m fs">
            <?php echo apply_filters('the_excerpt', $post1->post_content); ?>
            <p><a href="<?php echo get_post_permalink($post1->ID); ?>" title="Mehr lesen über <?php echo $post1->post_title; ?>">Mehr lesen</a></p>
          </div>
        </div>
      </article>

      <?php $post2 = get_field('post_2'); ?>
      <article class="col-s c-page-blog fg">
        <div class="p-r addon addon--octopus addon--top addon--right">
          <?php echo get_the_post_thumbnail($post2->ID, 'blog-small'); ?>
        </div>
        <div class="">
          <h3><?php echo $post2->post_title; ?></h3>
          <div>
            <?php echo apply_filters('the_excerpt', $post2->post_content); ?>
            <p><a href="<?php echo get_post_permalink($post2->ID); ?>" title="Mehr lesen über <?php echo $post2->post_title; ?>">Mehr lesen</a></p>
          </div>
      </article>
  </section>

  <section class="c-page-section c-page-2col c-support col-break-small">
    <div class="c-page-2col col-m fs">
      <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
    </div>
    <div class="col-m ml-10 fs">
      <h2><?php the_field('support_title'); ?></h2>
      <div>
        <?php echo apply_filters('the_content', get_field('support_text')); ?>
        <p><a href="<?php echo get_theme_mod('support_link', 'https://freundeskreis.jugendhackt.org'); ?> " class="link-cta"><?php echo __('Jetzt unterstützen!', 'lauch'); ?></a></p>
      </div>
    </div>
  </section>

  <section class="c-page-section white">
    <div class="c-page-2col">
      <h2 class="col-s"><?php the_field('partner_title'); ?></h2>
    </div>
    <div class="c-toc ai-s">
      <ul class="c-toc-nav fs">
        <li><a href="#<?php echo sanitize_title(get_field('partner_category')); ?>"><?php the_field('partner_category'); ?></a></li>
        <li><a href="#<?php echo sanitize_title(get_field('supporter_category')); ?>"><?php the_field('supporter_category'); ?></a></li>
      </ul>

      <div class="c-toc-content fg">
        <section id="<?php echo sanitize_title(get_field('partner_category')); ?>">
          <?php if( have_rows('partners') ): ?>
            <ul class="c-grid-displayitems">
              <?php while ( have_rows('partners') ): the_row(); ?>
                <li class="c-displayitem">
                  <img src="<?php echo wp_get_attachment_image_src(get_sub_field('part_logo'), 'medium')[0]; ?>" alt="Logo" >
                  <div class="c-displayitem-text">
                    <?php the_sub_field('part_text'); ?>
                  </div>
                </li>
              <?php endwhile ?>
            </ul>
          <?php endif ?>
        </section>
        <section id="<?php echo sanitize_title(get_field('supporter_category')); ?>">
          <?php if( have_rows('supporters') ): ?>
            <ul class="c-grid-displayitems">
              <?php while ( have_rows('supporters') ): the_row(); ?>
                <li class="c-displayitem">
                  <img src="<?php echo wp_get_attachment_image_src(get_sub_field('sup_logo'), 'medium')[0]; ?>" alt="Logo" >

                  <div class="c-displayitem-text">
                    <?php the_sub_field('sup_text'); ?>
                  </div>
                </li>
              <?php endwhile ?>
            </ul>
          <?php endif ?>
        </section>
  </section>
<?php
endwhile;

get_sidebar();
get_footer();
