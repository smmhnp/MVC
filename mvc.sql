-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 10:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `bady` text NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `user_id`, `category_id`, `title`, `bady`, `CreateDate`) VALUES
(1, 2, 0, 'صفحه خود را بپوشانید.\r\n', 'این یک قالب ساده برای ساخت صفحات اصلی زیبا است.ایجاد شده با کاربر شماره دو . می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.\nاین یک قالب ساده برای ساخت صفحات اصلی زیبا است.ایجاد شده با کاربر شماره دو . می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.\n\n\n', '2025-04-07 10:08:20'),
(2, 3, 0, 'صفحه خود را بپوشانید.\r\n', 'این یک قالب ساده برای ساخت صفحات اصلی زیبا است.ایجاد شده با کاربر شماره سه . می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.\n\n\n', '2025-04-07 10:09:08'),
(3, 1, 0, 'صفحه خود را بپوشانید.\r\n', 'این یک قالب ساده برای ساخت صفحات اصلی زیبا است.ایجاد شده با کاربر شماره یک . می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.\r\n\r\n\r\n', '2025-04-07 10:08:20'),
(4, 1, 0, 'صفحه خود را بپوشانید.\r\n', 'این یک قالب ساده برای ساخت صفحات اصلی زیبا است.ایجاد شده با کاربر شماره یک . می‌توانید این قالب را دانلود کنید، متن را تغییر دهید و یک تصویر زمینه برای شخصی‌سازی آن اضافه کنید.\r\n\r\n\r\n', '2025-04-07 10:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `CreateDate`) VALUES
(1, 'mahdiyar', 'smmhnp@gmail.com', '$2y$10$3X7jm1eARn2bQ761ljmi7.fjsRU7MFaZ13MAlhxQLBfR3eZYYfbBG', '2025-04-06 16:10:29'),
(2, 'ali', 'ali@gmail.com', '$2y$10$l4OBq/ouBFahXzyBU0CW/utMOCCdL/6jz3aTNrEWg3o0MqA5aHyQy', '2025-04-06 20:16:16'),
(3, 'ahmad', 'ahmad@gmail.com', '$2y$10$6NC9v8Edm0/vKUO2QIX/xeFB.UkjAD.uJzP/EzkOFAUXaK/nOJGoy', '2025-04-06 20:31:35'),
(4, 'hasan', 'hasan@gmail.com', '$2y$10$uK13.WxU13NGy3q9PiST0uG1sMwwwhlrMk1y4F1onjozTk/x5uPCW', '2025-04-06 20:35:29'),
(5, 'mahdi', 'mahdi@gmail.com', '$2y$10$TqDwu0qXtd8tD/g2w8Ws8.5EVvbHyN841oR.IaCZPzX6BPoTT12oK', '2025-04-06 21:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
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
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
