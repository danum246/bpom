-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 05:44 AM
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
-- Table structure for table `tbl_analisa`
--

CREATE TABLE IF NOT EXISTS `tbl_analisa` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) NOT NULL,
  `kd_racun` varchar(11) NOT NULL,
  `kd_gejala` varchar(50) NOT NULL,
  `organ_id` varchar(50) NOT NULL,
  `total_pasien` int(11) NOT NULL,
  `jml_identifikasi` int(11) DEFAULT NULL,
  `persentase` float NOT NULL,
  PRIMARY KEY (`id_analisa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_analisa`
--

INSERT INTO `tbl_analisa` (`id_analisa`, `kd_keluhan`, `kd_racun`, `kd_gejala`, `organ_id`, `total_pasien`, `jml_identifikasi`, `persentase`) VALUES
(1, 'PPL-2015-MTR-01-1', 'RC-002', 'GJ-01', '1', 6, 2, 33.33),
(2, 'PPL-2015-MTR-01-1', 'RC-002', 'GL-4', '1', 6, 2, 33.33),
(3, 'PPL-2015-MTR-01-1', 'RC-003', 'GJ-05', '2', 6, 2, 33.33),
(4, 'PPL-2015-MTR-01-1', 'RC-004', 'GJ-01', '1', 6, 1, 16.67),
(5, 'PPL-2015-MTR-01-1', 'STR', 'GJ-05', '1', 6, 3, 50);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kd_gejala`, `gejala`) VALUES
(1, 'GJ-01', 'Mual'),
(2, 'Gj-02', 'Diare'),
(3, 'GJ-03', 'Demam'),
(4, 'GJ-04', 'Pusing'),
(5, 'GJ-05', 'Muntah'),
(6, 'GL-1', 'Batuk'),
(8, 'GL-3', 'Mencret'),
(9, 'GL-2', 'Panas'),
(11, 'GL-4', 'Meriang'),
(12, 'GL-5', 'BAB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `lembaga_id`) VALUES
(1, 'Superadmin', 1),
(3, 'baru', 3),
(4, 'Operator', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_kary`, `nik`, `nama`, `jns_kel`, `alamat`, `hp`, `email`, `jabatan_id`, `status`, `pictures`) VALUES
(1, '201110225043', 'Superadmin', '', 'matraman', '+6287781042439', 'danum246@gmail.com', 1, 1, NULL),
(2, '11111111111', 'Danu Mahendra', '', 'alamat', '+621212121212', 'email@email.com', 3, 1, NULL),
(3, '213897281947', 'Fata Aisy Salim', '', 'alamat', '+621212121212', 'email@email.com', 4, 1, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_keluhan_pasien`
--

INSERT INTO `tbl_keluhan_pasien` (`id_keluhan`, `pasien`, `waktu_awal`, `waktu_terjadi`, `kd_gejala`, `organ_id`, `lokasi`, `kd_keluhan`, `lembaga_id`, `flag`) VALUES
(19, 'Satria', '2015-01-15 11:13:00', '2015-01-15 11:16:00', 'GJ-01,GJ-05,GL-4', 1, 'Bekasi', 'PPL-2015-MTR-01-1', 1, 1),
(20, 'Andi', '2015-01-15 11:27:00', '2015-01-15 11:32:00', 'GJ-01,GJ-05,GL-5', 1, 'Bekasi', 'PPL-2015-MTR-01-1', 1, 1),
(21, 'Reza', '2015-01-15 11:28:00', '2015-01-15 11:31:00', 'Gj-02,GJ-05,GL-5', 2, 'Bekasi', 'PPL-2015-MTR-01-1', 1, 1),
(22, 'Wisnu', '2015-01-15 11:28:00', '2015-01-15 11:31:00', 'Gj-02,GJ-05,GL-4', 1, 'Bekasi', 'PPL-2015-MTR-01-1', 1, 1),
(23, 'Fata', '2015-01-15 11:29:00', '2015-01-15 11:30:00', 'Gj-02,GJ-05,GL-4', 2, '', 'PPL-2015-MTR-01-1', 1, 1),
(24, 'Danu', '2015-01-15 11:29:00', '2015-01-15 11:33:00', 'GJ-01,Gj-02,GJ-05', 2, 'Bekasi', 'PPL-2015-MTR-01-1', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_lembaga`
--

INSERT INTO `tbl_lembaga` (`id_lembaga`, `kode_lembaga`, `lembaga`, `level`, `kelurahan_id`, `kabupaten_id`, `pusat`) VALUES
(1, 'BPOM-Super', 'Badan Pengawas Obat Dan Makanan', 1, NULL, NULL, 1),
(3, 'Puskesmas', 'Puskesmas', 3, 1, 1, 0),
(4, 'DK-Jaktim', 'Dinas Kesehatan Jakarta Timur', 2, 0, 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu`, `url`, `parent_menu`, `icon`) VALUES
(2, 'Form', '-', 0, 'icon-th-list '),
(3, 'Setting', '-', 0, 'icon-cogs '),
(4, 'User Apps', 'setting/user', 3, NULL),
(5, 'Role Menu', 'setting/role', 3, NULL),
(6, 'Jabatan', 'data/jabatan', 7, NULL),
(7, 'Data', '-', 0, 'icon-folder-open '),
(8, 'Karyawan', 'data/karyawan', 7, NULL),
(25, 'Master', '-', 0, 'icon-book '),
(9, 'Report', 'report', 0, 'icon-list-alt'),
(10, 'Menu', 'setting/menu', 3, NULL),
(11, 'Form 1', 'form/form01', 2, NULL),
(12, 'Form 2', '#', 2, NULL),
(13, 'Region', 'setting/region', 3, NULL),
(20, 'Gejala', 'master/gejala', 25, NULL),
(19, 'Racun', 'master/racun', 25, NULL),
(18, 'Lembaga', 'data/lembaga', 7, NULL),
(24, 'Pangan', 'master/pangan', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organ`
--

CREATE TABLE IF NOT EXISTS `tbl_organ` (
  `id_organ` int(11) NOT NULL AUTO_INCREMENT,
  `organ_terlibat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_organ`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_organ`
--

INSERT INTO `tbl_organ` (`id_organ`, `organ_terlibat`) VALUES
(1, 'Pencernaan Atas'),
(2, 'Pencernaan Bawah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pangan`
--

CREATE TABLE IF NOT EXISTS `tbl_pangan` (
  `id_pangan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pangan` varchar(100) NOT NULL,
  `pangan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`kd_pangan`),
  KEY `id_pangan` (`id_pangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `organ_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_racun`),
  KEY `id_racun` (`id_racun`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_racun`
--

INSERT INTO `tbl_racun` (`id_racun`, `kd_racun`, `racun`, `keterangan`, `inkubasi_rata`, `inkubasi_pendek`, `inkubasi_tinggi`, `organ_id`) VALUES
(6, 'RC-002', 'Sianida', '-', 30, 3, 20, 1),
(5, 'RC-001', 'Arsenic', '-', 10, 5, 20, 2),
(7, 'RC-003', 'Klorin', '-', 20, 3, 40, 2),
(8, 'RC-004', 'Hidrogen SIanida', '-', 20, 5, 50, 1),
(9, 'STR', 'Saus Tar-tar', '-', 10, 3, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_racun_gejala`
--

CREATE TABLE IF NOT EXISTS `tbl_racun_gejala` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) DEFAULT NULL,
  `kd_gejala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_racun_gejala`
--

INSERT INTO `tbl_racun_gejala` (`no`, `kd_racun`, `kd_gejala`) VALUES
(14, 'RC-002', 'GL-1'),
(13, 'RC-002', 'GJ-03'),
(12, 'RC-002', 'GJ-01'),
(11, 'RC-001', 'GJ-05'),
(10, 'RC-001', 'GJ-04'),
(9, 'RC-001', 'GJ-01'),
(15, 'RC-002', 'GL-4'),
(16, 'RC-003', 'GJ-04'),
(17, 'RC-003', 'GJ-05'),
(18, 'RC-003', 'GL-3'),
(19, 'RC-004', 'GJ-01'),
(20, 'RC-004', 'Gj-02'),
(21, 'STR', 'GJ-05'),
(22, 'STR', 'GL-1'),
(23, 'STR', 'GL-3'),
(24, 'TKY', 'Gj-02'),
(25, 'TKY', 'GL-3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_racun_pangan`
--

CREATE TABLE IF NOT EXISTS `tbl_racun_pangan` (
  `id_racun_pangan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(100) DEFAULT NULL COMMENT 'satu kode racun',
  `kd_pangan` varchar(100) DEFAULT NULL COMMENT 'array kode pangan (''1,2,3'')',
  PRIMARY KEY (`id_racun_pangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_resume_detail` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_keluhan` varchar(100) DEFAULT NULL,
  `kd_racun` varchar(100) DEFAULT NULL,
  `racun_pangan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume_keluhan`
--

CREATE TABLE IF NOT EXISTS `tbl_resume_keluhan` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_resume_keluhan`
--

INSERT INTO `tbl_resume_keluhan` (`id_resume`, `kd_keluhan`, `nama_kejadian`, `nik_pelapor`, `waktu_lapor`, `gejala_umum`, `total_pasien`, `total_normal`, `total_sakit`, `total_meninggal`, `lembaga_id`, `flag`) VALUES
(5, 'PPL-2015-MTR-01-1', 'Keracunan Bakso', '201110225043', '2015-01-15 05:13:02', 'GJ-05', 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_access`
--

CREATE TABLE IF NOT EXISTS `tbl_role_access` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(26, 25, 1),
(25, 24, 1),
(24, 9, 4),
(23, 2, 3),
(19, 18, 1),
(20, 19, 1),
(21, 20, 1),
(27, 11, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id_user`, `username`, `password`, `password_plain`, `nik`, `status`) VALUES
(1, 'admin', '4b024ea6d105498e1b261507edff2f482ffd1660', '123456', '201110225043', 1),
(4, 'admin-pkm', '4b024ea6d105498e1b261507edff2f482ffd1660', '123456', '11111111111', 1),
(5, 'admin-dk', '4b024ea6d105498e1b261507edff2f482ffd1660', '123456', '213897281947', 1);

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
-- Stand-in structure for view `view_role`
--
CREATE TABLE IF NOT EXISTS `view_role` (
`id_role` int(11)
,`menu_id` int(11)
,`lembaga_id` int(11)
,`menu` varchar(30)
,`id_menu` int(11)
,`parent_menu` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
--
CREATE TABLE IF NOT EXISTS `view_user` (
`id_user` int(11)
,`nik` varchar(50)
,`password_plain` varchar(30)
,`status` int(11)
,`username` varchar(50)
,`nama` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `view_daerah`
--
DROP TABLE IF EXISTS `view_daerah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daerah` AS (select `a`.`id_kelurahan` AS `id_kelurahan`,`a`.`kelurahan` AS `kelurahan`,`a`.`kecamatan_id` AS `kecamatan_id`,`b`.`id_kecamatan` AS `id_kecamatan`,`b`.`kecamatan` AS `kecamatan`,`b`.`kabupaten_id` AS `kabupaten_id`,`c`.`id_kabupaten` AS `id_kabupaten`,`c`.`kabupaten_kota` AS `kabupaten_kota`,`c`.`provinsi_id` AS `provinsi_id`,`d`.`id_provinsi` AS `id_provinsi`,`d`.`provinsi` AS `provinsi` from (((`tbl_kelurahan` `a` join `tbl_kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`id_kecamatan`))) join `tbl_kabupaten` `c` on((`b`.`kabupaten_id` = `c`.`id_kabupaten`))) join `tbl_provinsi` `d` on((`c`.`provinsi_id` = `d`.`id_provinsi`))));

-- --------------------------------------------------------

--
-- Structure for view `view_role`
--
DROP TABLE IF EXISTS `view_role`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_role` AS select `b`.`id_role` AS `id_role`,`b`.`menu_id` AS `menu_id`,`b`.`lembaga_id` AS `lembaga_id`,`a`.`menu` AS `menu`,`a`.`id_menu` AS `id_menu`,`a`.`parent_menu` AS `parent_menu` from ((`tbl_menu` `a` left join `tbl_role_access` `b` on((`a`.`id_menu` = `b`.`menu_id`))) left join `tbl_lembaga` `c` on((`b`.`lembaga_id` = `c`.`id_lembaga`)));

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `a`.`id_user` AS `id_user`,`a`.`nik` AS `nik`,`a`.`password_plain` AS `password_plain`,`a`.`status` AS `status`,`a`.`username` AS `username`,`b`.`nama` AS `nama` from (((`tbl_user_login` `a` join `tbl_karyawan` `b` on((`a`.`nik` = `b`.`nik`))) join `tbl_jabatan` `c` on((`b`.`jabatan_id` = `c`.`id_jabatan`))) join `tbl_lembaga` `d` on((`c`.`lembaga_id` = `d`.`id_lembaga`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
