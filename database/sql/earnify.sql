-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 08:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earnify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `tag`, `email`, `password`, `role`, `name`, `remember_token`, `status`, `updated`, `date`) VALUES
(1, 'superadmin', 'techie5961@gmail.com', '$2y$12$rygJBNSe00vWfJNUpJWSXOhY21wQJ6dXdKwUdH8w1OhAa7zl946SW', 'master admin', 'David James', NULL, 'active', '2025-08-02 18:30:34', '2025-08-02 18:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `date`) VALUES
(1, 8, '192.168.221.196', '2025-10-09 15:14:07'),
(2, 8, '::1', '2025-10-09 19:47:31'),
(3, 19, '192.168.221.196', '2025-10-10 20:05:44'),
(4, 20, '192.168.221.196', '2025-10-10 20:19:54'),
(5, 8, '192.168.7.6', '2025-10-20 16:19:30'),
(6, 8, '192.168.7.6', '2025-10-20 18:20:27'),
(7, 8, '::1', '2025-11-18 05:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'unread',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `status`, `date`) VALUES
(1, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-09 15:22:06'),
(2, 'Blaady02 Just initiated a deposit', 'unread', '2025-10-10 17:40:50'),
(3, 'Blaady02 Just purchased a product', 'unread', '2025-10-10 19:11:13'),
(4, 'Techie Just registered an account', 'unread', '2025-10-10 20:03:48'),
(5, 'Daddy Just registered an account', 'unread', '2025-10-10 20:04:49'),
(6, 'Emmanuel Just registered an account', 'unread', '2025-10-10 20:19:33'),
(7, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:15:15'),
(8, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:19:03'),
(9, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:20:48'),
(10, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:22:12'),
(11, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:22:55'),
(12, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:31:23'),
(13, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:33:27'),
(14, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:36:58'),
(15, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 16:51:40'),
(16, 'Blaady02 Just placed a withdrawal', 'unread', '2025-10-11 16:53:56'),
(17, 'Blaady02 Just updated withdrawal bank details', 'unread', '2025-10-11 17:35:05'),
(18, 'Blaady02 Just placed a withdrawal', 'unread', '2025-10-11 17:35:15'),
(19, 'Blaady02 Just placed a withdrawal', 'unread', '2025-10-11 17:35:41'),
(20, 'Blaady02 Just submitted a deposit request', 'unread', '2025-10-20 17:20:37'),
(21, 'Blaady02 Just submitted a deposit request', 'unread', '2025-10-20 17:21:01'),
(22, 'Blaady02 Just submitted a deposit request', 'unread', '2025-10-20 17:21:33'),
(23, 'Blaady02 Just submitted a deposit request', 'unread', '2025-11-18 07:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `daily_income` float DEFAULT NULL,
  `cycle` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `photo`, `name`, `price`, `daily_income`, `cycle`, `status`, `updated`, `date`) VALUES
(13, '1760094566.jpg', 'PW1', 3000, 700, 40, 'active', '2025-10-10 19:09:26', '2025-10-10 19:09:26'),
(14, '1760094595.jpeg', 'PW2', 5000, 1250, 40, 'active', '2025-10-10 19:09:56', '2025-10-10 19:09:56'),
(15, '1760094620.jpeg', 'PW3', 10000, 2500, 40, 'active', '2025-10-10 19:10:20', '2025-10-10 19:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `reward_cycle` varchar(255) NOT NULL DEFAULT '24 hrs',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `user_id`, `json`, `reward_cycle`, `status`, `updated`, `date`) VALUES
(1, 8, '{\"id\":13,\"photo\":\"1760094566.jpg\",\"name\":\"PW1\",\"price\":3000,\"daily_income\":700,\"cycle\":40,\"status\":\"active\",\"updated\":\"2025-10-10 12:09:26\",\"date\":\"2025-10-10 12:09:26\"}', '24 hrs', 'active', '2025-11-17 18:32:47', '2025-10-10 19:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4CvxIN5mFeehAgqXAUmClq99Zr9gvgBIVpY6XAaC', NULL, '192.168.7.6', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic2tBTk1NQ245a3lPVDkxMFV5cHNITkZKTWlQQzhOUGRiRzQ1NXNhViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vMTkyLjE2OC43LjIwNC9maW5vdmEvcHVibGljL3VzZXJzL2dldC90b3RhbC9iYWxhbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O30=', 1760948436),
('8NyLWjcX7WoSUOudtEdfYu8fRbDMj4e80ul1T7kS', NULL, '192.168.7.6', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVpRUU5FMlF5d1BmM09NNjVmUXVQN3k5YWowSUdVRkd6bUVrbHpEcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vMTkyLjE2OC43LjIwNC9maW5vdmEvcHVibGljL3VzZXJzL2dldC90b3RhbC9iYWxhbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O30=', 1760956194),
('9qvqPL1nEj4WjWCktlPZXbtZTcSWx3ZaixMiaENj', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZG1udXJJaTJxSWhiMDZaMkNQTnV3ckNYdGEyTVYwUW55akVheEpBOSI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vbG9jYWxob3N0L2Vhcm5pZnkvcHVibGljL3VzZXJzL2dldC90b3RhbC9iYWxhbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763414570),
('fhClxNsnsKIZyCyqrZmXih1ENrDOMAIUYjE7F7Op', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVkJJVFpSckU4WXJOcTN5eFpxN1prRkpHNUhxTkNta0dsRERSUEtjcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly9sb2NhbGhvc3QvZWFybmlmeS9wdWJsaWMvdXNlcnMvZ2V0L3RvdGFsL2JhbGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl91c2Vyc181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7czo1MzoibG9naW5fYWRtaW5zXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1763451294),
('gf5M2cTFaygiNjqK8cK8UZHLCHZp7mIY0fn4HVfa', NULL, '192.168.7.6', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHBsQjU1NDlXNHdoQldwRWJtYzhRSXJxNGxhY2NXa2VZN0VHQ3k3ViI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUxOiJodHRwczovLzE5Mi4xNjguNy4yMDQvZmlub3ZhL3B1YmxpYy91c2Vycy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760953385),
('gpliwzVwMYmZH8Y4z4dRVHRMcoZTQdIB2jYY64n2', NULL, '192.168.7.6', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieTR0WkRNbklJZkt3VWUwc0VXZjhDUEYyaUNENVVtaVpib1QyYzB4ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vMTkyLjE2OC43LjIwNC9maW5vdmEvcHVibGljL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MzoibG9naW5fYWRtaW5zXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1760960542),
('K9DPZZ5VmenrI7rauAZSMXGSrwPtfcmtz1Vuzuk8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3gwWjBzNVFXOEV6aURtT0tKUWpiNTdFUVNBeHAxUTQ0VzI1RDdDWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZWFybmlmeS9wdWJsaWMvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763374084);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `json`, `status`, `updated`, `date`) VALUES
(7, 'finance_settings', NULL, '{\"min_withdrawal\":\"50\",\"max_withdrawal\":\"100000\",\"withdrawal_fee\":\"15\",\"withdrawal_status\":\"open\",\"daily_check_in\":\"50\",\"welcome_bonus\":\"400\"}', 'active', '2025-10-11 17:34:15', '2025-08-07 15:56:53'),
(8, 'referral_settings', NULL, '{\"first_level\":\"20\",\"second_level\":\"5\",\"third_level\":\"1\"}', 'active', '2025-08-14 20:11:08', '2025-08-09 21:54:32'),
(9, 'general_settings', NULL, '{\"whatsapp_group\":\"https:\\/\\/whatsapp.com\\/channel\\/0029Vb6Aht7BvvspC3miJd0P\",\"telegram_group\":\"https:\\/\\/t.me\\/+O5S4dKvshZtjMDk8\",\"notification_message\":\"Test\"}', 'active', '2025-10-07 11:15:26', '2025-08-13 11:01:08'),
(10, 'deposit_settings', NULL, '{\"account_number\":\"5005016577\",\"bank_name\":\"first bank\",\"account_name\":\"Abakpa David James\"}', 'active', '2025-10-20 16:34:43', '2025-10-20 16:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `class` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `user_id` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uniqid`, `reference`, `amount`, `class`, `type`, `json`, `user_id`, `description`, `status`, `updated`, `date`) VALUES
(1, 'TRX68E8E2B22EAB7', '100004251010083417142795987348', 100, 'credit', 'deposit', '{\"gateway\":\"paystack\",\"details\":[]}', 8, 'Account deposit', 'success', '2025-10-10 17:40:50', '2025-10-10 17:40:50'),
(2, NULL, NULL, 3000, 'debit', 'purchase', '{\"id\":13,\"photo\":\"1760094566.jpg\",\"name\":\"PW1\",\"price\":3000,\"daily_income\":700,\"cycle\":40,\"status\":\"active\",\"updated\":\"2025-10-10 12:09:26\",\"date\":\"2025-10-10 12:09:26\"}', 8, 'PW1 Purchase', 'success', '2025-10-10 19:11:13', '2025-10-10 19:11:13'),
(3, NULL, NULL, 50, 'credit', 'check in', NULL, 8, 'Daily Check In', 'success', '2025-10-10 19:12:53', '2025-10-10 19:12:53'),
(4, 'TRX68EA1B2451ADC', NULL, 5000, 'debit', 'withdrawal', '{\"fee\":750,\"amount\":4250,\"details\":{\"bank\":\"{\\\"account_number\\\":\\\"3185287824\\\",\\\"bank_name\\\":\\\"First Bank of Nigeria\\\",\\\"account_name\\\":\\\"ABAKPA DAVID JAMES\\\"}\"}}', 8, 'Bank Withdrawal', 'pending', '2025-10-11 16:53:56', '2025-10-11 16:53:56'),
(5, 'TRX68EA24D371677', NULL, 100, 'debit', 'withdrawal', '{\"fee\":15,\"amount\":85,\"details\":{\"bank\":\"{\\\"account_number\\\":\\\"8118768360\\\",\\\"bank_name\\\":\\\"OPay Digital Services Limited (OPay)\\\",\\\"account_name\\\":\\\"DAVID JAMES ABAKPA\\\"}\"}}', 8, 'Bank Withdrawal', 'success', '2025-10-20 17:31:34', '2025-10-11 17:35:15'),
(6, 'TRX68EA24ED7272D', NULL, 50, 'debit', 'withdrawal', '{\"fee\":7.5,\"amount\":42.5,\"details\":{\"bank\":\"{\\\"account_number\\\":\\\"8118768360\\\",\\\"bank_name\\\":\\\"OPay Digital Services Limited (OPay)\\\",\\\"account_name\\\":\\\"DAVID JAMES ABAKPA\\\"}\"}}', 8, 'Bank Withdrawal', 'success', '2025-10-11 18:16:41', '2025-10-11 17:35:41'),
(7, NULL, NULL, 700, 'credit', 'income', '{\"id\":1,\"user_id\":8,\"json\":\"{\\\"id\\\":13,\\\"photo\\\":\\\"1760094566.jpg\\\",\\\"name\\\":\\\"PW1\\\",\\\"price\\\":3000,\\\"daily_income\\\":700,\\\"cycle\\\":40,\\\"status\\\":\\\"active\\\",\\\"updated\\\":\\\"2025-10-10 12:09:26\\\",\\\"date\\\":\\\"2025-10-10 12:09:26\\\"}\",\"reward_cycle\":\"24 hrs\",\"status\":\"active\",\"updated\":\"2025-10-10 12:11:13\",\"date\":\"2025-10-10 12:11:13\"}', 8, 'PW1 Daily Income', 'success', '2025-10-20 16:16:57', '2025-10-20 16:16:57'),
(8, 'ARXEZZVM5R', NULL, 3000, 'credit', 'deposit', '{\"gateway\":\"Manual\",\"details\":{\"bank_name\":\"first bank\",\"account_name\":\"David\"}}', 8, 'Account deposit', 'pending', '2025-10-20 17:20:37', '2025-10-20 17:20:37'),
(9, 'SCTB0BELYF', NULL, 3000, 'credit', 'deposit', '{\"gateway\":\"Manual\",\"details\":{\"bank_name\":\"first bank\",\"account_name\":\"David\"}}', 8, 'Account deposit', 'rejected', '2025-10-20 17:21:58', '2025-10-20 17:21:01'),
(10, 'LUQCDB9ISD', NULL, 3000, 'credit', 'deposit', '{\"gateway\":\"Manual\",\"details\":{\"bank_name\":\"first bank\",\"account_name\":\"David\"}}', 8, 'Account deposit', 'success', '2025-10-20 17:21:50', '2025-10-20 17:21:33'),
(11, NULL, NULL, 700, 'credit', 'income', '{\"id\":1,\"user_id\":8,\"json\":\"{\\\"id\\\":13,\\\"photo\\\":\\\"1760094566.jpg\\\",\\\"name\\\":\\\"PW1\\\",\\\"price\\\":3000,\\\"daily_income\\\":700,\\\"cycle\\\":40,\\\"status\\\":\\\"active\\\",\\\"updated\\\":\\\"2025-10-10 12:09:26\\\",\\\"date\\\":\\\"2025-10-10 12:09:26\\\"}\",\"reward_cycle\":\"24 hrs\",\"status\":\"active\",\"updated\":\"2025-10-20 09:16:57\",\"date\":\"2025-10-10 12:11:13\"}', 8, 'PW1 Daily Income', 'success', '2025-11-17 18:32:47', '2025-11-17 18:32:47'),
(12, 'WTD9KALQAE', NULL, 10000, 'credit', 'deposit', '{\"gateway\":\"Manual\",\"details\":{\"bank_name\":\"22\",\"account_name\":\"200\"}}', 8, 'Account deposit', 'pending', '2025-11-18 07:09:36', '2025-11-18 07:09:36'),
(13, NULL, NULL, 50, 'credit', 'check in', NULL, 8, 'Daily Check In', 'success', '2025-11-18 07:18:34', '2025-11-18 07:18:34'),
(14, NULL, NULL, 50, 'credit', 'check in', NULL, 8, 'Daily Check In', 'success', '2025-11-18 14:48:43', '2025-11-18 14:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `ref` varchar(255) DEFAULT NULL,
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'bank details' CHECK (json_valid(`bank`)),
  `virtual_account` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`virtual_account`)),
  `customer_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'payment gateway customer details retrieved when creating customer with api' CHECK (json_valid(`customer_details`)),
  `recipient_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'recipient details for paystack transfer apis\r\n' CHECK (json_valid(`recipient_details`)),
  `deposit` float NOT NULL DEFAULT 0 COMMENT 'deposit wallet',
  `withdrawal` float NOT NULL DEFAULT 0 COMMENT 'withdrawal wallet',
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uniqid`, `name`, `email`, `phone`, `email_verified_at`, `password`, `username`, `type`, `ref`, `bank`, `virtual_account`, `customer_details`, `recipient_details`, `deposit`, `withdrawal`, `json`, `remember_token`, `created_at`, `updated_at`, `status`, `date`, `updated`) VALUES
(8, NULL, NULL, 'paywealth@gmail.com', '09013350351', NULL, '$2y$12$D4gRz7i5VWtWVdskh/cYVeEMmh9Ee1ifZq58U4za6qBSCimz2bOxq', 'blaady02', 'user', NULL, '{\"account_number\":\"8118768360\",\"bank_name\":\"OPay Digital Services Limited (OPay)\",\"account_name\":\"DAVID JAMES ABAKPA\"}', '{\"bank\":{\"name\":\"Wema Bank\",\"id\":20,\"slug\":\"wema-bank\"},\"account_name\":\"DEVTECHIEINNO\\/JAMES DAVID\",\"account_number\":\"9326486961\",\"assigned\":true,\"currency\":\"NGN\",\"metadata\":null,\"active\":true,\"id\":34965132,\"created_at\":\"2025-09-21T08:48:11.000Z\",\"updated_at\":\"2025-10-09T12:45:44.000Z\",\"assignment\":{\"assignee_id\":311223495,\"assignee_type\":\"Customer\",\"assigned_at\":\"2025-10-09T12:45:44.000Z\",\"expired\":false,\"expired_at\":null,\"integration\":1597558,\"account_type\":\"PAY-WITH-TRANSFER-RECURRING\"},\"customer\":{\"id\":311223495,\"first_name\":\"David\",\"last_name\":\"James\",\"email\":\"techie5961@gmail.com\",\"customer_code\":\"CUS_bq46rv2mh72on0j\",\"phone\":\"09013350351\",\"metadata\":[],\"risk_action\":\"default\",\"international_format_phone\":null}}', '{\"transactions\":[],\"subscriptions\":[],\"authorizations\":[],\"first_name\":\"David\",\"last_name\":\"James\",\"email\":\"techie5961@gmail.com\",\"phone\":\"09013350351\",\"metadata\":[],\"domain\":\"live\",\"customer_code\":\"CUS_bq46rv2mh72on0j\",\"risk_action\":\"default\",\"id\":311223495,\"integration\":1597558,\"createdAt\":\"2025-10-09T12:20:00.000Z\",\"updatedAt\":\"2025-10-09T12:20:00.000Z\",\"identified\":false,\"identifications\":null}', '{\"active\":true,\"createdAt\":\"2025-10-11T09:35:05.755Z\",\"currency\":\"NGN\",\"description\":\"Transfer recipient for DAVID JAMES ABAKPA\",\"domain\":\"live\",\"id\":113252323,\"integration\":1597558,\"name\":\"DAVID JAMES ABAKPA\",\"recipient_code\":\"RCP_tf2h07jyparbzv2\",\"type\":\"nuban\",\"updatedAt\":\"2025-10-11T09:35:05.755Z\",\"is_deleted\":false,\"isDeleted\":false,\"details\":{\"authorization_code\":null,\"account_number\":\"8118768360\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_code\":\"999992\",\"bank_name\":\"OPay Digital Services Limited (OPay)\"}}', 50100, 496800, NULL, 'HC4DDwE5mFAV1kieli9haxEFWPMB5DVdOyDLBWvobFmbA5PYFqRozJscXzER', NULL, NULL, 'active', '2025-10-06 14:10:21', '2025-11-17 18:32:47'),
(18, 'USR68E8F62421529', NULL, 'techie@gmail.com', '08118768360', NULL, '$2y$12$eGMup2OQTwUGiZ2aiD97CuYuXpjEDQNGwMVube7LQID88lNvyWb.i', 'techie', 'user', NULL, NULL, NULL, NULL, NULL, 0, 400, NULL, NULL, NULL, NULL, 'active', '2025-10-10 20:03:48', '2025-10-10 20:03:48'),
(19, 'USR68E8F660E45EF', NULL, 'daddy@gmail.com', '07035074663', NULL, '$2y$12$BpHqChczDp7wi5GSl5Xrh.PeSraPq5Zg1ZrDOHfKS/IIxbyTQVC/O', 'daddy', 'user', NULL, NULL, '{\"bank\":{\"name\":\"Wema Bank\",\"id\":20,\"slug\":\"wema-bank\"},\"account_name\":\"DEVTECHIEINNO\\/ABAKPA DAVID\",\"account_number\":\"9326507893\",\"assigned\":true,\"currency\":\"NGN\",\"metadata\":null,\"active\":true,\"id\":34967225,\"created_at\":\"2025-09-21T08:49:43.000Z\",\"updated_at\":\"2025-10-10T12:12:19.000Z\",\"assignment\":{\"integration\":1597558,\"assignee_id\":310266223,\"assignee_type\":\"Customer\",\"expired\":false,\"account_type\":\"PAY-WITH-TRANSFER-RECURRING\",\"assigned_at\":\"2025-10-10T12:12:19.710Z\",\"expired_at\":null,\"assignment_expires_at\":null},\"customer\":{\"id\":310266223,\"first_name\":\"David\",\"last_name\":\"Abakpa\",\"email\":\"abakpadavid2003@gmail.com\",\"customer_code\":\"CUS_m83y7iompkktj8d\",\"phone\":\"09013350351\",\"metadata\":{\"calling_code\":\"+234\"},\"risk_action\":\"default\",\"international_format_phone\":null}}', '{\"transactions\":[],\"subscriptions\":[],\"authorizations\":[],\"first_name\":\"David\",\"last_name\":\"Abakpa\",\"email\":\"abakpadavid2003@gmail.com\",\"phone\":\"09013350351\",\"metadata\":{\"calling_code\":\"+234\"},\"domain\":\"live\",\"customer_code\":\"CUS_m83y7iompkktj8d\",\"risk_action\":\"default\",\"id\":310266223,\"integration\":1597558,\"createdAt\":\"2025-10-05T08:13:37.000Z\",\"updatedAt\":\"2025-10-05T08:13:54.000Z\",\"identified\":false,\"identifications\":null}', NULL, 0, 400, NULL, 'fZVe6n63be7X8GZwQj0dZPr4IsnoKjwO9Sz1UdrjrvF1aQMHNCp9XdeNfj4J', NULL, NULL, 'active', '2025-10-10 20:04:49', '2025-10-10 20:04:49'),
(20, 'USR68E8F9D554017', NULL, 'emmanuel@gmail.com', '09051159947', NULL, '$2y$12$k2xVaAJIW9eeGTzK6DmdIOm8mGc.OKVxQCQsHoDWvoQLadBC2uC9q', 'emmanuel', 'user', 'blaady02', NULL, '{\"bank\":{\"name\":\"Wema Bank\",\"id\":20,\"slug\":\"wema-bank\"},\"account_name\":\"DEVTECHIEINNO\\/OCHE EMMANUEL\",\"account_number\":\"9326508144\",\"assigned\":true,\"currency\":\"NGN\",\"metadata\":null,\"active\":true,\"id\":34967250,\"created_at\":\"2025-09-21T08:49:44.000Z\",\"updated_at\":\"2025-10-10T12:20:31.000Z\",\"assignment\":{\"integration\":1597558,\"assignee_id\":311456316,\"assignee_type\":\"Customer\",\"expired\":false,\"account_type\":\"PAY-WITH-TRANSFER-RECURRING\",\"assigned_at\":\"2025-10-10T12:20:31.194Z\",\"expired_at\":null,\"assignment_expires_at\":null},\"customer\":{\"id\":311456316,\"first_name\":\"Emmanuel\",\"last_name\":\"Oche\",\"email\":\"emmanueloche@gmail.com\",\"customer_code\":\"CUS_vbxcnwzlr3cwt7y\",\"phone\":\"09051159947\",\"metadata\":[],\"risk_action\":\"default\",\"international_format_phone\":null}}', '{\"transactions\":[],\"subscriptions\":[],\"authorizations\":[],\"email\":\"emmanueloche@gmail.com\",\"first_name\":\"Emmanuel\",\"last_name\":\"Oche\",\"phone\":\"09051159947\",\"integration\":1597558,\"domain\":\"live\",\"metadata\":[],\"customer_code\":\"CUS_vbxcnwzlr3cwt7y\",\"risk_action\":\"default\",\"id\":311456316,\"createdAt\":\"2025-10-10T12:20:27.874Z\",\"updatedAt\":\"2025-10-10T12:20:27.874Z\",\"identified\":false,\"identifications\":null}', NULL, 0, 400, NULL, 'eU6rvQ6g3zBpBAYRt2ETuEfJvZP06sSm2cX8WyXAqYDNEdAZeRA4a4HkRCDe', NULL, NULL, 'active', '2025-10-10 20:19:33', '2025-10-10 20:19:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
