-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `select`
--

CREATE TABLE `select` (
  `nm_select` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `select`
--

INSERT INTO `select` (`nm_select`) VALUES
('Pilih');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktifitas`
--

CREATE TABLE `tb_aktifitas` (
  `id_aktifitas` int(8) NOT NULL,
  `aktifitas` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah_isi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aktifitas`
--

INSERT INTO `tb_aktifitas` (`id_aktifitas`, `aktifitas`, `tanggal`, `ket`, `jumlah_isi`) VALUES
(9, 'Masuk', '2023-08-03', 'masuk pak eko', 0),
(10, 'Keluar', '2023-08-04', 'keluar gaes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_sewa` int(15) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `gambar_brg` varchar(150) NOT NULL,
  `jenis` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_sewa`, `jumlah`, `satuan`, `gambar_brg`, `jenis`) VALUES
(21, 'kontainer dua', 30000, 40, 'biji', 'R1.jpg', 0),
(23, 'kontainer biru', 30000, 0, 'pilih', 'kontainer2.jpeg', 0),
(25, 'Paket Barang  satu', 30000, 0, 'set', 'R3.jpg', 1),
(26, 'Paket Premium', 20000000, 0, 'set', '908-warga-bandung-barat-alami-gangguan-kejiwaan-selama-pandemi-covid19-jbx.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_BK` int(8) NOT NULL,
  `jumlah_BK` int(8) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_aktifitas` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_BK`, `jumlah_BK`, `id_barang`, `id_aktifitas`) VALUES
(12, 10, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_BM` int(8) NOT NULL,
  `jumlah_BM` int(10) NOT NULL,
  `id_aktifitas` int(8) NOT NULL,
  `id_barang` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_BM`, `jumlah_BM`, `id_aktifitas`, `id_barang`) VALUES
(61, 20, 9, 21),
(62, 30, 9, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buyer`
--

CREATE TABLE `tb_buyer` (
  `id_buyer` int(8) NOT NULL,
  `nama_buyer` varchar(50) NOT NULL,
  `no_hp_buyer` varchar(20) NOT NULL,
  `email_buyer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buyer`
--

INSERT INTO `tb_buyer` (`id_buyer`, `nama_buyer`, `no_hp_buyer`, `email_buyer`) VALUES
(2, 'saban nu', '0828382938', 'galih@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int(8) NOT NULL,
  `barang_GD` varchar(50) NOT NULL,
  `jumlah_GD` int(8) NOT NULL,
  `satuan_GD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `barang_GD`, `jumlah_GD`, `satuan_GD`) VALUES
(1, 'Kursi', 30, 'biji'),
(2, 'Baju', 20, 'set'),
(3, 'Baju', 20, 'set');

-- --------------------------------------------------------

--
-- Table structure for table `tb_isi_barang`
--

CREATE TABLE `tb_isi_barang` (
  `id_isi` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_isi_barang`
--

INSERT INTO `tb_isi_barang` (`id_isi`, `id_barang`, `id_paket`) VALUES
(82, 21, 25),
(83, 23, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasbon_operasional`
--

CREATE TABLE `tb_kasbon_operasional` (
  `id_ko` int(10) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kasbon_operasional`
--

INSERT INTO `tb_kasbon_operasional` (`id_ko`, `penerima`, `tanggal`) VALUES
(1, 'baim', '2023-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasbon_operasional_detail`
--

CREATE TABLE `tb_kasbon_operasional_detail` (
  `id_ko_detail` int(10) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `id_ko` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kasbon_operasional_detail`
--

INSERT INTO `tb_kasbon_operasional_detail` (`id_ko_detail`, `keterangan`, `jumlah`, `id_ko`) VALUES
(2, 'tes keterangan satu', 260000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasbon_pribadi`
--

CREATE TABLE `tb_kasbon_pribadi` (
  `id_kp` int(11) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kasbon_pribadi`
--

INSERT INTO `tb_kasbon_pribadi` (`id_kp`, `penerima`, `tanggal`) VALUES
(2, 'budi', '2023-10-30'),
(3, 'bayu', '2023-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasbon_pribadi_detail`
--

CREATE TABLE `tb_kasbon_pribadi_detail` (
  `id_kp_detail` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kasbon_pribadi_detail`
--

INSERT INTO `tb_kasbon_pribadi_detail` (`id_kp_detail`, `keterangan`, `jumlah`, `id_kp`) VALUES
(11, 'saya adalah orang yang meminta kasbon harus bayar', 200000000, 3),
(12, 'saya adalah orang yang meminta kasbon harus bayar ayo semua', 10000, 2),
(13, 'saya adalah orang yang meminta kasbon', 100000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(8) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `email_perusahaan` varchar(40) NOT NULL,
  `no_hp_perusahaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `email_perusahaan`, `no_hp_perusahaan`) VALUES
(1, 'CV Setia Megah Resindo bima', 'Jl. Guru Bango Mekar Permai, Karang Anyar Pegasengan Timur Kota Mataram', 'setia@gmail.com', '081917223992'),
(3, 'Perusahaan Abadi Jaya', 'Jl. Swakarya', 'sabannurrahman@gmail.com', '0848585912912');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rab`
--

CREATE TABLE `tb_rab` (
  `id_rab` int(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `no_po` int(30) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `id_buyer` int(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rab`
--

INSERT INTO `tb_rab` (`id_rab`, `tanggal_po`, `no_po`, `id_perusahaan`, `id_buyer`, `catatan`) VALUES
(3, '2023-10-25', 123456, 1, 1, 'evemt epicentrum'),
(4, '2023-10-24', 9129129, 2, 1, 'event mandalika'),
(5, '2023-10-20', 5553533, 1, 1, 'event mo gp'),
(6, '2023-11-02', 2147483647, 1, 2, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rab_barang`
--

CREATE TABLE `tb_rab_barang` (
  `id_rab_barang` int(10) NOT NULL,
  `jumlah_rab_brg` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_rab` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rab_detail`
--

CREATE TABLE `tb_rab_detail` (
  `id_rd` int(11) NOT NULL,
  `uraian_rd` text NOT NULL,
  `tgl_kebutuhan` date NOT NULL,
  `jumlah` int(7) NOT NULL,
  `periode` int(5) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `id_rab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rab_detail`
--

INSERT INTO `tb_rab_detail` (`id_rd`, `uraian_rd`, `tgl_kebutuhan`, `jumlah`, `periode`, `satuan`, `id_rab`) VALUES
(1, 'tess', '2023-10-27', 20, 2, 'Kosong', 3),
(2, 'tess', '0000-00-00', 0, 2, 'Kosong', 3),
(3, 'tess', '2023-11-02', 20, 1, 'set', 6),
(4, 'uraian 2', '2023-11-03', 10, 1, 'set', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(8) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
(4, 'biji'),
(5, 'set'),
(6, 'meter');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(7) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level_user` int(1) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `id_studio` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level_user`, `nama_user`, `id_studio`) VALUES
(3, 'tiar123', '123', 1, 'tiar', 3),
(4, 'izki123', 'izki123', 2, 'izki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `select`
--
ALTER TABLE `select`
  ADD PRIMARY KEY (`nm_select`);

--
-- Indexes for table `tb_aktifitas`
--
ALTER TABLE `tb_aktifitas`
  ADD PRIMARY KEY (`id_aktifitas`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_BK`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_BM`),
  ADD KEY `id_aktifitas` (`id_aktifitas`);

--
-- Indexes for table `tb_buyer`
--
ALTER TABLE `tb_buyer`
  ADD PRIMARY KEY (`id_buyer`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_isi_barang`
--
ALTER TABLE `tb_isi_barang`
  ADD PRIMARY KEY (`id_isi`);

--
-- Indexes for table `tb_kasbon_operasional`
--
ALTER TABLE `tb_kasbon_operasional`
  ADD PRIMARY KEY (`id_ko`);

--
-- Indexes for table `tb_kasbon_operasional_detail`
--
ALTER TABLE `tb_kasbon_operasional_detail`
  ADD PRIMARY KEY (`id_ko_detail`);

--
-- Indexes for table `tb_kasbon_pribadi`
--
ALTER TABLE `tb_kasbon_pribadi`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `tb_kasbon_pribadi_detail`
--
ALTER TABLE `tb_kasbon_pribadi_detail`
  ADD PRIMARY KEY (`id_kp_detail`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tb_rab`
--
ALTER TABLE `tb_rab`
  ADD PRIMARY KEY (`id_rab`);

--
-- Indexes for table `tb_rab_barang`
--
ALTER TABLE `tb_rab_barang`
  ADD PRIMARY KEY (`id_rab_barang`);

--
-- Indexes for table `tb_rab_detail`
--
ALTER TABLE `tb_rab_detail`
  ADD PRIMARY KEY (`id_rd`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktifitas`
--
ALTER TABLE `tb_aktifitas`
  MODIFY `id_aktifitas` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_BK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_BM` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_buyer`
--
ALTER TABLE `tb_buyer`
  MODIFY `id_buyer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_isi_barang`
--
ALTER TABLE `tb_isi_barang`
  MODIFY `id_isi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_kasbon_operasional`
--
ALTER TABLE `tb_kasbon_operasional`
  MODIFY `id_ko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kasbon_operasional_detail`
--
ALTER TABLE `tb_kasbon_operasional_detail`
  MODIFY `id_ko_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kasbon_pribadi`
--
ALTER TABLE `tb_kasbon_pribadi`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kasbon_pribadi_detail`
--
ALTER TABLE `tb_kasbon_pribadi_detail`
  MODIFY `id_kp_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rab`
--
ALTER TABLE `tb_rab`
  MODIFY `id_rab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rab_barang`
--
ALTER TABLE `tb_rab_barang`
  MODIFY `id_rab_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_rab_detail`
--
ALTER TABLE `tb_rab_detail`
  MODIFY `id_rd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
