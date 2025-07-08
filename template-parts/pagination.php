<?php
// Toon paginatie alleen als er meerdere pagina's zijn
global $wp_query;

if ($wp_query->max_num_pages <= 1) {
    return;
}
?>

<nav class="pagination" aria-label="Pagina navigatie">
  <?php
  echo paginate_links([
    'prev_text' => '&laquo; Vorige',
    'next_text' => 'Volgende &raquo;',
    'mid_size'  => 2,
    'end_size'  => 1,
    'type'      => 'list',
  ]);
  ?>
</nav>
