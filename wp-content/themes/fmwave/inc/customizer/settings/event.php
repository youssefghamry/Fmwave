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
use radiustheme\fmwave\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_event_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_event_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_event_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'event_no',
            array(
                'default' => $this->defaults['event_no'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_no',
            array(
                'label' => esc_html__( 'Event Number', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		
		$wp_customize->add_setting( 'event_read',
            array(
                'default' => $this->defaults['event_read'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_read',
            array(
                'label' => esc_html__( 'Event Read More', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		
		$wp_customize->add_setting( 'event_cols_width',
            array(
                'default' => $this->defaults['event_cols_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'event_cols_width',
            array(
                'label' => __( 'Event Archive Columns', 'fmwave' ),
                'section' => 'event_section',
                'description' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, gallery columns devided by the selected bootstrap columns', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    '6' => esc_html__( '2 Columns', 'fmwave' ),
                    '4' => esc_html__( '3 Columns', 'fmwave' ),
                    '3' => esc_html__( '4 Columns', 'fmwave' ),
                    '2' => esc_html__( '6 Columns', 'fmwave' ),
                )
            )
        );
		
		$wp_customize->add_setting( 'event_start_date',
            array(
                'default' => $this->defaults['event_start_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_start_date',
            array(
                'label' => esc_html__( 'Start Date', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_end_date',
            array(
                'default' => $this->defaults['event_end_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_end_date',
            array(
                'label' => esc_html__( 'End Date', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_start_time',
            array(
                'default' => $this->defaults['event_start_time'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_start_time',
            array(
                'label' => esc_html__( 'Start Time', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_end_time',
            array(
                'default' => $this->defaults['event_end_time'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_end_time',
            array(
                'label' => esc_html__( 'End Time', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_location',
            array(
                'default' => $this->defaults['event_location'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_location',
            array(
                'label' => esc_html__( 'Location', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_website',
            array(
                'default' => $this->defaults['event_website'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_website',
            array(
                'label' => esc_html__( 'Website', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_address',
            array(
                'default' => $this->defaults['event_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_address',
            array(
                'label' => esc_html__( 'Address', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_type',
            array(
                'default' => $this->defaults['event_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_type',
            array(
                'label' => esc_html__( 'Event Type', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_phone',
            array(
                'default' => $this->defaults['event_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_phone',
            array(
                'label' => esc_html__( 'Phone', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_seatno',
            array(
                'default' => $this->defaults['event_seatno'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_seatno',
            array(
                'label' => esc_html__( 'Seat No', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_map',
            array(
                'default' => $this->defaults['event_map'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_map',
            array(
                'label' => esc_html__( 'Google Map', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );
		$wp_customize->add_setting( 'event_tickets',
            array(
                'default' => $this->defaults['event_tickets'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_tickets',
            array(
                'label' => esc_html__( 'Tickets', 'fmwave' ),
                'section' => 'event_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_event_Post_Settings();
}
