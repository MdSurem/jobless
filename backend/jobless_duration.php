<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $jobless_start_date = $_POST['jobless_start_date'];
    $jobless_end_date = $_POST['jobless_end_date'];

    $sql = "INSERT INTO jobless (user_id, jobless_start_date, jobless_end_date) 
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $user_id, $jobless_start_date, $jobless_end_date);
    
    if ($stmt->execute()) {
        echo "Jobless information added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<form method="POST" action="jobless_duration.php">
    <label for="jobless_start_date">Jobless Start Date:</label><br>
    <input type="date" name="jobless_start_date" required><br><br>

    <label for="jobless_end_date">Jobless End Date:</label><br>
    <input type="date" name="jobless_end_date"><br><br>

    <button type="submit">Submit Jobless Information</button>
</form>
