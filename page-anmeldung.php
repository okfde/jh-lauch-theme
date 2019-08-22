<?php
/**
 * Template Name: 1 Anmeldung Test
 */

get_header();
?>
<link rel="stylesheet" type="text/css" href="https://anmeldung.jugendhackt.org/vernetztewelten/2019-busan-tokio/widget/v1.css">
<script type="text/javascript" src="https://anmeldung.jugendhackt.org/widget/v1.de-informal.js" async></script>


<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'page' );

    // get_template_part( 'template-parts/children', 'event' );

    endwhile; // End of the loop.
    ?>

    <pretix-button event="https://anmeldung.jugendhackt.org/vernetztewelten/2019-busan-tokio/" items="item_13=1">
      Buy ticket!
    </pretix-button>



    <pretix-widget event="https://anmeldung.jugendhackt.org/vernetztewelten/2019-busan-tokio/"></pretix-widget>
    <noscript>
      <div class="pretix-widget">
        <div class="pretix-widget-info-message">
          JavaScript ist in deinem Browser deaktiviert. Um unseren Ticket-Shop ohne JavaScript aufzurufen, klicke bitte <a target="_blank" rel="noopener" href="https://anmeldung.jugendhackt.org/vernetztewelten/2019-busan-tokio/">hier</a>.
        </div>
      </div>
    </noscript>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
