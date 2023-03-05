<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave\Customizer\Settings;

use radiustheme\fmwave\Customizer\RDTheme_Customizer;
use radiustheme\fmwave\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\fmwave\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_General_Settings extends RDTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        
		
		//site logo
        $wp_customize->add_setting('site_logo', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_logo', array(
            'label' => __( 'Site Logo', 'fmwave' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'logo',
            array(
                'default' => $this->defaults['logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
            array(
                'label' => __( 'Main Logo', 'fmwave' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
                'section' => 'general_section',
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

        $wp_customize->add_setting( 'logo_dark',
            array(
                'default' => $this->defaults['logo_dark'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_dark',
            array(
                'label' => __( 'Logo Dark', 'fmwave' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
                'section' => 'general_section',
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

        

        /**
         * Heading
         */
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => __( 'Site Switch Control', 'fmwave' ),
            'section' => 'general_section',
        )));


        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting( 'preloader',
            array(
                'default' => $this->defaults['preloader'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'preloader',
            array(
                'label' => __( 'Preloader', 'fmwave' ),
                'section' => 'general_section',
            )
        ) );
        $wp_customize->add_setting( 'preloader_image',
            array(
                'default' => $this->defaults['preloader_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
	            'active_callback' => 'rttheme_preloader_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'preloader_image',
            array(
                'label' => esc_html__( 'Preloader Image', 'fmwave' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'fmwave' ),
                'section' => 'general_section',
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
	            'active_callback' => 'rttheme_preloader_condition',
            )
        ) );

        // Switch for back to top button
        $wp_customize->add_setting( 'page_scrolltop',
            array(
                'default' => $this->defaults['page_scrolltop'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_scrolltop',
            array(
                'label' => esc_html__( 'Back to Top', 'fmwave' ),
                'section' => 'general_section',
            )
        ) );

        // Switch for custom cursor
        $wp_customize->add_setting( 'sticky_header',
            array(
                'default' => $this->defaults['sticky_header'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_header',
            array(
                'label' => esc_html__( 'Sticky Header', 'fmwave' ),
                'section' => 'general_section',
            )
        ) );

        /**
         * Heading for custom cursor
         */
        $wp_customize->add_setting('custom_cursor_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'custom_cursor_heading', array(
            'label' => esc_html__( 'Custom Cursor', 'fmwave' ),
            'section' => 'general_section',
        )));
        // Switch for custom cursor
        $wp_customize->add_setting( 'page_cursor',
            array(
                'default' => $this->defaults['page_cursor'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_cursor',
            array(
                'label' => esc_html__( 'Custom Cursor', 'fmwave' ),
                'section' => 'general_section',
            )
        ) );
        // Custom Cursor Color
        $wp_customize->add_setting('custom_cursor_color', 
            array(
                'default' => '#ff0000',
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_cursor_color',
            array(
                'label' => esc_html__('Custom Cursor Color', 'fmwave'),
                'settings' => 'custom_cursor_color', 
                'priority' => 10, 
                'section' => 'general_section', 
            )
        ));

        /**
         * Heading
         */
        $wp_customize->add_setting('social_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'social_heading', array(
            'label' => esc_html__( 'Contact And Social', 'fmwave' ),
            'section' => 'general_section',
        )));

        // Facebook Url
        $wp_customize->add_setting( 'facehook_url',
            array(
                'default' => $this->defaults['facehook_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'facehook_url',
            array(
                'label' => esc_html__( 'Facebook', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
        // Twitter Url
        $wp_customize->add_setting( 'twitter_url',
            array(
                'default' => $this->defaults['twitter_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'twitter_url',
            array(
                'label' => esc_html__( 'Twitter', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
        // Instagram Url
        $wp_customize->add_setting( 'instagram_url',
            array(
                'default' => $this->defaults['instagram_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'instagram_url',
            array(
                'label' => esc_html__( 'Instagram', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
        // Youtube Url
        $wp_customize->add_setting( 'youtube_url',
            array(
                'default' => $this->defaults['youtube_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'youtube_url',
            array(
                'label' => esc_html__( 'Youtube', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
        // Pinterest Url
        $wp_customize->add_setting( 'pinterest_url',
            array(
                'default' => $this->defaults['pinterest_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'pinterest_url',
            array(
                'label' => esc_html__( 'Pinterest', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
        // Linkedin Url
        $wp_customize->add_setting( 'linkedin_url',
            array(
                'default' => $this->defaults['linkedin_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'linkedin_url',
            array(
                'label' => esc_html__( 'Linkedin', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		// rss Url
        $wp_customize->add_setting( 'rss_url',
            array(
                'default' => $this->defaults['rss_url'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'rss_url',
            array(
                'label' => esc_html__( 'RSS', 'fmwave' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );

		// Slug Changes Music
		$wp_customize->add_setting( 'music_slug',
			array(
				'default' => $this->defaults['music_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'music_slug',
			array(
				'label' => esc_html__( 'Music/Track Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => esc_html__( 'music', 'fmwave' ),
				),
			)
		);

		$wp_customize->add_setting( 'music_cat_slug',
			array(
				'default' => $this->defaults['music_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'music_cat_slug',
			array(
				'label' => esc_html__( 'Music Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => esc_html__( 'music-cat', 'fmwave' ),
				),
			)
		);
		$wp_customize->add_setting( 'music_genre_slug',
			array(
				'default' => $this->defaults['music_genre_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'music_genre_slug',
			array(
				'label' => esc_html__( 'Music Genre Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => esc_html__( 'genre', 'fmwave' ),
				),
			)
		);
		$wp_customize->add_setting( 'music_album_slug',
			array(
				'default' => $this->defaults['music_album_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'music_album_slug',
			array(
				'label' => esc_html__( 'Music Album Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => esc_html__( 'Album', 'fmwave' ),
				),
			)
		);
		// Slug Changes Podcast
		$wp_customize->add_setting( 'podcast_slug',
			array(
				'default' => $this->defaults['podcast_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'podcast_slug',
			array(
				'label' => __( 'Podcast Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'podcast', 'fmwave' ),
				),
			)
		);

		$wp_customize->add_setting( 'podcast_cat_slug',
			array(
				'default' => $this->defaults['podcast_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'podcast_cat_slug',
			array(
				'label' => __( 'Podcast Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'podcast-cat', 'fmwave' ),
				),
			)
		);
		$wp_customize->add_setting( 'show_cat_slug',
			array(
				'default' => $this->defaults['show_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'show_cat_slug',
			array(
				'label' => __( 'Show Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'show-cat', 'fmwave' ),
				),
			)
		);
		// Slug Changes show
		$wp_customize->add_setting( 'show_slug',
			array(
				'default' => $this->defaults['show_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'show_slug',
			array(
				'label' => __( 'Show Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'show', 'fmwave' ),
				),
			)
		);
		// slug changes team
		$wp_customize->add_setting( 'team_slug',
			array(
				'default' => $this->defaults['team_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'team_slug',
			array(
				'label' => __( 'Team Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'team', 'fmwave' ),
				),
			)
		);

		$wp_customize->add_setting( 'team_cat_slug',
			array(
				'default' => $this->defaults['team_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'team_cat_slug',
			array(
				'label' => __( 'Team Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'team-cat', 'fmwave' ),
				),
			)
		);
		// Slug Changes Event
		$wp_customize->add_setting( 'event_slug',
			array(
				'default' => $this->defaults['event_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'event_slug',
			array(
				'label' => __( 'Event Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'event', 'fmwave' ),
				),
			)
		);
		$wp_customize->add_setting( 'event_cat_slug',
			array(
				'default' => $this->defaults['event_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'event_cat_slug',
			array(
				'label' => __( 'Event Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'event-cat', 'fmwave' ),
				),
			)
		);
		// Slug Changes Gallery
		$wp_customize->add_setting( 'gallery_slug',
			array(
				'default' => $this->defaults['gallery_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'gallery_slug',
			array(
				'label' => __( 'Gallery Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'gallery', 'fmwave' ),
				),
			)
		);
		$wp_customize->add_setting( 'gallery_cat_slug',
			array(
				'default' => $this->defaults['gallery_cat_slug'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'gallery_cat_slug',
			array(
				'label' => __( 'Gallery Cat Slug', 'fmwave' ),
				'description' => esc_html__( 'Change the slug name', 'fmwave' ),
				'section' => 'general_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rt-txt-box',
					'style' => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'gallery-cat', 'fmwave' ),
				),
			)
		);

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_General_Settings();
}
