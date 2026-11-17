<?php
session_start();

// If user is already logged in, redirect to welcome page
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="text"] { width: 93%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Your Name</h2>
        <form action="welcome.php" method="POST">
            <input type="text" name="username" placeholder="Your Name" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
