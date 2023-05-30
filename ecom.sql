-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 02:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status3` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `unique_id`, `username`, `password`, `name`, `status`, `status3`) VALUES
(1, 1, 'admin', '$2y$10$fL8ztuEnkkcqqZshYICBouZVflO8glqHp0Kp9mFtEhjETUsiTUmsa', 'CDJ Technologies', 'Active now', '05:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `description`, `link`, `status`) VALUES
(1, 'Smart Phones', '751777620_mobilephones-banner2.jpg', 'Branded and quality products for lowest price in the market', 'mobile', 1),
(2, 'Gaming PC', '333640793_slide-2.jpg', 'Branded and quality products for lowest price in the market', 'mobile', 1),
(3, 'Laptops', '848750454_slide-3.jpg', 'Branded and quality products for lowest price in the market', 'mobile', 1),
(4, 'Drones', '300113045_slide-1.jpg', 'Branded and quality products for lowest price in the market', 'mobile', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `image`, `status`) VALUES
(2, 'Camera', '405755720_2505980c4bc3b3a4b9428f1c1bbbea7c.jpg', 1),
(3, 'Laptops', '307611765_lap.jpg', 1),
(5, 'Earphone', '852450513_cc8dcbeec4efe31489ba317666988697.jpg', 0),
(7, 'PC Components', '536604316_comp.jpg', 1),
(9, 'Gaming PC', '400098699_', 1),
(10, 'Drones', '835037815_', 1),
(11, 'CCTV Camera', '302809248_cctv.jpg', 1),
(13, 'Mobile Phones', '269579897_mobilephones-banner2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `best_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `image2`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`, `best_seller`) VALUES
(1, 2, 0, 'EOS 200D', 50000, 50000, 25, '908139513_Canon-EOS-200D-Rebel-SL2-Review-Flash-Up-EF-S18-55ISSTMf4-5.6-FSL.jpg', '214280238_png-clipart-digital-slr-canon-eos-800d-canon-eos-200d-canon-powershot-g1-x-mark-ii-camera-lens-camera-lens-lens-camera-lens.png', 'Jazz up your everyday photography', 'EOS 200D II (EF-S 18-55mm f/4-5.6 IS STM)\r\nJazz up your everyday photography\r\nEOS 200D II is Canon’s lightest DSLR with a Vari-angle Touch Screen LCD. Weighing only a little heavier than a bottle of water*, the camera slides right into your bag conveniently for that everyday photography. Packed into its petite body is Canon’s 24.1-megapixels APS-C CMOS sensor, DIGIC 8 processor and a bunch of features that would make snapping your everyday life seamlessly easier.\r\n\r\nFirst time incorporated into an EOS DLSR, Creative Assist and Smooth Skin feature would allow you to achieve desired effects on your photos and easily take picture perfect selfies. Stay connected to the camera with the Bluetooth Low Energy connection and send images to your mobile devices via Wi-Fi as you shoot for ease of sharing.\r\n\r\nThe EOS 200D II is designed for comfort with its deep grip and ergonomically laid out function dials. With Black, Silver and White to choose from, it is sure to adds a statement to your lifestyle.\r\n\r\n24.1MP APS-C CMOS Sensor\r\nDual Pixel CMOS AF\r\nDIGIC 8\r\n3,975 selectable focus positions (Live View)\r\nCreative Assist, Creative Filters and Smooth Skin\r\nEye Detection AF (One Shot & Servo AF – Live View)', 'EOS 200D', 'EOS 200D', 'EOS 200D', 1, 1),
(14, 10, 0, 'Drone', 50000, 50000, 50, '420738027_DJI-Mavic-2-Pro-and-Zoom-Review-1.jpg', '183287782_483-4835958_dji-mavic-pro-2-price-png-download-dj.png', 'drone', '???°?????????? ?? ??? ???????A 90°adjustable high-performance camera which is ideal for Aerial shot, takes excellent 4K Ultra HD pictures and help you capture and memorize every precious moment.\\r\\n????????? ?????? ?????One intelligent flight battery provides a maximum flight time of 20 minutes. While supplied with an extra battery, this drone will extend the flight time to 40 mins (2*20 mins), brings you double joy time?\\r\\n????? ???????? ????? ???? ????Equipped with more functions like Follow function, Waypoint fly, Auto Return and Find The Lost Drone, it meets different needs and create more flying fun. And you do not need to worry about losing the drone due to operating errors or strong winds interference during flight, Find the Lost Drone function helps you track the last position by APP and easily find the drone.\\r\\n????? ?????? ?? ?????? ??? ??????? ?????? ??????It has dual positioning system-optical flow and GPS positioning system. These two positioning systems bring you a safer and freer flight. They also help the drone precisely lock the height and hover stably to achieve better performance photograph or videos. Please note that a strong GPS signal must be searched before flying when it flies outdoors.\\r\\n????? ??????????With one key auto-take off and one key auto-land button, this drone can be easily operated to start and stop. And combined with the considerate icons on the APP, this drone becomes more simple to access even for drone beginners.', 'drone', '', 'drone', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL,
  `unique_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `msged` int(16) NOT NULL,
  `msged_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code` mediumint(50) NOT NULL,
  `status2` text NOT NULL,
  `status3` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
