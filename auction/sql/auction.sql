-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-22 17:35:12
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `auction`
--

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cardid` int(10) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cardurl` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cardid`, `name`, `cardurl`) VALUES
(1, '式神‧善鬼童', 'img/1.jpg'),
(2, '奈亞拉托提普', 'img/2.jpg'),
(3, '撕星怒嘯者 拜亞基', 'img/3.jpg'),
(4, '天空之神 舒', 'img/4.jpg'),
(5, '伊奇多', 'img/5.jpg'),
(6, '國防布', 'img/6.jpg'),
(7, '永生之伊登', 'img/7.jpg'),
(8, '皮卡丘', 'img/8.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `cardbag`
--

CREATE TABLE `cardbag` (
  `playerid` int(255) NOT NULL,
  `cardid` int(11) NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 資料表的匯出資料 `cardbag`
--

INSERT INTO `cardbag` (`playerid`, `cardid`, `count`) VALUES
(4, 1, 5),
(5, 1, 0),
(1, 2, 9998),
(1, 3, 9999),
(1, 4, 9999),
(1, 1, 9999),
(19, 1, 0),
(19, 2, 0),
(19, 3, 0),
(19, 4, 0),
(19, 5, 0),
(19, 6, 0),
(19, 7, 0),
(19, 8, 0),
(20, 1, 0),
(20, 2, 0),
(20, 3, 0),
(20, 4, 0),
(20, 5, 0),
(20, 6, 0),
(20, 7, 0),
(20, 8, 0),
(21, 1, 62),
(21, 2, 61),
(21, 3, 73),
(21, 4, 64),
(21, 5, 65),
(21, 6, 54),
(21, 7, 59),
(21, 8, 60),
(1, 5, 9999),
(1, 6, 9999),
(1, 7, 9999),
(1, 8, 9999),
(22, 1, 1),
(22, 2, 0),
(22, 3, 0),
(22, 4, 0),
(22, 5, 0),
(22, 6, 0),
(22, 7, 0),
(22, 8, 0),
(23, 1, 0),
(23, 2, 0),
(23, 3, 0),
(23, 4, 0),
(23, 5, 0),
(23, 6, 0),
(23, 7, 0),
(23, 8, 0),
(25, 1, 0),
(25, 2, 0),
(25, 3, 0),
(25, 4, 0),
(25, 5, 0),
(25, 6, 0),
(25, 7, 0),
(25, 8, 0),
(26, 1, 0),
(26, 2, 0),
(26, 3, 0),
(26, 4, 0),
(26, 5, 0),
(26, 6, 0),
(26, 7, 0),
(26, 8, 0),
(38, 1, 0),
(38, 2, 0),
(38, 3, 0),
(38, 4, 0),
(38, 5, 0),
(38, 6, 0),
(38, 7, 0),
(38, 8, 0),
(39, 1, 0),
(39, 2, 0),
(39, 3, 0),
(39, 4, 0),
(39, 5, 0),
(39, 6, 0),
(39, 7, 0),
(39, 8, 0),
(50, 1, 0),
(50, 2, 0),
(50, 3, 0),
(50, 4, 0),
(50, 5, 0),
(50, 6, 0),
(50, 7, 0),
(50, 8, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `packagetime`
--

CREATE TABLE `packagetime` (
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `packagetime`
--

INSERT INTO `packagetime` (`time`) VALUES
('2016-12-23 00:26:37');

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `playerid` int(255) NOT NULL,
  `account` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `money` bigint(255) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`playerid`, `account`, `pwd`, `money`) VALUES
(1, 'creator', 'root', 4880),
(5, 'computer', 'root', 1030),
(20, 'new', '1', 1000),
(21, 'com', 'root', 15855),
(22, 'test', 'root', 7000),
(23, 'Hello', 'root', 1000),
(25, 'test2', 'root', 1000),
(26, 'test3', 'root', 1000),
(38, '3123', '3', 1000),
(39, 'w', 'e', 1000),
(50, 'test4', 'root', 1000);

--
-- 觸發器 `player`
--
DELIMITER $$
CREATE TRIGGER `trigger_initial_cardbag` AFTER INSERT ON `player` FOR EACH ROW BEGIN
	declare x int ;
   set x = 1 ;
   while x < 9 do
     	insert into cardbag(cardid, playerid, count) values (x, NEW.playerID, 0);
     	set x=x+1;
    end while ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `productid` int(25) NOT NULL,
  `cardid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sellerid` int(255) NOT NULL,
  `count` int(255) NOT NULL,
  `reserve_price` int(255) NOT NULL,
  `current_price` int(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `buyerid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`productid`, `cardid`, `sellerid`, `count`, `reserve_price`, `current_price`, `deadline`, `buyerid`) VALUES
(55, '1', 21, 1, 1, 11, '2016-12-26 00:14:20', 21),
(56, '8', 21, 1, 1, 1, '2016-12-24 00:17:24', NULL),
(57, '5', 21, 1, 1, 1, '2016-12-27 00:17:32', NULL),
(58, '1', 21, 1, 1, 1, '2016-12-27 00:17:40', NULL),
(59, '6', 21, 1, 1, 1, '2016-12-28 00:17:47', NULL),
(60, '7', 21, 1, 1, 1, '2016-12-24 00:19:41', NULL),
(61, '6', 21, 1, 1, 1, '2016-12-28 00:20:35', NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardid`),
  ADD UNIQUE KEY `cardid` (`cardid`),
  ADD KEY `cardid_2` (`cardid`);

--
-- 資料表索引 `cardbag`
--
ALTER TABLE `cardbag`
  ADD KEY `playerid` (`playerid`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerid`),
  ADD UNIQUE KEY `account` (`account`),
  ADD KEY `playeruid` (`playerid`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `playerid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
