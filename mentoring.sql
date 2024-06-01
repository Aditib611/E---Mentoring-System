-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 07:09 PM
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
-- Database: `mentoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadamics`
--

CREATE TABLE `acadamics` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `prnno` text NOT NULL,
  `year` text NOT NULL,
  `sem` text NOT NULL,
  `cgpa` int(11) NOT NULL,
  `mentor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `achivements`
--

CREATE TABLE `achivements` (
  `id` int(11) NOT NULL,
  `achiv_name` text NOT NULL,
  `achiv_date` varchar(11) NOT NULL,
  `achiv_disc` text NOT NULL,
  `achiv_file` blob NOT NULL,
  `cour_name` text NOT NULL,
  `cour_date` date NOT NULL,
  `cour_disc` text NOT NULL,
  `cour_file` blob NOT NULL,
  `inter_name` text NOT NULL,
  `inter_date` date NOT NULL,
  `inter_disc` text NOT NULL,
  `inter_file` blob NOT NULL,
  `mentee_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achivements`
--

INSERT INTO `achivements` (`id`, `achiv_name`, `achiv_date`, `achiv_disc`, `achiv_file`, `cour_name`, `cour_date`, `cour_disc`, `cour_file`, `inter_name`, `inter_date`, `inter_disc`, `inter_file`, `mentee_email`) VALUES
(32, 'HackerRank CSS Assessment', '2024-04-10', 'description description description description description description description description description description description description', 0x363232355f6373732063657274696669636174652e706466, '30 days master data science ', '2024-04-11', 'desc', 0x323731355f416469746920426861767361722028426172636c617973292e706466, 'Web Full Stack Developemnt', '2024-04-22', 'dew', 0x343435395f696e7465726e736869702063657274696669636174652e706466, 'aditibhavsar611@gmail.com'),
(33, 'Data Analysis Accenture', '2023-09-21', 'Successfully completed data analysis training at Accenture, proficient in leveraging analytical tools and techniques for informed decision-making.', 0x343831305f4461746120416e616c7973697320416363656e747572652e706466, 'Zensar ', '2023-06-30', 'Completed Zensar\'s Employability Skill Program, equipped with essential soft skills and industry-specific knowledge to excel in professional environments.', 0x313932315f7a656e7361722e706466, 'Web Full Stack Developemnt', '2023-03-04', 'Completed Full Stack Development internship at Cognifront, gaining hands-on experience in front-end and back-end technologies, ready to contribute to innovative software solutions.', 0x343934305f696e7465726e736869702063657274696669636174652e706466, 'atulthete2003@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@123gmail.com', 'admin@123', '2023-11-13 20:31:45', '2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(100) NOT NULL,
  `prnno` varchar(12) NOT NULL,
  `attendance` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `prnno`, `attendance`) VALUES
(1, '72151258F', 25),
(2, '72154539G', 32),
(4, '72175898F', 24),
(5, '87598678D', 21),
(7, '72151186E', 54),
(10, '72151424D', 45),
(11, '82569874S', 32),
(13, '72151149E', 41),
(14, '72151186D', 32),
(15, '72151132G', 38),
(16, '72151156F', 45);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(2, 'BCOM1453', 'B.Com', 'Bachelor Of commerce ', '2024-01-02 19:32:46'),
(3, 'BSC12', 'BSC', 'Bachelor  of Science', '2024-01-02 19:33:23'),
(4, 'BC36356', 'BCA', 'Bachelor Of Computer Application', '2024-01-02 19:34:18'),
(5, 'MCA565', 'MCA', 'Master of Computer Application', '2024-01-02 19:34:40'),
(6, 'MBA75', 'MBA', 'Master of Business Administration', '2024-01-02 19:34:59'),
(7, 'BE765', 'BE', 'Bachelor of Engineering', '2024-01-02 19:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `prnno` text NOT NULL,
  `email` text NOT NULL,
  `send_email` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `prnno`, `email`, `send_email`) VALUES
(1, 'UCS19M1117', 'shirsathomkar77@gmail.com', 1),
(2, 'UCS19M1118', 'shirsathomkar512@gmail.com', 1),
(3, 'UCS19M1012', 'prasadbhawar30@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `event_disct` text NOT NULL,
  `posted_datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `event_disct`, `posted_datetime`) VALUES
(13, 'hackathon ', 'hackathon organised on Friday ', '2024-03-27 18:10:29'),
(14, 'hackathon ', 'at 10:00 am', '2024-03-31 12:24:04'),
(15, 'hackathon ', 'at 10:00 am', '2024-03-31 12:24:11'),
(16, 'review meeting', 'at 12:00 in 302 ', '2024-03-31 12:28:10'),
(17, 'Project Presentation ', 'Project Presentation scheduled on 9th April in 215 lab. Attendance is Mandatory', '2024-04-07 08:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `mentee_id` int(11) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `mentor` varchar(255) DEFAULT NULL,
  `q1` varchar(255) DEFAULT NULL,
  `q2` varchar(255) DEFAULT NULL,
  `q3` varchar(255) DEFAULT NULL,
  `q4` varchar(255) DEFAULT NULL,
  `q5` varchar(255) DEFAULT NULL,
  `q6` varchar(255) DEFAULT NULL,
  `q7` varchar(255) DEFAULT NULL,
  `q8` varchar(255) DEFAULT NULL,
  `q9` varchar(255) DEFAULT NULL,
  `q10` varchar(255) DEFAULT NULL,
  `q11` varchar(255) DEFAULT NULL,
  `q12` varchar(255) DEFAULT NULL,
  `q13` varchar(255) DEFAULT NULL,
  `q14` varchar(255) DEFAULT NULL,
  `q15` varchar(255) DEFAULT NULL,
  `q16` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `mentee_id`, `domain`, `mentor`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `comments`, `timestamp`) VALUES
