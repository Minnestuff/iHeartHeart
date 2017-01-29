<?php
	$servername = "wordpress-site.ce9wf7481i14.us-west-2.rds.amazonaws.com";
	$username = "amitnandanp";
	$password = "Nandan1!";
	$dbname = "heartbeat";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$requestBody = file_get_contents('php://input');
	$requestBody = html_entity_decode($requestBody);

	$requestBody = json_decode($requestBody,true);
	$bpm = $requestBody["bpm"];
	$timestamp = $requestBody["timestamp"];
	$sql = "insert into HeartDataRegular (bpm,timestamp) values('$bpm','$timestamp');";
	error_log($sql);
	if(!$conn->query($sql)) {
		die("Incorrect query: " . $conn->connect_error);
	}
	$conn->close();
?>
