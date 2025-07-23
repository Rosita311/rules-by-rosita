<?php
require_once get_template_directory() . '/inc/menu-walker.php';

/* Theme setup */
function rules_by_rosita_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
    add_theme_support('automatic-feed-links');

    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'rules_by_rosita_setup');


/* Enqueue styles and scripts */
function rules_by_rosita_enqueue_assets()
{
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
function rules_by_rosita_editor_assets()
{
    wp_enqueue_style(
        'rules-by-rosita-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&family=Zilla+Slab:wght@400;700&display=swap',
        false,
        null
    );
}
add_action('enqueue_block_editor_assets', 'rules_by_rosita_editor_assets');

/* Resource hints for fonts */
function rules_by_rosita_resource_hints($hints, $relation_type)
{
    if ('preconnect' === $relation_type) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = 'https://fonts.gstatic.com';
    }
    return $hints;
}
add_filter('wp_resource_hints', 'rules_by_rosita_resource_hints', 10, 2);

/* Register menus */
function rules_by_rosita_register_menus()
{
    register_nav_menus(array(
        'footer-menu' => __('Footer', 'rules-by-rosita'),
        'header-menu' => __('Header', 'rules-by-rosita'),
    ));
}
add_action('after_setup_theme', 'rules_by_rosita_register_menus');

/* Register sidebar */
function rules_by_rosita_register_sidebars()
{
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

function rules_by_rosita_customize_register($wp_customize)
{
    $wp_customize->add_section('social_settings', array(
        'title'    => __('Social Media', 'rules-by-rosita'),
        'priority' => 30,
    ));

    $socials = [
        'facebook'   => __('Facebook URL', 'rules-by-rosita'),
        'instagram'   => __('Instagram URL', 'rules-by-rosita'),
        'linkedin'   => __('LinkedIn URL', 'rules-by-rosita'),
        'mastodon'   => __('Mastodon URL', 'rules-by-rosita'),
        'github'     => __('GitHub URL', 'rules-by-rosita'),
        'wordpress'  => __('WordPress.com RSS Feed', 'rules-by-rosita'),
        'pinterest'  => __('Pinterest URL', 'rules-by-rosita'),
    ];

    foreach ($socials as $key => $label) {
        $wp_customize->add_setting("rules_by_rosita_{$key}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("rules_by_rosita_{$key}_url", array(
            'label'   => $label,
            'section' => 'social_settings',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'rules_by_rosita_customize_register');

/* add Block styles */
function rules_by_rosita_register_block_styles() {
    // Voorbeeld: stijl toevoegen voor een paragraaf blok
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'highlight',
            'label' => __('Highlight', 'rules-by-rosita'),
        )
    );
}
add_action('init', 'rules_by_rosita_register_block_styles');

function rules_by_rosita_register_block_patterns() {
    register_block_pattern(
        'rules-by-rosita/hero-section',
        array(
            'title'       => __('Hero Section', 'rules-by-rosita'),
            'description' => __('A custom hero section with heading and button', 'rules-by-rosita'),
            'content'     => "<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Your Hero Title</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Your Hero Subtitle</p><!-- /wp:paragraph --></div><!-- /wp:group -->",
        )
    );
}
add_action('init', 'rules_by_rosita_register_block_patterns');


/* Calculate reading time */
function rules_by_rosita_get_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes = ceil($word_count / 200); // gemiddeld 200 woorden per minuut
    $label = ($minutes === 1) ? 'minuut' : 'minuten';
    return $minutes . ' ' . $label;
}

/* Reorder comment fields */
function rules_by_rosita_reorder_comment_fields($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);

    $ordered_fields = array();
    if (isset($fields['author'])) $ordered_fields['author'] = $fields['author'];
    if (isset($fields['email'])) $ordered_fields['email'] = $fields['email'];
    if (isset($fields['url'])) $ordered_fields['url'] = $fields['url'];

    $ordered_fields['comment'] = $comment_field;

    return $ordered_fields;
}
add_filter('comment_form_fields', 'rules_by_rosita_reorder_comment_fields');

/* Privacycheck on comment submission */
function rules_by_rosita_comment_privacy_check($commentdata)
{
    if (!is_user_logged_in() && empty($_POST['comment-privacy'])) {
        set_transient('comment_privacy_error', __('Je moet akkoord gaan met de privacyverklaring om een reactie te plaatsen.', 'rules-by-rosita'), 30);
        wp_redirect(wp_get_referer() . '#respond');
        exit;
    }
    return $commentdata;
}
add_filter('preprocess_comment', 'rules_by_rosita_comment_privacy_check');

