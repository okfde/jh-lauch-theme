<?php
/**
 * Template Name: Spenden neu
 */
get_header();
?>

<?php
while (have_posts()) :
  the_post();
  ?>

    <div class="c-page-alpaca-header">
      <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka" >
      <h1 class="c-donate-title"><?php the_title()?></h1>
    </div>

    <div class="c-page-full-width">
       <?php the_content(); ?>
    </div>

    <section class="c-page-section pb-4 style="background-color:#96d8ff">
        <div class="c-page-slim mb-5 c-rich-text-content">
          <?php the_field('member_header') ?>
        </div>
        <div class="c-page-3col">
          <?php
          $index = 0;
          while (have_rows('member_boxes')): the_row(); ?>
              <div class="col-s c-donate-member-box">
                  <div class="c-donate-member-box-alpaka">
                      <img class="img-fluid" src="<?= get_template_directory_uri(); ?>/images/alpaka-red.svg"
                           alt="alpaka-red">
                      <div class="c-donate-member-box-price">
                          <div class="text-center"><?php echo nl2br(get_sub_field('price')) ?></div>
                      </div>

                    <?php if (get_sub_field('decoration') == 'medium'): ?>
                        <img class="c-donate-member-box-deco-2 c-donate-member-box-deco"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-deco.svg" alt="">
                    <?php endif; ?>

                    <?php if (get_sub_field('decoration') == 'major'): ?>
                        <img class="c-donate-member-box-deco" style="width: 22%; top: -30%; right: 0%;"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-cross-1.svg" alt="">
                        <img class="c-donate-member-box-deco" style="width: 22%; top: 30%; right: -40%;"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-cross-2.svg" alt="">
                        <img class="c-donate-member-box-deco" style="width: 22%; bottom: -10%; left: -19%;"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-cross-4.svg" alt="">
                        <img class="c-donate-member-box-deco" style="width: 22%; top: 20%; left: -40%;"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-cross-5.svg" alt="">
                        <img class="c-donate-member-box-deco" style="width: 22%; top: -10%; left: -22%;"
                             src="<?= get_template_directory_uri(); ?>/images/pixel-cross-3.svg" alt="">
                    <?php endif; ?>
                  </div>
                <?php the_sub_field('member_box'); ?>
              </div>
            <?php $index++; endwhile; ?>
        </div>
    </section>

    <section class="c-rich-text-content c-page-section pb-4 pt-1 white">
        <div class="c-page-2col c-support col-break-small ai-c mt-3">
            <div class="c-page-2col col-m fg">
              <?php get_template_part('images/illustrations', 'freundeskreis.svg'); ?>
            </div>
            <div class="c-donate-contact-text">
                <?php the_field('alpaca_box'); ?>
            </div>
        </div>
    </section>
<?php
endwhile;
get_footer();
