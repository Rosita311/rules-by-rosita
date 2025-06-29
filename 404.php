<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
    <?php get_template_part('template-parts/page-hero'); ?>
    <div class="container-main">
        404.php
        <section class="entry-content">
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
              src="<?php echo get_template_directory_uri(); ?>/assets/images/error-image.jpg"
              alt="404 pagina niet gevonden afbeelding"
              loading="lazy"
              width="600"
              height="400"
            />
          </div>
        </section>
        <?php get_template_part('template-parts/back-to-top'); ?>
    </div>
</main>
<?php get_footer(); ?>