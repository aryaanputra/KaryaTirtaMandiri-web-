<?php
include 'koneksi.php';
$query = mysqli_query($koneksi,"
    SELECT * FROM tb_pelanggan
");

$header = mysqli_query($koneksi,"
    SELECT *
    FROM tb_pelanggan
");

$transaksi = mysqli_fetch_assoc($header);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemesanan</title>
<style>
     .btn-print{ 
     background:#60a5fa; 
     color:white; 
     border:none; 
     padding:10px 20px; 
     border-radius:5px; 
     cursor:pointer; 
     } 
     .btn-print:hover{ opacity:0.9; } 
     @media print{ 
     .btn-print{ display:none; } 
    } 
    body{
        font-family: Arial, sans-serif;
    }
    h2{
        text-align:center;
    }
    table{
        width:100%;
        border-collapse:collapse;
    }
    table, th, td{
        border:1px solid black;
    }
    th, td{
        padding:8px;
        text-align:center;
    }
</style>
</head>
<body>
    
<h2>DATA PELANGGAN</h2>
<!-- <div style="margin-bottom:20px;">
    <strong>ID pelanggan :</strong> <?= $transaksi['id_pelanggan']; ?><br>
    <strong>Nama pelanggan :</strong> <?= $transaksi['nama_pelanggan']; ?><br>
    <strong>Tanggal Bergabung   :</strong> <?= $transaksi['tanggal_bergabung']; ?><br>
</div> -->
<table>
    <tr>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Nomor Telepon</th>
    </tr>
<?php
while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $data['id_pelanggan']; ?></td>
    <td><?= $data['nama_pelanggan']; ?></td>
    <td><?= $data['no_telp']; ?></td>
</tr>
<?php } ?>
</table><br>
<div style="margin-bottom:20px;">
    <button onclick="window.print()" class="btn-print">
        Cetak
    </button>
</div>
</body>
</html>
