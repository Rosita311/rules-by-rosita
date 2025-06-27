<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
    <?php get_template_part('template-parts/page-hero'); ?>
    <section class="entry-content">
        404.php
          <div class="search-form-container">
            <h2>Deze pagina bestaat niet</h2>
            <p>
              De pagina die je zoekt bestaat niet of is verwijderd. Misschien
              kun je het vinden via de zoekfunctie hieronder.
            </p>
            <form
              action="#"
              method="post"
              class="search-form"
            >
              <label for="email">Zoeken</label>
              <div class="search-form-row">
                <input
                  type="email"
                  id="email"
                  name="email"
                  required
                  placeholder="Zoeken..."
                />
                <button
                  type="submit"
                  class="btn btn-secondary footer-btn"
                >
                  Zoeken
                </button>
              </div>
            </form>
          </div>
          <div class="error-image">
            <img
              src="./assets/error-image.jpg"
              alt="404 pagina niet gevonden afbeelding"
              loading="lazy"
              width="600"
              height="400"
            />
          </div>
        </section>
</main>
<?php get_footer(); ?>