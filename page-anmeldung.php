<?php
/**
 * Template Name: 1 Anmeldung Test
 */

$pretix_event_link = get_field("link_pretix_event");

if ($pretix_event_link) {
  wp_enqueue_script( "pretix-widget-script", "https://anmeldung.jugendhackt.org/widget/v1.de-informal.js");
  wp_enqueue_style( "pretix-widget-style", $pretix_event_link . "/widget/v1.css");
}

get_header();
?>


<div id="primary" class="content-area page-signup">

    <div class="c-copy">
      <?php
      while ( have_posts() ) :
      the_post();

      get_template_part( 'template-parts/content', get_post_type() );

      endwhile; // End of the loop.
      ?>
    </div>
    <?php
    if ($pretix_event_link) : ?>
      <div class="pretix-widget-compat" event="<?php echo $pretix_event_link; ?>"></div>
      <noscript>
        <div class="pretix-widget">
          <div class="pretix-widget-info-message">
            JavaScript ist in deinem Browser deaktiviert. Um die Anmeldung ohne JavaScript aufzurufen, klicke bitte <a target="_blank" rel="noopener" href="<?php echo $pretix_event_link; ?>">hier</a>.
          </div>
        </div>
      </noscript>
    <?php endif ?>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
