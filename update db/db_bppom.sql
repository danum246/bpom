/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.1.33-community : Database - db_bppom
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

/*Table structure for table `tbl_analisa` */

DROP TABLE IF EXISTS `tbl_analisa`;

CREATE TABLE `tbl_analisa` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) NOT NULL,
  `kd_racun` varchar(11) NOT NULL,
  `kd_gejala` varchar(50) NOT NULL,
  `organ_id` varchar(50) NOT NULL,
  `total_pasien` int(11) NOT NULL,
  `jml_identifikasi` int(11) DEFAULT NULL,
  `persentase` float NOT NULL,
  PRIMARY KEY (`id_analisa`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_analisa` */

/*Table structure for table `tbl_gejala` */

DROP TABLE IF EXISTS `tbl_gejala`;

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(50) NOT NULL,
  `gejala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_gejala`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gejala` */

insert  into `tbl_gejala`(`id_gejala`,`kd_gejala`,`gejala`) values (13,'ML','Mual'),(14,'MTH','Muntah'),(15,'KPRT','Kejang Perut'),(16,'DRE','Diare'),(17,'SKTPRT','Sakit Perut'),(18,'PRTKBG','Perut Kembung'),(19,'SYOK','Syok'),(20,'KJG','Kejang'),(21,'PSG','Pingsan'),(22,'DMM','Demam'),(23,'SKTKPL','Sakit Kepala'),(24,'MGGL','Menggigil'),(25,'LMH','Lemah'),(26,'DHDR','Dehidrasi'),(27,'SKTLBG','Sakit Pada Lambung');

/*Table structure for table `tbl_jabatan` */

DROP TABLE IF EXISTS `tbl_jabatan`;

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jabatan` */

insert  into `tbl_jabatan`(`id_jabatan`,`jabatan`,`lembaga_id`) values (1,'Superadmin',1),(3,'baru',3),(4,'Operator',4);

/*Table structure for table `tbl_kabupaten` */

DROP TABLE IF EXISTS `tbl_kabupaten`;

CREATE TABLE `tbl_kabupaten` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kabupaten` */

insert  into `tbl_kabupaten`(`id_kabupaten`,`kabupaten_kota`,`provinsi_id`) values (1,'Jakarta Timur',1);

/*Table structure for table `tbl_karyawan` */

DROP TABLE IF EXISTS `tbl_karyawan`;

CREATE TABLE `tbl_karyawan` (
  `id_kary` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jns_kel` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = aktif , 0 = tidak',
  `pictures` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `id_kary` (`id_kary`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_karyawan` */

insert  into `tbl_karyawan`(`id_kary`,`nik`,`nama`,`jns_kel`,`alamat`,`hp`,`email`,`jabatan_id`,`status`,`pictures`) values (1,'201110225043','Superadmin','','matraman','+6287781042439','danum246@gmail.com',1,1,NULL),(2,'11111111111','Danu Mahendra','','alamat','+621212121212','email@email.com',3,1,NULL),(3,'213897281947','Fata Aisy Salim','','alamat','+621212121212','email@email.com',4,1,NULL);

/*Table structure for table `tbl_kecamatan` */

DROP TABLE IF EXISTS `tbl_kecamatan`;

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kecamatan` */

insert  into `tbl_kecamatan`(`id_kecamatan`,`kecamatan`,`kabupaten_id`) values (1,'Matraman',1);

/*Table structure for table `tbl_keluhan_pasien` */

DROP TABLE IF EXISTS `tbl_keluhan_pasien`;

CREATE TABLE `tbl_keluhan_pasien` (
  `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `pasien` varchar(100) NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_terjadi` datetime DEFAULT NULL,
  `kd_gejala` varchar(100) NOT NULL COMMENT 'isian ny array . ex: 1,2,3,4',
  `organ_id` int(11) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `kd_keluhan` varchar(100) DEFAULT NULL COMMENT 'update setelah selesai isi semua laporan pasien',
  `lembaga_id` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL COMMENT '1 = sudah dapat kode keluhan, 0 = belum',
  PRIMARY KEY (`id_keluhan`),
  KEY `id_keluhan` (`id_keluhan`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_keluhan_pasien` */

/*Table structure for table `tbl_kelurahan` */

DROP TABLE IF EXISTS `tbl_kelurahan`;

CREATE TABLE `tbl_kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  PRIMARY KEY (`id_kelurahan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelurahan` */

insert  into `tbl_kelurahan`(`id_kelurahan`,`kelurahan`,`kecamatan_id`) values (1,'Palmeriam',1);

/*Table structure for table `tbl_lembaga` */

DROP TABLE IF EXISTS `tbl_lembaga`;

CREATE TABLE `tbl_lembaga` (
  `id_lembaga` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lembaga` varchar(50) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1 = pusat, 2 = dinas kesehatan kabupaten , 3 = puskesmas',
  `kelurahan_id` int(11) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  `pusat` int(11) NOT NULL COMMENT '1 = yes , 0 = no',
  PRIMARY KEY (`kode_lembaga`),
  KEY `id_lembaga` (`id_lembaga`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lembaga` */

insert  into `tbl_lembaga`(`id_lembaga`,`kode_lembaga`,`lembaga`,`level`,`kelurahan_id`,`kabupaten_id`,`pusat`) values (1,'Superadmin','Superadmin',1,NULL,NULL,0),(3,'Puskesmas','Puskesmas',3,1,1,0),(4,'DK-Jaktim','Dinas Kesehatan Jakarta Timur',2,0,1,0),(5,'BPOM','Badan Pengawasan Obat dan Makanan',1,NULL,NULL,1);

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id_menu`,`menu`,`url`,`parent_menu`,`icon`) values (2,'Form','-',0,'icon-th-list '),(3,'Setting','-',0,'icon-cogs '),(4,'User Apps','setting/user',3,NULL),(5,'Role Menu','setting/role',3,NULL),(6,'Jabatan','data/jabatan',7,NULL),(7,'Data','-',0,'icon-folder-open '),(8,'Karyawan','data/karyawan',7,NULL),(25,'Master','-',0,'icon-book '),(9,'Report','report',0,'icon-list-alt'),(10,'Menu','setting/menu',3,NULL),(11,'Form 1','form/form01',2,NULL),(12,'Form 2','#',2,NULL),(13,'Region','setting/region',3,NULL),(20,'Gejala','master/gejala',25,NULL),(19,'Racun','master/racun',25,NULL),(18,'Lembaga','data/lembaga',7,NULL),(24,'Pangan','master/pangan',25,NULL);

/*Table structure for table `tbl_organ` */

DROP TABLE IF EXISTS `tbl_organ`;

CREATE TABLE `tbl_organ` (
  `id_organ` int(11) NOT NULL AUTO_INCREMENT,
  `organ_terlibat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_organ`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_organ` */

insert  into `tbl_organ`(`id_organ`,`organ_terlibat`) values (1,'Pencernaan Atas'),(2,'Pencernaan Bawah');

/*Table structure for table `tbl_pangan` */

DROP TABLE IF EXISTS `tbl_pangan`;

CREATE TABLE `tbl_pangan` (
  `id_pangan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pangan` varchar(100) NOT NULL,
  `pangan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`kd_pangan`),
  KEY `id_pangan` (`id_pangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pangan` */

/*Table structure for table `tbl_provinsi` */

DROP TABLE IF EXISTS `tbl_provinsi`;

CREATE TABLE `tbl_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_provinsi` */

insert  into `tbl_provinsi`(`id_provinsi`,`provinsi`) values (1,'Jakarta');

/*Table structure for table `tbl_racun` */

DROP TABLE IF EXISTS `tbl_racun`;

CREATE TABLE `tbl_racun` (
  `id_racun` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) NOT NULL,
  `racun` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `inkubasi_rata` int(11) DEFAULT NULL,
  `inkubasi_pendek` int(11) DEFAULT NULL,
  `inkubasi_tinggi` int(11) DEFAULT NULL,
  `organ_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_racun`),
  KEY `id_racun` (`id_racun`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_racun` */

insert  into `tbl_racun`(`id_racun`,`kd_racun`,`racun`,`keterangan`,`inkubasi_rata`,`inkubasi_pendek`,`inkubasi_tinggi`,`organ_id`) values (11,'GST','Gastrointestinal','Jamur',NULL,1,2,1),(12,'ANTMN','Antimoni','Keracunan Antimoni',NULL,6,60,1),(13,'KDMIUM','Kadmium','Keracunan Kadmium',NULL,6,360,1),(14,'FLRD','Florida','Keracunan Florida',NULL,6,120,1),(15,'TMH','Timah','Keracunan Timah',NULL,30,120,1),(16,'ARSNK','Arsenik','Keracunan Arsenik',NULL,50,60,1),(17,'BCL','Bacillus cereus\r\n',NULL,NULL,30,300,1),(18,'CLSR','Clostridium prefringens enteritis\r\n',NULL,600,480,1320,2),(19,'VBRCL','Vibrio cholerae\r\n',NULL,2880,360,7200,2),(20,'VBRCL-M','Vibrio cholerae menyerupai\r\n',NULL,1440,360,7200,2),(21,'SLMNL','Salmonella Enteritidis\r\n',NULL,NULL,720,4320,2),(22,'VBRPRH','Vibrio parahaemolyticus\r\n',NULL,720,120,2880,2);

/*Table structure for table `tbl_racun_gejala` */

DROP TABLE IF EXISTS `tbl_racun_gejala`;

CREATE TABLE `tbl_racun_gejala` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) DEFAULT NULL,
  `kd_gejala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_racun_gejala` */

insert  into `tbl_racun_gejala`(`no`,`kd_racun`,`kd_gejala`) values (26,'GST','ML'),(27,'GST','MTH'),(28,'GST','DRE'),(29,'GST','KPRT'),(30,'ANTMN','MTH'),(31,'ANTMN','KPRT'),(32,'ANTMN','DRE'),(33,'KDMIUM','ML'),(34,'KDMIUM','MTH'),(35,'KDMIUM','DRE'),(36,'KDMIUM','SKTPRT'),(37,'FLRD','MTH'),(38,'FLRD','DRE'),(39,'FLRD','SKTPRT'),(40,'FLRD','PSG'),(41,'FLRD','SYOK'),(42,'TMH','ML'),(43,'TMH','MTH'),(44,'TMH','DRE'),(45,'TMH','SKTKPL'),(46,'TMH','PRTKBG'),(47,'TMH','KPRT'),(48,'ARSNK','SKTLBG'),(49,'ARSNK','MTH'),(50,'ARSNK','DRE'),(51,'BCL','ML'),(52,'BCL','MTH'),(53,'BCL','DRE'),(54,'CLSR','KPRT'),(55,'CLSR','DRE'),(56,'VBRCL','DRE'),(57,'VBRCL','MTH'),(58,'VBRCL','KPRT'),(59,'VBRCL','ML'),(60,'VBRCL','SYOK'),(61,'VBRCL','DHDR'),(62,'VBRCL-M','DRE'),(63,'SLMNL','KPRT'),(64,'SLMNL','DRE'),(65,'SLMNL','DMM'),(66,'SLMNL','ML'),(67,'SLMNL','MTH'),(68,'SLMNL','LMH'),(69,'VBRPRH','KPRT'),(70,'VBRPRH','ML'),(71,'VBRPRH','MTH'),(72,'VBRPRH','DMM'),(73,'VBRPRH','DRE'),(74,'VBRPRH','MGGL'),(75,'VBRPRH','SKTKPL');

/*Table structure for table `tbl_racun_pangan` */

DROP TABLE IF EXISTS `tbl_racun_pangan`;

CREATE TABLE `tbl_racun_pangan` (
  `id_racun_pangan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(100) DEFAULT NULL COMMENT 'satu kode racun',
  `kd_pangan` varchar(100) DEFAULT NULL COMMENT 'array kode pangan (''1,2,3'')',
  PRIMARY KEY (`id_racun_pangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_racun_pangan` */

/*Table structure for table `tbl_resume_detail` */

DROP TABLE IF EXISTS `tbl_resume_detail`;

CREATE TABLE `tbl_resume_detail` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) DEFAULT NULL,
  `kd_racun` varchar(100) DEFAULT NULL,
  `racun_pangan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_resume_detail` */

/*Table structure for table `tbl_resume_keluhan` */

DROP TABLE IF EXISTS `tbl_resume_keluhan`;

CREATE TABLE `tbl_resume_keluhan` (
  `id_resume` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) NOT NULL,
  `nama_kejadian` text NOT NULL,
  `nik_pelapor` varchar(100) NOT NULL,
  `waktu_lapor` datetime NOT NULL,
  `gejala_umum` varchar(255) DEFAULT NULL COMMENT 'array kode gejala dari tbl_keluhan{''1,2,3''}',
  `total_pasien` int(11) DEFAULT NULL,
  `total_normal` int(11) DEFAULT NULL,
  `total_sakit` int(11) DEFAULT NULL,
  `total_meninggal` int(11) DEFAULT NULL,
  `lembaga_id` int(11) NOT NULL,
  `flag` int(2) NOT NULL COMMENT '0 = belum selesai, 1 = selesai',
  PRIMARY KEY (`id_resume`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_resume_keluhan` */

/*Table structure for table `tbl_role_access` */

DROP TABLE IF EXISTS `tbl_role_access`;

CREATE TABLE `tbl_role_access` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_role_access` */

insert  into `tbl_role_access`(`id_role`,`menu_id`,`lembaga_id`) values (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(10,9,1),(11,10,1),(12,11,1),(13,12,1),(14,13,1),(26,25,1),(25,24,1),(24,9,4),(23,2,3),(19,18,1),(20,19,1),(21,20,1),(27,11,3);

/*Table structure for table `tbl_user_login` */

DROP TABLE IF EXISTS `tbl_user_login`;

CREATE TABLE `tbl_user_login` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_plain` varchar(30) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = aktif , 0 = tidak',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_login` */

insert  into `tbl_user_login`(`id_user`,`username`,`password`,`password_plain`,`nik`,`status`) values (1,'admin','4b024ea6d105498e1b261507edff2f482ffd1660','123456','201110225043',1),(4,'admin-pkm','4b024ea6d105498e1b261507edff2f482ffd1660','123456','11111111111',1),(5,'admin-dk','4b024ea6d105498e1b261507edff2f482ffd1660','123456','213897281947',1);

/*Table structure for table `view_daerah` */

DROP TABLE IF EXISTS `view_daerah`;

/*!50001 DROP VIEW IF EXISTS `view_daerah` */;
/*!50001 DROP TABLE IF EXISTS `view_daerah` */;

/*!50001 CREATE TABLE  `view_daerah`(
 `id_kelurahan` int(11) ,
 `kelurahan` varchar(100) ,
 `kecamatan_id` int(11) ,
 `id_kecamatan` int(11) ,
 `kecamatan` varchar(100) ,
 `kabupaten_id` int(11) ,
 `id_kabupaten` int(11) ,
 `kabupaten_kota` varchar(100) ,
 `provinsi_id` int(11) ,
 `id_provinsi` int(11) ,
 `provinsi` varchar(100) 
)*/;

/*Table structure for table `view_role` */

DROP TABLE IF EXISTS `view_role`;

/*!50001 DROP VIEW IF EXISTS `view_role` */;
/*!50001 DROP TABLE IF EXISTS `view_role` */;

/*!50001 CREATE TABLE  `view_role`(
 `id_role` int(11) ,
 `menu_id` int(11) ,
 `lembaga_id` int(11) ,
 `menu` varchar(30) ,
 `id_menu` int(11) ,
 `parent_menu` int(11) 
)*/;

/*Table structure for table `view_user` */

DROP TABLE IF EXISTS `view_user`;

/*!50001 DROP VIEW IF EXISTS `view_user` */;
/*!50001 DROP TABLE IF EXISTS `view_user` */;

/*!50001 CREATE TABLE  `view_user`(
 `id_user` int(11) ,
 `nik` varchar(50) ,
 `password_plain` varchar(30) ,
 `status` int(11) ,
 `username` varchar(50) ,
 `nama` varchar(50) 
)*/;

/*View structure for view view_daerah */

/*!50001 DROP TABLE IF EXISTS `view_daerah` */;
/*!50001 DROP VIEW IF EXISTS `view_daerah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daerah` AS (select `a`.`id_kelurahan` AS `id_kelurahan`,`a`.`kelurahan` AS `kelurahan`,`a`.`kecamatan_id` AS `kecamatan_id`,`b`.`id_kecamatan` AS `id_kecamatan`,`b`.`kecamatan` AS `kecamatan`,`b`.`kabupaten_id` AS `kabupaten_id`,`c`.`id_kabupaten` AS `id_kabupaten`,`c`.`kabupaten_kota` AS `kabupaten_kota`,`c`.`provinsi_id` AS `provinsi_id`,`d`.`id_provinsi` AS `id_provinsi`,`d`.`provinsi` AS `provinsi` from (((`tbl_kelurahan` `a` join `tbl_kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`id_kecamatan`))) join `tbl_kabupaten` `c` on((`b`.`kabupaten_id` = `c`.`id_kabupaten`))) join `tbl_provinsi` `d` on((`c`.`provinsi_id` = `d`.`id_provinsi`)))) */;

/*View structure for view view_role */

/*!50001 DROP TABLE IF EXISTS `view_role` */;
/*!50001 DROP VIEW IF EXISTS `view_role` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_role` AS select `b`.`id_role` AS `id_role`,`b`.`menu_id` AS `menu_id`,`b`.`lembaga_id` AS `lembaga_id`,`a`.`menu` AS `menu`,`a`.`id_menu` AS `id_menu`,`a`.`parent_menu` AS `parent_menu` from ((`tbl_menu` `a` left join `tbl_role_access` `b` on((`a`.`id_menu` = `b`.`menu_id`))) left join `tbl_lembaga` `c` on((`b`.`lembaga_id` = `c`.`id_lembaga`))) */;

/*View structure for view view_user */

/*!50001 DROP TABLE IF EXISTS `view_user` */;
/*!50001 DROP VIEW IF EXISTS `view_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `a`.`id_user` AS `id_user`,`a`.`nik` AS `nik`,`a`.`password_plain` AS `password_plain`,`a`.`status` AS `status`,`a`.`username` AS `username`,`b`.`nama` AS `nama` from (((`tbl_user_login` `a` join `tbl_karyawan` `b` on((`a`.`nik` = `b`.`nik`))) join `tbl_jabatan` `c` on((`b`.`jabatan_id` = `c`.`id_jabatan`))) join `tbl_lembaga` `d` on((`c`.`lembaga_id` = `d`.`id_lembaga`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
