-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Sep 2021 pada 10.14
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jabatan`, `nohp`, `email`) VALUES
(1, 'Prof. H. Lincolin Arsyad, M.Sc., Ph.D.\r\n', 'Ketua\r\n', '0811 268 060', 'lincolin_arsyad@yahoo.com, lincolinarsyad@ugm.ac.id\r\n'),
(2, 'Prof. Dr. H. Edy Suandi Hamid, M.Ec.\r\n', 'Wakil Ketua\r\n', '0816 426 3234', 'edysuandi@yahoo.com\r\n'),
(3, 'Prof. Dr. H.M. Noor Rochman Hadjam, S.U. Psikolog\r\n', 'Wakil Ketua\r\n', '0818 264 171', 'nrochman@ugm.ac.id\r\n'),
(4, 'Prof. Dr. H. Chairil Anwar\r\n', 'Wakil Ketua\r\n', '0812 274 1318, 0877 3846 7890', 'irilwar@yahoo.com\r\n'),
(5, 'Prof. Dr. H. Khudzaifah Dimyati, SH., M. Hum\r\n', 'Wakil Ketua\r\n', '081329043557', 'kd255@ums.ac.id, kdimyati@yahoo.com\r\n'),
(6, 'Dr. H. Sudarnoto Abdul Hakim, M.A..\r\n', 'Wakil ketua\r\n', '081382761533', 'sudarnoto@uinjkt.ac.id\r\n'),
(7, 'Prof. H. Achmad Jainuri, Ph.D.\r\n', 'Wakil ketua', '08123259743', 'ajainuri@hotmail.com\r\n'),
(8, 'Muhammad Sayuti, M.Pd., M.Ed., Ph.D.\r\n', 'Sekretaris\r\n', '082137560835', 'masyuti@gmail.com, muhammad.sayuti@mpv.uad.ac.id\r\n'),
(9, 'Dr. Muhammad Samsudin, S.Ag., M.Pd.\r\n', 'Wakil Sekretaris\r\n', '0812 272 6907', 'muhsam29@gmail.com\r\n'),
(10, 'Mohammad Adam Jerusalem, S.T., S.H., M.T., Ph.D.\r\n', 'Wakil Sekretaris\r\n', '085132465812', 'adam_jerusalem@uny.ac.id \r\n'),
(11, 'Dr. H. Hardo Basuki, M.Soc.Sc.CSA.CA.\r\n', 'Bendahara\r\n', '081328626400', 'hardobasuki@yahoo.com, hardobasuki@ugm.ac.id\r\n'),
(12, 'H. Ahmad Muttaqin, M.Ag., M.A., Ph.D.\r\n', 'Wakil Bendahara\r\n', '081578708276', 'muttaqinsejati@gmail.com\r\n'),
(14, 'Prof. Dr. H. Bambang Setiaji\r\n', 'Anggota', '08112630313', 'bambang.setiaji@ums.ac.id \r\n'),
(15, 'Prof. Dr. H. Irwan Akib, M.Pd.\r\n', 'Anggota', '0811466241', 'irwanakib863@gmail.com\r\n'),
(16, 'Dr. H. Zamahsari, M.Ag.\r\n', 'Anggota\r\n', '08176764860', 'reza.zamahsari@yahoo.com\r\n'),
(17, 'Prof. Dr. H. Marsudi Triatmodjo, SH., LLM\r\n', 'Anggota\r\n', '0816 426 3366', 'marsudi.triatmodjo@gmail.com\r\n'),
(18, 'Prof. H. Sjafri Sairin, Ph.D.\r\n', 'Anggota\r\n', '0811 252 712', 'sjafrisairin@yahoo.com, sjafsairin@gmail.com\r\n'),
(19, 'dr. H. Joko Murdiyanto, Sp. An., MPH.\r\n', 'Anggota\r\n', '0812 272 1265', 'jokomurdiyanto@yahoo.com\r\n'),
(20, 'Prof. Dr. H. Sutrisno, M.Ag.\r\n', 'Anggota\r\n', '0812 294 3503', 'trisno_63@yahoo.com\r\n'),
(21, 'Prof. Dr. H. Thobroni, M.Si.\r\n', 'Anggota\r\n', '0811 360 810', 'nitobro@yahoo.co.id\r\n'),
(22, 'Prof. Dr. H. Abdul Munir Mulkhan, S.U.\r\n', 'Anggota\r\n', '0811 257 735', 'abdulmunir.m@gmail.com,\r\n'),
(23, 'Prof. Dr. H. Achmad Nurmandi, M.Sc.\r\n', 'Anggota\r\n', '08122718403', 'nurmandi_achmad@ymail.com, nurmandiachmad@gmail.com, nurmandi_achmad@umy.ac.id\r\n'),
(24, 'Prof. Dr. Hj. Siti Muslimah Widyastuti\r\n', 'Anggota\r\n', '0811263582', 'smwidyastuti@yahoo.com, smwidyastuti@ugm.ac.id\r\n'),
(25, 'Prof. H. Suyanto, Ph.D.\r\n', 'Anggota\r\n', '08121193366', 'suyan@ymail.com\r\n'),
(26, 'Prof. Dr. H. Widodo Muktiyo\r\n', 'Anggota\r\n', '08122768946', 'muktiyo@yahoo.com\r\n'),
(27, 'Prof. Dr. Harun Joko Prayitno\r\n', 'Anggota\r\n', '082242301929', 'harunjpums@yahoo.com \r\n'),
(28, 'Prof. Dr. H. Mustofa, Apt, M.Kes.\r\n', 'Anggota\r\n', '081328749273', 'mustofajogja@yahoo.com, mustofafk@ugm.ac.id\r\n'),
(29, 'Prof. Dr. drg. H. Sudibyo, SU, Sp. Perio (K)\r\n', 'Anggota\r\n', '08122706315', 'sudibyo_dc@yahoo.co.id\r\n'),
(30, 'Drs. Daniel Fernandez, M.Si.\r\n', 'Anggota\r\n', '081318646633, 08159378505', 'fernandezpsp@yahoo.co.id\r\n'),
(31, 'Mulyono, S.H., MMSI.\r\n', 'Anggota', '08129199093', 'mulyono@dikti.go.id\r\n'),
(32, 'Fitri Arofiati, S.Kep., Ns., MAN., P.hD\r\n', 'Anggota', '081392462014', 'fitri.arofiati@umy.ac.id \r\n'),
(33, 'Nurhadi, Ph.D. \r\n', 'Anggota', '082187789599', 'nurhadi@ugm.ac.id\r\n'),
(34, 'Dr. Muhammad Kunta Biddinika, M.Eng.\r\n', 'Anggota', '08999195545', 'muhammad.kunta@mti.uad.ac.id \r\n'),
(35, 'Muhammad Muchlas Rowi, S.S., M.M.\r\n', 'Anggota', '', ''),
(36, 'Joko Suprianto', 'Anggota', '12345', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asistensi`
--

