<?php
/**
 * Template Name: Full Blank Template
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
// namespace radiustheme\fmwave;
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

		\Elementor\Plugin::$instance->modules_manager->get_modules( 'page-templates' )->print_content();

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