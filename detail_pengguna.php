<?php
include 'koneksi.php';

if (!isset($_GET['id_user'])) {
    die("ID User tidak ditemukan");
}

$id_user = $_GET['id_user'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>Detail Pengguna | SMU 10</title>

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
            <span class="brand-title">SMU 10</span>
            <span class="brand-subtitle">Unggul, Cerdas</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link active" href="index.php" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link" href="pengguna.php">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Pengguna</span>
        </a>
        <a class="nav-link" href="jurusan.php">
          <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
          <span class="nav-text">Jurusan</span>
        </a>
        <a class="nav-link" href="jalur_pendaftaran.php">
          <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
          <span class="nav-text">Jalur Pendaftaran</span>
        </a>
        <a class="nav-link" href="calon_siswa.php">
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Calon Siswa</span>
        </a>
        <a class="nav-link" href="pengumuman.php">
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Pengumuman</span>
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
            <input class="form-control search-input" type="search" placeholder="Search users, orders, reports" aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>
            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                <span class="notification-dot"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notifications</div>
                <a class="dropdown-item" href="users.html">
                  <span class="notification-title">New user registered</span>
                  <span class="notification-time">4 minutes ago</span>
                </a>
                <a class="dropdown-item" href="charts.html">
                  <span class="notification-title">Revenue target reached</span>
                  <span class="notification-time">32 minutes ago</span>
                </a>
                <a class="dropdown-item" href="settings.html">
                  <span class="notification-title">Security review completed</span>
                  <span class="notification-time">1 hour ago</span>
                </a>
              </div>
            </div>

            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="avatar-img avatar-sm" src="assets/images/avatar/avatar.jpg" alt="Admin Hasan">
                <span class="profile-name d-none d-sm-inline">Admin Hasan</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><a class="dropdown-item" href="settings.html">Account settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="login.html">Sign out</a></li>
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
                <h1 class="h3 mb-1">Detail Pengguna</h1>
                <p class="text-muted mb-0">Inspect account status, profile data, permissions, and recent activity.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="users.html"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a><a class="btn btn-primary btn-sm" href="add-user.html"><i class="bi bi-person-plus" aria-hidden="true"></i> Add User</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-4">
              <div class="panel h-100 text-center profile-card">
                <div class="profile-cover"><img src="assets/images/png/dasher-ui-bootstrap-5.jpg" alt="User workspace preview"></div>
                <div class="profile-hero">
                  <img class="avatar-img avatar-xl profile-photo" src="assets/images/avatar/avatar-1.jpg" alt="Sarah Ahmed">
                  <h2 class="h5 mb-1"><?= $user['nama_user']; ?></h2>
                  <span class="badge text-bg-success"><?= $user['role']; ?></span>
                </div>
                <div class="info-list mt-4 text-start">
                  <div><span>Username</span><strong><?= $user['username']; ?></strong></div>
                  <div><span>Password</span><strong><?= $user['password']; ?></strong></div>
                  <div><span>Email</span><strong><?= $user['email']; ?></strong></div>
                  <div><span>Phone</span><strong><?= $user['no_telp']; ?></strong></div>
                  <div><span>Tanggal Bergabung</span><strong><?= $user['created_at']; ?></strong></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="panel mb-3">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-person-lines-fill" aria-hidden="true"></i><span>Detail Account</span></h2><p class="text-muted mb-0">Permissions, plan, and current access details.</p></div><button class="btn btn-primary btn-sm" type="button" onclick="window.location.href='edit_pengguna.php?id_user=<?= $user['id_user']; ?>'">Edit Pengguna</button></div>
                <div class="row g-3">
                  <div class="col-md-4"><div class="mini-card"><span>Role</span><strong><?= $user['role']; ?></strong></div></div>
                  <div class="col-md-4"><div class="mini-card"><span>Last Login</span><strong>Today</strong></div></div>
                  <div class="col-md-4"><div class="mini-card"><span>Projects</span><strong>14 Active</strong></div></div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-clock-history" aria-hidden="true"></i><span>Recent Activity</span></h2><p class="text-muted mb-0">Latest security and workflow events.</p></div></div>
                <div class="activity-list">
                  <div class="activity-item"><span class="activity-dot bg-primary"></span><div><p class="mb-1 fw-semibold">Updated billing permissions</p><p class="text-muted small mb-0">2 hours ago</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-success"></span><div><p class="mb-1 fw-semibold">Approved new teammate</p><p class="text-muted small mb-0">Yesterday</p></div></div>
                  <div class="activity-item"><span class="activity-dot bg-warning"></span><div><p class="mb-1 fw-semibold">Changed password</p><p class="text-muted small mb-0">Apr 30, 2026</p></div></div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success" href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a> </span>
          <span>Professional dashboard template.</span>
          <span>Detailed account profile.</span>
        </div>
      </footer>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
