<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;

use radiustheme\fmwave\Helper;

require_once FMWAVE_THEME_INC_DIR . 'helper-traits/layout-trait.php';
require_once FMWAVE_THEME_INC_DIR . 'helper-traits/data-trait.php';
require_once FMWAVE_THEME_INC_DIR . 'helper-traits/resource-load-trait.php';
require_once FMWAVE_THEME_INC_DIR . 'helper-traits/custom-query-trait.php';
require_once FMWAVE_THEME_INC_DIR . 'helper-traits/icon-trait.php';
require_once FMWAVE_THEME_INC_DIR . 'helper.php';

/*modules*/
require_once FMWAVE_THEME_INC_DIR . 'modules/rt-schedule-related.php';
require_once FMWAVE_THEME_INC_DIR . 'modules/rt-show-related.php';
require_once FMWAVE_THEME_INC_DIR . 'modules/rt-team-related.php';

Helper::requires( 'class-tgm-plugin-activation.php' );
Helper::requires( 'custom-header.php' );
Helper::requires( 'tgm-config.php' );
Helper::requires( 'general.php' );
Helper::requires( 'scripts.php' );
Helper::requires( 'layout-settings.php' );

Helper::requires( 'customizer/customizer-default-data.php' );
Helper::requires( 'customizer/init.php');
Helper::requires( 'rdtheme.php' );

Helper::requires( 'lc-helper.php' );
Helper::requires( 'lc-utility.php' );

if ( class_exists( 'WooCommerce' ) ) {
Helper::requires( 'custom/functions.php', 'woocommerce' );
}