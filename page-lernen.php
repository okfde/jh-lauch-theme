<?php
/**
 * Template Name: Lernen
 */
get_header();
?>

<?php
while ( have_posts() ) : the_post() ?>

  <div class="p-r">
    <header class="c-page-offcenter-header">
      <h1 class="c-page-title"><?php the_title() ?></h1>
      <div class="c-page-excerpt"><?php the_content() ?></div>
      <div class="c-page-header-illustration right-one">
        <img src="<?php echo get_field('illustration_right'); ?>" alt="" width="120">
      </div>
    </header>
  </div>

  <section class="c-page-section">
    <div class="c-page-3col c-blog-list is-grid pt-5">
      <?php $args = array('post_type' => 'learning',
                          'posts_per_page' => -1,
      );
      $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <ul>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li class="c-compact-teaser">
              <a href="<?php echo get_permalink(); ?>"
                 title="Zum Lernmaterial <?php the_title() ?>"
                 class="hover-line-trigger">
                <div class="teaser-image">
                  <picture><?php echo get_the_post_thumbnail(get_the_ID(), 'learning-teaser'); ?></picture></div>
                <h3 class="teaser-title"><span class="hover-line"><?php the_title() ?></span></h3>
                <div class="teaser-summary"><?php echo wp_trim_words($post->post_content, 45); ?></div>
              </a>
            </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>

  <section class="c-page-section">
    <div class="c-page-2col jc-sb">
      <div class="col-50">
        <h2><?php echo the_field('lightning_talks_title', get_the_ID()) ?></h2>
        <div>
          <?php the_field('lightning_talks_text') ?>
        </div>
      </div>
      <div class="col-50 d-f ai-c"">
        <?php render_svg('/images/JH-Illustration-Bus-Left-Green-Soft-RGB.svg'); ?>
      </div>
    </div>
  </section>

  <section class="pt-5 pb-2 needs-js">
    <h2 class="c-uppercase-title"><?php echo __('Filtern nach', 'lauch') ?></h2>
    <div class="c-filter c-filter--white"">
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
                        'terms'    => 'lightning-talk',
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

        $out = "[vuevideo type='lightning-talk' color='white' ";
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
                    'posts_per_page' => -1,
                    'post__not_in' => $arr_collect_ids,
                    'order' => 'ASC',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'type',
                        'field'    => 'slug',
                        'terms'    => 'lightning-talk',
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
endwhile;
get_footer();
