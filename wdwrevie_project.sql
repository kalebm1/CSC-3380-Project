-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2020 at 08:14 PM
-- Server version: 10.2.31-MariaDB-log-cll-lve
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
-- Database: `wdwrevie_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `hostid` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favs`
--

INSERT INTO `favs` (`id`, `userid`, `hostid`, `created_at`) VALUES
(30, 1, 3, '2020-04-22 17:18:13'),
(27, 1, 1, '2020-04-19 19:38:15'),
(28, 2, 2, '2020-04-19 20:08:38'),
(25, 2, 1, '2020-04-19 16:02:25'),
(29, 1, 2, '2020-04-22 17:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `songid` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `songname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `userid`, `songid`, `url`, `artist`, `songname`) VALUES
(27, 2, '42d5f932-6411-4918-94ef-f734348e61dd', 'https://revibe-media.s3.amazonaws.com/media/audio/songs/d345531a-2aa6-482b-8703-495b6c797dcd/outputs/mp4/medium.mp4', 'dj ro', 'moneymaker.'),
(26, 1, 'a38d3442-ad75-41dd-bdbe-2924574488bb', 'https://revibe-media.s3.amazonaws.com/media/audio/songs/58c4808e-27b6-4c86-a759-e075b4de57a9/outputs/mp4/medium.mp4', 'Tasty', 'THERAPY'),
(28, 3, 'f9730531-b790-48fc-839e-1316aee32b8c', 'https://revibe-media.s3.amazonaws.com/media/audio/songs/a23d1e2f-a1d0-4c44-8dd5-80351cef83fe/outputs/mp4/medium.mp4', 'Ben Reyn', 'Say Whassup'),
(30, 3, '771ef349-07b9-48fb-a5ac-a9f18be513cf', 'https://revibe-media.s3.amazonaws.com/media/audio/songs/4f6cf29a-9ec7-4932-b945-08b139d79cc8/outputs/mp4/medium.mp4', 'njk', 'stay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isHost` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isHost`, `created_at`) VALUES
(1, 'kaleb', '$2y$10$7.IEc7fe/NMi5htRW7uZAuto0IIeBKQRes/o/3H/4SUejIiwdXCqG', NULL, '2020-04-19 11:59:12'),
(2, 'luke', '$2y$10$T/R/l6f6u5fsBbhpdPLSJefIIFmls3aNRUDjZvMKRklOJ6v4XbLna', NULL, '2020-04-19 12:37:55'),
(3, 'Josh', '$2y$10$smOLGpByn6CnoJgssYJ5Q.UDODT7flZ7In6zAQCHMSk1mRsDpFicW', NULL, '2020-04-20 08:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favs`
--
ALTER TABLE `favs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
