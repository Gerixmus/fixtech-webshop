-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 25, 2023 at 01:21 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixtech`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `total` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `description`, `total`, `status`, `date`) VALUES
(53, 5, '{ \"product_id\": \"20\", \"product_name\": \"XGT\", \"quantity\": \"1\" }', 150, 1, '2023-10-18 04:21:09'),
(54, 5, '{ \"product_id\": \"20\", \"product_name\": \"XGT\", \"quantity\": \"1\" }', 150, 1, '2023-10-18 04:21:30'),
(55, 5, '{ \"product_id\": \"18\", \"product_name\": \"3/8\", \"quantity\": \"1\" }', 138, 1, '2023-10-19 07:20:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `manufacturer` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `price`, `manufacturer`, `status`, `photo`) VALUES
(18, '3/8\" Cordless Drill / Driver', 'tools', 138.07, 'MAKITA', 1, '../product_images/makita.jpg'),
(19, 'Rotary hammer', 'tools', 123.00, 'MAKITA', 1, '../product_images/rotary-hammer.jpg'),
(20, '40Vmax XGT X-Lock Angle Grinder with 2x 2.5Ah Batteries and Charger', 'tools', 546.95, 'MAKITA', 1, '../product_images/xgt.jpg'),
(21, 'Drill', 'tools', 223.00, 'DEWALT', 1, '../product_images/dewalt.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `privilege` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` char(10) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `privilege`, `name`, `surname`, `email`, `password`, `phone_no`, `active`) VALUES
(4, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$sfQYZzOERGa9Um/8dRlivezvfNSiZ9A33XK.NVmc48dB.PE1dG1H2', '123456789', 1),
(5, 0, 'kamil', 'tumulec', 'kamil@tumulec.com', '$2y$10$/EY86CPfSEDuFnSJzevHGOmf0zizqQR/4ET3NCwMXjok7G.kjXH9u', NULL, 1),
(6, 0, 'Tony', 'Stark', 'tony@stark.com', '$2y$10$WoVsKwqdeV5RBbmPxrcHrOTJKf9xgfyIITYyJVmaCNXMYZZrn0tb6', '987654321', 1),
(8, 0, 'marcin', 'najman', 'marcin@najman.com', '$2y$10$FBGH9btbOOB1lE2c2DrXouT0svC54LLCF.Yh7M772K9sg1oiLt5Z.', '123456789', 1),
(9, 0, 'ania', 'frania', 'ania@ania.com', '$2y$10$Yy9Xt80UDxEUDVkCx0JfTO56YDO5HGaNgabAQtZhPDxM3u/uLQ2Iu', '', 1),
(10, 0, 'adam', 'adam', 'adam@adam.com', '$2y$10$Top8BGYiBdxZrf2zg0qiHetE0vXlktPaMnK4NB1Z8sp8ONJBJizyq', NULL, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
