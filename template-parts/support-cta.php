<div class="c-page-section c-page-2col c-support col-break-small ai-c">
  <div class="c-page-2col col-m fg">
    <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
  </div>
  <div class="col-m ml-10 fs">
    <h2><?php echo get_theme_mod('support_title', 'Unterstütze unsere Arbeit'); ?> </h2>
    <div>
      <?php echo apply_filters('the_content',get_theme_mod('support_copy', 'foo')); ?>
      <p>
        <a href="<?php echo get_theme_mod('support_link', 'https://freundeskreis.jugendhackt.org'); ?>"
           class="support-link--black">
          <?php echo __('Jetzt unterstützen!', 'lauch'); ?>
          <?php echo render_svg('/images/arrow-external.svg'); ?></a>
      </p>
    </div>
  </div>
</div>
