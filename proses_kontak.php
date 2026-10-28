<?php
// 1. Panggil koneksi database
include 'koneksi.php';

// 2. Ambil data yang diketik pengguna dari form
$nama  = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// 3. Perintah SQL untuk memasukkan data ke tabel 'pesan'
$query = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

// 4. Jalankan perintah dan berikan notifikasi
if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Pesan kamu berhasil terkirim!');
            window.location.href='index.php';
          </script>";
} else {
    echo "Gagal menyimpan pesan: " . mysqli_error($koneksi);
}
?>