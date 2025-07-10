<!-- Zoek Overlay -->
<section
  id="search-overlay"
  class="search-overlay"
  role="dialog"
  aria-modal="true"
  aria-labelledby="search-label"
  hidden>
  <div class="search-overlay-inner" tabindex="-1">

    <button
      id="close-search"
      class="btn-icon-small"
      aria-label="Sluit zoekfunctie">
      <svg
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icon-tabler-x">
        <path
          stroke="none"
          d="M0 0h24v24H0z"
          fill="none" />
        <path d="M18 6L6 18M6 6l12 12" />
      </svg>
    </button>
  </div>
  <?php get_search_form(); ?>

</section>