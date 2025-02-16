<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO experience (user_id, job_title, company_name, start_date, end_date, job_description) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssss', $user_id, $job_title, $company_name, $start_date, $end_date, $description);
    
    if ($stmt->execute()) {
        echo "Experience submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

?>

<form method="POST" action="experience.php">
    <label for="job_title">Job Title:</label><br>
    <input type="text" name="job_title" required><br><br>

    <label for="company_name">Company Name:</label><br>
    <input type="text" name="company_name" required><br><br>

    <label for="start_date">Start Date:</label><br>
    <input type="date" name="start_date" required><br><br>

    <label for="end_date">End Date:</label><br>
    <input type="date" name="end_date"><br><br>

    <label for="description">Job Description:</label><br>
    <textarea name="description" rows="4" cols="50"></textarea><br><br>

    <button type="submit">Submit Experience</button>
</form>
