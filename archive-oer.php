<?php
/**
 * Template Name: OER-Übersicht
 */
get_header();
?>

<?php
while (have_posts()) : the_post() ?>

    <div class="p-r">
        <header class="c-page-offcenter-header">
            <h1 class="c-page-title">Freie Bildungsmaterialien</h1>
            <div class="c-page-excerpt"><p>There is no strife, no prejudice, no national conflict in outer space as yet.
                    Its hazards are hostile to us all. Its conquest deserves the best of all mankind, and its opportunity for peaceful
                    cooperation many never come again. But why, some say, the moon? Why choose this as our
                    goal? And they may well ask why climb the highest mountain? Why, 35 years ago, fly the
                    Atlantic? Why does Rice play Texas?</p></div>
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
endwhile;
get_footer();
