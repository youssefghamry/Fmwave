<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

$cpt     = FMWAVE_THEME_CPT_PREFIX;

$short_detail     = get_post_meta( get_the_ID(), "{$cpt}_short_detail", true );
$video_link       = get_post_meta( get_the_ID(), "{$cpt}_video_link", true );
$start_date       = get_post_meta( get_the_ID(), "{$cpt}_start_date", true );
$start_time       = get_post_meta( get_the_ID(), "{$cpt}_event_start_time", true );
$end_date         = get_post_meta( get_the_ID(), "{$cpt}_end_date", true );
$end_time         = get_post_meta( get_the_ID(), "{$cpt}_event_end_time", true );
$location         = get_post_meta( get_the_ID(), "{$cpt}_location", true );
$address          = get_post_meta( get_the_ID(), "{$cpt}_address", true );
$phone            = get_post_meta( get_the_ID(), "{$cpt}_phone", true );
$time             = get_post_meta( get_the_ID(), "{$cpt}_time", true );
$website          = get_post_meta( get_the_ID(), "{$cpt}_website", true );
$event            = get_post_meta( get_the_ID(), "{$cpt}_event_type", true );
$seat             = get_post_meta( get_the_ID(), "{$cpt}_seat", true );
$place            = get_post_meta( get_the_ID(), "{$cpt}_place", true );
$ticket           = get_post_meta( get_the_ID(), "{$cpt}_ticket", true );
$map              = get_post_meta( get_the_ID(), "{$cpt}_map", true );

$thumb_size         = 'fmwave-blog-single';

?>

<div class="single-event-content">
	<div class="main-img">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( $thumb_size );
		} else { ?>
			<img src="<?php echo esc_url( Helper::get_img( 'blank_holder.jpg' ) ); ?>" alt="<?php the_title_attribute(); ?>" />
		<?php } ?>
		<?php
			if( !empty( $video_link  ) ) {
				wp_enqueue_style(  'magnific-popup');
				wp_enqueue_script( 'jquery-magnific-popup' );
		?>
		<div class="video-icon">
			<a class="play-btn popup-youtube" href="<?php echo esc_url( $video_link ); ?>">
				<i class="fas fa-play"></i>
			</a>
		</div>
		<?php } ?>
	</div>
	<div class="event-details">
		<h3 class="item-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
	</div>
	<div class="row">
		<div class="col-md-6">
			<ul class="event-more-info">
				<?php if ( RDTheme::$options['event_start_date'] && !empty( $start_date ) ){ ?>
                <li><span><?php esc_html_e ('Start Date' , 'fmwave' ); ?>:</span> <?php echo esc_html( $start_date ); ?></li>
				<?php } if ( RDTheme::$options['event_start_time'] && !empty( $start_time ) ){ ?>
                <li><span><?php esc_html_e ('Start Time' , 'fmwave' ); ?>:</span> <?php echo esc_html( $start_time ); ?></li>
				<?php } if ( RDTheme::$options['event_location'] && !empty( $location ) ){ ?>
				<li><span><?php esc_html_e ('Location' , 'fmwave' ); ?>:</span> <?php echo esc_html( $location ); ?></li>
				<?php } if ( RDTheme::$options['event_address'] && !empty( $address ) ){ ?>
				<li><span><?php esc_html_e ('Address' , 'fmwave' ); ?>:</span> <?php echo esc_html( $address ); ?></li>
				<?php } if ( RDTheme::$options['event_phone'] && !empty( $phone ) ){ ?>
                <li><span><?php esc_html_e ('Phone' , 'fmwave' ); ?>:</span> <?php echo esc_html( $phone ); ?></li>
				<?php } ?>
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="event-more-info">
				<?php if ( RDTheme::$options['event_end_date'] && !empty( $end_date ) ){ ?>
                <li><span><?php esc_html_e ('End Date' , 'fmwave' ); ?>:</span> <?php echo esc_html( $end_date ); ?></li>
				<?php } if ( RDTheme::$options['event_end_time'] && !empty( $end_time ) ){ ?>
                <li><span><?php esc_html_e ('End Time' , 'fmwave' ); ?>:</span> <?php echo esc_html( $end_time ); ?></li>
				<?php } if ( RDTheme::$options['event_website'] && !empty( $website ) ){ ?>
				<li><span><?php esc_html_e ('Website' , 'fmwave' ); ?>:</span> <?php echo esc_html( $website ); ?></li>
				<?php } if ( RDTheme::$options['event_type'] && !empty( $event ) ){ ?>
				<li><span><?php esc_html_e ('Event Type' , 'fmwave' ); ?>:</span> <?php echo esc_html( $event ); ?></li>
				<?php } if ( RDTheme::$options['event_seatno'] && !empty( $seat ) ){ ?>
				<li><span><?php esc_html_e ('Seat No' , 'fmwave' ); ?>:</span> <?php echo esc_html( $seat ); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<?php if ( RDTheme::$options['event_map'] && !empty( $map ) ){ ?>
	<div class="google-map-area">
		<div class="event-google-map"><?php echo wp_kses( $map, 'iframe' ); ?></div>
	</div>
	<?php } ?>
	<?php if ( RDTheme::$options['event_tickets'] && !empty( $ticket ) ){ ?>
	<div class="buy-ticket-banner">
		<h3 class="item-title"><?php echo esc_html( $location ); ?></h3>
		<div class="item-btn">
			<a href="<?php echo esc_url( $ticket ); ?>"><?php esc_html_e ('Buy Tickets' , 'fmwave'); ?></a>
		</div>
	</div>
	<?php } ?>
</div>