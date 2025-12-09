<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress (Docker Environment)
 *
 * Copy this file to "wp-config.php" when setting up Docker environment
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - Docker Configuration ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mfgwgjlkdw_totraips_wp641_eerone' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress_password' );

/** Database hostname */
define( 'DB_HOST', 'db:3306' );

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
define( 'AUTH_KEY',         'qa1vfoy28bmyevyrpgovsojqqmiwncfiezqbsc6mpe2mco2mubdxksd4esghhfnl' );
define( 'SECURE_AUTH_KEY',  'iddzlwx5a19toyitdwt8r7l1douhtxas188vu23tud4dpoljahvsmfkwzd29hy4c' );
define( 'LOGGED_IN_KEY',    '4adsjaqmvdsg7zxkgtxwkksfo7h0gqqfpndsl7dhs2hyfvmgcn32wmt78qji6pew' );
define( 'NONCE_KEY',        'kj6myasfyfapv7gkj3c06w2ziqbxs5irjiwtrjvdaytztumx7r4piv2esj7d5aa8' );
define( 'AUTH_SALT',        'nwpvurgnda9nx9ppzupzd0mzag1i3xuu37dtooupfbjd28wev78nhz0rckdfonry' );
define( 'SECURE_AUTH_SALT', 'dyjxeznwgacpcwzt8akzowbty9cpf1u3n2xn3wphwmscwzn9fke4idrfhov2dzkm' );
define( 'LOGGED_IN_SALT',   'd414xjpmfpzmmu5mzgpgyqdi5wsraqh4no6ktqsyxnjmbmzidy4nhfk4fm5jxrth' );
define( 'NONCE_SALT',       'vtvkr9ccutv0jrekbp0flgtvzhmqtubcyt1x3stituvspejgwqvhwi4g4dvfuzcv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wphu_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', false);

/* Add any custom values between this line and the "stop editing" line. */



define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 20 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_AUTO_UPDATE_CORE', true );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

