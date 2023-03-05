<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

$socials = Helper::socials();

$copyright_text = RDTheme::$options['copyright_text'];

// Logo
if( !empty( RDTheme::$options['footer_logo_image'] ) ) {
	$logo_footer = wp_get_attachment_image( RDTheme::$options['footer_logo_image'], 'full' );
	$fm_footer_logo = $logo_footer;
}else {
	$fm_footer_logo = "<img width='398' height='127' src='" . Helper::get_img( 'logo-light.png' ) . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

?>

<footer class="footer-wrap footer-style-4">
	<?php if ( RDTheme::$options['footer_area'] == 1 ){ ?>
        <div class="main-footer <?php if ( 1 != Helper::has_footer() ){ ?>no-footer-widget<?php } ?>">
            <div class="container"> 
				<?php if ( is_active_sidebar( 'footer-subscribe' ) ) { ?>
				<div class="footer-top">
				<div class="row">
                        <div class="col-sm-12">
                    <div class="subscribe-notification">
                        <?php dynamic_sidebar( 'footer-subscribe' ); ?>
                        
                    </div>
                </div></div>
                </div>
				<?php } ?>
				
                <div class="footer-middle">
                    <div class="row">
                        <?php if ( is_active_sidebar( 'footer-4-1' ) ) { ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 footer-box upcontent">
                                <?php dynamic_sidebar( 'footer-4-1' ); ?>
                            </div>
                        <?php } if ( is_active_sidebar( 'footer-4-2' ) ) { ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 footer-box">
                                <?php dynamic_sidebar( 'footer-4-2' ); ?>
                            </div>
                        <?php } if ( is_active_sidebar( 'footer-4-3' ) ) { ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 footer-box">
                                <?php dynamic_sidebar( 'footer-4-3' ); ?>
                            </div>
                        <?php } if ( is_active_sidebar( 'footer-4-4' ) ) { ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 footer-box">
                                <?php dynamic_sidebar( 'footer-4-4' ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
	<?php if ( RDTheme::$options['copyright_area'] ){ ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright"><?php echo wp_kses( $copyright_text, 'allow_link' ); ?></div>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</footer>

