<?php
if (!defined('ABSPATH')) {
    exit;
}

// a helper function to lookup "env_FILE", "env", then fallback
if (!function_exists('getenv_docker')) {
    function getenv_docker($env, $default)
    {
        if ($fileEnv = getenv($env . '_FILE')) {
            return rtrim(file_get_contents($fileEnv), "\r\n");
        } else if (($val = getenv($env)) !== false) {
            return $val;
        } else {
            return $default;
        }
    }
}

//	Thiết lập Database
//------------------------------------------------------------------------------------- 
define('DB_NAME', getenv_docker('WORDPRESS_DB_NAME', 'wordpress'));                             //wordpress                        
/** MySQL database username */
define('DB_USER', getenv_docker('WORDPRESS_DB_USER', 'example username'));                      //wordpress
/** MySQL database password */
define('DB_PASSWORD', getenv_docker('WORDPRESS_DB_PASSWORD', 'example password'));              //password123!
/** MySQL hostname */
define('DB_HOST', getenv_docker('WORDPRESS_DB_HOST', 'mysql'));                                 //database-one:3306
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', getenv_docker('WORDPRESS_DB_CHARSET', 'utf8'));
/** The Database Collate type. Don't change this if in doubt. */
define('FS_METHOD','direct');
$table_prefix = getenv_docker('WORDPRESS_TABLE_PREFIX', 'wp_');


if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
    $_SERVER['HTTPS'] = 'on';
}
// (we include this by default because reverse proxying is extremely common in container environments)

if ($configExtra = getenv_docker('WORDPRESS_CONFIG_EXTRA', '')) {
    eval($configExtra);
}


define('DB_COLLATE', getenv_docker('WORDPRESS_DB_COLLATE', ''));
//------------------------------------------------------------------------------------- 
//	Thiết lập table riêng cho User
//------------------------------------------------------------------------------------- 
define('CUSTOM_USER_TABLE', $table_prefix . 'users');
define('CUSTOM_USER_META_TABLE', $table_prefix . 'usermeta');
//------------------------------------------------------------------------------------- 
//Khai báo thư mục Wordpress
//-------------------------------------------------------------------------------------

/* Move content directory */
define('WP_CONTENT_DIR', ROOT_DIR);
define('WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST']);

/* Move wpcore directory */
define('WP_SITEURL', WP_CONTENT_URL . '/' . CORE);
define('WP_HOME', WP_CONTENT_URL);

/* Move plugins directory */
define('WP_PLUGIN_DIR', ROOT_DIR . MODULES);
define('WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . MODULES);
/* Move mu-plugins directory */
define('WPMU_PLUGIN_DIR', ROOT_DIR . '/' . MUMODULES);
define('WPMU_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . MUMODULES);

//-------------------------------------------------------------------------------------
