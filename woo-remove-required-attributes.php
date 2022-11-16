<?php
// Billing and shipping addresses fields
add_filter( 'woocommerce_default_address_fields' , 'filter_default_address_fields', 20, 1 );
function filter_default_address_fields( $address_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $address_fields;

    // All field keys in this array
    $key_fields = array('country','first_name','last_name','company','address_1','address_2','city','state','postcode');

    // Loop through each address fields (billing and shipping)
    foreach( $key_fields as $key_field )
        $address_fields[$key_field]['required'] = false;

    return $address_fields;
}
