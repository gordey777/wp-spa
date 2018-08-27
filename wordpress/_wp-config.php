<?php
define('WP_CACHE', true); // Added by WP Rocket
/** Enable W3 Total Cache */

// $_SERVER['HTTPS'] = 'on';
// define('FORCE_SSL_ADMIN', true);
// define('FORCE_SSL_LOGIN', true);
// define( 'WP_MEMORY_LIMIT', '256M' );
// if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
//        $_SERVER['HTTPS']='on';

// define('DB_NAME', 'aloha_spa');
// define('DB_USER', 'aloha_spa');
// define('DB_PASSWORD', 'Fynjybj201cgf');
// define('DB_HOST', 'aloha.mysql.ukraine.com.ua');

define('DB_NAME', 'aloha-spa');
define('DB_USER', 'user');
define('DB_PASSWORD', 'user');
define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', 'utf8mb4_unicode_ci');

$table_prefix  = 'aloha_';

define('AUTH_KEY',         'YQu^LML$f`iQ;B^BEde50Hg(OWGAl3}AOv*39]gxa.0!NXMj^YfE8v2R1b/yd;:9');
define('SECURE_AUTH_KEY',  ':aNb=e}eoA?.YT hhyK#ti{x`Q^Y|:TIl~D?]zoX^7{=__iZD`(]W2T.y3F(BFw6');
define('LOGGED_IN_KEY',    'iIGL01l<E{nDe=*0Vy5`ES)IN<RlLUkZj5Pb%$+,JGe/#I)%Pb{8]X%}8T`I:Du~');
define('NONCE_KEY',        'Vr:!x^CR[ASLXp&2gEHN0Sg_GE7u4y|x4-dDkFQ{cI!P0lNz[TYf+g($5$*WB5$*');
define('AUTH_SALT',        'vY5*;2=p[)9F7*wg5iz8?u$ibVx3(Q*;T%9mXUU^=pQN/y#miM#eQt;2{4P8]Gw2');
define('SECURE_AUTH_SALT', '5Qv(A&t(/BL37=np;hL9k?;30QgJt @emYN)/ e[z@8uI!WN~ypUuywN)?&zx|@;');
define('LOGGED_IN_SALT',   'ZnjY9e/GO4E,l[aK1} ZMcMb>~^`VkrDhZ!q4PP3N2XcrMhuTtWe7WsIu&n[#ba2');
define('NONCE_SALT',       'wXyr!Pv/0HB+$S$3GJX?i1-nuWk&XZeDSwxxp5G$-sv|`z`n*`^dUIsNNhnm!W?F');



define('WP_DEBUG', false);
define( 'UPLOADS', ''.'img' );
//define('WPLANG', 'ru_RU');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
