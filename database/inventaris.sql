-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 01:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` varchar(255) NOT NULL,
  `merek_id` varchar(255) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `merek_id`, `kategori_id`, `nama_barang`, `keterangan`, `stok`) VALUES
('B001', 'M002', 'K001', 'L360', 'Printer Epson', 5),
('B002', 'M001', 'K002', 'Inspiron 310', 'RAM 4GB\r\nINTEL CORE i5\r\nHDD 500GB', 10);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbarang_keluar` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`idbarang_keluar`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
('1', '1', 1, 'Rusak', '2020-11-26'),
('BO001', 'B001', 1, 'Service', '2022-01-27');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_kembali`
--

CREATE TABLE `barang_kembali` (
  `idbarang_kembali` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `nama_kembali` text NOT NULL,
  `nama_penerima` text NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `denda_kembali` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_kembali`
--

INSERT INTO `barang_kembali` (`idbarang_kembali`, `barang_id`, `nama_kembali`, `nama_penerima`, `keterangan`, `jumlah`, `denda_kembali`, `tanggal_masuk`) VALUES
('2', '5', 'HILMAN', 'TIA SETIAWAN, S.Pd.I', 'Dikembalikan tepat waktu dan tidak ada kerusakan', 1, 'Tidak Ada', '2021-09-09'),
('BM001', 'B001', 'Tia Setiawan, S.Pd.I', 'Muh Hilman Sholehudin', 'Dikembalikan dengan seperti semula', 1, 'Tidak Ada', '2022-01-28');

--
-- Triggers `barang_kembali`
--
DELIMITER $$
CREATE TRIGGER `kembali_stok` AFTER INSERT ON `barang_kembali` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbarang_masuk` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`idbarang_masuk`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
('BI001', 'B002', 10, 'BARANG SECOND DILENGKAPI CASAN DAN TAS', '2022-01-25'),
('BI002', 'B001', 5, 'BELI BARU', '2022-01-28'),
('BI003', 'B001', 1, 'BARANG HASIL SERVICE', '2022-01-28');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_pinjam`
--

CREATE TABLE `barang_pinjam` (
  `idbarang_pinjam` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_pinjam` text NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_pinjam`
--

INSERT INTO `barang_pinjam` (`idbarang_pinjam`, `barang_id`, `jumlah`, `nama_pinjam`, `tanggal_keluar`, `keterangan`, `tanggal_masuk`) VALUES
('1', '5', 1, 'HILMAN', '2021-09-08', 'Meminjam Laptop, Casan dan Tas', '2021-09-09'),
('BK001', 'B001', 1, 'Tia Setiawan, S.Pd.I', '2022-01-27', 'Dibawa kerumah dengan keadaan baik', '2022-01-28');

--
-- Triggers `barang_pinjam`
--
DELIMITER $$
CREATE TRIGGER `pinjam_stok` AFTER INSERT ON `barang_pinjam` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`, `keterangan`) VALUES
('K001', 'PRINTER', 'ELEKTRONIK'),
('K002', 'LAPTOP', 'ELEKTRONIK');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `idmerek` varchar(255) NOT NULL,
  `nama_merek` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`idmerek`, `nama_merek`, `keterangan`) VALUES
('M001', 'DELL', 'LAPTOP'),
('M002', 'EPSON', 'PRINTER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `no_hp`, `username`, `password`, `level`) VALUES
('Ad001', 'Administrator', '082248577297', 'admin', '$2y$10$E33mbIeZc665JZiGOIwCMunuLcI.YnlIzMvGoqgPWflEykvFGFTAK', 'admin'),
('Ad002', 'petugas', '087839736104', 'petugas', '$2y$10$E33mbIeZc665JZiGOIwCMunuLcI.YnlIzMvGoqgPWflEykvFGFTAK', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idbarang_keluar`);

--
-- Indexes for table `barang_kembali`
--
ALTER TABLE `barang_kembali`
  ADD PRIMARY KEY (`idbarang_kembali`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbarang_masuk`);

--
-- Indexes for table `barang_pinjam`
--
ALTER TABLE `barang_pinjam`
  ADD PRIMARY KEY (`idbarang_pinjam`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`idmerek`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
