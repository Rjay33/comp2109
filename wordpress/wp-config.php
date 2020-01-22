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
define( 'DB_NAME', 'wordpress_comp2109' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '%RS<RVG>,bmWF$Ul!LEGMFSNfCuqH{jN{RlNQ`+<n}i/6M)a-Ur?0rs4yqvHi;5/' );
define( 'SECURE_AUTH_KEY',  '4oD<{#L);PLcdWi&:4lt,#l.L-3kxuU>CG%wUKWi5oG/zY= I;t/7t!jel;>Po!7' );
define( 'LOGGED_IN_KEY',    'fCJl:)W7fuvH&<0#W!=2bwnrM7xzT/D3-Y8ZInGbG+l[VX#|w+A(ajGq$emNT,$N' );
define( 'NONCE_KEY',        'GF1sdLS)EIuhYjq/KMf?p,o8>a{rL+SZ14BNQMrw~5G2YN.@DE8T!2lN_=,J0(%F' );
define( 'AUTH_SALT',        'd@EkV;BW[%%O+&AW{)u+w$+#_(Cd)dU0HY9EBXde&H:H$w<<Q*73(^Xmh #NPOy*' );
define( 'SECURE_AUTH_SALT', 's|zeyT|I}-j%uhl`:Hnu}S-tJ4iPs2in/(EjCT7A&*y3vFk&NQz*W3T@1_!F!BQI' );
define( 'LOGGED_IN_SALT',   'AD^I)a<Bp^uKMP#{C)OUCi`*Ng$&,)H!2}i!sCX]aA6[#J&&I8l&]sB<`IZKz0S@' );
define( 'NONCE_SALT',       'qqC$((WV;<Wl;Cr,{4R2(;G ge=Ex_cquad2z}mqDSxbSf*1X5KcGfT%dcF[bLtF' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
