<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
$offcanvas_menu_args   = Helper::offcanvas_menu_args();
$alignment = RDTheme::$options['offcanvas_menu_alignment'];

?>

<!--=====================================-->
<!--=        Offcanvas Menu Start       =-->
<!--=====================================-->

<div class="offcanvas-menu-wrap" id="offcanvas-wrap">
  <div class="close-btn offcanvas-close"><i class="fas fa-times"></i></div>
  <div class="offcanvas-content <?php echo esc_attr( $alignment ); ?>">
    <?php wp_nav_menu( $offcanvas_menu_args ); ?>
  </div>
</div>