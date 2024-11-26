-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2024 at 10:57 PM
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
-- Database: `harmony_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_event_proposal_tbl`
--

CREATE TABLE `club_event_proposal_tbl` (
  `id` int(11) NOT NULL,
  `club_event_name_fld` varchar(128) NOT NULL,
  `target_date_fld` date NOT NULL,
  `participants_fld` varchar(255) NOT NULL,
  `venue_fld` varchar(255) NOT NULL,
  `objectives_fld` text NOT NULL,
  `budget_fld` varchar(128) NOT NULL,
  `status_fld` varchar(255) NOT NULL DEFAULT 'Pending',
  `noted_by_fld` varchar(255) DEFAULT NULL,
  `evaluated_by_fld` varchar(255) DEFAULT NULL,
  `approved_by_fld` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `department_id_fld` int(255) NOT NULL,
  `department_name_fld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`department_id_fld`, `department_name_fld`) VALUES
(1, 'College'),
(2, 'Senior High School');

-- --------------------------------------------------------

--
-- Table structure for table `program_tbl`
--

CREATE TABLE `program_tbl` (
  `program_id_fld` int(255) NOT NULL,
  `program_name_fld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_tbl`
--

INSERT INTO `program_tbl` (`program_id_fld`, `program_name_fld`) VALUES
(1, 'Information Technology'),
(2, 'Computer Engineering'),
(3, 'Tourism Management'),
(4, 'Hospitality Management'),
(5, 'General Education'),
(6, 'Student Affairs Office'),
(7, 'Academic Head'),
(8, 'School Administrator'),
(9, 'Assistant Principal');

-- --------------------------------------------------------

--
-- Table structure for table `queue_rules_tbl`
--

CREATE TABLE `queue_rules_tbl` (
  `queue_id_fld` int(255) NOT NULL,
  `queue_no_id_fld` int(128) NOT NULL,
  `department_id_fld` int(255) NOT NULL,
  `program_id_fld` int(255) NOT NULL,
  `uname_id_fld` int(11) NOT NULL,
  `is_final_fld` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue_rules_tbl`
--

INSERT INTO `queue_rules_tbl` (`queue_id_fld`, `queue_no_id_fld`, `department_id_fld`, `program_id_fld`, `uname_id_fld`, `is_final_fld`) VALUES
(1, 1, 1, 6, 14, 1),
(2, 2, 1, 1, 15, 0),
(3, 2, 1, 2, 15, 0),
(4, 2, 1, 3, 16, 0),
(5, 2, 1, 4, 16, 0),
(6, 2, 1, 5, 17, 1),
(7, 3, 1, 7, 11, 1),
(8, 4, 1, 8, 3, 1),
(9, 1, 2, 6, 14, 1),
(10, 2, 2, 9, 12, 1),
(11, 3, 2, 7, 11, 1),
(12, 4, 2, 8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `queue_tbl`
--

CREATE TABLE `queue_tbl` (
  `queue_no_id_fld` int(255) NOT NULL,
  `queue_name_fld` varchar(255) NOT NULL,
  `queue_no_fld` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue_tbl`
--

INSERT INTO `queue_tbl` (`queue_no_id_fld`, `queue_name_fld`, `queue_no_fld`) VALUES
(1, 'First Noted By', 1),
(2, 'Second Noted By', 2),
(3, 'Evaluated By', 3),
(4, 'Approved By', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `uname_id_fld` int(11) NOT NULL,
  `uname_fld` varchar(128) NOT NULL,
  `fname_fld` varchar(128) NOT NULL,
  `lname_fld` varchar(128) NOT NULL,
  `department_id_fld` int(255) DEFAULT NULL,
  `role_fld` varchar(255) NOT NULL,
  `email_fld` varchar(255) NOT NULL,
  `password_hash_fld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`uname_id_fld`, `uname_fld`, `fname_fld`, `lname_fld`, `department_id_fld`, `role_fld`, `email_fld`, `password_hash_fld`) VALUES
(1, 'd0tag0dzZz', 'Carl', 'Pioquinto', NULL, 'Administrator', 'adrinecarlpioquinto@gmail.com', '$2y$10$1v5k8wXuuQP.QHuHBdeKd.gQS5V1PXrKNZH0cDZ7NpC2OUrqHedyu'),
(2, 'watchasay', 'Jason', 'Derulo', NULL, 'Administrator', 'derulo@gmail.com', '$2y$10$haYOTeboVK09gkhO5ViVzew9YaIAbAJejCGfh1NG6pxTn59fTBuNK'),
(3, 'aredsa', 'Wally', 'Bayola', NULL, 'Campus Supervisor', 'wallybayola@example.com', '$2y$10$PGmB.UGXq6gPiO8y/T6NuO2QamR820jDQ0E73Pdp4vUQUr04E.erq'),
(4, 'christmaspasko', 'Mariah', 'Carey', 2, 'Club Advisor', 'christmas@gmail.com', '$2y$10$n8PImjIVSrtf653gJ.c79uZMvl1yPLYY8Rg1SPrihZWpUHQh9gGZG'),
(11, 'sheknowles', 'Beyonce', 'Knowles', NULL, 'Campus Supervisor', 'sheknowles@gmail.com', '$2y$10$QzDRW68vesL6hF2ijlObS.bxWp/nodxXGgzhXY/kFc1yZPbpxidVq'),
(12, 'xanderford', 'Xander', 'Ford', NULL, 'Campus Supervisor', 'xanderford@gmail.com', '$2y$10$2ONwgIRcneDXtmjijYxsWOqv2qz0u9dJ8gURG00yQcWNc/ciuwYJe'),
(13, 'thankyounext', 'Ariana', 'Grande', NULL, 'Campus Supervisor', 'thankyounext@gmail.com', '$2y$10$.diqVKxpZOJlkZuoInua5.j6M5dAjdTitlwpg7.XLvGNhrt5VC2fa'),
(14, 'dummyaccount1', 'Jozelle', 'Ann', NULL, 'Campus Supervisor', 'dummyaccount1@example.com', '$2y$10$6v2kTJehUmd2cFTsXaa.Kuq8nJ6qs6FgpnvqcBRBPoU3QFD0bVy7q'),
(15, 'dummyaccount2', 'Ace', 'Troy', NULL, 'Campus Supervisor', 'dummyaccount2@gmail.com', '$2y$10$za4akwDVJutPVOZ4k2CNe.timM65XZE7S1pJpBMyJYYyDURnPAxP2'),
(16, 'dummyaccount3', 'Stephen', 'Chase', NULL, 'Campus Supervisor', 'dummyaccount3@gmail.com', '$2y$10$2NnxKiC1gPr1x215ln2yWu/V1x3r4tcGdgLaiXlOhRLVb1yPokBMm'),
(17, 'dummyaccount4', 'Guido', 'Mista', NULL, 'Campus Supervisor', 'dummyaccount4@gmail.com', '$2y$10$vcqIb2590.SPgiQNwUfzdewYWCEHeES70vcCGscK4s39qKQo1M6rq'),
(18, 'phoenixwright', 'Phoenix', 'Wright', 1, 'Club Advisor', 'phoenixwright@gmail.com', '$2y$10$RZLzzA/lxCHHao7NLwUx2OPiAhnKSUSwKnBl1775YnQQMKR.5KnbO'),
(19, 'milesedgeworth', 'Miles', 'Edgeworth', 1, 'Club Advisor', 'milesedgeworth@gmail.com', '$2y$10$5ydqTLR1nVW.4TJeR15bXOvu3hD8I7hFjBm3spfhWjl7tAHk3YAoG'),
(20, 'apollojustice', 'Apollo', 'Justice', 1, 'Club Advisor', 'apollojustice@gmail.com', '$2y$10$PtjtIXb6/Rl9FcI9axRlQu3MWf.Z6xIzvjHXESoxdVHbC7hKqn84S'),
(21, 'athenacykes', 'Athena', 'Cykes', 1, 'Club Advisor', 'athenacykes@gmail.com', '$2y$10$CbjnM0IwqhqYGsXP2wrptuzzwMclYxCsmlxgFKbrl.X89IyygAcNy'),
(22, 'cloudsdiosan', 'Clouds', 'Diosan', NULL, 'Administrator', 'cloudsdiosan@gmail.com', '$2y$10$eWKmjXOl5vRlPDji6Z5ME.Tli8..QEvvEEX4YYPywE/QAhhdkwzN6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_event_proposal_tbl`
--
ALTER TABLE `club_event_proposal_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`department_id_fld`);

--
-- Indexes for table `program_tbl`
--
ALTER TABLE `program_tbl`
  ADD PRIMARY KEY (`program_id_fld`);

--
-- Indexes for table `queue_rules_tbl`
--
ALTER TABLE `queue_rules_tbl`
  ADD PRIMARY KEY (`queue_id_fld`),
  ADD KEY `uname_id_fld` (`uname_id_fld`),
  ADD KEY `department_id_fld_fk` (`department_id_fld`),
  ADD KEY `program_id_fld_fk` (`program_id_fld`),
  ADD KEY `queue_no_id_fld_fk` (`queue_no_id_fld`) USING BTREE;

--
-- Indexes for table `queue_tbl`
--
ALTER TABLE `queue_tbl`
  ADD PRIMARY KEY (`queue_no_id_fld`) USING BTREE,
  ADD KEY `queue_no_fld` (`queue_no_fld`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`uname_id_fld`),
  ADD UNIQUE KEY `email_fld` (`email_fld`),
  ADD UNIQUE KEY `uname_fld` (`uname_fld`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club_event_proposal_tbl`
--
ALTER TABLE `club_event_proposal_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `department_id_fld` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `program_id_fld` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `queue_rules_tbl`
--
ALTER TABLE `queue_rules_tbl`
  MODIFY `queue_id_fld` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `queue_tbl`
--
ALTER TABLE `queue_tbl`
  MODIFY `queue_no_id_fld` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `uname_id_fld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queue_rules_tbl`
--
ALTER TABLE `queue_rules_tbl`
  ADD CONSTRAINT `department_id_fld_fk` FOREIGN KEY (`department_id_fld`) REFERENCES `department_tbl` (`department_id_fld`),
  ADD CONSTRAINT `program_id_fld_fk` FOREIGN KEY (`program_id_fld`) REFERENCES `program_tbl` (`program_id_fld`),
  ADD CONSTRAINT `queue_no_id_fld_fk` FOREIGN KEY (`queue_no_id_fld`) REFERENCES `queue_tbl` (`queue_no_id_fld`),
  ADD CONSTRAINT `uname_id_fld_fk` FOREIGN KEY (`uname_id_fld`) REFERENCES `user_tbl` (`uname_id_fld`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
