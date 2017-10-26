-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2014 at 06:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dispose`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disposisi_surat`
--

CREATE TABLE IF NOT EXISTS `tbl_disposisi_surat` (
  `no_surat` varchar(100) NOT NULL,
  `tanggal_penyelesaian` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `instruksi` text NOT NULL,
  `diteruskan_kpd` varchar(100) NOT NULL,
  `proses` text NOT NULL,
  PRIMARY KEY (`no_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disposisi_surat`
--

INSERT INTO `tbl_disposisi_surat` (`no_surat`, `tanggal_penyelesaian`, `tanggal_penerimaan`, `instruksi`, `diteruskan_kpd`, `proses`) VALUES
('1', '2014-10-01', '2014-10-29', 'Pelajari<br>', 'Waka Sarana', 'Buatkan Surat Tugas Untuk Butet<br>'),
('2', '2014-10-04', '0000-00-00', 'Pelajarai<br>', 'Waka Sarana', 'Buatkan Surat Tugas Untuk Joni'),
('22', '0000-00-00', '0000-00-00', 'asdf<br>', 'Waka Sarana', 'Unact'),
('3', '0000-00-00', '0000-00-00', 'asdf<br>', '', 'Unact'),
('4', '2014-11-02', '0000-00-00', 'sas<br>', 'Waka Sarana-Waka Kesiswaan-Waka Kurikulum-Waka Hubin', 'Berikan Surat Balasan'),
('5', '0000-00-00', '0000-00-00', 'asdfsdaf<br>', 'Waka Sarana-Waka Kesiswaan', 'Unact'),
('6', '2014-10-01', '0000-00-00', 'Buatkan Surat Tugas', 'Waka Sarana', 'Buatkan Surat Tugas Untuk Dadang<br>'),
('7', '0000-00-00', '0000-00-00', 'asdasd<br>', 'Waka Sarana-Waka Kesiswaan-Waka Kurikulum', 'Unact');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `level_user` varchar(3) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`nip`, `password`, `nama_user`, `jabatan`, `level_user`) VALUES
('123', '0cc175b9c0f1b6a831c399e269772661', 'Budi', 'Waka SDM', 'wka'),
('666', '0cc175b9c0f1b6a831c399e269772661', 'bloody', 'akar', 'akr'),
('86', '0cc175b9c0f1b6a831c399e269772661', 'Usep', 'Waka Sarana', 'wka'),
('87', '0cc175b9c0f1b6a831c399e269772661', 'Usep', 'Waka Kesiswaan', 'wka'),
('88', '0cc175b9c0f1b6a831c399e269772661', 'Joni', 'Persuratan', 'pst'),
('889', '0cc175b9c0f1b6a831c399e269772661', 'Jajang', 'Waka SDM', 'wka'),
('89', '0cc175b9c0f1b6a831c399e269772661', 'Dadang', 'Kepala Sekolah', 'kpl');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_sm`
--

CREATE TABLE IF NOT EXISTS `tbl_status_sm` (
  `no_surat` int(5) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_sm`
--

INSERT INTO `tbl_status_sm` (`no_surat`, `tujuan`, `status`) VALUES
(1, 'Kepala Sekolah', 'disposed'),
(2, 'Kepala Sekolah', 'disposed'),
(3, 'Kepala Sekolah', 'disposed'),
(4, 'Kepala Sekolah', 'disposed'),
(5, 'Kepala Sekolah', 'disposed'),
(6, 'Kepala Sekolah', 'disposed'),
(7, 'Kepala Sekolah', 'disposed'),
(8, 'Kepala Sekolah', 'undisposed'),
(9, 'Kepala Sekolah', 'undisposed'),
(10, 'Kepala Sekolah', 'undisposed'),
(11, 'Kepala Sekolah', 'undisposed'),
(12, 'Kepala Sekolah', 'undisposed'),
(13, 'Kepala Sekolah', 'undisposed'),
(14, 'Kepala Sekolah', 'undisposed'),
(15, 'Kepala Sekolah', 'undisposed'),
(16, 'Kepala Sekolah', 'undisposed'),
(17, 'Kepala Sekolah', 'undisposed'),
(18, 'Kepala Sekolah', 'undisposed'),
(19, 'Kepala Sekolah', 'undisposed'),
(20, 'Kepala Sekolah', 'undisposed'),
(21, 'Kepala Sekolah', 'undisposed'),
(22, 'Kepala Sekolah', 'disposed'),
(23, 'Kepala Sekolah', 'undisposed'),
(24, 'Kepala Sekolah', 'undisposed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE IF NOT EXISTS `tbl_surat_masuk` (
  `no_surat` int(5) NOT NULL AUTO_INCREMENT,
  `no_urut` int(5) NOT NULL,
  `indek` varchar(11) NOT NULL,
  `kode_sm` varchar(20) NOT NULL,
  `nomor_agenda` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `isi_ringkas` text NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tgl_sm` date NOT NULL,
  `lampiran` int(5) NOT NULL,
  `tgl_diteruskan` date NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `golongan_surat` varchar(20) NOT NULL,
  `pengolah` varchar(30) NOT NULL,
  PRIMARY KEY (`no_surat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`no_surat`, `no_urut`, `indek`, `kode_sm`, `nomor_agenda`, `perihal`, `isi_ringkas`, `asal_surat`, `tgl_sm`, `lampiran`, `tgl_diteruskan`, `nama_file`, `golongan_surat`, `pengolah`) VALUES
(1, 1, '', '089', '001/2014/V/SMKN.13', 'Penawaran', 'Penawaran', 'Joni', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Penting', 'Joni'),
(2, 0, '', '089', '001/2014/V/SMKN.13', 'Penawaran', 'Penawaran', 'Joni', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Rahasia', 'Joni'),
(3, 0, '', '089', '001/2014/V/SMKN.132', 'Penawaran', 'Maulana Prambadi', 'Jojon', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(4, 0, '', '089', '004/2014/V/SMKN.13', 'Penawaran', 'asdfasdf', 'Janur', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Penting', 'Joni'),
(5, 0, '', '089', '001/2014/V/SMKN.13', 'Penawaran', 'adsf', 'Joni', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Rahasia', 'Joni'),
(6, 0, '', '089', '001/2014/V/SMKN.13', 'Penawaran', 'adsf', 'Joni', '2014-10-30', 1, '2014-10-30', '35_exportpdf.pdf', 'Penting', 'Joni'),
(7, 0, '', '780', '780/001/V/2014', 'Penawaran Travel', 'Penawaran Travel<br>', 'Susi Air', '2014-10-28', 2, '2014-10-30', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(8, 0, '', '88', '489/SMKN/13bdf', 'Penawaran Travel', 'Travel Susi Air<br>', 'Pt Susi Air', '2014-10-28', 1, '2014-10-27', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(9, 0, '', '88', '780/001/V/2014', 'Penawaran Travel', 'Penawaran Susi Air<br>', 'Susi Air', '2014-10-23', 5, '2014-10-28', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(10, 0, '', '88', '489/SMKN/13bdf', 'Penawaran Travel', 'Berniaga <br>', 'Berniaga.com', '2014-10-28', 3, '2014-10-28', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(11, 0, '', '780', '780/001/V/2014', 'Penawaran Travel', 'Travel<br>', 'Batang', '2014-11-25', 0, '2014-10-29', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(12, 0, '', '780', '780/001/V/2014', 'Penawaran Travel', 'adsf<br>', 'adsf', '2014-10-28', 2, '2014-10-29', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(13, 0, '', '999', '780/001/V/2014', 'Penawaran Travel', 'Aasada<br>', 'Pt. TUV', '2014-10-30', 2, '2014-10-30', '35_exportpdf.pdf', 'Penting', 'Joni'),
(14, 0, '', '999', '489/SMKN/13bdf', 'Penawaran Travel', 'asdf<br>', 'adsf', '2014-10-28', 2, '2014-10-28', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(15, 0, '', '999', '489/SMKN/13bdf', 'Penawaran Travel', 'asdf<br>', 'adsf', '2014-10-28', 2, '2014-10-28', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(16, 0, '', '999', '489/SMKN/13bdf', 'Penawaran Travel', 'asdf<br>', 'adsf', '2014-10-28', 2, '2014-10-28', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(17, 0, '', '999', '489/SMKN/13bdf', 'Penawaran Travel', 'asdf<br>', 'Susi Air', '2014-10-28', 1, '2014-10-28', 'exportpdf.pdf', 'Biasa', 'Joni'),
(18, 0, '', '780', '489/SMKN/13bdf', 'Penawaran Travel', 'sdfasdf<br>', 'asdf', '2014-10-28', 1, '2014-10-28', 'JIBAS SIMAKA [Cetak Data Calon Siswa].pd', 'Penting', 'Joni'),
(19, 0, '', '999', '780/001/V/2014', 'Penawaran Travel', 'asdfasdf<br>', 'asdf', '2014-10-28', 1, '2014-10-28', 'exportpdf.pdf', 'Biasa', 'Joni'),
(20, 0, '', '88', '489/SMKN/13bdf', 'Penawaran Travel', 'ewrt<br>', 'wert', '2014-10-22', 1, '2014-10-29', 'exportpdf.pdf', 'Penting', 'Joni'),
(21, 0, '', '780', '780/001/V/2014', 'Penawaran Travel', 'asfsadf<br>', 'asdfsdf', '2014-10-30', 1, '2014-10-29', '9_exportpdf.pdf', 'Penting', 'Joni'),
(22, 0, '', '88', '489/SMKN/13bdf', 'Penawaran Travel', 'sdfasdf<br>', 'Susi Air', '2014-10-21', 2, '2014-10-29', '35_exportpdf.pdf', 'Biasa', 'Joni'),
(23, 0, '', '780', '489/SMKN/13bdf', 'asdf', 'asdfasdf<br>', 'Susi Air', '2014-12-09', 2, '2014-12-16', '2_SequenceDiagram1.png', 'Biasa', 'Joni'),
(24, 0, '', '780', '88', 'penawaran', 'ada apa dengan pisang', 'jakarta', '2014-12-09', 1, '2014-12-09', '66_B0029LHW68.jpg', 'Penting', 'Joni');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
