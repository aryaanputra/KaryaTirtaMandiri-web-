<?php
include 'koneksi.php';
$query = mysqli_query($koneksi,"
    SELECT * FROM tb_kendaraan
");

$header = mysqli_query($koneksi,"
    SELECT *
    FROM tb_kendaraan
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
    
<h2>DATA kendaraan</h2>
<!-- <div style="margin-bottom:20px;">
    <strong>ID kendaraan :</strong> <?= $transaksi['id_kendaraan']; ?><br>
    <strong>Nama kendaraan :</strong> <?= $transaksi['nama_kendaraan']; ?><br>
    <strong>Tanggal Bergabung   :</strong> <?= $transaksi['tanggal_bergabung']; ?><br>
</div> -->
<table>
    <tr>
        <th>ID Kendaraan</th>
        <th>Merk Kendaraan</th>
        <th>Plat Nomor</th>
    </tr>
<?php
while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $data['id_kendaraan']; ?></td>
    <td><?= $data['merk_kendaraan']; ?></td>
    <td><?= $data['platnomor']; ?></td>
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
