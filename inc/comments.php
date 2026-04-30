<?php

function rules_by_rosita_reorder_comment_fields( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );

    $ordered_fields = array();
    if ( isset( $fields['author'] ) ) $ordered_fields['author'] = $fields['author'];
    if ( isset( $fields['email'] ) )  $ordered_fields['email']  = $fields['email'];
    if ( isset( $fields['url'] ) )    $ordered_fields['url']    = $fields['url'];

    $ordered_fields['comment'] = $comment_field;

    return $ordered_fields;
}
add_filter( 'comment_form_fields', 'rules_by_rosita_reorder_comment_fields' );

function rules_by_rosita_comment_privacy_check( $commentdata ) {
    if ( ! is_user_logged_in() && empty( $_POST['comment-privacy'] ) ) {
        set_transient( 'comment_privacy_error', __( 'Je moet akkoord gaan met de privacyverklaring om een reactie te plaatsen.', 'rules-by-rosita' ), 30 );
        wp_redirect( esc_url_raw( ( wp_get_referer() ?: home_url( '/' ) ) . '#respond' ) );
        exit;
    }
    return $commentdata;
}
add_filter( 'preprocess_comment', 'rules_by_rosita_comment_privacy_check' );

add_action( 'comment_form_before', function () {
    $is_admin = current_user_can( 'manage_options' ) ? '1' : '0';
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.getElementById('commentform');
      if (form) {
        form.dataset.isAdmin = '<?php echo esc_js( $is_admin ); ?>';
      }
    });
    </script>
    <?php
} );
