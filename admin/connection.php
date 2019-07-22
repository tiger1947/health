<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!($conn)) {
  die("Connection field because:".mysqli_connect_error());
} 

?>