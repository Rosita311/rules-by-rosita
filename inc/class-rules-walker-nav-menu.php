<?php

class Rules_Walker_Nav_Menu extends Walker_Nav_Menu {
  // Start van elk menu item
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $has_children = in_array('menu-item-has-children', $classes);
    $active_class = in_array('current-menu-item', $classes) ? 'aria-current="page"' : '';

    $output .= '<li' . ( $has_children ? ' class="has-submenu"' : '' ) . '>';

    if ($has_children) {
      // Gebruik <button> voor submenu toggle
      $output .= '<button aria-haspopup="true" aria-expanded="false" aria-controls="submenu-' . $item->ID . '" class="submenu-toggle">';
      $output .= esc_html($item->title);
      $output .= '<span class="chevron" aria-hidden="true">';
      $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>';
      $output .= '</span>';
      $output .= '</button>';
    } else {
      $output .= '<a href="' . esc_url($item->url) . '" ' . $active_class . '>';
      $output .= esc_html($item->title);
      if ($active_class) {
        $output .= '<span class="sr-only">(huidige pagina)</span>';
      }
      $output .= '</a>';
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = []) {
    $output .= '</li>';
  }

  function start_lvl(&$output, $depth = 0, $args = []) {
    $output .= '<ul class="submenu" id="submenu-' . uniqid() . '">';
  }

  function end_lvl(&$output, $depth = 0, $args = []) {
    $output .= '</ul>';
  }
}

