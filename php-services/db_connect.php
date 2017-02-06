<?php
function db_connect(){
	$db_array = parse_ini_file("config.ini");
	$servername = $db_array["db_server"];
	$username = $db_array["db_user"];
	$password = $db_array["db_password"];
	$dbname = $db_array["db_name"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function get_twilio_sid(){
	$ini_file = parse_ini_file("config.ini");
	return $ini_file["twilio_account_sid"];
}

function get_twilio_auth_token(){
	$ini_file = parse_ini_file("config.ini");
	return $ini_file["twilio_auth_token"];
}