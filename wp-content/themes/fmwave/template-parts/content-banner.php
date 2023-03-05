<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
$fmwave = FMWAVE_THEME_PREFIX_VAR;

if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$rdtheme_title = woocommerce_page_title( false );
} else if ( is_404() ) {
	$rdtheme_title = RDTheme::$options['error_page_banner'];
	$rdtheme_title = $rdtheme_title . get_search_query();
}
else if ( is_search() ) {
	$rdtheme_title = esc_html__( 'Search Results for : ', 'fmwave' ) . get_search_query();
}
else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$rdtheme_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$rdtheme_title = apply_filters( "{$fmwave}_blog_title", esc_html__( 'All Posts', 'fmwave' ) );
	}
}
else if ( is_archive() ) {
	$cpt = FMWAVE_THEME_CPT_PREFIX;
	if ( is_post_type_archive( "{$cpt}_gallery" ) ) {
		$rdtheme_title = esc_html__( 'All Gallery', 'fmwave' );
	}
	else if ( is_post_type_archive( "{$cpt}_team" ) ) {
		$rdtheme_title = esc_html__( 'All Team Member', 'fmwave' );
	}
	else if ( is_post_type_archive( "{$cpt}_podcast" ) ) {
		$rdtheme_title = esc_html__( 'All Podcast', 'fmwave' );
	}
	else {
		$rdtheme_title = get_the_archive_title();
	}
} else if (is_single()) {
	$rdtheme_title  = get_the_title();

} else {
	$id  = get_the_ID();
	$fitness_custom_page_title = get_post_meta( $id, 'fmwave_custom_page_title', true );
	if (!empty($fitness_custom_page_title)) {
		$rdtheme_title = get_post_meta( $id, 'fmwave_custom_page_title', true );
	 } else { 
		$rdtheme_title = get_the_title();	                   
 	}
}

if ( RDTheme::$bgtype == 'bgcolor' ) { ?>
	<?php if ( RDTheme::$has_banner == '1' || RDTheme::$has_banner != "off" ): ?>
		<section class="inner-page-banner bg-color">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <div class="breadcrumbs-area">
		                    <h1><?php echo wp_kses( $rdtheme_title, 'alltext_allow' );?></h1>
		                    <?php if ( RDTheme::$has_breadcrumb == '1' || RDTheme::$has_breadcrumb != "off" ){ ?>
								<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
							<?php } ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
		<?php endif; 
	} else { ?>
		<?php if ( RDTheme::$has_banner == '1' || RDTheme::$has_banner != "off" ): ?>
		<section class="inner-page-banner bg-image">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <div class="breadcrumbs-area">
		                    <h1><?php echo wp_kses( $rdtheme_title, 'alltext_allow' );?></h1>
		                    <?php if ( RDTheme::$has_breadcrumb == '1' || RDTheme::$has_breadcrumb != "off" ): ?>
								<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
							<?php endif; ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	<?php endif; 
	}
?>