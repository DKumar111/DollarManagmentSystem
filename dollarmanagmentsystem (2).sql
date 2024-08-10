-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 10:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dollarmanagmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `dollarrecievedtable`
--

CREATE TABLE `dollarrecievedtable` (
  `Dollar_R_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Dollar_Recieved` int(11) NOT NULL,
  `Remark` varchar(50) NOT NULL,
  `Recieved_Date` date NOT NULL,
  `Total_INR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dollarrecievedtable`
--

INSERT INTO `dollarrecievedtable` (`Dollar_R_id`, `Name`, `Dollar_Recieved`, `Remark`, `Recieved_Date`, `Total_INR`) VALUES
(1, 'suraj', 500, '', '2024-08-05', 40000),
(2, 'RAHUL', 6000, '', '2024-08-05', 480000),
(3, 'LAVISH CHAUDHARY', 20000, '', '2024-08-05', 1600000),
(4, 'DEEPAK KUMAR', 200, '', '2024-08-05', 16000),
(5, 'RAHUL', 1000, '', '2024-08-04', 80000),
(6, 'ARMIN PASSI', 10000, '', '2024-08-05', 800000),
(7, 'ARMIN PASSI', 1000, 'abc', '2024-08-10', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `team_ID` int(11) NOT NULL,
  `member_Name` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `added_Dollar` int(11) NOT NULL,
  `Total_Dollar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`team_ID`, `member_Name`, `member_email`, `added_Dollar`, `Total_Dollar`) VALUES
(1, 'PRAVEEN DHIMAN', 'praveendhiman@gamil.com', 0, 10000),
(2, 'KULDEEP SINGH', 'kuldeepsingh@gmail.com', 0, 20000),
(3, 'VIVEK PANDIT', 'vivek@gmail.com', 0, 10000),
(4, 'SAGAR DHAANIYA', 'sagar@gmail.com', 0, 0),
(5, 'AAMIR KHAN', 'amirkhan@gmail.com', 0, 0),
(6, 'PRAMOD PRAJAPATI', 'pramodprajapati@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transectionrecord`
--

CREATE TABLE `transectionrecord` (
  `trid` int(11) NOT NULL,
  `tm_ID` int(11) NOT NULL,
  `ClientName` varchar(20) NOT NULL,
  `ClientID` varchar(20) NOT NULL,
  `SentDollar` int(11) NOT NULL,
  `SentDollarDate` date DEFAULT NULL,
  `TotalINR` int(11) NOT NULL,
  `RecCash` int(11) NOT NULL,
  `CashClientName` varchar(20) NOT NULL,
  `AmountTransfer` int(11) NOT NULL,
  `TransferTo` varchar(20) NOT NULL,
  `Descrip` varchar(50) NOT NULL,
  `BalanceinINR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transectionrecord`
--

INSERT INTO `transectionrecord` (`trid`, `tm_ID`, `ClientName`, `ClientID`, `SentDollar`, `SentDollarDate`, `TotalINR`, `RecCash`, `CashClientName`, `AmountTransfer`, `TransferTo`, `Descrip`, `BalanceinINR`) VALUES
(3, 0, 'ARMIN PASSI', 'ROBO145263', 200, '2024-07-24', 16000, 4000, 'amit', 6000, 'RAJAT KUMAR', 'SALARY', 6000),
(4, 0, 'RAHUL', 'ROBO145263', 400, '2024-07-31', 32000, 2000, 'RINKU', 15000, 'AKHIL', 'FOR BUYING LAPTOP', 15000),
(5, 0, 'DEEPAK KUMAR', 'ROBO145263', 9600, '2024-07-31', 768000, 600000, 'SAGAR', 100000, 'ARMIN PASSI', 'EVENT EXPENSES', 68000),
(6, 0, 'SUDHIR LAUR', 'ROBO145263', 5000, '2024-07-31', 400000, 350000, 'SAGAR', 50000, 'ARMIN PASSI', 'EVENT EXPENSES', 0),
(7, 0, 'DEEPAK SHARMA', 'ROBO145263', 3000, '2024-07-31', 240000, 40000, 'SAGAR', 160000, 'ARMIN PASSI', 'EVENT EXPENSES', 40000),
(8, 0, 'ARMIN PASSI', 'ROBO145263', 400, '2024-08-05', 32000, 5000, 'SAGAR', 10000, 'RAJAT KUMAR', 'FOR BUYING LAPTOP', 17000),
(9, 0, 'akhil', 'ROBO145263', 200, '2024-08-05', 16000, 4000, 'dhiraj', 5000, 'RAJAT KUMAR', 'FOR CAR REPAIRING EXPENSE', 7000),
(10, 0, 'RAHUL', 'AKSDF1231', 300, '2024-08-10', 24000, 2000, 'SAGAR', 4000, 'AKHIL', 'FOR CAR REPAIRING EXPENSE', 18000),
(11, 0, 'ARMIN PASSI', 'AKSDF1231', 400, '2024-08-10', 32000, 5000, 'RINKU', 4000, 'AKHIL', 'SALARY', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'ASHISH SAROJ', 'ashishsaroj247@gmail.com', 'armin@1234'),
(2, 'SAGAR DHIMAN', 'sagardhiman0016@gmail.com', 'armin@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dollarrecievedtable`
--
ALTER TABLE `dollarrecievedtable`
  ADD PRIMARY KEY (`Dollar_R_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_ID`);

--
-- Indexes for table `transectionrecord`
--
ALTER TABLE `transectionrecord`
  ADD PRIMARY KEY (`trid`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dollarrecievedtable`
--
ALTER TABLE `dollarrecievedtable`
  MODIFY `Dollar_R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `team_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transectionrecord`
--
ALTER TABLE `transectionrecord`
  MODIFY `trid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
