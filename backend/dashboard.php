<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Get user experience details
$sql_exp = "SELECT * FROM experience WHERE user_id = ?";
$stmt_exp = $conn->prepare($sql_exp);
$stmt_exp->bind_param('i', $user_id);
$stmt_exp->execute();
$result_exp = $stmt_exp->get_result();

// Get user jobless details
$sql_jobless = "SELECT * FROM jobless WHERE user_id = ?";
$stmt_jobless = $conn->prepare($sql_jobless);
$stmt_jobless->bind_param('i', $user_id);
$stmt_jobless->execute();
$result_jobless = $stmt_jobless->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></h1>
    
    <h2>Your Experience</h2>
    <?php while ($exp = $result_exp->fetch_assoc()) { ?>
        <p>Company: <?php echo htmlspecialchars($exp['company_name'], ENT_QUOTES, 'UTF-8'); ?>, Job Title: <?php echo htmlspecialchars($exp['job_title'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php } ?>

    <h2>Your Jobless Information</h2>
    <?php while ($jobless = $result_jobless->fetch_assoc()) { ?>
        <p>Jobless Duration: <?php echo htmlspecialchars($jobless['jobless_start_date'], ENT_QUOTES, 'UTF-8'); ?> to <?php echo htmlspecialchars($jobless['jobless_end_date'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php } ?>

    <a href="experience.php">Submit Experience</a><br>
    <a href="jobless_duration.php">Submit Jobless Information</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
