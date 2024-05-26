<?php
include '../database/db.php';

$sql = "SELECT id, message, timestamp, location FROM notification ORDER BY timestamp DESC";
$result = $conn->query($sql);

$notifications = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

echo json_encode($notifications);
?>