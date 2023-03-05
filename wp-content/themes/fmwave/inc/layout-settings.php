<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
class Layouts {
	public $fmwave = FMWAVE_THEME_PREFIX;
	public $cpt    = FMWAVE_THEME_CPT_PREFIX;

	public function __construct() {
		add_action( 'template_redirect', array( $this, 'layout_settings' ) );
	}
	public function layout_settings() {
		// Single Pages
		if( is_single() || is_page() ) {
			$post_type = get_post_type();
			$post_id   = get_the_ID();
			switch( $post_type ) {
				case 'page':
				$fmwave = 'page';
				break;
				case 'post':
				$fmwave = 'single_post';
				break;
				default:
				$fmwave = 'single_post';
				break;
			}

			$layout         	  = get_post_meta( $post_id, "{$this->cpt}_layout", true );
			$header_style   	  = get_post_meta( $post_id, "{$this->cpt}_header", true );
			$footer_style   	  = get_post_meta( $post_id, "{$this->cpt}_footer", true );
			$has_banner     	  = get_post_meta( $post_id, "{$this->cpt}_banner", true );
			$has_breadcrumb 	  = get_post_meta( $post_id, "{$this->cpt}_breadcrumb", true );
			$bgtype         	  = get_post_meta( $post_id, "{$this->cpt}_banner_bg_type", true );
			$bgcolor        	  = get_post_meta( $post_id, "{$this->cpt}_banner_bgcolor", true );
			$bgimg          	  = get_post_meta( $post_id, "{$this->cpt}_banner_bgimg", true );			
			$bgimgoverlay   	  = get_post_meta( $post_id, "{$this->cpt}_banner_bgimage_overlay", true );	
			$overlayopacity 	  = get_post_meta( $post_id, "{$this->cpt}_overlay_opacity", true );
			$inner_padding_top    = get_post_meta( $post_id, "{$this->cpt}_inner_padding_top", true );	
			$inner_padding_bottom = get_post_meta( $post_id, "{$this->cpt}_inner_padding_bottom", true );


			$footer_top_area    = get_post_meta( $post_id, "{$this->cpt}_footer_top_area", true );

			$padding_top    = get_post_meta( $post_id, "{$this->cpt}_top_padding", true );
			$padding_bottom = get_post_meta( $post_id, "{$this->cpt}_bottom_padding", true );



			$padding_top         = ( empty( $padding_top ) || $padding_top == 'default' ) ? RDTheme::$options[$fmwave . '_padding_top'] : $padding_top;
			RDTheme::$padding_top 		=  $padding_top;
			$padding_bottom          	= ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? RDTheme::$options[$fmwave . '_padding_bottom'] : $padding_bottom;
			RDTheme::$padding_bottom 	=  $padding_bottom;



			RDTheme::$layout = ( empty( $layout ) || $layout == 'default' ) ? RDTheme::$options[$fmwave . '_layout'] : $layout;

			RDTheme::$header_style = ( empty( $header_style ) || $header_style == 'default' ) ? RDTheme::$options['header_style'] : $header_style;

			RDTheme::$footer_style = ( empty( $footer_style ) || $footer_style == 'default' ) ? RDTheme::$options['footer_style'] : $footer_style;

			RDTheme::$has_banner = ( empty( $has_banner ) || $has_banner == 'default' ) ? RDTheme::$options[$fmwave . '_banner'] : $has_banner;

			RDTheme::$has_footer_top_area = ( empty( $footer_top_area ) || $footer_top_area == 'default' ) ? RDTheme::$options['footer_top_area'] : $footer_top_area;

			RDTheme::$has_breadcrumb = ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? RDTheme::$options[$fmwave . '_breadcrumb'] : $has_breadcrumb;

			RDTheme::$bgtype = ( empty( $bgtype ) || $bgtype == 'default' ) ? RDTheme::$options[$fmwave . '_banner_bg_type'] : $bgtype;

			RDTheme::$bgcolor = empty( $bgcolor ) ? RDTheme::$options[$fmwave . '_banner_bgcolor'] : $bgcolor;

			RDTheme::$inner_padding_top = empty( $inner_padding_top ) ? RDTheme::$options[$fmwave . '_inner_padding_top'] : $inner_padding_top;

			RDTheme::$inner_padding_bottom = empty( $inner_padding_bottom ) ? RDTheme::$options[$fmwave . '_inner_padding_bottom'] : $inner_padding_bottom;

			if (is_singular( 'fmwave_gallery' )) { 
				$attch_url      = wp_get_attachment_image_src( RDTheme::$options['single_gallery_banner_bgimg'], 'full', true );
				RDTheme::$bgimg = $attch_url[0];
			} elseif( !empty( $bgimg ) ) {
				$attch_url      = wp_get_attachment_image_src( $bgimg, 'full', true );
				RDTheme::$bgimg = $attch_url[0];
			}
			elseif( !empty( RDTheme::$options[$fmwave . '_banner_bgimg']) ) {
				$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$fmwave . '_banner_bgimg'], 'full', true );
				RDTheme::$bgimg = $attch_url[0];
			}
			else {
				RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
			}
			if ( !is_active_sidebar( 'sidebar' ) ){
				RDTheme::$layout = 'full-width';
			}

