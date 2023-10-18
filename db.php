<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "buku";

$db = mysqli_connect($server, $username, $password, $database);

if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
