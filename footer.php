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
            <?php get_template_part( 'template-parts/support-cta-footer', get_post_type() ); ?>
          </section>


        </footer>
        <?php wp_footer(); ?>
</body>
</html>
