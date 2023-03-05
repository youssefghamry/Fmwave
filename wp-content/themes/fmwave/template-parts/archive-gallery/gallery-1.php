<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

$prefix      = FMWAVE_CORE_THEME;
$cpt         = FMWAVE_CORE_CPT;

$cols = RDTheme::$options['gallery_cols_width'];
$posts_no = RDTheme::$options['gallery_archive_number'];
$thumb_size  = "fmwave-event-grid";

wp_enqueue_style( 'magnific-popup' );
wp_enqueue_script( 'jquery-magnific-popup' );

$args = array(
  'post_type'  => "{$cpt}_gallery",
  'post_status'    => 'publish',
  'posts_per_page' => $posts_no,
);

$port_query = new \WP_Query( $args );

?>
<?php
    while ( $port_query->have_posts() ) { $port_query->the_post();
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    $featured_img_little = get_the_post_thumbnail_url(get_the_ID(),$thumb_size);
?>
    <div class="col-md-<?php echo esc_attr( $cols ); ?>">
        <div class="gallery-box">
            <?php the_post_thumbnail( $thumb_size ); ?>
            <div class="gallery-content">
                <div class="gallery-content-inner">
                    <a href="<?php echo esc_url( $featured_img_url ); ?>" class="popup-zooms ne-zoom"><i class="fas fa-search"></i></a>
                    <h3 class="item-title"><?php the_title(); ?></h3>
                </div>
            </div>                    
        </div>
    </div>
<?php } ?>

