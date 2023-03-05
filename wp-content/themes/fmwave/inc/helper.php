<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;

use \WP_Query;
use radiustheme\fmwave\IconTrait;
use radiustheme\fmwave\CustomQueryTrait;
use radiustheme\fmwave\ResourceLoadTrait;
use radiustheme\fmwave\DataTrait;
use radiustheme\fmwave\LayoutTrait;


class Helper {
  	use IconTrait;   
  	use CustomQueryTrait;   
  	use ResourceLoadTrait;    
  	use DataTrait;   
  	use LayoutTrait;   
	   
	public static function rt_the_logo_light() {
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$customizer_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$logo_light = $customizer_logo[0];
		} else { 
			$logo_light = wp_get_attachment_image_url( RDTheme::$options['logo'], 'full');
		}
		return $logo_light;
	}
	public static function rt_the_logo_dark() {
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$customizer_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$logo_dark = $customizer_logo[0];
		} else { 
			$logo_dark = wp_get_attachment_image_url( RDTheme::$options['logo_dark'], 'full');
		}
		return $logo_dark;
	}

	public static function fmwave_excerpt( $limit ) {
	    $excerpt = explode(' ', get_the_excerpt(), $limit);
	    if (count($excerpt)>=$limit) {
	        array_pop($excerpt);
	        $excerpt = implode(" ",$excerpt).'';
	    } else {
	        $excerpt = implode(" ",$excerpt);
	    }
	    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	    return $excerpt;
	}

	public static function fmwave_get_attachment_alt( $attachment_ID ) {
		// Get ALT
		$thumb_alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );
		
		// No ALT supplied get attachment info
		if ( empty( $thumb_alt ) )
			$attachment = get_post( $attachment_ID );
		
		// Use caption if no ALT supplied
		if ( empty( $thumb_alt ) )
			$thumb_alt = $attachment->post_excerpt;
		
		// Use title if no caption supplied either
		if ( empty( $thumb_alt ) )
			$thumb_alt = $attachment->post_title;

		// Return ALT
		return esc_attr( trim( strip_tags( $thumb_alt ) ) );

	}

	public static function generate_elementor_anchor($anchor, $anchor_text="Read More", $classes='') {
	    if ( ! empty( $anchor['url'] ) ) {
			$class_attribute = '';
			if ( $classes ) {
				$class_attribute = "class='{$classes}'";
			}

			$target_attribute = "";
			if ( $anchor['is_external'] ) {
				$target_attribute = 'target="_blank"';
			}

			$rel_attribute = "";
			if ( $anchor['nofollow'] ) {
				$rel_attribute = 'rel="nofollow"';
			}
			$anchor_url = $anchor['url'];
			$href_attributes = "href='{$anchor_url}'";

			$all_attributes = "$class_attribute $target_attribute $rel_attribute $href_attributes";

			$a   = sprintf( '<%1$s %2$s>%3$s</%1$s>', 'a', $all_attributes, $anchor_text );

			return $a;
	   	};
	    return null;
	}

	public static function rt_get_img_url_by_id( $img_id ) {
		$rt_image_url = wp_get_attachment_image_url( $img_id, 'full');
		return $rt_image_url;
	}

	public static function custom_sidebar_fields() {
		$fmwave = FMWAVE_THEME_PREFIX_VAR;
		$sidebar_fields = array();

		$sidebar_fields['sidebar'] = esc_html__( 'Sidebar', 'fmwave' );

		$sidebars = get_option( "{$fmwave}_custom_sidebars", array() );
		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_fields[$sidebar['id']] = $sidebar['name'];
			}
		}

		return $sidebar_fields;
	}
	
	public static function is_active_rt_wc() {
		if( class_exists('WooCommerce') ) {
			if( is_shop() || is_product() ) {
				return true;
			}
		}
		return false;
	}

	public static function fmwave_get_primary_category() {
		if( get_post_type() != 'post' ) {
			return;
		}
		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}

	public static function fmwave_category_prepare() {	?>
		<?php if ( self::fmwave_get_primary_category()  ): ?>
			<a class="item-tag" href="<?php echo get_category_link( self::fmwave_get_primary_category()[0]->term_id ); ?>">
				<?php echo esc_html( self::fmwave_get_primary_category()[0]->name ); ?>
			</a>
		<?php endif ?>
		<?php
	}

	public static function filter_content( $content ){
		// wp filters
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );

		// remove shortcodes
		$pattern= '/\[(.+?)\]/';
		$content = preg_replace( $pattern,'',$content );

		// remove tags
		$content = strip_tags( $content );

		return $content;
	}

	public static function get_current_post_content( $post = false ) {
		if ( !$post ) {
			$post = get_post();				
		}
		$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
		$content = self::filter_content( $content );
		return $content;
	}

	public static function pagination( $max_num_pages = false ) {
		global $wp_query;
		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		include FMWAVE_THEME_VIEW_DIR . 'pagination.php';
	}

	public static function comments_callback( $comment, $args, $depth ){
		include FMWAVE_THEME_VIEW_DIR . 'comments-callback.php';
	}

	public static function nav_menu_args(){
		$fmwave_pagemenu = false;

		if ( ( is_single() || is_page() ) ) {

			$layout_settings2 = get_post_meta( get_the_id(), 'rtcpt_page_menu', true );

			if ( !empty( $layout_settings2 ) ) {
				$fmwave_menuid = $layout_settings2;
			} else {
				$fmwave_menuid = '';
			}

			if ( !empty( $fmwave_menuid ) && $fmwave_menuid != 'default' ) {
				$fmwave_pagemenu = $fmwave_menuid;
			}
		}

		if ( $fmwave_pagemenu ) {
			$nav_menu_args = array( 'menu' => $fmwave_pagemenu,'container' => 'ul' );
		}
		else {
			$nav_menu_args = array( 'theme_location' => 'primary','container' => 'ul' );
		}
		return $nav_menu_args;
	}

	public static function offcanvas_menu_args(){			
		$nav_menu_args = array(     
	        'theme_location'  => 'offcanvas',
	        'container'       => 'ul',
	        'menu_class'      => 'offcanvas-menu',
	    );	
		return $nav_menu_args;
	}

	public static function footer_menu_args(){		
		$nav_menu_args = array(     
	        'menu_class'     => 'footer-menu',       
	        'theme_location' => 'footer',
	    );	
		return $nav_menu_args;
	}
	
	public static function top_menu_args(){		
		$nav_menu_args = array(     
	        'menu_class'     => 'top-menu',       
	        'theme_location' => 'topmenu',
	    );	
		return $nav_menu_args;
	}

	public static function sidebar_menu_args(){			
		$nav_menu_args = array(     
	        'theme_location'  => 'primary',
	        'container'       => 'ul',
	        'menu_class'      => 'menu-list',
	    );	
		return $nav_menu_args;
	}

	public static function requires( $filename, $dir = false ){
		if ( $dir) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;
			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		}
		else {
			$child_file = get_stylesheet_directory() . '/inc/' . $filename;
			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = FMWAVE_THEME_INC_DIR . $filename;
			}
		}

		require_once $file;
	}


	//@dev team list
	public static function get_team(){
		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'title',
			'order'            => 'ASC',
			'post_type'        => 'rtcpt_team',
		);
		$posts = get_posts( $args );
		$team[0] = esc_html__( 'Select a Team Member', 'fmwave' );
		foreach ( $posts as $post ) {
			$team[$post->ID] = $post->post_title;
		}
		return $team;
	}

	//get today
	public static function get_today() {
		$today = '';
		switch ( current_time("l") ) {
			case 'Monday':
				$today = 'mon';
				break;

			case 'Tuesday':
				$today = 'tue';
				break;

			case 'Wednesday':
				$today = 'wed';
				break;

			case 'Thursday':
				$today = 'thu';
				break;

			case 'Friday':
				$today = 'fri';
				break;

			case 'Saturday':
				$today = 'sat';
				break;

			case 'Sunday':
				$today = 'sun';
				break;  
		} 

		return $today;
	}

	public static function get_day_id( $day_name ) {
		$day_id = '';
		switch ( $day_name ) {
			case 'mon':
				$day_id = 3;
				break;

			case 'tue':
				$day_id = 4;
				break;

			case 'wed':
				$day_id = 5;
				break;

			case 'thu':
				$day_id = 6;
				break;

			case 'fri':
				$day_id = 7;
				break;

			case 'sat':
				$day_id = 1;
				break;

			case 'sun':
				$day_id = 2;
				break;  
		} 

		return $day_id;
	}

	public static function check_in_range($start_date, $end_date, $date_from_user) {
	  // Convert to timestamp
	  $start = strtotime($start_date);
	  $end = strtotime($end_date);
	  $check = strtotime($date_from_user);

	  // Check that user date is between start & end
	  return (($start <= $check ) && ($check <= $end));
	}

	public static function array_sort($array, $on, $order = 'ASC') {
	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case 'ASC':
	                asort($sortable_array);
	                break;
	            case 'DESC':
	                arsort($sortable_array);
	                break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}
		
}