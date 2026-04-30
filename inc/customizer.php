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
