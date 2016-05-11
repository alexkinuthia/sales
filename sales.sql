-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 01:57 PM
-- Server version: 5.6.27-log
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
create database sales;
  use sales;

CREATE TABLE `booking` (
  `Booking_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `expirydate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_id`, `product_id`, `User_Id`, `expirydate`, `created_at`, `updated_at`, `prices`) VALUES
(1, 2, 1, '2017-05-11', '2016-05-11 00:15:17', '2016-05-11 09:43:56', 146),
(2, 6, 1, '2017-05-11', '2016-05-11 09:51:19', '2016-05-11 09:51:19', 400);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_10_141537_create_user_table', 1),
('2016_05_10_141607_create_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(275) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(275) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `product_description` varchar(275) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `modifiedby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Form` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobileNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AdminLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Email`, `FName`, `MName`, `LName`, `mobileNo`, `created_at`, `updated_at`, `password`, `AdminLevel`) VALUES
(1, 'kinale93@gmail.com', 'alex', 'kinuthia', 'njuguna', '0708070897', '2016-05-10 15:31:41', '2016-05-10 15:31:41', '$2y$10$CS0GF5W2Zkh4CNSsKvKZWeDecvzhKtS2V9hfTJt2EOqcsiS4dfNSu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`Email`),
  ADD UNIQUE KEY `users_mobileno_unique` (`mobileNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
