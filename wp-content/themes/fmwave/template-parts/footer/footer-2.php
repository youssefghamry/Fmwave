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

<footer class="footer-style-2">
	<?php if ( RDTheme::$options['footer_area'] == 1 ){ ?>
        <div class="main-footer <?php if ( 1 != Helper::has_footer() ){ ?>no-footer-widget<?php } ?>">
            <div class="container">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                        <?php if ( RDTheme::$options['footer_logo'] ){ ?>
                            <div class="footer-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo wp_kses( $fm_footer_logo, 'alltext_allow'); ?></a>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="col-sm-6">
                            <ul class="footer-social">
								<?php if ( RDTheme::$options['show_footer_social'] ){ ?>
									<?php if (  !empty($socials)){ ?>
										<?php foreach ( $socials as $social ){ ?>
                                            <li><a target="_blank" href="<?php echo esc_url( $social['url'] );?>"><i class="<?php echo esc_attr( $social['icon'] );?>"></i></a></li>
										<?php } ?>
									<?php } ?>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
	<?php if ( RDTheme::$options['copyright_area'] ){ ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
					<?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
						<div class="col-lg-7 footer-box">
							<?php dynamic_sidebar( 'footer-two' ); ?>
						</div>
					<?php } ?>
                    <div class="col-lg-5 footer-copyright"><?php echo wp_kses( $copyright_text, 'allow_link' ); ?>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</footer>

