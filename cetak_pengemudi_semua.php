<?php
include 'koneksi.php';
$query = mysqli_query($koneksi,"
    SELECT * FROM tb_pengemudi
");

$header = mysqli_query($koneksi,"
    SELECT *
    FROM tb_pengemudi
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
    
<h2>DATA PENGEMUDI</h2>
<!-- <div style="margin-bottom:20px;">
    <strong>ID pengemudi :</strong> <?= $transaksi['id_pengemudi']; ?><br>
    <strong>Nama pengemudi :</strong> <?= $transaksi['nama_pengemudi']; ?><br>
    <strong>Tanggal Bergabung   :</strong> <?= $transaksi['tanggal_bergabung']; ?><br>
</div> -->
<table>
    <tr>
        <th>ID pengemudi</th>
        <th>Nama pengemudi</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Nomor SIM</th>
        <th>Status Bekerja</th>
        <th>Status</th>
        <th>Tanggal Bergabung</th>
        <th>Nomor Rekening</th>
        <th>Bank</th>
        <th>Nama Kontak Darurat</th>
        <th>Nomor Kontak Darurat</th>
    </tr>
<?php
while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $data['id_pengemudi']; ?></td>
    <td><?= $data['nama_pengemudi']; ?></td>
    <td><?= $data['tempat_lahir']; ?></td>
    <td><?= $data['tanggal_lahir']; ?></td>
    <td><?= $data['jenis_kelamin']; ?></td>
    <td><?= $data['alamat_pengemudi']; ?></td>
    <td><?= $data['nomor_telepon']; ?></td>
    <td><?= $data['nomor_sim']; ?></td>
    <td><?= $data['status_kerja']; ?></td>
    <td><?= $data['status_aktif']; ?></td>
    <td><?= $data['tanggal_bergabung']; ?></td>
    <td><?= $data['nomor_rekening']; ?></td>
    <td><?= $data['bank']; ?></td>
    <td><?= $data['nama_kontak_darurat']; ?></td>
    <td><?= $data['nomor_kontak_darurat']; ?></td>
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
