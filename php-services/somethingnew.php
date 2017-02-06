<?php
	function detectRequestBody() {
	    $rawInput = fopen('php://input', 'r');
	    $tempStream = fopen('php://temp', 'r+');
	    stream_copy_to_stream($rawInput, $tempStream);
	    rewind($tempStream);

	    return "$tempStream";
	}
	$requestBody = file_get_contents('php://input');
	$requestBody = html_entity_decode($requestBody);
	$requestBody = json_decode($requestBody,true);
	$variable = $requestBody["message"];
	$variable = json_decode($variable,true);
	$heartRate = $variable["d"]["heartRate"];
	file_put_contents('php://stderr', print_r($heartRate,true));
	$timeStamp = $variable["ruleContent"]["updated"];
	$postData = array("heartRate" => $heartRate,"timeStamp" => $timeStamp);
	include_once("db_connect.php");
	$conn = db_connect();

	$sql = "INSERT INTO HeartData (bpm, timestamp)
	VALUES ($heartRate,'$timeStamp')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
