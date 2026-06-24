<?php
include 'koneksi.php';

if (!isset($_GET['id_pelanggan'])) {
    die("ID pelanggan tidak ditemukan.");
}

$id_pelanggan = $_GET['id_pelanggan'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: pelanggan.php");
exit;
?>