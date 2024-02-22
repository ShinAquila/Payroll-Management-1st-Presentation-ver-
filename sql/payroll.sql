-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `deduction_id` int(5) NOT NULL,
  `deduction_name` varchar(100) NOT NULL,
  `deduction_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `deduction_name`, `deduction_amount`) VALUES
(1, 'philhealth', 350),
(2, 'BIR', 500),
(3, 'GSIS', 630),
(4, 'PAGIBIG', 140),
(5, 'SSS', 980);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(2, 'UX Designer'),
(7, 'Software Developer'),
(8, 'Mobile Developer'),
(9, 'Database Manager'),
(10, 'Web Developer'),
(11, 'IT Technician');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dept` int(30) NOT NULL,
  `deduction` int(10) NOT NULL,
  `overtime_hours` int(10) NOT NULL,
  `bonus` int(10) NOT NULL,
  `total_gross_pay` int(100) NOT NULL,
  `total_net_pay` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `lname`, `fname`, `gender`, `email`, `dept`, `deduction`, `overtime_hours`, `bonus`, `total_gross_pay`, `total_net_pay`) VALUES
(6, 'Sabit', 'Jessa', 'Female', 'sabit@gmail.com', 7, 600, 2, 200, 7800, 7200),
(8, 'Pasadas', 'Renz', 'Male', 'pasadas@gmail.com', 10, 600, 3, 5000, 12900, 12300),
(9, 'Maglangit', 'Karen', 'Female', 'maglangit@gmail.com', 11, 650, 6, 2000, 10800, 10150),
(11, 'Leonida', 'Fritzie Apple', 'Male', 'leonida@gmail.com', 2, 950, 3, 50, 7950, 7000),
(13, 'Corpuz', 'Allan', 'Male', 'corpuz@gmail.com', 10, 1820, 4, 600, 8800, 6980),
(14, 'Bueno', 'Kyll John', 'Male', 'bueno@gmail.com', 2, 900, 7, 400, 9500, 8600),
(15, 'Albarracin', 'Brent', 'Male', 'albarracin@gmail.com', 10, 1170, 1, 1000, 8300, 7130),
(17, 'Rivera', 'Vincent Ace', 'Male', 'ace@gmail.com', 9, 1250, 3, 600, 8500, 7250),
(18, 'Cardo', 'Dalisay', 'Male', 'CardoDali@gmail.com', 2, 1820, 2, 200, 7800, 5980),
(19, 'Sy', 'Leisha', 'Female', 'Leishy@gmail.com', 10, 1820, 3, 500, 8400, 6580),
(20, 'Hens', 'Kelra', 'Male', 'KelraHel@gmail.com', 8, 1820, 6, 800, 9600, 7780),
(21, 'Max', 'Lisha', 'Female', 'Lishamax@gmail.com', 2, 1820, 3, 500, 8400, 6580),
(22, 'Pacquaio', 'Manny', 'Male', 'pacman@gmail.com', 2, 1170, 3, 300, 8200, 7030),
(23, 'Tate', 'Lesley', 'Female', 'LesleyTate@gmail.com', 11, 1370, 4, 600, 8800, 7430),
(24, 'Donut', 'Boi', 'Male', 'Nadonut@gmail.com', 8, 870, 3, 500, 8400, 7530),
(25, 'Lazada', 'Renz', 'Male', 'renzshopping@gmail.com', 8, 1820, 1, 300, 7600, 5780),
(26, 'Genie', 'Ryan', 'Male', 'Ryan18@gmail.com', 2, 1820, 7, 1500, 10600, 8780),
(27, 'Corn', 'Dog', 'Other', 'corndog@gmail.com', 10, 1470, 3, 700, 8600, 7130),
(28, 'Rojin', 'Carl', 'Male', 'carlrojin@gmail.com', 11, 1820, 8, 2500, 11900, 10080),
(29, 'Escabas', 'Arjay', 'Male', 'escabas@gmail.com', 9, 1820, 7, 2000, 11100, 9280),
(31, 'Pacalna', 'Asnari', 'Male', 'pacalna@gmail.com', 9, 1470, 6, 1000, 9800, 8330);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `ot_id` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `none` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`ot_id`, `rate`, `none`) VALUES
(1, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `salary_rate` int(10) NOT NULL,
  `none` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_rate`, `none`) VALUES
(1, 7000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ace', '12345'),
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `dept` (`dept`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
