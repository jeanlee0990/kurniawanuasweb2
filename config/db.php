<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "uefa_euro_2024";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>