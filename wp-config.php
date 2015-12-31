<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'anthinh_ninhmy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'h{>jFkole5F$)8cG~kOVCv2j/]XXHO5![25|?k2`pZ!r4ED*K,Zo0w!?Cvs^agB&');
define('SECURE_AUTH_KEY',  ' uz@KWg|amE|eUn/R(}C{yBH%U5hFhXRNaoULLgfn8-.gKm}-CzwpWgq];e0+DaW');
define('LOGGED_IN_KEY',    'sQ9%q_?c.+3nzlvmn#tD9R*OiF>.l*bqB^=||:q0nbf-hFSj^,pu}sVSE&cMPaE7');
define('NONCE_KEY',        'av3`?[m5c@ZaZ$}-oOS-+6Hra4W?ELs6.3B&gvf^DyZ{>bDj};m9z&TQQ1MlN7h1');
define('AUTH_SALT',        'fU/p(#GWj#H7Jku{mm;R/mKh: H<x|9C-neh$[w~,^k6;1W>?49/WJl$M9[73^d`');
define('SECURE_AUTH_SALT', 'F8=wHR2-I/W/z$q]t`#9K+GJ|?|^_Ki:_;ya1:O|O^$q!sVJ6>hT33Q1SFZ6s3==');
define('LOGGED_IN_SALT',   'P[Pj.>0#}p~e[V8@Xd4g5dN h`yx4RH@Zux%A2|`L]u{S9#Rq=%raDg=X:s+j-jK');
define('NONCE_SALT',       'ii<Vuhv{R#a <K r`iO;1L^2KVx5(33Rp`7VSD3o{w!_-ko^wa5`I=Ur^}=7q55X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nm_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

function isMobie() {
  $uin = strtolower(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
  return (strrpos($uin, "phone") !== false ||
            strrpos($uin, "mobile") !== false ||
            strrpos($uin, "android") !== false);//ipad, mobile, android
}
