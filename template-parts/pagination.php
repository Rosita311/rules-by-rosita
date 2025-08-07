<?php
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
      ['<a class=" btn btn-icon-large"', '<span class=" btn btn-icon-large"'],
      paginate_links([
        'prev_text' => '
      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M15 6l-6 6l6 6" />
      </svg>
      <span aria-label="Vorige pagina">Vorige</span>',
        'next_text' => '
      <span aria-label="Volgende pagina">Volgende</span>
      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
<?php
if ( have_posts() ) {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '« Vorige',
        'next_text' => 'Volgende »',
        'screen_reader_text' => 'Paginanavigatie',
    ) );
}

if ( have_posts() ) {
the_posts_pagination([
  'mid_size' => 2,
  'prev_text' => '
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-left">
      <path d="M15 6l-6 6 6 6"/>
    </svg>
    <span aria-label="Vorige pagina">Vorige</span>',
  'next_text' => '
    <span aria-label="Volgende pagina">Volgende</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-right">
      <path d="M9 6l6 6-6 6"/>
    </svg>',
]);

}
?>