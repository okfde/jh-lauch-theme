<?php
    $num = $args['num'];
    $eventp = get_posts(array('post_type' => 'page',
                              'meta_query' => array(
                                  array('key' => '_wp_page_template',
                                        'value' => 'event-overview.php'))))[0];
    $args = array('post_type' => 'page',
                  'post_parent' => $eventp->ID,
                  'meta_key' => 'is_active',
                  'meta_value' => 1,
                  'posts_per_page' => -1
    );
    $event_query = new WP_Query( $args );

    $args = array(
        'post_type' => 'date',
        'orderby' => 'meta_value_datetime',
        'meta_key' => 'begin',
        'meta_query' => post_date_get_timed_query(),
        'posts_per_page' => $num,
        'tax_query' => array(
            array(
                'taxonomy' => 'lab-location',
                'field'    => 'slug',
                'terms'    => array('online-community'), // set in functions.php
                'operator' => 'NOT IN', // this line excludes the community
            ),
        )
    );
    $lab_query = new WP_Query( $args );

    $ids = array_merge($event_query->posts, $lab_query->posts); ?>

<ul class="c-event-list__list mb-3">
    <?php foreach ($ids as $post): ?>
        <li>
            <?php if ($post->post_type == "date"):
                get_template_part('template-parts/calendar', 'lab');
                else:
                get_template_part('template-parts/calendar', 'events');
                endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
