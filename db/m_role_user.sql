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

/*Table structure for table `m_role_user` */

DROP TABLE IF EXISTS `m_role_user`;

CREATE TABLE `m_role_user` (
  `role` varchar(50) NOT NULL,
  `id_role_menu` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_role_user` */

insert  into `m_role_user`(`role`,`id_role_menu`,`created_by`,`created_at`,`updated_by`,`updated_at`) values ('admin',101,'Admin','2018-04-14 09:28:53','','0000-00-00 00:00:00'),('admin',102,'Admin','2018-04-14 09:28:53','','0000-00-00 00:00:00'),('admin',103,'Admin','2018-04-14 09:28:53','','0000-00-00 00:00:00'),('admin',104,'Admin','2018-04-14 09:28:53','','0000-00-00 00:00:00'),('admin',10401,'Admin','2018-04-14 09:28:53','','0000-00-00 00:00:00'),('admin',10402,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10403,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10404,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10405,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',105,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10501,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10502,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',106,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10601,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10602,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',107,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10701,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10702,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10703,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10704,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10705,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10706,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10707,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10708,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10709,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10710,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10711,'Admin','2018-04-14 09:28:54','','0000-00-00 00:00:00'),('admin',10712,'Admin','2018-04-14 09:28:55','','0000-00-00 00:00:00'),('admin',10713,'Admin','2018-04-14 09:28:55','','0000-00-00 00:00:00'),('admin',108,'Admin','2018-04-14 09:28:55','','0000-00-00 00:00:00'),('admin',10801,'Admin','2018-04-14 09:28:55','','0000-00-00 00:00:00'),('admin',10802,'Admin','2018-04-14 09:28:55','','0000-00-00 00:00:00'),('manager',101,'Admin','2018-04-14 11:15:20','','0000-00-00 00:00:00'),('manager',102,'Admin','2018-04-14 11:15:20','','0000-00-00 00:00:00'),('manager',103,'Admin','2018-04-14 11:15:20','','0000-00-00 00:00:00'),('manager',104,'Admin','2018-04-14 11:15:20','','0000-00-00 00:00:00'),('manager',10401,'Admin','2018-04-14 11:15:20','','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
