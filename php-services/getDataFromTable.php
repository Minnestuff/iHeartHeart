<?php

include_once("db_connect.php");
$conn = db_connect();

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
