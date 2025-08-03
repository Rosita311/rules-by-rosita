<!DOCTYPE html>
<html
  <?php language_attributes(); ?>
  class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Tracking -->
  <meta name="google-site-verification" content="15ORyHR-XnE6rDeRBDe6XV9PvnyeV-gERiOHh-wnhOQ" />
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-658J5D97BN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-658J5D97BN');
</script>
  <!-- Einde tracking -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <a
    href="#main-content"
    class="skip-link">Sla het menu over</a>
  <a
    href="#accessibility-settings"
    class="skip-link">Ga naar toegankelijkheidsinstellingen</a>
  <header>
    <div class="header-container">
      <a
        href="<?php echo esc_url(home_url('/')); ?>"
        id="top" aria-label="Rules by Rosita logo, ga naar de homepage">
        <?php get_template_part('template-parts/logo'); ?>
      </a>
      <div class="menu-items">
        <button
          class="btn-icon-small"
          id="open-sidebar-button"
          onclick="openSidebar()"
          aria-label="Open menu"
          aria-expanded="false"
          aria-controls="header-nav">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
            <path
              stroke="none"
              d="M0 0h24v24H0z"
              fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l16 0" />
          </svg>
        </button>
        <nav id="header-nav" aria-label="Hoofdmenu">
          <ul>
            <li>
              <button
                class="btn-icon-small"
                id="close-sidebar-button"
                onclick="closeSidebar()"
                aria-label="Sluit menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M18 6l-12 12" />
                  <path d="M6 6l12 12" />
                </svg>
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
        <div class="menu-buttons">
          <a href="<?php echo esc_url(home_url('/')); ?>?s="
            aria-label="Open zoekfunctie"
            class="search-button btn-icon-small"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="search-overlay"
            id="search-toggle">
            <svg
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-search">
              <path
                stroke="none"
                d="M0 0h24v24H0z"
                fill="none" />
              <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
              <path d="M21 21l-6 -6" />
            </svg>
          </a>
          <button
            id="theme-switch"
            class="btn-icon-small">
            <svg
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-moon">
              <path
                stroke="none"
                d="M0 0h24v24H0z"
                fill="none" />
              <path
                d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
            </svg>
            <svg
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-sun">
              <path
                stroke="none"
                d="M0 0h24v24H0z"
                fill="none" />
              <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
              <path
                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
            </svg>
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
  