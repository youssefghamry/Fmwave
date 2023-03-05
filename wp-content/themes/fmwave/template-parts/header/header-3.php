<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
$menu_btn = RDTheme::$options['menu_btn_text'] || RDTheme::$options['menu_btn_link'] ? true : false;
$nav_menu_args   = Helper::nav_menu_args();
?>
<header class="static-header">
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout3">
        <div class="container-xl">
            <div class="menu-box">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-2 col-6">
                        <div class="header-logo">
							<?php get_template_part( 'template-parts/header/logo', 'dark' ); ?>
                        </div>
                    </div>
                    <div class="col-lg-9 d-lg-flex justify-content-center d-none">
                        <nav class="template-main-menu">
							<?php wp_nav_menu( $nav_menu_args ); ?>
                        </nav>
                    </div>
                    <div class="col-lg-1 col-6 d-flex justify-content-end">
                        <div class="header-action-layout1">
                            <ul>
                                <li class="search-icon search-icon-aash">
                                    <a href="#header-search" title="<?php esc_attr_e('Search', 'fmwave') ?>">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <div class="toggle-btn">
                                        <button class="btn-wrap offcanvas-menu-btn menu-status-open">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php get_template_part( 'template-parts/header/offcanvas' ); ?>