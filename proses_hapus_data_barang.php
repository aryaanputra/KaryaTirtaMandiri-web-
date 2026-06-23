<?php
include 'koneksi.php';

if (!isset($_GET['id_barang'])) {
    die("ID barang tidak ditemukan.");
}

$id_barang = $_GET['id_barang'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_barang WHERE id_barang = '$id_barang'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: barang.php");
exit;
?>