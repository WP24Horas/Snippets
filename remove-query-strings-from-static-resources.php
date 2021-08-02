<?php
//Remove Query Strings From Static Resources

//Exemple: /wp-includes/js/jquery/jquery.js?ver=1.12.4
//Result: /wp-includes/js/jquery/jquery.js

//Add Script in theme functions.php or specific plugin

function wp24h_remove_query_strings_from_static_resources( $src ) {
  if( strpos( $src, '?v=' ) ){
    $src = remove_query_arg( 'v', $src );
  }
  if( strpos( $src, '?ver=' ) ){
    $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}
add_filter( 'script_loader_src', 'wp24h_remove_query_strings_from_static_resources', 999 );
add_filter( 'style_loader_src', 'wp24h_remove_query_strings_from_static_resources', 999 );
