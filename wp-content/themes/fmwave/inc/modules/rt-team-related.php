<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
use \WP_Query;
if( ! function_exists( 'fmwave_related_team' )){
	function fmwave_related_team(){
		$prefix = FMWAVE_CORE_CPT;
		$cpt         = FMWAVE_CORE_CPT;
		$thumb_size  = "fmwave-size-team2";
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$related_team_number = RDTheme::$options['related_team_number'];
		$query_type = RDTheme::$options['related_team_query'];
		
		$show_related_title  = get_post_meta( get_the_ID(), 'show_related_title', true );

		# Making ready to the Query ...

		$args = array(
			'post_type'				 => 'rtcpt_team',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_team_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);
		
		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			$category_ids = array();
			$categories   = get_the_category( $post_id );

			foreach( $categories as $individual_category ){
				$category_ids[] = $individual_category->term_id;
			}

			$args['category__in'] = $category_ids;
		}
		
		if( RDTheme::$options['related_team_sort'] ){

			$post_order = RDTheme::$options['related_team_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}
		
		$query = new WP_Query( $args );
	?>
		<div class="team-default-layout row team-standard no-gutters">
			<?php if ( $query->have_posts() ) :?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
					<?php
						$id            	= get_the_id();
						$show_name   	= get_post_meta( $id, "{$cpt}_show_name", true );
						$show_date   	= get_post_meta( $id, "{$cpt}_show_date", true );
						$socials       	= get_post_meta( $id, "{$cpt}_team_social", true );
						$social_fields 	= Helper::team_socials();
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
									<div class="item-subtitle"><?php echo esc_html ($show_name); ?></div>
									<div class="item-time"><?php echo esc_html( $show_date ); ?></div>
									
										<div class="item-social">
											<?php foreach ( $socials as $key => $social ) { ?>
												<?php if ( !empty( $social ) ) { ?>
													<a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
												<?php } ?>
											<?php } ?>
										</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile;?>
				<?php endif;?>
		</div>
		<?php
		wp_reset_postdata();
	}
}
?>