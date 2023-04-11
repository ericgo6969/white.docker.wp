<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'QmZXYHM2fHd0JFMwSW9+KEYqK3Mld1VYfXg4c0BVeDdoVWhufC9RU0lrZXZnWkJiaF9WRSFnWnFbe1FYSkp+dA==' );

include dirname(__FILE__) . '../../router.php';

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');
/** Location of your WordPress configuration. */
require_once(ROOT_DIR . CONFIG . '/config.php');
