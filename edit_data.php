<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $negara = $_POST['negara'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = $_POST['poin'];
    
    $sql = "UPDATE klasemen SET negara=?, menang=?, seri=?, kalah=?, poin=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiiii", $negara, $menang, $seri, $kalah, $poin, $id);
    $stmt->execute();
    
    header("Location: view_data.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM klasemen WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - UEFA Euro 2024</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Edit Data Klasemen Grup B</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <select name="negara" required>
            <option value="">Pilih Negara</option>
            <option value="Spanyol" <?php if($row['negara']=='Spanyol') echo 'selected'; ?>>Spanyol</option>
            <option value="Kroasia" <?php if($row['negara']=='Kroasia') echo 'selected'; ?>>Kroasia</option>
            <option value="Italia" <?php if($row['negara']=='Italia') echo 'selected'; ?>>Italia</option>
            <option value="Albania" <?php if($row['negara']=='Albania') echo 'selected'; ?>>Albania</option>
        </select>
        <input type="number" name="menang" placeholder="Jumlah Menang" value="<?php echo $row['menang']; ?>" required>
        <input type="number" name="seri" placeholder="Jumlah Seri" value="<?php echo $row['seri']; ?>" required>
        <input type="number" name="kalah" placeholder="Jumlah Kalah" value="<?php echo $row['kalah']; ?>" required>
        <input type="number" name="poin" placeholder="Jumlah Poin" value="<?php echo $row['poin']; ?>" required>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="view_data.php">Kembali ke Daftar</a>
</body>
</html> 