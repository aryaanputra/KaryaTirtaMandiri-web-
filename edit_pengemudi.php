<?php
include 'koneksi.php';

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

$id_pengemudi = $_GET['id_pengemudi'];

$query = mysqli_query($koneksi,
    "SELECT * FROM tb_pengemudi WHERE id_pengemudi='$id_pengemudi'");

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
              <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Edit</p>
                <h1 class="h3 mb-1">Data pengemudi</h1>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="pengemudi.php"><i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-8">
              <form class="panel needs-validation" method="POST" action="proses_edit_data_pengemudi.php" novalidate>
                <input type="hidden" name="id_pengemudi" value="<?= $user['id_pengemudi']; ?>">
                    <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">ID pengemudi</label>
                        <input class="form-control" type="text" id="id_pengemudi" name="id_pengemudi" value="<?= $user['id_pengemudi']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama pengemudi</label>
                        <input class="form-control" type="text" id="nama_pengemudi" name="nama_pengemudi" value="<?= $user['nama_pengemudi']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <input class="form-control" type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <input class="form-control" type="text" id="alamat_pengemudi" name="alamat_pengemudi" value="<?= $user['alamat_pengemudi']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input class="form-control" type="number" id="nomor_telepon" name="nomor_telepon" value="<?= $user['nomor_telepon']; ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Status Bekerja</label>
                      <select class="form-select" id="status_kerja" name="status_kerja" required>
                          <option value="Tetap"
                              <?= $user['status_kerja'] == 'Tetap' ? 'selected' : ''; ?>>
                              Tetap
                          </option>
                          <option value="Magang"
                              <?= $user['status_kerja'] == 'Magang' ? 'selected' : ''; ?>>
                              Magang
                          </option>
                          <option value="Kontrak"
                              <?= $user['status_kerja'] == 'Kontrak' ? 'selected' : ''; ?>>
                              Kontrak
                          </option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Status</label>
                      <select class="form-select" id="status_aktif" name="status_aktif" required>
                          <option value="Aktif"
                              <?= $user['status_aktif'] == 'Aktif' ? 'selected' : ''; ?>>
                              Aktif
                          </option>
                          <option value="Nonaktif"
                              <?= $user['status_aktif'] == 'Nonaktif' ? 'selected' : ''; ?>>
                              Nonaktif
                          </option>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Bergabung</label>
                        <input class="form-control" type="date" id="tanggal_bergabung" name="tanggal_bergabung" value="<?= $user['tanggal_bergabung']; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Rekening</label>
                        <input class="form-control" type="number" id="nomor_rekening" name="nomor_rekening" value="<?= $user['nomor_rekening']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bank</label>
                        <input class="form-control" type="text" id="bank" name="bank" value="<?= $user['bank']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Kontak Darurat</label>
                        <input class="form-control" type="text" id="nama_kontak_darurat" name="nama_kontak_darurat" value="<?= $user['nama_kontak_darurat']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Darurat</label>
                        <input class="form-control" type="number" id="nomor_kontak_darurat" name="nomor_kontak_darurat" value="<?= $user['nomor_kontak_darurat']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hubungan</label>
                        <input class="form-control" type="text" id="hubungan" name="hubungan" value="<?= $user['hubungan']; ?>" required>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                    <a class="btn btn-outline-secondary" href="pengemudi.php">Batal</a>

                    <button class="btn btn-primary" type="submit">
                        Ubah Data
                    </button>
                </div>

                </form>
            </div>
            <!-- <div class="col-12 col-xl-4">
              <div class="panel h-100">
                <h2 class="h5 mb-3 section-title"><i class="bi bi-list-check" aria-hidden="true"></i><span>Access Checklist</span></h2>
                <div class="activity-list">
                  <div class="activity-item"><span class="activity-dot bg-success"></span><div><p class="mb-1 fw-semibold">Assign role</p><p class="text-muted small mb-0">Start with the least privileged role.</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-primary"></span><div><p class="mb-1 fw-semibold">Add team</p><p class="text-muted small mb-0">Team ownership controls dashboards.</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-warning"></span><div><p class="mb-1 fw-semibold">Send invite</p><p class="text-muted small mb-0">pengemudi receive activation by email.</p></div></div>
                </div>
              </div>
            </div> -->
          </section>
        </div>
      </main>

      <!-- <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success" href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a> </span>
          <span>Professional dashboard template.</span>
          <span>Validated user creation form.</span>
        </div>
      </footer> -->
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
