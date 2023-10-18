<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <?php
        include('db.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nama_buku = $_POST['nama_buku'];
            $penulis = $_POST['penulis'];
            $tahun_terbit = $_POST['tahun_terbit'];

            $sql = "UPDATE buku SET nama_buku='$nama_buku', penulis='$penulis', tahun_terbit='$tahun_terbit' WHERE id='$id'";
            mysqli_query($db, $sql);
            header('Location: index.php');
        } elseif (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($db, "SELECT * FROM buku WHERE id='$id'");
            $row = mysqli_fetch_array($result);
        ?>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" required>

            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required>

            <input type="submit" value="Simpan Perubahan">
        </form>
        <a href="index.php">Kembali ke Daftar Buku</a>
        <?php } ?>
    </div>
</body>
</html>
