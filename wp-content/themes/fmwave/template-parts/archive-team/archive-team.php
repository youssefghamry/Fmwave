<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

// Layout class
if ( RDTheme::$layout == 'full-width' ) {
	$layout_class = 'col-sm-12 col-xs-12';
	$col_class    = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item' ;
}
else{
	$layout_class = 'col-sm-8 col-md-8 col-xs-12';
	$col_class    = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
}

$cols = RDTheme::$options['team_cols_width'];

// Template
$template_bg_sty	='';
$gutters        	='';
$iso            	='';
$container_class	='container';

switch ( RDTheme::$options['team_arc_style'] ) {
	case 'style2':
		$template     		= 'team-2';			
		$iso          		='auto-clear';
	break;	
	case 'style3':
		$template     		= 'team-3';			
		$iso          		='auto-clear';
	break;	
	default:
		$template         = 'team-1';	
		$iso          		='no-gutters auto-clear';
	break;
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="<?php echo esc_attr( $container_class );?>">
		<main id="main" class="site-main rt-team-archive">
			<?php if ( have_posts() ) :?>
				<div class="row <?php echo esc_attr( $iso );?>">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-<?php echo esc_attr( $cols ); ?>">
						<?php get_template_part( 'template-parts/archive-team/content', $template); ?>
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