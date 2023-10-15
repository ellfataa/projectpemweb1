-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2023 pada 11.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekul_legend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
('ADM1', 'admin', '12345', 'admin@gmail.com'),
('ADM2', 'admin2', '123', 'admin2@gmail.com'),
('GR01', 'Luthfi', 'guru', 'guru@gmail.com'),
('SW01', 'Alif', 'siswa', 'siswa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_akses`
--

CREATE TABLE `admin_akses` (
  `id_admin` char(4) NOT NULL,
  `id_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_akses`
--

INSERT INTO `admin_akses` (`id_admin`, `id_akses`) VALUES
('ADM1', 'guru'),
('ADM1', 'siswa'),
('GR01', 'guru'),
('SW01', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` char(4) NOT NULL,
  `judul_diskusi` varchar(50) NOT NULL,
  `tgl_diskusi` date NOT NULL,
  `id_guru` char(4) NOT NULL,
  `id_siswa` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` char(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `deskripsi_kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `kd_kuis` char(5) NOT NULL,
  `nama_kuis` varchar(50) NOT NULL,
  `tgl_kuis` date NOT NULL,
  `id_guru` char(4) NOT NULL,
  `id_siswa` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_akses`
--

CREATE TABLE `master_akses` (
  `id_akses` varchar(25) NOT NULL,
  `nama_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_akses`
--

INSERT INTO `master_akses` (`id_akses`, `nama_akses`) VALUES
('guru', 'Faizal'),
('siswa', 'Daniel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_pembelajaran`
--

CREATE TABLE `materi_pembelajaran` (
  `kd_materi` char(5) NOT NULL,
  `judul_materi` varchar(50) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `tgl_materi` date NOT NULL,
  `id_guru` char(4) NOT NULL,
  `id_kelas` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` char(4) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_kelas` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indeks untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`kd_kuis`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `materi_pembelajaran`
--
ALTER TABLE `materi_pembelajaran`
  ADD PRIMARY KEY (`kd_materi`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`id_akses`) REFERENCES `master_akses` (`id_akses`);

--
-- Ketidakleluasaan untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `diskusi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `kuis_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `materi_pembelajaran`
--
ALTER TABLE `materi_pembelajaran`
  ADD CONSTRAINT `materi_pembelajaran_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `materi_pembelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
