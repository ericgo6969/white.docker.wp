<?php

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	exit;
}
// Load - các thiết lập dành cho Database
//-------------------------------------------------------------------------------------
require_once('db.php');
// Load - Các thiết lập tối ưu
//-------------------------------------------------------------------------------------
require_once('optimize.php');
//-------------------------------------------------------------------------------------
//Dành chuyên cho Debug.
//-------------------------------------------------------------------------------------

if (isset($_GET['debug']) && $_GET['debug'] === 'true') :
	define('WP_DEBUG', true);
	define('WP_DEBUG_DISPLAY', true);
	define('WP_DEBUG_LOG', true);
	define('WP_DISABLE_FATAL_ERROR_HANDLER', false);
	define('SCRIPT_DEBUG', true);
endif;

//-------------------------------------------------------------------------------------
require_once ABSPATH . 'wp-settings.php';

// ALLOW_UNFILTERED_UPLOADS -------------------------------------------
define('ALLOW_UNFILTERED_UPLOADS', true);
