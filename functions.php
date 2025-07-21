<?php
require_once get_template_directory() . '/inc/menu-walker.php';

/* Theme setup */
function rules_by_rosita_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css'); // Editor-specific CSS
}
add_action('after_setup_theme', 'rules_by_rosita_setup');

/* Enqueue styles and scripts */
function rules_by_rosita_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'rules-by-rosita-google-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&family=Zilla+Slab:wght@400;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'rules-by-rosita-style',
        get_template_directory_uri() . '/style.css',
        array('rules-by-rosita-google-fonts'),
        filemtime(get_template_directory() . '/style.css')
    );

    // Custom JS
    wp_enqueue_script(
        'rules-by-rosita-script',
        get_template_directory_uri() . '/js/script.js',
        array(),
        filemtime(get_template_directory() . '/js/script.js'),
        true
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rules_by_rosita_enqueue_assets');

/* Editor fonts for backend */
function rules_by_rosita_editor_assets() {
    wp_enqueue_style(
        'rules-by-rosita-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&family=Zilla+Slab:wght@400;700&display=swap',
        false,
        null
    );
}
add_action('enqueue_block_editor_assets', 'rules_by_rosita_editor_assets');

/* Resource hints for fonts */
function rules_by_rosita_resource_hints($hints, $relation_type) {
    if ('preconnect' === $relation_type) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = 'https://fonts.gstatic.com';
    }
    return $hints;
}
add_filter('wp_resource_hints', 'rules_by_rosita_resource_hints', 10, 2);

/* Register menus */
function rules_by_rosita_register_menus() {
    register_nav_menus(array(
        'footer-menu' => __('Footer', 'rules-by-rosita'),
        'header-menu' => __('Header', 'rules-by-rosita'),
    ));
}
add_action('after_setup_theme', 'rules_by_rosita_register_menus');

/* Register sidebar */
function rules_by_rosita_register_sidebars() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'rules_by_rosita_register_sidebars');

/* Customizer settings */

function rules_by_rosita_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'social_settings', array(
        'title'    => __( 'Social Media', 'rules-by-rosita' ),
        'priority' => 30,
    ) );

    $socials = [
        'facebook'   => 'Facebook URL',
        'instagram'  => 'Instagram URL',
        'linkedin'   => 'LinkedIn URL',
        'mastodon'   => 'Mastodon URL',
        'github'     => 'GitHub URL',
        'wordpress'  => 'WordPress.com RSS Feed',
        'pinterest'  => 'Pinterest URL',
    ];

    foreach ( $socials as $key => $label ) {
        $wp_customize->add_setting( "rules_by_rosita_{$key}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( "rules_by_rosita_{$key}_url", array(
            'label'   => __( $label, 'rules-by-rosita' ),
            'section' => 'social_settings',
            'type'    => 'url',
        ) );
    }
}
add_action( 'customize_register', 'rules_by_rosita_customize_register' );

/* Calculate reading time */
function rules_by_rosita_get_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes = ceil( $word_count / 200 ); // gemiddeld 200 woorden per minuut
    $label = ( $minutes === 1 ) ? 'minuut' : 'minuten';
    return $minutes . ' ' . $label;
}

/* Reorder comment fields */
function rules_by_rosita_reorder_comment_fields( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );

    $ordered_fields = array();
    if ( isset( $fields['author'] ) ) $ordered_fields['author'] = $fields['author'];
    if ( isset( $fields['email'] ) ) $ordered_fields['email'] = $fields['email'];
    if ( isset( $fields['url'] ) ) $ordered_fields['url'] = $fields['url'];

    $ordered_fields['comment'] = $comment_field;

    return $ordered_fields;
}
add_filter( 'comment_form_fields', 'rules_by_rosita_reorder_comment_fields' );

/* Privacycheck on comment submission */
function rules_by_rosita_comment_privacy_check( $commentdata ) {
    if ( !is_user_logged_in() && empty( $_POST['comment-privacy'] ) ) {
        set_transient( 'comment_privacy_error', __( 'Je moet akkoord gaan met de privacyverklaring om een reactie te plaatsen.', 'rules-by-rosita' ), 30 );
        wp_redirect( wp_get_referer() . '#respond' );
        exit;
    }
    return $commentdata;
}
add_filter( 'preprocess_comment', 'rules_by_rosita_comment_privacy_check' );

/* Remove editor from front page and posts page */
function rules_by_rosita_remove_editor() {
    if ( !is_admin() || !isset( $_GET['post'] ) ) {
        return;
    }

    $post_id = intval( $_GET['post'] );
    $frontpage_id = get_option( 'page_on_front' );
    $posts_page_id = get_option( 'page_for_posts' );

    if ( $post_id === intval( $frontpage_id ) || $post_id === intval( $posts_page_id ) ) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'admin_init', 'rules_by_rosita_remove_editor');
?>
