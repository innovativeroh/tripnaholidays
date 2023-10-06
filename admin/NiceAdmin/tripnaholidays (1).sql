-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 06:16 AM
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
-- Database: `tripnaholidays`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'pansu@gmail.com', '$2y$10$5TJotdiRZLoXuEviJKlKOuaRCl86/8th9oiRFxlJmlA8..PfzQE0O', 0, '2023-10-05 15:12:33'),
(2, 'innovativeroh@gmail.com', '$2y$10$ZzsBt8JlD8TiSrvwSl0p.epeo8XvdR5M/nKtJ7PCVXTO3LgJq0Thm', 1, '2023-10-06 03:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `application_history`
--

CREATE TABLE `application_history` (
  `id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `randCode` text NOT NULL,
  `dateCount` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_history`
--

INSERT INTO `application_history` (`id`, `user_to`, `connect`, `randCode`, `dateCount`, `status`) VALUES
(6, '9', '3', 'LDSW', '2023-09-16', '1'),
(7, '10', '3', 'MPMO', '2023-09-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `config_list_charges`
--

CREATE TABLE `config_list_charges` (
  `id` int(11) NOT NULL,
  `visa_type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `process_time` varchar(255) NOT NULL,
  `stay_duration` varchar(255) NOT NULL,
  `visa_validity` varchar(255) NOT NULL,
  `amount_per_traveller` varchar(255) NOT NULL,
  `our_fees` varchar(255) NOT NULL,
  `embassey_fees_18` varchar(255) NOT NULL,
  `embassey_fees_18p` varchar(255) NOT NULL,
  `embassey_fees_75` varchar(255) NOT NULL,
  `covid_insurance` varchar(255) NOT NULL,
  `connect` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config_list_charges`
--

INSERT INTO `config_list_charges` (`id`, `visa_type`, `title`, `process_time`, `stay_duration`, `visa_validity`, `amount_per_traveller`, `our_fees`, `embassey_fees_18`, `embassey_fees_18p`, `embassey_fees_75`, `covid_insurance`, `connect`) VALUES
(3, 'eVISA', '', '3 working Days', '30 days', '60 days', '6949', '599', '6350', '6800', '1200', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `conifg_country`
--

CREATE TABLE `conifg_country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `symbol_code` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conifg_country`
--

INSERT INTO `conifg_country` (`id`, `country_name`, `symbol_code`, `active`) VALUES
(2, 'United States Of America', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `passports`
--

CREATE TABLE `passports` (
  `id` int(11) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `pass_expiry_date` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `conn` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passports`
--

INSERT INTO `passports` (`id`, `passport_number`, `name`, `surname`, `gender`, `date_of_birth`, `place_of_birth`, `pass_expiry_date`, `address_1`, `address_2`, `city`, `state`, `pincode`, `mobile`, `email`, `conn`, `status`) VALUES
(24, 'KOXPS8067A', 'Rohan', 'Sidhu', 'Male', '2023-09-16', 'Delhi', '2023-09-16', 'India', 'India', 'Delhi', 'Rajasthan', '302012', '7742648700', 'innovativeroh@gmail.com', '6', '1'),
(25, 'KOXPS8067A', 'Rohan', 'Sidhu', 'Male', '2023-09-23', 'Jaipur', '2023-09-23', 'Jaipur', 'Jaipur', 'Jaipur', 'Rajasthan', '302012', '7742648700', 'sidhuroh@outlook.com', '7', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `date_created`, `ip_address`) VALUES
(9, 'innovativeroh@gmail.com', '12-09-23', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` int(11) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expired` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_otp`
--

INSERT INTO `user_otp` (`id`, `connect`, `otp`, `expired`) VALUES
(20, '9', '2603', '1'),
(21, '9', '2947', '1'),
(22, '9', '0829', '1'),
(23, '9', '0672', '1'),
(24, '9', '7936', '1'),
(25, '9', '4519', '1'),
(26, '10', '7365', '1'),
(27, '10', '2849', '1'),
(28, '10', '5213', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_history`
--
ALTER TABLE `application_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_list_charges`
--
ALTER TABLE `config_list_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conifg_country`
--
ALTER TABLE `conifg_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passports`
--
ALTER TABLE `passports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_history`
--
ALTER TABLE `application_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `config_list_charges`
--
ALTER TABLE `config_list_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conifg_country`
--
ALTER TABLE `conifg_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passports`
--
ALTER TABLE `passports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
