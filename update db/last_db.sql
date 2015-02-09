-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2015 at 07:50 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=255 ;

--
-- Dumping data for table `tbl_analisa`
--

INSERT INTO `tbl_analisa` (`id_analisa`, `kd_keluhan`, `kd_racun`, `kd_gejala`, `organ_id`, `total_pasien`, `jml_identifikasi`, `persentase`) VALUES
(248, 'PPL-2015-MTR-02-1', 'GST', 'ML', '1', 2, 1, 50),
(249, 'PPL-2015-MTR-02-1', 'KDMIUM', 'ML', '1', 2, 1, 50),
(250, 'PPL-2015-MTR-02-1', 'KDMIUM', 'SKTPRT', '1', 2, 1, 50),
(251, 'PPL-2015-MTR-02-1', 'FLRD', 'SKTPRT', '1', 2, 1, 50),
(252, 'PPL-2015-MTR-02-1', 'FLRD', 'PSG', '1', 2, 1, 50),
(253, 'PPL-2015-MTR-02-1', 'TMH', 'ML', '1', 2, 1, 50),
(254, 'PPL-2015-MTR-02-1', 'BCL', 'ML', '1', 2, 1, 50);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kd_gejala`, `gejala`) VALUES
(13, 'ML', 'Mual'),
(14, 'MTH', 'Muntah'),
(15, 'KPRT', 'Kejang Perut'),
(16, 'DRE', 'Diare'),
(17, 'SKTPRT', 'Sakit Perut'),
(18, 'PRTKBG', 'Perut Kembung'),
(19, 'SYOK', 'Syok'),
(20, 'KJG', 'Kejang'),
(21, 'PSG', 'Pingsan'),
(22, 'DMM', 'Demam'),
(23, 'SKTKPL', 'Sakit Kepala'),
(24, 'MGGL', 'Menggigil'),
(25, 'LMH', 'Lemah'),
(26, 'DHDR', 'Dehidrasi'),
(27, 'SKTLBG', 'Sakit Pada Lambung');

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
  `pekerjaan_id` int(11) NOT NULL,
  `kd_pangan` varchar(200) NOT NULL,
  `status_pasien` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL COMMENT '1 = sudah dapat kode keluhan, 0 = belum',
  `kelurahan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluhan`),
  KEY `id_keluhan` (`id_keluhan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tbl_keluhan_pasien`
--

INSERT INTO `tbl_keluhan_pasien` (`id_keluhan`, `pasien`, `waktu_awal`, `waktu_terjadi`, `kd_gejala`, `organ_id`, `lokasi`, `kd_keluhan`, `lembaga_id`, `pekerjaan_id`, `kd_pangan`, `status_pasien`, `flag`, `kelurahan_id`) VALUES
(57, 'Wita', '2015-02-09 07:44:00', '2015-02-09 07:44:00', 'ML,SKTPRT,DMM,DHDR', NULL, 'Cikarang', 'PPL-2015-MTR-02-1', 1, 2, 'PGN-4,PGN-5,PGN-6,NS,PGN-3', 1, 1, NULL),
(56, 'Angga', '2015-02-09 07:43:00', '2015-02-09 08:43:00', 'ML,SKTPRT,PSG,LMH', NULL, 'Bekasi', 'PPL-2015-MTR-02-1', 1, 2, 'NS,Rpt,PGN-2,PGN-3', 1, 1, NULL);

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
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`kode_lembaga`),
  KEY `id_lembaga` (`id_lembaga`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_lembaga`
--

