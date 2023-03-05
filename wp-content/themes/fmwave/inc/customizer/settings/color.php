<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Separator_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Color_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_color_controls' ) );
	}

    public function register_color_controls( $wp_customize ) {
        // Primary Color
        $wp_customize->add_setting('primary_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color',
            array(
                'label' => esc_html__('Primary Color', 'fmwave'),
                'settings' => 'primary_color', 
                'section' => 'color_section', 
            )
        ));
		
		// Secondary Color
        $wp_customize->add_setting('secondary_color', 
            array(
                'default' => '#bd2127',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color',
            array(
                'label' => esc_html__('Secondary Color', 'fmwave'),
                'settings' => 'secondary_color', 
                'section' => 'color_section', 
            )
        ));
		
		// Menu Heading
		$wp_customize->add_setting('menu_section', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'menu_section', array(
            'label' => __( 'Menu Color', 'fmwave' ),
            'section' => 'color_section',
        )));
		
		$wp_customize->add_setting('menu_bg_color', 
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bg_color',
            array(
                'label' => esc_html__('Menu Background Color', 'fmwave'),
                'settings' => 'menu_bg_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_color', 
            array(
                'default' => '#111111',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color',
            array(
                'label' => esc_html__('Menu Color', 'fmwave'),
                'settings' => 'menu_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_hover_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color',
            array(
                'label' => esc_html__('Menu Hover Color', 'fmwave'),
                'settings' => 'menu_hover_color', 
                'section' => 'color_section', 
            )
        ));
		
		//Active Menu Icon Color
        $wp_customize->add_setting('active_menu_icon_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'active_menu_icon_color',
            array(
                'label' => esc_html__('Active Menu Icon Color', 'fmwave'),
                'settings' => 'active_menu_icon_color', 
                'section' => 'color_section', 
            )
        ));

        //Active Menu Icon Hover Color
        $wp_customize->add_setting('active_menu_icon_color_hover', 
            array(
                'default' => '#bd2127',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'active_menu_icon_color_hover',
            array(
                'label' => esc_html__('Active Menu Icon Hover Color', 'fmwave'),
                'settings' => 'active_menu_icon_color_hover', 
                'section' => 'color_section', 
            )
        ));
		
		// Submenu color		
		$wp_customize->add_setting('submenu_bg_color', 
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_color',
            array(
                'label' => esc_html__('Sub Menu Background Color', 'fmwave'),
                'settings' => 'submenu_bg_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_color', 
            array(
                'default' => '#444444',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_color',
            array(
                'label' => esc_html__('Sub Menu Color', 'fmwave'),
                'settings' => 'submenu_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_hover_color', 
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_color',
            array(
                'label' => esc_html__('Sub Menu Hover Color', 'fmwave'),
                'settings' => 'submenu_hover_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_hoverbg_color', 
            array(
                'default' => '#111111',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hoverbg_color',
            array(
                'label' => esc_html__('Sub Menu Hover bg Color', 'fmwave'),
                'settings' => 'submenu_hoverbg_color', 
                'section' => 'color_section', 
            )
        ));
		
		// Footer Heading
		$wp_customize->add_setting('footer_section', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'footer_section', array(
            'label' => __( 'Footer Color', 'fmwave' ),
            'section' => 'color_section',
        )));
		
		// Footer Color
		$wp_customize->add_setting('footer_bg_color', 
            array(
                'default' => '#121212',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color',
            array(
                'label' => esc_html__('Footer Background Color', 'fmwave'),
                'settings' => 'footer_bg_color', 
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('footer_title_color', 
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'fmwave'),
                'settings' => 'footer_title_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_text_color', 
            array(
                'default' => '#c0c0c0',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'fmwave'),
                'settings' => 'footer_text_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_link_color', 
            array(
                'default' => '#c0c0c0',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'fmwave'),
                'settings' => 'footer_link_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_hover_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'fmwave'),
                'settings' => 'footer_hover_color', 
                'section' => 'color_section', 
            )
        ));
		$wp_customize->add_setting('footer_left_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_left_color',
            array(
                'label' => esc_html__('Footer Left text Color', 'fmwave'),
                'settings' => 'footer_left_color', 
                'section' => 'color_section', 
            )
        ));
		
		// Copyright Heading
		$wp_customize->add_setting('copyright_section', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'copyright_section', array(
            'label' => __( 'Copyright Color', 'fmwave' ),
            'section' => 'color_section',
        )));
		
		$wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => '#c0c0c0',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'fmwave'),
                'settings' => 'copyright_text_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('copyright_hover_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_hover_color',
            array(
                'label' => esc_html__('Copyright Hover Color', 'fmwave'),
                'settings' => 'copyright_hover_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('copyright_bg_color', 
            array(
                'default' => '#121212',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color',
            array(
                'label' => esc_html__('Copyright Background Color', 'fmwave'),
                'settings' => 'copyright_bg_color', 
                'section' => 'color_section', 
            )
        ));
		
		// Heading
		$wp_customize->add_setting('footer_icon_section', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'footer_icon_section', array(
            'label' => __( 'Footer Icon Color', 'fmwave' ),
            'section' => 'color_section',
        )));
		
		$wp_customize->add_setting('footer_icon_color', 
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_color',
            array(
                'label' => esc_html__('Icon Color', 'fmwave'),
                'settings' => 'footer_icon_color', 
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_iconbg_hover_color', 
            array(
                'default' => '#ec1c24',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_iconbg_hover_color',
            array(
                'label' => esc_html__('Icon Hover bg Color', 'fmwave'),
                'settings' => 'footer_iconbg_hover_color', 
                'section' => 'color_section', 
            )
        ));
		
        

    }

}
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Color_Settings();
}
