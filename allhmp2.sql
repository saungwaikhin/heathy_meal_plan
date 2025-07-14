-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2019 at 05:30 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hmp`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `breakfast_gain`
--
CREATE TABLE IF NOT EXISTS `breakfast_gain` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `breakfast_loss`
--
CREATE TABLE IF NOT EXISTS `breakfast_loss` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `breakfast_normal`
--
CREATE TABLE IF NOT EXISTS `breakfast_normal` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `choosepackage`
--

CREATE TABLE IF NOT EXISTS `choosepackage` (
  `choose_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `package_result` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`choose_id`),
  KEY `package_id` (`package_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `choosepackage`
--

INSERT INTO `choosepackage` (`choose_id`, `package_id`, `user_id`, `start_date`, `finish_date`, `package_result`) VALUES
(1, 1, 1, '2019-09-20', '2019-09-27', NULL),
(2, 2, 2, '2019-09-27', '2019-10-11', NULL),
(3, 3, 3, '2019-09-30', '2019-10-15', NULL),
(4, 3, 4, '2019-09-27', '2019-10-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dailyfoodplan`
--

CREATE TABLE IF NOT EXISTS `dailyfoodplan` (
  `daily_id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) DEFAULT NULL,
  `choose_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `meal_id` int(11) NOT NULL,
  PRIMARY KEY (`daily_id`),
  KEY `choose_id` (`choose_id`),
  KEY `meal_id` (`meal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dailyfoodplan`
--

INSERT INTO `dailyfoodplan` (`daily_id`, `days`, `choose_id`, `status`, `meal_id`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 1, 1),
(3, 1, 1, 1, 1),
(4, 1, 1, 1, 1),
(5, 2, 1, 1, 1),
(6, 2, 1, 1, 1),
(7, 2, 1, 1, 1),
(8, 2, 1, 1, 1),
(9, 8, 4, 0, 135),
(10, 8, 4, 0, 300),
(11, 8, 4, 0, 25),
(12, 8, 4, 0, 28);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dinner_gain`
--
CREATE TABLE IF NOT EXISTS `dinner_gain` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `dinner_loss`
--
CREATE TABLE IF NOT EXISTS `dinner_loss` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `dinner_normal`
--
CREATE TABLE IF NOT EXISTS `dinner_normal` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `foodcategory`
--

CREATE TABLE IF NOT EXISTS `foodcategory` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `foodcategory`
--

INSERT INTO `foodcategory` (`cat_id`, `cat_name`) VALUES
(1, 'meat'),
(2, 'vegetable'),
(3, 'fruits'),
(4, 'drink'),
(5, 'dairy'),
(6, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE IF NOT EXISTS `foodlist` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `food_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`food_id`, `food_name`, `cat_id`, `food_desc`) VALUES
(1, 'chicken', 1, 'chicken is 239 Calories per 100 g'),
(2, 'turkey', 1, 'turkey is 188.8 Calories per 100 g'),
(3, 'pork', 1, 'pork is 242.1 Calories per 100 g'),
(4, 'beef', 1, 'beef is 250.5 Calories per 100 g'),
(5, 'venison', 1, 'venison is 150 Calories per 100 g'),
(6, 'duck', 1, 'duck is 377 Calories per 100 g'),
(7, 'pheasant', 1, 'pheasant is 151 Calories per 100 g'),
(8, 'egg', 1, 'egg is 155.1 Calories per 100 g'),
(9, 'rabbit', 1, 'rabbit is 175 Calories per 100 g'),
(10, 'mutton', 1, 'mutton is 294 Calories per 100 g'),
(11, 'fish', 1, 'fish is 109 Calories per 178 g'),
(12, 'crab', 1, 'crab is 65 Calories per 100 g'),
(13, 'oysters', 1, 'oysters is 198.8 Calories per 100 g'),
(14, 'prawn', 1, 'prawn is 120 Calories per 100 g'),
(15, 'octopus', 1, 'octopus is 62 Calories per 100 g'),
(16, 'clam', 1, 'clam is 67 Calories per 100 g'),
(17, 'sausages', 1, 'susages is 300.9 Calories per 100 g'),
(18, 'scallop', 1, 'scallop is 120 Calories per 100 g'),
(19, 'mussels', 1, 'mussels is 172.1 Calories per 100 g'),
(20, 'lobster', 1, 'lobster is 160 Calories per 100 g'),
(21, 'apple', 3, 'Apple is 52 Calories per 100 g'),
(22, 'mango', 3, 'Mango is 60 Calories per 100 g'),
(23, 'avocado', 3, 'Avacado is 160 Calories per 100 g'),
(24, 'banana', 3, 'Banana is 89 Calories per 100 g'),
(25, 'grape', 3, 'Grape is 67 Calories per 100 g'),
(26, 'kiwi', 3, 'Kiwi is 61 Calories per 100 g'),
(27, 'lemon', 3, 'Lemon is 29 Calories per 100 g'),
(28, 'peach', 3, 'Peach is 39 Calories per 100 g'),
(29, 'strawberry', 3, 'Strawberry is 33 Calories per 100 g'),
(30, 'watermelon', 3, 'Watermelon is 30 Calories per 100 g'),
(31, 'pineapple', 3, 'Pineapple is 50 Calories per 100 g'),
(32, 'dragon fruit', 3, 'Dragon fruit is 60 Calories per 100 g'),
(33, 'papaya', 3, 'Papaya is 43 Calories per 100 g'),
(34, 'guava', 3, 'Guava is 68 Calories per 100 g'),
(35, 'pomegranate', 3, 'Pomegranate is 83 Calories per 100 g'),
(36, 'persimmon', 3, 'Persimmon is 127 Calories per 100 g'),
(37, 'muskmelon', 3, 'Muskmelon is 34 Calories per 100 g'),
(38, 'jackfruit', 3, 'Jackfruit is 94.89 Calories per 100 g'),
(39, 'pear', 3, 'Pear is 57 Calories per 100 g'),
(40, 'plum', 3, 'Plum is 45.89 Calories per 100 g'),
(41, 'orange', 3, 'Orange is 47 Calories per 100 g'),
(42, 'custard apple', 3, 'Custard apple is 94 Calories per 100 g'),
(43, 'passion fruit', 3, 'Passion fruit is 97 Calories per 100 g'),
(44, 'rambutan', 3, 'Rambutan is 75 Calories per 100 g'),
(45, 'purple mangosteen', 3, 'Purple mangosteenambutan is 63 Calories per 100 g'),
(46, 'durian', 3, 'Durian is 150 Calories per 100 g'),
(47, 'apple_juice', 4, 'Apple juice is 45 Calories per 100 g'),
(48, 'avocardo_juice', 4, 'Avocardo juice is 160 Calories per 100 g'),
(49, 'coconut_juice', 4, 'Coconut juice is 354 Calories per 100 g'),
(50, 'coffee', 4, 'Coffee is 1 Calories per 100 g'),
(51, 'dragonfruit_juice', 4, 'Dragonfruit juice is 51 Calories per 100 g'),
(52, 'Grapes_juice', 4, 'Grapes juice is 55 Calories per 100 g'),
(53, 'honey', 4, 'Honey is 304 Calories per 100 g'),
(54, 'kiwi_juice', 4, 'Kiwi juice is 61 Calories per 100 g'),
(55, 'lime_juice', 4, 'Lime juice is 25 Calories per 100 g'),
(56, 'mango_juice', 4, 'Mango juice is 58 Calories per 100 g'),
(57, 'orange_juice', 4, 'Orange juice is 45 Calories per 100 g'),
(58, 'Pineapple_juice', 4, 'Pineapple juice is 41 Calories per 100 g'),
(59, 'pomegranate_juice', 4, 'pomegranate juice is 68 Calories per 100 g'),
(60, 'pumpkin_juice', 4, 'Pumpkin juice is 39 Calories per 100 g'),
(61, 'strawberry_juice', 4, 'Strawberry juice is 38 Calories per 100 g'),
(62, 'tea', 4, 'Tea is 10 Calories per 100 g'),
(63, 'cranberry_juice', 4, 'Cranberry juice is 46 Calories per 100 g'),
(64, 'papaya_juice', 4, 'Papaya juice is 43 Calories per 100 g'),
(65, 'watermelon_juice', 4, 'Watermelon juice is 74 Calories per 100 g'),
(66, 'cucumber_juice', 4, 'Cucumber juice is 15 Calories per 100 g'),
(67, 'Cauliflower', 2, 'Cauliflower is 25 Calories per 100g.'),
(68, 'Cucumber', 2, 'Cucumber is 16 Calories per 100g.'),
(69, 'Mushrooms', 2, 'Green Beans is 22 Calorie per 100g.'),
(70, 'Tomato', 2, 'Tomato is 18 Calories per 100g.'),
(71, 'Cabbage', 2, 'Cabbage is 25 Calories per 100g.'),
(72, 'Asparagus', 2, 'Asparagus is 20 Calories per 100g.'),
(73, 'Brinjal', 2, 'Brinjal is 25 Calories per 100g.'),
(74, 'Broccoli', 2, 'Broccoli is 34 Calories per 100g.'),
(75, 'Capsicums', 2, 'Capsicums is 40 Calories per 100g.'),
(76, 'Chokos', 2, 'Chokos is 19 Calories per 100g.'),
(77, 'Cilantro', 2, 'Cilantro is 23 Calories per 100g.'),
(78, 'Ginger', 2, 'Ginger is 80 Calories per 100g.'),
(79, 'Leeks', 2, 'Leeks is 61 Calories per 100g.'),
(80, 'Lettuce', 2, 'Lettuce is 15 Calories per 100g.'),
(81, 'Mazie', 2, 'Mazie is 177 Calories per 100g.'),
(82, 'Okra', 2, 'Okra is 33 Calories per 100g.'),
(83, 'Peanut', 2, 'Peanut is 567 Calories per 100g.'),
(84, 'Potato', 2, 'Potato is 77 Calories per 100g.'),
(85, 'Radish', 2, 'Radish is 16 Calories per 100g.'),
(86, 'SweetPotato', 2, 'SweetPotato is 86 Calories per 100g.'),
(87, 'Taro', 2, 'Taro is 142 Calories per 100g.'),
(88, 'Turnips', 2, 'Turnips is 28 Calories per 100g.'),
(89, 'Pumpkin', 2, 'Pumpkin is 26 Calories per 100g.'),
(90, 'Carrot', 2, 'Carrot is 41.3 Calories per 100g.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lunch_gain`
--
CREATE TABLE IF NOT EXISTS `lunch_gain` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `lunch_loss`
--
CREATE TABLE IF NOT EXISTS `lunch_loss` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `lunch_normal`
--
CREATE TABLE IF NOT EXISTS `lunch_normal` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

CREATE TABLE IF NOT EXISTS `mealplan` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_type` varchar(10) DEFAULT NULL,
  `meal_time` int(11) DEFAULT NULL,
  `food_id` int(11) NOT NULL,
  `meal_desc` varchar(255) DEFAULT NULL,
  `meal_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`meal_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=375 ;

--
-- Dumping data for table `mealplan`
--

INSERT INTO `mealplan` (`meal_id`, `meal_type`, `meal_time`, `food_id`, `meal_desc`, `meal_image`) VALUES
(1, 'normal', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(2, 'loss', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(3, 'gain', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(4, 'normal', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(5, 'gain', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(6, 'loss', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(7, 'normal', 3, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(8, 'loss', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(9, 'gain', 3, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(10, 'normal', 3, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(11, 'gain', 3, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(12, 'loss', 3, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(13, 'normal', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(14, 'loss', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(15, 'gain', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(16, 'normal', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(17, 'gain', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(18, 'loss', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(19, 'normal', 3, 2, 'Can eat with biscuit and donut.', 'apple.jpg'),
(20, 'normal', 3, 3, 'Can eat with biscuit and donut.', 'apple.jpg'),
(21, 'normal', 3, 4, 'Can eat with biscuit and donut.', 'apple.jpg'),
(22, 'normal', 3, 5, 'Can eat with biscuit and donut.', 'apple.jpg'),
(23, 'normal', 3, 1, 'Can eat with biscuit and donut.', 'apple.jpg'),
(24, 'normal', 3, 2, 'Can eat with biscuit and donut.', 'apple.jpg'),
(25, 'normal', 3, 3, 'Can eat with biscuit and donut.', 'apple.jpg'),
(26, 'normal', 3, 4, 'Can eat with biscuit and donut.', 'apple.jpg'),
(27, 'normal', 3, 5, 'Can eat with biscuit and donut.', 'apple.jpg'),
(28, 'normal', 4, 6, 'Can eat with donut.', 'apple.jpg'),
(29, 'normal', 4, 7, 'Can eat with donut.', 'apple.jpg'),
(30, 'normal', 4, 8, 'Can eat with donut.', 'apple.jpg'),
(31, 'normal', 4, 9, 'Can eat with donut.', 'apple.jpg'),
(32, 'normal', 4, 10, 'Can eat with donut.', 'apple.jpg'),
(33, 'gain', 3, 11, 'Can eat with pizza and cookie.', 'apple.jpg'),
(34, 'gain', 3, 12, 'Can eat with pizza and cookie.', 'apple.jpg'),
(35, 'gain', 3, 13, 'Can eat with pizza and cookie.', 'apple.jpg'),
(36, 'gain', 3, 14, 'Can eat with pizza and cookie.', 'apple.jpg'),
(37, 'gain', 3, 15, 'Can eat with pizza and cookie.', 'apple.jpg'),
(38, 'gain', 4, 16, 'Can eat with cake.', 'apple.jpg'),
(39, 'gain', 4, 17, 'Can eat with cake.', 'apple.jpg'),
(40, 'gain', 4, 18, 'Can eat with cake.', 'apple.jpg'),
(41, 'gain', 4, 19, 'Can eat with cake.', 'apple.jpg'),
(42, 'gain', 4, 20, 'Can eat with cake.', 'apple.jpg'),
(43, 'loss', 3, 1, 'Can eat with cookie.', 'apple.jpg'),
(44, 'loss', 3, 2, 'Can eat with cookie.', 'apple.jpg'),
(45, 'loss', 3, 3, 'Can eat with cookie.', 'apple.jpg'),
(46, 'loss', 3, 4, 'Can eat with cookie.', 'apple.jpg'),
(47, 'loss', 3, 5, 'Can eat with cookie.', 'apple.jpg'),
(48, 'gain', 1, 8, 'Can eat with bread', 'apple.jpg'),
(49, 'gain', 1, 17, 'Can eat with bread', 'apple.jpg'),
(50, 'gain', 2, 1, 'Can eat with rice', 'apple.jpg'),
(51, 'gain', 2, 2, 'Can eat with rice', 'apple.jpg'),
(52, 'gain', 2, 3, 'Can eat with rice', 'apple.jpg'),
(53, 'gain', 2, 4, 'Can eat with rice', 'apple.jpg'),
(54, 'gain', 2, 5, 'Can eat with rice', 'apple.jpg'),
(55, 'gain', 2, 6, 'Can eat with rice', 'apple.jpg'),
(56, 'gain', 2, 7, 'Can eat with rice', 'apple.jpg'),
(57, 'gain', 2, 8, 'Can eat with rice', 'apple.jpg'),
(58, 'gain', 2, 9, 'Can eat with rice', 'apple.jpg'),
(59, 'gain', 2, 10, 'Can eat with rice', 'apple.jpg'),
(60, 'gain', 2, 11, 'Can eat with rice', 'apple.jpg'),
(61, 'gain', 2, 12, 'Can eat with rice', 'apple.jpg'),
(62, 'gain', 2, 13, 'Can eat with rice', 'apple.jpg'),
(63, 'gain', 2, 14, 'Can eat with rice', 'apple.jpg'),
(64, 'gain', 2, 15, 'Can eat with rice', 'apple.jpg'),
(65, 'gain', 2, 16, 'Can eat with rice', 'apple.jpg'),
(66, 'gain', 2, 17, 'Can eat with rice', 'apple.jpg'),
(67, 'gain', 2, 18, 'Can eat with rice', 'apple.jpg'),
(68, 'gain', 2, 19, 'Can eat with rice', 'apple.jpg'),
(69, 'gain', 2, 20, 'Can eat with rice', 'apple.jpg'),
(70, 'gain', 4, 11, 'Can eat with rice', 'apple.jpg'),
(71, 'gain', 4, 12, 'Can eat with rice', 'apple.jpg'),
(72, 'gain', 4, 13, 'Can eat with rice', 'apple.jpg'),
(73, 'gain', 4, 14, 'Can eat with rice', 'apple.jpg'),
(74, 'gain', 4, 15, 'Can eat with rice', 'apple.jpg'),
(75, 'gain', 4, 16, 'Can eat with rice', 'apple.jpg'),
(76, 'gain', 4, 17, 'Can eat with rice', 'apple.jpg'),
(77, 'gain', 4, 18, 'Can eat with rice', 'apple.jpg'),
(78, 'gain', 4, 19, 'Can eat with rice', 'apple.jpg'),
(79, 'gain', 4, 20, 'Can eat with rice', 'apple.jpg'),
(80, 'normal', 1, 8, 'Can eat with bread', 'apple.jpg'),
(81, 'normal', 1, 17, 'Can eat with bread', 'apple.jpg'),
(82, 'normal', 2, 1, 'Can eat with rice', 'apple.jpg'),
(83, 'normal', 2, 2, 'Can eat with rice', 'apple.jpg'),
(84, 'normal', 2, 3, 'Can eat with rice', 'apple.jpg'),
(85, 'normal', 2, 4, 'Can eat with rice', 'apple.jpg'),
(86, 'normal', 2, 17, 'Can eat with rice', 'apple.jpg'),
(87, 'normal', 4, 16, 'Can eat with rice', 'apple.jpg'),
(88, 'normal', 4, 12, 'Can eat with rice', 'apple.jpg'),
(89, 'normal', 4, 18, 'Can eat with rice', 'apple.jpg'),
(90, 'normal', 4, 19, 'Can eat with rice', 'apple.jpg'),
(91, 'normal', 4, 20, 'HCan eat with rice', 'apple.jpg'),
(92, 'loss', 1, 8, 'Should eat this boil', 'apple.jpg'),
(93, 'loss', 2, 1, 'Should eat this boil', 'apple.jpg'),
(94, 'loss', 2, 11, 'Should eat this boil', 'apple.jpg'),
(95, 'loss', 2, 12, 'Should eat this boil', 'apple.jpg'),
(96, 'loss', 2, 13, 'Should eat this boil', 'apple.jpg'),
(97, 'loss', 2, 14, 'Should eat this boil', 'apple.jpg'),
(98, 'loss', 2, 15, 'Should eat this boil', 'apple.jpg'),
(99, 'normal', 1, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(100, 'normal', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(101, 'normal', 3, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(102, 'normal', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(103, 'loss', 1, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(104, 'loss', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(105, 'loss', 3, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(106, 'loss', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(107, 'gain', 1, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(108, 'gain', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(109, 'gain', 3, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(110, 'gain', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(111, 'normal', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(112, 'normal', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(113, 'normal', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(114, 'normal', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(115, 'loss', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(116, 'loss', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(117, 'loss', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(118, 'loss', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(119, 'gain', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(120, 'gain', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(121, 'gain', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(122, 'gain', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(123, 'normal', 1, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(124, 'normal', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(125, 'normal', 3, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(126, 'normal', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(127, 'loss', 1, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(128, 'loss', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(129, 'loss', 3, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(130, 'loss', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(131, 'gain', 1, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(132, 'gain', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(133, 'gain', 3, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(134, 'gain', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(135, 'normal', 1, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(136, 'normal', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(137, 'normal', 3, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(138, 'normal', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(139, 'loss', 1, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(140, 'loss', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(141, 'loss', 3, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(142, 'loss', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(143, 'gain', 1, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(144, 'gain', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(145, 'gain', 3, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(146, 'gain', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(147, 'normal', 1, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(148, 'normal', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(149, 'normal', 3, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(150, 'normal', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(151, 'loss', 1, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(152, 'loss', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(153, 'loss', 3, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(154, 'loss', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(155, 'gain', 1, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(156, 'gain', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(157, 'gain', 3, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(158, 'gain', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(159, 'normal', 1, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(160, 'normal', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(161, 'normal', 3, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(162, 'normal', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(163, 'loss', 1, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(164, 'loss', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(165, 'loss', 3, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(166, 'loss', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(167, 'gain', 1, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(168, 'gain', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(169, 'gain', 3, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(170, 'gain', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(171, 'normal', 1, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(172, 'normal', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(173, 'normal', 3, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(174, 'normal', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(175, 'loss', 1, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(176, 'loss', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(177, 'loss', 3, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(178, 'loss', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(179, 'gain', 1, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(180, 'gain', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(181, 'gain', 3, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(182, 'gain', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(183, 'normal', 1, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(184, 'normal', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(185, 'normal', 3, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(186, 'normal', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(187, 'loss', 1, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(188, 'loss', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(189, 'loss', 3, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(190, 'loss', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(191, 'gain', 1, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(192, 'gain', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(193, 'gain', 3, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(194, 'gain', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(195, 'normal', 1, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(196, 'normal', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(197, 'normal', 3, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(198, 'normal', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(199, 'loss', 1, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(200, 'loss', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(201, 'loss', 3, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(202, 'loss', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(203, 'gain', 1, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(204, 'gain', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(205, 'gain', 3, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(206, 'gain', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(207, 'normal', 1, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(208, 'normal', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(209, 'normal', 3, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(210, 'normal', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(211, 'loss', 1, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(212, 'loss', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(213, 'loss', 3, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(214, 'loss', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(215, 'gain', 1, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(216, 'gain', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(217, 'gain', 3, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(218, 'gain', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(219, 'normal', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(220, 'normal', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(221, 'loss', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(222, 'loss', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(223, 'gain', 2, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(224, 'gain', 4, 1, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(225, 'normal', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(226, 'normal', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(227, 'normal', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(228, 'normal', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(229, 'loss', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(230, 'loss', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(231, 'loss', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(232, 'loss', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(233, 'gain', 1, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(234, 'gain', 2, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(235, 'gain', 3, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(236, 'gain', 4, 2, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(237, 'normal', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(238, 'normal', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(239, 'loss', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(240, 'loss', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(241, 'gain', 2, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(242, 'gain', 4, 3, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(243, 'normal', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(244, 'normal', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(245, 'loss', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(246, 'loss', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(247, 'gain', 2, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(248, 'gain', 4, 4, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(249, 'normal', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(250, 'normal', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(251, 'loss', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(252, 'loss', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(253, 'gain', 2, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(254, 'gain', 4, 5, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(255, 'normal', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(256, 'normal', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(257, 'loss', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(258, 'loss', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(259, 'gain', 2, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(260, 'gain', 4, 6, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(261, 'normal', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(262, 'normal', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(263, 'loss', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(264, 'loss', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(265, 'gain', 2, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(266, 'gain', 4, 7, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(267, 'normal', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(268, 'normal', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(269, 'loss', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(270, 'loss', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(271, 'gain', 2, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(272, 'gain', 4, 8, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(273, 'normal', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(274, 'normal', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(275, 'loss', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(276, 'loss', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(277, 'gain', 2, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(278, 'gain', 4, 9, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(279, 'normal', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(280, 'normal', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(281, 'loss', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(282, 'loss', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(283, 'gain', 2, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(284, 'gain', 4, 10, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(285, 'normal', 2, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(286, 'normal', 4, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(287, 'loss', 2, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(288, 'loss', 4, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(289, 'gain', 2, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(290, 'gain', 4, 11, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(291, 'normal', 2, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(292, 'normal', 3, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(293, 'normal', 4, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(294, 'loss', 2, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(295, 'loss', 3, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(296, 'loss', 4, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(297, 'gain', 2, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(298, 'gain', 3, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(299, 'gain', 4, 12, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(300, 'normal', 2, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(301, 'normal', 4, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(302, 'loss', 2, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(303, 'loss', 4, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(304, 'gain', 2, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(305, 'gain', 4, 13, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(306, 'normal', 2, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(307, 'normal', 4, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(308, 'loss', 2, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(309, 'loss', 4, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(310, 'gain', 2, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(311, 'gain', 4, 14, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(312, 'normal', 2, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(313, 'normal', 4, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(314, 'loss', 2, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(315, 'loss', 4, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(316, 'gain', 2, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(317, 'gain', 4, 15, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(318, 'normal', 2, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(319, 'normal', 4, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(320, 'loss', 2, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(321, 'loss', 4, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(322, 'gain', 2, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(323, 'gain', 4, 16, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(324, 'normal', 2, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(325, 'normal', 3, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(326, 'loss', 2, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(327, 'loss', 3, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(328, 'loss', 4, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(329, 'gain', 2, 17, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(330, 'normal', 2, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(331, 'normal', 3, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(332, 'loss', 2, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(333, 'loss', 3, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(334, 'loss', 4, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(335, 'gain', 2, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(336, 'gain', 3, 18, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(337, 'normal', 2, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(338, 'normal', 4, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(339, 'loss', 2, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(340, 'loss', 4, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(341, 'gain', 2, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(342, 'gain', 4, 19, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(343, 'normal', 2, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(344, 'normal', 3, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(345, 'normal', 4, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(346, 'loss', 2, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(347, 'loss', 3, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(348, 'loss', 4, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(349, 'gain', 2, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(350, 'gain', 3, 20, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(351, 'normal', 2, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(352, 'normal', 4, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(353, 'loss', 2, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(354, 'loss', 4, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(355, 'gain', 2, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(356, 'gain', 4, 21, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(357, 'normal', 2, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(358, 'normal', 4, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(359, 'loss', 2, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(360, 'loss', 4, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(361, 'gain', 2, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(362, 'gain', 4, 22, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(363, 'normal', 2, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(364, 'normal', 4, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(365, 'loss', 2, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(366, 'loss', 4, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(367, 'gain', 2, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(368, 'gain', 4, 23, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(369, 'normal', 2, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(370, 'normal', 4, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(371, 'loss', 2, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(372, 'loss', 4, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(373, 'gain', 2, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg'),
(374, 'gain', 4, 24, 'Have 4 fruits total amount of 200 calories.', 'apple.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) DEFAULT NULL,
  `package_type` int(11) DEFAULT NULL,
  `package_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_type`, `package_desc`) VALUES
(1, '7days package', 7, 'One Week package is try for diet/weight gain'),
(2, '10days package', 10, 'Ten days package is 3 routine for a month'),
(3, '14days package', 14, 'Two Week package is for normal diet/weight gain'),
(4, 'One Month package', 30, 'One month package is for long term diet/weight gain');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `height_feet` int(11) DEFAULT NULL,
  `height_inches` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `height_feet`, `height_inches`, `weight`, `bmi`, `user_id`, `updated_date`) VALUES
(1, 5, 3, 140, 26.8, 1, '2019-07-23'),
(2, 5, 3, 139, 26.7, 1, '2019-07-25'),
(3, 5, 3, 138, 26.6, 1, '2019-07-26'),
(4, 5, 3, 135, 26.3, 1, '2019-07-29'),
(5, 5, 3, 134, 26.1, 1, '2019-07-31'),
(6, 5, 3, 133, 26, 1, '2019-08-02'),
(7, 5, 3, 133, 26, 1, '2019-08-05'),
(8, 5, 3, 130, 25.8, 1, '2019-08-06'),
(9, 5, 4, 128, 25.6, 1, '2019-08-08'),
(10, 5, 4, 125, 25, 1, '2019-08-13'),
(11, 5, 8, 140, 27.3, 2, '2019-03-16'),
(12, 5, 8, 138, 27, 2, '2019-03-17'),
(13, 5, 8, 137, 26.8, 2, '2019-03-18'),
(14, 5, 8, 134, 26.2, 2, '2019-03-20'),
(15, 5, 8, 132, 25.8, 2, '2019-03-25'),
(16, 5, 5, 110, 18.3, 5, '2019-09-20'),
(17, 5, 5, 112, 18.6, 5, '2019-09-21'),
(18, 5, 5, 115, 19.1, 5, '2019-09-23'),
(19, 5, 5, 120, 20, 5, '2019-09-24'),
(20, 5, 5, 120, 20, 5, '2019-09-25'),
(21, 4, 11, 137, 27.7, 10, '2019-08-19'),
(22, 4, 11, 135, 27.3, 10, '2019-08-20'),
(23, 4, 11, 133, 26.9, 10, '2019-08-21'),
(24, 4, 11, 132, 26.7, 10, '2019-08-22'),
(25, 4, 11, 130, 26.3, 10, '2019-08-23'),
(26, 5, 6, 180, 29.1, 11, '2019-07-23'),
(27, 5, 6, 178, 28.7, 11, '2019-07-24'),
(28, 5, 6, 175, 28.2, 11, '2019-07-25'),
(29, 5, 6, 172, 27.8, 11, '2019-07-26'),
(30, 5, 6, 170, 26.1, 11, '2019-07-27'),
(31, 5, 6, 168, 26, 11, '2019-07-28'),
(32, 5, 6, 166, 26.8, 11, '2019-07-29'),
(33, 5, 6, 163, 26.3, 11, '2019-07-30'),
(34, 5, 6, 160, 25.8, 11, '2019-03-02'),
(35, 5, 6, 158, 25.7, 11, '2019-08-03'),
(36, 5, 5, 168, 28, 50, '2019-07-06'),
(37, 5, 5, 165, 27.5, 50, '2019-07-13'),
(38, 5, 5, 162, 27, 50, '2019-07-20'),
(39, 5, 5, 160, 26.6, 50, '2019-07-27'),
(40, 5, 5, 158, 26.3, 50, '2019-08-03'),
(41, 5, 5, 155, 25.8, 50, '2019-08-10'),
(42, 5, 5, 153, 25.5, 50, '2019-08-17'),
(43, 5, 5, 150, 25, 50, '2019-08-24'),
(44, 5, 5, 148, 24.6, 50, '2019-08-31'),
(45, 5, 5, 145, 24.1, 50, '2019-09-07'),
(46, 4, 8, 70, 15.7, 51, '2019-08-04'),
(47, 4, 8, 75, 16.8, 51, '2019-08-11'),
(48, 4, 8, 80, 17.9, 51, '2019-08-18'),
(49, 4, 8, 83, 18.6, 51, '2019-08-25'),
(50, 4, 8, 85, 19.1, 51, '2019-09-01'),
(51, 5, 2, 150, 27.4, 52, '2019-07-06'),
(52, 5, 2, 145, 26.5, 52, '2019-07-30'),
(53, 5, 2, 140, 25.6, 52, '2019-08-06'),
(54, 5, 2, 136, 24.9, 52, '2019-09-06'),
(55, 5, 2, 133, 24.3, 52, '2019-10-06'),
(56, 5, 5, 120, 19.9669, 4, '2019-10-04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `snack_gain`
--
CREATE TABLE IF NOT EXISTS `snack_gain` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `snack_loss`
--
CREATE TABLE IF NOT EXISTS `snack_loss` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `snack_normal`
--
CREATE TABLE IF NOT EXISTS `snack_normal` (
`meal_id` int(11)
,`meal_type` varchar(10)
,`meal_time` int(11)
,`food_id` int(11)
,`meal_desc` varchar(255)
,`meal_image` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `bmi_result` float DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `dob`, `gender`, `email`, `phone`, `role`, `bmi_result`, `photo`, `code`) VALUES
(1, 'khingkhingthant', '44f86517485dbf999b485e51d44bd626', 'khing thant', '1995-01-01', 'f', 'khingkhingthant@gmail.com', '09-544000987', 0, 17.8, NULL, NULL),
(2, 'myintswe', 'f6d07af409a033cf6deecca09d0ebba9', 'Myint Swe', '2000-02-07', 'm', 'myintswe@gmail.com', '09-400004562', 0, 18.2, NULL, NULL),
(3, 'hsumyatthwe', '0f4ecfdb6f54aa8c7bc012b3527a0743', 'Hsu Myat Thwe', '1996-12-08', 'f', 'hsumyatthwe@gmail.com', '09-430009890', 0, 25.8, NULL, NULL),
(4, 'mayphyozaw', '93a37a4188da302858c16b81ae39099e', 'May Phyo Zaw', '1995-04-09', 'f', 'mayphyozaw@gmail.com', '09-445477677', 0, 19.9669, NULL, NULL),
(5, 'yiyinwe', '5f398f6d8e0d6f4305da62f8a14e326d', 'Yi Yi Nwe', '1994-12-30', 'f', 'yinyinnwe@gmail.com', '09-544000987', 0, 17.8, NULL, NULL),
(6, 'choosethazinhla', '6b6ab0c04f727c8657bfc12161779352', 'Choose Thazin Hlaing', '2019-12-26', 'f', 'choosethazinhlaing@gmail.com', '09-255434566', 0, 25.9, NULL, NULL),
(7, 'lapyaeoo', 'c8788512cdb0aac3f550a50559d99000', 'La Pyae Oo', '1996-05-11', 'm', 'lapyaeoo@gmail.com', '09-256645433', 0, 27.8, NULL, NULL),
(8, 'kyisinsinAye', '394b1f80266f4885ebad3a047c0502b4', 'Kyi Sin Sin Aye', '1995-12-08', 'f', 'kyisinsinaye@gmail.com', '09-400005543', 0, 35.9, NULL, NULL),
(9, 'hninyuhlaing', 'a5a1911bd2a47a7e88e69083146154b3', 'Hnin Yu Hlaing', '1997-02-06', 'f', 'hninyuhlaing@gmail.com', '09-54400088', 0, 30.7, NULL, NULL),
(10, 'soemaung', 'c459f8ed1d3c412b55907b59a91e1fd5', 'SoeMaung', '1996-02-18', 'm', 'soemaung@gmail.com', '09-250004345', 0, 39.9, NULL, NULL),
(11, 'myathannu', '2f4454a863468298e1c53362692442d4', 'Mya Than Nu', '1995-12-06', 'f', 'myathannu@gmail.com', '09-334345423', 0, NULL, NULL, NULL),
(12, 'phyozaw', 'ca02995752dbae8a03f6704e538eb74b', 'Phyo Zaw', '1996-08-30', 'm', 'phyozaw@gmail.com', '09-400089878', 0, NULL, NULL, NULL),
(13, 'eaindra', '6c2d0c6f727d251a9aa7ed0cea7a233b', 'Eaindra', '1996-02-28', 'f', 'eaindra@gmail.com', '09-430006650', 0, NULL, NULL, NULL),
(14, 'htethtet', '20ea7315c69f87fcd1b7c00f22161d73', 'Htet Htet', '1996-12-08', 'f', 'htethtet@gmail.com', '09-967778005', 0, NULL, NULL, NULL),
(15, 'thanthanmu', '4849db0c58193dad52529b7b307fcd65', 'Than Than Mu', '1997-02-09', 'f', 'thanthanmu@gmail.com', '09-424345022', 0, NULL, NULL, NULL),
(16, 'eieinyein', 'bd98735da1d66e683ba823ec1c65c977', 'Ei Ei Nyein', '1996-05-16', 'f', 'eieinyein@gmail.com', '09-79434456', 0, NULL, NULL, NULL),
(17, 'eithatmon', 'd293a7c2c63c39a91453e3f255abe8fc', 'Ei That Mon', '1996-12-29', 'f', 'eithatmon@gmail.com', '09-976687650', 0, NULL, NULL, NULL),
(18, 'hninmyatnoezaw', 'ee1cbbaa407050c7559a1ca0407c43f8', 'Hnin Myat Noe Zaw', '1992-06-15', 'f', 'hninmyatnoezaw@gmail.com', '09-544000987', 0, NULL, NULL, NULL),
(19, 'nwenwetun', '37d7c8b96b2add5689be5db12977e6ed', 'Nwe Nwe Tun', '1996-08-19', 'f', 'nwenwetun@gmail.com', '09-544066587', 0, NULL, NULL, NULL),
(20, 'thoonthazinzaw', '1a2210c8a3712482bc4887a75c59e603', 'Thoon Tha Zin Zaw', '1996-08-26', 'f', 'thoonthazinzaw@gmail.com', '09-968880012', 0, NULL, NULL, NULL),
(21, 'mgmg', 'daa4bf1b4d0978fa034ada89161a23c4', 'Mg Mg', '1996-12-05', 'm', 'mgmg@gmail.com', '09400005745', 0, 18.9, NULL, NULL),
(22, 'aungaung', 'd0c9581d56738e8646a034b30e0a877c', 'Aung Aung', '1993-10-05', 'm', 'aunguang@gmail.com', '09434565745', 0, 18.4, NULL, NULL),
(23, 'zawzaw', 'a0cd988baa6688006e10456b2dfb9c8b', 'Zaw Zaw', '1998-10-12', 'm', 'zawzaw@gmail.com', '09434565214', 0, 17.4, NULL, NULL),
(24, 'meemee', '43e79ea94e083da6bea7be623b1bbea6', 'Mee Mee', '1988-02-15', 'f', 'meemee@gmail.com', '09256565214', 0, 15.4, NULL, NULL),
(25, 'nini', 'db5cee64d8879581f189d71178dcb055', 'Ni Ni', '1988-05-15', 'f', 'nini@gmail.com', '09234565214', 0, 35.9, NULL, NULL),
(26, 'sandi', 'ac9b4e0b6a21758534db2a6324d34a54', 'San Di', '1988-08-20', 'f', 'sandi@gmail.com', '09245665214', 0, 38.9, NULL, NULL),
(27, 'nunu', '2f8c3ab806a42e79c774cb09b41a53c8', 'Nu Nu', '1986-10-20', 'f', 'nunu@gmail.com', '09265465214', 0, 30.9, NULL, NULL),
(28, 'zarni', 'd2adb774f46f2a87bd75dc112f6fef1c', 'Zar Ni', '2015-10-20', 'm', 'zarni@gmail.com', '09465465214', 0, 20.9, NULL, NULL),
(29, 'nwenwe', '682c45fc3d9587aa9c87aa482cf60cce', 'Nwe Nwe', '2014-08-20', 'f', 'nwenwe@gmail.com', '09261115214', 0, 15.9, NULL, NULL),
(30, 'linlin', '993f1df9451ccbaab7428f4ed519fd8c', 'Lin Lin', '2010-08-14', 'm', 'linlin@gmail.com', '09261112214', 0, 12.5, NULL, NULL),
(31, 'phyophyo', '4339c409ae4ed4538d9705ee44dff895', 'Phyo Phyo', '2009-02-14', 'm', 'phyophyo@gmail.com', '09541112214', 0, NULL, NULL, NULL),
(32, 'arrsan', 'ed84e07ebe9a802e72fd09e959baf5b5', 'Arr San', '2001-02-14', 'm', 'arrsan@gmail.com', '09511112214', 0, NULL, NULL, NULL),
(33, 'lwinmin', '05766db962e3d8b337adf1e3f17ac8d6', 'Lwin Min', '2003-08-15', 'm', 'lwinmin@gmail.com', '09533312214', 0, NULL, NULL, NULL),
(34, 'pyaepyae', 'a27aaa7b9f70aa8fcdbb7e0c1727bcce', 'Pyae Pyae', '2013-10-15', 'm', 'pyaepyae@gmail.com', '09544412214', 0, NULL, NULL, NULL),
(35, 'myintoo', '46b56c6a6e125b6f3a1696ecd47d5fe4', 'Myint Oo', '2010-10-15', 'm', 'myintoo@gmail.com', '09545412214', 0, NULL, NULL, NULL),
(36, 'hlahla', '2f55c3c0d10571b03cb3deb89f338a65', 'Hla Hla', '2007-11-15', 'm', 'hlahla@gmail.com', '09543312214', 0, NULL, NULL, NULL),
(37, 'sese', '99032f27eaf45da350b544c68aa6467c', 'Se Se', '2007-10-15', 'm', 'sese@gmail.com', '09555312214', 0, NULL, NULL, NULL),
(38, 'juju', '0348dcd774a2892097b9d5c84ce882d3', 'Ju Ju', '2001-11-15', 'm', 'juju@gmail.com', '09556612214', 0, NULL, NULL, NULL),
(39, 'panpan', '41d6aa337d90950e68f32a4979a5129d', 'Pan Pan', '2001-11-15', 'f', 'panpan@gmail.com', '09556552214', 0, NULL, NULL, NULL),
(40, 'dandan', '4ba715503ca0b64f5d52d816dcae75e0', 'Dan Dan', '2005-01-15', 'f', 'dandan@gmail.com', '09586552214', 0, NULL, NULL, NULL),
(41, 'thoonthoon', 'eb7fc0d0a7e3c90f92e8835ed5b78574', 'Thoon Thoon', '1996-10-10', 'f', 'thoon123@gmail.com', '09-123456789', 0, NULL, NULL, NULL),
(42, 'mayphoy', '869b4c2781f56105b43e55248aeb1bb4', 'May Phyo', '1996-11-11', 'f', 'mayphoy@gmail.com', '09-987564321', 0, NULL, NULL, NULL),
(43, 'thanthan', '9d1b237e5869bba7d316b01c46634190', 'Than Than', '1994-12-03', 'f', 'thanthan@gmail.com', '09-678954321', 0, NULL, NULL, NULL),
(44, 'shwezin', '6905259b9c72a86c93f102fa621ff986', 'Shwe Zin', '2001-02-01', 'f', 'shwezin@gmail.com', '09-45678324799', 0, NULL, NULL, NULL),
(45, 'ayemyat', 'a46a85da146aba5a6753e3b96dc33b05', 'Aye Myat', '1999-06-20', 'f', 'ayemyat@gmail.com', '09-56738589464', 0, NULL, NULL, NULL),
(46, 'minoo', '0458c5d60947d10434df90be9d920ade', 'Min Oo', '1998-06-03', 'm', 'minoo@gmail.com', '09-234561789', 0, NULL, NULL, NULL),
(47, 'minko', 'fa838e999d34ec8d63ad4b4ddbaac244', 'Myo Ko', '2001-06-03', 'm', 'myoko@gmail.com', '09-978654321', 0, NULL, NULL, NULL),
(48, 'yeye', 'd9d5cba7c445bd9f8dfb1f8616b2380d', 'Ye Ye', '1995-09-09', 'm', 'yeye@gmail.com', '09-876543219', 0, NULL, NULL, NULL),
(49, 'tunko', '4c998e90442fafcd68517e3882f90792', 'Tun Ko', '1994-02-02', 'm', 'tunko@gmail.com', '09-987654321', 0, NULL, NULL, NULL),
(50, 'kohtike', '891502424eee377706e87872d97cbba2', 'Ko Htike', '1993-08-23', 'm', 'kohtike@gmail.com', '09-234567189', 0, NULL, NULL, NULL),
(51, 'myintmoe', '58c229fd50454253543b976eb86e911f', 'Myint Moe', '1992-05-06', 'f', 'myintmoe@gmail.com', '09-123455789', 0, NULL, NULL, NULL),
(52, 'eiphyu', '6bc19c4e48c29158a3c5e7bf3f6aabdb', 'Ei Phyu', '1991-04-04', 'f', 'eiphyu@gmail.com', '09-987564821', 0, NULL, NULL, NULL),
(53, 'susandi', '5cbccb7100fc7e5be9e91e91741d90a0', 'Su Sandi', '1999-09-09', 'f', 'susandi@gmail.com', '09-678984321', 0, NULL, NULL, NULL),
(54, 'poeei', '83bb325a943b924e6659bf1c30c2b202', 'Poe Ei', '1993-06-05', 'f', 'poeei@gmail.com', '09-45677624799', 0, NULL, NULL, NULL),
(55, 'kayzin', '7f61cbaf49f81dec6ef3737703a0ba2c', 'Kay Zin', '1987-06-08', 'f', 'kayzin@gmail.com', '09-56739789464', 0, NULL, NULL, NULL),
(56, 'phyoaung', 'cd42e92a6306a4f21aa7c17daabb2267', 'Phyo Aung', '1985-02-25', 'm', 'phyoaung@gmail.com', '09-276561789', 0, NULL, NULL, NULL),
(57, 'myokyaw', '63fc1e421249f998a31cd3e19f7c466a', 'Myo Kyaw', '1994-07-06', 'm', 'myokayw@gmail.com', '09-978885431', 0, NULL, NULL, NULL),
(58, 'aungtun', '4bcaef2136470b8cbdab37e139913350', 'Aung Tun', '1996-12-23', 'm', 'aungtun@gmail.com', '09-876599219', 0, NULL, NULL, NULL),
(59, 'phyomin', '16cfaa75e41fbdbedea6e1309a855a7c', 'Phyo Min', '1998-01-01', 'm', 'phyomin@gmail.com', '09-987654421', 0, NULL, NULL, NULL),
(60, 'paingoo', 'b275cba34b202c61856e047ecf381a3d', 'Paing Oo', '1995-04-25', 'm', 'paingoo4@gmail.com', '09-234544189', 0, NULL, NULL, NULL),
(61, 'paingpaing', '48b10937f49b6f66e1e66f02ad9417cf', 'Paing Paing', '1995-06-26', 'm', 'paingpaing@gmail.com', '09-1234567', 0, NULL, NULL, NULL),
(62, 'minmin', '4735a0c4d1b11f62ea44115d54a93087', 'Min Min', '2000-06-09', 'm', 'minmin@gmail.com', '09-8910121', 0, NULL, NULL, NULL),
(63, 'nyannyan', '4de5e6336ef7b514be83436e528154ea', 'Nyan Nyan', '2001-03-06', 'm', 'nyannyan@gmail.com', '09-7654321', 0, NULL, NULL, NULL),
(64, 'yanyan', '7219b9b60d9d70a9a7014369d88ebefe', 'Yan Yan', '1992-04-02', 'm', 'yanyan@gmail.com', '09-4534567', 0, NULL, NULL, NULL),
(65, 'sithu', 'a646b306af575ad091f9a4bcf73d3e35', 'Si Thu', '1995-02-05', 'm', 'sithu@gmail.com', '09-6534567', 0, NULL, NULL, NULL),
(66, 'chawchaw', 'f4d372da48eda459aca242ae17ae9e8d', 'Chaw Chaw', '1991-01-02', 'f', 'chawchaw@gmail.com', '09-8934567', 0, NULL, NULL, NULL),
(67, 'maythu', '8e7541be0551c7569965302d2825b29f', 'May Thu', '1995-02-06', 'f', 'maythu@gmail.com', '09-852147', 0, NULL, NULL, NULL),
(68, 'khaingkhaing', '31174a5801be4fe06da70674c2bef241', 'Khaing Khaing', '1993-09-06', 'f', 'khaingkhaing@gmail.com', '09-963852', 0, NULL, NULL, NULL),
(69, 'thiri', 'dab6cb9b3340aa2220becc8f7479f19a', 'Thiri', '2000-07-08', 'f', 'thiri@gmail.com', '09-852741', 0, NULL, NULL, NULL),
(70, 'hninaye', '33625ae5a589fd5e437f4e9250c055db', 'Hnin Aye', '1992-03-06', 'f', 'hninaye@gmail.com', '09-74521369', 0, NULL, NULL, NULL),
(71, 'thonethone', 'ec1cbef9efbc0612937e79ce800e9a55', 'Thone Thone', '1994-08-09', 'f', 'thonethone@gmail.com', '09-4521305', 0, NULL, NULL, NULL),
(72, 'zinzin', '35f45a16e09f18867951eaa6574b4ba2', 'Zin Zin', '1997-09-08', 'f', 'zinzin@gmail.com', '09-452896352', 0, NULL, NULL, NULL),
(73, 'dardar', '749deff3169e0466768aef68ef4e9fa4', 'Dar Dar', '1989-07-07', 'f', 'dardar@gmail.com', '09-952348125', 0, NULL, NULL, NULL),
(74, 'charlie', 'bf779e0933a882808585d19455cd7937', 'Charlie', '1996-08-03', 'f', 'charlie@gmail.com', '09-25943685', 0, NULL, NULL, NULL),
(75, 'thitsar', '7527286379b643468ecfff2742029806', 'Thit Sar', '1998-06-03', 'f', 'thitsar@gmail.com', '09-5021369', 0, NULL, NULL, NULL),
(76, 'juhtay', '4ce91beb61ecb81af8d5ce21e959e17d', 'Ju Ju', '1986-08-03', 'f', 'juju@gmail.com', '09-8512347965', 0, NULL, NULL, NULL),
(77, 'yenyein', '1e1a809d90178553e70841c1f2ac6d3e', 'Ye Nyein', '1983-07-04', 'm', 'yenyein@gmail.com', '09-62147855', 0, NULL, NULL, NULL),
(78, 'june', '11501255f17710952e79563ddc090a4d', 'June', '1996-04-06', 'm', 'june@gmail.com', '09-12489485', 0, NULL, NULL, NULL),
(79, 'naywin', 'd67364612908a14e390953d2dd429746', 'Nay Win', '1998-07-06', 'm', 'naywin@gmail.com', '09-4512398547', 0, NULL, NULL, NULL),
(80, 'saisai', '20bc169440b455f9f29e2f13b78de6a2', 'Sai Sai', '1968-05-06', 'm', 'saisai@gmail.com', '09-425954135', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `breakfast_gain`
--
DROP TABLE IF EXISTS `breakfast_gain`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `breakfast_gain` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'gain') and (`mealplan`.`meal_time` = 1));

-- --------------------------------------------------------

--
-- Structure for view `breakfast_loss`
--
DROP TABLE IF EXISTS `breakfast_loss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `breakfast_loss` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'loss') and (`mealplan`.`meal_time` = 1));

-- --------------------------------------------------------

--
-- Structure for view `breakfast_normal`
--
DROP TABLE IF EXISTS `breakfast_normal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `breakfast_normal` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'normal') and (`mealplan`.`meal_time` = 1));

-- --------------------------------------------------------

--
-- Structure for view `dinner_gain`
--
DROP TABLE IF EXISTS `dinner_gain`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dinner_gain` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'gain') and (`mealplan`.`meal_time` = 4));

