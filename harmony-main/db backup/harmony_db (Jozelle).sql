-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 02:50 AM
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
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id_fld` int(11) NOT NULL,
  `uname_fld` varchar(128) NOT NULL,
  `fname_fld` varchar(128) NOT NULL,
  `lname_fld` varchar(128) NOT NULL,
  `role_fld` varchar(255) NOT NULL,
  `email_fld` varchar(255) NOT NULL,
  `password_hash_fld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id_fld`, `uname_fld`, `fname_fld`, `lname_fld`, `role_fld`, `email_fld`, `password_hash_fld`) VALUES
(1, 'd0tag0dzZz', 'Carl', 'Pioquinto', 'Administrator', 'adrinecarlpioquinto@gmail.com', '$2y$10$1v5k8wXuuQP.QHuHBdeKd.gQS5V1PXrKNZH0cDZ7NpC2OUrqHedyu'),
(2, 'watchasay', 'Jason', 'Derulo', 'Administrator', 'derulo@gmail.com', '$2y$10$w6KXKw2YMH3vmTZGgEEi2edPIou3IIZRohUwa50VBQ8qmGlo2w6BG'),
(3, 'aredsa', 'Wally', 'Bayola', 'Campus Supervisor', 'wallybayola@example.com', '$2y$10$PGmB.UGXq6gPiO8y/T6NuO2QamR820jDQ0E73Pdp4vUQUr04E.erq'),
(4, 'christmaspasko', 'Mariah', 'Carey', 'Club Advisor', 'christmas@gmail.com', '$2y$10$n8PImjIVSrtf653gJ.c79uZMvl1yPLYY8Rg1SPrihZWpUHQh9gGZG'),
(5, 'testsubject', 'Stephen', 'Nepomuceno', 'Administrator', 'testsubject@gmail.com', '$2y$10$4gV6kumfHd6LmakhSMYSne5MvQ2ZbZRZkrMsbfB9FPUYmMKqgZTXu'),
(6, 'sheknowles', 'Beyonce', 'Knowles', 'Campus Supervisor', 'sheknowles@example.com', '$2y$10$DOw030CNMJQ9uFR/21Y5BOiOp7JpCAhF8ghtycQWRSo4fT6Xc7h7O'),
(7, 'karmaisab', 'Jojo', 'Siwa', 'Administrator', 'karmaisab@gmail.com', '$2y$10$jeUdc//CIx/EealePyxfxu/j6iQt/b65jtIS4o6rItt1KVYP9dxIy'),
(8, 'testaccount', 'Phoenix', 'Wright', 'Club Advisor', 'ACEattorney@gmail.com', '$2y$10$L3BwCF4kVHLJ7V3yMFb2ZuTTL7yphEZpi7UKh7ymw5g/y5Vdh1Ox2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id_fld`),
  ADD UNIQUE KEY `email_fld` (`email_fld`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id_fld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
