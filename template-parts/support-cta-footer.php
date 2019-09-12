<div class="c-page-2col c-support col-break-small">
  <div class="c-page-2col col-m fs">
    <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
  </div>
  <div class="col-m fs pl-2">
    <div>
      <?php echo explode(PHP_EOL, get_theme_mod('support_copy', 'foo'))[0]; ?>
      <p>
        <a href="<?php echo get_theme_mod('support_link', 'https://freundeskreis.jugendhackt.org'); ?>" class="link-cta">
          <?php echo __('Jetzt unterstützen!', 'lauch'); ?></a>
      </p>
    </div>
  </div>
</div>
