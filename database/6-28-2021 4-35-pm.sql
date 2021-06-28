-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 01:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesoftshop.pk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `PK_ID` int(11) NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL,
  `CategorySlug` varchar(100) DEFAULT NULL,
  `CategoryImages` text DEFAULT NULL,
  `CategoryTags` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`PK_ID`, `CategoryName`, `CategorySlug`, `CategoryImages`, `CategoryTags`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(1, 'Accessories', 'accessories', '[\"1.jpg\",\"2.jpg\"]', '[\"accessories\", \"jewellery\", \"glasses\"]', '2021-06-18 15:32:42', 1, b'1', b'0'),
(7, 'Stickers', 'stickers', '[\"ZgiDyBnHTR5MeQbf72Yl.jpeg\",\"DeiCHKw93cxJgdfbW6RN.jpeg\",\"7Erkwamy43HUjWg852iA.jpeg\"]', '[\"stickers\",\" printable\",\" decor\",\" posters\"]', '2021-06-20 19:08:12', 1, b'1', b'0'),
(8, 'Jewellery', 'jewellery', '[\"VeX6m1v9P8ZNlEYCnOFy.jpeg\",\"dmpwY9JcnAzuD7NBh81i.jpeg\"]', '[\"jewellery\",\" watches\"]', '2021-06-20 19:37:24', 1, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `PK_ID` int(11) NOT NULL,
  `ColorName` varchar(100) DEFAULT NULL,
  `ColorCode` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`PK_ID`, `ColorName`, `ColorCode`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(1, 'White', 'background-color: rgb(255, 255, 255);', '2021-06-28 11:53:46', 1, b'1', b'0'),
(2, 'Black', 'background-color: rgb(0, 0, 0);', '2021-06-28 11:54:09', 1, b'1', b'0'),
(3, 'Red', 'background-color: rgb(210, 37, 37);', '2021-06-28 14:54:35', 1, b'1', b'0'),
(7, 'Golden', 'background-color: rgb(246, 179, 46);', '2021-06-28 15:56:37', 1, b'1', b'0'),
(8, 'Blue', 'background-color: rgb(59, 106, 255);', '2021-06-28 15:56:47', 1, b'1', b'0'),
(9, 'Light Blue', 'background-color: rgb(129, 212, 244);', '2021-06-28 15:56:58', 1, b'1', b'0'),
(10, 'Yellow', 'background-color: rgb(236, 247, 54);', '2021-06-28 15:57:21', 1, b'1', b'0'),
(11, 'Light Green', 'background-color: rgb(195, 247, 165);', '2021-06-28 15:57:35', 1, b'1', b'0'),
(12, 'None', 'background-color: rgb(255, 255, 255);', '2021-06-28 16:01:11', 1, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `PK_ID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `BillingAddress` varchar(500) DEFAULT NULL,
  `ShippingAddress` varchar(500) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `OrderHistory` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `PK_ID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `SizeID` int(11) DEFAULT NULL,
  `ColorID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`PK_ID`, `ProductID`, `SizeID`, `ColorID`, `Quantity`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(24, 13, 1, 1, 8, '2021-06-28 13:16:17', NULL, b'1', b'0'),
(25, 13, 2, 1, 10, '2021-06-28 13:16:17', NULL, b'1', b'0'),
(26, 13, 1, 2, 12, '2021-06-28 13:16:17', NULL, b'1', b'0'),
(27, 14, 2, 1, 10, '2021-06-28 15:54:54', NULL, b'1', b'0'),
(28, 15, 2, 1, 12, '2021-06-28 15:59:53', NULL, b'1', b'0'),
(29, 15, 2, 2, 10, '2021-06-28 15:59:53', NULL, b'1', b'0'),
(30, 15, 2, 9, 8, '2021-06-28 15:59:53', NULL, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `PK_ID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CustomerName` varchar(100) DEFAULT NULL,
  `CustomerEmail` varchar(200) DEFAULT NULL,
  `CustomerContact` varchar(100) DEFAULT NULL,
  `CustomerBillingAddress` varchar(500) DEFAULT NULL,
  `CustomerShippingAddress` varchar(500) DEFAULT NULL,
  `CustomerCity` varchar(100) DEFAULT NULL,
  `ProductsWithQuantity` text DEFAULT NULL,
  `OrderStatus` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `PK_ID` int(11) NOT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `Price` int(11) DEFAULT 0,
  `ProductSlug` varchar(200) DEFAULT NULL,
  `ProductDescription` text DEFAULT NULL,
  `Reviews` text DEFAULT NULL,
  `ProductCode` varchar(100) DEFAULT NULL,
  `Categories` text DEFAULT NULL,
  `ProductTags` text DEFAULT NULL,
  `ProductImages` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`PK_ID`, `ProductName`, `Price`, `ProductSlug`, `ProductDescription`, `Reviews`, `ProductCode`, `Categories`, `ProductTags`, `ProductImages`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(13, 'Silk Scrunchie', 120, 'silk-scrunchie', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, '[\"Accessories\",\"Jewellery\"]', '[\"scrunchie\",\" accessories\",\" cute\"]', '[\"vNusCTKReI3WtYBDgx0h.jfif\",\"5DTipjheSIOQ97JsvwgM.jfif\"]', '2021-06-28 13:16:17', 1, b'1', b'0'),
(14, 'GOLD LEAF - Facny Earrings', 250, 'gold-leaf-facny-earrings', 'These dangling statement earrings are the perfect picks to bring an entire look together!', NULL, NULL, '[\"Accessories\",\"Jewellery\"]', '[\"earrings\",\" jewellery\",\" girls\",\" accessories\"]', '[\"t2eNlEFvIcWdrTQ03fsM.jpg\"]', '2021-06-28 15:54:54', 1, b'1', b'0'),
(15, 'BUTTERFLY - NECKLACE', 499, 'butterfly-necklace', 'Make a striking fashion statement flaunting this bold & glamorous necklace. Perfect for an everyday look & a definite must-have in your jewelry box!', NULL, NULL, '[\"Accessories\",\"Jewellery\"]', '[\"necklace\",\" chain\",\" pendant\",\" lockets\",\" jewellery\"]', '[\"p1zkbvoTsjGmqdu3ESWf.jpg\"]', '2021-06-28 15:59:52', 1, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchased`
--

CREATE TABLE `tbl_purchased` (
  `PK_ID` int(11) NOT NULL,
  `FK_Product` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 0,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `PK_ID` int(11) NOT NULL,
  `SizeValue` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`PK_ID`, `SizeValue`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(1, 'Small', '2021-06-28 11:54:53', 1, b'1', b'0'),
(2, 'Medium', '2021-06-28 11:54:53', 1, b'1', b'0'),
(3, 'Large', '2021-06-28 11:55:11', 1, b'1', b'0'),
(4, 'Extra Large', '2021-06-28 11:55:11', 1, b'1', b'0'),
(9, 'None', '2021-06-28 16:01:16', 1, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `PK_ID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `FK_UserType` int(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `DisplayPicture` varchar(100) DEFAULT NULL,
  `LoginToken` varchar(200) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`PK_ID`, `FullName`, `FK_UserType`, `Email`, `Password`, `Contact`, `DisplayPicture`, `LoginToken`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(1, 'Admin', 1, 'sh@mail.com', '$2y$10$Af2hpJvf11gPQ0mVCJxSB.D2Mk08t5gjv1VDKuT7I67WNHdu.T4RS', '00000000000', NULL, NULL, '2021-06-18 14:59:28', NULL, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `PK_ID` int(11) NOT NULL,
  `UserTypeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`PK_ID`, `UserTypeName`) VALUES
(1, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`PK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
