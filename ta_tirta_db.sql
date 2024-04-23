-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_tirta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`) VALUES
(1, 'Karimah', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_shopcart` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `id_scare` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `total_buy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_shopcart`, `id_buyer`, `id_scare`, `qty`, `price`, `total_price`, `total_buy`) VALUES
(57, 31, 109, '2', '22000', '44000', ''),
(58, 31, 110, '1', '42000', '42000', ''),
(59, 31, 106, '1', '27000', '27000', ''),
(60, 31, 108, '1', '37000', '37000', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_categories` int(11) NOT NULL,
  `categories` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_categories`, `categories`) VALUES
(64, 'SKINCARE'),
(65, 'MAKEUP'),
(66, 'BODYCARE');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `no_phone` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status_accept` enum('belum di terima','sudah diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_buyer`, `name`, `address`, `no_phone`, `date`, `status_accept`) VALUES
(30, 31, 'Tirta Karimah', 'Halim Perdana Kusuma', '08985346261', '12-03-2024', 'belum di terima');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_buyer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_buyer`, `name`, `username`, `password`) VALUES
(1, 'Tirta', 'tirta', 'tirta123');

-- --------------------------------------------------------

--
-- Table structure for table `scare`
--

CREATE TABLE `scare` (
  `id_scare` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `treatment_type` varchar(100) NOT NULL,
  `skin_type` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stock` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scare`
--

INSERT INTO `scare` (`id_scare`, `id_categories`, `brand`, `image`, `treatment_type`, `skin_type`, `price`, `stock`) VALUES
(106, 64, 'YOU', '20240209100655.png', 'Face', 'Dry Skin', '27000', '8'),
(107, 65, 'Maybelline', '20240209100725.png', 'Lip', 'Dry Skin', '57000', '4'),
(108, 66, 'AVOSKIN', '20240209100800.png', 'Body', 'Dry Skin', '37000', '5'),
(109, 65, 'Moko Moko', '20240312101022.png', 'Lip', 'Oily Skin', '22000', '10'),
(110, 64, 'YOU', '20240312101219.png', 'Face', 'Oily Skin', '42000', '14'),
(111, 66, 'YOU', '20240312101415.png', 'Body', 'Oily Skin', '65000', '9'),
(112, 64, 'Breylee', '20240312101519.png', 'Eye', 'Dry Skin', '52000', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_shopcart`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_buyer`);

--
-- Indexes for table `scare`
--
ALTER TABLE `scare`
  ADD PRIMARY KEY (`id_scare`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_shopcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_buyer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `scare`
--
ALTER TABLE `scare`
  MODIFY `id_scare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
