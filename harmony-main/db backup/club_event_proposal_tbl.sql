-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 01:19 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_event_proposal_tbl`
--
ALTER TABLE `club_event_proposal_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club_event_proposal_tbl`
--
ALTER TABLE `club_event_proposal_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
