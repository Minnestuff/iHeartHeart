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

$sql = "SELECT * FROM HeartData";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
	$json_out[] = $row;
}
$json_data = array(
    "draw"            => intval( $_REQUEST['draw'] ),
    "recordsTotal"    => intval( $totaldata ),
    "recordsFiltered" => intval( $totalfiltered ),
    "data"            => $json_out
);
echo json_encode($json_out);
$conn->close();


?>
