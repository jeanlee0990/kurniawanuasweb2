<?php
session_start();
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    
    // Implement proper authentication here
    // For simplicity, we're just checking if NIM is odd
    if ($nim % 2 != 0) {
        $_SESSION['user_id'] = $nim;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>