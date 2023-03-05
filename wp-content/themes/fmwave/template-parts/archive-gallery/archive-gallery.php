<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

$version_class = '';
$version_id = 'grid-gallery-id';
?>
<?php get_header(); ?>
<section class="gallery-inner <?php echo esc_attr( $version_class ); ?>">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="row zoom-gallery" id="<?php echo esc_attr( $version_id ); ?>">
                <?php get_template_part( 'template-parts/archive-gallery/gallery', '1' ); ?>
            </div>
        <?php else: ?>
            <?php get_template_part( 'template-parts/content', 'none' );?>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>