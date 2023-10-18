<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gantilah 'username' dan 'password' dengan kombinasi yang Anda inginkan
    if ($username === '123' && $password === '123') {
        $_SESSION['username'] = $username;
        header('Location: index.php'); // Redirect ke halaman utama setelah login
    } else {
        echo "Login gagal. Periksa kembali nama pengguna dan kata sandi Anda.";
    }
}
?>
