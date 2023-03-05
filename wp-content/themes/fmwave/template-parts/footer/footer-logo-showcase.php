<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
use \WP_Query;

wp_enqueue_style( 'slick' );
wp_enqueue_script( 'slick' );

$fm_slider_js_options = apply_filters('fm_slider_js_options', array(
	'arrows' => false,
	'slidesToShow' => 5,
	'slidesToShowTab' => 3,
	'slidesToShowMobile' => 2,
	'slidesToShowMobiles' => 2,
	'slidesToScroll' => 1,
	'autoplay' => true,
	'autoplaySpeed' => 2000,
	'speed' => 500,
	'infinite' => true,
	'autoplay' => false,
));
?>

<section class="brand-section">
    <div class="container">
        <div class="brand-box logo-slick-carousel" data-slick="<?php echo htmlspecialchars(wp_json_encode($fm_slider_js_options), ENT_QUOTES, 'UTF-8'); // WPCS: XSS ok. ?>">
			<?php
			$the_query = new WP_Query( array( 'post_type' => 'rtcpt_logoshowcase' ) );
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
                    <div class="manik">
                        <?php the_post_thumbnail(); ?>
                    </div>
				<?php }
			} else {
				esc_html_e('No Image Found','fmwave');
			}
			wp_reset_postdata();
			?>
        </div>
    </div>
</section>