<?php
	include_once("db_connect.php");
	$conn = db_connect();

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
