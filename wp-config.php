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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'supervisa');
//define('DB_NAME', 'aaxel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '!nd!@123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=TP+hlN./eBmvV+N3y-*WP!?Ng&G;Lbam9U Gjm<^zZj1K,64>e;8 bGpZ#%I6LF');
define('SECURE_AUTH_KEY',  '}2+B=]:Y|Ck1s(%!Bd$XW0./DPZ<qt)RqmE+6C;I<L0J8w5/||)+0w?bpCF*V+c{');
define('LOGGED_IN_KEY',    'pRR~],%BK{pC^S@+vL=GQLwjleum+_e41r4|!tdj1g`a5/2V,Hl&)]oc-Wc*8V7J');
define('NONCE_KEY',        '$g]!Z4(S=Fv^6B=en+K(YL7HRoPs5a!P5dzQ7ipX&{08:mh~6%0948.2~sCX+M6C');
define('AUTH_SALT',        '#3@m)qzz|tN^YTGV==oX4+f~0:0J-QN,:G.4n@,0VP8LDw8VX,1S{y=_;uR_4IbB');
define('SECURE_AUTH_SALT', '|,1!0JAA%WfiqYO*F[5@aJ=uN|hQq<t^&{Exr( Q/nSaflLqa{u/|]PCv5lyRX).');
define('LOGGED_IN_SALT',   '(G|rW{Xd#fW|tjz,o*&_lGW.CL6eR1jY8?bA5@2?/Z#$|Iy?jckZ7^FB8gkkx!(4');
define('NONCE_SALT',       'mc]6p<c]/f<}(l{oCssb$S?NyHqPp3D d4?H[4i+XbD)e#]#TGM[gpn{^>[BG^K0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
