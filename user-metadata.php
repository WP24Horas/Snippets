<?php

/**
* Plugin Name: Very First Plugin
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Your Name Here
* Author URI: http://yourwebsiteurl.com/
**/

/**********
 * UPDATE USER META
 */

function wp24h_you_found_this_post() {
	// If it's not a logged-in user viewing this, never mind
	if( ! is_user_logged_in() ) :
		return;
	endif;

	// Set the "wp24h_found_this_page" user meta to true for the current user
	update_user_meta( get_current_user_id(), 'wp24h_found_this_post', true );	
	return '<p>You found this post!</p>';
}
// Wrap the function in a shortcode to display anywhere
add_shortcode( 'wp24h_foundme', 'wp24h_you_found_this_post' );


/**********
 * GET USER META
 */

function wp24h_inflict_nag_message_to_find_the_post() {
	// If it's not a logged-in user viewing this, never mind
	if( ! is_user_logged_in() ) :
		return;
	endif;

	// Get the "wp24h_found_this_page" user meta value for the current user
	// (as a single value, not an array) and save it to the variable $found
	$found = get_user_meta( get_current_user_id(), 'wp24h_found_this_post', true );

	// Create a JavaScript nag message unless the value of $found is true
	if( ! isset( $found ) || $found !== true ) :  
		// Don't really insert JavaScript like this, by the way, it's hacky
		echo '<script>alert( "You still need to find the post!" );</script>';
	endif;
}
// Call the function write before the <head> section closes
add_action( 'wp_head', 'wp24h_inflict_nag_message_to_find_the_post' );

/**********
 * DELETE USER META
 */

function wp24h_make_sure_user_is_haunted_by_nag_message() {
	// If it's not a logged-in user viewing this, never mind
	if( ! is_user_logged_in() ) :
		return;
	endif;

	// Delete the "wp24h_found_this_page" user meta value for the current user
	delete_user_meta( get_current_user_id(), 'wp24h_found_this_post' );
}
// Call the function at the beginning of WordPress's loading process
add_action( 'init', 'wp24h_make_sure_user_is_haunted_by_nag_message' );
