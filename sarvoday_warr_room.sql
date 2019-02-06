-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2019 at 11:36 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarvoday_warr_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `covercity_id` varchar(200) NOT NULL,
  `main` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `city_id`, `covercity_id`, `main`, `created_at`, `updated_at`) VALUES
(1, 'HQ', 155, '155', 0, '2018-01-29 20:37:06', '2018-01-29 20:37:06'),
(2, 'Metro', 92, '92, 108, 104, 4', 0, '2018-02-21 06:44:00', '2018-12-15 15:23:59'),
(3, 'Metro', 272, '272, 86, 117', 0, '2018-02-26 17:52:20', '2018-02-26 17:52:20'),
(4, 'Metro', 40, '2', 0, '2018-03-05 22:39:34', '2018-03-05 22:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `started` date NOT NULL,
  `ended` date NOT NULL,
  `campaigntype_id` int(10) NOT NULL,
  `active` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `product_id`, `name`, `started`, `ended`, `campaigntype_id`, `active`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'TEST CAMP', '2019-01-01', '2019-01-31', 2, 1, '2019-01-09 15:33:08', '2019-01-09 15:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `campaigntypes`
--

CREATE TABLE `campaigntypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigntypes`
--

INSERT INTO `campaigntypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'SMS', NULL, NULL),
(3, 'General', NULL, NULL),
(4, 'Facebook', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `datetime`, `created_at`, `updated_at`) VALUES
(1, 'ABANPOLA', '2018-01-08 05:35:03', NULL, NULL),
(2, 'AGPOPURA', '2018-01-08 05:35:03', NULL, NULL),
(3, 'AHANGAMA', '2018-01-08 05:35:03', NULL, NULL),
(4, 'AKURALA', '2018-01-08 05:35:03', NULL, NULL),
(5, 'ALAWWA', '2018-01-08 05:35:03', NULL, NULL),
(6, 'ALAWWATUPIYIYA', '2018-01-08 05:35:03', NULL, NULL),
(7, 'ALUTHGAMA', '2018-01-08 05:35:03', NULL, NULL),
(8, 'AMBALANGODA', '2018-01-08 05:35:04', NULL, NULL),
(9, 'AMBEPUSSA', '2018-01-08 05:35:04', NULL, NULL),
(10, 'AMBEWELA', '2018-01-08 05:35:04', NULL, NULL),
(11, 'ANAVILUNDAWA', '2018-01-08 05:35:04', NULL, NULL),
(12, 'ANGULANA', '2018-01-08 05:35:04', NULL, NULL),
(13, 'ANU.NEW TOWN', '2018-01-08 05:35:04', NULL, NULL),
(14, 'ANURA\'PURA', '2018-01-08 05:35:04', NULL, NULL),
(15, 'ARACHIKATTUWA', '2018-01-08 05:35:04', NULL, NULL),
(16, 'AUNGALLA', '2018-01-08 05:35:04', NULL, NULL),
(17, 'AVISSAWELLA', '2018-01-08 05:35:04', NULL, NULL),
(18, 'AWUKANA', '2018-01-08 05:35:04', NULL, NULL),
(19, 'BADULLA', '2018-01-08 05:35:04', NULL, NULL),
(20, 'BALANA', '2018-01-08 05:35:04', NULL, NULL),
(21, 'BALAPITIYA', '2018-01-08 05:35:04', NULL, NULL),
(22, 'BAMBALAPITIYA', '2018-01-08 05:35:04', NULL, NULL),
(23, 'BANDARAWELA', '2018-01-08 05:35:04', NULL, NULL),
(24, 'BANGADENIYA', '2018-01-08 05:35:04', NULL, NULL),
(25, 'BASE LINE', '2018-01-08 05:35:04', NULL, NULL),
(26, 'BATICALOA', '2018-01-08 05:35:04', NULL, NULL),
(27, 'BATTULUOYA', '2018-01-08 05:35:04', NULL, NULL),
(28, 'BATUWATTA', '2018-01-08 05:35:04', NULL, NULL),
(29, 'BEMMULLA', '2018-01-08 05:35:04', NULL, NULL),
(30, 'BENTOTA', '2018-01-08 05:35:05', NULL, NULL),
(31, 'BERUWALA', '2018-01-08 05:35:05', NULL, NULL),
(32, 'BOLAWATTA', '2018-01-08 05:35:05', NULL, NULL),
(33, 'BOOSHA', '2018-01-08 05:35:05', NULL, NULL),
(34, 'BORALESSA', '2018-01-08 05:35:05', NULL, NULL),
(35, 'BOTALE', '2018-01-08 05:35:05', NULL, NULL),
(36, 'BUJJOMUWA', '2018-01-08 05:35:05', NULL, NULL),
(37, 'BULUGAHAGODA', '2018-01-08 05:35:05', NULL, NULL),
(38, 'CHILAW', '2018-01-08 05:35:05', NULL, NULL),
(39, 'CHINA BAY', '2018-01-08 05:35:05', NULL, NULL),
(40, 'COTTA ROAD', '2018-01-08 05:35:05', NULL, NULL),
(41, 'DARALUWA', '2018-01-08 05:35:05', NULL, NULL),
(42, 'DEHIWAL', '2018-01-08 05:35:05', NULL, NULL),
(43, 'DEMATAGODA', '2018-01-08 05:35:05', NULL, NULL),
(44, 'DEMODARA', '2018-01-08 05:35:05', NULL, NULL),
(45, 'DEVAPURAM', '2018-01-08 05:35:05', NULL, NULL),
(46, 'DIYATALAWA', '2018-01-08 05:35:05', NULL, NULL),
(47, 'DODANDUWA', '2018-01-08 05:35:05', NULL, NULL),
(48, 'EGODA UYANA', '2018-01-08 05:35:05', NULL, NULL),
(49, 'ELLA', '2018-01-08 05:35:05', NULL, NULL),
(50, 'ENDERAMULLA', '2018-01-08 05:35:05', NULL, NULL),
(51, 'ERATTAPRIYAKULAM', '2018-01-08 05:35:05', NULL, NULL),
(52, 'ERAVUR', '2018-01-08 05:35:05', NULL, NULL),
(53, 'FORT', '2018-01-08 05:35:05', NULL, NULL),
(54, 'GAL OYA', '2018-01-08 05:35:05', NULL, NULL),
(55, 'GALABADA', '2018-01-08 05:35:05', NULL, NULL),
(56, 'GALGAMUWA', '2018-01-08 05:35:06', NULL, NULL),
(57, 'GALLE', '2018-01-08 05:35:06', NULL, NULL),
(58, 'GALLELLA', '2018-01-08 05:35:06', NULL, NULL),
(59, 'GAMPAHA', '2018-01-08 05:35:06', NULL, NULL),
(60, 'GAMPOLA', '2018-01-08 05:35:06', NULL, NULL),
(61, 'GANEGODA', '2018-01-08 05:35:06', NULL, NULL),
(62, 'GANEMULLA', '2018-01-08 05:35:06', NULL, NULL),
(63, 'GANEWATTA', '2018-01-08 05:35:06', NULL, NULL),
(64, 'GANGODA', '2018-01-08 05:35:06', NULL, NULL),
(65, 'GELIOYA', '2018-01-08 05:35:06', NULL, NULL),
(66, 'GINTOTATA', '2018-01-08 05:35:06', NULL, NULL),
(67, 'GIRAMBE', '2018-01-08 05:35:06', NULL, NULL),
(68, 'GODAGAMA', '2018-01-08 05:35:06', NULL, NULL),
(69, 'GREAT WESTERN', '2018-01-08 05:35:06', NULL, NULL),
(70, 'HABARADUWA', '2018-01-08 05:35:06', NULL, NULL),
(71, 'HABARANA', '2018-01-08 05:35:06', NULL, NULL),
(72, 'HALI ELA', '2018-01-08 05:35:06', NULL, NULL),
(73, 'HAPUTALE', '2018-01-08 05:35:06', NULL, NULL),
(74, 'HATARESKOTUWA', '2018-01-08 05:35:06', NULL, NULL),
(75, 'HATTON', '2018-01-08 05:35:06', NULL, NULL),
(76, 'HEEL OYA', '2018-01-08 05:35:06', NULL, NULL),
(77, 'HENDENIYAP GODA', '2018-01-08 05:35:06', NULL, NULL),
(78, 'HETTIMULLA', '2018-01-08 05:35:06', NULL, NULL),
(79, 'HIKKADUWA', '2018-01-08 05:35:06', NULL, NULL),
(80, 'HINRAKGODA', '2018-01-08 05:35:06', NULL, NULL),
(81, 'HIRIYALA', '2018-01-08 05:35:06', NULL, NULL),
(82, 'HOMA HOS ROAD', '2018-01-08 05:35:07', NULL, NULL),
(83, 'HOMAGAMA', '2018-01-08 05:35:07', NULL, NULL),
(84, 'HORAPE', '2018-01-08 05:35:07', NULL, NULL),
(85, 'HORIWILA', '2018-01-08 05:35:07', NULL, NULL),
(86, 'HUNUPITIYA', '2018-01-08 05:35:07', NULL, NULL),
(87, 'IDAL GASHINNA', '2018-01-08 05:35:07', NULL, NULL),
(88, 'IHALA WATAWALA', '2018-01-08 05:35:07', NULL, NULL),
(89, 'IHALAKOTTE', '2018-01-08 05:35:07', NULL, NULL),
(90, 'INDURUWA', '2018-01-08 05:35:07', NULL, NULL),
(91, 'INGURUOYA', '2018-01-08 05:35:07', NULL, NULL),
(92, 'JA ELA', '2018-01-08 05:35:07', NULL, NULL),
(93, 'JAYANTIPURAM', '2018-01-08 05:35:07', NULL, NULL),
(94, 'KADADASI NAGAR', '2018-01-08 05:35:07', NULL, NULL),
(95, 'KADIGAMUWA', '2018-01-08 05:35:07', NULL, NULL),
(96, 'KADUGANNAWA', '2018-01-08 05:35:07', NULL, NULL),
(97, 'KAHAWE', '2018-01-08 05:35:07', NULL, NULL),
(98, 'KAKKAPALLIA', '2018-01-08 05:35:07', NULL, NULL),
(99, 'KALAWEWA', '2018-01-08 05:35:07', NULL, NULL),
(100, 'KALKUDAH', '2018-01-08 05:35:07', NULL, NULL),
(101, 'KALU NORTH', '2018-01-08 05:35:07', NULL, NULL),
(102, 'KALU SOUTH', '2018-01-08 05:35:07', NULL, NULL),
(103, 'KAMBURUGGAMUWA', '2018-01-08 05:35:07', NULL, NULL),
(104, 'KANDANA', '2018-01-08 05:35:07', NULL, NULL),
(105, 'KANDEGODA', '2018-01-08 05:35:07', NULL, NULL),
(106, 'KANDY', '2018-01-08 05:35:07', NULL, NULL),
(107, 'KANTALE', '2018-01-08 05:35:07', NULL, NULL),
(108, 'KAPUWATTA', '2018-01-08 05:35:07', NULL, NULL),
(109, 'KATALUWA', '2018-01-08 05:35:07', NULL, NULL),
(110, 'KATTUWA', '2018-01-08 05:35:08', NULL, NULL),
(111, 'KATUGASTOOTA', '2018-01-08 05:35:08', NULL, NULL),
(112, 'KATUGODA', '2018-01-08 05:35:08', NULL, NULL),
(113, 'KATUKURURNDA', '2018-01-08 05:35:08', NULL, NULL),
(114, 'KATUNAYAKA', '2018-01-08 05:35:08', NULL, NULL),
(115, 'KEENAWALA', '2018-01-08 05:35:08', NULL, NULL),
(116, 'KEKIRAWA', '2018-01-08 05:35:08', NULL, NULL),
(117, 'KELANIYA', '2018-01-08 05:35:08', NULL, NULL),
(118, 'KINIGAMA', '2018-01-08 05:35:08', NULL, NULL),
(119, 'KIRULPONE', '2018-01-08 05:35:08', NULL, NULL),
(120, 'KITAL ELLA', '2018-01-08 05:35:08', NULL, NULL),
(121, 'KOGGALA', '2018-01-08 05:35:08', NULL, NULL),
(122, 'KOICHCHIKADE', '2018-01-08 05:35:08', NULL, NULL),
(123, 'KOLPETTI', '2018-01-08 05:35:08', NULL, NULL),
(124, 'KOMPANNAVIDIYA', '2018-01-08 05:35:08', NULL, NULL),
(125, 'KON WEWA', '2018-01-08 05:35:08', NULL, NULL),
(126, 'KORALAWEELA', '2018-01-08 05:35:08', NULL, NULL),
(127, 'KOSGAMA', '2018-01-08 05:35:08', NULL, NULL),
(128, 'KOSGODA', '2018-01-08 05:35:08', NULL, NULL),
(129, 'KOSHINNA', '2018-01-08 05:35:08', NULL, NULL),
(130, 'KOTAGALA', '2018-01-08 05:35:08', NULL, NULL),
(131, 'KOTTAWA', '2018-01-08 05:35:09', NULL, NULL),
(132, 'KUDAHAKAPALA', '2018-01-08 05:35:09', NULL, NULL),
(133, 'KUDAWEW', '2018-01-08 05:35:09', NULL, NULL),
(134, 'KUMARAKANDA', '2018-01-08 05:35:09', NULL, NULL),
(135, 'KUMBALGAMA', '2018-01-08 05:35:09', NULL, NULL),
(136, 'KURANA', '2018-01-08 05:35:09', NULL, NULL),
(137, 'KURUNEGALA', '2018-01-08 05:35:09', NULL, NULL),
(138, 'LAKSHA UYANA', '2018-01-08 05:35:09', NULL, NULL),
(139, 'LIYAAGE MULLA', '2018-01-08 05:35:09', NULL, NULL),
(140, 'LUNAWA', '2018-01-08 05:35:09', NULL, NULL),
(141, 'LUNUWILA', '2018-01-08 05:35:09', NULL, NULL),
(142, 'MADAMPAGAMA', '2018-01-08 05:35:09', NULL, NULL),
(143, 'MADAMPPE', '2018-01-08 05:35:09', NULL, NULL),
(144, 'MADURANKULIYA', '2018-01-08 05:35:09', NULL, NULL),
(145, 'MAGALEGODA', '2018-01-30 03:23:54', NULL, NULL),
(146, 'MAGGONA', '2018-01-08 05:35:09', NULL, NULL),
(147, 'MAHA INDURUWA', '2018-01-08 05:35:09', NULL, NULL),
(148, 'MAHARAGAMA', '2018-01-08 05:35:09', NULL, NULL),
(149, 'MAHAYYAWA', '2018-01-08 05:35:09', NULL, NULL),
(150, 'MAHO', '2018-01-08 05:35:09', NULL, NULL),
(151, 'MALAPALLA', '2018-01-08 05:35:09', NULL, NULL),
(152, 'MANAMPITIYA', '2018-01-08 05:35:09', NULL, NULL),
(153, 'MANGALAELIYA', '2018-01-08 05:35:09', NULL, NULL),
(154, 'MANUWANGAMA', '2018-01-08 05:35:09', NULL, NULL),
(155, 'MARADANA', '2018-01-08 05:35:09', NULL, NULL),
(156, 'MATALE', '2018-01-08 05:35:09', NULL, NULL),
(157, 'MATARA', '2018-01-08 05:35:10', NULL, NULL),
(158, 'MEDAGAMA', '2018-01-08 05:35:10', NULL, NULL),
(159, 'MEDAVACHCHI', '2018-01-08 05:35:10', NULL, NULL),
(160, 'MEEGODA', '2018-01-08 05:35:10', NULL, NULL),
(161, 'MIDIGAMA', '2018-01-08 05:35:10', NULL, NULL),
(162, 'MIHIN JUNCTION', '2018-01-08 05:35:10', NULL, NULL),
(163, 'MINNERIYA', '2018-01-08 05:35:10', NULL, NULL),
(164, 'MIRIGAMA', '2018-01-08 05:35:10', NULL, NULL),
(165, 'MIRISSA', '2018-01-08 05:35:10', NULL, NULL),
(166, 'MOLLIPOTANA', '2018-01-08 05:35:10', NULL, NULL),
(167, 'MORAGOLLAGAMA', '2018-01-08 05:35:10', NULL, NULL),
(168, 'MORATUWA', '2018-01-08 05:35:10', NULL, NULL),
(169, 'MOUNT LAVINIA', '2018-01-08 05:35:10', NULL, NULL),
(170, 'MUNDAL', '2018-01-08 05:35:10', NULL, NULL),
(171, 'MUTTUGALA', '2018-01-08 05:35:10', NULL, NULL),
(172, 'NAGOLLAGAMA', '2018-01-08 05:35:10', NULL, NULL),
(173, 'NAILIYA', '2018-01-08 05:35:10', NULL, NULL),
(174, 'NANU OYA', '2018-01-08 05:35:10', NULL, NULL),
(175, 'NARAHENPITA', '2018-01-08 05:35:10', NULL, NULL),
(176, 'NATHTHANDIYA', '2018-01-08 05:35:10', NULL, NULL),
(177, 'NAVALAPITIYA', '2018-01-08 05:35:10', NULL, NULL),
(178, 'NAWINNA', '2018-01-08 05:35:10', NULL, NULL),
(179, 'NEEGAMA', '2018-01-08 05:35:10', NULL, NULL),
(180, 'NEGOMBO', '2018-01-08 05:35:10', NULL, NULL),
(181, 'NELUMPOKUNA', '2018-01-08 05:35:10', NULL, NULL),
(182, 'NUGEGODA', '2018-01-08 05:35:10', NULL, NULL),
(183, 'OHIYA', '2018-01-08 05:35:10', NULL, NULL),
(184, 'PADUKKA', '2018-01-08 05:35:11', NULL, NULL),
(185, 'PALAVI', '2018-01-08 05:35:11', NULL, NULL),
(186, 'PALLEWELA', '2018-01-08 05:35:11', NULL, NULL),
(187, 'PALUGASWEWA', '2018-01-08 05:35:11', NULL, NULL),
(188, 'PANADURA', '2018-01-08 05:35:11', NULL, NULL),
(189, 'PANAGODA', '2018-01-08 05:35:11', NULL, NULL),
(190, 'PANALIYA', '2018-01-08 05:35:11', NULL, NULL),
(191, 'PANNIPITIYA', '2018-01-08 05:35:11', NULL, NULL),
(192, 'PARAKUMPURA', '2018-01-08 05:35:11', NULL, NULL),
(193, 'PARASANGAHWEWA', '2018-01-08 05:35:11', NULL, NULL),
(194, 'PATANPAHA', '2018-01-08 05:35:11', NULL, NULL),
(195, 'PATEGAMGODA', '2018-01-08 05:35:11', NULL, NULL),
(196, 'PATTIPOA', '2018-01-08 05:35:11', NULL, NULL),
(197, 'PAYA NORTH', '2018-01-08 05:35:11', NULL, NULL),
(198, 'PAYA SOUTH', '2018-01-08 05:35:11', NULL, NULL),
(199, 'PERADENIA', '2018-01-08 05:35:11', NULL, NULL),
(200, 'PERALANDA', '2018-01-08 05:35:11', NULL, NULL),
(201, 'PERKUM UYANA', '2018-01-08 05:35:11', NULL, NULL),
(202, 'PILADUWA', '2018-01-08 05:35:11', NULL, NULL),
(203, 'PILIMATALAWA', '2018-01-08 05:35:11', NULL, NULL),
(204, 'PINNAWALA', '2018-01-08 05:35:11', NULL, NULL),
(205, 'PINWATTA', '2018-01-08 05:35:11', NULL, NULL),
(206, 'PIYADIGAMA', '2018-01-08 05:35:11', NULL, NULL),
(207, 'PIYAGAMA', '2018-01-08 05:35:11', NULL, NULL),
(208, 'POLATHU MODAERA', '2018-01-08 05:35:12', NULL, NULL),
(209, 'POLGAHGAWELA', '2018-01-08 05:35:12', NULL, NULL),
(210, 'POLONNARUWA', '2018-01-08 05:35:12', NULL, NULL),
(211, 'POONANI', '2018-01-08 05:35:12', NULL, NULL),
(212, 'POONEWA', '2018-01-08 05:35:12', NULL, NULL),
(213, 'POTUHERA', '2018-01-08 05:35:12', NULL, NULL),
(214, 'PULICHCHAKULAMA', '2018-01-08 05:35:12', NULL, NULL),
(215, 'PUTTALAM', '2018-01-08 05:35:12', NULL, NULL),
(216, 'PUWAKPITIYA', '2018-01-08 05:35:12', NULL, NULL),
(217, 'RADELLA', '2018-01-08 05:35:12', NULL, NULL),
(218, 'RAGAMA', '2018-01-08 05:35:12', NULL, NULL),
(219, 'RAMBUKKANA', '2018-01-08 05:35:12', NULL, NULL),
(220, 'RANAMUKGAMA', '2018-01-08 05:35:12', NULL, NULL),
(221, 'RANDENIGAMA', '2018-01-08 05:35:12', NULL, NULL),
(222, 'RATGAMA', '2018-01-08 05:35:12', NULL, NULL),
(223, 'RATMALANA', '2018-01-08 05:35:12', NULL, NULL),
(224, 'RICHMAND HILL', '2018-01-08 05:35:12', NULL, NULL),
(225, 'ROZELLA', '2018-01-08 05:35:12', NULL, NULL),
(226, 'SALIYAPURA', '2018-01-08 05:35:12', NULL, NULL),
(227, 'SARASAVI UYANA', '2018-01-08 05:35:12', NULL, NULL),
(228, 'SAWARANA', '2018-01-08 05:35:12', NULL, NULL),
(229, 'SECARATARIAT HOALT', '2018-01-08 05:35:12', NULL, NULL),
(230, 'SEEDUWA', '2018-01-08 05:35:12', NULL, NULL),
(231, 'SEENIGAMA', '2018-01-08 05:35:13', NULL, NULL),
(232, 'SENARATHGAMA', '2018-01-08 05:35:13', NULL, NULL),
(233, 'SIYABALANGAMUWA', '2018-01-08 05:35:13', NULL, NULL),
(234, 'SRIWASTIPURA', '2018-01-08 05:35:13', NULL, NULL),
(235, 'TALAWA', '2018-01-08 05:35:13', NULL, NULL),
(236, 'TALAWAKELE', '2018-01-08 05:35:13', NULL, NULL),
(237, 'TALAWATTEGEDARA', '2018-01-08 05:35:13', NULL, NULL),
(238, 'TALPE', '2018-01-08 05:35:13', NULL, NULL),
(239, 'TAMBILIGALA', '2018-01-08 05:35:13', NULL, NULL),
(240, 'TAMBUTTEGAMA', '2018-01-08 05:35:13', NULL, NULL),
(241, 'TANBALAGAMUWA', '2018-01-08 05:35:13', NULL, NULL),
(242, 'TELWATTA', '2018-01-08 05:35:13', NULL, NULL),
(243, 'TILADIYA', '2018-01-08 05:35:13', NULL, NULL),
(244, 'TIMBIRIYAGEDARA', '2018-01-08 05:35:13', NULL, NULL),
(245, 'TISMALPOLA', '2018-01-08 05:35:13', NULL, NULL),
(246, 'TRAIN HOLT', '2018-01-08 05:35:13', NULL, NULL),
(247, 'TRINCO', '2018-01-08 05:35:13', NULL, NULL),
(248, 'TUDEELLA', '2018-01-08 05:35:13', NULL, NULL),
(249, 'TUMMODARA', '2018-01-08 05:35:13', NULL, NULL),
(250, 'UDAHAMULLA', '2018-01-08 05:35:13', NULL, NULL),
(251, 'UDATALAWINNA', '2018-01-08 05:35:13', NULL, NULL),
(252, 'UDATTAWELA', '2018-01-08 05:35:13', NULL, NULL),
(253, 'UDUWARA', '2018-01-08 05:35:13', NULL, NULL),
(254, 'UKUWELA', '2018-01-08 05:35:14', NULL, NULL),
(255, 'ULAPANE', '2018-01-08 05:35:14', NULL, NULL),
(256, 'UNAWATUNA', '2018-01-08 05:35:14', NULL, NULL),
(257, 'VALACHCHENNAI', '2018-01-08 05:35:14', NULL, NULL),
(258, 'VAUNIA', '2018-01-08 05:35:14', NULL, NULL),
(259, 'VEYANGODA', '2018-01-08 05:35:14', NULL, NULL),
(260, 'WADDUWA', '2018-01-08 05:35:14', NULL, NULL),
(261, 'WAGGA', '2018-01-08 05:35:14', NULL, NULL),
(262, 'WAIKKALA', '2018-01-08 05:35:14', NULL, NULL),
(263, 'WALAHAPITIYA', '2018-01-08 05:35:14', NULL, NULL),
(264, 'WALAKUMBURA', '2018-01-08 05:35:14', NULL, NULL),
(265, 'WALGAMA', '2018-01-08 05:35:14', NULL, NULL),
(266, 'WALPOLA', '2018-01-08 05:35:14', NULL, NULL),
(267, 'WANAWASALA', '2018-01-08 05:35:14', NULL, NULL),
(268, 'WANDURAWA', '2018-01-08 05:35:14', NULL, NULL),
(269, 'WATAGODA', '2018-01-08 05:35:14', NULL, NULL),
(270, 'WATAREKA PLATFORM', '2018-01-08 05:35:14', NULL, NULL),
(271, 'WATAWALA', '2018-01-08 05:35:14', NULL, NULL),
(272, 'WATTEGAMA', '2018-01-08 05:35:14', NULL, NULL),
(273, 'WELIGAMA', '2018-01-08 05:35:14', NULL, NULL),
(274, 'WELIKANDA', '2018-01-08 05:35:14', NULL, NULL),
(275, 'WELLAWA', '2018-01-08 05:35:14', NULL, NULL),
(276, 'WELLAWATTA', '2018-01-08 05:35:14', NULL, NULL),
(277, 'WIJAYARAJADAHANA', '2018-01-08 05:35:14', NULL, NULL),
(278, 'WILWATTA', '2018-01-08 05:35:15', NULL, NULL),
(279, 'YAGODA', '2018-01-08 05:35:15', NULL, NULL),
(280, 'YATAGAMA', '2018-01-08 05:35:15', NULL, NULL),
(281, 'YATHTHALGODA', '2018-01-08 05:35:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `phone_home` varchar(20) DEFAULT NULL,
  `phone_office` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `phone_2`, `phone_home`, `phone_office`, `dob`, `address`, `nic`, `created_at`, `updated_at`) VALUES
(12, 'Dulaj', 'rashansamith88@gmail.com', '0779018898', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-09 15:34:11', '2019-01-09 15:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(10) NOT NULL,
  `lead_id` int(10) DEFAULT NULL,
  `client_id` int(10) DEFAULT NULL,
  `complain` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversionstatuses`
--

CREATE TABLE `conversionstatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `internal` int(11) DEFAULT NULL,
  `colorcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversionstatuses`
--

INSERT INTO `conversionstatuses` (`id`, `name`, `detail`, `internal`, `colorcode`) VALUES
(1, 'Converted', 'The lead is converted into a business.', 0, '#008000'),
(2, 'Negative', 'The lead is not converted ', 0, '#FFFF00'),
(3, 'In-Progress', 'The lead needs follow ups', 0, '#FF0000'),
(4, 'Branch', 'Lead in the branch', 0, '#808080'),
(5, 'Unfollowed ', 'The lead hasn\'t been followed by agent.', 2, ''),
(6, 'Positive', 'The lead is positive for conversion.', 1, '#FFFF00'),
(8, 'Credit', 'In-progress at credit department', 1, ''),
(9, 'Operation', 'In-progress at operations department', 1, ''),
(10, 'Finance ', 'In-progress at finance department', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--

CREATE TABLE `eventlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event` varchar(200) NOT NULL,
  `functionname` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `iserror` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `user_id`, `event`, `functionname`, `content`, `iserror`, `created_at`, `updated_at`) VALUES
(1, 1, 'Create user', 'create', 'Start', 0, '2019-01-09 15:12:10', '2019-01-09 15:12:10'),
(2, 1, 'Create user', 'create', 'Start', 0, '2019-01-09 15:13:27', '2019-01-09 15:13:27'),
(3, 1, 'Create user', 'create', 'Start', 0, '2019-01-09 15:15:56', '2019-01-09 15:15:56'),
(4, 69, 'Get branches', 'edit', 'Start', 0, '2019-01-09 15:21:15', '2019-01-09 15:21:15'),
(5, 69, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 15:30:48', '2019-01-09 15:30:48'),
(6, 69, 'Generate Product revenue report', 'productRevenue', 'Start', 0, '2019-01-09 15:30:48', '2019-01-09 15:30:48'),
(7, 69, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 15:30:48', '2019-01-09 15:30:48'),
(8, 1, 'Create Campaign', 'create', 'Create Start', 0, '2019-01-09 15:33:08', '2019-01-09 15:33:08'),
(9, 70, 'Create Lead', 'Create', 'Start', 0, '2019-01-09 15:34:11', '2019-01-09 15:34:11'),
(10, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:36:23', '2019-01-09 15:36:23'),
(11, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 15:37:07', '2019-01-09 15:37:07'),
(12, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 15:37:23', '2019-01-09 15:37:23'),
(13, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 15:39:25', '2019-01-09 15:39:25'),
(14, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:39:27', '2019-01-09 15:39:27'),
(15, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:41:27', '2019-01-09 15:41:27'),
(16, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:41:41', '2019-01-09 15:41:41'),
(17, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 15:41:56', '2019-01-09 15:41:56'),
(18, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:41:59', '2019-01-09 15:41:59'),
(19, 69, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 15:44:44', '2019-01-09 15:44:44'),
(20, 71, 'Edit In Progress Lead Start', 'edit', 'Start', 0, '2019-01-09 16:00:41', '2019-01-09 16:00:41'),
(21, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 16:00:54', '2019-01-09 16:00:54'),
(22, 71, 'Edit In Progress Lead Start', 'edit', 'Start', 0, '2019-01-09 16:00:57', '2019-01-09 16:00:57'),
(23, 71, 'Edit In Progress Lead Start', 'edit', 'Start', 0, '2019-01-09 16:01:13', '2019-01-09 16:01:13'),
(24, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 16:02:54', '2019-01-09 16:02:54'),
(25, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:03:19', '2019-01-09 16:03:19'),
(26, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:07:21', '2019-01-09 16:07:21'),
(27, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 16:07:38', '2019-01-09 16:07:38'),
(28, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:07:41', '2019-01-09 16:07:41'),
(29, 69, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:08:21', '2019-01-09 16:08:21'),
(30, 71, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:09:14', '2019-01-09 16:09:14'),
(31, 71, 'Follow up New Lead Start', 'followUp', 'Start', 0, '2019-01-09 16:09:37', '2019-01-09 16:09:37'),
(32, 69, 'Show Lead', 'show', 'Start', 0, '2019-01-09 16:09:55', '2019-01-09 16:09:55'),
(33, 1, 'Show Lead', 'show', 'Start', 0, '2019-01-09 16:10:08', '2019-01-09 16:10:08'),
(34, 69, 'Show Lead', 'show', 'Start', 0, '2019-01-09 16:10:28', '2019-01-09 16:10:28'),
(35, 69, 'Show Lead', 'show', 'Start', 0, '2019-01-09 16:12:36', '2019-01-09 16:12:36'),
(36, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:12:57', '2019-01-09 16:12:57'),
(37, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:12:57', '2019-01-09 16:12:57'),
(38, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:12:57', '2019-01-09 16:12:57'),
(39, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:12:59', '2019-01-09 16:12:59'),
(40, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:12:59', '2019-01-09 16:12:59'),
(41, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:12:59', '2019-01-09 16:12:59'),
(42, 69, 'Show Lead', 'show', 'Start', 0, '2019-01-09 16:13:12', '2019-01-09 16:13:12'),
(43, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:13:31', '2019-01-09 16:13:31'),
(44, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:13:31', '2019-01-09 16:13:31'),
(45, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:13:31', '2019-01-09 16:13:31'),
(46, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:13:45', '2019-01-09 16:13:45'),
(47, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:13:45', '2019-01-09 16:13:45'),
(48, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:13:45', '2019-01-09 16:13:45'),
(49, 69, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:14:38', '2019-01-09 16:14:38'),
(50, 69, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:14:38', '2019-01-09 16:14:38'),
(51, 69, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:14:38', '2019-01-09 16:14:38'),
(52, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:16:40', '2019-01-09 16:16:40'),
(53, 1, 'Generate Product revenue report', 'productRevenue', 'Start', 0, '2019-01-09 16:16:40', '2019-01-09 16:16:40'),
(54, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:16:50', '2019-01-09 16:16:50'),
(55, 1, 'Generate Campaign revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:16:50', '2019-01-09 16:16:50'),
(56, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:16:57', '2019-01-09 16:16:57'),
(57, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:16:57', '2019-01-09 16:16:57'),
(58, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:16:57', '2019-01-09 16:16:57'),
(59, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:17:35', '2019-01-09 16:17:35'),
(60, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:17:35', '2019-01-09 16:17:35'),
(61, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:17:35', '2019-01-09 16:17:35'),
(62, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:17:39', '2019-01-09 16:17:39'),
(63, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:17:39', '2019-01-09 16:17:39'),
(64, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:17:39', '2019-01-09 16:17:39'),
(65, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:17:52', '2019-01-09 16:17:52'),
(66, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:17:52', '2019-01-09 16:17:52'),
(67, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:17:52', '2019-01-09 16:17:52'),
(68, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:22:25', '2019-01-09 16:22:25'),
(69, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:22:25', '2019-01-09 16:22:25'),
(70, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:22:25', '2019-01-09 16:22:25'),
(71, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:22:30', '2019-01-09 16:22:30'),
(72, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:22:30', '2019-01-09 16:22:30'),
(73, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:22:30', '2019-01-09 16:22:30'),
(74, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:22:39', '2019-01-09 16:22:39'),
(75, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:22:39', '2019-01-09 16:22:39'),
(76, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:22:39', '2019-01-09 16:22:39'),
(77, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:22:44', '2019-01-09 16:22:44'),
(78, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:22:44', '2019-01-09 16:22:44'),
(79, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:22:44', '2019-01-09 16:22:44'),
(80, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:22:53', '2019-01-09 16:22:53'),
(81, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:22:53', '2019-01-09 16:22:53'),
(82, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:22:53', '2019-01-09 16:22:53'),
(83, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:23:09', '2019-01-09 16:23:09'),
(84, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:23:09', '2019-01-09 16:23:09'),
(85, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:23:09', '2019-01-09 16:23:09'),
(86, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:23:14', '2019-01-09 16:23:14'),
(87, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:23:14', '2019-01-09 16:23:14'),
(88, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:23:14', '2019-01-09 16:23:14'),
(89, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:23:15', '2019-01-09 16:23:15'),
(90, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:23:15', '2019-01-09 16:23:15'),
(91, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:23:15', '2019-01-09 16:23:15'),
(92, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:23:17', '2019-01-09 16:23:17'),
(93, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:23:17', '2019-01-09 16:23:17'),
(94, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:23:17', '2019-01-09 16:23:17'),
(95, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:23:19', '2019-01-09 16:23:19'),
(96, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:23:19', '2019-01-09 16:23:19'),
(97, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:23:19', '2019-01-09 16:23:19'),
(98, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:24:26', '2019-01-09 16:24:26'),
(99, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:24:26', '2019-01-09 16:24:26'),
(100, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:24:26', '2019-01-09 16:24:26'),
(101, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:24:29', '2019-01-09 16:24:29'),
(102, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:24:29', '2019-01-09 16:24:29'),
(103, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:24:29', '2019-01-09 16:24:29'),
(104, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:24:33', '2019-01-09 16:24:33'),
(105, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:24:33', '2019-01-09 16:24:33'),
(106, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:24:33', '2019-01-09 16:24:33'),
(107, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:24:36', '2019-01-09 16:24:36'),
(108, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:24:36', '2019-01-09 16:24:36'),
(109, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:24:36', '2019-01-09 16:24:36'),
(110, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:24:53', '2019-01-09 16:24:53'),
(111, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:24:53', '2019-01-09 16:24:53'),
(112, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:24:53', '2019-01-09 16:24:53'),
(113, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:25:49', '2019-01-09 16:25:49'),
(114, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:25:49', '2019-01-09 16:25:49'),
(115, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:25:49', '2019-01-09 16:25:49'),
(116, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:25:58', '2019-01-09 16:25:58'),
(117, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:25:58', '2019-01-09 16:25:58'),
(118, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:25:58', '2019-01-09 16:25:58'),
(119, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:26:01', '2019-01-09 16:26:01'),
(120, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:26:01', '2019-01-09 16:26:01'),
(121, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:26:01', '2019-01-09 16:26:01'),
(122, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:26:20', '2019-01-09 16:26:20'),
(123, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:26:20', '2019-01-09 16:26:20'),
(124, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:26:20', '2019-01-09 16:26:20'),
(125, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:27:19', '2019-01-09 16:27:19'),
(126, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:27:19', '2019-01-09 16:27:19'),
(127, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:27:19', '2019-01-09 16:27:19'),
(128, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:27:28', '2019-01-09 16:27:28'),
(129, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:27:28', '2019-01-09 16:27:28'),
(130, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:27:28', '2019-01-09 16:27:28'),
(131, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:30:35', '2019-01-09 16:30:35'),
(132, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:30:35', '2019-01-09 16:30:35'),
(133, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:30:35', '2019-01-09 16:30:35'),
(134, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:30:37', '2019-01-09 16:30:37'),
(135, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:30:37', '2019-01-09 16:30:37'),
(136, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:30:37', '2019-01-09 16:30:37'),
(137, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:30:40', '2019-01-09 16:30:40'),
(138, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:30:40', '2019-01-09 16:30:40'),
(139, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:30:40', '2019-01-09 16:30:40'),
(140, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:31:04', '2019-01-09 16:31:04'),
(141, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:31:04', '2019-01-09 16:31:04'),
(142, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:31:04', '2019-01-09 16:31:04'),
(143, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:31:09', '2019-01-09 16:31:09'),
(144, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:31:09', '2019-01-09 16:31:09'),
(145, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:31:09', '2019-01-09 16:31:09'),
(146, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:31:17', '2019-01-09 16:31:17'),
(147, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:31:17', '2019-01-09 16:31:17'),
(148, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:31:17', '2019-01-09 16:31:17'),
(149, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:31:23', '2019-01-09 16:31:23'),
(150, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:31:23', '2019-01-09 16:31:23'),
(151, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:31:23', '2019-01-09 16:31:23'),
(152, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:31:34', '2019-01-09 16:31:34'),
(153, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:31:34', '2019-01-09 16:31:34'),
(154, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:31:34', '2019-01-09 16:31:34'),
(155, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:32:34', '2019-01-09 16:32:34'),
(156, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:32:34', '2019-01-09 16:32:34'),
(157, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:32:34', '2019-01-09 16:32:34'),
(158, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:32:53', '2019-01-09 16:32:53'),
(159, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:32:53', '2019-01-09 16:32:53'),
(160, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:32:53', '2019-01-09 16:32:53'),
(161, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:32:58', '2019-01-09 16:32:58'),
(162, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:32:58', '2019-01-09 16:32:58'),
(163, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:32:58', '2019-01-09 16:32:58'),
(164, 1, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:35:11', '2019-01-09 16:35:11'),
(165, 1, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:35:11', '2019-01-09 16:35:11'),
(166, 1, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:35:11', '2019-01-09 16:35:11'),
(167, 71, 'Generate report selector', 'generate', 'Start', 0, '2019-01-09 16:35:17', '2019-01-09 16:35:17'),
(168, 71, 'Generate Employee revenue report', 'campaignRevenue', 'Start', 0, '2019-01-09 16:35:17', '2019-01-09 16:35:17'),
(169, 71, 'Split start and end dates', 'splitDates', 'Start', 0, '2019-01-09 16:35:17', '2019-01-09 16:35:17'),
(170, 1, 'Edit New Lead Start', 'edit', 'Start', 0, '2019-01-09 16:43:28', '2019-01-09 16:43:28'),
(171, 1, 'Get branches', 'getBranches', 'Start', 0, '2019-01-09 16:50:03', '2019-01-09 16:50:03'),
(172, 1, 'Create Product', 'Create', 'Start', 0, '2019-01-09 16:54:08', '2019-01-09 16:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generallead_id` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `conversionstatus_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `generallead_id`, `comment`, `conversionstatus_id`, `created_at`, `updated_at`) VALUES
(55, 125, 'Needs more followups', 3, '2019-01-09 15:41:56', '2019-01-09 15:41:56'),
(56, 125, 'Second attempt call', 3, '2019-01-09 16:00:54', '2019-01-09 16:00:54'),
(57, 125, 'The user is positive', 6, '2019-01-09 16:02:54', '2019-01-09 16:02:54'),
(58, 125, 'The client backed off', 2, '2019-01-09 16:07:38', '2019-01-09 16:07:38'),
(59, 125, 'The Client is converted into business', 1, '2019-01-09 16:09:37', '2019-01-09 16:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `generalleads`
--

CREATE TABLE `generalleads` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `marketer_id` int(11) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `conversionstatus_id` int(10) DEFAULT NULL,
  `remarks` int(10) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalleads`
--

INSERT INTO `generalleads` (`id`, `user_id`, `client_id`, `agent_id`, `marketer_id`, `name`, `phone`, `email`, `comment`, `conversionstatus_id`, `remarks`, `revenue`, `status_id`, `branch_id`, `campaign_id`, `product_id`, `created_at`, `updated_at`) VALUES
(125, 70, 12, 71, NULL, NULL, '0779018898', NULL, 'new client', 1, NULL, 1000000, 0, 1, 3, 1, '2019-01-09 15:34:11', '2019-01-09 16:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `incommingleads`
--

CREATE TABLE `incommingleads` (
  `id` int(10) NOT NULL,
  `telnumber` varchar(255) DEFAULT NULL,
  `agent_id` int(10) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incommingleads`
--

INSERT INTO `incommingleads` (`id`, `telnumber`, `agent_id`, `active`, `seen`, `created_at`, `updated_at`) VALUES
(6, '0779018898', 70, 1, 1, '2019-01-09 15:33:27', '2019-01-09 15:33:31'),
(7, '0779018898', 70, 1, 0, '2019-01-09 17:04:00', '2019-01-09 17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `leaddocuments`
--

CREATE TABLE `leaddocuments` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nic_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaddocuments`
--

INSERT INTO `leaddocuments` (`id`, `lead_id`, `nic`, `created_at`, `updated_at`, `nic_comment`) VALUES
(23, 125, NULL, '2019-01-09 15:39:25', '2019-01-09 15:39:25', NULL),
(24, 125, NULL, '2019-01-09 15:41:56', '2019-01-09 15:41:56', NULL),
(25, 125, NULL, '2019-01-09 16:00:54', '2019-01-09 16:00:54', NULL),
(26, 125, NULL, '2019-01-09 16:02:54', '2019-01-09 16:02:54', NULL),
(27, 125, NULL, '2019-01-09 16:07:38', '2019-01-09 16:07:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_04_10_000000_create_users_table', 1),
(2, '2017_04_10_000001_create_password_resets_table', 1),
(3, '2017_04_10_000002_create_social_accounts_table', 1),
(4, '2017_04_10_000003_create_roles_table', 1),
(5, '2017_04_10_000004_create_users_roles_table', 1),
(6, '2017_06_16_000005_create_protection_validations_table', 1),
(7, '2017_06_16_000006_create_protection_shop_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `hasinternal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `active`, `hasinternal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Normal Savings', 'Normal Savings', 1, 0, '2018-12-25 10:07:56', '2018-12-19 08:53:03'),
(2, 1, 'Leasing', 'Leasing', 1, 0, '2018-12-25 10:08:04', '2018-12-19 08:53:27'),
(3, 1, 'Children\'s Savings', 'Children\'s Savings', 1, 0, '2018-12-25 10:08:09', '2018-12-19 08:53:39'),
(4, 1, 'Fixed Saver', 'Fixed Saver', 1, 0, '2018-12-25 10:08:13', '2018-12-19 08:53:49'),
(5, 1, 'Fixed Deposits', 'Fixed Deposits', 1, 0, '2018-12-25 10:08:18', '2018-12-19 08:54:34'),
(6, 1, 'Micro Loans', 'Micro Loans', 1, 0, '2018-12-25 10:08:21', '2018-12-19 08:55:05'),
(7, 1, 'SME Loans', 'SME Loans', 1, 0, '2018-12-25 10:08:24', '2018-12-19 08:55:16'),
(8, 1, 'Personal Loans', 'Personal Loans', 1, 0, '2018-12-25 10:08:28', '2018-12-19 08:55:26'),
(9, 1, 'Pawning', 'Pawning', 1, 0, '2018-12-25 10:08:31', '2018-12-19 08:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `tasks` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `weight`, `tasks`) VALUES
(1, 'Administrator', 0, ''),
(3, 'Branch Manager', 0, NULL),
(4, 'Branch Agent', 0, NULL),
(6, 'Call Agent', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tradeins`
--

CREATE TABLE `tradeins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generallead_Id` int(11) NOT NULL,
  `oldcar` varchar(200) DEFAULT NULL,
  `oldcarvalue` int(10) NOT NULL,
  `newcar` varchar(200) NOT NULL,
  `newcarvalue` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `branch_id`, `name`, `email`, `contact`, `empid`, `password`, `image`, `active`, `confirmation_code`, `confirmed`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Nilaksha Perera', 'nilaksha@enfection.com', '0779018898', 'emp', '$2y$10$aHN/GPwnunQpq6RFxnpuY.bj/zXu54sYG6c3D3SLVmhNFbz9m8QYC', '', 1, '2e538283-3298-4d5b-aaf9-2986c7799b4a', 1, 'Xf5I2hHFpQ6cHxdwPAoiBANr3i0oSfuroAI7BlxS3XgyKUVyAoKO5aYrYSL5', '2018-01-10 03:44:35', '2019-01-08 11:15:15', NULL),
(69, 3, 1, 'Prasanna', 'prasanna@enfection.com', '0777777777', 'enf001', '$2y$10$TdKGIIY6v2nMcGfyJJloLe8jicnpQYOW7So/O0oPpJPXA0SXBIwZa', NULL, 1, NULL, 1, '8zG6LETVTgKHEuL2sy2YF6zdjwJiN81dhTHKQVOTfEVlgUrqyviM9MjeXLQH', '2019-01-09 15:12:10', '2019-01-09 15:12:10', NULL),
(70, 6, 1, 'Rashan', 'rashan@enfection.com', '0777777777', 'enf002', '$2y$10$DT3NgG4DA.u2wY2M5iaGgevOwL.RUvINJY/5/zNy.15ljN5Jhii0K', NULL, 1, NULL, 1, 'Xlw7hIiPHsCPjEHGR8O4Hm8hzCWwkCHUuRmNq4Ue2ZRCVlMIQgvZWJ0zRh4B', '2019-01-09 15:13:27', '2019-01-09 15:13:27', NULL),
(71, 4, 1, 'Pamoda', 'pamoda@enfection.com', '077777777', 'enf003', '$2y$10$vsvjwse/uFByVeZAFAqMXehuoPGtPEuEIKrIAsnvYxRYb6cOAytgC', NULL, 1, NULL, 1, NULL, '2019-01-09 15:15:56', '2019-01-09 15:15:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `campaigntypes`
--
ALTER TABLE `campaigntypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversionstatuses`
--
ALTER TABLE `conversionstatuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `generalleads`
--
ALTER TABLE `generalleads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `incommingleads`
--
ALTER TABLE `incommingleads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaddocuments`
--
ALTER TABLE `leaddocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `tradeins`
--
ALTER TABLE `tradeins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaigntypes`
--
ALTER TABLE `campaigntypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversionstatuses`
--
ALTER TABLE `conversionstatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `generalleads`
--
ALTER TABLE `generalleads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `incommingleads`
--
ALTER TABLE `incommingleads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaddocuments`
--
ALTER TABLE `leaddocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tradeins`
--
ALTER TABLE `tradeins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
