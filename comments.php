<h2>Reacties</h2>
<?php
$comments_number = get_comments_number();
?>
<p class="comments-title"> 
<?php
if ($comments_number > 0) : 
    printf(
      _n(
        '1 reactie op “%2$s”',
        '%1$s reacties op “%2$s”',
        $comments_number,
        'textdomain'
      ),
      number_format_i18n($comments_number),
      esc_html(get_the_title())
    ); 
    else : 
  printf('Geen reacties op “%s”', esc_html(get_the_title()));
endif;
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

