<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

$blog_style = RDTheme::$options['blog_style'];
if ( $blog_style == 1 ) {
	$version = 'blog-list-page';
	$container = 'container';
} elseif ( $blog_style == 2 ) {
	$version = 'blog-grid-page';
	$container = 'container';
} else {
	$version = 'blog-grid-page';
	$container = 'container-xl';
}
?>
<?php get_header(); ?>

<!--=====================================-->
<!--=         Search page wrapper    	=-->
<!--=====================================-->
<section class="section content-area search-page">
    <div class="<?php echo esc_attr( $container ); ?>">
    	<div class="row gutters-40">
	    	<div class="<?php Helper::the_layout_class(); ?>">
	    		<?php if ( have_posts() ) :?>
	    			<?php echo '<div class="blog-list-layout">'; ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'search' ); ?>
					<?php endwhile; ?>
					<?php echo '</div>'; ?>
					<?php Helper::pagination(); ?>
				<?php else:?>
					<?php get_template_part( 'template-parts/content', 'none' );?>
				<?php endif;?>
	        </div>
	        <?php Helper::fmwave_sidebar(); ?>
    	</div>
    </div>
</section>
<?php get_footer(); ?>