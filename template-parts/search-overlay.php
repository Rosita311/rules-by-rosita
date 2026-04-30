<!-- Zoek Overlay -->
<section
  id="search-overlay"
  class="search-overlay"
  role="dialog"
  aria-modal="true"
  aria-labelledby="search-label"
  hidden
  inert>
  <?php get_search_form(); ?>
    <div class="search-overlay__inner" tabindex="-1">
    <button
      id="close-search"
      class="btn--icon-small"
      aria-label="Sluit zoekfunctie">
      <?php echo rules_by_rosita_icon('x'); ?>
    </button>
  </div>
</section>