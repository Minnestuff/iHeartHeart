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

$sql = "INSERT INTO HeartData (bpm, timestamp)
VALUES ($heartRate,'$timeStamp')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
