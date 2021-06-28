-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:45 PM
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
(12, 'New arrivals', 'new-arrivals', '[\"trkTQxFeBv04EHVbmOow.png\"]', '[\"new arrival\",\" new\",\" trendy\",\" latest\",\" fashion\"]', '2021-06-28 23:58:44', 1, b'1', b'0'),
(13, 'Featured', 'featured', '[\"ZNXVIW6ke0EOvRpJS71y.gif\"]', '[\"featured\",\" new\",\" goods\",\" cute\"]', '2021-06-29 00:04:30', 1, b'1', b'0'),
(14, 'Accessories', 'accessories', '[\"oa3rdFxzRUw4vN2GtK8y.jpg\"]', '[\"accessories\",\" jewellery\",\" cute\",\" wearables\"]', '2021-06-29 00:05:36', 1, b'1', b'0'),
(15, 'Stickers', 'stickers', '[\"xWMYUN5dzJLfch1DR2qA.jpg\"]', '[\"stickers\",\" printable\",\" creative\",\" designs\"]', '2021-06-29 00:06:00', 1, b'1', b'0'),
(16, 'Jewellery', 'jewellery', '[\"9Y30Cevmyb1s2QEd6rol.jpg\"]', '[\"jewellery\",\" necklace\",\" rings\",\" pendant\",\" earrings\"]', '2021-06-29 00:07:07', 1, b'1', b'0'),
(17, 'Scrunchie', 'scrunchie', '[\"H20o1MOEIdhzUsgmLwf6.jpg\"]', '[\"scrunchie\",\" wearables\",\" ponytails\",\" accessories\"]', '2021-06-29 00:09:55', 1, b'1', b'0');

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
(12, 'None', 'background-color: rgb(255, 255, 255);', '2021-06-28 16:01:11', 1, b'1', b'0'),
(13, 'Grey', 'background-color: rgb(170, 170, 170);', '2021-06-28 22:12:50', 1, b'1', b'0'),
(14, 'Light Pink', 'background-color: rgb(244, 192, 225);', '2021-06-28 22:13:24', 1, b'1', b'0'),
(15, 'Pink', 'background-color: rgb(251, 125, 207);', '2021-06-28 22:13:33', 1, b'1', b'0'),
(16, 'Dark Brown', 'background-color: rgb(202, 110, 37);', '2021-06-29 00:20:16', 1, b'1', b'0'),
(17, 'Light Brown', 'background-color: rgb(232, 164, 109);', '2021-06-29 00:20:26', 1, b'1', b'0'),
(18, 'Purple', 'background-color: rgb(140, 109, 232);', '2021-06-29 00:20:46', 1, b'1', b'0');

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
(31, 16, 9, 16, 10, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(32, 16, 9, 17, 8, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(33, 16, 9, 9, 12, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(34, 17, 9, 14, 10, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(35, 17, 9, 18, 8, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(36, 17, 9, 8, 12, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(37, 18, 9, 13, 10, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(38, 18, 9, 7, 8, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(39, 18, 9, 10, 12, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(40, 19, 9, 1, 8, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(41, 19, 9, 2, 10, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(42, 19, 9, 14, 12, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(43, 20, 9, 7, 12, '2021-06-29 00:32:14', NULL, b'1', b'0');

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
(16, 'COTTON SCRUNCHIE', 120, 'silk-scrunchie', 'Scrunchie made of silk cloth with bare hands, with good stiching.', NULL, NULL, '[\"Featured\",\"Accessories\",\"Scrunchie\"]', '[\"scrunchie\",\" silk\",\" ponytail\",\" wearables\"]', '[\"woTPq1EiXkNHgGMjncU4.jpg\",\"nmkKC3jqsxP2H5eNYRI4.jpg\"]', '2021-06-29 00:24:10', 1, b'1', b'0'),
(17, 'SILK SCRUNCHIE', 120, 'silk-scrunchie-1', 'Scrunchie made of silk cloth with bare hands, with good stiching.', NULL, NULL, '[\"Featured\",\"Accessories\",\"Scrunchie\"]', '[\"scrunchie\",\" silk\",\" ponytail\",\" wearables\"]', '[\"Bsb1SQHwxTi5zuC0l3Yv.jpg\",\"QRV7xX6IfcJMiWwKetjb.jpg\"]', '2021-06-29 00:24:55', 1, b'1', b'0'),
(18, 'Silk Scrunchie', 120, 'silk-scrunchie-2', 'Scrunchie made of silk cloth with bare hands, with good stiching.', NULL, NULL, '[\"Accessories\",\"Scrunchie\"]', '[\"scrunchie\",\" silk\",\" ponytail\",\" wearables\"]', '[\"yiGM2I6QpThw40x8Wo3r.jpg\",\"Sw3VioXPQBLAqapMbrfN.jpg\"]', '2021-06-29 00:25:34', 1, b'1', b'0'),
(19, 'AETHETIC BUTTERFLY NECKLACE', 899, 'aethetic-butterfly-necklace', 'Cute butterfly necklaces with different color, note: the price is for single product', NULL, NULL, '[\"Featured\",\"Accessories\",\"Jewellery\"]', '[\"butterfly\",\" necklace\",\" cute\",\" pakistan\"]', '[\"EGD0h7XJyLk3gvjP4l6b.jpg\"]', '2021-06-29 00:29:40', 1, b'1', b'0'),
(20, 'CUTE FANCY SHELL EARRING', 499, 'cute-fancy-shell-earring', 'Cute fancy shell earring made with alloy', NULL, NULL, '[\"Featured\",\"Accessories\",\"Jewellery\"]', '[\"earrings\",\" jewellery\"]', '[\"9smrVHIcX8LntjU65JoY.jpg\"]', '2021-06-29 00:32:14', 1, b'1', b'0');

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
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
