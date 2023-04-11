<?php
if (class_exists('WooCommerce')) {
    add_filter('woocommerce_checkout_fields', 'teknix_remove_fields', 9999);
    add_action('wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99);
}

function grd_woocommerce_script_cleaner()
{
    // Remove the generator tag
    remove_action('wp_head', array($GLOBALS['woocommerce'], 'generator'));
    // Unless we're in the store, remove all the cruft!
    if (!is_woocommerce() && !is_cart() && !is_checkout()) {

        wp_dequeue_style('wc-block-style');
        wp_dequeue_style('woocommerce_frontend_styles');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_style('woocommerce_fancybox_styles');
        wp_dequeue_style('woocommerce_chosen_styles');
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_dequeue_script('selectWoo');
        wp_deregister_script('selectWoo');
        wp_dequeue_script('wc-add-payment-method');
        wp_dequeue_script('wc-lost-password');
        wp_dequeue_script('wc_price_slider');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-add-to-cart');
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('wc-credit-card-form');
        wp_dequeue_script('wc-checkout');
        wp_dequeue_script('wc-add-to-cart-variation');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-cart');
        wp_dequeue_script('wc-chosen');
        wp_dequeue_script('woocommerce');
        wp_dequeue_script('prettyPhoto');
        wp_dequeue_script('prettyPhoto-init');
        wp_dequeue_script('jquery-blockui');
        wp_dequeue_script('jquery-placeholder');
        wp_dequeue_script('jquery-payment');
        wp_dequeue_script('fancybox');
        wp_dequeue_script('jqueryui');
    }
}

function teknix_remove_fields($fields)
{
    // she wanted me to leave these fields in checkout
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_phone']);
    // unset( $fields['billing']['billing_email'] );
    unset($fields['order']['order_comments']); // remove order notes
    unset($fields['billing']['billing_company']); // remove company field
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']); // remove state field
    unset($fields['billing']['billing_postcode']); // remove zip code field
    return $fields;
}
