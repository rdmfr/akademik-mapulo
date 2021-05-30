-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 06:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` varchar(5) NOT NULL,
  `branch` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch`) VALUES
('1', 'Software Engineering'),
('2', 'Multimedia'),
('3', 'Information Management'),
('4', 'Technical Information'),
('5', 'System & Network');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `first_date` date NOT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `description`, `first_date`, `last_date`) VALUES
(1, 'Webinar of Software Engineering', 'A Webinar held by Univ that explan about Software Engineering', '2021-05-09', '2021-05-10'),
(2, 'DevOps Internship Opening', 'DevOps Internship Opening Show held in Univ', '2021-05-06', '2021-05-07'),
(3, 'Marketing For Youth', 'Free Webinar for every College student near univ region', '2021-05-12', '2021-05-12'),
(5, 'Asean Vocational Scholarship', 'Vocational sholarshep held in university of indonesia', '2021-05-30', '2021-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `desc` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `slug`, `content`, `desc`, `date`, `author`, `image_url`) VALUES
(2, 'Trump Justice Department secretly obtained Post reporters’ phone records - The Washington Post', 'trump-justice-department-secretly-obtained-post-reporters’-phone-records-the-washington-post', 'Cameron Barr, The Posts acting executive editor, said: We are deeply troubled by this use of government power to seek access to the communications of journalists. The Department of Justice should imm… [+6951 chars]', 'The action grew out of a leak investigation surrounding reporting on Russia’s role in the 2016 election.', '2021-05-08', 'Devlin Barrett', 'https://storage.googleapis.com/afs-prod/media/f31317baf08e4a79baea5db9d1295f3c/3000.jpeg'),
(3, 'California reports first ever yearly population decline - KCRA Sacramento', 'california-reports-first-ever-yearly-population decline-kcra-sacramento', '(CNN)The US Centers for Disease Control and Prevention on Friday updated its explanations on how coronavirus is transmitted, stressing that inhalation is one of the main ways the virus is spread and … ', 'The new state numbers reflect the state\'s population as of January 2021. State officials say a declining birth rate, plus reductions in international immigration and an increase in deaths because of the coronavirus, led to the state\'s first year-over-year pop…', '2021-05-07', 'KCRA Sacramento', 'https://storage.googleapis.com/afs-prod/media/f31317baf08e4a79baea5db9d1295f3c/3000.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(10) NOT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `subject` varchar(5) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `student_id` int(12) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `semester`, `subject`, `year`, `branch`, `student_id`, `score`) VALUES
(25, '1', '101', 2020, '1', 1010001, 80),
(26, '1', '102', 2020, '1', 1010001, 85),
(27, '1', '101', 2020, '1', 1010002, 90),
(28, '1', '102', 2020, '1', 1010002, 80);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` varchar(5) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`) VALUES
('1', 'One'),
('2', 'Two'),
('3', 'Three');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `contact_no` varchar(25) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `level` enum('admin','faculty') NOT NULL DEFAULT 'faculty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `gender`, `contact_no`, `address`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$rAP/fTLjPZPSv.UB78QzNOAAh04ebVHy4Rxb4xtByaC6FlzhVPmHm', 'Male', '089213456211', '15 Street', 'admin'),
(16, 'Moca', 'moca@gmail.com', '$2y$10$oMlzYe3R8OX8JHtNazkQuuIiyE3j6Kfkoytzki.apXLasjidF7HBG', 'Female', '089123412321', '12 Street', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(12) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8 DEFAULT NULL,
  `contact_no` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `enroll_no` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `contact_no`, `branch`, `address`, `enroll_no`) VALUES
(15, 'Max', 'Andreas', 'max@gmail.com', 'max123', 'Male', '089234156321', '4', 'West Street', 5),
(1010001, 'Demin', 'Andreas', 'demin@email.com', 'demin01', 'Male', '089312567456', '1', 'Pasupati Street', 1),
(1010002, 'Layla', 'Moreal', 'layla@email.com', 'layla12', 'Female', '089313567876', '2', 'British Street', 5),
(1010003, 'Michael', 'Cleint', 'michael@gmail.com', 'michael02', 'Male', '089712368635', '1', 'Back Street 4th', 1),
(1010004, 'Kenny', 'Wilson', 'kenny@gmail.com', 'kenny04', 'Male', '089745631876', '3', '212th West Street', 5),
(1010005, 'Barry', 'Norman', 'barry@gmail.com', 'barry05', 'Male', '089767564321', '1', 'Mediterian Street', 1),
(1010006, 'Japar', 'Sidik', 'jafarsidik45@gmail.com', 'sidik123', 'Male', '088215967854', '4', 'Bandung Street', 9),
(1010007, 'Mona', 'Silvy', 'mona@gmail.com', 'mona07', 'Female', '089212657425', '4', 'Baraga Street', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(5) NOT NULL,
  `subject` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject`) VALUES
('101', 'English I'),
('102', 'Mathematics'),
('103', 'Civic'),
('104', 'Computer Mathematic'),
('105', 'Elementary Algorithm'),
('106', 'Informatics Introduction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `result_ibfk_1` (`semester`),
  ADD KEY `result_ibfk_2` (`subject`),
  ADD KEY `result_ibfk_3` (`branch`),
  ADD KEY `result_ibfk_4` (`student_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97916;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010008;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`semester`) REFERENCES `semester` (`semester_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
