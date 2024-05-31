<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//check error connenting to db ends her


 date_default_timezone_set('Africa/Lagos');
  // Connect to the database
 $conn = mysqli_connect("localhost", "root", "", "u327081214_gov");
// Check if the connection was successful
 if (mysqli_connect_errno()) {
    exit('Failed to connect to the database: ' . mysqli_connect_error());
 }
?>
