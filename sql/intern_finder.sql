-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2021 at 07:27 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `CID` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `submitteddate` varchar(30) NOT NULL,
  `updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deleted` int(11) NOT NULL DEFAULT '0',
  `deleteddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `CID`, `name`, `location`, `email`, `password`, `phone`, `submitteddate`, `updated`, `deleted`, `deleteddate`) VALUES
(4, 'KYA7215', 'Kyambogo University', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'owtRBPzv', '0702718025', '2021-06-12', '2021-06-12 16:27:46.682970', 0, ''),
(5, 'MAK4336', 'makerere University', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'D8569vdM', '0702718025', '2021-06-12', '2021-06-12 16:34:35.310888', 0, ''),
(6, 'ISI8392', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'sfredowampz@gmail.com', 'G3vn4MwV', '0702718025', '2021-06-12', '2021-06-12 16:34:51.522957', 0, ''),
(7, 'ISI6959', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'NYKxa0Zz', '0702718025', '2021-06-12', '2021-06-12 16:35:05.849270', 0, ''),
(8, 'ISI1075', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'lecD1wr9', '0702718025', '2021-06-12', '2021-06-12 16:35:07.053990', 0, ''),
(9, 'ISI5466', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', '0htRFnk8', '0702718025', '2021-06-12', '2021-06-12 16:35:08.072640', 1, '2021-06-12'),
(10, 'ISI7647', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', '1QhiZGC8', '0702718025', '2021-06-12', '2021-06-12 16:35:08.772666', 0, ''),
(11, 'ISI5802', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'zbYwXfA2', '0702718025', '2021-06-12', '2021-06-12 16:35:09.603920', 1, '2021-06-12'),
(12, 'ISI7060', 'ISI+SOFT TECHNOLOGIES LIMITED', 'Kampala Ugandaa', 'fredowampz@gmail.com', 'TwpfKP7F', '0702718025', '2021-06-12', '2021-06-12 16:35:11.602025', 1, '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `UID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `submitteddate` varchar(30) NOT NULL,
  `updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deleted` int(11) NOT NULL DEFAULT '0',
  `deleteddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `UID`, `name`, `email`, `location`, `submitteddate`, `updated`, `deleted`, `deleteddate`) VALUES
(3, 'FRE2710', 'Makerere University', 'shop@gmail.com', 'Kampala Ugandaa', '2021-06-12', '2021-06-12 15:51:18.109970', 0, ''),
(4, 'KYA5260', 'Kyambogo University', 'admin@gmail.com', 'Kampala Ugandaa', '2021-06-12', '2021-06-12 16:29:57.185355', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(40) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `email`, `password`, `username`) VALUES
(6, 'N7DMDID4D7', 'admin@gmail.com', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CID` (`CID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminID` (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
