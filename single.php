<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <section class="single-post-hero hero-section">
    <div class="hero-image">
      <?php
      if (has_post_thumbnail()) {
        // Grote uitgelichte afbeelding, bijvoorbeeld 'large' of een custom size
        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        // Alt tekst automatisch uit titel halen:
        $alt_text = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        if (!$alt_text) {
          $alt_text = get_the_title();
        }
      ?>
        <img
          src="<?php echo esc_url($img_url); ?>"
          alt="<?php echo esc_attr($alt_text); ?>"
          loading="lazy"
          width="1200"
          height="600" />
      <?php } ?>
    </div>
  </section>
  <div class="container-main single-post">
    <section class="single-post-content">
      <article class="post-content-wrapper" <?php post_class(); ?>>
        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<nav aria-label="Kruimelpad" class="breadcrumbs">', '</nav>');
        }
        ?>
        <h1 class="post-title h1">
          <?php the_title(); ?>
        </h1>
        <div class="post-meta-wrapper dotted-background-blue">
          <nav aria-label="Berichtinformatie">
            <ul class="post-meta">
              <li class="post-meta-item">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-due">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                  <path d="M16 3v4" />
                  <path d="M8 3v4" />
                  <path d="M4 11h16" />
                  <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                </svg>
                <span class="sr-only">Gepubliceerd op:<?php the_time('j-m-Y'); ?></span>
                <time
                  datetime="<?php the_time('j-m-Y'); ?>"
                  aria-hidden="true"><?php the_time('j-m-Y'); ?></time>
              </li>

              <li class="post-meta-item">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                  <path
                    d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                </svg>
                <?php comments_number('0', '1', '%'); ?><span class="sr-only">reacties</span>
              </li>

              <li class="post-meta-item">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M12 12l3 2" />
                  <path d="M12 7v5" />
                </svg>
                <span class="sr-only">Leestijd:</span><?php echo get_reading_time(); ?>
              </li>

              <li class="post-meta-item">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-folder"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M5 19a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h5l2 2h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14" />
                </svg>
                <span class="sr-only">Categorie:</span><?php the_category(', '); ?>
              </li>

              <li class="post-meta-item">
                <svg
                  aria-hidden="true"
                  focusable="false"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-tags">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592 -3.592a2.41 2.41 0 0 0 0 -3.408l-5.71 -5.71a2 2 0 0 0 -1.414 -.586h-4.172a2 2 0 0 0 -2 2z" />
                  <path
                    d="M18 19l1.592 -1.592a4.82 4.82 0 0 0 0 -6.816l-4.592 -4.592" />
                  <path d="M7 10h-.01" />
                </svg>
                <span class="sr-only">Tags:</span>
                <div class="post-tags">
                  <?php
                  $post_tags = get_the_tags();
                  if ($post_tags) {
                    echo '<ul>';
                    foreach ($post_tags as $tag) {
                      echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
                    }
                    echo '</ul>';
                  } else {
                    echo 'Geen tags';
                  }
                  ?>
                </div>
              </li>
            </ul>
          </nav>
        </div>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <div class="post-comments">
          <?php
          if (comments_open() || get_comments_number()) {
            comments_template();
          } else {
            echo '<p>Reacties zijn gesloten voor dit bericht.</p>';
          } ?>
        </div>

      </article>
     <?php get_sidebar('single'); ?>
    </section>
    <section class="blogpost-section">
      <h2>Gerelateerde blogposts</h2>
      <?php
      $categories = get_the_category();
      if ($categories) {
        $category_id = $categories[0]->term_id;

        $args = array(
          'posts_per_page' => 3,
          'post__not_in'   => array(get_the_ID()),
          'cat'            => $category_id,
        );

        $related_query = new WP_Query($args);

        if ($related_query->have_posts()) : ?>
          <ul class="blog-listing-grid">
            <?php
            while ($related_query->have_posts()) : $related_query->the_post();
              get_template_part('template-parts/card');
            endwhile;
            ?>
          </ul>
      <?php
          wp_reset_postdata();
        else:
          echo '<p>Geen gerelateerde berichten gevonden.</p>';
        endif;
      } else {
        echo '<p>Geen categorie gevonden.</p>';
      }
      ?>
    </section>
    <?php get_template_part('template-parts/back-to-top'); ?>
  </div>
</main>
<?php get_footer(); ?>