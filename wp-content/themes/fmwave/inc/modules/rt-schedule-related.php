<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

if( ! function_exists( 'fmwave_related_schedule' )){
	function fmwave_related_schedule(){
		$prefix = FMWAVE_CORE_CPT;
		$thumb_size = 'fmwave-show-isotope';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$schedule_related_number = RDTheme::$options['schedule_related_number'];
		
		$content 	= get_the_content();
		$content 	= apply_filters( 'the_content', $content );
		
		$show_related_title  = get_post_meta( get_the_ID(), 'show_related_title', true );

		# Making ready to the Query ...

		$args = array(
			'post_type'				 => 'rtcpt_show',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $schedule_related_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		$weeknames = array(
			'mon' => esc_html__( 'Monday', 'fmwave' ),
			'tue' => esc_html__( 'Tuesday', 'fmwave' ),
			'wed' => esc_html__( 'Wednesday', 'fmwave' ),
			'thu' => esc_html__( 'Thursday', 'fmwave' ),
			'fri' => esc_html__( 'Friday', 'fmwave' ),
			'sat' => esc_html__( 'Saturday', 'fmwave' ),
			'sun' => esc_html__( 'Sunday', 'fmwave' ),
		);
		$weeknames = apply_filters( 'fmwave_weeknames', $weeknames );

		$shows = get_posts( $args );
		$uniqid = (int) rand();

		$week_ids = array(
			'mon' => 'mon-'. $uniqid,
			'tue' => 'tue-'. $uniqid,
			'wed' => 'wed-'. $uniqid,
			'thu' => 'thu-'. $uniqid,
			'fri' => 'fri-'. $uniqid,
			'sat' => 'sat-'. $uniqid,
			'sun' => 'sun-'. $uniqid,
		);

		$schedule = array(
			'mon' => array(),
			'tue' => array(),
			'wed' => array(),
			'thu' => array(),
			'fri' => array(),
			'sat' => array(),
			'sun' => array(),
		);

		foreach ( $shows as $show ) {
			$show_name  = $show->post_title;
			$metas = get_post_meta( $show->ID, "{$prefix}_show_schedule", true );
			if ( has_post_thumbnail( $show->ID ) ){
				$post_thumbnail = get_the_post_thumbnail( $show->ID, $thumb_size );
			}
			$metas = ( $metas != '' ) ? $metas : array();
			
			foreach ( $metas as $meta ) {

				$start_time = !empty( $meta['start_time'] ) ? strtotime( $meta['start_time'] ) : false;
				$end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;
				
				$start_time = $start_time ? date( get_option('time_format'), $start_time ) : '';
				$end_time   = $end_time ? date( get_option('time_format'), $end_time ) : '';

				$schedule[$meta['week']][] = array(
					'show'        => $show_name,
					'team'        => !empty( $meta['team'] ) ? get_the_title( $meta['team'] ) : '',
					'start_time'  => $start_time,
					'end_time'    => $end_time,
					'week'        => $meta['week'],
					'pid'         => $show->ID,
				);
			}
		}

		// remove empty fields
		foreach ( $schedule as $key => $value ) {
			if ( !$value ) {
				unset( $weeknames[$key] );
				unset( $week_ids[$key] );
			}
		}
		
	?>
		<div class="show-schedule">			
			<div class="isotope-wrap"> 
				<div class="isotope-classes-tab">
					<?php
						$count = 0;
						foreach ( $weeknames as $weekid => $weekname ) {

						$timestamp = strtotime(date("Y-m-d"));
						$day = strtolower(date('D', $timestamp));
						if( $day == $weekid ) {
							$active_class = 'current';
						} else {
							$active_class = '';
						}
					?>
						<a class="nav-item <?php echo esc_attr( $active_class );?>" data-filter=".<?php echo esc_attr( $weekid );
						?>"><span><?php echo esc_html( $weekname );?></span></a>
					<?php } ?>
				</div>
				<div class="row featuredContainer">
					<?php
						$count = 0;
					?>
					<?php foreach ( $week_ids as $key => $id ){ ?>
					<?php
						$active_class = ( $count != 0 ) ? '' : ' in active';
						$count++;

					?>
					<?php foreach ( $schedule[$key] as $value ){ ?>
						<?php
							$time = $value['start_time'];
							if ( !empty( $value['end_time'] ) ) {
								$time .=  " - {$value['end_time']}";
							}
							$currentTime = current_time('h:i a');
		                    $current_show = false;
		                    if((strtotime($currentTime) >= strtotime($value['start_time'])) && (strtotime($currentTime) <= strtotime($value['end_time'])) ) {
		                       $current_show = true;
		                    }
						?>
						<div class="col-lg-4 col-md-6 <?php echo esc_attr($key );?>">
							<div class="show-box">
								<div class="item-img">
									<?php echo get_the_post_thumbnail( $value['pid'], $thumb_size );  ?>
								</div>
								<div class="item-content">
									<?php if ( $current_show ) { ?>
		                            <div class="show-status"><?php esc_html_e ( 'Current Show' , 'fmwave' ); ?></div>
		                            <?php } ?>
									<div class="item-time">
										<div class="item-hour"><?php echo esc_html( $time );?></div>
										<div class="item-day"><?php if (array_key_exists($value['week'], $weeknames)) { echo wp_kses( $weeknames[$value['week']], 'alltext_allow'); } ?></div>
									</div>
									<h3 class="item-title"><a href="<?php echo get_the_permalink( $value['pid'] ); ?>"><?php echo esc_html( $value['show'] );?></a></h3>
									<div class="item-subtitle"><?php echo esc_html( $value['team'] );?></div>
								</div>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_postdata();
	}
}
?>