-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 02:12 AM
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
  `cus_type` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `route_id`, `cus_name`, `cus_add`, `cus_tel`, `cus_type`) VALUES
('CUS001', 'RT001', 'Saman Traders', 'Bihalpola', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cus_pricelist`
--

CREATE TABLE `tbl_cus_pricelist` (
  `cusprice_id` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `item_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `discount_id` varchar(10) NOT NULL,
  `discount_type` varchar(10) NOT NULL,
  `discount_rate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('GRN0001', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0002', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0003', 'sup001', '1', '0000-00-00', 'gg'),
('GRN0004', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0005', 'sup001', '1', '0000-00-00', 'gg'),
('GRN0006', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0007', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0008', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0009', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0010', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0011', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0012', 'sup001', '1', '0000-00-00', 'gg'),
('GRN0013', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0014', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0015', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0016', 'sup001', 'PO0008', '0000-00-00', 'gg'),
('GRN0017', 'sup001', '1', '2020-01-01', 'gg'),
('GRN0018', 'sup001', '0', '2020-01-01', 'gg'),
('GRN0019', 'sup001', '0', '2020-01-01', 'gg'),
('GRN0020', 'sup001', '0', '2020-01-01', ''),
('GRN0021', 'sup001', 'Without PO', '2020-01-01', 'gggg'),
('GRN0022', 'sup001', 'PO0008', '2020-01-01', 'gggg'),
('GRN0023', 'sup001', 'Without PO', '2020-01-01', ''),
('GRN0024', 'sup001', 'Without PO', '2020-01-01', ''),
('GRN0025', 'sup001', 'PO0013', '2020-01-01', 'gg'),
('GRN0026', '', '0', '2020-01-02', ''),
('GRN0027', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0028', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0029', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0030', 'sup001', '0', '2020-01-02', ''),
('GRN0031', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0032', '', '', '0000-00-00', ''),
('GRN0033', 'sup001', '0', '2020-01-02', ''),
('GRN0034', 'sup001', '0', '2020-01-02', ''),
('GRN0035', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0036', 'sup001', 'Without PO', '2020-01-02', 'gg'),
('GRN0037', 'sup001', 'Without PO', '2020-01-02', ''),
('GRN0038', 'sup001', 'Without PO', '2020-01-02', 'gg'),
('GRN0039', 'sup001', 'PO0009', '2020-01-02', ''),
('GRN0040', 'sup001', '0', '2020-01-02', ''),
('GRN0041', 'sup001', '0', '2020-01-02', ''),
('GRN0042', 'sup001', 'PO0010', '2020-01-03', ''),
('GRN0043', 'sup001', 'PO0014', '2020-01-03', '');

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
(1, 'GRN0009', '', '', 0, '0', '0'),
(2, 'GRN0010', '', '', 0, '0', '0'),
(3, 'GRN0010', 'P0007', '', 34, '0', '0'),
(4, 'GRN0011', '', '', 0, '0', '0'),
(5, 'GRN0011', 'P0007', '', 45, '0', '0'),
(6, 'GRN0012', '', '', 0, '0', '0'),
(7, 'GRN0012', 'P0007', '', 45, '56', '67'),
(8, 'GRN0013', '', '', 0, '0', '0'),
(9, 'GRN0013', 'P0007', '', 45, '56', '67'),
(10, 'GRN0014', '', '', 0, '0', '0'),
(11, 'GRN0014', 'P0008', '', 45, '54', '34'),
(12, 'GRN0015', '', '', 0, '0', '0'),
(13, 'GRN0015', 'P0001', '', 34, '54', '56'),
(14, 'GRN0015', 'P0007', '', 45, '34', '32'),
(15, 'GRN0015', 'P0008', '', 34, '56', '32'),
(16, 'GRN0016', 'P0007', '', 34, '34', '45'),
(17, 'GRN0017', 'P0007', '', 34, '45', '56'),
(18, 'GRN0018', 'P0007', '', 45, '56', '67'),
(19, 'GRN0019', 'P0001', '', 43, '45', '56'),
(20, 'GRN0020', 'P0007', '', 34, '45', '56'),
(21, 'GRN0022', 'P0007', '', 34, '34', '34'),
(22, 'GRN0025', 'P0007', '', 34, '454', '34'),
(23, 'GRN0026', 'No data av', '', 0, '0', '0'),
(24, 'GRN0027', 'P0007', 'GRN0027', 44, '55', '66'),
(25, 'GRN0028', 'P0001', '66', 33, '44', '55'),
(26, 'GRN0029', 'P0007', 'BT001', 10, '40', '50'),
(27, 'GRN0030', 'P0007', 'BT001', 40, '50', '70'),
(28, 'GRN0031', 'P0007', 'BT001', 20, '50', '80'),
(29, 'GRN0034', 'P0007', 'BT001', 50, '33', '44'),
(30, 'GRN0035', 'P0007', 'BT001', 33, '40', '50'),
(31, 'GRN0036', 'P0007', 'BT001', 60, '45', '56'),
(32, 'GRN0037', 'P0008', 'BT002', 40, '30', '50'),
(33, 'GRN0038', 'P0008', 'BT002', 50, '23', '34'),
(34, 'GRN0039', 'P0007', '', 50, '34', '34'),
(35, 'GRN0040', 'P0007', '', 34, '44', '44'),
(36, 'GRN0041', 'P0007', '', 100, '34', '34'),
(37, 'GRN0042', 'P0008', 'BT003', 60, '100', '120'),
(38, 'GRN0043', 'P0013', 'BT009', 40, '50', '60');

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
('PO0003', '0000-00-00', '', '', '0'),
('PO0004', '0000-00-00', 'sup001', '', '0'),
('PO0005', '0000-00-00', 'sup001', '', '0'),
('PO0006', '0000-00-00', 'sup001', '123', ''),
('PO0007', '0000-00-00', 'sup001', '123', ''),
('PO0008', '0000-00-00', 'sup001', '123', 'Received'),
('PO0009', '0000-00-00', 'sup001', '', 'Received'),
('PO0010', '0000-00-00', 'sup001', '', 'Received'),
('PO0011', '0000-00-00', 'sup001', '', 'Received'),
('PO0012', '0000-00-00', '', '', 'Pending'),
('PO0013', '0000-00-00', 'sup001', '', 'Received'),
('PO0014', '2020-01-02', 'sup001', '', 'Received'),
('PO0015', '2020-01-02', 'sup001', '', 'Pending'),
('PO0016', '2020-01-03', 'sup001', '', 'Pending'),
('PO0017', '2020-01-04', 'sup001', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_details`
--

CREATE TABLE `tbl_po_details` (
  `pur_detailsid` int(10) NOT NULL,
  `purod_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `pur_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_details`
--

INSERT INTO `tbl_po_details` (`pur_detailsid`, `purod_id`, `pro_id`, `pur_qty`) VALUES
(81, 'PO0001', 'P0007', 23),
(82, 'PO0001', 'P0008', 34),
(83, 'PO0002', 'P0008', 34),
(84, 'PO0003', 'No data av', 0),
(85, 'PO0004', 'P0007', 23),
(86, 'PO0005', 'P0007', 34),
(87, 'PO0008', 'P0008', 33),
(88, 'PO0009', 'P0007', 55),
(89, 'PO0010', 'P0007', 0),
(90, 'PO0011', 'P0001', 23),
(91, 'PO0011', 'P0007', 33),
(92, 'PO0011', 'P0008', 0),
(93, 'PO0013', 'No data av', 0),
(94, 'PO0014', 'P0007', 23),
(95, 'PO0015', 'P0007', 55),
(96, 'PO0016', 'P0013', 90),
(97, 'PO0016', 'P0019', 60),
(98, 'PO0017', 'P0019', 50);

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
  `pro_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `pro_cat_id`, `pro_subcat_id`, `pro_name`, `pro_sup_id`, `pro_status`) VALUES
('P0001', 4, 3, 'Chocolate Biscuits 80g', 'sup001', 1),
('P0004', 1, 1, 'Ninja Mosquito Coil 200g', 'sup003', 0),
('P0005', 1, 1, 'Ninja Mosquito Coil 400g', 'sup003', 0),
('P0006', 1, 1, 'Ninja Mosquito Coil 600g', 'sup003', 0),
('P0007', 4, 4, 'Lemon Puff 100g', 'sup001', 0),
('P0008', 4, 3, 'Chocolate Biscuits 400g', 'sup001', 0),
('P0009', 7, 6, 'Chocolate Fingers 16g', 'sup001', 0),
('P0010', 7, 6, 'Chocolate Fingers 28g', 'sup001', 0),
('P0011', 7, 6, 'Chocolate Fingers 40g', 'sup001', 0),
('P0012', 8, 11, 'Revello Chrispies 50g', 'sup001', 0),
('P0013', 8, 11, 'Revello Chrispies 100g', 'sup001', 0),
('P0014', 8, 12, 'Revello Cashew 100g', 'sup001', 0),
('P0015', 8, 12, 'Revello Cashew 50g', 'sup001', 0),
('P0016', 8, 13, 'Revello Hazel Nut 100g', 'sup001', 0),
('P0017', 8, 14, 'Revello Almond 100g', 'sup001', 0),
('P0018', 9, 15, 'Nik Nak 6g', 'sup001', 0),
('P0019', 9, 16, 'Chit Chat Vanilla 6g', 'sup001', 0),
('P0020', 2, 18, 'Toothbrush Double Pack', 'sup003', 0),
('P0021', 2, 18, 'Toothbrush Normal', 'sup003', 0),
('P0022', 3, 19, 'Bio Clean Green 200ml', 'sup003', 0),
('P0023', 3, 19, 'Bio Clean Green 500ml', 'sup003', 0),
('P0024', 3, 19, 'Bio Clean Green 700ml', 'sup003', 0),
('P0025', 3, 20, 'Bio Clean Aqua 200ml', 'sup003', 0),
('P0026', 3, 20, 'Bio Clean Aqua 500ml', 'sup003', 0);

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
(1, 'sup003', 'Ninja', 'Ninja Mosquito Killing Products'),
(2, 'sup003', 'Denta', 'Denta thooth brush'),
(3, 'sup003', 'Bio Clean', 'Bio Clean tile cleaning products'),
(4, 'sup001', 'Biscuits', ''),
(6, 'sup001', '4GB', ''),
(7, 'sup001', 'Coated Biscuits', ''),
(8, 'sup001', 'Revello', 'Chocolate'),
(9, 'sup001', 'wafers', 'Biscuit');

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
(20, 3, 'Bio Clean Aqua', 'frequent callings for gully bowser');

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
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` varchar(10) NOT NULL,
  `territory` varchar(10) NOT NULL,
  `route_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `territory`, `route_name`) VALUES
