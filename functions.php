<?php
define( 'RULES_BY_ROSITA_FONTS_URL', 'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&family=Zilla+Slab:wght@400;700&display=swap' );

require_once get_template_directory() . '/inc/menu-walker.php';
require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/social-widget.php';
require_once get_template_directory() . '/inc/comments.php';
require_once get_template_directory() . '/inc/admin.php';

/* Menu fallback without JS */
function rules_by_rosita_is_menu_open(): bool {
    return isset( $_GET['menu'] ) && $_GET['menu'] === '1';
}

/* Theme setup */
function rules_by_rosita_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'rules_by_rosita_setup' );

/* Enqueue styles and scripts */
function rules_by_rosita_enqueue_assets() {
    wp_enqueue_style(
        'rules-by-rosita-google-fonts',
        RULES_BY_ROSITA_FONTS_URL,
        array(),
        null
    );

    wp_enqueue_style(
        'rules-by-rosita-style',
        get_template_directory_uri() . '/style.css',
        array( 'rules-by-rosita-google-fonts' ),
        filemtime( get_template_directory() . '/style.css' ) ?: wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_script(
        'rules-by-rosita-script',
        get_template_directory_uri() . '/js/script.js',
        array(),
        filemtime( get_template_directory() . '/js/script.js' ) ?: wp_get_theme()->get( 'Version' ),
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rules_by_rosita_enqueue_assets' );

/* Editor fonts for backend */
function rules_by_rosita_editor_assets() {
    wp_enqueue_style(
        'rules-by-rosita-editor-fonts',
        RULES_BY_ROSITA_FONTS_URL,
        false,
        null
    );
}
add_action( 'enqueue_block_editor_assets', 'rules_by_rosita_editor_assets' );

/* Resource hints for fonts */
function rules_by_rosita_resource_hints( $hints, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = 'https://fonts.gstatic.com';
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'rules_by_rosita_resource_hints', 10, 2 );

/* Register menus */
function rules_by_rosita_register_menus() {
    register_nav_menus( array(
        'footer-menu' => __( 'Footer', 'rules-by-rosita' ),
        'header-menu' => __( 'Header', 'rules-by-rosita' ),
    ) );
}
add_action( 'after_setup_theme', 'rules_by_rosita_register_menus' );

/* Register sidebars */
function rules_by_rosita_register_sidebars() {
    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer-widgetgebied', 'rules-by-rosita' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Voeg hier widgets toe die in de footer moeten worden weergegeven.', 'rules-by-rosita' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'rules_by_rosita_register_sidebars' );

/* Block styles and patterns */
function rules_by_rosita_register_block_styles() {
    register_block_style( 'core/paragraph', array(
        'name'  => 'highlight',
        'label' => __( 'Highlight', 'rules-by-rosita' ),
    ) );
}
add_action( 'init', 'rules_by_rosita_register_block_styles' );

function rules_by_rosita_register_block_patterns() {
    register_block_pattern( 'rules-by-rosita/hero-section', array(
        'title'       => __( 'Hero Section', 'rules-by-rosita' ),
        'description' => __( 'A custom hero section with heading and button', 'rules-by-rosita' ),
        'content'     => '<!-- wp:group --><div class="wp-block-group"><!-- wp:heading --><h2>Your Hero Title</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Your Hero Subtitle</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
    ) );
}
add_action( 'init', 'rules_by_rosita_register_block_patterns' );

/* Reading time */
function rules_by_rosita_get_reading_time() {
    $content    = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes    = ceil( $word_count / 200 );
    $label      = ( $minutes === 1 ) ? 'minuut' : 'minuten';
    return $minutes . ' ' . $label;
}

/* Icon helper */
function rules_by_rosita_icon( string $name, string $aria_label = '', string $class = '', bool $filled = false ): string {
    $icons = require get_template_directory() . '/inc/icons.php';

    if ( ! isset( $icons[ $name ] ) ) return '';

    $aria = $aria_label
        ? 'role="img" aria-label="' . esc_attr( $aria_label ) . '"'
        : 'aria-hidden="true"';

    $classes = 'icon icon-' . esc_attr( $name );
    if ( $class ) $classes .= ' ' . esc_attr( $class );

    $svg_attrs = $filled
        ? 'fill="currentColor"'
        : 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';

    return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ' . $svg_attrs . ' ' . $aria . ' class="' . $classes . '">' . $icons[ $name ] . '</svg>';
}
