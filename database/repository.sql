-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2019 at 05:56 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repository`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `created_by` int(50) DEFAULT NULL,
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_depan` varchar(250) DEFAULT NULL,
  `nama_belakang` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `program_studi` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `link_foto` varchar(120) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

CREATE TABLE `data_member` (
  `id_member` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jenkel` enum('P','L') NOT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=>not_active,1=>active',
  `email` varchar(150) NOT NULL,
  `nomor_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_validator`
--

CREATE TABLE `data_validator` (
  `id_validator` int(50) NOT NULL,
  `nama_validator` varchar(50) NOT NULL,
  `created_by` int(50) DEFAULT NULL,
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_validator`
--

INSERT INTO `data_validator` (`id_validator`, `nama_validator`, `created_by`, `created_time`, `status`) VALUES
(1, 'validator', 1, '2018-12-07 17:26:04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `verification_code` varchar(450) NOT NULL,
  `verification_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_category`
--

CREATE TABLE `file_category` (
  `id_file_category` int(11) NOT NULL,
  `nama_file_category` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=>gk aktif , 1=>aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_category`
--

INSERT INTO `file_category` (`id_file_category`, `nama_file_category`, `created_time`, `created_by`, `updated_time`, `updated_by`, `status`) VALUES
(1, 'Public', '2018-12-13 01:48:57', 3, '2018-12-13 01:48:57', 2, '1'),
(2, 'Protected', '2019-01-04 10:20:40', 3, '2019-01-04 10:20:40', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id_repository` int(11) NOT NULL,
  `id_repository_category` int(11) NOT NULL,
  `id_file_category` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `abstract` text NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1','2','3') NOT NULL COMMENT '0=>in_progress,1=>publish,2=>revision,3=>not_accepted',
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `repository_location` varchar(500) NOT NULL,
  `repository_cover_image` varchar(225) NOT NULL DEFAULT 'assets/img/noimg.jpg',
  `accepted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repository_category`
--

CREATE TABLE `repository_category` (
  `id_repository_category` int(11) NOT NULL,
  `nama_repository_category` varchar(150) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=>gk aktif , 1=>aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `group_id` int(50) NOT NULL,
  `kon_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_time`, `group_id`, `kon_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-12-07 17:11:45', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `group_id` int(11) NOT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_time` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`group_id`, `departemen`, `status`, `created_time`, `updated_time`, `updated_by`) VALUES
(1, 'Admin', '1', '2018-12-06 22:24:13', '0000-00-00 00:00:00', 0),
(2, 'Dosen', '1', '2018-12-06 22:25:19', '0000-00-00 00:00:00', 0),
(3, 'Mahasiswa', '1', '2018-12-06 22:25:41', '0000-00-00 00:00:00', 0),
(4, 'Validator', '1', '2018-12-06 22:25:41', '0000-00-00 00:00:00', 0),
(5, 'Pengunjung', '1', '2018-12-06 22:25:55', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_session_login`
--

CREATE TABLE `users_session_login` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_agents` varchar(250) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `data_validator`
--
ALTER TABLE `data_validator`
  ADD PRIMARY KEY (`id_validator`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`verification_code`);

--
-- Indexes for table `file_category`
--
ALTER TABLE `file_category`
  ADD PRIMARY KEY (`id_file_category`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_repository`);

--
-- Indexes for table `repository_category`
--
ALTER TABLE `repository_category`
  ADD PRIMARY KEY (`id_repository_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `users_session_login`
--
ALTER TABLE `users_session_login`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_member`
--
ALTER TABLE `data_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_validator`
--
ALTER TABLE `data_validator`
  MODIFY `id_validator` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_category`
--
ALTER TABLE `file_category`
  MODIFY `id_file_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id_repository` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repository_category`
--
ALTER TABLE `repository_category`
  MODIFY `id_repository_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_session_login`
--
ALTER TABLE `users_session_login`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
