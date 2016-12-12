-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-12 11:47:01
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
  `cardid` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cardurl` binary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `cardbag`
--

CREATE TABLE `cardbag` (
  `playerid` int(255) NOT NULL,
  `cardid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 資料表的匯出資料 `cardbag`
--

INSERT INTO `cardbag` (`playerid`, `cardid`, `count`) VALUES
(4, '1', 5),
(5, '1', 0),
(1, '2', 0),
(1, '3', 10),
(1, '4', 14),
(1, '1', 0),
(19, '1', 0),
(19, '2', 0),
(19, '3', 0),
(19, '4', 0),
(19, '5', 0),
(19, '6', 0),
(19, '7', 0),
(19, '8', 0),
(20, '1', 0),
(20, '2', 0),
(20, '3', 0),
(20, '4', 0),
(20, '5', 0),
(20, '6', 0),
(20, '7', 0),
(20, '8', 0),
(21, '1', 0),
(21, '2', 5),
(21, '3', 0),
(21, '4', 0),
(21, '5', 0),
(21, '6', 0),
(21, '7', 0),
(21, '8', 0);

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
(1, 'random', 'root', 880),
(5, 'computer', 'root', 1000),
(20, 'new', '1', 1000),
(21, 'com', 'root', 3450);

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
(3, '3', 21, 4, 50, 100, '2016-12-13 00:00:00', 5),
(8, '1', 5, 1, 100, 130, '2016-12-12 19:00:00', 21);

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
  MODIFY `playerid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
