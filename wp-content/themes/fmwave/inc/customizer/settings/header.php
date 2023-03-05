<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Header_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'fmwave' ),
            'section' => 'header_section',
        )));

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'fmwave' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'fmwave' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.jpg',
                        'name' => __( 'Layout 1', 'fmwave' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.jpg',
                        'name' => __( 'Layout 2', 'fmwave' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.jpg',
                        'name' => __( 'Layout 3', 'fmwave' )
                    ),
					'4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.jpg',
                        'name' => __( 'Layout 4', 'fmwave' )
                    ),
                )
            )
        ) );
		/*search icon*/
		$wp_customize->add_setting( 'header_search',
            array(
                'default' => $this->defaults['header_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_search',
            array(
                'label' => esc_html__( 'Header Search', 'fmwave' ),
                'section' => 'header_section',
            )
        ) );
		/*Cart icon*/
		$wp_customize->add_setting( 'header_cart',
            array(
                'default' => $this->defaults['header_cart'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_cart',
            array(
                'label' => esc_html__( 'Header Cart', 'fmwave' ),
                'section' => 'header_section',
            )
        ) );
		/*offcanvus icon*/
		$wp_customize->add_setting( 'header_offcanvas',
            array(
                'default' => $this->defaults['header_offcanvas'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_offcanvas',
            array(
                'label' => esc_html__( 'Header Offcanvas', 'fmwave' ),
                'section' => 'header_section',
            )
        ) );

		$wp_customize->add_setting( 'header_button',
            array(
                'default' => $this->defaults['header_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_button',
            array(
                'label' => esc_html__( 'Header Button', 'fmwave' ),
                'section' => 'header_section',
            )
        ) );
        // Call To Action
        $wp_customize->add_setting( 'menu_btn_text',
            array(
                'default' => $this->defaults['menu_btn_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'menu_btn_text',
            array(
                'label' => __( 'Menu Button Text', 'fmwave' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        // Button URL
        $wp_customize->add_setting( 'menu_btn_link',
            array(
                'default' => $this->defaults['menu_btn_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'menu_btn_link',
            array(
                'label' => __( 'Menu Button Link', 'fmwave' ),
                'section' => 'header_section',
                'type' => 'url',
            )
        );

        /**
         * Heading for Offcanvas Menu
         */
        $wp_customize->add_setting('offcanvas_menu_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'offcanvas_menu_heading', array(
            'label' => __( 'Offcanvas Menu', 'fmwave' ),
            'section' => 'header_section',
        )));

        // Logo Area Width
        $wp_customize->add_setting( 'offcanvas_menu_alignment',
            array(
                'default' => $this->defaults['offcanvas_menu_alignment'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'offcanvas_menu_alignment',
            array(
                'label' => __( 'Menu List Alignment', 'fmwave' ),
                'section' => 'header_section',
                'description' => esc_html__( 'Offcanvas menu list alignment', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    'text-left' => esc_html__( 'Left', 'fmwave' ),
                    'text-center' => esc_html__( 'Center', 'fmwave' ),
                    'text-right' => esc_html__( 'Right', 'fmwave' ),
                )
            )
        );

        $wp_customize->add_setting( 'offcanvas_menu_bgimg',
            array(
                'default' => $this->defaults['offcanvas_menu_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'offcanvas_menu_bgimg',
            array(
                'label' => __( 'Offcanvas Menu Background Image', 'fmwave' ),
                'description' => esc_html__( 'This option work for Offcanvas menu background image', 'fmwave' ),
                'section' => 'header_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => esc_html__( 'Select File', 'fmwave' ),
                    'change' => esc_html__( 'Change File', 'fmwave' ),
                    'default' => esc_html__( 'Default', 'fmwave' ),
                    'remove' => esc_html__( 'Remove', 'fmwave' ),
                    'placeholder' => esc_html__( 'No file selected', 'fmwave' ),
                    'frame_title' => esc_html__( 'Select File', 'fmwave' ),
                    'frame_button' => esc_html__( 'Choose File', 'fmwave' ),
                ),
            )
        ) );
        // Banner background image overlay
        $wp_customize->add_setting('offcanvas_bgimg_overlay', 
            array(
                'default' => 'rgba(0, 0, 0, 0.5)', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'offcanvas_bgimg_overlay',
            array(
                'label' => esc_html__('Banner Background Overlay Color', 'fmwave'),
                'settings' => 'offcanvas_bgimg_overlay', 
                'priority' => 10, 
                'section' => 'header_section', 
            )
        ));
        // Banner background color opacity
        $wp_customize->add_setting( 'offcanvas_bgimg_opacity',
            array(
                'default' => $this->defaults['offcanvas_bgimg_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'offcanvas_bgimg_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'fmwave' ),
                'section' => 'header_section',
                'type' => 'number',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Header_Settings();
}
