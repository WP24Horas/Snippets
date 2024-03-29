<?php
// This will take care of the Buy Product button below the external product on the Shop page.
add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_external_add_product_link' , 10, 2 );

// Remove the default WooCommerce external product Buy Product button on the individual Product page.
remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );

// Add the open in a new browser tab WooCommerce external product Buy Product button.
add_action( 'woocommerce_external_add_to_cart', 'ts_external_add_to_cart', 30 );


function ts_external_add_product_link( $link ) {
global $product;

if ( $product->is_type( 'external' ) ) {

$link = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s" target="_blank">%s</a>',
esc_url( $product->add_to_cart_url() ),
esc_attr( isset( $quantity ) ? $quantity : 1 ),
esc_attr( $product->id ),
esc_attr( $product->get_sku() ),
esc_attr( isset( $class ) ? $class : 'button product_type_external' ),
esc_html( $product->add_to_cart_text() )
);
}

return $link;
}

function ts_external_add_to_cart() {
global $product;

if ( ! $product->add_to_cart_url() ) {
return;
}

$product_url = $product->add_to_cart_url();
$button_text = $product->single_add_to_cart_text();

/**
* The code below outputs the edited button with target="_blank" added to the html markup.
*/
do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<p class="cart">
<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button button alt" target="_blank">
<?php echo esc_html($button_text ); ?></a>
</p>

<?php do_action( 'woocommerce_after_add_to_cart_button' );

}
