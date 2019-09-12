<div class="c-page-2col c-support col-break-small">
  <div class="c-page-2col col-m fs support-illustration">
    <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
  </div>
  <div class="col-m ml-10 fs support-cta">
    <h2><?php echo get_theme_mod('support_title', 'Unterstütze unsere Arbeit'); ?> </h2>
    <div>
      <?php echo apply_filters('the_content',get_theme_mod('support_copy', 'foo')); ?>
      <p>
        <a href="<?php echo get_theme_mod('support_link', 'https://freundeskreis.jugendhackt.org'); ?>" class="link-cta">
          <?php echo __('Jetzt unterstützen!', 'lauch'); ?></a>
      </p>
    </div>
  </div>
</div>
