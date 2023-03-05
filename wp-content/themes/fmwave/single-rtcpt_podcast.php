<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;
get_header(); ?>
<div class="section content-area blog-detail-page">
    <div class="container">
        <div class="row gutters-40">
            <div class="<?php Helper::the_layout_class(); ?>">
                <main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						get_template_part( 'template-parts/single-podcast/single', 'podcast-1');
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
