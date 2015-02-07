-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2015 at 10:25 AM
-- Server version: 5.6.22
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db-buh`
--
CREATE DATABASE IF NOT EXISTS `db-buh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db-buh`;

-- --------------------------------------------------------

--
-- Table structure for table `buh-contests`
--

DROP TABLE IF EXISTS `buh-contests`;
CREATE TABLE IF NOT EXISTS `buh-contests` (
  `id_contest` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date_begin` varchar(45) NOT NULL,
  `date_end` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh-participant`
--

DROP TABLE IF EXISTS `buh-participant`;
CREATE TABLE IF NOT EXISTS `buh-participant` (
  `id_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_etap` int(11) NOT NULL,
  `id_runner` int(10) NOT NULL,
  `club` varchar(45) DEFAULT NULL,
  `class` varchar(45) NOT NULL,
  `qualification` varchar(45) NOT NULL,
  `start_time` varchar(45) DEFAULT NULL,
  `finish_time` varchar(45) DEFAULT NULL,
  `qual_accompl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_part`),
  KEY `id_etap` (`id_etap`),
  KEY `part_to_runners` (`id_runner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh-runners`
--

DROP TABLE IF EXISTS `buh-runners`;
CREATE TABLE IF NOT EXISTS `buh-runners` (
  `id_runner` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birth_year` year(4) NOT NULL,
  `comment` text,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_runner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh_etap`
--

DROP TABLE IF EXISTS `buh_etap`;
CREATE TABLE IF NOT EXISTS `buh_etap` (
  `id_etap` int(10) NOT NULL AUTO_INCREMENT,
  `id_contest` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_etap`),
  KEY `etap_to_contest` (`id_contest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh_label`
--

DROP TABLE IF EXISTS `buh_label`;
CREATE TABLE IF NOT EXISTS `buh_label` (
  `id_label` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(45) DEFAULT NULL,
  `en` varchar(90) DEFAULT NULL,
  `ru` varchar(90) DEFAULT NULL,
  `be` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh_news`
--

DROP TABLE IF EXISTS `buh_news`;
CREATE TABLE IF NOT EXISTS `buh_news` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh_users`
--

DROP TABLE IF EXISTS `buh_users`;
CREATE TABLE IF NOT EXISTS `buh_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sha1_password` varchar(45) NOT NULL,
  `user_key` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_status_id` (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buh_user_status`
--

DROP TABLE IF EXISTS `buh_user_status`;
CREATE TABLE IF NOT EXISTS `buh_user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buh-participant`
--
ALTER TABLE `buh-participant`
  ADD CONSTRAINT `buh-participant_ibfk_1` FOREIGN KEY (`id_etap`) REFERENCES `buh_etap` (`id_etap`),
  ADD CONSTRAINT `part_to_runners` FOREIGN KEY (`id_runner`) REFERENCES `buh-runners` (`id_runner`);

--
-- Constraints for table `buh_etap`
--
ALTER TABLE `buh_etap`
  ADD CONSTRAINT `etap_to_contest` FOREIGN KEY (`id_contest`) REFERENCES `buh-contests` (`id_contest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buh_news`
--
ALTER TABLE `buh_news`
  ADD CONSTRAINT `buh_news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `buh_users` (`id_user`);

--
-- Constraints for table `buh_users`
--
ALTER TABLE `buh_users`
  ADD CONSTRAINT `buh_users_ibfk_1` FOREIGN KEY (`user_status_id`) REFERENCES `buh_user_status` (`user_status_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
