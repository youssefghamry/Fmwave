<?php 
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

// Logo
if( !empty( RDTheme::$options['logo'] ) ) {
	$logo_light = wp_get_attachment_image( RDTheme::$options['logo'], 'full' );
	$fm_light_logo = $logo_light;
}else {
	$fm_light_logo = "<img width='398' height='127' src='" . Helper::get_img( 'logo-light.png' ) . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

?>
<div class="header-logo light-logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	   <?php echo wp_kses( $fm_light_logo, 'alltext_allow' ); ?>
	</a>
</div>