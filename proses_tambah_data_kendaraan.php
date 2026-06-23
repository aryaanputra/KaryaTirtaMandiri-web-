xml_parser_set_option<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_kendaraan        = $_POST['id_kendaraan'];
$merk_kendaraan      = $_POST['merk_kendaraan'];
$platnomor           = $_POST['platnomor'];

$query = mysqli_query($koneksi,"
    INSERT INTO tb_kendaraan
    (
        id_kendaraan, merk_kendaraan, platnomor
    )
    VALUES
    (
        '$id_kendaraan', '$merk_kendaraan', '$platnomor'
    )
");

if(!$query){
    die("Gagal menyimpan data: ".mysqli_error($koneksi));
}

header("Location: kendaraan.php");
exit;
?>