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
                    Het lijkt erop dat de pagina die je zoekt niet (meer) bestaat. Misschien heb je een typefout gemaakt, of is de pagina verhuisd.
                </p>
                <p>Hier zijn een paar dingen die je kunt doen:</p>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Terug naar de homepage</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Neem contact op met ons</a></li>
                    <li>Gebruik de zoekfunctie hieronder:</li>
                </ul>
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-form">
                    <label for="search">Zoeken</label>
                    <div class="search-form-row">
                        <input
                            type="search"
                            id="search"
                            name="s"
                            placeholder="Waar ben je naar op zoek?"
                            required
                            aria-label="Zoekterm"
                        />
                        <button type="submit" class="btn btn-secondary footer-btn">
                            Zoeken
                        </button>
                    </div>
                </form>
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
            <div class="button-wrapper">
                <a class="btn btn-secondary" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Bekijk alle blogposts</a>
            </div>
        </section>
    <div class="error-image">
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/error-image.jpg"
                    alt="Illustratie van een verdwaalde weg of foutmelding"
                    loading="lazy"
                    width="800"
                    height="600"
                />
            </div>
        <?php get_template_part('template-parts/back-to-top'); ?>
    </div>
</main>
<?php get_footer(); ?>