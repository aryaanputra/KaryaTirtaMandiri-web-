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
        FROM tb_pemesanan
        WHERE no_faktur LIKE '%$keyword%'
           OR id_pelanggan LIKE '%$keyword%'
           OR nama_pelanggan LIKE '%$keyword%'
           OR tanggal LIKE '%$keyword%'
        ORDER BY no_faktur ASC
    ");
}else{
    $querycari = mysqli_query($koneksi,"
        SELECT *
        FROM tb_pemesanan
        ORDER BY no_faktur ASC
    ");
}

$pemesanan = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pemesanan FROM tb_pemesanan");
$data_pemesanan = mysqli_fetch_assoc($pemesanan);
$total_pemesanan = $data_pemesanan['total_pemesanan'];

$total_pemasukan = mysqli_query($koneksi,"SELECT SUM(total) AS grand_total FROM tb_pemesanan");
$data_pemasukan = mysqli_fetch_assoc($total_pemasukan);

$query_pengeluaran = mysqli_query($koneksi, "SELECT SUM(d.jumlah * b.harga_beli) AS total_pengeluaran FROM tb_detail_pemesanan d JOIN tb_barang b ON d.id_barang = b.id_barang");
$data_pengeluaran = mysqli_fetch_assoc($query_pengeluaran);

$total_pendapatan = $data_pemasukan['grand_total'] - $data_pengeluaran['total_pengeluaran'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan ORDER BY no_faktur ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="SMU 10">
  <title>Laporan Pemesanan | Karya Tirta Mandiri</title>

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
            <span class="brand-subtitle">Sistem Manajemen Logistik</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link active" href="index.php" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link" href="karyawan.php">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Karyawan</span>
        </a>
        <a class="nav-link" href="pengemudi.php">
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
        <a class="nav-link active" href="laporan_pemesanan.php">
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

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>
            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  <span class="profile-name d-none d-sm-inline"> <?= $_SESSION['nama_user']; ?> </span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><hr class="dropdown-divider"></li>
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
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <h1 class="h3 mb-1">Laporan Pemesanan</h1>
                <p class="text-muted mb-0">Monitor performance, sales, users, and support from one clean workspace.</p>
              </div>
            </div>
            <div class="heading-actions">
              <a href="cetak_laporan_pemesanan.php" target="_blank" class="btn btn-primary">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i>
                Cetak Laporan
              </a>
            </div>
          </div>

          <section class="row g-3 mt-1" aria-label="Dashboard metrics">
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Total Pemesanan</span>
                  <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value"><?php echo $total_pemesanan; ?></div>
              </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Total Pendapatan</span>
                  <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></div>
              </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Total Pemasukan</span>
                  <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value"><?php echo "Rp".number_format($data_pemasukan['grand_total'], 0, ',', '.'); ?></div>
              </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Total Pengeluaran</span>
                  <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">Rp <?= number_format($data_pengeluaran['total_pengeluaran'], 0, ',', '.'); ?></div>
              </article>
            </div>
          </section>
          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Data pemesanan</span></h2>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                <thead>
                  <tr>
                    <th scope="col">No Faktur</th>
                    <th scope="col">ID Pelanggan</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col" class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($querycari)) { ?>
                    <tr>
                        <td><?= $row['no_faktur']; ?></td>
                        <td><?= $row['id_pelanggan']; ?></td>
                        <td><?= $row['nama_pelanggan']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td class="text-end">
                            <a class="btn btn-light btn-sm" href="detail_pemesanan.php?no_faktur=<?= $row['no_faktur']; ?>">View </a>
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
