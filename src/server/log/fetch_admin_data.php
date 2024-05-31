<?php
session_start();
require '../database/db.php';

if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT * FROM admin WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$adminData = $result->fetch_assoc();

if (!$adminData) {
    echo json_encode(['error' => 'Admin not found']);
    exit();
}

echo json_encode($adminData);

$conn->close();
?>
