<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;

$fmwave      	= FMWAVE_THEME_PREFIX;
$cpt         	= FMWAVE_THEME_CPT_PREFIX;
$thumb_size  	= "{$fmwave}-size5";
$id             = get_the_id();

$show_name   	= get_post_meta( $id, "{$cpt}_show_name", true );
$show_date   	= get_post_meta( $id, "{$cpt}_show_date", true );
$socials       	= get_post_meta( $id, "{$cpt}_team_social", true );
$social_fields 	= Helper::team_socials();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="team-default-layout team-standard">
		<div class="team-box">
			<div class="item-img">
				<?php
					if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail( $thumb_size ); ?>
				<?php } ?>
			</div>
			<div class="content-wrap">
				<div class="item-content">
					<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<?php if( RDTheme::$options['team_arc_show'] ) { ?>
					<div class="item-subtitle"><?php echo esc_html ($show_name); ?></div>
					<?php } ?>
					<?php if( RDTheme::$options['team_arc_date'] ) { ?>
					<div class="item-time"><?php echo esc_html( $show_date ); ?></div>
					<?php } ?>
					<?php if( RDTheme::$options['team_arc_social'] ) { ?>
					<div class="item-social">
						<?php foreach ( $socials as $key => $social ) { ?>
							<?php if ( !empty( $social ) ) { ?>
								<a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
							<?php } ?>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>