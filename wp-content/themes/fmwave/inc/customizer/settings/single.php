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
class RDTheme_Blog_Single_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_single_post_controls( $wp_customize ) {

       
		// Post Date
        $wp_customize->add_setting( 'post_date',
            array(
                'default' => $this->defaults['post_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_date',
            array(
                'label' => __( 'Display Date', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ));
        // Post Author Name
        $wp_customize->add_setting( 'post_author_name',
            array(
                'default' => $this->defaults['post_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_name',
            array(
                'label' => __( 'Display Author Name', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ));
        // Post Comment Number
        $wp_customize->add_setting( 'post_comment_num',
            array(
                'default' => $this->defaults['post_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_comment_num',
            array(
                'label' => __( 'Display Comment', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ));
        // Post Tag
        $wp_customize->add_setting( 'post_tags',
            array(
                'default' => $this->defaults['post_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_tags',
            array(
                'label' => __( 'Display Tags', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ) );
		// Post share
        $wp_customize->add_setting( 'post_share',
            array(
                'default' => $this->defaults['post_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share',
            array(
                'label' => __( 'Display Share', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Category
        $wp_customize->add_setting( 'post_cats',
            array(
                'default' => $this->defaults['post_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_cats',
            array(
                'label' => __( 'Display Category', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Navigation
        $wp_customize->add_setting( 'post_navigation',
            array(
                'default' => $this->defaults['post_navigation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_navigation',
            array(
                'label' => __( 'Display Post Navigation', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Navigation
        $wp_customize->add_setting( 'post_author_about',
            array(
                'default' => $this->defaults['post_author_about'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_about',
            array(
                'label' => __( 'Display Post Author', 'fmwave' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Blog_Single_Post_Settings();
}
