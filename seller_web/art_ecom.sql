-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2019 at 09:28 PM
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
  `og_link` varchar(100) NOT NULL,
  `compressed_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_data`
--

INSERT INTO `seller_data` (`timestamp`, `id`, `seller_name`, `category`, `og_link`, `compressed_link`) VALUES
('2019-09-04 19:25:28', 1, 'Acharya', 'abstract', 'sell_images/1img.jpeg', 'compressed_data_images/1img.jpeg'),
('2019-09-04 19:25:33', 2, 'Acharya', 'abstract', 'sell_images/2img.jpeg', 'compressed_data_images/2img.jpeg'),
('2019-09-04 19:25:41', 3, 'Acharya', 'abstract', 'sell_images/3img.jpeg', 'compressed_data_images/3img.jpeg'),
('2019-09-04 19:25:49', 4, 'Acharya', 'modern', 'sell_images/4img.jpeg', 'compressed_data_images/4img.jpeg'),
('2019-09-04 19:25:55', 5, 'Acharya', 'modern', 'sell_images/5img.jpeg', 'compressed_data_images/5img.jpeg'),
('2019-09-04 19:26:04', 6, 'Acharya', 'modern', 'sell_images/6img.jpeg', 'compressed_data_images/6img.jpeg'),
('2019-09-04 19:26:10', 7, 'Acharya', 'cubism', 'sell_images/7img.jpeg', 'compressed_data_images/7img.jpeg'),
('2019-09-04 19:26:25', 8, 'Acharya', 'cubism', 'sell_images/8img.jpeg', 'compressed_data_images/8img.jpeg'),
('2019-09-04 19:26:32', 9, 'Acharya', 'cubism', 'sell_images/9img.jpeg', 'compressed_data_images/9img.jpeg'),
('2019-09-04 19:26:42', 10, 'Acharya', 'expressionism', 'sell_images/10img.jpeg', 'compressed_data_images/10img.jpeg'),
('2019-09-04 19:26:55', 11, 'Acharya', 'expressionism', 'sell_images/11img.jpeg', 'compressed_data_images/11img.jpeg'),
('2019-09-04 19:27:00', 12, 'Acharya', 'expressionism', 'sell_images/12img.jpeg', 'compressed_data_images/12img.jpeg');

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
