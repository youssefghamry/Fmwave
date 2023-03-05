<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;
?>
<?php get_header(); ?>
<div id="primary" class="section content-area customize-content-selector">
	<div class="container">
		<div class="row gutters-40">		
			<div class="<?php Helper::the_layout_class(); ?>">		
				<main id="main" class="site-main page-content-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php Helper::fmwave_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>