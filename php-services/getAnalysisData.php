<?php
	include_once("db_connect.php");
	$conn = db_connect();

	$sql = "SELECT * FROM HeartDataRegular";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){
		$json_out[] = $row["bpm"];
	}
	echo "Heart Beat\n";
	for($i=0; $i<sizeof($json_out); $i++){
		echo $json_out[$i]."\n";
	}
	$conn->close();
?>

