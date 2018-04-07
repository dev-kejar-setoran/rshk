-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 02:44 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `m_kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) NOT NULL,
  `kordinat` text NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kontak`
--

INSERT INTO `m_kontak` (`id_kontak`, `nama_kontak`, `kordinat`, `alamat`, `no_tlp`, `email`, `tipe`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Joni', 'Lintang Utara', 'Jl.Pahlawan', '08180736386', 'Joni@gmail.com', 'Utama', 'admin', '2018-04-05 02:38:21', '', '0000-00-00 00:00:00'),
(4, 'Jono', 'Lintang Selatan', 'Jl.Juang', '0898973839', 'Jono@gmail.com', 'Utama', 'admin', '2018-04-05 02:39:11', '', '0000-00-00 00:00:00');


CREATE TABLE `m_rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_rumah_sakit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rumah_sakit`
--

INSERT INTO `m_rumah_sakit` (`id_rumah_sakit`, `nama_rumah_sakit`, `alamat`, `no_telp`, `aksi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'RS HARKIT 1', 'Jl.Pejuang', '08789870', '', 'admin', '2018-04-04 12:14:09', '', '2018-04-04 17:14:09'),
(4, 'RS HARKIT 2', 'Jl.Merdeka', '08180999865', '', 'admin', '2018-04-04 12:14:24', '', '2018-04-04 17:14:24'),
(5, 'RS HARKIT 4', 'Jl.Pendopo', '0818082029', '', 'admin', '2018-04-07 02:06:14', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_spesialisasi`
--

CREATE TABLE `m_spesialisasi` (
  `id_spesialisasi` int(11) NOT NULL,
  `nama_spesialisasi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_spesialisasi`
--

INSERT INTO `m_spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`, `deskripsi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 'Varkuler', 'Spesialisasi Varkuler', 'admin', '2018-04-07 02:46:48', '-', '2018-04-07 07:46:48'),
(3, 'Bedah', 'Spesialisasi Bedah', 'admin', '2018-04-07 02:48:07', '', '0000-00-00 00:00:00');


CREATE TABLE `m_tipe_pendaftar` (
  `id_tipe_pendaftar` int(11) NOT NULL,
  `nama_tipe_pendaftar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_tipe_pendaftar`
--

INSERT INTO `m_tipe_pendaftar` (`id_tipe_pendaftar`, `nama_tipe_pendaftar`, `deskripsi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, 'BPJS', 'Pelanggan Yang Mendaftar Menggunakan Layanan BPJS', 'admin', '2018-04-07 05:47:13', '', '2018-04-07 10:47:13'),
(5, 'UMUM', 'Pendaftar Tanpa Menggunakan Jasa Kesehatan Manapun', 'admin', '2018-04-07 05:48:12', '', '0000-00-00 00:00:00');


ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `m_cara_bayar`
--
ALTER TABLE `m_cara_bayar`
  ADD PRIMARY KEY (`id_cara_bayar`);

--
-- Indexes for table `m_data_dokter`
--
ALTER TABLE `m_data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `m_data_pasien`
--
ALTER TABLE `m_data_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `m_jabatan_dokter`
--
ALTER TABLE `m_jabatan_dokter`
  ADD PRIMARY KEY (`id_jabatan_dokter`);

--
-- Indexes for table `m_kategori_diskusi`
--
ALTER TABLE `m_kategori_diskusi`
  ADD PRIMARY KEY (`id_kategori_diskusi`);

--
-- Indexes for table `m_kewarganegaraan`
--
ALTER TABLE `m_kewarganegaraan`
  ADD PRIMARY KEY (`id_kewarganegaraan`);

--
-- Indexes for table `m_kontak`
--
ALTER TABLE `m_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `m_poli`
--
ALTER TABLE `m_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `m_role_menu`
--
ALTER TABLE `m_role_menu`
  ADD PRIMARY KEY (`id_role_menu`);

--
-- Indexes for table `m_rumah_sakit`
--
ALTER TABLE `m_rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indexes for table `m_spesialisasi`
--
ALTER TABLE `m_spesialisasi`
  ADD PRIMARY KEY (`id_spesialisasi`);

--
-- Indexes for table `m_tautan`
--
ALTER TABLE `m_tautan`
  ADD PRIMARY KEY (`id_tautan`);

--
-- Indexes for table `m_tipe_media`
--
ALTER TABLE `m_tipe_media`
  ADD PRIMARY KEY (`id_tipe_media`);

--
-- Indexes for table `m_tipe_pendaftar`
--
ALTER TABLE `m_tipe_pendaftar`
  ADD PRIMARY KEY (`id_tipe_pendaftar`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_artikel_kategori`
--
ALTER TABLE `t_artikel_kategori`
  ADD PRIMARY KEY (`id_artikel_kategori`);

--
-- Indexes for table `t_artikel_list`
--
ALTER TABLE `t_artikel_list`
  ADD PRIMARY KEY (`id_artikel_list`);

--
-- Indexes for table `t_website_media_center`
--
ALTER TABLE `t_website_media_center`
  ADD PRIMARY KEY (`id_media_center`);

--
-- Indexes for table `t_website_pelayanan`
--
ALTER TABLE `t_website_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `t_website_pustaka_kesehatan`
--
ALTER TABLE `t_website_pustaka_kesehatan`
  ADD PRIMARY KEY (`id_pustaka_kesehatan`);

--
-- Indexes for table `t_website_slider`
--
ALTER TABLE `t_website_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_data_dokter`
--
ALTER TABLE `m_data_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_data_pasien`
--
ALTER TABLE `m_data_pasien`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_jabatan_dokter`
--
ALTER TABLE `m_jabatan_dokter`
  MODIFY `id_jabatan_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_kontak`
--
ALTER TABLE `m_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_rumah_sakit`
--
ALTER TABLE `m_rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_spesialisasi`
--
ALTER TABLE `m_spesialisasi`
  MODIFY `id_spesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_tipe_pendaftar`
--
ALTER TABLE `m_tipe_pendaftar`
  MODIFY `id_tipe_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