CREATE TABLE `asistensi` (
  `id_asistensi` int(11) NOT NULL,
  `nama_asistensi` varchar(250) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asistensi`
--

INSERT INTO `asistensi` (`id_asistensi`, `nama_asistensi`, `bidang`, `nohp`, `email`) VALUES
(6, 'Agung Prihantoro, S.Pd., M.Pd. \r\n', 'Penerbitan buku/Warta PTM\r\n', NULL, NULL),
(7, 'Ahmad Akbar Susamto, M.Phil., Ph.D. \r\n', 'Manajemen/Kaderisasi/Beasiswa\r\n', NULL, NULL),
(8, 'Ahmad Romadhoni SP, Ph.D. \r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', NULL, NULL),
(9, 'Amika Wardana, Ph.D.\r\n', 'AIK/Kaderisasi/Penelitian\r\n', NULL, NULL),
(10, 'Budi Asyhari Afwan, M.A. \r\n', 'Penelitian/Kajian\r\n', NULL, NULL),
(12, 'Dr. Budhi Akbar. M.Si.\r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(13, 'Dr. H. Robby Habiba Abror, S.Ag., M.Hum. \r\n', 'AIK/Filsafat Pendidikan\r\n', NULL, NULL),
(14, 'Dr. Irwan Baadilla, M.Pd.\r\n', 'AIK/Asrama PTM\r\n', NULL, NULL),
(15, 'Dr. Mufdilah, S.Pd., S.SiT., M.Sc.\r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(16, 'Prof. Dr. Nano Prawoto, M.Si. \r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(17, 'Dr. Nawari Ismail, M.Ag. \r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(18, 'Dr. Suliswiyadi, M.Ag\r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(19, 'Dr. Suranto, M.Pol. \r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(20, 'Dr. Syaiful Rohim, M.Si.\r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(21, 'Dr. Tri Sulistyaningsih, M.Si.\r\n', 'Akreditasi/Penjaminan Mutu', NULL, NULL),
(22, 'Ghoffar Ismail, S.Ag., M.A. \r\n', 'AIK/Asrama PTM\r\n', NULL, NULL),
(23, 'H. Aly Aulia, Lc., M.Hum. \r\n', 'AIK/Kaderisasi\r\n', NULL, NULL),
(24, 'H. Taufiqurrahman, M.A., Ph.D. \r\n', 'AIK/Kaderisasi/Beasiswa\r\n', NULL, NULL),
(25, 'Ida Puspita, M.A. Res.\r\n', 'Kerjasa sama Internasional\r\n', NULL, NULL),
(27, 'Miftahul Haq, S.H.I., M.Si\r\n', 'AIK/Kaderisasi\r\n', NULL, NULL),
(28, 'Muamaroh, Ph.D.\r\n', 'AIK/Asrama PTM\r\n', NULL, NULL),
(29, 'Muhammad Sulaiman, Lc., M.Pd.I.\r\n', 'AIK/Asrama PTM\r\n', NULL, NULL),
(30, 'Munawwar Khalil, M.Ag. \r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(31, 'N. Satria Abdi, S.H., M.H.\r\n', 'Hukum\r\n', NULL, NULL),
(32, 'Nasrullah, S.H., S.Ag., MCL\r\n', 'Hukum\r\n', NULL, NULL),
(33, 'Prof. Dr. Muhtadi  \r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', NULL, NULL),
(34, 'Prof. Dr. Mukti Fajar Nur Dewata, S.H., M.Hum. \r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(35, 'Prof. H. Mahfud Sholihin, Ph.D.\r\n', 'Keuangan\r\n', NULL, NULL),
(36, 'Rohmad Suprapto, S.Ag., M.Si\r\n', 'AIK/Asrama PTM\r\n', NULL, NULL),
(37, 'Sri Sumaryani, Ns., M.Kep., Sp.Mat.\r\n', 'Akreditasi/Penjaminan Mutu\r\n', NULL, NULL),
(38, 'Yordan Gunawan, S.H., MBA., M.H.\r\n', 'Kerjasa sama Internasional\r\n', NULL, NULL),
(39, 'Dr. Dwi Cahyono, M.Si., Akt.\r\n', 'Merger, Pendirian\r\n', NULL, NULL),
(40, 'Drs. Ahmad, M.Pd., Ph.D.\r\n', 'Merger, Pendirian\r\n', NULL, NULL),
(41, 'Dr. Ir. Bana Handaga, M.T.\r\n', 'IT\r\n', NULL, NULL),
(42, 'Dr. Suyadi, M.Pd.I. \r\n', 'AIK\r\n', NULL, NULL),
(43, 'H. Nur Kholis, M.Ag. (UAD)\r\n', 'AIK\r\n', '082136374922', 'kholis53@yahoo.co.id \r\n'),
(44, 'Ghoffar Ismail, S.Ag., M.A. (UM Yogyakarta)\r\n', 'AIK/Asrama PTM\r\n', '081328008104', 'ghoffar_umy@yahoo.com \r\n'),
(45, 'Dr. H. Robby Habiba Abror, S.Ag., M.Hum. (UIN)\r\n', 'AIK/Filsafat Pendidikan\r\n', '087839792629', 'robby_abror23@yahoo.com \r\n'),
(46, 'Dr. Amika Wardana (UNY)\r\n', 'AIK/Kaderisasi/Penelitian\r\n', '081393471345', 'masmicko@gmail.com \r\n'),
(47, 'H. Aly Aulia, Lc., M.Hum. (UM Yogyakarta)\r\n', 'AIK/Kaderisasi\r\n', '081542344540', 'auliarahma.ar29@gmail.com \r\n'),
(48, 'Miftahul Haq, S.H.I., M.Si\r\n', 'AIK/Kaderisasi\r\n', '085729156942 081802629089', 'mifhaq@gmail.com\r\n'),
(49, 'H. Mukhlis Rahmanto, Lc., M.A. (UM Yogyakarta)\r\n', 'AIK/Kaderisasi\r\n', '081905125483', 'mukhlisindunisi@gmail.com \r\n'),
(50, 'H. Taufiqurrahman, M.A., Ph.D. (UM Yogyakarta)\r\n', 'AIK/Kaderisasi/Beasiswa\r\n', '081230592734', 'taufiq_rm@yahoo.com \r\n'),
(51, 'Dr. Mukti Fajar Nur Dewata, S.H., M.Hum. (UM Yogyakarta)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '08122942781', 'muktifajar_umy@yahoo.co.id \r\n'),
(52, 'Dr. Nano Prawoto, M.Si. (UM Yogyakarta)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '08164272479', 'prawotonano@yahoo.com \r\n'),
(53, 'Dr. Nawari Ismail, M.Ag. (UM Yogyakarta)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '081802705307', NULL),
(54, 'Dr. Suliswiyadi, M.Ag. (UM Magelang)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '085878985499', 'suliswiyadi@ummgl.ac.id, suliswiyadi@yahoo.com \r\n'),
(55, 'Dr. Suranto, M.Pol. (UM Yogyakarta)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '0816686596', 'suranto_umy@yahoo.com \r\n'),
(56, 'Munawwar Khalil, M.Ag. (UIN)\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '087739326281', 'kandanawar@gmail.com \r\n'),
(57, 'Fitri Arofiati, S.Kep., Ns., MAN., P.hD\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '81392462014', 'fitri.arofiati@umy.ac.id\r\n'),
(58, 'Dr. H. Budi Akbar, M.Si\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '81219381966', NULL),
(59, 'Dr. Tri Sulistyaningsih, M.Si\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '', ''),
(60, 'H. Mahfud Sholihin, Ph.D. (UGM)\r\n', 'Keuangan\r\n', '08112534165', 'mahfud@ugm.ac.id \r\n'),
(61, 'Nurul Indarti, Sivilokonom, Cand.Merc., Ph.D. (UGM)\r\n', 'Manajemen Perguruan Tinggi\r\n', '0811253258', 'nurulindarti@ugm.ac.id \r\n'),
(62, 'Ahmad Akbar Susamto, M.Phil., Ph.D. (UGM)\r\n', 'Manajemen/Kaderisasi/Beasiswa\r\n', '081290113275', 'akhmad.susamto@ugm.ac.id \r\n'),
(63, 'Ahmad Romadhoni SP, Ph.D. (UGM)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', '08170428119', 'rars.putra@gmail.com , ahmadromadhoni@ugm.ac.id \r\n'),
(64, 'Dr. Muhtadi (UM Surakarta)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', '082136362763', 'muhtadi@ums.ac.id \r\n'),
(65, 'Gunawan Ariyanto, M.Sc., Ph.D. (UM Surakarta)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', NULL, NULL),
(66, 'Nurhadi, Ph.D. (UGM)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', '082187789599', 'nurhadi@ugm.ac.id \r\n'),
(67, 'Prof. Dr. Harun Joko Prayitno (UM Surakarta)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', '082242301929', 'harunjpums@yahoo.com \r\n'),
(68, 'Tole Sutikno, S.T., M.T., Ph.D. (UAD)\r\n', 'Penelitian, Pengabdian dan Jurnal\r\n', '08562862810', 'mahfud@ugm.ac.id \r\n'),
(69, 'Budi Asyhari Afwan, M.A. (CRCS UGM)\r\n', 'Penelitian/Kajian\r\n', '081578644351', 'budiasy@gmail.com \r\n'),
(70, 'Agung Prihantoro, S.Pd., M.Pd. (UCY)\r\n', 'Penerbitan buku/Warta PTM\r\n', '+62 811-267-506', 'mahaagungp@gmail.com \r\n'),
(71, 'Ida Puspita, M.A. Res. (UAD)\r\n', 'Urusan Kerjasama Internasional\r\n', '081318852414', 'ida.puspita@uad.ac.id, ida.puspita@gmail.com \r\n'),
(72, 'Dewi Nurul Musjtari, S.H., M.Hum (UMY)\r\n', 'Hukum\r\n', '85878471992', 'dewinm@yahoo.com\r\n'),
(73, 'Iwan Satriawan, S.H., MCL., Ph.D (UMY)\r\n', 'Hukum\r\n', '081328788844', 'abi_rehan2002@yahoo.com, iwansatriawan@umy.ac.id\r\n'),
(74, 'Ani Yunita, S.H.,M.H.\r\n', 'Hukum\r\n', '081326641117', 'masayunita2302@gmail.com\r\n'),
(75, 'Nasrullah, S.H., S.Ag., MCL\r\n', 'Hukum\r\n', '082135505656', 'udanasrul2010@gmail.com\r\n'),
(76, 'N. Satria Abdi, S.H., M.H.\r\n', 'Hukum\r\n', '08157951847, 081328561998', 'satria_fhuad@yahoo.co.id\r\n'),
(77, 'Septi Nur Wijayanti, S.H.,M.H.\r\n', 'Hukum\r\n', '08164260922', 'septinurwijayanti73@gmail.com\r\n'),
(78, 'Dr.Mufdlilah, S.Pd.,S.SiT., M.Sc.\r\n', 'Akreditasi/Penjaminan Mutu\r\n', '08122720493', 'mufdlilah.stikes@gmail.com\r\n'),
(79, 'Ir. Punang  Amaripuja S.E., M.I.T.\r\n', '\r\n', '85226414511', 'p_amaripuja@yahoo.com\r\n'),
(80, 'Andy Dwi Bayu Bawono, S.E, M.Si, Ph.D.\r\n', 'Keuangan\r\n', '081246212676', 'andy.bawono@ums.ac.id, andy.dbb@gmail.com\r\n'),
(81, 'Dr. Zulfikar, SE., M.Si.\r\n', 'Keuangan\r\n', '08122611628', 'zulfikar@ums.ac.id\r\n'),
(82, 'Dr. Aziz Alimul Hidayat, S.Kep., Ns., M.Kes.\r\n\r\n', 'Akreditasi/Penjaminan Mutu\r\n\r\n', 'azizhidayat@yahoo.com', 'andy.bawono@ums.ac.id, andy.dbb@gmail.com\r\n'),
(83, 'Sri Sumaryani , S.Kep,. Ns,. M.Kep.,Sp.Mat\r\n', 'Akreditasi/Penjaminan Mutu\r\n\r\n', '', 'yanipsikumy@gmail.com \r\n'),
(84, 'Joko Suprianto', 'AIK', '12345', 'tendik@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
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

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `penerima`, `keperluan`, `nama_peserta`, `instansi_peserta`, `no_hp_peserta`, `jabatan_peserta`, `tanggal`) VALUES
(11, 'admin', 'tamu', 'wicak', 'uad', '08523456789', 'dosen', '2021-06-28'),
(12, 'admin', 'tamu', 'wicak', 'uad', '08123456789', 'dosen', '2021-06-28'),
(13, 'admin', 'kunjungan', 'saleh', 'uad', '08523456789', 'dosen', '2021-07-05'),
(15, 'staf', 'Bertamu', 'wicak', 'uad', '08523456789', 'dosen', '2021-06-30'),
(16, 'staf', 'Bertamu', 'saleh', 'uad', '08523456789', 'dosen', '2021-06-30'),
(17, 'staf', 'Bertamu', 'joko', 'uad', '08523456789', 'dosen', '2021-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(16) NOT NULL,
  `id_instansi` int(10) DEFAULT NULL,
  `nama_divsi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `id_instansi`, `nama_divsi`) VALUES