('RT001', '', 'WEWAGAMA UP TO GALGAMMULLA'),
('RT002', '', 'DAMBADENIYA TOWN'),
('RT003', '', 'MATIYAGANE UP TO MUTHUGALA'),
('RT004', '', '15TH MILE POST, HAVENEGEDARA, HOROMBAWA'),
('RT005', '', 'NARAMMALA, HAALWELLA, DAMPELESSA'),
('RT006', '', 'DAMBADENIYA, ATHURUWELA UP TO MAAHARAGAMA'),
('RT007', '', 'KATUGAMPOLA UP TO EDANDAWELA'),
('RT008', '', 'DAMBADENIYA UP TO ATHURUWELA, ATAMBE'),
('RT009', '', 'DANGOLLA UP TO MATIYAGANE'),
('RT010', '', 'BIHALPOLA UP TO KANUGALA'),
('RT011', '', 'RANMUTHUGALA UP TO MORAWALAPITIYA'),
('RT012', '', 'RATHMALEWATHTHA UP TO NARANGODA');

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
('RSH0001', 'RT001', 'TRT001', '2020-01-20', 'sup001', 'gg', 'rtscheStat', '', '', ''),
('RSH0002', '0', '', '2020-01-06', 'sup001', 'rr', 'rtscheStat', '', '', ''),
('RSH0003', '0', '', '0000-00-00', '', '', 'Pending', '', '', ''),
('RSH0004', 'RT001', '', '2020-01-02', 'sup001', 'gg', 'Pending', '', '', ''),
('RSH0005', 'RT008', '', '2020-01-14', 'sup001', 'gg', 'Pending', '', '', ''),
('RSH0006', 'RT008', '', '2020-01-14', 'sup001', 'gg', 'Pending', '', '', ''),
('RSH0007', 'RT003', '', '2020-01-03', 'sup001', '', 'Pending', 'VEH001', 'EMP001', 'EMP001'),
('RSH0008', 'RT004', '', '2020-01-08', 'sup001', '', 'Pending', '', '', ''),
('RSH0009', 'RT009', '', '2020-01-08', 'sup001', '', 'Pending', '', '', ''),
('RSH0010', 'RT001', '', '2020-01-04', 'sup001', '', 'Pending', '', '', '');

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
  `rtsche_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_route_sche_details`
