<?php

function RulesByRosita_Social_Render() {
    ob_start();

    $socials = [
        'facebook'  => ['label' => 'Facebook',               'url' => get_theme_mod( 'rules_by_rosita_facebook_url' )],
        'github'    => ['label' => 'GitHub',                 'url' => get_theme_mod( 'rules_by_rosita_github_url' )],
        'instagram' => ['label' => 'Instagram',              'url' => get_theme_mod( 'rules_by_rosita_instagram_url' )],
        'linkedin'  => ['label' => 'LinkedIn',               'url' => get_theme_mod( 'rules_by_rosita_linkedin_url' )],
        'mastodon'  => ['label' => 'Mastodon',               'url' => get_theme_mod( 'rules_by_rosita_mastodon_url' )],
        'pinterest' => ['label' => 'Pinterest',              'url' => get_theme_mod( 'rules_by_rosita_pinterest_url' )],
        'wordpress' => ['label' => 'WordPress.com RSS Feed', 'url' => get_theme_mod( 'rules_by_rosita_wordpress_url' )],
    ];
    ?>
    <div class="social-media">
        <ul>
            <?php foreach ( $socials as $key => $data ) :
                if ( ! empty( $data['url'] ) ) : ?>
                    <li>
                        <a href="<?php echo esc_url( $data['url'] ); ?>" aria-label="Bezoek mijn <?php echo esc_attr( $data['label'] ); ?> profiel" rel="noopener noreferrer">
                            <?php echo rules_by_rosita_icon( $key ); ?>
                        </a>
                    </li>
            <?php endif; endforeach; ?>
        </ul>
    </div>
    <?php

    return ob_get_clean();
}

class RulesByRosita_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'rulesbyrosita_social_widget',
            __( 'Social Media Iconen', 'rules-by-rosita' ),
            array( 'description' => __( 'Toont social media iconen uit de Customizer.', 'rules-by-rosita' ) )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }

        echo RulesByRosita_Social_Render();

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Social Media', 'rules-by-rosita' ); ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Titel:', 'rules-by-rosita' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance          = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
    }
}

function rules_by_rosita_register_social_widget() {
    register_widget( 'RulesByRosita_Social_Widget' );
}
add_action( 'widgets_init', 'rules_by_rosita_register_social_widget' );
