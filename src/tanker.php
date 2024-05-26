<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log page</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
</head>
<body>
     <!-- hearder setion code  -->
     <?php require 'sections/header.php';?>

    <div class="log_container">
        <div class="log_column">
            <h2 style="color: #800E80; font-size: 16px; font-weight: 400; padding-bottom: 5px;">
                Log-Tanker
            </h2>
    
            <div class="log_table">
                <table>
                    <thead>
                        <tr>
                            <th>Conveyance id</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>PMS Quality (Ltr)</th>
                            <th>tank Level (M3)</th>
                            <th>Gps-Coordinates</th>
                            <th>Location name</th>
                            <th>Time</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your logs will be dynamically inserted here -->
                        <tr class="text-[#800E80] text-[14px] text-center font[400]">
                            <td>1</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>2</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>3</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>4</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>5</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>6</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                        <tr class="text-[#800E80] text-[14px] text-center font[400]" key={index}>
                            <td>7</td>
                            <td>Minna </td>
                            <td>Diko Depot</td>
                            <td>2000</td>
                            <td>2754</td>
                            <td>Lat-9535495 Lan- 6.45167</td>
                            <td>Checking</td>
                            <td>02:36pm	22</td>
                            <td>22 April, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>
</html>