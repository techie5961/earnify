-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2025 at 12:54 PM
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
-- Database: `paywealth`
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
(4, 20, '192.168.221.196', '2025-10-10 20:19:54');

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
(19, 'Blaady02 Just placed a withdrawal', 'unread', '2025-10-11 17:35:41');

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
(1, 8, '{\"id\":13,\"photo\":\"1760094566.jpg\",\"name\":\"PW1\",\"price\":3000,\"daily_income\":700,\"cycle\":40,\"status\":\"active\",\"updated\":\"2025-10-10 12:09:26\",\"date\":\"2025-10-10 12:09:26\"}', '24 hrs', 'active', '2025-10-10 19:11:13', '2025-10-10 19:11:13');

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
('1P9UyXo0W9QxWuwdgN9F3JJVpFJivZCOizmiRaCi', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0VuY05nOUU1QTQ5UVFzT1ExMWxKeWNoRTJiY3czWjVIR2xROHdxVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760047433),
('1PW9mabIOLifdsyrml3yZbapWkWaFHuxGPlKUBWU', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczExMDZoM2ZJM1ZRelBIU3RUVEtpRmk3RmdXcGdZQ2dNYkNpN3VtMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011234),
('1rk1lRBDROXubFnGhWnWir4krHzqdk6i4t2VXOZS', NULL, '192.168.153.123', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnVkeVVkZzdWbVpqeDhzNzVkOHBtNjhycVJmUHhMSDh5Q0g0RGtXSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xOTIuMTY4LjE1My4yMDQvcGF5Y29ubmVjdC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757596515),
('3CMLQu2zd8hsA3SIzY6KdduaXSFMYe4JbQqE84qz', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjQ2UmVDMXVjaHk0dnBSU3BDaFNOTU5VaXF5RVREOExJQ0NWUUVqNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760012435),
('3QTro5SeDEIFjz9V3D014KW6jdNkqwqq8OJ3zwNj', NULL, '197.211.63.59', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaEhCTlp1ZVJBTG5oNXhPYWpYa0xkUkFBcUM0c3o1bDRwN0NNR0xzeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vcGF5Y29ubmVjdC5pbnQubmcvdXNlcnMvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MzoibG9naW5fYWRtaW5zXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjUyOiJsb2dpbl91c2Vyc181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1755670300),
('4mqyxp6SyQWn37z28cvSl8pBamxck7dXuYJVcEgs', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblBseXJNSWJkQzRlZlIxelF0ZkJiU2pCMmpQMThmYUdYUXdQQmJpNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170023),
('4TlzqzTIy3xjRZANbp8Vqiyx6oItbIpOEnkuR38W', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHlmRDRQZWVwQjdTdmhJWXdzb05hNEpwSzJCNFl1VGVXSXN5MlVyQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755666095),
('5HAVRnpu3SCYzRLvHI9SQlzUysGsNOOY9J4yJZUG', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVGNyS2ZHOURTcmVZRW1jczBSN1VIS1pLMXJHeEhvaTV1Y0w4cmlHUCI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjY0OiJodHRwczovLzE5Mi4xNjguMjIxLjIwNC9wYXl3ZWFsdGgvcHVibGljL3VzZXJzL2dldC90b3RhbC9iYWxhbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760093975),
('5hUFOgFGomDFHNE5qWgPMluqLysWM8C3hEoWdNlQ', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm9mcHN2b3oybFpPRmMzSHd0Znd6SkJXMURNbWo1ejdBcmRBdmNmSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175412),
('5uhGEJi7jgarc6z1CsY0DKzFSfSNkXfcbwjQG5SF', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3dscTVEUk5qUWFRV1ZvZzBxOFIxZUl6YnJsMkhCeUJPMW5UNkRkVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI3OiJodHRwczovLzE5Mi4xNjguMjIxLjIwNC9wYXl3ZWFsdGgvcHVibGljL3BheXN0YWNrL2R2YS9wcm9jZXNzP2Ftb3VudD0xMDAmY3VzdG9tZXJfY29kZT1DVVNfYnE0NnJ2Mm1oNzJvbjBqJmN1c3RvbWVyX2VtYWlsPXRlY2hpZTU5NjElNDBnbWFpbC5jb20mY3VzdG9tZXJfcGhvbmU9MDkwMTMzNTAzNTEmcmVmZXJlbmNlPTEwMDAwNDI1MTAxMDA4MzQxNzE0Mjc5NTk4NzM0OCZzdGF0dXM9c3VjY2VzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760092158),
('6IGDPgM9GWnlPPt4fZK7BBSbaJ9KGIqNpYfNPrPV', NULL, '192.168.214.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGZFbHd3Y2o5aFlsNnQxR0pYNnR4WlVZNHJwelB1ZGxpTEM0SHpidyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vMTkyLjE2OC4yMTQuMjA0L3BheWNvbm5lY3QvcHVibGljL2FkbWlucy91c2VyP2lkPTciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755758817),
('6n2ahNtHopZrnQqZy788xLLXKn0TykCrSUW646E1', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHhCd3dkYmsxbkFSOXJyeVd5Vmx4NDlDR09RWDlINU41ZEdRdDhVQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwMDAmcmVjaXBpZW50PVJDUF9yN3podTdudnp1eWZ6Z2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760175059),
('6rms11PGyYvJFyq3x5GTaSd8UsouBRvqmZS80HHf', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUpYWWl6UVk1VHBWRGN0a2MybFA3WUJtUFNFVG14ZXFLRDczMTBmViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125269),
('7ERQjmB8bOBObX1AWAu86DNjMI315KeAUgjoWz3k', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXlQOHNjYVhmbVJMY1ZJaTFyNUloNjBsYVB1eG5EZ29LektSSG9LTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760013844),
('7rC88fDMAIK3i1RFO7fuXhtyfqa4OcT0ACsQkv34', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianFVWVJVMnh0Y2JQNmFRejB5cktvRGVKMlZQUmJGdkRwYWdnd1hySSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013766),
('7t4OwdHZUSFzyfwTwg7lfSuRxOG5Go1y0VHSrWgs', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWYxc20zOHBudDk3Q2g0UHRsam40NjdoUnpqUG85NWZObEM3WnlEQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760051479),
('83qfKj6xE1jF7gcvcSQJujOmpNZyyhPZN1lk2sQy', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3FQbWphOEZlSkFoc2NqNFlpdXN5VzVCNDRMT3NhWnZpMVgwdFV5VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175878),
('8pD2QSIe5zLTCKCd3ivf1rJovok58zvfvxlkGZvp', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGE5Z0FBcndLRHV3TGFYdk0wUmVGRU5PVGNXMExXaFYwWGRCSm9FWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI3OiJodHRwczovLzE5Mi4xNjguMjIxLjIwNC9wYXl3ZWFsdGgvcHVibGljL3BheXN0YWNrL2R2YS9wcm9jZXNzP2Ftb3VudD0xMDAmY3VzdG9tZXJfY29kZT1DVVNfYnE0NnJ2Mm1oNzJvbjBqJmN1c3RvbWVyX2VtYWlsPXRlY2hpZTU5NjElNDBnbWFpbC5jb20mY3VzdG9tZXJfcGhvbmU9MDkwMTMzNTAzNTEmcmVmZXJlbmNlPTEwMDAwNDI1MTAxMDA4MzQxNzE0Mjc5NTk4NzM0OCZzdGF0dXM9c3VjY2VzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760092119),
('8S6EwAJEirZImiGbU2PwhwUKyNzkq1cmmRPFoWX1', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickt1eUVWSVBmNzd6ZmJPRjZZaGlCTDYyMzFKVGx3akRnMVNLUks4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011114),
('9bBAT943VYAFeKuhLqwxaKC4f8cEC7CKvS1ZMNsY', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm92U1k1dDZvNHlNUjBNd3ZJTTZZdWQ0SFp0bVBqREx0OU1TN0pWMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760172264),
('9zrLZONeRCjKTR1JUP4ZZ8bfSL8JKihdMx0DKmMh', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmtJOU9LZUh3YjZXTGtOYlptVHE2UDlTMjRGVG1RWHdJamlSWXNZZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760171483),
('a5K6GD3lxC9oYHsjY8gXjFv6yMfgYwdhPiTsOx32', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkVURTBTNFBlSnZDU1htUk5CTkdRdnhySFJZNHFRYXRjWlVYY1pJYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755669695),
('aBBQLrOvGgnUl1zJIfZ3QUKbZcXAa5iDQwF4ffUO', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW1URGExOEp0cldqbWhhZG1UWVUySjRaczNKYndqQ2k3MTFGU1d2OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177801),
('AHm7a7AYtizbXxMlRAharxFS5fYvQBSVMoL40C90', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlFOOFFwSUpacFR5Z2xRQjd0cXd0UHp1Wjg3aERKN1NibG9nT3c1ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19tODN5N2lvbXBra3RqOGQmZmlyc3RfbmFtZT1Hb2R3aW4mbGFzdF9uYW1lPUFiYWtwYSZwaG9uZT0wNzAzNTA3NDY2MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760098339),
('aMcAbZEF4XS2KFZ916RcqdSj2BFRbjFXJEH7iTkb', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGN3MFlGNGVKcGFkV01yTmJOWHBKUWlEVlhzcXUxMXlJeGs5OElaaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760172096),
('aPbcICn6F9Ewwkvac0LnF3yel7rz9oAIT5G079UF', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRkVZd3RaS3VPTUtSYWp0T3B4RGJoNXJ1a2xMMGY4eW1vdWNFalYzQyI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU2OiJodHRwczovLzE5Mi4xNjguMjIxLjIwNC9wYXl3ZWFsdGgvcHVibGljL3VzZXJzL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760098418),
('aUObChxQzfuJGsJXcrjx2IJ9yB5oXXSg05I9sTVq', NULL, '192.168.153.123', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclB5TEg2QUsxU3hPRzlEZWwxSVhNM1lrQkFKQ09NaGczZElMWmt1VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xOTIuMTY4LjE1My4yMDQvbGFyZGVsL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757596545),
('b0XmgVv6mgE0Xz5dUl18YKcjRPEOpCeJdjZ1mEQe', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0VJd2Z0YVNqY2RDVERsd3M3WjMxbWltZHJ4QUFEazFTc1JHamltcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760170932),
('bbgwZqZDwVnG4UlIisMk1reukR7uZDSpgp1D9em2', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjNySnloZ3BxZ0pvbXEwZVUwTVFuNTVaeE43eGRTTEl0aGg0dTJZMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760176953),
('bcXHM6OZcmVhHEDkBfYrmyMQcbYup4TYi29ZR0zW', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUZqa3RjM2MzWXJWSlN6M2prWG9VYXR2aklKM0NXcWpINTlzcmhVciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170240),
('beoerIioXU7b4WvqPIo2FbkzGrRmlHDMVTt7GzU7', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0JMMkFFZjNRVzloaFFvcDk1VWZMajUzeE1wdmhoQkVnM3hVS3F4QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177413),
('blOCzQcqkMNlQJ99H6bKmOD0V8CSeYlaibCmmQZq', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVJqNlFRZVhVT3RoTXlHdmdQelRNdkZIYVdUMjQ0NFdmZVJrMjJIQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177128),
('CKMkgEkmBvUPcNkdum2JaTvEIFjOONgmwd1qxtvG', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnUzRFZ6THZCZ3p1ZVQzQ3kyWUNUZU9IOWhmY0Z0ajcybEdrclJLSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760168489),
('CRq0W6XrDfzHZx1To3LBehFrXkyZRMndkIWc0Qoi', NULL, '146.70.185.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVm1TTDExcGxBNGFjTklwS2xBWTVwaklnclBZdEszYnlCZjZWTnkzQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755669676),
('crWv5xxU8huXn6qFIpWsOib9vwAhBMRkNRhzIz8e', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXd2OWFoWDJ4cndORExQMXdSbnNDMllRcWNjUUEzUFN4RGdPb1FkMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTAxMSZuYW1lPUFCQUtQQSUyMERBVklEJTIwSkFNRVMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760172640),
('cslza2z6m5QM1XF6rwSmdDJgiFi2Kx365RiVqcwq', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWd3VzI3UE4xR3p1T002ekk2MExXMHhBSEt4aUozcTNCOVk0dlFsWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760170848),
('CVr8wW2yUeUO7zbHgtCmUF2XBITpdMdSWj3pDdW3', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHpHU09BYWtkR0xUTEp0bGNHbWdwOXJ6M3YzaW9QNkdpTnlPelp4RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760051476),
('cXY4eATQHuV9kEV4Xpy5CsiHrdodbgXWVg3pz4UD', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTgyYkw3ZnFTWWZta1Fxdm9id3RlVzRPTWNoTFkxcEh3VDZGOHk1bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177143),
('CzJUlsDP74gkXojjVTEdiZMo8x8WLXaftZGdgbp9', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV251QmJhOXFJNFg1SXhuakNKVkNSbEVjaG91VFppZmNMQ0h6SXlJUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760047428),
('d3CTsv7zSX3o4dtd8umq7viHt0UiGeKq7EdI6Nuy', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVlWaVgzeEZTRXozTDB2eHo2MXBPMURPU0NKUlhHZTFRb2pISnlXVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760013867),
('dAJ1Vkso2yuHKEhpqXLXq9x67Q9SmqSsd5SfX7hT', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1F2akFlMkE2SnoxeHZQODNnWTRWMjNVWEd0bGxpcVVFWG5rM2JRNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125897),
('e5HL1fivhYaK0XZFvLqRBboVAnSEbLGw5Ni2Xg9N', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnFOeHJ6ZWk3UUdLWGdkUzY3c1VMQ1hqaEV6Z2FqaDVLQ0c4Z1NTTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125256),
('EddGTBPujwF4uYToPWMc0DjDCtBUBk6ZT6oi8pF0', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTI5NUxTVnRPelpWS2NnTEhEdVlHNXJURjJKeFJZbEIzYzVDSUhiViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177167),
('ehKn21VBPXj8eHTR1at3jByVRobcBGsHdM6Dcd1r', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWxHOXBhVm1ac1JCUEZVZDB2dEJpdHduMWE5N0V4aGlST1VUdXlkZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3BheXdlYWx0aC9wdWJsaWMvdXNlcnMvZ2V0L3RvdGFsL2JhbGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl91c2Vyc181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIwO30=', 1760098891),
('Ezqvvr9A1T6HOn9gZni8kAHn36ikYaOxxwToDUjG', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWG1aU0FuMU9oRUNPdXdpV09RcEthTXM5UGdpdWZ0blpCT3FsYXdYYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177080),
('fDLCh8mDjAIhXewpAanZIaou0cHrxgupkJurQ7nJ', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFRNNGRMRlREaUVDTmx0WUVUYjlOcDZyc2MxQzI0TG9TU1QxeG9oRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTA2OCZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760172562),
('FIMV74t4CkWo8P3wFnMUDicOBANUFCkv3q4I12xK', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3hCMU4wU3lkRExUOWhwODRPMEppTWVaUTEwQ2NEWFFsRzBBQnB5RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760047510),
('FxTJvBC0j5mjvQl0sFen8AFYKpg9vHP5eEJvNgXb', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXU5b3h2STRqYURYSGJDbU9NdHFaR1puc1pzQUh5bGtyaW5yN2YyMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly9sb2NhbGhvc3QvdGVjaGllL3B1YmxpYy9hcGkvcGF5d2VhbHRoL2NyZWF0ZS9jdXN0b21lcj9waG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760016898),
('G6bJil45wXwFpBKhDuEPSadS3jCIUMOpBoGiv47b', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMExQaFJFQXBkS0trWjhXYzBDN3B3OGtmVGRCY2dyS2tTM3JabFVMbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwMDAmcmVjaXBpZW50PVJDUF9yN3podTdudnp1eWZ6Z2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760174732),
('G9D5nxYKT9KvWpzfpdlTert5NjbmT1fOyme15Po3', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTG84TkNPVWNQSDA0ZG1mMTRSYlR2aTkwdWNQc1o5M2JRVU1rbGJvTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755676897),
('GEMADsRk01xblhBJv4Gs5DdH8HTZY1XPzGBxQkqQ', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEZpMjIwSkk3V1lIdGM4bTBWdGdjMFFQRFVESU9oMnZ1UWRkSFNBYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013811),
('GlwpFxE3x7NFsmNPqDEbGYEYyg1Ke92nbtcntCLC', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnpuZ3Y5VVRGZ2dHQk9GcUo3S2tBbzEyTmlFTzhBVXcwUVN5emVhYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760012399),
('GzatpctRz6DVQTMSfVvLvNbA2VsoHTt2iQXjJKju', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDJ1S0pwOHVYV21LVjVoN1R0dlo5WXl2b1BmdTdqUENOM3hTSGRVcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly9sb2NhbGhvc3QvdGVjaGllL3B1YmxpYy9hcGkvcGF5d2VhbHRoL2NyZWF0ZS9jdXN0b21lcj9waG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760016348),
('H5biN6Gd05vuanbo4OfmAC18HcSDhxYOUbkcviTf', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTg3WGRXUzlsQXk5aVFJVEVzUmZyUVlOdnBxdVUyYUI0REtQc1czdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755673296),
('HqMWaornsww6otaqLuORzF02BuZtzYMoyMHCUZR5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHpGaDhPbVhYNUpaRm0xaUZINHJzZlI3Y0p2MjFxa0w2MzJoVUZPQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5Y29ubmVjdC9wdWJsaWMvaGFzaD9wYXNzd29yZD1CbGFhZHkwNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756018595),
('huoZLyfjQiLdSGI0VjosXRb4erUnGpjtrHEjlsUe', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblNIeUJ0NVJuNVF0SEVXdVRCcnFLY25paWlDTkdMTVNRcHFqazVOMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3BheXdlYWx0aC9wdWJsaWMvcmVnaXN0ZXIvcmVmL2JsYWFkeTAyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760097118),
('IHGjm7MtIxbcHUfs2JaGT2SxfjEC1jqeQqKYSSey', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFVHZ3Roek9laGJEZm0xcGhmN0ZVb1M0WW43dUk5dTlnUUduOHlqeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU19icTQ2cnYybWg3Mm9uMGomZmlyc3RfbmFtZT1EYXZpZCZsYXN0X25hbWU9SmFtZXMmcGhvbmU9MDkwMTMzNTAzNTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760013942),
('ImD2ZZMonEb6n9PpuUrvNwFVKkkOdxMGgc6xZmj4', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3ZhZUxhQnIxUjdDTUtyVFdUUmRiOGhaM29CT0t0M29JN1Z2aEhvWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTcmbmFtZT1BQkFLUEElMjBEQVZJRCUyMEpBTUVTIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760170342),
('iNjx1BBBvuLHn8fd88M6h3PVHQOQ9bDnns6r1Fve', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzlQaDBaRjh2Y2VQY2hMOWVJSW56YVVkU0xORFVhODVVN09XVnR4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013164),
('iOkgI9pFtQYq7FT4u9Ub75b8wDzdaBH9wwduYsPS', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkRpeG45ZFhNZ0VRYjR6UG5Udm1PU2d6MVRFS2FuVFBpMDQyeGtqbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175530),
('IrYcGB4a3BkmVNREgqqn9QvdfgnibWwQLS8YfqX7', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEVSbjBlSUpNbUowa1JEUzBpeTZSVDZMemp4N1psN1UybG5hYTFNZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013840),
('J6688y5CokhU6z6pWX9mYX3Gdu59w1IOvsYyfVdL', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0FCYm04dE9FcEJiNXlwNE96MEZSUFdYanIxdE9hU1FGTE9ROFh3NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTcmbmFtZT1BQkFLUEElMjBEQVZJRCUyMEpBTUVTIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760170444),
('J9rFzWtPCYLPsHLbehyBKPgTGZK17OQ9uHYIQzh1', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidHI2WVlTN0J6ckljcFBrRzNTdDN0UW00M1hRS21YbVVsam55RWJaUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3BheXdlYWx0aC9wdWJsaWMvdXNlcnMvZ2V0L3RvdGFsL2JhbGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl91c2Vyc181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7czo1MzoibG9naW5fYWRtaW5zXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1760180033),
('JOleSkZcZpLMWcChy2vVJiABsrQweqmiTZw04Xs0', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTh2ZEhLRmVmR01LUGJzWHhtSUVkM0E4V3RXeHJHNDJKYjVFT2F6aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177483),
('klKA2UuXkcg74priXJ1aZLPgOiId4R4BnqhQvLw9', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFg1RnlxbmhoSVM2NjBENHZaMDl0aHlzdlAzQmFmNENpb1JpaXdqWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177031),
('kqTB59hAJtjbd0O3jIw1OKJQx5JPZUUgaD1aXOzL', NULL, '192.168.70.222', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0JRVm5Qb2NOVUs4azdDTFFzbEd2SXFsNWJiTDlzZ3lTOU44andJYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vMTkyLjE2OC43MC4yMDQvcGF5Y29ubmVjdC9wdWJsaWMvdXNlcnMvcmVjaGFyZ2UiO31zOjUzOiJsb2dpbl9hZG1pbnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NTI6ImxvZ2luX3VzZXJzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzt9', 1755683085),
('KZdYBxTJc4swXPyePGH6vBfUdbpKWkPFwtWGYESd', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 Edg/92.0.902.67', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRThLcDJFTVA1ZmFydmNFemFQbWdNVWVPNmZFR2R1SHpSZ2xSWEYxNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5d2VhbHRoL3B1YmxpYy9wYXlzdGFjay9kdmEvcHJvY2VzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX3VzZXJzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1760091029),
('L8srOFg29pqNxAZCR7PNVoj9XHATyhPWxrh6tvwa', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW9yM2w3bnJIVUFWRW12WjdIMXJ4Y0Ztd0o2dmtJZjNKZ1ZkOXh5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvZHZhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760092866),
('LC8jimr6MYgAadI3JBd69KtwHWoDkjAg68E2HBcg', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEppQjlTaHhyZXlYZnI3SmZJY3hySlJEUERGWmlNUXFuZWRiaFlkWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvZHZhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760118873),
('lkaJ14DoKfwCVzl9PwWoBSlqQCnFP9GjkPLAWEaR', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWllNU1RCU2xyYnNmajVaUEtEMlE2NkZuY29oeG0xdUFhYmYyNzMzVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125458),
('lkswK1AabdyMGZnOhiEhnaDdIdXnrdrFT18OLGz8', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUw2cXltQWRBUXluMHc1UmswTlF2emhGNnk4Sng0UFFYZUYzcVRvaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177330),
('lv3g43AUcqO5tCoiQzdPgMiST52ZNfR4BCJgFE7o', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnV6czVlbkpCbWZ5OGNsRVJiZ3lSbmpCT05OSXd0NnpCMlJjWlBZViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvZHZhP2N1c3RvbWVyPUNVU192Ynhjbnd6bHIzY3d0N3kmZmlyc3RfbmFtZT1FbW1hbnVlbCZsYXN0X25hbWU9T2NoZSZwaG9uZT0wOTA1MTE1OTk0NyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760098831),
('lxQKnbKYlKJo3UFw557wclqlaslgKBU4ieAbVewW', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDlKTGtMRzdjaDdrZnFZZjNiNWpYWWhWektOM2FJMFdxOGcwQVZYTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUwOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9ZW1tYW51ZWxvY2hlJTQwZ21haWwuY29tJmZpcnN0X25hbWU9RW1tYW51ZWwmbGFzdF9uYW1lPU9jaGUmcGhvbmU9MDkwNTExNTk5NDciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760098828),
('m5C6RcY6UiKuc72Lf5PtVUmcIZsBwpan09IEv6UQ', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlNKTFVpeE9xR0o3SzMzVkdpa0p2SmowZG1kZUxpSFdaOU1HcnhqdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755675096),
('mimN1HRaPbz5IcYGzrpudaRrneaQJTKZSJyaKTZf', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielhwRkZVbTcyTGNHVnhSUUlwY2hKUE9HbU9IMU1aajE4UGY2T0ZIRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125520),
('MP8bTQoa7tcobbMFAwVJSZLVGZvE2s2xy4YwARYv', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1JLdXVkaDR2OFhEbXRjN1dtSU5zbTV6ZDNVdVVQbGhtbkRHdkM5RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011088),
('MRityVfs1NLYrrBXUfuHe0tIGHCZHheFL95LqIzf', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXNWS2duS2ZUZGttZmpVOWlsR25lTEo3S2NqMDdxWUY5bGl3bGhxMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760047506),
('nljp2QgQnO23qUlFrdEDF3rqn2aQA4AF8YmChjFk', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3M5eW5yY2pHWkx3ZUE0M3hDWE9uQ3RXOWgwV1ZOeURIck15a3d6VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125569),
('nsPHE4QwP1RLx46bCUS962TD4g5QKvD1lIk5akRm', NULL, '192.168.214.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWExWa0pUbEZMM1RJRjJlRmx3c2FlTTU4cGoyTU94N0YybWUxd2Y0ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vMTkyLjE2OC4yMTQuMjA0L3BheWNvbm5lY3QvcHVibGljL2FkbWlucy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755794541),
('oPldPGK8VETtTMa85eKQcmpnfDFy2Kkcf9Rk0tou', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVNKSXp4NFZhUU5CSUdhdHYxellnVGtCeWE1RVJJbWhKN0ZHdm9hZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760047361),
('P1aliZPJtX4c3z4nnX6QYFZXz8dE6NSNpKdijk7B', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmhVSGpxcUFmc3RwREJocGlFSHREcTVESVRkbGhnQWM0NTVhV2ZKcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755662494),
('PA7Vy7spH6JUsssiZmltJC49Er4tSije6OGOJtGN', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGF4UnNSTDF6djRLSVVNWWxLMVpCSkJ6M0c3V21WMlRrdjFSZWkxciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTcmbmFtZT1BQkFLUEElMjBEQVZJRCUyMEpBTUVTIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760170327),
('paVmguQGuvSS2zszy3yJEjH8T7ZCPG6PbfjwowDX', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVNuZmF3VlVTWmRJNTl5TDdnakFiNmlxdWdBcmxVc25CWFZxazRCSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175388),
('PE9DCTuKUReaObbRqtMpdbngDgXxdXAJRJP17wmn', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0ZBM0IwYTY1eTVtbTNSeW95bmh3aWR0dDdIRGtLbkFCcmFYazFhdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175849),
('ppnTkEpdDNPFtqCFzQM8NpIag4COK3Z7hhZmkXgc', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTRObEFiRlV4SktYYkNzQ0Y0UVhIRmxUZmFkRHBKNTV4bjFBSlFSdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760126162),
('pyJ7c0JJgQC6GmcidDNvq3AhHIJMDyfGPxU1QgEh', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2dnY1FQd3VFMGVwdmdFZ1p2cWpSYXBMUVF2TEJtZjg5eWI2dWhNTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755667895),
('PzVo9LrVX0YR320ddWfP3YuA0I4PT7tF93vuz9Vk', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkRENmlaWGpORlh3TjNCY3lqMkgzMGYzVTc2alNHQWVxcTNIU2xzdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170039),
('Q3dyga9wiFZUx8IuknIl3SyIcrd5HqLK6wFJ4QJN', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFhOeG44U09MUjJJWjJYSW9Qc2hBRTBIZWhyM1N6TnVsd3l5dUdhaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011159),
('qct70Xfb4p6GE26usv57PBn3eNB5qyt26GIBpOcO', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1d5WHNDMGpyMk9vRUdURDBDWXJUS0tQZzhzQVpDZlN4NnVoYm1ieiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177111),
('QQV3vbU5X0ugOfRnhjE52AHu0fI8DoeiKw8Tn2Sd', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHBBSHBBd3JWeFZlYUpPVEtxOGo5T3hKTnRZSFdHVjVvYVhjMXp3RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ3OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTgxMTg3NjgzNjAmYmFua19jb2RlPTk5OTk5MiZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760175305),
('QWynaEhZ7Uc8vqPLdwvNhrzK1YFSF9xZ1NfpVs9U', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVZPb0M4Y1NZZmltYzZKVTMzT01ZeW9nQ1B4THR2S2hRaTVpQ2JabSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTcmbmFtZT1BQkFLUEElMjBEQVZJRCUyMEpBTUVTIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760171607),
('rbr7areQiQgg4cfbV4zT8kaAHy8udY3xgN7BUU7z', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFJaWUZUUEI1TTNOalphWUpjZXFuMThjQVZ5YUJ0TnNBNUhRUmlhMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760170975),
('RSwFFOidizKrvR3MVPdjfnjHwNFR4GcDy27rhZz8', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2llNGx4Q3JPNlk3S3cyM2ZuanNNNkVzVmVKTmVwRnEwUm9vck5kMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177369),
('RUM5eVwu9ei72w8QE5r01nFbXeLfyIDHxiTQ8oQB', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0oycXhUUGJUWUUxZWV1eVBNN3ZkWUNIUWNUWlpSZW9BVDJ6MGJlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177264),
('Rw8I1WtoltwU05Av0mPyZPdFGV7pV8XUnD8yXQYG', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTW9xUjFwclZsNGRyOFVDVmt5V2ZQckliTW55V3lwTlpIc0U1VWxFbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011227),
('sPy1xqRldQCdPk9i7yyDcX6CfN3sOQr3YXPt034W', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0RXS0pJOUI4eUFVUTNna2FCRmc1b05DUVdIbmpJR2sxSHliMzM5YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011192),
('SQCufsW6zQELo09RPVkDNiDaOB7vpvbGe1UfFDpk', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWxKVFdxaTExYjhCbkU1bjAybkpsUHBNdEE0dUV2MnpCYWJtUFBpYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760170743),
('stMUfKJYaHuHFyUT2rhC6lXrMnaasrpdxP4oAZPC', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamxmdk9iUlBrcktlMVhDYU1wanlXdUttSmdiQjRsMnBJRE85M3ppcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTcmbmFtZT1BQkFLUEElMjBEQVZJRCUyMEpBTUVTIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760170334),
('STwc4QLeS6MXSAcSsCMh3pGjdu69z8ngP47VMK2E', NULL, '146.70.185.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTEZabTBFSUpXUnZxQTMxTDIzSGdOVHE5WWpkTWdTV0xKSlhqVHYyYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755669677),
('SVywr2DsPUjT4QwVHDjnM5qWZHoeSLSv0SyaBDE3', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTlpWjRaNkhvSjBFeDF5bGNlNVZMRTZjMzBJVVFueEJkcTBRTk91bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760171818),
('T18Pu3d50vUTroebx42GKjBsvAt9wZcnEKStJaM2', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHpBNlAzWW51ZE1TcDFEd3BFUXRMdVB5a1FoR21vRWp1b3hrVlpucSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755664294),
('t4g0Dh9mnCR9VxovJaGxvKH5IzoBJzy7g2Onv1Ro', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1ZoRHE4WUNtbG9YeTFNUzFtemZjb0NUYXVhYkl3WU4zckhjZWhMeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013939),
('tnpIjLnTmFAq8Lh4TMZXdbhfGzx99AsYnJWN79Qq', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTJUSXdjeUE1azdxSnRtblNnbGtOZXFjMGxDbEtOR3hpVUxwVVJsdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760177329);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TZMANNG4KL5dLQSYuEWHd2t6szupSrpLYTRWJRYX', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakI5dENHZ0pYS0o1SHBwbWxxaktvbFJESHBGRXV4bkRNbWo0dTdndyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760172305),
('Uu88xrJkoNZKYXpXcrulJz5L0Vd7Rwp1UdigjTtj', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2ZzdnM2Z3NIUnlJT0RDdmlVV0tCdzZOVTBxaGVNWU5NaU13b0JrTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760012550),
('uwMS21YxzNeWkYQw5YcCTFQWbdDNhx5vG5GKKufv', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGRnZXpFY091SDgxcTNVUVkxelVVeVBGSlFRekwyQngwUlBlQ3pBRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3BheXdlYWx0aC9wdWJsaWMvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1759758667),
('VSDW9IJkjypRdLRYh0VMQBXNeD0PoXOLwF8XoEFQ', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidG5jelRUMUFEZU1tcTFiOThGSFUwbGdWcVRWZTdDNjEzcHpGOXhvVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170064),
('Wc898EZqZ3JwKXouiBWKX5DCCVR5AUSQnUasMypC', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlpFblBFaEdhanlrZ3NBcTRBdVVPUDI1d2FFbHRiSGdiVnhCM0J1ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9YWJha3BhZGF2aWQyMDAzJTQwZ21haWwuY29tJmZpcnN0X25hbWU9R29kd2luJmxhc3RfbmFtZT1BYmFrcGEmcGhvbmU9MDcwMzUwNzQ2NjMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760098335),
('WEIGPuYaCXbBbOYLGYyNOwlvPDRfwmXzTI0zkFNT', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZllEaGc0bUZqdTQ2VldsTG50Q0tURmo4Q3FFRU1ZUkt2QTA4dkRibCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760011025),
('wknKV56tx9P3aIXfaSdcOTMZaeJhTJizmHs6mwXE', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlA3Skg2SXlKcU5YQnhWZ2NScVlNNEtNMDd2TEF6Ylc1SmlRTmEyayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760172305),
('WPjVx8kjaywU2VwshUwJPEApcbMauXiFDHr5xGYL', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnhpQUdzdVN4Smd0cERPdmNJa3M4ZG9ZZ1ZkeDE5SnZVd05XVmwzeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013686),
('X2F2lOWwPLi7b1bScMPbqvW5UxquaecnzJr0cVCT', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVQ1ZFBRTlFYSUxhZDQ1Z1BWd0FSY0VjdUVTZ2V0TGRDSTl0ZkpkdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755671495),
('XasMyddUUbvwsKNN92D1M5Pafz9OuhReDbaPjUvP', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlZGamcyM2RJdjhrVXNqZ0xyd2N6TzNTRW5nSnJEUjk5TURuSlY3UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170515),
('XrcgOAfLSh614CG2l2fQNWSvC4mLrC5OoWQCsQD3', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTNIYkhCODBtSnlIZ3dVNUo2d1hGTE9Ec0lqalNrQ09aaVlFTTFWNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTMxODUyODc4MjQmYmFua19jb2RlPTAxMSZuYW1lPUFCQUtQQSUyMERBVklEJTIwSkFNRVMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760172700),
('XUoZKa34FzMkvmKJgF2IpskC8OEzqHELB2YYJwnQ', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVk5NmdoN3M2bmdqZ01SZUxnS0NmVnFvaTJlZ1kyd0lzSktrRXhVQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125660),
('ylhgYVjf2hDq2XJ74X4KWyK60prOwtIh1tjpB5lN', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3p2VFdmZnBZaVJtNGxTYUhDbXQ3QXJBSXFSQ2c0MXp0MnR5Y1hudiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760175849),
('yOfBiQj2ZHECqOeGwBgjJusplaL8O79xrO1pl3mM', NULL, '192.168.221.196', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1hqcnRaNUc4a0ZEQzlRbTNZd2xuRXRvY1J5bzc0Z01BRXR6cmYzciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vMTkyLjE2OC4yMjEuMjA0L3BheXdlYWx0aC9wdWJsaWMvdXNlcnMvcmVjaGFyZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl91c2Vyc181OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7czo1MzoibG9naW5fYWRtaW5zXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1759926393),
('yVqB4NTQUvexSymozJd8pFbkj2UisU4TGQPKkTnE', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmZKVk5pU3JjSFlCTkVNSVVHTVRhNTBQWG5OSHN4OUVPRnFrbE5qTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760012521),
('yvQuXMjS2Uvyq2XLOF7eXnSVT0d1FvMuHFWFeX3L', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDVOaUZrOGNuenFMVU9JWkdwTmxDdm9ZM1RjZm13T2tRbFVMdURHRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTkwMTMzNTAzNTEmYmFua19jb2RlPTE3MSZuYW1lPURBVklEJTIwSkFNRVMlMjBBQkFLUEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760170175),
('yWZu8kzHBXAVLzjfLewtwUkmVmCdW1zNRDO9nNyT', NULL, '::1', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkdLa3RWbU1wbDY3bGxBcXBJZjdPM3JmRmd1N1E2R2NMQXRIN2ptTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQwOiJodHRwOi8vbG9jYWxob3N0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvY3VzdG9tZXI/ZW1haWw9dGVjaGllNTk2MSU0MGdtYWlsLmNvbSZmaXJzdF9uYW1lPURhdmlkJmxhc3RfbmFtZT1KYW1lcyZwaG9uZT0wOTAxMzM1MDM1MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760013864),
('YzQ2htzO9WJxQPDE0zPi0HvamEfzvQp1VcDDgbj4', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkY4c2VBYUpYOVBYZjN2VGh5SkZQeG9NaGxGejNIdHhKMjVnRFVZUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760171932),
('z8DXJkBxEoaX9LS2kCjqytI5XMhpRMDJKzwEQNsN', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0ZuQXdZSmh5ak13OFp1ZFlma0lIaXlXa1pDMG9JSzk5aFh5WlFIdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC90cmFuc2Zlci93aXRoZHJhd2FsP2Ftb3VudD00MjUwJnJlY2lwaWVudD1SQ1BfdGYyaDA3anlwYXJienYyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760176854),
('Zb3Kphrl0YnJRh6pVnZMhVxS8X6YdqDlmnrISUmC', NULL, '192.168.214.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieG1xQUhqTm1rZGNzc0NiRmg4ajJyVHNRRmh0c1l6bGhLYzNNWmJoUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vMTkyLjE2OC4yMTQuMjA0L3plbnRyb2xpeC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUzOiJsb2dpbl9hZG1pbnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755766746),
('Ze8y1fhY8gbPjh7Lo88TBlQErDsZrmKfkxum1I54', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0s5b21vczZxZnZIRW9YRHJKYmR4djF3M0lrREFnNmdYZ2I4TENTOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760125233),
('zeqO8copFetqGFiuWOYV7sq9xNATv0FGJZnkit2x', NULL, '5.189.175.239', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlh1OTJ2bGtVek1sZk8xcWZwYUQ5Qjh6QVNyaXNhNjdSbFRRNHZEVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9wYXljb25uZWN0LmludC5uZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755678696),
('Zs9ixKWloyyyl5ZJiH1MkEwgv3AVliv7D5ssbcJE', NULL, '192.168.221.204', 'GuzzleHttp/7', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDI1d0pNa0Y3cDRJbWtFcXdEa1NCd0lvREFmQnpLelRTZVQ5TkFJUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTkyLjE2OC4yMjEuMjA0L3RlY2hpZS9wdWJsaWMvYXBpL3BheXdlYWx0aC9jcmVhdGUvdHJhbnNmZXIvcmVjaXBpZW50P2FjY291bnRfbnVtYmVyPTUwMDUwMTY1NzcmYmFua19jb2RlPTE1Jm5hbWU9REFWSUQlMjBKQU1FUyUyMEFCQUtQQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760172252);

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
(9, 'general_settings', NULL, '{\"whatsapp_group\":\"https:\\/\\/whatsapp.com\\/channel\\/0029Vb6Aht7BvvspC3miJd0P\",\"telegram_group\":\"https:\\/\\/t.me\\/+O5S4dKvshZtjMDk8\",\"notification_message\":\"Test\"}', 'active', '2025-10-07 11:15:26', '2025-08-13 11:01:08');

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
(5, 'TRX68EA24D371677', NULL, 100, 'debit', 'withdrawal', '{\"fee\":15,\"amount\":85,\"details\":{\"bank\":\"{\\\"account_number\\\":\\\"8118768360\\\",\\\"bank_name\\\":\\\"OPay Digital Services Limited (OPay)\\\",\\\"account_name\\\":\\\"DAVID JAMES ABAKPA\\\"}\"}}', 8, 'Bank Withdrawal', 'pending', '2025-10-11 17:35:15', '2025-10-11 17:35:15'),
(6, 'TRX68EA24ED7272D', NULL, 50, 'debit', 'withdrawal', '{\"fee\":7.5,\"amount\":42.5,\"details\":{\"bank\":\"{\\\"account_number\\\":\\\"8118768360\\\",\\\"bank_name\\\":\\\"OPay Digital Services Limited (OPay)\\\",\\\"account_name\\\":\\\"DAVID JAMES ABAKPA\\\"}\"}}', 8, 'Bank Withdrawal', 'success', '2025-10-11 18:16:41', '2025-10-11 17:35:41');

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
(8, NULL, NULL, 'paywealth@gmail.com', '09013350351', NULL, '$2y$12$D4gRz7i5VWtWVdskh/cYVeEMmh9Ee1ifZq58U4za6qBSCimz2bOxq', 'blaady02', 'user', NULL, '{\"account_number\":\"8118768360\",\"bank_name\":\"OPay Digital Services Limited (OPay)\",\"account_name\":\"DAVID JAMES ABAKPA\"}', '{\"bank\":{\"name\":\"Wema Bank\",\"id\":20,\"slug\":\"wema-bank\"},\"account_name\":\"DEVTECHIEINNO\\/JAMES DAVID\",\"account_number\":\"9326486961\",\"assigned\":true,\"currency\":\"NGN\",\"metadata\":null,\"active\":true,\"id\":34965132,\"created_at\":\"2025-09-21T08:48:11.000Z\",\"updated_at\":\"2025-10-09T12:45:44.000Z\",\"assignment\":{\"assignee_id\":311223495,\"assignee_type\":\"Customer\",\"assigned_at\":\"2025-10-09T12:45:44.000Z\",\"expired\":false,\"expired_at\":null,\"integration\":1597558,\"account_type\":\"PAY-WITH-TRANSFER-RECURRING\"},\"customer\":{\"id\":311223495,\"first_name\":\"David\",\"last_name\":\"James\",\"email\":\"techie5961@gmail.com\",\"customer_code\":\"CUS_bq46rv2mh72on0j\",\"phone\":\"09013350351\",\"metadata\":[],\"risk_action\":\"default\",\"international_format_phone\":null}}', '{\"transactions\":[],\"subscriptions\":[],\"authorizations\":[],\"first_name\":\"David\",\"last_name\":\"James\",\"email\":\"techie5961@gmail.com\",\"phone\":\"09013350351\",\"metadata\":[],\"domain\":\"live\",\"customer_code\":\"CUS_bq46rv2mh72on0j\",\"risk_action\":\"default\",\"id\":311223495,\"integration\":1597558,\"createdAt\":\"2025-10-09T12:20:00.000Z\",\"updatedAt\":\"2025-10-09T12:20:00.000Z\",\"identified\":false,\"identifications\":null}', '{\"active\":true,\"createdAt\":\"2025-10-11T09:35:05.755Z\",\"currency\":\"NGN\",\"description\":\"Transfer recipient for DAVID JAMES ABAKPA\",\"domain\":\"live\",\"id\":113252323,\"integration\":1597558,\"name\":\"DAVID JAMES ABAKPA\",\"recipient_code\":\"RCP_tf2h07jyparbzv2\",\"type\":\"nuban\",\"updatedAt\":\"2025-10-11T09:35:05.755Z\",\"is_deleted\":false,\"isDeleted\":false,\"details\":{\"authorization_code\":null,\"account_number\":\"8118768360\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_code\":\"999992\",\"bank_name\":\"OPay Digital Services Limited (OPay)\"}}', 47100, 495300, NULL, 'TmNtHDmWnzUEPXlkcbQTIsPdfbcCKOym6d7lQwRSIv1pZRH0p01OOYuR9dMq', NULL, NULL, 'active', '2025-10-06 14:10:21', '2025-10-11 17:35:05'),
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
