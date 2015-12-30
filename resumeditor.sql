-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Nov 2015 pada 18.55
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resumeditor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `certification`
--

CREATE TABLE `certification` (
  `id_certification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `publication_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `certification`
--

INSERT INTO `certification` (`id_certification`, `id_user`, `certification`, `institution`, `publication_date`) VALUES
(1, 1, 'Web Design Advanced', 'IT Komputer', '2010-10-26'),
(2, 1, 'Open BTS', 'Kermit Camp', '2011-08-28'),
(3, 1, 'IT Week', 'Himakom UNPAK', '2012-04-07'),
(4, 1, 'Tren Internet Seminar', 'STMIK JAYABAYA & Three Provider', '2012-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

CREATE TABLE `education` (
  `id_education` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `majors` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `gpa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `education`
--

INSERT INTO `education` (`id_education`, `id_user`, `degree`, `institution`, `majors`, `start_date`, `end_date`, `gpa`) VALUES
(3, 1, 'Strata Satu', 'STMIK Jayabaya', 'Sistem Informasi', '2009-08-28', '2013-09-26', '3.13'),
(4, 1, 'SMA', 'SMA PGRI 12', 'IPS', '2006-07-03', '2009-07-06', '6.7'),
(5, 1, 'SLTP', 'SLTP Negeri 65 Jakarta', '-', '2003-07-01', '2006-08-01', '6.17'),
(6, 1, 'SD', 'SD Negeri Kebon Bawang 03 Pagi Jakarta ', '-', '1997-07-01', '2003-08-01', '8.15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `organizational`
--

CREATE TABLE `organizational` (
  `id_organizational` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `organizational_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `responsibility` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organizational`
--

INSERT INTO `organizational` (`id_organizational`, `id_user`, `organizational_name`, `position`, `responsibility`, `start_date`, `end_date`) VALUES
(3, 1, 'Senat Mahasiswa', 'Anggota', 'Melaksanakan Program Kerja yang telah di susun dan diatur bersama sedemikian rupa', '2010-08-01', '2011-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `religion` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `marital_status` enum('single','married','divorced') NOT NULL,
  `nationaly` varchar(50) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `identity_address` text NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `domicile_address` text,
  `domicile_postal_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(100) NOT NULL,
  `join_date` datetime NOT NULL,
  `active` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_number`, `fullname`, `birthplace`, `birthdate`, `religion`, `gender`, `marital_status`, `nationaly`, `height`, `weight`, `identity_address`, `postal_code`, `domicile_address`, `domicile_postal_code`, `phone`, `email`, `password`, `authKey`, `accessToken`, `join_date`, `active`) VALUES
(1, '3172020409910005', 'Tezar Aditya', 'Cirebon', '1991-09-04', 'Islam', 'male', 'single', 'Indonesia', 175, 78, 'Jalan Kebon Bawang XV C No 6 , Kelurahan Kebon Bawang , Kecamatan Tanjung Priok , Jakarta Utara', '14320', 'Jalan Kebon Bawang XV C No 6 , Kelurahan Kebon Bawang , Kecamatan Tanjung Priok , Jakarta Utara', '14320', '081314421461', 'tezaraditya@gmail.com', '3630363034393931', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', '', '2015-11-02 06:28:29', 'y'),
(4, '', 'Jalan Buntu', '', '0000-00-00', '', 'male', 'single', '', 0, 0, '', '', NULL, NULL, '', 'jalanbuntumedia@gmail.com', '3630363034393931', '50769ede613cb93b8300c832af691d80514c4f39', '', '2015-11-26 18:48:09', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `working`
--

CREATE TABLE `working` (
  `id_working` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `salary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `working`
--

INSERT INTO `working` (`id_working`, `id_user`, `company`, `type`, `position`, `description`, `start_date`, `end_date`, `salary`) VALUES
(2, 1, 'PT. Agranet Multicitra Siberkom', 'Online Media', 'Staff Display Ad', 'Order Processing, Upload Banner and , Reporting Advertising', '2013-11-06', '2015-11-07', '3300000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id_certification`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `organizational`
--
ALTER TABLE `organizational`
  ADD PRIMARY KEY (`id_organizational`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_number` (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `working`
--
ALTER TABLE `working`
  ADD PRIMARY KEY (`id_working`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `id_certification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organizational`
--
ALTER TABLE `organizational`
  MODIFY `id_organizational` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `working`
--
ALTER TABLE `working`
  MODIFY `id_working` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `certification`
--
ALTER TABLE `certification`
  ADD CONSTRAINT `certification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `organizational`
--
ALTER TABLE `organizational`
  ADD CONSTRAINT `organizational_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `working`
--
ALTER TABLE `working`
  ADD CONSTRAINT `working_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
