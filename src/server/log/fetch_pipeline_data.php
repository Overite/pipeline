<?php
$servername = "localhost"; // replace with your server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$database = "u327081214_gov"; // replace with your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
}

// Initialize an associative array to store data
$data = array();

// Loop through the pipeline tables
for ($i = 2137; $i <= 2141; $i++) {
    // Construct SQL query to fetch the latest record from each table
    $sql = "SELECT * FROM pipeline_" . $i . " ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the row from the result set
        $row = $result->fetch_assoc();
        // Add the row to the data array with table name as key
        if ($row) {
            $data["pipeline_" . $i] = $row;
        }
    } else {
        // Handle errors if any
        $data["pipeline_" . $i] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
