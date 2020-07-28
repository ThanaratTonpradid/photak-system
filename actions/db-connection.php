<?php
$servername = "server_db_1";
$dbname = "photak";
$username = "photak";
$password = "Ab123456";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
