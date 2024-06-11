-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-06-11 17:11:49
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web03-3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` tinyint(1) NOT NULL,
  `length` int(5) NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `rank` int(5) NOT NULL,
  `sh` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '院線片01', 1, 120, '2023-06-12', '發行商01', '導演01', '03B01v.mp4', '03B01.png', '院線片01簡介', 1, 1),
(2, '院線片02', 2, 120, '2023-06-12', '發行商02', '導演02', '03B02v.mp4', '03B02.png', '院線片02簡介', 2, 1),
(3, '院線片03', 3, 120, '2023-06-12', '發行商03', '導演03', '03B03v.mp4', '03B03.png', '院線片03簡介', 3, 1),
(4, '院線片04', 4, 120, '2023-06-12', '發行商04', '導演04', '03B04v.mp4', '03B04.png', '院線片04簡介', 4, 1),
(5, '院線片05', 1, 120, '2023-06-12', '發行商05', '導演05', '03B05v.mp4', '03B05.png', '院線片05簡介', 5, 1),
(6, '院線片06', 2, 120, '2023-06-12', '發行商06', '導演06', '03B06v.mp4', '03B06.png', '院線片06簡介', 6, 1),
(7, '院線片07', 3, 120, '2023-06-12', '發行商07', '導演07', '03B07v.mp4', '03B07.png', '院線片07簡介', 7, 1),
(8, '院線片08', 4, 120, '2023-06-12', '發行商08', '導演08', '03B08v.mp4', '03B08.png', '院線片08簡介', 8, 1),
(9, '院線片09', 1, 120, '2023-06-12', '發行商09', '導演09', '03B09v.mp4', '03B09.png', '院線片09簡介', 9, 1),
(10, '院線片10', 2, 120, '2023-06-12', '發行商10', '導演10', '03B10v.mp4', '03B10.png', '院線片10簡介', 10, 1),
(11, '院線片11', 3, 120, '2023-06-12', '發行商11', '導演11', '03B11v.mp4', '03B11.png', '院線片11簡介', 11, 1),
(12, '院線片12', 4, 120, '2023-06-12', '發行商12', '導演12', '03B12v.mp4', '03B12.png', '院線片12簡介', 12, 1),
(13, '院線片13', 1, 120, '2023-06-12', '發行商13', '導演13', '03B13v.mp4', '03B13.png', '院線片13簡介', 13, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(1) NOT NULL,
  `seat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) VALUES
(1, '202406120000', '院線片00', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:0;i:1;i:1;}'),
(2, '202406120001', '院線片01', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:2;i:1;i:3;}'),
(3, '202406120002', '院線片02', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:4;i:1;i:5;}'),
(4, '202406120003', '院線片03', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:6;i:1;i:7;}'),
(5, '202406120004', '院線片04', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:8;i:1;i:9;}'),
(6, '202406120005', '院線片05', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:10;i:1;i:11;}'),
(7, '202406120006', '院線片06', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:12;i:1;i:13;}'),
(8, '202406120007', '院線片07', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:14;i:1;i:15;}'),
(9, '202406120008', '院線片08', '2024-06-12', '14:00~16:00', 2, 'a:2:{i:0;i:16;i:1;i:17;}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) NOT NULL DEFAULT 1,
  `rank` int(5) NOT NULL,
  `ani` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片01', '03A01.jpg', 1, 1, 1),
(2, '預告片02', '03A02.jpg', 1, 2, 2),
(3, '預告片03', '03A03.jpg', 1, 3, 3),
(4, '預告片04', '03A04.jpg', 1, 4, 1),
(5, '預告片05', '03A05.jpg', 1, 5, 2),
(6, '預告片06', '03A06.jpg', 1, 6, 3),
(7, '預告片07', '03A07.jpg', 1, 7, 1),
(8, '預告片08', '03A08.jpg', 1, 8, 2),
(9, '預告片09', '03A09.jpg', 1, 9, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
