<?php 
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

// Logo
if( !empty( RDTheme::$options['logo_dark'] ) ) {
	$logo_dark = wp_get_attachment_image( RDTheme::$options['logo_dark'], 'full' );
	$fm_dark_logo = $logo_dark;
}else {
	$fm_dark_logo = "<img width='398' height='127' src='" . Helper::get_img( 'logo-dark.png' ) . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

?>
<div class="header-logo dark-logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	   <?php echo wp_kses( $fm_dark_logo, 'alltext_allow' ); ?>
	</a>
</div>