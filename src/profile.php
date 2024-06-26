<?php
// session_start();
include 'backend/data/User.php';
// if (!isset($_SESSION['email'])) {
//     header("location:../index.html");
// }
$email ="dukegift101@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="">
    <?php
    $user = new User();
    $fetch = $user->select($email);
    $row = $fetch->fetch();
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

    ?>
    <header class="dashboard_header">
        <div class="dashboard_header_bar">
            <span class="w-28 h-20">
                <img src="./assets/icons/atpvdms.png" class="w-full h-full" aria-label="ATPVDMS logo" alt="ATPVDMS logo">
            </span>

            <div class="dashboard_headers_images">
                <img class="w-28 h-10 bg-white object-contain" src="assets/images/tetfund_co_support_img.png" aria-label="tetfund co-support logo" alt="tetfund co-support logo" />
                <img class="w-28 h-10 bg-white object-contain" src="assets/images/tetfund_img.png" aria-label="tetfund logo" alt="tetfund logo" />
            </div>

            <!-- List -->
            <ul class="dashboard_navItem">
                <li class="cursor-pointer flex items-center">
                    <a href="/src/dashboard.html" style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;">dashboard</a>
                </li>
                <li class="cursor-pointer flex items-center" style="margin-right:30px;">
                    <a style="margin-right:10px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="/src/log.html">log</a>
                    <div class="dashboard_header_icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>

                </li>
                <li class="cursor-pointer flex items-center">
                    <a style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="./profile.html">profile</a>
                </li>
                <li class="cursor-pointer flex items-center">
                    <a style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="">blockchain</a>
                </li>
                <li class="cursor-pointer flex items-center dashboard_list">
                    <a style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="">maps</a>
                    <div class="dashboard_header_icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </li>
                <div class="dashboard_dropdown_map">
                    <li><a href="">tracker</a></li>
                    <li><a href="">pipeline</a></li>
                </div>
                <!-- <li class="cursor-pointer flex items-center">
                    <a class="text-2xl font-normal capitalize" href="">dashboard</a>
                </li> -->
            </ul>
            <!-- End of List -->

            <!-- User -->
            <div class="flex items-center gap-24">
                <!-- Notification Icon -->
                <span class="w-20 h-20 relative">
                    <!-- Insert Notification icon here -->
                    <a href="./notification.html" class="">
                        <!-- Insert Active_Indicator component here -->
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                    <span class="absolute top-0 right-0">
                        <!-- Insert Active component here -->
                    </span>
                </span>

                <!-- User Avatar -->
                <img class="w-32 h-32 rounded-full cursor-pointer" src="assets/images/avatar.png" alt="" />

                <!-- User Information -->
                <div class="active:scale-90 dashboard_header_userinfo">
                    <span class="text-center text-[14px] text-[#800E80] font-normal"><?php echo $fullname ?></span>
                    <span class="text-12 text-[#800E80] font-bold"><?php echo $fullname ?>/span>

                        <!-- Dropdown list -->
                        <div class="dashboard_header_dropdown">
                            <a class="border-b-1 border-white text-white text-16 font-bold py-3 px-25 capitalize flex items-center justify-between" href="">
                                <!-- Insert Download icon here -->
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <span>Download</span>
                            </a>
                            <a class="border-b-1 border-white text-white text-16 font-bold py-3 px-25 capitalize" href="">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <span>Share</span>
                            </a>
                        </div>
                        <!-- End of Dropdown list -->
                </div>
                <!-- End of User Information -->
            </div>
            <div class="dashboard_header_menu">
                <i id="menu-icon" class="fa fa-bars" aria-hidden="true"></i>
                <nav id="nav-links" class="hidden">
                    <ul class="">
                        <li><a href="./dashboard.html">dashboard</a></li>
                        <li><a href="./log.html">log</a></li>
                        <li><a href="./profile.html">profile</a></li>
                        <li><a href="">map</a></li>
                    </ul>
                    <!-- <div class="close">
                        <i id="close-icon" class="fa fa-times" aria-hidden="true"></i>
                    </div> -->
                </nav>
            </div>
            <!-- End of User -->
        </div>
    </header>
    <div class="profile">
        <div class="profile_row">
            <div class="profile_left">
                <div style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
                    <img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-right: 3px;" src="assets/images/Ellipse 1.png" alt="">
                    <div style="flex-direction: column; gap: 1px; width: fit-content; margin-top: auto; margin-right: auto;">
                        <h2 style="font-size: 24px; font-weight: 700; color: #800E80;"><?php echo $fullname ?></h2>
                        <div style="font-size: 16px; font-weight: 400;">
                            <span style="color: black;"><?php echo $fullname ?> -</span>
                            <span style="color: #800E80;"><?php echo $fullname ?></span>
                        </div>
                    </div>
                    <button style="margin-bottom: auto; display: flex; align-items: center; justify-content: center; padding: 1px 5px; border-radius: 4px; background-color: #800E80; color: white;">Edit Profile</button>
                </div>

                <div class="profile_left_info">
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;">
                        <span style="font-size: 16px; font-weight: 700; color: #800E80;">Admin number:</span>
                        <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; padding-bottom: 20px;"><?php echo $admin_no ?><< /span>
                    </div>
                    <div style="width: 100%;" class="w-full">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Password:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]">Opeywmi2</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Contact: </span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]">08169562814</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Region:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-bottom: 20px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-b-[1px] border-b-[#800E80]"><?php echo $region ?></span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Language:</span>
                            <span style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; text-decoration: none; padding-left: 1px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-[1px] border-[#800E80] pl-1"><?php echo $lang ?></span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px;" class="w-full flex items-center justify-between">
                            <span style="font-size: 16px; font-weight: 700; color: #800E80;" class="text-[16px] font-[700] text-[#800E80]">Bio:</span>
                            <div style="width: 70%; font-size: 14px; color: #800E80; border-bottom-width: 1px; border-bottom-color: #800E80; padding: 1px;" class="w-[70%] text-[#800E80] text-[14px] text-[400] pb-2 border-[1px] border-[#800E80] p-1">
                                <?php echo $bio ?>
                            </div>
                        </div>
                    </div>
                    <!-- Other profile information here -->
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
<script src="/src/main.js"></script>

</html>