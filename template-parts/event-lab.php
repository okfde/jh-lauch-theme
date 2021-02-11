<div class="event-teaser-list-item">
  <div class="accordion" data-accordion>
    <div class="accordion__title">
      <img src="<?php echo get_the_post_thumbnail_url(null, 'lab-event-teaser') ?>" alt="" class="event-teaser-list-img">
      <div class="event-teaser-list-meta">
        <p class="c-flag c-flag--eventsingle mini points-bottom mb-1">
          <time><?= post_date_format_date(); ?></time></p>
        <h3 class="mb-0" data-title><?php the_title() ?></h3>
        <?php render_svg('/images/icons/arrow-right.svg'); ?>
        <div class="accordion__content" data-content>
          <?php the_content() ?>
        </div>
      </div>
    </div>
  </div>
</div>
