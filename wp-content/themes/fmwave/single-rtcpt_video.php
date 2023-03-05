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
            <div class="row">
                <div class="<?php echo esc_attr( Helper::the_layout_class() ); ?>">
                    <main id="main" class="site-main single-event">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php
                                get_template_part( 'template-parts/single-video/content-single', 'video');
                                if ( comments_open() || get_comments_number() ){
                                    comments_template();
                                }
                            ?>
                        <?php endwhile; ?>
                    </main>
                    <?php wp_reset_postdata(); ?>
                </div>
				<?php Helper::fmwave_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>