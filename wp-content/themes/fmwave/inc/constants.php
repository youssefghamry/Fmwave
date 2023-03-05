<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave\inc;

$theme_data = wp_get_theme( get_template() );
define( 'FMWAVE_THEME_VERSION',     ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' ) );
define( 'FMWAVE_THEME_AUTHOR_URI',  $theme_data->get( 'AuthorURI' ) );
define( 'FMWAVE_THEME_PREFIX',      'fmwave' );
define( 'FMWAVE_THEME_PREFIX_VAR',  'fmwave' );
define( 'FMWAVE_WIDGET_PREFIX',     'fmwave' );
define( 'FMWAVE_THEME_CPT_PREFIX',  'rtcpt' );

// DIR
define( 'FMWAVE_THEME_BASE_DIR',    get_template_directory(). '/' );
define( 'FMWAVE_THEME_INC_DIR',     FMWAVE_THEME_BASE_DIR . 'inc/' );
define( 'FMWAVE_THEME_VIEW_DIR',    FMWAVE_THEME_INC_DIR . 'views/' );
define( 'FMWAVE_THEME_PLUGINS_DIR', FMWAVE_THEME_BASE_DIR . 'inc/plugin-bundle/' );