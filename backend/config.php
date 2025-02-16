<?php
$servername = "localhost";
$username = "root";  // Update for security purposes
$password = "password"; // Update for security purposes
$dbname = "job_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