(1, 12, 'HRD'),
(2, 0, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `contact_no` varchar(50) NOT NULL COMMENT 'Contact No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data untuk tabel `import`
--

INSERT INTO `import` (`id`, `first_name`, `last_name`, `email`, `contact_no`) VALUES
(702, 'wicak', 'usm', 'wicak@sibermu.ac.id', '8508631633'),
(703, 'joko', 'usm', 'joko@sibermu.ac.id', '9848187252'),
(704, 'idin', 'usm', 'idin@sibermu.ac.id', '7895468956'),
(705, 'andi', 'usm', 'andi@sibermu.ac.id', '8904899878'),
(706, 'wicak', 'usm', 'wicak@sibermu.ac.id', '8508631633'),
(707, 'joko', 'usm', 'joko@sibermu.ac.id', '9848187252'),
(708, 'idin', 'usm', 'idin@sibermu.ac.id', '7895468956'),
(709, 'andi', 'usm', 'andi@sibermu.ac.id', '8904899878'),
(710, 'wicak', 'usm', 'wicak@sibermu.ac.id', '8508631633'),
(711, 'joko', 'usm', 'joko@sibermu.ac.id', '9848187252'),
(712, 'idin', 'usm', 'idin@sibermu.ac.id', '7895468956'),
(713, 'andi', 'usm', 'andi@sibermu.ac.id', '8904899878'),
(714, 'wicak', 'usm', 'wicak@sibermu.ac.id', '8508631633'),
(715, 'joko', 'usm', 'joko@sibermu.ac.id', '9848187252'),
(716, 'idin', 'usm', 'idin@sibermu.ac.id', '7895468956'),
(717, 'andi', 'usm', 'andi@sibermu.ac.id', '8904899878'),
(718, 'wicak', 'usm', 'wicak@sibermu.ac.id', '8508631633'),
(719, 'joko', 'usm', 'joko@sibermu.ac.id', '9848187252'),
(720, 'idin', 'usm', 'idin@sibermu.ac.id', '7895468956'),
(721, 'andi', 'usm', 'andi@sibermu.ac.id', '8904899878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
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
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat_lengkap`, `telp`, `informasi`, `fax`, `npwp`, `logo`, `favicon`, `keterangan_situs`) VALUES
(97, 'Majelis Dikti Muhammadiyah', 'Kantor Majelis Diktilitbang PP Muhammadiyah\r\nJalan Brawijaya No. 89 Menayu Kidul RT. 08 Tirtonirmolo Kasihan Bantul ', '081273328123', 'Sistem informasi arsip ini adalah : untuk mempermudah dalam pengarsipan setiap bentuk dokumen dalam suatu instansi organinsasi , yang sewaktu - waktu dapat di lihat kembali data dokumen yang terarsipkan sebelumnya', '081273328123', '923042-882-302-', '1620088880logo.jpg', '1620088880logo1.jpg', 'https://diktilitbangmuhammadiyah.org/id/'),
(97, 'Majelis Dikti Muhammadiyah', 'Kantor Majelis Diktilitbang PP Muhammadiyah\r\nJalan Brawijaya No. 89 Menayu Kidul RT. 08 Tirtonirmolo Kasihan Bantul ', '081273328123', 'Sistem informasi arsip ini adalah : untuk mempermudah dalam pengarsipan setiap bentuk dokumen dalam suatu instansi organinsasi , yang sewaktu - waktu dapat di lihat kembali data dokumen yang terarsipkan sebelumnya', '081273328123', '923042-882-302-', '1620088880logo.jpg', '1620088880logo1.jpg', 'https://diktilitbangmuhammadiyah.org/id/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lainya`
--

CREATE TABLE `lainya` (
  `id_lainya` int(20) NOT NULL,
  `nama_lainya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lainya`
--

INSERT INTO `lainya` (`id_lainya`, `nama_lainya`) VALUES
(91, 'idim'),
(92, 'idim'),
(93, 'joko'),
(94, 'wicak'),
(95, 'idim'),
(96, 'joko'),
(97, 'joko'),
(98, 'joko'),
(99, 'wicak'),
(100, 'joko'),
(101, 'joko'),
(102, 'Stter'),
(103, 'joko'),
(104, 'joko'),
(105, 'joko'),
(106, 'joko'),
(107, 'idim'),
(108, 'joko'),
(109, 'joko'),
(110, 'joko'),
(111, 'joko'),
(112, 'idim'),
(113, 'wicak'),
(114, 'joko'),
(115, 'wicak'),
(116, 'idim'),
(117, 'joko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nama` varchar(59) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('user','admin','','') NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `date_create` date NOT NULL,
  `log` datetime DEFAULT NULL,
  `id_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `nama`, `email`, `foto`, `level`, `active`, `date_create`, `log`, `id_divisi`) VALUES
(2, 'dikti', '123', 'Dikti Muhammadiyah', 'user@gmail.com', '', '', 'Y', '0000-00-00', '2021-05-04 02:45:06', '2'),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin Dikti', 'admin@example.com', '', 'admin', 'Y', '0000-00-00', NULL, '2'),
(4, 'joko', '202cb962ac59075b964b07152d234b70', 'Joko Suprianto 2', 'joko@user.com', '', 'user', 'Y', '0000-00-00', '2021-06-29 04:29:42', '1'),
(5, 'idim', '123', 'Muhamad Rosidin', 'user@gmail.com', '', 'admin', 'Y', '0000-00-00', '2021-09-19 04:13:23', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `icon`, `link`, `aktif`, `urutan`, `position`, `level`) VALUES
(18, 0, 'Divisi', 'icon-user fa-fw', 'Divisi', 'Ya', 11, 'Bottom', ''),
(14, 0, 'Tambah Akun', 'icon-user fa-fw', 'Login', 'Ya', 10, 'Bottom', 'admin'),
(15, 0, 'Kegiatan Detail', 'icon-list  fa-fw', 'Notulen_detail', 'Ya', 2, 'Bottom', 'admin.user'),
(13, 0, 'Daftar Bidang', 'icon-menu  fa-fw', 'Notulen', 'Ya', 1, 'Bottom', 'admin'),
(12, 0, 'Instansi', 'icon-user fa-fw', 'Instansi', 'Ya', 13, 'Bottom', ''),
(22, 0, 'Anggota', 'icon-people  fa-fw', 'Anggota', 'Ya', 4, 'Bottom', 'admin'),
(23, 0, 'Buku Tamu', 'icon-docs  fa-fw', 'Buku_tamu', 'Ya', 3, 'Bottom', 'admin.user'),
(24, 0, 'Asistensi', 'icon-people  fa-fw', 'Asistensi', 'Ya', 5, 'Bottom', 'admin'),
(25, 0, 'Menu', 'icon-menu  fa-fw', 'Setting/Menu', 'Ya', 12, 'Bottom', 'admin'),
(26, 0, 'Tamu', 'icon-user-following  fa-fw', 'import', 'Ya', 6, 'Bottom', ''),
(27, 0, 'Absensi', 'icon-user fa-fw', 'Absensi', 'Ya', 9, 'Bottom', ''),
(32, 0, 'Tamu/Peserta Lainya', 'icon-people  fa-fw', 'Lainya', 'Ya', 8, 'Bottom', ''),
(33, 0, 'Staf Majelis', 'icon-user-following  fa-fw', 'staf', 'Ya', 7, 'Bottom', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulen`
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
-- Dumping data untuk tabel `notulen`
--

INSERT INTO `notulen` (`id_notulen`, `agenda`, `id_create`, `start_time`, `end_time`, `place`, `participan`, `date_create`, `absensi`, `tdd_pimpinan`, `no_dokumen`, `no_revisi`, `notulis`, `pimpinan_rapat`, `jenis_rapat`, `no_agenda`) VALUES
(9, 'Akademik, Penjaminan Mutu, SDM dan Kerja Sama Luar Negeri', 3, '01:13', '12:14', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620191738.png', 'absensi_16201917381.png', '3', '3', 'Admin', 'Peserta Majelis', 'Mingguan', '1'),
(10, 'AIK dan Kemahasiswaan', 3, '10:17', '23:59', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620191930.png', 'absensi_16201919301.png', '2', '2', 'Admin', 'Peserta Majelis', 'Mingguan', '2'),
(11, 'Litbang dan Pengembangan Usaha', 3, '00:31', '12:31', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620192748.png', 'absensi_16201927481.png', '3', '3', 'Admin', 'Peserta Majelis', 'Mingguan', '3'),
(12, 'Riset, PPM, dan Publikasi', 3, '01:02', '13:02', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620194586.png', 'absensi_16201945861.png', '4', '4', 'Admin', 'Peserta Majelis', 'Mingguan', '4'),
(13, 'Kerja Sama', 3, '02:52', '14:53', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201220.png', 'absensi_16202012201.png', '5', '5', 'Admin', 'Peserta Majelis', 'Mingguan', '5'),
(14, 'PTKI', 3, '02:53', '23:54', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201300.png', 'absensi_16202013001.png', '6', '6', 'Admin', 'Peserta Majelis', 'Mingguan', '6'),
(15, 'Umum', 3, '02:55', '23:55', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201410.png', 'absensi_16202014101.png', '7', '7', 'Admin', 'Peserta Majelis', 'Mingguan', '7'),
(16, 'Rapat Khusus Majelis Diktilitbang PP Muhammadiyah', 3, '02:57', '23:59', 'Kantor Majelis ', 'Peserta', '2021-05-05', 'absensi_1620201516.png', 'absensi_16202015161.png', '8', '8', 'Admin', 'Peserta Majelis', 'Khusus', '8'),
(17, 'Buku Tamu', 3, '01:00', '14:30', 'Kantor Majelis ', 'Tamu', '2021-05-19', 'absensi_1621422523.png', 'absensi_16214225231.png', '5', '5', 'Admin', 'Peserta Majelis', 'Khusus', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulen_detail`
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

--
-- Dumping data untuk tabel `notulen_detail`
--

INSERT INTO `notulen_detail` (`id_not_detail`, `id_notulen`, `issue`, `tanggal_mulai`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `tempat`, `jenis_kegiatan`, `catatan`, `jumlah`, `status`, `date_created`) VALUES
(228, 17, 'bt1', '2021-08-16', '2021-08-16', '06:18', '18:18', 'Daring', 'Rapat', 'tes', 2, 'Y', '2021-08-16'),
(229, 17, 'bt2', '2021-08-16', '2021-08-16', '06:19', '18:19', 'Daring', 'Rapat', 'tes tes', 3, 'N', '2021-08-16'),
(230, 17, 'bt3', '2021-08-16', '2021-08-16', '06:21', '18:21', 'Daring', 'Rapat', 'tes tes tes', 7, 'N', '2021-08-16'),
(231, 17, 'bt5', '2021-08-16', '2021-08-16', '06:31', '18:31', 'Daring', 'Rapat', 'tess', 4, 'N', '2021-08-16'),
(232, 15, 'umum', '2021-08-16', '2021-08-16', '07:54', '19:54', 'Daring', 'Rapat', 'tes', 7, 'N', '2021-08-16'),
(249, 17, 'fdsa', '2021-09-01', '2021-09-01', '19:33', '07:33', 'Daring', 'Rapat', 'tes4.pdf', 2, 'N', '2021-09-01'),
(250, 17, 'buktm', '2021-09-04', '2021-09-04', '02:21', '14:21', 'Daring', 'Rapat', 'tes5.pdf', 11, 'N', '2021-09-04'),
(251, 12, 'riset', '2021-09-06', '2021-09-06', '07:28', '19:29', 'Daring', 'Rapat', 'tes6.pdf', 3, 'N', '2021-09-06'),
(252, 12, 'riset2', '2021-09-06', '2021-09-06', '07:34', '19:34', 'Daring', 'Rapat', 'Tidak ada file', 4, 'N', '2021-09-06'),
(253, 12, 'riset3', '2021-09-06', '2021-09-06', '07:38', '19:38', 'Daring', 'Rapat', 'Tidak ada file', 3, 'N', '2021-09-06'),
(254, 12, 'riset4', '2021-09-06', '2021-09-06', '07:45', '19:45', 'Daring', 'Rapat', 'Tidak ada file', 2, 'N', '2021-09-06'),
(255, 17, 'tes34', '2021-09-06', '2021-09-06', '07:55', '19:55', 'Daring', 'Rapat', 'Tidak ada file', 1, 'N', '2021-09-06'),
(256, 17, 'tes345', '2021-09-06', '2021-09-06', '07:56', '19:56', 'Daring', 'Rapat', 'tes7.pdf', 2, 'N', '2021-09-06'),
(257, 12, 'riset5', '2021-09-06', '2021-09-06', '08:02', '20:02', 'Daring', 'Rapat', 'Tidak ada file', 3, 'N', '2021-09-06'),
(258, 12, 'riset5', '2021-09-06', '2021-09-06', '08:17', '20:17', 'Daring', 'Rapat', 'tes8.pdf', 9, 'N', '2021-09-06'),
(259, 15, 'Aplikasi', '2021-09-09', '2021-09-09', '07:55', '19:55', 'Daring', 'Rapat', 'Tidak ada file', 3, 'N', '2021-09-09'),
(260, 17, 'buku tamu ya', '2021-09-11', '2021-09-11', '02:38', '14:38', 'Daring', 'Rapat', 'Borang MOU Sistem Informasi_sem antara_docx.odt', 16, 'N', '2021-09-11'),
(261, 15, 'umum', '2021-09-20', '2021-09-20', '02:20', '14:20', 'Daring', 'Rapat', 'Tidak ada file', 2, 'N', '2021-09-20'),
(262, 16, 'khusus', '2021-09-20', '2021-09-20', '02:58', '14:58', 'Daring', 'Rapat', 'Tidak ada file', 4, 'N', '2021-09-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
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

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_not_detail`, `id_anggota`, `id_asistensi`, `id_tamu`, `id_lainya`, `id_staf`) VALUES
(370, 228, 35, 83, NULL, NULL, NULL),
(371, 229, 35, 83, NULL, 109, NULL),
(372, 230, 35, 83, 702, 110, NULL),
(373, 230, NULL, NULL, 703, NULL, NULL),
(374, 230, NULL, NULL, 704, NULL, NULL),
(375, 230, NULL, NULL, 705, NULL, NULL),
(376, 231, NULL, NULL, 706, NULL, NULL),
(377, 231, NULL, NULL, 707, NULL, NULL),
(378, 231, NULL, NULL, 708, NULL, NULL),
(379, 231, NULL, NULL, 709, NULL, NULL),
(380, 232, 35, 83, 710, 111, NULL),
(381, 232, NULL, NULL, 711, NULL, NULL),
(382, 232, NULL, NULL, 712, NULL, NULL),
(383, 232, NULL, NULL, 713, NULL, NULL),
(399, 249, 35, NULL, NULL, NULL, NULL),
(400, 249, 34, NULL, NULL, NULL, NULL),
(401, 250, 35, 83, 714, 112, NULL),
(402, 250, 34, 82, 715, 113, NULL),
(403, 250, NULL, 81, 716, NULL, NULL),
(404, 250, NULL, NULL, 717, NULL, NULL),
(405, 251, 0, 83, NULL, NULL, NULL),
(406, 251, 0, NULL, NULL, NULL, NULL),
(407, 252, 0, 83, NULL, NULL, NULL),
(408, 252, 0, NULL, NULL, NULL, NULL),
(409, 252, 0, NULL, NULL, NULL, NULL),
(410, 253, 0, NULL, NULL, NULL, NULL),
(411, 253, 0, NULL, NULL, NULL, NULL),
(412, 253, 0, NULL, NULL, NULL, NULL),
(413, 254, 0, NULL, NULL, NULL, NULL),
(414, 254, 0, NULL, NULL, NULL, NULL),
(415, 255, NULL, 83, NULL, NULL, NULL),
(416, 256, NULL, 83, NULL, NULL, NULL),
(417, 256, NULL, 82, NULL, NULL, NULL),
(418, 257, 1, NULL, NULL, NULL, NULL),
(419, 257, 2, NULL, NULL, NULL, NULL),
(420, 257, 8, NULL, NULL, NULL, NULL),
(421, 258, 1, 6, 718, 114, NULL),
(422, 258, NULL, NULL, 719, 115, NULL),
(423, 258, NULL, NULL, 720, 116, NULL),
(424, 258, NULL, NULL, 721, NULL, NULL),
(425, 259, 8, NULL, NULL, NULL, NULL),
(426, 259, 9, NULL, NULL, NULL, NULL),
(427, 259, 10, NULL, NULL, NULL, NULL),
(428, 260, 1, 6, NULL, NULL, NULL),
(429, 260, 8, 7, NULL, NULL, NULL),
(430, 260, 12, 8, NULL, NULL, NULL),
(431, 260, 14, 9, NULL, NULL, NULL),
(432, 260, 15, 27, NULL, NULL, NULL),
(433, 260, 16, 28, NULL, NULL, NULL),
(434, 260, NULL, 29, NULL, NULL, NULL),
(435, 260, NULL, 81, NULL, NULL, NULL),
(436, 260, NULL, 82, NULL, NULL, NULL),
(437, 260, NULL, 83, NULL, NULL, NULL),
(438, 261, 1, 6, NULL, NULL, NULL),
(439, 262, 1, 6, NULL, 117, 204);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `id_staf` int(50) NOT NULL COMMENT 'Primary Key',
  `nama_staf` varchar(128) CHARACTER SET latin1 NOT NULL COMMENT 'Nama Staf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staf`
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
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `asistensi`
--
ALTER TABLE `asistensi`
  ADD PRIMARY KEY (`id_asistensi`);

--
-- Indeks untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lainya`
--
ALTER TABLE `lainya`
  ADD PRIMARY KEY (`id_lainya`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`id_notulen`);

--
-- Indeks untuk tabel `notulen_detail`
--
ALTER TABLE `notulen_detail`
  ADD PRIMARY KEY (`id_not_detail`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `asistensi`
--
ALTER TABLE `asistensi`
  MODIFY `id_asistensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=722;

--
-- AUTO_INCREMENT untuk tabel `lainya`
--
ALTER TABLE `lainya`
  MODIFY `id_lainya` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `notulen`
--
ALTER TABLE `notulen`
  MODIFY `id_notulen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `notulen_detail`
--
ALTER TABLE `notulen_detail`
  MODIFY `id_not_detail` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT untuk tabel `staf`
--
ALTER TABLE `staf`
  MODIFY `id_staf` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=234;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
