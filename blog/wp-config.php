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
define('DB_NAME', 'cp41534_blog');

/** MySQL database username */
define('DB_USER', 'cp41534_blogusers');

/** MySQL database password */
define('DB_PASSWORD', '001011111001!@#');

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
define('AUTH_KEY',         'r4genjuzhsiouypeoxybn5rdllwhhnpjoiazjz0bcwarkm1lb4wxgapon8dan48j');
define('SECURE_AUTH_KEY',  'b81yljl7nlljrdx8ihn2vydve5gqr9b0o2aqpl6rvnol3nedbpyyj3uwufc9bqaf');
define('LOGGED_IN_KEY',    'allyamsim8mhkxtrwnxjsxuql6aue5slvtdkacszb9sxd2kjrn27mzgn2gdzyqiy');
define('NONCE_KEY',        'yt64i3jev4l7r5ywsfgfd9izsmlzv1p4tggsrbg7k4hggtchy4tgao2thzmpkq9k');
define('AUTH_SALT',        'kr2tj1byzye0lr3vcdw941d86dzignvs0oltzycfmjzdt4awbfokjzvrer0znfs3');
define('SECURE_AUTH_SALT', '2s2ooqncybz0pmiegcjvnmjks9h3oxapmp7kh8cv7tnh8sc84mxlkdpwfzvpcghx');
define('LOGGED_IN_SALT',   'fwp1rcjy0z6opqrrgfng1jzzjns7buqpj155uyahbxa89audfjdknahnlrzmje8w');
define('NONCE_SALT',       'sisiybbx0l6gztps2tmlusskj2m8hjdom6dw6eg1tqqukvwmhqifquwznpszqm81');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'chap_';

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
