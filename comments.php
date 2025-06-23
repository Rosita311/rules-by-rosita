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
        'avatar_size' => 48,
      ));
      ?>
    </ol>

    <?php the_comments_navigation(); ?>

  <?php else : ?>

    <?php if (!comments_open()) : ?>
      <p>Reacties zijn gesloten voor dit bericht.</p>
    <?php endif; ?>

  <?php endif; ?>

  <div id="respond" class="comment-respond">
    <?php
    // Controleer of de gebruiker is ingelogd en of het een beheerder is
    $current_user = wp_get_current_user();
    $is_admin = user_can($current_user, 'manage_options'); // beheerder check

    $checkbox_html = '';
    if (!$is_admin) {
      $checkbox_html = '
    <p class="privacy-link">
      <a href="/privacyverklaring" rel="noopener noreferrer">Lees de privacyverklaring</a>
  </p>
  <p class="form-group checkbox-consent">
    <input type="checkbox" id="comment-privacy" name="comment-privacy"/>
    <label for="comment-privacy">
      Ik ga akkoord met het opslaan van mijn reactie en gegevens volgens de 
      privacyverklaring.
    </label>
  </p>
';
    };
    // Controleer of er een fout is opgeslagen in de transient
    // Alleen ophalen, niet direct echo
    $comment_error = get_transient('comment_privacy_error');
    if ($comment_error) {
      $error_html = '<p class="comment-error">' . esc_html($comment_error) . '</p>';
      delete_transient('comment_privacy_error');
    } else {
      $error_html = '';
    }

    comment_form(array(
      'title_reply' => 'Geef een reactie',
      'fields' => array(
        'author' => '<p class="form-group">
        <label for="comment-author">Naam <span aria-hidden="true">*</span></label>
        <input id="comment-author" name="author" type="text" required aria-required="true" />
      </p>',
        'email' => '<p class="form-group">
        <label for="comment-email">E-mail <span aria-hidden="true">*</span></label>
        <input id="comment-email" name="email" type="email" required aria-required="true" />
      </p>',
        'url' => '<p class="form-group">
        <label for="comment-url">Website</label>
        <input id="comment-url" name="url" type="url" />
      </p>',
      ),
      'comment_field' => '<p class="form-group">
      <label for="comment-text">Reactie <span aria-hidden="true">*</span></label>
      <textarea id="comment-text" name="comment" rows="5" required aria-required="true"></textarea>
    </p>' . $error_html,
      'comment_notes_before' => '<span class="required-field-message">Vereiste velden zijn gemarkeerd met <span class="required">*</span></span>',
      'comment_notes_after' => $checkbox_html,
      'label_submit' => 'Reactie plaatsen',
      'class_submit' => 'btn btn-secondary',
    ));



    ?>
  </div>