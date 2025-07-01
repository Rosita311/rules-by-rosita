<?php
require_once get_template_directory() . '/inc/class-rules-walker-nav-menu.php';

function rulesbyrosita_theme_setup() {
  if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
  }
}
add_action('after_setup_theme', 'rulesbyrosita_theme_setup');

function rulesbyrosita_enqueue_assets() {
  // Google Fonts
  wp_enqueue_style(
    'rulesbyrosita-google-fonts',
    'https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&family=Zilla+Slab&display=swap',
    array(),
    null
  );

  // Eigen stylesheet
  wp_enqueue_style(
    'rulesbyrosita-style',
    get_template_directory_uri() . '/style.css',
    array('rulesbyrosita-google-fonts'), 
    filemtime(get_template_directory() . '/style.css')
  );

  // JavaScript
  wp_enqueue_script(
    'rulesbyrosita-script',
    get_template_directory_uri() . '/js/script.js',
    array(),
    filemtime(get_template_directory() . '/js/script.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'rulesbyrosita_enqueue_assets');

function rulesbyrosita_resource_hints($hints, $relation_type) {
  if ('preconnect' === $relation_type) {
    $hints[] = 'https://fonts.googleapis.com';
    $hints[] = 'https://fonts.gstatic.com';
  }
  return $hints;
}
add_filter('wp_resource_hints', 'rulesbyrosita_resource_hints', 10, 2);

function rosita_register_sidebars() {
  register_sidebar(array(
    'name' => 'Main Sidebar',
    'id' => 'main-sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'rosita_register_sidebars');

function rulesbyrosita_register_menus() {
  register_nav_menus(array(
    'footer-menu' => __('Footer', 'rulesbyrosita'),
    'header-menu' => __('Header', 'rulesbyrosita'),
  ));
}

add_action('after_setup_theme', 'rulesbyrosita_register_menus');

function rulesbyrosita_customize_register($wp_customize) {
  $wp_customize->add_section('social_settings', array(
    'title'    => __('Social Media', 'rulesbyrosita'),
    'priority' => 30,
  ));

  $socials = [
    'facebook' => 'Facebook URL',
    'instagram' => 'Instagram URL',
    'linkedin' => 'LinkedIn URL',
    'mastodon' => 'Mastodon URL',
    'github' => 'GitHub URL',
    'wordpress' => 'WordPress.com RSS Feed',
    'pinterest' => 'Pinterest URL'
  ];

  foreach ($socials as $key => $label) {
    $wp_customize->add_setting("rulesbyrosita_{$key}_url", array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control("rulesbyrosita_{$key}_url", array(
      'label' => __($label, 'rulesbyrosita'),
      'section' => 'social_settings',
      'type' => 'url',
    ));
  }
}
add_action('customize_register', 'rulesbyrosita_customize_register');

function get_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes = ceil($word_count / 200); // gemiddeld 200 woorden per minuut
   $label = ($minutes === 1) ? 'minuut' : 'minuten';
    return $minutes . ' ' . $label;
}

function rosita_reorder_comment_fields($fields) {
    // Haal de comment veld op
    $comment_field = $fields['comment'];

    // Haal de overige velden
    unset($fields['comment']);

    // Voeg alle velden in gewenste volgorde toe
    $ordered_fields = array();

    if (isset($fields['author'])) $ordered_fields['author'] = $fields['author'];
    if (isset($fields['email'])) $ordered_fields['email'] = $fields['email'];
    if (isset($fields['url'])) $ordered_fields['url'] = $fields['url'];

    // Reactieveld komt daarna
    $ordered_fields['comment'] = $comment_field;

    return $ordered_fields;
}
add_filter('comment_form_fields', 'rosita_reorder_comment_fields');

function my_comment_privacy_check($commentdata) {
    if (!is_user_logged_in() && empty($_POST['comment-privacy'])) {
        // Sla fout op in transient
        set_transient('comment_privacy_error', __('Je moet akkoord gaan met de privacyverklaring om een reactie te plaatsen.', 'textdomain'), 30);
        // Stuur terug naar dezelfde pagina
        wp_redirect(wp_get_referer() . '#respond');
        exit;
    }
    return $commentdata;
}
add_filter('preprocess_comment', 'my_comment_privacy_check');

function remove_editor_from_front_page() {
    // Alleen in admin en bij bewerken van een pagina
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
add_action('admin_init', 'remove_editor_from_front_page');


/*
$title = get_the_title(); 
$delimiter = '-';
$id = strtolower(
    trim(
        preg_replace('/[\s-]+/', $delimiter,
        preg_replace('/[^A-Za-z0-9-]+/', $delimiter,
        preg_replace('/[&]/', 'and',
        preg_replace("/[']/", '',
        iconv('UTF-8', 'ASCII//TRANSLIT', $title))))), $delimiter
    )
);

?>
<span aria-hidden="true" id="<?php echo $id; ?>">
read more 
</span>

*/

?>

