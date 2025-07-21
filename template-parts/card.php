<!-- Get ID -->
<?php
$post_id = get_the_ID();
$leesmeer_id = 'lees-meer-' . $post_id;
$excerpt_id = 'excerpt-' . $post_id;
?>

<!-- card -->
<li class="card hover-shadow-pink">
  <div class="card-image">
    <img
      src="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>"
      alt="<?php the_title_attribute(); ?>"
      loading="lazy" />
  </div>
  <div class="card-content-wrapper">
    <div class="card-content">
      <div class="card-info">
        <h2 class="post-title h2">
          <a href="<?php the_permalink(); ?>" aria-describedby="<?php echo $excerpt_id . ' ' . $leesmeer_id; ?>">
            <?php the_title(); ?>
          </a>
        </h2>
        <p class="post-date"><?php the_time('j-m-Y'); ?></p>
        <p id="<?php echo $excerpt_id; ?>">
          <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
        </p>
      </div>
      <span aria-hidden="true" id="<?php echo $leesmeer_id; ?>" class="btn btn-primary">
        Lees meer
      </span>
    </div>
  </div>
</li>