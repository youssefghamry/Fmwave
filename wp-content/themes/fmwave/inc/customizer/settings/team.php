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
class RDTheme_Team_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_team_post_controls' ) );
	}

    /**
     * Team Post Controls
     */
    public function register_team_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'team_cols_width',
            array(
                'default' => $this->defaults['team_cols_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'team_cols_width',
            array(
                'label' => __( 'Team Columns', 'fmwave' ),
                'section' => 'team_section',
                'description' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, Team columns devided by the selected bootstrap columns', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    '6' => esc_html__( '2 Columns', 'fmwave' ),
                    '4' => esc_html__( '3 Columns', 'fmwave' ),
                    '3' => esc_html__( '4 Columns', 'fmwave' ),
                    '2' => esc_html__( '6 Columns', 'fmwave' ),
                )
            )
        );
		
		$wp_customize->add_setting( 'team_arc_show',
            array(
                'default' => $this->defaults['team_arc_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_arc_show',
            array(
                'label' => esc_html__( 'Team Show', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );
		$wp_customize->add_setting( 'team_arc_date',
            array(
                'default' => $this->defaults['team_arc_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_arc_date',
            array(
                'label' => esc_html__( 'Date', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );
		$wp_customize->add_setting( 'team_arc_social',
            array(
                'default' => $this->defaults['team_arc_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_arc_social',
            array(
                'label' => esc_html__( 'Social', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );
		
		// heading
		$wp_customize->add_setting('single_team_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'single_team_heading', array(
            'label' => __( 'Single Team Settings', 'fmwave' ),
            'section' => 'team_section',
        )));
		
		$wp_customize->add_setting( 'team_related_show',
            array(
                'default' => $this->defaults['team_related_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_related_show',
            array(
                'label' => esc_html__( 'Related Show', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );

        $wp_customize->add_setting( 'team_related_schedule',
            array(
                'default' => $this->defaults['team_related_schedule'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_related_schedule',
            array(
                'label' => esc_html__( 'Related Schedule', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );

        $wp_customize->add_setting( 'team_related_team',
            array(
                'default' => $this->defaults['team_related_team'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_related_team',
            array(
                'label' => esc_html__( 'Related Team', 'fmwave' ),
                'section' => 'team_section',
            )
        ) );
		
        //Show related title
		$wp_customize->add_setting( 'team_show_related_title',
            array(
                'default' => $this->defaults['team_show_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_show_related_title',
            array(
                'label' => __( 'Show Related Title', 'fmwave' ),
                'section' => 'team_section',
                'type' => 'text',
            )
        );

        //Schedule related title
        $wp_customize->add_setting( 'team_schedule_related_title',
            array(
                'default' => $this->defaults['team_schedule_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_schedule_related_title',
            array(
                'label' => __( 'Schedule Related Title', 'fmwave' ),
                'section' => 'team_section',
                'type' => 'text',
            )
        );

        //Team related title
        $wp_customize->add_setting( 'team_related_title',
            array(
                'default' => $this->defaults['team_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_related_title',
            array(
                'label' => __( 'Team Related Title', 'fmwave' ),
                'section' => 'team_section',
                'type' => 'text',
            )
        );

        //Team item show
        $wp_customize->add_setting( 'related_show_number',
            array(
                'default' => $this->defaults['related_show_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer'
            )
        );
        
        $wp_customize->add_control( 'related_show_number',
            array(
                'label' => __( 'Related Show Item', 'fmwave' ),
                'section' => 'team_section',
                'type' => 'number'
            )
        );
		
		$wp_customize->add_setting( 'related_team_number',
            array(
                'default' => $this->defaults['related_team_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer'
            )
        );
		
        $wp_customize->add_control( 'related_team_number',
            array(
                'label' => __( 'Related Team Item', 'fmwave' ),
                'section' => 'team_section',
                'type' => 'number'
            )
        );
		
		// Post Query 
        $wp_customize->add_setting( 'related_team_query',
            array(
                'default' => $this->defaults['related_team_query'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_query',
            array(
                'label' => __( 'Query Type', 'fmwave' ),
                'section' => 'team_section',
                'description' => esc_html__( 'Post Query', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    'cat' => esc_html__( 'Posts in the same Categories', 'fmwave' ),
                    'tag' => esc_html__( 'Posts in the same Tags', 'fmwave' ),
                    'author' => esc_html__( 'Posts by the same Author', 'fmwave' ),
                ),
            )
        );
		
		// Display post Order
        $wp_customize->add_setting( 'related_team_sort',
            array(
                'default' => $this->defaults['related_team_sort'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_sort',
            array(
                'label' => __( 'Sort Order', 'fmwave' ),
                'section' => 'team_section',
                'description' => esc_html__( 'Display post Order', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    'recent' => esc_html__( 'Recent Posts', 'fmwave' ),
                    'rand' => esc_html__( 'Random Posts', 'fmwave' ),
                    'modified' => esc_html__( 'First Published Posts', 'fmwave' ),
                    'popular' => esc_html__( 'Most Commented posts', 'fmwave' ),
                    'views' => esc_html__( 'Most Viewed posts', 'fmwave' ),
                ),
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Team_Post_Settings();
}
