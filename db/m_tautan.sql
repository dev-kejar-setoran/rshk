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

/*Table structure for table `m_tautan` */

DROP TABLE IF EXISTS `m_tautan`;

CREATE TABLE `m_tautan` (
  `id_tautan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tautan` varchar(50) NOT NULL,
  `tautan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tautan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_tautan` */

insert  into `m_tautan`(`id_tautan`,`nama_tautan`,`tautan`,`deskripsi`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Kemenkes123','http://www.kemenkes.go.id','Test','Admin','2018-04-07 16:11:23','Admin','2018-04-07 11:11:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
