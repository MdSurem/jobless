<?php
// Assuming you have already connected to MySQL
$servername = "localhost";  // MySQL host
$username = "root";         // MySQL username
$password = "password"; // MySQL password
$dbname = "job_portal";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming user_id is stored in a session or some user identification
$user_id = 1;  // Example user_id

// Query to fetch experience details for the user
$sql = "SELECT job_title, company_name, start_date, end_date, description 
        FROM experience 
        WHERE user_id = $user_id";

$result = $conn->query($sql);

// Check if there are any experience records for the user
if ($result->num_rows > 0) {
    // Output data for each experience record
    while($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["job_title"] . " at " . $row["company_name"] . "</h3>";
        echo "<p>Start Date: " . $row["start_date"] . " | End Date: " . $row["end_date"] . "</p>";
        echo "<p>" . $row["description"] . "</p>";
    }
} else {
    echo "No experience details found.";
}

// Close connection
$conn->close();
?>
