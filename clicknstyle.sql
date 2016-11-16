-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 02:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clicknstyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `ann_id` int(11) NOT NULL AUTO_INCREMENT,
  `SalonID` int(11) NOT NULL,
  `ann_name` varchar(30) NOT NULL,
  `ann_description` varchar(100) NOT NULL,
  `ann_date` date NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `SalonID` int(11) NOT NULL,
  `cal_name` varchar(30) NOT NULL,
  `cal_description` varchar(50) NOT NULL,
  `cal_date` date NOT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`cal_id`, `SalonID`, `cal_name`, `cal_description`, `cal_date`) VALUES
(2, 3, 'Salon is Closed', 'Salon Is fucking closed ayaw pag buot', '2016-11-07'),
(3, 3, 'Salon is bankrupt', 'ayaw pag buot kay dili ka lord', '2016-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `custID` int(11) NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(255) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_dob` date NOT NULL,
  `cust_contact` varchar(15) NOT NULL,
  `cust_email` varchar(70) NOT NULL,
  `cust_uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custID`, `cust_fname`, `cust_lname`, `cust_dob`, `cust_contact`, `cust_email`, `cust_uname`, `password`, `status`) VALUES
(1, 'Really?', 'Im Tired Of This', '2016-08-16', '13243567', '123@gmail.com', '123', '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `paymentsubs`
--

CREATE TABLE IF NOT EXISTS `paymentsubs` (
  `orID` int(11) NOT NULL AUTO_INCREMENT,
  `salonID` int(11) NOT NULL,
  `subID` int(11) NOT NULL,
  `amountID` double(9,2) NOT NULL,
  `totalAmount` double(9,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `perservice`
--

CREATE TABLE IF NOT EXISTS `perservice` (
  `perserviceID` int(11) NOT NULL AUTO_INCREMENT,
  `staffID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  PRIMARY KEY (`perserviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `perservice`
--

INSERT INTO `perservice` (`perserviceID`, `staffID`, `serviceID`) VALUES
(1, 1, 4),
(3, 2, 4),
(10, 1, 5),
(11, 3, 5),
(12, 3, 4),
(13, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE IF NOT EXISTS `personnels` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `nickName` varchar(20) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `jobdescription` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - inactive | 1 - active',
  `salonID` int(11) NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`staffID`, `nickName`, `lastName`, `firstName`, `jobdescription`, `photo`, `dob`, `contactNo`, `status`, `salonID`) VALUES
(4, 'John Pinaka Gwapo', 'Berdida', 'John Louise', 'Salon Receptionist', 'john.jpg', '1992-01-06', '09192964425', 1, 3),
(7, 'Tisoy', 'Dong', 'Ding', 'Hair Stylist', 'mybinggu.jpg', '1999-09-18', '09239414642', 1, 3),
(8, 'Jezeryl', 'Manatad', 'Jezeryl', 'Barber', 'manatad1.png', '1995-10-03', '12345678910', 1, 3),
(9, 'Christine Gwapa', 'Glipa Jr.', 'Christine Mae ', 'Makeup Artist', 'glipa.png', '1992-10-04', '09232323223', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `SalonID` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `pro_brand` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `SalonID`, `pro_name`, `pro_brand`, `price`, `photo`) VALUES
(2, 3, 'Shampoo Container', 'Unknown', '200', 'CatCarrier.jpg'),
(3, 3, 'Shampoo Conditioner', 'Palmolive', '100', 'productssample.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE IF NOT EXISTS `promos` (
  `promoID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `promoDetails` varchar(255) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `expDate` date NOT NULL,
  `datePosted` date NOT NULL,
  `salonID` int(11) NOT NULL,
  PRIMARY KEY (`promoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promoID`, `Photo`, `Name`, `promoDetails`, `Price`, `expDate`, `datePosted`, `salonID`) VALUES
(9, 'promosample.jpg', '50% OFF', 'From All Services', '100', '2016-10-25', '2016-10-21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservationID` int(11) NOT NULL AUTO_INCREMENT,
  `custID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `timeReserved` time NOT NULL,
  `dateReserved` date NOT NULL,
  `staffID` int(11) NOT NULL,
  `salonID` int(11) NOT NULL,
  PRIMARY KEY (`reservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `custID`, `serviceID`, `timeReserved`, `dateReserved`, `staffID`, `salonID`) VALUES
(1, 1, 4, '03:00:00', '2016-09-12', 1, 1),
(2, 1, 4, '07:00:00', '2016-09-16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_reports`
--

CREATE TABLE IF NOT EXISTS `reservation_reports` (
  `reportsID` int(11) NOT NULL AUTO_INCREMENT,
  `SalonID` int(20) NOT NULL,
  `month` date NOT NULL,
  `year` date NOT NULL,
  `percentage` double NOT NULL,
  PRIMARY KEY (`reportsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

CREATE TABLE IF NOT EXISTS `salon` (
  `SalonID` int(11) NOT NULL AUTO_INCREMENT,
  `SalonName` varchar(225) NOT NULL,
  `ContactNum` varchar(20) NOT NULL,
  `SalonDetails` varchar(250) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `OwnerName` text NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`SalonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`SalonID`, `SalonName`, `ContactNum`, `SalonDetails`, `Latitude`, `Longitude`, `Address`, `Status`, `OwnerName`, `userid`) VALUES
(3, 'Salon De Rose', '09239414642', 'Ang Bobo mo naman :D \r\n', 10.3208, 123.907, 'Barrio Luz Cebu City', '1', 'John Louise Berdida', 11),
(4, 'Bridges Salon', '12345689', 'This is fucking awesome salon\r\n', 10.3242, 123.909, '9410, The Gallery, Pope John Paul II Ave, Cebu Cit', '1', 'Kim', 13);

-- --------------------------------------------------------

--
-- Table structure for table `salon_services`
--

CREATE TABLE IF NOT EXISTS `salon_services` (
  `serviceID` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `servicename` varchar(50) NOT NULL,
  `service_photo` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL COMMENT 'Count by minutes',
  `service_type` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `salonID` int(11) NOT NULL,
  `reportsID` int(11) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `salon_services`
--

INSERT INTO `salon_services` (`serviceID`, `description`, `servicename`, `service_photo`, `duration`, `service_type`, `price`, `salonID`, `reportsID`) VALUES
(8, 'A type of massage with mixing biga2x :D ', 'Linggam', 'salonservices.jpg', '1 Hour', 'Massage', 1000, 3, 0),
(9, 'With matching fucking blower . .', 'Hair Treatment', 'HairCut-Style-Best-Salon-in-Toronto-Jiva-Spa-Salon-Nutrion.jpg', '30 minutes', 'Hair', 1500, 3, 0),
(10, 'Just a wonderful Manicure for you guys :D ', 'Manicure', 'manicure.jpg', '30 minutes', 'Manicure', 200, 3, 0),
(11, 'Just A lovely pedicure', 'Pedicure', 'pedicure.jpg', '15 minutes', 'Pedicure', 100, 3, 0),
(12, 'Drawingan tana imong nawng hangtod sa mo gwapa :D HEHE ', 'Facial Mask', 'facial.jpg', '30 minutes', 'Facial', 500, 3, 0),
(13, 'Makeupan ang nawng hangtod mobati HAHA :D ', 'Makeup', 'makeup.jpeg', '1 Hour', 'Makeup', 200, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_users`
--

CREATE TABLE IF NOT EXISTS `staff_users` (
  `suID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salonID` int(11) NOT NULL,
  `personnel_id` int(11) NOT NULL,
  PRIMARY KEY (`suID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff_users`
--

INSERT INTO `staff_users` (`suID`, `userName`, `password`, `salonID`, `personnel_id`) VALUES
(3, 'johnberdida', 'f6fdffe48c908deb0f4c3bd36c032e72', 3, 4),
(4, 'manatad', 'f6fdffe48c908deb0f4c3bd36c032e72', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`subID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_details` varchar(255) NOT NULL,
  `menu_route` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL COMMENT '0 - Customer,Salon,Admin | 1 admin and salon admin | 2 -  super admin',
  `menu_status` varchar(255) NOT NULL COMMENT '0 for all | 1 admin and customer | 2 customer | 3 salon admin | 4 super admin',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `menu_details`, `menu_route`, `menu_icon`, `menu_status`) VALUES
(1, 'Account Management', 'Account', '', 'fa fa-cogs', '1'),
(2, 'Staff Management', 'Staffs', 'Staff_management', 'fa fa-users', '0'),
(3, 'Services Management', 'Services', 'Services_management', 'fa fa-wrench', '0'),
(4, 'Promos Management', 'Promos', 'Promos_management', 'fa fa-volume-down', '0'),
(5, 'Products Management', 'Products', 'Products_management', 'fa fa-tags', '0'),
(11, 'Announcement Management', 'Announcements', 'Announcement_management', 'fa fa-comments', '0'),
(13, 'Account Management', 'User Accounts', 'Account_management_admin', 'fa fa-cogs', '4'),
(14, 'Staff Management', 'Staffs', 'Staff_management_admin', 'fa fa-users', '4'),
(15, 'Services Management', 'Services', 'Services_management', 'fa fa-wrench', '4'),
(16, 'Promos Management', 'Promos', 'Promos_management', 'fa fa-volume-down', '4'),
(17, 'Products Management', 'Products', 'Products_management', 'fa fa-tags', '4'),
(18, 'Announcement Management', 'Announcements', 'Announcement_management', 'fa fa-comments', '4'),
(19, 'Calendar Management', 'Calendar', 'Calendar_management_admin', 'fa fa-calendar', '4'),
(20, 'Subscription Management', 'Subscription', 'Subscription_management_admin', 'fa fa-credit-card', '4'),
(21, 'Staff User Management', 'Staff User Account', 'Staff_management_user_salon', 'fa fa-users', '3'),
(22, 'Staff Management', 'Staffs', 'Staff_management_salon', 'fa fa-users', '3'),
(23, 'Promos Management', 'Promos', 'Promos_management_salon', 'fa fa-volume-down', '3'),
(24, 'Products Management', 'Products', 'Products_management_salon', 'fa fa-tags', '3'),
(25, 'Services Management', 'Services', 'Services_management_salon', 'fa fa-wrench', '3'),
(26, 'Announcement Management', 'Announcements', 'Announcement_management_salon', 'fa fa-comments', '3'),
(28, 'Reservation Management', 'Reservations', 'Reservation_management_salon', 'fa fa-tasks', '3'),
(29, 'Reservation Monitoring', 'Reservation Monitoring', 'Reservation_monitoring_salon', 'fa fa-flag-checkered', '3'),
(30, 'Reservation Management', 'Reservations', 'Reservation_management', 'fa fa-tasks', '0'),
(31, 'Subscription Management', 'Subscription', 'Subscription_management_salon', 'fa fa-credit-card', '3'),
(32, 'Calendar Management', 'Calendar', 'Calendar_management_salon', 'fa fa-calendar', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL COMMENT '0 - admin | 1 - Customer | 2- salon Admin',
  `created_at` date NOT NULL,
  `user_status` int(11) NOT NULL COMMENT '0 - inactive | 1 - active',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `user_image`, `firstname`, `lastname`, `address`, `usertype`, `created_at`, `user_status`) VALUES
(1, 'jLKisni', 'f6fdffe48c908deb0f4c3bd36c032e72', 'jLKisni@yahoo.com', 'boy1.jpg', 'John Louise', 'Berdida', 'Alaska Mambaling Cebu City', 1, '2016-10-11', 1),
(5, 'glipa', 'f6fdffe48c908deb0f4c3bd36c032e72', 'glipa@yahoo.com', 'glipa.png', 'Christine', 'Glipa', 'Guadalupe Sitio Kamunggay St. Cebu City', 1, '2016-10-11', 1),
(6, 'manatad', 'f6fdffe48c908deb0f4c3bd36c032e72', 'manatad@yahoo.com', 'user.png', 'Jezeryl', 'Manatad', 'Oprah', 1, '2016-10-11', 1),
(11, 'Boom', 'f6fdffe48c908deb0f4c3bd36c032e72', 'boom@yahoo.com', '1465690249_google_plus.ico', '', '', 'Barrio Luz Cebu City', 2, '2016-10-16', 1),
(12, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin@yahoo.com', 'avatar04.png', 'admin', 'admin', 'Administrator', 0, '2016-10-16', 1),
(13, 'bridges', 'f6fdffe48c908deb0f4c3bd36c032e72', 'sample@yahoo.com', 'user.png', '', '', '9410, The Gallery, Pope John Paul II Ave, Cebu City, 6000 Cebu', 2, '2016-11-06', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
