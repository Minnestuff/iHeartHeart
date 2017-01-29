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

$contactName = $_POST['contact-name'];
$contactPhone = $_POST['contact-phone'];
$oldPhone = $_POST['old-phone'];


$sql = "update EmergencyContact set name = '$contactName', phone = '$contactPhone' where phone like '$oldPhone';";
echo $sql;
if(!($conn->query($sql))) {
	echo "Something went wrong";
	die();
}
$conn->close();
?>