INSERT INTO `tbl_lembaga` (`id_lembaga`, `kode_lembaga`, `lembaga`, `level`, `kelurahan_id`, `kabupaten_id`, `pusat`, `telepon`, `alamat`) VALUES
(1, 'Superadmin', 'Superadmin', 1, 1, 1, 0, NULL, NULL),
(3, 'Puskesmas', 'Puskesmas', 3, 1, 1, 0, NULL, NULL),
(4, 'DK-Jaktim', 'Dinas Kesehatan Jakarta Timur', 2, 1, 1, 0, NULL, NULL),
(5, 'BPOM', 'Badan Pengawasan Obat dan Makanan', 1, 1, 1, 1, NULL, NULL),
(6, 'dks', 'Din Kes', 2, 1, 1, 0, NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(11, 'Inputan KLB', 'form/form01', 2, NULL),
(12, 'Form 2', '#', 2, NULL),
(13, 'Region', 'setting/region', 3, NULL),
(20, 'Gejala', 'master/gejala', 25, NULL),
(19, 'Racun', 'master/racun', 25, NULL),
(18, 'Lembaga', 'data/lembaga', 7, NULL),
(24, 'Pangan', 'master/pangan', 25, NULL),
(26, 'Resume', 'form/resume', 2, NULL),
(27, 'Penyampaian KLB', 'form/penyampaian', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organ`
--

CREATE TABLE IF NOT EXISTS `tbl_organ` (
  `id_organ` int(11) NOT NULL AUTO_INCREMENT,
  `organ_terlibat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_organ`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_organ`
--

INSERT INTO `tbl_organ` (`id_organ`, `organ_terlibat`) VALUES
(1, 'Pencernaan Atas'),
(2, 'Pencernaan Bawah'),
(3, 'Pencernaan Atas Bawah');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_pangan`
--

INSERT INTO `tbl_pangan` (`id_pangan`, `kd_pangan`, `pangan`, `keterangan`) VALUES
(2, 'NS', 'Nasi', 'Nasi Putih'),
(4, 'Bbr', 'Bubur', 'Bubur Ayam'),
(5, 'Kcg', 'Kacang', 'Kacang Tanah'),
(6, 'My', 'Mie', 'Mie Instant'),
(7, 'Rpt', 'Rumput', 'Rumput Ilalang'),
(8, 'PGN-1', 'Pete', 'Pete'),
(18, 'PGN-3', 'Kacang Panjang', 'Kacang Panjang'),
(17, 'PGN-2', 'Telur', 'Telur'),
(19, 'PGN-4', 'Sapi', 'Sapi'),
(20, 'PGN-5', 'Baut', 'Baut'),
(21, 'PGN-6', 'Mur', 'Mur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Wiraswasta'),
(2, 'Pelajar / Mahasiswa'),
(3, 'Pegawai Negeri'),
(4, 'Nelayan'),
(5, 'Pembalap');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_racun`
--

INSERT INTO `tbl_racun` (`id_racun`, `kd_racun`, `racun`, `keterangan`, `inkubasi_rata`, `inkubasi_pendek`, `inkubasi_tinggi`, `organ_id`) VALUES
(11, 'GST', 'Gastrointestinal', 'Jamur', NULL, 30, 120, 1),
(12, 'ANTMN', 'Antimoni', 'Keracunan Antimoni', NULL, 6, 60, 1),
(13, 'KDMIUM', 'Kadmium', 'Keracunan Kadmium', NULL, 6, 360, 1),
(14, 'FLRD', 'Florida', 'Keracunan Florida', NULL, 6, 120, 1),
(15, 'TMH', 'Timah', 'Keracunan Timah', NULL, 30, 120, 1),
(16, 'ARSNK', 'Arsenik', 'Keracunan Arsenik', NULL, 50, 60, 1),
(17, 'BCL', 'Bacillus cereus\r\n', NULL, NULL, 30, 300, 1),
(18, 'CLSR', 'Clostridium prefringens enteritis\r\n', NULL, 600, 480, 1320, 2),
(19, 'VBRCL', 'Vibrio cholerae\r\n', NULL, 2880, 360, 7200, 2),
(20, 'VBRCL-M', 'Vibrio cholerae menyerupai\r\n', NULL, 1440, 360, 7200, 2),
(21, 'SLMNL', 'Salmonella Enteritidis\r\n', NULL, NULL, 720, 4320, 2),
(22, 'VBRPRH', 'Vibrio parahaemolyticus\r\n', NULL, 720, 120, 2880, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_racun_gejala`
--

CREATE TABLE IF NOT EXISTS `tbl_racun_gejala` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kd_racun` varchar(50) DEFAULT NULL,
  `kd_gejala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tbl_racun_gejala`
--

INSERT INTO `tbl_racun_gejala` (`no`, `kd_racun`, `kd_gejala`) VALUES
(26, 'GST', 'ML'),
(27, 'GST', 'MTH'),
(28, 'GST', 'DRE'),
(29, 'GST', 'KPRT'),
(30, 'ANTMN', 'MTH'),
(31, 'ANTMN', 'KPRT'),
(32, 'ANTMN', 'DRE'),
(33, 'KDMIUM', 'ML'),
(34, 'KDMIUM', 'MTH'),
(35, 'KDMIUM', 'DRE'),
(36, 'KDMIUM', 'SKTPRT'),
(37, 'FLRD', 'MTH'),
(38, 'FLRD', 'DRE'),
(39, 'FLRD', 'SKTPRT'),
(40, 'FLRD', 'PSG'),
(41, 'FLRD', 'SYOK'),
(42, 'TMH', 'ML'),
(43, 'TMH', 'MTH'),
(44, 'TMH', 'DRE'),
(45, 'TMH', 'SKTKPL'),
(46, 'TMH', 'PRTKBG'),
(47, 'TMH', 'KPRT'),
(48, 'ARSNK', 'SKTLBG'),
(49, 'ARSNK', 'MTH'),
(50, 'ARSNK', 'DRE'),
(51, 'BCL', 'ML'),
(52, 'BCL', 'MTH'),
(53, 'BCL', 'DRE'),
(54, 'CLSR', 'KPRT'),
(55, 'CLSR', 'DRE'),
(56, 'VBRCL', 'DRE'),
(57, 'VBRCL', 'MTH'),
(58, 'VBRCL', 'KPRT'),
(59, 'VBRCL', 'ML'),
(60, 'VBRCL', 'SYOK'),
(61, 'VBRCL', 'DHDR'),
(62, 'VBRCL-M', 'DRE'),
(63, 'SLMNL', 'KPRT'),
(64, 'SLMNL', 'DRE'),
(65, 'SLMNL', 'DMM'),
(66, 'SLMNL', 'ML'),
(67, 'SLMNL', 'MTH'),
(68, 'SLMNL', 'LMH'),
(69, 'VBRPRH', 'KPRT'),
(70, 'VBRPRH', 'ML'),
(71, 'VBRPRH', 'MTH'),
(72, 'VBRPRH', 'DMM'),
(73, 'VBRPRH', 'DRE'),
(74, 'VBRPRH', 'MGGL'),
(75, 'VBRPRH', 'SKTKPL');

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
  `pangan_umum` varchar(255) NOT NULL,
  `total_pasien` int(11) DEFAULT NULL,
  `total_normal` int(11) DEFAULT NULL,
  `total_sakit` int(11) DEFAULT NULL,
  `total_meninggal` int(11) DEFAULT NULL,
  `lembaga_id` int(11) NOT NULL,
  `kelurahan_id` varchar(10) DEFAULT NULL,
  `flag` int(2) NOT NULL COMMENT '0 = belum selesai, 1 = selesai',
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_resume`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_resume_keluhan`
--

INSERT INTO `tbl_resume_keluhan` (`id_resume`, `kd_keluhan`, `nama_kejadian`, `nik_pelapor`, `waktu_lapor`, `gejala_umum`, `pangan_umum`, `total_pasien`, `total_normal`, `total_sakit`, `total_meninggal`, `lembaga_id`, `kelurahan_id`, `flag`, `file`) VALUES
(30, 'PPL-2015-MTR-02-1', 'Kasus Palmeriam', '201110225043', '2015-02-09 07:43:11', 'ML,SKTPRT,PSG', 'NS,PGN-2,PGN-3,PGN-4,PGN-5,PGN-6,Rpt', 0, 0, 0, 0, 1, '1', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_access`
--

CREATE TABLE IF NOT EXISTS `tbl_role_access` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `tbl_role_access`
--

INSERT INTO `tbl_role_access` (`id_role`, `menu_id`, `lembaga_id`) VALUES
(140, 9, 1),
(139, 25, 1),
(138, 7, 1),
(137, 3, 1),
(136, 2, 1),
(135, 19, 1),
(134, 20, 1),
(133, 18, 1),
(132, 8, 1),
(131, 6, 1),
(130, 13, 1),
(129, 10, 1),
(128, 5, 1),
(127, 4, 1),
(24, 9, 4),
(23, 2, 3),
(126, 27, 1),
(125, 26, 1),
(124, 12, 1),
(27, 11, 3),
(123, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_kejadian`
--

CREATE TABLE IF NOT EXISTS `tbl_status_kejadian` (
  `id_status_kj` int(11) NOT NULL AUTO_INCREMENT,
  `no_kejadian` varchar(100) DEFAULT NULL,
  `status_klb` int(11) DEFAULT NULL COMMENT '1 = klb , 2 = berhenti , 0 = bukan',
  `catatan` text,
  `file_upload` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status_kj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_status_kejadian`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_pangan`
--

CREATE TABLE IF NOT EXISTS `tbl_temp_pangan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `pangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_temp_pangan`
--


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
