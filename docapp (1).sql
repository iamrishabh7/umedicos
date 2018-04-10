-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 07:57 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic_images`
--

CREATE TABLE `clinic_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_images`
--

INSERT INTO `clinic_images` (`id`, `clinic_id`, `image`, `created_at`, `updated_at`) VALUES
(18, 1, 'http://localhost:8000/images/clinic_images/1523030117.jpg', '2018-04-06 10:25:17', '2018-04-06 10:25:17'),
(19, 1, 'http://localhost:8000/images/clinic_images/1523030117.jpg', '2018-04-06 10:25:17', '2018-04-06 10:25:17'),
(20, 1, 'http://localhost:8000/images/clinic_images/1523030117.jpg', '2018-04-06 10:25:17', '2018-04-06 10:25:17'),
(21, 1, 'http://localhost:8000/images/clinic_images/1523030117.jpg', '2018-04-06 10:25:17', '2018-04-06 10:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_days1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_days2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `profile_pic`, `primary_contact`, `secondary_contact`, `address1`, `operational_days1`, `address2`, `operational_days2`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://localhost:8000/images/doctors_images/1523030117.jpg', '123456780', NULL, 'Newark, NJ, USA', 'Wednesday', 'Lucknow, Uttar Pradesh, India', 'Friday', NULL, '2018-04-06 10:25:17'),
(2, 11, NULL, 'vfeav', NULL, NULL, NULL, NULL, NULL, '2018-04-08 03:06:06', '2018-04-08 03:06:06'),
(3, 12, NULL, 'vfeav', NULL, NULL, NULL, NULL, NULL, '2018-04-08 03:08:05', '2018-04-08 03:08:05'),
(4, 13, NULL, 'vfeav', NULL, NULL, NULL, NULL, NULL, '2018-04-08 03:11:23', '2018-04-08 03:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_clinics`
--

CREATE TABLE `doctor_clinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_clinics`
--

