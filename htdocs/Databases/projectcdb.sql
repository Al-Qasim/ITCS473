-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2018 at 11:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `UID` int(3) NOT NULL,
  `current_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`UID`, `current_balance`) VALUES
(1, 16),
(2, 16),
(3, 16),
(4, 10),
(5, 16),
(6, 16),
(7, 16);

-- --------------------------------------------------------

--
-- Table structure for table `commentrate`
--

CREATE TABLE `commentrate` (
  `CRID` int(5) NOT NULL,
  `MID` int(3) NOT NULL,
  `UID` int(4) NOT NULL,
  `rate` int(2) NOT NULL,
  `comm` text NOT NULL,
  `RDT` datetime NOT NULL,
  `CDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentrate`
--

INSERT INTO `commentrate` (`CRID`, `MID`, `UID`, `rate`, `comm`, `RDT`, `CDT`) VALUES
(1, 4, 7, 3, 'This is a very good movie, I recommed watching it.\r\n\r\n:)', '2018-12-12 12:36:12', '2018-12-12 12:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `cuser`
--

CREATE TABLE `cuser` (
  `UID` int(4) NOT NULL,
  `Fname` varchar(15) NOT NULL,
  `Lname` varchar(15) NOT NULL,
  `cusername` text NOT NULL,
  `cpassword` text NOT NULL,
  `cemail` text NOT NULL,
  `telephone` int(8) NOT NULL,
  `DOB` date NOT NULL,
  `userType` varchar(10) NOT NULL,
  `pic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuser`
--

INSERT INTO `cuser` (`UID`, `Fname`, `Lname`, `cusername`, `cpassword`, `cemail`, `telephone`, `DOB`, `userType`, `pic`) VALUES
(1, 'man', 'can', 'CanMan', 'f3dc5638b88e067bcfc2940bf64ce201', 'man@can.nam', 45678954, '2018-11-21', 'normal', 'default.png'),
(2, 'dan', 'van', 'vandan', 'd7e486d30a430590c2a7c62ac64eb33b', 'dan@van.nav', 75395142, '2018-11-21', 'normal', 'default.png'),
(3, 'demo', 'demoo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.medo', 3216454, '2018-11-21', 'normal', 'default.png'),
(4, 'Qassim', 'Salem', 'buhashem', '323cc23b6019bd8110f83fa4c6562bbf', 'Hashem@Buhashem.Hashem', 35583458, '2018-12-09', 'normal', 'male.png'),
(5, 'a', 'b', 'as', '202cb962ac59075b964b07152d234b70', 'Man@d00s.net', 23452343, '2000-12-21', 'normal', 'default.png'),
(6, 'Admin', 'Strator', 'Administrator', 'e3afed0047b08059d0fada10f400c1e5', 'Administrator@administrate.local', 12345678, '2010-10-10', 'admin', 'default.png'),
(7, 'ABCD', 'EFG', 'TEST', '87625f305d8e92ec1e2461a163d0ebd3', 'TEST@TEST.check', 32345678, '2000-12-05', 'normal', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hallID` int(11) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `rows` int(2) NOT NULL,
  `leftRow` int(2) NOT NULL,
  `midRow` int(2) NOT NULL,
  `rightRow` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hallID`, `branch`, `rows`, `leftRow`, `midRow`, `rightRow`) VALUES
(1, 'City Centre', 15, 5, 10, 5),
(1, 'Seef Mall', 10, 4, 8, 4),
(4, 'Seef Mall', 10, 6, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MID` int(3) NOT NULL,
  `MName` varchar(50) NOT NULL,
  `Summary` text NOT NULL,
  `Trailer` text NOT NULL,
  `MCover` varchar(10000) NOT NULL,
  `MGenre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MID`, `MName`, `Summary`, `Trailer`, `MCover`, `MGenre`) VALUES
