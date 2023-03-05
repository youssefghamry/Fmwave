<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;

// Template
$template_bg_sty	='';
$gutters        	='';
$iso            	='';
$container_class	='container';
$template         = 'podcast-1';

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="<?php echo esc_attr( $container_class );?>">
		<main id="main" class="site-main rt-team-archive">
			<?php if ( have_posts() ) :?>
				<div class="row <?php echo esc_attr( $iso );?>">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-xl-3 col-lg-4 col-sm-6">
						<?php get_template_part( 'template-parts/archive-podcast/content', $template); ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php Helper::pagination();?>
			<?php else:?>
				<?php get_template_part( 'template-parts/content', 'none' );?>
			<?php endif;?>
		</main>
	</div>
</div>
<?php get_footer(); ?>