<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM buku WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    $gambar_path = "images/".$row['gambar'];

    // Hapus gambar dari direktori server
    if (file_exists($gambar_path)) {
        unlink($gambar_path);
    }

    $sql = "DELETE FROM buku WHERE id='$id'";
    mysqli_query($db, $sql);
}
header('Location: index.php');
?>
