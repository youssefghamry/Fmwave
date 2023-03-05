<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Error_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {

		$wp_customize->add_setting( 'error_page_image',
			array(
				'default' => $this->defaults['error_page_image'],
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_page_image',
			array(
				'label' => esc_html__( 'Error Image', 'fmwave' ),
				'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
				'section' => 'error_section',
				'mime_type' => 'image',
				'button_labels' => array(
					'select' => esc_html__( 'Select File', 'fmwave' ),
					'change' => esc_html__( 'Change File', 'fmwave' ),
					'default' => esc_html__( 'Default', 'fmwave' ),
					'remove' => esc_html__( 'Remove', 'fmwave' ),
					'placeholder' => esc_html__( 'No file selected', 'fmwave' ),
					'frame_title' => esc_html__( 'Select File', 'fmwave' ),
					'frame_button' => esc_html__( 'Choose File', 'fmwave' ),
				)
			)
		) );
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Text 1', 'fmwave' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        // Error Text
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text 2', 'fmwave' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'fmwave' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Error_Settings();
}
