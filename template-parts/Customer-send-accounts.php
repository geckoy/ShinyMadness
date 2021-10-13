<?php 
if (!defined('ABSPATH')) { 
	header("HTTP/1.0 404 Not Found");
	exit; }
    
    
    check_ajax_referer('accounts-send');
	parse_str($_POST['search']);
    send_account_to_customer($order_id, true);
	    