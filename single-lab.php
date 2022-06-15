<?php
/**
 * The template for displaying all single labs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();
while (have_posts()) :
    the_post(); ?>
<?php
endwhile; ?>

    <header class="c-page-alpaca-header">
        <div class="c-page-alpaca-featured medium-up as-s p-r">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>"
                 alt="" class="clip-alpaka">
            <div class="c-page-alpaca-friend">
                <?php
                $svg = get_random_illustration();
                echo replace_svg_css_class_fill(get_svg_content($svg),
                    "changecolor",
                    "event-" . get_the_ID() . "-" . $svg,
                    get_field('event_color')); ?>
            </div>
        </div>
        <div class="c-page-alpaca-title">
            <nav class="c-breadcrumb" aria-label="breadcrumb">
                <ol>
                    <?php
                    $args = array(
                        'post_type' => 'page',
                        'meta_query' => array(
                            array(
                                'key' => '_wp_page_template',
                                'value' => 'lab-overview.php'
                            )
                        )
                    );
                    $events_maybe = get_posts($args); ?>
                    <li>
                        <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
                    </li>
                </ol>
            </nav>
            <?php the_title('<h1 class="c-page-title pt-1">', '</h1>') ?>
            <div class="c-page-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php if (get_field('illustration_right')) : ?>
            <div class="c-page-header-illustration right-top">
                <img src="<?php the_field('illustration_right'); ?>" alt="" width="200">
            </div>
        <?php endif; ?>
    </header>

    <section
        class="c-page-section pb-0 c-page-center">
        <div class="c-page-standard wp-styles mb-3"><?php the_content(); ?></div>
    </section>

<?php
$args = array(
    'post_type' => 'date',
    'orderby' => 'begin',
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'parent', // name of custom field
            'value' => get_the_ID(),
            'compare' => 'LIKE'
        ),
        post_date_get_timed_query()
    )
);
$the_query = new WP_Query($args);
post_date_get_sorted($the_query);
if ($the_query->have_posts()):
    ?>
    <section class="c-page-section pb-2 mt-2 white addon--relative">
        <span class="addon addon--small addon--right addon--top addon--catdog sm-only"></span>
        <div class="event-teaser-list">
            <h2 class="event-teaser-list-title addon--relative">
                <?php echo __('Die nächsten Termine', 'lauch') ?>
                <span class="d-b mt-2 addon addon--small addon--catdog sm-up"></span>
            </h2>
            <div class="event-teaser-list-wrapper c-page-content">
                <ul>
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                        setup_postdata($post); ?>
                        <?php if (get_post_status() == 'publish'): ?>
                            <?php get_template_part('template-parts/event', 'lab') ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
                <p class="c-page-copy"><a href="/kalender/?lab_id=<?= get_the_ID() ?>">Alle Termine anzeigen</a></p>
            </div>
        </div>
    </section>
<?php endif ?>

    <section
        class="c-page-section pb-0 c-page-center addon--relative addon addon--large addon--l-0 addon--top addon--octopus">
        <h2 class="ta-c c-event-title"><?php echo __("Wissenswertes zum Ort", "lauch"); ?></h2>
        <div class="c-page-2col ai-c c-event-info">
            <div class="col-l c-event-overview">
                <?php the_field('event_facts'); ?>
            </div>
            <div class="col-s fg c-event-map">
                <div id="map" class="c-map"></div>
                <noscript>Kein JavaScript? Hier sollte eine Karte mit der Event Location dargestellt werden.</noscript>
            </div>
        </div>
    </section>

<?php get_template_part('template-parts/partner', 'lab') ?>

<?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>

    <script>
        document.querySelector('html').style.setProperty("--event-single-color", "<?php echo the_field('event_color'); ?>");
    </script>

    <script>
        var mymap = L.map('map').setView([<?php the_field('event_lat'); ?>,
            <?php the_field('event_lon'); ?>], 15);
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
        });
        var marker = L.marker([<?php the_field('event_lat'); ?>,
            <?php the_field('event_lon'); ?>], {icon: customMarker})
            .addTo(mymap);
    </script>


<?php
get_footer();
