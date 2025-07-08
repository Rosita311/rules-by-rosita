<section class="hero-section page-hero dotted-background-pink">
  <div class="page-hero-content">
    <div class="page-title">
      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<nav aria-label="Kruimelpad" class="breadcrumbs">', '</nav>');
      }
      ?>
      <h1><?php
          if (is_home()) {
            echo 'Alle blogposts';
          } elseif (is_archive()) {
            the_archive_title();
          } elseif (is_search()) {
            $search_query = get_search_query();
             if (trim($search_query) === '') {
              echo 'Zoekresultaten';
             } else {
              echo 'Zoekresultaten voor: ' . get_search_query();
             }
          } elseif (is_404()) {
            echo 'Pagina niet gevonden';
          } else {
            the_title();
          }
          ?></h1>
    </div>
  </div>
</section>