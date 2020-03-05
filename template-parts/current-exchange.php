<?php
/**
 * Template part for current event and exchange
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lauch
 */
?>
<div class="js-sticky-container c-page-alpaca-header">
  <div class="c-page-alpaca-featured as-s addon addon--<?php the_field('illustration_class'); ?> addon--large addon--<?php the_field('illustration_xaxis'); ?> addon--<?php the_field('illustration_yaxis'); ?>">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>"
         alt="" class="clip-alpaka js-sticky" >
  </div>
  <div class="c-page-alpaca-title">
    <nav class="c-breadcrumb" aria-label="breadcrumb">
      <ol>
        <?php
        $args = array(
          'post_type'  => 'page',
          'meta_query' => array(
            array(
              'key'   => '_wp_page_template',
              'value' => 'exchange-overview.php'
            )
          )
        );
        $events_maybe = get_posts($args); ?>
        <li>
          <a href="<?php echo get_post_permalink($events_maybe[0]->ID); ?>"><?php echo get_the_title($events_maybe[0]->ID); ?></a>
        </li>
        <li>
          <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </li>
      </ol>
    </nav>
    <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
    <div class="c-page-excerpt">
      <?php the_field('description'); ?>

      <?php if (get_field('anmeldungslink')): ?>
        <a href="<?php the_field('anmeldungslink'); ?>"
           class="mt-1 button event-button"><?php echo __("Jetzt anmelden", "lauch"); ?></a>
      <?php endif; ?>
    </div>

    <div class="pt-1 c-page-header-copy">
      <?php the_field('event_longform'); ?>
    </div>

    <?php echo do_shortcode("[contactperson person='". get_field('contact_person') ."']"); ?>
  </div>
  <?php if (get_field('illustration_right')) : ?>
    <div class="c-page-header-illustration right-top">
      <img src="<?php the_field('illustration_right'); ?>" alt="" width="200">
    </div>
  <?php endif; ?>
</div>

<section class="c-page-section c-page-center">
  <h2 class="ta-c c-event-title"><?php echo __("Facts", "lauch"); ?></h2>
  <div class="c-page-2col ai-c c-event-info">
    <div class="col-l c-event-overview">
      <?php the_field('event_facts'); ?>
    </div>
    <div class="col-s fg c-event-map">
      <div  id="map" class="c-map"></div>
      <noscript>Kein JavaScript? Hier sollte eine Karte mit der Event Location dargestellt werden.</noscript></div>
  </div>
</section>

<?php if (get_field('anmeldungslink')): ?>
<div>
  <div class="c-planebanner">
    <a href="<?php the_field('anmeldungslink'); ?>"
       title="<?php echo __("Jetzt anmelden", "lauch"); ?>">
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
      <?php render_svg("/images/events/Anmeldung.svg"); ?>
    </a>
  </div>
</div>
<?php endif; ?>

<section class="c-page-section">
  <div class="c-event-video">
    <div class="col-m">
      <h2><?php the_field('event_how_title'); ?></h2>
      <div><?php the_field('event_how_text'); ?></div>
      <?php
      $the_query = new WP_Query( array(
        'post_type' => 'exchange',
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
          array (
            'taxonomy' => 'exchange-program',
            'field' => 'slug',
            'terms' => get_the_terms(get_the_ID(), 'exchange-program')[0]->slug,
          )),
      ));

      if ( $the_query->have_posts() ): ?>
        <div class="c-event-throwback">
          <h3><?php echo __('Vergangene'); ?> <?php echo get_the_terms(get_the_ID(), 'exchange-program')[0]->name;  ?></h3>
          <ol>
            <?php
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
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
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php the_field('event_how_video'); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="So ist Auf Reisen"></iframe>
        <noscript>Kein JavaScript? <a href="https://www.youtube-nocookie.com/watch?v=<?php the_field('event_how_video'); ?>">Sieh dir das Video hier an!</a></noscript>
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

<section class="c-page-section p-r">
  <div class="c-page-2col jc-sb ai-e">
    <div class="col-l">
      <h2 class="mt-2"><?php the_field('event_support_title'); ?></h2>
      <div><?php the_field('event_support_text'); ?></div>
    </div>
    <div class="col-xs c-event-illu--large">
      <img src="<?php the_field('event_support_illustration'); ?>" alt="">
    </div>
  </div>
  <div class="c-page-section pb-2 mt-2 white">
    <ul class="c-list-displayitems pt-2">
      <?php if( have_rows('partner') ):
      while( have_rows('partner') ): the_row(); ?>
        <?php
        $image = wp_get_attachment_image_src(get_sub_field('partner_img'), 'partner-teaser'); ?>
        <li class="c-displayitem mr-2">
          <a href="<?php the_sub_field('partner_link'); ?>"
             title="Zur Website von <?php the_sub_field('partner_name'); ?> "
             class="hover-line-trigger">
            <img src="<?php echo $image[0] ?>" alt="" class="white">
            <p class="c-displayitem-title">
              <span class="hover-line"><?php the_sub_field('partner_name'); ?></span>
            </p>
          </a>
        </li>
      <?php endwhile;
      endif; ?>
    </ul>
  </div>
</section>


<script>
 var mymap = L.map('map').setView([<?php the_field('event_lat'); ?>,
                                   <?php the_field('event_lon'); ?>], 15);
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
 var marker = L.marker([<?php the_field('event_lat'); ?>,
                        <?php the_field('event_lon'); ?>], {icon: customMarker})
               .addTo(mymap);
</script>
