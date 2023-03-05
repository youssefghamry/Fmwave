<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
$cpt = FMWAVE_THEME_CPT_PREFIX;
$id  = get_the_id();
$thumb_size = 'fmwave-event-grid';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="col-lg-4 col-md-6">
    <div class="event-box">
        <div class="item-img">
            <?php  the_post_thumbnail( $thumb_size ); ?>
        </div>
        <div class="item-content">
			<?php if ( RDTheme::$options['event_no'] ){ ?>
            <div class="sl-number"><?php echo esc_html($args['i'] ); ?>.</div>
			<?php } ?>
            <h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php if ( RDTheme::$options['event_read'] ){ ?>
            <a href="<?php the_permalink(); ?>" class="item-btn"><?php esc_html_e('Read More' , 'fmwave'); ?></a><?php } ?>
        </div>
    </div>
</div>