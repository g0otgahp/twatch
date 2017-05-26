-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 07:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t_watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Casio'),
(2, 'Julius'),
(3, 'Seiko');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_price_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_product_id`, `order_detail_id`, `order_amount`, `order_price_per`) VALUES
(4, 9, 3, 1, 20900);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_detail_date` datetime NOT NULL,
  `order_detail_user` int(11) NOT NULL,
  `order_detail_address` varchar(500) NOT NULL,
  `order_detail_pic` varchar(100) NOT NULL DEFAULT 'unaccept.png',
  `order_detail_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_detail_date`, `order_detail_user`, `order_detail_address`, `order_detail_pic`, `order_detail_status`) VALUES
(3, '2017-05-13 22:40:46', 1, '555/4 666', '20170513184019.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE `order_temp` (
  `order_temp_id` int(11) NOT NULL,
  `order_temp_product_id` int(11) NOT NULL,
  `order_temp_amount` int(255) NOT NULL,
  `order_temp_price_per` int(255) NOT NULL,
  `order_temp_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_detail` varchar(5000) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `product_brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_price`, `product_pic`, `product_brand_id`) VALUES
(1, 'รุ่น AQ-S810W-1BV - สีขาว', 'รุ่น AQ-S810W-1BV - สีขาว', 5500, '20170512121707.jpg', 1),
(4, 'Casio G-Shock Resin Strap Mens Watch ดำ-แดง', 'Casio G-Shock Resin Strap Mens Watch ดำ-แดง', 4000, '20170512122247.jpg', 1),
(5, 'New Casio Men\'s G-Shock GA110GW-1A Resin Quartz Watch white', 'New Casio Men\'s G-Shock GA110GW-1A Resin Quartz Watch white', 3500, '20170512122338.jpg', 1),
(6, ' จูเลียสจ๋า-426 นาฬิกาควอทซ์ลีกหญิงสายสเตนเลสถักโกลเด้น', ' จูเลียสจ๋า-426 นาฬิกาควอทซ์ลีกหญิงสายสเตนเลสถักโกลเด้น', 450, '20170512122556.jpg', 2),
(7, 'Julius นาฬิกาข้อมือสตรีรุ่น JA-931-rosegold-silver(Gold)  ', 'Julius นาฬิกาข้อมือสตรีรุ่น JA-931-rosegold-silver(Gold)  ', 1290, '20170512122623.jpg', 2),
(8, ' จูเลียสจ๋า-354 สแควร์ควอทซ์หน้าปัดนาฬิกาหนังเพศปกติโกลเด้น  ', ' จูเลียสจ๋า-354 สแควร์ควอทซ์หน้าปัดนาฬิกาหนังเพศปกติโกลเด้น  5555', 350, '20170512122639.jpg', 2),
(9, ' นาฬิกา Seiko Prospex Zimbe Limited Edition รุ่น SRPA47J1', 'ประกันศูนย์ไทย Seiko 1 ปี พร้อมกล่องและใบรับประกันศูนย์ Seiko 1 ปี จัดส่งEMSฟรี\r\n- นาฬิการะบบ Automatic เครื่อง 4R36 24 jewels Made in Japan\r\n- ขึ้นลาน แฮ็คเข็มวินาทีได้\r\n- ขอบหน้าปัดหมุนได้\r\n- ตัวเรือนสแตนเลส ขอบเซรามิก สายยาง\r\n- มี Lumibrite เ\r\n- กระจก Hardlex Crystal\r\n- ฝาหลังขันเกลียว\r\n- เม็ดมะยมขันเกลียว\r\n- กันน้ำ 200 เมตร\r\n- ขนาด 50.2 มม.', 20900, '20170513122959.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_email`, `user_username`, `user_pwd`, `user_address`) VALUES
(1, 'นายสมชาย', 'จริงจัง', '0804805243', 'somchai@gmail.com', 'somchai', '1234', '555/4'),
(2, 'นายธีรเดช', 'บุญนภา', '0804805243', 'Tuna_sang@hotmail.com', 'Jay', '1234', '30/8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`order_temp_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `order_temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
