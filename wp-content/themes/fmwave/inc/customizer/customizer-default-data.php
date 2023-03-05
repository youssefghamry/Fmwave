<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'primary_color'      => '',
            'logo'               => '',
            'logo_dark'          => '',
            'logo_width'         => 3,            
            'preloader'          => 0,
            'preloader_image'    => '',
            'page_scrolltop'     => 0,
            'custom_cursor'      => '',
            'sticky_header'      => 1,
			'music_slug'                => 'music',
			'music_cat_slug'          	=> 'music-cat',
			'music_genre_slug'          => 'genre',
			'music_album_slug'          => 'album',
			'podcast_slug'              => 'podcast',
			'podcast_cat_slug'          => 'podcast-cat',
			'show_slug'                 => 'show',
			'show_cat_slug'             => 'show-cat',
			'team_slug'                 => 'team',
			'team_cat_slug'             => 'team-cat',
			'event_slug'                => 'event',
			'event_cat_slug'            => 'event-cat',
			'video_slug'                => 'video',
			'video_cat_slug'            => 'video-cat',
	        'gallery_slug'              => 'gallery',
			'gallery_cat_slug'          => 'gallery-cat',
			
			// Color
			'primary_color' 			=> '#ec1c24',
			'secondary_color' 			=> '#bd2127',
			'custom_cursor_color' 		=> '#ff0000',
			'footer_bg_color' 		    => '#121212',
			'footer_title_color' 		=> '#ffffff',
			'footer_text_color' 		=> '#c0c0c0',
			'footer_link_color' 		=> '#c0c0c0',
			'footer_hover_color' 		=> '#ec1c24',
			'footer_left_color' 		=> '#e6e1e1',
			'copyright_text_color' 		=> '#c0c0c0',
			'copyright_hover_color' 	=> '#ec1c24',
			'copyright_bg_color' 		=> '#121212',
			'footer_icon_color' 		=> '#ffffff',
			'footer_iconbg_hover_color' => '#ec1c24',
			'active_menu_icon_color'    => '#ec1c24',
            'active_menu_icon_color_hover'=> '#ec1c24',
			
			// Menu color
			'menu_bg_color' => '#ffffff',
			'menu_color' => '#111111',
			'menu_hover_color' => '#ec1c24',
			'submenu_bg_color' => '#ffffff',
			'submenu_color' => '#444444',
			'submenu_hover_color' => '#ffffff',
			'submenu_hoverbg_color' => '#111111',

            // Contact Socials
            'phone_label'   => 'Emergency Contact',
            'phone'         => '+1234480881',
            'email_label'   => 'Mail us',
            'email'         => 'support@radiustheme.com',
            'opening_label' => 'Saturday - Sunday',
            'opening'       => '09:00AM - 10:00PM',
            'address_label' => 'Address ',
            'address'       => '59 Street, Chicago, Newyork City',
            'social_label'  => __( 'Follow Us', 'fmwave' ),
            'facehook_url'  => '#',
            'twitter_url'   => '#',
            'instagram_url' => '#',
            'youtube_url'   => '#',
            'pinterest_url' => '#',
            'linkedin_url'  => '',
            'rss_url'  => '',

            // header
            'header_style'      => 1,
            'page_header_style' => 1,
            'menu_btn_text'     => 'Tune In Now',
            'menu_btn_link'     => '#',
            'offcanvas_menu_alignment' => 'text-left',
            'offcanvas_menu_bgimg' => '',
            'offcanvas_bgimg_overlay' => '',
            'offcanvas_bgimg_opacity' => '50',
			'header_search'			=> 0,
			'header_cart'			=> 0,
			'header_offcanvas'		=> 0,
			'header_button'			=> 0,

            // Page layout 
            'page_layout'        => 'right-sidebar',
            'page_cursor'        => '',            
            'page_banner'        => 1,         
            'page_banner_bg_type' => 'bgcolor',            
            'page_banner_bgcolor' => '#bd2127',        
            'page_banner_bgimg'   => '',            
            'page_banner_bgimage_overlay' => '#000000',         
            'page_overlay_opacity' => '75',      
            'page_breadcrumb'     => '',
            'page_inner_padding_top'    => '110',
            'page_inner_padding_bottom' => '100',
			
			// Unfinished
			'pp_bgimg'        => '',
            'ppf_bgcolor'        => '',
            'page_padding_top'        => 100,
            'page_padding_bottom'        => 100,
            'single_post_padding_top'        => 100,
            'single_post_padding_bottom'        => 100,
            'class_time_format'        => '',

            // Blog layout 
            'blog_layout'        => 'right-sidebar',
            

            // Single Page layout
            'single_post_layout' => 'right-sidebar',
            'single_post_banner' => 1,
            'single_post_banner_bg_type' => 'bgcolor',
            'single_post_banner_bgcolor' => '#bd2127',
            'single_post_banner_bgimg' => '',
            'single_post_banner_bgimage_overlay' => '#000000',
            'single_post_overlay_opacity' => '75',
            'single_post_breadcrumb' => '',
            'single_post_inner_padding_top' => '110',
            'single_post_inner_padding_bottom' => '100',

            // Blog Post
            'blog_style'               => 1, 
            'blog_date'                => 1, 
            'blog_author_name'         => 1, 
            'blog_cats'                => 0,  
            'excerpt_length'           => 42,

            // Blog single layout 
            'post_date'              => 1,
            'post_author_name'       => 1,
            'post_comment_num'       => 1,
            'post_tags'              => 1,
            'post_share'              => 1,
            'post_cats'              => 1,
            'post_navigation'        => 0,
            'post_share_facebook'    => 1,
            'post_share_twitter'    => 1,
            'post_share_google'    => 0,
            'post_share_linkedin'    => 1,
            'post_share_pinterest'    => 0,
            'post_share_whatsapp'    => 0,
            'post_share_stumbleupon'    => 0,
            'post_share_tumblr'    => 0,
            'post_share_reddit'    => 0,
            'post_share_email'    => 1,
            'post_share_print'    => 0,
			
            //@dev
            'post_author_about'      => 0,
            'post_author_social'      => 1,

            //show - custom post type
			'show_padding_top'      => 100,
			'show_padding_bottom'   => 100,
			
            'schedule_show_related_product'  => 1,
			'schedule_related_number'        => -1,			
			'schedule_related_title'         => 1,
			'schedule_related_title_text'    => 'Related Show',

            // Gallery Post
            'gallery_archive_number'  => 12, 
            'gallery_archive_orderby' => 'date', 
            'gallery_cols_width'      => 4,
			
			// Team Post
            'team_cols_width'      => 3,
            'team_arc_style'      => 'style1',
            'team_arc_show'      => 1,
            'team_arc_date'      => 1,
            'team_arc_social'      => 1,
			'related_team_query'    => 'cat',
            'related_team_sort'    => 'recent',

            'team_related_show'    => 1,
            'team_related_schedule'    => 1,
            'team_related_team'    => 1,

            'team_show_related_title'    => 'Related Shows',
            'team_schedule_related_title'    => 'Weekly Schedule',
            'team_related_title'    => 'Related Team',

            'related_show_number'    => 3,
            'related_team_number'    => 4,
			
			// Event Post
			'event_no'      => 1,
			'event_read'      => 1,
			'event_cols_width'      => 4,
			'event_start_date'      => 1,
			'event_end_date'      => 1,
			'event_start_time'      => 1,
			'event_end_time'      => 1,
			'event_location'      => 1,
			'event_website'      => 1,
			'event_address'      => 1,
			'event_type'      => 1,
			'event_phone'      => 1,
			'event_seatno'      => 1,
			'event_map'      => 1,
			'event_tickets'      => 1,
			
            // Single gallery 
            'gallery_details_image' => 'fmwave-size-7',
            'single_gallery_slug' => 'gallery',
            
            // Footer
            'footer_area'         => 1,
            'footer_top_area'     => 0,
            'footer_style'        => 1,
            'show_footer_social'  => 0,
            'copyright_area' 	  => 1,
            'copyright_text'      => '&copy; ' . date('Y') . ' Fmwave. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . FMWAVE_THEME_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_background'   => '',
			'footer_logo_image'   => '',
            // Footer 1
            'footer1_cta_text' => '',
            'footer1_btn_text' => '',
            'footer1_btn_link' => '',
            'footer_logo'      => 0,
            'footer_menu'      => '',
            // Footer 2
			'footer2_bg_color'    => '#131314',
            'footer_column'       => 4,
            'footer1_column'      => 3,
            'footer2_column'      => 3,
            'footer3_column'      => 3,
            'footer4_column'      => 3,
			
			//Shop Page
			'shop_layout' => 'full-width',
			'products_cols_width' => 4,
			'products_per_page' => 12,
			'wc_shop_quickview_icon' => 1,
			'wc_shop_wishlist_icon' => 1,
			'wc_shop_compare_icon' => 1,
			
			//Product Page
			'product_layout' => 'full-width',
			'wc_product_wishlist_icon' => 1,
			'wc_product_compare_icon' => 1,
			'wc_product_quickview_icon' => 1,

            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => 'normal',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '30px',

            // Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => 'normal',
                )
            ),
            'typo_menu_size' => '16px',
            'typo_menu_height'=> '28px',

            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Poppins',
                    'regularweight' => '600',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h1_size' => '36px',
            'typo_h1_height' => '40px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h2_size' => '30px',
            'typo_h2_height'=> '36px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h3_size' => '24px',
            'typo_h3_height'=> '32px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h4_size' => '22px',
            'typo_h4_height'=> '30px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h5_size' => '20px',
            'typo_h5_height'=> '28px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h6_size' => '18px',
            'typo_h6_height'=> '24px',

            // Error
			'error_page_banner' => '',
			'error_page_image' => '',
            'error_text1' => 'Purr! The page',
            'error_text2' => 'you are looking for does not exist!',
            'error_buttontext' => 'BACK TO HOME',
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}