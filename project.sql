-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 11:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_comment`
--

CREATE TABLE `booking_comment` (
  `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `img_file_cm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_comment`
--

INSERT INTO `booking_comment` (`booking_id`, `img_file_cm`, `comment`) VALUES
(000002, 'GIF_of_a_Charmander_.gif', 'ระวังตรงนี้หน่อยนะจ๊ะ'),
(000004, 'grood.gif', 'ระวังตรงนี้หน่อยนะค่ะ'),
(000028, 'xxx.png', 'zzzz'),
(000030, 'xxx.png', 'ระวัง');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `booking_detail_id` int(8) NOT NULL,
  `booking_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ref_maid` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`booking_detail_id`, `booking_id`, `ref_maid`) VALUES
(1, '000001', '000002'),
(2, '000002', '000002'),
(3, '000003', '000002'),
(4, '000004', '000004'),
(5, '000004', '000005'),
(6, '000005', '000005'),
(7, '000005', '000006'),
(8, '000006', '000004'),
(9, '000006', '000005'),
(33, '000019', '000006'),
(34, '000019', '000005'),
(35, '000020', '000006'),
(36, '000021', '000006'),
(42, '000027', '000002'),
(43, '000028', '000002'),
(44, '000028', '000004'),
(45, '000029', '000006'),
(46, '000030', '000006'),
(50, '000034', '000002'),
(51, '000035', '000002');

-- --------------------------------------------------------

--
-- Table structure for table `booking_items`
--

