<?php
include 'koneksi.php';

$nama_user = $_POST['nama_user'];
$email     = $_POST['email'];
$no_telp   = $_POST['no_telp'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$role      = $_POST['role'];

mysqli_query($koneksi,"
    INSERT INTO users
    (nama_user,email,no_telp,username,password,role)
    VALUES
    ('$nama_user','$email','$no_telp','$username','$password','$role')
");

header("Location: pengguna.php");
exit;
?>