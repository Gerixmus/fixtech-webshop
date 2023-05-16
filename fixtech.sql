-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Maj 2023, 13:18
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fixtech`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `description`, `total`, `status`, `date`) VALUES
(1, 4, 'ScotchBlue,quantity=5', 30, 1, '2022-12-28 03:35:23'),
(3, 9, 'Cellfast Economic Garden Hose,quantity=10ScotchBlue,quantity=11drill,quantity=112', 10572, 1, '2022-12-28 03:40:21'),
(4, 4, 'Cellfast Economic Garden Hose,quantity=1ScotchBlue,quantity=1', 15, 1, '2022-12-28 04:07:14'),
(5, 4, 'Cellfast Economic Garden Hose,quantity=12ScotchBlue,quantity=3', 126, 1, '2022-12-28 04:08:03'),
(6, 4, 'Cellfast Economic Garden Hose,quantity=12ScotchBlue,quantity=3', 126, 1, '2022-12-28 04:08:03'),
(7, 4, 'Cellfast Economic Garden Hose,quantity=12ScotchBlue,quantity=3', 126, 1, '2022-12-28 04:10:53'),
(8, 6, 'Cellfast Economic Garden Hose,quantity=1drill,quantity=1', 102, 1, '2022-12-28 04:55:24'),
(9, 4, 'Cellfast Economic Garden Hose,quantity=4', 36, 1, '2023-01-09 10:05:52'),
(10, 4, 'Cellfast Economic Garden Hose,quantity=20ScotchBlue,quantity=16', 276, 1, '2023-01-10 04:29:48'),
(11, 5, 'Cellfast Economic Garden Hose,quantity=5', 45, 1, '2023-01-10 04:33:29'),
(12, 4, 'Cellfast Economic Garden Hose,quantity=3', 27, 1, '2023-01-12 10:56:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `manufacturer` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `price`, `manufacturer`, `status`) VALUES
(1, 'Removed', 'tools', 15, 'STIHL', 0),
(2, 'Cellfast Economic Garden Hose', 'garden', 9, 'Cellfast', 1),
(3, 'ScotchBlue', 'construction', 6, 'ScotchBlue', 1),
(4, 'drill', 'tools', 93, 'MAKITA', 1),
(5, 'screwdriver', 'tools', 15, 'MAKITA', 1),
(6, 'power drill', 'tools', 155, 'STIHL', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `privilege`, `name`, `surname`, `email`, `password`, `phone_no`, `active`) VALUES
(4, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$sfQYZzOERGa9Um/8dRlivezvfNSiZ9A33XK.NVmc48dB.PE1dG1H2', NULL, 1),
(5, 0, 'kamil', 'tumulec', 'kamil@tumulec.com', '$2y$10$4wcm5dZBL4CKHxyIMR0TQ.ghZ3OeIuNljWM2Q1rCy4T4ZFtasv.Xa', NULL, 1),
(6, 0, 'Tony', 'Stark', 'tony@stark.com', '$2y$10$WoVsKwqdeV5RBbmPxrcHrOTJKf9xgfyIITYyJVmaCNXMYZZrn0tb6', '987654321', 1),
(8, 0, 'marcin', 'najman', 'marcin@najman.com', '$2y$10$FBGH9btbOOB1lE2c2DrXouT0svC54LLCF.Yh7M772K9sg1oiLt5Z.', '123456789', 1),
(9, 0, 'ania', 'frania', 'ania@ania.com', '$2y$10$Yy9Xt80UDxEUDVkCx0JfTO56YDO5HGaNgabAQtZhPDxM3u/uLQ2Iu', '', 1);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
