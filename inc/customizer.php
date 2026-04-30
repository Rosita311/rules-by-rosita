<?php

function rules_by_rosita_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'social_settings', array(
        'title'    => __( 'Social Media', 'rules-by-rosita' ),
        'priority' => 30,
    ) );

    $socials = [
        'facebook'  => __( 'Facebook URL', 'rules-by-rosita' ),
        'instagram' => __( 'Instagram URL', 'rules-by-rosita' ),
        'linkedin'  => __( 'LinkedIn URL', 'rules-by-rosita' ),
        'mastodon'  => __( 'Mastodon URL', 'rules-by-rosita' ),
        'github'    => __( 'GitHub URL', 'rules-by-rosita' ),
        'wordpress' => __( 'WordPress.com RSS Feed', 'rules-by-rosita' ),
        'pinterest' => __( 'Pinterest URL', 'rules-by-rosita' ),
    ];

    foreach ( $socials as $key => $label ) {
        $wp_customize->add_setting( "rules_by_rosita_{$key}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( "rules_by_rosita_{$key}_url", array(
            'label'   => $label,
            'section' => 'social_settings',
            'type'    => 'url',
        ) );
    }
}
add_action( 'customize_register', 'rules_by_rosita_customize_register' );

function rules_by_rosita_analytics_register( $wp_customize ) {
    $wp_customize->add_section( 'analytics_settings', array(
        'title'    => __( 'Analytics', 'rules-by-rosita' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'rules_by_rosita_ga_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'rules_by_rosita_ga_id', array(
        'label'       => __( 'Google Analytics ID', 'rules-by-rosita' ),
        'description' => __( 'Bijv. G-XXXXXXXXXX', 'rules-by-rosita' ),
        'section'     => 'analytics_settings',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'rules_by_rosita_analytics_register' );

function rules_by_rosita_analytics() {
    $ga_id = get_theme_mod( 'rules_by_rosita_ga_id' );
    if ( ! $ga_id ) return;
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga_id ); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo esc_js( $ga_id ); ?>');
    </script>
    <?php
}
add_action( 'wp_head', 'rules_by_rosita_analytics' );
