<?php
    $num = $args['num'];

    $args = array(
        'post_type' => 'date',
        //'orderby' => 'meta_value_datetime',
        'meta_key' => 'begin',
        'meta_query' => post_date_get_timed_query(),
        'orderby'           => 'meta_value',
        'posts_per_page' => $num,
        'order'             => 'ASC',
        /* 'tax_query' => array(
         *     array(
         *         'taxonomy' => 'lab-location',
         *         'field'    => 'slug',
         *         'terms'    => array('online-community'), // set in functions.php
         *         'operator' => 'NOT IN', // this line excludes the community
         *     ),
         * ) */
    );
    $lab_events = get_posts( $args );
    $lab_pinned = array_filter($lab_events, "filter_lab_pinned_events");
    $lab_unpinned = array_filter($lab_events, "filter_lab_unpinned_events");

    function filter_lab_pinned_events($v) {
        return get_field('pinned', $v->ID) === true;
    }
    function filter_lab_unpinned_events($v) {
        return !filter_lab_pinned_events($v);
    }

    $lab_ordered = array_merge($lab_pinned, $lab_unpinned);

    if( $posts ):
?>

<ul class="c-event-list__list mb-3">
    <?php foreach ($lab_ordered as $post):
        setup_postdata( $post );
    ?>
        <li>
            <?php
                get_template_part('template-parts/calendar', 'lab');
            ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php wp_reset_postdata(); ?>


<?php endif; ?>
