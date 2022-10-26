<?php
/**
 * Template Name: Terminübersicht NL
 *
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */

get_header();
?>


    <section class="c-page-section jc-c c-page-2col">
        <div class="col-50">
            <header class="c-page-section pb-2">
                <h1 class="mt-0 mb-3">Kalender</h1>
                <p>Schnelle Übersicht über alle kommenden Termine - vor allem für Philip und den Newsletter :)</p>
            </header>
            <div class="c-toc c-toc--horizontal">
                <ul class="c-toc-nav">
                    <li><a href="#labs" class="hover-line-trigger <?= isset($_GET['lab_id']) ? "is-active" : '' ?>">
                            <span class="hover-line"><?php echo __('Labs', 'lauch'); ?></span></a></li>
                </ul>
                <div class="c-toc-content c-events-list">
                    <section id="labs" <?= isset($_GET['lab_id']) ? 'class="is-active"' : '' ?>>
                      <?php
                        foreach ([true, false] as $is_active) :
                          $all_dates = array();
                          $args = array(
                            'post_type' => 'date',
                            'orderby' => 'begin',
                            'order' => $is_active ? 'ASC' : 'DESC',
                            'meta_query' => array(
                                'begin' => post_date_get_timed_query($is_active),
                            'posts_per_page' => -1
                            )
                          );
                          if (isset($_GET['lab_id'])) {
                            $args['meta_query']['parent'] = array(
                              'key' => 'parent', // name of custom field
                              'value' => $_GET['lab_id'],
                              'compare' => 'LIKE'
                            );
                          }
                          $the_query = new WP_Query($args);
                          post_date_get_sorted($the_query); ?>

                          <?php if ($the_query->have_posts()) : ?>
                            <h2><?= $is_active ? 'Kommende Termine' : 'Vergangene Termine' ?></h2>
                            <?php while ($the_query->have_posts()) : $the_query->the_post();
                                $info = array('lab' => get_field('parent')->post_title,
                                  'link' => get_post_permalink(),
                                  'img' => get_post_thumbnail_id(),
                                  'title' => $post->post_title,
                                  'date_technical' => post_date_get_datetime(),
                                  'date' => post_date_format_date_simple());
                                array_push($all_dates, $info);
                            endwhile;
                            wp_reset_postdata();
                          endif;

                          foreach ($all_dates as $d) : ?>
                              <p><?php echo $d['date']; ?> <strong><?php echo $d['lab']; ?></strong> - <?php echo $d['title']; ?></p>
                          <?php endforeach;
                            endforeach; ?>
                        <?php if ( isset( $_GET['lab_id']) && $_GET['lab_id'] !== '' ) : ?>
                          <p class="c-page-copy"><a href="/kalender/?lab_id">Alle Labs anzeigen</a></p>
                        <?php endif; ?>
                    </section>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
