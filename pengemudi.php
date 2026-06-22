<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

$keyword = $_GET['keyword'] ?? '';

if($keyword != ''){
    $querycari = mysqli_query($koneksi,"
        SELECT *
        FROM tb_pengemudi
        WHERE id_pengemudi LIKE '%$keyword%'
           OR nama_pengemudi LIKE '%$keyword%'
           OR nomor_telepon LIKE '%$keyword%'
        ORDER BY id_pengemudi ASC
    ");
}else{
    $querycari = mysqli_query($koneksi,"
        SELECT *
        FROM tb_pengemudi
        ORDER BY id_pengemudi ASC
    ");
}

$pengemudi = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pengemudi FROM tb_pengemudi");
$data_pengemudi = mysqli_fetch_assoc($pengemudi);
$total_pengemudi = $data_pengemudi['total_pengemudi'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_pengemudi ORDER BY id_pengemudi ASC");
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
            <span class="brand-subtitle">Sistem Manjemen Logistik</span>
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
              <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Data</p>
                <h1 class="h3 mb-1">Pengemudi</h1>
                <p class="text-muted mb-0">Mengelola data pengemudi.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="tables.html"><i class="bi bi-download" aria-hidden="true"></i> Cetak Data</a><a class="btn btn-primary btn-sm" href="tambah_pengemudi.php"><i class="bi bi-person-plus" aria-hidden="true"></i>Tambah Data</a></div>
          </div>

          <section class="row g-3 mt-1" aria-label="User summary">
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-primary">
                <div class="metric-top">
                  <span class="metric-label">Total pengemudi</span>
                  <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value"><?php echo $total_pengemudi; ?></div>
                <!-- <div class="metric-meta">
                  <span class="text-success">+5.1%</span>
                  <span>this month</span>
                </div> -->
              </article>
            </div>

          </section>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Data pengemudi</span></h2>
                <p class="text-muted mb-0">Mencari, meninjau, dan mengelola data pengemudi.</p>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <form method="GET" action="">
                    <input class="form-control search-input" type="search" name="keyword" placeholder="Cari pengemudi" value="<?= $_GET['keyword'] ?? ''; ?>">
                </form>
                <a class="btn btn-primary btn-sm" href="tambah_pengemudi.php"><i class="bi bi-person-plus" aria-hidden="true"></i> Tambah Data</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Status Bekerja</th>
                    <th scope="col">Tanggal Bergabung</th>
                    <th scope="col" class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($querycari)) { ?>
                    <tr>
                        <td><?= $row['id_pengemudi']; ?></td>
                        <td><?= $row['nama_pengemudi']; ?></td>
                        <td><?= $row['nomor_telepon']; ?></td>
                        <td><?= $row['status_kerja']; ?></td>
                        <td><?= $row['tanggal_bergabung']; ?></td>
                        <td class="text-end">
                            <a class="btn btn-light btn-sm" href="detail_pengemudi.php?id_pengemudi=<?= $row['id_pengemudi']; ?>">View </a>
                            <a class="btn btn-danger btn-sm" href="proses_hapus_data_pengemudi.php?id_pengemudi=<?= $row['id_pengemudi']; ?>" onclick="return confirm('Yakin ingin menghapus data pengguna ini?')">Delete </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-3">
              <p class="text-muted small mb-0">Showing 1 to 5 of 124 users</p>
              <nav aria-label="Users pagination"><ul class="pagination pagination-sm mb-0"><li class="page-item disabled"><a class="page-link" href="#">Previous</a></li><li class="page-item active"><a class="page-link" href="#">1</a></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">Next</a></li></ul></nav>
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
