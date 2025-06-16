<?php
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
    'https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Zilla+Slab&display=swap',
    array(),
    null
  );

  // Eigen stylesheet
  wp_enqueue_style(
    'rulesbyrosita-style',
    get_template_directory_uri() . '/css/style.css',
    array('rulesbyrosita-google-fonts'), 
    filemtime(get_template_directory() . '/css/style.css')
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

