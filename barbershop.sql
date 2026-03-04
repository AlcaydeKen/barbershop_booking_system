-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 08:17 PM
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
-- Database: `barbershop`
--
CREATE DATABASE IF NOT EXISTS `barbershop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `barbershop`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `date`, `action`, `admin_username`) VALUES
(701, 12, '2024-01-25 18:49:51', 'Cleared Activity Logs', 'admin'),
(702, 12, '2024-01-25 18:50:29', 'Opened User Activity Log Dashboard', 'admin'),
(703, 12, '2024-01-25 18:51:07', 'Opened Admin Activity Log Dashboard', 'admin'),
(704, 12, '2024-01-25 18:52:02', 'Opened Admin Activity Log Dashboard', 'admin'),
(705, 12, '2024-01-25 18:52:16', 'Opened Admin Activity Log Dashboard', 'admin'),
(706, 12, '2024-01-25 18:52:21', 'Opened Admin Activity Log Dashboard', 'admin'),
(707, 12, '2024-01-25 18:52:23', 'Opened Admin Activity Log Dashboard', 'admin'),
(708, 12, '2024-01-25 18:52:31', 'Opened Admin Activity Log Dashboard', 'admin'),
(709, 12, '2024-01-25 18:53:18', 'Opened Admin Activity Log Dashboard', 'admin'),
(710, 12, '2024-01-25 18:53:35', 'Opened Admin Activity Log Dashboard', 'admin'),
(711, 12, '2024-01-25 18:56:03', 'Opened Admin Activity Log Dashboard', 'admin'),
(712, 12, '2024-01-25 18:56:04', 'Opened Admin Activity Log Dashboard', 'admin'),
(713, 12, '2024-01-25 18:56:05', 'Opened Messages Dashboard', 'admin'),
(714, 12, '2024-01-25 18:56:56', 'Opened Messages Dashboard', 'admin'),
(715, 12, '2024-01-25 18:59:08', 'Opened Service Categories Dashboard', 'admin'),
(716, 12, '2024-01-25 19:15:42', 'Opened Service Categories Dashboard', 'admin'),
(717, 12, '2024-01-25 19:15:43', 'Opened Messages Dashboard', 'admin'),
(718, 12, '2024-01-25 19:15:44', 'Opened Messages Dashboard', 'admin'),
(719, 12, '2024-01-25 19:16:29', 'Opened Messages Dashboard', 'admin'),
(720, 12, '2024-01-25 19:16:35', 'Opened Clients Dashboard', 'admin'),
(721, 12, '2024-01-25 19:16:36', 'Opened Employees Dashboard', 'admin'),
(722, 12, '2024-01-25 19:16:36', 'Opened Employees Schedule Dashboard', 'admin'),
(723, 12, '2024-01-25 19:16:37', 'Opened Employees Dashboard', 'admin'),
(724, 12, '2024-01-25 19:16:37', 'Opened Clients Dashboard', 'admin'),
(725, 12, '2024-01-25 19:16:38', 'Opened Messages Dashboard', 'admin'),
(726, 12, '2024-01-25 19:16:39', 'Opened Services Dashboard', 'admin'),
(727, 12, '2024-01-25 19:16:42', 'Opened Services Dashboard', 'admin'),
(728, 12, '2024-01-25 19:16:42', 'Opened Service Categories Dashboard', 'admin'),
(729, 12, '2024-01-25 19:16:43', 'Opened Main Dashboard', 'admin'),
(730, 12, '2024-01-25 19:16:43', 'Opened Service Categories Dashboard', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time_expected` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `date_created`, `client_id`, `employee_id`, `start_time`, `end_time_expected`, `canceled`, `cancellation_reason`) VALUES
(29, '2024-01-20 04:05:00', 15, 6, '2024-01-27 11:00:00', '2024-01-27 11:20:00', 1, ''),
(30, '2024-01-20 05:24:00', 16, 4, '2024-01-22 01:00:00', '2024-01-22 01:20:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `username`, `email`, `full_name`, `password`) VALUES
(12, 'admin', 'admin@gmail.com', 'Admin', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `phone_number`, `client_email`) VALUES
(15, 'UserFN', 'UserLN', '0955555555', 'user@customer.com'),
(16, 'user1', 'ln', '1212121212', 'user@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `phone_number`, `email`) VALUES
(4, 'John Eric', 'Ronquillo', '09111111111', 'eric@barber.com'),
(5, 'Joshua Bryant', 'Pacuan', '09222222222', 'pacs@barber.com'),
(6, 'Tom Robert', 'Cruz', '09333333333', 'tom@barber.com'),
(7, 'Ruzelle', 'Gabriel', '09444444444', 'ruzelle@barber.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees_schedule`
--

CREATE TABLE `employees_schedule` (
  `id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `day_id` tinyint(1) NOT NULL,
  `from_hour` time NOT NULL,
  `to_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees_schedule`
--

INSERT INTO `employees_schedule` (`id`, `employee_id`, `day_id`, `from_hour`, `to_hour`) VALUES
(41, 4, 1, '08:30:00', '17:30:00'),
(42, 4, 4, '08:30:00', '17:30:00'),
(43, 4, 7, '10:00:00', '17:00:00'),
(44, 5, 2, '09:30:00', '18:30:00'),
(45, 5, 5, '09:30:00', '18:30:00'),
(46, 5, 7, '10:00:00', '17:00:00'),
(47, 6, 3, '10:30:00', '19:30:00'),
(48, 6, 6, '10:30:00', '19:30:00'),
(49, 6, 7, '10:00:00', '17:00:00'),
(50, 7, 4, '08:30:00', '17:30:00'),
(51, 7, 6, '10:30:00', '19:30:00'),
(52, 7, 7, '10:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `message`) VALUES
(1, 19, 'Ken', 'ken@gmail.com', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(5) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_price` decimal(6,2) NOT NULL,
  `service_duration` int(5) NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `service_price`, `service_duration`, `category_id`) VALUES
(1, 'Hair Cut', 'Skilled and artistic trimming or styling of hair to achieve a desired length, shape, or design, often performed by professional hairstylists', 100.00, 20, 4),
(2, 'Hair Styling', 'Creative manipulation and arrangement of hair to achieve a desired look, encompassing techniques such as cutting, shaping, and the use of various styling products', 150.00, 15, 4),
(3, 'Hair Triming', 'Precise removal of small lengths of hair to maintain shape, eliminate split ends, or achieve a specific length, typically done to promote overall hair health and appearance', 90.00, 10, 4),
(4, 'Clean Shaving', 'Meticulous removal of facial hair using a razor or other grooming tools, resulting in a smooth and closely cropped appearance', 100.00, 20, 2),
(5, 'Beard Triming', 'Meticulous shaping, grooming, and maintenance of facial hair, involving the controlled removal of excess length to achieve a well-defined and polished beard style', 150.00, 15, 2),
(6, 'Smooth Shave', 'Careful and thorough removal of facial hair using a razor or grooming tool, resulting in a sleek and hair-free surface on the skin', 150.00, 20, 2),
(7, 'White Facial', 'Skincare technique involving products that create a white or light-colored mask on the face for purposes such as cleansing, moisturizing, or treating the skin', 90.00, 15, 3),
(8, 'Face Cleaning', 'Removing impurities, dirt, and excess oil from the facial skin using cleansers or other skincare products, promoting a refreshed and clear complexion', 80.00, 20, 3),
(9, 'Bright Tuning', 'Treatments designed to improve skin tone, reduce hyperpigmentation, and promote a radiant complexion by addressing issues such as dark spots, uneven skin tone, or dullness', 100.00, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services_booked`
--

CREATE TABLE `services_booked` (
  `appointment_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services_booked`
--

INSERT INTO `services_booked` (`appointment_id`, `service_id`) VALUES
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`category_id`, `category_name`) VALUES
(2, 'Shaving'),
(3, 'Face Masking'),
(4, 'Haircut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `code` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`, `user_type`, `code`) VALUES
(19, 'User', 'kenjaredml@gmail.com', '0921212121', 'user123', 'user123', 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `date`, `action`, `username`) VALUES
(164, 19, '2024-01-25 18:56:15', 'Opened Home Page', 'User'),
(165, 19, '2024-01-25 19:04:54', 'Opened Home Page', 'User'),
(166, 19, '2024-01-25 19:06:58', 'Opened Home Page', 'User'),
(167, 19, '2024-01-25 19:10:45', 'Opened Home Page', 'User'),
(168, 19, '2024-01-25 19:14:47', 'Opened Home Page', 'User'),
(169, 19, '2024-01-25 19:14:50', 'Opened Home Page', 'User'),
(170, 19, '2024-01-25 19:15:31', 'Opened Home Page', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `FK_client_appointment` (`client_id`),
  ADD KEY `FK_employee_appointment` (`employee_id`);

--
-- Indexes for table `barber_admin`
--
ALTER TABLE `barber_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`employee_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_service_category` (`category_id`);

--
-- Indexes for table `services_booked`
--
ALTER TABLE `services_booked`
  ADD PRIMARY KEY (`appointment_id`,`service_id`),
  ADD KEY `FK_SB_service` (`service_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD CONSTRAINT `admin_logs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `barber_admin` (`admin_id`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_client_appointment` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_employee_appointment` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD CONSTRAINT `FK_emp` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_service_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `services_booked`
--
ALTER TABLE `services_booked`
  ADD CONSTRAINT `FK_SB_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SB_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
