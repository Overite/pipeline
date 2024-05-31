<?php 
require 'db.php';

// Fetch origin and destination from movement table
$movementQuery = "SELECT origin, destination FROM movement LIMIT 1"; // Adjust the LIMIT clause based on your requirements
$movementResult = $conn->query($movementQuery);

if ($movementResult === FALSE || $movementResult->num_rows == 0) {
    die("Error fetching origin and destination: " . $conn->error);
}

$movementRow = $movementResult->fetch_assoc();
$origin = $movementRow['origin'];
$destination = $movementRow['destination'];

$tanker_id = $_GET['tankerid'];
$pms = $_GET['pms'];
$latitude = $_GET['lat'];
$longitude = $_GET['lng'];
$speed = $_GET['speed'];

// Fetch locations and calculate distances using Haversine formula
$locationQuery = "SELECT id, lat, lng, location_name FROM map_location_name";
$locationResult = $conn->query($locationQuery);

if ($locationResult === FALSE || $locationResult->num_rows == 0) {
    die("Error fetching locations: " . $conn->error);
}

$earthRadius = 6371000; // Earth radius in meters
$locationName = null;

while ($row = $locationResult->fetch_assoc()) {
    $latFrom = deg2rad($latitude);
    $lngFrom = deg2rad($longitude);
    $latTo = deg2rad($row['lat']);
    $lngTo = deg2rad($row['lng']);

    $latDelta = $latTo - $latFrom;
    $lngDelta = $lngTo - $lngFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lngDelta / 2), 2)));
    $distance = $angle * $earthRadius;

    if ($distance > 80) {
        $locationName = $row['location_name'];
        break; // Assuming we only need the first location that meets the criteria
    }
}

$sql = "INSERT INTO tanker_2137(sn, pms_level, lat, lng, speed, origin, destination, location) 
	VALUES('$tanker_id', '$pms', '$latitude', '$longitude', '$speed', '$origin', '$destination', '$locationName')";

if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "<br>";
    echo $conn->insert_id;
}

// Update id to be sequential
$query = "SET @num := 0";
mysqli_query($conn, $query);

$query = "UPDATE tanker_2137 SET id = @num := (@num+1)";
mysqli_query($conn, $query);

$query = "ALTER TABLE tanker_2137 AUTO_INCREMENT = 1";
mysqli_query($conn, $query);

mysqli_close($conn);
?>