/* Remove editor from front page and posts page */
function rules_by_rosita_remove_editor()
{
    if (!is_admin() || !isset($_GET['post'])) {
        return;
    }

    $post_id = intval($_GET['post']);
    $frontpage_id = get_option('page_on_front');
    $posts_page_id = get_option('page_for_posts');

    if ($post_id === intval($frontpage_id) || $post_id === intval($posts_page_id)) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'rules_by_rosita_remove_editor');

/* Duplicate Page/Post functionality */
function rules_by_rosita_duplicate_post_as_draft() {
    if (
        ! ( isset($_GET['post']) || isset($_POST['post']) || ( isset($_REQUEST['action']) && 'rules_by_rosita_duplicate_post_as_draft' == $_REQUEST['action'] ) )
    ) {
        wp_die('No post to duplicate has been supplied!');
    }

    // Nonce check
    if ( !isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'rules_by_rosita_duplicate_post') ) {
        wp_die('Security check failed.');
    }

    // Get original post ID
    $post_id = absint($_GET['post']);
    $post = get_post($post_id);

    if (! $post ) {
        wp_die('Post not found.');
    }

    // Create new post data
    $new_post_args = array(
        'post_title'    => $post->post_title . ' (Copy)',
        'post_content'  => $post->post_content,
        'post_status'   => 'draft',
        'post_type'     => $post->post_type,
        'post_author'   => get_current_user_id(),
    );

    // Insert new post
    $new_post_id = wp_insert_post($new_post_args);

    // Copy taxonomies
    $taxonomies = get_object_taxonomies($post->post_type);
    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'ids'));
        wp_set_object_terms($new_post_id, $terms, $taxonomy);
    }

    // Copy custom fields (meta data)
    $post_meta = get_post_meta($post_id);
    foreach ($post_meta as $meta_key => $meta_values) {
        foreach ($meta_values as $meta_value) {
            add_post_meta($new_post_id, $meta_key, maybe_unserialize($meta_value));
        }
    }

    // Redirect to the edit screen of new post
    wp_safe_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_rules_by_rosita_duplicate_post_as_draft', 'rules_by_rosita_duplicate_post_as_draft');

/* Add Duplicate link to post/page row actions */
function rules_by_rosita_duplicate_post_link($actions, $post) {
    if ( current_user_can('edit_posts') ) {
        $duplicate_url = wp_nonce_url(
            'admin.php?action=rules_by_rosita_duplicate_post_as_draft&post=' . $post->ID,
            'rules_by_rosita_duplicate_post'
        );
        $actions['duplicate'] = '<a href="' . esc_url($duplicate_url) . '" title="Dupliceer dit item">Dupliceren</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'rules_by_rosita_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rules_by_rosita_duplicate_post_link', 10, 2);

/* Add Customizer settings for custom scripts */
function rules_by_rosita_customize_scripts($wp_customize) {
    $wp_customize->add_section('rules_by_rosita_custom_scripts', array(
        'title'    => __('Extra Scripts', 'rules-by-rosita'),
        'priority' => 160,
    ));

    // Head scripts
    $wp_customize->add_setting('rules_by_rosita_head_scripts', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('rules_by_rosita_head_scripts', array(
        'label'   => __('Scripts bovenaan in <head>', 'rules-by-rosita'),
        'section' => 'rules_by_rosita_custom_scripts',
        'type'    => 'textarea',
        'description' => __('Voeg aangepaste scripts toe, zoals metatags en trackingcodes. Deze worden vóór </head> ingevoegd.', 'rules-by-rosita'),
    ));

    // Footer scripts
    $wp_customize->add_setting('rules_by_rosita_footer_scripts', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('rules_by_rosita_footer_scripts', array(
        'label'   => __('Scripts onderaan voor </body>', 'rules-by-rosita'),
        'section' => 'rules_by_rosita_custom_scripts',
        'type'    => 'textarea',
        'description' => __('Voeg aangepaste scripts toe, zoals metatags en trackingcodes. Deze worden vóór </body> ingevoegd.', 'rules-by-rosita'),
    ));
}
add_action('customize_register', 'rules_by_rosita_customize_scripts');

/**
 * Output custom scripts in head and footer
 */
function rules_by_rosita_output_custom_scripts() {
    if (get_theme_mod('rules_by_rosita_head_scripts')) {
        echo get_theme_mod('rules_by_rosita_head_scripts');
    }
}
add_action('wp_head', 'rules_by_rosita_output_custom_scripts');

function rules_by_rosita_output_custom_scripts_footer() {
    if (get_theme_mod('rules_by_rosita_footer_scripts')) {
        echo get_theme_mod('rules_by_rosita_footer_scripts');
    }
}
add_action('wp_footer', 'rules_by_rosita_output_custom_scripts_footer');
