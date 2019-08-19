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
define( 'DB_NAME', 'u393473627_rebep' );

/** MySQL database username */
define( 'DB_USER', 'u393473627_sejaw' );

/** MySQL database password */
define( 'DB_PASSWORD', 'WeXysuVyZa' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '2lreVD$$VWsg?i,~Nv2I^lTj!WIOzuyf/]n|h}ifQ95Pd0a~[te~~4D!m7pK5Bh;' );
define( 'SECURE_AUTH_KEY',   '.ewM^*s/3lbm#y.W3{Ss$&oZ&,0pAo~GD9#OQ:g8UYu$$TdBMyQtDITn6^ql^7mX' );
define( 'LOGGED_IN_KEY',     'bh+*P2lTJ<HbPA,xpTI7AjewmpnV|`p)lZB{B}AXVBeCF,;Wf&v&Z=B%( vvk,,:' );
define( 'NONCE_KEY',         '[)9tis?+Djl=YH97Qy.iR:,e/9}ur.!9*P7#(rLdwURy#hNL_[b)V)<B^$0!the_' );
define( 'AUTH_SALT',         '%2oAiH>9l3+X.[,0*g-@pdz`TLnO#xjxP1J&bJPfVc7sJOjYA:er#}bIt=NUU^u%' );
define( 'SECURE_AUTH_SALT',  ',e+&qj?/@{zRgLa5khF*-:o4wo@.=TS6:&`9,F5KDq$vARPIB^w|aPo0N;PW<b@Q' );
define( 'LOGGED_IN_SALT',    '{#yDdG4nY>HQ<dkx?EsX^$z-vNmH3O! z&J=QcqD^)5$3oC)azN :<9&vRTN(4!U' );
define( 'NONCE_SALT',        '3DMvJ:&>La?COwty!C&A$D}/`%qiZXG1JrYd<:*xoBoAJ[,X3]7=1kJAMyLv((lk' );
define( 'WP_CACHE_KEY_SALT', 'cv~|9w`|qYY_5Q-S}#<l-*Q`CXeE !)56@Dct6FqM+n?6}2Q[+kNK0#Qx8V<j0~D' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
