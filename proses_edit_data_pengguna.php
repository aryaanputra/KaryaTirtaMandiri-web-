<?php
include 'koneksi.php';

$id_user   = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$email     = $_POST['email'];
$no_telp   = $_POST['no_telp'];
$username  = $_POST['username'];
$role      = $_POST['role'];
$password  = $_POST['password'];

mysqli_query($koneksi,"UPDATE users SET nama_user='$nama_user', email='$email', no_telp='$no_telp', username='$username', password='$password', role='$role' WHERE id_user='$id_user'");

header("Location: pengguna.php");
exit;
?>