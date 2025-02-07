<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $dob = $_POST['dob'];

    // Query to check if user exists
    $sql = "SELECT id, username FROM users WHERE username = ? AND dob = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $dob);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found
        $stmt->bind_result($user_id, $username);
        $stmt->fetch();
        
        // Store user session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        // Redirect to the dashboard
        header('Location: dashboard.php');
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
}
?>
