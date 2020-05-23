-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2019 pada 05.05
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nim` int(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` varchar(11) DEFAULT NULL,
  `pulang` varchar(11) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `no_orangtua` varchar(14) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `kodemhs` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `nim`, `tanggal`, `masuk`, `pulang`, `prodi`, `kelas`, `no_orangtua`, `keterangan`, `status`, `kodemhs`) VALUES
(155, 'Murry Febian', 19101011, '2019-11-23', '', '', 'Sistem Informasi', 'MB', '083844455565', '', '', '1001'),
(156, 'Kiki Yazid', 19101136, '2019-11-23', '', '', 'Sistem Informasi', 'MA', '081977878874', '', '', '1136'),
(157, 'Dasep Depiyawan', 19101051, '2019-11-26', '17:03:46', '17:04:08', 'Sistem Informasi', 'MB', '6283821619460', 'Masuk', 'Hadir', '1051'),
(158, 'Edo Warsito', 19101040, '2019-11-23', '', '', 'Sistem Informasi', 'MA', '081977878454', '', '', '1040'),
(159, 'Ayu Wida Utami', 19101011, '2019-11-23', '', '', 'Sistem Informasi', 'MA', '085451235087', '', '', '1011'),
(160, 'Sugianto', 19202010, '2019-11-23', '', '', 'Teknik Informatika', 'MC', '089632145656', '', '', '2010'),
(161, 'Rizki Hidayat', 19101038, '2019-11-23', '', '', 'Sistem Informasi', 'MA', '078896865124', '', '', '1038'),
(162, 'Indah Safitri', 19101036, '2019-11-23', '', '', 'Sistem Informasi', 'MB', '083821648989', '', '', '1036'),
(163, 'Murry Febian', 19101001, '2019-11-24', NULL, NULL, 'Sistem Informasi', 'MB', '085656564005', NULL, NULL, '1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi2`
--

CREATE TABLE `absensi2` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nim` varchar(12) DEFAULT NULL,
  `tanggal` varchar(12) DEFAULT NULL,
  `masuk` varchar(20) DEFAULT NULL,
  `pulang` varchar(20) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi2`
--

INSERT INTO `absensi2` (`id`, `nama`, `nim`, `tanggal`, `masuk`, `pulang`, `prodi`) VALUES
(21, 'Dasep Depiyawan', '19101051', '2019-12-06', '10:53:45', NULL, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  `poto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `pass`, `role_id`, `poto`) VALUES
(5, 'Swadharma', '321', 1, 'logo_SWA12.jpg'),
(8, 'Swadharma', '321', 1, 'logo_SWA1.jpg'),
(13, 'Ega', '123', 1, 'wewe.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nim` int(12) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `no_orangtua` varchar(14) DEFAULT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `kodemhs` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `prodi`, `alamat`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `no_orangtua`, `kelas`, `kodemhs`) VALUES
(243, 'Murry Febian', 19101011, 'Sistem Informasi', 'Bandung', 'Jakarta', '1997-04-17', '083821619654', '083844455565', 'MB', '1001'),
(244, 'Kiki Yazid', 19101136, 'Sistem Informasi', 'Bangka Belitung', 'Bandung', '1995-01-30', '085787998041', '081977878874', 'MA', '1136'),
(245, 'Dasep Depiyawan', 19101051, 'Sistem Informasi', 'Bandung', 'Jakarta', '1999-04-13', '083821619460', '6283821619460', 'MB', '1051'),
(246, 'Edo Warsito', 19101040, 'Sistem Informasi', 'Bangka Belitung', 'Bandung', '1998-05-23', '085787998565', '081977878454', 'MA', '1040'),
(247, 'Ayu Wida Utami', 19101011, 'Sistem Informasi', 'Lampung', 'Jogjakarta', '1997-07-12', '083441258667', '085451235087', 'MA', '1011'),
(248, 'Sugianto', 19202010, 'Teknik Informatika', 'NTT', 'Sleman', '1995-07-02', '083414586412', '089632145656', 'MC', '2010'),
(249, 'Rizki Hidayat', 19101038, 'Sistem Informasi', 'Tasikmalaya', 'Tasikmalaya', '1990-08-28', '084652323535', '078896865124', 'MA', '1038'),
(250, 'Indah Safitri', 19101036, 'Sistem Informasi', 'Kp Tambora Jakarta Utara', 'Jakarta', '1999-10-19', '083821649645', '083821648989', 'MB', '1036');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapabsen`
--

CREATE TABLE `rekapabsen` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nim` int(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` varchar(10) DEFAULT NULL,
  `pulang` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `prodi` varchar(30) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapabsen`
--

INSERT INTO `rekapabsen` (`id`, `nama`, `nim`, `tanggal`, `masuk`, `pulang`, `keterangan`, `prodi`, `status`, `kelas`) VALUES
(141, 'Kiki Yazid', 19101023, '2019-11-21', '07:53:02', '07:53:03', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(142, 'Dasep Depiyawan', 19101051, '2019-11-21', '07:39:13', '07:39:18', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(143, 'Edo Warsito', 19101040, '2019-11-21', '07:50:43', '07:51:09', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(144, 'Ayu Wida Utami', 19101011, '2019-11-21', '07:52:26', '07:52:28', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(145, 'Sugianto', 19202010, '2019-11-21', '07:52:36', '07:52:41', 'Masuk', 'Teknik Informatika', 'Hadir', NULL),
(146, 'Rizki Hidayat', 19101038, '2019-11-21', '-', '-', 'Demam', 'Sistem Informasi', 'Sakit', NULL),
(147, 'Indah Safitri', 19101036, '2019-11-21', '07:52:48', '07:52:51', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(148, 'Murry Febian', 19101016, '2019-11-21', '-', '-', 'Lembur di kantor', 'Sistem Informasi', 'Ijin', NULL),
(149, 'Kiki Yasir', 19101023, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(150, 'Dasep Depiyawan', 19101051, '2019-11-22', '-', '-', 'Tanggal Merah	\r\n		\r\n', 'Sistem Informasi', 'Libur', NULL),
(151, 'Edo Warsito', 19101040, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(152, 'Ayu Wida Utami', 19101011, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(153, 'Sugianto', 19202010, '2019-11-22', '-', '-', 'Tanggal Merah', 'Teknik Informatika', 'Libur', NULL),
(154, 'Rizki Hidayat', 19101038, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(155, 'Indah Safitri', 19101036, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(156, 'Murry Febian', 19101016, '2019-11-22', '-', '-', 'Tanggal Merah', 'Sistem Informasi', 'Libur', NULL),
(157, 'Murry Febian', 19101011, '2019-11-23', '20:44:53', '20:45:02', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(158, 'Kiki Yazid', 19101136, '2019-11-23', '20:45:14', '20:46:36', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(159, 'Dasep Depiyawan', 19101051, '2019-11-23', '20:44:56', '20:45:51', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(160, 'Edo Warsito', 19101040, '2019-11-23', '20:45:21', '20:46:59', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(161, 'Ayu Wida Utami', 19101011, '2019-11-23', '20:44:53', '20:45:02', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(162, 'Sugianto', 19202010, '2019-11-23', '20:44:58', '20:46:47', 'Masuk', 'Teknik Informatika', 'Hadir', NULL),
(163, 'Rizki Hidayat', 19101038, '2019-11-23', '20:45:28', '20:46:15', 'Masuk', 'Sistem Informasi', 'Hadir', NULL),
(164, 'Indah Safitri', 19101036, '2019-11-23', '20:45:36', '20:45:58', 'Masuk', 'Sistem Informasi', 'Hadir', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `absensi2`
--
ALTER TABLE `absensi2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `rekapabsen`
--
ALTER TABLE `rekapabsen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `absensi2`
--
ALTER TABLE `absensi2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT untuk tabel `rekapabsen`
--
ALTER TABLE `rekapabsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
