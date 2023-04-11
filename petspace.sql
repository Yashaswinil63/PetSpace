-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 03:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_Id` varchar(30) NOT NULL,
  `Total_Charge` int(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `User` varchar(30) NOT NULL,
  `Session_Id` varchar(30) NOT NULL,
  `Payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_Id`, `Total_Charge`, `Date`, `Time`, `User`, `Session_Id`, `Payment`) VALUES
('642edb635fd90', 700, '2023-04-13', '23:18:00', 'Yashaswini63', '642edb633c112', 'yes'),
('642edcbd7071e', 700, '2023-04-13', '23:18:00', 'Yashaswini63', '642edcbd52882', 'yes'),
('6430ef99f3885', 700, '2023-04-26', '14:12:00', 'Yashaswini63', '6430ef991c9ef', 'yes'),
('64311a7b8ad09', 650, '2023-04-27', '19:10:00', 'Yashaswini63', '64311a7b6baf4', 'yes'),
('643507b13995b', 700, '2023-04-18', '16:39:00', 'Yashaswini63', '643507b0e8e8b', 'yes'),
('64350e95096dd', 400, '2023-04-26', '18:08:00', 'Yashaswini63', '64350e94f04db', 'yes'),
('64350ed52b71c', 400, '2023-04-26', '18:10:00', 'Yashaswini63', '64350ed50b05c', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Name` varchar(30) NOT NULL,
  `Per_Service_Charge` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Name`, `Per_Service_Charge`) VALUES
('Pet_Day_Care', 300),
('Pet_Day_Out', 650),
('Pet_Grooming', 400),
('Pool_Sessions', 350);

-- --------------------------------------------------------

--
-- Table structure for table `service_registration`
--

CREATE TABLE `service_registration` (
  `Sl_no` int(30) NOT NULL,
  `Session_Id` varchar(30) NOT NULL,
  `Service` varchar(30) NOT NULL,
  `User` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_registration`
--

INSERT INTO `service_registration` (`Sl_no`, `Session_Id`, `Service`, `User`) VALUES
(46, '642edb633c112', 'Pet_Grooming', 'Yashaswini63'),
(47, '642edcbd52882', 'Pet_Day_Care', 'Yashaswini63'),
(48, '642edcbd52882', 'Pet_Grooming', 'Yashaswini63'),
(49, '6430ef991c9ef', 'Pet_Day_Care', 'Yashaswini63'),
(50, '6430ef991c9ef', 'Pet_Grooming', 'Yashaswini63'),
(51, '64311a7b6baf4', 'Pet_Day_Care', 'Yashaswini63'),
(52, '64311a7b6baf4', 'Pool_Sessions', 'Yashaswini63'),
(53, '643507b0e8e8b', 'Pet_Day_Care', 'Yashaswini63'),
(54, '643507b0e8e8b', 'Pet_Grooming', 'Yashaswini63'),
(55, '64350e94f04db', 'Pet_Grooming', 'Yashaswini63'),
(56, '64350ed50b05c', 'Pet_Grooming', 'Yashaswini63');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Contact`) VALUES
('Niyati', '789456', 29555),
('Samuel81', '456321', 29666),
('Yashaswini63', '632002', 29555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_Id`),
  ADD KEY `user_appointment` (`User`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Name`);

--
-- Indexes for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD PRIMARY KEY (`Sl_no`),
  ADD KEY `service` (`Service`),
  ADD KEY `user` (`User`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registration`
--
ALTER TABLE `service_registration`
  MODIFY `Sl_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `user_appointment` FOREIGN KEY (`User`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD CONSTRAINT `service` FOREIGN KEY (`Service`) REFERENCES `services` (`Service_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`User`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
