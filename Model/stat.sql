-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 11:22:29
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `stat`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `CID` int(9) NOT NULL,
  `CName` varchar(200) NOT NULL,
  `PID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`CID`, `CName`, `PID`) VALUES
(1, 'calculus', 9),
(2, 'linear algebra', 1),
(3, 'program design', 6),
(4, 'statistics', 8),
(5, 'regression', 2),
(6, 'machine learning', 4),
(7, 'discrete math', 7),
(8, 'computer network', 5),
(9, 'algorithms', 10),
(10, 'computer vision', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `grouping`
--

CREATE TABLE `grouping` (
  `GID` int(9) NOT NULL,
  `GNo` int(2) NOT NULL DEFAULT 0,
  `PID` int(3) NOT NULL,
  `SID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `grouping`
--

INSERT INTO `grouping` (`GID`, `GNo`, `PID`, `SID`) VALUES
(1, 9, 7, 'Z17893456'),
(2, 9, 7, 'F75931486'),
(3, 9, 7, 'E43697512'),
(4, 6, 5, 'D45621798'),
(5, 6, 5, 'Q86413075'),
(6, 6, 2, 'K56781246'),
(7, 6, 2, 'G78963154'),
(8, 3, 9, 'F10023479'),
(9, 3, 9, 'Q78532125'),
(10, 3, 9, 'R75911423');

-- --------------------------------------------------------

--
-- 資料表結構 `interview`
--

CREATE TABLE `interview` (
  `IID` int(9) NOT NULL,
  `INo` int(5) NOT NULL,
  `SID` varchar(9) NOT NULL,
  `ITime` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `interview`
--

INSERT INTO `interview` (`IID`, `INo`, `SID`, `ITime`) VALUES
(1, 1, 'Z17893456', 12),
(2, 1, 'K56781246', 8),
(3, 2, 'F75931486', 16),
(4, 2, 'Z17893456', 16),
(5, 2, 'F75931486', 8),
(6, 3, 'Q86413075', 8),
(7, 4, 'K56781246', 8),
(8, 4, 'D45621798', 12),
(9, 4, 'D45621798', 8),
(10, 4, 'E43697512', 16);

-- --------------------------------------------------------

--
-- 資料表結構 `professor`
--

CREATE TABLE `professor` (
  `PID` int(3) NOT NULL,
  `PName` varchar(50) NOT NULL,
  `PRank` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `professor`
--

INSERT INTO `professor` (`PID`, `PName`, `PRank`) VALUES
(1, 'Guang Chan', 'assistant'),
(2, 'Jacky Wu', 'associate'),
(3, 'Strong Lee', 'assistant'),
(4, 'Yeah Chen', 'professor'),
(5, 'IC Lin', 'associate'),
(6, 'Mei Jen', 'distinguished'),
(7, 'Home Ma', 'assistant'),
(8, 'Bing Chen', 'associate'),
(9, 'Doctor Su', 'assistant'),
(10, 'Martin Lu', 'professor');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `SID` varchar(9) NOT NULL,
  `SName` varchar(50) NOT NULL,
  `SGender` varchar(9) NOT NULL,
  `PID` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`SID`, `SName`, `SGender`, `PID`) VALUES
('A12345678', 'HiHi Mabao', 'male', 0),
('D45621798', 'Gina Gu', 'female', 0),
('E43697512', 'Irene Yin', 'female', 0),
('F10023479', 'Penny Pan', 'female', 0),
('F75931486', 'Frank Fang', 'male', 0),
('G78963154', 'Jack Jen', 'male', 0),
('H24076087', 'sususu shiba', 'male', 0),
('K56781246', 'Helen Huang', 'female', 0),
('Q78532125', 'Nick Ni', 'male', 0),
('Q86413075', 'Lisa Lu', 'female', 0),
('R75911423', 'Mike Miao', 'male', 0),
('Z17893456', 'Kelly Kuo', 'female', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `PID` (`PID`);

--
-- 資料表索引 `grouping`
--
ALTER TABLE `grouping`
  ADD PRIMARY KEY (`GID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `GNo` (`GNo`);

--
-- 資料表索引 `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`IID`),
  ADD KEY `SID` (`SID`);

--
-- 資料表索引 `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`PID`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `grouping`
--
ALTER TABLE `grouping`
  MODIFY `GID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `interview`
--
ALTER TABLE `interview`
  MODIFY `IID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `professor`
--
ALTER TABLE `professor`
  MODIFY `PID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `professor` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的限制式 `grouping`
--
ALTER TABLE `grouping`
  ADD CONSTRAINT `grouping_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grouping_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `professor` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的限制式 `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
