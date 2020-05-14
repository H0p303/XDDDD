-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 03:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `PostTitle` varchar(256) COLLATE utf8_swedish_ci NOT NULL,
  `PostBody` longtext COLLATE utf8_swedish_ci NOT NULL,
  `OwnerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `PostTitle`, `PostBody`, `OwnerID`) VALUES
(4, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ', 2),
(14, 'asd', 'asd', 2),
(15, 'Hello', 'This is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the postThis is the body of the post', 9),
(16, 'asdasdasd', 'asdasdasdasd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `UserPass` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `UserEmail` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `UserRole` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPass`, `UserEmail`, `UserRole`) VALUES
(2, '1234', '$2y$10$qMcoVjRvg0jQIIkkxV6EUO2lbQzte0M/8PeyUmKkudI9t1NWgHbu2', '1234@gmail.com', 'Admin'),
(3, '2345', '$2y$10$crdnwpH5JKdOhDKKfKDzEuWNBNFf0Y1/EgtsKLCeUHq2txTNusiFK', '2345@gmail.com', 'User'),
(4, '3456', '$2y$10$/y32AenKkh/Qn.ToUPcYMOC/eTr429vujIdRfcK7aRMohPcANCy1G', '3456@gmail.com', 'User'),
(5, '4567', '$2y$10$CXqswUnxLSQb370quCTEpuaH8ClBqHzSrxOQ5uLA9/5cTLwVzUPuW', '4567@gmail.com', 'User'),
(8, 'Alex', '$2y$10$RF1UDWxeicKrS8fLZJh2GelOlqDM9rJrJGc2AsVDY1M5brcPQoaIS', 'alexander.ottosson@vmomail.se', 'User'),
(9, 'mother', '$2y$10$b8IJOaoYFAjp/UZ2Tr4TGu9GA7EL5im9skVZlAg4Qr/BU9tKe87Qm', 'mom@gmail.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
