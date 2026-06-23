<?php
include 'koneksi.php';

if (!isset($_GET['id_pengemudi'])) {
    die("ID pengemudi tidak ditemukan.");
}

$id_pengemudi = $_GET['id_pengemudi'];

$query = mysqli_query($koneksi,
    "DELETE FROM tb_pengemudi WHERE id_pengemudi = '$id_pengemudi'"
);

if (!$query) {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}

header("Location: pengemudi.php");
exit;
?>