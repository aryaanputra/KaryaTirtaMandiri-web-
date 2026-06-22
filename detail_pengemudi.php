<?php
include 'koneksi.php';

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id_pengemudi'])) {
    die("ID pengemudi tidak ditemukan");
}

$id_pengemudi = $_GET['id_pengemudi'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_pengemudi WHERE id_pengemudi = '$id_pengemudi'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Pengemudi | Karya Tirta Mandiri</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
          <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">Karya Tirta Mandiri</span>
            <span class="brand-subtitle">Sistem Manejemen Logistik</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link" href="index.php" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link" href="karyawan.php">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Karyawan</span>
        </a>
        <a class="nav-link active" href="pengemudi.php">
          <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
          <span class="nav-text">Pengemudi</span>
        </a>
        <a class="nav-link" href="barang.php">
          <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
          <span class="nav-text">Barang</span>
        </a>
        <a class="nav-link" href="kendaraan.php">
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Kendaraan</span>
        </a>
        <a class="nav-link" href="pelanggan.php">
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Pelanggan</span>
        </a>
        <a class="nav-link" href="pemesanan.php">
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Pemesanan</span>
        </a>
        <a class="nav-link" href="laporan_pemesanan.php">
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Laporan Pemesanan</span>
        </a>
        <a class="nav-link" href="surat_jalan.php">
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Surat Jalan</span>
        </a>
      </nav>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
            <input class="form-control search-input" type="search" placeholder="Cari pengemudi" aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  <span class="profile-name d-none d-sm-inline"> <?= $_SESSION['nama_user']; ?> </span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="proses_logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-person-lines-fill" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Data</p>
                <h1 class="h3 mb-1">Detail pengemudi</h1>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="pengemudi.php"><i class="bi bi-arrow-left" aria-hidden="true"></i>Kembali</a><a class="btn btn-primary btn-sm" href="tambah_pengemudi.php"><i class="bi bi-person-plus" aria-hidden="true"></i>Tambah Data</a></div>
          </div>

          <section class="row g-3">
              <div class="panel mb-3">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"></h2></div><button class="btn btn-primary btn-sm" type="button" onclick="window.location.href='edit_pengemudi.php?id_pengemudi=<?= $user['id_pengemudi']; ?>'">Edit pengemudi</button></div>
                <div class="row g-3">
                <div class="info-list mt-4 text-start">
                        <div>
                            <span>
                                ID pengemudi: 
                                <strong><?= $user['id_pengemudi']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Nama pengemudi: 
                                <strong><?= $user['nama_pengemudi']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Tempat Lahir:
                                <strong><?= $user['tempat_lahir']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Tanggal Lahir:
                                <strong><?= $user['tanggal_lahir']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Jenis Kelamin:
                                <strong><?= $user['jenis_kelamin']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Alamat:
                                <strong><?= $user['alamat_pengemudi']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Nomor Telepon:
                                <strong><?= $user['nomor_telepon']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Status Bekerja:
                                <strong><?= $user['status_kerja']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Status:
                                <strong><?= $user['status_aktif']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Tanggal bergabung
                                <strong><?= $user['tanggal_bergabung']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Nomor Rekening:
                                <strong><?= $user['nomor_rekening']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Bank:
                                <strong><?= $user['bank']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Nama Kontak Darurat:
                                <strong><?= $user['nama_kontak_darurat']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Nomor Telepon Darurat:
                                <strong><?= $user['nomor_kontak_darurat']; ?></strong>
                            </span>
                        </div>
                        <div>
                            <span>
                                Hubungan:
                                <strong><?= $user['hubungan']; ?></strong>
                            </span>
                        </div>
                    </div>
              </div>
            </div>
          </section>
        </div>
      </main>

    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
