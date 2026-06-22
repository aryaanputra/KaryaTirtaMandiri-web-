<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_karyawan            = $_POST['id_karyawan'];
$alamat                 = $_POST['alamat'];
$nomor_telepon          = $_POST['nomor_telepon'];
$status_bekerja         = $_POST['status_bekerja'];
$status                 = $_POST['status'];
$nomor_rekening         = $_POST['nomor_rekening'];
$bank                   = $_POST['bank'];
$nama_kontak_darurat    = $_POST['nama_kontak_darurat'];
$nomor_telepon_darurat  = $_POST['nomor_telepon_darurat'];
$hubungan               = $_POST['hubungan'];

$sql = "UPDATE tb_karyawan SET
        alamat='$alamat',
        nomor_telepon='$nomor_telepon',
        status_bekerja='$status_bekerja',
        status='$status',
        nomor_rekening='$nomor_rekening',
        bank='$bank',
        nama_kontak_darurat='$nama_kontak_darurat',
        nomor_telepon_darurat='$nomor_telepon_darurat',
        hubungan='$hubungan'
        WHERE id_karyawan='$id_karyawan'";

if(mysqli_query($koneksi, $sql)){
    header("Location: karyawan.php");
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>