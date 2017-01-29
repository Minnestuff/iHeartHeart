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

