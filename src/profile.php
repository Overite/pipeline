<?php
include 'backend/data/User.php'; // Include the User class or any other necessary files

session_start(); // Start the session

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['email'])) {
    header('Location: login.html'); // Redirect to the login page if not logged in
    exit();
}

// Fetch user information from the database using the email
$email = $_SESSION['email'];
$user = new User();
$fetch = $user->select($email);
$row = $fetch->fetch(PDO::FETCH_ASSOC);

// Assign fetched data to variables
$id = $row['id'];
$uname = $row['user_name'];
$email = $row['email'];
$fullname = $row['full_name'];
$regdate = $row['registration_date'];
$last_login = $row['last_login'];
$active = $row['active'];
$role = $row['role'];
$admin_no = $row['admin_number'];
$region = $row['region'];
$img = $row['img'];
$bio = $row['bio'];
$lang = $row['language'];

// Fetch movement data
$movementFetch = $user->selectMovement();
if ($movementFetch) {
    $movementRow = $movementFetch->fetch(PDO::FETCH_ASSOC);
    $origin = $movementRow['origin'];
    $destination = $movementRow['destination'];
    $pms = $movementRow['pms'];
} else {
    // Handle if no data is found
    $origin = "";
    $destination = "";
    $pms = "";
}


// Handle form submission for updating origin and destination
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newOrigin = $_POST['origin'];
    $newDestination = $_POST['destination'];
    $newPms = $_POST['pms'];
    // Update the movement table with the new values
    $updateResult = $user->updateMovement($newOrigin, $newDestination, $newPms);

    if ($updateResult) {
        // Refresh the page to show the updated values
        header('Location: profile.php');
        exit();
    } else {
        $error = "Failed to update movement data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <!-- Header section -->
    <?php require 'sections/header.php'; ?>
    
    <div class="profile">
        <div class="profile_row">
            <div class="profile_left">
                <div style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
                    <img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-right: 3px;" src="server/img/<?php echo $img; ?>" alt="Profile Image">
                    <div style="flex-direction: column; gap: 1px; width: fit-content; margin-top: auto; margin-right: auto;">
                        <h2 style="font-size: 24px; font-weight: 700; color: #800E80;"><?php echo htmlspecialchars($fullname); ?></h2>
                        <div style="font-size: 16px; font-weight: 400;">
                            <span style="color: black;"><?php echo htmlspecialchars($role); ?> -</span>
                            <span style="color: #800E80;"><?php echo htmlspecialchars($email); ?></span>
                        </div>
                    </div>
                   <a href="editProfile.php"><button style="margin-bottom: auto; display: flex; align-items: center; justify-content: center; padding: 1px 5px; border-radius: 4px; background-color: #800E80; color: white;">Edit Profile</button></a> 
                </div>

                <div class="profile_left_info">
                    <!-- Other profile information here -->

                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;">
                        <span style="font-size: 16px; font-weight: 700; color: #800E80;">Admin number:</span>
                        <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; padding-bottom: 20px;"><?php echo htmlspecialchars($admin_no); ?></span>
                    </div>
                    <div style="width: 100%;" class="w-full">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Password:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]">*********</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Contact: </span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]">08169562814</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Region:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]"><?php echo htmlspecialchars($region); ?></span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Language:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-left: 1px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-[1px] border-[#800E80] pl-1"><?php echo htmlspecialchars($lang); ?></span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Bio:</span>
                            <div style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; padding: 1px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-[1px] border-[#800E80] p-1">
                                <?php echo htmlspecialchars($bio); ?>
                            </div>
                        </div>
                    </div>
                    <!-- Form to update origin and destination -->
                    <form action="profile.php" method="POST" style="margin-top: 20px;">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;">
                            <label for="origin" style="font-size: 16px; font-weight: 700; color: #800E80;">Origin:</label>
                            <input type="text" name="origin" id="origin" value="<?php echo htmlspecialchars($origin); ?>" style="width: 70%; font-size: 14px; color: #800E80; padding: 5px; border: 1px solid #800E80;">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-top: 10px;">
                            <label for="destination" style="font-size: 16px; font-weight: 700; color: #800E80;">Destination:</label>
                            <input type="text" name="destination" id="destination" value="<?php echo htmlspecialchars($destination); ?>" style="width: 70%; font-size: 14px; color: #800E80; padding: 5px; border: 1px solid #800E80;">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-top: 10px;">
                            <label for="destination" style="font-size: 16px; font-weight: 700; color: #800E80;">PMS Quality (Ltr):</label>
                            <input type="text" name="pms" id="pms" value="<?php echo $pms; ?>" style="width: 70%; font-size: 14px; color: #800E80; padding: 5px; border: 1px solid #800E80;">
                        </div>
                        <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                            <button type="submit" style="padding: 5px 10px; background-color: #800E80; color: white; border: none; border-radius: 4px;">Upload</button>
                        </div>
                        <?php if (isset($error)): ?>
                            <div style="color: red; margin-top: 10px;"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="profile_right">
                <h2 style="font-size: 20px; font-weight: 700; color: #800E80;">Settings</h2>
                <div style="width: 80%; flex-direction: column; gap: 24px;">
                    <div style="width: 100%; display: flex; gap: 1px; align-items: center; cursor: pointer;">
                        <span style="color: #800E80; width: 20px; height: 20px;">▼</span>
                        <span style="font-size: 16px; color: #800E80; font-weight: 400;">Add new tracker device</span>
                    </div>
                    <div style="width: 100%; display: flex; gap: 1px; align-items: center; justify-content: space-between;">
                        <span style="font-size: 16px; color: #800E80; font-weight: 400;">Mute notification</span>
                        <span style="width: 42px; height: 20px; display: flex; position: relative; background-color: #D7D7D7; border: 1px solid #D7D7D7; border-radius: 20px;">
                            <span style="background-color: white; position: absolute; z-index: 2; top: 0; width: 20px; height: 100%; cursor: pointer; border-radius: 50%;"></span>
                        </span>
                    </div>
                    <a href="/help" style="font-size: 16px; color: #800E80; font-weight: 400; text-decoration: none;">Help</a>
                    <span style="font-size: 16px; color: #800E80; font-weight: 400; cursor: pointer;">Logout</span>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>

</html>
