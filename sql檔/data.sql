-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-15 18:07:56
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `nukpost`
--

-- --------------------------------------------------------

--
-- 資料表結構 `data`
--

CREATE TABLE `data` (
  `no` int(11) NOT NULL,
  `unit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trackingnumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectdate` date DEFAULT NULL,
  `collector` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `address` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `data`
--

INSERT INTO `data` (`no`, `unit`, `recipient`, `type`, `sender`, `trackingnumber`, `status`, `collectdate`, `collector`, `note`, `date`, `address`, `size`) VALUES
(21, '學生宿舍二', '陳亭瑄', '信件', '黃千千', '000-0003', '已領取', NULL, '陳亭瑄', '急件', '2022-04-04', '學二宿舍', ''),
(22, '學生宿舍二', '黃曉明', '包裹', '吳大春', '000-0004', '已領取', NULL, '', '', '2022-04-09', '', '100x35'),
(23, '綜合宿舍', '周千芝', '包裹', '郭元菱', '000-0001', '未領取', NULL, '', '輕放包裹', '2022-04-11', '', '30x50'),
(24, '體育室', '吳重真', '包裹', '郁宛真', '000-0002', '未領取', NULL, '', '', '2022-04-13', '', '60x25'),
(26, '圖資資訊館', '威宇', '包裹', '小嫻', '000-0007', '已領取', NULL, '小祈', '', '2022-04-17', '學二宿舍', '60x50'),
(28, '教學發展中心', '黃麗春', '信件', '李嘉合', '000-0005', '未領取', NULL, '', '緊急郵件', '2022-04-21', '', ''),
(29, '學生宿舍二', '陳亭瑄', '信件', '教發中心', '000-0009', '已領取', NULL, '小祈', '', '2022-04-23', '學二宿舍', ''),
(30, '學務處', '李處長', '包裹', '趙佩珊', '000-0010', '未領取', NULL, '', '小心易碎', '2022-04-28', '', '30x50'),
(31, '校長室', '許校長', '信件', '總務處', '000-0011', '未領取', NULL, '', '', '2022-04-30', '', ''),
(32, '學術副校長室', '王副校長', '包裹', '人事室', '000-0012', '已領取', NULL, '小祈', '', '2022-05-02', '學二宿舍', ''),
(33, '行政副校長室', '陳校長', '信件', '李欣潔', '000-0013', '未領取', NULL, '', '', '2022-05-07', '', ''),
(34, '教務處', '柯處長', '包裹', '連逸雅', '000-0014', '未領取', NULL, '', '', '2022-05-12', '', '15x20'),
(35, '研究發展處', '林嘉玲', '信件', '謝文玟', '000-0015', '未領取', NULL, '', '國際包裹', '2022-05-13', '', ''),
(36, '國際事務處', '李郁妹', '包裹', '黃左昌', '000-0016', '未領取', NULL, '', '', '2022-05-14', '', '30x80'),
(37, '主計室', '陳淑娟', '信件', '陳俊廷', '000-0017', '未領取', NULL, '', '', '2022-05-17', '', ''),
(38, '推廣教育中心', '顏湖延', '信件', '高羽強', '000-0018', '未領取', NULL, '', '', '2022-05-19', '', ''),
(39, '人事室', '吳承筠', '信件', '魏怡秀', '000-0019', '未領取', NULL, '', '教務處', '2022-05-24', '', ''),
(40, '環境安全衛生中心', '朱建德', '包裹', '蔡益志', '000-0020', '未領取', NULL, '', '', '2022-05-28', '', '90x60'),
(41, '學務處', '黃睿柏', '信件', '馬淑華', '000-0021', '未領取', NULL, '', '無', '2022-05-29', '', ''),
(42, '教學發展中心', '周志妹', '包裹', '沈人瑞', '000-0022', '未領取', NULL, '', '小心輕放', '2022-05-31', '', '70x45'),
(43, '學生宿舍二', '林世生', '信件', '張文芬', '000-0060', '未領取', NULL, '', '', '2022-05-31', '', ''),
(44, '學生宿舍一', '林怡松', '信件', '孫泓侑', '000-0060', '未領取', NULL, '', '', '2022-05-31', '', ''),
(61, '學生宿舍二', '陳亭瑄', '信件', '林小明', '123-0332', '未領取', NULL, '', '', '2022-06-15', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `data`
--
ALTER TABLE `data`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
