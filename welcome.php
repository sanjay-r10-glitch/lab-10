<?php
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(trim($_POST['username']))) {
    $_SESSION['username'] = htmlspecialchars(trim($_POST['username']));
    $_SESSION['start_time'] = time(); // Store exact timestamp in seconds
}

// Redirect back to index if accessed directly without logging in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Format the stored start time for display
$formatted_start_time = date("h:i:s A", $_SESSION['start_time']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .top-right { position: absolute; top: 20px; right: 30px; font-weight: bold; color: #555; }
        .content { margin-top: 80px; text-align: center; }
        button { padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="top-right">
        Start Time: <?php echo $formatted_start_time; ?>
    </div>

    <div class="content">
        <h1>Hello, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Welcome to your session.</p>
        
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
