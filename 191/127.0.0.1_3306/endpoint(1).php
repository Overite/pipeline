<?php 

require 'db.php';

$pi_id = $_GET['pipeid'];
$flowrate = $_GET['flo'];
$latitude = $_GET['lat'];
$longitude = $_GET['lng'];
$velocity = $_GET['vel'];
$vibration = $_GET['vib'];


$sql = "INSERT INTO pipe_line2137(pi_id,flowrate,latitude,longitude,velocity,vibration) 
	VALUES('".$pi_id."','".$flowrate."','".$latitude."','".$longitude."','".$velocity."','".$vibration."')";


if($conn->query($sql) === FALSE)
	{ echo "Error: " . $sql . "<br>" . $conn->error; }

echo "<br>";
echo $conn->insert_id;
?>
<?php
$query = "SET @num := 0";
mysqli_query($conn, $query);

$query = "UPDATE pipe_line2137 SET id = @num := (@num+1)";
mysqli_query($conn, $query);

$query = "ALTER TABLE pipe-line2137 AUTO_INCREMENT = 1";
mysqli_query($conn, $query);
?>
<?php mysqli_close($conn);?>