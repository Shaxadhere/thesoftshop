-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 08:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `FK_Product` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 0,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0',
  `ProductColor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`PK_ID`, `FK_Product`, `Quantity`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`, `ProductColor`) VALUES
(1, 4, 11, '2021-06-20 20:26:02', NULL, b'1', b'0', NULL);

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
  `Sizes` text DEFAULT NULL,
  `Colors` text DEFAULT NULL,
  `ProductID` varchar(100) DEFAULT NULL,
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

INSERT INTO `tbl_product` (`PK_ID`, `ProductName`, `Price`, `ProductSlug`, `ProductDescription`, `Reviews`, `Sizes`, `Colors`, `ProductID`, `Categories`, `ProductTags`, `ProductImages`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(4, 'Pendant Necklace', 900, 'pendant-necklace', 'lol', NULL, '[\"Medium\"]', NULL, NULL, '[\"Jewellery\"]', '[\"necklace\",\" jewellery\",\" cute\",\" pendant\",\" locket\"]', '[\"YwUzOpA4aItn2hd9Z6Ws.jpeg\",\"jtfScMdkznGLlxY1p4by.jpeg\",\"r5wVRIQv7gC4ainjdYxe.jpeg\"]', '2021-06-20 20:26:02', 1, b'1', b'0');

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
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

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