--

INSERT INTO `tbl_route_sche_details` (`rtsche_index`, `rtsche_id`, `rtsche_route`, `rtsche_proid`, `rtsche_batch`, `rtsche_qty`) VALUES
(1, '', '', '', '', 0),
(2, '', '', 'P0007', 'BT001', 23),
(3, '', '', 'No data av', '', 0),
(4, '', '', 'P0007', 'BT001', 10),
(5, '', '', 'P0007', 'BT001', 10),
(6, 'RSH0006', '', 'P0007', 'BT001', 10),
(7, 'RSH0006', '', 'P0008', 'BT002', 20),
(8, 'RSH0007', '', 'P0007', 'BT001', 10),
(9, 'RSH0008', '', 'P0007', 'BT001', 10),
(10, 'RSH0009', '', 'P0007', 'BT001', 10),
(11, 'RSH0010', '', 'P0007', 'BT001', 10),
(12, 'RSH0010', '', 'P0008', 'BT003', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `sales_index` int(11) NOT NULL,
  `sales_id` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `sales_qty` varchar(10) NOT NULL,
  `sale_disrate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`sales_index`, `sales_id`, `item_id`, `sales_qty`, `sale_disrate`) VALUES
(1, 'SL0003', 'P0008', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order`
--

CREATE TABLE `tbl_sales_order` (
  `sales_id` varchar(10) NOT NULL,
  `sales_date` date NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `sales_total` int(10) NOT NULL,
  `sales_distotal` int(10) NOT NULL,
  `sales_paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_order`
--

INSERT INTO `tbl_sales_order` (`sales_id`, `sales_date`, `cus_id`, `sales_total`, `sales_distotal`, `sales_paid`) VALUES
('SL0001', '2020-01-03', 'CUS001', 0, 0, 0),
('SL0002', '2020-01-03', 'CUS001', 0, 0, 0),
('SL0003', '2020-01-03', 'CUS001', 0, 0, 0);

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
(2, 'BT001', 'P0007', 60, '40.00', '50.00'),
(6, 'BT002', 'P0008', 50, '30.00', '50.00'),
(8, 'BT003', 'P0008', 60, '99.99', '99.99'),
(9, 'BT009', 'P0013', 40, '50.00', '60.00');

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
  `sup_tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`sup_id`, `sup_name`, `sup_add`, `sup_tel`) VALUES
('sup001', 'Ceylon Biscuits Limited', 'P.O. Box 03, Makumbura Pannipitiya. Sri Lanka', 112749749),
('sup002', 'Maliban Biscuit Manufactories', 'P.O.Box - 389, Galle Road, Ratmalana.\r\nSri Lanka.', 115555000),
('sup003', 'Darley Butler & Co.Limited', 'No. 98 , Sri Sanagaraja Mawatha , Colombo 10.', 112421311),
('sup004', 'Nestle Lanka', '440 T. B. Jayah Mawatha, Colombo', 112699991);

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
(1, 'sup001', 'TRT001'),
(2, 'sup002', 'TRT001'),
(3, 'sup003', 'TRT001'),
(4, 'sup004', 'TRT001');

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
  `emp_pw` varchar(25) NOT NULL,
  `emp_type` varchar(11) NOT NULL,
  `emp_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`emp_id`, `emp_uname`, `emp_pw`, `emp_type`, `emp_status`) VALUES
('EMP001', 'admin', 'admin', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `emp_id` varchar(6) NOT NULL,
  `emp_fname` varchar(16) NOT NULL,
  `emp_mname` varchar(16) NOT NULL,
  `emp_lname` varchar(16) NOT NULL,
  `emp_tel` int(10) NOT NULL,
  `emp_add` varchar(50) NOT NULL,
  `emp_email` int(11) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_tel`, `emp_add`, `emp_email`, `emp_dob`, `emp_type`) VALUES
('EMP001', 'Ajith', '', 'Kumara', 374411228, 'Bihalpola', 0, '0000-00-00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type` int(5) NOT NULL,
  `user_typename` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('VEH001', 'GH-2323', 'Lorry', 'Small Lorry');

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
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

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
  MODIFY `grn_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_group_product`
--
ALTER TABLE `tbl_group_product`
  MODIFY `grp_prd_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_issue_stock`
--
ALTER TABLE `tbl_issue_stock`
  MODIFY `issue_stock_index` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_po_details`
--
ALTER TABLE `tbl_po_details`
  MODIFY `pur_detailsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  MODIFY `product_cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product_subcat`
--
ALTER TABLE `tbl_product_subcat`
  MODIFY `product_subcat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_route_sche_details`
--
ALTER TABLE `tbl_route_sche_details`
  MODIFY `rtsche_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `sales_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `batch_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_supplier_productgroup`
--
ALTER TABLE `tbl_supplier_productgroup`
  MODIFY `prdgroup_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier_territory`
--
ALTER TABLE `tbl_supplier_territory`
  MODIFY `sup_ter_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_territory`
--
ALTER TABLE `tbl_territory`
  MODIFY `trty_index` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_products`
--
ALTER TABLE `tbl_vehicle_products`
  MODIFY `veh_pro_index` int(11) NOT NULL AUTO_INCREMENT;

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
