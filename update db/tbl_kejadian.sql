/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.16 : Database - db_bppom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bppom` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_bppom`;

/*Table structure for table `tbl_status_kejadian` */

DROP TABLE IF EXISTS `tbl_status_kejadian`;

CREATE TABLE `tbl_status_kejadian` (
  `id_status_kj` int(11) NOT NULL AUTO_INCREMENT,
  `no_kejadian` varchar(100) DEFAULT NULL,
  `status_klb` int(11) DEFAULT NULL COMMENT '1 = klb , 2 = berhenti , 0 = bukan',
  `catatan` text,
  `file_upload` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status_kj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_status_kejadian` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
