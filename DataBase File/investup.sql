-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investup`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `recipient`, `message`, `timestamp`) VALUES
(77, 'founder@gmail.com', 'temp', 'hello', '2023-05-06 21:58:05'),
(78, 'temp', 'founder@gmail.com', 'hello', '2023-05-06 21:58:45'),
(79, 'founder@gmail.com', 'temp', 'this is founder', '2023-05-06 21:58:56'),
(80, 'temp', 'founder@gmail.com', 'this is investor', '2023-05-06 21:59:01'),
(81, 'founder@gmail.com', 'temp', 'ok', '2023-05-06 21:59:03'),
(82, 'temp', 'founder@gmail.com', 'ok', '2023-05-06 21:59:05'),
(83, 'founder@gmail.com', 'temp', 'all done and good', '2023-05-06 21:59:09'),
(84, 'temp', 'founder@gmail.com', 'yes same here', '2023-05-06 21:59:16'),
(85, 'founder@gmail.com', 'temp', 'gn', '2023-05-06 21:59:21'),
(86, 'temp', 'founder@gmail.com', 'ok same to u', '2023-05-06 21:59:29'),
(87, 'founder@gmail.com', 'temp', 'asiodnsdf', '2023-05-06 22:06:01'),
(88, 'founder@gmail.com', 'temp', 'test', '2023-05-06 22:07:04'),
(89, 'founder@gmail.com', 'temp', 'test', '2023-05-06 22:07:04'),
(90, 'founder@gmail.com', 'temp', 'ok', '2023-05-06 22:08:07'),
(91, 'founder@gmail.com', 'temp', 'hello', '2023-05-06 22:14:56'),
(92, 'temp', 'founder@gmail.com', 'helo helo', '2023-05-06 22:15:07'),
(93, 'founder@gmail.com', 'temp', 'hmmm', '2023-05-06 22:15:14'),
(94, 'temp', 'founder@gmail.com', 'ok', '2023-05-06 22:15:32'),
(95, 'founder@gmail.com', 'temp', 'ok', '2023-05-06 22:16:55'),
(96, 'founder@gmail.com', 'temp', 'ok', '2023-05-06 22:17:04'),
(97, 'founder@gmail.com', 'temp', 'ok', '2023-05-06 22:17:29'),
(98, 'temp', 'founder@gmail.com', 'hello from founder', '2023-05-06 22:17:42'),
(99, 'founder@gmail.com', 'temp', 'hello from temp', '2023-05-06 22:17:46'),
(100, 'some', 'founder@gmail.com', 'this is from some', '2023-05-06 22:18:26'),
(101, 'some', 'founder@gmail.com', 'this is from some again', '2023-05-06 22:19:23'),
(102, 'some', 'founder@gmail.com', 'from some', '2023-05-06 22:20:02'),
(103, 'some', 'founder@gmail.com', 'from some again', '2023-05-06 22:21:13'),
(104, 'some', 'founder@gmail.com', 'from some', '2023-05-06 22:21:29'),
(105, 'some', 'founder@gmail.com', 'some againnnnnnnn', '2023-05-06 22:23:40'),
(106, 'founder@gmail.com', 'temp', 'hi from temp', '2023-05-06 22:28:06'),
(107, 'temp', 'founder@gmail.com', 'hi from temp', '2023-05-06 22:28:32'),
(108, 'some', 'founder@gmail.com', 'this is from new some mail', '2023-05-06 22:28:47'),
(109, 'temp', 'founder@gmail.com', 'hello from temp', '2023-05-07 09:44:30'),
(110, 'founder@gmail.com', 'temp', 'hello from founder', '2023-05-07 09:44:37'),
(111, 'founder@gmail.com', 'temp', 'hiiii', '2023-05-07 09:45:00'),
(112, 'founder@gmail.com', 'temp', 'hellooo', '2023-05-07 09:45:03'),
(113, 'some', 'founder@gmail.com', 'hello from some', '2023-05-07 09:45:47'),
(114, 'some', 'founder@gmail.com', 'hello again', '2023-05-07 09:46:07'),
(115, 'founder@gmail.com', 'some', 'hello from foudner', '2023-05-07 09:46:11'),
(116, 'temp', 'founder@gmail.com', 'idnsdf', '2023-05-07 09:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `startup`
--

CREATE TABLE `startup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  -- founded year, documents link, target, min subscription, Valuation Cap, youtube link --
  `founded` varchar(100)  DEFAULT '2020',
  `documents` varchar(255)  DEFAULT 'https://tyke-startup-bucket.s3.ap-south-1.amazonaws.com/PRISTLE%20PRODUCTS%20PRIVATE%20LIMITED/CERTIFICATE%20OF%20INCORPORATION%20-%20Robin%20Chopra.PDF',
  `youtube` varchar(255)  DEFAULT 'https://www.youtube.com/embed/td6PKkkxQC4',
  `target` int(11)  DEFAULT '100000',
   `min_subscription` int(11)  DEFAULT '500',
   `valuation_cap` int(11)  DEFAULT '100000'
)

  
 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `startup`
--

INSERT INTO `startup` (`id`, `name`, `description`, `type`, `image`, `email`) VALUES
(1, 'Topper', 'Some quick example text to build on the card title and make up the bulk of the card content.', 'edtech', 'upload/image/4575d1.jpg', 'founder@gmail.com'),
(2, 'PhonePay', 'Some quick example text to build on the card title and make up the bulk of the card content.', 'fintech', 'upload/image/4575d1.jpg', 'founder@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `type`) VALUES
(1, 'investor@gmail.com', '123', 'Investor'),
(2, 'founder@gmail.com', '123', 'Founder'),
(3, 'admin@gmail.com', '123', 'Founder'),
(4, 'temp', '3d801aa532c1cec3ee82d87a99fdf63f', 'Investor'),
(5, 'founder@gmail.com', '202cb962ac59075b964b07152d234b70', 'Founder'),
(6, 'some', '03d59e663c1af9ac33a9949d1193505a', 'Investor');

-- --------------------------------------------------------

--
-- Table structure for table `user_investment`
--

CREATE TABLE `user_investment` (
  `Id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `startup` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_investment`
--

INSERT INTO `user_investment` (`Id`, `user_email`, `startup`, `amount`) VALUES
(1, 'investor@gmail.com', 'Topper', '500'),
(2, 'investor@gmail.com', 'Topper', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `startup`
--
ALTER TABLE `startup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_investment`
--
ALTER TABLE `user_investment`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `startup`
--
ALTER TABLE `startup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_investment`
--
ALTER TABLE `user_investment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
