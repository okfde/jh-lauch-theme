<?php
/**
 * Template Name: Lab Übersicht
 */
get_header();
?>

<?php
while (have_posts()) :
    the_post();
    get_template_part('template-parts/header-alpaka', get_post_type());
    ?>

    <section class="c-blog-list is-grid pt-5">
        <?php
        $args = array('post_type' => 'lab',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'lab-location',
                    'field' => 'slug',
                    'terms' => $community_id, // set in functions.php
                    'operator' => 'NOT IN', // this line excludes the community
                ),
            )
        );
        $the_query = new WP_Query($args);
        $pins = array(); ?>

        <?php if ($the_query->have_posts()) : ?>

            <div class="col-s fg c-event-map mb-5">
                <div id="map" class="c-map"></div>
                <noscript>Kein JavaScript? Hier sollte eine Karte mit der Event Location dargestellt werden.</noscript>
            </div>

            <ul class="">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php
                    array_push($pins, [
                        'coordinates' => [
                            get_field('event_lat'), get_field('event_lon')
                        ],
                        'name' => get_the_title(),
                        'excerpt' => get_the_excerpt(),
                        'link' => get_permalink()
                    ]);
                    get_template_part('template-parts/children', 'lab'); ?>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
    </section>

    <?php get_template_part('template-parts/partner', 'lab') ?>
    <script>
        var mymap = L.map('map').setView([51.163361, 10.447683], 6);
        //https://api.mapbox.com/styles/v1/okfn/{id}/tiles/256/{z}/{x}/{y}?access_token={accessToken}

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            tileSize: 512,
            maxZoom: 18,
            zoomOffset: -1,
            id: 'mapbox/streets-v11',
            accessToken: 'pk.eyJ1Ijoib2tmZGUiLCJhIjoiY2syMzZjazFrMDZpejNtcW11Mm5pMnozNSJ9.6QaPMbeUg3k8fcVUmvvpxA'
        }).addTo(mymap);
        var customMarker = L.icon({
            iconUrl: '<?php echo get_template_directory_uri(); ?>/images/events/Pin-x1.png',
            iconRetinaUrl: '<?php echo get_template_directory_uri(); ?>/images/events/Pin-x2.png',
            iconSize: [17, 23],
            iconAnchor: [9, 22],
            tooltipAnchor: [15, -10]
        });
        <?php foreach ($pins as $pin): ?>
        L.marker(<?= json_encode($pin['coordinates']) ?>, {icon: customMarker})
            .bindPopup('<h4 class="mt-0 mb-0"><?= $pin['name'] ?></h4><p><?= $pin['excerpt'] ?><p><a href="<?= $pin['link'] ?>">Zur Seite</a></p>')
            .addTo(mymap)
        <?php endforeach; ?>
    </script>

<?php
endwhile;


get_footer();