-- --------------------------------------------------------

--
-- Structure for view `dinner_loss`
--
DROP TABLE IF EXISTS `dinner_loss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dinner_loss` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'loss') and (`mealplan`.`meal_time` = 4));

-- --------------------------------------------------------

--
-- Structure for view `dinner_normal`
--
DROP TABLE IF EXISTS `dinner_normal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dinner_normal` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'normal') and (`mealplan`.`meal_time` = 4));

-- --------------------------------------------------------

--
-- Structure for view `lunch_gain`
--
DROP TABLE IF EXISTS `lunch_gain`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lunch_gain` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'gain') and (`mealplan`.`meal_time` = 2));

-- --------------------------------------------------------

--
-- Structure for view `lunch_loss`
--
DROP TABLE IF EXISTS `lunch_loss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lunch_loss` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'loss') and (`mealplan`.`meal_time` = 2));

-- --------------------------------------------------------

--
-- Structure for view `lunch_normal`
--
DROP TABLE IF EXISTS `lunch_normal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lunch_normal` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'normal') and (`mealplan`.`meal_time` = 2));

-- --------------------------------------------------------

--
-- Structure for view `snack_gain`
--
DROP TABLE IF EXISTS `snack_gain`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `snack_gain` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'gain') and (`mealplan`.`meal_time` = 3));

-- --------------------------------------------------------

--
-- Structure for view `snack_loss`
--
DROP TABLE IF EXISTS `snack_loss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `snack_loss` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'loss') and (`mealplan`.`meal_time` = 3));

