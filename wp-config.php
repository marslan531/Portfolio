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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         'sB&]@d[LTbcLYz)-WD[>ySzl~8iS>$Z-MM183anXW0}pyrK])&E=)(4DXm6~hnh=' );
define( 'SECURE_AUTH_KEY',  '>(&#O.6}o41SQR<$OBfR0JTqIlqx,fe[JfLA^Rsk2s{L?ySme*:c-,^h$BnEH4R-' );
define( 'LOGGED_IN_KEY',    'j*nAQ&I#{d>JOmzjI|s3o)oj@qi&HzD0x420HUJ^d`gFenmJ}n1x(JvQbAXgnX{k' );
define( 'NONCE_KEY',        'a)aG[nl1C[WjAi4**d2%1:IE]Y9Y_=^/P%W[;@G7tbIR6%w-rF-Dmv}nd5N*|KgA' );
define( 'AUTH_SALT',        'tS}BdR%9Z3&epwm`3S3O9]OiN;D_-a*`0)l<E}Zh1pVFD2}}<$Z :LFY2OKFe5AB' );
define( 'SECURE_AUTH_SALT', 'UKyIwtLKi=A6j*ngukvNsH/dEQL$8>7NA{O`&|nk!}&^G3wJQ>&qU[fMAfj$uAK3' );
define( 'LOGGED_IN_SALT',   '.5:7(r/K7ChQF;Y$!ho$V7Aml0&O/|7VL_=Q=y%s~Vck^/_>3nFM$ZCa2S<7_h{=' );
define( 'NONCE_SALT',       'qnhrrV~[ywfW$krI=yG@H%F7y+C:c~}QGlD,f&!c,w*-CyHRe{[/+UMvSQ?jl2SZ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
