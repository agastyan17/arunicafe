-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 12:04 PM
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
-- Table structure for table `tb_history`
--

DROP TABLE IF EXISTS `tb_history`;
CREATE TABLE `tb_history` (
  `id_orders` int(11) NOT NULL,
  `items` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(30) NOT NULL,
  `details` varchar(255) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_orders`, `items`, `price`, `qty`, `total`, `details`, `order_time`) VALUES
(14, 'Matcha Crème Frappuccino®', '52.000', 2, '104.000', 'Grande, Vanilla Sweet Cream, No Whipped Cream', '0000-00-00 00:00:00'),
(15, 'Chocolate Cream Cold Brew', '52.000', 2, '104.000', 'Grande, Light Ice, Extra Cold Foam', '0000-00-00 00:00:00'),
(16, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(17, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(18, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(19, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(20, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(21, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(22, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(23, 'Chocolate Cookie Crumble Crème Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(24, 'Chocolate Cookie Crumble Crème Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(25, 'Mocha Cookie Crumble Frappuccino®', '64.000', 2, '128.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(26, 'Mocha Cookie Crumble Frappuccino®', '64.000', 3, '192.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(27, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(28, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(29, 'Mocha Cookie Crumble Frappuccino®', '64.000', 1, '64.000', 'Tall, Whole Milk, Extra Whipped Cream', '0000-00-00 00:00:00'),
(30, 'Matcha Crème Frappuccino®', '52.000', 1, '52.000', 'Tall, Whole Milk, Extra Whipped Cream', '2023-12-09 11:23:31');

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
(1, 'Chocolate Cookie Crumble Crème Frappuccino', '28.000', 'menu-1.png', 'beverage'),
(2, 'Mocha Cookie Crumble Frappuccino®', '25.000', 'menu-2.png', 'beverage'),
(3, 'Caramel Ribbon Crunch Frappuccino', '23.000', 'menu-3.png', 'beverage'),
(4, 'Matcha Crème Frappuccino®', '18.000', 'menu-4.png', 'beverage'),
(5, 'Chocolate Cream Cold Brew', '23.000', 'menu-5.png', 'coffee'),
(6, 'Strawberry Pancakes', '30.000', 'strawberry-pancake.png', 'dessert'),
(7, 'Chocolate Muffin', '15.000', 'choco-muffin.png', 'dessert'),
(8, 'Cookies!!', '15.000', 'ori-cookies.png', 'dessert'),
(9, 'Brown Sugar Espresso', '20.000', 'brown-sugar-espresso.png', 'coffee'),
(10, 'Coffee Brew', '18.000', 'coffee-brew.png', 'coffee'),
(11, 'Caramel Macchiato', '22.000', 'ice-caramel-macchiato.png', 'coffee'),
(12, 'Stawberry Shortcake', '15.000', 'strawberry-cake.png', 'dessert');

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
  `size` varchar(50) DEFAULT NULL,
  `addins` varchar(50) DEFAULT NULL,
  `toppings` varchar(50) DEFAULT NULL,
  `milk` varchar(50) DEFAULT NULL,
  `warm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
