<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_api' );

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
define( 'AUTH_KEY',         'yIPAUar{FTMBaTcI4ax;L[${W6JkRkB/1Q(?9.xX*JjbB#Zze`N/uZuJg3Yq8t3g' );
define( 'SECURE_AUTH_KEY',  'pz@/(z}ZQ~Ej|#JcbAptS#ycf}gHy6Vt@&(q&aPUA|o(tnZ|[USRZNG)hDmk4Z%.' );
define( 'LOGGED_IN_KEY',    '<=H#`ps& 9O-BNa(o57j%][[5a2n7r-|B20){gk)Wb3WQk|6zZ+8nC+R@8:@gws~' );
define( 'NONCE_KEY',        '3Ms[,!?*cMRUa,n?M_i;?hR*WUK[J0a~8mR_lG}Efs~32Mqcmd870;R^lP4naE8R' );
define( 'AUTH_SALT',        'kD6`n.[%sww^KFPT/7PUHqdjbGhBS87?;6=;=muY`f_ED%/&vhny/~]`GQD?x~~{' );
define( 'SECURE_AUTH_SALT', '8hxjwm+Y&D@ ,Lh*ZlqCG^zt,o8*xGs 4D1`(&C;!E4,T`GT{|,+p<oi+Y8O$]$8' );
define( 'LOGGED_IN_SALT',   '^f@AS{&T/_2U7r IB=%7HGe+Z%m%`ubhFFzvpfr1Qn*:DrHbp]#DO`^#%g@c,0Yl' );
define( 'NONCE_SALT',       'w+Ww+?8Z,?x},@$hL&+_ODS2Yxks:9p3 >(}0Jm#of2Vmv{qB=T&cMr3Bs@%|Mcr' );

define('JWT_AUTH_SECRET_KEY', '$a#_F{[VN^zjM*9%jlKS$6-J>XNf2c|;SorG^@zvI3Ew[d?;3A*g|x%NFm.M2M %');
define('JWT_AUTH_CORS_ENABLE', true);
/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
