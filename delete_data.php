<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM klasemen WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: view_data.php");
exit();
?>