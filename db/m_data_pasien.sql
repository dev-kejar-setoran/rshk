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

/*Table structure for table `m_data_pasien` */

DROP TABLE IF EXISTS `m_data_pasien`;

CREATE TABLE `m_data_pasien` (
  `id_pasien` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `m_data_pasien` */

insert  into `m_data_pasien`(`id_pasien`,`nama_pasien`,`nomor_kartu`,`jenis_kelamin`,`tempat_lahir`,`tgl_lahir`,`id_kewarganegaraan`,`asuransi`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Joko Santoso2','5678','L','kebumen','1999-01-01',1,'ada','2018-04-03 00:41:46',NULL,'2018-04-02 19:41:46',NULL),(3,'err','ergh','L','rt','0000-00-00',1,'ada','2018-04-02 20:05:19',NULL,NULL,NULL),(4,'','','L','',NULL,0,'ada','2018-04-04 17:27:40',NULL,NULL,NULL),(6,'','','L','',NULL,0,'ada','2018-04-04 17:30:06',NULL,NULL,NULL),(11,'','','L','',NULL,0,'ada','2018-04-05 05:56:22',NULL,NULL,NULL),(13,'okok','34567','L','bandung','2011-10-01',1,'ada','2018-04-07 08:49:47',NULL,NULL,NULL),(14,'gogo','76543','L','kalem','2011-01-01',1,'ada','2018-04-07 08:52:42',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
