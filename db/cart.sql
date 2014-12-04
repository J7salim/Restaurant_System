-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2013 at 02:51 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_number` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `order_amount` decimal(6,2) NOT NULL,
  `order_remarks` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `id_products` (`id_products`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(40) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_products` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_products`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `name`, `description`, `price`) VALUES
(4, 'Cream', 'Tender chicken pieces in creamy soup base', '6.99'),
(5, 'Mixed', 'Fresh from the garden, in light-clear soup', '7.99'),
(6, 'Fetush', 'Romaine lettuce, tomato, cucumber & white radish topped with crunchy toasted Lebanese bread & dressed with lemon juice, olive oil & balsimic vinegar', '9.99'),
(7, 'Arabic', 'The classic green salad with the hint of Sumak herb', '13.99'),
(8, 'Tarbush', 'Chickpeas with tahina sauce (sesame paste), garlic & parsley topped with olive oil. A strong-flavoured dip & the House signature dish', '7.99'),
(9, 'Baba', 'A dip of grilled eggplant & tahina sauce, generously drenched in olive oil', '15.99'),
(10, 'Warak', 'A mixture of rice, tomatoes, onions and herbs stuffed in pickled wine leaves', '16.99'),
(11, 'Falafel', 'Deep-fried patties made of a fine-blended of chickpeas with onion, garlic, coriander, cumin & flour', '17.99'),
(12, 'Shish', 'Minced tender lamb, marinated and grilled, served on the top of white rice', '14.99'),
(13, 'Biryani', 'Biryani rice served with succulent lamb chunks or with a half-baked chicken', '18.99'),
(14, 'Bazilla', 'Rice cooked with green peas & chicken', '8.99'),
(15, 'Fried', 'Steamed Basmati rice served with fried pomfret', '9.99'),
(16, 'Mahalabia', 'Milk cream pudding garnished with chopped pistachio', '10.99'),
(17, 'Ma''moul', 'A Middle Eastern type of cookies with pistachio fillings', '16.99'),
(18, 'Sparkling', 'Apple La Vim - Vimto, apple juice & 7 Up 	Lemonavim - Vimto, lime juice & 7 Up 	Frezzy Miscela - Lime juice, sugar syrup & soda 	Lemon Na''na'' - Lemonade with fresh mint', '4.99'),
(19, 'Hot', 'Arabic Coffee, Brewed Coffee, Espresso, Mocha, Cappucino, Cafe Latte, Arabic Tea, Earl Grey, Green Tea & Hot Chocolate', '5.99'),
(20, 'Cool', 'Lemonade, Lemon Na''na'', Vimto/Mulberry Juice, Mango Lassi, Yogurt Drink, Ice Lemon Tea & Mineral Water', '8.99'),
(21, 'Fresh', 'Orange, Watermelon, Honeydew, Carrot, Apple, Mango & Starfruit', '6.99'),
(22, 'Soft', '7up, Mirinda Orange, Pepsi, Pepsi diet', '8.99');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
