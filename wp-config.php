<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jaime_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'PEMTGIK;J9!q<9N{YkGnp`%u___c`IP2ABZJiU_J2Gsw,xzd[Qxo3j49o:k[1L`?' );
define( 'SECURE_AUTH_KEY',  'G<wSuNiodUGs+L97+2?VS]=NgJs9aY?U*c.=dJi3TRt>-?8Cnsz.isX@^|I8E??*' );
define( 'LOGGED_IN_KEY',    '@T&FF4SJC[2AF9s@7oosx;b-rz<M(}<&///RdU&S4;pFg/4o)vVgSkB_]W:vCpQs' );
define( 'NONCE_KEY',        '(KTc1?q&,:[t]I,(qqOoi}$#Y0C7rg[HUoo=_pVF::|PvDA!gQt}*P)H`c&G~19V' );
define( 'AUTH_SALT',        'SZ{ {h,a)Nz {m5f-^26P|ULsxSEsr0F:EMQ#D|H5!UN&0*Uvv6<nxJkN{ +;1WJ' );
define( 'SECURE_AUTH_SALT', 'Z>bDaG@:5dHYT _f:#7Xo;A>-Ot%kZ2$k<OLkJDgN9G#goR|_ ##Dss|638WEn:Y' );
define( 'LOGGED_IN_SALT',   '9>YdiTa9d-olKSBxM@(+|`{,7jDJjfgLV?z/[[#YHb7;Nh}:lyXe/MKy~u<AHh+2' );
define( 'NONCE_SALT',       'bP:/w}Z0Fryai4WuP>Qk`>&vdajeodyuQ8ZsfEyt6_3[V.N^3AbnVMtW2f4,z7p+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
