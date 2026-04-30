<?php get_header();
get_template_part('template-parts/accessibility-panel'); ?>
<main id="main-content">
  <section class="single-post__hero hero-section">
    <div class="hero-image">
      <?php
      if (has_post_thumbnail()) {
        // Grote uitgelichte afbeelding, bijvoorbeeld 'large' of een custom size
        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
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
      <?php } else { ?>
        <div class="hero-featured-image-fallback dotted-background-pink"></div>
      <?php } ?>
    </div>
  </section>
  <div class="container-main">
    <section class="single-post__content">
      <article class="single-post__content-wrapper" <?php post_class(); ?>>
        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<nav aria-label="Kruimelpad" class="breadcrumbs">', '</nav>');
        }
        ?>
        <h1 class="post-title h1">
          <?php the_title(); ?>
        </h1>
        <div class="post-meta dotted-background-blue">
          <nav aria-label="Berichtinformatie">
            <ul class="post-meta__list">
              <li class="post-meta__item">
                <?php echo rules_by_rosita_icon('calendar'); ?>
                <span class="sr-only">Gepubliceerd op:<?php the_time('j-m-Y'); ?></span>
                <time
                  datetime="<?php the_time('j-m-Y'); ?>"
                  aria-hidden="true"><?php the_time('j-m-Y'); ?></time>
              </li>

              <li class="post-meta__item">
                <?php echo rules_by_rosita_icon('messages'); 
                comments_number('0', '1', '%'); ?><span class="sr-only">reacties</span>
              </li>

              <li class="post-meta__item">
                <?php echo rules_by_rosita_icon('clock'); ?>
                <span class="sr-only">Leestijd:</span><?php echo rules_by_rosita_get_reading_time(); ?>
              </li>

              <li class="post-meta__item">
                <?php echo rules_by_rosita_icon('folder'); ?>
                <span class="sr-only">Categorie:</span><?php the_category(', '); ?>
              </li>

              <li class="post-meta__item">
                <?php echo rules_by_rosita_icon('tags'); ?>
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
          <?php
          the_content();

          wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'rules-by-rosita'),
            'after'  => '</div>',
          ));
          ?>
        </div>
        <!-- Pagination -->
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        ?>
        <nav class="post-nav" aria-label="Post navigatie">
          <div class="post-nav__prev">
            <?php if ($prev_post): ?>
              <a class="btn btn--icon-large" href="<?php echo esc_url(get_permalink($prev_post)); ?>">
                <?php echo rules_by_rosita_icon('chevron-left'); ?>                <span>Vorige post</span>
                <span class="sr-only">: <?php echo esc_html(get_the_title($prev_post)); ?></span>
              </a>
            <?php endif; ?>
          </div>

          <div class="post-nav__next">
            <?php if ($next_post): ?>
              <a class="btn btn--icon-large" href="<?php echo esc_url(get_permalink($next_post)); ?>">
                <span>Volgende post</span>
                <?php echo rules_by_rosita_icon('chevron-right'); ?>
                <span class="sr-only">: <?php echo esc_html(get_the_title($next_post)); ?></span>
              </a>
            <?php endif; ?>
          </div>
        </nav>
      </article>
      <?php get_sidebar('single'); ?>
    </section>
    <!-- Post Comments -->
    <section class="comments">
      <?php
      if (comments_open() || get_comments_number()) {
        comments_template();
      } else {
        echo '<p>Reacties zijn gesloten voor dit bericht.</p>';
      } ?>
    </section>
    <section class="blog-listing">
      <h2 id="after-comments">Gerelateerde blogposts</h2>
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
          <ul class="blog-listing__grid">
            <?php
            while ($related_query->have_posts()) : $related_query->the_post();
              if (!has_post_thumbnail()) {
                get_template_part('template-parts/card-fallback');
              } else {
                get_template_part('template-parts/card');
              }
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
