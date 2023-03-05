<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;

$template 			= 'event-1';
$container 			= 'container inner-page-section event-grid';

$cols = RDTheme::$options['event_cols_width'];
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="<?php echo esc_attr( $container );?>">
		<main id="main" class="site-main rt-departments-archive">
			<?php if ( have_posts() ) {
				$i = 1;
				?>
				<div class="row auto-clear row no-gutters">
					<?php while ( have_posts() ) { the_post(); ?>
						<div class="col-md-<?php echo esc_attr( $cols ); ?>">
							<?php get_template_part( 'template-parts/archive-event/content', $template , ['i'=>sprintf("%02d", $i)] ); ?>
						</div>
					<?php $i++; } ?>
				</div>
				<?php Helper::pagination();?>
			<?php } else { ?>
				<?php get_template_part( 'template-parts/content', 'none' );?>
			<?php } ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>