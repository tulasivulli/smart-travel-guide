<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "SmartTravel"; // Make sure the database name matches exactly in phpMyAdmin (case-sensitive in some setups)

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect to DB: " . $conn->connect_error);
}
?>
