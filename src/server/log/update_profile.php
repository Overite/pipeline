<?php
session_start();
require '../database/db.php';

if (!isset($_SESSION['email'])) {
    echo "User not logged in"; 
    header('Location: /src/login.html'); // Redirect to the login page if not logged in
    exit();
}

$email = $_SESSION['email'];

$fullName = isset($_POST['fullName']) ? trim($_POST['fullName']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$newEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
$contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
$role = isset($_POST['role']) ? trim($_POST['role']) : '';
$region = isset($_POST['region']) ? trim($_POST['region']) : '';
$adminNo = isset($_POST['adminNo']) ? trim($_POST['adminNo']) : '';
$language = isset($_POST['language']) ? trim($_POST['language']) : '';
$bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';

if (empty($fullName) || empty($password) || empty($newEmail) || empty($contact) || empty($role) || empty($region) || empty($adminNo) || empty($language) || empty($bio)) {
    echo "All fields are required.";
    header('Location: /src/login.html'); // Redirect to the login page if not logged in
    exit();

}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

$imagePath = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = '../img/';
    $imagePath = '1.png'; // Save the image as 1.png
    if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadDir . $imagePath)) {
        echo "Error uploading image.";
        header('Location: /src/editProfile.php'); // Redirect to the login page if not logged in
        exit();
    }
}

$query = "UPDATE admin SET full_name = ?, password = ?, email = ?, contact = ?, role = ?, region = ?, admin_number = ?, language = ?, bio = ?, img = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssssi", $fullName, $hashedPassword, $newEmail, $contact, $role, $region, $adminNo, $language, $bio, $imagePath, $adminId);

if ($stmt->execute()) {
    echo "Profile updated successfully.";
    header('Location: /src/profile.php'); // Redirect to the Profile page
    exit();
} else {
    echo "Error updating profile: " . $stmt->error;
    header('Location: /src/login.html'); // Redirect to the login page if not logged in
    exit();
}

$conn->close();
?>
