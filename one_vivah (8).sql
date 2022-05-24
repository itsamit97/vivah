-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 03:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one_vivah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `first_name`, `last_name`, `profile`, `role`, `created_at`, `updated_at`) VALUES
(1, 'amit', 'ramteke', '1652517771.jpg', '1', '2022-05-13 07:53:07', '2022-05-14 03:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `bride_profile_tbl`
--

CREATE TABLE `bride_profile_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `reg_bride_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `bride_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_state_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manglik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_tounge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gotra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_state_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prposal_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complexion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passout_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studied_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bride_profile_tbl`
--

INSERT INTO `bride_profile_tbl` (`id`, `role`, `reg_bride_tbl_id`, `bride_profile_id`, `first_name`, `middle_name`, `last_name`, `marital_status_tbl_id`, `birthday`, `age`, `birth_state_tbl_id`, `birth_city`, `birth_name`, `birth_time`, `email`, `mobile_no`, `manglik`, `religion_tbl_id`, `cast`, `mother_tounge`, `sub_cast`, `gotra`, `country`, `current_state_tbl_id`, `current_city`, `proof_identity`, `prposal_status`, `proof_address`, `profile`, `body_type`, `complexion`, `weight`, `height`, `physical_status`, `blood_group`, `drink`, `smoke`, `highest_qualification`, `passout_year`, `studied_from`, `occupation`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '887251', 'sonali', '--', 'routh', '1', '04/10/1996', '26', '5', 'Nagpur', 'amit', '1:10 AM', 'sonali@gmail.com', '9975439948', 'manglik_no', '4', 'mahar', 'marathi', 'mahar', 'i dont know', 'india', '5', 'Nagpur', '1651660922.jpg', NULL, '1651660922.jpg', 'images (1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020', NULL, NULL, '2022-05-04 05:12:02', '2022-05-12 08:13:11'),
(2, '3', '2', '539306', 'amrapali', '---', 'shende', '1', '07/25/1996', '25', '5', 'nagpur', 'amit', '4:16 PM', 'amrapali@gmail.com', '09975439948', 'manglik_no', '4', 'mahar', 'marathi', 'mahar', NULL, 'india', '5', 'Nagpur', '1651661235.jpg', NULL, '1651661235.jpg', '1651661235.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019', NULL, NULL, '2022-05-04 05:17:15', '2022-05-04 05:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `bride_groom`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Self - Male', 'male', '2022-05-02 00:28:33', '2022-05-02 00:28:33'),
(2, 'Self - Female', 'female', '2022-05-02 03:08:51', '2022-05-02 03:08:51'),
(3, 'Son', 'male', '2022-05-02 03:09:00', '2022-05-02 03:09:00'),
(4, 'Sister', 'female', '2022-05-02 03:09:35', '2022-05-02 03:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `groom_profile_tbl`
--

CREATE TABLE `groom_profile_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `reg_groom_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `groom_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_state_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manglik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_tounge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gotra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_state_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complexion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passout_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studied_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groom_profile_tbl`
--

INSERT INTO `groom_profile_tbl` (`id`, `role`, `reg_groom_tbl_id`, `groom_profile_id`, `first_name`, `middle_name`, `last_name`, `marital_status_tbl_id`, `birthday`, `age`, `birth_state_tbl_id`, `birth_city`, `birth_name`, `birth_time`, `email`, `mobile_no`, `manglik`, `religion_tbl_id`, `cast`, `mother_tounge`, `sub_cast`, `gotra`, `country`, `current_state_tbl_id`, `current_city`, `proof_identity`, `proof_address`, `profile`, `body_type`, `complexion`, `weight`, `height`, `physical_status`, `blood_group`, `drink`, `smoke`, `highest_qualification`, `passout_year`, `studied_from`, `occupation`, `created_at`, `updated_at`) VALUES
(2, '2', '1', '631090', 'amitrt', 'mangal', 'ramteke', '1', '04/20/1950', '72', '5', 'nagpur', 'sanket', '5:29 PM', 'amit25@gmail.com', '09975439948', 'manglik_no', '4', 'mahar', 'marathi', 'mahar', 'i dont know', 'india', '5', 'Nagpur', '1651489192.jpg', '1651489192.jpg', 'download (2).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b-com commerce', '2020', 'nagpur', NULL, '2022-05-02 05:29:52', '2022-05-12 07:08:11'),
(3, '2', '2', '676606', 'aky', '--', 'ramteke', '1', '06/17/1987', '34', '5', 'Nagpur', 'akky', '6:24 AM', 'akky@gmail.com', '9645969607', 'manglik_no', '4', 'mahar', 'marathi', 'bodh', '--', 'india', '5', 'Nagpur', '1651582584.webp', '1651582584.webp', '1651582584.webp', 'slim', 'fair', '47', '5 fit', 'good', 'ab+', 'no', 'no', NULL, '2020', NULL, NULL, '2022-05-03 07:26:24', '2022-05-03 07:29:58'),
(4, '2', '3', '107647', 'akshay', '--', 'ramteke', '1', '07/19/1996', '25', '5', 'Nagpur', 'akky', '5:30 PM', 'aramteke103@gmail.com', '9975439948', 'manglik_no', '4', 'mahar', 'marathi', 'mahar', 'i dont know', 'india', '5', 'Nagpur', '1652184100.jpg', '1652184100.jpg', '1652184100.jpg', 'medium', 'medium', '50', '5 ft', NULL, NULL, NULL, NULL, NULL, '2020', NULL, NULL, '2022-05-10 06:31:40', '2022-05-10 06:31:40'),
(5, '2', '4', '693952', 'amit-ramteke', '--', 'ramteke', '1', '06/14/1985', '36', '5', 'Nagpur', 'amit', NULL, 'ramtekea23@gmail.com', '9975439948', 'manglik_no', '4', 'mahar', 'marathi', NULL, NULL, 'india', '5', 'Nagpur', '1652186635.jpg', '1652186635.jpg', 'download (2).jpg', NULL, 'medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019', NULL, NULL, '2022-05-10 07:13:55', '2022-05-12 23:52:48'),
(7, '2', '7', '231120', 'rushabh', '--', 'roy', '1', '05/16/1997', '24', '5', 'Nagpur', 'rushabh', '12:24 PM', NULL, '9975439948', 'manglik_yes', '4', 'mahar', 'marathi', 'mahar', 'i dont know', 'india', '2', 'Nagpur', '1652425080.jpg', '1652425080.jpg', 'pexels-photo-220453.webp', 'slim', 'medium', '50', '5 ft', 'good', 'ab+', 'no', 'no', '--', '2020', 'nagbhid', '---', '2022-05-13 01:28:00', '2022-05-13 01:28:00'),
(8, '2', '8', '743374', 'sameer', '--', 'routh', '1', '07/09/1998', '23', '5', 'lature', 'sameer', '2:10 PM', NULL, '9975439948', 'manglik_no', '4', 'mahar', 'marathi', 'mahar', 'i dont know', 'india', '3', 'Nagpur', '1652427746.jpg', '1652427746.jpg', 'download (3).jpg', 'slim', 'medium', '50', '5 ft', 'good', 'ab+', 'no', 'no', '--', '2019', NULL, NULL, '2022-05-13 02:12:26', '2022-05-13 02:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `marital_status`, `created_at`, `updated_at`) VALUES
(1, 'Single', '2022-05-02 03:15:05', '2022-05-02 03:15:05'),
(2, 'Devorced', '2022-05-02 03:15:14', '2022-05-02 03:15:14'),
(3, 'Devorced && Kind', '2022-05-02 03:15:24', '2022-05-02 03:15:24'),
(4, 'Widowed', '2022-05-02 03:15:30', '2022-05-02 03:15:30'),
(5, 'Widowed && Kind', '2022-05-02 03:15:36', '2022-05-02 03:15:36'),
(6, 'Married', '2022-05-02 03:15:41', '2022-05-02 03:15:41');

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
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2022_04_08_065407_create_grooms_tbl_table', 1),
(17, '2022_04_08_070119_create_brides_tbl_table', 1),
(18, '2022_04_16_063328_create_marital_status_table', 1),
(19, '2022_04_16_071214_create_states_table', 1),
(20, '2022_04_16_075406_create_religions_table', 1),
(21, '2022_04_16_125751_create_bride_profile_tbl_table', 1),
(22, '2022_04_16_130915_create_groom_profile_tbl_table', 1),
(23, '2022_04_23_090724_create_recently_view_profile_table', 1),
(24, '2022_04_26_104237_create_uploade_images', 1),
(25, '2022_04_29_110950_create_proposal_request', 1),
(26, '2022_05_02_051439_create_genders', 1),
(27, '2022_05_13_131153_create_admin_profile', 2);

-- --------------------------------------------------------

--
-- Table structure for table `proposal_request`
--

CREATE TABLE `proposal_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposed_by_groom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'groom',
  `proposed_by_bride` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride',
  `proposed_by_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride 3; Groom 2',
  `proposed_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Groom; Bride',
  `proposed_to_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride 3; Groom 2',
  `proposel_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'True:1 \r\nFalse:0 Not Request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_request`
--

INSERT INTO `proposal_request` (`id`, `proposed_by_groom`, `proposed_by_bride`, `proposed_by_role`, `proposed_to`, `proposed_to_role`, `proposel_status`, `created_at`, `updated_at`) VALUES
(1, '2', NULL, '2', '1', '3', '1', '2022-05-12 23:06:38', '2022-05-12 23:06:38'),
(2, NULL, '1', '3', '5', '2', '1', '2022-05-12 23:56:19', '2022-05-12 23:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `recently_view_profile`
--

CREATE TABLE `recently_view_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Who View Profile',
  `visitor_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom Id',
  `visited_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 Groom; 3:Bride',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_view_profile`
--

INSERT INTO `recently_view_profile` (`id`, `visitor_user_id`, `visitor_role`, `visited_id`, `visited_role`, `created_at`, `updated_at`) VALUES
(1, '3', '3', '5', '2', '2022-05-13 01:12:23', '2022-05-13 01:12:23'),
(2, '3', '3', '5', '2', '2022-05-13 01:45:02', '2022-05-13 01:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `registration_brides_tbl`
--

CREATE TABLE `registration_brides_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `add_bride_groom_table_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Registration For',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_brides_tbl`
--

INSERT INTO `registration_brides_tbl` (`id`, `add_bride_groom_table_id`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(1, '2', 'sonali@gmail.com', '$2y$10$dQCsC6oVhkj2Mp2N8jxwGe9PI0jdOT2ViSmBV2QpnSnQQNBDYbym2', 'female', '3', '2022-05-02 05:32:31', '2022-05-02 05:32:31'),
(2, '2', 'amrapali@gmail.com', '$2y$10$xAtRH2kgfo0USGi1Gxg3ju/Y2zjjVKrqKTfvtQLeGQ43D3awb5kyO', 'female', '3', '2022-05-03 04:16:36', '2022-05-03 04:16:36'),
(3, '2', 'ruchali@gmail.com', '$2y$10$6vvLqF2oFqj85zFMkAJHlOIEm8BCN5OIvzywFCyVjQd6IHJSPeD6e', 'female', '3', '2022-05-13 02:57:00', '2022-05-13 02:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration_grooms_tbl`
--

CREATE TABLE `registration_grooms_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `add_bride_groom_table_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Registration For ',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_grooms_tbl`
--

INSERT INTO `registration_grooms_tbl` (`id`, `add_bride_groom_table_id`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(1, '1', 'amit@gmail.com', '$2y$10$HdN5qDjEyHHOksoZW.TEPe6gdau7LHEEJU0vp8jfT11ko2lPl7VcK', 'male', '2', '2022-05-02 03:14:18', '2022-05-02 03:14:18'),
(2, '1', 'akky@gmail.com', '$2y$10$KQmuO9buF1sRYaTqycIvQ.HccZ4VHZKdI9amiFa0V1asq276HuVyu', 'male', '2', '2022-05-03 07:15:58', '2022-05-03 07:15:58'),
(3, '1', 'aramteke103@gmail.com', '$2y$10$6gC26BlGFVxPwhGt47SzLO9a31VgiEWglX3uFhlrTG3KzIwATMpgq', 'male', '2', '2022-05-10 06:15:32', '2022-05-10 06:15:32'),
(4, '1', 'ramtekea23@gmail.com', '$2y$10$31e8d6wM/mm3/aychLeRjuUYkOZy6nk6sLN2fta2elMXZtyyLgXJm', 'male', '2', '2022-05-10 07:10:23', '2022-05-10 07:10:23'),
(5, '1', 'swity@gmail.com', '$2y$10$wIWD9dF/dCaSK2Md17.c5OY9CIkfxhfXpB6szIxTvurYdnAzEeQgO', 'male', '2', '2022-05-12 05:26:23', '2022-05-12 05:26:23'),
(6, '1', 'swity@gmail.com', '$2y$10$qSG1743FQV6jS0SxzwOWoOTNuiQ1pfaaK2wE2UEFRz5.Z4wdOBPGe', 'male', '2', '2022-05-12 23:48:04', '2022-05-12 23:48:04'),
(7, '1', 'rushbh@gmail.com', '$2y$10$NRXzKcuhs6eYrm14Rd/dJ.Pvw8hma62xSPys1BRvMS73t4BDn9zRC', 'male', '2', '2022-05-13 01:19:00', '2022-05-13 01:19:00'),
(8, '1', 'sameer@gmail.com', '$2y$10$ECKrnJQ/pp28MFO8ejpQi.Hz7KUNVe0iZTdvYwCCPOlJzkaaK/Giy', 'male', '2', '2022-05-13 02:07:54', '2022-05-13 02:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `religion`, `created_at`, `updated_at`) VALUES
(1, 'Christians', '2022-05-02 03:16:29', '2022-05-02 03:16:29'),
(2, 'Muslims', '2022-05-02 03:16:35', '2022-05-02 03:16:35'),
(3, 'Hindus', '2022-05-02 03:16:43', '2022-05-02 03:16:43'),
(4, 'Buddhists', '2022-05-02 03:16:56', '2022-05-02 03:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', '2022-05-02 03:15:52', '2022-05-02 03:15:52'),
(2, 'Arunachal Pradesh', '2022-05-02 03:15:58', '2022-05-02 03:15:58'),
(3, 'Assam', '2022-05-02 03:16:05', '2022-05-02 03:16:05'),
(4, 'Bihar', '2022-05-02 03:16:10', '2022-05-02 03:16:10'),
(5, 'Maharashtra', '2022-05-02 03:16:19', '2022-05-02 03:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded`
--

CREATE TABLE `uploaded` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_groom_profile_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 Groom; 3:Bride',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom ',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom ',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploaded`
--

INSERT INTO `uploaded` (`id`, `bride_groom_profile_id`, `user_tbl_id`, `bride_groom_profile_role`, `first_name`, `last_name`, `profile_image`, `created_at`, `updated_at`) VALUES
(3, '2', '2', '2', 'amitrt', 'ramteke', 'download.jpg', '2022-05-12 22:47:36', '2022-05-12 22:47:36'),
(4, '2', '2', '2', 'amitrt', 'ramteke', 'download (3).jpg', '2022-05-12 22:48:14', '2022-05-12 22:48:14'),
(5, '1', '3', '3', 'sonali', 'routh', 'download (4).jpg', '2022-05-12 22:48:53', '2022-05-12 22:48:53'),
(6, '5', '7', '2', 'amit-ramteke', 'ramteke', 'download (2).jpg', '2022-05-13 01:09:58', '2022-05-13 01:09:58'),
(7, '8', '11', '2', 'sameer', 'routh', 'download (1).jpg', '2022-05-13 02:12:45', '2022-05-13 02:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_groom_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_bride_tbl_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 SuperAdmin, 2 Groom, 3 Bride',
  `bride_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `show_password`, `reg_groom_tbl_id`, `reg_bride_tbl_id`, `role`, `bride_profile_id`, `groom_profile_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin@gmail.com ', '$2y$10$evsTqnEyvqLd1MFDfYiFC.ZLhTL6TUoIU2xS7cqzx4uRCoj1egmWy', 'password', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(2, 'amit@gmail.com', '$2y$10$lT0g7UAul9sLoCAQaj0av.dkb418TzXoOj.XUJj0e9AH3ihTULMCe', 'password', '1', NULL, '2', NULL, '631090', NULL, '2022-05-02 03:14:18', '2022-05-02 05:29:52'),
(3, 'sonali@gmail.com', '$2y$10$ldRXonwWcGpsRZinF/rOA.NSd.NaZXkR2r113gWaCH8C3/6SlXxru', 'password', NULL, '1', '3', '887251', NULL, NULL, '2022-05-02 05:32:31', '2022-05-04 05:12:02'),
(4, 'amrapali@gmail.com', '$2y$10$QWBLrxI7/xRvegQ9C078QO6l4o93Pj7.OfJSYsDmhztuc7gbIqAny', 'password', NULL, '2', '3', '539306', NULL, NULL, '2022-05-03 04:16:36', '2022-05-04 05:17:15'),
(5, 'akky@gmail.com', '$2y$10$L4aVJZzRODUketEi97eA8u5aaI4Ps8/qhO22/ScyqR4Su8mMW.7oG', 'password', '2', NULL, '2', NULL, '676606', NULL, '2022-05-03 07:15:58', '2022-05-03 07:26:24'),
(6, 'aramteke103@gmail.com', '$2y$10$LE6.TyG4um8KYZG/TjrHJOOGdG/.bVvOwsUrbjEsehbnx6F3peduy', 'password', '3', NULL, '2', NULL, '107647', NULL, '2022-05-10 06:15:32', '2022-05-10 06:31:40'),
(7, 'ramtekea23@gmail.com', '$2y$10$Jqporb7JoGUEm1Rsd9Fs6ugNHcrTMvP3gbn1COufN4Ys/ml/uowYi', 'password', '4', NULL, '2', NULL, '693952', NULL, '2022-05-10 07:10:23', '2022-05-10 07:13:55'),
(9, 'swity@gmail.com', '$2y$10$IvPL9RDz71/aSKQRk99XVOrz7OqbAGHYk.ezIXb7qsa9E28OSGRwu', 'password', '6', NULL, '2', NULL, NULL, NULL, '2022-05-12 23:48:04', '2022-05-12 23:48:04'),
(10, 'rushbh@gmail.com', '$2y$10$Dm9YIKXG6gA5lObTKJr1sOyDcX59zxLBYziYoprVeNtV84YHr6C7e', 'password', '7', NULL, '2', NULL, '231120', NULL, '2022-05-13 01:19:00', '2022-05-13 01:28:00'),
(11, 'sameer@gmail.com', '$2y$10$SGu7HHrvZcEWHYPKiaof1ON/KpLwm9EBnacP63BPKtVlmHDap6v4.', 'password', '8', NULL, '2', NULL, '743374', NULL, '2022-05-13 02:07:54', '2022-05-13 02:12:26'),
(12, 'ruchali@gmail.com', '$2y$10$m7X1QpRBhcCB2JfYaPJ.1ubHELs5evh.N55MUCZM/FBkcYaGvod.2', 'password', NULL, '3', '3', NULL, NULL, NULL, '2022-05-13 02:57:00', '2022-05-13 02:57:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bride_profile_tbl`
--
ALTER TABLE `bride_profile_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groom_profile_tbl`
--
ALTER TABLE `groom_profile_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_request`
--
ALTER TABLE `proposal_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_view_profile`
--
ALTER TABLE `recently_view_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_brides_tbl`
--
ALTER TABLE `registration_brides_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_grooms_tbl`
--
ALTER TABLE `registration_grooms_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded`
--
ALTER TABLE `uploaded`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bride_profile_tbl`
--
ALTER TABLE `bride_profile_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groom_profile_tbl`
--
ALTER TABLE `groom_profile_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `proposal_request`
--
ALTER TABLE `proposal_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recently_view_profile`
--
ALTER TABLE `recently_view_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_brides_tbl`
--
ALTER TABLE `registration_brides_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_grooms_tbl`
--
ALTER TABLE `registration_grooms_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE `uploaded`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
