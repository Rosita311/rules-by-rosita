<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <?php get_template_part('template-parts/page-hero'); ?>
  <div class="container-main">
    <section class="entry-content">
          <?php the_content(); ?>
        </section>
    <?php get_template_part('template-parts/back-to-top'); ?>
  </div>
</main>
<?php get_footer(); ?>

<!-- https://developer.wordpress.org/themes/basics/template-files/ -->