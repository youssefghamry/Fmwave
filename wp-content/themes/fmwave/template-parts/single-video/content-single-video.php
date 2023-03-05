<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

$cpt     = FMWAVE_THEME_CPT_PREFIX;
$prefix = FMWAVE_CORE_CPT;
$video_link       = get_post_meta( get_the_ID(), "{$prefix}_video_link", true );
global $post;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'video-single' ); ?>>
<section class="single-video-layout">
    <div class="container">
		<div class="item-img">
			<?php the_post_thumbnail(); ?>
			 <?php
            	if( !empty( $video_link  ) ) {
					wp_enqueue_style(  'magnific-popup');
					wp_enqueue_script( 'jquery-magnific-popup' );
            ?>
			<div class="video-icon">
				<a class="play-btn popup-youtube" href="<?php echo esc_url( $video_link); ?>">
					<i class="fas fa-play"></i>
				</a>
			</div>
			<?php } ?>
		</div>
		<div class="item-content">
		<?php if ( !empty(has_post_thumbnail() ) ) { ?>
		<h2 class="item-title"><?php the_title(); ?></h2>
		<?php } ?>
		   <div class="item-text"><?php the_content();?></div>
		</div>
        
    </div>
</section>
</div>