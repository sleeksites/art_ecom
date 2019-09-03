-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 09:13 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `seller_data`
--

CREATE TABLE `seller_data` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo_links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_data`
--

INSERT INTO `seller_data` (`timestamp`, `id`, `seller_name`, `category`, `photo_links`) VALUES
('2019-09-03 06:45:01', 1, 'Jishant', 'abstract', 'sell_images/1img.jpg'),
('2019-09-03 06:45:17', 2, 'Jishant', 'abstract', 'sell_images/2img.jpg'),
('2019-09-03 06:45:24', 3, 'Jishant', 'abstract', 'sell_images/3img.jpg'),
('2019-09-03 06:48:22', 4, 'Jishant', 'modern', 'sell_images/4img.jpg'),
('2019-09-03 06:48:27', 5, 'Jishant', 'modern', 'sell_images/5img.jpg'),
('2019-09-03 06:48:33', 6, 'Jishant', 'modern', 'sell_images/6img.jpg'),
('2019-09-03 06:48:44', 7, 'Jishant', 'cubism', 'sell_images/7img.jpg'),
('2019-09-03 06:48:57', 8, 'Jishant', 'cubism', 'sell_images/8img.jpg'),
('2019-09-03 06:49:05', 9, 'Jishant', 'cubism', 'sell_images/9img.jpg'),
('2019-09-03 06:49:12', 10, 'Jishant', 'expressionism', 'sell_images/10img.jpg'),
('2019-09-03 06:49:22', 11, 'Jishant', 'expressionism', 'sell_images/11img.jpg'),
('2019-09-03 06:49:27', 12, 'Jishant', 'expressionism', 'sell_images/12img.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller_data`
--
ALTER TABLE `seller_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seller_data`
--
ALTER TABLE `seller_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
