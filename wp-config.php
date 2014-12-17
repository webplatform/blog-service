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
if(!isset($GLOBALS['wpd']['piwik_url'])){
  $GLOBALS['wpd']['piwik_url'] = null;
}
if(!isset($GLOBALS['wpd']['pagespeed_key'])){
  $GLOBALS['wpd']['pagespeed_key'] = null;
}
if(!isset($GLOBALS['wpd']['meta_robots'])){
  $GLOBALS['wpd']['meta_robots'] = null;
}
if(!isset($GLOBALS['wpd']['main_stylesheet_url'])){
  $GLOBALS['wpd']['main_stylesheet_url'] = 'https://docs.webplatform.org/w/load.php?debug=false&lang=en&modules=mediawiki.legacy.commonPrint%2Cshared%7Cmediawiki.ui.button%7Cskins.webplatform&only=styles&skin=webplatform&*';;
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
