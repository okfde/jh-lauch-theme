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
    'posts_per_page' => -1,
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
//post_date_get_sorted($the_query);

    ?>
    <section class="c-page-section pb-2 mt-2 white addon--relative">
        <span class="addon addon--small addon--right addon--top addon--catdog sm-only"></span>
        <div class="event-teaser-list">
            <h2 class="event-teaser-list-title addon--relative">
                <?php echo __('Die nächsten Termine', 'lauch') ?>
            </h2>
            <div class="event-teaser-list-wrapper c-page-content">
                <ul>
                    <?php foreach ($the_query->posts as $p): ?>

                        <?php if (get_post_status($p->ID) == 'publish'): ?>
                            <?php get_template_part('template-parts/event', 'lab', array($p)); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </section>

    <section
        class="c-page-section pb-0 c-page-center addon--relative addon addon--large addon--l-0 addon--top addon--octopus">
        <h2 class="ta-c c-event-title"><?php echo __("Wissenswertes zum Ort", "lauch"); ?></h2>
        <div class="c-page-2col ai-c c-event-info">
            <div class="col-l c-event-overview">
                <?php the_field('event_facts'); ?>
            </div>

        </div>
    </section>

<?php get_template_part('template-parts/partner', 'lab') ?>

<?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>

    <script>
        document.querySelector('html').style.setProperty("--event-single-color", "<?php echo the_field('event_color'); ?>");
    </script>


<?php
get_footer();
