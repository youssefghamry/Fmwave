<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;

$primary_color         = RDTheme::$options['primary_color']; // #ec1c24
$secondary_color       = RDTheme::$options['secondary_color']; // #bd2127

$active_menu_icon_color =RDTheme::$options['active_menu_icon_color']; // #ec1c24
$active_menu_icon_color_hover = RDTheme::$options['active_menu_icon_color_hover']; // #bd2127

/*-------------------------------------
	Typography Variable
-------------------------------------*/
$typo_body = json_decode( RDTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Roboto';
} else {
	$typo_body['font'] = $typo_body['font'];
}
$typo_menu = json_decode( RDTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Roboto';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}
$typo_heading = json_decode( RDTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Poppins';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}
$typo_h1 = json_decode( RDTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Poppins';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}
$typo_h2 = json_decode( RDTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Poppins';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}
$typo_h3 = json_decode( RDTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Poppins';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( RDTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Poppins';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( RDTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Poppins';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( RDTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Poppins';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( RDTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}

.footer-modern .footer-menu,
nav.template-main-menu > ul,
.fixed-side-menu .menu-list,
.mean-container .mean-nav,
.offcanvas-menu-wrap {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( RDTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}

h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}
<?php if (!empty($typo_h1['font'])) { ?>
h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( RDTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( RDTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. button
---------------------------------------*/
?>
.primary-color {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.secondary-color {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
.scrollup {
    background-color: <?php echo esc_html( $primary_color ); ?>;
    border: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.offscreen-navigation li.current-menu-item > a,
.offscreen-navigation li.current-menu-parent > a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .header-action-layout1 ul .search-icon a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-action-layout1 ul .header-btn a,
.rt-item-btn.rtin-style-1 a,
.video-tab-2 .rt-item-btn a,
.current-show .media .media-body .show-status,
.slider-area .slider-content .slider-btn-area a.item-btn,
.hero-content .item-btn,
.video-grid .more-video-btn .item-btn,
.hero-content-2 .item-btn,
.event-list .event-content .item-btn,
.banner-section .item-btn,
.error-page .item-btn,
.event-grid .event-box .item-btn,
.single-event .buy-ticket-banner .item-btn a,
.single-team-layout .item-meta-wrap .item-btn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.header-action-layout1 ul .header-btn a:after,
.rt-item-btn.rtin-style-1 a:after,
.slider-area .slider-content .slider-btn-area a.item-btn:after,
.hero-content .item-btn:after,
.hero-content-2 .item-btn:after,
.banner-section .item-btn:after,
.video-tab-2 .rt-item-btn a:after,
.single-team-layout .item-meta-wrap .item-btn:after {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.video-grid .more-video-btn .item-btn:hover,
.event-list .event-content .item-btn:hover,
.event-grid .event-box .item-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-search .header-search-form .search-btn:hover,
.header-search .stylish-input-group .btn:hover,
.header-search .custom-search-input .btn:hover {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.chart-box-content .chart-list > ol > li.icon-play {
  background-color: <?php echo esc_html( $primary_color ); ?> !important;
}
<?php
/*-------------------------------------
#. Slider
---------------------------------------*/
?>
.slider-area .nivo-directionNav a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.slider-layout1 .show-details {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-audio-player-wrap {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Title
---------------------------------------*/
?>
.singnal-symbol .item-circle {
    border-color: <?php echo esc_html( $primary_color ); ?>;
}
.modern-heading:after {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Music, shows, schedule, chart, video
---------------------------------------*/
?>
.upcoming-show .show-box .item-content .item-title a:hover,
.upcoming-dynamic .show-box .item-content .item-title a:hover,
.video-story .video-box-light .item-content .video-icon .play-btn,
.video-story .video-box .item-img .video-icon .play-btn,
.video-story .video-box .item-content .item-title a:hover,
.video-story .video-box .item-content .entry-meta li i,
.show-schedule .show-box .item-content .item-title a:hover,
.show-schedule .show-box .item-content .item-subtitle,
.popular-chart-box .single-music .music-duration i,
.shows-list .show-list li:hover .notify-show a,
.our-program li:hover .notify-show a,
.shows-list .show-box .item-heading .view-all-btn:hover,
.our-program .item-heading .view-all-btn:hover,
.video-grid .video-box .video-icon .play-btn,
.shows-list .show-list li .media .media-body .item-title a:hover,
.our-program li .media .media-body .item-title a:hover,
.show-schedule-tab .nav-tabs .nav-link.active,
.show-schedule-tab-2 .nav-tabs .nav-link.active,
.show-schedule-tab .tab-content .show-box .media .media-body .item-title a:hover,
.show-schedule-tab .tab-content .show-box:hover .media .media-body .item-title a:hover,
.show-schedule-tab .tab-content .show-box .media .media-body .item-subtitle,
.video-tab .tab-content .tab-pane .item-content .video-icon .play-btn,
.video-tab .nav-tabs .nav-item .item-content .video-icon .play-btn,
.video-tab .tab-content .tab-pane .item-content .item-title a:hover,
.video-tab .tab-content .tab-pane .item-content .entry-meta li i,
.video-tab-2 .tab-content .tab-pane .item-content .video-icon .play-btn,
.video-tab-2 .nav-tabs .nav-item .item-content .video-icon .play-btn,
.video-tab-2 .tab-content .tab-pane .item-content .item-title a:hover,
.event-list .event-content .item-title a:hover,
.track-list-3 .song-info .mejs-container .mejs-button:hover,
.track-list-3 .song-info .mejs-container .mejs-pause:before,
.track-list-5 .song-info .mejs-container .mejs-button,
.track-list-5 ol li .song-name a:hover,
.show-schedule-tab-2 .tab-content .show-box .show-time .time-icon,
.show-schedule-tab-2 .tab-content .show-box .show-share .share .share-icon,
.show-schedule-tab-2 .tab-content .show-box .show-share .share-icon a:hover,
.show-schedule-tab-2 .tab-content .show-box .media .media-body .item-title a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.upcoming-show .show-box .item-date,
.upcoming-dynamic .show-box .item-content .item-date,
.upcoming-dynamic .show-box .item-content .item-title:before,
.upcoming-dynamic2 .show-box .item-img .item-date .next-time,
.upcoming-dynamic2 .show-box .item-content .item-title:before,
.show-schedule .isotope-classes-tab .nav-item.current span,
.music-channel .channel-content .item-img .top-content .video-icon .mejs-controls:hover,
.popular-chart-box .single-music .mejs-container .mejs-controls:hover,
.shows-list .show-list li:hover .show-time,
.video-grid .video-box:hover,
.show-schedule-tab .nav-tabs,
.show-schedule-tab-2 .nav-tabs,
.show-schedule-tab-2 .tab-content .show-box:before,
.track-list-5 ol li:hover .song-info .mejs-container .mejs-controls {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.current-show .media .show-time .item-time,
.current-show-2 .media .show-time .item-time,
.current-show-2 .song-info .mejs-container .mejs-button,
.upcoming-dynamic2 .show-box .item-content .item-title a:hover,
.chart-box-content .chart-list > ol > li .hover-content .media .media-body .item-title a:hover,
.music-channel-3 .video-icon .mejs-container .mejs-button,
.music-channel-3 .music-box .item-content .item-album i {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.show-schedule .show-box .item-content .show-status,
.current-show-2 .song-info .mejs-container:hover .mejs-controls,
.chart-box-content .chart-list > ol > li .hover-content .mejs-controls:hover {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.show-schedule-tab .tab-content .show-box .show-share .show-status:after,
.show-schedule-tab-2 .tab-content .show-box .show-share .show-status:after {
    border-top: 80px solid <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Custom post
---------------------------------------*/
?>
.single-show .show-list .media .show-time {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.single-show .show-list .media:hover .show-time {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.podcast-box .item-content .item-title a:hover,
.event-grid .event-box .item-title a:hover,
.single-event .main-img .video-icon .play-btn {
    color: <?php echo esc_html( $primary_color ); ?>;
}
<?php 
/*-------------------------------------
#. Team
---------------------------------------*/
?>
.team-standard .team-box .item-content .item-title a:hover,
.team-modern .team-box .item-content .item-title a:hover,
.team-grid .team-item .item-content .item-title a:hover,
.team-standard .team-box .item-content .item-time,
.team-grid .team-item .item-content .item-time,
.single-team-layout .item-content .item-designation,
.team-modern-2 .team-box .item-content .item-title a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.single-team-layout .item-content .item-meta a:hover,
.team-modern-2 .team-box .item-content .item-subtitle:after {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Blog, Content
---------------------------------------*/
?>
.blog-grid-layout .blog-box .item-content .item-title a:hover,
.blog-list-layout .blog-box .item-content .item-title a:hover,
.blog-grid-layout .blog-box .item-content .post-meta li a,
.blog-list-layout .blog-box .item-content .post-meta li a,
.blog-grid-layout .blog-box .item-content .post-meta li i {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.content-area .rt-content .entry-meta span i,
.content-area .rt-content .entry-meta span a:hover,
.content-area .rt-content blockquote:before,
.content-area .rt-content .item-meta .item-tag-area a,
.content-area .rt-content .item-meta .item-social .share-links a:hover,
.thumb-pagination .post-nav a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.form-group .submit-btn,
.content-area .blog-author,
.each-comment .media-body .comment-reply-link:hover {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>
.pagination ul li:hover a, 
.pagination ul li.active a,
.pagination ul li a:hover {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Fluent form
---------------------------------------*/
?>
.fluentform .contact-form .ff-el-is-error .ff-el-form-control, 
.fluentform .contact-form.ff-el-is-error .ff-el-form-control {
    border-color: <?php echo esc_html( $primary_color ); ?>;
}
.fluentform .contact-form .ff-el-form-control:focus {
    border-color: <?php echo esc_html( $primary_color ); ?>;
}
.fluentform .contact-form .text-danger {
    color: <?php echo esc_html( $primary_color ); ?> !important;
}

.fluentform .newsletter-form .ff-btn,
.fluentform .contact-form .ff-btn {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}

.fluentform .newsletter-form .ff-btn:after {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*-------------------------------------
#. Widget
---------------------------------------*/
?>
.widget_rss ul li a:hover,
.widget_tag_cloud .tagcloud a:hover,
.widget_fmwave_posts .media .media-body .news-title a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.widget_recent_entries ul li a:before,
.widget_categories ul li a:before,
.widget_archive ul li a:before,
.widget_pages ul li a:before,
.widget_meta ul li a:before,
.widget_nav_menu ul li a:before,
.widget_recent_comments ul li a:before {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Footer and copyright
---------------------------------------*/
?>
.header-menu {
    background-color: <?php echo esc_html( RDTheme::$options['menu_bg_color'] ); ?>;
}
nav.template-main-menu > ul > li > a {
    color: <?php echo esc_html( RDTheme::$options['menu_color'] ); ?>;
}
nav.template-main-menu > ul > li > a:hover {
    color: <?php echo esc_html( RDTheme::$options['menu_hover_color'] ); ?>;
}
.menu-layout3 .menu-box nav.template-main-menu ul:first-child li.active > a {
    color: <?php echo esc_html( RDTheme::$options['menu_hover_color'] ); ?>;
}

nav.template-main-menu > ul > li ul.sub-menu, 
nav.template-main-menu > ul > li ul.children {
    background-color: <?php echo esc_html( RDTheme::$options['submenu_bg_color'] ); ?>;
}
nav.template-main-menu > ul > li ul.sub-menu li a, 
nav.template-main-menu > ul > li ul.children li a {
    color: <?php echo esc_html( RDTheme::$options['submenu_color'] ); ?>;
}

nav.template-main-menu > ul > li ul.sub-menu li a:hover, 
nav.template-main-menu > ul > li ul.children li a:hover {
    color: <?php echo esc_html( RDTheme::$options['submenu_hover_color'] ); ?>;
    background-color: <?php echo esc_html( RDTheme::$options['submenu_hoverbg_color'] ); ?>;
}
<?php
/*-------------------------------------
#. Footer and copyright
---------------------------------------*/
?>
.footer-middle .footer-box .footer-title .widget-title,
.footer-style-4 .widget_fluentform_widget .subscribe-title {
    color: <?php echo esc_html( RDTheme::$options['footer_title_color'] ); ?>;
}
footer .widgets,
footer .wp-calendar-table,
.footer-middle .footer-box p,
.footer-middle .footer-address ul li,
.footer-middle .footer-social ul li a {
    color: <?php echo esc_html( RDTheme::$options['footer_text_color'] ); ?>;
}
.footer-middle .footer-box ul.menu li a,
.footer-middle .footer-address ul li a,
.footer-middle .footer-box .item-btn {
    color: <?php echo esc_html( RDTheme::$options['footer_link_color'] ); ?>;
}
footer .widget_recent_entries ul,
footer .widget_categories ul,
footer .widget_archive ul,
footer .widget_pages ul,
footer .widget_meta ul,
footer .wp-calendar-table {
  color: <?php echo esc_html( RDTheme::$options['footer_text_color'] ); ?>;
}
footer .widget_recent_entries ul li a,
footer .widget_categories ul li a,
footer .widget_archive ul li a,
footer .widget_pages ul li a,
footer .widget_meta ul li a,
footer .widget_rss ul li a,
footer .widget_tag_cloud .tagcloud a {
  color: <?php echo esc_html( RDTheme::$options['footer_link_color'] ); ?>;
}
footer .widget_recent_entries ul li a:hover,
footer .widget_categories ul li a:hover,
footer .widget_archive ul li a:hover,
footer .widget_pages ul li a:hover,
footer .widget_meta ul li a:hover,
footer .widget_rss ul li a:hover {
  color: <?php echo esc_html( RDTheme::$options['footer_hover_color'] ); ?>;
}
.footer-middle .footer-social ul li a:hover,
.footer-middle .footer-address ul li a:hover,
.footer-middle .footer-box ul.menu li a:hover,
.footer-middle .footer-box .widget_nav_menu ul.menu li a:hover {
    color: <?php echo esc_html( RDTheme::$options['footer_hover_color'] ); ?>;
}
.footer-bottom {
    background-color: <?php echo esc_html( RDTheme::$options['copyright_bg_color'] ); ?>;
}
.footer-bottom .footer-copyright,
.footer-bottom .footer-copyright a {
    color: <?php echo esc_html( RDTheme::$options['copyright_text_color'] ); ?>;
}
.footer-bottom .footer-copyright a:hover {
    color: <?php echo esc_html( RDTheme::$options['copyright_hover_color'] ); ?>;
}
.footer-top .footer-social li a {
    color: <?php echo esc_html( RDTheme::$options['footer_icon_color'] ); ?>;
}
.footer-top .footer-social li a:hover {
    background-color: <?php echo esc_html( RDTheme::$options['footer_iconbg_hover_color'] ); ?>;
    border-color: <?php echo esc_html( RDTheme::$options['footer_iconbg_hover_color'] ); ?>;
}
.footer-style-1 .main-footer,
.footer-style-4 .main-footer {
    background-color: <?php echo esc_html( RDTheme::$options['footer_bg_color'] ); ?>;
}
.footer-style-2 {
    background-color: <?php echo esc_html( RDTheme::$options['footer_bg_color'] ); ?>;
}
.footer-style-2 .widget_nav_menu ul li a {
  color: <?php echo esc_html( RDTheme::$options['footer_link_color'] ); ?>;
}
.footer-style-2 .widget_nav_menu ul li a:hover {
	color: <?php echo esc_html( RDTheme::$options['footer_hover_color'] ); ?>;
}
.footer-style-4:before,
.footer-middle .footer-box .footer-title .widget-title:before {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-style-4 .footer-middle .upcontent .footer-about p {
	color: <?php echo esc_html( RDTheme::$options['footer_left_color'] ); ?>;
}
<?php
/*-------------------------------------
#. Woocommerce
---------------------------------------*/
?>
.woocommerce .rt-product-block .rtin-buttons-area a:hover,
.woocommerce .rt-product-block .price-title-box .rtin-title a:hover,
.woocommerce .product-details-page .post-social-sharing ul.item-social li a:hover,
.woocommerce .product-details-page .rtin-right .wistlist-compare-box a:hover,
.woocommerce-cart table.woocommerce-cart-form__contents .product-name a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.btn-addto-cart a:after,
.cart-icon-area .cart-icon-num,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.woocommerce .product-details-page .rtin-right span.price, 
.woocommerce .product-details-page .rtin-right p.price,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.woocommerce #respond input#submit.alt, 
.woocommerce #respond input#submit, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt, 
.woocommerce button.button, 
.woocommerce a.button.alt, 
.woocommerce input.button, 
.woocommerce a.button {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.woocommerce #respond input#submit.alt:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover, 
.woocommerce button.button:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce input.button:hover, 
.woocommerce a.button:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.shop-layout-style2 .item-box .item-content .rtin-price,
.shop-layout-style2 .item-box .item-content .rtin-title a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.shop-layout-style2 .item-box .item-img .btn-icons > a:hover {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Other
---------------------------------------*/
?>
.page-content-main blockquote:before {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.event-box .media,
.rt-countdown-layout3 .fmwave-countdown .countdown-section:after,
.gallery-box .gallery-content .gallery-content-inner:after {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.elementor-widget-container .stylish-input-group .input-group-addon button {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.no-results .widget-search-box .stylish-input-group .input-group-addon button,
.search-form .widget-search-box .stylish-input-group .input-group-addon button {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.no-results .widget-search-box .stylish-input-group .input-group-addon button:hover,
.search-form .widget-search-box .stylish-input-group .input-group-addon button:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.header-style-1 nav > ul > li.current-menu-item > a:before,
.header-style-1 nav > ul > li.current-menu-ancestor > a:before,
.header-style-1 nav > ul > li.current-menu-item > a:after,
.header-style-1 nav > ul > li.current-menu-ancestor > a:after,
.header-style-4 nav > ul > li.current-menu-item > a:before,
.header-style-4 nav > ul > li.current-menu-ancestor > a:before,
.header-style-4 nav > ul > li.current-menu-item > a:after,
.header-style-4 nav > ul > li.current-menu-ancestor > a:after {
	background-color: <?php echo esc_html( $active_menu_icon_color ); ?>;
}
.header-style-1 nav > ul > li.current-menu-item:hover > a:before,
.header-style-1 nav > ul > li.current-menu-ancestor:hover > a:before,
.header-style-1 nav > ul > li.current-menu-item:hover > a:after,
.header-style-1 nav > ul > li.current-menu-ancestor:hover > a:after,
.header-style-4 nav > ul > li.current-menu-item:hover > a:before,
.header-style-4 nav > ul > li.current-menu-ancestor:hover > a:before,
.header-style-4 nav > ul > li.current-menu-item:hover > a:after,
.header-style-4 nav > ul > li.current-menu-ancestor:hover > a:after {
	background-color: <?php echo esc_html( $active_menu_icon_color_hover ); ?>;
}
.rt-countdown-layout1 .fmwave-countdown .countdown-section .countdown-number {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.fluentform .newsletter-form .ff-btn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}