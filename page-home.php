<?php
    /**
     * Template Name: Home
     * The start page
     *
     * @package Lauch
     */

    get_header();
?>


<?php
    while ( have_posts() ) :
    the_post();
    endwhile;
?>

<header class="c-page-home-header pb-10 c-index-header p-r">
    <div class="c-index-wrapper">
        <h1 class="c-index-title">Mit <span id="revolving-claims">Code</span> die<br> Welt verbessern</h1>
        <div class="c-page-content"><?php the_content(); ?></div>
        <div class="c-index-illu">
            <?php render_svg("/images/index/Illustration-Mashup-Start-02-1200-02.svg") ?>
        </div>
    </div>
</header>

<section class="c-page-section white pt-10">

    <h2 class="c-index-subtitle mt-1"><?php echo __('Die nächsten Termine', 'lauch'); ?></h2>

    <div class="c-toc c-toc--horizontal">
        <div class=" c-events-list">
            <?php
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
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'lab-location',
                            'field'    => 'slug',
                            'terms'    => $community_id, // set in functions.php
                            'operator' => 'NOT IN', // this line excludes the community
                        ),
                    )
                );
                $lab_query = new WP_Query( $args );

                $ids = array_merge($event_query->posts, $lab_query->posts);
                //$merged = new WP_Query(array('post__in' => $ids,'orderby' => 'post__in')); ?>

            <ul class="c-event-list__list mb-3">
                <?php foreach ($ids as $post): ?>
                    <li>
                        <?php if ($post->post_type == "date"): ?>
                            <div class="event-teaser-list-item no-hover">
                                <a href="<?php echo $post->guid; ?>" title="Zur Seite von Lab: <?php echo get_field('parent', $post->ID)->post_title; ?>">
                                    <div class="d-f ai-s">
                                        <picture class="events-list-image">
                                            <?php echo get_the_post_thumbnail($post->ID, 'lab-event-teaser') ?>
                                        </picture>
                                        <div class="event-teaser-list-meta fg">
                                            <div class="c-uppercase-title">Lab: <?php echo get_field('parent', $post->ID)->post_title; ?></div>
                                            <h3 class="mb-0 mt-0"><?php echo $post->post_title; ?></h3>
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
                        <?php else: ?>
                            <?php $event = get_field('next_event', $post->ID)[0]; ?>

                            <div class="event-teaser-list-item no-hover">
                                <div class="d-f ai-s">
                                    <picture class="events-list-image">
                                        <?php echo get_the_post_thumbnail($post->ID, 'lab-event-teaser') ?>
                                    </picture>

                                    <div class="">
                                        <div class="d-f">
                                            <h3 class="mb-0 mt-0">
                                                <a href="<?php the_permalink() ?>"
                                                    title="Mehr Infos zu <?php the_title() ?>">
                                                    <?php the_title() ?>
                                                    <time class="" datetime="">
                                                        <?php the_field('datum', $event->ID); ?></time>
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

                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="c-page-copy"><a href="kalender/">Alle Termine anzeigen</a></p>
        </div>
    </div>
</section>


<section class="c-page-section c-blog-list is-grid p-r">
    <div class="p-a c-index-illu-news"><?php render_svg('/images/index/News-Illu.svg'); ?></div>
    <h2 class="c-flag mini softblue points-bottom upper mb-3"><?php echo __('Aus dem Blog', 'lauch'); ?></h2>
    <?php
        setlocale(LC_TIME, "de_DE");
        $args2 = array('posts_per_page' => 3);
        $the_query2 = new WP_Query( $args2 ); ?>

    <?php if ( $the_query2->have_posts() ) : ?>
        <ul>
            <?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
                <li>
                    <?php get_template_part( 'template-parts/content', 'teaser'); ?>
                </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    <?php endif; ?>
    <div class="ta-c">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' )) ?>" class="button button--softblue"><?php echo __('Alle Blogposts', 'lauch') ?></a></div>
</section>

<section class="c-page-section pb-0 pt-0 white">
    <?php
        $loc_term = get_field('term_location');
        $year_term = get_field('term_year');
        $topic_term = get_field('term_topics');
        $tech_term = get_field('term_tech');

        $out = "[vuevideo type='project-presentation' color='white' ";
        if ($loc_term) {
            $out .= "location='". $loc_term->slug ."' ";
        }
        if ($year_term) {
            $out .= "year='". $year_term->slug ."' ";
        }
        if ($tech_term) {
            $out .= "tech='". $tech_term->slug ."' ";
        }
        if ($topic_term) {
            $out .= "topics='". $topic_term->slug ."' ";
        }
        $out .= "]";

        echo do_shortcode($out); ?>
</section>


<!--
     <section class="c-page-section">
     <h2><?php echo __('So war es in', 'lauch'); ?></h2>
     </section>
-->

<section class="">
    <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
</section>

<?php
    get_footer();
