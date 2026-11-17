<?php
session_start();

// Redirect to index if there is no active session
if (!isset($_SESSION['username']) || !isset($_SESSION['start_time'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$end_time = time();
$duration_seconds = $end_time - $_SESSION['start_time'];

// Convert total seconds into Hours, Minutes, and Seconds
$hours = floor($duration_seconds / 3600);
$minutes = floor(($duration_seconds % 3600) / 60);
$seconds = $duration_seconds % 60;

$duration_formatted = sprintf("%02d hrs, %02d mins, %02d secs", $hours, $minutes, $seconds);

// Clear and destroy the session
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 80px; text-align: center; }
        .box { max-width: 450px; margin: auto; padding: 30px; border: 1px solid #ccc; border-radius: 5px; }
        a { display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Thank You, <?php echo $username; ?>!</h2>
        <p>You have been successfully logged out.</p>
        <p><strong>Duration of Usage:</strong> <?php echo $duration_formatted; ?></p>
        <a href="index.php">Login Again</a>
    </div>
</body>
</html>
