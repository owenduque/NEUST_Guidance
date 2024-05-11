-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 02:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bongabon_gm`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `appointment_id` int(11) NOT NULL,
  `request_type` int(11) NOT NULL DEFAULT 2,
  `student_id` int(11) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `appointment_time_from` time DEFAULT NULL,
  `appointment_time_to` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'minute(s)',
  `subject` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`appointment_id`, `request_type`, `student_id`, `appointment_date`, `appointment_time`, `appointment_time_from`, `appointment_time_to`, `duration`, `subject`, `status`, `reason`, `counselor_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2024-04-18', '14:53:00', '14:53:00', '15:53:00', 60, 'test', 1, 'test', 1, '2024-04-18 06:54:04', '2024-04-18 06:54:04'),
(2, 2, 2, '2024-04-22', '14:10:00', '14:10:00', '15:10:00', 60, 'test2', 1, 'test2', 1, '2024-04-20 06:11:06', '2024-04-20 06:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request_history`
--

CREATE TABLE `appointment_request_history` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_guidance_module`
--

CREATE TABLE `career_guidance_module` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pages` int(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `date_uploaded` date NOT NULL DEFAULT current_timestamp(),
  `date_edited` date DEFAULT current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coc_list`
--

CREATE TABLE `coc_list` (
  `id` int(11) NOT NULL,
  `code_of_conduct` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `id` int(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drop_request`
--

CREATE TABLE `drop_request` (
  `drop_request_id` int(11) NOT NULL,
  `request_type` int(11) NOT NULL DEFAULT 3,
  `student_id` int(11) NOT NULL,
  `request_date` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drop_request`
--

INSERT INTO `drop_request` (`drop_request_id`, `request_type`, `student_id`, `request_date`, `reason`, `status`, `notes`, `counselor_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2024-04-30', 'i dont want to study anymore', 1, NULL, 1, '2024-04-18 07:31:32', '2024-04-18 07:31:32'),
(2, 3, 10, '2024-04-22', 'test2', 1, NULL, 1, '2024-04-20 07:11:41', '2024-04-20 07:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `drop_request_history`
--

CREATE TABLE `drop_request_history` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodmoral_request`
--

CREATE TABLE `goodmoral_request` (
  `request_id` int(11) NOT NULL,
  `request_type` int(11) NOT NULL DEFAULT 4,
  `student_id` int(11) NOT NULL,
  `request_date` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goodmoral_request`
--

INSERT INTO `goodmoral_request` (`request_id`, `request_type`, `student_id`, `request_date`, `reason`, `status`, `notes`, `counselor_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2024-04-30', 'test', 1, NULL, 1, '2024-04-18 07:49:58', '2024-04-18 07:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `goodmoral_request_history`
--

CREATE TABLE `goodmoral_request_history` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`id`, `grade_level`) VALUES
(1, 'Grade 7'),
(2, 'Grade 8'),
(3, 'Grade 9'),
(4, 'Grade 10');

-- --------------------------------------------------------

--
-- Table structure for table `request_history`
--

CREATE TABLE `request_history` (
  `id` int(255) NOT NULL,
  `request_type` int(255) NOT NULL,
  `request_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 1,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_history`
--

INSERT INTO `request_history` (`id`, `request_type`, `request_id`, `student_id`, `status`, `total`, `request_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 1, 1, '2024-04-18 14:54:04', '2024-04-18 06:54:04', '2024-04-18 06:54:04'),
(2, 3, 1, 2, 1, 1, '2024-04-18 15:31:32', '2024-04-18 07:31:32', '2024-04-18 07:31:32'),
(3, 4, 1, 2, 1, 1, '2024-04-18 15:49:58', '2024-04-18 07:49:58', '2024-04-18 07:49:58'),
(4, 2, 2, 2, 1, 1, '2024-04-20 14:11:06', '2024-04-20 06:11:06', '2024-04-20 06:11:06'),
(5, 3, 2, 10, 1, 1, '2024-04-20 15:11:41', '2024-04-20 07:11:41', '2024-04-20 07:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

CREATE TABLE `request_type` (
  `id` int(11) NOT NULL,
  `request_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`id`, `request_type`) VALUES
(1, 'student concern'),
(2, 'appointment'),
(3, 'dropping form'),
(4, 'good moral certificate');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Cancelled'),
(3, 'Approved'),
(4, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `student_img` longblob DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `lrn` varchar(255) DEFAULT NULL,
  `house_no_street` varchar(255) DEFAULT NULL,
  `baranggay` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT current_timestamp(),
  `age` int(255) NOT NULL DEFAULT 0,
  `sex` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `living_with` varchar(255) DEFAULT NULL,
  `no_of_siblings` int(50) NOT NULL DEFAULT 0,
  `position` varchar(50) DEFAULT NULL,
  `elem_school` varchar(255) DEFAULT NULL,
  `last_grade_completed` varchar(50) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `school_year_start` date NOT NULL DEFAULT current_timestamp(),
  `school_year_end` date NOT NULL DEFAULT current_timestamp(),
  `gen_average` float NOT NULL DEFAULT 0,
  `current_grade` int(20) NOT NULL DEFAULT 0,
  `current_section` varchar(255) DEFAULT NULL,
  `current_year_start` date NOT NULL DEFAULT current_timestamp(),
  `current_year_end` date NOT NULL DEFAULT current_timestamp(),
  `adviser` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_img`, `user_type`, `user_id`, `email`, `firstname`, `middlename`, `lastname`, `suffix`, `lrn`, `house_no_street`, `baranggay`, `municipality`, `province`, `contact_no`, `birthday`, `age`, `sex`, `nationality`, `religion`, `father`, `father_occupation`, `mother`, `mother_occupation`, `living_with`, `no_of_siblings`, `position`, `elem_school`, `last_grade_completed`, `school_address`, `school_id`, `school_year_start`, `school_year_end`, `gen_average`, `current_grade`, `current_section`, `current_year_start`, `current_year_end`, `adviser`, `created_at`, `updated_at`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `student_concern`
--

CREATE TABLE `student_concern` (
  `id` int(11) NOT NULL,
  `request_type` int(11) NOT NULL DEFAULT 1,
  `victim_name` varchar(255) NOT NULL,
  `victim_age` int(10) NOT NULL,
  `victim_gender` varchar(20) NOT NULL,
  `victim_parent_guardian` varchar(255) NOT NULL,
  `victim_parent_contact` varchar(11) NOT NULL,
  `victim_class_adviser` varchar(255) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `complainant_address` varchar(255) NOT NULL,
  `complainant_contact` varchar(11) NOT NULL,
  `relation_to_victim` varchar(255) NOT NULL,
  `offender_name` varchar(255) NOT NULL,
  `offender_age` int(25) NOT NULL,
  `offender_gender` varchar(25) NOT NULL,
  `offender_grade_section` varchar(255) NOT NULL,
  `offender_parent_guardian` varchar(255) NOT NULL,
  `offender_parent_contact` varchar(11) NOT NULL,
  `offender_class_adviser` varchar(255) NOT NULL,
  `date_request` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `date_to_pickup` date DEFAULT NULL,
  `time_pickup` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `first_name`, `last_name`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'detteramos12@gmail.com', 'sample', 'admin', '$2y$10$D5sIlGu9BjeUSAV3de.mNOFFkJKLxrSpVgz6kigbb1M7HLY5JLX9i', 1, '2024-04-06 17:31:25', '2024-04-06 17:31:25'),

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'counselor'),
(2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_request_history`
--
ALTER TABLE `appointment_request_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coc_list`
--
ALTER TABLE `coc_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_request`
--
ALTER TABLE `drop_request`
  ADD PRIMARY KEY (`drop_request_id`);

--
-- Indexes for table `drop_request_history`
--
ALTER TABLE `drop_request_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goodmoral_request`
--
ALTER TABLE `goodmoral_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `goodmoral_request_history`
--
ALTER TABLE `goodmoral_request_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_history`
--
ALTER TABLE `request_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_type`
--
ALTER TABLE `request_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_request_history`
--
ALTER TABLE `appointment_request_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coc_list`
--
ALTER TABLE `coc_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor`
--
ALTER TABLE `counselor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drop_request`
--
ALTER TABLE `drop_request`
  MODIFY `drop_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drop_request_history`
--
ALTER TABLE `drop_request_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodmoral_request`
--
ALTER TABLE `goodmoral_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goodmoral_request_history`
--
ALTER TABLE `goodmoral_request_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_history`
--
ALTER TABLE `request_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_type`
--
ALTER TABLE `request_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
