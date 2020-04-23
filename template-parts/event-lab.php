<div class="event-teaser-list-item">
  <div class="accordion" data-accordion>
    <div class="accordion__title">
      <img src="<?php echo wp_get_attachment_image_src(get_sub_field('image')['ID'], 'lab-event-teaser')[0] ?>" alt="" class="event-teaser-list-img">
      <div class="event-teaser-list-meta">
        <p class="c-flag c-flag--eventsingle mini points-bottom mb-1">
          <time><?php the_sub_field('date') ?></time></p>
        <h3 class="mb-0" data-title><?php the_sub_field('title') ?></h3>
        <?php render_svg('/images/icons/arrow-right.svg'); ?>
        <div class="accordion__content" data-content>
          <?php the_sub_field('text') ?>
        </div>
      </div>
    </div>
  </div>
</div>
