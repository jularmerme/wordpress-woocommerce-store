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
define( 'AUTH_KEY',          '^>#evWm1NQo[?ocCdr2?A*dR|XX$[cRLD-i]?L*lokpQ>xVp#^RGUfFYR=XI;q`r' );
define( 'SECURE_AUTH_KEY',   'gw+w^xSVadgxtOkc+aZzz*CSy~7eA.|{Yp|kt$6L1b>bsCXN%xtO&Ek38G=p8^Nh' );
define( 'LOGGED_IN_KEY',     '!FL{9_*CDfi9``Pp?i+?O[r`4o271h{e&[Rp!P2=O^[r^&sRfn}&m_b{G[$.Ig*/' );
define( 'NONCE_KEY',         'b+?UI8XfOZ|D$Z9$wJGR@jTB_1;r7f,12t^N)G.{^Gl/FSX?2P3O_.B^3`fm`TuM' );
define( 'AUTH_SALT',         'xt!42FCF]g<etoLiW!]s$pt6bJPfeWrMX`zqxzWT;(WL4L9KUKRf+]wV|Ec$9v0s' );
define( 'SECURE_AUTH_SALT',  'H]%dNIu_UsoXG3~@I,U/4pni`:[bglyyZKXSc&4uh$,8tn_-L=kqMe=N9a;N/9|L' );
define( 'LOGGED_IN_SALT',    '8B@]}Q{bG:~bU$a,Rr/AoQga?OX6.zn-bWHuU]vFFiqe>67WNRx=E{glu<@u>B;T' );
define( 'NONCE_SALT',        'j=Li>S_q%+,knJ9y|N~.K57f^vPev VsVgPe.Pxt]]LE=8SD9s@CkQt0fTg]_GK5' );
define( 'WP_CACHE_KEY_SALT', '~`(tt0/~d8) phd,P$4.%,u{etm^vcm@I_UCR^r}y&I<)pj*<lnicmPg.P5=x.SN' );


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
