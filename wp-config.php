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
define('DB_NAME', 'thietkethicongnghetinh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'YU|!+fIpfn? 2k+Kl<l:_T/c0Gsb^-0VEa(vResnz?@T`l|<;yi1-D|.*`/pC~sX');
define('SECURE_AUTH_KEY',  'msPL2< #Q.,g8y2K-ZK>&^1t#Q[iNr2#0ht.&i%<XHcZ@I~M7+t5?`=UTFiEPtMK');
define('LOGGED_IN_KEY',    'xs/+3r+),#GE8j#&!)O@K{3/n^*P[o@B{K4Sxo)ySi)SptgAdW9DR><)?@O#rG <');
define('NONCE_KEY',        '&?;I!fKdAX6&ASH]=2x@q%(urNy3:v]<#|@$_6tvZ|AXV5!Qt7kfjKoTB=%J6Pje');
define('AUTH_SALT',        'bH%,E)h6N+~$6=wip%ti:Oft.NUHT/~??aA-/@*(BAoMgTfs9QxVY@*kVCpZ~_0^');
define('SECURE_AUTH_SALT', ');>heGbCUihg=;+ZGQ4o;#}3wkQ~>oF?hpJ8qSwUoXG 4!:i=?-hm2X1KW=FfPJZ');
define('LOGGED_IN_SALT',   ':-n7UWM$ocjz=xP)ZV#oJG_u5P)cy)ht,4L&d-`}Ap/992u4o-{O/0|j|*l@R^nw');
define('NONCE_SALT',       'Ra.>9!HH$O)k^CN)-@k%p7(GyWCfkI&n@m_okFq*p-L;[cVN ym`[dZ4]]F1TA]l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xzv_';

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
