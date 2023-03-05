<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Fmwave' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E;V_{88+~|6G)Am}h/I.S7Y:B?bP`4TwIx 8Y3#7_!0Lj_cVdZ*vRy};q3#*~*2Y' );
define( 'SECURE_AUTH_KEY',  '+{,[HBuQ4aIjGpcCfVi{p,3Mq- #[:e_-UgS[3sTekg]M*F%Z>Jr1$%#q@(K]q3j' );
define( 'LOGGED_IN_KEY',    '7EJ3IVU4;NY)g@=iTzP0%l?m[uo.>5m{v`l}!qJP]IxzQ@Ss]zy6`*@)(Q(]e)@s' );
define( 'NONCE_KEY',        '*2hK9X?4}Hr!@C:Qu@6w(/Q6I$w5}VEe3towe]i~](JL}x9($E>7{8{|xK:yJ3i<' );
define( 'AUTH_SALT',        ']+YI=v)yf.ltVQEHu)`!IVhbuv*HBi>k!tV#;2=NP,LdiHXLH`y C0Bhe[+VZc6&' );
define( 'SECURE_AUTH_SALT', '4H4dHoBMV<130vTIL}l2Pu0!F$vkrro9MZhZ@3u@vRV;s2hZhJ-Zd}``372t9f[h' );
define( 'LOGGED_IN_SALT',   '@GEr9{8,:z}7/^BZu!{D>kOU9pI%@ rs`L]a,+*HsCmoMLipk:L#v~a.P,b#~CxO' );
define( 'NONCE_SALT',       'l6LCcdjR-A]Y;)Ul=SD.<H 9+k<DCJM;^_W5MiCiB?Vl}}kk3r|{}$$6RS=9`FD(' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_Fmwave';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
