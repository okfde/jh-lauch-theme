<?php $event = get_field('next_event', $post->ID)[0]; ?>

<div class="event-teaser-list-item no-hover">
    <div class="d-f ai-s">
        <picture class="events-list-image">
            <?php echo get_the_post_thumbnail($post->ID, 'lab-event-teaser') ?>
        </picture>

        <div class="">
            <div class="d-f">
                <h3 class="mb-0 mt-0 bold">
                    <a href="<?php the_permalink() ?>"
                        title="Mehr Infos zu <?php the_title() ?>"
                        class="hover-line-trigger">
                        <span class="hover-line"><?php the_title() ?>
                        <time class="" datetime="">
                            <?php the_field('datum', $event->ID); ?></time></span>
                    </a>
                </h3>
            </div>
            <div class="events-list-actions active">
                <a href="<?php the_permalink() ?>"
                    title="Mehr Infos zu Jugend hackt in <?php the_title() ?>">Mehr Infos</a>
                <?php if(get_field('anmeldungslink', $event->ID)
                         && get_field('anmeldungslink', $event->ID) != ""): ?>
                    <a href="<?php the_field('anmeldungslink', $event->ID); ?>"
                        title="Anmeldung für Jugend hackt in <?php the_title() ?>">Anmelden</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
