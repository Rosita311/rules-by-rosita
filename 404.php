<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <?php get_template_part('template-parts/page-hero'); ?>
  <div class="container-main">
    404.php
    <section class="entry-content">
      <div class="not-found-content-wrapper">
        <div class="not-found-content">
          <h2>Oeps! Deze pagina bestaat niet</h2>
          <p>
            De pagina die je probeert te openen is verhuisd, verwijderd of heeft nooit bestaan.
          </p>
          <div class="not-found-actions">
            <div class="action-card">
              <h3>Terug naar de homepage</h3>
              <p><a href="<?php echo esc_url(home_url('/')); ?>">Ga terug naar de homepage</a> en begin opnieuw.</p>
            </div>

            <div class="action-card">
              <h3>Vragen?</h3>
              <p>Neem gerust <a href="<?php echo esc_url(home_url('/contact')); ?>">contact met mij op</a> als je iets mist of hulp nodig hebt.</p>
            </div>

            <div class="action-card">
              <h3>Iets anders zoeken</h3>
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
        <div class="not-found-image-wrapper">
          <div class="not-found-image dotted-background-blue">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/404-image.png'); ?>"
              alt="Illustratie van een 404 foutmelding met een verkeerspilon en een waarschuwingsbord"
              loading="lazy"
              width="400"
              height="400" />
          </div>
        </div>
      </div>
    </section>
    <section class="blogpost-section">
      <h2>Recente blogposts</h2>
      <ul class="blog-listing-grid">
        <?php
        $page_not_found_query = new WP_Query([
          'posts_per_page' => 3,
          'post_type' => 'post',
        ]);
        if ($page_not_found_query->have_posts()) :
          // Loop through posts
          while ($page_not_found_query->have_posts()) : $page_not_found_query->the_post();
            $post_id = get_the_ID();
            get_template_part('template-parts/card');
          endwhile;
        ?>
          <nav class="pagination">
            <?php
            // Simple previous/next pagination
            previous_posts_link('&laquo; Vorige');
            next_posts_link('Volgende &raquo;');
            ?>
          </nav>
        <?php
        else : ?>
          <p>Geen berichten gevonden.</p>
        <?php endif; ?>
      </ul>
      <div class="button-wrapper">
        <a class="btn btn-secondary" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Bekijk alle blogposts</a>
      </div>
    </section>
    <?php get_template_part('template-parts/back-to-top'); ?>
  </div>
</main>
<?php get_footer(); ?>