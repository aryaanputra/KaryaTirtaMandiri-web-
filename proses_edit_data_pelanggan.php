<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_pelanggan         = $_POST['id_pelanggan'];
$nama_pelanggan        = $_POST['nama_pelanggan'];
$no_telp             = $_POST['no_telp'];

$sql = "UPDATE tb_pelanggan SET
        nama_pelanggan='$nama_pelanggan',
        no_telp='$no_telp'
        WHERE id_pelanggan='$id_pelanggan'";

if(mysqli_query($koneksi, $sql)){
    header("Location: pelanggan.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>