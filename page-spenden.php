<?php
/**
 * Template Name: Spenden
 */
get_header();
?>

<?php
while (have_posts()) :
  the_post();
  ?>

    <div class="c-page-alpaca-header pb-6">
        <div class="c-page-alpaca-featured">
            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>" alt="" class="clip-alpaka">
            <div class="c-page-alpaca-friend">
              <?php
              $svg = get_random_illustration();
              echo get_svg_content($svg); ?>
            </div>
        </div>
        <div class="c-rich-text-content c-page-alpaca-title">
          <?php the_title('<h1 class="c-donate-title">', '</h1>') ?>
            <div class="c-donate-excerpt"><?php the_content(); ?></div>
        </div>

        <div class="c-page-header-illustration right-bottom">
            <div class="c-page-alpaca-friend--small">
              <?php
              $svg = get_random_illustration();
              echo get_svg_content($svg); ?></div>
        </div>
    </div>


    <section class="c-page-section white pt-4 pb-4">

        <div class="c-page-slim c-rich-text-content">
            <h2 id="spenden">Spenden via <br/>betterplace</h2>
            <div id="betterplace_donation_iframe" style="background: none;">
                <iframe height="1200" width="100%" frameborder="0"
                        src="https://www.betterplace.org/de/donate/iframe/projects/19214?background_color=ffffff&amp;color=E6414A&amp;donation_amount=50&amp;bottom_logo=false&amp;default_payment_method=&amp;default_interval=single&amp;utm_campaign=external_donation_forms&amp;utm_source=domain:%20freundeskreis.jugendhackt.org&amp;utm_medium=project_19214&amp;utm_content=freundeskreis.jugendhackt.org"
                        id="iFrameResizer0" scrolling="no"
                        style="max-height: none; width: 100%; background-color: transparent; overflow: hidden; height: 905px;"></iframe>
            </div>
          <?php the_field('donations_bank_transfer') ?>
        </div>
    </section>
    <section class="c-page-section pb-4">
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
