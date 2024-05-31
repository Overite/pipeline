<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="styles/output.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/editprofile.css">
</head>
<body>
    <?php require 'sections/header.php';?>

    <div class="edit_profile_container">
        <div>
            <div class="edit_profile_image">
                <form id="imageUploadForm" action="server/log/upload_image.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id="profileImageInput" name="profile_image" style="display:none;">
                    <img src="assets/images/Ellipse 1.png" id="profileImage" alt="Profile Image">
                    <p>edit</p>
                </form>
            </div>
            <form id="profileForm" action="server/log/update_profile.php" method="POST">
                <fieldset class="edit_profile_form">
                    <div class="group_control">
                        <label for="fullName">Full name:</label>
                        <input type="text" id="fullName" name="fullName">
                    </div>
                    <div class="group_control ml-0">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="group_control">
                        <label for="Email">Email Address:</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="group_control ml-0">
                        <label for="contact">Contact:</label>
                        <input type="number" id="contact" name="contact">
                    </div>
                    <div class="group_control">
                        <label for="role">Role:</label>
                        <input type="text" id="role" name="role">
                    </div>
                    <div class="group_control ml-0">
                        <label for="Region">Region:</label>
                        <input type="text" id="region" name="region">
                    </div>
                    <div class="group_control">
                        <label for="AdminNo">Admin Number:</label>
                        <input type="text" id="adminNo" name="adminNo">
                    </div>
                    <div class="group_control ml-0">
                        <label for="language">Language:</label>
                        <select name="language" id="language">
                            <option value="English">English</option>
                            <option value="Hausa">Hausa</option>
                        </select>
                    </div>
                </fieldset>
                <div class="group_control-textarea">
                    <label for="bio">Bio:</label>
                    <textarea name="bio" id="bio"></textarea>
                </div>
                <div class="group_button">
                  <a href="profile.php"> <button type="button" onclick="cancelEdit()">Cancel</button></a> 
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
document.getElementById('profileImage').addEventListener('click', function() {
    document.getElementById('profileImageInput').click();
});

document.getElementById('profileImageInput').addEventListener('change', function() {
    document.getElementById('imageUploadForm').submit();
});

document.addEventListener('DOMContentLoaded', function() {
    fetch('server/log/fetch_admin_data.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            document.getElementById('fullName').value = data.full_name;
            document.getElementById('password').value = data.password;
            document.getElementById('email').value = data.email;
            document.getElementById('contact').value = data.contact;
            document.getElementById('role').value = data.role;
            document.getElementById('region').value = data.region;
            document.getElementById('adminNo').value = data.admin_number;
            document.getElementById('language').value = data.language;
            document.getElementById('bio').value = data.bio;
            document.getElementById('profileImage').src = 'server/img/' + data.img;
        });
});
</script>
<script src="main.js"></script>
</html>
