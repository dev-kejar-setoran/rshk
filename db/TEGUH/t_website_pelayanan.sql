-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 06:48 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rshk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_website_pelayanan`
--

CREATE TABLE `t_website_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_website_pelayanan`
--

INSERT INTO `t_website_pelayanan` (`id_pelayanan`, `judul`, `isi`, `deskripsi`, `icon`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'cdc ', 'ccc', 'ccdf', '', 'Teguh Dwi Fasya', '2018-04-08 04:47:12', 'Teguh Dwi Fasya', '2018-04-07 23:47:12'),
(2, 'xs', 'xs', 'xs', 'gathering kampung kurma.jpg', 'Teguh Dwi Fasya', '2018-04-07 22:39:55', '', '0000-00-00 00:00:00'),
(3, 'test', 'test 4', 'test 5', 'beli tanah kavling kredit.png', 'Teguh Dwi Fasya', '2018-04-07 22:59:24', '', '0000-00-00 00:00:00'),
(4, 'halo', 'halo isi', 'halo deskripsi', 'gathering kampung kurma.jpg', 'Teguh Dwi Fasya', '2018-04-07 23:08:44', '', '0000-00-00 00:00:00'),
(6, 'oyyyy', 'ccc', 'ccd', 'beli tanah kavling kredit.png', 'Teguh Dwi Fasya', '2018-04-07 23:21:51', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_website_pelayanan`
--
ALTER TABLE `t_website_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_website_pelayanan`
--
ALTER TABLE `t_website_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
