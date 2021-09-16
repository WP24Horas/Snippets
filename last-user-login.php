<?php
add_action('wp_login', 'set_last_login');

//function for setting the last login
function set_last_login($login) {
	$user = get_userdatabylogin($login);
	$curent_login_time = get_user_meta(	$user->ID , 'current_login', true);
	//add or update the last login value for logged in user
	if(!empty($curent_login_time)){
		update_usermeta( $user->ID, 'last_login', $curent_login_time );
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
	}else {
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
		update_usermeta( $user->ID, 'last_login', current_time('mysql') );
	}
}

function get_last_login($user_id) {
   $last_login = get_user_meta($user_id, 'last_login', true);

   $date_format = get_option('date_format') . ' ' . get_option('time_format');

   
	if(wp_is_mobile()) {
		$the_last_login = date("M j, y, g:i a", strtotime($last_login));  
	}else {
		$the_last_login = mysql2date($date_format, $last_login, false);
	}
   return $the_last_login;
}
