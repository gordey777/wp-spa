<?php
/** Enable W3 Total Cache */
define('DB_NAME', 'aloha_spa');

/** MySQL database username */
define('DB_USER', 'aloha_spa');

/** MySQL database password */
define('DB_PASSWORD', 'Fynjybj201cgf');

/** MySQL hostname */
define('DB_HOST', 'aloha.mysql.ukraine.com.ua');




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
define('AUTH_KEY',         'YQu^LML$f`iQ;B^BEde50Hg(OWGAl3}AOv*39]gxa.0!NXMj^YfE8v2R1b/yd;:9');
define('SECURE_AUTH_KEY',  ':aNb=e}eoA?.YT hhyK#ti{x`Q^Y|:TIl~D?]zoX^7{=__iZD`(]W2T.y3F(BFw6');
define('LOGGED_IN_KEY',    'iIGL01l<E{nDe=*0Vy5`ES)IN<RlLUkZj5Pb%$+,JGe/#I)%Pb{8]X%}8T`I:Du~');
define('NONCE_KEY',        'Vr:!x^CR[ASLXp&2gEHN0Sg_GE7u4y|x4-dDkFQ{cI!P0lNz[TYf+g($5$*WB5$*');
define('AUTH_SALT',        'vY5*;2=p[)9F7*wg5iz8?u$ibVx3(Q*;T%9mXUU^=pQN/y#miM#eQt;2{4P8]Gw2');
define('SECURE_AUTH_SALT', '5Qv(A&t(/BL37=np;hL9k?;30QgJt @emYN)/ e[z@8uI!WN~ypUuywN)?&zx|@;');
define('LOGGED_IN_SALT',   'ZnjY9e/GO4E,l[aK1} ZMcMb>~^`VkrDhZ!q4PP3N2XcrMhuTtWe7WsIu&n[#ba2');
define('NONCE_SALT',       'wXyr!Pv/0HB+$S$3GJX?i1-nuWk&XZeDSwxxp5G$-sv|`z`n*`^dUIsNNhnm!W?F');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'aloha_';

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
define('FORCE_SSL_ADMIN', false);
define('WP_DEBUG', false);
define( 'UPLOADS', ''.'img' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
