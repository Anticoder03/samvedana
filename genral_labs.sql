-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 06:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genral_labs`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `features` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `description`, `price`, `features`) VALUES
(1, 'Basic Health Checkup', 'Comprehensive tests for routine health.', 899.00, 'Blood test, Cholesterol levels, Blood pressure monitoring'),
(2, 'Advanced Health Checkup', 'Additional diagnostic tests for a thorough evaluation.', 1299.00, 'Basic package + ECG, Liver function test'),
(3, 'Premium Health Checkup', 'Extensive tests including advanced diagnostics.', 1899.00, 'Advanced package + Thyroid panel, Vitamin levels'),
(4, 'Specialized Package', 'Targeted tests for specific health concerns.', 2599.00, 'Customized tests for cardiac, diabetes, or women’s health');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `health_package` varchar(255) NOT NULL,
  `tests` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `location` text NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `visiting_date` date NOT NULL,
  `report` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `health_package`, `tests`, `name`, `email`, `gender`, `date_of_birth`, `location`, `phone_no`, `visiting_date`, `report`, `created_at`) VALUES
(1, '1', '2', 'Ashish Prajapati', 'ap5381545@gmail.com', 'male', '2025-01-17', '05, Azad nagar dungrifaliya vapi', '09510050494', '2025-01-17', 'rk-logo.png', '2025-01-21 12:32:19'),
(5, '1', '1', 'Ashish Prajapati', 'ap5381545@gmail.com', 'male', '2025-01-08', '05, Azad nagar dungrifaliya vapi', '09510050494', '2025-01-04', 'resume python.pdf', '2025-01-21 10:12:07'),
(6, '1', '1', 'Ashish Prajapati', 'ap5381545@gmail.com', 'male', '2025-01-30', '05, Azad nagar dungrifaliya vapi', '09510050494', '2025-01-09', 'rk-logo.png', '2025-01-21 10:44:45'),
(7, '2', '2', 'Ashish Prajapati', 'ap5381545@gmail.com', 'male', '2025-01-06', '05, Azad nagar dungrifaliya vapi', '09510050494', '2025-01-24', 'Screenshot 2025-01-21 210359.png', '2025-01-21 11:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
