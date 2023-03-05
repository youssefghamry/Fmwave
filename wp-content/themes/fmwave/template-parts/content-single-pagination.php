<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
$previous = get_previous_post();
$next = get_next_post();
if ($previous && $next) {
    $cols = '6';
} else {
   $cols = '12'; 
}
if ( $previous || $next ):

?>

<div class="thumb-pagination">
	<?php if ( $previous ): ?>
	<div class="post-nav prev-btn">
		<a href="<?php echo esc_url( get_permalink( $previous ) ); ?>" class="pg-prev"><i class="fas fa-angle-double-left"></i><?php echo esc_html_e( 'Prev Post', 'fmwave' ); ?></a>
	</div>
	<?php endif; if ( $next ): ?>
	<div class="post-nav next-btn">
		<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="pg-next"><?php echo esc_html_e( 'Next Post', 'fmwave' );?><i class="fas fa-angle-double-right"></i></a>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>