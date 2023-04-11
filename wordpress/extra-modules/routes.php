<?php
/*
Plugin Name: Wordpress General
Version: 1.0
Description: Set Extra Themes Folder, Optimize Wordpress, Define SMTP mail
Plugin URI: http://wordpress.stackexchange.com/questions/1507
Author: Thiện
*/

//  * @snippet Change themes
//  * @author Thien
$directory = trailingslashit('templates');
register_theme_directory($directory);

//  * @snippet Remove WP auto generare 
//  * @author Thien
add_filter('after_setup_theme', 'remove_redundant_shortlink');
function remove_redundant_shortlink()
{
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action('template_redirect', 'wp_shortlink_header', 11);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('template_redirect', 'rest_output_link_header', 11);
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', 'remove_generator');
    // remove junk from head
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_resource_hints', 2);
}

// Disable Heartbeat
// add_action('init', 'stop_heartbeat', 1);
// function stop_heartbeat()
// {
//     wp_deregister_script('heartbeat');
// }

// Allow SVG upload
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// // // Define SMTP
// define('SMTP_USER',   'thien.t@hahalolo.com');     // Username to use for SMTP authentication
// define('SMTP_PASS',   'tranthien1');                 // Password to use for SMTP authentication
// define('SMTP_HOST',   'smtp.gmail.com');            // The hostname of the mail server
// define('SMTP_FROM',   'thien.t@hahalolo.com');    // SMTP From email address
// define('SMTP_NAME',   'Zomland');                 // SMTP From name
// define('SMTP_PORT',   '465');                  // SMTP port number - likely to be 25, 465 or 587
// define('SMTP_SECURE', 'ssl');                 // Encryption system to use - ssl or tls
// define('SMTP_AUTH',    true);                 // Use SMTP authentication (true|false)
// define('SMTP_DEBUG',   0);                    // for debugging purposes only set to 1 or 2
 
// // SMTP Function
// add_action('phpmailer_init', 'send_smtp_email');
// function send_smtp_email($phpmailer)
// {
//     $phpmailer->isSMTP();
//     $phpmailer->Host       = SMTP_HOST;
//     $phpmailer->SMTPAuth   = SMTP_AUTH;
//     $phpmailer->Port       = SMTP_PORT;
//     $phpmailer->Username   = SMTP_USER;
//     $phpmailer->Password   = SMTP_PASS;
//     $phpmailer->SMTPSecure = SMTP_SECURE;
//     $phpmailer->From       = SMTP_FROM;
//     $phpmailer->FromName   = SMTP_NAME;
// }

// SMTP Function
add_action('wp_head', 'your_function_name');
function your_function_name()
{ ?>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
<?php };
