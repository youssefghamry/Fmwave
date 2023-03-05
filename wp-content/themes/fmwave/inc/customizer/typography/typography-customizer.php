<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Typography;

use radiustheme\fmwave\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Separator_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

class Customizer_Typography_settings {
	// Get our default values
	private $defaults;

	public function __construct() {
		// Get our Customizer defaults
		$this->defaults = rttheme_generate_defaults();
		// Register Section
		add_action( 'customize_register', array( $this, 'register_typography_sections' ) );
        // Register Controls
		add_action( 'customize_register', array( $this, 'register_typography_controls' ) );
	}


    /**
    * Register the Typography sections
    */
	public function register_typography_sections( $wp_customize ) {
		
		// Add our Footer Section
		$wp_customize->add_section( 'typography_layout_section',
			array(
				'title' => esc_html__( 'Typography', 'fmwave' ),
				'priority' => 2,
			)
		);

	}

	/**
	 * Register our -- general controls
	 */
	public function register_typography_controls( $wp_customize ) {

		// Body Typography
		$wp_customize->add_setting( 'typo_body',
			array(
				'default' => $this->defaults['typo_body'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_body',
			array(
				'label' => __( 'Body', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_body_size',
			array(
				'default' => $this->defaults['typo_body_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_body_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_body_height',
			array(
				'default' => $this->defaults['typo_body_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_body_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);


		/**
         * Menu Typography
         */
        $wp_customize->add_setting('typo_menu_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_menu_separator', array(
            'settings' => 'typo_menu_separator',
            'section' => 'typography_layout_section',
        )));

		$wp_customize->add_setting( 'typo_menu',
			array(
				'default' => $this->defaults['typo_menu'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_menu',
			array(
				'label' => __( 'Menu', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_menu_size',
			array(
				'default' => $this->defaults['typo_menu_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_menu_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_menu_height',
			array(
				'default' => $this->defaults['typo_menu_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_menu_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

		/**
         * Heading Separator
         */
        $wp_customize->add_setting('typo_separator_all_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_all_heading', array(
            'settings' => 'typo_separator_all_heading',
            'section' => 'typography_layout_section',
        )));


        // All Heading Typography
		$wp_customize->add_setting( 'typo_heading',
			array(
				'default' => $this->defaults['typo_heading'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);


		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_heading',
			array(
				'label' => __( 'All Heading Typography ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );


        /**
         * Heading Typography
         */
        $wp_customize->add_setting('typo_separator_general1', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general1', array(
            'settings' => 'typo_separator_general1',
            'section' => 'typography_layout_section',
        )));

		// H1 Google Font Select Control
		$wp_customize->add_setting( 'typo_h1',
			array(
				'default' => $this->defaults['typo_h1'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h1',
			array(
				'label' => __( 'Header h1 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h1_size',
			array(
				'default' => $this->defaults['typo_h1_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h1_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h1_height',
			array(
				'default' => $this->defaults['typo_h1_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h1_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general2', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general2', array(
            'settings' => 'typo_separator_general2',
            'section' => 'typography_layout_section',
        )));

		// h2 Google Font Select Control -----------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h2',
			array(
				'default' => $this->defaults['typo_h2'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h2',
			array(
				'label' => __( 'Header h2 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h2_size',
			array(
				'default' => $this->defaults['typo_h2_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h2_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h2_height',
			array(
				'default' => $this->defaults['typo_h2_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h2_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general3', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general3', array(
            'settings' => 'typo_separator_general3',
            'section' => 'typography_layout_section',
        )));

		// h3 Google Font Select Control------------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h3',
			array(
				'default' => $this->defaults['typo_h3'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h3',
			array(
				'label' => __( 'Header h3 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h3_size',
			array(
				'default' => $this->defaults['typo_h3_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h3_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h3_height',
			array(
				'default' => $this->defaults['typo_h3_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h3_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general4', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general4', array(
            'settings' => 'typo_separator_general4',
            'section' => 'typography_layout_section',
        )));

		// h4 Google Font Select Control ------------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h4',
			array(
				'default' => $this->defaults['typo_h4'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h4',
			array(
				'label' => __( 'Header h4 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h4_size',
			array(
				'default' => $this->defaults['typo_h4_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h4_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h4_height',
			array(
				'default' => $this->defaults['typo_h4_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h4_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general5', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general5', array(
            'settings' => 'typo_separator_general5',
            'section' => 'typography_layout_section',
        )));

		// h5 Google Font Select Control  -------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h5',
			array(
				'default' => $this->defaults['typo_h5'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h5',
			array(
				'label' => __( 'Header h5 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h5_size',
			array(
				'default' => $this->defaults['typo_h5_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h5_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h5_height',
			array(
				'default' => $this->defaults['typo_h5_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h5_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general6', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general6', array(
            'settings' => 'typo_separator_general6',
            'section' => 'typography_layout_section',
        )));

        // h6 Google Font Select Control -----------------------------------------------------------------------------------
        
		$wp_customize->add_setting( 'typo_h6',
			array(
				'default' => $this->defaults['typo_h6'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Customizer_Google_Fonts_Controls( $wp_customize, 'typo_h6',
			array(
				'label' => __( 'Header h6 ', 'fmwave' ),
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h6_size',
			array(
				'default' => $this->defaults['typo_h6_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h6_size',
			array(
				'label' => __( 'Font Size', 'fmwave' ),
				'description' => esc_html__( 'Font Size (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h6_height',
			array(
				'default' => $this->defaults['typo_h6_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h6_height',
			array(
				'label' => __( 'Line Height', 'fmwave' ),
				'description' => esc_html__( 'Line Height (rem)', 'fmwave' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);

        /**
         * Separator
         */
        $wp_customize->add_setting('typo_separator_general7', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'typo_separator_general7', array(
            'settings' => 'typo_separator_general7',
            'section' => 'typography_layout_section',
        )));

	}
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	$rttheme_settings = new Customizer_Typography_settings();
}
