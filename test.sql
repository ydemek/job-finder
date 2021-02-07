-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 05:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `definition` varchar(10000) NOT NULL,
  `owner` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `photo`, `position`, `company`, `city`, `definition`, `owner`) VALUES
(1, 'ankuni.png', 'PHP Developer', 'Ankara University', 'Ankara', 'Ankara Üniversitesi, Üniversite Kanunuyla birlikte bu kanunla kurulan ilk üniversite olma unvanını taşır. Ankara Üniversitesi\'nin en eski ve köklü fakülteleri', 'admin'),
(3, 'twitter.jpeg', 'Python Developer', 'Twitter Inc.', 'Kaliforniya', 'Twitter, kullanıcıların 280 karakter ile sınırlandırılmış \"tweet\" (Türkçe cıvıldama) adı verilen gönderiler yazabildiği bir sosyal ağ. Jack Dorsey, Noah Glass', 'test'),
(4, 'twitter.jpeg', 'Frontend Developer', 'Twitter Inc.', 'Kaliforniya', 'Twitter, kullanıcıların 280 karakter ile sınırlandırılmış \"tweet\" (Türkçe cıvıldama) adı verilen gönderiler yazabildiği bir sosyal ağ. Jack Dorsey, Noah Glass', 'test'),
(5, 'facebook-logo.png', 'Human Resources', 'Facebook', 'Kaliforniya', 'Facebook, insanların başka insanlarla iletişim kurmasını ve bilgi alışverişi yapmasını amaçlayan bir sosyal ağ. 4 Şubat 2004 tarihinde Harvard Üniversitesi', 'test'),
(6, 'facebook-logo.png', 'Frontend Developer', 'Facebook', 'Kaliforniya', 'Facebook, insanların başka insanlarla iletişim kurmasını ve bilgi alışverişi yapmasını amaçlayan bir sosyal ağ. 4 Şubat 2004 tarihinde Harvard Üniversitesi', 'admin'),
(7, 'insta.png', 'Python Developer', 'Instagram', 'Kaliforniya', 'Instagram', 'deneme'),
(8, 'insta.png', '23', '23', '23', '23', 'test'),
(9, 'default.png', 'test', 'test', 'test', 'test', 'test'),
(10, 'xd.png', 'Designer', 'Apple', 'New York', 'Artist', 'test'),
(11, 'insta.png', 'Designer', 'Instagram', 'Kaliforniya', 'Product Designer', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234'),
(10, 'user', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
