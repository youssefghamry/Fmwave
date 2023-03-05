<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
	
	<?php
		// Preloader
		if( !empty( RDTheme::$options['preloader_image'] ) ) {
			$pre_bg = wp_get_attachment_image_src( RDTheme::$options['preloader_image'], 'full', true );
			$preloader_img = $pre_bg[0];
		}else {
			$preloader_img = Helper::get_img( 'preloader.gif' );
		}

        if ( RDTheme::$options['preloader'] ){
            if (!empty($preloader_img)) {                
                echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
            }
        }
	?>
	
    <!-- Custom Cursor Start Here -->
    <div class="circle-cursor circle-cursor--outer"></div>
    <div class="circle-cursor circle-cursor--inner"></div>
	<?php get_template_part('template-parts/header/mobile', 'menu');?>
    <div id="wrapper" class="wrapper">
        <div id="masthead" class="site-header">
            <?php get_template_part('template-parts/header/header', RDTheme::$header_style); ?>
        </div> 
        <?php get_template_part('template-parts/content', 'banner'); ?>

        <div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <form class="header-search-form">
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Search here........', 'fmwave' ); ?>">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>