<h2>Reacties</h2>
<p class="comments-title">
  <?php
  printf(
    /* translators: 1: comment count number, 2: post title */
    _n(
      'Één reactie op "%2$s"',
      '%1$s reacties op "%2$s"',
      get_comments_number(),
      'textdomain'
    ),
    number_format_i18n(get_comments_number()),
    get_the_title()
  );
  ?>
</p>
<?php
if (post_password_required()) {
  return;
}
?>
<div id="comments" class="post-comments">
  <?php if (have_comments()) : ?>
    <ol class="comment-list">
      <?php
      wp_list_comments(array(
        'style'      => 'ol',
        'short_ping' => true,
        'avatar_size'=> 48,
      ));
      ?>
    </ol>

    <?php the_comments_navigation(); ?>

  <?php else : ?>

    <?php if (!comments_open()) : ?>
      <p>Reacties zijn gesloten voor dit bericht.</p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>

</div>
