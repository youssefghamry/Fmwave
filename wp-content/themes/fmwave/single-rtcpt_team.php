<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

get_header(); ?>
    <div id="primary" class="content-area">
		<main id="main" class="site-main single-show">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/single-team/content-single', 'team'); ?>
			<?php endwhile; ?>
		</main>
		<?php wp_reset_postdata(); ?>
    </div>
<?php get_footer(); ?>