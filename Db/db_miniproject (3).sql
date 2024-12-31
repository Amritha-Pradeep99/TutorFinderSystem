-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 08:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(14, 'Gayathri p', 'gayathri222@gmail.com', 'Gayathri@12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_amount` varchar(22) NOT NULL,
  `student_status` varchar(33) NOT NULL,
  `tutorclass_id` int(11) NOT NULL,
  `tutorclass_meeturl` varchar(200) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `student_id`, `student_amount`, `student_status`, `tutorclass_id`, `tutorclass_meeturl`, `booking_status`) VALUES
(1, '2024-11-11', 2, '300', '1', 10, '', 0),
(2, '2024-11-11', 2, '300', '1', 11, '', 0),
(4, '2024-11-11', 1, '300', '1', 2, 'https://meet.google.com/oxu-ywwc-jkn ', 2),
(5, '2024-11-19', 3, '300', '', 8, '', 0),
(6, '2024-11-26', 4, '300', '', 8, '', 0),
(7, '2024-11-26', 4, '300', '', 0, '', 0),
(8, '2024-11-28', 2, '300', '', 4, '', 0),
(9, '2024-11-28', 2, '300', '1', 8, 'https://meet.google.com/fhb-zgwp-uuy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(4, 'flipkart'),
(6, 'amazonsd'),
(8, 'flipkarthvc'),
(9, 'amazon123ggws'),
(10, 'amazonsdhgfds'),
(12, 'amazonsdad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(2, 'gsjhdgsyg'),
(4, 'HVASY'),
(6, 'vaihusiad'),
(7, 'gdygasgd'),
(8, 'sygdjka'),
(10, 'gf'),
(11, 'guw'),
(12, 'ftft'),
(13, 'jhbvisuDYfoef'),
(14, 'zxcfvgbhjnkm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(45) NOT NULL,
  `complaint_content` varchar(30) NOT NULL,
  `complaint_date` varchar(25) NOT NULL,
  `complaint_reply` varchar(15) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `student_id`, `tutor_id`) VALUES
(11, 'iuferg', 'utigryhty', '2024-10-11', '', 0, 19, 2),
(12, 'sdsf', 'rgrthtr', '2024-10-11', 'hvfgb', 1, 20, 1),
(13, 'ggg', 'fuioph', '2024-10-17', '', 0, 0, 0),
(14, 'About class', 'Nice class,good experience', '2024-10-18', '', 0, 21, 0),
(15, 'class', 'duration of classes are very l', '2024-10-18', '', 0, 17, 0),
(16, 'About class', 'duration of classes are very l', '2024-10-25', 'ok', 1, 25, 5),
(17, 'about class', 'not replied yet', '2024-11-09', 'will inform aft', 1, 21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_demo`
--

CREATE TABLE `tbl_demo` (
  `demo_id` int(11) NOT NULL,
  `demo_title` varchar(23) NOT NULL,
  `demo_file` varchar(55) NOT NULL,
  `tutorclass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_demo`
--

INSERT INTO `tbl_demo` (`demo_id`, `demo_title`, `demo_file`, `tutorclass_id`) VALUES
(1, '8th class', 'WhatsApp Video 2024-11-11 at 15.02.54_a7a7aa85.mp4', 8),
(3, 'Malayalam', 'WhatsApp Video 2024-11-11 at 15.31.29_0d65b9c8.mp4', 2),
(4, 'English ', 'WhatsApp Video 2024-11-11 at 15.38.17_a8857e9a.mp4', 3),
(5, 'Maths', 'WhatsApp Video 2024-11-11 at 15.31.29_a6c5c83c.mp4', 4),
(6, 'science', 'WhatsApp Video 2024-11-11 at 15.31.29_524af6ff.mp4', 6),
(7, 'malayalam', 'WhatsApp Video 2024-11-11 at 15.31.29_0d65b9c8.mp4', 7),
(8, 'maths', 'WhatsApp Video 2024-11-11 at 15.31.29_a6c5c83c.mp4', 9),
(9, 'science', 'WhatsApp Video 2024-11-11 at 15.31.29_524af6ff.mp4', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'kasargod'),
(2, 'Kannur'),
(3, 'Wayanad'),
(4, 'Kozhikode'),
(5, 'Malappuram'),
(6, 'Palakkad'),
(7, 'Thrissur'),
(8, 'Ernakulam'),
(9, 'Idukki'),
(10, 'Kottayam'),
(11, 'Pathanamthitta'),
(12, 'Alappuzha'),
(13, 'Kollam'),
(14, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_myclass`
--

CREATE TABLE `tbl_myclass` (
  `myclass_id` int(11) NOT NULL,
  `myclass_name` varchar(30) NOT NULL,
  `myclass_amount` varchar(20) NOT NULL,
  `myclass_tutor` varchar(45) NOT NULL,
  `myclass_contact` varchar(50) NOT NULL,
  `myclass_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_myclass`
--

INSERT INTO `tbl_myclass` (`myclass_id`, `myclass_name`, `myclass_amount`, `myclass_tutor`, `myclass_contact`, `myclass_status`) VALUES
(1, '1', '300', 'niranjana', '9123456789', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note`
--

CREATE TABLE `tbl_note` (
  `note_id` int(11) NOT NULL,
  `note_file` varchar(200) NOT NULL,
  `note_title` varchar(100) NOT NULL,
  `note_des` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_note`
--

INSERT INTO `tbl_note` (`note_id`, `note_file`, `note_title`, `note_des`, `class_id`) VALUES
(1, 'chapter-no-1-history-class-8.pdf', '8th notes', '1st chapter history notes', 8),
(2, 'Kerala-Board-Class-2-Malayalam-Textbook.pdf', 'Malayalam Note', 'Malayalam 1st chapter', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Nileshwaram', 1),
(2, 'Uppala', 1),
(3, 'Payyannur', 2),
(4, 'Thaliparamba', 2),
(5, 'Sulthan Bathery', 3),
(6, 'Kalpetta', 3),
(7, 'Beypore', 4),
(8, 'Feroke', 4),
(9, 'Manjeri', 5),
(10, 'Nilambur', 5),
(11, 'Pattambi', 6),
(12, 'shornur', 6),
(13, 'Chalakkudy', 7),
(14, 'irinjalakuda', 7),
(15, 'Perumbavoor', 8),
(16, 'Kothamangalam', 8),
(17, 'Kattapana', 9),
(18, 'Devikulam', 9),
(19, 'Chenganassery', 10),
(20, 'vazhappally', 10),
(21, 'Chengannur', 11),
(22, 'Thiruvalla', 11),
(23, 'Cherthala', 12),
(24, 'Mavelikkara', 12),
(25, 'Karunnagapally', 13),
(26, 'Kottarakkara', 13),
(27, 'Nedumangad', 14),
(28, 'Neyyattinkara', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_rating` varchar(11) NOT NULL,
  `review_content` varchar(33) NOT NULL,
  `review_datetime` varchar(44) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_rating`, `review_content`, `review_datetime`, `student_id`, `tutor_id`) VALUES
(1, '5', 'good class\n', '2024-11-11 13:12:49', 2, 1),
(2, '5', 'Nice class', '2024-11-11 13:13:57', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_date` varchar(11) NOT NULL,
  `schedule_time` varchar(22) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_email` varchar(40) NOT NULL,
  `student_gender` varchar(30) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_address` varchar(45) NOT NULL,
  `student_dob` varchar(20) NOT NULL,
  `student_password` varchar(25) NOT NULL,
  `student_photo` varchar(70) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_email`, `student_gender`, `student_contact`, `student_address`, `student_dob`, `student_password`, `student_photo`, `place_id`) VALUES
(1, 'Jasna', 'jasna12@gmail.com', 'female', '9123456789', 'Golden villa house,Perumbavoor ,Ernakulam', '1.01.2003', 'Jasna1234@', 'IMG_20231121_215842.jpg', 15),
(2, 'Gouri S', 'gouri123@gmail.com', 'female', '9234567812', 'Breeze house,Nilambur,Chakkalakuth,Malappuram', '14.06.2008', 'Gouri1234@', 'IMG_20230416_222645.jpg', 10),
(3, 'Sneha C', 'sneha123@gmail.com', 'female', '9567891234', 'Meleveetil house,kottayam,chenganassery', '2004-10-10', 'Sneha1232', 'qhd_bba0c1d458fbf724342cf08ac3eaaf20.jpg', 19),
(4, 'Anitta K', 'anittasasi02gmail.com', 'female', '8921633067', 'blaangara house ,vaalara po ,chillithod,idukk', '2004-08-25', 'Anitta@12', 'IMG20230615085430.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'sqwhgu', 3),
(2, 'fyjadhbxakuw', 7),
(3, 'ytrw', 3),
(4, 'sqhsyuq', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`) VALUES
(15, 'Physics'),
(16, 'Hindi'),
(17, 'Social science'),
(18, 'Maths'),
(19, 'English'),
(20, 'Malayalam'),
(21, 'Chemistry'),
(22, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(45) NOT NULL,
  `tutor_email` varchar(37) NOT NULL,
  `tutor_password` varchar(20) NOT NULL,
  `tutor_contact` varchar(10) NOT NULL,
  `tutor_gender` varchar(50) NOT NULL,
  `tutor_dob` varchar(90) NOT NULL,
  `tutor_address` varchar(40) NOT NULL,
  `place_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`tutor_id`, `tutor_name`, `tutor_email`, `tutor_password`, `tutor_contact`, `tutor_gender`, `tutor_dob`, `tutor_address`, `place_id`, `subject_id`) VALUES
(1, 'Aparna V', 'aparna123@gmail.com', 'Aparna1234@', '9345678123', 'female', '21.11.2004', 'kizhakke kaeruvanguzhi House,feroke,kozh', 8, 18),
(2, 'Niranjana R', 'niranjana12@gmail.com', 'Niranjana1234@', '9456781234', 'female', '26.06.2004', 'Kottapurath House,vazhappally,Kottayam', 20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutorclass`
--

CREATE TABLE `tbl_tutorclass` (
  `tutorclass_id` int(11) NOT NULL,
  `tutorclass_amount` varchar(35) NOT NULL,
  `class_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tutorclass`
--

INSERT INTO `tbl_tutorclass` (`tutorclass_id`, `tutorclass_amount`, `class_id`, `tutor_id`) VALUES
(1, '300', 1, 1),
(2, '350', 2, 1),
(3, '400', 3, 1),
(4, '450', 4, 1),
(5, '500', 5, 1),
(6, '550', 6, 1),
(7, '650', 7, 1),
(8, '750', 8, 1),
(9, '850', 9, 1),
(10, '1000', 10, 1),
(11, '800', 8, 2),
(12, '950', 9, 2),
(13, '1500', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewclass`
--

CREATE TABLE `tbl_viewclass` (
  `viewclass_id` int(11) NOT NULL,
  `viewclass_name` varchar(46) NOT NULL,
  `viewclass_amount` varchar(35) NOT NULL,
  `viewclass_tutor` varchar(60) NOT NULL,
  `viewclass_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_viewclass`
--

INSERT INTO `tbl_viewclass` (`viewclass_id`, `viewclass_name`, `viewclass_amount`, `viewclass_tutor`, `viewclass_contact`) VALUES
(1, '1', '300', 'niranjana', '9123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_demo`
--
ALTER TABLE `tbl_demo`
  ADD PRIMARY KEY (`demo_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_myclass`
--
ALTER TABLE `tbl_myclass`
  ADD PRIMARY KEY (`myclass_id`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `tbl_tutorclass`
--
ALTER TABLE `tbl_tutorclass`
  ADD PRIMARY KEY (`tutorclass_id`);

--
-- Indexes for table `tbl_viewclass`
--
ALTER TABLE `tbl_viewclass`
  ADD PRIMARY KEY (`viewclass_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_demo`
--
ALTER TABLE `tbl_demo`
  MODIFY `demo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_myclass`
--
ALTER TABLE `tbl_myclass`
  MODIFY `myclass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tutorclass`
--
ALTER TABLE `tbl_tutorclass`
  MODIFY `tutorclass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_viewclass`
--
ALTER TABLE `tbl_viewclass`
  MODIFY `viewclass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
