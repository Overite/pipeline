<?php
include '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    
    // Sanitize input
    $id = $conn->real_escape_string($id);

    // SQL query to delete the notification
    $sql = "DELETE FROM notification WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
