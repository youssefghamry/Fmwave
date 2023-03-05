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
class RDTheme_Woo_Shop_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_woo_shop_controls' ) );
	}

    public function register_woo_shop_controls( $wp_customize ) {
		
		$wp_customize->add_setting('products_cols_width',
			array(
				'default'           => $this->defaults['products_cols_width'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_sanitize_integer'
			)
        );
        $wp_customize->add_control('products_cols_width',
			array(
			   'label'       => esc_html__('Products Per Column', 'fmwave'),
			   'description' => esc_html__('Use product per col default 4', 'fmwave'),
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );
		
		$wp_customize->add_setting('products_per_page',
			array(
				'default'           => $this->defaults['products_per_page'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_sanitize_integer'
			)
        );
        $wp_customize->add_control('products_per_page',
			array(
			   'label'       => esc_html__('Number of items per page', 'fmwave'),
			   'description' => esc_html__('Effect only for Shop custom page template ', 'fmwave'),
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );
			
		// Quick view
        $wp_customize->add_setting( 'wc_shop_quickview_icon',
            array(
                'default' => $this->defaults['wc_shop_quickview_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_quickview_icon',
            array(
                'label' => __( 'Quickview', 'fmwave' ),
                'section' => 'shop_layout_section',
            )
        ) );
		
		// Quick view
        $wp_customize->add_setting( 'wc_shop_wishlist_icon',
            array(
                'default' => $this->defaults['wc_shop_wishlist_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_wishlist_icon',
            array(
                'label' => __( 'Wishlist', 'fmwave' ),
                'section' => 'shop_layout_section',
            )
        ) );
		
		// Compare view
        $wp_customize->add_setting( 'wc_shop_compare_icon',
            array(
                'default' => $this->defaults['wc_shop_compare_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_compare_icon',
            array(
                'label' => __( 'Compare', 'fmwave' ),
                'section' => 'shop_layout_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Woo_Shop_Settings();
}
