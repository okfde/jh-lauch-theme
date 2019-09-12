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
        <footer class="l-footer c-footer">
          <section class="c-footer-menu">
            <h3>Das Programm</h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-1',
	      'menu_id'        => 'foote-menu-1',
              'menu_class'     => '',
              'container'      => 'nav'
	    ) );
	    ?>
          </section>
          <section  class="c-footer-menu">
            <h3>Für Mentor*innen</h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-2',
	      'menu_id'        => 'foote-menu-2',
              'menu_class'     => '',
              'container'      => 'nav'
	    ) );
	    ?>
          </section>
          <section  class="c-footer-menu">
            <h3>Für Teilnehmer*innen</h3>
            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-footer-3',
	      'menu_id'        => 'foote-menu-3',
              'menu_class'     => '',
              'container'      => 'nav'
	    ) );
	    ?>
          </section>

          <section  class="c-footer-support">
            <div class="support-illustration">
              <?php get_template_part('images/illustrations', 'freundeskreis.svg' ); ?>
            </div>
            <div class="support-cta">
              <p>Werde Mitglied im Jugend hackt-Freundes und unterstütze junge Menschen dabei, mit Code die Welt zu verbessern.</p>
              <p><a href="<?php echo get_theme_mod('support_link', 'https://freundeskreis.jugendhackt.org'); ?> " class="link-cta"><?php echo __('Jetzt unterstützen!', 'lauch'); ?></a></p>
            </div>
          </section>
        </footer>
        <?php wp_footer(); ?>
</body>
</html>
