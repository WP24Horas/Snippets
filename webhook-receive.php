<?php
//Put in WP directory
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include ('./wp-load.php');

global $wpdb;

$json = file_get_contents('php://input');
$action = json_decode($json, true);

