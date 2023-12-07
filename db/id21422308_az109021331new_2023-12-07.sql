-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-07 04:25:53
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `id21422308_az109021331new`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cust`
--

CREATE TABLE `cust` (
  `cust_id` char(10) DEFAULT NULL,
  `cust_name` char(10) DEFAULT NULL,
  `cust_addr` varchar(50) DEFAULT NULL,
  `cust_tel` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `cust`
--

INSERT INTO `cust` (`cust_id`, `cust_name`, `cust_addr`, `cust_tel`) VALUES
('c01', 'cust 01', 'Addr 01', '01-111-1112'),
('c02', 'cust 02', 'Addr 02', '02-222-2222'),
('c03', 'cust 03', 'Addr 03', '03-333-3333'),
('c04', 'cust 04', 'Addr 04', '04-444-4444'),
('c05', 'cust 05', 'Addr 05', '05-555-5555'),
('c06', 'cust', 'addr06', '06-666-6666');

-- --------------------------------------------------------

--
-- 資料表結構 `prod`
--

CREATE TABLE `prod` (
  `prod_id` char(10) DEFAULT NULL,
  `prod_name` char(10) DEFAULT NULL,
  `prod_unit` char(10) DEFAULT NULL,
  `unit_price` int(4) DEFAULT NULL,
  `onhand_qty` decimal(6,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `prod`
--

INSERT INTO `prod` (`prod_id`, `prod_name`, `prod_unit`, `unit_price`, `onhand_qty`) VALUES
('p01', 'prod 0101', 'ea', 100, 10),
('p02', 'prod 02', 'ea', 200, 20),
('p03', 'prod 03', 'ea', 300, 30),
('p04', 'prod 04', 'ea', 400, 40),
('p05', 'prod 05', 'ea', 500, 50),
('p06', 'prod 06', 'ea', 600, 60);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(10) NOT NULL,
  `userpwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userid`, `userpwd`) VALUES
('sam', '12345');

-- --------------------------------------------------------

--
-- 資料表結構 `vend`
--

CREATE TABLE `vend` (
  `vend_id` char(10) DEFAULT NULL,
  `vend_name` char(10) DEFAULT NULL,
  `vend_addr` varchar(50) DEFAULT NULL,
  `vend_tel` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `vend`
--

INSERT INTO `vend` (`vend_id`, `vend_name`, `vend_addr`, `vend_tel`) VALUES
('v01', 'vend 01', 'Addr 01', '01-111-1112'),
('v02', 'vend 02', 'Addr 02', '02-222-2222'),
('v03', 'vend 03', 'Addr 03', '03-333-3333'),
('v04', 'vend 04', 'Addr 04', '04-444-4444'),
('v05', 'vend 05', 'Addr 05', '05-555-5555'),
('v09', 'vend09', 'Addr 09', '09-999-9999');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
