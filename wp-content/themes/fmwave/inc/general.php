<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

class General_Setup {

	public function __construct() {
		add_action( 'after_setup_theme',                       array( $this, 'theme_setup' ) );	
		add_action( 'widgets_init',                            array( $this, 'register_sidebars' ), 0 );		
		add_filter( 'body_class',                              array( $this, 'body_classes' ) );
		add_filter( 'post_class',                              array( $this, 'post_classes' ) );
		add_action( 'wp_head',                                 array( $this, 'noscript_hide_preloader' ), 1 );
		add_action( 'wp_footer',                               array( $this, 'scroll_to_top_html' ), 1 );
		add_filter( 'get_search_form',                         array( $this, 'search_form' ) );
		add_filter( 'comment_form_fields',                     array( $this, 'move_textarea_to_bottom' ) );
		add_filter( 'excerpt_more',                            array( $this, 'excerpt_more' ) );		
		add_filter( 'elementor/widgets/wordpress/widget_args', array( $this, 'elementor_widget_args' ) );
		add_action( 'pre_get_posts',                           array( $this, 'wp_team_query' ), 999 );
		add_action( 'pre_get_posts',                           array( $this, 'wp_projects_query' ), 999 );
		add_action( 'pre_get_posts',                           array( $this, 'wp_services_query' ), 999 );
		add_action( 'wp_head',                                 array( $this, 'fmwave_pingback_header' ), 996 );
		add_action( 'site_prealoader',                         array( $this, 'preloader_svg_thumb' ) );
		add_filter( 'wp_kses_allowed_html',                    array( $this, 'fmwave_kses_allowed_html' ), 10, 2 );
		add_action( 'template_redirect',                       array( $this, 'w3c_validator' ) );
		
		add_action( 'show_user_profile', array( $this, 'fmwave_user_social_profile_fields' ));
		add_action( 'edit_user_profile', array( $this, 'fmwave_user_social_profile_fields' ));
		add_action( 'personal_options_update', array( $this, 'fmwave_extra_profile_fields' ));
		add_action( 'edit_user_profile_update', array( $this, 'fmwave_extra_profile_fields' ));
	}


	/**
	* Add a pingback url auto-discovery header for single posts, pages, or attachments.
	*/
	public function fmwave_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	public function wp_team_query( $query ) {		
		if ( ! is_admin() ) {
			if ( is_post_type_archive( "fmwave_team" ) || is_tax( "fmwave_team_category" ) ) {
			 $query->set( 'posts_per_page', RDTheme::$options['team_archive_number']);
			}
		}
	}

	public function wp_projects_query( $query ) {	
		if ( ! is_admin() ) {	
			if ( is_post_type_archive( "fmwave_projects" ) || is_tax( "fmwave_projects_category" ) ) {
			 $query->set( 'posts_per_page', RDTheme::$options['projects_archive_number']);
			}
		}
	}

	public function wp_services_query( $query ) {	
		if ( ! is_admin() ) {	
			if ( is_post_type_archive( "fmwave_services" ) || is_tax( "fmwave_services_category" ) ) {
			 $query->set( 'posts_per_page', RDTheme::$options['services_archive_number']);
			}
		}
	}

