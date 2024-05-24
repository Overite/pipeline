<?php
$servername = "localhost"; // replace with your server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$database = "u327081214_gov"; // replace with your database name

// Establish database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
}

// Initialize an associative array to store data
$data = array();

// Get the list of all tables
$tables_result = $conn->query("SHOW TABLES");
$tables = [];
while ($row = $tables_result->fetch_array()) {
    $tables[] = $row[0];
}

// Loop through the tanker tables starting from tanker_2137 and above
for ($i = 2137; ; $i++) {
    $table_name = "tanker_" . $i;
    if (!in_array($table_name, $tables)) {
        break; // Stop if the table does not exist
    }

    // Construct SQL query to fetch the latest record from each table
    $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the row from the result set
        $row = $result->fetch_assoc();
        // Add the row to the data array with table name as key
        if ($row) {
            $data[$table_name] = $row;
        }
    } else {
        // Handle errors if any
        $data[$table_name] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