(9, 11, 'Data Science', 'Ms.  Sunita Borse', 'Very much accessible', 'Communicates when there are some important issues', 'Listens on certain occasions', 'Helps sometimes', 'Informs sometimes', 'Always encourages', 'Conducted once in a while', 'Fairly interactive', 'Beneficial', 'Available on most occasions', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Highly equipped', 'Supportive', 'Satisfied', 'good ', '2024-05-28 06:42:25'),
(10, 9, 'Android Development', 'Mr. Vipin Wani', 'Fairly accessible', 'Communicates once in a while', 'Listens on certain occasions', 'Helps sometimes', 'Informs sometimes', 'Occasionally encourages', 'Conducted most of the times', 'Highly interactive', 'Beneficial', 'Available on most occasions', 'Conductive', 'Highly knowledgeable and experienced', 'Highly effective and innovative', 'Equipped', 'Highly supportive', 'Satisfied', 'overall good', '2024-05-28 06:44:35'),
(11, 2, 'Cloud Computing', 'Ms. Madhuri Shinde', 'Fairly accessible', 'Communicates when there are some important issues', 'Rarely listens', 'Rarely helps', 'Informs sometimes', 'Always encourages', 'Conducted most of the times', 'Fairly interactive', 'Beneficial', 'Available on most occasions', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Equipped', 'Supportive', 'Satisfied', 'no suggestions', '2024-05-28 06:49:42'),
(12, 7, 'Cloud Computing', 'Pr. Manoj Suri', 'Very much accessible', 'Communicates regularly', 'Always ready to listen', 'Helps sometimes', 'Regularly informs', 'Always encourages', 'Conducted strictly as per the timetable', 'Fairly interactive', 'Highly beneficial', 'Available always', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Highly equipped', 'Supportive', 'Highly satisfied', 'good', '2024-05-28 06:52:06'),
(13, 4, 'Cloud Computing', 'Ms. Madhuri Shinde', 'Fairly accessible', 'Communicates once in a while', 'Listens on certain occasions', 'Rarely helps', 'Informs sometimes', 'Occasionally encourages', 'Conducted once in a while', 'Fairly interactive', 'Beneficial', 'Available on most occasions', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Equipped', 'Supportive', 'Satisfied', 'no suggestions', '2024-05-28 06:53:55'),
(14, 12, 'Blockchain Technology', 'Ms. Kalpana Metre', 'Fairly accessible', 'Communicates when there are some important issues', 'Listens on certain occasions', 'Helps sometimes', 'Informs sometimes', 'Always encourages', 'Conducted strictly as per the timetable', 'Little interactive', 'Beneficial', 'Available on most occasions', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Equipped', 'Highly supportive', 'Satisfied', 'overall good', '2024-05-28 06:59:24'),
(15, 13, 'Artificial Intelligence', 'Mr. Vaibhav Dabhaade', 'Very much accessible', 'Communicates regularly', 'Listens on certain occasions', 'Always ready', 'Informs sometimes', 'Occasionally encourages', 'Conducted most of the times', 'Fairly interactive\r\n', 'Highly beneficial', 'Available on most occasions', 'Conductive', 'Knowledgeable and experienced', 'Effective and innovative', 'Equipped', 'Supportive', 'Highly satisfied', 'very nice', '2024-05-28 07:07:49'),
(16, 14, 'Software Testing', 'prof. Ashutosh Kale Sir', 'Fairly accessible', 'Communicates when there are some important issues', 'Always ready to listen', 'Always ready', 'Regularly informs', 'Always encourages', 'Conducted most of the times', 'Highly interactive', 'Highly beneficial', 'Available on most occasions', 'Highly conductive', 'Highly knowledgeable and experienced', 'Highly effective and innovative', 'Equipped', 'Supportive', 'Satisfied', 'good', '2024-05-28 07:16:36'),
(17, 15, 'Internet Of Things', 'Ms. Kanchan Pekhale', 'Fairly accessible', 'Communicates when there are some important issues', 'Listens on certain occasions', 'Helps sometimes', 'Informs sometimes', 'Occasionally encourages', 'Conducted most of the times', 'Fairly interactive', 'Beneficial', 'Available always', 'Highly conductive', 'Knowledgeable and experienced', 'Not much effective and innovative', 'Equipped', 'Highly supportive', 'Satisfied', 'good', '2024-05-28 07:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `id` int(11) NOT NULL,
  `prnno` text NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  `egycontactno` varchar(20) DEFAULT NULL,
  `ques` text NOT NULL,
  `isResponded` int(11) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `prnno`, `firstName`, `lastName`, `contactno`, `emailid`, `egycontactno`, `ques`, `isResponded`, `mentor_id`) VALUES
(45, '72151186E', 'Aditi', 'Bhavsar', '9881380390', 'aditibhavsar611@gmail.com', '7589698547', 'hi I have doubt in Android Studio', 1, 31),
(46, '72151258F', 'Pranjal', 'Thorat', '8459929813', 'pt@gmail.com', '9856328965', 'hello i have one doubt', 1, 22),
(47, '72154539G', 'Aditi', 'Shinde', '8080607564', 'aditis@gmail.com', '9812563842', 'doubt in Cloud infrastrucutre', 1, 22),
(48, '72151258F', 'Pranjal', 'Thorat', '8459929813', 'pt@gmail.com', '9856328965', 'query in CC', 1, 22),
(49, '72151186E', 'Aditi', 'Bhavsar', '9881380390', 'aditibhavsar611@gmail.com', '7589698547', 'dobnt in android dev', 1, 31),
(50, '72151186E', 'Aditi', 'Bhavsar', '9881380390', 'aditibhavsar611@gmail.com', '7589698547', 'getting errors ', NULL, 31),
(51, '72151424D', 'Atul', 'Thete', '7859868745', 'atulthete2003@gmail.com', '8459926823', 'Doubt in javascript', 1, 26),
(52, '72151424D', 'Atul', 'Thete', '7859868745', 'atulthete2003@gmail.com', '8459926823', 'i have one difficulty in WT', NULL, 26),
(53, '72151156F', 'Shubham', 'Tile', '9125886321', 'shubham@gmail.com', '7589698547', 'difficulty in neural networks', 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `year` text NOT NULL,
  `mentor_name` varchar(30) NOT NULL,
  `divs` varchar(12) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `domain` varchar(100) NOT NULL,
  `assignedstudents` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `email`, `password`, `year`, `mentor_name`, `divs`, `posting_date`, `domain`, `assignedstudents`) VALUES
(1, 'ashutosh@gmail.com', 'mentor@1', 'BE', 'prof. Ashutosh Kale Sir', 'B', '2023-10-10 12:08:57', 'Confidence Building', 2),
(21, 'archana@gmail.com', 'mentor@1', 'BE', 'Ms. Archana Banait', 'A', '2024-03-07 13:31:45', 'Career Planning and Progression', 1),
(22, 'madhuri@gmail.com', 'mentor@1', 'FE', 'Ms. Madhuri Shinde', 'A', '2024-03-07 14:49:55', 'Cloud Computing', 5),
(23, 'vijay@gmail.com', 'mentor@1', 'TE', 'Mr. Vijay More', 'B', '2024-03-07 14:52:24', 'Computer Networking', 0),
(24, 'ketaki@gmail.com', 'mentor@1', 'SE', 'Ms. Ketaki Balde', 'A', '2024-03-08 11:50:49', 'Machine Learning', 0),
(25, 'vaibhav@gmail.com', 'mentor@1', 'SE', 'Mr. Vaibhav Dabhaade', 'B', '2024-03-08 13:11:32', 'Artificial Intelligence', 1),
(26, 'vaishali@gmail.com', 'mentor@1', 'FE', 'Ms. Vaishali Khandve', 'B', '2024-03-08 13:12:07', 'Web Technology', 1),
(27, 'aanand@gmail.com', 'mentor@1', 'TE', 'Mr. Anand Gharu', 'A', '2024-03-08 13:12:54', 'Software Development', 0),
(28, 'sunita@gmail.com', 'mentor@1', 'FE', 'Ms.  Sunita Borse', 'D', '2024-03-08 13:13:38', 'Data Science', 1),
(29, 'kiran@gmail.com', 'mentor@1', 'BE', 'Mr. Kiran Kulkarni', 'A', '2024-03-08 13:16:39', 'Cyber Security', 0),
(30, 'kalpana@gmail.com', 'mentor@1', 'B-Tech', 'Ms. Kalpana Metre', 'B', '2024-03-08 13:18:56', 'Blockchain Technology', 1),
(31, 'vipin@gmail.com', 'mentor@1', 'B-Tech', 'Mr. Vipin Wani', 'A', '2024-03-08 13:19:32', 'Android Development', 1),
(32, 'kanchan@gmail.com', 'mentor@1', 'FY', 'Ms. Kanchan Pekhale', 'C', '2024-03-08 13:21:42', 'Internet Of Things', 1),
(33, 'prashant@gmail.com', 'mentor@1', 'TY', 'Dr. Prashant Yawalkar', 'B', '2024-03-11 17:05:09', 'Data Science', 0),
(34, 'manoj@gmail.com', 'mentor@1', 'B-Tech', 'Pr. Manoj Suri', 'A', '2024-03-12 05:34:59', 'Cloud Computing', 1),
(35, 'manjusha@gmail.com', 'mentor@1', 'FY', 'Ms. Manjusha Gaikwad', 'C', '2024-03-12 08:09:18', 'Web Technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_assignments`
--

CREATE TABLE `mentor_assignments` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `mentee_id` int(11) DEFAULT NULL,
  `assigneddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_assignments`
--

INSERT INTO `mentor_assignments` (`id`, `mentor_id`, `mentee_id`, `assigneddate`) VALUES
(2, 22, 2, '2024-03-12 05:18:06'),
(4, 22, 4, '2024-03-12 05:21:55'),
(5, 22, 5, '2024-03-12 05:29:36'),
(6, 22, 6, '2024-03-12 05:32:46'),
(7, 34, 7, '2024-03-12 05:35:07'),
(16, 31, 9, '2024-03-12 07:57:35'),
(17, 26, 10, '2024-03-31 16:02:56'),
(18, 28, 11, '2024-05-28 09:58:22'),
(19, 30, 12, '2024-05-28 10:28:29'),
(20, 25, 13, '2024-05-28 10:37:01'),
(21, 1, 14, '2024-05-28 10:46:04'),
(22, 32, 15, '2024-05-28 10:52:04'),
(23, 21, 16, '2024-05-28 16:45:19'),
(24, 1, 18, '2024-05-28 17:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `sscper` int(11) NOT NULL,
  `sscschool` text NOT NULL,
  `sscyear` int(11) NOT NULL,
  `hscper` int(11) NOT NULL,
  `hsccollege` text NOT NULL,
  `hscyear` int(11) NOT NULL,
  `yeargap` text NOT NULL,
  `year` text NOT NULL,
  `sem` int(11) NOT NULL,
  `mentor` text NOT NULL,
  `hostelstatus` enum('Hostel','Regular') NOT NULL,
  `bday` date NOT NULL,
  `cgpa` float NOT NULL,
  `course` varchar(500) NOT NULL,
  `prnno` varchar(255) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` bigint(11) NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint(11) NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int(11) NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `sscper`, `sscschool`, `sscyear`, `hscper`, `hsccollege`, `hscyear`, `yeargap`, `year`, `sem`, `mentor`, `hostelstatus`, `bday`, `cgpa`, `course`, `prnno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`, `domain`) VALUES
(2, 75, 'K. N.Kela High School', 2018, 74, 'R.Y.K', 2020, 'No', '4', 8, '', 'Hostel', '2024-03-02', 9, 'Bachelor of Engineering', '72151258F', 'Pranjal', 'Shivaji', 'Thorat', 'female', 8459929813, 'pt@gmail.com', 9812563842, 'Shivaji Thorat', 'Father', 7857896854, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-03-12 05:18:06', '12-03-2024 12:09:26', 'Cloud Computing'),
(4, 90, 'K. N.Kela High School', 2019, 74, 'R. N. C. Bytco College', 2021, 'No', '3', 7, '', 'Hostel', '2024-07-15', 9, 'Bachelor of Engineering', '72154539G', 'Aditi', 'Rajendra', 'Shinde', 'female', 8080607564, 'aditis@gmail.com', 9812563842, 'Rajendra Shinde', 'Father', 9865896745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-03-12 05:21:54', '', 'Cloud Computing'),
(5, 90, 'Holy Flower School', 2019, 74, 'R. N. C. Bytco College', 2021, 'No', '2', 4, '', 'Hostel', '2024-08-05', 7, 'Bachelor of Engineering', '82569874S', 'Abhijeet', 'Tanaji', 'Bhaskar', 'male', 8080607564, 'abhi@gmail.com', 9812563842, 'Tanaji Bhaskar', 'Father', 8459786521, 'Flat-8, \'B\'-wing, Tulsi Park housing society, Shivaji Nagar, Jail road, Nashik road, Nashik', 'Nashik', 'Maharashtra', 422101, 'Flat-8, \'B\'-wing, Tulsi Park housing society, Shivaji Nagar, Jail road, Nashik road, Nashik', 'Nashik', 'Maharashtra', 422101, '2024-03-12 05:29:36', '', 'Cloud Computing'),
(6, 85, 'Holy Flower School', 2017, 74, 'R.Y.K', 2019, 'No', '4', 8, '', 'Hostel', '2024-03-06', 8, 'Bachelor of Engineering', '72175898F', 'Aarti', 'Sudarshan', 'Bhavsar', 'female', 8080607564, 'aarti@gmail.com', 9812563842, 'Manisha Sudarshan Bhavsar', 'Mother', 8459786521, 'Flat-8, \'B\'-wing, Tulsi Park housing society, Shivaji Nagar, Jail road, Nashik road, Nashik', 'Nashik', 'Maharashtra', 422101, 'Flat-8, \'B\'-wing, Tulsi Park housing society, Shivaji Nagar, Jail road, Nashik road, Nashik', 'Nashik', 'Maharashtra', 422101, '2024-03-12 05:32:46', '', 'Confidence Building'),
(7, 84, 'Holy Flower School', 2019, 70, 'R. N. C. Bytco College', 2021, 'Yes', '4', 7, '', 'Hostel', '2024-03-05', 8, 'Bachelor of Engineering', '81245698D', 'Anuja', 'Shrikant', 'Drakshe', 'female', 8080607564, 'anuja@gmail.com', 9812563842, 'Shrikant Drakshe', 'Father', 9865896745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-03-12 05:35:07', '', 'Cloud Computing'),
(9, 89, 'K. N.Kela High School', 2018, 74, 'R.Y.K', 2020, 'No', '4', 8, '', 'Hostel', '2024-02-29', 9, 'Bachelor of Engineering', '72151186E', 'Aditi', 'Sudarshan', 'Bhavsar', 'female', 9881380390, 'aditibhavsar611@gmail.com', 9812563842, 'Manisha Sudarshan Bhavsar', 'Mother', 9865896745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-03-12 07:57:35', '', 'Android Development'),
(10, 89, 'K. N.Kela High School', 2018, 70, 'R. N. C. Bytco College', 2020, 'No', '4', 8, '', '', '2003-01-27', 8, 'Bachelor of Engineering', '72151424D', 'Atul', 'Govind', 'Thete', 'male', 7859868745, 'atulthete2003@gmail.com', 9856328965, 'Govind Thete', 'Father', 9865896745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-03-31 16:02:56', '', 'Web Technology'),
(11, 78, 'Holy Flower School', 2018, 70, 'R.Y.K', 2020, 'No', '4', 8, '', '', '2002-02-09', 8, 'Bachelor of Engineering', '72151156F', 'Shubham', 'Balu', 'Tile', 'male', 9125886321, 'shubham@gmail.com', 7589698547, 'Balu Tile', 'Father', 9862456745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-05-28 09:58:22', '', 'Data Science'),
(12, 85, 'St. Xaviers School', 2018, 70, 'R. N. C. Bytco College', 2020, 'No', '4', 8, '', 'Hostel', '2002-05-13', 8, 'Bachelor of Engineering', '72151132G', 'Ashutosh', 'Rajendra', 'Khairnar', 'male', 8459358671, 'ashutosh@gmail.com', 8459921423, 'Rajendra Khairnar', 'Father', 9862456745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-05-28 10:28:29', '', 'Blockchain Technology'),
(13, 75, 'K. N.Kela High School', 2018, 70, 'R. N. C. Bytco College', 2020, 'No', '4', 8, '', 'Hostel', '2003-06-10', 8, 'Bachelor of Engineering', '72151186D', 'Karuna', 'Ramdas', 'Pawar', 'female', 7812438745, 'karuna@gmail.com', 7589698547, 'Ramdas Pawar', 'Father', 9862456745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-05-28 10:37:01', '', 'Artificial Intelligence'),
(14, 75, 'K. N.Kela High School', 2018, 70, 'R. N. C. Bytco College', 2020, 'No', '4', 8, '', '', '2002-06-04', 8, 'Bachelor of Engineering', '72151149E', 'Sakshi', 'Sanjay', 'Rahane', 'female', 7859124545, 'sakshi@gmail.com', 9158226895, 'Sa', 'Father', 9862456745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-05-28 10:46:04', '', 'Confidence Building'),
(15, 72, 'Holy Flower School', 2018, 69, 'R. N. C. Bytco College', 2020, 'No', '4', 8, '', 'Hostel', '2002-02-19', 7, 'Bachelor of Engineering', '72151472F', 'Sneha', 'Balu ', 'Nathe', 'female', 9929832014, 'sneha@gmail.com', 8459926812, 'Balu Nathe', 'Father', 9865896745, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, 'Nasik Road', 'Nashik', 'Maharashtra', 422101, '2024-05-28 10:52:04', '', 'Internet Of Things'),
(16, 80, 'New English School, Palkhed', 2018, 62, 'K.K.Wagh Arts, Commerce, Science College, Pimpalgaon (B)', 2020, 'No', '4', 8, '', '', '2003-02-08', 8, 'Bachelor of Engineering', '72145425E', 'Lalit ', 'Shubhash', 'Pagar', 'male', 1234567890, 'lalit@gmail.com', 9172041130, 'Shubhash Pagar', 'Father', 123456789, 'Punyai Garden, Near Canal, Palkhed-Pimpalgoan Road, Palkhed,', 'Nashik', 'Maharashtra', 422209, 'Punyai Garden, Near Canal, Palkhed-Pimpalgoan Road, Palkhed,', 'Nashik', 'Maharashtra', 422209, '2024-05-28 16:45:19', '', 'Career Planning and Progression'),
(19, 85, 'New English School, Palkhed', 2018, 85, 'K.K.Wagh Arts, Commerce, Science College, Pimpalgaon (B)', 2020, 'No', '4', 8, '', '', '2002-01-31', 8, 'Bachelor of Engineering', '78459632H', 'Darshan ', 'Bhaushaheb', 'Nikam', 'male', 1234567890, 'darshan@123gmail.com', 123456789, 'Bhaushaheb Nikam', 'Father', 123456789, 'palkhed to pimpalgaon', 'nashik', 'Maharashtra', 422209, 'palkhed to pimpalgaon', 'nashik', 'Maharashtra', 422209, '2024-05-28 17:05:27', '', 'Confidence Building');

--
-- Triggers `registration`
--
DELIMITER $$
CREATE TRIGGER `delete_user_registration_and_assignments` BEFORE DELETE ON `registration` FOR EACH ROW BEGIN
    -- Delete corresponding row from userregistration table
    DELETE FROM userregistration WHERE prnno = OLD.prnno;
    
    -- Delete corresponding rows from mentor_assignments table
    DELETE FROM mentor_assignments WHERE mentee_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'EPE'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `temp_mentors`
--

CREATE TABLE `temp_mentors` (
  `id` int(11) NOT NULL,
  `year` varchar(100) DEFAULT NULL,
  `mentor_name` varchar(255) DEFAULT NULL,
  `divs` varchar(255) DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `assignedstudents` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_mentors`
--

INSERT INTO `temp_mentors` (`id`, `year`, `mentor_name`, `divs`, `posting_date`, `assignedstudents`) VALUES
(1, 'BE', 'prof. Ashutosh Kale Sir', 'B', '2023-10-10', 0),
(2, 'FE', 'Ms. Archana Banait', 'A', '2024-03-07', 0),
(3, 'FE', 'Ms. Madhuri Shinde', 'A', '2024-03-07', 0),
(4, 'TE', 'Mr. Vijay More', 'B', '2024-03-07', 0),
(5, 'SE', 'Ms. Ketaki Balde', 'A', '2024-03-08', 0),
(6, 'SE', 'Mr. Vaibhav Dabhaade', 'B', '2024-03-08', 0),
(7, 'FE', 'Ms. Vaishali Khandve', 'B', '2024-03-08', 0),
(8, 'TE', 'Mr. Anand Gharu', 'A', '2024-03-08', 0),
(9, 'FE', 'Ms.  Sunita Borse', 'D', '2024-03-08', 0),
(10, 'BE', 'Mr. Viren Kulkarni', 'A', '2024-03-08', 0),
(11, 'B-Tech', 'Ms. Kalpana Metre', 'B', '2024-03-08', 0),
(12, 'B-Tech', 'Mr. Vipin Wani', 'A', '2024-03-08', 0),
(13, 'FY', 'Ms. Kanchan Pekhale', 'C', '2024-03-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(269, 20, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-11 15:53:09'),
(270, 20, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-11 16:04:07'),
(271, 20, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-11 16:42:11'),
(272, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-11 17:11:22'),
(273, 18, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 04:00:38'),
(274, 22, 'sneha@gmail.com', 0x3a3a31, '', '', '2024-03-12 04:27:27'),
(275, 23, 'aarti@gmail.com', 0x3a3a31, '', '', '2024-03-12 04:44:34'),
(276, 24, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-12 04:48:19'),
(277, 25, 'abhijeet@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:01:00'),
(278, 1, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:15:38'),
(279, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:17:10'),
(280, 3, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:19:16'),
(281, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:21:17'),
(282, 5, 'abhi@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:23:38'),
(283, 6, 'aarti@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:32:13'),
(284, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:33:35'),
(285, 1, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:38:33'),
(286, 3, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-12 05:56:17'),
(287, 1, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 06:02:17'),
(288, 1, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 06:11:14'),
(289, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-12 06:37:56'),
(290, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-12 06:42:14'),
(291, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 07:57:04'),
(292, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 08:47:02'),
(293, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-12 10:09:24'),
(294, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-12 10:09:40'),
(295, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-12 10:18:41'),
(296, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-12 12:07:14'),
(297, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-12 12:11:40'),
(298, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-12 12:21:04'),
(299, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-12 12:26:38'),
(300, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-27 14:53:30'),
(301, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-27 15:25:11'),
(302, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-27 15:32:04'),
(303, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-27 15:50:44'),
(304, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-27 17:08:57'),
(305, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-27 17:15:06'),
(306, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-27 17:22:42'),
(307, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-27 17:26:03'),
(308, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-28 07:30:33'),
(309, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-28 08:46:15'),
(310, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-28 12:57:43'),
(311, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:18:41'),
(312, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:22:20'),
(313, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:23:39'),
(314, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:28:30'),
(315, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:28:57'),
(316, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:32:04'),
(317, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:33:19'),
(318, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 13:38:53'),
(319, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 14:16:23'),
(320, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-28 14:27:05'),
(321, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-28 14:31:48'),
(322, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-28 14:46:50'),
(323, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-28 15:33:41'),
(324, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-03-29 05:37:47'),
(325, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 05:39:14'),
(326, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 06:05:58'),
(327, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 06:09:02'),
(328, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 07:59:15'),
(329, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-29 08:27:13'),
(330, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-29 09:34:07'),
(331, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-29 09:58:17'),
(332, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:13:22'),
(333, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:23:27'),
(334, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:33:37'),
(335, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:44:57'),
(336, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:54:58'),
(337, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-29 10:59:47'),
(338, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-29 11:19:52'),
(339, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-29 11:20:18'),
(340, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-03-29 11:20:58'),
(341, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 11:24:26'),
(342, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 11:25:21'),
(343, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 13:27:33'),
(344, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 13:39:41'),
(345, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-29 13:43:17'),
(346, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-29 13:59:49'),
(347, 6, 'aarti@gmail.com', 0x3a3a31, '', '', '2024-03-29 14:15:24'),
(348, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 05:54:45'),
(349, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 05:57:42'),
(350, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 05:58:43'),
(351, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 06:09:25'),
(352, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 06:10:44'),
(353, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 06:52:57'),
(354, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 08:33:40'),
(355, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:02:53'),
(356, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:31:34'),
(357, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:32:21'),
(358, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:34:28'),
(359, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:36:05'),
(360, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:37:08'),
(361, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:50:17'),
(362, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:51:27'),
(363, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:51:48'),
(364, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:52:03'),
(365, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:52:32'),
(366, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:54:38'),
(367, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:55:20'),
(368, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:55:42'),
(369, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:57:53'),
(370, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:58:23'),
(371, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 09:58:43'),
(372, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 10:11:50'),
(373, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 10:12:46'),
(374, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 10:19:21'),
(375, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:38:26'),
(376, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:39:12'),
(377, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:40:02'),
(378, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:40:27'),
(379, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:48:47'),
(380, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:53:54'),
(381, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:54:46'),
(382, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:57:24'),
(383, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 11:58:31'),
(384, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 12:08:13'),
(385, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:01:49'),
(386, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:01:49'),
(387, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:06:21'),
(388, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:09:05'),
(389, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:13:08'),
(390, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:17:09'),
(391, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:24:25'),
(392, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:28:49'),
(393, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:31:03'),
(394, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:32:24'),
(395, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:38:45'),
(396, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:42:14'),
(397, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:43:27'),
(398, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:45:58'),
(399, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:47:36'),
(400, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:49:34'),
(401, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:51:15'),
(402, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:52:54'),
(403, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-31 13:57:31'),
(404, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:04:46'),
(405, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:07:33'),
(406, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:09:07'),
(407, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:09:55'),
(408, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:14:02'),
(409, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:14:15'),
(410, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:26:04'),
(411, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:34:38'),
(412, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:34:49'),
(413, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:35:01'),
(414, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:37:27'),
(415, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:42:57'),
(416, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:49:35'),
(417, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:54:07'),
(418, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 14:58:01'),
(419, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:03:10'),
(420, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:05:03'),
(421, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:52:33'),
(422, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:52:44'),
(423, 8, 'atul@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:55:10'),
(424, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:59:26'),
(425, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-31 15:59:45'),
(426, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:17:38'),
(427, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:22:08'),
(428, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:31:30'),
(429, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:40:39'),
(430, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:49:05'),
(431, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:51:00'),
(432, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 16:57:49'),
(433, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 17:07:45'),
(434, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-03-31 17:14:50'),
(435, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-03-31 17:31:14'),
(436, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-01 07:18:38'),
(437, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-01 09:32:30'),
(438, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 09:33:11'),
(439, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-01 13:32:29'),
(440, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 13:53:29'),
(441, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:04:33'),
(442, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:13:07'),
(443, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:22:20'),
(444, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:22:33'),
(445, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:22:56'),
(446, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:23:57'),
(447, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:24:55'),
(448, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:29:37'),
(449, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-01 14:32:50'),
(450, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-01 15:16:02'),
(451, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-01 15:17:34'),
(452, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 16:02:19'),
(453, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-01 16:14:12'),
(454, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:18:07'),
(455, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:18:20'),
(456, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:18:40'),
(457, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:18:52'),
(458, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:19:12'),
(459, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:19:20'),
(460, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:20:15'),
(461, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:20:46'),
(462, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:20:55'),
(463, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:21:06'),
(464, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:22:58'),
(465, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:23:39'),
(466, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:23:51'),
(467, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:24:22'),
(468, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:44:33'),
(469, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:45:19'),
(470, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:47:41'),
(471, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:48:37'),
(472, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:48:45'),
(473, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:48:55'),
(474, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:57:28'),
(475, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:58:07'),
(476, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-04-02 05:58:26'),
(477, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:00:19'),
(478, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:04:02'),
(479, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:05:54'),
(480, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:07:20'),
(481, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:21:21'),
(482, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 06:22:59'),
(483, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 07:57:15'),
(484, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 08:08:39'),
(485, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-02 08:31:26'),
(486, 34, 'manoj@gmail.com', 0x3a3a31, '', '', '2024-04-02 08:34:43'),
(487, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-02 16:59:29'),
(488, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 13:57:48'),
(489, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 13:59:30'),
(490, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:00:54'),
(491, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:05:24'),
(492, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:10:06'),
(493, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:10:18'),
(494, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:10:43'),
(495, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:11:18'),
(496, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:16:35'),
(497, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:16:46'),
(498, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:17:11'),
(499, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:31:14'),
(500, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:31:30'),
(501, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:33:02'),
(502, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:33:56'),
(503, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:34:56'),
(504, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 14:35:26'),
(505, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:48:21'),
(506, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:49:35'),
(507, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:55:50'),
(508, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:56:50'),
(509, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:57:36'),
(510, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:59:39'),
(511, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-04 15:59:52'),
(512, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:01:56'),
(513, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:04:21'),
(514, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:04:40'),
(515, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:04:53'),
(516, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:05:34'),
(517, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:09:12'),
(518, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-04 16:18:33'),
(519, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-05 12:45:09'),
(520, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-05 12:46:49'),
(521, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-05 12:49:28'),
(522, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:12:50'),
(523, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:20:02'),
(524, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:36:15'),
(525, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:37:56'),
(526, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:45:20'),
(527, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 13:49:53'),
(528, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:11:19'),
(529, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:14:50'),
(530, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:15:00'),
(531, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:32:01'),
(532, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:34:33'),
(533, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:34:45'),
(534, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:36:59'),
(535, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:38:01'),
(536, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:38:57'),
(537, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-05 15:40:10'),
(538, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:16:08'),
(539, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:16:28'),
(540, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:21:25'),
(541, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:24:03'),
(542, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:24:12'),
(543, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:27:57'),
(544, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:32:44'),
(545, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:33:09'),
(546, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:37:37'),
(547, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:37:49'),
(548, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:40:33'),
(549, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:41:28'),
(550, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-06 07:42:21'),
(551, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:05:08'),
(552, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:05:18'),
(553, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:07:10'),
(554, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:07:22'),
(555, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:13:35'),
(556, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:14:05'),
(557, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:14:37'),
(558, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:24:27'),
(559, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:24:42'),
(560, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:28:06'),
(561, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:28:41'),
(562, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:33:18'),
(563, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:33:53'),
(564, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:36:08'),
(565, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:42:07'),
(566, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:42:32'),
(567, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:43:59'),
(568, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:44:54'),
(569, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:47:53'),
(570, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-07 05:48:29'),
(571, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-07 06:07:51'),
(572, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-07 06:09:43'),
(573, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-10 05:34:42'),
(574, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-10 05:34:57'),
(575, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-10 05:53:43'),
(576, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-10 05:58:37'),
(577, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-10 07:17:47'),
(578, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-11 13:05:02'),
(579, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-04-11 13:08:34'),
(580, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-12 06:26:01'),
(581, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-04-12 06:29:06'),
(582, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:14:20'),
(583, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:16:58'),
(584, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:21:38'),
(585, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:37:40'),
(586, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:38:01'),
(587, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-04-13 05:38:36'),
(588, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-16 04:00:07'),
(589, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-04-16 04:12:26'),
(590, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-05-01 13:29:24'),
(591, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-05-01 13:29:32'),
(592, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-05-01 13:30:14'),
(593, 31, 'vipin@gmail.com', 0x3a3a31, '', '', '2024-05-01 13:30:34'),
(594, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-27 07:33:15'),
(595, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-05-27 07:35:58'),
(596, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-27 07:36:46'),
(597, 26, 'vaishali@gmail.com', 0x3a3a31, '', '', '2024-05-27 07:38:44'),
(598, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-05-27 17:42:42'),
(599, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-05-27 17:54:09'),
(600, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-27 18:00:56'),
(601, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-27 18:01:11'),
(602, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-28 09:48:11'),
(603, 11, 'shubham@gmail.com', 0x3a3a31, '', '', '2024-05-28 09:55:35'),
(604, 28, 'sunita@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:08:51'),
(605, 11, 'shubham@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:10:42'),
(606, 11, 'shubham@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:11:09'),
(607, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:13:47'),
(608, 2, 'pt@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:18:47'),
(609, 7, 'anuja@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:21:30'),
(610, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:22:32'),
(611, 4, 'aditis@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:23:05'),
(612, 12, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:26:08'),
(613, 12, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:26:31'),
(614, 30, 'kalpana@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:30:07'),
(615, 13, 'karuna@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:35:37'),
(616, 14, 'sakshi@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:39:34'),
(617, 14, 'sakshi@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:39:44'),
(618, 15, 'sneha@gmail.com', 0x3a3a31, '', '', '2024-05-28 10:50:45'),
(619, 9, 'aditibhavsar611@gmail.com', 0x3a3a31, '', '', '2024-05-28 11:38:32'),
(620, 22, 'madhuri@gmail.com', 0x3a3a31, '', '', '2024-05-28 11:47:55'),
(621, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:02:38'),
(622, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:05:58'),
(623, 1, 'ashutosh@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:12:07'),
(624, 25, 'vaibhav@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:12:59'),
(625, 30, 'kalpana@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:13:47'),
(626, 28, 'sunita@gmail.com', 0x3a3a31, '', '', '2024-05-28 12:14:16'),
(627, 16, 'lalit@gmail.com', 0x3a3a31, '', '', '2024-05-28 16:43:23'),
(628, 16, 'lalit@gmail.com', 0x3a3a31, '', '', '2024-05-28 16:43:37'),
(629, 17, 'darshan@123gmail.com', 0x3a3a31, '', '', '2024-05-28 16:51:01'),
(630, 17, 'darshan@123gmail.com', 0x3a3a31, '', '', '2024-05-28 16:55:07'),
(631, 17, 'darshan@123gmail.com', 0x3a3a31, '', '', '2024-05-28 16:56:31'),
(632, 6, 'aarti@gmail.com', 0x3a3a31, '', '', '2024-05-28 16:58:58'),
(633, 10, 'atulthete2003@gmail.com', 0x3a3a31, '', '', '2024-05-28 17:02:14'),
(634, 18, 'darshan@123gmail.com', 0x3a3a31, '', '', '2024-05-28 17:03:51'),
(635, 14, 'sakshi@gmail.com', 0x3a3a31, '', '', '2024-05-28 17:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `profileImage` blob DEFAULT NULL,
  `prnno` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `profileImage`, `prnno`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`, `domain`, `mentor_id`) VALUES
(2, NULL, '72151258F', 'Pranjal', 'Shivaji', 'Thorat', 'female', 8459929813, 'pt@gmail.com', 'pass123', '2024-03-12 05:17:03', '12-03-2024 12:09:26', '', 'Cloud Computing', 22),
(4, NULL, '72154539G', 'Aditi', 'Rajendra', 'Shinde', 'female', 8080607564, 'aditis@gmail.com', '123', '2024-03-12 05:21:08', '', '', 'Cloud Computing', 22),
(5, NULL, '82569874S', 'Abhijeet', 'Tanaji', 'Bhaskar', 'male', 8080607564, 'abhi@gmail.com', '123', '2024-03-12 05:23:22', '', '', 'Cloud Computing', 22),
(6, NULL, '72175898F', 'Aarti', 'Sudarshan', 'Bhavsar', 'female', 8080607564, 'aarti@gmail.com', '123', '2024-03-12 05:32:03', '', '', 'Cloud Computing', 22),
(7, 0x70726f66696c655f696d616765732f41414448415220434152442e6a7067, '81245698D', 'Anuja', 'Shrikant', 'Drakshe', 'female', 8080607564, 'anuja@gmail.com', '123', '2024-03-12 05:33:30', '', '', 'Cloud Computing', 34),
(9, 0x70726f66696c655f696d616765732f4142432049642e706e67, '72151186E', 'Aditi', 'Sudarshan', 'Bhavsar', 'female', 9881380390, 'aditibhavsar611@gmail.com', 'adi123', '2024-03-12 07:56:58', '', '', 'Android Development', 31),
(10, 0x70726f66696c655f696d616765732f6174756c2e6a7067, '72151424D', 'Atul', 'Govind', 'Thete', 'male', 7859868745, 'atulthete2003@gmail.com', '123', '2024-03-31 15:59:20', '', '', 'Web Technology', 26),
(11, NULL, '72151156F', 'Shubham', 'Balu', 'Tile', 'male', 9125886321, 'shubham@gmail.com', '123', '2024-05-28 09:55:17', '', '', 'Data Science', 28),
(12, NULL, '72151132G', 'Ashutosh', 'Rajendra', 'Khairnar', 'male', 8459358671, 'ashutosh@gmail.com', '123', '2024-05-28 10:25:53', '', '', 'Blockchain Technology', 30),
(13, 0x70726f66696c655f696d616765732f70726f66696c65207069632e706e67, '72151186D', 'Karuna', 'Ramdas', 'Pawar', 'female', 7812438745, 'karuna@gmail.com', '123', '2024-05-28 10:35:21', '', '', 'Artificial Intelligence', 25),
(14, NULL, '72151149E', 'Sakshi', 'Sanjay', 'Rahane', 'female', 7859124545, 'sakshi@gmail.com', '123', '2024-05-28 10:39:24', '', '', 'Software Testing', 1),
(15, NULL, '72151472F', 'Sneha', 'Balu ', 'Nathe', 'female', 9929832014, 'sneha@gmail.com', '123', '2024-05-28 10:50:26', '', '', 'Internet Of Things', 32),
(16, 0x70726f66696c655f696d616765732f4c6f67696e2070726f66696c652e6a7067, '72145425E', 'Lalit ', 'Shubhash', 'Pagar', 'male', 1234567890, 'lalit@gmail.com', 'lalit@123', '2024-05-28 16:43:01', '', '', 'Career Planning and Progression', 21),
(18, NULL, '78459632H', 'Darshan ', 'Bhaushaheb', 'Nikam', 'male', 1234567890, 'darshan@123gmail.com', 'darshan@123', '2024-05-28 17:03:41', '', '', 'Confidence Building', 1);

--
-- Triggers `userregistration`
--
DELIMITER $$
CREATE TRIGGER `update_assigned_students_after_delete` AFTER DELETE ON `userregistration` FOR EACH ROW BEGIN
    DECLARE mentor_id_val INT;
    DECLARE domain_val VARCHAR(255);
    
    -- Retrieve the mentor ID and domain of the deleted mentee
    SELECT mentor_id, domain INTO mentor_id_val, domain_val
    FROM userRegistration
    WHERE id = OLD.id;

    -- Update the assigned students count for the mentor and domain
    UPDATE mentors
    SET assignedstudents = assignedstudents - 1
    WHERE id = mentor_id_val AND domain = domain_val;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_assignments`
--
ALTER TABLE `mentor_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `mentee_id` (`mentee_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_mentors`
--
ALTER TABLE `temp_mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achivements`
--
ALTER TABLE `achivements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mentor_assignments`
--
ALTER TABLE `mentor_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temp_mentors`
--
ALTER TABLE `temp_mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mentor_assignments`
--
ALTER TABLE `mentor_assignments`
  ADD CONSTRAINT `mentor_assignments_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`),
  ADD CONSTRAINT `mentor_assignments_ibfk_2` FOREIGN KEY (`mentee_id`) REFERENCES `userregistration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
