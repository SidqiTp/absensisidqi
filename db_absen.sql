-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2019 pada 10.24
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `group_name`) VALUES
(1, 'kelas 1'),
(2, 'kelas 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_room`
--

CREATE TABLE `group_room` (
  `group_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_room`
--

INSERT INTO `group_room` (`group_id`, `ruang_id`, `start`, `end`, `day`) VALUES
(1, 1, '2019-07-12 00:00:00', '2019-07-17 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `nfc` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `start` varchar(40) NOT NULL,
  `end` varchar(40) NOT NULL,
  `meeting` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meeting`
--

INSERT INTO `meeting` (`id`, `start`, `end`, `meeting`, `subject_id`, `room_id`) VALUES
(1, '2019-07-11T14:22', '2019-07-12T14:22', 0, 1, 2),
(2, '222222-02-22T14:22', '222222-02-22T14:22', 0, 1, 1),
(3, '2019-07-12 13:02', '2019-02-22 14:22', 0, 2, 1),
(4, '2019-01-01 13:00', '2019-12-31 12:59', 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id`, `room_name`) VALUES
(1, 'A1'),
(2, 'A2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(250) NOT NULL,
  `class` char(1) NOT NULL,
  `year_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `class`, `year_semester`) VALUES
(2, 'asdss', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(14) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nfc` varchar(10) NOT NULL,
  `type` enum('dosen','mahasiswa','etc','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `nfc`, `type`) VALUES
(1, 'Adminss', 'adminss', 'admin', '', 'dosen'),
(3, 'Nanx Shaw', 'admin', 'ass', '', 'etc'),
(4, 'Nanx Shaw', 'sss', 'sss', '', 'dosen'),
(5, 'asd', 'ss', 'asd', '', 'dosen'),
(6, '23', '123', '123', '', 'dosen'),
(7, 'asd', 'asd', 'asd', '', 'etc'),
(27, '2', 'Rio', 'asd', '2', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(1, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_meeting`
--

CREATE TABLE `user_meeting` (
  `user_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `meeting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_meeting`
--

INSERT INTO `user_meeting` (`user_id`, `start`, `end`, `meeting_id`) VALUES
(1, '2019-07-09 12:00:00', '2019-07-25 13:59:00', 0),
(1, '2019-07-27 11:00:00', '2019-07-13 12:59:00', 1),
(0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(1, '2019-07-18 13:02:00', '2019-07-11 14:02:00', 1),
(1, '2019-07-03 01:03:00', '2019-07-18 15:33:00', 1),
(1, '0002-02-02 14:02:00', '0002-02-02 14:22:00', 2),
(0, '2019-07-12 13:02:00', '2019-02-22 14:22:00', 3),
(0, '2019-07-12 13:02:00', '2019-02-22 14:22:00', 3),
(0, '2019-07-12 13:02:00', '2019-02-22 14:22:00', 3),
(0, '2019-07-12 13:02:00', '2019-02-22 14:22:00', 3),
(1, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4),
(3, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4),
(6, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4),
(0, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4),
(0, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4),
(0, '2019-01-01 13:00:00', '2019-12-31 12:59:00', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_subject`
--

CREATE TABLE `user_subject` (
  `mk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
