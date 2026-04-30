<?php

function rules_by_rosita_remove_editor() {
    if ( ! is_admin() || ! isset( $_GET['post'] ) ) {
        return;
    }

    $post_id       = intval( $_GET['post'] );
    $frontpage_id  = get_option( 'page_on_front' );
    $posts_page_id = get_option( 'page_for_posts' );

    if ( $post_id === intval( $frontpage_id ) || $post_id === intval( $posts_page_id ) ) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'admin_init', 'rules_by_rosita_remove_editor' );

function rules_by_rosita_duplicate_post_as_draft() {
    if (
        ! ( isset( $_GET['post'] ) || isset( $_POST['post'] ) || ( isset( $_REQUEST['action'] ) && 'rules_by_rosita_duplicate_post_as_draft' == $_REQUEST['action'] ) )
    ) {
        wp_die( 'No post to duplicate has been supplied!' );
    }

    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'rules_by_rosita_duplicate_post' ) ) {
        wp_die( 'Security check failed.' );
    }

    $post_id = absint( $_GET['post'] );
    $post    = get_post( $post_id );

    if ( ! $post ) {
        wp_die( 'Post not found.' );
    }

    $new_post_args = array(
        'post_title'   => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_status'  => 'draft',
        'post_type'    => $post->post_type,
        'post_author'  => get_current_user_id(),
    );

    $new_post_id = wp_insert_post( $new_post_args );

    $taxonomies = get_object_taxonomies( $post->post_type );
    foreach ( $taxonomies as $taxonomy ) {
        $terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
        wp_set_object_terms( $new_post_id, $terms, $taxonomy );
    }

    $post_meta = get_post_meta( $post_id );
    foreach ( $post_meta as $meta_key => $meta_values ) {
        foreach ( $meta_values as $meta_value ) {
            add_post_meta( $new_post_id, $meta_key, maybe_unserialize( $meta_value ) );
        }
    }

    wp_safe_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
}
add_action( 'admin_action_rules_by_rosita_duplicate_post_as_draft', 'rules_by_rosita_duplicate_post_as_draft' );

function rules_by_rosita_duplicate_post_link( $actions, $post ) {
    if ( current_user_can( 'edit_posts' ) ) {
        $duplicate_url       = wp_nonce_url(
            'admin.php?action=rules_by_rosita_duplicate_post_as_draft&post=' . $post->ID,
            'rules_by_rosita_duplicate_post'
        );
        $actions['duplicate'] = '<a href="' . esc_url( $duplicate_url ) . '" title="Dupliceer dit item">Dupliceren</a>';
    }
    return $actions;
}
add_filter( 'post_row_actions', 'rules_by_rosita_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'rules_by_rosita_duplicate_post_link', 10, 2 );
