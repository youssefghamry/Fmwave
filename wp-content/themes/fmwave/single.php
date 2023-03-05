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
<div class="section content-area blog-detail-page">
    <div class="container">
        <div class="row gutters-40">
            <div class="<?php Helper::the_layout_class(); ?>">
                <main id="main" class="site-main rt-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content-single' ); ?>
					<?php endwhile; ?>
				</main>
            </div>
            <?php Helper::fmwave_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>