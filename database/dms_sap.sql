-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 03:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms_sap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `cus_id` varchar(10) NOT NULL,
  `route_id` varchar(10) NOT NULL,
  `cus_name` text NOT NULL,
  `cus_add` text NOT NULL,
  `cus_tel` varchar(10) DEFAULT NULL,
  `cus_type` int(5) DEFAULT NULL,
  `sales_balance` decimal(10,2) NOT NULL,
  `cus_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `route_id`, `cus_name`, `cus_add`, `cus_tel`, `cus_type`, `sales_balance`, `cus_status`) VALUES
('CUS001', 'RT001', 'Saman Traders', 'Bihalpola', '0372265413', 0, '6685.20', 1),
('CUS002', 'RT001', 'AK Stores', 'Bihalpola', '0372274583', 0, '14800.00', 1),
('CUS003', 'RT001', 'Kumara Traders', 'Bihalpola', '0372264854', 0, '2485.00', 1),
('CUS004', 'RT001', 'AHK Grossery', 'Bihalpola', '0372223432', 0, '254.00', 1),
('CUS005', 'RT004', 'Chathurange Stores', 'Hewenegedara', '0372265472', 0, '2522.00', 1),
('CUS006', 'RT006', 'Jayasiri Stores', 'Galgammulla', '0716513898', 0, '3686.00', 1),
('CUS007', 'RT012', 'Suhada Stores', 'Narangoda', '0372256871', 0, '0.00', 1),
('CUS008', 'RT011', 'Nilmini Grocery Shop', 'Morawalapitiya', '0372243159', 0, '0.00', 1),
('CUS009', 'RT010', 'MGK Stores', 'Kanugala', '0372232674', 0, '0.00', 1),
('CUS010', 'RT009', 'Piyumal Stores', 'Matiyagane', '0372246987', 0, '0.00', 1),
('CUS011', 'RT008', 'Lanka Groceries', 'Athuruwela', '0776545897', 0, '0.00', 1),
('CUS012', 'RT007', 'Dethawa Stores', 'Edandawela', '0372289654', 0, '0.00', 1),
('CUS013', 'RT006', 'Subasinghe Traders', 'Maaharagama', '0372256824', 0, '2642.00', 1),
('CUS014', 'RT005', 'Bishmi Super', 'Dampelessa', '0372281349', 0, '2574.00', 1),
('CUS015', 'RT004', 'Ashoka Stores', 'Horombawa', '0372254197', 0, '0.00', 1),
('CUS016', 'RT003', 'Rathna Stores', 'Muthugala', '0372214698', 0, '0.00', 1),
('CUS017', 'RT002', 'Deepthi Stores', 'Dambadeniya', '0772167498', 0, '0.00', 1),
('CUS018', 'RT001', 'LS Traders', 'Galgammulla', '0372265987', 0, '0.00', 1),
('CUS019', 'RT012', 'Malinda Traders', 'Rathmalewaththa', '0776129843', 0, '0.00', 1),
('CUS020', 'RT011', 'Sena Stores', 'Ranmuthugala', '0713546987', 0, '0.00', 1),
('CUS021', 'RT010', 'Perera Stores', 'Bihalpola', '0372289106', 0, '0.00', 1),
('CUS022', 'RT009', 'Reema Vegitable Shop', 'Dangolla', '0714158138', 0, '0.00', 1),
('CUS023', 'RT007', 'Ranjith Stores', 'Katugampola', '0372267498', 0, '0.00', 1),
('CUS024', 'RT005', 'Herath Stores', 'Haalwella', '0772134149', 0, '2014.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grn`
--

