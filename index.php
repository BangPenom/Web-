<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Halaman yang akan diakses oleh pengguna yang sudah login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Sampul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db.php');
                $result = mysqli_query($db, "SELECT * FROM buku");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['nama_buku']."</td>";
                    echo "<td>".$row['penulis']."</td>";
                    echo "<td>".$row['tahun_terbit']."</td>";
                    echo '<td><img src="images/'.$row['gambar'].'" width="100" height="150"></td>';
                    echo '<td><a href="edit.php?id='.$row['id'].'">Edit</a> | <a href="delete.php?id='.$row['id'].'">Hapus</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add.php">Tambah Buku Baru</a>
    </div>
</body>
</html>
