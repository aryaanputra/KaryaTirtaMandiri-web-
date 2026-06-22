xml_parser_set_option<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id_pengemudi           = $_POST['id_pengemudi'];
$nama_pengemudi         = $_POST['nama_pengemudi'];
$tempat_lahir           = $_POST['tempat_lahir'];
$tanggal_lahir          = $_POST['tanggal_lahir'];
$jenis_kelamin          = $_POST['jenis_kelamin'];
$alamat_pengemudi       = $_POST['alamat_pengemudi'];
$nomor_telepon          = $_POST['nomor_telepon'];
$status_kerja           = $_POST['status_kerja'];
$status_aktif           = $_POST['status_aktif'];
$nomor_sim              = $_POST['nomor_sim'];
$masa_berlaku           = $_POST['masa_berlaku'];
$tanggal_bergabung      = $_POST['tanggal_bergabung'];
$nomor_rekening         = $_POST['nomor_rekening'];
$bank                   = $_POST['bank'];
$nama_kontak_darurat    = $_POST['nama_kontak_darurat'];
$nomor_kontak_darurat   = $_POST['nomor_kontak_darurat'];
$hubungan               = $_POST['hubungan'];

$query = mysqli_query($koneksi,"
    INSERT INTO tb_pengemudi
    (
        id_pengemudi, nama_pengemudi, tempat_lahir, tanggal_lahir, 
        jenis_kelamin, alamat_pengemudi, nomor_telepon, status_kerja,
        status_aktif, nomor_sim, masa_berlaku, tanggal_bergabung, nomor_rekening, bank,
        nama_kontak_darurat, nomor_kontak_darurat, hubungan
    )
    VALUES
    (
        '$id_pengemudi', '$nama_pengemudi', '$tempat_lahir', '$tanggal_lahir','$jenis_kelamin', 
        '$alamat_pengemudi', '$nomor_telepon', '$status_kerja', '$status_aktif', '$nomor_sim', '$masa_berlaku', '$tanggal_bergabung', 
        '$nomor_rekening', '$bank', '$nama_kontak_darurat', '$nomor_kontak_darurat', '$hubungan'
    )
");

if(!$query){
    die("Gagal menyimpan data: ".mysqli_error($koneksi));
}

header("Location: pengemudi.php");
exit;
?>