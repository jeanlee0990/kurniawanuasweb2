<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA Euro 2024 - Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>UEFA Euro 2024 - Klasemen Grup B</h1>
    <nav>
        <a href="input_data.php">Input Data</a>
        <a href="view_data.php">Lihat Data</a>
        <a href="generate_pdf.php">Cetak PDF</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>