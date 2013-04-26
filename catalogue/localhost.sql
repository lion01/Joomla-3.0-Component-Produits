-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2013 at 12:39 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock`
--
CREATE DATABASE `stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stock`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `desc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `desc`) VALUES
(1, 'imac', 'produits imac desktop'),
(2, 'mac book', 'mac books du stock'),
(3, 'Tabs Android', 'tablettes android');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `idcat` int(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcat` (`idcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `idcat`, `description`, `price`, `img`) VALUES
(1, 'imac 27 pouces', 1, 'Apple iMac Intel Quad Core i5 à 2,9 GHz 21,5 LED - Nouveau', 0, 'images/specs_display_27inch_imac.jpg'),
(2, 'mac book pro', 2, 'Processeur Intel® Core™ i7 Quad-Core (2,3 GHz / 3,3 GHz Turbo) - Ecran 15,4" rétro-éclairé par LED Brillant - Résolution de 1440 x 900 pixels - RAM 4096 Mo - Disque dur de 500 Go - Chipset graphique Intel HD Graphics 4000 et NVIDIA GeForce GT 650M avec 51', 1799, 'images/overview_display_hero.png'),
(3, 'Galaxy tab2 p5110', 3, 'P5110TSAXEFSAMSUNG Galaxy Tab 2 P5110 - Tablette Tactile 10.1'''' Capacitif - Wi-Fi - Bluetooth - 16 Go - Android 4.0 - Titanium Silver', 300, 'images/g-tab10-odr-0113.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
