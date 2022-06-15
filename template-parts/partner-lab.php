<section class="c-page-section ta-c">
  <div class="mw-64ex mb-1">
    <h2 class="mb-1"><?php the_field('event_support_title'); ?></h2>
    <p><?php the_field('event_support_text'); ?></p>
  </div>

  <?php if( have_rows('partner')): ?>
    <ul class="d-f jc-c fw-w mt-3">
      <?php
      while( have_rows('partner')): the_row(); ?>
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
  <?php
  endif; ?>
</section>
