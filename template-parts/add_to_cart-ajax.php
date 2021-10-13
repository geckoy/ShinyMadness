<?php 
if (!defined('ABSPATH')) { 
	header("HTTP/1.0 404 Not Found");
	exit; }

// Handle the ajax request here

check_ajax_referer('add_to_cart_ajax');







    $cart_key = (empty($_POST['status'])) ? '' : explode("&",$_POST['status'])[1];
    $status = ($_POST['status'] === "add") ? true : false;
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if($status)
    {   
        $product_cart_key = WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
        if ($passed_validation && $product_cart_key && 'publish' === $product_status) {

            do_action('woocommerce_ajax_added_to_cart', $product_id);
    
            $data = array(
                'status' => 'true',
                'action' => 'adding',
                'cart_key' => $product_cart_key,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
            echo wp_send_json($data);
        } else {
    
            $data = array(
                'status' => 'error',
                'action' => 'adding',
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
    
            echo wp_send_json($data);
        }
    }else
    {
        if(WC()->cart->remove_cart_item($cart_key))
        {
            $data = array(
                'status' => 'true',
                'action' => 'removing',
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
            
            echo wp_send_json($data);
        }else
        {
            $data = array(
                'status' => 'error',
                'action' => 'removing',
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
    
            echo wp_send_json($data);
        }
    }
    

          

wp_die();