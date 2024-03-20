-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnote`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaburation`
--

CREATE TABLE `collaburation` (
  `id` int(6) NOT NULL,
  `notesId` int(6) NOT NULL,
  `collaburatorId` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `collaburation`
--

INSERT INTO `collaburation` (`id`, `notesId`, `collaburatorId`) VALUES
(9, 22, 00005),
(10, 22, 00007),
(12, 25, 00006),
(14, 26, 00004);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `owner` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `owner`, `tags`, `description`, `created_date`, `updated_date`) VALUES
(26, 'Tugas', 00012, 'nugas, sekolah', 'owaodaoidaoiwda', '2023-08-18', '2023-08-18'),
(27, 'hariku', 00013, 'fyp', 'namaku pito 16th\r\n', '2023-08-18', '2023-08-18'),
(28, 'anjay', 00014, '123, 123, 123', 'wadwada', '2024-03-20', '2024-03-20'),
(29, 'AWokWAOK', 00014, 'ajg', 'aldoadwdad', '2024-03-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(00004, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921'),
(00006, 'iqbal', '202cb962ac59075b964b07152d234b70'),
(00007, 'zaki', '9784ea3da268563469df99b2e6593564'),
(00011, 'azka', 'cac4ad62a53731fc058f16a244d5a3cb'),
(00012, 'ipul', 'db3fd70d6207f588571a26e91d744baf'),
(00013, 'pito', 'b6b1eb5be785e7858cbb196993fad39a'),
(00014, 'bal', '869613f6b8caef3cd769c023fd87aaf1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaburation`
--
ALTER TABLE `collaburation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaburation`
--
ALTER TABLE `collaburation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
