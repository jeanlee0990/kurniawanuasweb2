<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA Euro 2024 - Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>UEFA Euro 2024 - Klasemen Grup B</h1>
    <form action="login.php" method="post">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>