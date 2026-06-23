<?php
include 'koneksi.php';

if (!isset($_GET['id_kendaraan'])) {
    die("ID Kendaraan tidak ditemukan.");
}

$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_kendaraan WHERE id_kendaraan = '$id_kendaraan'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: kendaraan.php");
exit;
?>