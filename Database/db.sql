-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 06:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fkip`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jabatan`, `prodi`, `email`) VALUES
(29, 'Trisna Sukmayadi, M.Pd', 'Kepala Laboratorium PPKn', 'PPKN', 'trisnasukmayadi@ppkn.uad.ac.id'),
(30, 'Syifa Siti Aulia, M.Pd', 'Sekretaris Program Studi Pendidikan Pancasila dan Kewarganegaraan', 'PPKN', 'syifasitiaulia@ppkn.uad.ac.id'),
(31, 'Dikdik Baehaqi Arif, M.Pd', 'Ketua Program Studi Pendidikan Pancasila dan Kewarganegaraan', 'PPKN', 'dikdikbaehaqi@ppkn.uad.ac.id'),
(32, 'Wachid Eko Purwanto, M.A.', 'Sekretaris Program Studi Pendidikan Bahasa dan Sastra Indonesia', 'PBSI', '-'),
(33, 'Roni Sulistiyono, S.Pd., M.Pd.', 'Ketua Program Studi Pendidikan Bahasa dan Sastra Indonesia', 'PBSI', '-'),
(34, 'Tri Sutanti, S.Pd., M.Pd.', 'Kepala Laboratorium Program Studi Bimbingan dan Konseling', 'BK', '-'),
(35, 'Siti Muyana, S.Pd., M.Pd.', 'Sekertaris Program Studi Bimbingan dan Konseling', 'BK', '-'),
(36, 'Irvan Budhi Handaka, S.Pd., M.Pd.', 'Ketua Program Studi Bimbingan dan Konseling', 'BK', '-'),
(40, 'Dr. Ani Susanti, M.Pd.B.I.', 'Ketua Program Studi Pendidikan Bahasa Inggris', 'PBI', '-'),
(41, 'Rahmi Munfangati, M.Pd.', 'Sekertaris Program Studi Pendidikan Bahasa Inggris', 'PBI', '-'),
(42, 'Uswatun Khasanah, M.Sc.', 'Ketua Program Pendidikan Studi Matematika', 'PMAT', ''),
(43, 'Dwi Astuti, M.Pd.', 'Sekertaris Program Studi Pendidikan Matematika', 'PMAT', ''),
(44, 'Eko Nursulistyo, M.Pd.', 'Ketua Program Studi Pendidikan Fisika', 'PFIS', ''),
(45, 'Toni Kus Indratno, M.Pd.', 'Sekertaris Program Studi Pendidikan Fisika', 'PFIS', ''),
(46, 'Dr. Novi Febrianti, M.Si.', 'Ketua Program Studi Pendidikan Biologi', 'PBIO', ''),
(47, 'Yahya Hanafi, M.Sc.', 'Sekertaris Program Studi Pendidikan Biologi', 'PBIO', ''),
(48, 'Dr., Dra, Sri Tutur Martaningsih, M.Pd', 'Ketua Program Studi PGSD', 'PGSD', ''),
(49, 'Dr. Ika Maryani, M.Pd.', 'Sekertaris Program Studi PGSD', 'PGSD', ''),
(50, 'Dra, Alif Muarifah, Spsi.,M.Si.,Ph.D.', 'Ketua Program Studi PG Paud', 'PGPAUD', ''),
(51, 'Dwi Hastuti, M.pd', 'Sekertaris Program Studi PG Paud', 'PGPAUD', ''),
(52, 'Dr. Budi Santosa', 'Ketua Program Studi PVTO', 'PVTO', ''),
(53, 'Arief Kurniawan, M.Pd.', 'Sekertaris Program Studi PVTO', 'PVTO', ''),
(54, 'Dr. Budi Santosa', 'Ketua Program Studi PVTE', 'PVTE', ''),
(55, 'Pramudita Budiastuti, M.Pd', 'Sekertaris Program Studi PVTE', 'PVTE', ''),
(56, 'Dr. Sri Hartini, M.Pd.', 'Ketua Program Studi PPG', 'PPG', ''),
(57, 'Agus Supriyanto, S.Pd., M.Pd.', 'Sekertaris Program Studi PPG', 'PPG', ''),
(58, 'Prof. Dr. Supratman, M.Si., DEA.', 'Ketua Program Studi MPMAT', 'MPMAT', ''),
(59, 'Anggit Prabowo, M.Pd.', 'Sekertaris Program Studi MPMAT', 'MPMAT', ''),
(60, 'Dr. Suyatno, M.Pd.I', 'Ketua Program Studi MP', 'MP', ''),
(61, 'Dr. Enung Hasanah, M.Pd', 'Sekretaris Program Studi MP', 'MP', ''),
(62, 'Drs. Akmal, M.Hum., M.Sc., Ph.D.', 'Ketua Program Studi MPBI', 'MPBI', ''),
(63, 'Dr. Ikmi Nur Oktavianti S.S., M.A.', 'Sekertaris Program Studi MPBI', 'MPBI', ''),
(64, 'Dr. Moh Toifur, M.Si', 'Ketua Program Studi MPFIS', 'MPFIS', ''),
(65, 'Okimustava, M.Pd.Si', 'Sekretaris Program Studi MPFIS', 'MPFIS', ''),
(66, 'Dr. Tri Kuat', 'Ketua Program MPGV', 'MPGV', ''),
(67, 'Muhammad Sayuti, M.Pd., M.Ed., Ph.D.', 'Sekertaris Program Studi MPGV', 'MPGV', ''),
(68, 'Dr. Ani Susanti, M.Pd.B.I.', 'Wakil Dekan Bidang SDM, Kehartabendaan dan Administrasi Umum', '', ''),
(69, 'Dr. Suyatno, M.Pd.I', 'Wakil Dekan Bidang AIK, Kemahasiswaan dan Akademik', '', ''),
(70, 'Muhammad Sayuti, M.Pd., M.Ed., Ph.D.', 'Dekan FKIP', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `asistensi`
--

CREATE TABLE `asistensi` (
  `id_asistensi` int(11) NOT NULL,
  `nama_asistensi` varchar(250) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asistensi`
--

INSERT INTO `asistensi` (`id_asistensi`, `nama_asistensi`, `bidang`, `prodi`, `email`) VALUES
(85, 'Hermanto, S.Pd., M.Hum.	\r\n', 'Humas dan Promosi', 'PBSI', NULL),
(87, 'Fery  Setyaningrum, M.Pd.', 'Humas dan Promosi', 'PGSD', NULL),
(88, 'Prayudha, M.A.', 'Humas dan Promosi', 'PBI', NULL),
(89, 'Agungbudiprabowo, M.Pd.', 'Humas dan Promosi', 'BK', NULL),
(90, 'Fanani Arief Ghozali S.Pd., M.Pd.', 'Humas dan Promosi', 'PVTE', NULL),
(91, 'Dholina Inang Pambudi, M.Pd	', 'Humas dan Promosi', 'PGSD', NULL),
(92, 'Dr. Dian Hidayati S.T., M.M.', 'Humas dan Promosi', 'MP', NULL),
(93, 'Dr. Muhammad Ardi Kurniawan S.S., M.A.', 'Humas dan Promosi', 'PBSI', NULL),
(94, 'Vita Istihapsari M.Pd', 'Humas dan Promosi', 'PMAT', NULL),
(95, 'Patria Handung Jaya S.Pd., M.A.', 'Humas dan Promosi', 'PGSD', NULL),
(96, 'Dr. Djoko Sutrisno S.Pd., M.Pd.', 'Humas dan Promosi', 'PBSI-S2', NULL),
(97, 'Irvan Budhi Handaka S.Pd.,M.Pd.', 'Humas dan Promosi', 'BK', NULL),
(108, 'Ramadhani Uswatun Khasanah, S.Pd., S.S., M.Pd.\r\n', 'Implementasi AIK', 'PGSD', NULL),
(109, 'Dr. Fitri Indriani, M.Pd.I', 'Implementasi AIK', 'PGSD', NULL),
(110, 'Suyitno, M.Pd.', 'Implementasi AIK', 'PGSD', NULL),
(111, 'Ariati Dina Puspitasari S.Si., M.Pd', 'Implementasi AIK', 'PFIS', NULL),
(112, 'Muh Saeful Effendi M.Pd.B.I', 'Implementasi AIK', 'PBI', NULL),
(113, 'Yahya Hanafi M.Sc.', 'Implementasi AIK', 'PBIO', NULL),
(114, 'Amien Wahyudi S.Pd., M.Pd.,Kons', 'Implementasi AIK', 'BK', NULL),
(115, 'Dwi Hastuti S.Pd, M.Pd.I.', 'Implementasi AIK', 'PG PAUD', NULL),
(116, 'Caraka Putra Bhakti, M.Pd.', 'Kemahasiswaan dan Alumni', 'BK', NULL),
(117, 'Dr. Hardi Santosa, M.Pd.', 'Kemahasiswaan dan Alumni', 'BK', NULL),
(118, 'Iis Suwartini, M.Pd.', 'Kemahasiswaan dan Alumni', 'PBSI', NULL),
(119, 'Dr. Feri Budi Setyawan, M.Pd., AIFO-FIT', 'Kemahasiswaan dan Alumni', 'PGSD', NULL),
(120, 'Mahmuda Maarif, M.Pd.', 'Kemahasiswaan dan Alumni', 'PPKn', NULL),
(121, 'Aprida Agung Priambada, M.Or.', 'Kemahasiswaan dan Alumni', 'PGSD', NULL),
(122, 'Nur Rifai Akhsan, S.Pd., M.Ed.', 'Kemahasiswaan dan Alumni', 'PBI', NULL),
(123, 'Syariful Fahmi S.Pd.I., M.Pd', 'Kemahasiswaan dan Alumni', 'PMat', NULL),
(124, 'Heni Siswantari S.Pd., M.A', 'Kemahasiswaan dan Alumni', 'PGSD', NULL),
(125, 'Rahmi Munfangati S.S., M.Pd.', 'Kemahasiswaan dan Alumni', 'PBI', NULL),
(126, 'Siti Muyana S.Pd., M.Pd', 'Kemahasiswaan dan Alumni', 'BK', NULL),
(127, 'Arief Kurniawan M.Pd.', 'Kemahasiswaan dan Alumni', 'PVTO', NULL),
(128, 'Pramudita Budiastuti S.Pd., M.Pd.', 'Kemahasiswaan dan Alumni', 'PVTE', NULL),
(129, 'Irfan Yunianto, Ph.D.', 'Kerjasama Nasional dan Internasional', 'Pendidikan Biologi', NULL),
(130, 'Prof. Dr. Hardi Suyitno, M.Pd.', 'Kerjasama Nasional dan Internasional', 'Pendidikan Matematika', NULL),
(131, 'Ega Asnatasia Maharani S.Psi., M.Psi.', 'Kerjasama Nasional dan Internasional', 'PGPAUD', NULL),
(132, 'Arilia Triyoga S.S., M.Pd.B.I.', 'Kerjasama Nasional dan Internasional', 'PBI', NULL),
(133, 'Sucipto M.Pd.BI., Ph.D.', 'Kerjasama Nasional dan Internasional', 'PBI', NULL),
(134, 'Nurul Hidayati Rofiah, Ph.D.', 'Kerjasama Nasional dan Internasional', 'PGSD', NULL),
(135, 'DEDI WIJAYANTI, S.Pd., M.Hum.', 'Kerjasama Nasional dan Internasional', 'PBSI', NULL),
(136, 'Denik Wirawati S.Pd., M.Pd.', 'Kerjasama Nasional dan Internasional', 'PBSI', NULL),
(137, 'Soffi Widyanesti Priwantoro S.Pd.Si., M.Sc.', 'Kerjasama Nasional dan Internasional', 'PBSI', NULL),
(138, 'Irfan Yunianto, Ph.D.', 'Kerjasama Nasional dan Internasional', 'Pendidikan Biologi', NULL),
(139, 'Dikdik Baehaqi Arif S.Pd., M.Pd.', 'Kerjasama Nasional dan Internasional', 'PPKn', NULL),
(140, 'Roni Sulistiyono S.Pd., M.Pd.', 'Kerjasama Nasional dan Internasional', 'PBSI', NULL),
(141, 'R. Muhammad Ali, M.Pd.', 'Pengembangan Pendidikan dan Pembelajaran', 'PBI', NULL),
(142, 'Dian Artha Kusumaningtyas, M.Pd.Si.', 'Pengembangan Pendidikan dan Pembelajaran', 'MPFIS', NULL),
(143, 'Fariz Setyawan, M.Pd.', 'Pengembangan Pendidikan dan Pembelajaran', 'Pendidikan Matematika', NULL),
(144, 'Prima Suchi Rohmadheny, M.Pd.', 'Pengembangan Pendidikan dan Pembelajaran', 'PGPAUD', NULL),
(145, 'LOVANDRI DWANDA PUTRA, M.PD', 'Pengembangan Pendidikan dan Pembelajaran', 'PGSD', NULL),
(146, 'Dr. Riana Mashar, M.Si. Psi', 'Pengembangan Pendidikan dan Pembelajaran', 'PGPAUD', NULL),
(147, 'Muya Barida S.Pd., M.Pd', 'Pengembangan Pendidikan dan Pembelajaran', 'BK', NULL),
(148, 'Yosi Wulandari M. Pd.', 'Pengembangan Pendidikan dan Pembelajaran', 'PBSI', NULL),
(149, 'Soviyah, S.Pd., M.Hum.', 'Pengembangan Pendidikan dan Pembelajaran', 'PBI', NULL),
(150, 'Asih Mardati S.Pd., M.Pd', 'Pengembangan Pendidikan dan Pembelajaran', 'PGSD', NULL),
(151, 'Toni Kus Indratno M.Pd.Si.', 'Pengembangan Pendidikan dan Pembelajaran', 'PFIS', NULL),
(152, 'Eko Nur Sulistyo, S.Si., M.Pd.', 'Pengembangan Pendidikan dan Pembelajaran', 'PFIS', NULL),
(153, 'Dr. Novi Febrianti S.Si., M.Si.', 'Pengembangan Pendidikan dan Pembelajaran', 'PBIO', NULL),
(154, 'Dr. Puguh Wahyu Prasetyo, M.Sc.', 'Pengembangan SDM', 'Pendidikan Matematika', NULL),
(155, 'Hanum  Hanifa Sukma, M.Pd.', 'Pengembangan SDM', 'PGSD', NULL),
(156, 'Dr. Trianik Widyaningrum, m.Si.', 'Pengembangan SDM', 'Pendidikan Biologi', NULL),
(157, 'Dr Hendro Widodo S.Pd.I, M.Pd.', 'Pengembangan SDM', 'PGSD', NULL),
(158, 'Dr. Dian Hidayati S.T., M.M.', 'Pengembangan SDM', 'MP', NULL),
(159, 'Dr. Enung Hasanah S.Pd., M.Pd.', 'Pengembangan SDM', 'MP', NULL),
(160, 'Dr. Burhanudin Arif Nurnugroho S.Si., M.Sc.', 'Pengembangan SDM', 'Pendidikan Matematika', NULL),
(161, 'Khafidhoh S.Pd., M.Pd', 'Pengembangan SDM', 'PBI S-1', NULL),
(162, 'Dr. Dody Hartanto S.Pd., M.Pd.', 'Pengembangan SDM', 'BK', NULL),
(163, 'Dr. Tri Kuat M.Pd.', 'Pengembangan SDM', 'MPGV', NULL),
(164, 'Uswatun Khasanah S.Si., M.Sc.', 'Pengembangan SDM', 'PMAT', NULL),
(165, 'Wahyu Nanda Eka Saputra, M.Pd.Kons', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'BK', NULL),
(166, 'Dr. Iin Inawati, M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBI S2', NULL),
(167, 'Afit Istiandaru, M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'Pendidikan Matematika', NULL),
(168, 'Dr. Bambang Sudarsono M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PVTE', NULL),
(169, 'Nani Aprilia S.Pd., M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBIO', NULL),
(170, 'Dr. Andriyani M.Si.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PMAT S2', NULL),
(171, 'Vera Yuli Erviana S.Pd., M.Pd', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PGSD', NULL),
(172, 'Dr. Purwati Zisca Diana S.Pd., M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBSI', NULL),
(173, 'Siwi Purwanti, M.Pd', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PGSD', NULL),
(174, 'Meita Fitrianawati M.Pd', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PGSD', NULL),
(175, 'Sudaryanto S.Pd.,M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBSI', NULL),
(176, 'Dr. Ikmi Nur Oktavianti S.S., M.A.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBI', NULL),
(177, 'Dr. Budi Santosa M.Pd.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PVTO', NULL),
(178, 'Wachid Eko Purwanto S.Pd., M.A', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'PBSI', NULL),
(179, 'Dr. Moh. Toifur, M.Si.', 'Percepatan kinerja riset, Pengabdian dan Publikasi', 'MPFIS', NULL),
(180, 'Dr. Fauzia, S.Pd., M.A.', 'Tim Akreditasi ', 'PBI', NULL),
(181, 'Probo Siwi, M.Sn', 'Tim Akreditasi ', 'PGSD', NULL),
(182, 'Yudhiakto Pramudya, Ph. D', 'Tim Akreditasi', 'MPFIS', NULL),
(183, 'Anggit Prabowo, M.Pd', 'Tim Akreditasi ', 'PMAT', NULL),
(184, 'Agus Ria Kumara, S.Pd., M.Pd', 'Tim Akreditasi', 'BK', NULL),
(185, 'Agus Supriyanto, M.Pd ', 'Tim Akreditasi', 'BK', NULL),
(186, 'Fariz Setyawan, M.Pd', 'Tim Akreditasi', 'PMAT', NULL),
(187, 'Caraka Putra Bhakti, M.Pd', 'Tim Akreditasi', 'BK', NULL),
(188, 'Afit Istiandari, M.Pd ', 'Tim Akreditasi', 'PMAT', NULL),
(189, 'Ratri Nur Hidayati, S.Pd., M.Pd.B.I', 'Tim Akreditasi', 'PBIO', NULL),
(190, 'Fitri Merawati S.Pd., M.A', 'Tim Akreditasi', 'PBSI', NULL),
(191, 'Syifa Siti Aulia, M.Pd', 'Tim Akreditasi', 'PPKN', NULL),
(192, 'Dr. Ika Maryani, M.Pd ', 'Tim Akreditasi', 'PGSD', NULL),
(193, 'Hani Irawati, M.Pd', 'Tim Akreditasi', 'PBIO', NULL),
(194, 'Dr. Bambang Sudarsono, M.Pd', 'Tim Akreditasi', 'PVTO', NULL),
(195, 'Avanti Vera Risti Pramudyani, M.Pd', 'Tim Akreditasi', 'PG PAUD', NULL),
(196, 'Muya Barida, S.Pd., M.Pd', 'Tim Akreditasi', 'BK', NULL),
(197, 'Ega Asnatasia Maharani S.Psi., M.Psi.', 'Tim Akreditasi', 'PG PAUD', NULL),
(198, 'Yahya Hanafi M.Sc. ', 'Tim Akreditasi', 'PBIO', NULL),
(199, 'Okimustava, M.Pd.Si.', 'Tim Akreditasi', 'MPFIS', NULL),
(200, 'Dr. Burhanudin Arif Nurnugroho S.Si., M.Sc.', 'Tim Akreditasi', 'PMAT', NULL),
(201, 'Dr. Puguh Wahyu Prasetyo S.Si., M.Sc', 'Tim Akreditasi', 'PMAT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(20) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `instansi_peserta` varchar(256) NOT NULL,
  `no_hp_peserta` varchar(20) NOT NULL,
  `jabatan_peserta` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(16) NOT NULL,
  `id_instansi` int(10) DEFAULT NULL,
  `nama_divsi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `id_instansi`, `nama_divsi`) VALUES
(1, 12, 'HRD'),
(2, 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `contact_no` varchar(50) NOT NULL COMMENT 'Contact No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(15) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `telp` varchar(30) NOT NULL,
  `informasi` text NOT NULL,
  `fax` varchar(30) NOT NULL,
  `npwp` varchar(40) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `favicon` varchar(40) NOT NULL,
  `keterangan_situs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat_lengkap`, `telp`, `informasi`, `fax`, `npwp`, `logo`, `favicon`, `keterangan_situs`) VALUES
(97, 'Majelis Dikti Muhammadiyah', 'Kantor Majelis Diktilitbang PP Muhammadiyah\r\nJalan Brawijaya No. 89 Menayu Kidul RT. 08 Tirtonirmolo Kasihan Bantul ', '081273328123', 'Sistem informasi arsip ini adalah : untuk mempermudah dalam pengarsipan setiap bentuk dokumen dalam suatu instansi organinsasi , yang sewaktu - waktu dapat di lihat kembali data dokumen yang terarsipkan sebelumnya', '081273328123', '923042-882-302-', '1620088880logo.jpg', '1620088880logo1.jpg', 'https://diktilitbangmuhammadiyah.org/id/'),
(97, 'Majelis Dikti Muhammadiyah', 'Kantor Majelis Diktilitbang PP Muhammadiyah\r\nJalan Brawijaya No. 89 Menayu Kidul RT. 08 Tirtonirmolo Kasihan Bantul ', '081273328123', 'Sistem informasi arsip ini adalah : untuk mempermudah dalam pengarsipan setiap bentuk dokumen dalam suatu instansi organinsasi , yang sewaktu - waktu dapat di lihat kembali data dokumen yang terarsipkan sebelumnya', '081273328123', '923042-882-302-', '1620088880logo.jpg', '1620088880logo1.jpg', 'https://diktilitbangmuhammadiyah.org/id/');

-- --------------------------------------------------------

--
-- Table structure for table `lainya`
--

CREATE TABLE `lainya` (
  `id_lainya` int(20) NOT NULL,
  `nama_lainya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nama` varchar(59) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('user','admin','hdp','ia','kda','kndi','ppdp','ps','pkrpdp','ta','bk','pbi','pbsi','pmat','pfis','ppkn','pbio','pgsd','pgpaud','pvto','pvte','ppg','mbk','mpmat','mp','mpbi','mpfis','mpgv') NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `date_create` date NOT NULL,
  `log` datetime DEFAULT NULL,
  `id_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `nama`, `email`, `foto`, `level`, `active`, `date_create`, `log`, `id_divisi`) VALUES
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin FKIP', 'admin@example.com', 'foto1662955020.jpg', 'admin', 'Y', '0000-00-00', '2022-09-12 05:57:00', '1'),
(7, 'adminhdp', '202cb962ac59075b964b07152d234b70', 'Humas Dan Promosi', 'humasdanpromosi@admin.com', 'Tidak ada file', 'hdp', 'Y', '0000-00-00', NULL, '1'),
(8, 'adminia', '202cb962ac59075b964b07152d234b70', 'Admin Implementasi AIK', 'ia@admin.com', '', 'ia', 'Y', '0000-00-00', '2022-12-05 06:30:16', ''),
(9, 'adminkda', '202cb962ac59075b964b07152d234b70', 'Admin Kemahasiswaan Dan Alumni', 'kda@admin.com', '', 'kda', 'Y', '0000-00-00', '2022-12-05 06:30:16', ''),
(10, 'adminkndi', '202cb962ac59075b964b07152d234b70', 'Admin Kerjasama Nasional dan Internasional', 'kndi@admin.com', 'Tidak ada file', 'kndi', 'Y', '0000-00-00', NULL, '1'),
(11, 'adminppdp', '202cb962ac59075b964b07152d234b70', 'Admin Pengembangan Pendidikan dan Pembelajaran', 'ppdp@admin.com', 'Tidak ada file', 'ppdp', 'Y', '0000-00-00', NULL, '1'),
(12, 'adminps', '202cb962ac59075b964b07152d234b70', 'Admin Pengembangan SDM', 'ps@admin.com', 'Tidak ada file', 'ps', 'Y', '0000-00-00', NULL, '1'),
(13, 'adminpkrpdp', '202cb962ac59075b964b07152d234b70', 'Admin Percepatan kinerja riset, Pengabdian dan Publikasi', 'pkrpdp@admin.com', 'Tidak ada file', 'pkrpdp', 'Y', '0000-00-00', NULL, '1'),
(14, 'adminta', '202cb962ac59075b964b07152d234b70', 'Admin Tim Akreditasi', 'ta@admin.com', 'Tidak ada file', 'ta', 'Y', '0000-00-00', NULL, '1'),
(15, 'adminbk', '202cb962ac59075b964b07152d234b70', 'Admin BK', 'bk@admin.com', 'Tidak ada file', 'bk', 'Y', '0000-00-00', NULL, '1'),
(16, 'adminpbi', '202cb962ac59075b964b07152d234b70', 'Admin PBI', 'pbi@admin.com', 'Tidak ada file', 'pbi', 'Y', '0000-00-00', NULL, '1'),
(17, 'adminpbsi', '202cb962ac59075b964b07152d234b70', 'Admin PBSI', 'pbsi@gmail.com', 'Tidak ada file', 'pbsi', 'Y', '0000-00-00', NULL, '1'),
(18, 'adminpmat', '202cb962ac59075b964b07152d234b70', 'Admin PMAT', 'pmat@admin.com', 'Tidak ada file', 'pmat', 'Y', '0000-00-00', NULL, '1'),
(19, 'adminpfis', '202cb962ac59075b964b07152d234b70', 'Admin PFIS', 'pfis@gmail.com', 'Tidak ada file', 'pfis', 'Y', '0000-00-00', NULL, '1'),
(20, 'adminppkn', '202cb962ac59075b964b07152d234b70', 'Admin PPKN', 'ppkn@gmail.com', 'Tidak ada file', 'ppkn', 'Y', '0000-00-00', NULL, '1'),
(21, 'adminpbio', '202cb962ac59075b964b07152d234b70', 'Admin PBIO', 'pbio@gmail.com', 'Tidak ada file', 'pbio', 'Y', '0000-00-00', NULL, '1'),
(22, 'adminpgsd', '202cb962ac59075b964b07152d234b70', 'Admin PGSD', 'pgsd@gmail.com', 'Tidak ada file', 'pgsd', 'Y', '0000-00-00', NULL, '1'),
(23, 'adminpgpaud', '202cb962ac59075b964b07152d234b70', 'Admin PGPAUD', 'pgpaud@gmail.com', 'Tidak ada file', 'pgpaud', 'Y', '0000-00-00', NULL, '1'),
(24, 'adminpvto', '202cb962ac59075b964b07152d234b70', 'Admin PVTO', 'pvto@gmail.com', 'Tidak ada file', 'pvto', 'Y', '0000-00-00', NULL, '1'),
(25, 'adminpvte', '202cb962ac59075b964b07152d234b70', 'Admin PVTE', 'pvte@gmail.com', 'Tidak ada file', 'pvte', 'Y', '0000-00-00', NULL, '1'),
(26, 'adminppg', '202cb962ac59075b964b07152d234b70', 'Admin PPG', 'ppg@gmail.com', 'Tidak ada file', 'ppg', 'Y', '0000-00-00', NULL, '1'),
(27, 'adminmbk', '202cb962ac59075b964b07152d234b70', 'Admin MBK/S2BK', 'mbk@gmail.com', 'Tidak ada file', 'mbk', 'Y', '0000-00-00', NULL, '1'),
(28, 'adminmpmat', '202cb962ac59075b964b07152d234b70', 'Admin MPMAT', 'mpmat@gmail.com', 'Tidak ada file', 'mpmat', 'Y', '0000-00-00', NULL, '1'),
(29, 'adminmp', '202cb962ac59075b964b07152d234b70', 'Admin MP', 'mp@gmail.com', 'Tidak ada file', 'mp', 'Y', '0000-00-00', NULL, '1'),
(30, 'adminmpbi', '202cb962ac59075b964b07152d234b70', 'Admin MPBI', 'mpbi@gmail.com', 'Tidak ada file', 'mpbi', 'Y', '0000-00-00', NULL, '1'),
(31, 'adminmpfis', '202cb962ac59075b964b07152d234b70', 'Admin MPFIS', 'mpfis@gmail.com', 'Tidak ada file', 'mpfis', 'Y', '0000-00-00', NULL, '1'),
(32, 'adminmpgv', '202cb962ac59075b964b07152d234b70', 'Admin MPGV', 'mpgv@gmail.com', 'Tidak ada file', 'mpgv', 'Y', '0000-00-00', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT 0,
  `nama_menu` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `urutan` int(3) NOT NULL,
  `position` enum('Bottom','Top','','') NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `icon`, `link`, `aktif`, `urutan`, `position`, `level`) VALUES
(18, 0, 'Divisi', 'icon-user fa-fw', 'Divisi', 'Ya', 11, 'Bottom', ''),
(14, 0, 'Tambah Admin', 'icon-user fa-fw', 'Login', 'Ya', 10, 'Bottom', 'admin'),
(15, 0, 'Daftar Kegiatan', 'icon-list  fa-fw', 'Notulen_detail', 'Ya', 2, 'Bottom', 'admin.user.hdp.ia.kda.kndi.ppdp.ps.pkrpdp.ta.bk.pbi.pbsi.pmat.pfis.ppkn.pbio.pgsd.pgpaud.pvto.pvte.ppg.mbk.mpmat.mp.mpbi.mpfis.mpgv'),
(13, 0, 'Program Studi & Tim Kerja', 'icon-menu  fa-fw', 'Notulen', 'Ya', 1, 'Bottom', 'admin'),
(12, 0, 'Instansi', 'icon-user fa-fw', 'Instansi', 'Ya', 13, 'Bottom', ''),
(22, 0, 'Anggota Prodi', 'icon-people  fa-fw', 'Anggota', 'Ya', 4, 'Bottom', 'admin.bk.pbi.pbsi.pmat.pfis.ppkn.pbio.pgsd.pgpaud.pvto.pvte.ppg.mbk.mpmat.mp.mpbi.mpfis.mpgv'),
(23, 0, 'Buku Tamu', 'icon-close  fa-fw', 'Buku_tamu', 'Ya', 3, 'Bottom', ''),
(24, 0, 'Tim Kerja', 'icon-people  fa-fw', 'Asistensi', 'Ya', 5, 'Bottom', 'admin.user.hdp.ia.kda.kndi.ppdp.ps.pkrpdp.ta'),
(25, 0, 'Menu', 'icon-menu  fa-fw', 'Setting/Menu', 'Ya', 12, 'Bottom', 'admin'),
(26, 0, 'Tamu', 'icon-user-following  fa-fw', 'import', 'Ya', 6, 'Bottom', ''),
(27, 0, 'Absensi', 'icon-user fa-fw', 'Absensi', 'Ya', 9, 'Bottom', ''),
(32, 0, 'Tamu/Peserta Lainya', 'icon-people  fa-fw', 'Lainya', 'Ya', 8, 'Bottom', ''),
(33, 0, 'Staf Majelis', 'icon-people  fa-fw', 'staf', 'Ya', 7, 'Bottom', ''),
(35, 0, 'Semua Aktivitas', 'icon-user fa-fw', 'Notulen_detail/lihat_semua', 'Ya', 1, 'Bottom', 'hdp.ia.kda.kndi.ppdp.ps.pkrpdp.ta.bk.pbi.pbsi.pmat.pfis.ppkn.pbio.pgsd.pgpaud.pvto.pvte.ppg.mbk.mpmat.mp.mpbi.mpfis.mpgv');

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `id_notulen` int(15) NOT NULL,
  `agenda` text NOT NULL,
  `id_create` int(15) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `end_time` varchar(15) NOT NULL,
  `place` varchar(15) NOT NULL,
  `participan` varchar(15) NOT NULL,
  `date_create` date DEFAULT NULL,
  `absensi` varchar(50) NOT NULL,
  `tdd_pimpinan` varchar(60) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `no_revisi` varchar(50) NOT NULL,
  `notulis` varchar(100) NOT NULL,
  `pimpinan_rapat` varchar(100) NOT NULL,
  `jenis_rapat` varchar(100) NOT NULL,
  `no_agenda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`id_notulen`, `agenda`, `id_create`, `start_time`, `end_time`, `place`, `participan`, `date_create`, `absensi`, `tdd_pimpinan`, `no_dokumen`, `no_revisi`, `notulis`, `pimpinan_rapat`, `jenis_rapat`, `no_agenda`) VALUES
(9, '(S1) Pendidikan Guru Pendidikan Anak Usia DIni', 3, '01:13', '12:14', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620191738.png', 'absensi_16201917381.png', '3', '3', 'Admin', 'Peserta Majelis', 'Mingguan', '1'),
(10, '(S1) Pendidikan Guru Sekolah Dasar', 3, '10:17', '23:59', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620191930.png', 'absensi_16201919301.png', '2', '2', 'Admin', 'Peserta Majelis', 'Mingguan', '2'),
(11, '(S1) Pendidikan Biologi', 3, '00:31', '12:31', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620192748.png', 'absensi_16201927481.png', '3', '3', 'Admin', 'Peserta Majelis', 'Mingguan', '3'),
(12, '(S1) Pendidikan Fisika', 3, '01:02', '13:02', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620194586.png', 'absensi_16201945861.png', '4', '4', 'Admin', 'Peserta Majelis', 'Mingguan', '4'),
(13, '(S1) Pendidikan Matematika', 3, '02:52', '14:53', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201220.png', 'absensi_16202012201.png', '5', '5', 'Admin', 'Peserta Majelis', 'Mingguan', '5'),
(14, '(S1) Pendidikan Pancasila dan Kewarganegaraan', 3, '02:53', '23:54', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201300.png', 'absensi_16202013001.png', '6', '6', 'Admin', 'Peserta Majelis', 'Mingguan', '6'),
(15, '(S1) Pendidikan Bahasa Inggris', 3, '02:55', '23:55', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201410.png', 'absensi_16202014101.png', '7', '7', 'Admin', 'Peserta Majelis', 'Mingguan', '7'),
(16, '(S1) Pendidikan dan Sastra Indonesia', 3, '02:57', '23:59', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201516.png', 'absensi_16202015161.png', '8', '8', 'Admin', 'Peserta Majelis', 'Khusus', '8'),
(17, '(S1) Bimbingan Konseling', 3, '01:00', '14:30', 'Kantor Majelis ', 'Tamu', '2021-05-19', 'absensi_1621422523.png', 'absensi_16214225231.png', '5', '5', 'Admin', 'Peserta Majelis', 'Khusus', '5'),
(18, 'Pendidikan Vokasional Teknik Otomotif', 3, '11:30', '11:32', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662957037.pdf', 'absensi_16629570371.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '1'),
(19, 'Pendidikan Vokasional Teknik Elektronika', 3, '11:31', '11:37', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662957148.pdf', 'absensi_16629571481.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '2'),
(20, 'Program Profesi Guru', 3, '12:42', '12:48', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662961401.pdf', 'absensi_16629614011.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '3'),
(21, 'Magister Pendidikan Matematika', 3, '13:06', '13:12', 'Dikti', 'Peserta', '2022-09-12', 'absensi_1662962838.pdf', 'absensi_16629628381.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '4'),
(22, 'Magister Pendidikan Bahasa Inggris', 3, '13:07', '13:13', 'Dikti', 'Peserta', '2022-09-12', 'absensi_1662962897.pdf', 'absensi_16629628971.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '5'),
(23, 'Magister Pendidikan Fisika', 3, '13:08', '13:14', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662962946.pdf', 'absensi_16629629461.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '6'),
(24, 'Magister Manajemen Pendidikan', 3, '13:09', '13:15', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662963007.pdf', 'absensi_16629630071.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '6'),
(25, 'Magister Pendidikan Guru Vokasi', 3, '13:11', '13:17', 'Dikti', 'peserta', '2022-09-12', 'absensi_1662963088.pdf', 'absensi_16629630881.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '7'),
(26, 'Magister Bimbingan Konseling', 3, '12:14', '12:14', 'Dikti', 'peserta', '2022-11-26', 'absensi_1669439849.pdf', 'absensi_16694398491.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '20'),
(27, 'Tim Kerja Humas dan Promosi', 3, '12:28', '12:28', 'Dikti', 'a', '2022-11-26', 'absensi_1669440534.pdf', 'absensi_16694405341.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '21'),
(28, 'Tim Kerja Implementasi AIK', 3, '12:32', '12:32', 'Dikti', 'a', '2022-11-26', 'absensi_1669440766.pdf', 'absensi_16694407661.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '22'),
(29, 'Tim Kerja Kemahasiswaan dan Alumni', 3, '12:33', '12:33', 'Dikti', 'a', '2022-11-26', 'absensi_1669440817.pdf', 'absensi_16694408171.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '23'),
(30, 'Tim Kerja Kerjasama Nasional dan Internasional', 3, '12:34', '12:34', 'Dikti', 'a', '2022-11-26', 'absensi_1669440876.pdf', 'absensi_16694408761.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '24'),
(31, 'Tim Kerja Pengembangan Pendidikan dan Pembelajaran', 3, '12:35', '12:35', 'Dikti', 'a', '2022-11-26', 'absensi_1669440929.pdf', 'absensi_16694409291.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '25'),
(32, 'Tim Kerja Pengembangan SDM', 3, '12:43', '12:43', 'Dikti', 'a', '2022-11-26', 'absensi_1669441440.pdf', 'absensi_16694414401.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '26'),
(33, 'Tim Kerja Percepatan kinerja riset, Pengabdian dan Publikasi', 3, '12:45', '12:45', 'Dikti', 'a', '2022-11-26', 'absensi_1669441521.pdf', 'absensi_16694415211.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '27'),
(34, 'Tim Akreditasi', 3, '12:47', '12:48', 'Dikti', 'a', '2022-11-26', 'absensi_1669441698.pdf', 'absensi_16694416981.pdf', '1', '1', 'Admin', 'Peserta Majelis', 'Umum', '28');

-- --------------------------------------------------------

--
-- Table structure for table `notulen_detail`
--

CREATE TABLE `notulen_detail` (
  `id_not_detail` int(15) NOT NULL,
  `id_notulen` int(15) NOT NULL,
  `issue` text NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `waktu_mulai` varchar(50) DEFAULT NULL,
  `waktu_selesai` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) NOT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL,
  `catatan` text DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(50) NOT NULL,
  `id_not_detail` int(50) NOT NULL,
  `id_anggota` int(50) DEFAULT NULL,
  `id_asistensi` int(50) DEFAULT NULL,
  `id_tamu` int(50) DEFAULT NULL,
  `id_lainya` int(50) DEFAULT NULL,
  `id_staf` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `id_staf` int(50) NOT NULL COMMENT 'Primary Key',
  `nama_staf` varchar(128) CHARACTER SET latin1 NOT NULL COMMENT 'Nama Staf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id_staf`, `nama_staf`) VALUES
(204, 'Velandani Prakoso, M.IP. '),
(205, 'Devi Wulandari, S.E. '),
(206, 'Sadiyono, S.E. '),
(207, 'Evie Dwi Oktaviani, S.E. '),
(208, 'Arif Wibowo, S.Kom. '),
(209, 'Isa Anshari, S.E. '),
(210, 'M. Faiz Sulthany, S.E. '),
(211, 'Aprillia Sazila Sari, S.I.Kom. '),
(212, 'Wawan Santoso, S.Sos.'),
(213, 'Wiryo Sumantri '),
(214, 'Bagiyo Edi Sugito '),
(215, 'Widodo '),
(216, 'Lukman Hakim, S.Kom.I., M.A. '),
(217, 'Muhammad Saleh, SH. MH. '),
(218, 'Miftah Nurkhasanah '),
(219, 'Nanang Susilo '),
(220, 'Arfan'),
(221, 'Rohman'),
(222, 'Anang'),
(223, 'Sariman'),
(224, 'Sarmijan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `asistensi`
--
ALTER TABLE `asistensi`
  ADD PRIMARY KEY (`id_asistensi`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lainya`
--
ALTER TABLE `lainya`
  ADD PRIMARY KEY (`id_lainya`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`id_notulen`);

--
-- Indexes for table `notulen_detail`
--
ALTER TABLE `notulen_detail`
  ADD PRIMARY KEY (`id_not_detail`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `asistensi`
--
ALTER TABLE `asistensi`
  MODIFY `id_asistensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT for table `lainya`
--
ALTER TABLE `lainya`
  MODIFY `id_lainya` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notulen`
--
ALTER TABLE `notulen`
  MODIFY `id_notulen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notulen_detail`
--
ALTER TABLE `notulen_detail`
  MODIFY `id_not_detail` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `id_staf` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=234;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
