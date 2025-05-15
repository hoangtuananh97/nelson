<?php
define( 'WP_CACHE', true );

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
define( 'DB_NAME', 'bds' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'SMCT6XD;CX={BBub k<!jZgp>Juk#%j7yao KiAFwhV)QIg/K)peFUJxG(w0M^(n' );
define( 'SECURE_AUTH_KEY',   'UC1yz($]R<MY7f5LAxOJw69Y0@+DPmTYC,`dN&YgY90vJ@_)!lcY.sfSQs?CJMIc' );
define( 'LOGGED_IN_KEY',     'g|5c|%W*>n^#P,>@Q1bQdGr~LN9^T:)uPZ9j2Sm)y4gnMuHhcFSh9Y9.1c;9?|<M' );
define( 'NONCE_KEY',         'p;9#qC}obV@GZ)b>l&p3 }m6+6[{7Ofd*P/|V}>78DSp YqD-<zjw+mAFr>qI]&t' );
define( 'AUTH_SALT',         'VyHNi%8-ZF0>(RRwr]]<WA,}lli.Lj@>?C_T*g!<I:<RF?0NGxi;1PbKKgMZ^w%N' );
define( 'SECURE_AUTH_SALT',  'Jcm+~pDnO[v3!%t#j1eoCirJ9:6j<#$BrfjsC&:u-`ylF)s,F.>:}+LW}bl=AZ,w' );
define( 'LOGGED_IN_SALT',    ':v|91=cYLqJa.A6^bAC4L)^AdHM qLm,-o$E|[XXz0jP;>zM`+K]X)}qfBfV]^Rk' );
define( 'NONCE_SALT',        'P_jg3/Q6m0Rh %Wnbkex=7=lWv TX$9E&,]@yYNZB/NgN7Qm,.M~Xb$aU qrL3NE' );
define( 'WP_CACHE_KEY_SALT', 'Vn;Zkz95QFrJS%{aXHEK$H@H=G:%fcfzt%js29F` 63_[0raO5]vdcU2@W .8~uv' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '8a74e6c00c9c1b6a6e9ceeff1c081a5b' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
