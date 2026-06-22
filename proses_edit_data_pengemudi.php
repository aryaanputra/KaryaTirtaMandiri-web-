<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_pengemudi           = $_POST['id_pengemudi'];
$alamat_pengemudi       = $_POST['alamat_pengemudi'];
$nomor_telepon          = $_POST['nomor_telepon'];
$status_kerja           = $_POST['status_kerja'];
$status_aktif           = $_POST['status_aktif'];
$nomor_rekening         = $_POST['nomor_rekening'];
$bank                   = $_POST['bank'];
$nama_kontak_darurat    = $_POST['nama_kontak_darurat'];
$nomor_kontak_darurat  = $_POST['nomor_kontak_darurat'];
$hubungan               = $_POST['hubungan'];

$sql = "UPDATE tb_pengemudi SET
        alamat_pengemudi='$alamat_pengemudi',
        nomor_telepon='$nomor_telepon',
        status_kerja='$status_kerja',
        status_aktif='$status_aktif',
        nomor_rekening='$nomor_rekening',
        bank='$bank',
        nama_kontak_darurat='$nama_kontak_darurat',
        nomor_kontak_darurat='$nomor_kontak_darurat',
        hubungan='$hubungan'
        WHERE id_pengemudi='$id_pengemudi'";

if(mysqli_query($koneksi, $sql)){
    header("Location: pengemudi.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>