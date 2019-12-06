<?php
if ((get_field('next_event'))) {
  $next = get_field('next_event')[0];
?>

  <div class="js-sticky-container c-page-alpaca-header">
    <div class="c-page-alpaca-featured as-s">
      <div class=" js-sticky addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog-alpaka'); ?>"
             alt="" class="clip-alpaka">
      </div>
    </div>
    <div class="c-page-alpaca-title">
      <nav class="c-breadcrumb" aria-label="breadcrumb">
        <ol>
          <?php $ancestors = get_post_ancestors( $post );
          foreach ($ancestors as $a): ?>
            <li>
              <a href="<?php echo get_post_permalink($a); ?>"><?php echo get_the_title($a); ?></a>
            </li>
          <?php endforeach; ?>
        </ol>
      </nav>
      <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
      <div class="c-page-excerpt">
        <?php the_content(); ?>

        <?php if (get_field('anmeldungslink', $next->ID)): ?>
          <a href="<?php the_field('anmeldungslink', $next->ID); ?>"
             class="mt-1 button event-button"><?php echo __("Jetzt Anmelden", "lauch"); ?></a>
        <?php endif; ?>
      </div>

      <div class="pt-1 c-page-header-copy">
        <?php the_field('event_longform', $next->ID); ?>
      </div>
      <?php if (get_field('contact_person', $next->ID)): ?>
        <?php echo do_shortcode('[contactperson person="'. get_field('contact_person', $next->ID) .'", title="'. _("Du hast Fragen?", 'lauch') .'"]'); ?>
      <?php endif; ?>
    </div>


    <?php if (get_field('illustration_right')) : ?>
      <div class="c-page-header-illustration right-top">
        <img src="<?php the_field('illustration_right'); ?>" alt="" width="200">
      </div>
    <?php endif ?>
  </div>

  <section class="c-page-section c-page-center">
    <h2 class="ta-c c-event-title"><?php echo __("Facts zum Event", "lauch"); ?></h2>
    <div class="c-page-2col ai-c c-event-info">
      <div class="col-l c-event-overview">
        <?php the_field('event_facts', $next->ID); ?>
      </div>
      <div class="col-s fg c-event-map">
        <div  id="map" class="c-map"></div>
        <noscript>Kein JavaScript? Hier sollte eine Karte mit der Event Location dargestellt werden.</noscript></div>
    </div>
  </section>

  <div>
    <div class="c-planebanner">
      <a href="<?php the_field('anmeldungslink', $next->ID); ?>"
         title="<?php echo __("Jetzt Anmelden", "lauch"); ?>">
        <?php render_svg("/images/events/Anmeldung.svg"); ?>
        <?php render_svg("/images/events/Anmeldung.svg"); ?>
        <?php render_svg("/images/events/Anmeldung.svg"); ?>
        <?php render_svg("/images/events/Anmeldung.svg"); ?>
        <?php render_svg("/images/events/Anmeldung.svg"); ?>
      </a>
    </div>
  </div>

  <section class="c-page-section">
    <div class="">
      <div class="c-program-title">
        <h2><?php echo __("Das Program", "lauch"); ?></h2>
        <?php the_field('event_programm', $next->ID); ?>
      </div>
    </div>
    <div class="c-page-3col c-program jc-sb mt-3">
      <div class="col-s">
        <h3><?php render_svg("/images/events/_freitag.svg"); ?></h3>
        <ol class="">
          <?php if( have_rows('event_friday', $next->ID) ):
          while( have_rows('event_friday', $next->ID) ): the_row(); ?>
            <li><img src="<?php the_sub_field('icon'); ?>" class="" alt="">
              <time><?php the_sub_field('time', $next->ID); ?></time>
              <div><?php the_sub_field('what', $next->ID); ?></time></div></li>
          <?php endwhile;
          endif; ?>
        </ol>
      </div>
      <div class="col-s">
        <h3><?php render_svg("/images/events/_samstag.svg"); ?></h3>
        <ol class="">
          <?php if( have_rows('event_saturday', $next->ID) ):
          while( have_rows('event_saturday', $next->ID) ): the_row(); ?>
            <li><img src="<?php the_sub_field('icon'); ?>" class="" alt="">
              <time><?php the_sub_field('time', $next->ID); ?></time>
              <div><?php the_sub_field('what', $next->ID); ?></time></div></li>
          <?php endwhile;
          endif; ?>
        </ol>
      </div>
      <div class="col-s">
        <h3><?php render_svg("/images/events/_sonntag.svg"); ?></h3>
        <ol class="">
          <?php if( have_rows('event_sunday', $next->ID) ):
          while( have_rows('event_sunday', $next->ID) ): the_row(); ?>
            <li><img src="<?php the_sub_field('icon'); ?>" class="" alt="">
              <time><?php the_sub_field('time', $next->ID); ?></time>
              <div><?php the_sub_field('what', $next->ID); ?></time></div></li>
          <?php endwhile;
          endif; ?>
        </ol>
      </div>
    </div>
  </section>


  <section class="c-page-section">
    <div class="c-page-2col jc-sb c-event-video">
      <div class="col-m">
        <h2><?php the_field('event_how_title', $next->ID); ?></h2>
        <div><?php the_field('event_how_text', $next->ID); ?></div>
        <?php
        $the_query = new WP_Query( array(
          'post_type' => 'event',
          'post__not_in' => array($next->ID),
          'tax_query' => array(
            array (
              'taxonomy' => 'location',
              'field' => 'slug',
              'terms' => get_the_terms(get_the_ID(), 'location')[0]->slug,
            )),
        ));

        if ( $the_query->have_posts() ): ?>
          <div class="c-event-throwback">
            <h3><?php echo __('Rückblicke auf Jugend hackt '); ?> <?php the_title(); ?></h3>
            <ol>
              <?php
              while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php echo get_the_terms(get_the_ID(),  'year')[0]->slug; ?></a></li>
              <?php
              endwhile; ?>
            </ol>
          </div>
        <?php
        endif;
        wp_reset_postdata();  ?>
      </div>

      <div class="col-l fg">
        <div class="needs-js p-r mt-2">
          <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('event_how_video', $next->ID); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <noscript>Kein JavaScript? <a href="https://www.youtube-nocookie.com/watch?v=<?php the_field('event_how_video', $next->ID); ?>">Sie dir das Video hier an!</a></noscript>
          <div class="p-a t-n4 r-n3">
            <?php render_svg("/images/illustrations/change-alpaca.svg"); ?>
          </div>
        </div>
        <div class="c-page-video-bottom">
          <div class="c-page-video-label"><?php render_svg("/images/soist.svg"); ?></div>
        </div>
      </div>
    </div>
  </section>


  <section class="c-page-section white p-r">
    <div class="c-page-2col jc-sb ai-e">
      <div class="col-m">
        <h2><?php echo __('Vorbereitung auf das Event', 'lauch'); ?></h2>
      </div>
      <div class="col-xs c-event-illu">
        <img src="<?php the_field('event_learnings_illustration', $next->ID); ?>" alt="">
      </div>
    </div>
    <div class="c-page-3col c-blog-list is-grid">
      <?php if( have_rows('learnings', $next->ID) ): ?>
        <ul>
          <?php while( have_rows('learnings', $next->ID) ): the_row(); ?>
            <?php foreach (get_sub_field('learning') as $l): ?>
              <li class="c-compact-teaser">
                <a href="<?php echo get_permalink($l->ID); ?>"
                   title="Zum Lernmaterial <?php echo $l->post_title; ?>"
                   class="hover-line-trigger">
                  <div class="teaser-image">
                    <picture><?php echo get_the_post_thumbnail($l->ID, 'learning-teaser'); ?></picture></div>
                  <h3 class="teaser-title"><span class="hover-line"><?php echo $l->post_title; ?></span></h3>
                  <div class="teaser-summary"><?php echo wp_trim_words($l->post_content, 55); ?></div>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>

<?php  if( have_rows('partner', $next->ID) ): ?>
  <section class="c-page-section p-r">
    <div class="c-page-2col jc-sb ai-e">
      <div class="col-l">
        <h2 class="mt-2"><?php the_field('event_support_title', $next->ID); ?></h2>
        <div><?php the_field('event_support_text', $next->ID); ?></div>
      </div>
      <div class="col-xs c-event-illu--large">
        <img src="<?php the_field('event_support_illustration', $next->ID); ?>" alt="">
      </div>
    </div>
    <div class="c-page-section pb-2 mt-2">
      <ul class="c-list-displayitems pt-2 js-slider" data-slider-preset="auto">
        <?php
        while( have_rows('partner', $next->ID) ): the_row(); ?>
          <?php
          $image = wp_get_attachment_image_src(get_sub_field('partner_img'), 'events-teaser-highdpi'); ?>
          <li class="c-displayitem">
            <a href="<?php the_sub_field('partner_link'); ?>"
               title="Zur Website von <?php the_sub_field('partner_name'); ?> "
               class="hover-line-trigger">
              <img src="<?php echo $image[0] ?>" alt="" class="white">
              <h3 class="c-displayitem-title">
                <span class="hover-line"><?php the_sub_field('partner_name'); ?></span>
              </h3>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
<?php endif; ?>

  <script>
   var mymap = L.map('map').setView([<?php the_field('event_lat', $next->ID); ?>,
                                     <?php the_field('event_lon', $next->ID); ?>], 15);
   //https://api.mapbox.com/styles/v1/okfn/{id}/tiles/256/{z}/{x}/{y}?access_token={accessToken}

   L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
     maxZoom: 18,
     id: 'mapbox.streets',
     accessToken: 'pk.eyJ1Ijoib2tmZGUiLCJhIjoiY2syMzZjazFrMDZpejNtcW11Mm5pMnozNSJ9.6QaPMbeUg3k8fcVUmvvpxA'
   }).addTo(mymap);
   var customMarker = L.icon({
     iconUrl: '<?php echo get_template_directory_uri(); ?>/images/events/Pin-x1.png',
     iconRetinaUrl: '<?php echo get_template_directory_uri(); ?>/images/events/Pin-x2.png',
     iconSize:     [17, 23],
     iconAnchor:   [9, 22],
   });
   var marker = L.marker([<?php the_field('event_lat', $next->ID); ?>,
                          <?php the_field('event_lon', $next->ID); ?>], {icon: customMarker})
                 .addTo(mymap);
  </script>

<?php

} else {
  echo "Es wird ein Event geben, bald mehr!";
}
?>
<?php get_template_part( 'template-parts/support-cta', get_post_type() ); ?>

<script>
 document.querySelector('html').style.setProperty("--event-single-color", "<?php echo the_field('event_color'); ?>");
</script>
