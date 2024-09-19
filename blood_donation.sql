-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 04:22 PM
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
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'cbfdac6008f9cab4083784cbd1874f76618d2a97');

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

CREATE TABLE `blood_banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `available_blood_groups` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `name`, `location`, `contact_number`, `available_blood_groups`) VALUES
(1, 'Gopal blood bank', 'COLOMBO', '0758969352', 'AB+,A+,B+'),
(3, 'Central City Blood Bank', 'Newyork', '(555) 789-1234', 'A+, B-, O+, AB-'),
(4, 'Riverside Blood Donation Center', 'Alberta', '(555) 234-5678', 'O-, A-, B+, AB+'),
(5, 'Downtown Blood Bank', 'Toronto', '(555) 345-6789', 'A+, B-, O+, AB-'),
(6, 'Northside Blood Services', 'Toronto', '(555) 456-7890', 'A-, B+, O-, AB-'),
(7, 'Eastside Blood Bank', 'Alberta', '(555) 567-8901', 'O+, A+, B-, AB+');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation_events`
--

CREATE TABLE `blood_donation_events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_location` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_stocks`
--

CREATE TABLE `blood_stocks` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `available_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_stocks`
--

INSERT INTO `blood_stocks` (`id`, `blood_group`, `available_units`) VALUES
(1, 'AB+', 60),
(2, 'O+', 12),
(3, 'AB-', 78),
(4, 'B+', 21),
(5, 'A-', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(2, 'Ram', 'veenusatheesan123@gmail.com', 'good work', '2024-09-17 13:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `donation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `blood_group`, `donation_date`) VALUES
(1, 'Rajesh', 'A+', '2024-09-17'),
(2, 'John Adams', 'O+', '2024-09-27'),
(3, 'Sarah Lee', 'A-', '2024-09-02'),
(4, 'Michael Johnson', 'B+', '2024-06-19'),
(5, 'Emily Martinez', 'AB-', '2024-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `blood_group`, `contact`) VALUES
(1, 'veenu', 'AB+', '0754733571'),
(2, 'Ram', 'AB+', '0758787985'),
(3, 'Alice Johnson', 'A+', '(555) 123-4567'),
(4, 'Clara Williams', 'O+', '555) 345-6789'),
(5, 'David Brown', 'AB-', '(555) 456-7890');

-- --------------------------------------------------------

--
-- Table structure for table `donors1`
--

CREATE TABLE `donors1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `health_status` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donors1`
--

INSERT INTO `donors1` (`id`, `name`, `age`, `blood_group`, `contact`, `health_status`, `email`, `password`) VALUES
(1, 'Kajankumar', 45, 'B+', '0754733571', 'no issues', 'kajan@gmail.com', '$2y$10$El4.BRw7iTZ1o1IDU.0qgO3shoh6/pvgb6m7xr/t1pumt.UFfINA6');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `location`) VALUES
(1, 'secure blood bank', '2024-09-18', 'COLOMBO 1'),
(2, 'Community Blood Drive', '2024-10-25', 'Batticaloa'),
(3, 'Annual Blood Donation Gala', '2024-12-26', 'Vavuniya'),
(4, ' Summer Blood Donation Fair', '2025-01-09', 'Jaffna'),
(5, 'Blood Donation Week Kickoff', '2024-09-28', 'Mannar');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `volunteer` tinyint(1) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `event_id`, `name`, `contact`, `email`, `volunteer`, `registration_date`) VALUES
(1, 1, 'Kajankumar', '0758486982', 'Raja@gmail.com', 1, '2024-09-17 13:48:20'),
(2, 1, 'Bill Smith', '0786589952', '2019icts66@vau.jfn.ac.lk', 1, '2024-09-18 14:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donation_events`
--
ALTER TABLE `blood_donation_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors1`
--
ALTER TABLE `donors1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_banks`
--
ALTER TABLE `blood_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood_donation_events`
--
ALTER TABLE `blood_donation_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donors1`
--
ALTER TABLE `donors1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
