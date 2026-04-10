<?php
    /**
     * The template for displaying archive pages
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Lauch
     */

    get_header();
?>


<section>
    <header class="c-page-offcenter-header mb-5 mt-2">
        <h1 class="c-page-title">Kalender</h1>
        <div class="c-page-excerpt">
            <p>Hier findest du alle kommenden Event- und Workshop-Angebote von Jugend hackt. Jeder Eintrag bringt dich zur Termin-Seite mit mehr Infos.</p>
        </div>
    </header>

    <div class="c-toc--horizontal mt-4">
        <div class="c-toc-horizontal c-events-list">
            <?php get_template_part('template-parts/calendar', 'overview'); ?>
        </div>
    </div>
</section>

<?php
    get_footer();
