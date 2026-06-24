<?php
include 'koneksi.php';
$query = mysqli_query($koneksi,"
    SELECT
        p.no_faktur,
        p.nama_pelanggan,
        p.tanggal,
        p.total,
        d.nama_barang,
        d.jumlah,
        d.harga_jual
    FROM tb_pemesanan p
    JOIN tb_detail_pemesanan d
        ON p.no_faktur = d.no_faktur
    ORDER BY p.no_faktur DESC
");
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
<h2>LAPORAN PEMESANAN</h2>
<table>
    <tr>
        <th>No</th>
        <th>No Faktur</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Jual</th>
        <th>Subtotal</th>
    </tr>
<?php
$no = 1;
while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['no_faktur']; ?></td>
    <td><?= $data['nama_pelanggan']; ?></td>
    <td><?= $data['tanggal']; ?></td>
    <td><?= $data['nama_barang']; ?></td>
    <td><?= $data['jumlah']; ?></td>
    <td>Rp <?= number_format($data['harga_jual'],0,',','.'); ?></td>
    <td>
        Rp <?= number_format($data['jumlah'] * $data['harga_jual'],0,',','.'); ?>
    </td>
</tr>
<?php } ?>
</table>
<div style="margin-bottom:20px;"> <br>
    <button onclick="window.print()" class="btn-print"> Cetak Laporan </button> 
</div>
</body>
</html>