			RDTheme::$bgimgoverlay = empty( $bgimgoverlay ) ? RDTheme::$options[$fmwave . '_banner_bgimage_overlay'] : $bgimgoverlay;
			RDTheme::$overlayopacity = empty( $overlayopacity ) ? RDTheme::$options[$fmwave . '_overlay_opacity'] : $overlayopacity;

		}

		// Blog and Archive
		elseif( is_home() || is_archive() || is_search() || is_404() ) {

			$fmwave = 'page';
			
			RDTheme::$layout               = RDTheme::$options[$fmwave . '_layout'];	
			RDTheme::$header_style         = RDTheme::$options['header_style'];
			RDTheme::$footer_style         = RDTheme::$options['footer_style'];
			RDTheme::$has_banner           = RDTheme::$options[$fmwave . '_banner'];
			RDTheme::$has_breadcrumb       = RDTheme::$options[$fmwave . '_breadcrumb'];
			RDTheme::$bgtype               = RDTheme::$options[$fmwave . '_banner_bg_type'];
			RDTheme::$bgcolor              = RDTheme::$options[$fmwave . '_banner_bgcolor'];
			RDTheme::$bgimgoverlay         = RDTheme::$options[$fmwave . '_banner_bgimage_overlay'];
			RDTheme::$overlayopacity       = RDTheme::$options[$fmwave . '_overlay_opacity'];
			RDTheme::$inner_padding_top    = RDTheme::$options[$fmwave . '_inner_padding_top'];
			RDTheme::$inner_padding_bottom = RDTheme::$options[$fmwave . '_inner_padding_bottom'];
			RDTheme::$padding_top    	   = RDTheme::$options[$fmwave . '_padding_top'];
			RDTheme::$padding_bottom       = RDTheme::$options[$fmwave . '_padding_bottom'];
			RDTheme::$has_footer_top_area  = RDTheme::$options['footer_top_area'];

			if (is_singular( 'fmwave_gallery' )) { 
				$attch_url      = wp_get_attachment_image_src( RDTheme::$options['single_gallery_banner_bgimg'], 'full', true );
				RDTheme::$bgimg = $attch_url[0];
			} elseif( !empty( RDTheme::$options[$fmwave . '_banner_bgimg']) ) {
				$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$fmwave . '_banner_bgimg'], 'full', true );
				RDTheme::$bgimg = $attch_url[0];
			} else {
				RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
			}
			if ( !is_active_sidebar( 'sidebar' ) ){
				RDTheme::$layout = 'full-width';
			}
		}

		if (is_singular( 'fmwave_gallery' )) { 
			RDTheme::$has_banner = RDTheme::$options['single_gallery_banner'];
			RDTheme::$bgtype = RDTheme::$options['single_gallery_banner_bg_type'];
			RDTheme::$bgcolor = RDTheme::$options['single_gallery_banner_bgcolor'];
			RDTheme::$bgimgoverlay = RDTheme::$options['sg_banner_bgimage_overlay'];
			RDTheme::$overlayopacity = RDTheme::$options['sg_overlay_opacity'];
			RDTheme::$inner_padding_top = RDTheme::$options['sg_inner_padding_top'];
			RDTheme::$inner_padding_bottom = RDTheme::$options['sg_inner_padding_bottom'];
			RDTheme::$has_breadcrumb = RDTheme::$options['sg_breadcrumb'];
		} else {
			RDTheme::$has_banner = RDTheme::$has_banner;
			RDTheme::$bgtype = RDTheme::$bgtype;
			RDTheme::$bgcolor = RDTheme::$bgcolor;
			RDTheme::$bgimgoverlay = RDTheme::$bgimgoverlay;
			RDTheme::$overlayopacity = RDTheme::$overlayopacity;
			RDTheme::$inner_padding_top = RDTheme::$inner_padding_top;
			RDTheme::$inner_padding_bottom = RDTheme::$inner_padding_bottom;
			RDTheme::$has_breadcrumb = RDTheme::$has_breadcrumb;
		}

		// Cursor + ScrollUp Settings
		if( is_single() || is_page() ) {
			$has_cursor = get_post_meta( get_the_ID(), "fmwave_cursor", true );
			$has_scrolltop = get_post_meta( get_the_ID(), "fmwave_scrolltop", true );
			RDTheme::$has_cursor = ( empty( $has_cursor ) || $has_cursor == 'default' ) ? RDTheme::$options['page_cursor'] : $has_cursor;
			RDTheme::$has_scrolltop = ( empty( $has_scrolltop ) || $has_scrolltop == 'default' ) ? RDTheme::$options['page_scrolltop'] : $has_scrolltop;
		}
		elseif( is_home() || is_archive() || is_search() || is_404() ) {
			RDTheme::$has_cursor = RDTheme::$options['page_cursor'];
			RDTheme::$has_scrolltop = RDTheme::$options['page_scrolltop'];
		}

	}
}
new Layouts;
