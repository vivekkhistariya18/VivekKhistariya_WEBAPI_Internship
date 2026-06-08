-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 04, 2026 at 01:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `qr_records`
--

CREATE TABLE `qr_records` (
  `id` int(11) NOT NULL,
  `record_type` varchar(50) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `qr_token` varchar(100) DEFAULT NULL,
  `qr_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr_records`
--

INSERT INTO `qr_records` (`id`, `record_type`, `record_id`, `qr_token`, `qr_image`, `created_at`) VALUES
(1, 'Student', 101, 'STU101ABC', 'qrcodes/STU101ABC.png', '2026-06-04 06:42:32'),
(2, 'Student', 102, 'STU102DEF', 'qrcodes/STU102DEF.png', '2026-06-04 06:42:32'),
(3, 'Employee', 201, 'EMP201GHI', 'qrcodes/EMP201GHI.png', '2026-06-04 06:42:32'),
(4, 'Employee', 202, 'EMP202JKL', 'qrcodes/EMP202JKL.png', '2026-06-04 06:42:32'),
(5, 'Product', 301, 'PRD301MNO', 'qrcodes/PRD301MNO.png', '2026-06-04 06:42:32'),
(6, 'Product', 302, 'PRD302PQR', 'qrcodes/PRD302PQR.png', '2026-06-04 06:42:32'),
(7, 'Asset', 401, 'AST401STU', 'qrcodes/AST401STU.png', '2026-06-04 06:42:32'),
(8, 'Asset', 402, 'AST402VWX', 'qrcodes/AST402VWX.png', '2026-06-04 06:42:32'),
(9, 'Visitor', 501, 'VIS501YZA', 'qrcodes/VIS501YZA.png', '2026-06-04 06:42:32'),
(10, 'Visitor', 502, 'VIS502BCD', 'qrcodes/VIS502BCD.png', '2026-06-04 06:42:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qr_records`
--
ALTER TABLE `qr_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qr_token` (`qr_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qr_records`
--
ALTER TABLE `qr_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
