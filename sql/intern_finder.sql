-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 04:32 PM
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
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `appID` varchar(30) NOT NULL,
  `postID` varchar(30) NOT NULL,
  `S_name` varchar(100) NOT NULL,
  `S_email` varchar(100) NOT NULL,
  `S_address` varchar(100) NOT NULL,
  `S_phone` varchar(15) NOT NULL,
  `S_university` varchar(20) NOT NULL,
  `submitteddate` varchar(30) NOT NULL,
  `updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `appID`, `postID`, `S_name`, `S_email`, `S_address`, `S_phone`, `S_university`, `submitteddate`, `updated`) VALUES
(1, 'JGHJ8766', 'KYA4221', 'Fredrick Wampamba', 'fredowampz@gmail.com', 'kyanja Village', '0702718025', 'KYA5260', '2021-06-13', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `app_docs`
--

CREATE TABLE `app_docs` (
  `id` int(11) NOT NULL,
  `appID` varchar(30) NOT NULL,
  `doc_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_docs`
--

INSERT INTO `app_docs` (`id`, `appID`, `doc_link`) VALUES
(1, 'JGHJ8766', 'http://www.kmsauto.info/file/KMSAuto-Net.zip'),
(2, 'JGHJ8766', 'http://www.kmsauto.info/file/KMSAuto-Net.zip'),
(3, 'JGHJ8766', 'http://www.kmsauto.info/file/KMSAuto-Net.zip');

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
  `logo` text NOT NULL,
  `submitteddate` varchar(30) NOT NULL,
  `updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deleted` int(11) NOT NULL DEFAULT '0',
  `deleteddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `CID`, `name`, `location`, `email`, `password`, `phone`, `logo`, `submitteddate`, `updated`, `deleted`, `deleteddate`) VALUES
(4, 'KYA7215', 'Kyambogo University', 'Kampala Ugandas', 'fredowampz@gmail.com', '6ZCWvo2j', '0702718025', 'logos/e1e1d3d40573127e9ee0480caf1283d6.jpg', '2021-06-12', '2021-06-12 16:27:46.682970', 0, ''),
(14, 'KYA7213', 'Kyambogo University', 'Kampala Ugandas', 'adminfredowampz@gmail.com', '6ZCWvo2j', '0702718025', 'logos/e1e1d3d40573127e9ee0480caf1283d6.jpg', '2021-06-12', '2021-06-12 16:27:46.682970', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postID` varchar(30) NOT NULL,
  `name` varchar(300) NOT NULL,
  `CID` varchar(30) NOT NULL,
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `applied` int(11) NOT NULL,
  `ac_years` varchar(50) NOT NULL,
  `docs` varchar(300) NOT NULL,
  `applicants` int(11) NOT NULL,
  `intern_type` varchar(50) NOT NULL,
  `certification` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `submitteddate` varchar(30) NOT NULL,
  `updated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deleted` varchar(5) NOT NULL,
  `deleteddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postID`, `name`, `CID`, `start`, `end`, `applied`, `ac_years`, `docs`, `applicants`, `intern_type`, `certification`, `description`, `submitteddate`, `updated`, `deleted`, `deleteddate`) VALUES
(3, 'KYA4569', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:40:45.246376', '1', '2021-06-12'),
(4, 'KYA9056', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:02.428110', '1', '2021-06-12'),
(5, 'KYA1363', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:03.192008', '1', '2021-06-12'),
(6, 'KYA7963', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:03.975588', '', ''),
(7, 'KYA5691', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:06.414852', '', ''),
(8, 'KYA4221', 'Internship as Web Developer', 'KYA7215', '2021-06-13', '2021-07-09', 0, 'Any', 'UACE,Previous perfomance / results', 40, 'Pay to intern', 'Yes', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:07.339512', '', ''),
(9, 'KYA3077', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:08.153471', '', ''),
(10, 'KYA8367', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:08.915346', '', ''),
(11, 'KYA9499', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:09.736239', '', ''),
(12, 'KYA8193', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:10.483462', '', ''),
(13, 'KYA4309', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:11.275658', '', ''),
(14, 'KYA1401', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:12.005671', '', ''),
(15, 'KYA8127', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:12.807136', '', ''),
(16, 'KYA5028', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:13.442702', '', ''),
(17, 'KYA7590', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:14.140098', '', ''),
(18, 'KYA4423', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:14.876655', '', ''),
(19, 'KYA8279', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:15.620046', '', ''),
(20, 'KYA9018', 'Kyambogo University', 'KYA7215', '2021-06-12', '2021-07-09', 0, 'Year II or greater', 'UCE,UACE,Circulum Vitae', 16, 'Free', 'No', 'Earth, our home planet, is a world unlike any other. The third planet from the sun, Earth is the only place in the known universe confirmed to host life. With a radius of 3,959 miles, Earth is the fifth largest planet in our solar system, and it\'s the only one known for sure to have liquid water on its surface.', '2021-06-12', '2021-06-12 18:41:16.820411', '', '');

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
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appID` (`appID`);

--
-- Indexes for table `app_docs`
--
ALTER TABLE `app_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CID` (`CID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postID` (`postID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UID` (`UID`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_docs`
--
ALTER TABLE `app_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
