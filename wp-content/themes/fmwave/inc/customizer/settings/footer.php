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
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Footer_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {

		// Footer logo
		$wp_customize->add_setting( 'footer_area',
			array(
				'default' => $this->defaults['footer_area'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			)
		);
		$wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_area',
			array(
				'label' => __( 'Show Footer', 'fmwave' ),
				'section' => 'footer_section',
			)
		) );
		// Footer Top Area
		$wp_customize->add_setting( 'footer_top_area',
			array(
				'default' => $this->defaults['footer_top_area'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			)
		);
		$wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_top_area',
			array(
				'label' => __( 'Footer Top Logo Showcase', 'fmwave' ),
				'section' => 'footer_section',
			)
		) );
		// Footer logo
		$wp_customize->add_setting( 'footer_logo',
			array(
				'default' => $this->defaults['footer_logo'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			)
		);
		$wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_logo',
			array(
				'label' => __( 'Footer Logo', 'fmwave' ),
				'section' => 'footer_section',
			)
		) );
		// Footer Social
		$wp_customize->add_setting( 'show_footer_social',
			array(
				'default' => $this->defaults['show_footer_social'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			)
		);
		$wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_footer_social',
			array(
				'label' => __( 'Show Footer Social', 'fmwave' ),
				'section' => 'footer_section',
			)
		) );
		// Copyright Area
		$wp_customize->add_setting( 'copyright_area',
			array(
				'default' => $this->defaults['copyright_area'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			)
		);
		$wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
			array(
				'label' => __( 'Show Copyright Area', 'fmwave' ),
				'section' => 'footer_section',
			)
		) );
        // Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => __( 'Copyright Text', 'fmwave' ),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
        );

        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Footer Layout', 'fmwave' ),
                'description' => esc_html__( 'You can set default footer form here.', 'fmwave' ),
                'section' => 'footer_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'fmwave' )
                    ),
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'fmwave' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'fmwave' )
                    ),
					'4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-4.jpg',
                        'name' => __( 'Layout 4', 'fmwave' )
                    ),
                )
            )
        ) );

        /* = Footer 1
        ======================================================*/
		$wp_customize->add_setting( 'footer_logo_image',
            array(
                'default' => $this->defaults['footer_logo_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo_image',
            array(
                'label' => __( 'Footer Logo', 'fmwave' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'fmwave' ),
                    'change' => __( 'Change File', 'fmwave' ),
                    'default' => __( 'Default', 'fmwave' ),
                    'remove' => __( 'Remove', 'fmwave' ),
                    'placeholder' => __( 'No file selected', 'fmwave' ),
                    'frame_title' => __( 'Select File', 'fmwave' ),
                    'frame_button' => __( 'Choose File', 'fmwave' ),
                )
            )
        ) );

        $wp_customize->add_setting( 'footer_column',
            array(
                'default' => $this->defaults['footer_column'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column',
            array(
                'label' => __( 'Number of Widgets', 'fmwave' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'fmwave' ),
                    '2' => esc_html__( '2 Columns', 'fmwave' ),
                    '3' => esc_html__( '3 Columns', 'fmwave' ),
                    '4' => esc_html__( '4 Columns', 'fmwave' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Footer_Settings();
}
