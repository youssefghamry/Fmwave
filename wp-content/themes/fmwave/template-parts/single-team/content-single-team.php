<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\Helper;

global $post;
$fmwave                         = FMWAVE_THEME_PREFIX;
$cpt                            = FMWAVE_THEME_CPT_PREFIX;
$thumb_size                     = "fmwave-single-team";
$id                             = get_the_id();   
$show_designation   			= get_post_meta( $id, "{$cpt}_show_designation", true );
$show_name   					= get_post_meta( $id, "{$cpt}_show_name", true );
$show_date   					= get_post_meta( $id, "{$cpt}_show_date", true );
$team_button                    = get_post_meta( $id, "{$cpt}_team_button", true );
$team_button_url                = get_post_meta( $id, "{$cpt}_team_button_url", true );
$social_fields                  = Helper::team_socials();
$team_social                        = get_post_meta( $id, "{$cpt}_team_social", true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="single-team-layout">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-6">
					<div class="item-img">
						 <?php the_post_thumbnail( $thumb_size );?>
					</div>
				</div>
				<div class="col-xl-8 col-lg-6">
					<div class="single-team-box">
						<div class="item-content">
							<?php if ($show_designation) { ?>
								<span class="item-designation"><?php echo esc_html($show_designation); ?></span>
							<?php }  ?>
							<?php if ($show_name) { ?>
								<h2 class="item-title"><?php echo esc_html($show_name); ?></h2>
							<?php }  ?>
						   <div class="item-text"><?php the_content();?></div>
						   <div class="item-meta-wrap">
						   		<?php if ($team_button) { ?>
							   	<a class="item-btn" href="<?php echo esc_html($team_button_url); ?>"><?php echo esc_html($team_button); ?></a>
							   <?php } ?>
							   	<ul class="item-meta item-social">
									<?php foreach ( $team_social as $key => $social ): ?>
										<?php if ( !empty( $social ) ): ?>
											<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
											</li>
										<?php endif; ?>
								<?php endforeach; ?>
								</ul>
						   </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if( RDTheme::$options['team_related_show'] ) { ?>
	<div class="team-related-show">
    	<div class="container">
    		<div class="section-heading-1">
	    		<div class="heading-wrap">
			    	<h2 class="related-title"><?php echo wp_kses( RDTheme::$options['team_show_related_title'] , 'alltext_allow' );?></h2>
			    	<div class="singnal-symbol">
			            <div class="item-circle circle-1"></div>
			            <div class="item-circle circle-2"></div>
			            <div class="item-circle circle-3"></div>
			        </div>
			    </div>
			</div>
		<?php echo fmwave_related_show(); ?>
		</div>
	</div>
	<?php } ?>

	<?php if( RDTheme::$options['team_related_schedule'] ) { ?>
	    <div class="team-related-schedule">
	    	<div class="container">
	    		<div class="section-heading-1">
		    		<div class="heading-wrap">
				    	<h2 class="related-title"><?php echo wp_kses( RDTheme::$options['team_schedule_related_title'] , 'alltext_allow' );?></h2>
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

	<?php if( RDTheme::$options['team_related_team'] ) { ?>
	<div class="team-related-item">
		<div class="container">
			<div class="section-heading-1">
				<div class="heading-wrap">
					<h2 class="related-title"><?php echo wp_kses( RDTheme::$options['team_related_title'] , 'alltext_allow' );?></h2>
					<div class="singnal-symbol">
			            <div class="item-circle circle-1"></div>
			            <div class="item-circle circle-2"></div>
			            <div class="item-circle circle-3"></div>
			        </div>
		    	</div>	
		    </div>
			<?php echo fmwave_related_team(); ?>
		</div>
	</div>
	<?php } ?>
</div>