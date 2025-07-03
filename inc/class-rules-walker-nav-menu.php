<?php

class Rules_Walker_Nav_Menu extends Walker_Nav_Menu
{
  private $current_item;

  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
  {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $has_children = in_array('menu-item-has-children', $classes);
    $is_current = in_array('current-menu-item', $classes);
    $active_class = $is_current ? 'aria-current="page"' : '';

    $submenu_id = $has_children ? 'submenu-' . $item->ID : '';

    // Sla huidig item op zodat start_lvl() dit weet
    $this->current_item = $item;

    $output .= '<li' . ($has_children ? ' class="has-submenu"' : '') . '>';

    if ($has_children) {
      $output .= '<button class="submenu-toggle"';
      $output .= ' aria-haspopup="true"';
      $output .= ' aria-expanded="false"';
      $output .= ' aria-controls="' . esc_attr($submenu_id) . '">';
      $output .= esc_html($item->title);
      $output .= '<span class="sr-only"> submenu openen</span>';
      $output .= '<span class="chevron" aria-hidden="true">';
      $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>';
      $output .= '</span>';
      $output .= '</button>';
    } else {
      $output .= '<a href="' . esc_url($item->url) . '" ' . $active_class . '>';
      $output .= esc_html($item->title);
      if ($is_current) {
        $output .= '<span class="sr-only">(huidige pagina)</span>';
      }
      $output .= '</a>';
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = [])
  {
    $output .= '</li>';
  }

  function start_lvl(&$output, $depth = 0, $args = [], $id = 0)
  {
    $submenu_id = 'submenu-' . $this->current_item->ID;
    $output .= '<ul class="submenu" id="' . esc_attr($submenu_id) . '" aria-hidden="true" tabindex="-1">';
  }

  function end_lvl(&$output, $depth = 0, $args = [])
  {
    $output .= '</ul>';
  }
}
