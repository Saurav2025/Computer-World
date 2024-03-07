-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 08:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `btn_text` varchar(55) DEFAULT NULL,
  `btn_link` varchar(55) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `heading1`, `heading2`, `btn_text`, `btn_link`, `image`, `order_no`, `status`) VALUES
(1, 'Computer World', 'Gaming Series', 'Shop Now', 'cart.php', '945518555_3.jpg', 2, 1),
(2, 'Collection -2021', 'Branded System', '', '', '115136165_0bad7b00b5eaadbf238b06089fa2ed08.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(16, 'Desktops', 1),
(17, 'Laptop', 1),
(23, 'CCTV', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Saurav', 'Saurav@gmail.com', '7876767523', 'Please FucK Your self', '2021-06-22 15:20:18'),
(2, 'Saurav', 'saurab.j111@gmail.com', '81927862737', 'Hey There', '2021-07-07 02:44:37'),
(3, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:35:41'),
(4, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:36:28'),
(5, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:36:32'),
(6, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:36:53'),
(7, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:38:54'),
(8, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:39:06'),
(9, 'Surav Poojary', 'saurab.j111@gmail.com', '9898765688', 'sasasddfdrttft', '2021-08-24 07:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'First50', 100, 'Rupee', 500, 1),
(3, 'First250', 250, 'Rupee', 500, 1),
(5, 'COM5000', 5000, 'Rupee', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `length` float NOT NULL,
  `breadth` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `txnid` varchar(200) NOT NULL,
  `mihpayid` varchar(200) NOT NULL,
  `ship_order_id` int(11) NOT NULL,
  `ship_shipment_id` int(11) NOT NULL,
  `payu_status` varchar(20) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `username`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `length`, `breadth`, `height`, `weight`, `txnid`, `mihpayid`, `ship_order_id`, `ship_shipment_id`, `payu_status`, `coupon_id`, `coupon_value`, `coupon_code`, `added_on`) VALUES
(147, 24, 'SauravPOOa', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 47999, 'Success', 5, 0, 0, 0, 0, '581630ccb2c5f3eec338', '', 0, 0, '', 0, 0, '', '2021-09-15 08:39:32'),
(148, 24, ' SauravPOOa', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 47999, 'pending', 1, 0, 0, 0, 0, '282e57afa4bd4ed4e9e6', '', 0, 0, '', 0, 0, '', '2021-09-15 09:47:50'),
(149, 24, ' SauravPOOa', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 140, 'pending', 1, 0, 0, 0, 0, '4059216017e935230ea0', '', 0, 0, '', 0, 0, '', '2021-09-15 03:58:45'),
(150, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 23535, 'pending', 1, 0, 0, 0, 0, 'dc0c69dccd679f488dd8', '', 0, 0, '', 0, 0, '', '2021-09-16 06:59:15'),
(151, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'instamojo', 140, 'Success', 5, 0, 0, 0, 0, 'c66ef3c70237442095ec4b551205ec5c', '', 0, 0, '', 0, 0, '', '2021-09-16 07:38:16'),
(152, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 140, 'pending', 1, 0, 0, 0, 0, '01a8716499cc1a772ed0', '', 0, 0, '', 0, 0, '', '2021-09-16 10:07:48'),
(153, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 33999, 'pending', 1, 0, 0, 0, 0, '3d5d5dffccf8fa2606a8', '', 0, 0, '', 0, 0, '', '2021-09-16 12:33:28'),
(154, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'instamojo', 140, 'complete', 3, 56, 56, 56, 56, '33231382328f43c68892b96fd0067d70', 'MOJO1916K05A42176061', 143166749, 142721191, '', 0, 0, '', '2021-09-16 12:46:55'),
(155, 28, ' olwin', '10th cross jodukatte', 'Karnataka', 574107, 'COD', 48330, 'pending', 1, 0, 0, 0, 0, 'ca81b0c8196a23306657', '', 0, 0, '', 0, 0, '', '2021-09-18 07:52:25'),
(156, 28, ' olwin', '10th cross jodukatte', 'Karnataka', 574107, 'instamojo', 33999, 'Success', 5, 0, 0, 0, 0, '84abca509db3408bab8baa7ef8d1a9bb', '', 0, 0, '', 0, 0, '', '2021-09-18 07:54:21'),
(157, 24, ' Saurav Poojary', '10th cross jodukatte', 'Karnataka', 574107, 'instamojo', 47999, 'pending', 3, 56, 56, 56, 56, 'b35fb21b2508fdf652a3', '', 144605035, 144158487, '', 0, 0, '', '2021-09-18 10:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `user_id`, `product_id`, `qty`, `price`) VALUES
(165, 147, 24, 18, 1, 47999),
(166, 148, 24, 18, 1, 47999),
(167, 149, 24, 38, 1, 140),
(168, 150, 24, 20, 1, 23535),
(169, 151, 24, 38, 1, 140),
(170, 152, 24, 38, 1, 140),
(171, 153, 24, 19, 1, 33999),
(172, 154, 24, 38, 1, 140),
(173, 155, 28, 20, 2, 23535),
(174, 155, 28, 38, 9, 140),
(175, 156, 28, 19, 1, 33999),
(176, 157, 24, 18, 1, 47999);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(8, 15, 0, 'Razer DeathAdder Gaming Mouse', 999, 699, 10, '519679741_ANRBD200822SHNO4.jpg', 'The best Mouse.', 'The mouse is best', 0, 'Better to buy', 'Sauurav', 'Please', 1),
(9, 15, 0, 'Logitech G402 Optical Gaming Mouse', 1999, 1099, 10, '979027497_AU2SS210615vICeA.jpg', 'The Logitech G402 Optical Mouse – MS116 features optical LED tracking and wired connectivity.', 'The Logitech G402 Optical Mouse – MS116 features optical LED tracking and wired connectivity providing a stellar performance day after day. Improve your productivity at the office or at home–the Logitech G402 Optical Mouse will help keep you on task with accurate 1000 DPI optical tracking.', 0, '32322', '232343', '3434135', 1),
(10, 15, 0, 'Logitech Wireless Mini Mouse', 1000, 599, 12, '898629462_A8FN_130923872977562675h0ARyp5vRL.jpg', '', '', 0, '', '', '', 1),
(11, 15, 0, 'DELL MS 116 Wired Optical Mouse', 599, 299, 10, '420602358_A17P_1_201905221392310401.jpg', '', 'General\\r\\nModel Name      MS 116\\r\\nSystem Requirements    Windows 8, Windows XP, Windows 10, Windows 7\\r\\nSales Package                   MOUSE\\r\\nAdjustable Weight            No\\r\\nCompatible Devices          DESKTOP, LAPTOP\\r\\nColor                                    Black', 0, '', '', '', 1),
(12, 17, 0, 'Vicabo L11 15.6\" FHD Laptop', 49999, 45999, 10, '219241919_AN9ZD210102S0YTW.jpg', 'Intel Core i5-5257U 8GB Memory 256GB SSD', '15.6inch 1920 x 1080 FHD LED-backlit EDP display, with front HD 720P webcam\r\nIntel Core i5 5th Gen I5-5257U processor (3M cache, 2.70 GHz, up to 3.10 GHz)\r\n8 GB memory, 256 GB M.2 SSD\r\nIntel® Iris® Graphics 6100, 300MHz~1.05GHz\r\nSupport faster image processing, hard-decoing 4K video\r\nFull size backlit keyboard, metal shell\r\nWindows 10 Pro\r\n1 x 1.4b Mini HDMI\r\n1 x Type-C\r\n1 x USB 2.0\r\n2 x USB 3.0\r\n1 x 4-in-1 card reader (SD,SDHC, SDXC, MMC)\r\n1 x Headphone/Microphone Combo Jack\r\n14.06\" x 9.61\" x 0.74\", 4.3 lbs.', 0, '', '', '', 1),
(13, 17, 0, 'Dell Precision 7530 laptop', 39999, 37999, 10, '927975131_AHKVS2106290DNQV.jpg', '15.6\" FHD IPS Non-touch, Intel Core i7-8750H, 16GB DDR4', '15.6\" FHD IPS, Non-touch, Cam/Mic Bezel\r\nIntel Core i7-8750H, Six Core 2.20GHz, 4.10GHz Turbo, 9MB 45W, w/Intel HD GFX\r\n16GB, 2X8G, DDR4 2666MHz Non-ECC Memory\r\nM.2 512GB NVMe PCIe Class 40 Solid State Drive\r\nNVIDIA Quadro P1000 w/4GB GDDR5\r\nWi-fi, Bluetooth\r\nBacklit Keyboard\r\nWindows 10 Professional 64-bit\r\nWarranty: ProSupport Plus - March 2022', 0, '', '', '', 1),
(14, 17, 0, 'ASUS VivoBook 15 Thin Laptop', 45999, 43999, 10, '442096568_34-235-512-V24.jpg', '15.6\" FHD Display, Intel i5-1035G1 CPU, 8 GB RAM, 256 GB SSD + 1 TB HDD', '15.6 inch Full HD (1920 x 1080) 4-way NanoEdge bezel display with a stunning 88% screen-to-body ratio</br>\r\nLatest 10th Gen Intel Core i5-1035G1 CPU (6M Cache, up to 3.6 GHz)</br>\r\n8 GB DDR4 RAM and 256 GB PCIe NVMe M.2 SSD + 1 TB HDD</br>\r\nErgonomic backlit keyboard with fingerprint sensor activated via Windows Hello</br>\r\nExclusive Ergolift design for an improved typing position</br>\r\nComprehensive connections including USB 3.2 Type-C, USB 3.2 Type-A, USB 2.0, HDMI, and Gig+ Wi-Fi 6 (802.11ax) (*USB Transfer speed may vary. Learn more at ASUS website)</br>\r\nWindows 10 Home</br>', 0, '', '', '', 1),
(15, 17, 0, 'MAIBENBEN Gaming Laptops', 49999, 45999, 10, '319756328_AWZ5S210520vATFz.jpg', '144Hz Full HD IPS Anti-Glare 7nm AMD Ryzen 7 4000 Series 4800H Nvidia RTX 2060 16GB DDR4 3200MHZ RAM', 'AMD Ryzen 7 4800H (8 cores 16 threads; 2.9GHz; 7nm process; Level 2 cache 4MB)\r\nGeForce RTX 2060 (6GB GDDR6 Turing GPU architecture;1680 MHz Boost Clock 14 Gbps Memory Speed)\r\n17.3 inch 144Hz Full HD ADS Anti-Glare\r\nDual-channel;DDR4-3200MHz, Max support 32GB*2\r\nDual Storage Design; Up to 1TB PCIE SSD (512*2G PCIE SSD)\r\nPreinstalled Genuine Windows 10 Home 64 bits\r\nDual-Fans + Five Heat Pipes Cooling System\r\nRGB Backlit Keyboard\r\nWi-Fi 6 Wireless Network\r\n720P Front Webcam\r\nBattery:11.4V/4100mAh/ 46.74Wh\r\nWeight: 5.51lb. (Adapter not included)\r\nFree gifts: Mouse, mousepad\r\n1 year local warranty', 0, '', '', '', 1),
(16, 16, 0, 'Workstation Computer Desktop', 3999, 38999, 10, '702080160_ADGYD21070188872.jpg', 'Intel Core i5 6th Gen, NVIDIA Quadro K1200 4GB, 1TB SSD + 1TB HDD', 'Processor: Intel i5 Quad Core Gen 6 3.20 GHz Processor\r\nInstalled Memory: 32GB DDR4\r\nHard Drive: 1TB SSD\r\nOperating System: Windows 10 Professional 64bit\r\nWarranty: , No Hassle Money Back Guarantee', 1, '', '', '', 1),
(17, 16, 0, 'iBUYPOWER - Ryzen 3 3100', 25999, 24999, 10, '695020206_83-227-936-V01.jpg', '8 GB DDR4 - 1 TB HDD - GeForce GT 710 - Windows 10 Home - Desktop PC (ARCB 108AV2)', 'Ryzen 3 3rd Gen 3100 (3.60 GHz)\r\n8 GB DDR4\r\n1 TB HDD\r\nWindows 10 Home 64-bit\r\nNo Screen\r\nNVIDIA GeForce GT 710 1 GB', 0, '', '', '', 1),
(18, 16, 0, 'CyberpowerPC Gamer Xtreme', 49999, 47999, 10, '401908125_83-230-562-13.jpg', 'Intel Core i5-9600KF - 8 GB DDR4 - 500 GB SSD - GeForce GT 1030 - Windows 10 Home', 'Intel Core i5 9th Gen 9600KF (3.70 GHz)\r\n8 GB DDR4\r\n500 GB SSD\r\nWindows 10 Home 64-bit\r\nNVIDIA GeForce GT 1030 2 GB', 0, '', '', '', 1),
(19, 16, 1, 'Skytech Chronos Gaming Computer', 34999, 33999, 10, '833080458_83-289-131-07.jpg', 'Ryzen 5 3600 6-Core 3.60 GHz, RTX 2060 6 GB, 1 TB SSD, 16 GB DDR4 3000, B450 MB', 'AMD Ryzen 5 3600 6-Core 3.6 GHz (4.2 GHz Turbo) CPU Processor, 1 TB SSD - Up to 30x faster than traditional HDD, B450 Motherboard\r\nGeForce RTX 2060 6 GB Graphics Card, 16 GB DDR4 3000 MHz Gaming Memory, Windows 10 Home 64-bit\r\n802.11ac Wi-Fi, No Bloatware, HD Audio and Mic, Free Gaming Keyboard and Mouse, Graphic output options include 1 x HDMI, and 1 x Display Port Guaranteed, Additional Ports may vary, USB Ports Including 2.0, 3.0, and 3.2 Gen1 Ports\r\n3 x RGB Dual RING Fans for Maximum Air Flow, Powered by 80 Plus Certified 600 Watt Gold Power Supply, Skytech Chronos Mini, Black Edition w/ Front Mesh Gaming Case\r\nProduct images used on this page are for illustrative purposes only and are not indicative of the exact components used at the time of manufacture. Component makes and models may vary from depictions of the product in product images but will adhere to the specification outlined in the main description of the product. Particulars such as I/O ports may vary.', 1, 'The Best gaming Coputer', 'Gaming Computer', 'Game', 1),
(20, 16, 5, 'Kaiyahuja', 61562, 23535, 12, '651061812_83-230-562-13.jpg', '<p>gshghgdhd</p>', '<ul>\n	<li><span class=\"marker\"><strong><a href=\"http://localhost/admin/Admin/manage_product.php?id=20\">Click here for the admission</a></strong></span></li>\n	<li>Processor Type: Intel 2.93 GHz</li>\n	<li>NA GB Intel Onboard Graphics Graphics</li>\n	<li>Dual Core Mid Tower</li>\n	<li>4 GB DDR2 RAM</li>\n	<li>Hard Disk Capacity: 160 GB</li>\n</ul>', 1, '', '', '', 1),
(22, 19, 6, 'Chadii', 1499, 999, 10, '677757675_IMG_0112.JPG', 'Nice', 'Nice Chaddi', 1, 'nhdcghdf', '', '', 1),
(38, 23, 14, 'River Fox Combo Pack of 10 Pcs BNC Connector with Copper Wire Moulded', 150, 140, 12, '682817782_51Yf2C7TZ3L.jpg', '8CM and 10 Pc DC Power Pigtail Male Cables with 2.1mm Connectors Barrel Jack for Surveillance CCTV Camera (White)', '10 Pc. Bnc moulded Cables - 18 Cm</br>\r\n10 Pc. Center positive 2.1mm DC plug to durable two wires</br>\r\nNo Soldering, No Crimping, Just Connect 2 wires and tape it</br>\r\nHigh performance cable for connecting a camera, CCTV, VCR, antenna, or other devices</br>\r\nColor : White</br>', 0, 'BNC Connector with Copper Wire Moulded', '2.1mm Connectors Barrel Jack for Surveillance CCTV Camera', 'BNC Connector', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(2, 26, '530868643_IMG_20210826_175121_2.jpg'),
(3, 27, '340762553_Whatsapp.png'),
(4, 28, '660983519_IMG_20210826_175056_2.jpg'),
(5, 26, '279141893_l-41748-wildcraft-original-imafudu38dyjuhyz.jpeg'),
(6, 19, '184179242_WhatsApp Image 2021-09-01 at 12.27.10.jpeg'),
(7, 30, '454685757_Whatsapp.png'),
(8, 30, '717567783_facebook.png'),
(9, 31, '996413215_Whatsapp (1).png'),
(10, 32, '877859218_twitter (1).png'),
(11, 32, '436034399_Whatsapp (1).png'),
(12, 31, '229044890_twitter (1).png'),
(13, 33, '493880611_OIP (1).jpg'),
(14, 34, '393438002_OIP.jpg'),
(15, 35, '877811021_Whatsapp (1).png'),
(16, 36, '788018395_OIP (2).jpg'),
(17, 36, '817661815_OIP (3).jpg'),
(18, 37, '277706036_OIP (3).jpg'),
(19, 37, '268271606_OIP (2).jpg'),
(20, 38, '803731929_51Yf2C7TZ3L.jpg'),
(21, 38, '663657572_61g4Fr8n3cL._SL1500_.jpg'),
(22, 38, '813635472_61TzZe2n2tL._SL1500_.jpg'),
(23, 38, '317246801_61cGEWYCR7L._SL1100_.jpg'),
(24, 20, '637676330_651061812_83-230-562-13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES
(1, 38, 25, 'Good', 'The Product was good.', 1, '2021-09-14 07:09:48'),
(5, 38, 24, 'Very Good', 'Nice Product.', 1, '2021-09-14 09:09:21'),
(28, 38, 26, 'Very Good', 'Ples Provide Feedback here', 1, '2021-09-15 04:09:47'),
(29, 19, 28, 'Good', 'vshfhshfdjhg', 1, '2021-09-18 07:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `regi`
--

CREATE TABLE `regi` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regi`
--

INSERT INTO `regi` (`id`, `username`, `email`, `phone`, `password`, `cpassword`, `token`, `added_on`) VALUES
(23, 'SauravPOOa', 'Saurab6786.j111@gmail.com', '768676867867', '$2y$10$teMvK1mENH2N.9QsqG/7veA8skYl7umLV7nHYHOHQt0xo9jirT/IC', '$2y$10$alHkMFd8Doe8Jg2FQP74yeSHCL5pvg/X3hrNWI4z.Gn1.mtEGl3Hm', '7d8c4b5d5687d88df1b97606be9cd0', '2021-08-30 05:02:22'),
(24, 'Saurav Poojary', 'sauravpoojari65@gmail.com', '8722157983', '$2y$10$./7VfU0CW7ZhOkNVTq5mPu7mDwbuisR/YCzPY81QgIfB7eWGW.cMG', '$2y$10$CAewdGVl4sFoKLC4tcm2VuAOweZczSDNRZ4xDQAy3qv3Q0RR2iObi', '518fc8776ddddc76c904b408195069', '2021-08-30 05:08:13'),
(25, 'suresha', 'sauravpoojari65@gmail.com', '1234567890', '$2y$10$EJ2bCTKJuNbH4nJn8AH/QOX42f5UyH1d2Mq3oE/tMEhs5RQKXw36C', '$2y$10$PrJ3i0ExEqKnJlSOx5lv9uzm3kVYjYYYwUwxRXKfaS1Cg37FaY0sK', '47487cad8ace805879ea7f748d93ec', '2021-09-08 08:19:14'),
(26, 'Al-Fareed', 'saurab.j111@gmail.com', '65687787', '$2y$10$I8hYTJKM9ljeSH6WccMCPuMZtHVenWmD.Yns1sXnQg8EV.ZlI2tzC', '$2y$10$vWdhlfn2zgQi9OZOWmAdke5sH2MBxpaUpI/Z8ubJRM2yWy1m5k7JW', '96c47f4ca6d31c11d3024c58ed21af', '2021-09-08 11:48:46'),
(27, 'sadsadfad', 'sauravpaaoojari65@gmail.com', '8722561512', '$2y$10$p0DOIHLdjnQxsKy59tfOTOJixUvMaa6PGPBnFtbKXd5z4GKEnME8i', '$2y$10$evNnLyITqm6LM7q91Vbf5uZpSOlHg9LFr/qJhIoqR.RHCIqz96Mei', '17d01e9788a803f9f80eb6fd60af95', '2021-09-18 05:53:22'),
(28, 'Olwin Dsouzaj', 'olwindsouza2000@gmail.com', '8867029318', '$2y$10$iZNhLxh6PBF68BhwpI4rsucXMwSdo8tzYwWLi4ThNJxps19LRn432', '$2y$10$iuDUH4dYlOjqmW3IWEBFdewS/IXuPKMTKUTK61IITM2hOh.Vw82rW', '01650dd408b49798550f32424cd2b3', '2021-09-18 07:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` int(10) NOT NULL,
  `addr` varchar(2000) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Series` varchar(50) NOT NULL,
  `Warranty` text NOT NULL,
  `Date` date NOT NULL,
  `Issues` varchar(2000) NOT NULL,
  `coustomer_id` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  `service_status` int(2) NOT NULL,
  `serialno` varchar(200) NOT NULL,
  `Estimate` varchar(200) NOT NULL,
  `purshase_date` date NOT NULL,
  `comp_type` varchar(200) NOT NULL,
  `comp` varchar(200) NOT NULL,
  `repair_code` varchar(200) NOT NULL,
  `defect_code` varchar(200) NOT NULL,
  `job_complete` date NOT NULL,
  `delivery_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `Name`, `Email`, `Phone`, `addr`, `Brand`, `Series`, `Warranty`, `Date`, `Issues`, `coustomer_id`, `added_on`, `service_status`, `serialno`, `Estimate`, `purshase_date`, `comp_type`, `comp`, `repair_code`, `defect_code`, `job_complete`, `delivery_date`, `status`) VALUES
(91, 'Ashutosh', 'Sauravpoojary65@gmail.com', 2147483647, 'City Tower,Opp.Glaxy Hall,\r\nSalmar,Main Road,Karkala-574104', 'Dell', 'E-654433', 'Yes', '2021-01-27', 'Dipslay Problem', '21', '2021-08-27 03:58:06', 3, 'SEREWW123', '5000', '2020-12-28', 'Hardwarre issue', 'THe RAmisnotdgjgchce', 's3ss3', '2s32s2', '2021-08-25', '2021-08-28', 0),
(92, 'Nirmala Poojary', 'Nirmala@gmail.com', 2147483647, 'City Tower,Opp.Glaxy Hall,\r\nSalmar,Main Road,Karkala-574104\r\nKarkala', 'Asus', 'Gaming 5644', 'Yes', '2020-06-23', 'The heatin issue is increasing day by the days', '21', '2021-08-28 11:36:23', 3, 'SEREWW12344', '3000', '2021-08-31', 'Hardwarre issue', 'The hardware ship was melt', '1', 'Mother Board', '2021-08-25', '2021-08-29', 0),
(93, 'Geethika Poojary', 'Geethika@12343', 872215673, 'Sri Vaishnavi Girls and Working Women Hostel H.No. 3-4-466\r\nLingampally, Naryanguda, Opposite Reddy Women\'s College\r\nHyderabadTelangana 500027', 'Apple', 'macbook3 pro', 'No', '2020-01-28', 'Hard is not deteecting', '21', '2021-08-28 11:44:06', 3, 'MAC13254', '3200', '2021-08-02', 'Hardwarre issue', 'HArddisk was corruspted', '123', 'HArd Disk', '2021-08-29', '2021-08-29', 0),
(94, 'hghjghuj', 'saurab.j111@gmail.com', 88766756, 'jhjghg', 'hgjgjh', 'gjhgjh', 'Yes', '2011-11-11', 'bhghg', '1', '2021-08-29 05:48:19', 1, '', 'Will Notify You Shortly', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', 0),
(95, 'Alfa', 'saurab.j111@gmail.com', 2147483647, 'City Tower,Opp.Glaxy Hall,\r\nSalmar,Main Road,Karkala-574104', 'HP', 'GT-7654', 'Yes', '2021-09-15', 'Display problem', '21', '2021-08-31 06:46:22', 3, 'SS#R$344545', '15000', '2021-08-26', 'Hardware issue', 'Hards disk prob', 'dfgfgfgfg', 'hs', '2021-08-26', '2021-07-27', 0),
(96, 'Olwin', 'owlin855@gmail.com', 2147483647, '10th cross vinakar poojary nivas', 'Dell', 'E5656544', 'No', '2021-07-28', 'Display problem', '24', '2021-08-31 02:00:36', 3, '5454545', '1540', '2021-08-21', 'Hardware', 'Display fault', '1011', 'Display', '2021-08-26', '2021-08-23', 0),
(97, 'Olwin', 'sauravproject855@gmail.com', 2147483647, 'fgffggf', 'hp', 'E5656544', 'No', '2021-09-15', 'vfb bgfgnv', '24', '2021-09-01 06:59:28', 3, '2233', '111', '2021-11-11', 'dfvdvdf', 'fcbf', 'fgvcf', 'cfghfg', '2333-02-11', '2345-02-11', 0),
(98, 'Ashwija Acharya', 'ashwijaacharya7686@gmail.com', 2147483647, 'Call malth\'d ken  panpo', 'Lenovo', 'Ideapad', 'No', '2015-02-19', 'Lakkuji', '25', '2021-09-08 11:17:43', 1, '', 'Will Notify You Shortly', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', 0),
(99, 'Ashwija Acharya', 'saurab.j111@gmail.com', 534545, 'korpiujeiofdhyuadsg', 'csv', 'bdfzbf', 'Yes', '2021-09-23', 'bzdfff', '25', '2021-09-08 11:43:58', 1, '', 'Will Notify You Shortly', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', 0),
(100, 'tgij', 'saurab.j111@gmail.com', 87756453, 'hggfgdfsdd\r\nc', 'jhgh', '656454', 'No', '2021-09-24', 'fttrr', '', '2021-09-16 06:01:00', 1, '', 'Will Notify You Shortly', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', 0),
(101, 'Saurv Poojary', 'sauravpoojari65@gmail.com', 2147483647, 'Saurav Poojary', 'HP', '656454', 'Yes', '2019-04-18', 'Dsiplay Problem', '28', '2021-09-18 08:05:08', 3, '655563', '10000', '2021-09-09', 'Diplay', 'dispka', '1290', 'Display', '2021-09-23', '2021-09-24', 0),
(102, 'Saurv Poojary', 'saurab.j111@gmail.com', 2147483647, 'karkala', 'Acer', 'TUF', 'Yes', '2021-09-18', 'Display issue', '', '2021-09-18 07:05:42', 1, '8722', '7000', '2021-09-17', 'display z', 'display z', '129000', 'Display z', '2021-09-17', '2021-09-16', 0),
(103, 'Saurv Poojary', 'sauravpoojari65@gmail.com', 2147483647, 'katkala', 'HP', '656454', 'No', '2021-09-07', 'hsghd', '24', '2021-09-19 06:55:17', 3, '655563', '2000', '2021-09-13', 'Diplay', 'dispka', '1290', 'Display', '2021-09-19', '2021-09-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE `service_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Complete'),
(4, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `shiprocket_token`
--

CREATE TABLE `shiprocket_token` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiprocket_token`
--

INSERT INTO `shiprocket_token` (`id`, `token`, `added_on`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2NTI5MzMsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjMyMjQ1ODQ5LCJleHAiOjE2MzMxMDk4NDksIm5iZiI6MTYzMjI0NTg0OSwianRpIjoiRTFwNVFuNDJWVkFiS01HSSJ9.8zY6oUGgnrOv78vT90A0C-3V5gNMn1QiFnFmHHT1kos', '2021-09-21 05:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 16, 'RAM', 1),
(4, 22, 'Internal HDDD', 1),
(5, 16, 'Pc', 1),
(11, 22, 'Sa', 1),
(14, 23, 'Cables', 0),
(15, 16, 'Mouse & Keyboard', 1),
(16, 16, 'Internal & External HardDisk', 1),
(17, 17, 'Mouse & Keyboard', 0),
(18, 16, 'Power Cables', 1),
(19, 17, 'Charges', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`) VALUES
(30, 'Saurav_poojary', 'saurab.j111@gmail.com', '$2y$10$guJzrnKFzrkESQJElPvpJO357/QL6SCctMBskkAOyVV4GK3kWxCUS', '88c2e2d33a764fa48ba6e191edb82a');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(9, 14, 19, '2021-07-18 02:57:42'),
(18, 21, 24, '2021-08-29 09:38:41');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regi`
--
ALTER TABLE `regi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `regi`
--
ALTER TABLE `regi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
