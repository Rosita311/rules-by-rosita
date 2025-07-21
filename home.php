<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <?php get_template_part('template-parts/page-hero'); ?>
  <div class="container-main">
    <section class="blogpost-section">
      <p>home.php</p>
      <ul class="blog-listing-grid">
        <?php
        if (have_posts()) :
          // Loop through posts
          while (have_posts()) : the_post();
            get_template_part('template-parts/card');
          endwhile; ?>
        <?php else : ?>
          <p>Geen berichten gevonden.</p>
        <?php endif; ?>
      </ul>
      <?php get_template_part('template-parts/pagination'); ?>
    </section>
    <?php get_template_part('template-parts/back-to-top'); ?>
  </div>
</main>
<?php get_footer(); ?>