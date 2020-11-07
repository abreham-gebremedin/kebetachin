-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 10:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kebet`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `questionid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `attachment_link` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `lid` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `lid`, `updated_at`, `created_at`) VALUES
(6, 'abebefgh', NULL, '2020-03-19 19:02:38', '2020-03-19 19:02:38'),
(7, 'Heiniken', NULL, '2020-03-19 19:03:19', '2020-03-19 19:03:19'),
(8, 'abebefghgh', NULL, '2020-03-19 19:23:23', '2020-03-19 19:23:23'),
(9, 's', 9, '2020-03-19 19:24:19', '2020-03-19 19:24:19'),
(10, 'Dagne', 10, '2020-03-19 23:57:07', '2020-03-19 23:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `complexity`
--

CREATE TABLE `complexity` (
  `id` int(11) NOT NULL,
  `complexity_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `start_time` binary(8) NOT NULL,
  `end_time` binary(8) DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `certification_name` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_earned` date NOT NULL,
  `certification_link` longtext DEFAULT NULL,
  `attachmentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expected_duration`
--

CREATE TABLE `expected_duration` (
  `id` int(11) NOT NULL,
  `duration_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `overview` longtext NOT NULL,
  `lid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has_skill`
--

CREATE TABLE `has_skill` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hire_manager`
--

CREATE TABLE `hire_manager` (
  `id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `locationid` int(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `hire_manager_id` int(11) NOT NULL,
  `expected_duration_id` int(11) NOT NULL,
  `complexity_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `main_skill_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL,
  `timeid` int(11) DEFAULT NULL,
  `qualificationid` int(11) DEFAULT NULL,
  `number_of_frelance` int(11) DEFAULT NULL,
  `attachmentid` int(11) DEFAULT NULL,
  `job_catagory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_catagory`
--

CREATE TABLE `job_catagory` (
  `id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `kebele` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country`, `region`, `city`, `kebele`, `houseno`, `created_at`, `updated_at`) VALUES
(6, NULL, NULL, 'Hawassa', NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'Addis Ababa', NULL, NULL, NULL, NULL),
(8, NULL, NULL, 'sdsadas', NULL, NULL, NULL, NULL),
(9, NULL, NULL, 'Q', NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'Gondar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) DEFAULT NULL,
  `hire_manager_id` int(11) DEFAULT NULL,
  `message_time` binary(8) NOT NULL,
  `message_text` longtext NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `proposal_status_catalog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2014_01_07_073615_create_tagged_table', 2),
(8, '2014_01_07_073615_create_tags_table', 2),
(9, '2016_06_29_073615_create_tag_groups_table', 2),
(10, '2016_06_29_073615_update_tags_table', 2),
(11, '2020_03_13_083515_add_description_to_tags_table', 2),
(12, '2020_03_19_192518_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `other_skills`
--

CREATE TABLE `other_skills` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'xcbxc', 'aSas', 'hgh,ghfgh,hfghgfh,hfghfghd,ghhjfgd,jfghfgdhf,hgjh,jhfdjhj,ghjghjgh', '2020-03-20 02:37:01', '2020-03-20 02:37:01'),
(2, 'fghgfh', 'hfgh', 'fff,jghj,hgjh', '2020-03-20 22:42:08', '2020-03-20 22:42:08'),
(3, 'fdgdfgdfg', 'fdgdfg', 'fdgdfg', '2020-03-20 22:43:20', '2020-03-20 22:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `proposal_time` binary(8) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL,
  `current_proposal_status` int(11) NOT NULL,
  `client_grade` int(11) DEFAULT NULL,
  `client_comment` longtext DEFAULT NULL,
  `freelancer_grade` int(11) DEFAULT NULL,
  `freelancer_comment` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_status_catalog`
--

CREATE TABLE `proposal_status_catalog` (
  `id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `name` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `screninig_question`
--

CREATE TABLE `screninig_question` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(128) NOT NULL,
  `job_catid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tagged`
--

INSERT INTO `tagging_tagged` (`id`, `taggable_id`, `taggable_type`, `tag_name`, `tag_slug`) VALUES
(1, 1, 'App\\Post', 'Hgh', 'hgh'),
(2, 1, 'App\\Post', 'Ghfgh', 'ghfgh'),
(3, 1, 'App\\Post', 'Hfghgfh', 'hfghgfh'),
(4, 1, 'App\\Post', 'Hfghfghd', 'hfghfghd'),
(5, 1, 'App\\Post', 'Ghhjfgd', 'ghhjfgd'),
(6, 1, 'App\\Post', 'Jfghfgdhf', 'jfghfgdhf'),
(7, 1, 'App\\Post', 'Hgjh', 'hgjh'),
(8, 1, 'App\\Post', 'Jhfdjhj', 'jhfdjhj'),
(9, 1, 'App\\Post', 'Ghjghjgh', 'ghjghjgh'),
(10, 2, 'App\\Post', 'Fff', 'fff'),
(11, 2, 'App\\Post', 'Jghj', 'jghj'),
(12, 2, 'App\\Post', 'Hgjh', 'hgjh'),
(13, 3, 'App\\Post', 'Fdgdfg', 'fdgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tags`
--

INSERT INTO `tagging_tags` (`id`, `slug`, `name`, `suggest`, `count`, `tag_group_id`, `description`) VALUES
(1, 'hgh', 'Hgh', 0, 1, NULL, NULL),
(2, 'ghfgh', 'Ghfgh', 0, 1, NULL, NULL),
(3, 'hfghgfh', 'Hfghgfh', 0, 1, NULL, NULL),
(4, 'hfghfghd', 'Hfghfghd', 0, 1, NULL, NULL),
(5, 'ghhjfgd', 'Ghhjfgd', 0, 1, NULL, NULL),
(6, 'jfghfgdhf', 'Jfghfgdhf', 0, 1, NULL, NULL),
(7, 'hgjh', 'Hgjh', 0, 2, NULL, NULL),
(8, 'jhfdjhj', 'Jhfdjhj', 0, 1, NULL, NULL),
(9, 'ghjghjgh', 'Ghjghjgh', 0, 1, NULL, NULL),
(10, 'fff', 'Fff', 0, 1, NULL, NULL),
(11, 'jghj', 'Jghj', 0, 1, NULL, NULL),
(12, 'fdgdfg', 'Fdgdfg', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_requirement`
--

CREATE TABLE `time_requirement` (
  `id` int(11) NOT NULL,
  `time_requirement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abebe', 'aabrehamgebremedin122@gmail.com', NULL, '$2y$10$faSPgWnXnX6a3oiyQNs72.2E49Hn.uXTJFLhKLo4CA2tQLSSpsKGa', NULL, '2020-03-19 19:37:27', '2020-03-19 19:37:27'),
(2, 'Abreham', 'abrehamgebremedin12@gmail.com', '2020-03-19 20:49:44', '$2y$10$kpbBzwQvxoxwqVTD3nfPMuuovLPvPm5MwWtghypBp//1cb4PnR0oq', NULL, '2020-03-19 20:49:07', '2020-03-19 20:49:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_result_freelancer` (`freelancer_id`),
  ADD KEY `answerquestion` (`questionid`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachment_message` (`message_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locationid` (`lid`);

--
-- Indexes for table `complexity`
--
ALTER TABLE `complexity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_company` (`company_id`),
  ADD KEY `contract_freelancer` (`freelancer_id`),
  ADD KEY `contract_payment_type` (`payment_type_id`),
  ADD KEY `contract_proposal` (`proposal_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certification_freelancer` (`freelancer_id`),
  ADD KEY `attachmentid` (`attachmentid`);

--
-- Indexes for table `expected_duration`
--
ALTER TABLE `expected_duration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expected_duration_ak_1` (`duration_text`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `freelancer_ak_1` (`userid`),
  ADD KEY `locationid` (`lid`);

--
-- Indexes for table `has_skill`
--
ALTER TABLE `has_skill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `has_skill_ak_1` (`freelancer_id`,`skill_id`),
  ADD KEY `has_skill_skill` (`skill_id`);

--
-- Indexes for table `hire_manager`
--
ALTER TABLE `hire_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hire_manager_ak_1` (`user_account_id`),
  ADD KEY `hire_manager_company` (`company_id`),
  ADD KEY `locationid` (`locationid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_complexity` (`complexity_id`),
  ADD KEY `job_expected_duration` (`expected_duration_id`),
  ADD KEY `job_hire_manager` (`hire_manager_id`),
  ADD KEY `job_payment_type` (`payment_type_id`),
  ADD KEY `job_skill` (`main_skill_id`),
  ADD KEY `timeid` (`timeid`),
  ADD KEY `qualificationid` (`qualificationid`),
  ADD KEY `attachmentid` (`attachmentid`),
  ADD KEY `job_catagory` (`job_catagory_id`);

--
-- Indexes for table `job_catagory`
--
ALTER TABLE `job_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_freelancer` (`freelancer_id`),
  ADD KEY `message_hire_manager` (`hire_manager_id`),
  ADD KEY `message_proposal` (`proposal_id`),
  ADD KEY `message_proposal_status_catalog` (`proposal_status_catalog_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_skills`
--
ALTER TABLE `other_skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `other_skills_ak_1` (`job_id`,`skill_id`),
  ADD KEY `other_skills_skill` (`skill_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_type_ak_1` (`type_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_freelancer` (`freelancer_id`),
  ADD KEY `proposal_job` (`job_id`),
  ADD KEY `proposal_payment_type` (`payment_type_id`),
  ADD KEY `proposal_proposal_status_catalog` (`current_proposal_status`);

--
-- Indexes for table `proposal_status_catalog`
--
ALTER TABLE `proposal_status_catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proposal_status_catalog_ak_1` (`status_name`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screninig_question`
--
ALTER TABLE `screninig_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobid` (`jobid`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skill_ak_1` (`skill_name`),
  ADD KEY `job_catid` (`job_catid`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `time_requirement`
--
ALTER TABLE `time_requirement`
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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_catagory`
--
ALTER TABLE `job_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_requirement`
--
ALTER TABLE `time_requirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answerquestion` FOREIGN KEY (`questionid`) REFERENCES `screninig_question` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `test_result_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`);

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_message` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `location` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`),
  ADD CONSTRAINT `contract_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `contract_proposal` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `certification_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`),
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`attachmentid`) REFERENCES `attachment` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD CONSTRAINT `freelancer_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `location` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `has_skill`
--
ALTER TABLE `has_skill`
  ADD CONSTRAINT `has_skill_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`),
  ADD CONSTRAINT `has_skill_skill` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`);

--
-- Constraints for table `hire_manager`
--
ALTER TABLE `hire_manager`
  ADD CONSTRAINT `hire_manager_ibfk_1` FOREIGN KEY (`locationid`) REFERENCES `location` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `hire_manager_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_catagory` FOREIGN KEY (`job_catagory_id`) REFERENCES `job_catagory` (`id`),
  ADD CONSTRAINT `job_complexity` FOREIGN KEY (`complexity_id`) REFERENCES `complexity` (`id`),
  ADD CONSTRAINT `job_expected_duration` FOREIGN KEY (`expected_duration_id`) REFERENCES `expected_duration` (`id`),
  ADD CONSTRAINT `job_hire_manager` FOREIGN KEY (`hire_manager_id`) REFERENCES `hire_manager` (`id`),
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`timeid`) REFERENCES `time_requirement` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`qualificationid`) REFERENCES `qualification` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`attachmentid`) REFERENCES `attachment` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `job_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `job_skill` FOREIGN KEY (`main_skill_id`) REFERENCES `skill` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`),
  ADD CONSTRAINT `message_hire_manager` FOREIGN KEY (`hire_manager_id`) REFERENCES `hire_manager` (`id`),
  ADD CONSTRAINT `message_proposal` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`),
  ADD CONSTRAINT `message_proposal_status_catalog` FOREIGN KEY (`proposal_status_catalog_id`) REFERENCES `proposal_status_catalog` (`id`);

--
-- Constraints for table `other_skills`
--
ALTER TABLE `other_skills`
  ADD CONSTRAINT `other_skills_job` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `other_skills_skill` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`),
  ADD CONSTRAINT `proposal_job` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `proposal_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `proposal_proposal_status_catalog` FOREIGN KEY (`current_proposal_status`) REFERENCES `proposal_status_catalog` (`id`);

--
-- Constraints for table `screninig_question`
--
ALTER TABLE `screninig_question`
  ADD CONSTRAINT `screninig_question_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`job_catid`) REFERENCES `job_catagory` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
