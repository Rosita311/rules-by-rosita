<?php
class Rules_Walker_Nav_Menu extends Walker_Nav_Menu {

  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $submenu_id = 'submenu-' . uniqid();
    $output .= "\n$indent<ul id=\"$submenu_id\" class=\"submenu\">\n";
  }

  public function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "$indent</ul>\n";
  }

  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $has_children = in_array('menu-item-has-children', $classes);
    $title = apply_filters( 'the_title', $item->title, $item->ID );
    $url = $item->url ? esc_url( $item->url ) : '#';
    $output .= '<li class="' . esc_attr( implode(' ', $classes) ) . '">';

    if ( $has_children ) {
      $submenu_id = 'submenu-' . uniqid();
      $output .= '<button class="submenu-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="' . esc_attr($submenu_id) . '">';
      $output .= esc_html( $title );
      $output .= '<span class="chevron" aria-hidden="true">';
      $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>';
      $output .= '</span>';
      $output .= '</button>';
    } else {
      $output .= '<a href="' . $url . '"';
      if ( $item->current ) {
        $output .= ' aria-current="page"';
      }
      $output .= '>';
      $output .= esc_html( $title );
      if ( $item->current ) {
        $output .= '<span class="sr-only">(huidige pagina)</span>';
      }
      $output .= '</a>';
    }
  }

  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}
