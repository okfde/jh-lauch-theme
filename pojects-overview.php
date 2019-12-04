<?php
/**
 * Template Name: Projekt Übersicht
 */
get_header();
?>

<?php
while ( have_posts() ) : the_post(); ?>
  <div class="p-r">
    <header class="c-page-offcenter-header">
      <h1 class="c-page-title"><?php the_title() ?></h1>
      <div class="c-page-excerpt"><?php the_content() ?></div>
      <div class="c-page-header-illustration">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" width="120">
      </div>
    </header>
  </div>
<?php
endwhile; ?>


<section class="pt-5 pb-2 needs-js">
  <h2 class="c-uppercase-title"><?php echo __('Filtern nach', 'lauch') ?></h2>
  <div class="c-filter">
    <?php $taxonomies = array(array('Ort', 'location'),
                              array('Jahr', 'year'),
                              array('Thema', 'topics'),
                              array('Technik', 'tech'));

    foreach ($taxonomies as $tax) : ?>
      <label class="c-filter-item" for="filter-<?php echo $tax[1] ?>">
        <span class="a11y-visuallyhidden"><?php echo __($tax[0], 'lauch') ?></span>
        <select id="filter-<?php echo $tax[1] ?>">
          <option value=""><?php echo __($tax[0], 'lauch') ?></option>
          <?php $terms = get_terms($tax[1]);
          foreach ($terms as $t) : ?>
            <option value="<?php echo $t->taxonomy; ?>-<?php echo $t->slug; ?>"><?php echo $t->name; ?></option>
          <?php endforeach; ?>
        </select>
      </label>
    <?php endforeach; ?>
  </div>
</section>

<section class="c-page-section c-project-list pb-0 pt-5">
  <ul class="js-isotope">
  <?php
  $args = array('post_type' => 'video',
                'posts_per_page' => 4,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'year',
                    'field'    => 'slug',
                    'terms'    => date("Y"),
                  ),
                  array(
                    'taxonomy' => 'type',
                    'field'    => 'slug',
                    'terms'    => 'project-presentation',
                  )
                ),);
  $the_query = new WP_Query( $args );
  $arr_collect_ids = []; ?>
  <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'project' );
        array_push($arr_collect_ids, get_the_ID()); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <li class="fullwidth--padding needs-js">
    <?php
    $loc_term = get_field('term_location');
    $year_term = get_field('term_year');
    $topic_term = get_field('term_topics');
    $tech_term = get_field('term_tech');

    $out = "[vuevideo type='project-presentation' ";
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
  </li>

  <?php
  $args = array('post_type' => 'video',
                'posts_per_page' => 8,
                'post__not_in' => $arr_collect_ids,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'year',
                    'field'    => 'slug',
                    'terms'    => date("Y"),
                  ),
                  array(
                    'taxonomy' => 'type',
                    'field'    => 'slug',
                    'terms'    => 'project-presentation',
                  )
                ));
  $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'project' );
        array_push($arr_collect_ids, get_the_ID()); ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <li class="c-catnav fullwidth needs-js">
    <h2 class="c-catnav-title"><?php echo __('Spannende Themen', 'lauch') ?></h2>
    <nav>
      <div class="tns-controls">
        <button class="tns-prev" title="Nach links"><?php render_svg('/images/icons/arrow-left.svg'); ?></button>
        <button class="tns-next" title="Nach rechts"><?php render_svg('/images/icons/arrow-right.svg') ?></button>
      </div>
      <ul class="js-filter-parent js-slider">
        <?php $terms = get_terms('topics', array('hide_empty' => true));
        foreach ($terms as $t) : ?>
          <li class="c-catnav-item">
            <a href="#"
               data-filter="<?php echo $t->slug; ?>"
               class="hover-line-trigger">
              <h3><span class="hover-line"><?php echo $t->name; ?></span></h3>
              <p><?php echo $t->description; ?></p>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </li>

  <?php
  $args = array('post_type' => 'video',
                'posts_per_page' => -1,
                'post__not_in' => $arr_collect_ids,
                'order' => 'ASC',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'type',
                    'field'    => 'slug',
                    'terms'    => 'project-presentation',
                  )));
  $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
        get_template_part( 'template-parts/children', 'project' ) ?>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  </ul>
</section>

<?php
get_footer();
