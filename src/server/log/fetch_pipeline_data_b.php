<?php
// Assuming you have already established a database connection

// Include your database connection file
include '../database/db.php';

// Fetch data from the pipeline tables pipeline_2137 to pipeline_2141
$rows = array();
for ($i = 2137; $i <= 2141; $i++) {
    $tableName = 'pipeline_' . $i;
    $query = "SELECT pi_id, latitude, longitude, velocity, flowrate, vibration, timestamp FROM $tableName";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}

// Convert the data to JSON format
echo json_encode($rows);

// Close the connection
mysqli_close($conn);
?>
