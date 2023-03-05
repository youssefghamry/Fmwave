<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;

class TGM_Config {
	
	public $fmwave = FMWAVE_THEME_PREFIX;
	public $path   = FMWAVE_THEME_PLUGINS_DIR;
	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
	}
	public function register_required_plugins(){
		$plugins = array(
			// Bundled
			array(
				'name'         => esc_html__('Fmwave Core','fmwave'),
				'slug'         => 'fmwave-core',
				'source'       => 'fmwave-core.zip',
				'required'     =>  true,
				'version'      => '2.3'
			),
			array(
				'name'         => esc_html__('RT Framework','fmwave'),
				'slug'         => 'rt-framework',
				'source'       => 'rt-framework.zip',
				'required'     =>  true,
				'version'      => '2.4'
			),
			array(
				'name'         => esc_html__('RT Demo Importer','fmwave'),
				'slug'         => 'rt-demo-importer',
				'source'       => 'rt-demo-importer.zip',
				'required'     =>  false,
				'version'      => '4.3'
			),
			
			// Repository
			array(
				'name'     => esc_html__('Breadcrumb NavXT','fmwave'),
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Elementor Page Builder','fmwave'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('WP Fluent Forms','fmwave'),
				'slug'     => 'fluentform',
				'required' => false,
			),
			array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Quick View',
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Compare',
				'slug'     => 'yith-woocommerce-compare',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Wishlist',
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			),
		);
		$config = array(
			'id'           => $this->fmwave,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->fmwave . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}
new TGM_Config;