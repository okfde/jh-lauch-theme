<?php
$p = $args[0];
?>

<div class="event-teaser-list-item">
  <div class="accordion" data-accordion>
    <div class="accordion__title">
      <img src="<?php echo get_the_post_thumbnail_url($p->ID, 'lab-event-teaser') ?>" alt="" width="182" height="213" class="event-teaser-list-img">
      <div class="event-teaser-list-meta">
        <p class="c-flag c-flag--eventsingle mini points-bottom mb-1">
            <time>
                <?php echo wp_date('D d.m.Y | G:i -', get_field('begin', $p->ID)); ?><?php echo wp_date('G:i', get_field('end', $p->ID)); ?>
            </time>
        </p>
        <h3 class="mb-0 d-f jc-s" data-title>
            <span><?php echo get_the_title($p->ID); ?></span>
        </h3>
        <?php render_svg('/images/icons/arrow-right.svg'); ?>
        <div class="accordion__content c-page-standard" data-content>

            <p><a href="<?php echo get_permalink($p->ID); ?>" class=""><small>( 🔗 Direktlink zur Veranstaltung)</small></a></p>

          <?php echo get_the_content($p->ID); ?>
        </div>
      </div>
    </div>
  </div>
</div>
