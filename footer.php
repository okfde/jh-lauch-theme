<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lauch
 */

?>

	</main><!-- #content -->

        <?php get_template_part( 'template-parts/newsletter-footer', get_post_type() ); ?>

        <footer class="l-footer c-footer">
          <section class="c-footer-menu">
            <h3><?php echo __("Das Programm", "lauch"); ?></h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-1',
	      'menu_id'        => 'footer-menu-1',
              'menu_class'     => '',
              'container'      => 'nav',
              'link_before'    => '<span class="hover-line">',
              'link_after'     => '</span>'
	    ) );
	    ?>
          </section>
          <section  class="c-footer-menu">
            <h3><?php echo __("Für Teilnehmer*innen", "lauch"); ?></h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-2',
	      'menu_id'        => 'footer-menu-2',
              'menu_class'     => '',
              'container'      => 'nav',
              'link_before'    => '<span class="hover-line">',
              'link_after'     => '</span>'
	    ) );
	    ?>
          </section>
          <section  class="c-footer-menu">
            <h3><?php echo __("Für Mentor*innen", "lauch"); ?></h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-3',
	      'menu_id'        => 'footer-menu-3',
              'menu_class'     => '',
              'container'      => 'nav',
              'link_before'    => '<span class="hover-line">',
              'link_after'     => '</span>'
	    ) );
	    ?>
          </section>

          <section  class="c-footer-support">
            <?php get_template_part( 'template-parts/support-cta-footer', get_post_type() ); ?>
          </section>

          <div  class="c-footer-partner">
            <p><?php echo __("Jugend hackt ist ein Programm von", "lauch"); ?></p>
            <a href="https://okfn.de" target="_blank" title="Open Knowledge Foundation Deutschland e.V.">
              <?php get_template_part('images/logos', 'okfn.svg' ); ?></a>
            <a href="https://medialepfade.org" target="_blank" title="mediale pfade.org - Verein für Medienbildung">
              <img src="<?php echo get_template_directory_uri(); ?>/images/mp.png" width="130" alt="mediale pfade.org - Verein für Medienbildung"></a>
          </div>

          <aside class="c-footer-tracking">
            <?php get_template_part( 'template-parts/tracking-notice-footer', get_post_type() ); ?>
          </aside>
        </footer>
        <?php wp_footer(); ?>


        <!-- Matomo -->
        <script type="text/javascript">
         var _paq = window._paq || [];
         /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
         _paq.push(['trackPageView']);
         _paq.push(['enableLinkTracking']);
         (function() {
           var u="//traffic.okfn.de/";
           _paq.push(['setTrackerUrl', u+'matomo.php']);
           _paq.push(['disableCookies']);
           _paq.push(['setSiteId', '28']);
           var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
           g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
         })();
        </script>
        <!-- End Matomo Code -->

</body>
</html>
