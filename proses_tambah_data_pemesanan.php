<?php

include 'koneksi.php';

$no_faktur      = $_POST['no_faktur'];
$id_pelanggan   = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$tanggal        = $_POST['tanggal'];
$total          = $_POST['total'];
$bayar          = $_POST['bayar'];
$kembalian      = $_POST['kembalian'];

mysqli_query($koneksi,"
INSERT INTO tb_pemesanan
(
    no_faktur,
    id_pelanggan,
    nama_pelanggan,
    tanggal,
    bayar,
    total,
    kembalian
)
VALUES
(
    '$no_faktur',
    '$id_pelanggan',
    '$nama_pelanggan',
    '$tanggal',
    '$bayar',
    '$total',
    '$kembalian'
)
");

for($i=0; $i<count($_POST['id_barang']); $i++){

    $id_barang = $_POST['id_barang'][$i];
    $nama_barang = $_POST['nama_barang'][$i];
    $jumlah = $_POST['jumlah'][$i];
    $harga_jual = $_POST['harga_jual'][$i];

    mysqli_query($koneksi,"
    INSERT INTO tb_detail_pemesanan
    (
        no_faktur,
        id_barang,
        nama_barang,
        jumlah,
        harga_jual
    )
    VALUES
    (
        '$no_faktur',
        '$id_barang',
        '$nama_barang',
        '$jumlah',
        '$harga_jual'
    )
    ");
}

header("Location: pemesanan.php");
exit;
?>