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
        <section class="introduction">
            <div class="introduction-content-wrapper">
                <div class="introduction-card-content entry-content">
                    <h2>Hi!</h2>
                    <p>
                        Welkom op Rulesbyrosita.nl, mijn blog over inspiratie over het
                        leven (met een beperking), mijn zoektocht naar de regels in het
                        leven,persoonlijke ontwikkeling, en lifestyle. Have fun! Liefs
                        Rosita
                    </p>

                    <h3>Wat me bezighoudt</h3>
                    <ul class="introduction-iconlist">
                        <li>
                            <svg
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-books">
                                <path
                                    stroke="none"
                                    d="M0 0h24v24H0z"
                                    fill="none" />
                                <path
                                    d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                <path
                                    d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                <path d="M5 8h4" />
                                <path d="M9 16h4" />
                                <path
                                    d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                <path d="M14 9l4 -1" />
                                <path d="M16 16l3.923 -.98" />
                            </svg>
                            <span><span class="introduction-label-text">Ik lees:</span>
                                Atomic Habits - James Clear</span>
                        </li>
                        <li>
                            <svg
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-code">
                                <path
                                    stroke="none"
                                    d="M0 0h24v24H0z"
                                    fill="none" />
                                <path d="M7 8l-4 4l4 4" />
                                <path d="M17 8l4 4l-4 4" />
                                <path d="M14 4l-4 16" />
                            </svg>
                            <span><span class="introduction-label-text">Ik leer:</span>
                                WordPress: Unlock the Power of Code</span>
                        </li>
                        <li>
                            <svg
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-tv">
                                <path
                                    stroke="none"
                                    d="M0 0h24v24H0z"
                                    fill="none" />
                                <path
                                    d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M16 3l-4 4l-4 -4" />
                            </svg>
                            <span><span class="introduction-label-text">Ik kijk:</span>
                                <a href="https://www.netflix.com/nl/title/70136137">Sex and the City</a></span>
                        </li>
                    </ul>
                    <a
                        class="btn btn-secondary"
                        href="#">Over mij</a>
                </div>
            </div>
            <div class="introduction-image-wrapper">
                <div class="introduction-image dotted-background-blue">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/alex-sheldon-0ncyUZzWqmQ-unsplash.jpg"
                        alt="placeholder potret"
                        loading="lazy"
                        width="400"
                        height="400" />
                </div>
            </div>
        </section>
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