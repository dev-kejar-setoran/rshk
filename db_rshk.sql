-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2018 pada 16.55
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

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
('a472e3ivurou6qactflt283ugur87ao6', '::1', 1522676688, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323637363538323b);

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
  `id_jabatan` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `m_kontrak`
--

CREATE TABLE `m_kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nama_kontrak` varchar(50) NOT NULL,
  `kordinat` text NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', '$1$Dtqyvz7/$wZSaZbfHgn0UbLlVi1HHp0', 'Admin', 'admin@gmail.com', '123456', 'admin', 0, '2018-04-02 15:44:48', '', '2018-04-02 13:44:48', '', '2018-04-02 13:44:48');

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
(0, 1, '$1$K1AHvdlE$85AZbcic4bHfJoz9giOZ2/', '2018-04-03 03:44:48', '2018-04-02 20:44:48', '2018-04-02 20:44:48');

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
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `m_cara_bayar`
--
ALTER TABLE `m_cara_bayar`
  ADD PRIMARY KEY (`id_cara_bayar`);

--
-- Indeks untuk tabel `m_data_dokter`
--
ALTER TABLE `m_data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `m_data_pasien`
--
ALTER TABLE `m_data_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `m_jabatan_dokter`
--
ALTER TABLE `m_jabatan_dokter`
  ADD PRIMARY KEY (`id_jabatan_dokter`);

--
-- Indeks untuk tabel `m_kategori_diskusi`
--
ALTER TABLE `m_kategori_diskusi`
  ADD PRIMARY KEY (`id_kategori_diskusi`);

--
-- Indeks untuk tabel `m_kewarganegaraan`
--
ALTER TABLE `m_kewarganegaraan`
  ADD PRIMARY KEY (`id_kewarganegaraan`);

--
-- Indeks untuk tabel `m_kontrak`
--
ALTER TABLE `m_kontrak`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indeks untuk tabel `m_poli`
--
ALTER TABLE `m_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `m_role_menu`
--
ALTER TABLE `m_role_menu`
  ADD PRIMARY KEY (`id_role_menu`);

--
-- Indeks untuk tabel `m_rumah_sakit`
--
ALTER TABLE `m_rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indeks untuk tabel `m_spesialisasi`
--
ALTER TABLE `m_spesialisasi`
  ADD PRIMARY KEY (`id_spesialisasi`);

--
-- Indeks untuk tabel `m_tautan`
--
ALTER TABLE `m_tautan`
  ADD PRIMARY KEY (`id_tautan`);

--
-- Indeks untuk tabel `m_tipe_media`
--
ALTER TABLE `m_tipe_media`
  ADD PRIMARY KEY (`id_tipe_media`);

--
-- Indeks untuk tabel `m_tipe_pendaftar`
--
ALTER TABLE `m_tipe_pendaftar`
  ADD PRIMARY KEY (`id_tipe_pendaftar`);

--
-- Indeks untuk tabel `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `t_artikel_kategori`
--
ALTER TABLE `t_artikel_kategori`
  ADD PRIMARY KEY (`id_artikel_kategori`);

--
-- Indeks untuk tabel `t_artikel_list`
--
ALTER TABLE `t_artikel_list`
  ADD PRIMARY KEY (`id_artikel_list`);

--
-- Indeks untuk tabel `t_website_media_center`
--
ALTER TABLE `t_website_media_center`
  ADD PRIMARY KEY (`id_media_center`);

--
-- Indeks untuk tabel `t_website_pelayanan`
--
ALTER TABLE `t_website_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `t_website_pustaka_kesehatan`
--
ALTER TABLE `t_website_pustaka_kesehatan`
  ADD PRIMARY KEY (`id_pustaka_kesehatan`);

--
-- Indeks untuk tabel `t_website_slider`
--
ALTER TABLE `t_website_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_data_pasien`
--
ALTER TABLE `m_data_pasien`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_rumah_sakit`
--
ALTER TABLE `m_rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
