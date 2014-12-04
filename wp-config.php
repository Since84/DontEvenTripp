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

if (strpos($_SERVER['HTTP_HOST'], 'detp.boom') !== false) { 

	define('DB_NAME', 'detp');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'galaxy1');

} elseif (strpos($_SERVER['HTTP_HOST'], 'donteventripp.com') !== false) { 

	/** The name of the database for WordPress */
	define('DB_NAME', 'donteven_detp');

	/** MySQL database username */
	define('DB_USER', 'donteven_detp');

	/** MySQL database password */
	define('DB_PASSWORD', '(Pi4@S79nX');


}

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '.{LOB)ej=2DA.4$PDx2qDLe{(7>r8Op@*F}Bd[}.Fp[-SN 6p6z+s+~Nrb7%}nQo');
define('SECURE_AUTH_KEY',  '?+MT2yS|9mSS|O*@1I5*?/>1dU]vpt^=IyldYD=Yvd}c=h/+(0zPM4AF`uHc4x/S');
define('LOGGED_IN_KEY',    'rd+UNfGY_9+nA+lR =fI7@$WJg)dpuHB1v`%ZW3;xc]AI+kcs}^|Z+eD;f+MLl),');
define('NONCE_KEY',        'CwyMDJ|.A^%PusmGVP5J7KrMARrrTSXqx-P^AU3-=m|Q-!hw^: 8T!l Lv B{1 G');
define('AUTH_SALT',        '+NN_rfN$Dv8F]d9XyOp(,I9v3&w288Qu-=E`|9@RsHIonP0,Q3@.Rg0tzlhMmnw+');
define('SECURE_AUTH_SALT', 'a 5IT6b-u%IN^g$-AE{Bb;><p%&!6DU`Lyw`42(y;a{+vx&:rSc?.YE{_ct5tz%[');
define('LOGGED_IN_SALT',   ' Ys[Mg=z`Q5+FM%Ct~&4BR636Oue 4-lJ6a*HW.82|[c=4N8-~2=~pJ]7o72%.)?');
define('NONCE_SALT',       'EN6I)BUN=WX`-af.v*_ht;qs#XBQqnq;G nO_s~Wvq+p0o^D|_5v||[veMrW;s$~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'eup_';

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

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
