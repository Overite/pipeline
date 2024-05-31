<?php require 'server/database/db.php';

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.html'); // Redirect to the login page if not logged in
    exit();
}

// Get admin data
$email = $_SESSION['email'];
$adminQuery = "SELECT full_name, role, img FROM admin WHERE email = ?";
$stmt = $conn->prepare($adminQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$adminResult = $stmt->get_result();
$adminData = $adminResult->fetch_assoc();

// Check if admin data exists
if (!$adminData) {
    // Redirect to login page if admin data not found
    header('Location: login.html');
    exit();
}
// Assign values to variables
$full_name = $adminData['full_name'];
$role = $adminData['role'];
$img = $adminData['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log page | Pipeline</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
</head>
<body>
     <!-- header section code -->
     <?php require 'sections/header.php';?>

    <div class="log_container">
        <div class="log_column">
            <h2 style="color: color:#800E80;; font-size: 16px; font-weight: 400; padding-bottom: 5px;">
                Log-Pipeline
            </h2>
            <a href="pipeline_record.php">
                <button onclick="fetchAllData()" style="margin-bottom: 10px; padding: 5px 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">View All Data</button>
            </a>

            <div class="log_table">
                <table id="pipeline_table">
                    <thead>
                        <tr>
                            <th>Conveyance id</th>
                            <th>GSP-Coordinates</th>
                            <th>Velocity</th>
                            <th>Flowrate</th>
                            <th>Vibration</th>
                            <th>Date and Times</th>
                            <th>Vandal detection</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Function to fetch data from the PHP file
        function fetchData() {
            fetch('server/log/fetch_pipeline_data_b.php')
                .then(response => response.json())
                .then(data => {
                    const pipelineTableBody = document.querySelector('#pipeline_table tbody');
                    pipelineTableBody.innerHTML = ''; // Clear previous data
                    data.forEach(row => {
                        const tr = document.createElement('tr');
                        const timestamp = new Date(row.timestamp);
                        const formattedTimestamp = formatDate(timestamp);
                        const detection = row.vibration < 100 ? 'Not Detected' : '<span style="color: red;">Detected</span>';
                        tr.innerHTML = `
                            <td style="padding-left: 50px; color:#800E80;">${row.pi_id}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.latitude}  ${row.longitude}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.velocity}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.flowrate}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.vibration}</td>
                            <td style="padding-left: 50px; color:#800E80;">${formattedTimestamp}</td>
                            <td style="padding-left: 50px; color:#800E80;">${detection}</td>
                        `;
                        pipelineTableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
        
        // Function to fetch all data
        function fetchAllData() {
            fetch('server/log/fetch_all_pipeline_data.php')
                .then(response => response.json())
                .then(data => {
                    const pipelineTableBody = document.querySelector('#pipeline_table tbody');
                    pipelineTableBody.innerHTML = ''; // Clear previous data
                    data.forEach(row => {
                        const tr = document.createElement('tr');
                        const timestamp = new Date(row.timestamp);
                        const formattedTimestamp = formatDate(timestamp);
                        const detection = row.vibration < 100 ? 'Not Detected' : '<span style="color: red;">Detected</span>';
                        tr.innerHTML = `
                            <td style="padding-left: 50px; color:#800E80;">${row.pi_id}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.latitude}  ${row.longitude}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.velocity}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.flowrate}</td>
                            <td style="padding-left: 50px; color:#800E80;">${row.vibration}</td>
                            <td style="padding-left: 50px; color:#800E80;">${formattedTimestamp}</td>
                            <td style="padding-left: 50px; color:#800E80;">${detection}</td>
                        `;
                        pipelineTableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
        
        // Fetch data initially
        fetchData();
        
        // Fetch data every 5 seconds
        setInterval(fetchData, 5000);
        
        // Function to format date
        function formatDate(date) {
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const day = date.getDate();
            const monthIndex = date.getMonth();
            const year = date.getFullYear();
            let hours = date.getHours();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours += 1; // Add 1 hour
            const minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
            const formattedDate = `${day}th ${months[monthIndex]} ${year} ${hours}:${minutes}${ampm}`;
            return formattedDate;
        }

    </script>
</body>
</html>
