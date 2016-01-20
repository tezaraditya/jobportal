-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2016 at 03:11 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resumeditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `id_career` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary_min` varchar(20) NOT NULL,
  `salary_max` varchar(20) NOT NULL,
  `function` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `requirements` text NOT NULL,
  `responsibilities` text NOT NULL,
  `expired_date` date NOT NULL,
  PRIMARY KEY (`id_career`),
  KEY `position` (`position`,`company`,`location`,`salary_min`,`function`,`level`,`experience`,`education`,`degree`),
  KEY `salary_max` (`salary_max`),
  KEY `email` (`email`),
  KEY `function` (`function`),
  KEY `location` (`location`),
  KEY `company` (`company`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id_career`, `position`, `company`, `email`, `location`, `salary_min`, `salary_max`, `function`, `level`, `experience`, `education`, `degree`, `requirements`, `responsibilities`, `expired_date`) VALUES
(2, 'IT Manager', 'PT. Jalanbuntu Media', 'tezaraditya@gmail.com', 'Jakarta', '5000000', '7000000', 'TI, Web Developer', 'Senior', '3 Years', 'Information System', 'Strata Satu', '- Expert in More Programming Language\r\n- Expert in IT Management \r\n- Expert in More Database System', '- Managing All About IT Developer and Infrastructure', '2015-12-31'),
(3, 'Tenant Officer', 'PT. Angin Ribut', 'jalanbuntumedia@gmail.com', 'Jakarta', '4000000', '5000000', 'Maintenance', 'Senior', '3 Years', 'SMA', 'IPS', '- Jujur\r\n- Interaktif\r\n- Min Pasif Berbahasa Inggris\r\n- Sanggup Bekerja di Bawah Tekanan', '- Management Gedung\r\n- Membangun Relasi dengan Tenant\r\n- Meningkatkan mutu pelayanan gedung\r\n- Meningkatkan Fasilitas Gedung', '2015-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `id_certification` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `publication_date` date NOT NULL,
  PRIMARY KEY (`id_certification`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id_certification`, `id_user`, `certification`, `institution`, `publication_date`) VALUES
(1, 1, 'Web Design Advanced', 'IT Komputer', '2010-10-26'),
(2, 1, 'Open BTS', 'Kermit Camp', '2011-08-28'),
(3, 1, 'IT Week', 'Himakom UNPAK', '2012-04-07'),
(4, 1, 'Tren Internet Seminar', 'STMIK JAYABAYA & Three Provider', '2012-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id_education` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `majors` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `gpa` varchar(11) NOT NULL,
  PRIMARY KEY (`id_education`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id_education`, `id_user`, `degree`, `institution`, `majors`, `start_date`, `end_date`, `gpa`) VALUES
(3, 1, 'Strata Satu', 'STMIK Jayabaya', 'Sistem Informasi', '2009-08-28', '2013-09-26', '3.13'),
(4, 1, 'SMA', 'SMA PGRI 12', 'IPS', '2006-07-03', '2009-07-06', '6.7'),
(5, 1, 'SLTP', 'SLTP Negeri 65 Jakarta', '-', '2003-07-01', '2006-08-01', '6.17'),
(6, 1, 'SD', 'SD Negeri Kebon Bawang 03 Pagi Jakarta ', '-', '1997-07-01', '2003-08-01', '8.15'),
(7, 5, 'Strata Satu', 'Universitas Indonesia', 'Teknik Informatika', '2009-08-17', '2013-09-26', '3.37');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(300) NOT NULL,
  `feedback` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `subject`, `feedback`, `name`, `email`, `phone`) VALUES
(1, 'Belum Bisa Apply', 'Kok Tombol Apply nya gak berfungsi ya ?', 'Adit', 'aditseller@gmail.com', '080989999'),
(2, 'Tombol Apply', '<p>Tombol Apply Belum Bisa</p>', 'Tezar Aditya', 'tezaraditya@gmail.com', '081314421461');

-- --------------------------------------------------------

--
-- Table structure for table `job_function`
--

CREATE TABLE IF NOT EXISTS `job_function` (
  `id_job_function` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(100) NOT NULL,
  PRIMARY KEY (`id_job_function`),
  UNIQUE KEY `function` (`function`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `job_function`
--

INSERT INTO `job_function` (`id_job_function`, `function`) VALUES
(1, 'Administrasi'),
(2, 'Administrasi Export'),
(3, 'Administrasi Import'),
(4, 'Agen Real Estat'),
(5, 'Ahli Ekonomi'),
(6, 'Ahli Geologi'),
(7, 'Ahli Gizi'),
(8, 'Aktuaria'),
(9, 'Akuntan Perpajakan'),
(10, 'Akuntansi, Keuangan'),
(11, 'Apoteker / Farmasi'),
(12, 'Arsitek'),
(13, 'Arsitek Kapal Laut'),
(14, 'Asisten Teknis Kesehatan'),
(15, 'Audit Intern / Pengawasan'),
(16, 'Awak Kapal Laut'),
(17, 'Awak Penerbangan'),
(18, 'Bagian Klaim'),
(19, 'Bagian Umum'),
(20, 'Bidan'),
(21, 'Broker Asuransi'),
(22, 'Broker Saham'),
(23, 'Desainer Grafis Komputer'),
(24, 'Dokter Gigi'),
(25, 'Dokter Hewan'),
(26, 'Dokter Spesialis'),
(27, 'Dokter Umum'),
(28, 'Drilling'),
(29, 'Editor'),
(30, 'Fisikawan'),
(31, 'Fotografer'),
(32, 'Geofisikawan'),
(33, 'Guru / Tutor'),
(34, 'Hubungan Investor'),
(35, 'Hubungan Masyarakat'),
(36, 'Hukum / Korporasi'),
(37, 'Ilmuwan'),
(38, 'Jurnalisme'),
(39, 'Jurnalisme Teknik'),
(40, 'Juru Gambar'),
(41, 'Juru Masak'),
(42, 'Kapten Laut'),
(43, 'Kapten Pilot'),
(44, 'Kepala Sekolah'),
(45, 'Keuangan, Analis'),
(46, 'Kimiawan'),
(47, 'Kolektor'),
(48, 'Komunikasi'),
(49, 'Konsultan'),
(50, 'Kreatif / Desain'),
(51, 'Kredit / Pinjaman'),
(52, 'Kurir'),
(53, 'Laboratorium'),
(54, 'Layanan Pelanggan'),
(55, 'Logistik'),
(56, 'Magang'),
(57, 'Maintenance'),
(58, 'Makanan dan Minuman'),
(59, 'Management Trainee'),
(60, 'Manajemen Keseluruhan'),
(61, 'Manajemen Merk / Produk'),
(62, 'Manajemen Mutu (ISO)'),
(63, 'Manajemen Operasional'),
(64, 'Manajemen Pabrik'),
(65, 'Manajemen Properti'),
(66, 'Manajemen Proyek'),
(67, 'Manajer Portofolio'),
(68, 'Manufaktur dan Produksi'),
(69, 'Merchandiser'),
(70, 'Model Fashion'),
(71, 'Operasi Gudang'),
(72, 'Operasi Hotel'),
(73, 'Operasi Perbankan'),
(74, 'Operasi Restoran'),
(75, 'Operasi Ritel'),
(76, 'Operator'),
(77, 'Pelatih Olahraga'),
(78, 'Pelatih, Pendidik'),
(79, 'Pemandu Wisata'),
(81, 'Pemasaran (Non-Teknis)'),
(82, 'Pemasaran (Teknis)'),
(80, 'Pemasaran Internet'),
(83, 'Pembelian / Purchasing'),
(84, 'Pembuat Pola'),
(85, 'Pemerintahan'),
(86, 'Pemrosesan Data'),
(87, 'Penanggung (asuransi)'),
(88, 'Penerjemah'),
(89, 'Pengembangan Bisnis'),
(90, 'Pengembangan Produk'),
(91, 'Penggajian dan Fasilitas'),
(93, 'Penjualan (Non-Teknis)'),
(94, 'Penjualan (Teknis)'),
(92, 'Penjualan dan Pemasaran'),
(95, 'Penyiar, TV / Radio'),
(96, 'Perawat'),
(97, 'Periklanan / Promosi'),
(98, 'Peternakan'),
(99, 'Procurement'),
(100, 'Pustakawan'),
(101, 'Quality Control (QC)'),
(102, 'Reporter'),
(103, 'Resepsionis'),
(104, 'Responsibilitas Sosial Perusahaan'),
(105, 'Riset'),
(106, 'Satuan Pengamanan'),
(107, 'Sekretaris'),
(108, 'Sekuritas, Trader'),
(109, 'Staf Tiket'),
(110, 'Sumber Daya Manusia'),
(111, 'Supir'),
(112, 'Teknik, Elektro'),
(113, 'Teknik, Jaringan'),
(114, 'Teknik, Keselamatan'),
(115, 'Teknik, Kimia'),
(116, 'Teknik, Komputer'),
(117, 'Teknik, Lainnya'),
(118, 'Teknik, Mesin'),
(119, 'Teknik, Metalurgi'),
(120, 'Teknik, Perangkat Keras'),
(121, 'Teknik, Perangkat Lunak'),
(122, 'Teknik, Perminyakan'),
(123, 'Teknik, Pertanian'),
(124, 'Teknik, Sipil'),
(125, 'Teknik, Telekomunikasi'),
(126, 'Teknik, Umum'),
(127, 'Teknisi'),
(128, 'Telemarketing'),
(129, 'Terapis Kesehatan'),
(130, 'TI, Administrator'),
(132, 'TI, Network Engineer'),
(133, 'TI, Programmer'),
(134, 'TI, Systems Analyst'),
(135, 'TI, Systems Engineer'),
(136, 'TI, Web Developer'),
(137, 'TI, Webmaster'),
(131, 'Tidak disebutkan'),
(138, 'Transportasi');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id_location`),
  UNIQUE KEY `location` (`location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `location`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Banten'),
(4, 'Bengkulu'),
(34, 'Daerah Istimewa Yogyakarta'),
(5, 'Gorontalo'),
(6, 'Jakarta'),
(7, 'Jambi'),
(8, 'Jawa Barat'),
(9, 'Jawa Tengah'),
(10, 'Jawa Timur'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Selatan'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Timur'),
(15, 'Kalimantan Utara'),
(16, 'Kepulauan Bangka Belitung'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `organizational`
--

CREATE TABLE IF NOT EXISTS `organizational` (
  `id_organizational` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `organizational_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `responsibility` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id_organizational`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `organizational`
--

INSERT INTO `organizational` (`id_organizational`, `id_user`, `organizational_name`, `position`, `responsibility`, `start_date`, `end_date`) VALUES
(3, 1, 'Senat Mahasiswa', 'Anggota', 'Melaksanakan Program Kerja yang telah di susun dan diatur bersama sedemikian rupa', '2010-08-01', '2011-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `sendcv`
--

CREATE TABLE IF NOT EXISTS `sendcv` (
  `id_sendcv` int(11) NOT NULL AUTO_INCREMENT,
  `id_career` int(11) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_composite` int(11) NOT NULL,
  PRIMARY KEY (`id_sendcv`),
  UNIQUE KEY `id_unique_send` (`id_composite`),
  KEY `id_career` (`id_career`,`receiver_name`,`receiver_email`,`id_user`),
  KEY `receiver_name` (`receiver_name`),
  KEY `receiver_email` (`receiver_email`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
  `active` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_number` (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `birthplace`, `birthdate`, `religion`, `gender`, `marital_status`, `nationaly`, `height`, `weight`, `identity_address`, `postal_code`, `domicile_address`, `domicile_postal_code`, `phone`, `email`, `password`, `authKey`, `accessToken`, `join_date`, `active`) VALUES
(1, 'Tezar Aditya', 'Cirebon', '1991-09-04', 'Islam', 'male', 'single', 'Indonesia', 175, 78, 'Jalan Kebon Bawang XV C No 6 , Kelurahan Kebon Bawang , Kecamatan Tanjung Priok , Jakarta Utara', '14320', 'Jalan Kebon Bawang XV C No 6 , Kelurahan Kebon Bawang , Kecamatan Tanjung Priok , Jakarta Utara', '14320', '081314421461', 'tezaraditya@gmail.com', '6f6f33346f32', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', '', '2016-01-17 05:56:22', 'y'),
(4, 'Jalan Buntu', 'Jakarta', '0000-00-00', '', 'male', 'single', '', 0, 0, '', '', '', '', '', 'manystick@gmail.com', '6f6f33346f32', 'c99b1d9f948dd097f32afb87cfdf2bbb1cba9ce9', '', '2016-01-15 07:30:16', 'y'),
(5, 'Jalan Buntu', 'Jakarta', '1991-09-04', 'Islam', 'male', 'single', 'Indonesia', 175, 85, 'Jakarta', '14320', 'Jakarta', '14320', '081314421461', 'jalanbuntumedia@gmail.com', '6f6f33346f32', '50769ede613cb93b8300c832af691d80514c4f39', '', '2016-01-20 16:08:15', 'y'),
(6, 'dadadada', '', '0000-00-00', '', 'male', 'single', '', 0, 0, '', '', NULL, NULL, '', 'dadada@sdsd', '64616461646164', '3a6eaf88245895ffc422a421cd47059a8cca3537', '', '2016-01-15 13:22:42', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `working`
--

CREATE TABLE IF NOT EXISTS `working` (
  `id_working` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `salary` varchar(20) NOT NULL,
  PRIMARY KEY (`id_working`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `working`
--

INSERT INTO `working` (`id_working`, `id_user`, `company`, `type`, `position`, `description`, `start_date`, `end_date`, `salary`) VALUES
(2, 1, 'PT. Agranet Multicitra Siberkom', 'Online Media', 'Staff Display Ad', 'Order Processing, Upload Banner and , Reporting Advertising', '2013-11-06', '2015-12-15', '3100000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career`
--
ALTER TABLE `career`
  ADD CONSTRAINT `career_ibfk_1` FOREIGN KEY (`function`) REFERENCES `job_function` (`function`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `career_ibfk_2` FOREIGN KEY (`location`) REFERENCES `location` (`location`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certification`
--
ALTER TABLE `certification`
  ADD CONSTRAINT `certification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `organizational`
--
ALTER TABLE `organizational`
  ADD CONSTRAINT `organizational_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sendcv`
--
ALTER TABLE `sendcv`
  ADD CONSTRAINT `sendcv_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `career` (`id_career`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sendcv_ibfk_2` FOREIGN KEY (`receiver_email`) REFERENCES `career` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sendcv_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sendcv_ibfk_4` FOREIGN KEY (`receiver_name`) REFERENCES `career` (`company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working`
--
ALTER TABLE `working`
  ADD CONSTRAINT `working_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
