<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM klasemen ORDER BY poin DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data - UEFA Euro 2024</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Klasemen Grup B - UEFA Euro 2024</h1>
    <table>
        <tr>
            <th>Negara</th>
            <th>Menang</th>
            <th>Seri</th>
            <th>Kalah</th>
            <th>Poin</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['negara']; ?></td>
            <td><?php echo $row['menang']; ?></td>
            <td><?php echo $row['seri']; ?></td>
            <td><?php echo $row['kalah']; ?></td>
            <td><?php echo $row['poin']; ?></td>
            <td>
                <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_data.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>