-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-22 17:31:02
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
-- 資料庫： `activitydb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `organizer` varchar(255) NOT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL,
  `register_deadline` datetime NOT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `category` tinyint(1) NOT NULL,
  `participants` int(11) DEFAULT NULL,
  `year` varchar(3) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `additional_info` varchar(300) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `activity`
--

INSERT INTO `activity` (`activity_id`, `name`, `start_date_time`, `end_date_time`, `location`, `description`, `organizer`, `capacity`, `register_deadline`, `cost`, `status`, `category`, `participants`, `year`, `semester`, `additional_info`, `hours`) VALUES
(1, '測試活動1', '2023-12-21 10:02:10', '2023-12-22 17:02:11', '嘉義大學蘭潭校區理工大樓403教室', '這是一個測試用的活動。\r\n第二行\r\n第三行\r\n...\r\n...', '我、111、222、333\r\n主辦人員11、主辦人員22', 100, '2023-12-22 17:02:11', '第i人繳交i*100元', NULL, 0, 0, NULL, NULL, NULL, NULL),
(2, '測試活動2', '2023-12-21 10:04:58', '2023-12-23 17:05:00', '測試地點2', '測試描述111', '測試人員111', 100, '2023-12-21 10:04:58', '0', NULL, 0, 0, NULL, NULL, NULL, NULL),
(3, '測試活動3', '2023-12-21 14:26:21', '2023-12-26 21:26:23', '123132131\r\n132132123165465', '848461313134\r\n152416546103210\r\n165132\r\n1534651\r\n32103241', '1000000211685646', 2, '2023-12-21 14:26:21', '41565613212315\r\n32103241', NULL, 0, 0, NULL, NULL, NULL, NULL),
(4, '微學程測試111', '2023-12-21 00:12:30', '2023-12-27 00:12:30', '嘉義大學123', '1111111111111\r\n22222222222\r\n33333333333333\r\n444444444444444\r\n5555555555555', '88887878\r\n8787787778\r\n878', 2, '2023-12-23 00:12:30', '1000000000000000000000000000$', NULL, 1, 0, '000', 1, '87', 9),
(5, '微學程測試111', '2023-12-22 00:16:20', '2023-12-27 00:16:20', '嘉義大學123\r\n45677777777777\r\n789777777777777\r\n4567777777777777777777777777777777777777\r\n1237777777777777', '8888888888888888877777777777777777777777777777\r\n888888888888888888888888877777777777777777777\r\n8787\r\n123', '888999', 2, '2023-12-23 00:16:20', '100000000000000000000000$', NULL, 1, 0, '112', 1, '0.0', 9),
(6, '微學程測試111', '2023-12-22 00:18:17', '2023-12-27 00:18:17', '111111111111111\r\n2\r\n23\r\n23\r\n23\r\n2\r\n2\r\n', '4649856546\r\n4545646456432\r\n1212313\r\n', '111111111\r\n222222222222222\r\n33333333333333', 2, '2023-12-24 00:18:17', '4684646464646846464$', NULL, 1, NULL, '112', 1, '88', 9);

-- --------------------------------------------------------

--
-- 資料表結構 `blacklist`
--

CREATE TABLE `blacklist` (
  `id` varchar(30) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `notification`
--

CREATE TABLE `notification` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `registration`
--

CREATE TABLE `registration` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `sign_in`
--

CREATE TABLE `sign_in` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `sign_in_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `user_type` tinyint(1) DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `email`, `name`, `department`, `phone_number`, `user_type`, `password`) VALUES
('1102963', '2963@mail.com', '2963', 'cs', '0909', 0, '123456'),
('admin', 'admin@g.ncyu.edu.tw', 'admin_01', 'csie', '09xxxxxxxx', 1, '123456');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- 資料表索引 `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `notification`
--
ALTER TABLE `notification`
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `registration`
--
ALTER TABLE `registration`
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `sign_in`
--
ALTER TABLE `sign_in`
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON UPDATE NO ACTION;

--
-- 資料表的限制式 `sign_in`
--
ALTER TABLE `sign_in`
  ADD CONSTRAINT `sign_in_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
