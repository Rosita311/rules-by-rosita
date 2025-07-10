<?php
// Toon paginatie alleen als er meerdere pagina's zijn
global $wp_query;

if ($wp_query->max_num_pages <= 1) {
    return;
}
?>

<nav class="pagination" aria-label="Pagina navigatie">
  <ul class="pagination-list">
    <?php
    echo str_replace(
      ['<a', '<span'],
      ['<a class="btn-icon-large"', '<span class="btn-icon-large"'],
      paginate_links([
        'prev_text' => '
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M15 6l-6 6l6 6" />
      </svg>
      <span>Vorige</span>',
        'next_text' => '
      <span>Volgende</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M9 6l6 6l-6 6" />
      </svg>',
        'type' => 'list',
        'mid_size' => 2,
        'end_size' => 1,
      ])
    );
    ?>
  </ul>
</nav>

