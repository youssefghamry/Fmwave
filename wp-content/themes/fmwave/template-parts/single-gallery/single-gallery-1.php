<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;

$crop = RDTheme::$options['gallery_details_image'];

?>

<?php get_header(); ?>

<section class="single-gallery">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); 
        $galleries = get_post_meta( get_the_ID(), "fmwave_galleries", true ); 
          if (!empty($galleries)) {
        ?>
        <div class="gallery-tab">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="gallery1" role="tabpanel">
              <?php the_post_thumbnail( $crop ); ?>
            </div>
            <?php 
              $class = '';
              $i = 1; 
              foreach ($galleries as $key => $value) { 
              $i++;
              $src = wp_get_attachment_image_src( $attachment_id = $value['gallery_image'], $crop );
            ?>
              <div class="tab-pane fade" id="gallery<?php echo esc_attr( $i ); ?>" role="tabpanel">
                <img src="<?php echo esc_url($src[0]); ?>" alt="<?php esc_attr_e( 'gallery image', 'fmwave' ); ?>">
              </div>
            <?php } ?>
          </div>
          <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#gallery1" role="tab" aria-selected="true">
                  <?php the_post_thumbnail('fmwave-size-3'); ?>
                </a>
              </li>
              <?php 
                $class = '';
                $i = 1; 
                foreach ($galleries as $key => $value) { 
                $i++;
                $src = wp_get_attachment_image_src( $attachment_id = $value['gallery_image'], "fmwave-size-3" );
                if ($i == 1) {
                  $class = 'active';
                } else {
                  $class = '';
                }
              ?>
              <li class="nav-item">
                  <a class="nav-link <?php echo esc_attr( $class ); ?>" data-toggle="tab" href="#gallery<?php echo esc_attr( $i ); ?>" role="tab" aria-selected="false">
                    <img src="<?php echo esc_url($src[0]); ?>" alt="<?php esc_attr_e( 'gallery image', 'fmwave' ); ?>">
                  </a>
              </li>
              <?php } ?>
          </ul>
        </div>
      <?php } else { ?>
        <div class="single-feature-image">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
        <div class="gallery-content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?> 
    </div>
</section>

<?php get_footer(); ?>