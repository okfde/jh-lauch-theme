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

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri() ?>/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

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
                 style="background-image: url(<?php echo get_header_image(); ?>)">
                <?php bloginfo( 'name' ); ?>
              </a>
            </h1>
	  <?php
	  else :
	  ?>
             <p class="c-nav-logo">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                     class="no-text"
                     style="background-image: url(<?php echo get_header_image(); ?>)">
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

          <?php get_search_form(); ?>

        </nav>
      </header>
      <main id="content" class="l-main site-content">
