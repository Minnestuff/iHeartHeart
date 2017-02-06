<?php
	include_once("db_connect.php");
	$conn = db_connect();

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