-- --------------------------------------------------------

--
-- Structure for view `snack_normal`
--
DROP TABLE IF EXISTS `snack_normal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `snack_normal` AS select `mealplan`.`meal_id` AS `meal_id`,`mealplan`.`meal_type` AS `meal_type`,`mealplan`.`meal_time` AS `meal_time`,`mealplan`.`food_id` AS `food_id`,`mealplan`.`meal_desc` AS `meal_desc`,`mealplan`.`meal_image` AS `meal_image` from `mealplan` where ((`mealplan`.`meal_type` = 'normal') and (`mealplan`.`meal_time` = 3));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choosepackage`
--
ALTER TABLE `choosepackage`
  ADD CONSTRAINT `choosepackage_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `choosepackage_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);

--
-- Constraints for table `dailyfoodplan`
--
ALTER TABLE `dailyfoodplan`
  ADD CONSTRAINT `dailyfoodplan_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `mealplan` (`meal_id`),
  ADD CONSTRAINT `dailyfoodplan_ibfk_1` FOREIGN KEY (`choose_id`) REFERENCES `choosepackage` (`choose_id`);

--
-- Constraints for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD CONSTRAINT `foodlist_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `foodcategory` (`cat_id`);

--
-- Constraints for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD CONSTRAINT `mealplan_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foodlist` (`food_id`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
