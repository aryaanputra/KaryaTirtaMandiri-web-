<?php
include 'koneksi.php';

if(!isset($_GET['no_faktur'])){
    die("No Faktur tidak ditemukan");
}

$no_faktur = $_GET['no_faktur'];

$query = mysqli_query($koneksi,"
    SELECT
        p.no_faktur,
        p.id_pelanggan,
        p.nama_pelanggan,
        p.tanggal,
        p.bayar,
        p.total,
        p.kembalian,
        d.id_barang,
        d.nama_barang,
        d.jumlah,
        d.harga_jual
    FROM tb_pemesanan p
    JOIN tb_detail_pemesanan d
        ON p.no_faktur = d.no_faktur
    WHERE p.no_faktur = '$no_faktur'
");

$header = mysqli_query($koneksi,"
    SELECT *
    FROM tb_pemesanan
    WHERE no_faktur='$no_faktur'
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
    
<h2>NOTA PEMBELIAN</h2>
<div style="margin-bottom:20px;">
    <strong>No Faktur :</strong> <?= $transaksi['no_faktur']; ?><br>
    <strong>Pelanggan :</strong> <?= $transaksi['nama_pelanggan']; ?><br>
    <strong>Tanggal   :</strong> <?= $transaksi['tanggal']; ?><br>
</div>
<table>
    <tr>
        <th>No</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Jual</th>
        <th>Subtotal</th>
    </tr>
<?php
$no = 1;
while($data = mysqli_fetch_assoc($query)){
    $subtotal = $data['jumlah'] * $data['harga_jual'];
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['id_barang']; ?></td>
    <td><?= $data['nama_barang']; ?></td>
    <td><?= $data['jumlah']; ?></td>
    <td>Rp <?= number_format($data['harga_jual'],0,',','.'); ?></td>
    <td>Rp <?= number_format($subtotal,0,',','.'); ?></td>
</tr>
<?php } ?>
<tr>
    <td colspan="5" align="right">
        <strong>Total</strong>
    </td>
    <td>
        <strong>
            Rp <?= number_format($transaksi['total'],0,',','.'); ?>
        </strong>
    </td>
</tr>
<tr>
    <td colspan="5" align="right">
        <strong>Bayar</strong>
    </td>
    <td>
        <strong>
            Rp <?= number_format($transaksi['bayar'],0,',','.'); ?>
        </strong>
    </td>
</tr>
<tr>
    <td colspan="5" align="right">
        <strong>Kembalian</strong>
    </td>
    <td>
        <strong>
            Rp <?= number_format($transaksi['kembalian'],0,',','.'); ?>
        </strong>
    </td>
</tr>
</table><br>
<div style="margin-bottom:20px;">
    <button onclick="window.print()" class="btn-print">
        Cetak Pemesanan
    </button>
    <button onclick="window.print()" class="btn-print">
        <a href="cetak_pemesanan..php?no_faktur=<?= $row['no_faktur']; ?>" class="btn btn-danger btn-sm">
            PDF
        </a>
</div>
</body>
</html>
