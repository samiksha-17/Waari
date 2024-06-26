-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 04:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itdindee`
--

-- --------------------------------------------------------

--
-- Table structure for table `areamaster`
--

CREATE TABLE `areamaster` (
  `areaID` int NOT NULL,
  `cityID` int NOT NULL,
  `areaName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `areamaster`
--

INSERT INTO `areamaster` (`areaID`, `cityID`, `areaName`) VALUES
(1, 1, 'Magarpatta'),
(2, 1, 'Hadapsar'),
(3, 2, 'Thanke'),
(4, 4, 'Cidco'),
(1000, 100, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `citymaster`
--

CREATE TABLE `citymaster` (
  `cityID` int NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `citymaster`
--

INSERT INTO `citymaster` (`cityID`, `cityName`) VALUES
(1, 'Pune'),
(2, 'Mumbai'),
(3, 'Solapur'),
(4, 'Aurangabad'),
(5, 'Jalgaon'),
(100, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `companymaster`
--

CREATE TABLE `companymaster` (
  `companyID` int NOT NULL,
  `companyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companymaster`
--

INSERT INTO `companymaster` (`companyID`, `companyName`) VALUES
(1, 'Other'),
(2, 'Infosys'),
(3, 'Google'),
(4, 'TCS'),
(5, 'Wipro'),
(6, 'Microsoft'),
(7, 'ATOS');

-- --------------------------------------------------------

--
-- Table structure for table `tappaenrollment`
--

CREATE TABLE `tappaenrollment` (
  `enrollmentID` int NOT NULL,
  `tappaID` int NOT NULL,
  `warkariID` bigint UNSIGNED NOT NULL,
  `registerDate` date NOT NULL,
  `contribution` int NOT NULL,
  `totalContribution` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tappaenrollment`
--

INSERT INTO `tappaenrollment` (`enrollmentID`, `tappaID`, `warkariID`, `registerDate`, `contribution`, `totalContribution`) VALUES
(345, 1, 1, '2023-06-12', 0, 0),
(346, 2, 1, '2023-06-14', 750, 750),
(347, 1, 1, '2023-06-12', 750, 750),
(348, 2, 1, '2023-06-14', 500, 1250),
(349, 1, 1, '2023-06-12', 750, 750),
(350, 2, 1, '2023-06-14', 750, 1500),
(351, 3, 1, '2023-06-16', 500, 2000),
(352, 1, 1, '2023-06-12', 0, 0),
(353, 2, 1, '2023-06-14', 750, 750),
(354, 1, 1, '2023-06-12', 0, 0),
(355, 2, 1, '2023-06-14', 750, 750),
(356, 1, 1, '2023-06-12', 0, 0),
(357, 2, 1, '2023-06-14', 750, 750),
(358, 1, 1, '2023-06-12', 0, 0),
(359, 2, 1, '2023-06-14', 750, 750),
(360, 1, 1, '2023-06-12', 0, 0),
(361, 2, 1, '2023-06-14', 750, 750),
(362, 1, 1, '2023-06-12', 0, 0),
(363, 2, 1, '2023-06-14', 750, 750),
(364, 1, 1, '2023-06-12', 750, 750),
(365, 1, 1, '2023-06-12', 750, 1500),
(366, 2, 1, '2023-06-14', 500, 2000),
(367, 2, 1, '2023-06-14', 500, 2500),
(368, 1, 1, '2023-06-12', 0, 0),
(369, 1, 1, '2023-06-12', 0, 0),
(370, 2, 1, '2023-06-14', 750, 750),
(371, 2, 1, '2023-06-14', 750, 1500),
(372, 1, 1, '2023-06-12', 0, 0),
(373, 1, 1, '2023-06-12', 0, 0),
(374, 2, 1, '2023-06-14', 750, 750),
(375, 2, 1, '2023-06-14', 750, 1500),
(376, 1, 1, '2023-06-12', 0, 0),
(377, 1, 1, '2023-06-12', 0, 0),
(378, 2, 1, '2023-06-14', 500, 500),
(379, 2, 1, '2023-06-14', 500, 1000),
(380, 1, 1, '2023-06-12', 750, 750),
(381, 1, 1, '2023-06-12', 750, 1500),
(382, 2, 1, '2023-06-14', 500, 500),
(383, 3, 1, '2023-06-16', 500, 1000),
(384, 4, 1, '2023-06-17', 0, 1000),
(385, 2, 1, '2023-06-14', 500, 500),
(386, 3, 1, '2023-06-16', 500, 1000),
(387, 4, 1, '2023-06-17', 0, 1000),
(388, 2, 1, '2023-06-14', 500, 500),
(389, 3, 1, '2023-06-16', 500, 1000),
(390, 4, 1, '2023-06-17', 0, 1000),
(391, 2, 1, '2023-06-14', 500, 500),
(392, 3, 1, '2023-06-16', 500, 1000),
(393, 4, 1, '2023-06-17', 0, 1000),
(394, 1, 1, '2023-06-12', 0, 0),
(395, 2, 1, '2023-06-14', 500, 500),
(396, 1, 1, '2023-06-12', 0, 0),
(397, 2, 1, '2023-06-14', 500, 500),
(398, 1, 1, '2023-06-12', 0, 0),
(399, 2, 1, '2023-06-14', 500, 500),
(400, 1, 1, '2023-06-12', 0, 0),
(401, 2, 1, '2023-06-14', 500, 500),
(402, 1, 1, '2023-06-12', 0, 0),
(403, 2, 1, '2023-06-14', 500, 500),
(404, 1, 1, '2023-06-12', 0, 0),
(405, 2, 1, '2023-06-14', 500, 500),
(406, 1, 1, '2023-06-12', 0, 0),
(407, 2, 1, '2023-06-14', 500, 500),
(408, 1, 1, '2023-06-12', 0, 0),
(409, 2, 1, '2023-06-14', 500, 500),
(410, 1, 1, '2023-06-12', 0, 0),
(411, 2, 1, '2023-06-14', 500, 500),
(412, 1, 1, '2023-06-12', 0, 0),
(413, 2, 1, '2023-06-14', 500, 500),
(414, 1, 1, '2023-06-12', 0, 0),
(415, 2, 1, '2023-06-14', 500, 500),
(416, 1, 1, '2023-06-12', 0, 0),
(417, 2, 1, '2023-06-14', 500, 500),
(418, 1, 1, '2023-06-12', 0, 0),
(419, 2, 1, '2023-06-14', 500, 500),
(420, 1, 1, '2023-06-12', 0, 0),
(421, 2, 1, '2023-06-14', 500, 500),
(422, 1, 1, '2023-06-12', 0, 0),
(423, 2, 1, '2023-06-14', 500, 500),
(424, 1, 1, '2023-06-12', 0, 0),
(425, 2, 1, '2023-06-14', 500, 500),
(426, 1, 1, '2023-06-12', 0, 0),
(427, 2, 1, '2023-06-14', 500, 500),
(428, 1, 1, '2023-06-12', 0, 0),
(429, 2, 1, '2023-06-14', 500, 500),
(430, 1, 1, '2023-06-12', 0, 0),
(431, 2, 1, '2023-06-14', 500, 500),
(432, 1, 1, '2023-06-12', 0, 0),
(433, 2, 1, '2023-06-14', 500, 500),
(434, 1, 1, '2023-06-12', 0, 0),
(435, 1, 1, '2023-06-12', 0, 0),
(436, 2, 1, '2023-06-14', 500, 500),
(437, 2, 1, '2023-06-14', 500, 1000),
(438, 1, 1, '2023-06-12', 0, 0),
(439, 1, 1, '2023-06-12', 0, 0),
(440, 2, 1, '2023-06-14', 500, 500),
(441, 2, 1, '2023-06-14', 500, 1000),
(442, 1, 8, '2024-06-15', 750, 1250),
(442, 2, 8, '2024-06-15', 500, 1250),
(443, 1, 8, '2024-06-15', 750, 1250),
(443, 2, 8, '2024-06-15', 500, 1250),
(444, 1, 8, '2024-06-15', 750, 1250),
(444, 2, 8, '2024-06-15', 500, 1250),
(445, 1, 8, '2024-06-15', 750, 1250),
(445, 2, 8, '2024-06-15', 500, 1250),
(446, 1, 20, '2024-06-15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tappamaster`
--

CREATE TABLE `tappamaster` (
  `waariYear` int NOT NULL,
  `tappaID` int NOT NULL,
  `tappa` varchar(100) NOT NULL,
  `tappaDate` date NOT NULL,
  `distance` decimal(3,1) NOT NULL,
  `tithi` varchar(100) NOT NULL,
  `tappaDay` varchar(100) NOT NULL,
  `difficultyLevel` varchar(10) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `returnContri` int NOT NULL,
  `stayContri` int NOT NULL,
  `isActiveFlag` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tappamaster`
--

INSERT INTO `tappamaster` (`waariYear`, `tappaID`, `tappa`, `tappaDate`, `distance`, `tithi`, `tappaDay`, `difficultyLevel`, `remark`, `returnContri`, `stayContri`, `isActiveFlag`) VALUES
(2023, 1, 'Alandi-Pune', '2023-06-12', '18.0', 'Ashtami', 'Monday', 'Moderate', 'First Day', 0, 750, 1),
(2023, 2, 'Pune-Saswad', '2023-06-14', '32.0', 'Ekadashi', 'Wednesday', 'Difficult', 'Second Day', 500, 750, 1),
(2023, 3, 'Saswad-Jejuri', '2023-06-16', '18.0', 'Ashtami', 'Friday', 'Moderate', 'Third Day', 500, 1000, 1),
(2023, 4, 'Jejuri-Walhe', '2023-06-17', '13.0', 'Ashtami', 'Saturday', 'Easy', 'Fourth Day', 750, 1500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userID` bigint UNSIGNED NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passWord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userID`, `userName`, `email`, `passWord`) VALUES
(4, 'bhavika', 'bhavikaapatil2002@gmail.com', '04fa5e8eec530b77c3c731eb54def67f'),
(5, 'rani', 'ranipatil@gmail.com', 'b9f81618db3b0d7a8be8fd904cca8b6a'),
(6, 'Sakshiii', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(7, 'Sakshiii', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(8, 'Sakshiii', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(9, 'sakshi', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(10, 'Sakshi ', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(11, 'Rani', 'sakshimore090403@gmail.com', 'b9f81618db3b0d7a8be8fd904cca8b6a'),
(12, 'ashu', 'sakshimore090403@gmail.com', '89cd279e1dbab7a8518361804a388062'),
(13, 'bhavika', 'sakshimore090403@gmail.com', '15744b9043c8de5d8337f95376510484'),
(14, 'roshni', 'sakshimore090403@gmail.com', '89c87f73ac5f1dbe66fa45cb7cc55d3e'),
(15, 'kimaya', 'sakshimore090403@gmail.com', '23fbfa25f9cf41e6ba6dc73ebd88bb1b'),
(16, 'sakshi more ', 'sakshimore090403@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf'),
(17, 'kirti', 'sakshimore090403@gmail.com', 'cf8c1a5f284ea61c6d7d21b2843a5131'),
(18, 'sam', 'pasesamiksha@gmail.com', '76d6deb2417bd6dc7952790e87610f84'),
(19, 'sam', 'pasesamiksha@gmail.com', '76d6deb2417bd6dc7952790e87610f84'),
(20, 'sam', 'abc@gamil.com', '76d6deb2417bd6dc7952790e87610f84'),
(21, 'sam', 'bhavikaapatil2002@gmail.com', '76d6deb2417bd6dc7952790e87610f84'),
(22, 'sam', 'bhavikaapatil2002@gmail.com', '76d6deb2417bd6dc7952790e87610f84'),
(23, 'sam', 'abc@gamil.com', '332532dcfaa1cbf61e2a266bd723612c'),
(24, 'sam', 'abc@gamil.com', '332532dcfaa1cbf61e2a266bd723612c'),
(25, 'sam', 'sam@gmail.com', '332532dcfaa1cbf61e2a266bd723612c'),
(26, 'sam', 'neha@gmail.com', '332532dcfaa1cbf61e2a266bd723612c'),
(27, 'sam', 'sam@gmail.com', '332532dcfaa1cbf61e2a266bd723612c');

-- --------------------------------------------------------

--
-- Table structure for table `warkari`
--

CREATE TABLE `warkari` (
  `warkariID` bigint UNSIGNED NOT NULL,
  `userID` bigint UNSIGNED NOT NULL,
  `firstName` varchar(150) DEFAULT NULL,
  `lastName` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `whatsAppNo` varchar(20) NOT NULL,
  `telegramNo` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `cityID` varchar(20) NOT NULL,
  `areaID` varchar(20) NOT NULL,
  `companyID` varchar(20) NOT NULL,
  `volunteer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warkari`
--

INSERT INTO `warkari` (`warkariID`, `userID`, `firstName`, `lastName`, `email`, `mobileNo`, `whatsAppNo`, `telegramNo`, `gender`, `age`, `address`, `cityID`, `areaID`, `companyID`, `volunteer`) VALUES
(1, 0, 'Sakshi', 'More', 'sakshimore090403@gmail.com', '+919359577671', '+919359577671', '+919359577671', 'Female', 0, 'Old MIDC ', '1', '1', '', '1'),
(2, 0, 'Samiksha', 'Pase', 'pasesamiksha@gmail.com', '+918799996933', '+918799996933', '+918799996933', 'Female', 0, 'swatantrya chawk', '2', '2', '', '0'),
(5, 0, 'sakshi', 'more', 'sakshimore090403@gmail.com', '+919359577671', '', '', 'female', 70, 'midc', '4', 'Select Area', 'TCS', 'Yes'),
(8, 4, 'dipika', 'rane', 'bhavikaapatil2002@gmail.com', '+919359577671', '+919359577671', '+919359577671', 'female', 16, 'ssbt ', '2', '3', 'TCS', 'Yes'),
(9, 9, 'Gayatri', 'patil', 'gayatri@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'Mahalakshmi Nagar ,Pune', '1', '2', 'Infosys', 'Yes'),
(10, 9, 'Alia', 'Bhatt', 'alia@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'Jalgaon ', '1', '1', 'Infosys', 'Yes'),
(11, 9, 'Kareena', 'Kapoor', 'Kareena@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'Jalgaon ', '1', '1', 'Infosys', 'Yes'),
(12, 9, 'Roshani', 'Pardesi', 'roshani@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'Jalgaon ', '1', '1', 'Infosys', 'Yes'),
(13, 12, 'Ashu', 'More', 'ashu@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'Mumbai', '2', '3', 'Infosys', 'Yes'),
(14, 14, 'Roshani', 'More', 'roshani@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'pune', '1', '1', 'Infosys', 'Yes'),
(15, 1, 'kimaya', 'shimpi', 'sakshimore090403@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'pune', '1', '1', 'Infosys', 'Yes'),
(16, 17, 'Sakshi', 'More', 'sakshimore090403@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'pune', '1', '2', 'Infosys', 'Yes'),
(17, 17, 'Gayatri', 'patil', 'sakshimore090403@gmail.com', '+919284017955', '+919284017955', '+919284017955', 'female', 17, 'pune', '1', '1', 'Infosys', 'Yes'),
(18, 17, 'Divya', 'patil', 'divya@gmail.com', '+919284017955', '+919284017955', '+919284017955', '', 17, 'pune', '1', '1', 'TCS', 'Yes'),
(19, 3, 'Samiksha', 'pase', 'abc@gamil.com', '+918796543876', '+918796543876', '+918796543876', 'female', 19, 'near jalgaon', '4', '4', 'Wipro', 'Yes'),
(20, 4, 'neha', 'pase', 'pasesamiksha@gmail.com', '8799996933', '8799996933', '8799996933', 'female', 5, 'aaa', '2', '3', 'Infosys', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areamaster`
--
ALTER TABLE `areamaster`
  ADD PRIMARY KEY (`areaID`),
  ADD KEY `FK_cityareaID` (`cityID`);

--
-- Indexes for table `citymaster`
--
ALTER TABLE `citymaster`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `companymaster`
--
ALTER TABLE `companymaster`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `tappaenrollment`
--
ALTER TABLE `tappaenrollment`
  ADD PRIMARY KEY (`enrollmentID`,`tappaID`,`warkariID`),
  ADD KEY `FK_tappaID` (`tappaID`),
  ADD KEY `FK_warkariID` (`warkariID`);

--
-- Indexes for table `tappamaster`
--
ALTER TABLE `tappamaster`
  ADD PRIMARY KEY (`tappaID`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `warkari`
--
ALTER TABLE `warkari`
  ADD PRIMARY KEY (`warkariID`),
  ADD KEY `FK_userwarkariID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tappaenrollment`
--
ALTER TABLE `tappaenrollment`
  MODIFY `enrollmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warkari`
--
ALTER TABLE `warkari`
  MODIFY `warkariID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areamaster`
--
ALTER TABLE `areamaster`
  ADD CONSTRAINT `FK_cityID` FOREIGN KEY (`cityID`) REFERENCES `citymaster` (`cityID`);

--
-- Constraints for table `tappaenrollment`
--
ALTER TABLE `tappaenrollment`
  ADD CONSTRAINT `FK_tappaID` FOREIGN KEY (`tappaID`) REFERENCES `tappamaster` (`tappaID`),
  ADD CONSTRAINT `FK_warkariID` FOREIGN KEY (`warkariID`) REFERENCES `warkari` (`warkariID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
