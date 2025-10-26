-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 01:21 PM
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
-- Database: `db_mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admi_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admi_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'albin', 'lala@gmail.com', '5465767'),
(2, 'aslam', 'aslam@12345', '12345'),
(3, 'aslam', 'aslam@123', '1234'),
(5, 'Anadu', 'Aadhu@123', '123'),
(6, 'Ana', 'Ana@1233', 'Ana_1233s');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignwork`
--

CREATE TABLE `tbl_assignwork` (
  `assignwork_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `assignwork_status` int(11) NOT NULL DEFAULT 1,
  `mechanic_id` int(11) NOT NULL,
  `assign_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_assignwork`
--

INSERT INTO `tbl_assignwork` (`assignwork_id`, `request_id`, `assignwork_status`, `mechanic_id`, `assign_date`) VALUES
(1, 9, 1, 7, '2024-10-04'),
(2, 2, 3, 7, '2024-10-04'),
(3, 2, 3, 7, '2024-10-04'),
(4, 1, 1, 7, '2024-10-10'),
(5, 6, 3, 7, '2024-10-10'),
(6, 6, 2, 7, '2024-10-10'),
(7, 5, 1, 7, '2024-10-11'),
(8, 5, 1, 7, '2024-10-11'),
(9, 7, 1, 7, '2024-10-11'),
(10, 7, 3, 7, '2024-10-11'),
(11, 3, 1, 15, '2024-10-15'),
(12, 9, 3, 18, '2024-10-17'),
(13, 9, 1, 18, '2024-10-17'),
(14, 9, 1, 18, '2024-10-17'),
(15, 9, 1, 18, '2024-10-17'),
(16, 10, 1, 18, '2024-10-17'),
(17, 11, 1, 18, '2024-10-18'),
(18, 13, 1, 18, '2024-10-18'),
(19, 8, 1, 17, '2024-10-19'),
(20, 15, 1, 16, '2024-10-19'),
(21, 16, 1, 15, '2024-10-23'),
(22, 17, 1, 18, '2024-10-23'),
(23, 19, 1, 16, '2024-10-24'),
(24, 21, 1, 16, '2024-10-24'),
(25, 22, 1, 16, '2024-10-26'),
(26, 23, 1, 16, '2024-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`) VALUES
(1, 'aniumal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` int(11) NOT NULL,
  `complaint_status` varchar(11) NOT NULL DEFAULT '0',
  `complaint_title` varchar(20) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(15) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_status`, `complaint_title`, `complaint_content`, `user_id`, `complaint_reply`) VALUES
(6, 20241015, '0', 'bike scratch', 'hhvjh.vh', 7, ''),
(7, 20241018, '0', 'Bike Scratch', 'Sear  Cnjcnjc jfjfen', 19, ''),
(9, 20241023, '1', 'albin', 'hebebhewcbh', 16, 'ellam seriakum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `Complainttype_id` int(11) NOT NULL,
  `Complainttype_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`Complainttype_id`, `Complainttype_name`) VALUES
