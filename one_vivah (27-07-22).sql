-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `blood_group`, `created_at`, `updated_at`) VALUES
(2, 'A+', '2022-07-25 01:38:26', '2022-07-25 01:38:26'),
(3, 'A-', '2022-07-25 01:38:43', '2022-07-25 01:38:43'),
(4, 'B+', '2022-07-25 01:39:28', '2022-07-25 01:39:28'),
(5, 'B-', '2022-07-25 01:39:36', '2022-07-25 01:39:36'),
(6, 'Ab+', '2022-07-25 01:39:47', '2022-07-25 01:39:47'),
(7, 'Ab-', '2022-07-25 01:40:03', '2022-07-25 01:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `bride_profile_tbl`
--

CREATE TABLE `bride_profile_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `reg_bride_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `bride_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_state_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manglik` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_tounge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gotra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_state_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complexion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passout_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studied_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_introduce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employed_in` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_income` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bride_profile_tbl`
--

INSERT INTO `bride_profile_tbl` (`id`, `role`, `reg_bride_tbl_id`, `bride_profile_id`, `first_name`, `middle_name`, `last_name`, `marital_status_tbl_id`, `birthday`, `age`, `birth_state_tbl_id`, `birth_city`, `birth_name`, `birth_time`, `email`, `mobile_no`, `manglik`, `religion_tbl_id`, `cast`, `mother_tounge`, `sub_cast`, `gotra`, `country`, `current_state_tbl_id`, `current_city`, `proof_identity`, `proof_address`, `profile`, `body_type`, `complexion`, `weight`, `height`, `physical_status`, `blood_group_tbl_id`, `drink`, `smoke`, `highest_qualification`, `passout_year`, `studied_from`, `occupation`, `self_introduce`, `employed_in`, `annual_income`, `organization_name`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '808392', 'sonali', '--', 'routh', '1', '06/27/2003', '19', '1', 'nagpur', 'sanket', '12:03 AM', 'sonali@gmail.com', '9545969607', NULL, '1', 'buddha', 'marathi', '--', NULL, 'india', '1', 'nagpur', '1658723638.jpg', '1658723638.jpg', 'download (2).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'm-com', '2020', 'nagpur', NULL, NULL, NULL, NULL, NULL, '2022-07-24 23:03:58', '2022-07-24 23:03:58'),
(2, '3', '2', '122462', 'ruchita', '--', 'routh', '1', '05/30/1984', '38', '1', 'nagpur', 'ruchita', '1:06 PM', 'ruchita@gmail.com', '9545969607', 'manglik_no', '1', 'buddha', 'marathi', '--', '---', 'india', '1', 'nagpur', '1658753075.jpg', '1658753075.jpg', 'download (2).jpg', 'slim', 'fair', '45kg', '5fit', 'no', '2', 'no', 'no', 'm-com', '2020', 'nagpur', 'teacher', 'Enter IntroI belong to a well-mannered middle-class family and strongly believe in Hindu culture, rituals & holds an open-minded personality. I\'m a pure vegetarian and never not drank or smoked. I\'m Affectionate, kind-hearted, Caring, Happy & belives in Hard Working and creativity. My hobbies are Reading, Dancing, Watch Online Documentaries and Learn New Things.duce Your Self..', 'self employee', '2lakh', 'it network', '2022-07-25 07:14:35', '2022-07-25 07:14:35'),
(3, '3', '3', '784910', 'amrapali', '--', 'ambade', '1', '07/09/1998', '24', '1', 'nagpur', 'amrapali', '12:03 AM', 'amrapali@gmail.com', '9545969607', 'manglik_no', '1', 'buddha', 'marathi', '--', '---', 'india', '1', 'nagpur', '1658810056.jpg', '1658810056.jpg', '67d7c9b0-2999-493d-9e41-2fe56824cb38.jpg', 'medium', 'fair', '45kg', '5fit', 'good', '2', 'no', 'no', 'm-com', '2020', 'nagpur', 'teacher', 'I am a kind-hearted, simple person living in Pune, qualified as a Chartered Accountant (CA) & completed study of B.Com . I am working as a Senior Associate in Tata Motors Pune. I have interests in reading, watching movies, traveling to new places, and listening to music.     I am a strong believer in equality amongst all of us and one can make this world a better place through a small act of kindness.', 'self employee', '2lakh', 'it network', '2022-07-25 23:04:16', '2022-07-25 23:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover_profiles`
--

CREATE TABLE `cover_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_groom_profile_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 Groom; 3:Bride',
  `cover_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_profiles`
--

INSERT INTO `cover_profiles` (`id`, `bride_groom_profile_id`, `bride_groom_profile_role`, `cover_profile`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '1658749512.jpg', '2022-07-25 06:15:12', '2022-07-25 06:15:12'),
(2, '3', '3', '1658827235.jpg', '2022-07-26 03:48:16', '2022-07-26 03:50:35');

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
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_groom_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `bride_groom_id`, `bride_groom_role`, `mother_occupation`, `father_occupation`, `family_member`, `family_income`, `state_id`, `city`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 'teacher', 'engineer', 'father,mother,brother', 'Rs 1 Lakh', '1', 'nagpur', '2022-07-24 22:59:53', '2022-07-24 22:59:53'),
(2, '1', '3', 'teacher', 'engineer', 'father,mother,brother,sister', 'Rs 1 - 2 Lakh', '1', 'nagpur', '2022-07-24 23:04:47', '2022-07-24 23:04:47'),
(3, '2', '3', 'teacher', 'engineer', 'father,mother,brother', 'Rs 4 Lakh', 'Select States', 'nagpur', '2022-07-25 07:17:46', '2022-07-25 07:17:46'),
(4, '3', '3', 'teacher', 'engineer', 'father,mother,brother,sister', 'Rs 4 Lakh', '1', 'nagpur', '2022-07-25 23:17:51', '2022-07-25 23:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `bride_groom`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Self -male', 'male', '2022-07-24 22:49:31', '2022-07-24 22:49:31'),
(2, 'Self -female', 'female', '2022-07-24 22:50:35', '2022-07-24 22:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `groom_profile_tbl`
--

CREATE TABLE `groom_profile_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `reg_groom_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `groom_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_state_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manglik` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_tounge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gotra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_state_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complexion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passout_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studied_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_introduce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employed_in` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_income` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groom_profile_tbl`
--

INSERT INTO `groom_profile_tbl` (`id`, `role`, `reg_groom_tbl_id`, `groom_profile_id`, `first_name`, `middle_name`, `last_name`, `marital_status_tbl_id`, `birthday`, `age`, `birth_state_tbl_id`, `birth_city`, `birth_name`, `birth_time`, `email`, `mobile_no`, `manglik`, `religion_tbl_id`, `cast`, `mother_tounge`, `sub_cast`, `gotra`, `country`, `current_state_tbl_id`, `current_city`, `proof_identity`, `proof_address`, `profile`, `body_type`, `complexion`, `weight`, `height`, `physical_status`, `blood_group_tbl_id`, `drink`, `smoke`, `highest_qualification`, `passout_year`, `studied_from`, `occupation`, `self_introduce`, `employed_in`, `annual_income`, `organization_name`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '999955', 'amit', 'mangal', 'ramteke', '1', '10/25/1984', '37', '1', 'nagpur', 'sanket', '12:54 AM', 'ramtekea23@gmail.com', '9545969607', 'manglik_no', '1', 'buddha', NULL, '--', '---', 'india', '1', 'nagpur', '1658723133.jpg', '1658723133.jpg', 'download (2).jpg', 'slim', 'fair', '45kg', NULL, 'good', NULL, NULL, NULL, 'm-com', '2021', 'nagpur', NULL, 'I come from a middle-class family. The most important thing in my life is religious beliefs, moral values & respect for elders. I\'m an easy-going, sincere,  caring person with a strong work ethic. I\'m a modern thinker and follow good values given by our ancestors. I like Painting, love traveling wit', NULL, NULL, NULL, '2022-07-24 22:55:33', '2022-07-26 01:20:51'),
(3, '2', '2', '284350', 'sangarsh', '--', 'meshram', '1', '06/18/1998', '24', '1', NULL, NULL, NULL, 'sangarsh@gmail.com', '9545969607', 'manglik_no', '1', 'buddha', 'marathi', '--', '---', 'india', '1', 'nagpur', '1658751717.jpg', '1658751717.jpg', 'download (1).jpg', 'slim', 'fair', '45kg', '5fit', 'no', '2', 'occasionally', 'no', 'm-com', '2020', 'nagpur', 'engineer', NULL, 'self employee', '2lakh', 'it network', '2022-07-25 06:51:57', '2022-07-25 06:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `marital_status`, `created_at`, `updated_at`) VALUES
(1, 'Single', '2022-07-24 22:51:40', '2022-07-24 22:51:40'),
(2, 'Widowed', '2022-07-24 22:51:47', '2022-07-24 22:51:47'),
(3, 'Married', '2022-07-24 22:52:26', '2022-07-24 22:52:26');

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
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2022_04_08_065407_create_grooms_tbl_table', 1),
(54, '2022_04_08_070119_create_brides_tbl_table', 1),
(55, '2022_04_16_063328_create_marital_status_table', 1),
(56, '2022_04_16_071214_create_states_table', 1),
(57, '2022_04_16_075406_create_religions_table', 1),
(58, '2022_04_16_125751_create_bride_profile_tbl_table', 1),
(59, '2022_04_16_130915_create_groom_profile_tbl_table', 1),
(60, '2022_04_23_090724_create_recently_view_profile_table', 1),
(61, '2022_04_26_104237_create_uploade_images', 1),
(62, '2022_04_29_110950_create_proposal_request', 1),
(63, '2022_05_02_051439_create_genders', 1),
(64, '2022_05_13_131153_create_admin_profile', 1),
(65, '2022_06_21_999999_add_active_status_to_users', 1),
(66, '2022_06_21_999999_add_avatar_to_users', 1),
(67, '2022_06_21_999999_add_dark_mode_to_users', 1),
(68, '2022_06_21_999999_add_messenger_color_to_users', 1),
(69, '2022_06_21_999999_create_favorites_table', 1),
(70, '2022_06_21_999999_create_messages_table', 1),
(71, '2022_06_23_082508_add_name_to_user_table', 1),
(72, '2022_06_23_115902_add_profile_to_users_table', 1),
(73, '2022_06_28_071611_create_cover_profiles_table', 1),
(74, '2022_07_01_071133_create_family_details_table', 1),
(75, '2022_07_01_103543_create_patner_preference_table', 1),
(76, '2022_07_25_062726_create_blood_groups_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partner_preference`
--

CREATE TABLE `partner_preference` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_groom_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complexion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_preference`
--

INSERT INTO `partner_preference` (`id`, `bride_groom_id`, `bride_groom_role`, `age`, `marital_status_id`, `complexion`, `height`, `cast`, `state_id`, `religion_id`, `education`, `occupation`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '25 - 30', '1', 'black', '5fit', 'buddha', '1', '1', 'b-com', 'teacher', '2022-07-24 22:55:56', '2022-07-26 01:20:26'),
(2, '1', '3', '25 - 30', '1', 'fair', '5fit', 'buddha', '1', '1', 'm-com', 'teacher', '2022-07-24 23:04:28', '2022-07-24 23:04:28'),
(3, '2', '3', '25', '1', 'fair', '5fit', 'buddha', '1', '1', 'm-com', 'teacher', '2022-07-25 07:17:23', '2022-07-25 07:17:23'),
(5, '3', '3', '25', '1', 'fair', '5fit', 'buddha', '1', '1', 'b-com', 'teachersvy7yrtfy', '2022-07-26 00:42:16', '2022-07-26 03:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_request`
--

CREATE TABLE `proposal_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposed_by_groom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'groom',
  `proposed_by_bride` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride',
  `proposed_by_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride 3; Groom 2',
  `proposed_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Groom; Bride',
  `proposed_to_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride 3; Groom 2',
  `proposel_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_request`
--

INSERT INTO `proposal_request` (`id`, `proposed_by_groom`, `proposed_by_bride`, `proposed_by_role`, `proposed_to`, `proposed_to_role`, `proposel_status`, `created_at`, `updated_at`) VALUES
(13, '1', NULL, '2', '1', '3', '0', '2022-07-27 00:35:12', '2022-07-27 00:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `recently_view_profile`
--

CREATE TABLE `recently_view_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Who View Profile',
  `visitor_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom Id',
  `visited_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 Groom; 3:Bride',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_view_profile`
--

INSERT INTO `recently_view_profile` (`id`, `visitor_user_id`, `visitor_role`, `visited_id`, `visited_role`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '3', '2022-07-26 03:39:59', '2022-07-26 03:39:59'),
(2, '1', '2', '1', '3', '2022-07-26 03:52:52', '2022-07-26 03:52:52'),
(3, '1', '2', '1', '3', '2022-07-26 03:53:08', '2022-07-26 03:53:08'),
(4, '1', '2', '1', '3', '2022-07-26 04:25:04', '2022-07-26 04:25:04'),
(5, '1', '2', '1', '3', '2022-07-26 04:25:18', '2022-07-26 04:25:18'),
(6, '1', '2', '1', '3', '2022-07-26 04:26:30', '2022-07-26 04:26:30'),
(7, '1', '2', '1', '3', '2022-07-26 04:31:00', '2022-07-26 04:31:00'),
(8, '1', '2', '1', '3', '2022-07-26 04:31:26', '2022-07-26 04:31:26'),
(9, '1', '2', '1', '3', '2022-07-26 04:31:41', '2022-07-26 04:31:41'),
(10, '1', '2', '1', '3', '2022-07-26 04:31:58', '2022-07-26 04:31:58'),
(11, '1', '2', '1', '3', '2022-07-26 04:32:15', '2022-07-26 04:32:15'),
(12, '1', '2', '1', '3', '2022-07-26 04:34:44', '2022-07-26 04:34:44'),
(13, '1', '2', '1', '3', '2022-07-26 04:34:55', '2022-07-26 04:34:55'),
(14, '1', '2', '1', '3', '2022-07-26 04:44:09', '2022-07-26 04:44:09'),
(15, '1', '2', '1', '3', '2022-07-26 04:44:59', '2022-07-26 04:44:59'),
(16, '1', '2', '1', '3', '2022-07-26 04:45:20', '2022-07-26 04:45:20'),
(17, '1', '2', '1', '3', '2022-07-26 04:46:55', '2022-07-26 04:46:55'),
(18, '1', '2', '1', '3', '2022-07-26 04:54:32', '2022-07-26 04:54:32'),
(19, '1', '2', '1', '3', '2022-07-26 04:54:54', '2022-07-26 04:54:54'),
(20, '1', '2', '1', '3', '2022-07-26 04:55:12', '2022-07-26 04:55:12'),
(21, '1', '2', '1', '3', '2022-07-26 04:55:52', '2022-07-26 04:55:52'),
(22, '1', '2', '1', '3', '2022-07-26 04:56:30', '2022-07-26 04:56:30'),
(23, '1', '2', '1', '3', '2022-07-26 04:58:58', '2022-07-26 04:58:58'),
(24, '1', '2', '1', '3', '2022-07-26 04:59:38', '2022-07-26 04:59:38'),
(25, '1', '2', '1', '3', '2022-07-26 05:01:02', '2022-07-26 05:01:02'),
(26, '1', '2', '1', '3', '2022-07-26 05:01:15', '2022-07-26 05:01:15'),
(27, '1', '2', '2', '3', '2022-07-26 05:06:49', '2022-07-26 05:06:49'),
(28, '1', '2', '3', '3', '2022-07-26 05:07:07', '2022-07-26 05:07:07'),
(29, '1', '2', '3', '3', '2022-07-26 05:08:10', '2022-07-26 05:08:10'),
(30, '1', '2', '3', '3', '2022-07-26 05:11:16', '2022-07-26 05:11:16'),
(31, '1', '2', '3', '3', '2022-07-26 05:17:46', '2022-07-26 05:17:46'),
(32, '1', '2', '3', '3', '2022-07-26 05:18:49', '2022-07-26 05:18:49'),
(33, '1', '2', '3', '3', '2022-07-26 05:38:27', '2022-07-26 05:38:27'),
(34, '1', '2', '3', '3', '2022-07-26 05:40:04', '2022-07-26 05:40:04'),
(35, '1', '2', '3', '3', '2022-07-26 05:43:45', '2022-07-26 05:43:45'),
(36, '1', '2', '3', '3', '2022-07-26 05:44:10', '2022-07-26 05:44:10'),
(37, '1', '2', '3', '3', '2022-07-26 05:48:57', '2022-07-26 05:48:57'),
(38, '1', '2', '3', '3', '2022-07-26 05:49:23', '2022-07-26 05:49:23'),
(39, '1', '2', '3', '3', '2022-07-26 05:49:29', '2022-07-26 05:49:29'),
(40, '1', '2', '3', '3', '2022-07-26 05:49:33', '2022-07-26 05:49:33'),
(41, '1', '2', '3', '3', '2022-07-26 05:50:13', '2022-07-26 05:50:13'),
(42, '1', '2', '3', '3', '2022-07-26 05:50:30', '2022-07-26 05:50:30'),
(43, '1', '2', '3', '3', '2022-07-26 05:50:33', '2022-07-26 05:50:33'),
(44, '1', '2', '3', '3', '2022-07-26 05:50:38', '2022-07-26 05:50:38'),
(45, '1', '2', '3', '3', '2022-07-26 05:52:04', '2022-07-26 05:52:04'),
(46, '1', '2', '1', '3', '2022-07-26 05:52:16', '2022-07-26 05:52:16'),
(47, '1', '2', '3', '3', '2022-07-26 05:52:38', '2022-07-26 05:52:38'),
(48, '1', '2', '3', '3', '2022-07-26 05:59:30', '2022-07-26 05:59:30'),
(49, '1', '2', '3', '3', '2022-07-26 06:00:25', '2022-07-26 06:00:25'),
(50, '1', '2', '3', '3', '2022-07-26 06:01:16', '2022-07-26 06:01:16'),
(51, '1', '2', '3', '3', '2022-07-26 06:03:38', '2022-07-26 06:03:38'),
(52, '1', '2', '3', '3', '2022-07-26 06:06:02', '2022-07-26 06:06:02'),
(53, '1', '2', '3', '3', '2022-07-26 06:06:17', '2022-07-26 06:06:17'),
(54, '1', '2', '3', '3', '2022-07-26 06:07:56', '2022-07-26 06:07:56'),
(55, '1', '2', '3', '3', '2022-07-26 06:08:16', '2022-07-26 06:08:16'),
(56, '1', '2', '3', '3', '2022-07-26 06:10:47', '2022-07-26 06:10:47'),
(57, '1', '2', '3', '3', '2022-07-26 06:11:43', '2022-07-26 06:11:43'),
(58, '1', '2', '3', '3', '2022-07-26 06:26:31', '2022-07-26 06:26:31'),
(59, '1', '2', '3', '3', '2022-07-26 06:36:03', '2022-07-26 06:36:03'),
(60, '1', '2', '3', '3', '2022-07-26 06:39:00', '2022-07-26 06:39:00'),
(61, '1', '2', '2', '3', '2022-07-26 06:39:38', '2022-07-26 06:39:38'),
(62, '1', '2', '2', '3', '2022-07-26 06:40:01', '2022-07-26 06:40:01'),
(63, '1', '2', '2', '3', '2022-07-26 06:41:48', '2022-07-26 06:41:48'),
(64, '1', '2', '2', '3', '2022-07-26 06:52:44', '2022-07-26 06:52:44'),
(65, '1', '2', '2', '3', '2022-07-26 06:53:25', '2022-07-26 06:53:25'),
(66, '1', '2', '2', '3', '2022-07-26 06:54:24', '2022-07-26 06:54:24'),
(67, '1', '2', '2', '3', '2022-07-26 07:04:06', '2022-07-26 07:04:06'),
(68, '1', '2', '2', '3', '2022-07-26 07:04:13', '2022-07-26 07:04:13'),
(69, '1', '2', '2', '3', '2022-07-26 07:04:53', '2022-07-26 07:04:53'),
(70, '1', '2', '2', '3', '2022-07-26 07:05:01', '2022-07-26 07:05:01'),
(71, '1', '2', '2', '3', '2022-07-26 07:08:29', '2022-07-26 07:08:29'),
(72, '1', '2', '2', '3', '2022-07-26 07:09:05', '2022-07-26 07:09:05'),
(73, '1', '2', '2', '3', '2022-07-26 07:10:16', '2022-07-26 07:10:16'),
(74, '1', '2', '2', '3', '2022-07-26 07:11:20', '2022-07-26 07:11:20'),
(75, '1', '2', '2', '3', '2022-07-26 07:12:43', '2022-07-26 07:12:43'),
(76, '1', '2', '2', '3', '2022-07-26 07:13:09', '2022-07-26 07:13:09'),
(77, '1', '2', '2', '3', '2022-07-26 07:13:43', '2022-07-26 07:13:43'),
(78, '1', '2', '2', '3', '2022-07-26 07:15:24', '2022-07-26 07:15:24'),
(79, '1', '2', '2', '3', '2022-07-26 07:17:24', '2022-07-26 07:17:24'),
(80, '1', '2', '2', '3', '2022-07-26 07:19:30', '2022-07-26 07:19:30'),
(81, '1', '2', '2', '3', '2022-07-26 07:19:48', '2022-07-26 07:19:48'),
(82, '1', '2', '2', '3', '2022-07-26 07:20:10', '2022-07-26 07:20:10'),
(83, '1', '2', '2', '3', '2022-07-26 07:22:49', '2022-07-26 07:22:49'),
(84, '1', '2', '2', '3', '2022-07-26 07:23:09', '2022-07-26 07:23:09'),
(85, '1', '2', '2', '3', '2022-07-26 07:24:15', '2022-07-26 07:24:15'),
(86, '1', '2', '2', '3', '2022-07-26 07:25:35', '2022-07-26 07:25:35'),
(87, '1', '2', '2', '3', '2022-07-26 07:25:54', '2022-07-26 07:25:54'),
(88, '1', '2', '2', '3', '2022-07-26 07:26:08', '2022-07-26 07:26:08'),
(89, '1', '2', '2', '3', '2022-07-26 07:26:34', '2022-07-26 07:26:34'),
(90, '1', '2', '2', '3', '2022-07-26 07:26:40', '2022-07-26 07:26:40'),
(91, '1', '2', '2', '3', '2022-07-26 07:26:53', '2022-07-26 07:26:53'),
(92, '1', '2', '2', '3', '2022-07-26 07:28:22', '2022-07-26 07:28:22'),
(93, '1', '2', '2', '3', '2022-07-26 07:28:31', '2022-07-26 07:28:31'),
(94, '1', '2', '2', '3', '2022-07-26 07:28:54', '2022-07-26 07:28:54'),
(95, '1', '2', '2', '3', '2022-07-26 07:29:12', '2022-07-26 07:29:12'),
(96, '1', '2', '2', '3', '2022-07-26 07:29:33', '2022-07-26 07:29:33'),
(97, '1', '2', '2', '3', '2022-07-26 07:29:48', '2022-07-26 07:29:48'),
(98, '1', '2', '2', '3', '2022-07-26 07:32:29', '2022-07-26 07:32:29'),
(99, '1', '2', '2', '3', '2022-07-26 07:33:01', '2022-07-26 07:33:01'),
(100, '1', '2', '2', '3', '2022-07-26 07:34:00', '2022-07-26 07:34:00'),
(101, '1', '2', '2', '3', '2022-07-26 07:38:42', '2022-07-26 07:38:42'),
(102, '1', '2', '2', '3', '2022-07-26 07:39:01', '2022-07-26 07:39:01'),
(103, '1', '2', '2', '3', '2022-07-26 07:40:34', '2022-07-26 07:40:34'),
(104, '1', '2', '2', '3', '2022-07-26 07:41:06', '2022-07-26 07:41:06'),
(105, '1', '2', '2', '3', '2022-07-26 07:41:49', '2022-07-26 07:41:49'),
(106, '1', '2', '2', '3', '2022-07-26 07:43:03', '2022-07-26 07:43:03'),
(107, '1', '2', '2', '3', '2022-07-26 07:43:30', '2022-07-26 07:43:30'),
(108, '1', '2', '2', '3', '2022-07-26 07:47:15', '2022-07-26 07:47:15'),
(109, '1', '2', '2', '3', '2022-07-26 07:48:30', '2022-07-26 07:48:30'),
(110, '1', '2', '2', '3', '2022-07-26 07:53:13', '2022-07-26 07:53:13'),
(111, '1', '2', '2', '3', '2022-07-26 07:54:15', '2022-07-26 07:54:15'),
(112, '1', '2', '2', '3', '2022-07-26 07:55:14', '2022-07-26 07:55:14'),
(113, '1', '2', '2', '3', '2022-07-26 07:56:03', '2022-07-26 07:56:03'),
(114, '1', '2', '2', '3', '2022-07-26 07:56:23', '2022-07-26 07:56:23'),
(115, '1', '2', '2', '3', '2022-07-26 07:56:42', '2022-07-26 07:56:42'),
(116, '1', '2', '2', '3', '2022-07-26 07:57:11', '2022-07-26 07:57:11'),
(117, '1', '2', '2', '3', '2022-07-26 07:57:17', '2022-07-26 07:57:17'),
(118, '1', '2', '2', '3', '2022-07-26 08:00:26', '2022-07-26 08:00:26'),
(119, '1', '2', '2', '3', '2022-07-26 08:00:31', '2022-07-26 08:00:31'),
(120, '1', '2', '2', '3', '2022-07-26 08:01:41', '2022-07-26 08:01:41'),
(121, '1', '2', '2', '3', '2022-07-26 08:01:57', '2022-07-26 08:01:57'),
(122, '1', '2', '2', '3', '2022-07-26 08:02:18', '2022-07-26 08:02:18'),
(123, '1', '2', '2', '3', '2022-07-26 08:07:08', '2022-07-26 08:07:08'),
(124, '1', '2', '2', '3', '2022-07-26 08:07:30', '2022-07-26 08:07:30'),
(125, '1', '2', '2', '3', '2022-07-26 23:03:42', '2022-07-26 23:03:42'),
(126, '1', '2', '2', '3', '2022-07-26 23:04:30', '2022-07-26 23:04:30'),
(127, '1', '2', '1', '3', '2022-07-26 23:11:50', '2022-07-26 23:11:50'),
(128, '1', '2', '1', '3', '2022-07-26 23:26:01', '2022-07-26 23:26:01'),
(129, '1', '2', '1', '3', '2022-07-26 23:27:18', '2022-07-26 23:27:18'),
(130, '1', '2', '1', '3', '2022-07-26 23:27:28', '2022-07-26 23:27:28'),
(131, '1', '2', '1', '3', '2022-07-26 23:28:46', '2022-07-26 23:28:46'),
(132, '1', '2', '1', '3', '2022-07-26 23:34:03', '2022-07-26 23:34:03'),
(133, '1', '2', '1', '3', '2022-07-26 23:34:44', '2022-07-26 23:34:44'),
(134, '1', '2', '1', '3', '2022-07-26 23:42:09', '2022-07-26 23:42:09'),
(135, '1', '2', '1', '3', '2022-07-26 23:44:03', '2022-07-26 23:44:03'),
(136, '1', '2', '1', '3', '2022-07-26 23:44:41', '2022-07-26 23:44:41'),
(137, '1', '2', '1', '3', '2022-07-26 23:45:32', '2022-07-26 23:45:32'),
(138, '1', '2', '1', '3', '2022-07-26 23:53:58', '2022-07-26 23:53:58'),
(139, '1', '2', '1', '3', '2022-07-26 23:59:37', '2022-07-26 23:59:37'),
(140, '1', '2', '1', '3', '2022-07-27 00:10:21', '2022-07-27 00:10:21'),
(141, '1', '2', '1', '3', '2022-07-27 00:10:29', '2022-07-27 00:10:29'),
(142, '1', '2', '1', '3', '2022-07-27 00:10:48', '2022-07-27 00:10:48'),
(143, '1', '2', '1', '3', '2022-07-27 00:10:55', '2022-07-27 00:10:55'),
(144, '1', '2', '1', '3', '2022-07-27 00:35:06', '2022-07-27 00:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `registration_brides_tbl`
--

CREATE TABLE `registration_brides_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `add_bride_groom_table_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Registration For',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3 bride',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_brides_tbl`
--

INSERT INTO `registration_brides_tbl` (`id`, `add_bride_groom_table_id`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(1, '2', 'sonali@gmail.com', '$2y$10$nPSUxo6WD3b.fBcB062KM.mAEZighcBYnmS0MlZ07rb3bwArTFgVi', 'female', '3', '2022-07-24 23:02:28', '2022-07-24 23:02:28'),
(2, '2', 'ruchita@gmail.com', '$2y$10$/8QK.X074mbRksRglXf/Dexp70NEr6xe4abk2Af7PSxQKvNXujQKu', 'female', '3', '2022-07-25 06:54:55', '2022-07-25 06:54:55'),
(3, '2', 'amrapali@gmail.com', '$2y$10$wHn0MVRYnmDT/ucsi4VSwuPHDPVofPsD4XWpFWBc9PQCTPwEDww5e', 'female', '3', '2022-07-25 23:00:26', '2022-07-25 23:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `registration_grooms_tbl`
--

CREATE TABLE `registration_grooms_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `add_bride_groom_table_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Registration For ',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 groom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_grooms_tbl`
--

INSERT INTO `registration_grooms_tbl` (`id`, `add_bride_groom_table_id`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(1, '1', 'ramtekea23@gmail.com', '$2y$10$9no.383soynQclEUCTseoezvIuplgo5bAyAWXW0mKjjkn2iFuMWTW', 'male', '2', '2022-07-24 22:53:49', '2022-07-24 22:53:49'),
(2, '1', 'sangarsh@gmail.com', '$2y$10$m5aCpLdSP9Y7Oe2Y2fZziOZ5NTxR2KlAwWzRRnBJX63ibQ6bHss2K', 'male', '2', '2022-07-25 00:20:09', '2022-07-25 00:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `religion`, `created_at`, `updated_at`) VALUES
(1, 'Buddhist', '2022-07-24 22:52:47', '2022-07-24 22:52:47'),
(2, 'Christianity', '2022-07-24 22:52:51', '2022-07-24 22:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Maharashtra', '2022-07-24 22:52:33', '2022-07-24 22:52:33'),
(2, 'Andhra Pradesh', '2022-07-24 22:52:37', '2022-07-24 22:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded`
--

CREATE TABLE `uploaded` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bride_groom_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_groom_profile_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '2 Groom; 3:Bride',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom ',
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bride & groom ',
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploaded`
--

INSERT INTO `uploaded` (`id`, `bride_groom_profile_id`, `user_tbl_id`, `bride_groom_profile_role`, `first_name`, `last_name`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, '3', '6', '3', 'amrapali', 'ambade', '67d7c9b0-2999-493d-9e41-2fe56824cb38.jpg', '2022-07-26 02:15:54', '2022-07-26 02:15:54'),
(4, '3', '6', '3', 'amrapali', 'ambade', 'download (3).jpg', '2022-07-26 03:28:41', '2022-07-26 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_groom_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_bride_tbl_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 SuperAdmin, 2 Groom, 3 Bride',
  `bride_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_profile_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''avatar.png''',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''#2180f3''',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `show_password`, `reg_groom_tbl_id`, `reg_bride_tbl_id`, `role`, `bride_profile_id`, `groom_profile_id`, `profile`, `active_status`, `remember_token`, `avatar`, `dark_mode`, `messenger_color`, `updated_at`, `created_at`) VALUES
(1, NULL, 'superadmin@gmail.com', '$2y$10$MSUBRRvWF5yvF4qpFbI3ZO3zzCHUoWE.b4Nfrp7ORo8Xfdxx5CUE.', 'password', NULL, NULL, '1', NULL, NULL, NULL, 0, NULL, 'avatar.png', 0, '#2180f3', '2022-07-24 22:42:59', '2022-07-24 22:42:59'),
(2, 'amit', 'ramtekea23@gmail.com', '$2y$10$2YVuK6WgxbDBo2ejEUuCCuA.tYoI7jR5L/tUDGiiJWMIb.jHUJJqe', 'password', '1', NULL, '2', NULL, '999955', 'download (2).jpg', 0, NULL, 'avatar.png', 0, '#2180f3', '2022-07-26 01:20:51', '2022-07-24 22:53:49'),
(3, 'sonali', 'sonali@gmail.com', '$2y$10$SrzKVGAzV.PMJ7knSeA2o.Ne57Q9QyxXmiM2/EhJkdHTQDJbHWmL.', 'password', NULL, '1', '3', '808392', NULL, 'download (2).jpg', 0, NULL, 'avatar.png', 0, '#2180f3', '2022-07-24 23:03:58', '2022-07-24 23:02:28'),
(4, 'sangarsh', 'sangarsh@gmail.com', '$2y$10$uqGapnO1mbsyI5qc1ZXq2uT/eRXvW2CUfTc9m/kkwcziAU/arfRDG', 'password', '2', NULL, '2', NULL, '284350', 'download (1).jpg', 0, NULL, 'avatar.png', 0, '#2180f3', '2022-07-25 06:51:57', '2022-07-25 00:20:09'),
(5, 'ruchita', 'ruchita@gmail.com', '$2y$10$fKtBIZagvAQywu5FDs.tMOJsKIt.SD1o.796EcN.v2OhhY0jcAVVe', 'password', NULL, '2', '3', '122462', NULL, 'download (2).jpg', 0, NULL, '\'avatar.png\'', 0, '\'#2180f3\'', '2022-07-25 07:14:35', '2022-07-25 06:54:55'),
(6, 'amrapali', 'amrapali@gmail.com', '$2y$10$T4THsEih4lK1.duahzAbre8SsNSuVAtAYqFpyI90NIS4QyHxeDRhu', 'password', NULL, '3', '3', '784910', NULL, '67d7c9b0-2999-493d-9e41-2fe56824cb38.jpg', 0, NULL, '\'avatar.png\'', 0, '\'#2180f3\'', '2022-07-25 23:04:16', '2022-07-25 23:00:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bride_profile_tbl`
--
ALTER TABLE `bride_profile_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_profiles`
--
ALTER TABLE `cover_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
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
-- Indexes for table `partner_preference`
--
ALTER TABLE `partner_preference`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bride_profile_tbl`
--
ALTER TABLE `bride_profile_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cover_profiles`
--
ALTER TABLE `cover_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groom_profile_tbl`
--
ALTER TABLE `groom_profile_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `partner_preference`
--
ALTER TABLE `partner_preference`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposal_request`
--
ALTER TABLE `proposal_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recently_view_profile`
--
ALTER TABLE `recently_view_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `registration_brides_tbl`
--
ALTER TABLE `registration_brides_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_grooms_tbl`
--
ALTER TABLE `registration_grooms_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE `uploaded`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
