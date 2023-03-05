<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;

$cpt     = FMWAVE_THEME_CPT_PREFIX;

$soundcloud         = get_post_meta( get_the_ID(), "rtcpt_soundcloud", true );
$spotify            = get_post_meta( get_the_ID(), "{$cpt}_spotify", true );
$extenal_link       = get_post_meta( get_the_ID(), "{$cpt}_extenal_link", true );
$inner_link         = get_post_meta( get_the_ID(), "{$cpt}_inner_link", true );

$podcast_category     = get_the_category( get_the_ID(), "{$cpt}_podcast_category" );

$thumb_size         = 'fmwave-blog-single';

?>
<div class="single-podcast">
	<div class="item-img">
		<?php
		if( !empty( $soundcloud  ) ) { ?>
			<?php echo wp_kses( $soundcloud,'iframe' ); ?>
		<?php }  else if ( !empty($spotify) ) { ?>
			<?php echo wp_kses(  $spotify ,'alltext_allow' ); ?>
		<?php } else if ( !empty($extenal_link)  ) { ?>
			<?php echo wp_kses(  $extenal_link ,'alltext_allow' ); ?>
		<?php } else if ( !empty($inner_link )) { ?>
			<?php echo wp_kses(  $inner_link  ,'alltext_allow' ); ?>
		<?php } else {
			if ( has_post_thumbnail() ) {
			the_post_thumbnail( $thumb_size );
		 }  } ?>
	</div>
	<div class="podcast-details">
		<h3 class="item-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
	</div>
</div>