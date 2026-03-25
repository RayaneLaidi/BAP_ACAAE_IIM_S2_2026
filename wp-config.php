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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%f9n7Z}C=f}VRX(mDxt 1UJ4H_DlvX;QjcJqfiQqjsO_3M:40eBwP1z/)q?i9qX3' );
define( 'SECURE_AUTH_KEY',   ';u}o%5~RZxdq{& 29s+=mG#mh^D1TG3r|%c23:JQjCjCZ(x-!`P7dvS-H_2f9v<y' );
define( 'LOGGED_IN_KEY',     ':2u4 (hD7:jN I6xew)!ngz!kJ{U.JSay^AFhxDrq:oaVA(fE,<l?lu1Dmi(SaNV' );
define( 'NONCE_KEY',         'sRpeF;VBo+A17y-z2htFru;f1/CO!HzqUH*9Ka9#yo-.YWPuF_9T8_4u>|Q-B`+B' );
define( 'AUTH_SALT',         '5prl5jjT?P _&PBw`&;q])J?NNaf}7_IRd8,?.H[mZ>+h>2%o:9k* E4KM+j>zC:' );
define( 'SECURE_AUTH_SALT',  'R%vy`OJ4}XbU ;`IQ8q3eYr!@id6fwMHtlZRasd4DbR}$X5TaW~J=E7,+0_i3NT/' );
define( 'LOGGED_IN_SALT',    ')mw;;SqL1tTrwSPF;R]8r~iTXR@:N1YZ1cInTThvpBy96+u/9&Tbv59K.>(bN0|@' );
define( 'NONCE_SALT',        'u~B:fc@n=8oHJ>6OC507.c-3oq883+T4nNRcH7_Y3#j$lPD@Q#E}8b{K2<#}NpP<' );
define( 'WP_CACHE_KEY_SALT', '!L (W;wdonVPKnAG=*yfEf$QeX>Q,#IWF-6nk-]%?$NS)sAwg|m:Pt<9mC{N^3OK' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
