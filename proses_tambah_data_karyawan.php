xml_parser_set_option<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_karyawan            = $_POST['id_karyawan'];
$nama_karyawan          = $_POST['nama_karyawan'];
$tempat_lahir           = $_POST['tempat_lahir'];
$tanggal_lahir          = $_POST['tanggal_lahir'];
$jenis_kelamin          = $_POST['jenis_kelamin'];
$alamat                 = $_POST['alamat'];
$nomor_telepon          = $_POST['nomor_telepon'];
$status_bekerja         = $_POST['status_bekerja'];
$status                 = $_POST['status'];
$tanggal_bergabung      = $_POST['tanggal_bergabung'];
$nomor_rekening         = $_POST['nomor_rekening'];
$bank                   = $_POST['bank'];
$nama_kontak_darurat    = $_POST['nama_kontak_darurat'];
$nomor_telepon_darurat  = $_POST['nomor_telepon_darurat'];
$hubungan               = $_POST['hubungan'];

$query = mysqli_query($koneksi,"
    INSERT INTO tb_karyawan
    (
        id_karyawan, nama_karyawan, tempat_lahir, tanggal_lahir, 
        jenis_kelamin, alamat, nomor_telepon, status_bekerja,
        status, tanggal_bergabung, nomor_rekening, bank,
        nama_kontak_darurat, nomor_telepon_darurat, hubungan
    )
    VALUES
    (
        '$id_karyawan', '$nama_karyawan', '$tempat_lahir', '$tanggal_lahir','$jenis_kelamin', 
        '$alamat', '$nomor_telepon', '$status_bekerja', '$status', '$tanggal_bergabung', 
        '$nomor_rekening', '$bank', '$nama_kontak_darurat', '$nomor_telepon_darurat', '$hubungan'
    )
");

if(!$query){
    die("Gagal menyimpan data: ".mysqli_error($koneksi));
}

header("Location: karyawan.php");
exit;
?>