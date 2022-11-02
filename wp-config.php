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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         ' H=n1?+L>R|7*F}a<R Wx.d]m W8*<qU_mwZU)tJA0rF0*6y|4G(SK|O&Yr5B1]^' );
define( 'SECURE_AUTH_KEY',  'Pw.j[l?r!LND`IywG(;*r_BhRZ<`jr=soSU?p*{~@a-Zgu+?31>V]fXw49si:kE/' );
define( 'LOGGED_IN_KEY',    '/kI.*5dDJjSO:%;h`h:* *q<__cPwhYOqKN*)d3OPHXat_90x5n1+=K8PVu.{x{H' );
define( 'NONCE_KEY',        '5SA?lDD&{^*M<~*6yRm3-)q)>j6]&RY$KwPdLTh;I`%*9.uEyNg-k}Jun4A#9[>+' );
define( 'AUTH_SALT',        'eni^jP`qZ_.Ix3H.@W8~)OJWv1jQnKb|%001:N]2Q_s7NR}zMmKY[YY-|>,LWngh' );
define( 'SECURE_AUTH_SALT', '?O#y,Zm5n@s++y>6RCNW2^g^Q(Xd0h)_:*f_s|RveC[2CRYVjE(I@CkESn>oq&BE' );
define( 'LOGGED_IN_SALT',   '*U>C^9npl/7w*8MWE8b$p 3b4{o!M%Y~|i.HSWkC5AF!|2Au3Kv#vU_<!RZF4K]2' );
define( 'NONCE_SALT',       'F*4IYQFN?gBD)L}~xx7 HJ^0:v~^,P:mXL;.9,Y]CMeLev:p6^=yh0_Y1ToD/5`l' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
