<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;

?>
<?php if ( (RDTheme::$has_footer_top_area != '0') && (RDTheme::$has_footer_top_area != 'off') ) {
    get_template_part( 'template-parts/footer/footer-logo-showcase', RDTheme::$footer_style );
} ?>

<?php get_template_part( 'template-parts/footer/footer', RDTheme::$footer_style ); ?>

</div>

<?php wp_footer(); ?>

</body>
</html>