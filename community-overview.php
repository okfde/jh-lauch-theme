<?php
/**
 * Template Name: Community-Seite
 * Neu gebaut von Philip im April 2020 aus single-lab.php
 */

$include_ids = array( 13511 ); // id of the "lab" to be shown (being the "community")

 $args = array(
 	'post_type' => 'lab',
 	'post__in' => $include_ids
 );
 $community_query = new WP_Query( $args );

get_header();

while ( $community_query->have_posts() ) :
$community_query->the_post(); ?>
<?php
endwhile; ?>

<header class="c-page-alpaca-header">
  <div class="c-page-alpaca-featured medium-up as-s p-r">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-alpaka'); ?>"
         alt="" class="clip-alpaka" >
    <div class="c-page-alpaca-friend">
      <?php
      $svg = get_random_illustration();
      echo replace_svg_css_class_fill(get_svg_content($svg),
                                      "changecolor",
                                      "event-". get_the_ID() ."-" . $svg,
                                      get_field('event_color')); ?>
    </div>
  </div>
  <div class="c-page-alpaca-title">
    <?php the_title('<h1 class="c-page-title pt-1">', '</h1>')?>
    <div class="c-page-excerpt">
      <?php the_content(); ?>
    </div>
  </div>
  <?php if (get_field('illustration_right')) : ?>
    <div class="c-page-header-illustration right-top">
      <img src="<?php the_field('illustration_right'); ?>" alt="" width="200">
    </div>
  <?php endif; ?>
</header>


<section class="c-page-section pb-2 mt-2 white addon--relative">
  <span class="addon addon--small addon--right addon--top addon--catdog sm-only"></span>
  <div class="event-teaser-list">
    <h2 class="event-teaser-list-title addon--relative">
      <?php echo __('Die nächsten Termine', 'lauch') ?>
      <span class="d-b mt-2 addon addon--small addon--catdog sm-up"></span></h2>
    <?php if( have_rows('lab_events') ): ?>

    <ul class="event-teaser-list-wrapper c-page-content">
      <?php while( have_rows('lab_events') ): the_row(); ?>

          <?php get_template_part('template-parts/event', 'lab') ?>
        <?php endwhile ?>
    </ul>
    <?php endif ?>
  </div>
</section>

<section class="c-page-section pb-0 c-page-center addon--relative addon addon--large addon--l-0 addon--top addon--octopus">
  <h2 class="ta-c c-event-title"><?php echo __("Über die Online-Community", "lauch"); ?></h2>
  <div class="c-page-standard ai-c c-event-info">
    <div class="col-l c-event-overview">
      <?php the_field('event_facts'); ?>
    </div>    
  </div>
</section>

<?php get_template_part('template-parts/partner', 'lab') ?>

<script>
 document.querySelector('html').style.setProperty("--event-single-color", "<?php echo the_field('event_color'); ?>");
</script>

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


<?php
get_footer();
