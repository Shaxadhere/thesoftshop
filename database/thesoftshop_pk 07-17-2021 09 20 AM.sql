-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 06:20 AM
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
(17, 'Scrunchie', 'scrunchie', '[\"H20o1MOEIdhzUsgmLwf6.jpg\"]', '[\"scrunchie\",\" wearables\",\" ponytails\",\" accessories\"]', '2021-06-29 00:09:55', 1, b'1', b'0'),
(18, 'Stationary', 'stationary', '[\"Zp6yStKqkuvWHI7AmiMo.jfif\"]', '[\"stationary\",\" school\",\" geomatery\",\" pencils\",\" diaries\",\" notebook\"]', '2021-06-30 15:19:58', 1, b'1', b'0'),
(19, 'Hair Accessories', 'hair-accessories', '[\"OVf9qj1vyFo6Xcs7zM3x.jpeg\"]', '[\"hair accessories\",\" clips\",\" hairbands\",\" hairclips\",\" scrunchies\"]', '2021-07-16 18:00:32', 1, b'1', b'0');

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
(18, 'Purple', 'background-color: rgb(140, 109, 232);', '2021-06-29 00:20:46', 1, b'1', b'0'),
(19, 'Tie Dye Blue', 'background-color: rgb(70, 170, 217);', '2021-07-16 17:59:36', 1, b'1', b'0');

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
  `WishList` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT b'1',
  `Deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`PK_ID`, `FullName`, `Contact`, `Email`, `Password`, `BillingAddress`, `ShippingAddress`, `City`, `OrderHistory`, `WishList`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES
(1, 'shehzad', '03032804856', 'sh@mail.com', '$2y$10$pE4NPqTvd/kLT9X7djUPPuWAsBwqdbbYCEGjKy48IZxLInF.jAT9W', '143, 03, Creek Road, Karachi.', '143, 03, Creek Road, Karachi.', NULL, NULL, NULL, '2021-07-02 18:46:44', NULL, b'1', b'0');

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
(31, 16, 1, 16, 10, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(32, 16, 2, 17, 8, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(33, 16, 3, 9, 12, '2021-06-29 00:24:10', NULL, b'1', b'0'),
(34, 17, 9, 14, 10, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(35, 17, 9, 18, 8, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(36, 17, 9, 8, 12, '2021-06-29 00:24:55', NULL, b'1', b'0'),
(37, 18, 9, 13, 10, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(38, 18, 9, 7, 8, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(39, 18, 9, 10, 12, '2021-06-29 00:25:34', NULL, b'1', b'0'),
(40, 19, 9, 1, 8, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(41, 19, 9, 2, 10, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(42, 19, 9, 14, 12, '2021-06-29 00:29:40', NULL, b'1', b'0'),
(43, 20, 9, 7, 12, '2021-06-29 00:32:14', NULL, b'1', b'0'),
(44, 21, 9, 1, 12, '2021-06-30 15:22:25', NULL, b'1', b'0'),
(45, 22, 9, 1, 12, '2021-06-30 15:25:15', NULL, b'1', b'0'),
(46, 23, 9, 1, 10, '2021-06-30 15:27:49', NULL, b'1', b'0'),
(47, 23, 9, 2, 10, '2021-06-30 15:27:49', NULL, b'1', b'0'),
(48, 24, 9, 1, 12, '2021-06-30 15:34:15', NULL, b'1', b'0'),
(49, 24, 9, 7, 12, '2021-06-30 15:34:15', NULL, b'1', b'0'),
(50, 25, 9, 8, 10, '2021-07-02 18:16:10', NULL, b'1', b'0'),
(51, 25, 9, 3, 9, '2021-07-02 18:16:10', NULL, b'1', b'0'),
(52, 25, 9, 11, 12, '2021-07-02 18:16:10', NULL, b'1', b'0'),
(53, 25, 9, 1, 3, '2021-07-02 18:16:10', NULL, b'1', b'0'),
(54, 26, 9, 1, 5, '2021-07-02 18:33:42', NULL, b'1', b'0'),
(55, 26, 9, 16, 8, '2021-07-02 18:33:42', NULL, b'1', b'0'),
(56, 26, 9, 14, 10, '2021-07-02 18:33:42', NULL, b'1', b'0'),
(57, 26, 9, 8, 4, '2021-07-02 18:33:42', NULL, b'1', b'0'),
(58, 27, 10, 12, 100, '2021-07-02 18:40:30', NULL, b'1', b'0'),
(59, 27, 11, 12, 50, '2021-07-02 18:40:30', NULL, b'1', b'0'),
(60, 27, 12, 12, 40, '2021-07-02 18:40:30', NULL, b'1', b'0'),
(61, 27, 13, 12, 20, '2021-07-02 18:40:30', NULL, b'1', b'0'),
(62, 28, 9, 19, 3, '2021-07-16 18:04:34', NULL, b'1', b'0'),
(63, 28, 9, 1, 3, '2021-07-16 18:04:34', NULL, b'1', b'0'),
(64, 28, 9, 18, 3, '2021-07-16 18:04:34', NULL, b'1', b'0'),
(65, 29, 9, 8, 3, '2021-07-16 18:10:40', NULL, b'1', b'0'),
(66, 29, 9, 15, 3, '2021-07-16 18:10:40', NULL, b'1', b'0'),
(67, 29, 9, 14, 3, '2021-07-16 18:10:40', NULL, b'1', b'0'),
(68, 30, 9, 10, 3, '2021-07-16 18:16:21', NULL, b'1', b'0'),
(69, 30, 9, 18, 3, '2021-07-16 18:16:21', NULL, b'1', b'0'),
(70, 30, 9, 8, 3, '2021-07-16 18:16:21', NULL, b'1', b'0');

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
(20, 'CUTE FANCY SHELL EARRING', 499, 'cute-fancy-shell-earring', 'Cute fancy shell earring made with alloy', NULL, NULL, '[\"Featured\",\"Accessories\",\"Jewellery\"]', '[\"earrings\",\" jewellery\"]', '[\"9smrVHIcX8LntjU65JoY.jpg\"]', '2021-06-29 00:32:14', 1, b'1', b'0'),
(21, 'Flora Weekly Planner Notebook', 499, 'flora-weekly-planner-notebook', 'From Wilde House Paper. The chicest way to organize one\'s week. An absolutely gorgeous planner to help your loved one plan, manage and keep track of her life.  Includes daily reminders for self care, movement and hydration, as well as space to record one\'s meals. Lightweight enough to carry daily in one\'s handbag.\r\n\r\nGold spiral binding for flat-lay writing. 5’’ x 8’’. Original abstract artwork. 100 pages. ', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Stationary\"]', '[\"notebook\",\" diary\",\" planner\",\" cute diary\"]', '[\"xeLouwGK7QVcsF1hNAPy.jfif\",\"qrban85h1Y7dIPTB4N2S.jfif\",\"e8VhH3R1tjdGci0WTvan.jfif\"]', '2021-06-30 15:22:25', 1, b'1', b'0'),
(22, 'ROOLEE Abstract Lines Notebook', 299, 'roolee-abstract-lines-notebook', 'Our Abstract Lines Notebook is a soft-bound notebook with lined pages. The front and back of this journal feature an abstract illustration and the inside cover gives a spot to put your name and info.', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Stationary\"]', '[\"notebook\",\" stationary\",\" cute copies\",\" diary\"]', '[\"k0EIFLPhHenVXOA2g5QZ.jpeg\",\"lvXqZAwN97IK8C0ETLRM.jpeg\",\"Akyngwt7V90NDbJEciO3.jpeg\"]', '2021-06-30 15:25:15', 1, b'1', b'0'),
(23, 'Constellation Print Spiral Notebook', 399, 'constellation-print-spiral-notebook', 'A Fine Art High Definition Vintage 1900 Star Constellation Galaxy Poster Print', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Stationary\"]', '[\"diary\",\" notebook\"]', '[\"MklgPTxq6wUKsbfa8yzu.png\"]', '2021-06-30 15:27:49', 1, b'1', b'0'),
(24, 'PETITE MOON NECKLACE', 999, 'petite-moon-necklace', 'Petite hammered moon charm hangs on a 14\" or 16\" chain.', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Jewellery\"]', '[\"necklace\",\" moon\",\" sun\",\" stars\",\" jewellery\",\" wearable\"]', '[\"1111111111111111.png\"]', '2021-06-30 15:34:15', 1, b'1', b'0'),
(25, 'Personalised Motorhome Adventure Notebook', 599, 'personalised-motorhome-adventure-notebook', 'Keep your magical family adventures together in one place, with this fun motorhome adventure notebook!\r\n\r\nPersonalised text printed onto the notebook in an exceptional quality.\r\n\r\nChoose from multiple colours of notebook, and either black or white text.', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Stationary\"]', '[\"\"]', '[\"pKlkf1I7cSy4qJw0EDU3.jpg\",\"XvrY74d2cluSOM8gbnZ9.jpg\"]', '2021-07-02 18:16:10', 1, b'1', b'0'),
(26, 'Sweet All-match Wash Face Hairclip', 199, 'sweet-all-match-wash-face-hairclip', 'Material:Acrylic\r\nPackaging:1 pc\r\nSize:9 cm*5.5 cm\r\nWeight: 25 g\r\n\r\n💖 Premium Material: Made of high quality pastel plastic acrylic material and safe metal spring. The greatest features of these jumbo hair claws are strong flexibility, durable, easy to use and hard to break. The large claws are non-slip so that it can secure grip and hold your nice hair tightly, won’t fall off easily and don\'t damage your hair.', NULL, NULL, '[\"Jewellery\"]', '[\"Solid Color Wave Hairclaw \",\"Sweet All-match Wash Face Hairclip\",\" Hair Claw Clips\",\" For Women and Girls Thin Hair\",\" Strong Hold For Thick Hair\"]', '[\"bFQUL6DvjfAekBsWIn2T.jpg\",\"bWhjuQYSOdz1XJvowM8N.jpg\"]', '2021-07-02 18:33:42', 1, b'1', b'0'),
(27, 'Jar of Kittens Sticker', 50, 'jar-of-kittens-sticker', '2 Inch => Rs. 20\r\n3 Inch => Rs. 30\r\n4 Inch => Rs. 40\r\n5 Inch => Rs. 50\r\nThe high quality Ace the Pitmatian Be Kind Sign Language Sticker by Ace the Pitmatian Designs, Kindness Diversity LGBTQ Sticker will look great where ever to decide to put it. Great to add to your bike, car, truck, hydroflask, cell phone, laptop decal, water bottle or where ever you might want to show off your Ace the Pitmatian Sticker. These are waterproof, weatherproof and include UV protection', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Stickers\"]', '[\"Be Kind Sign Language\",\" Vinyl Waterproof Sticker\",\" Kindness Diversity Kiss-Cut Stickers\",\" Pride\",\" Rainbow\",\" LGBTQ\",\" Sticker \"]', '[\"Se0oYU93kHic2MBnDtZr.jpg\"]', '2021-07-02 18:40:30', 1, b'1', b'0'),
(28, 'Cotton Scrunchie', 60, 'cotton-scrunchie', 'Scrunchies made with high-quality cotton fabric.', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Accessories\",\"Scrunchie\",\"Hair Accessories\"]', '[\"scrunchies\",\" hair accessories\",\" blue scrunchie\",\" cotton scrunchie\",\" cute hair accessories\",\" pony.\"]', '[\"tJn32B0N1ckhW7LPHzYp.jpeg\",\"mAg3QTzys7jhO01wEJiK.jpeg\",\"GqUHzaXeQn7fTWC1NSIM.jpeg\",\"4ZITnONjudraq851clhx.jpeg\",\"SrkDsmCzvFo1iGBJxeWp.jpeg\",\"Ou7D32QLFeYr8RKSmzGo.jpeg\"]', '2021-07-16 18:04:34', 1, b'1', b'0'),
(29, 'Silk Scrunchie', 100, 'silk-scrunchie-3', 'Scrunchies made with high quality silk fabric', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Accessories\",\"Scrunchie\",\"Hair Accessories\"]', '[\"silk scrunchie\",\" pure silk\",\" hair accessories\",\" trendy fashion\",\" pony\",\" girls accessories in pakistan\"]', '[\"SwTCxFAa4qh93Jg6DXmI.jpeg\",\"9KCBsVmlOH0qPzLgdoR2.jpeg\",\"Loyx0rWFcbhQC5ZndUg8.jpeg\",\"BJxpsoTzPdG1CNUVgb9W.jpeg\",\"uDH1sLbSK5Yrz8pkZ4G9.jpeg\",\"B1wF0z3KaYDJqEIl4LW6.jpeg\"]', '2021-07-16 18:10:40', 1, b'1', b'0'),
(30, 'Tulle Scrunchie', 150, 'tulle-scrunchie', 'Tulle scrunchies made with net and artificial flowers on the inside.', NULL, NULL, '[\"New arrivals\",\"Featured\",\"Accessories\",\"Scrunchie\",\"Hair Accessories\"]', '[\"tulle scrunchies in pakistan\",\" trendy fashion\",\" cute scrunchies\",\" handmade scrunchies\",\" hair accessories in pakistan\"]', '[\"Z908415bWtHpwDnvKTxi.jpeg\",\"keIxGLKVmCAD2jUyzv84.jpeg\",\"0mtE6leK31TVaFPu9nph.jpeg\",\"iyhnaMLs5q9ZSJulD6k4.jpeg\",\"wNFDun7jHr48OPCm5BTi.jpeg\",\"nagXHRbZG7joNUDvAmrL.jpeg\",\"hV6tFk0Eldm5zNTo4jPu.jpeg\",\"VPkaH6R7gjIuDoFniplC.jpeg\",\"q7aQmYt9nFOih8LwVyRg.jpeg\",\"sD5GNoxVtbkpfS0PreEX.jpeg\"]', '2021-07-16 18:16:21', 1, b'1', b'0');

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
(9, 'None', '2021-06-28 16:01:16', 1, b'1', b'0'),
(10, '2 Inch', '2021-07-02 18:36:20', 1, b'1', b'0'),
(11, '3 Inch', '2021-07-02 18:36:25', 1, b'1', b'0'),
(12, '4 Inch', '2021-07-02 18:36:31', 1, b'1', b'0'),
(13, '5 Inch', '2021-07-02 18:36:36', 1, b'1', b'0');

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
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
