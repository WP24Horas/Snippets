<?php
/*@ Add text at cart page */
//add_action('woocommerce_after_cart_table', 'tf_cart_page_custom_text');
add_action('woocommerce_before_cart_collaterals', 'wp24h_cart_page_custom_text');
 
function wp24h_cart_page_custom_text() {
 
    $message='<div class="cart-custom-message">';
        $message.='<h2>Delivery of Order</h2>';
        $message.='<p align="justify">Please note that it may take longer than usual to respond to your concern. Although the option to call us is not available during 9PM to 6AM, we are working hard to help you with your request and would like to thank you for your understanding and patience.</p>';
    $message.='</div>';
 
    echo $message;
}
