<?php
$host = "localhost";
$user = "root";
$pass = ""; // Password default Laragon kosong
$db = "db_portofolio";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menjaga agar karakter dan simbol tampil dengan benar
mysqli_set_charset($koneksi, "utf8mb4");