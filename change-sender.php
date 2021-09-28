<?php

// Function to change email address
function wp24h_sender_email( $original_email_address ) {
    return 'tim.smith@example.com';
}
 
// Function to change sender name
function wp24h_sender_name( $original_email_from ) {
    return 'Tim Smith';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wp24h_sender_email' );
add_filter( 'wp_mail_from_name', 'wp24h_sender_name' );
