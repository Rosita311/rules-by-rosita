<?php
global $wp_query;

if ($wp_query->max_num_pages <= 1) {
    return;
}
?>

<nav class="pagination" aria-label="Pagina navigatie">
  <div class="pagination__list">
    <?php
    echo str_replace(
      ['<a', '<span'],
      ['<a class=" btn btn--icon-large"', '<span class=" btn btn--icon-large"'],
      paginate_links([
        'prev_text' => rules_by_rosita_icon('chevron-left') . '<span>Vorige</span>',
        'next_text' => '<span>Volgende</span>' . rules_by_rosita_icon('chevron-right'),
        'type' => 'list',
        'mid_size' => 2,
        'end_size' => 1,
      ])
    );
    ?>
  </div>
</nav>