(1, 'Ralph Breaks the Internet (2018)', 'Six years after the events of \"Wreck-It Ralph,\" Ralph and Vanellope, now friends, discover a wi-fi router in their arcade, leading them into a new adventure.', 'https://www.youtube.com/embed/T73h5bmD8Dc', 'https://m.media-amazon.com/images/M/MV5BMTYyNzEyNDAzOV5BMl5BanBnXkFtZTgwNTk3NDczNjM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Animation'),
(2, 'Creed II (2018)', 'Under the tutelage of Rocky Balboa, heavyweight contender Adonis Creed faces off against Viktor Drago, son of Ivan Drago.', 'https://www.youtube.com/embed/ovFpFtZ2Tvk', 'https://m.media-amazon.com/images/M/MV5BMTcxMjUwNjQ5N15BMl5BanBnXkFtZTgwNjk4MzI4NjM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Drama'),
(3, 'The Grinch (2018)', 'A grumpy Grinch plots to ruin Christmas for the village of Whoville.', 'https://www.youtube.com/embed/Bf6D-i8YpHg', 'https://m.media-amazon.com/images/M/MV5BYmE5Yjg0MzktYzgzMi00YTFiLWJjYTItY2M5MmI1ODI4MDY3XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Animation'),
(4, 'Animal World (2018)', 'A man finds himself deep in debt and is coerced to board a ship that hosts a risky gambling party.', 'https://www.youtube.com/embed/YyJsQN-W5WY', 'https://m.media-amazon.com/images/M/MV5BMjEyMzY1NTE3OF5BMl5BanBnXkFtZTgwMzUzNDk2NTM@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Adventure'),
(5, 'Along with the Gods: The Last 49 Days (2018)', 'In the afterlife, one guardian helps a man through his trials, while his two colleagues help a former guardian on earth.', 'https://www.youtube.com/embed/IfzZYija-wM', 'https://m.media-amazon.com/images/M/MV5BN2Y2ZDAxYzUtNjg4Yi00YmM2LWE2ZTEtMjgyZThjNjg3YjUyXkEyXkFqcGdeQXVyNDY5MTUyNjU@._V1_UX182_CR0,0,182,268_AL_.jpg', 'Fantasy'),
(6, 'Dark Figure of Crime (2018)', 'A criminal thriller about the fierce psychological confrontation between a detective and a killer who confessed to multiple murders.', 'https://www.youtube.com/embed/vz3wTvzC1vY', 'https://m.media-amazon.com/images/M/MV5BOWM4NmY0NTctMmYxMi00YmUzLWJjMGYtODlkZmI1ZDVjYjIwXkEyXkFqcGdeQXVyNDcyMjQ4MzU@._V1_UY268_CR3,0,182,268_AL_.jpg', 'Crime'),
(7, 'Sanju (2018)', 'Sanju is a biopic of the controversial life of actor Sanjay Dutt: his film career, jail sentence and personal life.', 'https://www.youtube.com/embed/1J76wN0TPI4', 'https://m.media-amazon.com/images/M/MV5BMjI3NTM1NzMyNF5BMl5BanBnXkFtZTgwOTE4NTgzNTM@._V1_UY268_CR5,0,182,268_AL_.jpg', 'Drama'),
(8, 'Blackmail (2018)', 'When Dev finds out his wife is cheating on him, he secretly blackmails his wife and her lover as a form of revenge.', 'https://www.youtube.com/embed/TDF1qdUtbzw', 'https://m.media-amazon.com/images/M/MV5BOWE0MTM2MjItMTI1ZS00ZGRlLWExYmUtYjEzNzRhNDgyOGRjXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_UY268_CR1,0,182,268_AL_.jpg', 'Crime'),
(9, 'Raid (2018)', 'A fearless income tax officer raids the mansion of the most powerful man in Lucknow after someone mysteriously draws his attention towards the evidence.', 'https://www.youtube.com/embed/3h4thS-Hcrk', 'https://m.media-amazon.com/images/M/MV5BN2NlMmUyZWUtZmI5Yy00YWM3LTkxYzgtM2ZiOTMwNTc5ZDg0XkEyXkFqcGdeQXVyNjcyNjMzMjQ@._V1_UY268_CR2,0,182,268_AL_.jpg', 'Crime'),
(10, 'Aquaman', 'Arthur Curry learns that he is the heir to the underwater kingdom of Atlantis, and must step forward to lead his people and be a hero to the world. ', 'https://www.youtube.com/embed/WDkg3h8PCVU', 'https://m.media-amazon.com/images/M/MV5BOTk5ODg0OTU5M15BMl5BanBnXkFtZTgwMDQ3MDY3NjM@._V1_.jpg', 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `RID` int(3) NOT NULL,
  `SID` int(3) NOT NULL,
  `UID` int(3) NOT NULL,
  `SEAT` varchar(10) NOT NULL,
  `Payment` varchar(3) NOT NULL,
  `Day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`RID`, `SID`, `UID`, `SEAT`, `Payment`, `Day`) VALUES
(1, 2, 4, 'Row15 M2', 'YES', '2018-12-25'),
(2, 2, 4, 'Row15 M3', 'YES', '2018-12-25'),
(3, 2, 4, 'Row1 M4', 'YES', '2018-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `showID` int(3) NOT NULL,
  `startTime` time(3) NOT NULL,
  `endTime` time(6) NOT NULL,
  `MID` int(3) NOT NULL,
  `hallID` int(3) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`showID`, `startTime`, `endTime`, `MID`, `hallID`, `branch`) VALUES
(1, '14:15:00.000', '16:15:00.000000', 1, 1, 'Seef Mall'),
(2, '19:00:00.000', '21:30:00.000000', 4, 1, 'City Centre'),
(3, '16:00:00.000', '18:30:00.000000', 4, 4, 'Seef Mall');

-- --------------------------------------------------------

--
-- Table structure for table `toprequests`
--

CREATE TABLE `toprequests` (
  `request_id` int(3) NOT NULL,
  `UID` int(3) NOT NULL,
  `topAmount` double NOT NULL,
  `request_time` datetime NOT NULL,
  `request_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toprequests`
--

INSERT INTO `toprequests` (`request_id`, `UID`, `topAmount`, `request_time`, `request_status`) VALUES
(1, 4, 12, '2018-12-24 10:13:24', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD KEY `cuser_balance_UID_FKEY` (`UID`);

--
-- Indexes for table `commentrate`
--
ALTER TABLE `commentrate`
  ADD PRIMARY KEY (`CRID`),
  ADD KEY `crmovie_ID_FKEY` (`MID`),
  ADD KEY `cruser_ID_FKEY` (`UID`);

--
-- Indexes for table `cuser`
--
ALTER TABLE `cuser`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hallID`,`branch`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `rshow_ID_FKEY` (`SID`),
  ADD KEY `ruser_ID_FKEY` (`UID`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`showID`),
  ADD KEY `smovie_ID_FKEY` (`MID`),
  ADD KEY `hall_ID_FKEY` (`hallID`);

--
-- Indexes for table `toprequests`
--
ALTER TABLE `toprequests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `toprequests_User_UID_FKEY` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentrate`
--
ALTER TABLE `commentrate`
  MODIFY `CRID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuser`
--
ALTER TABLE `cuser`
  MODIFY `UID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `MID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `RID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `showID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toprequests`
--
ALTER TABLE `toprequests`
  MODIFY `request_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentrate`
--
ALTER TABLE `commentrate`
  ADD CONSTRAINT `crmovie_ID_FKEY` FOREIGN KEY (`MID`) REFERENCES `movie` (`MID`),
  ADD CONSTRAINT `cruser_ID_FKEY` FOREIGN KEY (`UID`) REFERENCES `cuser` (`UID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `rshow_ID_FKEY` FOREIGN KEY (`SID`) REFERENCES `showtime` (`showID`),
  ADD CONSTRAINT `ruser_ID_FKEY` FOREIGN KEY (`UID`) REFERENCES `cuser` (`UID`);

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `smovie_ID_FKEY` FOREIGN KEY (`MID`) REFERENCES `movie` (`MID`);

--
-- Constraints for table `toprequests`
--
ALTER TABLE `toprequests`
  ADD CONSTRAINT `toprequests_User_UID_FKEY` FOREIGN KEY (`UID`) REFERENCES `cuser` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
