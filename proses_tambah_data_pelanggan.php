xml_parser_set_option<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_kendaraan        = $_POST['id_pelanggan'];
$merk_kendaraan      = $_POST['nama_pelanggan'];
$platnomor           = $_POST['no_telp'];

$query = mysqli_query($koneksi,"
    INSERT INTO tb_pelanggan
    (
        id_pelanggan, nama_pelanggan, no_telp
    )
    VALUES
    (
        '$id_pelanggan', '$nama_pelanggan', '$no_telp'
    )
");

if(!$query){
    die("Gagal menyimpan data: ".mysqli_error($koneksi));
}

header("Location: pelanggan.php");
exit;
?>