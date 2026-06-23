<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_barang      = $_POST['id_barang'];
$harga_beli     = $_POST['harga_beli'];
$harga_jual     = $_POST['harga_jual'];
$alamat_supplier= $_POST['alamat_supplier'];

$sql = "UPDATE tb_barang SET
        harga_beli='$harga_beli',
        harga_jual='$harga_jual',
        alamat_supplier='$alamat_supplier'
        WHERE id_barang='$id_barang'";

if(mysqli_query($koneksi, $sql)){
    header("Location: barang.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>