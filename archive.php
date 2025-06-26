<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <?php get_template_part('template-parts/page-hero'); ?>
  <div class="container-main">
    <section class="blogpost-section">
        <p>archive.php</p>
      <ul class="blog-listing-grid">
        <?php
        if (have_posts()) :
          // Loop through posts
          while (have_posts()) : the_post();
            get_template_part('template-parts/card');
          endwhile; ?>
          <nav class="pagination">
            <?php
            // Simple previous/next pagination
            previous_posts_link('&laquo; Vorige');
            next_posts_link('Volgende &raquo;');
            ?>
          </nav>

        <?php else : ?>
          <p>Geen berichten gevonden.</p>
        <?php endif; ?>
      </ul>
    </section>
    <?php get_template_part('template-parts/back-to-top'); ?>
  </div>
</main>
<?php get_footer(); ?>