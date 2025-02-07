<?php
// Assuming you have already connected to MySQL
$servername = "localhost";  // MySQL host (localhost for local)
$username = "root";         // MySQL username
$password = "password"; // MySQL password
$dbname = "your_database";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    // Assuming you have a way to associate user experience (e.g., a session or user ID)
    $user_id = 1;  // Example static user_id, replace with dynamic user_id in real use cases

    // Insert data into experience table
    $sql = "INSERT INTO experience (user_id, job_title, company_name, start_date, end_date, description)
            VALUES ('$user_id', '$job_title', '$company_name', '$start_date', '$end_date', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Experience submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
