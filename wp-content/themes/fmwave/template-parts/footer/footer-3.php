<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;

$copyright_text = RDTheme::$options['copyright_text'];

?>

<!--=====================================-->
<!--=            Footer Start           =-->
<!--=====================================-->
<footer class="footer-style-3">
    <div class="container">
        <div class="copyright"><?php echo wp_kses( $copyright_text, 'allow_link' ); ?></div>
    </div>
</footer>
