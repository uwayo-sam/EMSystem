-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2025 at 06:56 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `employee_Id` int NOT NULL,
  `phone` varchar(10) NOT NULL,
  `job_tilte` varchar(255) NOT NULL,
  `date_of_hire` text NOT NULL,
  `salary` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `DOB`, `email`, `branch`, `status`, `employee_Id`, `phone`, `job_tilte`, `date_of_hire`, `salary`) VALUES
(5, 'adeline', '2025-05-21', 'adelicool@gmail.com', 'huye', 'active', 1234567, '0724976283', 'cleaner', '2025-05-07', 200),
(4, 'Uwayo Samuel', '2025-05-20', 'samueluwayo17@gmail.com', 'musanze', 'active', 1234567, '0724976283', 'cleaner', '2025-05-20', 300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','stuff') NOT NULL DEFAULT 'stuff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'samuel', 'samueluwayo17@gmail.com', '$2y$10$g835ghgZAN8W4uus2ynuYeEBz0RLVa7OhasCPfpBab1LTmvhANKUe', 'stuff'),
(3, 'adeline', 'adelicool@gmail.com', '$2y$10$cnSD0Ig39TyiNVXmj5ab5.T8YtmI6dYvBy/RaqL07LHWpXyZYD/iW', 'stuff'),
(4, 'adelcool', 'adelicool@gmail.com', '$2y$10$T/ajpajGJjVNtI1mFaced.AMJbzNEGepTZ5Qb5pN..ut22QCtsFOC', 'stuff'),
(5, 'samuel', 'samueluwayo17@gmail.com', '$2y$10$o4SjjRPyPxICaqwGIilG2usAYYrmzx/sACvdz6nxwyTbXQzwacZ/W', 'stuff'),
(6, 'admin', 'admin@gmail.com', '$2y$10$VRd/HkAwyBA6ERpnBfrWRe3/xfAg2cLOEomGd4zLAe2IKztLz5Myu', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
