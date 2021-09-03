<?php

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'wc_custom_add_to_cart_text' ); 

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wc_custom_add_to_cart_text' ); 

function wc_custom_add_to_cart_text() {
    return __( 'Subscribe!', 'woocommerce' ); 
}
