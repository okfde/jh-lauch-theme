<?php
    /**
     * Template Name: Home
     * The start page
     *
     * @package Lauch
     */

    get_header();

    $mod_color = get_theme_mod('header_textcolor');
?>


<?php
    while ( have_posts() ) :
    the_post();
    endwhile;
?>

<section class="c-page-home-header c-index-header p-r" style="background-image: url(<?php if (is_front_page()) { echo get_the_post_thumbnail_url(null, 'full'); } ?>)">
    <div class="c-index-wrapper">
        <h1 class="c-index-title" style="color: #<?php echo $mod_color ?>;">Mit <span id="revolving-claims">Code</span><br>die Welt verbessern</h1>
        <div class="c-page-content"  style="color: #<?php echo $mod_color ?>;"><?php the_content(); ?></div>
    </div>
</section>

<section class="c-page-section white pt-5">

    <h2 class="c-index-subtitle mt-1"><?php echo __('Die nächsten Termine', 'lauch'); ?></h2>

    <div class="c-toc c-toc--horizontal">
        <div class=" c-events-list">
            <?php get_template_part('template-parts/calendar', 'overview', array('num' => 9)); ?>

            <p class=""><a href="kalender/" class="button">Alle Termine anzeigen</a></p>

        </div>
    </div>
</section>


<section class="c-page-section c-blog-list is-grid p-r">
    <h2 class="c-flag mini softblue points-bottom upper mb-3"><?php echo __('Aus dem Blog', 'lauch'); ?></h2>
    <?php
        setlocale(LC_TIME, "de_DE");
        $args2 = array('posts_per_page' => 2);
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

<section class="">
    <?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>
</section>

<?php
    get_footer();
