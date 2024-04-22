-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 09:36 AM
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
-- Database: `united_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `img` varchar(200) NOT NULL,
  `about` varchar(300) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `username`, `img`, `about`, `status`) VALUES
(1, 'Jhonny', 'male1.jpg', 'Hiiii', 0),
(2, 'Jhonny', 'male1.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, neque voluptates facere assumenda obcaecati temporibus porro repellat iste maiores facilis vitae adipisci eaque culpa expedita illo ipsam blanditiis itaque eligendi?', 1),
(3, 'Lily', 'female1.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, neque voluptates facere assumenda obcaecati temporibus porro repellat iste maiores facilis vitae adipisci eaque culpa expedita illo ipsam blanditiis itaque eligendi?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, neque v', 0),
(4, 'Mike', 'trainerM2A.jpg', 'Hiiii Everyone', 1),
(5, 'Mike', 'trainerM2A.jpg', 'How are you guys doing?\r\n', 1),
(6, 'Jhonny', 'male1.jpg', 'Yo What is up man', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `img` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nrc` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `wc_id` varchar(15) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `img`, `phone`, `gender`, `nrc`, `address`, `email`, `password`, `wc_id`, `status`) VALUES
(1, 'Lily', 'female1.jpg', '099423984', 'female', '1/ta.ta.ta(n)293410', 'no232300000,mingalar street', 'lily@gmail.com', 'lilylily', 'UFC-xx 01', 1),
(2, 'Lily', 'female2.jpg', '983042088', 'female', '6/na.na.na(n)934728', 'no2323000,mingalar street', 'lily@gmail.com', 'lily', '', 1),
(3, 'Jhonny', 'male1.jpg', '923467844', 'male', '7/na.na.na(n)735919', 'no232300000,mingalar street', 'jhonny@gmail.com', 'jhonny', '', 1),
(4, 'David', 'male2.jpg', '0981237423', 'male', '8/na.na.na(n)956174', 'no232300000,mingalar street', 'david@gmail.com', 'david', '', 1),
(5, 'Natasha', 'female3.jpg', '0937463234', 'female', '4/da.da.da(n)198263', 'no232300000,mingalar street', 'natasha@gmail.com', 'Natash@1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(200) NOT NULL,
  `about` varchar(250) NOT NULL,
  `price` int(8) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `name`, `img`, `about`, `price`, `status`) VALUES
(1, 'Weight Loss+Cardio Package', 'weightloss.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, similique. Rem neque praesentium laboriosam t\r\n                  ', 100, 1),
(2, 'Weight Gain Package', 'weightgain.jpg', '				Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, similique. Rem neque praesentium laboriosam totam eaque quidem molestiae minus ea. Harum modi nisi magni hic culpa maiores debitis est voluptatum! Lorem ipsum dolor sit amet conse', 110, 1),
(3, 'Agality training Package', 'agality.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, similique. Rem neque praesentium laboriosam totam eaque quidem molestiae minus ea. Harum modi nisi magni hic culpa maiores debitis est voluptatum!\r\n      ', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `trainer` varchar(30) NOT NULL,
  `package` varchar(30) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `customer`, `trainer`, `package`, `schedule`, `total`, `status`) VALUES
(1, 'Lily', 'Giga Chad', 'Weight Gain Package', 'Evening 4:00 P.M - 9:00P.M', 175, 1),
(2, 'David', 'Giga Chad', 'Weight Gain Package', 'Evening 4:00 P.M - 9:00P.M', 175, 1),
(3, 'Jhonny', 'No Trainer', 'Agality training Package', 'Afternoon 1:00P.M - 4:00P.M', 99, 1),
(4, 'Jhonny', 'Mike', 'Weight Loss+Cardio Package', 'Evening 4:00 P.M - 9:00P.M', 130, 1),
(5, 'Jhonny', 'Mike', 'Weight Loss+Cardio Package', 'Evening 4:00 P.M - 9:00P.M', 130, 1),
(6, 'Jhonny', 'Jhonny', 'Agality training Package', 'Afternoon 1:00P.M - 4:00P.M', 134, 1),
(7, 'Jhonny', 'Jhonny', 'Weight Gain Package', 'Morning 9:00 A.M - 1:00P.M', 145, 1),
(8, 'Jhonny', 'No Trainer', 'Weight Loss+Cardio Package', 'Morning 9:00 A.M - 1:00P.M', 100, 1),
(9, 'Lily', 'Mishel', 'Weight Gain Package', 'Evening 4:00 P.M - 9:00P.M', 149, 1),
(10, 'Lily', 'No Trainer', 'Weight Loss+Cardio Package', 'Morning 9:00 A.M - 1:00P.M', 100, 1),
(11, 'Lily', 'Mike', 'Weight Gain Package', 'Afternoon 1:00P.M - 4:00P.M', 140, 1),
(12, 'Lily', 'Giga Chad', 'Agality training Package', 'Evening 4:00 P.M - 9:00P.M', 164, 1),
(13, 'Lily', 'Mike', 'Agality training Package', 'Evening 4:00 P.M - 9:00P.M', 129, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nrc` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `trainerp` int(10) NOT NULL,
  `wt_id` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  `extras` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `name`, `img`, `phone`, `gender`, `nrc`, `address`, `email`, `password`, `trainerp`, `wt_id`, `status`, `extras`) VALUES
(1, 'Jhonny', 'trainerM1A.jpg', '0992385839', 'male', '3/la.la.la(n)784732', 'no232300000,mingalar street', 'jhonny@gmail.com', 'jhonny', 35, 'UFT-xx 01', 1, 1),
(2, 'Mike', 'trainerM2A.jpg', '0983042083', 'male', '4/da.da.da(n)198263', 'no232300000,mingalar street', 'mike@gmail.cm', 'mike', 30, 'UFT-xx 02', 1, 0),
(3, 'Mishel', 'trainerFM1A.jpg', '0948754353', 'female', '5/da.da.da(n)579360', 'no232300000,mingalar street', 'mishel@gmail.com', 'mishel', 39, 'UFT-xx 03', 1, 1),
(4, 'Giga Chad', 'Giga_Chad_(alt).jpg', '923467844', 'male', '11/la.la.la(n)934790', 'no232300000,mingalar street', 'giga.chad@gmail.com', 'gigachad', 65, 'UFT-xx 04', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
