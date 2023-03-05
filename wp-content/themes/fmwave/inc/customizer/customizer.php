<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\fmwave\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Customizer {
	// Get our default values
	protected $defaults;
    protected static $instance = null;

	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'add_customizer_panels' ) );
		// Register sections
		add_action( 'customize_register', array( $this, 'add_customizer_sections' ) );
	}

    public static function instance() {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function populated_default_data() {
        $this->defaults = rttheme_generate_defaults();
    }

	/**
	 * Customizer Panels
	 */
	public function add_customizer_panels( $wp_customize ) {

	    // Add Layput Panel
		$wp_customize->add_panel( 'rttheme_layouts_defaults',
		 	array(
				'title' => __( 'Layout Settings', 'fmwave' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'fmwave' ),
				'priority' => 5,
			)
		);

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_blog_settings',
            array(
                'title' => __( 'Blog Settings', 'fmwave' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'fmwave' ),
                'priority' => 6,
            )
        );
		
	}

    /**
    * Customizer sections
    */
	public function add_customizer_sections( $wp_customize ) {

		// Rename the default Colors section
		$wp_customize->get_section( 'colors' )->title = 'Background';

		// Move the default Colors section to our new Colors Panel
		$wp_customize->get_section( 'colors' )->panel = 'colors_panel';

		// Change the Priority of the default Colors section so it's at the top of our Panel
		$wp_customize->get_section( 'colors' )->priority = 10;

		// Add General Section
		$wp_customize->add_section( 'general_section',
			array(
				'title' => __( 'General', 'fmwave' ),
				'priority' => 1,
			)
		);
		
		// Add General Section
		$wp_customize->add_section( 'color_section',
			array(
				'title' => __( 'Color', 'fmwave' ),
				'priority' => 2,
			)
		);

		// Add Header Main Section
		$wp_customize->add_section( 'header_section',
			array(
				'title' => __( 'Header', 'fmwave' ),
				'priority' => 3,
			)
		);

        // Add Footer Section
        $wp_customize->add_section( 'footer_section',
            array(
                'title' => __( 'Footer', 'fmwave' ),
                'priority' => 4,
            )
        );
        // Add Pages Layout Section
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => __( 'Pages Layout', 'fmwave' ),
                'priority' => 1,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Single Pages Layout Section
        $wp_customize->add_section( 'single_post_layout_section',
            array(
                'title' => __( 'Single Page Layout', 'fmwave' ),
                'priority' => 2,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Blog Settings Section
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => __( 'Blog Settings', 'fmwave' ),
                'priority' => 7,
                'panel' => 'rttheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => __( 'Single Post Settings', 'fmwave' ),
                'priority' => 8,
                'panel' => 'rttheme_blog_settings',
            )
        );
		// Add Single post share
        $wp_customize->add_section( 'single_post_share_section',
            array(
                'title' => __( 'Single Post Share', 'fmwave' ),
                'priority' => 8,
                'panel' => 'rttheme_blog_settings',
            )
        );

        // Add Gallery Section
        $wp_customize->add_section( 'gallery_section',
            array(
                'title' => __( 'Gallery', 'fmwave' ),
                'priority' => 9,
            )
        );
		
		// Add team Section
        $wp_customize->add_section( 'team_section',
            array(
                'title' => __( 'Team', 'fmwave' ),
                'priority' => 9,
            )
        );
		
		// Add event Section
        $wp_customize->add_section( 'event_section',
            array(
                'title' => __( 'Event', 'fmwave' ),
                'priority' => 9,
            )
        );

        // Add Header Main Section
        $wp_customize->add_section( 'show_section',
            array(
                'title' => __( 'Show', 'fmwave' ),
                'priority' => 10,
            )
        );

        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => __( 'Error Page', 'fmwave' ),
                'priority' => 11,
            )
        );		
		
		// Add our wooCommerce shop Section
        $wp_customize->add_section('shop_layout_section',
			array(
			   'title'    => esc_html__('Shop Page Layout', 'fmwave'),
			   'priority' => 95,
			   'panel'    => 'woocommerce',
			)
        );
		
		// Add our wooCommerce product Section
        $wp_customize->add_section('product_layout_section',
			array(
			   'title'    => esc_html__('Shop Single Layout', 'fmwave'),
			   'priority' => 96,
			   'panel'    => 'woocommerce',
			)
        );

	}

}
