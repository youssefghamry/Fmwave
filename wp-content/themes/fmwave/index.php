<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
?>
<?php get_header(); ?>
<?php 
$prefix = FMWAVE_THEME_CPT_PREFIX;
$post_types = ['event', 'podcast', 'team', 'gallery'];

foreach ($post_types as $post_type) {
  if ( is_post_type_archive( "{$prefix}_{$post_type}" ) || is_tax( "{$prefix}_{$post_type}_category" ) ) {
    get_template_part( "template-parts/archive-{$post_type}/archive", $post_type );
    return;
  }
}

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
<section class="section content-area blog-fluid-grid <?php echo esc_attr( $version ); ?>">
    <div class="<?php echo esc_attr( $container ); ?>">
    	<div class="row gutters-40">
	    	<div class="<?php Helper::the_layout_class(); ?>">
	    		<?php if ( have_posts() ) : ?>
				<?php
					if ( ( is_home() || is_archive() ) ) {
						if ( $blog_style == 2 ) {
							echo '<div class="row blog-grid-layout rt-masonry-grid gutters-40">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/archive-blog/content',  $blog_style ); 
							endwhile;
							echo '</div>';
						} else {
							echo '<div class="blog-list-layout">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/archive-blog/content',  $blog_style ); 
							endwhile;
							echo '</div>';
						}
						Helper::pagination();
					}
					else {
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content' );
						endwhile;
					}
				?>
				<?php else: ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
	        </div>
	        <?php Helper::fmwave_sidebar(); ?>
    	</div>
    </div>
</section>

<?php get_footer(); ?>