CREATE TABLE `booking_items` (
  `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_items`
--

INSERT INTO `booking_items` (`booking_id`, `item_name`, `item_price`) VALUES
(000001, '000001', 30),
(000001, '000002', 20),
(000002, '000001', 30),
(000002, '000002', 20),
(000003, '000001', 30),
(000003, '000002', 20),
(000004, '000001', 30),
(000004, '000002', 20),
(000005, '000001', 30),
(000005, '000002', 20),
(000005, '000003', 25),
(000006, '000001', 30),
(000019, '000001', 30),
(000019, '000002', 20),
(000019, '000003', 25),
(000027, '000001', 30),
(000027, '000002', 20),
(000027, '000003', 25),
(000028, '000001', 30),
(000028, '000002', 20),
(000028, '000003', 25),
(000029, '000001', 30),
(000030, '000001', 30),
(000034, '000001', 30),
(000035, '000001', 30),
(000035, '000002', 20);

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

CREATE TABLE `booking_rooms` (
  `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `room_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_rooms`
--

INSERT INTO `booking_rooms` (`booking_id`, `room_name`, `room_price`) VALUES
(000001, '000001', 20),
(000001, '000002', 50),
(000002, '000001', 20),
(000002, '000002', 50),
(000003, '000002', 50),
(000003, '000003', 50),
(000004, '000001', 20),
(000004, '000002', 50),
(000005, '000001', 20),
(000005, '000002', 50),
(000006, '000001', 20),
(000006, '000002', 50),
(000019, '000001', 20),
(000019, '000002', 50),
(000027, '000001', 20),
(000027, '000002', 50),
(000028, '000001', 20),
(000028, '000002', 50),
(000029, '000001', 20),
(000029, '000002', 50),
(000030, '000001', 20),
(000030, '000002', 50),
(000034, '000001', 20),
(000034, '000002', 50),
(000035, '000001', 20),
(000035, '000002', 50);

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_booking_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area_size` int(6) UNSIGNED ZEROFILL NOT NULL,
  `price_area` float NOT NULL,
  `start_work` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_work` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `work_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`booking_id`, `ref_booking_uid`, `area_size`, `price_area`, `start_work`, `end_work`, `created_at`, `status_id`, `work_status`) VALUES
(000001, '1437826812956031', 000001, 200, '1493416800', '1493503199', '2017-04-28 08:52:48', 'true', 'true'),
(000002, 'rWf4cxGdKpMp3zNRiJq4lJ03kfI3', 000001, 200, '1493589600', '1493675999', '2017-04-30 19:25:33', 'true', 'true'),
(000003, '1437826812956031', 000001, 200, '1494194400', '1494280799', '2017-05-07 09:10:39', 'true', 'true'),
(000004, '1437826812956031', 000002, 325, '1494367200', '1494453599', '2017-05-09 09:40:58', 'true', 'true'),
(000005, '1437826812956031', 000001, 200, '1495317600', '1495403999', '2017-05-09 11:30:23', 'true', 'true'),
(000006, '1437826812956031', 000001, 200, '1494626400', '1494712799', '2017-05-11 04:59:00', 'true', 'true'),
(000019, '1437826812956031', 000001, 200, '1495058400', '1495144799', '2017-05-16 21:33:24', 'true', 'true'),
(000027, 'rWf4cxGdKpMp3zNRiJq4lJ03kfI3', 000001, 200, '1495576800', '1495663199', '2017-05-23 09:00:00', 'true', 'true'),
(000028, '1437826812956031', 000001, 200, '1495749600', '1495835999', '2017-05-24 07:06:44', 'true', 'true'),
(000029, 'rWf4cxGdKpMp3zNRiJq4lJ03kfI3', 000001, 200, '1496354400', '1496440799', '2017-05-31 08:49:48', 'true', 'true'),
(000030, '1882196265360530', 000002, 325, '1496440800', '1496527199', '2017-06-01 05:51:59', 'true', 'true'),
(000034, '1437826812956031', 000001, 200, '1496959200', '1497045599', '2017-06-07 08:54:01', 'true', 'false'),
(000035, 'DOessgtlMVMyJWI1OaUHBdpRYUy2', 000001, 200, '1498168800', '1498255199', '2017-06-09 09:20:53', 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_detail`
--

CREATE TABLE `borrow_detail` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_borrow_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `item_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `item_amount` int(3) NOT NULL,
  `item_return` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_detail`
--

INSERT INTO `borrow_detail` (`id`, `ref_borrow_id`, `item_id`, `item_amount`, `item_return`) VALUES
(000001, 000001, 000001, 1, 1),
(000002, 000001, 000002, 1, 1),
(000003, 000001, 000003, 1, 1),
(000004, 000002, 000001, 1, 0),
(000005, 000002, 000002, 1, 0),
(000006, 000002, 000003, 1, 0),
(000007, 000003, 000001, 1, 0),
(000008, 000003, 000002, 1, 0),
(000009, 000003, 000003, 1, 0),
(000010, 000004, 000001, 1, 0),
(000011, 000004, 000002, 1, 0),
(000012, 000004, 000003, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_table`
--

CREATE TABLE `borrow_table` (
  `borrow_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_maid_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_table`
--

INSERT INTO `borrow_table` (`borrow_id`, `ref_maid_id`, `borrow_date`, `return_date`, `status`) VALUES
(000001, 000002, '2017-06-08 08:29:26', '08-06-2017 22:45:47', 4),
(000002, 000002, '2017-06-09 10:36:31', '', 4),
(000003, 000004, '2017-06-09 11:09:14', '', 1),
(000004, 000005, '2017-06-09 11:09:51', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment_point`
--

CREATE TABLE `comment_point` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maid_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `point` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `bin` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_point`
--

INSERT INTO `comment_point` (`uid`, `maid_id`, `point`, `comment`, `bin`, `created_at`) VALUES
('rWf4cxGdKpMp3zNRiJq4lJ03kfI3', '000002', '5', 'ทำงานได้เรียบร้อยดีมากๆเลยครับ', '000002', '2017-05-23 02:27:20'),
('1437826812956031', '000002', '5', 'สะอาดเอี่ยมอ่อง เยี่ยมเลย', '000001', '2017-05-27 16:08:02'),
('1437826812956031', '000002', '5', 'สุดยอดเลยครับ', '000003', '2017-05-27 16:19:20'),
('1437826812956031', '000005', '4', 'น่ารักมากเลย ครับ สะอาดหมดจด', '000005', '2017-05-27 16:20:00'),
('1437826812956031', '000006', '4', 'สะอาดมากครับ ชื่นชม', '000005', '2017-05-29 17:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_all` int(3) NOT NULL,
  `quantity_remain` int(3) NOT NULL,
  `item_wongout` int(3) NOT NULL,
  `item_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `img`, `item_name`, `quantity_all`, `quantity_remain`, `item_wongout`, `item_price`) VALUES
(000001, 'item1.jpg', 'เครื่องดูดฝุ่นอเนกประสงค์', 25, 24, 0, 30),
(000002, 'item3.jpeg', 'ไม้กวาดบ้าน', 20, 19, 0, 20),
(000003, 'item2.jpg', 'ไม้ถูพื้น', 30, 29, 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `num_bin` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`num_bin`, `name`, `email`, `phone`, `file`, `created_at`) VALUES
(000001, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', 'geometry19.png', '2017-04-30 19:22:57'),
(000002, 'ชนิกา บุญจันทร์', 'winhackger@gmail.com', '091-763-5351', 'geometry19.png', '2017-05-31 08:52:34'),
(000003, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', 'lifecycle.png', '2017-05-31 08:53:03'),
(000004, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', 'Untitled.jpg', '2017-05-31 08:53:21'),
(000005, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', 'mini.jpg', '2017-05-31 08:53:52'),
(000006, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', 'mini.jpg', '2017-05-31 08:54:30'),
(000019, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', '4474_20Jan2016010754_3.jpg', '2017-05-31 08:54:54'),
(000028, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', '4474_20Jan2016010754_3.jpg', '2017-05-31 08:55:18'),
(000027, 'ชนิกา บุญจันทร์', 'winhackger@gmail.com', '091-763-5351', '4474_20Jan2016010754_3.jpg', '2017-05-31 08:56:01'),
(000029, 'ชนิกา บุญจันทร์', 'winhackger@gmail.com', '091-763-5351', '4474_20Jan2016010754_3.jpg', '2017-05-31 08:50:50'),
(000030, 'test test', 'ujiik009@hotmail.com', '083-002-6006', '4474_20Jan2016010754_3.jpg', '2017-06-01 05:52:46'),
(000034, 'อธิวัฒน์ ทุ่มสักกะ', 'winhackger@gmail.com', '083-002-6006', '11391449_377812902408727_5097930925861590172_n.jpg', '2017-06-07 09:03:26'),
(000035, 'ทศพร สุภนิกร', 'bs5621207004@gmail.com', '091-725-3477', '11391449_377812902408727_5097930925861590172_n.jpg', '2017-06-09 09:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `room_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `room_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`room_id`, `room_name`, `room_price`) VALUES
(000001, 'ห้องนอน', 20),
(000002, 'ห้องน้ำ', 50),
(000003, 'ห้องครัว', 50),
(000004, 'ห้องนั่งเล่น', 20);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_maid_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `salary` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `vat` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `startMonth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endMonth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `ref_maid_id`, `salary`, `vat`, `startMonth`, `endMonth`, `created_at`) VALUES
(000001, 000002, '550', '39', '1490997600', '1493503200', '2017-06-05 18:19:55'),
(000002, 000002, '2200', '154', '1493589600', '1496181600', '2017-06-05 18:24:44'),
(000003, 000004, '1712.5', '120', '1493589600', '1496181600', '2017-06-05 18:24:48'),
(000004, 000005, '2262.5', '158', '1493589600', '1496181600', '2017-06-05 18:24:53'),
(000005, 000006, '1100', '77', '1493589600', '1496181600', '2017-06-05 18:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `size_area`
--

CREATE TABLE `size_area` (
  `size_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `size_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size_pirce` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size_area`
--

INSERT INTO `size_area` (`size_id`, `size_name`, `size_pirce`) VALUES
(000001, 'คอนโด (ไม่เกิน 40 ตร.ม.)', 200),
(000002, 'คอนโด (ไม่เกิน 50 ตร.ม.)', 325),
(000003, 'คอนโด (ไม่เกิน 80 ตร.ม.)', 450),
(000004, 'คอนโด (ไม่เกิน 100 ตร.ม.)', 575),
(000005, 'บ้าน/ ทาวน์โฮม/ ตึกแถว (ไม่เกิน 100 ตร.ม.) ', 450),
(000006, 'บ้าน/ ทาวน์โฮม/ ตึกแถว (100-200 ตร.ม.)', 700),
(000007, 'สำนักงาน', 200);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'กำลังตรวจสอบ'),
(2, 'รอรับของ'),
(3, 'ยืมของแล้ว'),
(4, 'คืนเรียบร้อยแล้ว'),
(5, 'คืนไม่ครบ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `social_provider` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'U',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `image`, `social_provider`, `status`, `created_at`, `updated_at`) VALUES
('1437826812956031', 'Atiwat Ball Tumsakka', 'winhackger@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/17523502_1456317611106951_5746767837973418459_n.jpg?oh=35a572396774a3b57762f60fae86e260&oe=5999CBAA', 'facebook', 'U', '2017-04-16 15:48:25', '2017-04-16 08:48:25'),
('1882196265360530', 'Apirat Noiaroon', 'ujiik009@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12790889_1708288426084649_4820743396910812471_n.jpg?oh=241cdbab22418a1e6bee289b07360b4b&oe=59A97A70', 'facebook', 'U', '2017-06-01 12:48:30', '2017-06-01 05:48:30'),
('DOessgtlMVMyJWI1OaUHBdpRYUy2', 'อธิวัฒน์ ทุ่มสักกะ', 'bs5621207004@gmail.com', 'https://lh5.googleusercontent.com/-T2zOz7xfhKw/AAAAAAAAAAI/AAAAAAAAAAs/lfspwUXEZUQ/photo.jpg', 'google', 'U', '2017-06-01 15:02:37', '2017-06-01 08:02:37'),
('rWf4cxGdKpMp3zNRiJq4lJ03kfI3', 'Atiwat Tumsakka', 'winhackger@gmail.com', 'https://lh3.googleusercontent.com/-Xp7L1yCZ9t4/AAAAAAAAAAI/AAAAAAAAB2Y/WUFf5twvo3k/photo.jpg', 'google', 'U', '2017-04-26 15:16:01', '2017-04-26 08:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_backend`
--

CREATE TABLE `user_backend` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar_default.png',
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `show_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_backend`
--

INSERT INTO `user_backend` (`id`, `user`, `pass`, `email`, `fname`, `birthday`, `avatar`, `lname`, `address`, `show_detail`, `phone`, `status`) VALUES
(000001, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '31-01-1990', 'avatar_default.png', 'admin', 'addressADMIN', 'admin------', '111-111-1111', 'A'),
(000002, 'maid1', '827ccb0eea8a706c4c34a16891f84e7b', 'testemail@gmail.com', 'Aree', '2017-06-14', 'maid2.jpg', 'Jeebhied', 'บางแค', 'ดิฉันอารี หรือเรียกสั้นๆว่า รี ก็ได้ค่ะ ดิฉันเคยทำงานประจำกับบริษัทญี่ปุ่นทางด้านการวางแผนและควบคุมแผนการผลิต Import-Export และฝ่ายจัดซื้อ ปัจจุบันมีโอกาสได้ร่วมงานกับบริษัทในเครือของหนังสือพิมพ์"เดลินิวส์" ทำให้รู้จัก จากคอลัมส์ในหนังพิมพ์เดลินิวส์ จึงสนใจเข้ารับการอบรมแล้วก็รู้เลยว่าคือตัวเราเลย ชึ่งดิฉันเป็นคนรักความสะอาด ความละเอียดความป็นระเบียบเรียบร้อยอยู่แล้ว โดยปกตินี้ดิฉันมีจิตอาสาไปปัดกวาดเช็ดถู ขัดห้องน้ำ ที่วัดตลอดมาร่วม 20 ปีแล้วก็ว่าได้ ประกอบกับมีเวลาว่างมากมายเพราะไม่มีภาระเรื่องครอบครัว เลยรู้สึกได้เลยว่า คือสิ่งที่ใช่สำหรับดิฉันค่ะ', '083-212-4587', 'M'),
(000004, 'maid2', '827ccb0eea8a706c4c34a16891f84e7b', 'EmailMaid2@gmail.com', 'Patima', '09-02-1994', 'maid4.jpg', 'Pakinkitinath', 'address TEst', 'สวัสดีค่ะ ดิฉันปติมา หรือ แพท ค่ะ จบปริญญาตรี ด้านภาษาต่างประเทศ ทำงานในสายงานโรงแรม มีประสบการณ์ทำงานที่หลากหลาย รวมทั้งงานแม่บ้านด้วยค่ะ กิจกรรมหรืองานอดิเรกคือการทำความสะอาดชอบเห็นบ้านสะอาด ชอบอ่านหนังสือ ดูทีวี เล่นกีฬา ท่องเที่ยว และอยากจะทำกิจกรรมยามว่างของเราให้เป็นประโยชน์และเป็นงานเสริมเพิ่มรายได้อีกช่องทางหนึ่ง และได้เข้าร่วมงานเป็นพาร์ทเนอร์ของ ซึ่งทาง ได้มีการมาตรฐานการฝึกอบรม และระบบคัดกรองแม่บ้านมืออาชีพ ทำให้มั่นใจได้ว่าคุณจะได้รับบริการที่ดีที่สุดจากเราค่ะ ขอขอบคุณค่ะ', '111-111-1111', 'M'),
(000005, 'maid3', '827ccb0eea8a706c4c34a16891f84e7b', 'emaimaid3@gmail.com', 'Pattama', '15-05-1995', 'maid5.jpg', 'Pratyamongkol', 'ADDRESS TEST', 'สวัสดีค่ะ ดิฉันชื่อปัทมา หรือเรียก ปัท ก็ได้ค่ะ ตอนนี้ทำงานกับที่บ้านเป็นกิจการผลิตเครื่องประดับเงินเล็กๆ ซึ่งปัททำหน้าที่ดูแลเรื่องดีไซน์ค่ะ เวลาเครียดๆ หรือคิดงานไม่ค่อยออกมักจะชอบไปทำความสะอาดค่ะ คิดว่าถ้าเราได้อยู่ในที่ที่สะอาดและสวยงาม สามารถทำให้เราเกิดไอเดีย คิดงานได้ราบรื่นค่ะ พอทำแบบนี้บ่อยๆ เลยกลายเป็นชอบทำความสะอาดขึ้นมาแบบจริงจัง พอได้เห็นโฆษณาการร่วมงานกับ จึงมาลองสมัครดู เพราะสามารถเลือกเวลาทำงานได้ และตรงกับความชอบเราด้วย ยังไงขอให้ปัทได้มีโอกาสได้ดูแลความสะอาดในที่พักของคุณลูกค้าด้วยนะคะ', '222-222-2222', 'M'),
(000006, 'maid4', '827ccb0eea8a706c4c34a16891f84e7b', 'emailmaid4@gmail.com', 'Weeranuch', '01-06-1991', 'maid6.jpg', 'Wisetsiri', 'address maid4', 'สวัสดีคะ ดิฉัน ชื่อ วีรนุช วิเศษศิริ หรือจะเรียก ป้าแตน ได้เลยนะคะ ปัจจุบันดิฉันเป็นคุณแม่บ้านดูแลครอบครัวคะ โดยเฉพาะเรื่องงานบ้านงานเรือน งานทำความสะอาดนี้ถนัดมากค่ะ ซึ่งพอลูกๆ โตเข้าโรงเรียนกันหมดแล้วดิฉันจึงมีเวลาว่างช่วงกลางวัน พอมาเจอกับ ที่เป็น partner ช่วยสร้างรายได้เสริมให้กับเราได้และรายได้เสริมนั้นก็มาจากความถนัดของเราที่มีอยู่แล้วเลยคิดว่า ใช่เลยค่ะ อย่างไรก็ตามขอให้ ป้าแตน มีโอกาสให้บริการด้านความสะอาดในที่พักของคุณลูกค้าทุกๆ ท่านนะคะ', '222-222-2222', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`uid`, `fname`, `lname`, `phone`, `address`, `lat`, `lng`) VALUES
('1437826812956031', 'อธิวัฒน์', 'ทุ่มสักกะ', '083-002-6006', '114/3 เพชรเกษม 28 แขวง บางแค เขต บางแค กรุงเทพมหานคร 10160 ประเทศไทย', 13.709469663514964, 100.41033174288327),
('1882196265360530', 'test', 'test', '083-002-6006', 'ถนน ทางคู่ขนาน วงแหวนรอบนอกกรุงเทพมหานครฝั่งตะวันตก แขวง บางแคเหนือ เขต บางแค กรุงเทพมหานคร 10160 ประเทศไทย', 13.711627250026426, 100.40831472170407),
('DOessgtlMVMyJWI1OaUHBdpRYUy2', 'ทศพร', 'สุภนิกร', '091-725-3477', 'โบ้เบ้ เขต ป้อมปราบศัตรูพ่าย กรุงเทพมหานคร ประเทศไทย', 13.7487756, 100.51667670000006),
('rWf4cxGdKpMp3zNRiJq4lJ03kfI3', 'ชนิกา', 'บุญจันทร์', '091-763-5351', 'NEW WAVE แขวง หิรัญรูจี เขต ธนบุรี กรุงเทพมหานคร 10600 ประเทศไทย', 13.73421562152323, 100.49019984061431);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`booking_detail_id`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `borrow_detail`
--
ALTER TABLE `borrow_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_table`
--
ALTER TABLE `borrow_table`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `size_area`
--
ALTER TABLE `size_area`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_backend`
--
ALTER TABLE `user_backend`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `booking_detail_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `borrow_detail`
--
ALTER TABLE `borrow_detail`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `borrow_table`
--
ALTER TABLE `borrow_table`
  MODIFY `borrow_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `room_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `size_area`
--
ALTER TABLE `size_area`
  MODIFY `size_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_backend`
--
ALTER TABLE `user_backend`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
