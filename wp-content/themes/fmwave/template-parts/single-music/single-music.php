<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use \WP_Query;

$cpt   = FMWAVE_THEME_CPT_PREFIX;

$track_image = get_post_meta(get_the_ID(), "{$cpt}_track_image", true );
$track_length = get_post_meta(get_the_ID(), "{$cpt}_track_length", true );
$album_name = get_post_meta(get_the_ID(), "{$cpt}_album_name", true );
$get_artist = get_post_meta( get_the_ID(), "{$cpt}_artist" , true );
$get_release_day = get_post_meta( get_the_ID(), "{$cpt}_release_day" , true );
$get_audio_track = get_post_meta( get_the_ID(), "{$cpt}_track" , true );
$get_produce = get_post_meta( get_the_ID(), "{$cpt}_produce" , true );
$track_no = get_post_meta( get_the_ID(), "{$cpt}_track_no" , true );
$details = get_post_meta( get_the_ID(), "{$cpt}_details" , true );

$ratting	 	= get_post_meta( get_the_ID(), "{$cpt}_track_rating" , true );
$track_rating = 5- intval( $ratting ) ;
?>
<?php if ( !empty( $track_image ) || has_post_thumbnail() ) { ?>
    <div class="col-lg-6 music-img">
        <?php if ( !empty( $track_image ) ) { ?>
        <img src="<?php echo wp_get_attachment_url( $track_image ); ?>" alt="<?php the_title_attribute(); ?>" />
        <?php } else { ?>
            the_post_thumbnail();
        <?php } ?>
    </div>
<?php } ?>
<div class="col-lg-6">
	<div class="music-content">
    <h2 class="item-title"><?php the_title(); ?><span><?php echo esc_html( $album_name ); ?></span></h2>
    <ul class="item-info">
        <?php if ( !empty($get_artist) ) { ?>
            <li><span><?php echo esc_html_e('Artist' , 'fmwave'); ?></span><?php echo esc_html( $get_artist ); ?></li>
        <?php } if ( !empty($get_release_day) ) { ?>
            <li><span><?php echo esc_html_e('Released Day' , 'fmwave'); ?></span><?php echo esc_html( $get_release_day ); ?></li>
        <?php } ?>
            <li><span><?php echo esc_html_e('Genre' , 'fmwave'); ?></span><?php
				$terms = get_the_terms( get_the_ID(), "{$cpt}_music_genre");
				if ( $terms && ! is_wp_error( $terms ) ) {
					$draught_links = array();
					foreach ( $terms as $term ) {
						$draught_links[] = $term->name;
					}
					$on_term = join( ", ", $draught_links );
					?><?php printf( esc_html__( '%s ', 'fmwave' ), esc_html( $on_term ) ); ?>
				<?php } ?></li>
		<?php if ( !empty($track_length) ) { ?>
            <li><span><?php echo esc_html_e('Music Length' , 'fmwave'); ?></span><?php echo esc_html( $track_length ); ?></li>
		<?php } if ( !empty($get_produce) ) { ?>
            <li><span><?php echo esc_html_e('Produce By' , 'fmwave'); ?></span><?php echo esc_html( $get_produce ); ?></li>
		<?php } if ( !empty($track_no) ) { ?>
            <li><span><?php echo esc_html_e('Number of Track' , 'fmwave'); ?></span><?php echo esc_html( $track_no ); ?></li>
		<?php } if ( !empty($details) ) { ?>
            <li><span><?php echo esc_html_e('Album description' , 'fmwave'); ?></span><?php echo esc_html( $details ); ?></li>
		<?php } ?>
            <li><span><?php echo esc_html_e('Reviews' , 'fmwave'); ?></span>
				<ul class="rating">
					<?php for ($i=0; $i < $ratting; $i++) { ?>
						<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
					<?php } ?>			
					<?php for ($i=0; $i < $track_rating; $i++) { ?>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<?php } ?>
				</ul>
			</li>
    </ul>
	</div>
</div>
<div class="col-12 single-music-track">
    <div class="rt-audio-player-wrap">
        <div class="container">
            <div class="player-box">
                <div class="song-name">
                    <h3 class="item-title"><span><?php the_title(); ?></span><?php esc_html( $get_artist ); ?></h3>
                </div>
                <div class="audio-player">
                    <audio class="fmwave-audio-full-track" id="player-<?php the_ID(); ?>" >
                        <source src="<?php echo wp_get_attachment_url( $get_audio_track ); ?>" type="audio/mp3">
                    </audio>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 single-related-track">
    <?php the_content(); ?>
</div>
