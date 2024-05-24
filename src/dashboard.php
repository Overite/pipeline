<?php require 'server/database/db.php';?>
<!-- connection to database  -->
<?php
// Fetch the total number of pipelines
$pipelineQuery = "SELECT COUNT(id) AS total_pipeline FROM pipelines";
$pipelineResult = $conn->query($pipelineQuery);
$pipelineRow = $pipelineResult->fetch_assoc();
$totalPipeline = $pipelineRow['total_pipeline'];

// Fetch the total number of tankers
$tankerQuery = "SELECT COUNT(id) AS total_tanker FROM tankers";
$tankerResult = $conn->query($tankerQuery);
$tankerRow = $tankerResult->fetch_assoc();
$totalTanker = $tankerRow['total_tanker'];

// Fetch devices from the pipelines table
$pipelineQuery = "SELECT sn FROM pipelines";
$pipelineResult = $conn->query($pipelineQuery);

// Fetch devices from the tankers table
$tankerQuery = "SELECT sn FROM tankers";
$tankerResult = $conn->query($tankerQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="styles/output.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
</head>
<body>
    <!-- hearder setion code  -->
    <?php require 'sections/header.php';


    ?>
    <div class="dashboard">
        <div class="dashboard_pipeline">
            <div class="dashboard_pipeline_tracker">
                <div style="display: flex; flex-direction: column;">
                    <h2 style="font-size: 32px; font-weight: 700;">Active Pipeline</h2>
                    <p style="font-size: 16px; font-weight: 700;">Total number of pipeline</p>
                </div>
                <span style="font-size: 32px; font-weight: 700;"><?php echo $totalPipeline; ?></span>
            </div>
            <div style="grid-column-start: 7; grid-column-end: 13; grid-row-start: 1; grid-row-end: 2; background-color: #800E80; color: #fff; padding: 0 20px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; flex-direction: column;">
                    <h2 style="font-size: 32px; font-weight: 700;">Active Tanker</h2>
                    <p style="font-size: 16px; font-weight: 700;">Total number of Tanker</p>
                </div>
                <span style="font-size: 32px; font-weight: 700;"><?php echo $totalTanker; ?></span>
            </div>

            <div class="dashboard_log" id="logSection">
                <h2 style="width: 90%; display: flex; gap: 2px; align-items: center; font-size: 16px; color: #fff; font-weight: 400;" id="logTitle">Log
                    <i class="fa fa-angle-down" aria-hidden="true" id="toggleIcon"></i>
                </h2>
                <div class="dashboard_table" id="logTable">
                    <!-- Table content with inline styles -->
                    <table class="dashboard_subtable">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gps-coordinate</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Location | Flowrate</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">PMS-Level | Vibration</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Time-Date</th>
                            </tr>
                        </thead>
                        <tbody id="logDataBody">
                            <!-- Data rows will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
      
            <div style="grid-column-start: 9; grid-column-end: 13; grid-row-start: 2; grid-row-end: 3; background-color: #800E80; display: flex; flex-direction: column; gap: 16px;">
                <h2 style="width: 80%; margin-left: auto; font-size: 16px; color: #fff; font-weight: 700; padding-top: 3px;">Devices</h2>
                <div style="width: 80%; height: 85%; margin-left: auto; padding-right: 2px; overflow-y: scroll; scrollbar-width: thin; scrollbar-color: rgba(0, 0, 0, 0.3) transparent;">
                    <!-- Device list content with inline styles -->
                    <ul class="flex flex-col gap-16 h-fit-content text-white">
                        <?php
                        // Loop through pipeline devices
                        while ($pipelineRow = $pipelineResult->fetch_assoc()) {
                            echo '<div class="flex items-center justify-between text-white">';
                            echo '<span class="text-16 font-normal">' . $pipelineRow['sn'] . '</span>';
                            echo '<span class="text-10 font-bold">-Pipeline</span>';
                            echo '</div>';
                        }

                        // Loop through tanker devices
                        while ($tankerRow = $tankerResult->fetch_assoc()) {
                            echo '<div class="flex items-center justify-between text-white">';
                            echo '<span class="text-16 font-normal">' . $tankerRow['sn'] . '</span>';
                            echo '<span class="text-10 font-bold">-Tanker</span>';
                            echo '</div>';
                        }
                        ?>
                    </ul>

                </div>
            </div>
            <div style="grid-column-start: 1; grid-column-end: 5; grid-row-start: 3; grid-row-end: 4; background-color: #800E80; display: flex; flex-direction: column; gap: 16px;">
                <a href='notification.php' style="text-decoration: none;">
                    <h2 style="width: 80%; margin-left: auto; font-size: 16px; color: #fff; font-weight: 700; padding-top: 3px;">Notifications</h2>
                </a>
                <div style="width: 80%; height: 85%; margin: 0 auto; overflow-y: scroll; scrollbar-width: thin; scrollbar-color: rgba(0, 0, 0, 0.3) transparent;">
                  
                
    
                <!-- Notification list content with inline styles -->
                <ul id="notificationList" style="display: flex; flex-direction: column; gap: 16px; height: fit-content;">
                    <!-- Notifications will be dynamically added here -->
                </ul>
                           
                </div>
            </div>
            
            <div class="dashboard_map_container">
                <div class="dashboard_map">
                    <div style="width: 100%; background-color: #800E80; color: #fff; margin: 40px auto 0; padding: 8px;">
                        <span style="font-size: 16px; font-weight: 700;">Map</span>
                        <span style="font-size: 14px; font-weight: 400;">-Pipeline</span>
                    </div>
                    <iframe src="https://overite.co/191/map/pipe_line/index.php" style="width: 100%; height: 100%; border: none;"></iframe>
                    <!-- <div style="position: absolute; bottom: 16px; left: 16px; z-index: 2; display: grid; grid-template-columns: 15px auto; grid-template-rows: 15px auto; gap: 1px;">
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <span style="background-color: #03A9F5; width: 12px; height: 12px;"></span>
                        </span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">Flow Rate</span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <span style="background-color: #000; width: 12px; height: 12px;"></span>
                        </span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">Vibration</span>
                    </div> -->
                </div>
                <div class="dashboard_map">
                    <div style="width: 100%; background-color: #800E80; color: #fff; margin: 40px auto 0; padding: 8px;">
                        <span style="font-size: 16px; font-weight: 700;">Map</span>
                        <span style="font-size: 14px; font-weight: 400;">-Tracker</span>
                    </div>
                    <iframe src="https://overite.co/191/map/tanker/index.php" style="width: 100%; height: 100%; border: none;"></iframe>
                    <!-- <div style="position: absolute; bottom: 16px; left: 16px; z-index: 2; display: grid; grid-template-columns: 15px auto; grid-template-rows: 15px auto; gap: 1px;">
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <span style="background-color: #03A9F5; width: 12px; height: 12px;"></span>
                        </span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">Flow Rate</span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <span style="background-color: #000; width: 12px; height: 12px;"></span>
                        </span>
                        <span style="background-color: #fff; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">Vibration</span>
                        </div>
                    </div> -->
                </div>
                <!-- <div style="width: 100%; height: 100%; background-color: #fff; overflow-y: scroll; scrollbar-width: thin; scrollbar-color: rgba(0, 0, 0, 0.3) transparent;" class="visible_thumb_bar">
                    <div style="margin: 0 auto; max-width: 100%; width: 100%; display: grid; grid-template-rows: 200px 380px 390px; grid-template-columns: repeat(12, minmax(0, 1fr)); gap: 16px; padding-top: 24px;">
                        Continue with remaining grid items here -->
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>
</html>