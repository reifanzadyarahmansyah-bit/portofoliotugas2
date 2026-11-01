<?php
require "koneksi.php";
// Ambil data pribadi
$query_pribadi = mysqli_query($koneksi, "SELECT * FROM tbl_data_pribadi LIMIT 1");
$data_pribadi = mysqli_fetch_assoc($query_pribadi);
// Ambil semua data skill
$query_skill = mysqli_query($koneksi, "SELECT * FROM tbl_skill");
$skills = mysqli_fetch_all($query_skill, MYSQLI_ASSOC);
// Ambil semua data proyek
$query_proyek = mysqli_query($koneksi, "SELECT * FROM tbl_portofolio");
$proyek_list = mysqli_fetch_all($query_proyek, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio - <?php echo htmlspecialchars($data_pribadi['nama']); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Portofolio Saya</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Saya</a></li>
          <li class="nav-item"><a class="nav-link" href="#proyek">Proyek</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header: Nama & Subjudul Dinamis -->
  <header id="beranda" class="bg-primary text-white text-center py-5">
    <div class="container py-4">
      <h1 class="display-5 fw-bold">Halo, Saya <?php echo htmlspecialchars($data_pribadi['nama']); ?></h1>
      <p class="lead"><?php echo htmlspecialchars($data_pribadi['subjudul']); ?></p>
      <a href="#proyek" class="btn btn-warning btn-lg mt-3 fw-bold">Lihat Proyek Saya</a>
    </div>
  </header>

  <main>
    <!-- Tentang Saya & Skill Dinamis -->
    <section id="tentang" class="container py-5">
      <div class="row align-items-center g-4">
        <div class="col-12 col-md-4 text-center">
          <img src="foto-profil.JPG" alt="Foto Profil" class="img-fluid rounded-circle shadow">
        </div>
        <div class="col-12 col-md-8">
          <h2 class="fw-bold mb-3">Tentang Saya</h2>
          <p><?php echo htmlspecialchars($data_pribadi['tentang']); ?></p>

          <h5 class="fw-bold mt-4">Keahlian yang Sedang Dipelajari:</h5>
          <div class="d-flex flex-wrap gap-2 mt-2">
            <?php foreach ($skills as $row): ?>
              <span class="badge <?php echo htmlspecialchars($row['warna_badge']); ?> p-2">
                <?php echo htmlspecialchars($row['nama_skill']); ?>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Proyek Dinamis (Cukup 1 Bloks Card di dalam foreach) -->
    <section id="proyek" class="bg-light py-5">
      <div class="container">
        <h2 class="text-center fw-bold mb-4">Proyek Saya</h2>
        <p class="text-center text-muted mb-5">Berikut adalah beberapa latihan dan proyek yang pernah saya kerjakan:</p>
        <div class="row g-4">

          <?php foreach ($proyek_list as $row): ?>
            <div class="col-12 col-md-4">
              <div class="card h-100 shadow-sm">
                <img src="<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="Gambar Proyek">
                <div class="card-body">
                  <h5 class="card-title fw-bold"><?php echo htmlspecialchars($row['judul']); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                </div>
                <div class="card-footer bg-white border-0">
                  <a href="#" class="btn btn-outline-primary btn-sm w-100">Detail Proyek</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </section>

    <!-- Form Kontak Terkoneksi ke proses_kontak.php -->
    <section id="kontak" class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
          <h2 class="text-center fw-bold mb-4">Hubungi Saya</h2>

          <form action="proses_kontak.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap:</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email:</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Pesan:</label>
              <textarea name="pesan" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>

        </div>
      </div>
    </section>
  </main>

  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0"><?php echo htmlspecialchars($data_pribadi['nama']); ?>. Tugas Pemrograman Web - Pertemuan 3.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>