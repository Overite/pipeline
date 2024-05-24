<?php
// Establish database connection
$conn = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['tableName'])) {
    $tableName = $_POST['tableName'];

    // Fetch data from the specified table
    $query = "SELECT * FROM $tableName";
    $result = $conn->query($query);

    // Build HTML for table rows
    $html = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Assume the columns are same for both pipeline and tanker
            $html .= "<tr>";
            $html .= "<td style='padding: 8px;'>{$row['latitude']}</td>";
            $html .= "<td style='padding: 8px;'>{$row['longitude']}</td>";
            $html .= "<td style='padding: 8px;'>{$row['velocity']}</td>";
            $html .= "<td style='padding: 8px;'>{$row['flowrate']}</td>";
            $html .= "<td style='padding: 8px;'>{$row['vibration']}</td>";
            $html .= "<td style='padding: 8px;'>{$row['timestamp']}</td>";
            $html .= "</tr>";
        }
    } else {
        $html = "<tr><td colspan='6'>No data available</td></tr>";
    }

    // Output HTML for table rows
    echo $html;
}

$conn->close();
?>
