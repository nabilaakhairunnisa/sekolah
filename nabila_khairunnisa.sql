-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2024 pada 09.37
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nabila_khairunnisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('nabila', '652d3266220e0aacb047d3aa6f51f1b0', 'Nabila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nm_guru` varchar(100) NOT NULL,
  `tmp_lahir_guru` varchar(100) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `jkel_guru` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `kd_matpel` varchar(10) DEFAULT NULL,
  `nm_matpel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nm_guru`, `tmp_lahir_guru`, `tgl_lahir_guru`, `jkel_guru`, `alamat`, `telp`, `kd_matpel`, `nm_matpel`) VALUES
('123', 'Perani Rosyani ', 'Bandung', '1988-02-22', 'Perempuan', 'Pamulang', '123569987610', 'IPSPAGI', 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nm_siswa` varchar(100) DEFAULT NULL,
  `kd_matpel` varchar(10) NOT NULL,
  `nm_matpel` varchar(100) DEFAULT NULL,
  `uts_sem_ganjil` decimal(5,2) DEFAULT NULL,
  `uas_sem_ganjil` decimal(5,2) DEFAULT NULL,
  `uts_sem_genap` decimal(5,2) DEFAULT NULL,
  `uas_sem_genap` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nis`, `nm_siswa`, `kd_matpel`, `nm_matpel`, `uts_sem_ganjil`, `uas_sem_ganjil`, `uts_sem_genap`, `uas_sem_genap`) VALUES
('NIL01', '12345', 'Nabila Khairunnisa', 'MTKPAGI', 'Matematika', '80.00', '85.00', '85.00', '80.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jkel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `nm_wali` varchar(100) DEFAULT NULL,
  `kd_kelas` varchar(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nm_siswa`, `tmp_lahir`, `tgl_lahir`, `jkel`, `alamat`, `telp`, `nm_wali`, `kd_kelas`, `username`, `password`) VALUES
('09876', 'Ahmad Zikri', 'Bogor', '2002-01-27', 'Laki-laki', 'Parung', '1235699876', 'Sumi', 'IPS1', 'zikri123', '123'),
('12345', 'Nabila ', 'Bogor', '2002-01-27', 'Perempuan', 'Parung', '1235699876', 'Sumi', 'IPS1', 'nabila', '123'),
('5678', 'Arda', 'Tangerang', '2003-03-16', 'Laki-laki', 'Bugel', '09897867545', 'Mahmud', 'IPA2', 'arda', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `fk_nis` (`nis`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
