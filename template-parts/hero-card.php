<?php
$thumb_id = get_post_thumbnail_id();
$alt_text = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
if (empty($alt_text)) {
    $alt_text = get_the_title();
}
// Get the current post ID
$post_id = get_the_ID();
$leesmeer_id = 'lees-meer-' . $post_id;
$excerpt_id = 'excerpt-' . $post_id;
?>
<li class="hero-card">
   <?php if(has_post_thumbnail()) { ?>
    <div class="hero-image-wrapper">
        <img
            src="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>"
            alt="<?php echo esc_attr($alt_text); ?>"
            loading="lazy" width="600" height="400" />
    </div>
    <?php } else { ?>
        <div class="hero-image-fallback">
        <?php 
        if (function_exists('get_custom_logo') && has_custom_logo()) {
            echo get_custom_logo();
        } else { ?>
            <span class="hero-no-logo">Geen afbeelding beschikbaar</span>
        <?php } ?>
        </div>
    <?php } ?>
    <div class="hero-card-content-wrapper">
        <div class="hero-card-content hover-shadow">
            <div class="post-info">
                <h1 class="post-title h1">
                    <a href="<?php the_permalink(); ?>" aria-describedby="<?php echo $excerpt_id . ' ' . $leesmeer_id; ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
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