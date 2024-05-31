<?php
// Assuming you have already established a database connection

// Include your database connection file
include '../database/db.php';

// Fetch last 10 data entries from the tanker_2137 table
$query = "SELECT sn, lat, lng, speed, pms_level, location, Timestamp FROM tanker_2137 ORDER BY Timestamp DESC LIMIT 10";
$result = mysqli_query($conn, $query);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    // Add 1 hour to the timestamp
    $row['Timestamp'] = date('Y-m-d H:i:s', strtotime($row['Timestamp'] . '+1 hour'));
    $rows[] = $row;
}

// Convert the data to JSON format
echo json_encode($rows);

// Close the connection
mysqli_close($conn);
?>
