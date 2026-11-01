<?php
require "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO tbl_kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Pesan kamu berhasil disimpan ke database!');
            window.location.href='index.php';
          </script>";
} else {
    echo "Gagal menyimpan pesan: " . mysqli_error($koneksi);
}
?>