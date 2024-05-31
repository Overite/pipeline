<?php
// Handle AJAX request for fetching data
if (isset($_GET['action']) && $_GET['action'] == 'fetch_data') {
    header('Content-Type: application/json'); // Ensure the response is JSON

    $servername = "localhost"; // replace with your server name
    $username = "root"; // replace with your database username
    $password = ""; // replace with your database password
    $dbname = "u327081214_gov"; // replace with your database name
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()])); // Return error as JSON
    }

    // Define the table names
    $tables = ['pipeline_2137', 'pipeline_2138', 'pipeline_2139', 'pipeline_2140', 'pipeline_2141'];

    $allData = [];
    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($conn, $sql);
        $tableData = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tableData[] = $row;
            }
        }
        $allData[$table] = $tableData;
    }

    mysqli_close($conn);

    // Return all data as JSON
    echo json_encode($allData);
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}
</style>

<title>Pipeline Records</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h4 style="text-align:center;">Pipeline Records</h4>

<div id="tablesContainer"></div>

<script>
function fetchData() {
    $.ajax({
        url: 'pipeline_record.php', // The same file since it's self-contained
        method: 'GET',
        data: { action: 'fetch_data' },
        success: function(data) {
            if (data.error) {
                console.error('Error:', data.error);
                return;
            }

            const parsedData = data;
            const tablesContainer = document.getElementById('tablesContainer');
            tablesContainer.innerHTML = ''; // Clear existing tables

            for (const tableName in parsedData) {
                const tableData = parsedData[tableName];

                if (tableData.length > 0) {
                    const table = document.createElement('table');
                    table.id = tableName;
                    table.innerHTML = generateTableHTML(tableName, tableData);
                    tablesContainer.appendChild(table);

                    const button = document.createElement('button');
                    button.innerText = `Download ${tableName} as PDF`;
                    button.className = 'btn btn-primary mb-4';
                    button.onclick = function() {
                        downloadPDF(tableName, tableName);
                    };
                    tablesContainer.appendChild(button);
                }
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}

function generateTableHTML(tableName, tableData) {
    let tableHTML = '<thead><tr>';
    
    // Generate headers
    for (const key in tableData[0]) {
        tableHTML += `<th>${key}</th>`;
    }
    tableHTML += '</tr></thead><tbody>';
    
    // Generate rows
    for (const row of tableData) {
        tableHTML += '<tr>';
        for (const key in row) {
            tableHTML += `<td>${row[key]}</td>`;
        }
        tableHTML += '</tr>';
    }
    
    tableHTML += '</tbody>';
    return tableHTML;
}

function downloadPDF(tableId, fileName) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    // Add title
    doc.setFontSize(18);
    doc.text(fileName, 14, 22);
    
    // Add table
    doc.autoTable({ html: `#${tableId}`, startY: 30 });
    
    // Save the PDF
    doc.save(`${fileName}.pdf`);
}

// Fetch data on page load
fetchData();
</script>

</body>
</html>
