<!DOCTYPE HTML>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
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

<title>Tanker Records</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
        <h4 style="text-align:center;">Tanker Records</h4>
         <a href="tanker.php">
                <button onclick="fetchAllData()" style="margin-bottom: 10px; padding: 5px 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Click to go Back</button>
            </a>

  <?php

$servername = "localhost"; // replace with your server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "u327081214_gov"; // replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tanker_2137";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table id='dataTable'>";
    echo "<tr>";
    // output column names
    while ($fieldinfo=mysqli_fetch_field($result)) {
        echo "<th>".$fieldinfo->name."</th>";
    }
    echo "</tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>".$col."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<section style="text-align:center;">
     <button onclick="printTable()">Print Table</button>
     <button onclick="downloadPDF()">Download as PDF</button>
</section>
<script>
  function printTable() {
    window.print();
  }

  function downloadPDF() {
    const { jsPDF } = window.jspdf;
    var doc = new jsPDF();

    // Add title
    doc.setFontSize(18);
    doc.text('Tanker Records', 14, 22);

    // Add table
    doc.autoTable({ html: '#dataTable', startY: 30 });

    // Save the PDF
    doc.save('tanker_records.pdf');
  }
</script>
</body>
</html>
