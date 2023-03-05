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
class RDTheme_Gallery_Post_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_gallery_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_gallery_post_controls( $wp_customize ) {

        // Gallery column
        $wp_customize->add_setting( 'gallery_cols_width',
            array(
                'default' => $this->defaults['gallery_cols_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'gallery_cols_width',
            array(
                'label' => __( 'Gallery Columns', 'fmwave' ),
                'section' => 'gallery_section',
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

        $wp_customize->add_setting( 'gallery_archive_number',
            array(
                'default' => $this->defaults['gallery_archive_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer'
            )
        );
        
        $wp_customize->add_control( 'gallery_archive_number',
            array(
                'label' => __( 'Gallery Item', 'fmwave' ),
                'section' => 'gallery_section',
                'type' => 'number'
            )
        );

        /**
         * Heading for single gallery
         */
        $wp_customize->add_setting('single_gallery_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'single_gallery_heading', array(
            'label' => __( 'Single Gallery', 'fmwave' ),
            'section' => 'gallery_section',
        )));

        // Single Gallery Slug
        $wp_customize->add_setting( 'single_gallery_slug',
            array(
                'default' => $this->defaults['single_gallery_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'single_gallery_slug',
            array(
                'label' => __( 'Single Gallery Slug', 'fmwave' ),
                'section' => 'gallery_section',
                'type' => 'text'
            )
        );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_sg_slug', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_sg_slug', array(
            'settings' => 'separator_sg_slug',
            'section' => 'gallery_section',
        )));
        
        $wp_customize->add_setting( 'gallery_details_image',
            array(
                'default' => $this->defaults['gallery_details_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'gallery_details_image',
            array(
                'label' => __( 'Details Image Crop', 'fmwave' ),
                'section' => 'gallery_section',
                'description' => esc_html__( 'If you want to full size feature image in gallery details page, please select Full Image, detault hard crop image will show.', 'fmwave' ),
                'type' => 'select',
                'choices' => array(
                    'full' => esc_html__( 'Full Image', 'fmwave' ),
                    'fmwave-size-7' => esc_html__( 'Crop Image', 'fmwave' ),
                )
            )
        );
        /**
         * Separator
         */
        $wp_customize->add_setting('separator_sg_details_crop', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_sg_details_crop', array(
            'settings' => 'separator_sg_details_crop',
            'section' => 'gallery_section',
        )));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Gallery_Post_Settings();
}
