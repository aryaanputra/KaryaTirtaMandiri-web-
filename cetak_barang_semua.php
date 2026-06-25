<?php
include 'koneksi.php';
$query = mysqli_query($koneksi,"
    SELECT * FROM tb_barang
");

$header = mysqli_query($koneksi,"
    SELECT *
    FROM tb_barang
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
    
<h2>DATA BARANG</h2>
<!-- <div style="margin-bottom:20px;">
    <strong>ID barang :</strong> <?= $transaksi['id_barang']; ?><br>
    <strong>Nama barang :</strong> <?= $transaksi['nama_barang']; ?><br>
    <strong>Tanggal Bergabung   :</strong> <?= $transaksi['tanggal_bergabung']; ?><br>
</div> -->
<table>
    <tr>
        <th>ID barang</th>
        <th>Nama barang</th>
        <th>Kategori</th>
        <th>Deskripsi</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Satuan</th>
        <th>Nama Supplier</th>
        <th>Alamat Supplier</th>
    </tr>
<?php
while($data = mysqli_fetch_assoc($query)){
?>
<tr>
    <td><?= $data['id_barang']; ?></td>
    <td><?= $data['nama_barang']; ?></td>
    <td><?= $data['kategori']; ?></td>
    <td><?= $data['deskripsi']; ?></td>
    <td><?= $data['harga_beli']; ?></td>
    <td><?= $data['harga_jual']; ?></td>
    <td><?= $data['satuan']; ?></td>
    <td><?= $data['nama_supplier']; ?></td>
    <td><?= $data['alamat_supplier']; ?></td>
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
