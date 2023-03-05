<?php
/**
* @author  RadiusTheme
* @since   1.0
* @version 1.0
*/

namespace radiustheme\fmwave;
$thumb_size = 'fmwave-blog-single';
$comments_number = number_format_i18n( get_comments_number() );
$comments_html  = $comments_number;
$has_entry_meta  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_date'] || RDTheme::$options['blog_cats'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['excerpt_length'] );
$content = "<p>$content</p>";

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="blog-box">
		<?php if ( has_post_thumbnail() ){ ?>
		<div class="item-img"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_post_thumbnail( $thumb_size ); ?></a></div>
		<?php } ?>
		<div class="item-content">
			<h3 class="item-title"><a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php if ( $has_entry_meta ) { ?>
				<ul class="post-meta">
					<?php if ( RDTheme::$options['blog_date'] ) { ?>
					<li><?php the_time( get_option( 'date_format' ) );?></li>
					<?php } if ( RDTheme::$options['blog_author_name'] ){ ?>
					<li><?php esc_html_e( 'Post By ', 'fmwave' );?><?php the_author_posts_link();?></li>
					<?php } if ( RDTheme::$options['blog_cats'] ){ ?>
					<li class="blog-category"><?php echo the_category( ', ' );?></li>
					<?php } ?>
				</ul>
			<?php } ?>
			<div class="blog-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
		</div>
	</div>
</div>