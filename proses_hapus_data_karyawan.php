<?php
include 'koneksi.php';

if (!isset($_GET['id_karyawan'])) {
    die("ID Karyawan tidak ditemukan.");
}

$id_karyawan = $_GET['id_karyawan'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_karyawan WHERE id_karyawan = '$id_karyawan'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: karyawan.php");
exit;
?>