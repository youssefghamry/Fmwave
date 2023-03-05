<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_editor_style( 'style-editor.css' );
update_option('rt_licenses', ['fmwave_license_key' => '*************']);
if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

class Fmwave_Main {
	public $theme   = 'fmwave';
	public $action  = 'fmwave_theme_init';
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		add_action( 'admin_notices',     array( $this, 'plugin_update_notices' ) );
		$this->includes();	
	}
	public function load_textdomain(){
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}
	public function includes(){
		do_action( $this->action );
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/includes.php';
	}
	public function plugin_update_notices() {
		$plugins = array();

		if ( defined( 'FMWAVE_CORE' ) ) {
			if ( version_compare( FMWAVE_CORE, '1.0', '<' ) ) {
				$plugins[] = 'Fmwave Core';
			}
		}

		foreach ( $plugins as $plugin ) {
			$notice = '<div class="error"><p>' . sprintf( __( "Please update plugin <b><i>%s</b></i> to the latest version otherwise some functionalities will not work properly. You can update it from <a href='%s'>here</a>", 'fmwave' ), $plugin, menu_page_url( 'fmwave-install-plugins', false ) ) . '</p></div>';
			echo wp_kses( $notice, 'alltext_allow' );
		}
	}
	
}
new Fmwave_Main;