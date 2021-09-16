<?php

// Default Gravatar Logo change..

function wp24h_new_gravatar ($avatar_defaults) {
	$wp24h_default_logo = get_bloginfo('template_directory') . '/images/wp24h-gravatar.png';
	$avatar_defaults[$wp24h_default_logo] = "WP24H Gravatar";
	return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'wp24h_new_gravatar' );
