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
        exit();
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
}
?>
<form method="POST" action="login.php">
    <label>Username:</label><input type="text" name="username" required><br><br>
    <label>Date of Birth:</label><input type="date" name="dob" required><br><br>
    <button type="submit">Login</button>
</form>
