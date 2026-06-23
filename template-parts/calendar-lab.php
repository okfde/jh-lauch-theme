<div class="event-teaser-list-item no-hover">
    <a href="<?php echo get_permalink($post->ID); ?>" title="Zur Seite von Lab: <?php echo get_field('parent', $post->ID)->post_title; ?>" class="hover-line-trigger">
        <div class="d-f ai-s">
            <picture class="events-list-image">
                <?php echo get_the_post_thumbnail($post->ID, 'lab-event-teaser') ?>
            </picture>
            <div class="event-teaser-list-meta fg">
                <div class="c-uppercase-title">
                    <?php //if (get_field('pinned', $post->ID)) { echo "📌"; } ?>
                    <?php echo get_field('parent', $post->ID)->post_title; ?></div>
                <h3 class="mb-0 mt-0 bold">

                    <span class="hover-line"><?php echo $post->post_title; ?></span></h3>
                <p class="mt-1 fw-b">
                    <?php
                        $date1 = wp_date('dmY', get_field('begin', $post->ID));
                        $date2 = wp_date('dmY', get_field('end', $post->ID));

                        if ($date1 == $date2): ?>
                        <time datetime="<?php echo wp_date('Y-m-d', get_field('begin', $post->ID)) ?>">
                            <?php echo wp_date('D d.m.Y | G:i -', get_field('begin', $post->ID)); ?>

                            <?php echo wp_date('G:i', get_field('end', $post->ID)); ?>
                        </time>
                    <?php else: ?>
                        <time datetime="<?php echo wp_date('Y-m-d', get_field('begin', $post->ID)) ?>">
                            <?php echo wp_date('D d.m. ', get_field('begin', $post->ID)); ?> bis
                            <?php echo wp_date('D d.m.Y - ', get_field('end', $post->ID)); ?>
                        </time>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </a>
</div>
