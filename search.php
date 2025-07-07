<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
    <?php get_template_part('template-parts/page-hero'); ?>
    <div class="container-main">
        <p>search.php</p>
        <section class="entry-content" aria-label="Zoekresultaten">
            <?php get_search_form(); ?>
        </section>
        <section class="blogpost-section">
            <?php if (have_posts()) : ?>
                <ul class="search-results">
                    <?php while (have_posts()) : the_post();
                        $post_id = get_the_ID();
                        get_template_part('template-parts/card');
                    endwhile; ?>
                </ul>
            <?php else : ?>
                <p>Geen resultaten gevonden. Probeer een andere zoekterm.</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </section>
        <?php get_template_part('template-parts/back-to-top'); ?>
    </div>
</main>
<?php get_footer(); ?>