-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 05:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebill2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `name`, `username`, `email`, `password`, `role`, `status`) VALUES
(59, 'admin', 'admin', 'anoymaity0@gmail.com', '$2y$10$NZqbr1.EmwVtrkOlQSraL.dXDr20pjp7KWkWFUGdTOymhK8FNW27u', '1', 'approved'),
(60, 'apk', 'apk', 'anoymaity0@gmail.com', '$2y$10$gToK.yVxegBhNR9XH2so6OM6CUV/vt1zwVLfEPywD/slEKw/nEDTG', 'Add Admin', 'approved'),
(61, 'Sourjya Banerjee', 'Sourjya', 'banerjeesourjya1@gmail.com', '$2y$10$u4u8awyy4Ivvk91b3SJO7ukutlt0c3MPTxE9dCCb1DeCZ0J/SRlGK', 'Complain', 'approved'),
(62, 'Soumick Roy', 'soumick', 'soumickroy22@gmail.com', '$2y$10$hyZBeHqrQUWOhpOpJessMeRfyGEJ1bH4/6BkHFK0ZkUfP4e6DKvDm', 'User', 'approved'),
(63, 'Anushka Dasgupta', 'anuska', 'anuska21@gmail.com', '$2y$10$wjh43aPniFpP8SUF5etMxeNKGnCYZdF0jnxaOp3p.uYWyY9MezXJm', 'Bill', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `sno` int(25) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `cid` varchar(25) NOT NULL,
  `cname` varchar(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `amount` int(25) NOT NULL,
  `bdate` date NOT NULL,
  `ddate` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `payment_id` varchar(255) NOT NULL,
  `paytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`sno`, `bid`, `cid`, `cname`, `unit`, `amount`, `bdate`, `ddate`, `status`, `payment_id`, `paytime`) VALUES
(70, 'BI01', 'CUS01', 'Anoy Maity', 30, 150, '2023-05-25', '2023-06-07', 'paid', 'pay_LtwXkX9p1UCVyF', '2023-05-25 15:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(20) NOT NULL,
  `conid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `complaint` varchar(400) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `conid`, `name`, `email`, `complaint`, `status`, `cid`) VALUES
(27, 'CUS01', 'Anoy Maity', 'anoymaity0@gmail.com', 'Power Cut', 'approved', 'SID1'),
(28, 'CUS02', 'Soumick Roy', 'soumickroy22@gmail.com', 'shsflhls shsfhsflkh', 'pending', 'SID2'),
(29, 'CUS03', 'Sourjya Banerjee', 'banerjeesourjya1@gmail.com', 'hjdr jjrjrrhy', 'pending', 'SID3'),
(30, 'CUS04', 'Anushka Dasgupta', 'anuska21@gmail.com', 'bssfjhioshf ajsfijiasf', 'pending', 'SID4');

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
  `sno` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `resolution` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resolution`
--

INSERT INTO `resolution` (`sno`, `name`, `email`, `complaint`, `resolution`) VALUES
(7, 'Anoy Maity', 'anoymaity0@gmail.com', 'Power Cut', 'jskflifwlh  jsfhawlefhio');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `connection` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` timestamp(5) NOT NULL DEFAULT current_timestamp(5) ON UPDATE current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `cid`, `cname`, `email`, `phno`, `occupation`, `address`, `city`, `state`, `pincode`, `connection`, `password`, `datetime`) VALUES
(9, 'CUS01', 'Anoy Maity', 'anoymaity0@gmail.com', '9073108721', 'gfgf', '61,Sovabazar Street', 'Kolkata', 'WB', '700005', 'Household', '$2y$10$45VZlSiPGlU8szsrVHMm6e7LsYWuzTwrDGXfUvYUzzLD5.Vg5xqwm', '2023-05-25 15:01:24.00000'),
(10, 'CUS02', 'Soumick Roy', 'soumickroy22@gmail.com', '9073108721', 'fhfrh', 'Thunder House', 'Kolkata', 'WB', '700039', 'Commercial', '$2y$10$zo91jrYwsqlWx772Du3tMup1cuIv8kV3JPHCzotJJ4w.Lv1QI8lrq', '2023-05-25 15:03:14.00000'),
(11, 'CUS03', 'Sourjya Banerjee', 'banerjeesourjya1@gmail.com', '9073108721', 'gdb', 'sikdarbagan', 'Kolkata', 'WB', '700006', 'Household', '$2y$10$MYSKc5vlZUKnH/YMwhwAK.w0eMB.DBUQDH3.uaI2wxdbcGYrYbnt2', '2023-05-25 15:04:19.00000'),
(12, 'CUS04', 'Anushka Dasgupta', 'anuska21@gmail.com', '9073108721', 'hhh', 'Dumdum', 'Kolkata', 'WB', '700113', 'Household', '$2y$10$PPqPoZubeMw5fIaVHSo8Qe6cQUIpF4fTQ.KtGgm7Q9qaCngJ/Eftm', '2023-05-25 15:05:42.00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resolution`
--
ALTER TABLE `resolution`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `sno` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resolution`
--
ALTER TABLE `resolution`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
