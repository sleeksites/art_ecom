-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 11:50 AM
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
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `og_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`timestamp`, `id`, `category`, `og_link`) VALUES
('2019-09-12 09:33:15', 1, 'Sculpture', 'category_images/Sculpture.jpeg'),
('2019-09-12 09:33:46', 2, 'Fine Art', 'category_images/Fine Art.jpeg'),
('2019-09-12 09:36:26', 3, 'Visual Art', 'category_images/Visual Art.jpeg'),
('2019-09-12 09:36:47', 4, 'Decorative Art', 'category_images/Decorative Art.jpeg'),
('2019-09-12 09:37:43', 5, 'Corporate Art', 'category_images/Corporate Art.jpeg'),
('2019-09-12 09:38:10', 6, 'Applied Art', 'category_images/Applied Art.jpeg'),
('2019-09-12 09:38:28', 7, 'Sculpture', 'category_images/Sculpture.jpeg'),
('2019-09-12 09:38:44', 8, 'Art Gallery', 'category_images/Art Gallery.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `image_db`
--

CREATE TABLE `image_db` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `init_quant` int(100) NOT NULL,
  `curr_quant` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `og_link` varchar(100) NOT NULL,
  `compressed_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_db`
--

INSERT INTO `image_db` (`timestamp`, `id`, `seller_name`, `company_name`, `title`, `description`, `price`, `init_quant`, `curr_quant`, `category`, `og_link`, `compressed_link`) VALUES
('2019-09-20 09:31:27', 1, 'Jishant Acharya', 'SleekSites', 'First Product', 'The Description', 5000, 100, 100, ' Fine Art ', 'sell_images/1img.jpeg', 'compressed_data_images/1img.jpeg'),
('2019-09-20 09:42:04', 2, 'Acharya', 'Google', 'Second Product', 'The Description', 1000, 100, 100, ' Sculpture ', 'sell_images/2img.jpeg', 'compressed_data_images/2img.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_line_1` varchar(100) NOT NULL,
  `add_line_2` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `art_id` varchar(100) NOT NULL,
  `quant` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_data`
--

CREATE TABLE `seller_data` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `pincode` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_data`
--

INSERT INTO `seller_data` (`timestamp`, `id`, `seller_name`, `address`, `gender`, `state`, `city`, `birth_date`, `pincode`, `email`, `password`) VALUES
('2019-09-20 05:04:45', 1, 'Sheetal.Acharya', 'C/82 Snowpearls Society near Vasna Jakat naka, Vasna Bhili Road, Vadodara, Gujarat, 390007', 'male', 'GUJARAT', 'VADODARA', '2019-09-11', 390001, 'jishanta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('2019-09-20 08:06:22', 2, 'Sheetal.Acharya', 'C/82 Snowpearls Society near Vasna Jakat naka, Vasna Bhili Road, Vadodara, Gujarat, 390007', 'male', 'GUJARAT', 'VADODARA', '2019-09-04', 390001, 'jishantacharya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_db`
--
ALTER TABLE `image_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_data`
--
ALTER TABLE `seller_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image_db`
--
ALTER TABLE `image_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_data`
--
ALTER TABLE `seller_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
