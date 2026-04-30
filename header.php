<!DOCTYPE html>
<html
  <?php language_attributes(); ?>
  class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="15ORyHR-XnE6rDeRBDe6XV9PvnyeV-gERiOHh-wnhOQ" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <a
    href="#main-content"
    class="skip-link">Sla het menu over</a>
  <a
    href="#accessibility-settings"
    class="skip-link skip-link--accessibility">Ga naar toegankelijkheidsinstellingen</a>
  <header>
    <div class="site-header__container">
      <a
        href="<?php echo esc_url(home_url('/')); ?>"
        id="top" aria-label="Rules by Rosita logo, ga naar de homepage">
        <?php get_template_part('template-parts/logo'); ?>
      </a>
      <div class="site-header__nav">
        <button
          class="btn--icon-small"
          id="open-sidebar-button"
          onclick="openSidebar()"
          aria-label="Open menu"
          aria-expanded="false"
          aria-controls="header-nav">
         <?php echo rules_by_rosita_icon('menu'); ?>
        </button>
        <nav id="header-nav"
          class="<?php echo rules_by_rosita_is_menu_open() ? 'is-open' : ''; ?>"
          aria-label="Hoofdmenu"
          tabindex="-1">
          <ul>
            <li>
              <button
                class="btn--icon-small"
                id="close-sidebar-button"
                onclick="closeSidebar()"
                aria-label="Sluit menu">
                <?php echo rules_by_rosita_icon('x'); ?>
              </button>
            </li>
          </ul>
          <?php
          wp_nav_menu([
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => '',
            'items_wrap' => '<ul>%3$s</ul>',
            'walker' => new Rules_by_rosita_Walker_Nav_Menu()
          ]);
          ?>

        </nav>
        <div class="site-header__buttons">
          <a
            href="<?php echo esc_url(add_query_arg('menu', '1')); ?>#header-nav"
            id="menu-open-toggle-no-js"
            class="btn btn--icon-small">
            <span class="sr-only">Open menu</span>
            <?php echo rules_by_rosita_icon('menu'); ?>
          </a>
          <a
            href="<?php echo esc_url(remove_query_arg('menu')); ?>"
            class="btn btn--icon-small"
            id="menu-close-toggle-no-js"
            aria-label="Sluit menu">
            <?php echo rules_by_rosita_icon('x'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/')); ?>?s="
            aria-label="Open zoekfunctie"
            class="search-button btn--icon-small"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="search-overlay"
            id="search-toggle">
            <?php echo rules_by_rosita_icon('search'); ?>
          </a>
          <button
            id="theme-switch"
            class="btn--icon-small">
            <?php echo rules_by_rosita_icon('moon'); 
            echo rules_by_rosita_icon('sun'); ?>
          </button>
        </div>
      </div>
    </div>
    <div
      id="overlay"
      onclick="closeSidebar()"
      aria-hidden="true">
    </div>
    <?php get_template_part('template-parts/search-overlay'); ?>
  </header>
