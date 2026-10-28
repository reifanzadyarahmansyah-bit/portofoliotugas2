<?php
$host     = "localhost";
$user     = "root";     // User bawaan Laragon
$password = "";         // Password bawaan Laragon kosong
$database = "db_portofolio";

// Menghubungkan PHP ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>