

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'group4', '827ccb0eea8a706c4c34a16891f84e7b', '2018-05-15 19:46:25');


CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `FromDate` varchar(100) NOT NULL,
  `ToDate` varchar(100) NOT NULL,
  `Comment` mediumtext NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(12, 4, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', 'yyy', '2018-05-07 11:46:15', 2, 'u', '2018-05-07 11:53:11'),
(13, 4, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', 'yyy', '2018-05-07 11:46:46', 2, 'a', '2018-05-15 19:12:49'),
(14, 4, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', 'yyy', '2018-05-07 11:47:10', 2, 'u', '2018-05-15 19:21:55'),
(15, 4, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', 'yyy', '2018-05-07 11:47:47', 0, NULL, NULL),
(16, 4, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', 'yyy', '2018-05-07 11:48:57', 0, NULL, NULL),
(17, 5, 'aniksniper@gmail.com', '2018-05-09', '22-06-2018', 'Yes', '2018-05-15 19:20:47', 0, NULL, NULL),
(18, 7, 'aniksniper@gmail.com', '12-5-2018', '22-6-2018', 'Yes', '2018-05-15 20:16:47', 0, NULL, NULL),
(19, 7, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', '', '2018-05-15 20:25:05', 0, NULL, NULL),
(20, 7, 'aniksniper@gmail.com', '22-05-2017', '2018-05-07', '', '2018-05-15 20:25:35', 0, NULL, NULL),
(21, 9, 'aniksniper@gmail.com', '22-05-2017', '2018-05-18', 'I want to Book this', '2018-05-16 16:22:04', 2, 'a', '2018-05-16 18:23:09');


CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(6, 'Anik Hasan', 'kamrulanicse@gmail.com', '1677737382', 'Me', 'Hello', '2018-05-06 20:55:00', 1),
(7, 'er', 'kamrulanicse@gmail.com', '43', 'gd', 'sefsfs', '2018-05-06 20:59:40', 1);


CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) NOT NULL,
  `PackageType` varchar(150) NOT NULL,
  `PackageLocation` varchar(100) NOT NULL,
  `PackagePrice` int(11) NOT NULL,
  `PackageFetures` varchar(255) NOT NULL,
  `PackageDetails` mediumtext NOT NULL,
  `PackageImage` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(9, 'Dream Destinations Getaways', 'Family', 'Bandarban', 10000, 'Free Pick Up', 'The first organised tours dated back to Thomas Cook who, on 5 July 1841, chartered a train to take a group of temperance campaigners from Leicester to a rally in Loughborough, eleven miles away. By 1872 he was undertaking worldwide tours, albeit with small groups.[1] His company, Thomas Cook & Son (commonly called Thomas Cook or simply \"Cook\'s\"), grew to become one of the largest and most well known travel agents before being nationalised in 1948.', 'kodaikanal-hill-station.jpg', '2018-05-16 16:18:00', '0000-00-00 00:00:00'),
(10, 'Paradise Travel', 'Couple', 'Cox\'s-Bazar', 5500, 'Free Hotel service', 'A natural extension to our in-house program, Travel Soccer is an important part of soccer in Bethel Park.  The primary goal of BPSA Travel Soccer is the total development of players from 9 to 14 years old in the game of soccer.  The program provides talented and promising players enhanced exposure to the game, the opportunity for quality coaching and the chance to compete against teams of similar talent.  Our program\'s objective is to field teams of the highest possible quality to represent BPSA in the PAWest District 4 South Division and possibly the PAWest State Open Soccer Tournament.', 'inani-beach-1211201643.jpg', '2018-05-16 16:50:56', '2018-05-16 17:22:47'),
(11, 'Travel Right', 'Family', 'Sundarban', 4500, 'Free Hotel service', 'Sundarban tour package total duration 2 nights and 3 days, air conditioned ship MV Mahirah, home theater and mini swimming pool, specious room, all lower berth, ambassador suites with attached bath and queen size bed 2, 6 common bathrooms, snacks - chanachur / cake / noodles / vegetable pakora / biscuits.', 'sundarbans-national-park-1.jpg', '2018-05-16 16:57:50', '0000-00-00 00:00:00'),
(12, 'Happy Trails Travel Company', 'Honeymoon', 'Sajek Valley', 10000, 'Free Hotel service', 'Sajek Valley is an emerging tourist spot in Bangladesh situated among the hills of Kasalong range of mountains in Sajek union, Baghaichhari Upazila in Rangamati District. The valley is 1800 feet above sea level. Sajek valley is known as the Queen of Hills & Roof of Rangamati. Runmoy resort at Sajek Valley.', 'pic_9-693x450.jpg', '2018-05-16 17:18:57', '0000-00-00 00:00:00');


CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `EmailId` varchar(70) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(12, 'Kamrul Hasan', '0167773738', 'aniksniper@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-05-05 17:38:42', '2018-05-16 19:28:10'),
(13, 'opu', '1745273157', 'rifat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-05-15 19:24:24', '0000-00-00 00:00:00');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);


ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
