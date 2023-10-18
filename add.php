<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Baru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Buku Baru</h2>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" name="nama_buku" required>

            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" required>

            <label for="gambar">Gambar Sampul Buku:</label>
            <input type="file" name="gambar" required>

            <input type="submit" value="Tambahkan Buku">
        </form>
        <a href="index.php">Kembali ke Daftar Buku</a>
    </div>

    <?php
    include('db.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_buku = $_POST['nama_buku'];
        $penulis = $_POST['penulis'];
        $tahun_terbit = $_POST['tahun_terbit'];

        // Mengunggah gambar ke direktori server
        $gambar = $_FILES['gambar']['name'];
        $target = "images/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

        $sql = "INSERT INTO buku (nama_buku, penulis, tahun_terbit, gambar) VALUES ('$nama_buku', '$penulis', '$tahun_terbit', '$gambar')";
        mysqli_query($db, $sql);
        header('Location: index.php');
    }
    ?>
</body>
</html>
