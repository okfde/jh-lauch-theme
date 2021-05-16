<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lauch
 */

get_header();

while (have_posts()) :
    the_post();
    $terms = get_the_terms($post, 'oer-topics');
    ?>

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
                    <li>
                        <a href="<?php echo get_post_type_archive_link('oer'); ?>">OER</a>
                    </li>
                </ol>
            </nav>
            <h1 class="c-page-title pt-1"><?php the_title() ?></h1>
            <div class="c-page-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </header>

    <div class="c-page-section white pb-4">
        <ul class="c-category-list">
            <?php foreach ($terms as $term) : ?>
                <li class="c-category-list-item">
                    <a href="<?= get_term_link($term->slug, 'oer-topics'); ?>"
                       title="Mehr zum Thema <?= $term->name ?>">
                        <?= $term->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        $metadata = array(
            array('icon' => 'people', array('fieldname' => 'age'), array('fieldname' => 'participants')),
            array('icon' => 'hourglass', array('fieldname' => 'preparation'), array('fieldname' => 'duration')),
            array(array('fieldname' => 'difficulty')),
            array(array('fieldname' => 'download_project')),
            array(array('fieldname' => 'download_zim')),
            array(array('fieldname' => 'google_drive')),
            array(array('fieldname' => 'cc')),
            array(array('fieldname' => 'lab')),
        );
        ?>
        <div class="c-page-wide">
            <ul class="c-metadata">
                <li class="c-metadata-item">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/people.png" alt="" width="80"
                         height="80">
                    <div class="c-metadata-item-wrapper">
                        <dl>
                            <dt>Alter</dt>
                            <dd><?php the_field('age') ?></dd>
                        </dl>
                        <dl>
                            <dt>Anzahl</dt>
                            <dd><?php the_field('participants') ?></dd>
                        </dl>
                    </div>
                </li>
                <li class="c-metadata-item">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/hourglass.png" alt="" width="80"
                         height="80">
                    <div class="c-metadata-item-wrapper">
                        <dl>
                            <dt>Vorbereitung</dt>
                            <dd><?php the_field('preparation') ?></dd>
                        </dl>
                        <dl>
                            <dt>Dauer</dt>
                            <dd><?php the_field('duration') ?></dd>
                        </dl>
                    </div>
                </li>
                <li class="c-metadata-item c-metadata-item-column">
                    <div class="c-metadata-item-wrapper">
                        <dl class="d-b">
                            <dt>Schwierigkeit</dt>
                            <dd>
                                <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/difficulty.png" alt="" width="250" height="25">
                                <?php get_field('difficulty') ?>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="c-metadata-item c-metadata-item-column">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/download_project.png" alt="" width="80" height="80">
                    <div class="c-metadata-item-wrapper">
                        <dl class="d-b">
                            <dt>Projektbeschreibung</dt>
                            <dd>
                                <?php foreach (get_field('download_project') as $download) : $url = wp_get_attachment_url($download['file']); ?>
                                    <a href="<?= $url ?>" target="_blank" class="c-metadata-download"><?= wp_check_filetype($url)['ext'] ?></a>
                                <?php endforeach; ?>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="c-metadata-item c-metadata-item-column">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/download_zim.png" alt="" width="80" height="80">
                    <div class="c-metadata-item-wrapper">
                        <dl class="d-b">
                            <dt>ZIM-Papier</dt>
                            <dd>
                                <?php foreach (get_field('download_zim') as $download) : $url = wp_get_attachment_url($download['file']); ?>
                                    <a href="<?= $url ?>" target="_blank" class="c-metadata-download"><?= wp_check_filetype($url)['ext'] ?></a>
                                <?php endforeach; ?>
                            </dd>
                        </dl>
                    </div>
                </li>
                <li class="c-metadata-item">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/google_drive.png" alt="" width="80" height="80">
                    <div class="c-metadata-item-wrapper">
                        <a href="<?= get_field('google_drive') ?>" target="_blank">
                            <strong>Drive-Link zum Mitwirken</strong>
                        </a>
                    </div>
                </li>
                <li class="c-metadata-item">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/cc.png" alt="" width="80" height="80">
                    <div class="c-metadata-item-wrapper">
                        <strong><?php the_field('cc'); ?></strong>
                    </div>
                </li>
                <li class="c-metadata-item">
                    <img src="<?php echo get_template_directory_uri() ?>/images/meta_icons/lab.png" alt="" width="80" height="80">
                    <div class="c-metadata-item-wrapper">
                        <strong><?= get_field('lab')->post_title; ?></strong>
                    </div>
                </li>
            </ul>
        </div>
        <div class="c-page-standard c-page-wide wp-styles">
            <div class="c-page-capital-first pt-5"><?php the_content(); ?></div>
        </div>
    </div>

    <?php
    $args = array('post_type' => 'oer',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'oer-topics',
                'terms' => array_map(function ($n) {
                    return $n->term_id;
                }, $terms)
            )));
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) : ?>
        <section class="pt-5">
            <ul class="c-page-3col c-blog-list is-grid">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li class="fg-0">
                        <?php get_template_part('template-parts/content', 'teaser'); ?>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </section>
    <?php endif; ?>

<?php
endwhile; ?>

<?php
get_footer();
