-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 01:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `jurusan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `tempat_lahir`, `tgl_lahir`, `jk`, `jurusan`) VALUES
(2, 9099, 'Ocean Prawira', 'Klaten', '2000-02-16', 'L', 'Teknik Pemesinan'),
(3, 9080, 'Banyubening Adyatama', 'Karanganyar', '2019-11-24', 'P', 'Rekayasa Perangkat Lunak'),
(4, 9086, 'Dayu Putri Wekasan', 'Surakarta', '2020-04-21', 'P', 'Teknik Ototronik'),
(6, 8788, 'Herwana', 'Karanganyar', '2007-05-16', 'L', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(1, 'Bahasa Indonesia Kelas XI', 'Suherli', 'Gramedia', '2013', '978-602-282-101-4', 36, 'Rak 2', '2023-05-02'),
(2, 'Matematika Kelas XI ', 'Kasmina, Toali', 'Erlangga', '2018', '978-602-434-746-8', 16, 'Rak 2', '2023-05-02'),
(3, 'Siap Asesmen Nasional', 'Tim Penulis Putra Nugraha', 'Putra Nugraha', '2021', '978-623-268-325-9', 26, 'Rak 1', '2023-04-30'),
(5, 'Sandyakala', 'Anglakadar', 'Gramedia', '2023', '9786232684456', 9, 'Rak 2', '2023-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nis_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `nis_transaksi`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 2, 3, 3, '02-04-2023', '09-04-2023', 'kembali'),
(2, 3, 2, 2, '15-08-2023', '22-08-2023', 'kembali'),
(3, 5, 6, 6, '15-03-2023', '22-08-2023', 'kembali'),
(4, 5, 6, 6, '15-03-2023', '22-03-2023', 'kembali'),
(5, 3, 2, 2, '15-08-2023', '22-08-2023', 'kembali'),
(6, 5, 4, 4, '14-08-2023', '28-08-2023', 'pinjam'),
(7, 2, 3, 3, '15-08-2023', '22-08-2023', 'pinjam'),
(8, 5, 3, 3, '25-08-2023', '01-09-2023', 'pinjam'),
(9, 1, 3, 3, '26-09-2023', '03-10-2023', 'pinjam'),
(10, 3, 4, 4, '12-10-2023', '19-10-2023', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`) VALUES
(4, 'Luhur Pambarep', 'Luhur', '$2y$10$K0a9qX/C6j5aSimUECpZoeocKMATg8enc.nY7pLtJ7xM9VbD/rCgC'),
(5, 'vidis', 'vidis', '$2y$10$IWVjaQCLs0iyGKB0TLYsgu/ghRcJMYBPCyGqtUG.dbhaOQd4SsFoW'),
(6, 'admin', 'admin', '$2y$10$rphVm.RyNGZZg7nLW04B4O00f28xKIIiGRmOG8MIk5RxIEqCnFAjK'),
(7, 'Celine', 'lin', '$2y$10$c.JGF7toOEH/1yAqfuLwyuvX7eC.3FSO0n3GQTyFYfWtsXyVQV3iy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
