<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\Fmwave\Helper;
use radiustheme\fmwave\Socials;
use radiustheme\fmwave\RDTheme;
$post_tags = '';
$post_cats = '';

$comments_number = number_format_i18n( get_comments_number() );
$comments_html = $comments_number == 1 ? esc_html__( 'Comments' , 'fmwave' ) : esc_html__( 'Comments' , 'fmwave' );
$comments_html = $comments_html . ' : <span class="comment-number">'. $comments_number .'</span>';

$time_html       = sprintf( '<span>%s</span> <span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

$fmwave_author_bio = get_the_author_meta( 'description' );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'fmwave_facebook', true );
$news_author_tw = get_user_meta( $author, 'fmwave_twitter', true );
$news_author_ld = get_user_meta( $author, 'fmwave_linkedin', true );
$news_author_gp = get_user_meta( $author, 'fmwave_gplus', true );
$news_author_pr = get_user_meta( $author, 'fmwave_pinterest', true );
$fmwave_author_designation = get_user_meta( $author, 'fmwave_author_designation', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-detail-content' ); ?>>
    <?php if ( has_post_thumbnail() ){ ?>	
        <div class="post-img">
            <?php the_post_thumbnail(); ?>
        </div>
	<?php } ?>
	
    <div class="entry-meta">
		<?php if ( !empty(has_post_thumbnail() ) ) { ?>
		<h2><?php the_title(); ?></h2>
		<?php } ?>
		<?php if ( RDTheme::$options['post_cats'] ){ ?><span><i class="fas fa-folder-open"></i><?php the_category( ', ' );?></span><?php } ?>
		<?php if ( RDTheme::$options['post_comment_num']){ ?><span><i class="far fa-comments"></i> <?php echo wp_kses( $comments_html , 'alltext_allow' ); ?></span><?php } ?>
		<?php if ( RDTheme::$options['post_tags'] && has_tag() ) { ?><span><i class="fas fa-tags"></i><?php echo get_the_term_list( get_the_ID(), 'post_tag','',',' ); ?></span><?php } ?>
	</div>
	
	<?php if ( !empty( get_the_content() ) ) { ?>
		<div class="entry-content rt-single-content"><?php the_content();?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'fmwave' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) ); ?>
		</div>
	<?php } ?>

    <div class="post-details-content">
        <div class="item-meta">
			<?php if ( RDTheme::$options['post_date'] || RDTheme::$options['post_author_name'] || RDTheme::$options['post_share'] ){ ?>
				<?php if ( RDTheme::$options['post_date'] || RDTheme::$options['post_author_name'] ) { ?>
				<div class="item-tag-area">
					<?php if ( RDTheme::$options['post_date'] ) { ?><?php echo get_the_date(); ?><?php } ?>
					<?php if ( RDTheme::$options['post_author_name'] ) { ?><span class="post-author"><?php esc_html_e( 'Post By' , 'fmwave' ); ?> <?php the_author_posts_link(); ?></span><?php } ?>
				</div>
				<?php } ?>
				<?php if ( RDTheme::$options['post_share'] && ( function_exists( 'fmwave_post_share' ) ) ) { ?>
					<div class="item-social"><label><?php esc_html_e( 'Share :', 'fmwave' );?></label><?php fmwave_post_share(); ?></div>
				<?php } ?>
			<?php } ?>
        </div>

		<?php if ( RDTheme::$options['post_author_about'] ) { ?>
		<div class="blog-author">
			<div class="media">
				<div class="item-img <?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
					<?php echo get_avatar( $author, 105 ); ?>
				</div>
				<div class="media-body">
					<h3 class="item-title"><?php esc_html_e ( 'Written by:' , 'fmwave' ); ?> <span> <?php the_author_posts_link(); ?></span></h3>
					<?php if ( $fmwave_author_bio ) { ?>
					<p><?php echo esc_html( $fmwave_author_bio );?></p>
					<?php } ?>
					
					<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_gp ) ){ ?><li><a href="<?php echo esc_attr( $news_author_gp ); ?>"><i class="fab fa-google-plus-g"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
				</ul>
				</div>
			</div>
		</div>
		<?php } ?>

        <!-- new html end -->
		<?php if ( RDTheme::$options['post_navigation'] ) {
			get_template_part( 'template-parts/content-single-pagination' );
		}
		?>
        <?php
		if ( comments_open() || get_comments_number() ){
			comments_template();
		}
		?>	
    </div>
</article>