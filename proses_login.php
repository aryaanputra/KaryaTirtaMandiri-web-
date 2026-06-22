<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM tb_user WHERE username='$username'"
);

if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}

$user = mysqli_fetch_assoc($query);

if ($user) {

    if ($password == $user['password']) {

        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama_user'] = $user['nama_user'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php");
        exit;

    } else {

        echo "Password salah";

    }

} else {

    echo "Username tidak ditemukan";

}
?>