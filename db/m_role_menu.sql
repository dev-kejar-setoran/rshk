/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - db_rshk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `db_rshk`;

/*Table structure for table `m_role_menu` */

DROP TABLE IF EXISTS `m_role_menu`;

CREATE TABLE `m_role_menu` (
  `id_role_menu` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `level` enum('1','2','3') NOT NULL COMMENT 'level menu',
  `nama_role_menu` varchar(50) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_role_menu` */

insert  into `m_role_menu`(`id_role_menu`,`id_parent`,`level`,`nama_role_menu`,`url`,`icon`,`urutan`,`deskripsi`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (101,NULL,'1','Dashboard','monitoring/monitoring_dashbord','dashboard ',1,NULL,'1','sql','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(102,NULL,'1','Administrasi','#','clipboard',2,NULL,'1','','2018-04-23 19:50:10','','2018-04-23 19:50:10'),(103,NULL,'1','Halaman Website',NULL,'computer',3,NULL,'1','','2018-04-23 19:46:58','','2018-04-23 19:46:58'),(104,NULL,'1','Artikel',NULL,'newspaper',4,NULL,'1','','2018-04-23 19:50:08','','2018-04-23 19:50:08'),(106,NULL,'1','Konten Dinamis',NULL,'list',6,NULL,'1','','2018-04-23 20:08:36','','2018-04-23 20:08:36'),(107,NULL,'1','Master',NULL,'sidebar',7,'Mengelola data master','1','sql','2018-04-23 20:07:50','','2018-04-23 20:07:50'),(108,NULL,'1','Setting',NULL,'setting',8,NULL,'1','','2018-04-09 01:00:03','','2018-04-09 01:00:03'),(10201,102,'2','Perjanjian Online','administrasi/perjanjian_online_admin','',1,NULL,'1','','2018-04-23 19:43:47','','2018-04-23 19:43:47'),(10202,102,'2','Tanya Jawab','administrasi/tanya_jawab','',2,NULL,'1','','2018-04-23 19:43:49','','2018-04-23 19:43:49'),(10203,102,'2','Jadwal Dokter','administrasi/jadwal_dokter','',3,NULL,'1','','2018-04-23 19:43:45','','2018-04-23 19:43:45'),(10301,103,'2','Pelayanan','#','',1,NULL,'1','','2018-04-23 19:47:31','','2018-04-23 19:47:31'),(10302,103,'2','Rujukan Nasional','#','',2,NULL,'1','','2018-04-23 19:48:12','','2018-04-23 19:48:12'),(10303,103,'2','Media Center','#','',3,NULL,'1','','2018-04-23 19:48:06','','2018-04-23 19:48:06'),(10304,103,'2','Pusat Kesehatan','#','',4,NULL,'1','','2018-04-23 19:48:02','','2018-04-23 19:48:02'),(10305,103,'2','Slider','#','',5,NULL,'1','','2018-04-23 19:47:56','','2018-04-23 19:47:56'),(10401,104,'2','Kategori','#','',1,NULL,'1','','2018-04-23 19:50:50','','2018-04-23 19:50:50'),(10402,104,'2','List','#','',2,NULL,'1','','2018-04-23 19:50:54','','2018-04-23 19:50:54'),(10601,106,'2','Halaman Dinamis','#','',1,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10602,106,'2','Menu Website','#','',2,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10701,107,'2','Data Dokter','master/data_dokter','',1,'Daftar Dokter Terdaftar','1','sql','2018-04-09 00:31:50','','2018-04-09 00:31:50'),(10702,107,'2','Data Pasien','master/data_pasien','',2,'Daftar pasien','1','sql','2018-04-09 00:31:54','','2018-04-09 00:31:54'),(10703,107,'2','Kontak','master/kontak','',3,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10704,107,'2','Tautan','master/tautan','',4,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10705,107,'2','Kewarganegaraan','master/kewarganegaraan','',5,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10706,107,'2','Rumah Sakit','master/rumah_sakit','',6,NULL,'1','','2018-04-09 00:54:29','','2018-04-09 00:54:29'),(10707,107,'2','Poli','master/poli','',7,NULL,'1','','2018-04-09 00:54:38','','2018-04-09 00:54:38'),(10708,107,'2','Kategori Diskusi','master/kategori_diskusi','',8,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10709,107,'2','Spesialisasi','master/spesialisasi','',9,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10710,107,'2','Jabatan Dokter','master/jabatan_dokter','',10,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10711,107,'2','Tipe Media','master/tipe_media','',11,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10712,107,'2','Tipe Pendaftar','master/tipe_pendaftar','',12,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10713,107,'2','Cara Bayar','master/cara_bayar','',13,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10801,108,'2','Data Pengguna','setting/data_pengguna','',1,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00'),(10802,108,'2','Hak Akses','setting/hak_akses','',2,NULL,'1','','0000-00-00 00:00:00','','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
