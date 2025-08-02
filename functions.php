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
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'rules_by_rosita_register_sidebars');

/* Register footer widget area */
function rules_by_rosita_register_footer_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer-widgetgebied', 'rules-by-rosita' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Voeg hier widgets toe die in de footer moeten worden weergegeven.', 'rules-by-rosita' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'rules_by_rosita_register_footer_widgets' );

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
    /* Add tracking codes to Customizer */
    $wp_customize->add_section('tracking_codes_section', [
        'title' => __('Tracking codes', 'rules-by-rosita'),
        'priority' => 30,
    ]);

    // Google Site Verification
    $wp_customize->add_setting('google_site_verification', [
        'sanitize_callback' => 'sanitize_text_field', 
        'default' => '',
    ]);
    $wp_customize->add_control('google_site_verification_control', [
        'label' => __('Google Site Verification Code', 'rules-by-rosita'),
        'section' => 'tracking_codes_section',
        'settings' => 'google_site_verification',
        'type' => 'text',
        'description' => __('Google Search Console. Alleen de code, zonder meta tag etc. Bijvoorbeeld: abc123xyz456', 'rules-by-rosita'),
    ]);

    // Google Analytics ID
    $wp_customize->add_setting('google_analytics_id', [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ]);
    $wp_customize->add_control('google_analytics_id_control', [
        'label' => __('Google Analytics ID', 'rules-by-rosita'),
        'section' => 'tracking_codes_section',
        'settings' => 'google_analytics_id',
        'type' => 'text',
        'description' => __('Bijv. G-XXXXXXXXXX', 'rules-by-rosita'),
    ]);
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


/* Social Media Widget */
class RulesByRosita_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'rulesbyrosita_social_widget',
            __('Social Media Iconen', 'rules-by-rosita'),
            array('description' => __('Toont social media iconen uit de Customizer.', 'rules-by-rosita'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'];
        }

        echo RulesByRosita_Social_Render();
        
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Social Media', 'rules-by-rosita'); ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Titel:', 'rules-by-rosita'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}

/* Registreer Widget */
function rules_by_rosita_register_social_widget() {
    register_widget('RulesByRosita_Social_Widget');
}
add_action('widgets_init', 'rules_by_rosita_register_social_widget');

// social media in customizer
function RulesByRosita_Social_Render() {
    ob_start();

    $socials = [
        'facebook' => [
            'label' => 'Facebook',
            'url' => get_theme_mod('rules_by_rosita_facebook_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-facebook"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"/></svg>',
        ],
        'instagram' => [
            'label' => 'Instagram',
            'url' => get_theme_mod('rules_by_rosita_instagram_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="4"/><circle cx="12" cy="12" r="3"/><line x1="16.5" y1="7.5" x2="16.5" y2="7.501"/></svg>',
        ],
        'linkedin' => [
            'label' => 'LinkedIn',
            'url' => get_theme_mod('rules_by_rosita_linkedin_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-linkedin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 11v5"/><circle cx="8" cy="8" r=".01"/><path d="M12 16v-5"/><path d="M16 16v-3a2 2 0 1 0 -4 0"/><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"/></svg>',
        ],
        'mastodon' => [
            'label' => 'Mastodon',
            'url' => get_theme_mod('rules_by_rosita_mastodon_url'),
            'svg' => '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-mastodon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.648 15.254c-1.816 1.763 -6.648 1.626 -6.648 1.626a18.262 18.262 0 0 1 -3.288 -.256c1.127 1.985 4.12 2.81 8.982 2.475c-1.945 2.013 -13.598 5.257 -13.668 -7.636l-.026 -1.154c0 -3.036 .023 -4.115 1.352 -5.633c1.671 -1.91 6.648 -1.666 6.648 -1.666s4.977 -.243 6.648 1.667c1.329 1.518 1.352 2.597 1.352 5.633s-.456 4.074 -1.352 4.944z" /><path d="M12 11.204v-2.926c0 -1.258 -.895 -2.278 -2 -2.278s-2 1.02 -2 2.278v4.722m4 -4.722c0 -1.258 .895 -2.278 2 -2.278s2 1.02 2 2.278v4.722" /></svg>',
        ],
        'github' => [
            'label' => 'GitHub',
            'url' => get_theme_mod('rules_by_rosita_github_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-github"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/></svg>',
        ],
        'wordpress' => [
            'label' => 'WordPress.com RSS Feed',
            'url' => get_theme_mod('rules_by_rosita_wordpress_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-wordpress"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.5 9h3"/><path d="M4 9h2.5"/><path d="M11 9l3 11l4 -9"/><path d="M5.5 9l3.5 11l3 -7"/><path d="M18 11c.177 -.528 1 -1.364 1 -2.5c0 -1.78 -.776 -2.5 -1.875 -2.5c-.898 0 -1.125 .812 -1.125 1.429c0 1.83 2 2.058 2 3.571z"/><circle cx="12" cy="12" r="9"/></svg>',
        ],
        'pinterest' => [
            'label' => 'Pinterest',
            'url' => get_theme_mod('rules_by_rosita_pinterest_url'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-pinterest"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 20l4 -9"/><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7"/><circle cx="12" cy="12" r="9"/></svg>',
        ],
    ];
    ?>
    <div class="social-media">
        <ul>
            <?php foreach ($socials as $key => $data):
                if (!empty($data['url'])): ?>
                    <li>
                        <a href="<?php echo esc_url($data['url']); ?>" aria-label="Bezoek mijn <?php echo esc_attr($data['label']); ?> profiel" rel="noopener noreferrer">
                            <?php echo $data['svg']; ?>
                        </a>
                    </li>
            <?php endif; endforeach; ?>
        </ul>
    </div>
    <?php

    return ob_get_clean();
}

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

/* Add data attrubute id user is admin*/
add_action('comment_form_before', function() {
    $is_admin = current_user_can('manage_options') ? '1' : '0';
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.getElementById('commentform');
      if (form) {
        form.dataset.isAdmin = '<?php echo esc_js($is_admin); ?>';
      }
    });
    </script>
    <?php
});

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