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
$menu_btn = RDTheme::$options['menu_btn_text'] || RDTheme::$options['menu_btn_link'];

?>
<header class="header header1">
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout22">
        <div class="container-fluid">
            <div class="menu-wrap">
                <div class="site-logo">
                    <?php get_template_part( 'template-parts/header/logo', 'dark' ); ?>
                </div>

                <div class="d-flex justify-content-end">
                    <nav id="dropdown" class="template-main-menu">
                        <?php wp_nav_menu( $nav_menu_args ); ?>
                    </nav>
                </div>

                <?php if ( RDTheme::$options['header_search'] || RDTheme::$options['header_cart'] || RDTheme::$options['header_offcanvas'] ){ ?>
                <div class="d-flex justify-content-end">
                    <div class="header-action-layout1">
                        <ul>
							<?php if ( RDTheme::$options['header_search'] == 1 ) { ?>
                            <li class="search-icon">
                                <a href="#header-search" title="<?php esc_attr_e('Search', 'fmwave') ?>">
                                    <i class="fas fa-search"></i>
                                </a>
                            </li>
							<?php } ?>
							<?php if ( RDTheme::$options['header_cart'] == 1 ) { ?>
							<li class="header-icon-area">
							<?php get_template_part( 'template-parts/header/icon', 'cart' ); ?>
							</li>
							<?php } ?>
							<?php if ( RDTheme::$options['header_offcanvas'] == 1 ) { ?>
							<li>
								<div class="toggle-btn">
									<button class="btn-wrap offcanvas-menu-btn menu-status-open">
										<span></span>
										<span></span>
										<span></span>
									</button>
								</div>
							</li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</header>
<?php get_template_part( 'template-parts/header/offcanvas' ); ?>