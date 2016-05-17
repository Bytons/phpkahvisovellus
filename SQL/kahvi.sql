-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 04:35 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a1400150`
--

-- --------------------------------------------------------

--
-- Table structure for table `kahvi`
--

CREATE TABLE `kahvi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nimi` varchar(25) NOT NULL,
  `laji` varchar(25) NOT NULL,
  `kuvaus` varchar(50) NOT NULL,
  `paahtoaste` varchar(25) NOT NULL,
  `tuotantomaa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kahvi`
--

INSERT INTO `kahvi` (`id`, `nimi`, `laji`, `kuvaus`, `paahtoaste`, `tuotantomaa`) VALUES
(1, 'Kultapaahde', 'Arabica', 'Aromikas', 'tumma', 'Kenia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kahvi`
--
ALTER TABLE `kahvi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kahvi`
--
ALTER TABLE `kahvi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
