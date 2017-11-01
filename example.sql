-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01 Nov 2017 pada 20.51
-- Versi Server: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.11-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dispose`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisi_surat`
--

CREATE TABLE `tbl_disposisi_surat` (
  `no_surat` varchar(100) NOT NULL,
  `tanggal_penyelesaian` date DEFAULT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `instruksi` text NOT NULL,
  `diteruskan_kpd` varchar(100) NOT NULL,
  `proses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_disposisi_surat`
--

INSERT INTO `tbl_disposisi_surat` (`no_surat`, `tanggal_penyelesaian`, `tanggal_penerimaan`, `instruksi`, `diteruskan_kpd`, `proses`) VALUES
('1', '2017-11-01', NULL, 'palajari, adakan pertemuan tanggal 3 november 2017 pukul 09.00', 'Waka Kurikulum-Waka Kesiswaan-Waka Sarana', 'buatkan surat tugas untuk guru multimedia dan 10 siswa untuk mengikuti workshop tersebut.'),
('3', NULL, NULL, 'tindak lanjuti', 'Waka SDM', 'belum ditindak lanjuti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `level_user` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`nip`, `password`, `nama_user`, `jabatan`, `level_user`) VALUES
('000', '123', 'Super Admin', 'admin', 'akr'),
('001', '123', 'Bambang Satriadi, M.Sn', 'Kepala Sekolah', 'kpl'),
('002', '123', 'Yulian T.S. Karyat, Drs.', 'Waka Kurikulum', 'wka'),
('003', '123', 'Ari Ahadrian, Drs. M.Ds.', 'Waka HUBIN', 'wka'),
('004', '123', 'Drs. Jose Ifgarianto, S.Pd', 'Waka Kesiswaan', 'wka'),
('005', '123', 'Nana Sutejo, Drs.', 'Waka Sarana', 'wka'),
('006', '123', 'Wahyu Nugraha, Drs., M.Ds.', 'WMM', 'wka'),
('007', '123', 'Drs. Deden Bambang Iriana', 'Waka SDM', 'wka'),
('008', '123', 'Lenny Djanurlia S., Dra.', 'Persuratan', 'pst');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status_sm`
--

CREATE TABLE `tbl_status_sm` (
  `no_surat` int(5) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status_sm`
--

INSERT INTO `tbl_status_sm` (`no_surat`, `tujuan`, `status`) VALUES
(1, 'Kepala Sekolah', 'disposed'),
(2, 'Kepala Sekolah', 'undisposed'),
(3, 'Kepala Sekolah', 'disposed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `no_surat` int(5) NOT NULL,
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
  `pengolah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`no_surat`, `kode_sm`, `nomor_agenda`, `perihal`, `isi_ringkas`, `asal_surat`, `tgl_sm`, `lampiran`, `tgl_diteruskan`, `nama_file`, `golongan_surat`, `pengolah`) VALUES
(1, '421.7', '1/421.7-SMKN.14/XI/2017', 'Penawaran Program Workshop', 'Pelaksanaan workshop desain grafis yang difasilitasi oleh pintar grafis, dilaksanakan tanpa biaya pungutan apapun (gratis). Sekolah hanya bertanggung jawab untuk menyiapkan waktu, tempat dan peserta workshop.', 'Pintar Grafis', '2017-11-01', 1, '2017-11-01', '1509527725_pintar grafis.jpg', 'Biasa', 'Lenny Djanurlia S., Dra.'),
(2, '425', '2/425-SMKN.14/XI/2017', 'Penawaran Jasa Service Komputer dan Printer', 'Penawaran kerjasama maintenance komputer, printer dan pemasangan jaringan komputer', 'MSC Tarutung', '2017-11-01', 3, '2017-11-01', '1509530651_penawaran service.jpg', 'Penting', 'Lenny Djanurlia S., Dra.'),
(3, '800', '3/800-SMKN.14/XI/2017', 'Pengunduran Diri', 'Pengajuan pengunduran diri Supardi S.Pd per tanggal 15 November 2017.', 'Supardi S.Pd', '2017-11-01', 0, '2017-11-01', '1509531280_pengunduran diri.jpg', 'Penting', 'Lenny Djanurlia S., Dra.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_disposisi_surat`
--
ALTER TABLE `tbl_disposisi_surat`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_status_sm`
--
ALTER TABLE `tbl_status_sm`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`no_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `no_surat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;