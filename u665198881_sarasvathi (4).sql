-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 06:09 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u665198881_sarasvathi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_forget_key` timestamp NULL DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_block_status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `email`, `password`, `avatar`, `mobile`, `dob`, `google_id`, `fb_id`, `forget_key`, `expire_forget_key`, `user_status`, `user_block_status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$SZBe1loEIAdnQ2N9OC39ZOsJKMEFjrMaimJgZuyoP1D.5VHDtqIZu', NULL, '98765432100', '2020-12-20', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2022-03-04 05:12:03', '2022-03-10 08:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `name`, `description`, `icon`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CBSE', 'CBSE', '1647058763-270bf27b55db889b5cf0950480ca4bba.png', 'cbse', 1, NULL, '2022-03-07 10:08:07', '2022-03-12 04:19:23'),
(2, 'Maharashtra State Board', 'Maharashtra State Board', '1647058775-e20e3758cbe63cadb5cee4dfa8928129.png', 'maharashtra-state-board', 1, NULL, '2022-03-07 10:08:07', '2022-03-12 04:19:35'),
(3, 'ICSE', 'ICSE', '1647058788-f384993c7819a2961f6b1496fd9e0921.png', 'icse', 1, NULL, '2022-03-07 10:08:07', '2022-03-12 04:19:48'),
(4, 'Andhra Pradesh State Board', 'Andhra Pradesh State Board', '1647058804-7f2dba9e7e25a09304eea5fb2c498857.png', 'andhra-pradesh-state-board', 1, NULL, '2022-03-07 10:08:07', '2022-03-12 04:20:04'),
(5, 'Telangana State Board', 'Telangana State Board', '1647058815-37bf1c4c2d1a9c722fef02bb27ebf082.png', 'telangana-state-board', 1, NULL, '2022-03-07 10:08:07', '2022-03-12 04:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concept_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active , 0 = Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `chapter_id`, `lesson_id`, `concept_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(4, '1', '1', '1', NULL, 'lesson', '1', '2022-03-11 11:35:21', '2022-03-11 11:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `uploader_type` int(11) DEFAULT NULL COMMENT '1 = Admin , 2 = Tutor ,3 = School',
  `uploader_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trending` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `name`, `class_id`, `board_id`, `subject_id`, `exam_id`, `uploader_type`, `uploader_id`, `description`, `icon`, `slug`, `trending`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Real numbers', 6, 1, 1, NULL, 1, 1, 'Ncert solutions for class 10 maths chapter 1 real numbers', NULL, 'real-numbers', 27, 1, NULL, '2022-03-10 11:20:35', '2022-03-12 04:41:15'),
(2, 'Polynomials', 6, 1, 1, NULL, 1, 1, 'Ncert olutions for class 10 maths chapter 2 polynomials', NULL, 'polynomials', 2, 1, NULL, '2022-03-10 11:20:55', '2022-03-12 04:23:44'),
(3, 'Chemical reactions and equations.', 6, 1, 2, NULL, 1, 1, 'The ncert solutions for class 12 maths is important to get prepared for the various problems asked during the class 12 maths first and second term examination.', NULL, 'chemical-reactions-and-equations', 2, 1, NULL, '2022-03-10 11:44:48', '2022-03-12 04:43:51'),
(4, 'Acids, bases, and salts', 6, 1, 2, NULL, 1, 1, 'Acids, bases, and salts', NULL, 'acids-bases-and-salts', 0, 1, NULL, '2022-03-10 12:05:30', '2022-03-12 04:44:13'),
(5, 'Dynamics', 6, 1, 3, NULL, 1, 1, 'The topic has an important role in helping the students score high marks not only in the second term exams but also in the competitive exams. the ncert solutions for class  is important to get prepared for the various problems asked during the class 12 maths first and second term examination.', NULL, 'dynamics', 0, 1, NULL, '2022-03-10 12:07:14', '2022-03-12 04:52:59'),
(6, 'Motion', 6, 1, 3, NULL, 1, 1, 'Also in the competitive exams. the ncert solutions for class 12 maths is important to get prepared for the various problems asked during the class  first and second term examination.', NULL, 'motion', 0, 1, NULL, '2022-03-10 12:07:57', '2022-03-12 04:53:09'),
(7, 'Management', 6, 1, 4, NULL, 1, 1, 'Ncert solutions class 10 maths chapter 10 circles', NULL, 'management', 0, 1, NULL, '2022-03-10 12:09:37', '2022-03-12 04:57:00'),
(8, 'History of eco', 6, 1, 4, NULL, 1, 1, 'Ncert solutions for class 10 chapter 5 arithmetic progressions', NULL, 'history-of-eco', 0, 1, NULL, '2022-03-10 12:10:06', '2022-03-12 04:57:22'),
(9, 'Acids', 7, 1, 5, NULL, 1, 1, 'Chapter 2 bases and salts', NULL, 'acids', 0, 1, NULL, '2022-03-12 04:30:22', '2022-03-12 04:30:22'),
(10, 'Metals and non-metals', 7, 1, 5, NULL, 1, 1, 'Chapter 3', NULL, 'metals-and-non-metals', 0, 1, NULL, '2022-03-12 04:34:32', '2022-03-12 04:34:32'),
(11, 'Metals and non-metals', 7, 1, 6, NULL, 1, 1, 'Chapter 3', NULL, 'metals-and-non-metals-1', 0, 1, NULL, '2022-03-12 04:46:00', '2022-03-12 04:46:00'),
(12, 'The living world.', 7, 1, 7, NULL, 1, 1, 'The living world comprises an amazing diversity of living organisms. early man could easily perceive the difference between inanimate matter and living organisms. early man deified some of the inanimate matter (wind, sea, fire etc.) and some among the animals and plants.', NULL, 'the-living-world', 0, 1, NULL, '2022-03-12 04:57:26', '2022-03-12 04:57:26'),
(13, 'Biological classification.', 7, 1, 7, NULL, 1, 1, 'In biology, classification is the process of arranging organisms, both living and extinct, into groups based on similar characteristics. the science of naming and classifying organisms is called taxonomy. the term is derived from the greek taxis (“arrangement”) and nomos (“law”).', NULL, 'biological-classification', 0, 1, NULL, '2022-03-12 04:57:55', '2022-03-12 04:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `above_10` int(11) NOT NULL DEFAULT 0 COMMENT '0 = no , 1 = yes',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `description`, `slug`, `above_10`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '5th', '5th', '5th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(2, '6th', '6th', '6th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(3, '7th', '7th', '7th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(4, '8th', '8th', '8th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(5, '9th', '9th', '9th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(6, '10th', '10th', '10th', 0, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(7, '11th', '11th', '11th', 1, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(8, '12th', '12th', '12th', 1, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07'),
(9, '12+', '12+', '12', 1, 1, NULL, '2022-03-07 10:08:07', '2022-03-07 10:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `concept`
--

CREATE TABLE `concept` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concept_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 = example , 1 = definition , 3=formala ,4= result',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concept`
--

INSERT INTO `concept` (`id`, `heading`, `content`, `concept_type`, `slug`, `subject_id`, `chapter_id`, `file`, `file_2`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bespoke training solutions11', '<p>bespoke training solutions11bespoke training solutions11bespoke training solutions11bespoke training solutions11bespoke training solutions11bespoke training solutions11bespoke training solutions11<br></p>', 3, '', 1, 1, '1647000037-cf8cd0fa2934d1c995dc5b241684ef41.png', NULL, NULL, 1, '2022-03-11 12:00:37', '2022-03-11 12:00:37'),
(2, 'Bespoke training solutions11', '<p>bespoke training solutions1bespoke training solutions1bespoke training solutions1bespoke training solutions1<br></p>', 1, '-1', 2, 3, '1647000323-bd7bbe5c7b12858c797b19c2babd9590.jpg', NULL, NULL, 1, '2022-03-11 12:05:23', '2022-03-11 12:05:23'),
(3, 'Bespoke training solutions11', '<p>bespoke training solutions11bespoke training solutions11bespoke training solutions11<br></p>', 1, '-2', 2, 4, '1647000338-f83461025236e02b8d8f8eae24597523.jpg', NULL, NULL, 1, '2022-03-11 12:05:38', '2022-03-11 12:05:38'),
(4, 'Bespoke training solutions11', '<p>bespoke training solutions11bespoke training solutions11bespoke training solutions11<br></p>', 1, '-3', 3, 5, '1647000514-c3ac67714efc2c0d561e8e5bd8f5b1ca.jpg', NULL, NULL, 1, '2022-03-11 12:08:34', '2022-03-11 12:08:34'),
(5, 'Shape your futurevirtual tutoral coursessssssssthfghfghfgh', '<p>shape your futurevirtual tutoral coursessssssssthfghfghfghshape your futurevirtual tutoral coursessssssssthfghfghfghshape your futurevirtual tutoral coursessssssssthfghfghfgh<br></p>', 2, '-4', 3, 6, '1647000538-f7cb92dfc63d19d6d2d9d51b06f8ff4b.png', NULL, NULL, 1, '2022-03-11 12:08:58', '2022-03-11 12:08:58'),
(6, 'What people are saying1', '<p>what people are saying1what people are saying1what people are saying1<br></p>', 2, '-5', 4, 7, '1647000727-5694b588ec4f36e30d7ca21e2118824b.jpg', NULL, NULL, 1, '2022-03-11 12:12:07', '2022-03-11 12:12:07'),
(7, 'Shape your futurevirtual tutoral coursessssssssthfghfghfgh', '<p>shape your futurevirtual tutoral coursessssssssthfghfghfgh<br></p>', 1, '-6', 4, 8, '1647000945-4993ac7f0680bd9aa74a0dcaf85ac41a.jpg', NULL, NULL, 1, '2022-03-11 12:15:45', '2022-03-11 12:15:45'),
(8, 'Bespoke training solutions11', '<p>bespoke training solutions11bespoke training solutions11<br></p>', 2, '-7', 5, 9, '1647059700-2c38c7cdd48bbace4d08e16b0fe7d51e.png', NULL, NULL, 1, '2022-03-12 04:35:00', '2022-03-12 04:35:00'),
(9, 'What people are saying1', '<p>what people are saying1&nbsp;what people are saying1&nbsp;what people are saying1&nbsp;what people are saying1<br></p>', 1, '-8', 5, 10, '1647059817-4b4c820ee8b333234140c34e723aa1cb.png', NULL, NULL, 1, '2022-03-12 04:36:57', '2022-03-12 04:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `concept_categories`
--

CREATE TABLE `concept_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countrycode`
--

CREATE TABLE `countrycode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countrycode`
--

INSERT INTO `countrycode` (`id`, `name`, `mobile_code`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'Algeria(+213)', '213', 'DZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(2, 'Andorra(+376)', '376', 'AD', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(3, 'Angola(+244)', '244', 'AO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(4, 'Anguilla(+1264)', '1264', 'AI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(5, 'Antigua & Barbuda(+1268)', '1268', 'AG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(6, 'Argentina(+54)', '54', 'AR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(7, 'Armenia(+374)', '374', 'AM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(8, 'Aruba(+297)', '297', 'AW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(9, 'Australia(+61)', '61', 'AU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(10, 'Austria(+43)', '43', 'AT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(11, 'Azerbaijan(+994)', '994', 'AZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(12, 'Bahamas(+1242)', '1242', 'BS', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(13, 'Bahrain(+973)', '973', 'BH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(14, 'Bangladesh(+880)', '880', 'BD', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(15, 'Barbados(+1246)', '1246', 'BB', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(16, 'Belarus(+375)', '375', 'BY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(17, 'Belgium(+32)', '32', 'BE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(18, 'Belize(+501)', '501', 'BZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(19, 'Benin(+229)', '229', 'BJ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(20, 'Bermuda(+1441)', '1441', 'BM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(21, 'Bhutan(+975)', '975', 'BT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(22, 'Bolivia(+591)', '591', 'BO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(23, 'BosniaHerzegovina(+387)', '387', 'BA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(24, 'Botswana(+267)', '267', 'BW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(25, 'Brazil(+55)', '55', 'BR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(26, 'Brunei(+673)', '673', 'BN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(27, 'Bulgaria(+359)', '359', 'BG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(28, 'BurkinaFaso(+226)', '226', 'BF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(29, 'Burundi(+257)', '257', 'BI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(30, 'Cambodia(+855)', '855', 'KH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(31, 'Cameroon(+237)', '237', 'CM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(32, 'Canada(+1)', '1', 'CA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(33, 'CapeVerdeIslands(+238)', '238', 'CV', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(34, 'CaymanIslands(+1345)', '1345', 'KY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(35, 'CentralAfricanRepublic(+236)', '236', 'CF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(36, 'Chile(+56)', '56', 'CL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(37, 'China(+86)', '86', 'CN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(38, 'Colombia(+57)', '57', 'CO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(39, 'Comoros(+269)', '269', 'KM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(40, 'Congo(+242)', '242', 'CG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(41, 'CookIslands(+682)', '682', 'CK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(42, 'CostaRica(+506)', '506', 'CR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(43, 'Croatia(+385)', '385', 'HR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(44, 'Cuba(+53)', '53', 'CU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(45, 'CyprusNorth(+90392)', '90392', 'CY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(46, 'CyprusSouth(+357)', '357', 'CY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(47, 'CzechRepublic(+42)', '42', 'CZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(48, 'Denmark(+45)', '45', 'DK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(49, 'Djibouti(+253)', '253', 'DJ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(50, 'Dominica(+1809)', '1809', 'DM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(51, 'DominicanRepublic(+1809)', '1809', 'DO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(52, 'Ecuador(+593)', '593', 'EC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(53, 'Egypt(+20)', '20', 'EG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(54, 'ElSalvador(+503)', '503', 'SV', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(55, 'EquatorialGuinea(+240)', '240', 'GQ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(56, 'Eritrea(+291)', '291', 'ER', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(57, 'Estonia(+372)', '372', 'EE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(58, 'Ethiopia(+251)', '251', 'ET', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(59, 'FalklandIslands(+500)', '500', 'FK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(60, 'FaroeIslands(+298)', '298', 'FO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(61, 'Fiji(+679)', '679', 'FJ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(62, 'Finland(+358)', '358', 'FI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(63, 'France(+33)', '33', 'FR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(64, 'FrenchGuiana(+594)', '594', 'GF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(65, 'FrenchPolynesia(+689)', '689', 'PF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(66, 'Gabon(+241)', '241', 'GA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(67, 'Gambia(+220)', '220', 'GM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(68, 'Georgia(+7880)', '7880', 'GE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(69, 'Germany(+49)', '49', 'DE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(70, 'Ghana(+233)', '233', 'GH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(71, 'Gibraltar(+350)', '350', 'GI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(72, 'Greece(+30)', '30', 'GR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(73, 'Greenland(+299)', '299', 'GL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(74, 'Grenada(+1473)', '1473', 'GD', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(75, 'Guadeloupe(+590)', '590', 'GP', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(76, 'Guam(+671)', '671', 'GU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(77, 'Guatemala(+502)', '502', 'GT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(78, 'Guinea(+224)', '224', 'GN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(79, 'Guinea-Bissau(+245', '245', 'GW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(80, 'Guyana(+592)', '592', 'GY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(81, 'Haiti(+509)', '509', 'HT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(82, 'Honduras(+504)', '504', 'HN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(83, 'HongKong(+852)', '852', 'HK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(84, 'Hungary(+36)', '36', 'HU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(85, 'Iceland(+354)', '354', 'IS', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(86, 'India(+91)', '91', 'IN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(87, 'Indonesia(+62)', '62', 'ID', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(88, 'Iran(+98)', '98', 'IR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(89, 'Iraq(+964)', '964', 'IQ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(90, 'Ireland(+353)', '353', 'IE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(91, 'Israel(+972)', '972', 'IL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(92, 'Italy(+39)', '39', 'IT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(93, 'Jamaica(+1876)', '1876', 'JM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(94, 'Japan(+81)', '81', 'JP', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(95, 'Jordan(+962)', '962', 'JO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(96, 'Kazakhstan(+7)', '7', 'KZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(97, 'Kenya(+254)', '254', 'KE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(98, 'Kiribati(+686)', '686', 'KI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(99, 'KoreaNorth(+850)', '850', 'KP', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(100, 'KoreaSouth(+82)', '82', 'KR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(101, 'Kuwait(+965)', '965', 'KW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(102, 'Kyrgyzstan(+996)', '996', 'KG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(103, 'Laos(+856)', '856', 'LA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(104, 'Latvia(+371)', '371', 'LV', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(105, 'Lebanon(+961)', '961', 'LB', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(106, 'Lesotho(+266)', '266', 'LS', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(107, 'Liberia(+231)', '231', 'LR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(108, 'Libya(+218)', '218', 'LY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(109, 'Liechtenstein(+417)', '417', 'LI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(110, 'Lithuania(+370)', '370', 'LT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(111, 'Luxembourg(+352)', '352', 'LU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(112, 'Macao(+853)', '853', 'MO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(113, 'Macedonia(+389)', '389', 'MK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(114, 'Madagascar(+261)', '261', 'MG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(115, 'Malawi(+265)', '265', 'MW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(116, 'Malaysia(+60)', '60', 'MY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(117, 'Maldives(+960)', '960', 'MV', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(118, 'Mali(+223)', '223', 'ML', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(119, 'Malta(+356)', '356', 'MT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(120, 'MarshallIslands(+692)', '692', 'MH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(121, 'Martinique(+596)', '596', 'MQ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(122, 'Mauritania(+222)', '222', 'MR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(123, 'Mayotte(+269)', '269', 'YT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(124, 'Mexico(+52)', '52', 'MX', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(125, 'Micronesia(+691)', '691', 'FM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(126, 'Moldova(+373)', '373', 'MD', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(127, 'Monaco(+377)', '377', 'MC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(128, 'Mongolia(+976)', '976', 'MN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(129, 'Montserrat(+1664)', '1664', 'MS', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(130, 'Morocco(+212)', '212', 'MA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(131, 'Mozambique(+258)', '258', 'MZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(132, 'Myanmar(+95)', '95', 'MN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(133, 'Namibia(+264)', '264', 'NA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(134, 'Nauru(+674)', '674', 'NR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(135, 'Nepal(+977)', '977', 'NP', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(136, 'Netherlands(+31)', '31', 'NL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(137, 'NewCaledonia(+687)', '687', 'NC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(138, 'NewZealand(+64)', '64', 'NZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(139, 'Nicaragua(+505)', '505', 'NI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(140, 'Niger(+227)', '227', 'NE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(141, 'Nigeria(+234)', '234', 'NG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(142, 'Niue(+683)', '683', 'NU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(143, 'NorfolkIslands(+672)', '672', 'NF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(144, 'NorthernMarianas(+670)', '670', 'NP', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(145, 'Norway(+47)', '47', 'NO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(146, 'Oman(+968)', '968', 'OM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(147, 'Palau(+680)', '680', 'PW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(148, 'Panama(+507)', '507', 'PA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(149, 'PapuaNewGuinea(+675)', '675', 'PG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(150, 'Paraguay(+595)', '595', 'PY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(151, 'Peru(+51)', '51', 'PE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(152, 'Philippines(+63)', '63', 'PH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(153, 'Poland(+48)', '48', 'PL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(154, 'Portugal(+351)', '351', 'PT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(155, 'PuertoRico(+1787)', '1787', 'PR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(156, 'Qatar(+974)', '974', 'QA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(157, 'Reunion(+262)', '262', 'RE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(158, 'Romania(+40)', '40', 'RO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(159, 'Russia(+7)', '7', 'RU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(160, 'Rwanda(+250)', '250', 'RW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(161, 'SanMarino(+378)', '378', 'SM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(162, 'SaoTome & Principe(+239', '239', 'ST', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(163, 'SaudiArabia(+966)', '966', 'SA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(164, 'Senegal(+221)', '221', 'SN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(165, 'Serbia(+381)', '381', 'CS', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(166, 'Seychelles(+248)', '248', 'SC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(167, 'SierraLeone(+232)', '232', 'SL', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(168, 'Singapore(+65)', '65', 'SG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(169, 'SlovakRepublic(+421)', '421', 'SK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(170, 'Slovenia(+386)', '386', 'SI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(171, 'SolomonIslands(+677)', '677', 'SB', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(172, 'Somalia(+252)', '252', 'SO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(173, 'SouthAfrica(+27)', '27', 'ZA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(174, 'Spain(+34)', '34', 'ES', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(175, 'SriLanka(+94)', '94', 'LK', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(176, 'St.Helena(+290)', '290', 'SH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(177, 'St.Kitts(+1869)', '1869', 'KN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(178, 'St.Lucia(+1758)', '1758', 'SC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(179, 'Sudan(+249)', '249', 'SD', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(180, 'Suriname(+597)', '597', 'SR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(181, 'Swaziland(+268)', '268', 'SZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(182, 'Sweden(+46)', '46', 'SE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(183, 'Switzerland(+41)', '41', 'CH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(184, 'Syria(+963)', '963', 'SI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(185, 'Taiwan(+886)', '886', 'TW', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(186, 'Tajikstan(+7)', '7', 'TJ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(187, 'Thailand(+66)', '66', 'TH', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(188, 'Togo(+228)', '228', 'TG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(189, 'Tonga(+676)', '676', 'TO', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(190, 'Trinidad & Tobago(+1868', '1868', 'TT', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(191, 'Tunisia(+216)', '216', 'TN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(192, 'Turkey(+90)', '90', 'TR', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(193, 'Turkmenistan(+7)', '7', 'TM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(194, 'Turkmenistan(+993)', '993', 'TM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(195, 'Turks & CaicosIslands(+1649)', '1649', 'TC', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(196, 'Tuvalu(+688)', '688', 'TV', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(197, 'Uganda(+256)', '256', 'UG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(198, 'UK(+44)', '44', 'GB', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(199, 'Ukraine(+380)', '380', 'UA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(200, 'UnitedArabEmirates(+971)', '971', 'AE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(201, 'Uruguay(+598)', '598', 'UY', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(202, 'USA(+1)', '1', 'US', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(203, 'Uzbekistan(+7)', '7', 'UZ', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(204, 'Vanuatu(+678)', '678', 'VU', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(205, 'VaticanCity(+379)', '379', 'VA', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(206, 'Venezuela(+58)', '58', 'VE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(207, 'Vietnam(+84)', '84', 'VN', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(208, 'VirginIslands-British(+1284)', '84', 'VG', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(209, 'VirginIslands-US(+1340)', '84', 'VI', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(210, 'Wallis & Futuna(+681)', '681', 'WF', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(211, 'Yemen(North)(+969)', '969', 'YE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(212, 'Yemen(South)(+967)', '967', 'YE', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(213, 'Zimbabwe(+263)', '260', 'ZM', '2022-03-04 16:12:03', '2022-03-04 16:12:03'),
(214, 'Zambia(+260)', '263', 'ZW', '2022-03-04 16:12:03', '2022-03-04 16:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = revision , 1 = practices',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `type`, `description`, `icon`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Revision With Concept', '0', 'Revise definitions,formulaes, example', '1646974800-130f1551172660f0c2bf3fc07feca157.png', 'revision-with-concept', 1, NULL, '2022-03-11 05:00:00', '2022-03-11 05:00:00'),
(2, 'Easy', '1', 'Easy', '1646974822-c4b4b9307b918453875a2e1c51cffd9e.png', 'easy', 1, NULL, '2022-03-11 05:00:22', '2022-03-11 05:00:22'),
(3, 'Medium', '1', 'Medium', '1646974842-64d9ab553cbdfba4b9c113ebeb5b9cd8.png', 'medium', 1, NULL, '2022-03-11 05:00:42', '2022-03-11 05:00:42'),
(4, 'Hard', '1', 'Hard', '1646974854-a7682636ee8db090f453bc8221de46c5.png', 'hard', 1, NULL, '2022-03-11 05:00:54', '2022-03-11 05:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_forget_key` timestamp NULL DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_block_status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `fullname`, `username`, `email`, `password`, `avatar`, `mobile`, `dob`, `school_id`, `google_id`, `fb_id`, `forget_key`, `expire_forget_key`, `user_status`, `user_block_status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Instructor', 'instructor', 'instructor@gmail.com', '$2y$10$UkzoAjSobD.oah8gSCkXFe8kw.VxDP5/VHP3aDZsNBLxSBvIYQeOe', '1646900894-02ce997a0ef318c5735b001fd675dee5.png', '7894561230', '2020-12-20', '1', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2022-03-04 05:12:03', '2022-03-10 08:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `last_lesson`
--

CREATE TABLE `last_lesson` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_lesson`
--

INSERT INTO `last_lesson` (`id`, `user_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(3, 9, 1, '2022-03-10 12:21:47', '2022-03-10 12:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `lesson_type` int(11) NOT NULL DEFAULT 0 COMMENT '1 = Video , 2 = File',
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vid_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vid_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `description`, `slug`, `thumbnail`, `section_id`, `subject_id`, `chapter_id`, `lesson_type`, `summary`, `file_name`, `vid_name`, `vid_duration`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Polynomials', 'Polynomials', 'polynomials-1', '1646912480-c3bdbb9567eb501f780b066178c992d4.png', 2, 1, 1, 0, NULL, NULL, '1646988383-95921968017df7e3181af174f8a371dc.mp4', '00:00:15', 1, NULL, '2022-03-10 11:41:20', '2022-03-12 04:29:32'),
(2, 'Poly', 'Polynomial', 'poly', '1647059415-97e9107b01833a73c19c2a0bae484ea3.jpg', 1, 1, 1, 0, NULL, NULL, '1646988402-fcea4f9f607eade5b32c4e8faeddb0f4.mp4', '00:00:00', 1, NULL, '2022-03-10 12:17:09', '2022-03-12 04:30:15'),
(3, 'Polynomials', 'Best  polynomials chepter', 'polynomials', '1646999981-0d7ad0581183723366fb5c2b46ea318d.mp4', 10, 1, 2, 0, NULL, NULL, '1646999981-716ebf65e9757f962e4dc397b71c5a71.jpg', '00:00:00', 1, NULL, '2022-03-11 11:59:41', '2022-03-11 11:59:41'),
(4, 'Introduction', 'Best probability chepter', 'introduction', '1647000244-9c71c008b97984f1d6e73636b83bc463.jpg', 4, 2, 3, 0, NULL, NULL, '1647000244-80ed4cb675257e089de29c3152836636.mp4', '12:00:00', 1, NULL, '2022-03-11 12:04:04', '2022-03-12 04:45:18'),
(5, 'Acid', 'Best php devloper', 'acid', '1647060383-1439c91f57ee49446e1a228563bf41c9.png', 4, 2, 3, 0, NULL, NULL, '1647060383-19b6eb72bd459c60da4544e5a8e8bb49.mp4', '12:00:00', 1, NULL, '2022-03-11 12:05:10', '2022-03-12 04:46:23'),
(6, 'Introduction to acid', 'Best', 'introduction-to-acid', '1647060731-098e0bfc789a98307c0cf484681825ec.png', 5, 2, 4, 0, NULL, NULL, '1647000388-33cac465619d24505734607c8dfbdbbf.mp4', '12:00:00', 1, NULL, '2022-03-11 12:06:28', '2022-03-12 04:52:11'),
(7, 'Introduction to dynamics', 'Best', 'introduction-to-dynamics', '1647000454-ee7fd6086a4d525c199f76fb325050b0.jpg', 6, 3, 5, 0, NULL, NULL, '1647000454-c7f9882e907fe5669e840951bbce3ac2.mp4', '12:00:00', 1, NULL, '2022-03-11 12:07:34', '2022-03-12 04:53:46'),
(8, 'Circles', 'Best lession', 'circles', '1647000496-dabfdd2a581023f1ee420e33c4f30b18.jpg', 7, 3, 6, 0, NULL, NULL, '1647000496-0877e6b07645f437840c300dfddd2063.mp4', '12:00:00', 1, NULL, '2022-03-11 12:08:16', '2022-03-11 12:08:16'),
(9, 'Intor to mana', 'Best lession', 'intor-to-mana', '1647000637-5166c567839a5b0ca7a89a1d0e2732fe.png', 8, 4, 7, 0, NULL, NULL, '1647000637-423344bf83fd44fa121e54040b8b92a9.mp4', '12:00:00', 1, NULL, '2022-03-11 12:10:37', '2022-03-12 04:58:21'),
(10, 'Progressions', 'Best lesson', 'progressions', '1647000929-d2e151917242c6e9bfc5e04a4d592d3d.jpg', 9, 4, 8, 0, NULL, NULL, '1647000929-890b3a5547720698ef4146a635cb7ff1.mp4', '12:00:00', 1, NULL, '2022-03-11 12:15:29', '2022-03-12 04:58:52'),
(11, 'Acids', 'More detail collage architecture, perspective architecture, section', 'acids', '1647059590-0cac833cf7e7c99287588353f99f6d8e.png', 11, 5, 9, 0, NULL, NULL, '1647059590-2ad443174f1228b12a64b8d08abef7f7.mp4', '12:00:00', 1, NULL, '2022-03-12 04:33:10', '2022-03-12 04:33:10'),
(12, 'Metals and non-metals', 'A \'section drawing\', \'section\' or \'sectional drawing\' shows a view of a structure', 'metals-and-non-metals', '1647059772-7368c12a8ad802cf40c9dde0ebb657cd.png', 12, 5, 10, 0, NULL, NULL, '1647059772-d5d2835ad330a2f265003c0e8e1f528d.mp4', '12:00:00', 1, NULL, '2022-03-12 04:36:12', '2022-03-12 04:36:12'),
(13, 'Metals and non-metals', 'Description definition: 1. something that tells you', 'metals-and-non-metals-1', '1647060416-f6ee40c7bbddd30b1008355bebe4da9d.png', 13, 6, 11, 0, NULL, NULL, '1647060416-16633166d6942882ee0c00c7459837ad.mp4', '21:00:00', 1, NULL, '2022-03-12 04:46:56', '2022-03-12 04:46:56'),
(14, 'Importance', 'Importance', 'importance', '1647060894-02e24f4a9ff61f2be43c796d21e170ef.png', 6, 3, 5, 0, NULL, NULL, '1647060894-a1c48a7a9507f71890b01f3ca67c662f.mp4', '00:12:00', 1, NULL, '2022-03-12 04:54:54', '2022-03-12 04:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_28_110929_create_instructors_table', 1),
(6, '2022_01_06_122305_create_tags_table', 1),
(7, '2022_01_07_055532_create_chapters_table', 1),
(8, '2022_01_10_042045_create_course_tags_table', 1),
(9, '2022_01_11_122352_create_dynamics_table', 1),
(10, '2022_01_13_102014_board', 1),
(11, '2022_01_13_105028_create_exams_table', 1),
(12, '2022_01_13_110651_create_classes_table', 1),
(13, '2022_01_17_045417_create_subjects_table', 1),
(14, '2022_01_19_051335_create_sections_table', 1),
(15, '2022_01_19_051414_create_lessons_table', 1),
(16, '2022_01_22_051831_create_concepts_table', 1),
(17, '2022_01_22_125641_create_exercises_table', 1),
(18, '2022_01_22_130003_create_concept_categories_table', 1),
(19, '2022_01_28_052345_create_schools_table', 1),
(20, '2022_01_28_062757_create_admins_table', 1),
(21, '2022_01_28_131228_create_school_boards_table', 1),
(22, '2022_02_24_114807_create_tutors_table', 1),
(23, '2022_03_03_045829_create_country_codes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urls` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `heading`, `content`, `image`, `urls`, `bg_image`, `type`, `page_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sarasvathi', '', '1646719360-1901d7be3e6ea0ff971c01fd908c9af7.png', NULL, NULL, 'logo', NULL, '2022-03-04 16:12:03', '2022-03-08 06:02:40'),
(2, NULL, 'home page', '', '1646974712-ec74a0934acb5e7d0fbde17778d7aeba.png', NULL, NULL, 'banner', NULL, '2022-03-04 16:12:03', '2022-03-11 04:58:32'),
(3, NULL, 'A complete learning app for class 5 - 12+ students', 'Covers all boards and competitivr exams', '1646718821-4b90cc4694de6cb92c089772dcbf3bc5.png', NULL, NULL, 'loginpage', NULL, '2022-03-04 16:12:03', '2022-03-08 05:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 2, 'MyApp', '61cbec84f1fc5e0063b3c5eec207e428f085edf68fb17412f1fbb91f95daac80', '[\"*\"]', '2022-03-04 12:47:08', '2022-03-04 12:36:23', '2022-03-04 12:47:08'),
(5, 'App\\Models\\User', 2, 'MyApp', '543c5fb4afdedfb1373f355ba30c416572488dc43d503c259b1bc4352ac11bf5', '[\"*\"]', NULL, '2022-03-07 11:10:47', '2022-03-07 11:10:47'),
(7, 'App\\Models\\User', 3, 'MyApp', '4040ba4740bb131482f4a200d0eb8980268803c541b90c33d988e3ff69053171', '[\"*\"]', '2022-03-12 04:43:36', '2022-03-08 06:40:27', '2022-03-12 04:43:36'),
(8, 'App\\Models\\User', 4, 'MyApp', '91192ed2c6a9a302874daa3b730e661342bff84a32f65c70ec2b4445bb5f1eeb', '[\"*\"]', NULL, '2022-03-08 10:30:59', '2022-03-08 10:30:59'),
(9, 'App\\Models\\User', 5, 'MyApp', 'e3cce48c4c867cb9ecdaff1a6799276ae7f314e671b1691ea1807378db7724a5', '[\"*\"]', NULL, '2022-03-08 11:14:31', '2022-03-08 11:14:31'),
(10, 'App\\Models\\User', 6, 'MyApp', 'd89598babb6fa27fb7344ed875987ade93e5f1561d4dc2ce6874b53899b099aa', '[\"*\"]', NULL, '2022-03-08 11:18:07', '2022-03-08 11:18:07'),
(16, 'App\\Models\\User', 7, 'MyApp', 'e5e11cee91802f8768f121ed7e59a5da17adf1165e56afa42f1422f89876d44a', '[\"*\"]', NULL, '2022-03-10 05:23:51', '2022-03-10 05:23:51'),
(17, 'App\\Models\\User', 7, 'MyApp', 'f19af9fdd38f6fd1f1716bad3a78c436f240709ee67ab883aa9111ba624e87c2', '[\"*\"]', NULL, '2022-03-10 05:25:32', '2022-03-10 05:25:32'),
(18, 'App\\Models\\User', 7, 'MyApp', 'd062e178f5ead4f892378a627bd91b480d2a2ce0135c363098592f869ba3f6a1', '[\"*\"]', NULL, '2022-03-10 06:28:47', '2022-03-10 06:28:47'),
(19, 'App\\Models\\User', 7, 'MyApp', '02d82fa186da603bf1c6288e0bf33c1e0ac13fcd3aebfd08cae379105818c948', '[\"*\"]', NULL, '2022-03-10 06:32:53', '2022-03-10 06:32:53'),
(20, 'App\\Models\\User', 7, 'MyApp', '1742f77598d0e2e944a84aefec2ca465d5a5a2c1ed02af28b5823461bd3f8c30', '[\"*\"]', NULL, '2022-03-10 06:37:47', '2022-03-10 06:37:47'),
(21, 'App\\Models\\User', 7, 'MyApp', 'e35a09253a130a767a99ffe7d829ba524d269f4e7e4f25afb505552ccb39c78d', '[\"*\"]', NULL, '2022-03-10 06:44:58', '2022-03-10 06:44:58'),
(22, 'App\\Models\\User', 8, 'MyApp', 'be2ef57b57819487df173097c1fe1946c3d06a03510ff5b117a5e1f076e845b6', '[\"*\"]', NULL, '2022-03-10 07:03:36', '2022-03-10 07:03:36'),
(23, 'App\\Models\\User', 8, 'MyApp', '1ef087a742ec9ac78d14887157156f1861ce62f5df7869cb49c693a6ca14ab6b', '[\"*\"]', NULL, '2022-03-10 07:05:04', '2022-03-10 07:05:04'),
(24, 'App\\Models\\User', 10, 'MyApp', '161fa698650b8feeb77c631904bfc6b60edef56a935969c7be5d4253deb40af0', '[\"*\"]', NULL, '2022-03-10 08:31:09', '2022-03-10 08:31:09'),
(25, 'App\\Models\\User', 11, 'MyApp', 'f43aad18654f7f3d6b5e63d3ba8b82eeaf05fad48c547ea927804b311d8ff566', '[\"*\"]', NULL, '2022-03-10 08:43:31', '2022-03-10 08:43:31'),
(26, 'App\\Models\\User', 12, 'MyApp', 'd4a5ac821ef66b9fd8b01929b9634d4467d2d151029d0840cf9aff2142549af3', '[\"*\"]', '2022-03-10 09:11:15', '2022-03-10 08:44:30', '2022-03-10 09:11:15'),
(28, 'App\\Models\\User', 13, 'MyApp', 'cc9439988bd2beb95feed569c270afcc533293dce6af39b674c119e4f3922a2e', '[\"*\"]', '2022-03-11 05:34:47', '2022-03-10 10:44:43', '2022-03-11 05:34:47'),
(29, 'App\\Models\\User', 13, 'MyApp', '46de9c46eb7e949d65f8f2c3572279b352b70c88e796348988124334a959c185', '[\"*\"]', NULL, '2022-03-10 12:39:51', '2022-03-10 12:39:51'),
(30, 'App\\Models\\User', 13, 'MyApp', 'fb5719119eab903d324ea4c9b161f3f4800f8780b7d8264abecb1b4612805bff', '[\"*\"]', NULL, '2022-03-11 05:11:23', '2022-03-11 05:11:23'),
(31, 'App\\Models\\User', 13, 'MyApp', 'd46b4d955b788669475466f2dcbf59550fd3336329361abeaf76199577c060bf', '[\"*\"]', '2022-03-11 06:00:32', '2022-03-11 05:23:01', '2022-03-11 06:00:32'),
(32, 'App\\Models\\User', 13, 'MyApp', 'a61b6358aae04fd119583397f2f41561dbb58d5004c45c33ca35b3aa5efb8044', '[\"*\"]', '2022-03-12 04:30:07', '2022-03-11 05:41:45', '2022-03-12 04:30:07'),
(36, 'App\\Models\\User', 14, 'MyApp', '923d5439d473c61be240e0615923d359cc8960fd84b72a25d6d704b5e4e75d35', '[\"*\"]', '2022-03-11 06:44:40', '2022-03-11 06:44:03', '2022-03-11 06:44:40'),
(37, 'App\\Models\\User', 13, 'MyApp', 'a689025957396f49f60c72e764a1e2eb524c2967ab962bb7fb52caaf0d512263', '[\"*\"]', '2022-03-11 13:03:50', '2022-03-11 06:50:33', '2022-03-11 13:03:50'),
(39, 'App\\Models\\User', 1, 'MyApp', 'ad2b640e9c14587338b83a3e76549af1b2a9b5aba8944a60c67eabede41c7b49', '[\"*\"]', '2022-03-11 11:35:25', '2022-03-11 11:10:40', '2022-03-11 11:35:25'),
(40, 'App\\Models\\User', 14, 'MyApp', '98bb59f7b69d3b586a386f98781444514c6db93bfd1325494cbbb63c29c64afa', '[\"*\"]', '2022-03-12 04:42:38', '2022-03-12 04:34:23', '2022-03-12 04:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_block_status` int(11) DEFAULT NULL,
  `forget_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_forget_key` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `fullname`, `username`, `email`, `reg_no`, `password`, `avatar`, `mobile`, `user_status`, `user_block_status`, `forget_key`, `expire_forget_key`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'School', 'School', 'school@gmail.com', NULL, '$2y$10$SZBe1loEIAdnQ2N9OC39ZOsJKMEFjrMaimJgZuyoP1D.5VHDtqIZu', NULL, '9876543210', 1, 0, NULL, NULL, NULL, NULL, '2022-03-04 05:12:03', '2022-03-10 08:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `schoolboards`
--

CREATE TABLE `schoolboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `description`, `slug`, `subject_id`, `chapter_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Real numbers', 'Ncert solutions for class 10 maths section 1 real numbers', 'real-numbers', 1, 1, 1, NULL, '2022-03-10 11:21:33', '2022-03-12 04:26:36'),
(2, 'Real numbers 2', 'Section 2 polynomials', 'real-numbers-2', 1, 1, 1, NULL, '2022-03-10 11:25:22', '2022-03-12 04:26:56'),
(3, 'Section 1', 'The topic has an important role in helping the students score high marks not only in the second term exams but also in the competitive exams. the ncert solutions for class 10 is important to get prepared for the various problems asked during the class 12 maths first and second term examination.', 'section-1', 2, 3, 1, NULL, '2022-03-10 11:45:31', '2022-03-10 11:45:31'),
(4, 'Section 2', 'Ncert solutions for class 10 maths chapter 14 statistics', 'section-11', 2, 3, 1, NULL, '2022-03-10 12:05:50', '2022-03-12 04:44:51'),
(5, 'Section 1', 'Ncert solutions for class 10 maths chapter 15 probability', 'section-12', 2, 4, 1, NULL, '2022-03-10 12:06:28', '2022-03-12 04:51:32'),
(6, 'Section 1', 'Also in the competitive exams. the ncert solutions for class 12 maths is important to get prepared for the various problems asked during the class  first and second term examination.', 'section-5', 3, 5, 1, NULL, '2022-03-10 12:08:16', '2022-03-10 12:08:16'),
(7, 'Section 1', 'Also in the competitive exams. the ncert solutions for class 12 maths is important to get prepared for the various problems asked during the maths first and second term examination.', 'section-4', 3, 6, 1, NULL, '2022-03-10 12:08:33', '2022-03-12 04:55:49'),
(8, 'Section 1', 'Also in the competitive exams. the ncert solutions for class 12 maths is important to get prepared for the various problems asked during the class  first and second term examination.', 'section-7', 4, 7, 1, NULL, '2022-03-10 12:10:33', '2022-03-10 12:10:33'),
(9, 'Section 2', 'Also in the competitive exams. the ncert solutions for class 12 maths is important to get prepared for the various problems asked during the class  first and second term examination.', 'section-8', 4, 8, 1, NULL, '2022-03-10 12:10:56', '2022-03-10 12:10:56'),
(10, 'Section 2', 'Chapter 2 polynomials', 'section-9', 1, 2, 1, NULL, '2022-03-11 11:59:01', '2022-03-11 11:59:01'),
(11, 'Section 1', 'A list of all the sections in indian penal code, 1860, a.k.a ipc india, in a', 'section-2', 5, 9, 1, NULL, '2022-03-12 04:32:26', '2022-03-12 04:32:26'),
(12, 'Section 1', 'Sections. details. introduction. preamble. chapter i. introduction. 1. title and extent of', 'section-10', 5, 10, 1, NULL, '2022-03-12 04:35:29', '2022-03-12 04:35:29'),
(13, 'Section 1', 'Content provided by the ministries/departments in the government of india. site designed and', 'section-3', 6, 11, 1, NULL, '2022-03-12 04:46:21', '2022-03-12 04:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `uploader_id` int(11) DEFAULT NULL,
  `stream_select` int(11) NOT NULL DEFAULT 0 COMMENT '0 = None , 1 = Science ,2 = Commerce ,3 = Humanities/Arts',
  `uploader_type` int(11) DEFAULT NULL COMMENT '1 = Admin , 2 = Tutor ,3 = School/Instructor ',
  `hexcolor_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hexcolor_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`, `icon`, `slug`, `class_id`, `board_id`, `exam_id`, `uploader_id`, `stream_select`, `uploader_type`, `hexcolor_1`, `hexcolor_2`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Maths', 'Maths', '1646974622-8a50641701f43611c867010445230072.jpg', 'maths', 6, 1, NULL, 1, 0, 1, '#d04e4e', '#870d0d', 1, NULL, '2022-03-07 16:27:53', '2022-03-12 04:21:08'),
(2, 'Science', 'Science', '1646974641-6033fc797ecc22795d1efbc8658c7b6d.jpg', 'science-1', 6, 1, NULL, 1, 0, 1, '#dc7979', '#672323', 1, NULL, '2022-03-07 16:27:53', '2022-03-12 04:21:39'),
(3, 'Physics', 'Physics', '1646974660-b708ff062f05af78615ae39643bb0bab.png', 'physics', 6, 1, NULL, 1, 0, 1, '#1b7fb1', '#567081', 1, NULL, '2022-03-07 16:27:53', '2022-03-12 04:22:01'),
(4, 'Economics', 'Economics', '1646974676-abf02b62d139f408777015b899d92d02.png', 'economics', 6, 1, NULL, 1, 0, 1, '#349d6c', '#3c9a6a', 1, NULL, '2022-03-07 16:27:53', '2022-03-12 04:23:05'),
(5, 'Science', 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes,', '1647060641-d9ea61ab931be0a7253d1c45053d6812.jpg', 'science-2', 7, 1, NULL, 1, 1, 1, '#000000', '#121221', 1, NULL, '2022-03-12 04:26:47', '2022-03-12 04:50:41'),
(6, 'Maths', 'bets chepter', '1647060618-f54060bd2bd8f1b3897e1b7458e9f771.jpg', 'maths-1', 7, 1, NULL, 1, 1, 1, '#000000', '#000000', 1, NULL, '2022-03-12 04:45:23', '2022-03-12 04:50:18'),
(7, 'Biology', 'Biology is the study of life. The word \"biology\" is derived from the Greek words \"bios\" (meaning life) and \"logos\" (meaning \"study\"). In general, biologists study the structure,', '1647061271-5536297226b5cb8cd88adafc1bc2351d.png', 'biology-1', 7, 1, NULL, 1, 1, 1, '#000000', '#000000', 1, NULL, '2022-03-12 04:56:18', '2022-03-12 05:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Not Deleted , 1 = Deleted',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive , 1 = Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `delete_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tag 1', 'tag-1', 0, 1, '2022-03-04 10:42:03', '2022-03-04 10:42:03'),
(2, 'tag 2', 'tag-2', 0, 1, '2022-03-04 10:42:03', '2022-03-04 10:42:03'),
(3, 'tag 3', 'tag-3', 0, 1, '2022-03-04 10:42:03', '2022-03-04 10:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_block_status` int(11) DEFAULT NULL,
  `forget_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_forget_key` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `fullname`, `username`, `email`, `password`, `avatar`, `mobile`, `dob`, `user_status`, `user_block_status`, `forget_key`, `expire_forget_key`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tutor', 'tutor', 'tutor@gmail.com', '$2y$10$SZBe1loEIAdnQ2N9OC39ZOsJKMEFjrMaimJgZuyoP1D.5VHDtqIZu', NULL, '9876543210', '2020-12-20', 1, 0, NULL, NULL, NULL, NULL, '2022-03-04 05:12:03', '2022-03-10 08:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = User , 1 = Student',
  `forget_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_forget_key` timestamp NULL DEFAULT NULL,
  `school_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Registered',
  `board_id` int(11) NOT NULL DEFAULT 0,
  `class_id` int(11) NOT NULL DEFAULT 0,
  `exam_id` int(11) NOT NULL DEFAULT 0,
  `user_stream` int(11) NOT NULL DEFAULT 0 COMMENT '0 = None , 1 = Science ,2 = Commerce ,3 = Humanities/Arts',
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = Inactive , 1 = Active',
  `user_block_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Active , 1 = Blocked',
  `wtsap_notify` int(11) NOT NULL DEFAULT 0 COMMENT '0 = NO , 1 = YES',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `avatar`, `country_code`, `mobile`, `dob`, `google_id`, `fb_id`, `login_type`, `role_status`, `forget_key`, `expire_forget_key`, `school_id`, `board_id`, `class_id`, `exam_id`, `user_stream`, `user_status`, `user_block_status`, `wtsap_notify`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user', 'user@gmail.com', '$2y$10$DWIocuThfff0YjZ/ftVEzOfXnNzTit0I9KsJPJnRAY7wvNXFw1QTG', NULL, '91', '9876543210', '2020-12-20', NULL, NULL, 'mobile', '1', NULL, NULL, 0, 1, 8, 0, 1, 1, 0, 0, NULL, NULL, '2022-03-07 04:38:06', '2022-03-11 06:03:08'),
(2, 'TEST USER', NULL, NULL, NULL, NULL, '91', '8876541239', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 1, 8, 0, 2, 1, 0, 1, NULL, NULL, '2022-03-07 11:10:47', '2022-03-10 09:48:44'),
(3, 'TEST USER', NULL, NULL, NULL, NULL, '91', '88765412391', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 1, NULL, NULL, '2022-03-08 06:40:27', '2022-03-08 06:40:27'),
(4, 'TEST USER', NULL, NULL, NULL, NULL, '91', '7438783', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 1, NULL, NULL, '2022-03-08 10:30:59', '2022-03-08 10:30:59'),
(5, 'TEST USER', NULL, NULL, NULL, NULL, '91', '743878312', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-08 11:14:31', '2022-03-08 11:14:31'),
(6, 'TEST USER', NULL, NULL, NULL, NULL, '91', '88765412399', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-08 11:18:07', '2022-03-08 11:18:07'),
(7, 'Abc', NULL, NULL, NULL, NULL, '91', '911234567890', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-10 05:23:51', '2022-03-10 05:23:51'),
(9, 'Test student', 'test _tudent', 'test@student.com', '$2y$10$G4lCosebgpvx0wqe5LBW/.ngu4ppdAtNVAdlFIImm7SyIg/hXV9sq', '1646900858-66625235cd8d655fd05f0aa473f7cfbb.png', '91', '1231231230', '2022-03-10', NULL, NULL, NULL, '2', NULL, NULL, 1, 1, 8, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-10 08:27:38', '2022-03-11 06:01:01'),
(13, 'Amit Shukla', NULL, NULL, NULL, NULL, '91', '1234567890', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 1, 6, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-10 10:44:43', '2022-03-11 05:45:12'),
(14, 'HSR', NULL, NULL, NULL, NULL, '91', '7823842420', NULL, NULL, NULL, 'mobile', '1', NULL, NULL, 0, 1, 6, 0, 0, 1, 0, 0, NULL, NULL, '2022-03-11 06:44:03', '2022-03-11 06:44:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concept`
--
ALTER TABLE `concept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concept_categories`
--
ALTER TABLE `concept_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrycode`
--
ALTER TABLE `countrycode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructor_email_unique` (`email`),
  ADD UNIQUE KEY `instructor_username_unique` (`username`);

--
-- Indexes for table `last_lesson`
--
ALTER TABLE `last_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_email_unique` (`email`),
  ADD UNIQUE KEY `school_username_unique` (`username`);

--
-- Indexes for table `schoolboards`
--
ALTER TABLE `schoolboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutor_email_unique` (`email`),
  ADD UNIQUE KEY `tutor_username_unique` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `concept`
--
ALTER TABLE `concept`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `concept_categories`
--
ALTER TABLE `concept_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countrycode`
--
ALTER TABLE `countrycode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `last_lesson`
--
ALTER TABLE `last_lesson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schoolboards`
--
ALTER TABLE `schoolboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
