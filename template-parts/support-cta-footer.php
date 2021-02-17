<div class="c-footer-support">
  <div class="support-illustration">
    <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
  </div>
  <div class="support-cta">
    <div>
      <?php echo get_theme_mod('footer_support_copy', 'foo'); ?>
      <p>
        <a href="<?php echo get_theme_mod('footer_support_link', 'https://freundeskreis.jugendhackt.org'); ?>"
           class="support-link--red">
          <?php echo get_theme_mod('footer_support_link_text', 'Jetzt unterstützen!'); ?>
          <?php echo render_svg('/images/arrow-external-red.svg'); ?></a>
      </p>
    </div>
  </div>
</div>
