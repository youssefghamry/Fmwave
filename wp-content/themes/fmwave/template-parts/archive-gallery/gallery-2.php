<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
$prefix = FMWAVE_THEME_CPT_PREFIX;

$cols = RDTheme::$options['gallery_cols_width'];

?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="col-md-<?php echo esc_attr( $cols ); ?> no-equal-item" data-sal-duration="1000" data-sal="slide-up">
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'gallery-box gallery-style-2' ); ?>>
    <div class="item-img">
      <?php the_post_thumbnail( 'full' ); ?>
    </div>
    <div class="item-content">
      <h3 class="item-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>
      <div class="item-subtitle"><?php Helper::get_gallery_cat( get_the_ID() ); ?></div>
    </div>
  </div>
</div>
<?php endwhile; ?>
