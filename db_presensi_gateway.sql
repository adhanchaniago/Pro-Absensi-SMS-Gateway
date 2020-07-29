-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jul 2020 pada 22.50
-- Versi Server: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_presensi_gateway`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `absensi_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `absensi_tgl` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`absensi_id`, `kelas_id`, `matakuliah_id`, `absensi_tgl`) VALUES
(6, 3, 3, '2020-02-28'),
(7, 2, 3, '2020-07-08'),
(8, 2, 3, '1996-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_administrator`
--

CREATE TABLE IF NOT EXISTS `tb_administrator` (
  `administrator_id` int(11) NOT NULL,
  `administrator_username` varchar(255) NOT NULL,
  `administrator_password` varchar(255) NOT NULL,
  `administrator_nama` varchar(255) NOT NULL,
  `administrator_level` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_administrator`
--

INSERT INTO `tb_administrator` (`administrator_id`, `administrator_username`, `administrator_password`, `administrator_nama`, `administrator_level`) VALUES
(1, 'admin', 'admin', 'admin', 0),
(2, 'rabowoqa', 'Expedita quam aut es', 'Culpa temporibus ne', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
  `detail_id` int(11) NOT NULL,
  `absensi_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `detail_status` int(11) NOT NULL,
  `detail_ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `absensi_id`, `mahasiswa_id`, `detail_status`, `detail_ket`) VALUES
(9, 6, 8, 0, '8'),
(10, 6, 9, 1, '9'),
(11, 7, 8, 0, '8'),
(12, 7, 9, 0, '9'),
(13, 8, 8, 1, '8'),
(14, 8, 9, 1, '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `dosen_id` int(11) NOT NULL,
  `dosen_nidn` varchar(255) NOT NULL,
  `dosen_kode` varchar(255) NOT NULL,
  `dosen_nama` varchar(255) NOT NULL,
  `dosen_jenis_kelamin` int(11) NOT NULL,
  `dosen_alamat` varchar(255) NOT NULL,
  `dosen_tmp_tgl_lahir` varchar(255) NOT NULL,
  `dosen_agama` varchar(255) NOT NULL,
  `dosen_jenjang_pendidikan` varchar(255) NOT NULL,
  `dosen_status` varchar(255) NOT NULL,
  `dosen_tgl_masuk` varchar(255) NOT NULL,
  `dosen_email` varchar(255) NOT NULL,
  `dosen_nohp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`dosen_id`, `dosen_nidn`, `dosen_kode`, `dosen_nama`, `dosen_jenis_kelamin`, `dosen_alamat`, `dosen_tmp_tgl_lahir`, `dosen_agama`, `dosen_jenjang_pendidikan`, `dosen_status`, `dosen_tgl_masuk`, `dosen_email`, `dosen_nohp`) VALUES
(2, '15101152610542', 'AMK-2631875339', 'Egova Riva Gustino', 0, 'Jln. Parak Karakah No.21 Lubuk Begalung - Padang, Sumatera Barat', 'Bukittinggi/1996-08-13', 'Islam', 'S2', 'Dosen Tetap', '2020-06-01', 'egovaflavia@gmail.com', '0819629431'),
(3, '15101152610541', 'AMK-1202086624', 'Sopi Sapriadi, M. Kom', 0, 'Padang', 'Padang/1995-12-13', 'Islam', 'S2', 'Dosen Tidak Tetap', '2020-01-13', 'sopi@gmail.com', '0819620431');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `kelas_mahasiswa` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `matakuliah_id`, `kelas_nama`, `kelas_mahasiswa`) VALUES
(2, 3, 'Sistem Informasi - 1', '9,8'),
(3, 3, 'Sistem Informasi - 2', '8,9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_npm` varchar(255) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `mahasiswa_jenis_kelamin` int(11) NOT NULL,
  `mahasiswa_alamat` varchar(255) NOT NULL,
  `mahasiswa_tmp_tgl_lahir` varchar(255) NOT NULL,
  `mahasiswa_agama` varchar(255) NOT NULL,
  `mahasiswa_nohp_ortu` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`mahasiswa_id`, `mahasiswa_npm`, `mahasiswa_nama`, `mahasiswa_jenis_kelamin`, `mahasiswa_alamat`, `mahasiswa_tmp_tgl_lahir`, `mahasiswa_agama`, `mahasiswa_nohp_ortu`) VALUES
(8, '20202606054213', 'Abi Gadang', 1, 'Padang', 'Padang    / 1997-12-13', 'Islam', '082284828941'),
(9, '20202606054251', 'Dimas Setya', 0, 'Padang', 'Padang     / 2000-12-12', 'Islam', '0819629431');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
  `matakuliah_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `matakuliah_nama` varchar(255) NOT NULL,
  `matakuliah_sks` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`matakuliah_id`, `dosen_id`, `matakuliah_nama`, `matakuliah_sks`) VALUES
(3, 2, 'Basis Data', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`);

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `absensi_id` (`absensi_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`dosen_id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`matakuliah_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  MODIFY `matakuliah_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`),
  ADD CONSTRAINT `tb_absensi_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `tb_matakuliah` (`matakuliah_id`);

--
-- Ketidakleluasaan untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`absensi_id`) REFERENCES `tb_absensi` (`absensi_id`),
  ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tb_mahasiswa` (`mahasiswa_id`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`matakuliah_id`) REFERENCES `tb_matakuliah` (`matakuliah_id`);

--
-- Ketidakleluasaan untuk tabel `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD CONSTRAINT `tb_matakuliah_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `tb_dosen` (`dosen_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
