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

if( ! function_exists( 'fmwave_related_show' )){
	function fmwave_related_show(){
		$prefix = FMWAVE_CORE_CPT;
		$thumb_size = 'fmwave-v3-b';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$related_show_number = RDTheme::$options['related_show_number'];
		
		$content 	= get_the_content();
		$content 	= apply_filters( 'the_content', $content );
		
		$show_related_title  = get_post_meta( get_the_ID(), 'show_related_title', true );

		# Making ready to the Query ...

		$args = array(
			'post_type' => 			"{$prefix}_show",
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_show_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);
		
	?>
	<section class="upcoming-show">		
		<div class="row">
			<?php
				$today_weekday = strtolower(date('D'));
				$today_time = date('g:i a');
				$time_now = esc_html (strtotime((str_replace( ' ', '', ($today_time)))));
				$query = new WP_Query( $args );
				$temp = Helper::wp_set_temp_query( $query );
			?>
			<?php if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
		
					$metas = get_post_meta( get_the_ID(), "{$prefix}_show_schedule", true );
					$day_name = wp_list_pluck( $metas, 'week' );
					$pointer = array_search( $today_weekday , $day_name );
			
					$start_time = esc_html (strtotime(str_replace( ' ', '', ($metas[$pointer]['start_time']))));
					$start_time_real = esc_html (strtotime(str_replace( ' ', '', ($metas[$pointer]['start_time']))));
					$end_time = esc_html (strtotime(str_replace( ' ', '', ($metas[$pointer]['end_time']))));
			?>
			<div class="col-lg-4">
				<div class="show-box">
					<div class="item-img">
						<?php the_post_thumbnail($thumb_size); ?>
					</div>
					<div class="item-date"><?php echo esc_html( $metas[0]['start_time'] ); ?></div>
					<div class="item-content">
						<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="host-name"><?php echo get_the_title( $metas[0]['team']); ?></div>
					</div>
				</div>
			</div>
				 <?php
				}
			} ?>
			<?php Helper::wp_reset_temp_query( $temp );?>
		</div>
	</section>
		<?php
	}
}
?>