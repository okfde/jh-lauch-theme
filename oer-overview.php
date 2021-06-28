<?php
/**
 * Template Name: OER-Übersicht
 */
get_header();
?>

    <div class="p-r">
        <header class="c-page-offcenter-header">
            <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
            <div class="c-page-excerpt"><?php the_content(); ?></div>
            <div class="c-page-header-illustration right-one">
                <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="120">
            </div>
        </header>
    </div>

    <section class="c-blog-list is-grid pt-5">
        <?php $args = array(
            'taxonomy' => 'oer-topics',
            'hide_empty' => false,
        );
        $terms = get_terms($args); ?>
        <?php if (count($terms)) : ?>
            <ul>
                <?php foreach($terms as $term):?>

                    <li class="c-compact-teaser fg-0">
                        <a href="<?php echo get_term_link($term); ?>"
                           title="Zur Kategorie <?= $term->name ?>"
                           class="hover-line-trigger">
                            <div class="teaser-image">

                                <picture><?php
                                    $image_id = get_field('topic-picture', $term->taxonomy . '_' . $term->term_id);
                                    echo wp_get_attachment_image( $image_id, $size = 'full' );
                                ?></picture>
                            </div>
                            <h3 class="teaser-title"><span class="hover-line"><?= $term->name ?></span></h3>
                            <div class="teaser-summary"><?= $term->description ?></div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>

<?php
get_footer();