CREATE TABLE `tbl_grn` (
  `grn_id` varchar(10) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `pur_id` varchar(10) NOT NULL,
  `grn_date` date NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grn`
--

INSERT INTO `tbl_grn` (`grn_id`, `sup_id`, `pur_id`, `grn_date`, `remarks`) VALUES
('GRN0001', 'SUP001', 'PO0001', '2020-07-25', ''),
('GRN0002', 'SUP001', 'PO0002', '2020-07-25', ''),
('GRN0003', 'SUP002', 'PO0003', '2020-07-25', ''),
('GRN0004', 'SUP002', 'PO0004', '2020-07-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grn_details`
--

CREATE TABLE `tbl_grn_details` (
  `grn_index` int(11) NOT NULL,
  `grn_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `grn_batch` varchar(20) NOT NULL,
  `qty` int(5) NOT NULL,
  `item_cost` decimal(8,0) NOT NULL,
  `item_mrp` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grn_details`
--

INSERT INTO `tbl_grn_details` (`grn_index`, `grn_id`, `pro_id`, `grn_batch`, `qty`, `item_cost`, `item_mrp`) VALUES
(168, 'GRN0001', 'P0001', 'P0001BT004', 100, '65', '70'),
(169, 'GRN0001', 'P0007', 'P0007BT006', 100, '85', '90'),
(170, 'GRN0001', 'P0008', 'P0008BT002', 100, '230', '240'),
(171, 'GRN0001', 'P0009', 'P0009BT002', 100, '8', '10'),
(172, 'GRN0001', 'P0010', 'P0010BT002', 100, '10', '15'),
(173, 'GRN0001', 'P0011', 'P0011BT002', 100, '20', '25'),
(174, 'GRN0002', 'P0012', 'P0012BT002', 100, '60', '65'),
(175, 'GRN0002', 'P0013', 'P0013BT002', 100, '110', '120'),
(176, 'GRN0002', 'P0014', 'P0014BT002', 100, '155', '160'),
(177, 'GRN0002', 'P0015', 'P0015BT002', 100, '70', '75'),
(178, 'GRN0002', 'P0016', 'P0016BT002', 100, '100', '110'),
(179, 'GRN0002', 'P0017', 'P0017BT001', 220, '120', '130'),
(180, 'GRN0003', 'P0027', 'P0027GT001', 120, '127', '140'),
(181, 'GRN0003', 'P0028', 'P0028BT002', 80, '127', '140'),
(182, 'GRN0003', 'P0029', 'P0029GT001', 60, '127', '140'),
(183, 'GRN0003', 'P0030', 'P0030BT002', 60, '127', '140'),
(184, 'GRN0003', 'P0031', 'P0031GT001', 60, '127', '140'),
(185, 'GRN0003', 'P0032', 'P0032GT001', 50, '172', '190'),
(186, 'GRN0003', 'P0033', 'P0033GT001', 80, '172', '190'),
(187, 'GRN0004', 'P0034', 'P0034GT001', 50, '172', '190'),
(188, 'GRN0004', 'P0035', 'P0035GT001', 80, '172', '190'),
(189, 'GRN0004', 'P0036', 'P0036GT001', 50, '172', '190'),
(190, 'GRN0004', 'P0037', 'P0037GT001', 50, '227', '250'),
(191, 'GRN0004', 'P0038', 'P0038GT001', 70, '227', '250'),
(192, 'GRN0004', 'P0039', 'P0039GT001', 30, '227', '250'),
(193, 'GRN0004', 'P0040', 'P0040GT001', 50, '227', '250'),
(194, 'GRN0004', 'P0041', 'P0041GT001', 50, '227', '250');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_product`
--

CREATE TABLE `tbl_group_product` (
  `grp_prd_index` int(11) NOT NULL,
  `prd_group` varchar(10) NOT NULL,
  `prd_id` varchar(10) NOT NULL,
  `prd_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group_product`
--

INSERT INTO `tbl_group_product` (`grp_prd_index`, `prd_group`, `prd_id`, `prd_qty`) VALUES
(1, 'CBL-001', 'P0001', 80),
(2, 'CBL-001', 'P0007', 50),
(3, 'CBL-001', 'P0008', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `inv_id` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `item_name` varchar(10) NOT NULL,
  `item_qty` varchar(10) NOT NULL,
  `inv_tol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue_stock`
--

CREATE TABLE `tbl_issue_stock` (
  `issue_stock_index` int(10) NOT NULL,
  `issue_stock_id` varchar(10) NOT NULL,
  `issue_routesche` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_issue_stock`
--

INSERT INTO `tbl_issue_stock` (`issue_stock_index`, `issue_stock_id`, `issue_routesche`) VALUES
(68, 'IS0001', 'RSH0072'),
(69, 'IS0002', 'RSH0073'),
(70, 'IS0003', 'RSH0074');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` varchar(10) NOT NULL,
  `prod_id` varchar(10) NOT NULL,
  `item_batchid` varchar(10) NOT NULL,
  `item_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_details`
--

CREATE TABLE `tbl_item_details` (
  `item_id` varchar(10) NOT NULL,
  `item_salesprice` int(5) NOT NULL,
  `item_cost` int(5) NOT NULL,
  `item_exp` date NOT NULL,
  `item_mfd` date NOT NULL,
  `item_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_types`
--

CREATE TABLE `tbl_pay_types` (
  `paytype_id` varchar(10) NOT NULL,
  `paytype_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `pur_id` varchar(10) NOT NULL,
  `pur_date` date NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `pur_remarks` varchar(100) NOT NULL,
  `pur_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po`
--

INSERT INTO `tbl_po` (`pur_id`, `pur_date`, `sup_id`, `pur_remarks`, `pur_status`) VALUES
('PO0001', '2020-07-25', 'SUP001', '', '4'),
('PO0002', '2020-07-25', 'SUP001', '', '4'),
('PO0003', '2020-07-25', 'SUP002', '', '4'),
('PO0004', '2020-07-25', 'SUP002', '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_details`
--

CREATE TABLE `tbl_po_details` (
  `pur_detailsid` int(10) NOT NULL,
  `purod_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `pur_qty` int(10) NOT NULL,
  `pur_prostatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_details`
--

INSERT INTO `tbl_po_details` (`pur_detailsid`, `purod_id`, `pro_id`, `pur_qty`, `pur_prostatus`) VALUES
(196, 'PO0001', 'P0001', 100, 0),
(197, 'PO0001', 'P0007', 100, 0),
(198, 'PO0001', 'P0008', 100, 0),
(199, 'PO0001', 'P0009', 100, 0),
(200, 'PO0001', 'P0010', 100, 0),
(201, 'PO0001', 'P0011', 100, 0),
(204, 'PO0002', 'P0012', 100, 0),
(205, 'PO0002', 'P0013', 100, 0),
(206, 'PO0002', 'P0014', 100, 0),
(207, 'PO0002', 'P0015', 100, 0),
(208, 'PO0002', 'P0016', 100, 0),
(209, 'PO0002', 'P0017', 100, 0),
(210, 'PO0003', 'P0027', 120, 0),
(211, 'PO0003', 'P0028', 80, 0),
(212, 'PO0003', 'P0029', 60, 0),
(213, 'PO0003', 'P0030', 60, 0),
(214, 'PO0003', 'P0031', 60, 0),
(215, 'PO0003', 'P0032', 50, 0),
(216, 'PO0003', 'P0033', 80, 0),
(217, 'PO0004', 'P0034', 50, 0),
(218, 'PO0004', 'P0035', 80, 0),
(219, 'PO0004', 'P0036', 50, 0),
(220, 'PO0004', 'P0037', 50, 0),
(221, 'PO0004', 'P0038', 70, 0),
(222, 'PO0004', 'P0039', 30, 0),
(223, 'PO0004', 'P0040', 50, 0),
(224, 'PO0004', 'P0041', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_return`
--

CREATE TABLE `tbl_po_return` (
  `poreturn_id` varchar(10) NOT NULL,
  `pur_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `poreturn_qty` int(5) NOT NULL,
  `poreturn_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pro_id` varchar(10) NOT NULL,
  `pro_cat_id` int(4) NOT NULL,
  `pro_subcat_id` int(4) NOT NULL,
  `pro_name` varchar(40) NOT NULL,
  `pro_sup_id` varchar(40) NOT NULL,
  `pro_reorder` int(10) NOT NULL,
  `pro_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `pro_cat_id`, `pro_subcat_id`, `pro_name`, `pro_sup_id`, `pro_reorder`, `pro_status`) VALUES
('P0001', 4, 3, 'Chocolate Biscuits 80g', 'SUP001', 100, 1),
('P0007', 4, 4, 'Lemon Puff 100g', 'SUP001', 100, 0),
('P0008', 4, 3, 'Chocolate Biscuits 400g', 'SUP001', 100, 0),
('P0009', 7, 6, 'Chocolate Fingers 16g', 'SUP001', 100, 0),
('P0010', 7, 6, 'Chocolate Fingers 28g', 'SUP001', 100, 0),
('P0011', 7, 6, 'Chocolate Fingers 40g', 'SUP001', 100, 0),
('P0012', 8, 11, 'Revello Chrispies 50g', 'SUP001', 100, 0),
('P0013', 8, 11, 'Revello Chrispies 100g', 'SUP001', 100, 0),
('P0014', 8, 12, 'Revello Cashew 100g', 'SUP001', 100, 0),
('P0015', 8, 12, 'Revello Cashew 50g', 'SUP001', 100, 0),
('P0016', 8, 13, 'Revello Hazel Nut 100g', 'SUP001', 100, 0),
('P0017', 8, 14, 'Revello Almond 100g', 'SUP001', 100, 0),
('P0018', 9, 15, 'Nik Nak 6g', 'SUP001', 100, 0),
('P0019', 9, 16, 'Chit Chat Vanilla 6g', 'SUP001', 100, 0),
('P0027', 10, 21, 'Mango Jam 150g', 'SUP002', 100, 0),
('P0028', 10, 22, 'Mixed Fruit Jam 150g', 'SUP002', 100, 0),
('P0029', 10, 23, 'Pineapple Jam 150g', 'SUP002', 100, 0),
('P0030', 10, 24, 'Strawberry Jam 150g', 'SUP002', 100, 0),
('P0031', 10, 25, 'Woodapple Jam 150g', 'SUP002', 100, 0),
('P0032', 10, 21, 'Mango Jam 225g', 'SUP002', 100, 0),
('P0033', 10, 22, 'Mixed Fruit Jam 225g', 'SUP002', 100, 0),
('P0034', 10, 23, 'Pineapple Jam 225g', 'SUP002', 100, 0),
('P0035', 10, 24, 'Strawberry Jam 225g', 'SUP002', 100, 0),
('P0036', 10, 25, 'Woodapple Jam 225g', 'SUP002', 100, 0),
('P0037', 10, 21, 'Mango Jam 300g', 'SUP002', 100, 0),
('P0038', 10, 22, 'Mixed Fruit Jam 300g', 'SUP002', 100, 0),
('P0039', 10, 23, 'Pineapple Jam 300g', 'SUP002', 100, 0),
('P0040', 10, 24, 'Strawberry Jam 300g', 'SUP002', 100, 0),
('P0041', 10, 25, 'Woodapple Jam 300g', 'SUP002', 100, 0),
('P0042', 8, 11, 'Rovello Chrispies 250g', 'SUP001', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_cat`
--

CREATE TABLE `tbl_product_cat` (
  `product_cat_id` int(4) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `product_cat_name` varchar(40) NOT NULL,
  `product_cat_des` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_cat`
--

INSERT INTO `tbl_product_cat` (`product_cat_id`, `sup_id`, `product_cat_name`, `product_cat_des`) VALUES
(4, 'SUP001', 'Biscuits', ''),
(6, 'SUP001', '4GB', ''),
(7, 'SUP001', 'Coated Biscuits', ''),
(8, 'SUP001', 'Revello', 'Chocolate'),
(9, 'SUP001', 'wafers', 'Biscuit'),
(10, 'SUP002', 'Jam', 'Fruit made jam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_subcat`
--

CREATE TABLE `tbl_product_subcat` (
  `product_subcat_id` int(4) NOT NULL,
  `product_cat_id` int(4) NOT NULL,
  `product_subcat_name` varchar(40) NOT NULL,
  `product_subcat_des` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_subcat`
--

INSERT INTO `tbl_product_subcat` (`product_subcat_id`, `product_cat_id`, `product_subcat_name`, `product_subcat_des`) VALUES
(1, 1, 'Ninja Mosquito Coils', ''),
(2, 1, 'Ninja Liquid Vaporizer', ''),
(3, 4, 'Chocolate Biscuit', ''),
(4, 4, 'Lemon Puff', ''),
(5, 6, 'Nutra', ''),
(6, 7, 'Chocolate Fingers', ''),
(7, 7, 'Chunky Choc', ''),
(8, 7, 'Choco-Mo', ''),
(9, 6, 'Chocxy', ''),
(11, 8, 'Revello Chrispies', ''),
(12, 8, 'Revello Cashew', ''),
(13, 8, 'Revello Hazel Nut', ''),
(14, 8, 'Revello Almond', ''),
(15, 9, 'Nik Nak', ''),
(16, 9, 'Chit Chat Vanilla', ''),
(17, 1, 'Ninja Refill', 'Refill'),
(18, 2, 'Toothbrush', 'Toothbrush'),
(19, 3, 'Bio Clean Green', 'for domestic trouble of blocking, overflowing of toilet septic tanks'),
(20, 3, 'Bio Clean Aqua', 'frequent callings for gully bowser'),
(21, 10, 'Mango Jam', ''),
(22, 10, 'Mixed Fruit Jam', ''),
(23, 10, 'Pineapple Jam', ''),
(24, 10, 'Strawberry Jam', ''),
(25, 10, 'Woodapple Jam', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`pro_id`, `pro_name`) VALUES
(1, 'Central province'),
(2, 'Eastern province'),
(3, 'Northern province'),
(4, 'Southern province'),
(5, 'Western province'),
(6, 'North western province'),
(7, 'North central province'),
(8, 'Uva province'),
(9, 'Sabaragamuwa province');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `return_id` varchar(10) NOT NULL,
  `sales_id` varchar(10) NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `item_id` int(5) NOT NULL,
  `return_qty` int(10) NOT NULL,
  `return_tol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_details`
--

CREATE TABLE `tbl_return_details` (
  `return_index` int(11) NOT NULL,
  `return_id` varchar(10) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `return_qty` int(5) NOT NULL,
  `return_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_return_details`
--

INSERT INTO `tbl_return_details` (`return_index`, `return_id`, `batch_id`, `item_price`, `return_qty`, `return_total`) VALUES
(4, 'RN0004', 'P0007BT002', '100.00', 10, '1000.00'),
(5, 'RN0005', 'P0001BT002', '120.00', 20, '2400.00'),
(6, 'RN0006', 'P0001BT002', '120.00', 10, '1200.00'),
(7, 'RN0007', 'P0001BT002', '120.00', 10, '1200.00'),
(8, 'RN0008', 'P0001BT003', '50.00', 10, '1000.00'),
(9, 'RN0009', 'P0001BT003', '50.00', 5, '250.00'),
(10, 'RN0010', 'P0001BT003', '50.00', 1, '50.00'),
(11, 'RN0011', 'P0001BT003', '50.00', 1, '50.00'),
(12, 'RN0012', 'P0001BT003', '50.00', 1, '50.00'),
(13, 'RN0013', 'P0001BT003', '50.00', 1, '50.00'),
(14, 'RN0014', 'P0007BT005', '120.00', 20, '2400.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` varchar(10) NOT NULL,
  `territory` varchar(10) NOT NULL,
  `route_name` text NOT NULL,
  `route_parts` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `territory`, `route_name`, `route_parts`) VALUES
('RT001', 'TRT001', 'WEWAGAMA UP TO GALGAMMULLA', 2),
('RT002', 'TRT001', 'DAMBADENIYA TOWN', 2),
('RT003', 'TRT001', 'MATIYAGANE UP TO MUTHUGALA', 2),
('RT004', 'TRT001', '15TH MILE POST, HAVENEGEDARA, HOROMBAWA', 2),
('RT005', 'TRT001', 'NARAMMALA, HAALWELLA, DAMPELESSA', 2),
('RT006', 'TRT001', 'DAMBADENIYA, ATHURUWELA UP TO MAAHARAGAMA', 2),
('RT007', 'TRT001', 'KATUGAMPOLA UP TO EDANDAWELA', 2),
('RT008', 'TRT001', 'DAMBADENIYA UP TO ATHURUWELA, ATAMBE', 2),
('RT009', 'TRT001', 'DANGOLLA UP TO MATIYAGANE', 2),
('RT010', 'TRT001', 'BIHALPOLA UP TO KANUGALA', 2),
('RT011', 'TRT001', 'RANMUTHUGALA UP TO MORAWALAPITIYA', 2),
('RT012', 'TRT001', 'RATHMALEWATHTHA UP TO NARANGODA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route_event`
--

CREATE TABLE `tbl_route_event` (
  `event_index` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `start` date NOT NULL,
  `className` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route_sche`
--

CREATE TABLE `tbl_route_sche` (
  `routesche_id` varchar(10) NOT NULL,
  `route_id` varchar(10) NOT NULL,
  `territory` varchar(10) NOT NULL,
  `route_date` date NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `rtsche_remarks` text NOT NULL,
  `rtsche_status` varchar(10) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `driver` varchar(10) NOT NULL,
  `salesman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_route_sche`
--

INSERT INTO `tbl_route_sche` (`routesche_id`, `route_id`, `territory`, `route_date`, `sup_id`, `rtsche_remarks`, `rtsche_status`, `vehicle`, `driver`, `salesman`) VALUES
('RSH0030', 'RT001', '', '2020-01-02', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0031', 'RT001', '', '2020-01-03', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0032', 'RT012', '', '2020-01-04', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0033', 'RT003', '', '2020-01-05', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0034', 'RT001', '', '2020-01-06', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0035', 'RT008', '', '2020-01-07', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0036', 'RT001', '', '2020-01-08', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0037', 'RT001', '', '2020-01-09', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0038', 'RT001', '', '2020-01-10', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0039', 'RT006', '', '2020-01-11', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0040', 'RT008', '', '2020-01-12', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0041', 'RT007', '', '2020-01-13', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0042', 'RT005', '', '2020-01-14', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0043', 'RT001', '', '2020-01-15', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0044', 'RT001', '', '2020-01-15', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP001'),
('RSH0045', 'RT002', '', '2020-01-30', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0046', 'RT001', '', '2020-01-25', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP005'),
('RSH0047', 'RT001', '', '2020-01-25', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP003'),
('RSH0048', 'RT001', '', '2020-01-25', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP006'),
('RSH0049', 'RT007', '', '2020-01-30', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP005'),
('RSH0050', 'RT001', '', '2020-01-30', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP005'),
('RSH0051', 'RT003', '', '2020-01-30', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP003'),
('RSH0052', 'RT004', '', '2020-01-25', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP003'),
('RSH0053', 'RT002', '', '2020-01-25', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0054', 'RT002', '', '2020-07-09', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP005'),
('RSH0055', 'RT003', '', '2020-07-09', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP005'),
('RSH0056', 'RT002', '', '2020-07-09', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0057', 'RT001', '', '2020-07-12', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP003'),
('RSH0058', 'RT005', '', '2020-07-12', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP006'),
('RSH0059', 'RT001', '', '2020-07-13', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP003'),
('RSH0062', 'RT004', '', '2020-07-21', 'SUP001', '', '3', 'GH-2323', 'EMP002', 'EMP003'),
('RSH0063', 'RT003', '', '2020-07-21', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0064', 'RT001', '', '2020-07-21', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP003'),
('RSH0069', 'RT012', '', '2020-07-26', 'SUP002', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0070', 'RT011', '', '2020-07-27', 'SUP002', '', '3', 'GH-5637', 'EMP001', 'EMP006'),
('RSH0071', 'RT010', '', '2020-07-28', 'SUP002', '', '3', 'GH-5637', 'EMP001', 'EMP003'),
('RSH0072', 'RT006', '', '2020-07-25', 'SUP001', '', '3', 'GH-5637', 'EMP001', 'EMP003'),
('RSH0073', 'RT005', '', '2020-07-25', 'SUP001', '', '3', 'GH-2323', 'EMP001', 'EMP005'),
('RSH0074', 'RT010', '', '2020-07-25', 'SUP002', '', '3', 'GH-2323', 'EMP007', 'EMP003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route_sche_details`
--

CREATE TABLE `tbl_route_sche_details` (
  `rtsche_index` int(11) NOT NULL,
  `rtsche_id` varchar(10) NOT NULL,
  `rtsche_route` varchar(10) NOT NULL,
  `rtsche_proid` varchar(10) NOT NULL,
  `rtsche_batch` varchar(10) NOT NULL,
  `rtsche_qty` int(10) NOT NULL,
  `rtsche_dstatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_route_sche_details`
--

INSERT INTO `tbl_route_sche_details` (`rtsche_index`, `rtsche_id`, `rtsche_route`, `rtsche_proid`, `rtsche_batch`, `rtsche_qty`, `rtsche_dstatus`) VALUES
(14, 'RSH0012', '', 'P0007', 'P0007BT002', 10, 0),
(15, 'RSH0012', '', 'P0014', 'P0014GT001', 10, 0),
(16, 'RSH0012', '', 'P0017', 'P0017BT001', 10, 0),
(18, 'RSH0013', '', 'P0007', 'P0007BT002', 10, 0),
(19, 'RSH0013', '', 'P0013', 'P0013GT001', 10, 0),
(21, 'RSH0019', '', 'P0001', 'P0001GT001', 10, 0),
(22, 'RSH0021', '', 'P0001', 'P0001GT001', 10, 0),
(23, 'RSH0022', '', 'P0001', 'P0001GT001', 10, 0),
(26, 'RSH0026', '', 'P0001', 'P0001BT002', 10, 0),
(27, 'RSH0027', '', 'P0001', 'P0001BT002', 10, 0),
(28, 'RSH0028', '', 'P0001', 'P0001BT002', 10, 0),
(29, 'RSH0029', '', 'P0001', 'P0001BT002', 10, 0),
(30, 'RSH0030', '', 'P0007', 'P0007BT001', 10, 0),
(31, 'RSH0031', '', 'P0007', 'P0007BT002', 10, 0),
(32, 'RSH0032', '', 'P0001', 'P0001BT002', 10, 0),
(33, 'RSH0033', '', 'P0001', 'P0001BT002', 10, 0),
(34, 'RSH0033', '', 'P0007', 'P0007BT002', 10, 0),
(35, 'RSH0033', '', 'P0008', 'P0008BT002', 10, 0),
(36, 'RSH0033', '', 'P0012', 'P0012GT001', 10, 0),
(37, 'RSH0033', '', 'P0013', 'P0013GT001', 10, 0),
(38, 'RSH0034', '', 'P0001', 'P0001BT002', 10, 0),
(39, 'RSH0034', '', 'P0007', 'P0007BT001', 10, 0),
(40, 'RSH0035', '', 'P0008', 'P0008GT001', 10, 0),
(41, 'RSH0035', '', 'P0014', 'P0014BT002', 10, 0),
(42, 'RSH0036', '', 'P0017', 'P0017BT001', 10, 0),
(43, 'RSH0036', '', 'P0008', 'P0008GT001', 10, 0),
(44, 'RSH0037', '', 'P0001', 'P0001BT002', 10, 0),
(45, 'RSH0038', '', 'P0007', 'P0007BT003', 10, 0),
(46, 'RSH0039', '', 'P0001', 'P0001BT002', 10, 0),
(47, 'RSH0040', '', 'P0001', 'P0001BT002', 10, 0),
(48, 'RSH0041', '', 'P0007', 'P0007BT003', 10, 0),
(49, 'RSH0042', '', 'P0007', 'P0007BT003', 10, 0),
(50, 'RSH0043', '', 'P0001', 'P0001BT002', 10, 0),
(51, 'RSH0044', '', 'P0007', 'P0007BT003', 10, 0),
(52, 'RSH0045', '', 'P0007', 'P0007BT003', 10, 0),
(53, 'RSH0045', '', 'P0007', 'P0007BT004', 10, 0),
(54, 'RSH0045', '', 'P0008', 'P0008GT001', 10, 0),
(55, 'RSH0046', '', 'P0001', 'P0001BT003', 10, 0),
(56, 'RSH0046', '', 'P0010', 'P0010GT001', 10, 0),
(57, 'RSH0047', '', 'P0001', 'P0001BT002', 10, 0),
(58, 'RSH0047', '', 'P0007', 'P0007BT005', 10, 0),
(59, 'RSH0048', '', 'P0001', 'P0001BT002', 10, 0),
(60, 'RSH0049', '', 'P0042', 'P0042GT001', 100, 0),
(61, 'RSH0050', '', 'P0001', 'P0001BT002', 10, 0),
(62, 'RSH0051', '', 'P0001', 'P0001BT002', 1000, 0),
(63, 'RSH0052', '', 'P0001', 'P0001BT002', 2000, 0),
(64, 'RSH0053', '', 'P0007', 'P0007BT004', 10, 0),
(65, 'RSH0054', '', 'P0007', 'P0007BT004', 10, 0),
(66, 'RSH0055', '', 'P0007', 'P0007BT005', 10, 0),
(67, 'RSH0055', '', 'P0001', 'P0001BT002', 20, 0),
(68, 'RSH0056', '', 'P0008', 'P0008GT001', 10, 0),
(69, 'RSH0057', '', 'P0001', 'P0001BT002', 100, 0),
(70, 'RSH0058', '', 'P0007', 'P0007BT005', 10, 0),
(71, 'RSH0058', '', 'P0001', 'P0001BT003', 10, 0),
(72, 'RSH0059', '', 'P0001', 'P0001BT002', 5, 0),
(75, 'RSH0062', '', 'P0008', 'P0008GT001', 10, 0),
(76, 'RSH0063', '', 'P0013', 'P0013BT002', 10, 0),
(77, 'RSH0064', '', 'P0001', 'P0001BT002', 100, 0),
(78, 'RSH0065', '', 'P0007', 'P0007BT004', 10, 1),
(79, 'RSH0066', '', 'P0007', 'P0007BT004', 5, 0),
(80, 'RSH0067', '', 'P0001', 'P0001BT002', 10, 0),
(81, 'RSH0068', '', 'P0001', 'P0001BT002', 10, 0),
(82, 'RSH0069', '', 'P0007', 'P0007BT002', 30, 0),
(83, 'RSH0070', '', 'P0007', 'P0007BT005', 5, 0),
(84, 'RSH0071', '', 'P0001', 'P0001BT002', 100, 0),
(85, 'RSH0072', '', 'P0001', 'P0001BT002', 10, 0),
(91, 'RSH0072', '', 'P0007', 'P0007BT002', 100, 0),
(92, 'RSH0069', '', 'P0027', 'P0027GT001', 10, 0),
(93, 'RSH0069', '', 'P0028', 'P0028BT002', 10, 0),
(94, 'RSH0069', '', 'P0029', 'P0029GT001', 10, 0),
(95, 'RSH0069', '', 'P0031', 'P0031GT001', 10, 0),
(96, 'RSH0069', '', 'P0034', 'P0034GT001', 10, 0),
(97, 'RSH0070', '', 'P0041', 'P0041GT001', 5, 1),
(98, 'RSH0070', '', 'P0040', 'P0040GT001', 5, 1),
(99, 'RSH0070', '', 'P0038', 'P0038GT001', 10, 1),
(100, 'RSH0071', '', 'P0036', 'P0036GT001', 5, 1),
(101, 'RSH0071', '', 'P0038', 'P0038GT001', 5, 1),
(102, 'RSH0071', '', 'P0029', 'P0029GT001', 10, 1),
(103, 'RSH0072', '', 'P0001', 'P0001BT002', 20, 0),
(104, 'RSH0072', '', 'P0007', 'P0007BT006', 20, 0),
(105, 'RSH0072', '', 'P0008', 'P0008GT001', 20, 0),
(106, 'RSH0073', '', 'P0012', 'P0012GT001', 10, 0),
(107, 'RSH0073', '', 'P0013', 'P0013GT001', 20, 0),
(108, 'RSH0073', '', 'P0014', 'P0014GT001', 20, 0),
(109, 'RSH0073', '', 'P0015', 'P0015GT001', 50, 0),
(110, 'RSH0074', '', 'P0041', 'P0041GT001', 5, 0),
(111, 'RSH0074', '', 'P0040', 'P0040GT001', 5, 0),
(112, 'RSH0074', '', 'P0039', 'P0039GT001', 5, 0),
(113, 'RSH0074', '', 'P0038', 'P0038GT001', 5, 0),
(114, 'RSH0074', '', 'P0037', 'P0037GT001', 5, 0),
(115, 'RSH0074', '', 'P0036', 'P0036GT001', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `sales_index` int(11) NOT NULL,
  `sales_id` varchar(10) NOT NULL,
  `list_no` int(3) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `sales_qty` varchar(10) NOT NULL,
  `sale_disrate` int(2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `emp_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`sales_index`, `sales_id`, `list_no`, `batch_id`, `item_name`, `item_price`, `sales_qty`, `sale_disrate`, `sub_total`, `emp_id`) VALUES
(287, 'SL0001', 1, 'P0001BT002', 'Chocolate Biscuits 80g', '130.00', '10', 3, '1261.00', ''),
(288, 'SL0001', 2, 'P0007BT006', 'Lemon Puff 100g', '90.00', '10', 3, '873.00', ''),
(289, 'SL0001', 3, 'P0008GT001', 'Chocolate Biscuits 400g', '160.00', '10', 3, '1552.00', ''),
(290, 'SL0002', 1, 'P0001BT002', 'Chocolate Biscuits 80g', '130.00', '10', 5, '1235.00', ''),
(291, 'SL0002', 2, 'P0007BT006', 'Lemon Puff 100g', '90.00', '10', 5, '855.00', ''),
(292, 'SL0002', 3, 'P0008GT001', 'Chocolate Biscuits 400g', '160.00', '10', 3, '1552.00', ''),
(293, 'SL0003', 1, 'P0012GT001', 'Revello Chrispies 50g', '120.00', '5', 3, '582.00', ''),
(294, 'SL0003', 2, 'P0013GT001', 'Revello Chrispies 100g', '120.00', '10', 3, '1164.00', ''),
(295, 'SL0003', 3, 'P0014GT001', 'Revello Cashew 100g', '120.00', '10', 3, '1164.00', ''),
(296, 'SL0003', 4, 'P0015GT001', 'Revello Cashew 50g', '60.00', '20', 3, '1164.00', ''),
(297, 'SL0004', 1, 'P0012GT001', 'Revello Chrispies 50g', '120.00', '5', 5, '570.00', ''),
(298, 'SL0004', 2, 'P0013GT001', 'Revello Chrispies 100g', '120.00', '10', 5, '1140.00', ''),
(299, 'SL0004', 3, 'P0014GT001', 'Revello Cashew 100g', '120.00', '10', 5, '1140.00', ''),
(300, 'SL0004', 4, 'P0015GT001', 'Revello Cashew 50g', '60.00', '20', 3, '1164.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order`
--

CREATE TABLE `tbl_sales_order` (
  `sales_id` varchar(10) NOT NULL,
  `sales_date` date NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `sales_total` decimal(10,2) NOT NULL,
  `sales_prebal` decimal(10,2) NOT NULL,
  `sales_paid` decimal(10,2) NOT NULL,
  `sales_balance` decimal(10,2) NOT NULL,
  `sales_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_order`
--

INSERT INTO `tbl_sales_order` (`sales_id`, `sales_date`, `cus_id`, `sup_id`, `emp_id`, `sales_total`, `sales_prebal`, `sales_paid`, `sales_balance`, `sales_status`) VALUES
('SL0001', '2020-07-25', 'CUS006', 'SUP001', 'EMP001', '3686.00', '0.00', '1000.00', '2686.00', 0),
('SL0002', '2020-07-25', 'CUS013', 'SUP001', 'EMP001', '3642.00', '0.00', '1000.00', '2642.00', 0),
('SL0003', '2020-07-25', 'CUS014', 'SUP001', 'EMP001', '4074.00', '0.00', '1500.00', '2574.00', 0),
('SL0004', '2020-07-25', 'CUS024', 'SUP001', 'EMP001', '4014.00', '0.00', '2000.00', '2014.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_return`
--

CREATE TABLE `tbl_sales_return` (
  `return_id` varchar(10) NOT NULL,
  `return_date` date NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `return_total` decimal(10,2) NOT NULL,
  `return_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `batch_index` int(11) NOT NULL,
  `batch_id` varchar(20) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `stock_qty` int(4) NOT NULL,
  `item_cost` decimal(10,2) DEFAULT NULL,
  `item_mrp` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`batch_index`, `batch_id`, `pro_id`, `stock_qty`, `item_cost`, `item_mrp`) VALUES
(25, 'P0006GT001', 'P0006', 10, '120.00', '140.00'),
(26, 'P0006BT002', 'P0006', 50, '150.00', '155.00'),
(30, 'P0007BT002', 'P0007', 80, '100.00', '120.00'),
(39, 'P0017BT001', 'P0017', 220, '120.00', '130.00'),
(40, 'P0013GT001', 'P0013', 100, '100.00', '120.00'),
(41, 'P0012GT001', 'P0012', 30, '100.00', '120.00'),
(42, 'P0014GT001', 'P0014', 110, '100.00', '120.00'),
(45, 'P0013BT002', 'P0013', 270, '120.00', '125.00'),
(47, 'P0007BT003', 'P0007', 10, '120.00', '125.00'),
(48, 'P0015GT001', 'P0015', 330, '50.00', '60.00'),
(49, 'P0008GT001', 'P0008', 70, '150.00', '160.00'),
(50, 'P0012BT002', 'P0012', 290, '50.00', '60.00'),
(52, 'P0007BT004', 'P0007', 10, '90.00', '95.00'),
(53, 'P0001BT002', 'P0001', 100, '120.00', '130.00'),
(55, 'P0014BT002', 'P0014', 20, '120.00', '130.00'),
(56, 'P0016GT001', 'P0016', 10, '120.00', '130.00'),
(57, 'P0004GT001', 'P0004', 10, '100.00', '110.00'),
(58, 'P0021GT001', 'P0021', 10, '50.00', '60.00'),
(59, 'P0001BT003', 'P0001', 36, '50.00', '60.00'),
(60, 'P0010BT002', 'P0010', 12, '20.00', '30.00'),
(61, 'P0015BT002', 'P0015', 125, '40.00', '50.00'),
(62, 'P0014BT002', 'P0014', 20, '50.00', '60.00'),
(63, 'P0016BT002', 'P0016', 60, '50.00', '60.00'),
(64, 'P0017BT002', 'P0017', 50, '50.00', '60.00'),
(65, 'P0018BT002', 'P0018', 80, '50.00', '60.00'),
(67, 'P0007BT005', 'P0007', 28, '120.00', '130.00'),
(68, 'P0008BT002', 'P0008', 100, '100.00', '120.00'),
(69, 'P0028GT001', 'P0028', 120, '120.00', '130.00'),
(70, 'P0030GT001', 'P0030', 100, '120.00', '130.00'),
(71, 'P0015BT002', 'P0015', 100, '120.00', '130.00'),
(72, 'P0042GT001', 'P0042', 60, '120.00', '130.00'),
(73, 'P0008BT002', 'P0008', 100, '100.00', '110.00'),
(74, 'P0001BT004', 'P0001', 100, '65.00', '70.00'),
(75, 'P0007BT006', 'P0007', 80, '85.00', '90.00'),
(76, 'P0008BT002', 'P0008', 100, '230.00', '240.00'),
(77, 'P0009BT002', 'P0009', 100, '8.00', '10.00'),
(78, 'P0010BT002', 'P0010', 100, '10.00', '15.00'),
(79, 'P0011BT002', 'P0011', 100, '20.00', '25.00'),
(80, 'P0012BT002', 'P0012', 100, '60.00', '65.00'),
(81, 'P0013BT002', 'P0013', 100, '110.00', '120.00'),
(82, 'P0014BT002', 'P0014', 100, '155.00', '160.00'),
(83, 'P0015BT002', 'P0015', 100, '70.00', '75.00'),
(84, 'P0016BT002', 'P0016', 100, '100.00', '110.00'),
(85, 'P0027GT001', 'P0027', 120, '127.00', '140.00'),
(86, 'P0028BT002', 'P0028', 80, '127.00', '140.00'),
(87, 'P0029GT001', 'P0029', 60, '127.00', '140.00'),
(88, 'P0030BT002', 'P0030', 60, '127.00', '140.00'),
(89, 'P0031GT001', 'P0031', 60, '127.00', '140.00'),
(90, 'P0032GT001', 'P0032', 50, '172.00', '190.00'),
(91, 'P0033GT001', 'P0033', 80, '172.00', '190.00'),
(92, 'P0034GT001', 'P0034', 50, '172.00', '190.00'),
(93, 'P0035GT001', 'P0035', 80, '172.00', '190.00'),
(94, 'P0036GT001', 'P0036', 50, '172.00', '190.00'),
(95, 'P0037GT001', 'P0037', 50, '227.00', '250.00'),
(96, 'P0038GT001', 'P0038', 70, '227.00', '250.00'),
(97, 'P0039GT001', 'P0039', 30, '227.00', '250.00'),
(98, 'P0040GT001', 'P0040', 50, '227.00', '250.00'),
(99, 'P0041GT001', 'P0041', 50, '227.00', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `std_id` varchar(100) NOT NULL,
  `std_name` varchar(200) NOT NULL,
  `std_address` longtext NOT NULL,
  `std_province` int(11) NOT NULL,
  `std_gender` tinyint(4) NOT NULL,
  `std_tel` int(10) NOT NULL,
  `std_tel_opt` int(10) DEFAULT NULL,
  `std_email` varchar(200) NOT NULL,
  `std_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`std_id`, `std_name`, `std_address`, `std_province`, `std_gender`, `std_tel`, `std_tel_opt`, `std_email`, `std_status`) VALUES
('S0001', 'aa', 'aaaaa', 1, 0, 78954, 444, 'asasdsad', 0),
('S0002', 'shaini', 'kandy', 1, 2, 776777878, 0, 'sha@gmai.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `sup_id` varchar(10) NOT NULL,
  `sup_name` text NOT NULL,
  `sup_add` text NOT NULL,
  `sup_tel` int(12) NOT NULL,
  `sup_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`sup_id`, `sup_name`, `sup_add`, `sup_tel`, `sup_status`) VALUES
('SUP001', 'Ceylon Biscuits Limited', 'P.O. Box 03, Makumbura Pannipitiya. Sri Lanka', 112749749, 0),
('SUP002', 'Lanka Canneries PVT', ' P.O. BOX 341, Nawala Road, Colombo 5, Sri Lanka', 112586662, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_productgroup`
--

CREATE TABLE `tbl_supplier_productgroup` (
  `prdgroup_index` int(11) NOT NULL,
  `prdgroup_id` varchar(10) NOT NULL,
  `prdgroup_supplier` varchar(10) NOT NULL,
  `prdgroup_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier_productgroup`
--

INSERT INTO `tbl_supplier_productgroup` (`prdgroup_index`, `prdgroup_id`, `prdgroup_supplier`, `prdgroup_name`) VALUES
(1, 'CBL-001', 'sup001', 'CBL GROUP 01'),
(2, 'CBL-002', 'sup001', 'CBL GROUP 02'),
(3, 'CBL-003', 'sup001', 'CBL GROUP 03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_territory`
--

CREATE TABLE `tbl_supplier_territory` (
  `sup_ter_index` int(11) NOT NULL,
  `sup_id` varchar(10) NOT NULL,
  `ter_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier_territory`
--

INSERT INTO `tbl_supplier_territory` (`sup_ter_index`, `sup_id`, `ter_id`) VALUES
(1, 'SUP001', 'TRT001'),
(5, 'SUP002', 'TRT001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sup_price_list`
--

CREATE TABLE `tbl_sup_price_list` (
  `supprice_id` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `sup_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terr`
--

CREATE TABLE `tbl_terr` (
  `ter_id` varchar(10) NOT NULL,
  `ter_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_terr`
--

INSERT INTO `tbl_terr` (`ter_id`, `ter_name`) VALUES
('TRT001', 'DAMBADENIYA-B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_territory`
--

CREATE TABLE `tbl_territory` (
  `trty_index` int(6) NOT NULL,
  `trty_id` varchar(6) NOT NULL,
  `trty_name` varchar(40) NOT NULL,
  `route_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_territory`
--

INSERT INTO `tbl_territory` (`trty_index`, `trty_id`, `trty_name`, `route_id`) VALUES
(1, 'TRT001', 'DAMBADENIYA-B', 'RT001'),
(2, 'TRT001', 'DAMBADENIYA-B', 'RT002'),
(3, 'TRT001', 'DAMBADENIYA-B', 'RT003'),
(4, 'TRT001', 'DAMBADENIYA-B', 'RT004'),
(5, 'TRT001', 'DAMBADENIYA-B', 'RT005'),
(6, 'TRT001', 'DAMBADENIYA-B', 'RT006'),
(7, 'TRT001', 'DAMBADENIYA-B', 'RT007'),
(8, 'TRT001', 'DAMBADENIYA-B', 'RT008'),
(9, 'TRT001', 'DAMBADENIYA-B', 'RT009'),
(10, 'TRT001', 'DAMBADENIYA-B', 'RT010'),
(11, 'TRT001', 'DAMBADENIYA-B', 'RT011'),
(12, 'TRT001', 'DAMBADENIYA-B', 'RT012');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `emp_id` varchar(6) NOT NULL,
  `emp_uname` varchar(16) NOT NULL,
  `emp_pw` varchar(32) NOT NULL,
  `emp_type` varchar(11) NOT NULL,
  `emp_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`emp_id`, `emp_uname`, `emp_pw`, `emp_type`, `emp_status`) VALUES
('EMP001', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 1),
('EMP002', 'salesmanager', '69e79944040ca1122b1550f989ef82cf', '2', 1),
('EMP003', 'salesman', '1ee726b084cffbc96a6163d65f885d64', '3', 1),
('EMP004', 'manager', '1d0258c2440a8d19e716292b231e3190', '4', 1),
('EMP005', 'warehousemanager', 'df7dc5496ced2d6ad4afb8e0385411f1', '5', 1),
('EMP006', 'prasad', '25d55ad283aa400af464c76d713c07ad', '3', 0),
('EMP007', 'Indika', '811278696c21087aa984faf21bf88a96', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_calender`
--

CREATE TABLE `tbl_user_calender` (
  `user_cal_index` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `cal_date` date NOT NULL,
  `cal_remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_calender`
--

INSERT INTO `tbl_user_calender` (`user_cal_index`, `emp_id`, `cal_date`, `cal_remarks`) VALUES
(1, 'EMP001', '2019-12-10', 'Day off'),
(2, 'EMP002', '2019-12-10', 'Day off'),
(7, 'EMP002', '2020-01-25', 'RSH0024'),
(8, 'EMP001', '2020-01-29', 'RSH0025'),
(9, 'GH-2323', '2020-01-29', 'RSH0025'),
(10, 'EMP002', '2020-01-29', 'RSH0025'),
(11, 'EMP001', '2020-01-24', 'RSH0026'),
(12, 'GH-2323', '2020-01-24', 'RSH0026'),
(13, 'EMP002', '2020-01-24', 'RSH0026'),
(14, 'EMP001', '2020-01-24', 'RSH0027'),
(15, 'GH-2323', '2020-01-24', 'RSH0027'),
(16, 'EMP002', '2020-01-24', 'RSH0027'),
(17, 'EMP001', '2020-01-24', 'RSH0028'),
(18, 'GH-2323', '2020-01-24', 'RSH0028'),
(19, 'EMP002', '2020-01-24', 'RSH0028'),
(20, 'EMP001', '2020-01-28', 'RSH0029'),
(21, 'GH-2323', '2020-01-28', 'RSH0029'),
(22, 'EMP002', '2020-01-28', 'RSH0029'),
(23, 'EMP001', '2020-01-27', 'RSH0030'),
(24, 'GH-2323', '2020-01-27', 'RSH0030'),
(25, 'EMP002', '2020-01-27', 'RSH0030'),
(26, 'EMP001', '2020-01-25', 'RSH0031'),
(27, 'GH-2323', '2020-01-25', 'RSH0031'),
(28, 'EMP002', '2020-01-25', 'RSH0031'),
(29, 'EMP001', '2020-01-26', 'RSH0032'),
(30, 'GH-2323', '2020-01-26', 'RSH0032'),
(31, 'EMP002', '2020-01-26', 'RSH0032'),
(32, 'EMP001', '2020-01-25', 'RSH0033'),
(33, 'GH-2323', '2020-01-25', 'RSH0033'),
(34, 'EMP002', '2020-01-25', 'RSH0033'),
(35, 'EMP001', '2020-01-25', 'RSH0034'),
(36, 'GH-2323', '2020-01-25', 'RSH0034'),
(37, 'EMP002', '2020-01-25', 'RSH0034'),
(38, 'EMP001', '2020-01-25', 'RSH0035'),
(39, 'GH-2323', '2020-01-25', 'RSH0035'),
(40, 'EMP002', '2020-01-25', 'RSH0035'),
(41, 'EMP001', '2020-01-25', 'RSH0036'),
(42, 'GH-2323', '2020-01-25', 'RSH0036'),
(43, 'EMP002', '2020-01-25', 'RSH0036'),
(44, 'EMP001', '2020-01-25', 'RSH0037'),
(45, 'GH-2323', '2020-01-25', 'RSH0037'),
(46, 'EMP002', '2020-01-25', 'RSH0037'),
(47, 'EMP001', '2020-01-25', 'RSH0038'),
(48, 'GH-2323', '2020-01-25', 'RSH0038'),
(49, 'EMP002', '2020-01-25', 'RSH0038'),
(50, 'EMP001', '2020-01-25', 'RSH0039'),
(51, 'GH-2323', '2020-01-25', 'RSH0039'),
(52, 'EMP002', '2020-01-25', 'RSH0039'),
(53, 'EMP001', '2020-01-25', 'RSH0040'),
(54, 'GH-2323', '2020-01-25', 'RSH0040'),
(55, 'EMP002', '2020-01-25', 'RSH0040'),
(56, 'EMP001', '2020-01-25', 'RSH0041'),
(57, 'GH-2323', '2020-01-25', 'RSH0041'),
(58, 'EMP002', '2020-01-25', 'RSH0041'),
(59, 'EMP001', '2020-01-25', 'RSH0042'),
(60, 'GH-2323', '2020-01-25', 'RSH0042'),
(61, 'EMP002', '2020-01-25', 'RSH0042'),
(62, 'EMP001', '2020-01-25', 'RSH0043'),
(63, 'GH-2323', '2020-01-25', 'RSH0043'),
(64, 'EMP002', '2020-01-25', 'RSH0043'),
(65, 'EMP001', '2020-01-25', 'RSH0044'),
(66, 'GH-2323', '2020-01-25', 'RSH0044'),
(67, 'EMP002', '2020-01-25', 'RSH0044'),
(68, 'EMP001', '2020-01-25', 'RSH0045'),
(69, 'GH-2323', '2020-01-25', 'RSH0045'),
(70, 'EMP002', '2020-01-25', 'RSH0045'),
(71, 'EMP005', '2020-01-30', 'RSH0045'),
(72, 'GH-2323', '2020-01-30', 'RSH0045'),
(73, 'EMP001', '2020-01-30', 'RSH0045'),
(74, 'EMP005', '2020-01-25', 'RSH0046'),
(75, 'GH-2323', '2020-01-25', 'RSH0046'),
(76, 'EMP002', '2020-01-25', 'RSH0046'),
(77, 'EMP003', '2020-01-25', 'RSH0047'),
(78, 'GH-2323', '2020-01-25', 'RSH0047'),
(79, 'EMP002', '2020-01-25', 'RSH0047'),
(80, 'EMP006', '2020-01-25', 'RSH0048'),
(81, 'GH-2323', '2020-01-25', 'RSH0048'),
(82, 'EMP001', '2020-01-25', 'RSH0048'),
(83, 'EMP005', '2020-01-30', 'RSH0049'),
(84, 'GH-2323', '2020-01-30', 'RSH0049'),
(85, 'EMP002', '2020-01-30', 'RSH0049'),
(86, 'EMP005', '2020-01-30', 'RSH0050'),
(87, 'GH-2323', '2020-01-30', 'RSH0050'),
(88, 'EMP002', '2020-01-30', 'RSH0050'),
(89, 'EMP003', '2020-01-30', 'RSH0051'),
(90, 'GH-2323', '2020-01-30', 'RSH0051'),
(91, 'EMP001', '2020-01-30', 'RSH0051'),
(92, 'EMP003', '2020-01-25', 'RSH0052'),
(93, 'GH-2323', '2020-01-25', 'RSH0052'),
(94, 'EMP001', '2020-01-25', 'RSH0052'),
(95, 'EMP005', '2020-01-25', 'RSH0053'),
(96, 'GH-2323', '2020-01-25', 'RSH0053'),
(97, 'EMP001', '2020-01-25', 'RSH0053'),
(98, 'EMP005', '2020-07-09', 'RSH0054'),
(99, 'GH-2323', '2020-07-09', 'RSH0054'),
(100, 'EMP002', '2020-07-09', 'RSH0054'),
(101, 'EMP005', '2020-07-09', 'RSH0055'),
(102, 'GH-2323', '2020-07-09', 'RSH0055'),
(103, 'EMP002', '2020-07-09', 'RSH0055'),
(104, 'EMP005', '2020-07-09', 'RSH0056'),
(105, 'GH-2323', '2020-07-09', 'RSH0056'),
(106, 'EMP001', '2020-07-09', 'RSH0056'),
(107, 'EMP003', '2020-07-12', 'RSH0057'),
(108, 'GH-2323', '2020-07-12', 'RSH0057'),
(109, 'EMP001', '2020-07-12', 'RSH0057'),
(110, 'EMP006', '2020-07-12', 'RSH0058'),
(111, 'GH-2323', '2020-07-12', 'RSH0058'),
(112, 'EMP002', '2020-07-12', 'RSH0058'),
(113, 'EMP003', '2020-07-13', 'RSH0059'),
(114, 'GH-2323', '2020-07-13', 'RSH0059'),
(115, 'EMP001', '2020-07-13', 'RSH0059'),
(116, '', '2020-07-13', 'RSH0060'),
(117, '', '2020-07-13', 'RSH0060'),
(118, '', '2020-07-13', 'RSH0060'),
(119, 'EMP005', '2020-07-22', 'RSH0061'),
(120, 'GH-2323', '2020-07-22', 'RSH0061'),
(121, 'EMP001', '2020-07-22', 'RSH0061'),
(122, 'EMP003', '2020-07-21', 'RSH0062'),
(123, 'GH-2323', '2020-07-21', 'RSH0062'),
(124, 'EMP002', '2020-07-21', 'RSH0062'),
(125, 'EMP005', '2020-07-21', 'RSH0063'),
(126, 'GH-2323', '2020-07-21', 'RSH0063'),
(127, 'EMP001', '2020-07-21', 'RSH0063'),
(128, 'EMP003', '2020-07-21', 'RSH0064'),
(129, 'GH-2323', '2020-07-21', 'RSH0064'),
(130, 'EMP001', '2020-07-21', 'RSH0064'),
(131, 'EMP005', '2020-07-21', 'RSH0065'),
(132, 'GH-2323', '2020-07-21', 'RSH0065'),
(133, 'EMP001', '2020-07-21', 'RSH0065'),
(134, 'EMP005', '2020-07-21', 'RSH0066'),
(135, 'GH-2323', '2020-07-21', 'RSH0066'),
(136, 'EMP001', '2020-07-21', 'RSH0066'),
(137, 'EMP005', '2020-07-23', 'RSH0067'),
(138, 'GH-2323', '2020-07-23', 'RSH0067'),
(139, 'EMP001', '2020-07-23', 'RSH0067'),
(140, 'EMP003', '2020-07-24', 'RSH0068'),
(141, 'GH-2323', '2020-07-24', 'RSH0068'),
(142, 'EMP001', '2020-07-24', 'RSH0068'),
(161, 'EMP003', '2020-07-25', 'RSH0069'),
(162, 'GH-2323', '2020-07-25', 'RSH0069'),
(163, 'EMP001', '2020-07-25', 'RSH0069'),
(164, 'EMP005', '2020-07-25', 'RSH0070'),
(165, 'GH-2323', '2020-07-25', 'RSH0070'),
(166, 'EMP001', '2020-07-25', 'RSH0070'),
(167, 'EMP006', '2020-07-25', 'RSH0071'),
(168, 'GH-3292', '2020-07-25', 'RSH0071'),
(169, 'EMP001', '2020-07-25', 'RSH0071'),
(170, 'EMP003', '2020-07-25', 'RSH0072'),
(171, 'GH-2323', '2020-07-25', 'RSH0072'),
(172, 'EMP001', '2020-07-25', 'RSH0072'),
(173, 'EMP005', '2020-07-26', 'RSH0069'),
(174, 'GH-2323', '2020-07-26', 'RSH0069'),
(175, 'EMP001', '2020-07-26', 'RSH0069'),
(176, 'EMP006', '2020-07-27', 'RSH0070'),
(177, 'GH-5637', '2020-07-27', 'RSH0070'),
(178, 'EMP001', '2020-07-27', 'RSH0070'),
(179, 'EMP003', '2020-07-28', 'RSH0071'),
(180, 'GH-5637', '2020-07-28', 'RSH0071'),
(181, 'EMP001', '2020-07-28', 'RSH0071'),
(182, 'EMP003', '2020-07-25', 'RSH0072'),
(183, 'GH-5637', '2020-07-25', 'RSH0072'),
(184, 'EMP001', '2020-07-25', 'RSH0072'),
(185, 'EMP005', '2020-07-25', 'RSH0073'),
(186, 'GH-2323', '2020-07-25', 'RSH0073'),
(187, 'EMP001', '2020-07-25', 'RSH0073'),
(188, 'EMP003', '2020-07-25', 'RSH0074'),
(189, 'GH-2323', '2020-07-25', 'RSH0074'),
(190, 'EMP007', '2020-07-25', 'RSH0074');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `emp_id` varchar(6) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `emp_fullname` varchar(40) NOT NULL,
  `emp_tel` int(10) NOT NULL,
  `emp_add` varchar(50) NOT NULL,
  `emp_email` varchar(40) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`emp_id`, `emp_name`, `emp_fullname`, `emp_tel`, `emp_add`, `emp_email`, `emp_dob`, `emp_type`) VALUES
('EMP001', 'Ajith', 'Janaka Perera', 374411228, 'Bihalpola', 'ajkumara@gmail.com', '1989-01-13', '6'),
('EMP002', 'Nimal', 'Nimal Bandara', 771243653, 'Bihalpola Nakkawaththa', 'nimal1992@gmail.com', '1992-03-23', '4'),
('EMP003', 'Thrindu', 'Tharindu abeysinghe', 776586544, 'Muruthenge, Wakkunuwala.', 'thrinduabey@gmail.vom', '1995-04-20', '3'),
('EMP004', 'Pasan', 'Pasan Liyanage', 372287146, 'Bihalpola Nakkawaththa', 'pasanlia@gmail.com', '1996-08-13', '4'),
('EMP005', 'prasad', 'Prasad Silva', 372265984, 'Nugawela Road, Kithalawa', 'kapilafer@gmail.com', '2015-11-17', '3'),
('EMP006', 'prasad', 'Prasad Dissanayake', 37569841, 'Bihalpola, Nakkawaththa', 'prasad123@gmail.com', '1996-04-25', '3'),
('EMP007', 'Indika', 'Indika Bandara', 775168148, 'Nakkawaththa', 'indika45@gmail.com', '1982-10-17', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type` int(5) NOT NULL,
  `user_typename` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type`, `user_typename`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Salesman'),
(4, 'Warehouse Manager'),
(5, 'Sales Manager'),
(6, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `veh_id` varchar(10) NOT NULL,
  `veh_number` varchar(10) NOT NULL,
  `veh_name` text NOT NULL,
  `veh_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`veh_id`, `veh_number`, `veh_name`, `veh_type`) VALUES
('VEH001', 'GH-2323', 'Lorry', 'Small Lorry'),
('VEH002', 'GH-5637', 'Isuzu Lorry', 'Medium Lorry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_products`
--

CREATE TABLE `tbl_vehicle_products` (
  `veh_pro_index` int(11) NOT NULL,
  `veh_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_items`
--

CREATE TABLE `tbl_warehouse_items` (
  `wareitems_id` varchar(10) NOT NULL,
  `warehouse_id` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_grn`
--
ALTER TABLE `tbl_grn`
  ADD PRIMARY KEY (`grn_id`);

--
-- Indexes for table `tbl_grn_details`
--
ALTER TABLE `tbl_grn_details`
  ADD PRIMARY KEY (`grn_index`);

--
-- Indexes for table `tbl_group_product`
--
ALTER TABLE `tbl_group_product`
  ADD PRIMARY KEY (`grp_prd_index`);

--
-- Indexes for table `tbl_issue_stock`
--
ALTER TABLE `tbl_issue_stock`
  ADD PRIMARY KEY (`issue_stock_index`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`pur_id`);

--
-- Indexes for table `tbl_po_details`
--
ALTER TABLE `tbl_po_details`
  ADD PRIMARY KEY (`pur_detailsid`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `tbl_product_subcat`
--
ALTER TABLE `tbl_product_subcat`
  ADD PRIMARY KEY (`product_subcat_id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  ADD PRIMARY KEY (`return_index`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_route_event`
--
ALTER TABLE `tbl_route_event`
  ADD PRIMARY KEY (`event_index`);

--
-- Indexes for table `tbl_route_sche`
--
ALTER TABLE `tbl_route_sche`
  ADD PRIMARY KEY (`routesche_id`);

--
-- Indexes for table `tbl_route_sche_details`
--
ALTER TABLE `tbl_route_sche_details`
  ADD PRIMARY KEY (`rtsche_index`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`sales_index`);

--
-- Indexes for table `tbl_sales_order`
--
ALTER TABLE `tbl_sales_order`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_sales_return`
--
ALTER TABLE `tbl_sales_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`batch_index`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `std_province` (`std_province`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `tbl_supplier_productgroup`
--
ALTER TABLE `tbl_supplier_productgroup`
  ADD PRIMARY KEY (`prdgroup_index`);

--
-- Indexes for table `tbl_supplier_territory`
--
ALTER TABLE `tbl_supplier_territory`
  ADD PRIMARY KEY (`sup_ter_index`);

--
-- Indexes for table `tbl_terr`
--
ALTER TABLE `tbl_terr`
  ADD PRIMARY KEY (`ter_id`);

--
-- Indexes for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  ADD PRIMARY KEY (`trty_index`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_user_calender`
--
ALTER TABLE `tbl_user_calender`
  ADD PRIMARY KEY (`user_cal_index`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`veh_id`);

--
-- Indexes for table `tbl_vehicle_products`
--
ALTER TABLE `tbl_vehicle_products`
  ADD PRIMARY KEY (`veh_pro_index`);

--
-- Indexes for table `tbl_warehouse_items`
--
ALTER TABLE `tbl_warehouse_items`
  ADD PRIMARY KEY (`wareitems_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_grn_details`
--
ALTER TABLE `tbl_grn_details`
  MODIFY `grn_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `tbl_group_product`
--
ALTER TABLE `tbl_group_product`
  MODIFY `grp_prd_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_issue_stock`
--
ALTER TABLE `tbl_issue_stock`
  MODIFY `issue_stock_index` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_po_details`
--
ALTER TABLE `tbl_po_details`
  MODIFY `pur_detailsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  MODIFY `product_cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product_subcat`
--
ALTER TABLE `tbl_product_subcat`
  MODIFY `product_subcat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  MODIFY `return_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_route_event`
--
ALTER TABLE `tbl_route_event`
  MODIFY `event_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_route_sche_details`
--
ALTER TABLE `tbl_route_sche_details`
  MODIFY `rtsche_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `sales_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `batch_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_supplier_productgroup`
--
ALTER TABLE `tbl_supplier_productgroup`
  MODIFY `prdgroup_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier_territory`
--
ALTER TABLE `tbl_supplier_territory`
  MODIFY `sup_ter_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  MODIFY `trty_index` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_calender`
--
ALTER TABLE `tbl_user_calender`
  MODIFY `user_cal_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_vehicle_products`
--
ALTER TABLE `tbl_vehicle_products`
  MODIFY `veh_pro_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`std_province`) REFERENCES `tbl_province` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
