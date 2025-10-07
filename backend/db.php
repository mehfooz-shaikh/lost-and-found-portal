<?php
$servername = "localhost";
$username = "root";
$password = "";  // XAMPP default is no password
$dbname = "lost_and_found";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Optional: confirm success
// echo "Database connected successfully!";
?>
