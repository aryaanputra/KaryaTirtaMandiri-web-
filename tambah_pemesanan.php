<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit;
}

function generate_no_faktur(){
     return date('dmYHis');
}

$no_faktur = generate_no_faktur();
$tanggal = date('d-m-Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>pemesanan | Karya Tirta Mandiri</title>

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
        <a class="nav-link" href="index.php" aria-current="page">
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
        <a class="nav-link active" href="pemesanan.php">
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
              <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Tambah</p>
                <h1 class="h3 mb-1">Data pemesanan</h1>
                <p class="text-muted mb-0">Menambahkan data pemesanan.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="pemesanan.php"><i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-8">
              <form action="proses_tambah_data_pemesanan.php" method="POST">
                <div class="row mb-3">

                    <div class="col-md-6">
                        <label>No Faktur</label>
                        <input type="text"
                            class="form-control"
                            name="no_faktur"
                            value="<?= $no_faktur ?>"
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label>Tanggal</label>
                        <input type="text"
                            class="form-control"
                            name="tanggal"
                            value="<?= $tanggal ?>"
                            readonly>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label>ID Pelanggan</label>
                        <input type="text"
                            class="form-control"
                            id="id_pelanggan"
                            name="id_pelanggan"
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label>Nama Pelanggan</label>

                        <select class="form-control"
                                id="nama_pelanggan"
                                name="nama_pelanggan"
                                required>

                            <option value="">Pilih Pelanggan</option>

                            <?php
                            $q = mysqli_query($koneksi,
                                "SELECT * FROM tb_pelanggan");

                            while($d = mysqli_fetch_assoc($q)){
                            ?>
                                <option
                                    value="<?= $d['nama_pelanggan'] ?>"
                                    data-id="<?= $d['id_pelanggan'] ?>">
                                    <?= $d['nama_pelanggan'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-3">
                        <label>ID Barang</label>
                        <input type="text"
                            class="form-control"
                            id="id_barang"
                            readonly>
                    </div>

                    <div class="col-md-3">
                        <label>Nama Barang</label>

                        <select class="form-control"
                                id="nama_barang">

                            <option value="">Pilih Barang</option>

                            <?php
                            $q = mysqli_query($koneksi,
                                "SELECT * FROM tb_barang");

                            while($d = mysqli_fetch_assoc($q)){
                            ?>
                                <option
                                    value="<?= $d['nama_barang'] ?>"
                                    data-id="<?= $d['id_barang'] ?>"
                                    data-harga="<?= $d['harga_jual'] ?>">
                                    <?= $d['nama_barang'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Harga</label>
                        <input type="text"
                            class="form-control"
                            id="harga_jual"
                            readonly>
                    </div>

                    <div class="col-md-2">
                        <label>Jumlah</label>
                        <input type="number"
                            class="form-control"
                            id="jumlah">
                    </div>
                    

                    <div class="col-md-1">
                        <label>&nbsp;</label>

                        <button type="button"
                                class="btn btn-primary form-control"
                                onclick="tambahBarang()">
                            +
                        </button>

                    </div>

                </div>

                <br>

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="detail_pemesanan"></tbody>

                </table>

                <div class="row">

                    <div class="col-md-4">
                        <label>Total</label>
                        <input type="text"
                            id="total"
                            name="total"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="col-md-4">
                        <label>Bayar</label>
                        <input type="number"
                            id="bayar"
                            name="bayar"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label>Kembalian</label>
                        <input type="text"
                            id="kembalian"
                            name="kembalian"
                            class="form-control"
                            readonly>
                    </div>

                </div>

                <br>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan Pemesanan
                </button>

                <script>
                    document.getElementById('nama_pelanggan') .addEventListener('change', function(){
                        let selected = this.options[this.selectedIndex];
                        document.getElementById('id_pelanggan').value = selected.getAttribute('data-id');
                    });

                    document.getElementById('nama_barang') .addEventListener('change', function(){
                        let selected = this.options[this.selectedIndex];
                        document.getElementById('id_barang').value = selected.getAttribute('data-id');
                        document.getElementById('harga_jual').value = selected.getAttribute('data-harga');

                    });

                    function tambahBarang(){
                        let idBarang = document.getElementById('id_barang').value;
                        let namaBarang = document.getElementById('nama_barang').value;
                        let harga = document.getElementById('harga_jual').value;
                        let jumlah = document.getElementById('jumlah').value;
                        let subtotal = harga * jumlah;
                        let row = `
                        <tr>
                        <td>
                            ${idBarang}
                            <input type="hidden" name="id_barang[]" value="${idBarang}">
                        </td>
                        <td>
                            ${namaBarang}
                            <input type="hidden" name="nama_barang[]" value="${namaBarang}">
                        </td>
                        <td>
                            ${harga}
                            <input type="hidden" name="harga_jual[]" value="${harga}">
                        </td>
                        <td>
                            ${jumlah}
                            <input type="hidden" name="jumlah[]" value="${jumlah}">
                        </td>
                        <td>${subtotal}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button>
                        </td>
                        </tr>
                        `;
                        document.getElementById("detail_pemesanan").insertAdjacentHTML("beforeend", row);
                        hitungTotal();
                    }

                    function hapusBaris(btn){
                        btn.closest('tr').remove();hitungTotal();
                    }

                    function hitungTotal(){
                        let total = 0;
                        document.querySelectorAll('#detail_pemesanan tr').forEach(row => {
                            let harga = row.querySelector('input[name="harga_jual[]"]').value;
                            let jumlah = row.querySelector('input[name="jumlah[]"]').value;
                            total += harga * jumlah;
                        });
                        document.getElementById('total').value = total;
                    }

                    document.getElementById('bayar').addEventListener('input', function(){
                        let bayar = parseInt(this.value) || 0;
                        let total = parseInt(document.getElementById('total').value) || 0;

                        let kembalian = bayar - total;

                        document.getElementById('kembalian').value = kembalian;

                    });

                    </script>
            </form>
            </div>
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
