<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
use \WP_Query;
use Elementor\Plugin;

class Scripts {
	public $fmwave  = FMWAVE_THEME_PREFIX;
	public $version = FMWAVE_THEME_VERSION;	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );		
		add_action( 'admin_enqueue_scripts',array( $this, 'admin_conditional_scripts' ), 1 );

		add_action( 'wp_ajax_audio_view_count',array( $this, 'audio_view_count' ) );
		add_action( 'wp_ajax_nopriv_audio_view_count',array( $this, 'audio_view_count' ) );
	}

	public function fonts_url() {
		$fonts_url 	= '';
		$subsets 	= 'latin';
		$bodyFont 	= 'Roboto';
		$bodyFW 	= '400,500,600,700';

		$h1Font = 'Poppins';
		$h2Font = 'Poppins';
		$h3Font = 'Poppins';
		$h4Font = 'Poppins';
		$h5Font = 'Poppins';
		$h6Font = 'Poppins';
		$menuFont = 'Roboto';

		$body_font  = json_decode( RDTheme::$options['typo_body'], true );
		$bodyFont = $body_font['font'];
		$bodyFontW = $body_font['regularweight'];
		$h1_font  = json_decode( RDTheme::$options['typo_h1'], true );
		$h1Font = $h1_font['font'];
		$h1FontW = $h1_font['regularweight'];
		$h2_font  = json_decode( RDTheme::$options['typo_h2'], true );
		$h2Font = $h2_font['font'];
		$h2FontW = $h2_font['regularweight'];
		$h3_font  = json_decode( RDTheme::$options['typo_h3'], true );
		$h3Font = $h3_font['font'];
		$h3FontW = $h3_font['regularweight'];
		$h4_font  = json_decode( RDTheme::$options['typo_h4'], true );
		$h4Font = $h4_font['font'];
		$h4FontW = $h4_font['regularweight'];
		$h5_font  = json_decode( RDTheme::$options['typo_h5'], true );
		$h5Font = $h5_font['font'];
		$h5FontW = $h5_font['regularweight'];
		$h6_font  = json_decode( RDTheme::$options['typo_h6'], true );
		$h6Font = $h6_font['font'];
		$h6FontW = $h6_font['regularweight'] .',400,500,600,700';
		$menu_font  = json_decode( RDTheme::$options['typo_menu'], true );
		$menuFont = $menu_font['font']; 
		$menuFontW = $menu_font['regularweight'] .',400,500,600,700';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'fmwave' ) ) {
			$font_families = array();
			if ( 'off' !== $bodyFont )
				$font_families[] = $bodyFont.':'.$bodyFW;
			if ( 'off' !== $h1Font )
				$font_families[] = $h1Font.':'.$h1FontW;
			if ( 'off' !== $h2Font )
				$font_families[] = $h2Font.':'.$h2FontW;
			if ( 'off' !== $h3Font )
				$font_families[] = $h3Font.':'.$h3FontW;
			if ( 'off' !== $h4Font )
				$font_families[] = $h4Font.':'.$h4FontW;
			if ( 'off' !== $h5Font )
				$font_families[] = $h5Font.':'.$h5FontW;
			if ( 'off' !== $h6Font )
				$font_families[] = $h6Font.':'.$h6FontW;
			//Menu font
			if ( 'off' !== $menuFont )
				$font_families[] = $menuFont.':'.$menuFontW;
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) )
			);
			$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
		}

		return esc_url_raw( $fonts_url );
	}

	public function default_fonts_url() {
		
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Oswald, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'fmwave' ) ) {
			$fonts[] = 'Roboto:400,500,600,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Montserrat, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'fmwave' ) ) {
			$fonts[] = 'Poppins:400,500,600,700';
		}


		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}


		return esc_url_raw( $fonts_url );
	}	


	public function register_scripts(){
		wp_deregister_style( 'font-awesome' );
		/* = CSS
		======================================================================*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       Helper::get_css( 'owl.carousel.min' ), array(), $this->version );
		wp_register_style( 'owl-theme-default',  Helper::get_css( 'owl.theme.default.min' ), array(), $this->version );
		
		// Bootstrap css
		wp_register_style( 'bootstrap',      Helper::get_css( 'bootstrap.min' ), array(), $this->version );
		// FontAwesome css
		wp_register_style( 'font-awesome',   Helper::get_css( 'all.min' ), array(), $this->version );
		// Slick css
		wp_register_style( 'slick',          Helper::get_css( 'slick' ), array(), $this->version );
		// Magnific			
		wp_register_style( 'magnific-popup', Helper::get_css( 'magnific-popup' ), array(), $this->version );
		// Animate css
		wp_register_style( 'animate',        Helper::get_css( 'animate.min' ), array(), $this->version );
		// Swiper css
		wp_register_style( 'swiper',         Helper::get_css( 'swiper.min' ), array(), $this->version );
		// Nivo Slider CSS
		wp_register_style( 'fmwave-nivo-slider',  Helper::get_css( 'nivo-slider' ), array(), $this->version );
		//flaticon
		wp_register_style( 'flaticon',  Helper::get_fonts_css( 'flaticon' ), array(), $this->version );
		// Main Theme Style
		wp_register_style( 'fmwave-style', Helper::get_css( 'style' ), array(), $this->version );
		// Rtl Style
		wp_register_style( 'fmwave-rtl-style', Helper::get_css( 'rtl' ), array(), $this->version );

		/* = JS 
		======================================================================*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      Helper::get_js( 'owl.carousel.min' ), array( 'jquery' ), $this->version, true );
		// Bootstrap	
		wp_register_script( 'popper',             Helper::get_js( 'popper.min' ), array( 'jquery' ), $this->version, true );
		// Bootstrap	
		wp_register_script( 'bootstrap',          Helper::get_js( 'bootstrap.min' ), array( 'jquery' ), $this->version, true );			
		// Counter Up
		wp_register_script( 'jquery-waypoints',   Helper::get_js( 'jquery.waypoints.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-counterup',   Helper::get_js( 'jquery.counterup.min' ), array( 'jquery' ), $this->version, true );
		// Custom Cursor
		wp_register_script( 'cursor',             Helper::get_js( 'cursor' ), array( 'jquery' ), $this->version, true );
		// Slick For Slider
		wp_register_script( 'slick',              Helper::get_js( 'slick.min' ), array( 'jquery' ), $this->version, true );
		// Sal For Animation
		wp_register_script( 'sal',              Helper::get_js( 'sal' ), array( 'jquery' ), $this->version, true );
		// Isotop For Filtering
		wp_register_script( 'isotope-pkgd',       Helper::get_js( 'isotope.pkgd.min' ), array( 'jquery', 'imagesloaded' ), $this->version, true );
		// Magnific Popup
		wp_register_script( 'jquery-magnific-popup', Helper::get_js( 'jquery.magnific-popup.min' ), array( 'jquery' ), $this->version, true );
		// Swiper For Slide
		wp_register_script( 'swiper', Helper::get_js( 'swiper.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'swiper-func', Helper::get_js( 'swiper-func' ), array( 'jquery' ), $this->version, true );
		// nivo slider JS
		wp_register_script( 'jquery-nivo-slider', Helper::get_js( 'jquery.nivo.slider' ), array( 'jquery' ), $this->version, true );
		// countdown Timer
		wp_register_script( 'jquery-countdown', Helper::get_js( 'jquery.countdown.min' ), array( 'jquery' ), $this->version, true );

		wp_register_script( 'jquery-navpoints',  Helper::get_js( 'jquery.navpoints' ), array( 'jquery' ), $this->version, true );
		// Main js
		wp_register_script( 'fmwave-main', Helper::get_js( 'main' ), array( 'jquery', 'jquery-waypoints' ), $this->version, true );
	}  
     
	public function enqueue_scripts() {	
		/*CSS*/
		if ( class_exists('Fmwave_Core') ){
			wp_enqueue_style( 'fmwave-gfonts', $this->fonts_url(), array(), $this->version );
		} else {
			wp_enqueue_style( 'fmwave-gfonts', $this->default_fonts_url(), array(), $this->version );
		}

		
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'slick' );
		wp_enqueue_style( 'magnific-popup' );
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'flaticon' );
		wp_enqueue_style( 'fmwave-style' );
		wp_enqueue_style(  'wp-mediaelement');
		$this->conditional_scripts(); // Conditional Scripts
		$this->dynamic_style(); // Dynamic style
		
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );

		/*JS*/
		wp_enqueue_script( 'popper' );
		wp_enqueue_script( 'bootstrap' );
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_script( 'jquery-waypoints' );
		wp_enqueue_script( 'jquery-counterup' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'jquery-magnific-popup' );
		wp_enqueue_script( 'cursor' );
		/*mediaElement*/
		wp_enqueue_script( 'wp-mediaelement' );
		// for nivo slider
		wp_enqueue_style(  'fmwave-nivo-slider' );
		wp_enqueue_script( 'jquery-nivo-slider' );
		wp_enqueue_script( 'sal' );
		wp_enqueue_script( 'jquery-navpoints' ); 

		wp_enqueue_script( 'fmwave-main' );		

		$this->localized_scripts(); // Localization
	
		$this->elementor_scripts();
	}

	public function elementor_scripts() {
		if ( !did_action( 'elementor/loaded' ) ) {
			return;
		}
		if ( Plugin::$instance->preview->is_preview_mode() ) {
			wp_enqueue_style( 'flaticon' );
			wp_enqueue_style(  'wp-mediaelement');
			wp_enqueue_script( 'jquery-countdown' );
			// ScrollMagic js
			wp_enqueue_script( 'ScrollMagic' );
			wp_enqueue_script( 'animation-gsap' );
			wp_enqueue_script( 'debug-addIndicators' );
			wp_enqueue_script( 'TweenMax' );
			wp_enqueue_script( 'ScrollMagic-function' );
			wp_enqueue_style( 'swiper' );
			wp_enqueue_script( 'swiper' );
			wp_enqueue_script( 'swiper-func' );
			wp_enqueue_style( 'flaticon' );
			/*mediaElement*/
			wp_enqueue_script( 'wp-mediaelement' );
			
			
		}
	}

	public function audio_view_count() {
		$post_id = isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '';
		$count = (int) get_post_meta( $post_id, 'post_view_count', true ); 
		if( !$count ) {
			update_post_meta( $post_id, 'post_view_count', 1 );
		} else {
			$count++;
		    update_post_meta( $post_id, 'post_view_count', $count );
		}

		$total_view = (int) get_post_meta( $post_id, 'post_view_count', true );

		wp_send_json_success($total_view);
	}

	private function conditional_scripts(){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if (is_rtl()) {
			wp_enqueue_style( 'fmwave-rtl-style' );
		}
	}
	
	public function admin_conditional_scripts(){

		wp_enqueue_style( 'flaticon' );
		wp_enqueue_style( 'font-awesome', Helper::get_css( 'all.min' ), array(), $this->version );
		wp_enqueue_style( 'fmwave-gfonts', $this->fonts_url(), array(), $this->version );
		wp_enqueue_script( 'jquery-ui-tabs' );		
		wp_enqueue_style( 'wp-color-picker' );	
	}

	private function localized_scripts(){
		// Localization
		$adminajax 	   = esc_url( admin_url('admin-ajax.php') );
		$localize_data = array(
			'ajaxurl'	  => $adminajax,
			'hasAdminBar' => is_admin_bar_showing() ? 1 : 0,
			'headerStyle' => RDTheme::$header_style,
			'day'	      => esc_html__('Day' , 'fmwave'),
			'hour'	      => esc_html__('Hour' , 'fmwave'),
			'minute'      => esc_html__('Minute' , 'fmwave'),
			'second'      => esc_html__('Second' , 'fmwave'),
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'fmwave-nonce' )
		);
		wp_localize_script( $this->fmwave . '-main', 'ThemeObj', $localize_data );

	}

	private function dynamic_style(){
		$dynamic_css  = $this->template_style();
		ob_start();
		Helper::requires( 'dynamic-style.php' );
		$dynamic_css .= ob_get_clean();
		$dynamic_css  = $this->minified_css( $dynamic_css );
		wp_register_style( $this->fmwave . '-dynamic', false );
		wp_enqueue_style( $this->fmwave . '-dynamic' );
		wp_add_inline_style( $this->fmwave . '-dynamic', $dynamic_css );
	}

	private function minified_css( $css ) {
		/* remove comments */
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		/* remove tabs, spaces, newlines, etc. */
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
		return $css;
	}

	private function template_style(){
		$style = '';
		if ( is_single() ) {
			if ( RDTheme::$bgtype === 'bgimg' ) {
				$opacity = RDTheme::$overlayopacity/100;
				$style .= '.single .inner-page-banner { background-image: url(' . RDTheme::$bgimg . ')}';
				$style .= '.single .inner-page-banner:after { background-color: ' . RDTheme::$bgimgoverlay . '}';
				$style .= '.single .inner-page-banner:after { opacity: ' . $opacity . '}';
			}
			else {
				$style .= '.single .inner-page-banner:after { background-color: ' . RDTheme::$bgcolor . '}';
			}
		} else {
			if ( RDTheme::$bgtype === 'bgimg' ) {
				$opacity = RDTheme::$overlayopacity/100;
				$style .= '.inner-page-banner { background-image: url(' . RDTheme::$bgimg . ')}';
				$style .= '.inner-page-banner:after { background-color: ' . RDTheme::$bgimgoverlay . '}';
				$style .= '.inner-page-banner:after { opacity: ' . $opacity . '}';
			}
			else {
				$style .= '.inner-page-banner:after { background-color: ' . RDTheme::$bgcolor . '}';
			}
		}
		
		if ( RDTheme::$padding_top == '0px') {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . ';}';
		}else {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-top:100px;}}
			@media all and (max-width: 991px) {.content-area {padding-top:100px;}}
			@media all and (max-width: 767px) {.content-area {padding-top:80px;}}';
		}

		if ( RDTheme::$padding_bottom == '0px') {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . ';}';
		}else {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-bottom:100px;}}
			@media all and (max-width: 991px) {.content-area {padding-bottom:100px;}}
			@media all and (max-width: 991px) {.content-area {padding-bottom:80px;}}';
		}

		if ( RDTheme::$inner_padding_top) {
			$style .= '.inner-page-banner {padding-top:'. RDTheme::$inner_padding_top . 'px;}';
		}
		if ( RDTheme::$inner_padding_bottom) {
			$style .= '.inner-page-banner {padding-bottom:'. RDTheme::$inner_padding_bottom . 'px;}';
		}
		if ( RDTheme::$options['pp_bgimg'] ) {
			$attch_url      = wp_get_attachment_image_src( RDTheme::$options['pp_bgimg'], 'full', true );
			$ppbgimg = $attch_url[0];
			$style .= '.pp-full-section { background-image: url(' . $ppbgimg . ')}';
		}
		if ( RDTheme::$options['ppf_bgcolor'] ) {
			$style .= '.protect-gallery .item-content { background-color: '. RDTheme::$options['ppf_bgcolor'] .')}';
		}
		if ( RDTheme::$options['offcanvas_menu_bgimg'] ) { 
			$offmenu_img_url      = wp_get_attachment_image_src( RDTheme::$options['offcanvas_menu_bgimg'], 'full', true );
			$offmenu_bg_img = $offmenu_img_url[0];
			$offcanvas_bg = RDTheme::$options['offcanvas_bgimg_opacity']/100;
			$style .= '.offcanvas-menu-wrap { background-image: url(' . $offmenu_bg_img . ')}';
			$style .= '.offcanvas-menu-wrap .offcanvas-content:before { background-color: ' . RDTheme::$options['offcanvas_bgimg_overlay'] . '}';
			$style .= '.offcanvas-menu-wrap .offcanvas-content:before { opacity: ' . $offcanvas_bg . '}';
		}
		if ( RDTheme::$options['custom_cursor_color'] ) {
			$style .= '.custom-cursor .circle-cursor--outer { border-color: ' . RDTheme::$options['custom_cursor_color'] . '}';
			$style .= '.custom-cursor .circle-cursor--inner { background-color: ' . RDTheme::$options['custom_cursor_color'] . '}';
		}

		//@dev - footer background
		/*if ( !empty((int) RDTheme::$options['footer_background'] )) {
			$style .= '.footer-wrap { background-image:url(' . Helper::rt_get_img_url_by_id( (int) RDTheme::$options['footer_background'] ) . ');}';
		} else {
			$style .= '.footer-wrap { background-image:url(' . Helper::get_img( 'footer-banner.jpg' ) . ');}';
		}*/
		
		return $style;
	}	
	
}
new Scripts;