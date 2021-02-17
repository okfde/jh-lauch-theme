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


    <section class="c-page-section jc-c c-page-2col">
        <div class="col-50">
            <header class="c-page-section pb-2">
                <h1 class="mt-0 mb-3">Kalender</h1>
                <p>Hier findest du alle kommenden Event- und Workshop-Angebote von Jugend hackt. Jeder Eintrag bringt dich zur Termin-Seite mit mehr Infos.</p>
            </header>
            <div class="c-toc c-toc--horizontal">
                <ul class="c-toc-nav">
                    <li><a href="#events" class="hover-line-trigger">
                            <span class="hover-line"><?php echo __('Events', 'lauch'); ?></span></a></li>
                    <li><a href="#labs" class="hover-line-trigger <?= isset($_GET['lab_id']) ? "is-active" : '' ?>">
                            <span class="hover-line"><?php echo __('Labs', 'lauch'); ?></span></a></li>
                </ul>
                <div class="c-toc-content c-events-list">
                    <section id="events">
                      <?php
                      foreach ([1, 0] as $is_active) :

                          $eventp = get_posts(array('post_type' => 'page',
                            'meta_query' => array(
                              array('key' => '_wp_page_template',
                                'value' => 'event-overview.php'))))[0];

                          $args = array('post_type' => 'page',
                            'post_parent' => $eventp->ID,
                            'meta_key' => 'is_active',
                            'meta_value' => $is_active,
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'posts_per_page' => 100
                          );
                          $the_query = new WP_Query($args); ?>

                          <?php if ($the_query->have_posts()) : ?>
                            <h2><?= $is_active ? 'Kommende Events' : 'Vergangene Events' ?></h2>
                              <ul>
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <li>
                                        <div class="event-teaser-list-item no-hover">
                                            <div class="d-f ai-s">
                                                <picture class="events-list-image">
                                                    <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-s'); ?>"
                                                            media="(max-width: 1900px)">
                                                    <source srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-highdpi'); ?>"
                                                            media="(min-resolution: 192dpi)">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'events-teaser-m'); ?>"
                                                         width="90" loading="lazy">
                                                </picture>
                                                <div class="">
                                                    <div class="d-f">
                                                        <h3 class="mb-0 mt-0">
                                                            <a href="<?php the_permalink() ?>"
                                                               title="Mehr Infos zu <?php the_title() ?>">
                                                              <?php the_title() ?>
                                                              <?php if (isset(get_field('next_event')[0])) :
                                                                $event = get_field('next_event')[0]; ?>
                                                                  <time><?php the_field('datum', $event->ID); ?></time>
                                                              <?php endif; ?>
                                                            </a></h3>
                                                        </a>
                                                    </div>
                                                    <div class="events-list-actions active">
                                                        <a
                                                                href="<?php the_permalink() ?>"
                                                                title="Mehr Infos zu Jugend hackt in <?php the_title() ?>">Mehr
                                                            Infos</a>
                                                      <?php if (isset(get_field('next_event')[0])) :
                                                        $event = get_field('next_event')[0]; ?>
                                                        <?php if (get_field('anmeldungslink', $event->ID)
                                                        && get_field('anmeldungslink', $event->ID) != ""): ?>
                                                          <a href="<?php the_field('anmeldungslink', $event->ID); ?>"
                                                             title="Anmeldung für Jugend hackt
                                                             in <?php the_title() ?>">Anmelden</a>
                                                      <?php endif; ?>
                                                      <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                              </ul>
                          <?php endif;
                      endforeach; ?>

                    </section>
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
                            )
                          );
                          if (isset($_GET['lab_id'])) {
                            $args['meta_query']['parent'] = array(
                              'key' => 'parent', // name of custom field
                              'value' => $_GET['lab_id'],
                              'compare' => 'LIKE'
                            );
                          }
                          $the_query = new WP_Query($args); ?>

                          <?php if ($the_query->have_posts()) : ?>
                            <h2><?= $is_active ? 'Kommende Events' : 'Vergangene Events' ?></h2>
                            <?php while ($the_query->have_posts()) : $the_query->the_post();
                                $info = array('lab' => get_field('parent')->post_title,
                                  'link' => get_post_permalink(),
                                  'img' => get_post_thumbnail_id(),
                                  'title' => $post->post_title,
                                  'date_technical' => post_date_get_datetime(),
                                  'date' => post_date_format_date());
                                array_push($all_dates, $info);
                            endwhile;
                            wp_reset_postdata();
                          endif;

                          foreach ($all_dates as $d) : ?>
                              <div class="event-teaser-list-item no-hover">
                                  <a href="<?php echo $d['link'] ?>" title="Zur Seite von Lab: <?php echo $d['lab']; ?>">
                                      <div class="d-f ai-s">
                                        <?php if ( isset(wp_get_attachment_image_src($d['img'], 'lab-event-teaser')[0])) : ?>
                                          <picture class="events-list-image-2">
                                              <img src="<?php echo wp_get_attachment_image_src($d['img'], 'lab-event-teaser')[0] ?>"
                                                   alt="" width="90">
                                          </picture>
                                        <?php endif; ?>
                                          <div class="event-teaser-list-meta fg">
                                              <div class="c-uppercase-title mb-1">Lab: <?php echo $d['lab']; ?></div>
                                              <h3 class="mb-0 mt-0"><?php echo $d['title']; ?></h3>
                                              <p class="mt-1 fw-b">
                                                  <time>
                                                    <?php echo $d['date']; ?>
                                                      <time>
                                              </p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
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
