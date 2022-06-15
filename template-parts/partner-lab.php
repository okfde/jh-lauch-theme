<?php  if( have_rows('partner')): ?>
  <section class="c-page-section p-r pb-0">
    <div class="c-page-2col jc-sb ai-e">
      <div class="col-l">
        <h2 class="mt-2"><?php the_field('event_support_title'); ?></h2>
        <div><?php the_field('event_support_text'); ?></div>
      </div>
      <div class="col-xs c-event-illu--large">
        <img src="<?php the_field('event_support_illustration'); ?>" alt="">
      </div>
    </div>


    <div class="c-page-section pb-2 mt-2">
      <div class="white c-page-section pb-2">
        <?php if( have_rows('partner')): ?>
          <ul class="c-list-displayitems js-slider" data-slider-preset="price">
            <?php while ( have_rows('partner')): the_row(); ?>
              <?php
              $image = wp_get_attachment_image_src(get_sub_field('partner_img'), 'partner-teaser'); ?>
              <li class="c-displayitem mr-2">
                <a href="<?php the_sub_field('partner_link'); ?>"
                   title="Zur Website von <?php the_sub_field('partner_name'); ?> "
                   class="hover-line-trigger">
                  <img src="<?php echo $image[0] ?>" alt="" class="white">
                  <p class="c-displayitem-title">
                    <span class="hover-line"><?php the_sub_field('partner_name'); ?></span>
                  </p>
                </a>
              </li>
            <?php endwhile ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </section>
<?php endif; ?>
