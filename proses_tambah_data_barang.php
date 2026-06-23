xml_parser_set_option<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_barang          = $_POST['id_barang'];
$nama_barang        = $_POST['nama_barang'];
$kategori           = $_POST['kategori'];
$deskripsi          = $_POST['deskripsi'];
$harga_beli         = $_POST['harga_beli'];
$harga_jual         = $_POST['harga_jual'];
$satuan             = $_POST['satuan'];
$nama_supplier      = $_POST['nama_supplier'];
$alamat_supplier    = $_POST['alamat_supplier'];

$query = mysqli_query($koneksi,"
    INSERT INTO tb_barang
    (
        id_barang, nama_barang, kategori, deskripsi, 
        harga_beli, harga_jual, satuan, nama_supplier,
        alamat_supplier
    )
    VALUES
    (
        '$id_barang', '$nama_barang', '$kategori', '$deskripsi','$harga_beli', 
        '$harga_jual', '$satuan', '$nama_supplier', '$alamat_supplier'
    )
");

if(!$query){
    die("Gagal menyimpan data: ".mysqli_error($koneksi));
}

header("Location: barang.php");
exit;
?>