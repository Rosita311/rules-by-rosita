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
        <?php if (function_exists('get_field')) :
            $homepage_id = get_option('page_on_front'); ?>

            <section class="introduction">
                <div class="introduction-content-wrapper">
                    <div class="introduction-card-content entry-content">

                        <?php
                        $intro_titel = get_field('introductie_titel', $homepage_id);
                        $intro_tekst = get_field('introductie_tekst', $homepage_id);
                        $over_mij    = get_field('over_mij_titel', $homepage_id);
                        $lezen       = get_field('lezen', $homepage_id);
                        $leren       = get_field('leren', $homepage_id);
                        $kijken      = get_field('kijken', $homepage_id);
                        $kijken_link = get_field('kijken_link', $homepage_id);
                        $btn_link    = get_field('knop_link', $homepage_id);
                        $btn_text    = get_field('knop_link_tekst', $homepage_id);
                        $img         = get_field('introductie_afbeelding', $homepage_id);
                        ?>


                        <?php if ($intro_titel) : ?>
                            <h2><?php echo esc_html($intro_titel); ?></h2>
                        <?php endif; ?>

                        <?php if ($intro_tekst) : ?>
                            <?php echo wp_kses_post($intro_tekst); ?>
                        <?php endif; ?>

                        <?php if ($over_mij || $lezen || $leren || $kijken) : ?>
                            <?php if ($over_mij) : ?>
                                <h3><?php echo esc_html($over_mij); ?></h3>
                            <?php endif; ?>

                            <ul class="introduction-iconlist">
                                <?php if ($lezen) : ?>
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
                                            <?php echo esc_html($lezen); ?></span>
                                    </li>
                                <?php endif;
                                if ($leren) : ?>
                                    <li>
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-code">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 8l-4 4l4 4" />
                                            <path d="M17 8l4 4l-4 4" />
                                            <path d="M14 4l-4 16" />
                                        </svg>
                                        <span><span class="introduction-label-text">Ik leer:</span>
                                            <?php echo esc_html($leren); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if ($kijken) : ?>
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
                                            <a href="<?php echo esc_url($kijken_link); ?>">
                                                <?php echo esc_html($kijken); ?>
                                            </a></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ($btn_link && $btn_text) : ?>
                            <a class="btn btn-secondary" href="<?php echo esc_url($btn_link); ?>">
                                <?php echo esc_html($btn_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="introduction-image-wrapper">
                    <div class="introduction-image dotted-background-blue">
                        <?php if ($img) : ?>
                            <img
                                src="<?php echo esc_url($img); ?>"
                                alt="<?php the_title_attribute(); ?>"
                                loading="lazy"
                                width="400"
                                height="400" />
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

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