-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2026 at 03:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyatirtamandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` enum('Air Konsumsi','Air Nonkonsumsi') NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kategori`, `deskripsi`, `harga_beli`, `harga_jual`, `satuan`, `nama_supplier`, `alamat_supplier`) VALUES
('BRG001', 'Air Bersih', 'Air Konsumsi', 'Air bersih layak minum untuk rumah tangga', 50000, 60000, 'liter', 'Tirta Sejahtera', 'Bandung'),
('BRG002', 'Air Bersih', 'Air Nonkonsumsi', 'Air bersih untuk mandi dan cuci', 200000, 300000, 'liter', 'Sumber Air Jaya', 'Bekasi'),
('BRG004', 'Air Bersih', 'Air Nonkonsumsi', 'Air sumur untuk kebutuhan umum', 100000, 150000, 'liter', 'Sumur Makmur', 'Bogor'),
('BRG005', 'Air Bersih', 'Air Konsumsi', 'Ini bisa untuk siram tanaman', 7000, 10000, 'Liter', 'Air Bersih Aryaan', 'Jl. Unindra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pemesanan`
--

CREATE TABLE `tb_detail_pemesanan` (
  `id__detail` int(11) NOT NULL,
  `no_faktur` varchar(14) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detail_pemesanan`
--

INSERT INTO `tb_detail_pemesanan` (`id__detail`, `no_faktur`, `id_barang`, `nama_barang`, `jumlah`, `harga_jual`) VALUES
(1, '20260511090706', 'BRG003', 'Air Konsumsi', 2, 90000),
(2, '20260511090952', 'BRG003', 'Air Konsumsi', 5, 90000),
(3, '20260511094914', 'BRG003', 'Air Konsumsi', 2, 90000),
(4, '20260511095358', 'BRG005', 'Air Konsumsi', 5, 10000),
(5, '20260511095454', 'BRG004', 'Air Nonkonsumsi', 1, 150000),
(6, '20260511095454', 'BRG001', 'Air Konsumsi', 1, 80000),
(7, '20260511095454', 'BRG002', 'Air Nonkonsumsi', 1, 300000),
(8, '20260513151601', 'BRG001', 'Air Konsumsi', 2, 80000),
(9, '20260513151601', 'BRG002', 'Air Nonkonsumsi', 1, 300000),
(10, '20260513151601', 'BRG004', 'Air Nonkonsumsi', 2, 150000),
(11, '20260513151601', 'BRG005', 'Air Konsumsi', 1, 10000),
(12, '20260513152317', 'BRG001', 'Air Konsumsi', 2, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `status_bekerja` enum('Tetap','Kontrak','Magang') NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `tanggal_bergabung` date NOT NULL DEFAULT current_timestamp(),
  `nomor_rekening` varchar(12) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nama_kontak_darurat` varchar(50) NOT NULL,
  `nomor_telepon_darurat` varchar(12) NOT NULL,
  `hubungan` enum('Pasangan','Orangtua','Adik','Kakak','Teman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `status_bekerja`, `status`, `tanggal_bergabung`, `nomor_rekening`, `bank`, `nama_kontak_darurat`, `nomor_telepon_darurat`, `hubungan`) VALUES
('KRY001', 'Andi Saputra', 'Bandung', '1998-05-12', 'Laki-laki', 'Jl. Soekarno Hatta No.10', '081234567890', 'Kontrak', 'Aktif', '2022-01-10', '123456789012', 'BCA', 'Siti Aminah', '081298765432', 'Orangtua'),
('KRY002', 'Budi Santoso', 'Jakarta', '1997-08-20', 'Laki-laki', 'Jl. Melati No. 5 Jakarta', '081234567891', 'Kontrak', 'Aktif', '2023-03-10', '123456789013', 'BRI', 'Dewi Lestari', '081298765433', 'Pasangan'),
('KRY003', 'Citra Lestari', 'Bogor', '1999-11-03', 'Perempuan', 'Jl. Mawar No. 8 Bogor', '081234567892', 'Tetap', 'Aktif', '2021-07-05', '123456789014', 'BNI', 'Rina Lestari', '081298765434', 'Kakak'),
('KRY004', 'Dedi Kurniawan', 'Garut', '1995-02-18', 'Laki-laki', 'Jl. Raya Garut No. 21', '081234567893', 'Magang', 'Aktif', '2025-01-10', '123456789015', 'Mandiri', 'Yusuf Kurniawan', '081298765435', 'Orangtua'),
('KRY005', 'Eka Putri', 'Tasikmalaya', '2000-09-25', 'Perempuan', 'Jl. Cempaka No. 17 Tasikmalaya', '081234567894', 'Kontrak', 'Nonaktif', '2023-05-12', '123456789016', 'BCA', 'Dina Putri', '081298765436', 'Adik'),
('KRY006', 'Fajar Nugraha', 'Ciamis', '1996-04-30', 'Laki-laki', 'Jl. Ahmad Yani No. 9 Ciamis', '081234567895', 'Tetap', 'Aktif', '2020-08-17', '123456789017', 'BRI', 'Nina Nugraha', '081298765437', 'Pasangan'),
('KRY007', 'Gina Marlina', 'Sukabumi', '1998-12-14', 'Perempuan', 'Jl. Sukaraja No. 3 Sukabumi', '081234567896', 'Tetap', 'Aktif', '2022-11-21', '123456789018', 'BNI', 'Marlina', '081298765438', 'Orangtua'),
('KRY008', 'Hendra Wijaya', 'Bekasi', '1994-07-09', 'Laki-laki', 'Jl. Patriot No. 45 Bekasi', '081234567897', 'Kontrak', 'Aktif', '2021-04-01', '123456789019', 'Mandiri', 'Yanti Wijaya', '081298765439', 'Pasangan'),
('KRY009', 'Intan Permata', 'Depok', '2001-01-27', 'Perempuan', 'Jl. Margonda No. 77 Depok', '081234567898', 'Magang', 'Aktif', '2025-02-15', '123456789020', 'BCA', 'Rudi Permata', '081298765440', 'Teman'),
('KRY010', 'Joko Prasetyo', 'Cirebon', '1993-06-05', 'Laki-laki', 'Jl. Siliwangi No. 11 Cirebon', '081234567899', 'Tetap', 'Nonaktif', '2019-09-09', '123456789021', 'BRI', 'Sri Prasetyo', '081298765441', 'Kakak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` varchar(20) NOT NULL,
  `merk_kendaraan` varchar(50) NOT NULL,
  `platnomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `merk_kendaraan`, `platnomor`) VALUES
('DR001', 'Toyota Avanza', 'B1234AA'),
('DR002', 'Honda Brio', 'B2345BB'),
('DR003', 'Suzuki Ertiga', 'B3456CC'),
('DR004', 'Daihatsu Xenia', 'B4567DD'),
('DR005', 'Mitsubishi Xpander', 'B5678EE'),
('DR006', 'Toyota Innova', 'B6789FF'),
('DR007', 'Honda Mobilio', 'B7890GG'),
('DR008', 'Suzuki XL7', 'B8901HH'),
('DR009', 'Daihatsu Terios', 'B9012II'),
('DR010', 'Mitsubishi Pajero', 'B0123JJ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telp`) VALUES
('PLG001', 'Andi Saputra', '081234567801'),
('PLG002', 'Budi Santoso', '081234567802'),
('PLG003', 'Citra Lestari', '081234567803'),
('PLG004', 'Dewi Anggraini', '081234567804'),
('PLG005', 'Eko Prasetyo', '081234567805'),
('PLG006', 'Fajar Nugraha', '081234567806'),
('PLG007', 'Gina Maharani', '081234567807'),
('PLG008', 'Hendra Wijaya', '081234567808'),
('PLG009', 'Intan Permata', '081234567809'),
('PLG010', 'Joko Susilo', '081234567810'),
('PLG011', 'Aryaan', '081100001111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `no_faktur` varchar(14) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `bayar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`no_faktur`, `id_pelanggan`, `nama_pelanggan`, `tanggal`, `bayar`, `total`, `kembalian`) VALUES
('20260511090610', 'PLG001', 'Aryaan', '11-05-2026', 100000, 80000, 20000),
('20260511090706', 'PLG001', 'Aryaan', '11-05-2026', 200000, 180000, 20000),
('20260511090952', 'PLG002', 'Burhan', '11-05-2026', 500000, 450000, 50000),
('20260511094914', 'PLG006', 'Fajar Nugraha', '11-05-2026', 200000, 180000, 20000),
('20260511095358', 'PLG011', 'Aryaan', '11-05-2026', 50000, 50000, 0),
('20260511095454', 'PLG001', 'Andi Saputra', '11-05-2026', 600000, 530000, 70000),
('20260513151601', 'PLG011', 'Aryaan', '13-05-2026', 1000000, 770000, 230000),
('20260513152317', 'PLG001', 'Andi Saputra', '13-05-2026', 200000, 160000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengemudi`
--

CREATE TABLE `tb_pengemudi` (
  `id_pengemudi` varchar(10) NOT NULL,
  `nama_pengemudi` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_pengemudi` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `nomor_sim` varchar(15) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status_kerja` enum('Tetap','Kontrak') NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `status_aktif` enum('Aktif','Nonaktif') NOT NULL,
  `nomor_rekening` varchar(12) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nama_kontak_darurat` varchar(50) NOT NULL,
  `nomor_kontak_darurat` varchar(12) NOT NULL,
  `hubungan` enum('Istri','Ibu','Adik','Kakak','Teman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengemudi`
--

INSERT INTO `tb_pengemudi` (`id_pengemudi`, `nama_pengemudi`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_pengemudi`, `nomor_telepon`, `nomor_sim`, `masa_berlaku`, `status_kerja`, `tanggal_bergabung`, `status_aktif`, `nomor_rekening`, `bank`, `nama_kontak_darurat`, `nomor_kontak_darurat`, `hubungan`) VALUES
('DRI01', 'Andi Saputra', 'Bandung', '1995-03-12', 'Laki-laki', 'Jl. Melati No.1', '081234567801', 'SIM001', '2027-03-12', 'Tetap', '2023-01-10', 'Aktif', '123456789012', 'BCA', 'Siti', '081298765401', 'Istri'),
('DRI02', 'Budi Santoso', 'Jakarta', '1990-07-21', 'Laki-laki', 'Jl. Mawar No.2', '081234567802', 'SIM002', '2026-07-21', 'Kontrak', '2022-05-15', 'Aktif', '123456789013', 'BRI', 'Ani', '081298765402', 'Ibu'),
('DRI03', 'Cahyo Nugroho', 'Semarang', '1998-11-05', 'Laki-laki', 'Jl. Kenanga No.3', '081234567803', 'SIM003', '2028-11-05', 'Tetap', '2024-02-01', 'Aktif', '123456789014', 'Mandiri', 'Rina', '081298765403', 'Adik'),
('DRI04', 'Dedi Kurniawan', 'Surabaya', '1992-09-14', 'Laki-laki', 'Jl. Anggrek No.4', '081234567804', 'SIM004', '2025-09-14', 'Kontrak', '2021-08-20', 'Nonaktif', '123456789015', 'BNI', 'Lina', '081298765404', 'Istri'),
('DRI05', 'Eko Prasetyo', 'Yogyakarta', '1996-01-30', 'Laki-laki', 'Jl. Dahlia No.5', '081234567805', 'SIM005', '2027-01-30', 'Tetap', '2023-06-12', 'Aktif', '123456789016', 'BCA', 'Sari', '081298765405', 'Ibu'),
('DRI06', 'Fajar Hidayat', 'Malang', '1994-04-18', 'Laki-laki', 'Jl. Flamboyan No.6', '081234567806', 'SIM006', '2026-04-18', 'Kontrak', '2022-11-03', 'Aktif', '123456789017', 'BRI', 'Dewi', '081298765406', 'Kakak'),
('DRI07', 'Gilang Ramadhan', 'Depok', '1999-12-25', 'Laki-laki', 'Jl. Teratai No.7', '081234567807', 'SIM007', '2028-12-25', 'Tetap', '2024-03-22', 'Aktif', '123456789018', 'Mandiri', 'Nina', '081298765407', 'Teman'),
('DRI08', 'Hendra Wijaya', 'Bogor', '1991-06-09', 'Laki-laki', 'Jl. Sakura No.8', '081234567808', 'SIM008', '2025-06-09', 'Kontrak', '2020-09-10', 'Nonaktif', '123456789019', 'BNI', 'Maya', '081298765408', 'Istri'),
('DRI09', 'Irwan Setiawan', 'Bekasi', '1993-08-17', 'Laki-laki', 'Jl. Cemara No.9', '081234567809', 'SIM009', '2027-08-17', 'Tetap', '2023-04-05', 'Aktif', '123456789020', 'BCA', 'Tina', '081298765409', 'Adik'),
('DRI10', 'Joko Susilo', 'Tangerang', '1989-02-11', 'Laki-laki', 'Jl. Pinus No.10', '081234567810', 'SIM010', '2026-02-11', 'Kontrak', '2021-12-01', 'Aktif', '123456789021', 'BRI', 'Rudi', '081298765410', 'Teman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('owner','admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
('USN001', 'Aryaan Putra Risqi', 'owner', 'owner', 'owner'),
('USN002', 'Aryaan Putra Risqi', 'admin', 'admin', 'admin'),
(' ', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  ADD PRIMARY KEY (`id__detail`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tb_pengemudi`
--
ALTER TABLE `tb_pengemudi`
  ADD PRIMARY KEY (`id_pengemudi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  MODIFY `id__detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
