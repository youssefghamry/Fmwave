<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Show_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_show_post_controls' ) );
	}

    public function register_show_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'schedule_show_related_product',
            array(
                'default' => $this->defaults['schedule_show_related_product'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'schedule_show_related_product',
            array(
                'label' => esc_html__( 'Schedule Related Item', 'fmwave' ),
                'section' => 'show_section',
            )
        ) );
		
		$wp_customize->add_setting( 'schedule_related_title',
            array(
                'default' => $this->defaults['schedule_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'schedule_related_title',
            array(
                'label' => esc_html__( 'Schedule Related Title', 'fmwave' ),
                'section' => 'show_section',
            )
        ) );
		
		$wp_customize->add_setting( 'schedule_related_title_text',
            array(
                'default' => $this->defaults['schedule_related_title_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'schedule_related_title_text',
            array(
                'label' => __( 'Schedule Related Title Text', 'fmwave' ),
                'section' => 'show_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'schedule_related_number',
            array(
                'default' => $this->defaults['schedule_related_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer'
            )
        );
		
        $wp_customize->add_control( 'schedule_related_number',
            array(
                'label' => __( 'Schedule Related No', 'fmwave' ),
                'section' => 'show_section',
                'type' => 'number'
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Show_Post_Settings();
}
