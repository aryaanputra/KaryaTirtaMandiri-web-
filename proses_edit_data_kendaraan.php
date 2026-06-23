<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_kendaraan           = $_POST['id_kendaraan'];
$merk_kendaraan         = $_POST['merk_kendaraan'];
$platnomor              = $_POST['platnomor'];

$sql = "UPDATE tb_kendaraan SET
        merk_kendaraan='$merk_kendaraan',
        platnomor='$platnomor'
        WHERE id_kendaraan='$id_kendaraan'";

if(mysqli_query($koneksi, $sql)){
    header("Location: kendaraan.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>