-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 04:26 PM
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
-- Database: `db_arunicafe`
--
CREATE DATABASE IF NOT EXISTS `db_arunicafe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_arunicafe`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `type` enum('beverage','dessert','coffee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `item`, `price`, `image`, `type`) VALUES
(1, 'Chocolate Cookie Crumble Crème Frappuccino®', '64.000', 'menu-1.png', 'beverage'),
(2, 'Mocha Cookie Crumble Frappuccino®', '64.000', 'menu-2.png', 'beverage'),
(3, 'Caramel Ribbon Crunch Frappuccino', '64.000', 'menu-3.png', 'beverage'),
(4, 'Matcha Crème Frappuccino®', '52.000', 'menu-4.png', 'beverage'),
(5, 'Chocolate Cream Cold Brew', '52.000', 'menu-5.png', 'coffee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
CREATE TABLE `tb_orders` (
  `id_orders` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(30) NOT NULL,
  `discount` varchar(20) NOT NULL DEFAULT '0',
  `details` varchar(255) NOT NULL,
  `type` enum('beverage','dessert','coffee') NOT NULL,
  `image` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `addins` varchar(50) NOT NULL,
  `toppings` varchar(50) NOT NULL,
  `milk` varchar(50) NOT NULL,
  `warm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`id_orders`, `item`, `price`, `qty`, `total`, `discount`, `details`, `type`, `image`, `size`, `addins`, `toppings`, `milk`, `warm`) VALUES
(11, 'Matcha Crème Frappuccino®', '52.000', 2, '52.000', '', 'Grande, Nonfat Milk, Light Whipped Cream', 'beverage', '', 'Grande', '', 'Light Whipped Cream', 'Nonfat Milk', ''),
(12, 'Chocolate Cream Cold Brew', '52.000', 1, '52.000', '', 'Tall, No Ice, Light Cold Foam', 'coffee', '', '', '', '', '', ''),
(13, 'Chocolate Cookie Crumble Crème Frappuccino®', '64.000', 1, '64.000', '', 'Venti, Almond, Light Whipped Cream', 'beverage', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
