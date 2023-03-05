<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
?>

<?php get_header(); ?>
<section class="error-page">
    <div class="container">
        <div class="error-logo">
            <?php
                $error_page_img = RDTheme::$options['error_page_image'];
                if ( !empty($error_page_img) ){
					$error_page_img_src = wp_get_attachment_image_url( RDTheme::$options['error_page_image'], 'full');
			?>
             <img src="<?php echo esc_url( $error_page_img_src ); ?>" alt="<?php echo esc_attr( '404', 'fmwave' ); ?>">
            <?php } else { ?>
             <img src="<?php echo esc_url( Helper::get_img( '404.png' ) );  ?>" alt="<?php echo esc_attr( '404', 'fmwave' ); ?>">
            <?php } ?>
        </div>
        <h2 class="item-title"><span><?php echo wp_kses( RDTheme::$options['error_text1'] ,'alltext_allow' ); ?></span><?php echo wp_kses( RDTheme::$options['error_text2'] ,'alltext_allow' ); ?></h2>
        <a class="item-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-fill-lg"><?php echo esc_html( RDTheme::$options['error_buttontext'] );?></a>
    </div>
</section>
<?php get_footer(); ?>