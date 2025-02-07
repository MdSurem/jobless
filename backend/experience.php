<?php
// Assuming you have already connected to the database before this
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Experience</title>
</head>
<body>
    <h1>Enter Your Experience Details</h1>
    <form action="submit_experience.php" method="POST">
        <label for="job_title">Job Title:</label><br>
        <input type="text" id="job_title" name="job_title" required><br><br>
        
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" required><br><br>

        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label><br>
        <input type="date" id="end_date" name="end_date"><br><br>

        <label for="description">Job Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Submit Experience</button>
    </form>
</body>
</html>

