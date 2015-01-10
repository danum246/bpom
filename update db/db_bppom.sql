-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2015 at 06:03 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bppom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE IF NOT EXISTS `tbl_gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(50) NOT NULL,
  `gejala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_gejala`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `lembaga_id`) VALUES
(1, 'Superadmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabupaten`
--

CREATE TABLE IF NOT EXISTS `tbl_kabupaten` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_kabupaten`
--

INSERT INTO `tbl_kabupaten` (`id_kabupaten`, `kabupaten_kota`, `provinsi_id`) VALUES
(1, 'Jakarta Timur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE IF NOT EXISTS `tbl_karyawan` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_kary`, `nik`, `nama`, `jns_kel`, `alamat`, `hp`, `email`, `jabatan_id`, `status`, `pictures`) VALUES
(1, '201110225043', 'danu', '', 'matraman', '+6287781042439', 'danum246@gmail.com', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE IF NOT EXISTS `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `kecamatan`, `kabupaten_id`) VALUES
(1, 'Matraman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluhan_pasien`
--

CREATE TABLE IF NOT EXISTS `tbl_keluhan_pasien` (
  `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) NOT NULL,
  `pasien` varchar(100) NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_terjadi` datetime NOT NULL,
  `kd_gejala` varchar(100) NOT NULL COMMENT 'isian ny array . ex: 1,2,3,4',
  `alamat` text,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`kd_keluhan`),
  KEY `id_keluhan` (`id_keluhan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelurahan`
--

CREATE TABLE IF NOT EXISTS `tbl_kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  PRIMARY KEY (`id_kelurahan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`id_kelurahan`, `kelurahan`, `kecamatan_id`) VALUES
(1, 'Palmeriam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lembaga`
--

CREATE TABLE IF NOT EXISTS `tbl_lembaga` (
  `id_lembaga` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lembaga` varchar(50) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1 = pusat, 2 = dinas kesehatan kabupaten , 3 = puskesmas',
  `kelurahan_id` int(11) DEFAULT NULL,
  `kabupaten_id` int(11) DEFAULT NULL,
  `pusat` int(11) NOT NULL COMMENT '1 = yes , 0 = no',
  PRIMARY KEY (`kode_lembaga`),
  KEY `id_lembaga` (`id_lembaga`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_lembaga`
--

INSERT INTO `tbl_lembaga` (`id_lembaga`, `kode_lembaga`, `lembaga`, `level`, `kelurahan_id`, `kabupaten_id`, `pusat`) VALUES
(1, 'BPOM-Super', 'Badan Pengawas Obat Dan Makanan', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu`, `url`, `parent_menu`, `icon`) VALUES
(1, 'Dashboard', 'dashboard', 0, 'icon-home '),
(2, 'Form', '-', 0, 'icon-th-list '),
(3, 'Setting', '-', 0, 'icon-cogs '),
(4, 'User Apps', 'setting/user', 3, NULL),
(5, 'Role Menu', 'setting/role', 3, NULL),
(6, 'Jabatan', 'setting/jabatan', 3, NULL),
(7, 'Data', '-', 0, 'icon-folder-open '),
(8, 'Karyawan', 'data/karyawan', 7, NULL),
(9, 'Report', 'report', 0, 'icon-list-alt'),
(10, 'Menu', 'setting/menu', 3, NULL),
(11, 'Form 1', 'form/form01', 2, NULL),
(12, 'Form 2', '#', 2, NULL),
(13, 'Region', '-', 3, NULL),
(20, 'Gejala', '#', 7, NULL),
(19, 'Racun', '#', 7, NULL),
(18, 'Lembaga', 'data/lembaga', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE IF NOT EXISTS `tbl_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_racun`
--

CREATE TABLE IF NOT EXISTS `tbl_racun` (
  `id_racun` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) NOT NULL,
  `racun` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `inkubasi_rata` int(11) DEFAULT NULL,
  `inkubasi_pendek` int(11) DEFAULT NULL,
  `inkubasi_tinggi` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_racun`),
  KEY `id_racun` (`id_racun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_racun_gejala`
--

CREATE TABLE IF NOT EXISTS `tbl_racun_gejala` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) DEFAULT NULL,
  `kd_gejala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_access`
--

CREATE TABLE IF NOT EXISTS `tbl_role_access` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_role_access`
--

INSERT INTO `tbl_role_access` (`id_role`, `menu_id`, `lembaga_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(10, 9, 1),
(11, 10, 1),
(12, 11, 1),
(13, 12, 1),
(14, 13, 1),
(19, 18, 1),
(20, 19, 1),
(21, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE IF NOT EXISTS `tbl_user_login` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_plain` varchar(30) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = aktif , 0 = tidak',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id_user`, `username`, `password`, `password_plain`, `nik`, `status`) VALUES
(1, 'admin', '4b024ea6d105498e1b261507edff2f482ffd1660', '123456', '201110225043', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_daerah`
--
CREATE TABLE IF NOT EXISTS `view_daerah` (
`id_kelurahan` int(11)
,`kelurahan` varchar(100)
,`kecamatan_id` int(11)
,`id_kecamatan` int(11)
,`kecamatan` varchar(100)
,`kabupaten_id` int(11)
,`id_kabupaten` int(11)
,`kabupaten_kota` varchar(100)
,`provinsi_id` int(11)
,`id_provinsi` int(11)
,`provinsi` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `view_daerah`
--
DROP TABLE IF EXISTS `view_daerah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daerah` AS (select `a`.`id_kelurahan` AS `id_kelurahan`,`a`.`kelurahan` AS `kelurahan`,`a`.`kecamatan_id` AS `kecamatan_id`,`b`.`id_kecamatan` AS `id_kecamatan`,`b`.`kecamatan` AS `kecamatan`,`b`.`kabupaten_id` AS `kabupaten_id`,`c`.`id_kabupaten` AS `id_kabupaten`,`c`.`kabupaten_kota` AS `kabupaten_kota`,`c`.`provinsi_id` AS `provinsi_id`,`d`.`id_provinsi` AS `id_provinsi`,`d`.`provinsi` AS `provinsi` from (((`tbl_kelurahan` `a` join `tbl_kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`id_kecamatan`))) join `tbl_kabupaten` `c` on((`b`.`kabupaten_id` = `c`.`id_kabupaten`))) join `tbl_provinsi` `d` on((`c`.`provinsi_id` = `d`.`id_provinsi`))));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
