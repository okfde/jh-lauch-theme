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
            <h2 id="spenden">Spenden via betterplace</h2>
<script type="text/javascript">
  /* Configure at https://www.betterplace.org/de/manage/projects/19214-jugend-hackt-unterstuetze-junge-menschen-mit-code-die-welt-zu-verbessern/iframe_donation_form/new */
  var _bp_iframe        = _bp_iframe || {};
  _bp_iframe.project_id = 19214; /* REQUIRED */
  _bp_iframe.lang       = 'de'; /* Language of the form */
  _bp_iframe.width = 600; /* Custom iframe-tag-width, integer */
  _bp_iframe.color = 'E6414A'; /* Button and banderole color, hex without "#" */
  _bp_iframe.background_color = 'ffffff'; /* Background-color, hex without "#" */
  _bp_iframe.default_amount = 50; /* Donation-amount, integer 1-99 */
  _bp_iframe.recurring_interval = 'single'; /* Interval for recurring donations, string out of single, monthly und yearly */
  _bp_iframe.bottom_logo = true;
  (function() {
    var bp = document.createElement('script'); bp.type = 'text/javascript'; bp.async = true;
    bp.src = 'https://betterplace-assets.betterplace.org/assets/load_donation_iframe.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bp, s);
  })();
</script>
<div id="betterplace_donation_iframe" style="background: transparent url('https://www.betterplace.org/assets/new_spinner.gif') 275px 20px no-repeat;"><strong><a href="https://www.betterplace.org/de/donate/platform/projects/19214-jugend-hackt-unterstuetze-junge-menschen-mit-code-die-welt-zu-verbessern">Jetzt Spenden für „Jugend hackt - Unterstütze junge Menschen, mit Code die Welt zu verbessern!“ bei unserem Partner betterplace.org</a></strong></div>
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
