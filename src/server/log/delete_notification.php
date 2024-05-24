<?php
// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    $notificationId = $_GET['id'];

    // Replace these variables with your database connection details
    $servername = "localhost"; // replace with your server name
    $username = "root"; // replace with your database username
    $password = ""; // replace with your database password
    $database = "u327081214_gov"; // replace with your database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to delete the notification with the specified ID
    $sql = "DELETE FROM notification WHERE id = ?";

    // Prepare and bind the parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $notificationId);

    // Execute the statement
    if ($stmt->execute()) {
        // Notification deleted successfully
        echo json_encode(['success' => true]);
    } else {
        // Error occurred while deleting the notification
        echo json_encode(['error' => 'Failed to delete notification']);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // ID parameter not provided
    echo json_encode(['error' => 'Notification ID not provided']);
}
?>
