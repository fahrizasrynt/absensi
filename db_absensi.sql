-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 06:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `id_kelas`, `keterangan`, `tanggal`) VALUES
(1, 12, 23, 'Hadir', '2018-07-30'),
(2, 13, 23, 'Hadir', '2018-07-30'),
(3, 18, 23, 'Hadir', '2018-07-30'),
(4, 12, 23, 'Hadir', '2018-08-01'),
(5, 13, 23, 'Hadir', '2018-08-01'),
(6, 18, 23, 'Hadir', '2018-08-01'),
(7, 12, 23, 'Hadir', '2018-08-02'),
(8, 13, 23, 'Sakit', '2018-08-02'),
(9, 18, 23, 'Alfa', '2018-08-02'),
(10, 12, 23, 'Hadir', '2018-08-04'),
(11, 13, 23, 'Hadir', '2018-08-04'),
(12, 18, 23, 'Sakit', '2018-08-04'),
(13, 12, 23, 'Hadir', '2018-08-06'),
(14, 13, 23, 'Sakit', '2018-08-06'),
(15, 18, 23, 'Dispensasi', '2018-08-06'),
(16, 20, 9, 'Hadir', '2018-05-15'),
(17, 21, 9, 'Izin', '2018-05-15'),
(18, 20, 9, 'Hadir', '2018-05-01'),
(19, 21, 9, 'Hadir', '2018-05-01'),
(20, 12, 23, 'Hadir', '2018-08-31'),
(21, 13, 23, 'Izin', '2018-08-31'),
(22, 18, 23, 'Hadir', '2018-08-31'),
(23, 12, 23, 'Hadir', '2018-08-15'),
(24, 13, 23, 'Hadir', '2018-08-15'),
(25, 18, 23, 'Hadir', '2018-08-15'),
(26, 20, 9, 'Hadir', '2018-08-23'),
(27, 21, 9, 'Hadir', '2018-08-23'),
(28, 20, 9, 'Hadir', '2018-08-28'),
(29, 21, 9, 'Hadir', '2018-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', ''),
(2, 'awldamlwm', '306ce0e6eae07d19974ef5b8414e107aa8f5b289', 'awjda@gmail.com', ''),
(4, 'eko123', '3ee5e4d76f2098635fbe5b24be222ae44f8d776c', 'eko123@gmail.com', ''),
(5, 'guru', 'a1872e333d0e52644f6125da2276530f7ebe5e77', 'guru@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', ''),
(2, 'awldamlwm', '306ce0e6eae07d19974ef5b8414e107aa8f5b289', 'awjda@gmail.com', ''),
(4, 'eko123', '3ee5e4d76f2098635fbe5b24be222ae44f8d776c', 'eko123@gmail.com', ''),
(5, 'guru', 'a1872e333d0e52644f6125da2276530f7ebe5e77', 'guru@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `slug_kelas` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `slug_kelas`, `urutan`) VALUES
(1, '1B', '12b', 1),
(2, '2B', '2b', 2),
(3, '3B', '3b', 3),
(4, '4A', '4a', 4),
(6, '1A', '1a', 5),
(7, 'X-IPA-1', 'x-ipa-1', 6),
(8, 'X-IPA-2', 'x-ipa-2', 7),
(9, 'X-IPA-3', 'x-ipa-3', 8),
(10, 'XI-IPA-1', 'xi-ipa-1', 9),
(11, 'XI-IPA-2', 'xi-ipa-2', 10),
(12, 'XI-IPA-3', 'xi-ipa-3', 11),
(13, 'XII-IPA-1', 'xii-ipa-1', 12),
(14, 'XII-IPA-2', 'xii-ipa-2', 13),
(15, 'XII-IPA-3', 'xii-ipa-3', 13),
(16, 'X-IPS-1', 'x-ips-1', 14),
(17, 'X-IPS-2', 'x-ips-2', 15),
(18, 'X-IPS-3', 'x-ips-3', 16),
(19, 'XI-IPS-1', 'xi-ips-1', 17),
(20, 'XI-IPS-2', 'xi-ips-2', 18),
(21, 'XI-IPS-3', 'xi-ips-3', 19),
(22, 'XII-IPS-1', 'xii-ips-1', 20),
(23, 'XII-IPS-2', 'xii-ips-2', 21),
(24, 'XII-IPS-3', 'xii-ips-3', 22);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `nama_web` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` text NOT NULL,
  `alamat` text NOT NULL,
  `peta` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `logo`, `icon`, `nama_web`, `email`, `keywords`, `metatext`, `alamat`, `peta`) VALUES
(1, '048771-yellow-road-sign-icon-sports-hobbies-film-clapper1-sc441.png', '048771-yellow-road-sign-icon-sports-hobbies-film-clapper1-sc44.png', 'absensi', 'admin@gmai.com', 'jjj', 'jjj', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `nama_depan`, `nama_belakang`, `alamat`, `foto`, `pendidikan`, `agama`, `no_hp`, `username`, `password`, `email`, `pekerjaan`) VALUES
(3, 'jojon', 'aja', 'qwdqwd', '1148412.jpg', 'SLTA', 'islam', '239472934', 'jojon', '631acf53de94014c00c4a4b835665dba1484ca9e', 'jojonaja@gmail.com', 'tu'),
(5, 'betong', 'aja1', 'ajdakwdj', '1148418.jpg', 'SMP', 'islam', '230948230', 'betong', '6564af129f6ab3afff56b711a4b42689b9b335f3', 'betong123@gmail.com', 'wali_kelas'),
(6, 'orang', 'tua', 'sarijadi', 'agus1.png', 'swasta', 'islam', '21321323213213123', 'orangtua', 'f94c0957350fd4be620dd343037090a6e39a3791', 'orangtua@gmail.com', 'tu'),
(9, 'TES', 'TES', 'sawrwa', 'dio2.png', 'Sarjana', 'islam', '123123122', 'testes', '20bcadbbdec8be3e8871fb4bff0ac3a699be121a', 'tes@gmail.com', 'swasta'),
(10, 'qwerty', 'qwerty', 'serang', 'didin1.png', 'D3 MI', 'islam', '123123123', 'qwerty', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'alfi@gmail.com', 'tu'),
(11, 'tuatua', 'tautau', 'wadadaw', 'agus2.png', 'Sarjana', 'islam', '0082131', 'tuatua', 'edc3d04ab475f595df9592f977d8dab95a085a53', 'alfi@gmail.com', 'guru'),
(12, 'Virdiandry', 'Putratama', 'parongpong', 'pakvirdy.jpg', 'Magister', 'islam', '08212121212', 'virdy', 'c6418d0ad94e101865e7559b2c07b4f42c1b729e', 'virdiandry@gmail.com', 'Dosen'),
(13, 'Totok', 'Muryanto', 'garut', 'cool-wallpaper-1.jpg', 'Diploma', 'islam', '085283827523', 'Totok', '7947011436f3d707d61ca41aa05569de6e9caca3', 'totok@gmail.com', 'swasta');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `wali` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `id_kelas`, `kelas`, `nama_depan`, `nama_belakang`, `alamat`, `wali`, `no_hp`, `agama`, `foto`, `password`, `email`, `poin`) VALUES
(12, 2163008, 23, 'XII-IPS-2', 'Fahriza', 'Suryanto', 'Sarijadi', 'Totok', '082298338765', 'islam', '15107070296531.jpg', '60275e5e4b38ce1e40ea6d0d65ce175b7b8c9481', 'fahrizasuryanto@gmail.com', ''),
(13, 2163001, 23, 'XII-IPS-2', 'Agus', 'Kurniawan', 'sarijadi 01', 'Virdiandry Putratama', '082163001', 'islam', 'agus.png', '2603420cd5efb463d29610f406b93add65ca17cf', 'agus@gmail.com', ''),
(14, 2163002, 7, 'X-IPA-1', 'Aini', 'Lathifah', 'jl cihanjuang', 'Virdiandry Putratama', '082163002', 'islam', 'aini.png', '4959f49899de6206b347612405af375194682fca', 'aini@gmail.com', ''),
(16, 2163003, 16, 'X-IPS-1', 'Alfi', 'Agita', 'jl Sarijadi', 'Virdiandry Putratama', '082163003', 'islam', 'alfi1.png', '83778e66563da360f2827ebefd73c5c06d5ea8e1', 'alfi@gmail.com', ''),
(17, 2163004, 12, 'XI-IPA-3', 'Dena Nur', 'Ardiansyah', 'cikalong', 'Virdiandry Putratama', '082163004', 'islam', 'dena.png', '84464c0976513e3c3f824bf3bceb19e8341e699a', 'dena@gmail.com', ''),
(18, 2163005, 23, 'XII-IPS-2', 'Didin', 'Shihabudin', 'margahayu', 'Virdiandry Putratama', '082163005', 'islam', 'didin.png', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'didin@gmail.com', ''),
(19, 2163006, 20, 'XI-IPS-2', 'Dio Pramudia', 'Putra', 'parongpong', 'Virdiandry Putratama', '082163006', 'islam', 'dio.png', '2380cce08b8c521fe824fc66edfdb12724ac0870', 'dio@gmail.com', ''),
(20, 2163007, 9, 'X-IPA-3', 'Eva Dwi', 'Astuti', 'cibogo', 'Virdiandry Putratama', '082163007', 'islam', 'eva.png', 'c0f83467b4601fba15cf432ef8480d36bb0e7064', 'eva@gmail.com', ''),
(21, 2163009, 9, 'X-IPA-3', 'Hanifah', 'Nurbaeti', 'garut', 'Totok', '082163009', 'islam', 'eva7.png', 'bd9d14eea725dc2506a2ebdb34c62529a446baa5', 'ipeh@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