(1, 'Punchers'),
(2, 'unknown'),
(6, 'Engine crack');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(16, 'kozhikodes'),
(17, 'ernakulam'),
(19, 'Idukki'),
(20, 'kollam'),
(23, 'pathanamthitta'),
(24, 'wayanad'),
(25, 'thiruvanathapuram'),
(26, 'Thiruvala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location_name`, `place_id`) VALUES
(1, 'kozhikode', 10),
(2, 'ernakulam', 4),
(3, 'ernakulam', 4),
(4, 'kottayam', 2),
(5, 'kozhikode', 2),
(12, 'dfsgsg', 18),
(13, 'mmm', 19),
(14, 'velloorkunnam', 21),
(15, 'k1.1', 24),
(16, 'k2.2', 25),
(17, 'k3.3', 26),
(18, 'p1.1', 27),
(19, 'p2.2', 28),
(20, 'dfsgsg', 21),
(21, 'tiruvampaddy', 21),
(22, 'warpetty', 31),
(23, 'paalari', 30),
(24, 'maa', 41),
(25, 'maala', 41),
(26, 'Kottayam', 28),
(27, 'Pala', 0),
(28, 'Paala', 0),
(29, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanic`
--

CREATE TABLE `tbl_mechanic` (
  `mechanic_id` int(11) NOT NULL,
  `mechanic_name` varchar(60) NOT NULL,
  `mechanic_email` varchar(60) NOT NULL,
  `mechanic_contact` varchar(15) NOT NULL,
  `mechanic_password` varchar(20) NOT NULL,
  `mechanic_photo` varchar(400) NOT NULL,
  `workshopreg_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mechanic`
--

INSERT INTO `tbl_mechanic` (`mechanic_id`, `mechanic_name`, `mechanic_email`, `mechanic_contact`, `mechanic_password`, `mechanic_photo`, `workshopreg_id`) VALUES
(4, 'jinta', 'jinta@123', '2147483647', '123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 1),
(5, 'sasuke ', 'sasu@12', '2147483647', '123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 4),
(6, 'naruto', 'naruto@12', '2147483647', '12', 'hd-wallpaper-gfcf805f9b_1920.jpg', 5),
(7, 'Kakashi', 'kakashi@12', '9147483647', '12', 'hd-wallpaper-gfcf805f9b_1920.jpg', 34),
(9, 'regi', 'amal@gmail.com', '2147483647', '1234', 'hd-wallpaper-gfcf805f9b_1920.jpg', 35),
(10, 'Albin', 'albin564@gmail.com', '7483647', 'Alb_123a', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 0),
(11, 'Albin', 'albin564@gmail.com', '2147483647', 'ASSS_123bd', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 0),
(12, 'aas', '', '0', '', '', 34),
(13, 'a', '', '0', '', '', 34),
(14, 'a', '', '0', '', '', 34),
(15, 'Amene', 'ame11234@gmail.com', '2147483647', 'Amen_1234', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 34),
(16, 'Aaa', 'aa12@gmail.com', '2147483647', 'Aa@123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 23),
(17, 'Bbb', 'bb12@gmail.com', '2147483647', 'Bb@123456', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 23),
(18, 'Aksh', 'akshat1234@gmail.com', '8590937198', 'Akshy_1234ak', 'hd-wallpaper-gfcf805f9b_1920.jpg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newuser`
--

CREATE TABLE `tbl_newuser` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_contact` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_photo` varchar(60) NOT NULL,
  `location_id` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_newuser`
--

INSERT INTO `tbl_newuser` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_photo`, `location_id`) VALUES
(4, 'anandu krishna ks', 'albinsunny@gmail.com', '516545465', '123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 1),
(7, 'Amal Thoma', 'amal@gmail.com', '123456789', '1234', 'hd-wallpaper-gfcf805f9b_1920.jpg', 7),
(8, 'amal thoma', 'amal@gmail.com', '580t86787998', '1234', 'hd-wallpaper-gfcf805f9b_1920.jpg', 2),
(9, 'amal thoma', 'amal@gmail.com', '580t86787998', '1234', 'hd-wallpaper-gfcf805f9b_1920.jpg', 1),
(12, 'als', 'als@123', '9847096686', '123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 15),
(13, 'knanu', 'knanu@12', '5950550888', 'alexo', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 15),
(14, 'regi', 'regi123@gmail.com', '580t86787998', 'Regi@123456', 'hd-wallpaper-gfcf805f9b_1920.jpg', 14),
(15, 'alby', 'alby@gmail.com', '9847096686', '123', 'hd-wallpaper-gfcf805f9b_1920.jpg', 14),
(16, 'ais', 'als@12', '9876543216', '12345', 'hd-wallpaper-gfcf805f9b_1920.jpg', 15),
(17, 'kas', 'kas@gmail.com', '580t86787998', '1234', 'hd-wallpaper-gfcf805f9b_1920.jpg', 0),
(18, 'Aksshay', 'akshay12345@gmail.com', '9846086696', 'Akshay@123456789', 'hd-wallpaper-gfcf805f9b_1920.jpg', 16),
(19, 'Albin', 'albin@564', '9856747689', 'Albin_12', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 19),
(20, 'Ame', 'ame@1234', '9876541223', 'Amen_23df8', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 15),
(21, 'Angri', 'angri@123', '9849603576', '12234_ashdhA', 'Screenshot 2024-04-18 235827.png', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(4, 'Muvattupuzha', 5),
(5, 'y55hthhy', 4),
(21, 'muvattupuzah', 17),
(22, 'Thodupuzha', 19),
(24, 'k1', 20),
(25, 'k2', 20),
(26, 'k3', 20),
(27, 'p1', 23),
(28, 'p2', 23),
(29, 'p3', 23),
(30, 'w1', 24),
(31, 'w3', 24),
(32, 't1', 25),
(33, 'muvattupuzahh', 0),
(34, 'muvattupuzahs', 17),
(40, 'Pala', 26),
(41, 'Paala', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

CREATE TABLE `tbl_reply` (
  `reply_id` int(11) NOT NULL,
  `reply_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reply`
--

INSERT INTO `tbl_reply` (`reply_id`, `reply_name`) VALUES
(26, 'kmlml'),
(27, 'kmlml'),
(28, ' snnss'),
(29, 'stuibjnooklknlml.kll');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rereques`
--

CREATE TABLE `tbl_rereques` (
  `request_id` int(11) NOT NULL,
  `request_date` varchar(60) NOT NULL,
  `request_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) NOT NULL,
  `workshop_id` int(10) NOT NULL,
  `vehicletype_id` int(10) NOT NULL,
  `Complainttype_id` int(10) NOT NULL,
  `request_details` varchar(100) NOT NULL,
  `user_bill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rereques`
--

INSERT INTO `tbl_rereques` (`request_id`, `request_date`, `request_status`, `user_id`, `workshop_id`, `vehicletype_id`, `Complainttype_id`, `request_details`, `user_bill`) VALUES
(1, '2024-10-04', 3, 16, 23, 2, 1, 'wef', ''),
(2, '2024-10-04', 3, 16, 23, 3, 2, 'engine failure', ''),
(3, '2024-10-10', 3, 16, 23, 2, 1, 'alll b', ''),
(4, '2024-10-10', 1, 16, 34, 2, 2, 'qqqq', ''),
(5, '2024-10-10', 3, 16, 30, 3, 2, 'nnanni', ''),
(6, '2024-10-10', 3, 16, 23, 3, 2, 'albi', ''),
(7, '2024-10-11', 3, 16, 30, 3, 2, 'fkgthm', ''),
(8, '2024-10-17', 3, 16, 23, 3, 2, 'asdfghj', ''),
(9, '2024-10-17', 5, 18, 39, 2, 1, 'rfergte', ''),
(10, '2024-10-17', 4, 18, 39, 3, 2, 'cs', ''),
(11, '2024-10-18', 1, 14, 39, 3, 2, 'car ..', 'Screenshot 2024-04-06 135313.png'),
(12, '', 0, 0, 0, 0, 0, '', 'hd-wallpaper-gfcf805f9b_1920.jpg'),
(13, '2024-10-18', 6, 14, 39, 3, 2, 'Carrrr', 'Screenshot 2024-04-18 235843.png'),
(14, '2024-10-19', 0, 18, 34, 3, 2, 'carus', ''),
(15, '2024-10-19', 6, 18, 23, 3, 2, 'lkjh', 'Screenshot 2024-04-06 135313.png'),
(16, '2024-10-23', 5, 14, 34, 3, 2, 'sudden breakdown', ''),
(17, '2024-10-23', 6, 18, 39, 3, 2, 'sudden break down', 'Screenshot 2024-04-06 135313.png'),
(18, '2024-10-24', 1, 16, 23, 3, 2, 'sudden breakdown with  crack sound from engine', ''),
(19, '2024-10-24', 6, 16, 23, 3, 2, 'break failur', 'Screenshot 2024-04-06 135313.png'),
(20, '2024-10-24', 1, 16, 23, 3, 1, 'tuuuuu', ''),
(21, '2024-10-24', 6, 16, 23, 3, 1, 'tuuuuu', 'Screenshot 2024-04-06 135313.png'),
(22, '2024-10-26', 6, 16, 23, 3, 2, 'unknow', ''),
(23, '2024-10-26', 6, 16, 23, 2, 2, 'um', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(200) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `user_review` varchar(120) NOT NULL,
  `user_rating` varchar(60) NOT NULL,
  `workshopreg_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `user_id`, `user_review`, `user_rating`, `workshopreg_id`) VALUES
(1, '2024-10-05 10:40:29', '16', 'hjjj', '5', 23),
(2, '2024-10-10 23:20:41', '16', 'very good\n', '4', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechicletype`
--

CREATE TABLE `tbl_vechicletype` (
  `vehicletype_id` int(11) NOT NULL,
  `vehicletype_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vechicletype`
--

INSERT INTO `tbl_vechicletype` (`vehicletype_id`, `vehicletype_name`) VALUES
(2, 'bike'),
(3, 'car'),
(7, 'bike');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshopreg`
--

CREATE TABLE `tbl_workshopreg` (
  `workshopreg_id` int(11) NOT NULL,
  `workshopreg_name` varchar(60) NOT NULL,
  `workshopreg_email` varchar(60) NOT NULL,
  `workshopreg_contact` varchar(60) NOT NULL,
  `workshopreg_address` varchar(60) NOT NULL,
  `workshopreg_password` varchar(60) NOT NULL,
  `workshoptype_id` int(60) NOT NULL,
  `location_id` int(60) NOT NULL,
  `workshopreg_photo` varchar(200) NOT NULL,
  `workshopreg_proof` varchar(200) NOT NULL,
  `workshopreg_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_workshopreg`
--

INSERT INTO `tbl_workshopreg` (`workshopreg_id`, `workshopreg_name`, `workshopreg_email`, `workshopreg_contact`, `workshopreg_address`, `workshopreg_password`, `workshoptype_id`, `location_id`, `workshopreg_photo`, `workshopreg_proof`, `workshopreg_status`) VALUES
(23, 'anadhu', 'anandhu5643@gmail.com', '9847005697', 'tvmnvjjgjgjhef\r\n\r\n\r\n', '1234773737_34', 3, 14, 'C:xampp	mpphp82A6.tmp', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 1),
(30, 'jintu', 'jintu@123', '9847005697', 'smnss', '1233445', 3, 15, 'Screenshot 2024-04-06 140937.png', 'Screenshot 2024-04-19 001209.png', 1),
(34, 'albin sunny', 'albin@123', '9847005398', 'phuzha', '12345678', 3, 14, 'hd-wallpaper-gfcf805f9b_1920.jpg', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 1),
(37, 'als', 'allll@2234', '9847005697', 'aesrjhjvbn ', '123', 3, 15, 'hd-wallpaper-gfcf805f9b_1920.jpg', 'hd-wallpaper-gfcf805f9b_1920.jpg', 0),
(38, 'Alex', 'alex@12', '9876543216', 'aluuu', 'Alex_12a', 3, 18, 'hd-wallpaper-gfcf805f9b_1920.jpg', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 2),
(39, 'Amal s', 'amals12@gmail.com', '7041276934', 'Afggjrtgjr', 'Amal@123456', 3, 14, 'hd-wallpaper-gfcf805f9b_1920.jpg', 'pexels-quang-nguyen-vinh-2166711 (1).jpg', 1),
(40, 'Kichu', 'kichu@1223', '9876564326', 'kichussss', 'Kic1234sddf', 3, 19, 'Screenshot 2024-04-18 235843.png', 'Screenshot 2024-04-18 235843.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshoptype`
--

CREATE TABLE `tbl_workshoptype` (
  `workshoptype_id` int(11) NOT NULL,
  `workshoptype_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_workshoptype`
--

INSERT INTO `tbl_workshoptype` (`workshoptype_id`, `workshoptype_name`) VALUES
(3, 'dfghjkvbnm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admi_id`);

--
-- Indexes for table `tbl_assignwork`
--
ALTER TABLE `tbl_assignwork`
  ADD PRIMARY KEY (`assignwork_id`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`Complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `tbl_rereques`
--
ALTER TABLE `tbl_rereques`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_vechicletype`
--
ALTER TABLE `tbl_vechicletype`
  ADD PRIMARY KEY (`vehicletype_id`);

--
-- Indexes for table `tbl_workshopreg`
--
ALTER TABLE `tbl_workshopreg`
  ADD PRIMARY KEY (`workshopreg_id`);

--
-- Indexes for table `tbl_workshoptype`
--
ALTER TABLE `tbl_workshoptype`
  ADD PRIMARY KEY (`workshoptype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_assignwork`
--
ALTER TABLE `tbl_assignwork`
  MODIFY `assignwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `Complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_rereques`
--
ALTER TABLE `tbl_rereques`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vechicletype`
--
ALTER TABLE `tbl_vechicletype`
  MODIFY `vehicletype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_workshopreg`
--
ALTER TABLE `tbl_workshopreg`
  MODIFY `workshopreg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_workshoptype`
--
ALTER TABLE `tbl_workshoptype`
  MODIFY `workshoptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
