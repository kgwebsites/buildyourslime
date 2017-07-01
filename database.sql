-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2017 at 08:52 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `buildyourslime`
--

-- --------------------------------------------------------

--
-- Table structure for table `premades`
--

CREATE TABLE `premades` (
  `id` int(10) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `price` varchar(100) NOT NULL DEFAULT '$10'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `premades`
--

INSERT INTO `premades` (`id`, `slug`, `name`, `description`, `image`, `price`) VALUES
(1, 'oh-my-glob', 'Oh My Glob', 'Poke the Lumpy Space Princess', 'http://localhost:8888/assets/images/fluffy-slime.png', '$10'),
(2, 'into-the-deep', 'Into the Deep', '', '/assets/images/fluffy-slime.png', '$10'),
(6, 'cotton-candy', 'Cotton Candy', '', '/assets/images/fluffy-slime.png', '$10'),
(8, 'banana-spice', 'Banana Spice', '', '/assets/images/fluffy-slime.png', '$10'),
(10, 'mint-chocolate-chip', 'Mint Chocolate Chip', '', '/assets/images/fluffy-slime.png', '$10'),
(12, 'sweater-weather', 'Sweater Weather', '', '/assets/images/fluffy-slime.png', '$10'),
(14, 'green-apple', 'Green Apple', '', '/assets/images/fluffy-slime.png', '$10'),
(16, 'mellow-sunset', 'Mellow Sunset', '', '/assets/images/fluffy-slime.png', '$10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'Kyle Goss', 'kyle@kgwebsites.com', 'password', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `premades`
--
ALTER TABLE `premades`
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
-- AUTO_INCREMENT for table `premades`
--
ALTER TABLE `premades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
