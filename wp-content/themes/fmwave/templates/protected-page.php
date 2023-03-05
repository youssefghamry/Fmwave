<?php
/**
 * Template Name: Protected Page
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use radiustheme\fmwave\RDTheme;

\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-canvas' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( ! current_theme_supports( 'title-tag' ) ) : ?>
		<title><?php wp_title(); ?></title>
	<?php endif; ?>
	<?php wp_head(); ?>
	<?php
		// Keep the following line after `wp_head()` call, to ensure it's not overridden by another templates.
		echo \Elementor\Utils::get_meta_viewport( 'canvas' );
	?>
</head>
<body <?php body_class(); ?>>
	<?php
	Elementor\Modules\PageTemplates\Module::body_open();
	?>

	<?php
        if (RDTheme::$options['preloader']) {
            do_action('site_prealoader');
        }
        $fc = RDTheme::$options['pp_form_cols_width'];
        $ft = RDTheme::$options['form_title_text'];
        $fl = RDTheme::$options['form_label_text'];
        $fb = RDTheme::$options['form_btn_text'];
		
    ?>
    
	<!-- Custom Cursor Start Here -->
	<div class="circle-cursor circle-cursor--outer"></div>
	<div class="circle-cursor circle-cursor--inner"></div>
	
    <div id="wrapper" class="wrapper">
		<?php /**
		 * Before canvas page template content.
		 *
		 * Fires before the content of Elementor canvas page template.
		 *
		 * @since 1.0.0
		 */
		do_action( 'elementor/page_templates/canvas/before_content' );
		?>
		<section class="fullpage-section bg-common pp-full-section">
			<?php get_template_part('template-parts/header/header', 1 ); ?>
		    <div class="protect-gallery">
		        <div class="container">
		            <div class="row">
		                <div class="col-xl-<?php echo esc_attr( $fc ); ?> col-lg-6" data-sal-duration="1000" data-sal="zoom-in" data-sal-delay="500">
		                    <div class="item-content">
		                    	<?php if (!empty($ft)) { ?>
		                        <h2 class="item-title"><?php echo esc_html( $ft ); ?></h2>
		                    	<?php } ?>
		                        <form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" method="post">
		                        	<?php if (!empty($fl)) { ?>
		                            <label><?php echo esc_html( $fl ); ?></label>
		                            <?php } ?>
		                            <div class="form-group">
		                                <input type="password" name="post_password" id="password" class="form-control" placeholder="Password:">
		                            </div>
		                            <div class="form-group">
		                                <button type="submit" class="submit-btn"><?php echo esc_html( $fb ); ?></button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <?php get_template_part( 'template-parts/footer/footer', 3 ); ?>
		</section>
		<?php 
		/**
		 * After canvas page template content.
		 *
		 * Fires after the content of Elementor canvas page template.
		 *
		 * @since 1.0.0
		 */
		do_action( 'elementor/page_templates/canvas/after_content' );
		?>
		<?php wp_footer(); ?>
	</div>
</body>
</html>