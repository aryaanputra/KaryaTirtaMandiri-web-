<?php
include 'koneksi.php';

if (!isset($_GET['id_user'])) {
    die("ID Pengguna tidak ditemukan.");
}

$id_user = $_GET['id_user'];

$query = mysqli_query($koneksi,
    "DELETE FROM users WHERE id_user = '$id_user'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: pengguna.php");
exit;
?>