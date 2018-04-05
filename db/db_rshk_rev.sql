-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Apr 2018 pada 10.58
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('11kuhm81qhlb6a0k1bjch6pbp1o9ijll', '::1', 1522918693, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323931383637323b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('3ki9euiolle2pkrso12u0buh63a4cgcq', '::1', 1522857309, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835373032393b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('480nocrv9b5qnja7a0v7c2301msr2sfa', '::1', 1522913951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323931333833333b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('5hjbeoppabo5rgeob39hq6b7d7co8381', '::1', 1522862092, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323836323031303b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('71hc30hfnfbq4l0ghda0mvp6ustvomsd', '::1', 1522904582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930343239303b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('87nnejsl2g1p2avnl79leei26cn8vdc4', '::1', 1522901823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930313638313b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('8i467tj20gdp0st262j46cj4n7oftn7i', '::1', 1522892549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323839323534393b),
('9a41le7u4p8hgk31cc198pmd7rcd8ete', '::1', 1522900537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930303533373b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('enruvr6gddchbsf03pteooja9krirnue', '::1', 1522859094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835383836363b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('iimprlk1045oq6q7ml5qn1vkto3ehs4h', '::1', 1522899833, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323839393832303b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('j41hqop9503imc6ohpe1965r77aaf14t', '::1', 1522904864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930343836343b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('l5c5f1r9r7ji83gm7umv6df3fl1lrdc6', '::1', 1522916164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323931363134363b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('l99qh56o6mpq1b8q02iokrlks4klv5sf', '::1', 1522853844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835333637383b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('m4oa31t1hqp7m500ouonnosoeo86cnsn', '::1', 1522899046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323839393033343b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('oq4j2238dl6b95g05osi3kmtjqhi60f7', '::1', 1522916055, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323931343235363b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('priecoqj59um1eb4doq8jtvpesi74vim', '::1', 1522907834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930373634363b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('q2oj18hp4q6l0lktidsvhpd829o5hmg9', '::1', 1522900294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930303134323b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('rjbu0e824gbcslj80mktc00ecbqh1257', '::1', 1522859378, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835393234363b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('s01r2r9mjq4qt8i7mrgslvo9o61884ik', '::1', 1522907551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323930373238393b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('so7j3mqgflebtfmcnv55771hlddc4s0t', '::1', 1522858713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835383438353b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('sthg95inkou56ujof030rqjgvs17suo5', '::1', 1522858441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835383133303b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('tii3qa4mn4j6o4shm7kuon311aqrld7o', '::1', 1522861905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323836313237343b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('upoakas1q9mn9tepufvtgaf7n4n9n6dc', '::1', 1522892569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323839323534393b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a353a2261646d696e223b69645f757365727c733a313a2231223b),
('vb62eog26c5mhosvidvpevda67q0svaj', '::1', 1522857775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835373532303b7374617475737c623a313b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6e616d615f6c656e676b61707c733a303a22223b69645f757365727c733a313a2231223b),
('vv9nvuaoeg544kc97ri55rbsaeqcrl6a', '::1', 1522853678, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323835333637383b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_cara_bayar`
--

CREATE TABLE `m_cara_bayar` (
  `id_cara_bayar` int(11) NOT NULL,
  `nama_cara_bayar` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_data_dokter`
--

CREATE TABLE `m_data_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `id_spesialisasi` int(11) NOT NULL,
  `id_jabatan_dokter` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_data_dokter`
--

INSERT INTO `m_data_dokter` (`id_dokter`, `nama_dokter`, `id_spesialisasi`, `id_jabatan_dokter`, `foto`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Dr Azhar', 1, 1, 'sdf.jpg', 'asf', '2018-04-02 16:41:51', 'asf', '2018-04-02 16:41:51'),
(2, 'Dr.Arif', 1, 1, 'aa.jpg', 'asf', '0000-00-00 00:00:00', 'asf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_data_pasien`
--

CREATE TABLE `m_data_pasien` (
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `nomor_kartu` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_kewarganegaraan` int(11) NOT NULL,
  `asuransi` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_data_pasien`
--

INSERT INTO `m_data_pasien` (`id_pasien`, `nama_pasien`, `nomor_kartu`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `id_kewarganegaraan`, `asuransi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Jono', '1', 'L', 'Bandung', '0000-00-00', 1, 'ada', '2018-04-04 04:54:17', NULL, NULL, NULL),
(3, 'joni', '2', 'L', 'Bandung', '0000-00-00', 2, 'ada', '2018-04-04 04:54:35', NULL, NULL, NULL),
(4, 'jani', '3', 'L', 'Jakarta', '0000-00-00', 1, 'ada', '2018-04-04 09:57:24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan_dokter`
--

CREATE TABLE `m_jabatan_dokter` (
  `id_jabatan_dokter` int(11) NOT NULL,
  `nama_jabatan_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan_dokter`
--

INSERT INTO `m_jabatan_dokter` (`id_jabatan_dokter`, `nama_jabatan_dokter`, `alamat`, `deskripsi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Direktur Utama', '-', '-', '-', '0000-00-00 00:00:00', '-', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori_diskusi`
--

CREATE TABLE `m_kategori_diskusi` (
  `id_kategori_diskusi` int(11) NOT NULL,
  `nama_kategori_diskusi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kewarganegaraan`
--

CREATE TABLE `m_kewarganegaraan` (
  `id_kewarganegaraan` int(11) NOT NULL,
  `nama_kewarganegaraan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kontak`
--

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
-- Dumping data untuk tabel `m_kontak`
--

INSERT INTO `m_kontak` (`id_kontak`, `nama_kontak`, `kordinat`, `alamat`, `no_tlp`, `email`, `tipe`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Joni', 'Lintang Utara', 'Jl.Pahlawan', '08180736386', 'Joni@gmail.com', 'Utama', 'admin', '2018-04-05 02:38:21', '', '0000-00-00 00:00:00'),
(4, 'Jono', 'Lintang Selatan', 'Jl.Juang', '0898973839', 'Jono@gmail.com', 'Utama', 'admin', '2018-04-05 02:39:11', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_poli`
--

CREATE TABLE `m_poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_role_menu`
--

CREATE TABLE `m_role_menu` (
  `id_role_menu` int(11) NOT NULL,
  `nama_role_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_role_user`
--

CREATE TABLE `m_role_user` (
  `role` varchar(50) NOT NULL,
  `id_role_menu` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_rumah_sakit`
--

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
-- Dumping data untuk tabel `m_rumah_sakit`
--

INSERT INTO `m_rumah_sakit` (`id_rumah_sakit`, `nama_rumah_sakit`, `alamat`, `no_telp`, `aksi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'RS HARKIT', 'Jl.Pahlawan', '892928393', '', 'Azhar', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'RS HARKIT 1', 'Jl.Pejuang', '08789870', '', 'admin', '2018-04-04 12:14:09', '', '2018-04-04 17:14:09'),
(4, 'RS HARKIT 2', 'Jl.Merdeka', '08180999865', '', 'admin', '2018-04-04 12:14:24', '', '2018-04-04 17:14:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_spesialisasi`
--

CREATE TABLE `m_spesialisasi` (
  `id_spesialisasi` int(11) NOT NULL,
  `nama_spesialisasi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_spesialisasi`
--

INSERT INTO `m_spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`, `alamat`, `deskripsi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Kardiologi', '-', '-', '-', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'Varkuler', '-', '-', '-', '2018-04-02 16:38:58', '-', '2018-04-02 16:38:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tautan`
--

CREATE TABLE `m_tautan` (
  `id_tautan` int(11) NOT NULL,
  `nama_tautan` varchar(50) NOT NULL,
  `tautan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tipe_media`
--

CREATE TABLE `m_tipe_media` (
  `id_tipe_media` int(11) NOT NULL,
  `nama_tipe_media` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tipe_pendaftar`
--

CREATE TABLE `m_tipe_pendaftar` (
  `id_tipe_pendaftar` int(11) NOT NULL,
  `nama_tipe_pendaftar` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_tipe_media` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_users`
--

CREATE TABLE `m_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_users`
--

INSERT INTO `m_users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `tlp`, `role`, `status`, `last_login`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'admin@gmail.com', '', 'admin', 0, '2018-04-02 19:00:07', '', '2018-04-04 17:13:04', '', '2018-04-04 17:13:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_users_authentication`
--

CREATE TABLE `m_users_authentication` (
  `id_auth` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `m_users_authentication`
--

INSERT INTO `m_users_authentication` (`id_auth`, `id_user`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(0, 1, '$1$qa3QpuQq$G2GDYBJmIMMnFXPyu0nXs.', '2018-04-01 14:09:25', '2018-04-01 02:09:25', '2018-04-01 02:09:25'),
(0, 1, '$1$BlKR5IuW$kMpJLhAWV3gjfLAgcId3B1', '2018-04-01 14:18:24', '2018-04-01 02:18:24', '2018-04-01 02:18:24'),
(0, 1, '$1$/BCTc5Kn$l9mJ16wIweyZllA55tppT0', '2018-04-02 07:55:46', '2018-04-02 00:55:46', '2018-04-02 00:55:46'),
(0, 1, '$1$l5q23yGq$MzD609YSwXpwCo2PQk4ee.', '2018-04-03 02:54:54', '2018-04-02 19:54:54', '2018-04-02 19:54:54'),
(0, 1, '$1$wrDstXNP$gUojU7HHxd9KLwxyn9dho1', '2018-04-03 03:12:05', '2018-04-02 20:12:05', '2018-04-02 20:12:05'),
(0, 1, '$1$kQY/HEJq$3VFeg3acSyXF7SfBIcrTJ0', '2018-04-03 03:13:55', '2018-04-02 20:13:55', '2018-04-02 20:13:55'),
(0, 1, '$1$3tWMTMhb$tUv.mpQA1gTeuw9BLbBoR1', '2018-04-03 03:43:02', '2018-04-02 20:43:02', '2018-04-02 20:43:02'),
(0, 1, '$1$K1AHvdlE$85AZbcic4bHfJoz9giOZ2/', '2018-04-03 03:44:48', '2018-04-02 20:44:48', '2018-04-02 20:44:48'),
(0, 1, '$1$GqM34.r5$farn7xbY8083ihf2PxfKt0', '2018-04-03 06:18:48', '2018-04-02 23:18:48', '2018-04-02 23:18:48'),
(0, 1, '$1$8GlkO5P5$gQJEGGiDHwRxTp7/jh1eu0', '2018-04-03 06:19:26', '2018-04-02 23:19:26', '2018-04-02 23:19:26'),
(0, 1, '$1$hM3JfoFH$HFyNbkP7pJm5qTBgAAHtz1', '2018-04-03 06:19:46', '2018-04-02 23:19:46', '2018-04-02 23:19:46'),
(0, 1, '$1$RMOM0CAV$B4OLxrmjBiqz29tPku6Wo.', '2018-04-03 06:20:15', '2018-04-02 23:20:15', '2018-04-02 23:20:15'),
(0, 1, '$1$bUtoaftS$6ao7CY4BRuPdEPIVCzfhN.', '2018-04-03 06:20:44', '2018-04-02 23:20:44', '2018-04-02 23:20:44'),
(0, 1, '$1$uS8/dv0j$3SKbyjPHrN5xn5ePSAQ71/', '2018-04-03 06:20:45', '2018-04-02 23:20:45', '2018-04-02 23:20:45'),
(0, 1, '$1$Jm8/GIPw$JS07chaU6uBRLd6q.43I4.', '2018-04-03 06:21:12', '2018-04-02 23:21:12', '2018-04-02 23:21:12'),
(0, 1, '$1$Zh35AC0b$lwSl2bCkzxoeXBjmFtlWq/', '2018-04-03 06:21:16', '2018-04-02 23:21:16', '2018-04-02 23:21:16'),
(0, 1, '$1$e/vzv7q9$9fR6jlrzWl.SImmo64GyN0', '2018-04-03 06:21:17', '2018-04-02 23:21:17', '2018-04-02 23:21:17'),
(0, 1, '$1$9zxDLTlS$Vefez.rlZaJPRzrQyxV9N.', '2018-04-03 06:25:35', '2018-04-02 23:25:35', '2018-04-02 23:25:35'),
(0, 1, '$1$NgZyGhX3$w8eMlWHayuJA/sIcLEfQm/', '2018-04-03 06:51:59', '2018-04-02 23:51:59', '2018-04-02 23:51:59'),
(0, 1, '$1$EiSj8W01$YJMfyzEGDjvND9ljeEZNy.', '2018-04-03 06:57:13', '2018-04-02 23:57:13', '2018-04-02 23:57:13'),
(0, 1, '$1$UxJ4MxSc$uQMTg7LjPLDjmbvGsuZIe0', '2018-04-03 07:15:35', '2018-04-03 00:00:07', '2018-04-02 19:15:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_artikel_kategori`
--

CREATE TABLE `t_artikel_kategori` (
  `id_artikel_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_artikel_list`
--

CREATE TABLE `t_artikel_list` (
  `id_artikel_list` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `slug` text NOT NULL,
  `isi` text NOT NULL,
  `id_artikel_kategori` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi_singkat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_website_media_center`
--

CREATE TABLE `t_website_media_center` (
  `id_media_center` int(11) NOT NULL,
  `nama_media_center` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `id_tipe_media` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_website_pelayanan`
--

CREATE TABLE `t_website_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_website_pustaka_kesehatan`
--

CREATE TABLE `t_website_pustaka_kesehatan` (
  `id_pustaka_kesehatan` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_pustaka` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `referensi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kontributor` varchar(50) NOT NULL,
  `tahun_publish` int(4) NOT NULL,
  `edisi` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_website_slider`
--

CREATE TABLE `t_website_slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `sub_judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
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
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_rumah_sakit`
--
ALTER TABLE `m_rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_spesialisasi`
--
ALTER TABLE `m_spesialisasi`
  MODIFY `id_spesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
