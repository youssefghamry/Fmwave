<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Blog_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog Layout', 'fmwave' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'fmwave' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog2.jpg',
                        'name' => __( 'Layout 1', 'fmwave' )
                    ),
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.jpg',
                        'name' => __( 'Layout 2', 'fmwave' )
                    ),
                )
            )
        ) );

        // Post Category
        $wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Display Category', 'fmwave' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        // Post Date
        $wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Display Date', 'fmwave' ),
                'section' => 'blog_post_settings_section',
            )
        ));

        // Author Name
        $wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Display Author Name', 'fmwave' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        // Excerpt Length
        $wp_customize->add_setting( 'excerpt_length',
            array(
                'default' => $this->defaults['excerpt_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer'
            )
        );
        $wp_customize->add_control( 'excerpt_length',
            array(
                'label' => __( 'Excerpt Length', 'fmwave' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number'
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Blog_Post_Settings();
}
