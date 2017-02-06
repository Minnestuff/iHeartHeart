<?php
function db_connect(){
	$db_array = parse_ini_file("config.ini");
	$servername = "wordpress-site.ce9wf7481i14.us-west-2.rds.amazonaws.com";
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