	public function theme_setup() {
		$fmwave = FMWAVE_THEME_PREFIX;		

		// Theme supports
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support( 'widgets-block-editor' );
		add_theme_support( 'wp-block' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_editor_style();
		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', 'fmwave' ),
				'slug'  => 'fmwave-primary',
				'color' => '#ec1c24',
			),
			array(
				'name'  => esc_html__('Secondary', 'fmwave' ),
				'slug'  => 'fmwave-secondary',
				'color' => '#bd2127',
			),
			array(
				'name'  => esc_html__('Light', 'fmwave' ),
				'slug'  => 'fmwave-light',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__('Black', 'fmwave' ),
				'slug'  => 'fmwave-black',
				'color'  => '#000000',
			),
			array(
				'name'  => esc_html__('Dark', 'fmwave' ),
				'slug'  => 'fmwave-dark',
				'color'  => '#c0c0c0',
			),
			
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__('Small', 'fmwave' ),
				'size'  => 12,
				'slug'  => 'small'
			),
			array(
				'name'  => esc_html__('Normal', 'fmwave' ),
				'size'  => 16,
				'slug'  => 'normal'
			),
			array(
				'name'  => esc_html__('Large', 'fmwave' ),
				'size'  => 36,
				'slug'  => 'large'
			),
			array(
				'name'  => esc_html__('Huge', 'fmwave' ),
				'size'  => 60,
				'slug'  => 'huge'
			)
		) );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles');		

		/*@dev*/
		add_image_size("fmwave-team-1", 350, 385, true);  // team addon 1 & 3 & Track 1
		add_image_size("fmwave-blog-single", 770, 460, true);  // blog-single , Video addon 1,
		add_image_size("fmwave-event-grid", 520, 520, true);  // event-grid
		// team
		add_image_size("fmwave-team-2", 270, 205, true);  // team addon 2 & team archive
		// show schedule
		add_image_size("fmwave-show-isotope", 690, 530, true);  // show , video Addon 2, Blog Addon 1
		add_image_size("fmwave-v3-b", 570, 449, true);  // video Addon 3( Big image ), Podcast Archive,
		add_image_size("fmwave-v3-s", 300, 232, true);  // video Addon 3( small image ),
		add_image_size("fmwave-v4-b", 1480, 700, true);  // video Addon 4( Big image ),
		add_image_size("fmwave-v4-s", 313, 200, true);  // video Addon 4( small image ),
		add_image_size("fmwave-upcoming-show", 290, 252, true);  // show

		
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'fmwave' ),
			'footer' => esc_html__( 'Footer', 'fmwave' ),
			'topmenu' => esc_html__( 'Top Menu', 'fmwave' ),
			'offcanvas' => esc_html__( 'Offcanvas Menu', 'fmwave' ),
		) );

		// Custom Logo
		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 245,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('bao_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}

	public function register_sidebars() {

		$footer_widget_titles = array(
			'1' => esc_html__('Footer 1 1', 'fmwave'),
			'2' => esc_html__('Footer 1 2', 'fmwave'),
			'3' => esc_html__('Footer 1 3', 'fmwave'),
			'4' => esc_html__('Footer 1 4', 'fmwave'),
			'6' => esc_html__('Footer 1 6', 'fmwave'),
		);
		
		$footer_widget_titles4 = array(
			'1' => esc_html__('Footer 4 1', 'fmwave'),
			'2' => esc_html__('Footer 4 2', 'fmwave'),
			'3' => esc_html__('Footer 4 3', 'fmwave'),
			'4' => esc_html__('Footer 4 4', 'fmwave'),
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'fmwave' ),
			'id'            => 'sidebar',
			'description'   => esc_html__('Sidebar widgets area', 'fmwave'),
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		for ($i = 1; $i <= RDTheme::$options['footer_column']; $i++) {
			if (isset($footer_widget_titles[$i])) {
				register_sidebar(array(
					'name' => $footer_widget_titles[$i],
					'id' => 'footer-' . $i,
					'before_widget' => '<div id="%1$s" class="widgets footer-box-layout1 %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="footer-title"><h3 class="widget-title ">',
					'after_title' => '</h3></div>',
				));
			}
		}
		/*footer 4*/
		for ($i = 1; $i <= RDTheme::$options['footer_column']; $i++) {
			if (isset($footer_widget_titles4[$i])) {
				register_sidebar(array(
					'name' => $footer_widget_titles4[$i],
					'id' => 'footer-4-' . $i,
					'before_widget' => '<div id="%1$s" class="widgets footer-box-layout1 %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="footer-title"><h3 class="widget-title ">',
					'after_title' => '</h3></div>',
				));
			}
		}
		register_sidebar( array(
			'name'          => esc_html__( 'Subscribe Widget', 'fmwave' ),
			'id'            => 'footer-subscribe',
			'description'   => esc_html__('Footer Four Subscribe area', 'fmwave'),
			'before_widget' => '<div id="%1$s" class="widgets %2$s footer-box-layout1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="subscribe-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Two Menu', 'fmwave' ),
			'id'            => 'footer-two',
			'description'   => esc_html__('Footer Two widgets area', 'fmwave'),
			'before_widget' => '<div id="%1$s" class="widgets %2$s footer-box-layout1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		) );
		
	}

	public function body_classes( $classes ) {
		$classes[] = 'no-lightbox loaded';
		if ( RDTheme::$options['sticky_header'] == 1 ) {	
			$classes[] = 'sticky-header';
		}
		
		$classes[] = 'has-offcanvas';
		if ( RDTheme::$has_cursor === 1 ){	
			$classes[] = 'custom-cursor';
		} elseif ( RDTheme::$has_cursor === "on" ){
			$classes[] = 'custom-cursor';
		} else {
			$classes[] = 'no-custom-cursor';
		}

		if( is_home() || is_page() || is_archive() || is_search() || is_404() ) {
			if (RDTheme::$options['page_banner'] != 1 ) {	
				$classes[] = 'page-banner-disable';
			}
		}
		if (is_single()) {
			if (RDTheme::$options['single_post_banner'] != 1 ) {	
				$classes[] = 'single-page-banner-disable';
			}
		}

		$classes[] = 'header-style-'. RDTheme::$header_style;
		
        // Sidebar
		$classes[] = ( RDTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

		return $classes;
	}


	public function post_classes( $classes ) {
		$post_thumb = '';
		if ( has_post_thumbnail() ){
		    $classes[] = 'have-post-thumb';
		}
		return $classes;
	}

	public function noscript_hide_preloader(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}

	public function scroll_to_top_html(){
		// Back-to-top link
		if ( RDTheme::$has_scrolltop == '1' || RDTheme::$has_scrolltop != "off" ){
		echo '<a href="#wrapper" data-type="section-switch" class="scrollup back-top">
			<i class="fas fa-angle-double-up"></i>
		</a>';
		}
	}

	public function search_form()
	{
		$output = '
		<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
		<div class="widget widget-search-box">
			<div class="input-group stylish-input-group">			   
			    	<input type="text" class="search-query form-control" placeholder="' . esc_attr__('Search Keywords ...', 'fmwave') . '" value="' . get_search_query() . '" name="s" />
			    <span class="input-group-addon">
			        <button class="btn" type="submit">
			            <span class="fas fa-search" aria-hidden="true"></span>
			        </button>
			    </span>
			</div>
		</div>
		</form>
		';
		return $output;
	}

	public function move_textarea_to_bottom( $fields ) {
		$temp = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $temp;
		return $fields;
	}

	public function excerpt_more() {
		return esc_html__( '...', 'fmwave' ) ;
	}
	
	public function elementor_widget_args( $args ) {
		$args['before_widget'] = '<div class="widget single-sidebar padding-bottom1">';
		$args['after_widget']  = '</div>';
		$args['before_title']  = '<h3>';
		$args['after_title']   = '</h3>';
		return $args;
	}

	function cc_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	public function preloader_svg_thumb() {
        echo '<div id="preloader"><object id="my-svg" type="image/svg+xml" data="' . helper::get_img( 'my.svg' ) . '"></object></div>';
	}

	public function fmwave_kses_allowed_html($tags, $context) {
		switch($context) {
			case 'social':
			$tags = array(
				'a' => array('href' => array()),
				'b' => array()
			);
			return $tags;
			case 'allow_link':
			$tags = array(
				'a' => array(
					'class' => array(),
					'href'  => array(),
					'rel'   => array(),
					'title' => array(),
					'target' => array(),
				),
				'b' => array()
			);
			return $tags;
			case 'iframe':
			$tags = array(
				'iframe' => array(
					'class' => array(),
					'width'  => array(),
					'height'   => array(),
					'scrolling' => array(),
					'frameborder' => array(),
					'allow' => array(),
					'src' => array(),
					'style' => array(),
					'allowfullscreen' => array(),
					'aria-hidden' => array(),
					'tabindex' => array(),
				),
				'div' => array(
					'class' => array(),
					'style' => array(),
				),
			);
			return $tags;
			case 'alltext_allow':
			$tags = array(
				'a' => array(
					'class' => array(),
					'href'  => array(),
					'rel'   => array(),
					'title' => array(),
					'target' => array(),
				),
				'abbr' => array(
					'title' => array(),
				),
				'b' => array(),
				'br' => array(),
				'blockquote' => array(
					'cite'  => array(),
				),
				'cite' => array(
					'title' => array(),
				),
				'code' => array(),
				'del' => array(
					'datetime' => array(),
					'title' => array(),
				),
				'dd' => array(),
				'div' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
					'id' => array(),
				),
				'dl' => array(),
				'dt' => array(),
				'em' => array(),
				'h1' => array(),
				'h2' => array(),
				'h3' => array(),
				'h4' => array(),
				'h5' => array(),
				'h6' => array(),
				'i' => array(),
				'img' => array(
					'alt'    => array(),
					'class'  => array(),
					'height' => array(),
					'src'    => array(),
					'srcset' => array(),
					'width'  => array(),
				),
				'li' => array(
					'class' => array(),
				),
				'ol' => array(
					'class' => array(),
				),
				'p' => array(
					'class' => array(),
				),
				'q' => array(
					'cite' => array(),
					'title' => array(),
				),
				'span' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
				),
				'strike' => array(),
				'strong' => array(),
				'ul' => array(
					'class' => array(),
				),
			);
			return $tags;
			default:
			return $tags;
		}
	}

	public function w3c_validator() {
		/*-----------------------------------------------------*/
		/*  W3C validator passing code
		/*-----------------------------------------------------*/
	    ob_start( function( $buffer ){
	        $buffer = str_replace( array( '<script type="text/javascript">', "<script type='text/javascript'>" ), '<script>', $buffer );
	        return $buffer;
	    });
	    ob_start( function( $buffer2 ){
	        $buffer2 = str_replace( array( "<script type='text/javascript' src" ), '<script src', $buffer2 );
	        return $buffer2;
	    });
	    ob_start( function( $buffer3 ){
	        $buffer3 = str_replace( array( 'type="text/css"', "type='text/css'", 'type="text/css"', ), '', $buffer3 );
	        return $buffer3;
	    });
	    ob_start( function( $buffer4 ){
	        $buffer4 = str_replace( array( '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"', ), '<iframe', $buffer4 );
	        return $buffer4;
	    });
		ob_start( function( $buffer5 ){
	        $buffer5 = str_replace( array( 'aria-required="true"', ), '', $buffer5 );
	        return $buffer5;
	    });
	}
	
	/*social link to author profile page*/

	function fmwave_user_social_profile_fields( $user ) { ?>

		<h3><?php esc_html_e( 'User Designation' , 'fmwave' ); ?></h3>

		<table class="form-table">
			<tr>
				<th><label for="fmwave_author_designation"><?php esc_html_e( 'Author Designation' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="fmwave_author_designation" id="fmwave_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'fmwave' ); ?></span></td>
			</tr>
		</table>
		
		<h3><?php esc_html_e( 'Social profile information' , 'fmwave' ); ?></h3>

		<table class="form-table">
			<tr>
				<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'fmwave' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'fmwave' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'fmwave' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="gplus"><?php esc_html_e( 'Google+' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_gplus', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your google+ Profile' , 'fmwave' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'fmwave' ); ?></label></th>
				<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'fmwave_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'fmwave' ); ?></span></td>
			</tr>
		</table>
	<?php }


	function fmwave_extra_profile_fields( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_user_meta( $user_id, 'fmwave_facebook', $_POST['facebook'] );
		update_user_meta( $user_id, 'fmwave_twitter', $_POST['twitter'] );
		update_user_meta( $user_id, 'fmwave_linkedin', $_POST['linkedin'] );
		update_user_meta( $user_id, 'fmwave_gplus', $_POST['gplus'] );
		update_user_meta( $user_id, 'fmwave_pinterest', $_POST['pinterest'] );
		update_user_meta( $user_id, 'fmwave_author_designation', $_POST['fmwave_author_designation'] );
	}
}
new General_Setup;