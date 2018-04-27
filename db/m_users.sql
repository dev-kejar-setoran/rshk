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

/*Table structure for table `m_users` */

DROP TABLE IF EXISTS `m_users`;

CREATE TABLE `m_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `m_users` */

insert  into `m_users`(`id_user`,`username`,`password`,`nama_lengkap`,`email`,`tlp`,`role`,`status`,`last_login`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'admin','827ccb0eea8a706c4c34a16891f84e7b','Admin','admin@gmail.com','123456','admin',1,'2018-04-02 15:44:48','','2018-04-09 02:25:58','','2018-04-09 02:25:58'),(2,'manager','827ccb0eea8a706c4c34a16891f84e7b','Manager','manager@mail.com','098746789','manager',1,'2018-04-15 14:29:44','sql','2018-04-15 14:30:11','','2018-04-15 14:30:16'),(5,'mae@gmail.com','28809d43a0954ec0fed027e93acc428e','Maemunah','mae@gmail.com','0987345673','admin',1,'2018-04-15 22:45:20','Admin','2018-04-16 13:45:03','','2018-04-16 13:45:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
