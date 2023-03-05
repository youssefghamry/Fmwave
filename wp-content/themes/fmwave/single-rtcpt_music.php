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
    <div class="container">
		<main id="main" class="site-main single-music">
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/single-music/single', 'music'); ?>
				<?php endwhile; ?>
			</div>
		</main>
		<?php wp_reset_postdata(); ?>
    </div>
</div>
<?php get_footer(); ?>