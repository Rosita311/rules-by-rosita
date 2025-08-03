<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
    <section class="hero-section">
        <div class="hero-content dotted-background-pink">
            <ul class="hero-listing">
                <?php
                // Query for the hero post
                $hero_query = new WP_Query([
                    'posts_per_page' => 1, // Limit to one post for the hero section
                    'post_type' => 'post', // Ensure we're querying posts
                ]);
                if ($hero_query->have_posts()) :
                    // Loop through posts
                    while ($hero_query->have_posts()) : $hero_query->the_post();
                        $post_id = get_the_ID();
                        get_template_part('template-parts/hero-card');
                    endwhile;
                else : ?>
                    <p>Geen berichten gevonden.</p>
                <?php endif; ?>
            </ul>
        </div>
    </section>
    <div class="container-main">
        <?php get_template_part('template-parts/introduction'); ?>
        <section class="blogpost-section">
            <h2>Recente blogposts</h2>
            <ul class="blog-listing-grid">
                <?php
                $home_query = new WP_Query([
                    'posts_per_page' => 6,
                    'offset' => 1, // Skip the first post for the hero section
                    'post_type' => 'post',
                ]);
                if ($home_query->have_posts()) :
                    // Loop through posts
                    while ($home_query->have_posts()) : $home_query->the_post();
                        $post_id = get_the_ID();
                        get_template_part('template-parts/card');
                    endwhile; ?>
                <?php else : ?>
                    <p>Geen berichten gevonden.</p>
                <?php endif; ?>
            </ul>
            <?php get_template_part('template-parts/pagination'); ?>
            <div class="button-wrapper">
                <a class="btn btn-secondary" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Bekijk alle blogposts</a>
            </div>
        </section>
        <?php get_template_part('template-parts/back-to-top'); ?>
    </div>
</main>
<?php get_footer(); ?>