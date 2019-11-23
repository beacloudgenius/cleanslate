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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql.default.svc.cluster.local' );

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
define('AUTH_KEY',         'O&4-5Rf,=&|Ju+lkV9q5*~eaE#gu#l0T|VG#3vZ*-?S,iH6;^8-IN<8#6=Pzfw#C');
define('SECURE_AUTH_KEY',  'U8aH,MuWb4@N&<hH{.hippY.fXg3}5v#>lP@{TMlV6|TYt]+9bXbghHcXzKs-|Uc');
define('LOGGED_IN_KEY',    'aL9+(%O6CsP*.Z4eB=?P3Hj+yI2J|cOHM!gTm_+9sOYK[(4czk!7lp(mg*{nLO_h');
define('NONCE_KEY',        'voXvU{L]~i.MBF7|ussb3spawjs&Vs}6a]2aaEK}Ox&L)_(_=@w;xW)jxy-_-ZD^');
define('AUTH_SALT',        'I@AK+=Xj(FEkNUl+VrYsZg~*2s>M4!nk$.rlD|jb^Fb(mhi-ark.FFz#^n-Et^ |');
define('SECURE_AUTH_SALT', 'qz>Eym/6I i|8rn{@@Vgbh5;I!BZ^]oEQ!Bj@I9)?1=Z[C<pPdykBJtTn1g+ez55');
define('LOGGED_IN_SALT',   '*Fx RP)|dl=5smECcaMwKvRw3YTcjsbaQ0<KbV!R7GU#1PaL1^4_ZVUvXE<+#KUq');
define('NONCE_SALT',       '~D~#qS}O{l:G>(-qv2|(_|*R6: 6z+bA3^;A~ZL? hq|J-!wu!_K:Z~Y}M as{OO');

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

if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')        $_SERVER['HTTPS']='on';

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
