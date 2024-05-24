<header class="dashboard_header">
        <div class="dashboard_header_bar">
            <span class="w-28 h-20">
                <img src="assets/icons/atpvdms.png" class="w-full h-full" aria-label="ATPVDMS logo" alt="ATPVDMS logo">
            </span>

            <div class="dashboard_headers_images">
                <img class="w-28 h-10 bg-white object-contain" src="assets/images/tetfund_co_support_img.png" aria-label="tetfund co-support logo" alt="tetfund co-support logo" />
                <img class="w-28 h-10 bg-white object-contain" src="assets/images/tetfund_img.png" aria-label="tetfund logo" alt="tetfund logo" />
            </div>
            
            <!-- List -->
            <ul id="nav-link" class="dashboard_navItem">
                <li class="cursor-pointer flex items-center">
                    <a href="dashboard.php" style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;">dashboard</a>
                </li>
                <li class="dashboard_list" style="margin-right: 30px; position: relative;">
                    <a style="margin-right:10px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;">log</a>
                    <ul class="dashboard_dropdown">
                        <li><a href="tanker.php">tanker</a></li>
                        <li><a href="pipeline.php">pipeline</a></li>
                    </ul>
                    <span class="dashboard_header_icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </li>
                <li class="cursor-pointer flex items-center">
                    <a href="profile.php" style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;">profile</a>
                </li>
                <li class="cursor-pointer flex items-center">
                    <a href="blockchain.php"  style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="">blockchain</a>
                </li>
                <li class="dashboard_list">
                    <a style="margin-right:30px; font-size:24px;line-height:32px; text-transform: capitalize; font-weight: 400;" href="">maps</a>
                    <ul class="dashboard_dropdown">
                        <li><a href="tanker_map.php">tracker</a></li>
                        <li><a href="pipeline_map.php">pipeline</a></li>
                    </ul>
                    <span class="dashboard_header_icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </li> 
            </ul>
            
            <!-- User -->
            <div class="flex items-center gap-24">
                <!-- Notification Icon -->
                <span class="w-20 h-20 relative" style="margin:10%;margin-left:-10%;">
                    <!-- Insert Notification icon here -->
                    <a href="notification.php" class="mr-10 ">
                        <!-- Insert Active_Indicator component here -->
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </span>
    
                <!-- User Avatar -->
                <a href="profile.php">
                     <img class="w-32 h-32 rounded-full cursor-pointer" src="assets/images/avatar.png" alt="" />
                </a>
                <!-- User Information -->
                <div class="active:scale-80 dashboard_header_userinfo dashboard_list">
                    
                    <span class="text-center text-[10px] text-[#800E80] font-normal">
                        <!-- <?php echo $admin_name;?> -->
                        Futminna101
                    </span>
                    <span class="text-10 text-[#800E80] font-bold">#Admin</span>
                    
                    <!-- Dropdown list -->
                    <div class="dashboard_header_dropdown dashboard_dropdown">
                        <a href="profile.php" class="border-b-1 border-white text-white text-16 font-bold py-3 px-25 capitalize flex items-center justify-between" href="">
                            <!-- Insert Download icon here -->
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <span>Download</span>
                        </a>
                        <a href="profile.php" class="border-b-1 border-white text-white text-16 font-bold py-3 px-25 capitalize flex items-center justify-between" href="">
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
                <ul class="text-8">
                    <li><a href="tanker.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 text-[10px]">Tanker-log</a></li>
                    <li><a href="pipeline.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Pipeline-log</a></li>
                    <li><a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a></li>
                    <li><a href="blockchain.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Blockchain</a></li>
                    <li><a href="tanker_map.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Tanker-map</a></li>
                    <li><a href="pipeline_map" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Pipeline-map</a></li>
                </ul>
                </nav>
            </div>
            <!-- End of User -->
        </div>
    </header>