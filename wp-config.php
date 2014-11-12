<?php

/**
 * MAKING WORDPRESS TO RUN AS A SUBMODULE
 **/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

require_once(__DIR__."/local.php");

if(!isset($GLOBALS['siteTopLevelDomain'])) {
  $GLOBALS['siteTopLevelDomain'] = 'webplatform.org';
}
if(!isset($GLOBALS['wpd']['memcache_array'])){
  $GLOBALS['wpd']['memcache_array'] = array('localhost:11211');
}

define('WP_SITEURL', VHOST_URL . '/wordpress');
define('WP_HOME',    VHOST_URL);
define('WP_CONTENT_URL', VHOST_URL . '/wp-content');
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
