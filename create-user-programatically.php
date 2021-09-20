<?php

$result = wp_create_user('username', 'passwordgoeshere', 'email@example.com');
if(is_wp_error($result)){
  $error = $result->get_error_message();
  //handle error here
}else{
  $user = get_user_by('id', $result);
  //handle successful creation here
}
