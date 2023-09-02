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
define( 'DB_NAME', 'nomad_data' );

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
define( 'AUTH_KEY',         'f4!OmnC<*? gGIq )@K!R:qdZ$9hslv|m`2Bu9vn<+M#y[q>JSlP(WHuJH|$GZI&' );
define( 'SECURE_AUTH_KEY',  '{r3}K|[9KW(jda- L?%^@Jv|^ /Uk)$FOfGY[2O1g7b;Okmy3r84l2;C=uhn6V%&' );
define( 'LOGGED_IN_KEY',    '%zmom%}m#y(rw&35-b(u<_cvY< ASuEbTb=x]0pO>cfiK3P~kwS[wVX9Z:0[]L@M' );
define( 'NONCE_KEY',        'xzftG*7<[UQ~wM-f!/1IDu DO<KH?&xp.y*Kr7><Xyn m^YgBz.>(*I6JH#{0 yP' );
define( 'AUTH_SALT',        'l*#KFF:y}qn/:xw$Nsf{xsG_@IXko5.l!8pS0:m*kh&z[@ECxeU6s3;79#v7,k<m' );
define( 'SECURE_AUTH_SALT', 'zuC<7&uT(vb)RF|^`,_(nYK6SL8!SPnet`&&X_{g|?Qe7h~h6Na>!bpGAtPk~^:z' );
define( 'LOGGED_IN_SALT',   'Qt6YB{O4;,|Op,J+Iz}y7MMiNCMPEx=o_{D*/CXvp-vdDZy9?P>O:af2f]~Np-8]' );
define( 'NONCE_SALT',       'Ap+/$(yW3FQ{@=)yf$8,!>b+sw2ZUV_i3!{,gX/0Ro(q=hYRlDWA!M-5T<[ym^H;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nm7_';

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
