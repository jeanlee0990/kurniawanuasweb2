<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $negara = $_POST['negara'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];
    
    $sql = "INSERT INTO klasemen (negara, menang, seri, kalah, poin) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiii", $negara, $menang, $seri, $kalah, $poin);
    $stmt->execute();
    
    header("Location: view_data.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data - UEFA Euro 2024</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Input Data Klasemen Grup B</h1>
    <form action="" method="post">
        <select name="negara" required>
            <option value="">Pilih Negara</option>
            <option value="Spanyol">Spanyol</option>
            <option value="Kroasia">Kroasia</option>
            <option value="Italia">Italia</option>
            <option value="Albania">Albania</option>
        </select>
        <input type="number" name="menang" placeholder="Jumlah Menang" required>
        <input type="number" name="seri" placeholder="Jumlah Seri" required>
        <input type="number" name="kalah" placeholder="Jumlah Kalah" required>
        <input type="number" name="poin" placeholder="Jumlah Poin" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>