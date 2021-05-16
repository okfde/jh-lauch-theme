<?php
/**
 * Template Name: OER-Kategorien
 */
get_header();
?>

  <div class="p-r">
    <header class="c-page-offcenter-header">
      <h1 class="c-page-title">Projekte zum Thema <?= get_queried_object()->name;?></h1>
      <div class="c-page-excerpt"><?= get_queried_object()->description; ?>></div>
    </header>
  </div>

  <section class="c-page-section c-project-list pb-0 pt-0">
    <ul>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
          get_template_part( 'template-parts/children', 'project' ) ?>

        <?php endwhile; ?>
    </ul>
  </section>


<?php
get_footer();
