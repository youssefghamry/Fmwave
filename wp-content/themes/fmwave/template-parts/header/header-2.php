<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;

$nav_menu_args   = Helper::nav_menu_args();
$top_menu_args   = Helper::top_menu_args();

$socials = Helper::socials();
$menu_btn = RDTheme::$options['menu_btn_text'] || RDTheme::$options['menu_btn_link'];
$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
$rdtheme_menu_width = 10 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-lg-{$rdtheme_logo_width}";
if ( $menu_btn == true ) {
    $rdtheme_menu_width = $rdtheme_menu_width;
} else {
    $rdtheme_menu_width = $rdtheme_menu_width+2;
}
$rdtheme_menu_class = "col-lg-{$rdtheme_menu_width}";
?>
<header class="header header2-menu-fix">
    <div id="header-topbar" class="header-topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="topbar-list-item">
						<?php wp_nav_menu( $top_menu_args ); ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 d-flex justify-content-center">
                    <div class="topbar-logo">
						<?php get_template_part( 'template-parts/header/logo', 'light' ); ?>
                    </div>
                </div>
	            <?php if ( $menu_btn ){ ?>
                <div class="col-xl-4 col-lg-4 d-flex justify-content-end">
                    <div class="header-action-layout1">
                        <ul>
                            <li class="header-btn"><a href="<?php echo esc_url( RDTheme::$options['menu_btn_link'] ); ?>"><i class="fas fa-play"></i><?php echo esc_html( RDTheme::$options['menu_btn_text'] ); ?></a></li>
                        </ul>
                    </div>
                </div>
	            <?php } ?>
            </div>
        </div>
    </div>
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout2">
        <div class="container">
            <div class="menu-box">
				<div class="justify-content-start">
					<nav id="dropdown" class="template-main-menu">
						<?php wp_nav_menu( $nav_menu_args ); ?>
					</nav>
				</div>
				<div class="d-flex justify-content-end">
					<div class="header-action-layout2">
						<ul>
							<?php foreach( $socials as $social ){ ?>
							<li class="social-icon">
								<a target="_blank" href="<?php echo esc_url( $social['url'] );?>"><i class="<?php echo esc_attr( $social['icon'] );?>"></i></a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
            </div>
        </div>
    </div>
</header>