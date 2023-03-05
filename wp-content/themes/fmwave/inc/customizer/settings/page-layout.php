<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Page_Layout_Settings extends RDTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_page_layout_controls' ) );
	}

    public function register_page_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'page_layout',
            array(
                'default' => $this->defaults['page_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'page_layout',
            array(
                'label' => __( 'Layout', 'fmwave' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'fmwave' ),
                'section' => 'page_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'fmwave' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'fmwave' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'fmwave' )
                    )
                )
            )
        ) );
		
		// Banner padding top
        $wp_customize->add_setting( 'page_padding_top',
            array(
                'default' => $this->defaults['page_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'page_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'fmwave' ),
                'section' => 'page_layout_section',
                'type' => 'number',
            )
        );
        // Banner padding bottom
        $wp_customize->add_setting( 'page_padding_bottom',
            array(
                'default' => $this->defaults['page_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'page_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'fmwave' ),
                'section' => 'page_layout_section',
                'type' => 'number',
            )
        );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'page_layout_section',
        )));


        $wp_customize->add_setting( 'page_banner',
            array(
                'default' => $this->defaults['page_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_banner',
            array(
                'label' => __( 'Banner', 'fmwave' ),
                'section' => 'page_layout_section',
            )
        ) );

        // Banner BG Type 
        $wp_customize->add_setting( 'page_banner_bg_type',
            array(
                'default' => $this->defaults['page_banner_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_header_banner_enabled',
            )
        );
        $wp_customize->add_control( 'page_banner_bg_type',
            array(
                'label' => __( 'Banner Background Type', 'fmwave' ),
                'section' => 'page_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'fmwave' ),
                    'bgcolor' => esc_html__( 'BG Color', 'fmwave' ),
                ),
                'active_callback' => 'rttheme_is_header_banner_enabled',
            )
        );

        $wp_customize->add_setting( 'page_banner_bgimg',
            array(
                'default' => $this->defaults['page_banner_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'page_banner_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'fmwave' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
                'section' => 'page_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'fmwave' ),
                    'change' => __( 'Change File', 'fmwave' ),
                    'default' => __( 'Default', 'fmwave' ),
                    'remove' => __( 'Remove', 'fmwave' ),
                    'placeholder' => __( 'No file selected', 'fmwave' ),
                    'frame_title' => __( 'Select File', 'fmwave' ),
                    'frame_button' => __( 'Choose File', 'fmwave' ),
                ),
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        ) );
        // Banner background image overlay
        $wp_customize->add_setting('page_banner_bgimage_overlay', 
            array(
                'default' => '#000000', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_banner_bgimage_overlay',
            array(
                'label' => esc_html__('Banner Background Overlay Color', 'fmwave'),
                'settings' => 'page_banner_bgimage_overlay', 
                'priority' => 10, 
                'section' => 'page_layout_section', 
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        ));
        // Banner background color opacity
        $wp_customize->add_setting( 'page_overlay_opacity',
            array(
                'default' => $this->defaults['page_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        );
        $wp_customize->add_control( 'page_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'fmwave' ),
                'section' => 'page_layout_section',
                'type' => 'number',
                'active_callback' => 'rttheme_banner_bgimg_type_condition',
            )
        );

        // Banner background color
        $wp_customize->add_setting('page_banner_bgcolor', 
            array(
                'default' => '#bd2127', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
                'active_callback' => 'rttheme_banner_bgcolor_type_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_banner_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'fmwave'),
                'settings' => 'page_banner_bgcolor', 
                'priority' => 10, 
                'section' => 'page_layout_section', 
                'active_callback' => 'rttheme_banner_bgcolor_type_condition',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page_breadcrumb', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page_breadcrumb', array(
            'settings' => 'separator_page_breadcrumb',
            'section' => 'page_layout_section',
        )));

        $wp_customize->add_setting( 'page_breadcrumb',
            array(
                'default' => $this->defaults['page_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'fmwave' ),
                'section' => 'page_layout_section',
            )
        ) );

        // Banner padding top
        $wp_customize->add_setting( 'page_inner_padding_top',
            array(
                'default' => $this->defaults['page_inner_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'page_inner_padding_top',
            array(
                'label' => __( 'Banner Padding Top', 'fmwave' ),
                'section' => 'page_layout_section',
                'type' => 'number',
            )
        );
        // Banner padding bottom
        $wp_customize->add_setting( 'page_inner_padding_bottom',
            array(
                'default' => $this->defaults['page_inner_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'page_inner_padding_bottom',
            array(
                'label' => __( 'Banner Padding Bottom', 'fmwave' ),
                'section' => 'page_layout_section',
                'type' => 'number',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Page_Layout_Settings();
}
