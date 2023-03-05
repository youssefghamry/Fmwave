<?php
/**
 * Template Name: Blank Template
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\fmwave;
?>

<?php if ( post_password_required() ) {
	get_template_part( 'templates/protected-page' );
} else { ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<?php 
		while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); } ?>