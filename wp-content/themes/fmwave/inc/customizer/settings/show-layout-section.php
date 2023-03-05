<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\Controls\Customizer_Dropdown_Select2_Control;
use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Image_Radio_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Show_Layout_Settings extends RDTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_single_show_layout_controls' ) );
	}

    public function register_single_show_layout_controls( $wp_customize ) {
		
	    $wp_customize->add_setting( 'show_padding_top',
		    array(
			    'default' => $this->defaults['show_padding_top'],
			    'transport' => 'refresh',
			    'sanitize_callback' => 'rttheme_text_sanitization'
		    )
	    );
	    $wp_customize->add_control( 'show_padding_top',
		    array(
			    'label' => __( 'Content Padding Top (rem)', 'fmwave' ),
			    'description' => esc_html__( 'Show Padding Top ', 'fmwave' ),
			    'section' => 'show_layout_section',
			    'type' => 'text'
		    )
	    );
	
	    $wp_customize->add_setting( 'show_padding_bottom',
		    array(
			    'default' => $this->defaults['show_padding_bottom'],
			    'transport' => 'refresh',
			    'sanitize_callback' => 'rttheme_text_sanitization'
		    )
	    );
	    $wp_customize->add_control( 'show_padding_bottom',
		    array(
			    'label' => __( 'Content Padding Bottom (rem)', 'fmwave' ),
			    'description' => esc_html__( 'Show Padding Bottom', 'fmwave' ),
			    'section' => 'show_layout_section',
			    'type' => 'text'
		    )
	    );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Show_Layout_Settings();
}
