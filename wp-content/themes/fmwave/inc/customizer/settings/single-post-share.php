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
class RDTheme_Single_Post_share_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_single_post_share_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_single_post_share_controls( $wp_customize ) {

        // Post facebook
        $wp_customize->add_setting( 'post_share_facebook',
            array(
                'default' => $this->defaults['post_share_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_facebook',
            array(
                'label' => __( 'Facebook', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post twitter
        $wp_customize->add_setting( 'post_share_twitter',
            array(
                'default' => $this->defaults['post_share_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_twitter',
            array(
                'label' => __( 'Twitter', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post google
        $wp_customize->add_setting( 'post_share_google',
            array(
                'default' => $this->defaults['post_share_google'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_google',
            array(
                'label' => __( 'Google', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post Linkedid
        $wp_customize->add_setting( 'post_share_linkedin',
            array(
                'default' => $this->defaults['post_share_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_linkedin',
            array(
                'label' => __( 'Linkedid', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post pinterest
        $wp_customize->add_setting( 'post_share_pinterest',
            array(
                'default' => $this->defaults['post_share_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_pinterest',
            array(
                'label' => __( 'Pinterest', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post whatsapp
        $wp_customize->add_setting( 'post_share_whatsapp',
            array(
                'default' => $this->defaults['post_share_whatsapp'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_whatsapp',
            array(
                'label' => __( 'Whatsapp', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post stumbleupon
        $wp_customize->add_setting( 'post_share_stumbleupon',
            array(
                'default' => $this->defaults['post_share_stumbleupon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_stumbleupon',
            array(
                'label' => __( 'Stumbleupon', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post tumblr
        $wp_customize->add_setting( 'post_share_tumblr',
            array(
                'default' => $this->defaults['post_share_tumblr'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_tumblr',
            array(
                'label' => __( 'Tumblr', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post reddit
        $wp_customize->add_setting( 'post_share_reddit',
            array(
                'default' => $this->defaults['post_share_reddit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_reddit',
            array(
                'label' => __( 'Reddit', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post email
        $wp_customize->add_setting( 'post_share_email',
            array(
                'default' => $this->defaults['post_share_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_email',
            array(
                'label' => __( 'Email', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));
		// Post print
        $wp_customize->add_setting( 'post_share_print',
            array(
                'default' => $this->defaults['post_share_print'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_print',
            array(
                'label' => __( 'Print', 'fmwave' ),
                'section' => 'single_post_share_section',
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Single_Post_share_Settings();
}
