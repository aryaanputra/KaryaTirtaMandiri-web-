<?php
include 'koneksi.php';

if (!isset($_GET['no_faktur'])) {
    die("No Faktur tidak ditemukan.");
}

$no_faktur = $_GET['no_faktur'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_pemesanan WHERE tb_pemesanan = '$no_faktur'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: pemesanan.php");
exit;
?>