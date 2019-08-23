<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lauch
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="site">
      <a class="skip show-on-focus" href="#content"><?php esc_html_e( 'Skip to content', 'lauch' ); ?></a>

      <header class="l-header" id="masthead">
        <nav class="c-nav c-topnav l-inner" id="site-navigation">
          <input type="checkbox" id="menu-toggle"
                 class="c-nav-toggle a11y-visuallyhidden"
                 tabindex=0>
          <label for="menu-toggle" class="c-nav-label no-text"
                 title="Menü öffnen"
                 aria-label="Menü öffnen">
            <span></span>
            <span></span>
            <span></span>
          </label>

          <?php
	  if ( is_front_page() && is_home() ) :
	  ?>
	    <h1 class="c-nav-logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                 class="no-text"
                 style="background-image: url(<?php echo get_header_image(); ?>">
                <?php bloginfo( 'name' ); ?>
              </a>
            </h1>
	  <?php
	  else :
	  ?>
             <p class="c-nav-logo">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                     class="no-text"
                     style="background-image: url(<?php echo get_header_image(); ?>">
                    <?php bloginfo( 'name' ); ?>
                  </a>
             </p>
	  <?php
	  endif; ?>

            <?php
	    wp_nav_menu( array(
	      'theme_location' => 'menu-main',
	      'menu_id'        => 'primary-menu',
              'menu_class'     => 'c-nav-items c-list-pointless',
              'container'      => false
	    ) );
	    ?>

          <input type="checkbox" id="search-toggle"
                 class="c-search-toggle a11y-visuallyhidden"
                 tabindex=0>
          <label for="search-toggle" class="c-search-label"
                 title="Suche öffnen"
                 aria-label="Suche öffnen"></label>
          <div class="c-search">
            <div class="c-search-inner">
              <form action="/suche" class="c-search-bottomline">
                <input type="text" id="search-input" placeholder="Wonach suchst du?" class="c-search-input">
                <label for="search-input" class="a11y-visuallyhidden">Suche</label>
                <input type="submit" value="Suche" class="c-search-submit">

                <div class="c-search-illustration">
                  <?php get_template_part('images/illustrations', 'search.svg' ); ?>
                </div>
              </form>

            </div>
          </div>

        </nav>
      </header>
      <main id="content" class="site-content">
        <p class="site-title">Mit <span id="revolving-claims"></span><noscript>Code</noscript> die Welt verbessern</p>
