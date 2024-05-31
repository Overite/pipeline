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
    <title>Log page</title>
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
            <h2 style="color: #800E80; font-size: 16px; font-weight: 400; padding-bottom: 5px;">
                Log-Tanker
            </h2>
            <a href="tanker_record.php">
                <button onclick="fetchAllData()" style="margin-bottom: 10px; padding: 5px 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">View All Data</button>
            </a>
            <div class="log_table">
                <table id="tanker_table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Origin</th>
                            <th>PMS Quality (Ltr)</th>
                            <th>Gps-Coordinates</th>
                            <th>tank Level (M3)</th>
                            <th>Speed</th>
                            <th>Destination</th>
                            <th>Location Name</th>
                            <th>Timestamp</th>
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
        // Function to fetch data from the PHP file every 2 seconds
        function fetchData() {
            fetch('server/log/fetch_tanker_data_b.php') // Update with your PHP file path
                .then(response => response.json())
                .then(data => {
                    const tankerTableBody = document.querySelector('#tanker_table tbody');
                    tankerTableBody.innerHTML = ''; // Clear previous data
                    data.forEach(row => {
                        const tr = document.createElement('tr');
                        // Format timestamp
                        const timestamp = new Date(row.Timestamp);
                        const formattedTimestamp = formatDate(timestamp);
                        tr.innerHTML = `
                             <td style="padding-left: 50px; color:#800E80;">${row.sn}</td>
                             <td style="padding-left: 50px; color:#800E80;">Minna GK</td>
                             <td style="padding-left: 50px; color:#800E80;">${row.pms_level}</td>
                             <td style="padding-left: 50px; color:#800E80;">${row.lng} ${row.lat}</td>
                             <td style="padding-left: 50px; color:#800E80;">2000</td>
                             <td style="padding-left: 50px; color:#800E80;">${row.speed}</td>
                             <td style="padding-left: 50px; color:#800E80;">Lagos</td>
                             <td style="padding-left: 50px; color:#800E80;">${row.location}</td>
                             <td style="padding-left: 50px; color:#800E80;">${formattedTimestamp}</td>
                        `;
                        tankerTableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
        
        // Fetch data initially
        fetchData();
        
        // Fetch data every 2 seconds
        setInterval(fetchData, 2000);
        
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
            const minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
            const formattedDate = `${day}th ${months[monthIndex]} ${year} ${hours}:${minutes}${ampm}`;
            return formattedDate;
        }
    </script>
</body>
</html>