INSERT INTO `doctor_clinics` (`id`, `doctor_id`, `name`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Clinic ', '0', NULL, NULL),
(2, 13, NULL, NULL, '2018-04-08 03:11:23', '2018-04-08 03:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specializations`
--

CREATE TABLE `doctor_specializations` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specializations`
--

INSERT INTO `doctor_specializations` (`id`, `doctor_id`, `specialization_id`, `created_at`, `updated_at`) VALUES
(31, 1, 4, '2018-04-06 10:25:17', '2018-04-06 10:25:17'),
(32, 1, 6, '2018-04-06 10:25:17', '2018-04-06 10:25:17');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_29_062053_create_pateints_table', 1),
(4, '2018_03_29_062109_create_doctors_table', 1),
(5, '2018_03_29_062948_create_clinic_images_table', 1),
(6, '2018_03_29_063009_create_doctor_addresses_table', 1),
(7, '2018_03_29_063136_create_specializations_table', 1),
(8, '2018_03_29_063331_create_doctor_specializations_table', 1),
(9, '2018_03_29_064812_create_doctor_clinics_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(11) NOT NULL,
  `profile_pic` int(11) DEFAULT NULL,
  `primary_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `profile_pic`, `primary_contact`, `secondary_contact`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 'c', NULL, '2018-04-03 13:02:04', '2018-04-03 13:02:04'),
(2, 14, NULL, '1234567890', NULL, '2018-04-10 00:22:14', '2018-04-10 00:22:14'),
(3, 15, NULL, '123456780', NULL, '2018-04-10 00:23:56', '2018-04-10 00:23:56'),
(4, 16, NULL, '123456780', NULL, '2018-04-10 00:27:00', '2018-04-10 00:27:00'),
(5, 17, NULL, '123456780', NULL, '2018-04-10 00:27:45', '2018-04-10 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `redeem_codes`
--

CREATE TABLE `redeem_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `is_used` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem_codes`
--

INSERT INTO `redeem_codes` (`id`, `code`, `amount`, `user_id`, `doctor_id`, `is_used`, `created_at`, `updated_at`) VALUES
(1, 'asdf', NULL, 5, 1, 1, '2018-04-10 05:41:30', '2018-04-10 00:12:14'),
(3, 'USER2ZXT', NULL, 15, NULL, 0, '2018-04-10 00:23:56', '2018-04-10 00:23:56'),
(4, 'TESTUSER1YDC', NULL, 17, NULL, 0, '2018-04-10 00:27:45', '2018-04-10 00:27:45'),
(5, 'TESTUSERPQPV', NULL, 15, NULL, 0, '2018-04-10 11:37:25', '2018-04-10 11:37:25'),
(6, 'TESTUSER9PGE', NULL, 15, NULL, 0, '2018-04-10 11:44:26', '2018-04-10 11:44:26'),
(7, 'TESTUSERPEPX', NULL, 15, NULL, 0, '2018-04-10 11:46:09', '2018-04-10 11:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'cardiologist', NULL, NULL),
(3, 'physician', NULL, NULL),
(4, 'obstetrics and gynecology infertility', NULL, NULL),
(5, 'pulmonologist and sleep specialist', NULL, NULL),
(6, 'cosmetic and plastic surgery', NULL, NULL),
(7, 'cosmetic dentist & endodontist', NULL, NULL),
(8, 'cosmetic plastic surgery', NULL, NULL),
(9, 'dental surgeon', NULL, NULL),
(10, 'dermatolight', NULL, NULL),
(11, 'dermatologist & cosmetologist', NULL, NULL),
(12, 'dematologist ', NULL, NULL),
(13, 'dermatology,cosmetic surgeon', NULL, NULL),
(14, 'dermatology', NULL, NULL),
(15, 'venerolog', NULL, NULL),
(16, 'leprosy', NULL, NULL),
(17, 'diabetologist', NULL, NULL),
(18, 'diabetologist and physician', NULL, NULL),
(19, 'E.N.T.', NULL, NULL),
(20, 'endodontia(root canal)', NULL, NULL),
(21, 'endodontist & aesthetic dentistry', NULL, NULL),
(22, 'E.N.T. & head neck surgery', NULL, NULL),
(23, 'E.N.T. surgeon', NULL, NULL),
(24, 'eye surgeon', NULL, NULL),
(25, 'female urology', NULL, NULL),
(26, 'gastro intestinal surgery', NULL, NULL),
(27, 'gastroenterology', NULL, NULL),
(28, 'gastrophsician', NULL, NULL),
(29, 'general physician', NULL, NULL),
(30, 'general practioner', NULL, NULL),
(31, 'general surgery', NULL, NULL),
(32, 'genetics', NULL, NULL),
(33, 'gynaecology & infertility', NULL, NULL),
(34, 'gynaecologist', NULL, NULL),
(35, 'hear ailments', NULL, NULL),
(36, 'hematology', NULL, NULL),
(37, 'homeopathic consultant', NULL, NULL),
(38, 'homeo physician consultant', NULL, NULL),
(39, 'homeopthic paediatrician & yoga therapist', NULL, NULL),
(40, 'hormone problem ', NULL, NULL),
(41, 'implantalogist', NULL, NULL),
(42, 'infertility specialist', NULL, NULL),
(43, 'laparoscopic , general surgery', NULL, NULL),
(44, 'oncosurgery', NULL, NULL),
(45, 'endoscopy', NULL, NULL),
(46, 'laparoscopic urology', NULL, NULL),
(47, 'laparoscopic surgeon', NULL, NULL),
(48, 'maxiaaofacial surgeon ', NULL, NULL),
(49, 'nephrologist', NULL, NULL),
(50, 'neuro surgeon', NULL, NULL),
(51, 'neurological surgery', NULL, NULL),
(52, 'neuropsychiatry', NULL, NULL),
(53, 'obstetician', NULL, NULL),
(54, 'oncology', NULL, NULL),
(55, 'ophthalmology', NULL, NULL),
(56, 'oral & maxillofacial pathology', NULL, NULL),
(57, 'oral &maxillofacial surgeon', NULL, NULL),
(58, 'oral implantology ', NULL, NULL),
(59, 'orthpaedic surgeon', NULL, NULL),
(60, 'orthodontist', NULL, NULL),
(61, 'orthopedician', NULL, NULL),
(62, 'paediatrician ', NULL, NULL),
(63, 'pediatrics', NULL, NULL),
(64, 'pedodontics', NULL, NULL),
(65, 'periodontist', NULL, NULL),
(66, 'physiotherapist', NULL, NULL),
(67, 'plastic and cosmetic surgery', NULL, NULL),
(68, 'podiatric surgeon', NULL, NULL),
(69, 'prosthodontics', NULL, NULL),
(70, 'prosthodontics & implantologist', NULL, NULL),
(71, 'psychiatrist', NULL, NULL),
(72, 'psychiatry', NULL, NULL),
(73, 'psychotherapy', NULL, NULL),
(74, 'radiologist', NULL, NULL),
(75, 'radio therapy', NULL, NULL),
(76, 'senior consultant neurologist', NULL, NULL),
(77, 'sonology', NULL, NULL),
(78, 'speech and hearing', NULL, NULL),
(79, 'spondylitis', NULL, NULL),
(80, 'thoracic surgery', NULL, NULL),
(81, 'sonologist', NULL, NULL),
(82, 'ultrasonologist', NULL, NULL),
(83, 'accupressure', NULL, NULL),
(84, 'allergy', NULL, NULL),
(85, 'asthma', NULL, NULL),
(86, 'immunology', NULL, NULL),
(87, 'anaesthesiology', NULL, NULL),
(88, 'critical care & pain medicine', NULL, NULL),
(89, 'audiometry', NULL, NULL),
(90, 'cardio thoracic surgery', NULL, NULL),
(91, 'vascular surgery', NULL, NULL),
(92, 'cardiothoracic', NULL, NULL),
(93, 'clinical psychology', NULL, NULL),
(94, 'conservative dentistry', NULL, NULL),
(95, 'endodontist', NULL, NULL),
(96, 'cancer', NULL, NULL),
(97, 'consultant cosmetologist', NULL, NULL),
(98, 'consultant pediatrician', NULL, NULL),
(99, 'consultant radiologist', NULL, NULL),
(100, 'cosmetic dentist implantologist', NULL, NULL),
(101, 'diabetes', NULL, NULL),
(102, 'diabetologist  ', NULL, NULL),
(103, 'diabetelogy', NULL, NULL),
(104, 'endocrinologist', NULL, NULL),
(105, 'ENT', NULL, NULL),
(106, 'eye consultant', NULL, NULL),
(107, 'fertility specialist', NULL, NULL),
(108, 'gynaecologist', NULL, NULL),
(109, 'gastroentero ', NULL, NULL),
(110, 'endoscopy', NULL, NULL),
(111, 'hepatology', NULL, NULL),
(112, 'gen surgery', NULL, NULL),
(113, 'general denstistry', NULL, NULL),
(114, 'hand and micro vascular surgeon', NULL, NULL),
(115, 'heart', NULL, NULL),
(116, 'intensivist', NULL, NULL),
(117, 'interventional cardiologist', NULL, NULL),
(118, 'laparoscopic surgeon', NULL, NULL),
(119, 'laser dentistry', NULL, NULL),
(120, 'nephrology', NULL, NULL),
(121, 'neuro surgery', NULL, NULL),
(122, 'ophthalmologist', NULL, NULL),
(123, 'arthroscopy surgeon', NULL, NULL),
(124, 'prosthodontist', NULL, NULL),
(125, 'pulmonologist', NULL, NULL),
(126, 'RCT crowns ', NULL, NULL),
(127, 'bridges implants', NULL, NULL),
(128, 'sexologist', NULL, NULL),
(129, 'skin veneral diseases', NULL, NULL),
(130, 'transplant surgeon', NULL, NULL),
(131, 'urologist', NULL, NULL),
(132, 'veterinary', NULL, NULL),
(133, 'acute and chronic diseases', NULL, NULL),
(134, 'anaesthesiologist', NULL, NULL),
(135, 'andrology', NULL, NULL),
(136, 'brain and spine surgery', NULL, NULL),
(137, 'brain and spine neurosurgery', NULL, NULL),
(138, 'tuberculosis', NULL, NULL),
(139, 'consultant for women', NULL, NULL),
(140, 'consultant for child', NULL, NULL),
(141, 'hair  transplant', NULL, NULL),
(142, 'dermatologist', NULL, NULL),
(143, 'cosmetologist', NULL, NULL),
(144, 'dietician', NULL, NULL),
(145, 'fetal medicine specialist', NULL, NULL),
(146, 'gastroenterohepatologist', NULL, NULL),
(147, 'neonatologist', NULL, NULL),
(148, 'neuro psychiatrist', NULL, NULL),
(149, 'thyroid cancer', NULL, NULL),
(150, 'radioiodine therapy', NULL, NULL),
(151, 'hyperthyroidism therapy', NULL, NULL),
(152, 'joint replacement surgeon', NULL, NULL),
(153, 'trauma', NULL, NULL),
(154, 'otolaryngology', NULL, NULL),
(155, 'piles', NULL, NULL),
(156, 'fistula', NULL, NULL),
(157, 'prosthetics', NULL, NULL),
(158, 'qastroenterologist', NULL, NULL),
(159, 'rheumatologist', NULL, NULL),
(160, 'skin allergy', NULL, NULL),
(161, 'tympanometry', NULL, NULL),
(162, 'spine surgery', NULL, NULL),
(163, 'surgical oncology', NULL, NULL),
(164, 'andrologist', NULL, NULL),
(165, 'bariatric surgeon', NULL, NULL),
(166, 'breast surgeon', NULL, NULL),
(167, 'liver transplant specialist', NULL, NULL),
(168, 'neclear medicine specialist', NULL, NULL),
(169, 'robotic surgeon', NULL, NULL),
(170, 'vascular surgeon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `auth_token` int(11) DEFAULT NULL,
  `is_mobile_verified` int(11) NOT NULL DEFAULT '0',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_profile_completed` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `auth_token`, `is_mobile_verified`, `otp`, `is_active`, `is_profile_completed`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Raghvendra', 'raghu@gmail.com', '$2y$10$u8ISO3EFj2g4M1fu1lF8sO3TrEwV7bAR40yPmvmjDjv4mVQNWSu22', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 12:49:48', '2018-04-03 12:49:48'),
(6, 'Question Bank', 'admin@cl1assified.com', '$2y$10$PjUETw6xFpZnwpz1/hFo..x9zccE34ha90/2B5BmUpZEAvdZ6pQjC', 1, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 12:56:04', '2018-04-03 12:56:04'),
(7, 'Question Bank', 'admin@cl1assi1fied.com', '$2y$10$Lm74ZniF/VzQAxWgEdfJUeRo1vQMOOj/CFL5wOp5q8Q/eOPxf/jEu', 1, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 12:56:30', '2018-04-03 12:56:30'),
(8, 'c', 'admin@classified12.com', '$2y$10$Bu67hWg909lNZn6T4vMbIefC4jFy0W6yI..TadsQsf3mj5pa7fLda', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 12:59:56', '2018-04-03 12:59:56'),
(9, 'c', 'admin@classifie13d12.com', '$2y$10$6l6amGnaJBePYeczQtgfhOvjXV2Z.kC7/vlQJSOMdZ/c.eFNRJEfq', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 13:01:19', '2018-04-03 13:01:19'),
(10, 'c', 'admin@classifie1123d12.com', '$2y$10$4Shk5srdzh4NCSHkH2y1BOnMoR4e6H9pC3jWAcEU8LydamLtzL2XG', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-03 13:02:04', '2018-04-03 13:02:04'),
(11, 'cadv', 'admin@gmai12.com', '$2y$10$sf6xEtfQo1c//JTE9F3GSuu0kJVkxTwbtZCoecT3zO6R1maQPx0mG', 1, NULL, 0, NULL, 0, 0, NULL, '2018-04-08 03:06:06', '2018-04-08 03:06:06'),
(12, 'cadv', 'admin1@gmai12.com', '$2y$10$6cwqIECDTRMZjH2TD0tZhuTVHR05wGfuj20jtBq/FjwmlBuad7jBu', 1, NULL, 0, NULL, 0, 0, NULL, '2018-04-08 03:08:05', '2018-04-08 03:08:05'),
(13, 'cadv', 'admincdw1@gmai12.com', '$2y$10$MAPbfh5qmLFF1glriRduKOMOqRcRtnd2V3TeknyS0otE.aOgRARYK', 1, NULL, 0, NULL, 0, 0, NULL, '2018-04-08 03:11:23', '2018-04-08 03:11:23'),
(15, 'testuser', 'testuser@gmail.com', '$2y$10$1mc5JXhV4rBvC64Qhs8IiuRf1lRZlpPrpxxzjGR50dIiPY2R8SqMy', 2, NULL, 1, NULL, 0, 1, 'gLrfEIOGbLyW5lqwycrQhjCa20bDx28xbim3Jb70LNllG0AGrZUd7VdLBmsS', '2018-04-10 00:23:56', '2018-04-10 11:46:09'),
(16, 'testuser1', 'testuser1@gmail.com', '$2y$10$G621X4i9hKZTtdfzvDTs0OC0g/uzI3wykRf8uKdfRRpvTELChx4W2', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-10 00:27:00', '2018-04-10 00:27:00'),
(17, 'testuser1', 'testuser11@gmail.com', '$2y$10$vA3dHWyvKkq228l0WDciWuTZVhbH5If0GDRF87IHlVcfSAsxNL/1K', 2, NULL, 0, NULL, 0, 0, NULL, '2018-04-10 00:27:45', '2018-04-10 00:27:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic_images`
--
ALTER TABLE `clinic_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_clinics`
--
ALTER TABLE `doctor_clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_specializations`
--
ALTER TABLE `doctor_specializations`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem_codes`
--
ALTER TABLE `redeem_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
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
-- AUTO_INCREMENT for table `clinic_images`
--
ALTER TABLE `clinic_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_clinics`
--
ALTER TABLE `doctor_clinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_specializations`
--
ALTER TABLE `doctor_specializations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `redeem_codes`
--
ALTER TABLE `redeem_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
