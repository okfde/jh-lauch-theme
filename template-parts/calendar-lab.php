<div class="event-teaser-list-item no-hover">
    <a href="<?php echo $post->guid; ?>" title="Zur Seite von Lab: <?php echo get_field('parent', $post->ID)->post_title; ?>">
        <div class="d-f ai-s">
            <picture class="events-list-image">
                <?php echo get_the_post_thumbnail($post->ID, 'lab-event-teaser') ?>
            </picture>
            <div class="event-teaser-list-meta fg">
                <div class="c-uppercase-title">Lab: <?php echo get_field('parent', $post->ID)->post_title; ?></div>
                <h3 class="mb-0 mt-0 bold"><?php echo $post->post_title; ?></h3>
                <p class="mt-1 fw-b">
                    <time>
                        <?php echo wp_date('D d.m.Y | G:i -', get_field('begin', $post->ID)); ?>

                        <?php echo wp_date('G:i', get_field('end', $post->ID)); ?>
                    </time>
                </p>
            </div>
        </div>
    </a>
</div>
