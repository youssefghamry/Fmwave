<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;

$fmwave      	= FMWAVE_THEME_PREFIX;
$cpt         	= FMWAVE_THEME_CPT_PREFIX;
$thumb_size  	= "fmwave-v3-b";
$id             = get_the_id();
$_designation   			= get_post_meta( $id, "{$cpt}_designation", true );
$content 					= Helper::get_current_post_content();				
$socials       				= get_post_meta( $id, "{$cpt}_team_social", true );
$social_fields 				= Helper::team_socials();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="podcast-box">
        <div class="item-img">
            <?php the_post_thumbnail( $thumb_size ); ?>
            <div class="video-icon">
                <a class="play-btn " href="<?php the_permalink();?>">
                    <i class="fa fa-volume-up"></i>
                </a>
            </div>
        </div>
        <div class="item-content">
            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        </div>
    </div>
</article>