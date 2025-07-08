<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
    <?php get_template_part('template-parts/page-hero'); ?>
    <div class="container-main">
        <p>search.php</p>
        <noscript>
            <section class="entry-content" aria-label="Zoekresultaten">
                <?php get_search_form(); ?>
            </section>
        </noscript>
        <section class="blogpost-section">
            <?php if (have_posts()) : ?>
                <ul class="search-results blog-listing-grid">
                    <?php while (have_posts()) : the_post();
                        $post_id = get_the_ID();
                        if (get_post_type() === 'page') {
                            get_template_part('template-parts/card-page');
                        } else {
                            get_template_part('template-parts/card');
                        }
                    endwhile; ?>
                </ul>
            <?php else : ?>
                <h2>Niets gevonden</h2>
                <p>Er kwam niets overeen met je zoektermen. Probeer het nog eens met andere zoektermen.</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </section>
        <?php get_template_part('template-parts/back-to-top'); ?>
    </div>
</main>
<?php get_footer(); ?>