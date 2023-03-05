<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use \WP_Query;

$cpt     = FMWAVE_THEME_CPT_PREFIX;
$metas = get_post_meta(get_the_ID(), "{$cpt}_show_schedule", true );
$rj = array_unique( array_column($metas, 'team'));

// week names array
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
    foreach ( $metas as $meta ) {
        $schedule[$meta['week']][] = array(
            'week'        => $meta['week'],
        );
    }
}

?>
<div class="col-lg-4">
    <div class="host-details">
	    <?php
            $args = array(
                'post_type' => "{$cpt}_team",
                'post__in' => $rj
            );
            $the_query = new WP_Query( $args );
            
            if ( $the_query->have_posts() ) {
               while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $designation = get_post_meta(get_the_ID(), "{$cpt}_designation", true );
                $about = get_post_meta(get_the_ID(), "{$cpt}_about", true );
                
                $team_socials = get_post_meta(get_the_ID(), "{$cpt}_team_social", true );
                $social_fields = Helper::team_socials();
                ?>
                <div class="item-img"><?php the_post_thumbnail( 'full', ['class' => 'img-full-width'] ); ?></div>
                <div class="item-content">
                   <h3 class="item-title"><?php the_title(); ?></h3>
                   <div class="item-subtitle"><?php echo esc_html( $designation ); ?></div>
				   <?php if(!empty(the_excerpt())) { ?>
                   <p><?php echo the_excerpt(); ?></p>
				   <?php } ?>
                   <ul class="item-social">
                       <?php
                           foreach ( $team_socials as $key => $social ){
                               if ( !empty( $social ) ){ ?>
                                   <li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
                               <?php } ?>
                           <?php } ?>
                   </ul>
                </div>
            <?php }
                }
            wp_reset_postdata();
	    ?>
    </div>
</div>

<div class="col-lg-8">
    <div class="show-list">
        <?php foreach ( $metas as $meta ) { 
		$start_time = !empty( $meta['start_time'] ) ? strtotime( $meta['start_time'] ) : false;
        $end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;
		$start_time = $start_time ? date( get_option('time_format'), $start_time ) : '';
        $end_time   = $end_time ? date( get_option('time_format'), $end_time ) : '';
		?>
        <div class="media">
            <div class="show-time">
                <div class="item-label"><?php esc_html_e('Show Time', 'fmwave' ); ?></div>
                <div class="show-hour"><?php echo esc_html( $start_time ); ?> - <?php echo esc_html( $end_time ); ?></div>
            </div>
            <div class="media-body">
                <div class="show-day"><?php if (array_key_exists($meta['week'], $weeknames)) { echo esc_html($weeknames[$meta['week']]); } ?></div>
                <h3 class="item-title"><?php echo get_the_title( get_the_ID() ); ?></h3>
                <p><?php echo esc_html($meta['show_details']); ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php if( RDTheme::$options['schedule_show_related_product'] ) { ?>
<div class="col-lg-12">
    <div class="related-show">
        <?php if ( RDTheme::$options['schedule_related_title'] ) { ?>
        <div class="section-heading-1">
            <div class="heading-wrap">
                <h2 class="related-title"><?php echo wp_kses( RDTheme::$options['schedule_related_title_text'] , 'alltext_allow' );?></h2><?php } ?>
                <div class="singnal-symbol">
                    <div class="item-circle circle-1"></div>
                    <div class="item-circle circle-2"></div>
                    <div class="item-circle circle-3"></div>
                </div>
            </div>  
        </div>
		<?php echo fmwave_related_schedule(); ?>
	</div>
</div>
<?php } ?>