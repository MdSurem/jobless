<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $jobless_start_date = $_POST['jobless_start_date'];
    $jobless_end_date = $_POST['jobless_end_date'];

    $sql = "INSERT INTO jobless (user_id, jobless_start_date, jobless_end_date) 
            VALUES ('$user_id', '$jobless_start_date', '$jobless_end_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Jobless information added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST" action="jobless_duration.php">
    <label>Jobless Start Date:</label><input type="date" name="jobless_start_date" required><br><br>
    <label>Jobless End Date:</label><input type="date" name="jobless_end_date"><br><br>
    <button type="submit">Submit</button>
</form>
