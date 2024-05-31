<?php

require 'db.php';

$pi_id = $_GET['pipeid'];
$flowrate = $_GET['flo'];
$latitude = $_GET['lat'];
$longitude = $_GET['lng'];
$velocity = $_GET['vel'];
$vibration = $_GET['vib'];

// Insert data into pipe_line2137 table
$sql_pipe = "INSERT INTO pipe_line2137(pi_id, flowrate, latitude, longitude, velocity, vibration) 
             VALUES('$pi_id', '$flowrate', '$latitude', '$longitude', '$velocity', '$vibration')";

if($conn->query($sql_pipe) === FALSE) {
    echo "Error: " . $sql_pipe . "<br>" . $conn->error;
}

// Get the ID of the last inserted row in pipe_line2137 table
$pipe_insert_id = $conn->insert_id;

// Generate a random value for the log column
$log = bin2hex(random_bytes(32)); // Generates a random hex string of length 64

// Generate random values for gas_fee, transaction_fee, and block
$gas_fee = rand(100, 1000); // Example range for gas_fee
$transaction_fee = rand(50, 500); // Example range for transaction_fee
$block = rand(1, 100); // Example range for block

// Insert data into blockchain table
$sql_blockchain = "INSERT INTO blockchain(log, gas_fee, transaction_fee, block) 
                   VALUES('$log', '$gas_fee', '$transaction_fee', '$block')";

if($conn->query($sql_blockchain) === FALSE) {
    echo "Error: " . $sql_blockchain . "<br>" . $conn->error;
}

// Get the ID of the last inserted row in blockchain table
$blockchain_insert_id = $conn->insert_id;

// Reset auto increment for pipe_line2137 table
$query_pipe = "SET @num := 0";
mysqli_query($conn, $query_pipe);

$query_pipe = "UPDATE pipe_line2137 SET id = @num := (@num+1)";
mysqli_query($conn, $query_pipe);

$query_pipe = "ALTER TABLE pipe_line2137 AUTO_INCREMENT = 1";
mysqli_query($conn, $query_pipe);

// Close the database connection
mysqli_close($conn);

echo "<br>";
echo "pipe_line2137 insert ID: " . $pipe_insert_id . "<br>";
echo "blockchain insert ID: " . $blockchain_insert_id;

?>
