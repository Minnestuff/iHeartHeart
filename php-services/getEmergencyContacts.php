<?php

include_once("db_connect.php");
$conn = db_connect();

$sql = "SELECT * FROM EmergencyContact";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
        $json_out[] = $row;
}
$json_data = array(
    "data"            => $json_out
);
echo json_encode($json_out);
$conn->close();
?>

