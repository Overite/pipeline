<?php
session_start();
require '../database/db.php';

if (!isset($_SESSION['email'])) {
    echo "User not logged in";
    header('Location: /src/login.html'); // Redirect to the login page if not logged in
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT id FROM admin WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$adminData = $result->fetch_assoc();

if (!$adminData) {
    echo "Admin not found";
    header('Location: /src/login.html'); // Redirect to the login page if not logged in
    exit();
}

$adminId = $adminData['id'];

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = '../img/';
    $imagePath = '1.png'; // Save the image as 1.png
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadDir . $imagePath)) {
        $query = "UPDATE admin SET img = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $imagePath, $adminId);
        if ($stmt->execute()) {
            echo "Image uploaded successfully.";
            header('Location: /src/profile.php'); // Redirect to the login page if not logged in
            exit();
        } else {
            echo "Error updating image: " . $stmt->error;
        }
    } else {
        echo "Error moving uploaded file.";
    }
} else {
    echo "No image uploaded or upload error.";
}

$conn->close();
?>
