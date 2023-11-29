
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------


-- Cấu trúc bảng cho bảng `datphong`

CREATE TABLE `datphong` (
  `id` int(10) UNSIGNED NOT NULL,
  `phong_id` int(10) UNSIGNED NOT NULL,
  `khachhang_id` int(10) UNSIGNED NOT NULL,
  `tinhtrang` int(10) NOT NULL DEFAULT '0',
  `ngaydat` datetime NOT NULL,
  `ngaytra` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `datphong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datphong_phong_id_foreign` (`phong_id`),
  ADD KEY `datphong_khachhang_id_foreign` (`khachhang_id`);
  
ALTER TABLE `datphong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;


INSERT INTO `datphong` (`id`, `phong_id`, `khachhang_id`, `tinhtrang`, `ngaydat`, `ngaytra`, `created_at`, `updated_at`) VALUES
(15, 65, 32, 1, '2023-05-19 00:00:00', '2023-05-22 00:00:00', '2023-05-18 21:37:30', '2023-05-18 21:38:54'),
(28, 62, 32, 1, '2023-05-20 00:00:00', '2023-05-21 00:00:00', '2023-05-20 01:14:09', '2023-05-20 10:13:44'),
(29, 65, 32, 1, '2023-05-21 00:00:00', '2023-05-22 00:00:00', '2023-05-20 23:58:11', '2023-05-20 23:58:42'),
(30, 66, 50, 1, '2023-05-24 00:00:00', '2023-05-30 00:00:00', '2023-05-24 09:55:26', '2023-05-25 05:55:23'),
(31, 58, 51, 1, '2023-05-25 00:00:00', '2023-05-26 00:00:00', '2023-05-25 06:30:53', '2023-05-25 06:31:23'),
(46, 58, 60, 1, '2023-05-28 00:00:00', '2023-05-31 00:00:00', '2023-05-27 09:42:04', '2023-05-27 09:50:44'),
(48, 67, 60, 1, '2023-05-29 00:00:00', '2023-05-31 00:00:00', '2023-05-27 09:48:33', '2023-05-27 17:59:38'),
(50, 65, 60, 0, '2023-05-29 00:00:00', '2023-05-31 00:00:00', '2023-05-27 09:50:26', '2023-05-27 09:50:26'),
(51, 61, 32, 1, '2023-05-28 00:00:00', '2023-05-30 00:00:00', '2023-05-27 10:03:45', '2023-05-27 10:04:11'),
(52, 62, 32, 1, '2023-05-28 00:00:00', '2023-05-31 00:00:00', '2023-05-27 17:58:58', '2023-05-27 18:13:49'),
(53, 58, 60, 1, '2023-05-28 00:00:00', '2023-05-31 00:00:00', '2023-05-27 19:20:08', '2023-05-27 19:22:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendichvu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `soluong` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `donvi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dichvu_tendichvu_unique` (`tendichvu`);
  
ALTER TABLE `dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


INSERT INTO `dichvu` (`id`, `tendichvu`, `gia`, `soluong`, `donvi`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Number1', 15000, 1, 'Chai', '2023-07-18/d47a6d33fa00c1333989304166883f79.png', 28, '2023-03-17 08:41:06', '2023-07-18 01:28:43'),
(6, 'Trà Doctor Thanh', 15000, 1, 'Chai', '2023-05-24/3cef88d1b3c1ca615defde6c8200c571.jpg', 28, '2023-03-17 10:19:02', '2023-05-24 09:32:17'),
(7, 'Giặt là', 15000, 1, 'Kg', '2023-05-24/acdf7456889b11c7cc15c7e81eb34e36.jpg', 28, '2023-04-13 00:56:08', '2023-05-24 09:32:49'),
(9, 'Thuê xe máy', 150000, 1, 'ngày', '2023-05-27/2133f4b3bcd815727b3f032f8440008b.jpg', NULL, '2023-05-27 04:47:00', '2023-05-27 04:47:00');

-- --------------------------------------------------------


CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `thuephong_id` int(10) UNSIGNED DEFAULT NULL,
  `khachhang_id` int(10) UNSIGNED DEFAULT NULL,
  `tiendichvu` bigint(20) DEFAULT NULL,
  `tienphong` bigint(20) DEFAULT NULL,
  `tongtien` bigint(20) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

INSERT INTO `hoadon` (`id`, `thuephong_id`, `khachhang_id`, `tiendichvu`, `tienphong`, `tongtien`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 25, 32, 0, 1000000, 1000000, 28, '2023-05-20 23:54:15', '2023-05-20 23:54:15'),
(16, 22, 32, 15000, 2000000, 2015000, 28, '2023-05-20 23:56:13', '2023-05-20 23:56:13'),
(17, 26, 32, 75000, 4000000, 4075000, 28, '2023-05-25 05:55:07', '2023-05-25 05:55:07'),
(18, 27, 50, 0, 1700000, 1700000, 28, '2023-05-25 06:30:17', '2023-05-25 06:30:17'),
(19, 28, 51, 0, 1700000, 1700000, 28, '2023-05-25 06:31:31', '2023-05-25 06:31:31'),
(20, 29, 52, 30000, 1700000, 1730000, 28, '2023-05-25 09:10:50', '2023-05-25 09:10:50'),
(21, 30, 32, 0, 1700000, 1700000, 28, '2023-05-26 04:09:58', '2023-05-26 04:09:58'),
(22, 31, 32, 15000, 1700000, 1715000, 28, '2023-05-27 02:27:42', '2023-05-27 02:27:42'),
(23, 33, 60, 0, 1700000, 1700000, 28, '2023-05-27 09:51:09', '2023-05-27 09:51:09'),
(24, 37, 66, 0, 1000000, 1000000, 28, '2023-05-27 10:07:44', '2023-05-27 10:07:44');

-- --------------------------------------------------------


CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenkhachhang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_tenkhachhang_unique` (`tenkhachhang`);
  
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;


INSERT INTO `khachhang` (`id`, `tenkhachhang`, `cmnd`, `diachi`, `dienthoai`, `gioitinh`, `email`, `username`, `password`, `created_at`, `updated_at`, `user_id`, `remember_token`, `facebook_id`) VALUES
(32, 'Mai Hương', '1311313123', '24-Nguyễn Trãi', '32313131', 0, 'maihuong@gmail.com', 'maihuong', '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-03-23 07:20:00', '2023-05-26 02:53:03', 28, 'Q7YBeWL80zAaKtyfMZAoXeumZqw5NElNJzGdRXEeIYjmqJgaCfDbedTD3XXM', NULL),
(33, 'Ngô Trọng Phụng', '1141243243', 'Thanh Hóa', '11242142', 0, 'phung12@gmail.com', 'phungngo', '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-03-23 07:21:15', '2023-03-23 07:21:15', 28, NULL, NULL),
(42, 'Vũ Ngọc Khánh', '32131241241', 'Sầm Sơn', '1134144111', 0, 'khanhnt@gmail.com', 'khanhnguyen', '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-04-03 22:24:38', '2023-04-03 22:24:38', 28, NULL, NULL),
(50, 'Trần Ngọc Anh', '10101340099', NULL, '0964722616', NULL, 'masterofwar972@gmail.com', NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-05-24 09:55:26', '2023-05-24 09:55:26', NULL, NULL, NULL),
(51, 'Vũ Ngọc Khánh2', '1111', '2102 Birch Street', '3178525140', 1, NULL, NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-05-25 06:30:53', '2023-05-25 06:30:53', 28, NULL, NULL),
(52, 'Vũ Ngọc Khánh22', '111111', '2102 Birch Street', '3178525140', 0, NULL, NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-05-25 06:31:59', '2023-05-25 06:31:59', 28, NULL, NULL),
(60, 'Trần Ngọc Linh', '1001111', NULL, '1111', NULL, 'khanhvuht972@gmail.com', NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-05-27 03:37:43', '2023-05-27 09:35:48', NULL, 'G81dE6Fpwo55aUCQjyPhE2fFr0vJhyNvLODfGuLg37arZ3PNy8cuDNQUQuEP', '111026130143600'),
(64, 'Trần kì anh', '11111', '2121', '1111', 1, NULL, NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', '2023-05-27 08:25:14', '2023-05-27 08:25:14', 28, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenloaiphong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatien` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `loaiphong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

INSERT INTO `loaiphong` (`id`, `tenloaiphong`, `slug`, `giatien`, `created_at`, `updated_at`) VALUES
(2, 'Phòng Chuẩn', 'phong-chuan', 1000000, '2023-03-11 03:45:42', '2023-05-24 09:24:37'),
(3, 'Phòng Vip', 'phong-vip', 2000000, '2023-03-11 07:54:28', '2023-05-20 09:23:51'),
(5, 'Phòng Đôi', 'phong-doi', 1700000, '2023-03-17 09:30:24', '2023-03-17 09:30:24'),
(10, 'Phòng Hạng Sang', 'phong-hang-sang', 1500000, '2023-03-17 10:12:55', '2023-05-26 04:46:59'),
(11, 'Phòng Đơn', 'phong-don', 750000, '2019-03-17 10:26:00', '2023-03-17 10:26:00');

-- --------------------------------------------------------


CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_11_072915_create_kind_of_rooms_table', 2),
(6, '2019_03_15_093122_create_rooms_table', 3),
(7, '2019_03_15_100031_table_room_relation', 3),
(8, '2019_03_17_100656_create_table_services', 4),
(9, '2019_03_19_100949_create_customers_table', 5),
(22, '2019_03_21_092731_create_order_table', 6),
(23, '2019_03_21_100700_table_room_order_relation', 6),
(26, '2019_03_22_155807_create_checkins_table', 7),
(27, '2019_03_22_160427_table_checkin_relationship', 7),
(30, '2019_03_24_081430_create_useservices_table', 8),
(31, '2019_03_24_152635_table_useservice_relationship', 8),
(34, '2019_03_27_102603_create_bills_table', 9),
(35, '2019_03_29_071256_create_permission_tables', 10),
(48, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(49, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(50, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(51, '2016_06_01_000004_create_oauth_clients_table', 11),
(52, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11),
(53, '2019_04_08_094616_create_attachment_table', 12);

-- --------------------------------------------------------


CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

-- --------------------------------------------------------


CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);
  
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 28),
(3, 'App\\User', 30),
(3, 'App\\User', 32),
(3, 'App\\User', 33);

-- --------------------------------------------------------


CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

-- --------------------------------------------------------


CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-03-29 00:24:35', '2023-03-29 00:24:35'),
(2, 'role-create', 'web', '2023-03-29 00:24:35', '2023-03-29 00:24:35'),
(3, 'role-edit', 'web', '2023-03-29 00:24:35', '2023-03-29 00:24:35'),
(4, 'role-delete', 'web', '2023-03-29 00:24:35', '2023-03-29 00:24:35'),
(8, 'loaiphong-list', 'web', '2023-03-29 00:24:35', '2023-03-29 00:24:35'),
(9, 'phong-list', 'web', '2023-03-30 09:20:32', '2023-03-30 09:20:32'),
(10, 'phong-update', 'web', '2023-05-26 03:43:45', '2023-05-26 03:43:45'),
(11, 'phong-delete', 'web', '2023-05-26 03:43:54', '2023-05-26 03:43:54'),
(12, 'loaiphong-update', 'web', NULL, NULL),
(14, 'khachhang-list', 'web', '2023-05-26 04:26:58', '2023-05-26 04:26:58'),
(15, 'khachhang-update', 'web', '2023-05-26 04:27:08', '2023-05-26 04:27:08'),
(16, 'khachhang-delete', 'web', '2023-05-26 04:27:14', '2023-05-26 04:27:14'),
(17, 'dichvu-list', 'web', '2023-05-26 04:27:32', '2023-05-26 04:27:32'),
(18, 'dichvu-update', 'web', '2023-05-26 04:27:38', '2023-05-26 04:27:38'),
(19, 'loaiphong-delete', 'web', '2023-05-26 04:33:26', '2023-05-26 04:33:26'),
(20, 'dichvu-delete', 'web', NULL, NULL);

-- --------------------------------------------------------


CREATE TABLE `phong` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenphong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `loaiphong_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phong_tenphong_unique` (`tenphong`),
  ADD KEY `phong_loaiphong_id_foreign` (`loaiphong_id`),
  ADD KEY `phong_user_id_foreign` (`user_id`);

ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;


INSERT INTO `phong` (`id`, `tenphong`, `tinhtrang`, `mota`, `image`, `user_id`, `loaiphong_id`, `created_at`, `updated_at`) VALUES
(58, 'A 102', 0, 'Phòng A', '2023-05-24/438fa287eb95793accf18537426dcea6.jpg', 28, 5, '2023-03-17 09:43:22', '2023-05-27 19:23:27'),
(60, 'A 103', 0, 'Block A', '2023-05-24/681ac1207dacf9a31e7b4b8484488257.jpg', 28, 10, '2023-03-17 10:15:45', '2023-05-27 02:23:17'),
(61, 'A 105', 2, 'Phòng A', '2023-05-24/cad10a1a812fe98768cfa2a7195a0495.jpg', 28, 5, '2023-03-17 10:31:45', '2023-05-27 10:04:11'),
(62, 'C 101', 2, 'Phòng C', '2023-05-24/88331e1b1cda5cbc5a0c32764d275e68.jpg', 28, 2, '2023-04-04 01:12:19', '2023-05-27 18:13:49'),
(65, 'C102', 1, 'Phòng Hạng C', '2023-05-24/1be91dbf77dc2324ddeff60cc6d948d5.jpg', 28, 2, '2023-04-08 19:07:40', '2023-05-27 09:50:26'),
(66, 'D105', 0, 'Phòng hạng D', '2023-05-24/68d00a0b2e6d46128d527c9293a3e516.jpg', 28, 5, '2023-05-24 09:22:53', '2023-05-27 17:59:49'),
(67, 'D101', 0, 'Phòng Hạng D', '2023-05-24/6ce15b197b9db4a3c62f562d885bc85d.jpg', 28, 10, '2023-05-24 09:25:39', '2023-07-18 01:29:05'),
(68, 'A104', 0, 'A', '2023-05-26/9b4693a8fac8879d22431521e5d28b36.jpg', 28, 11, '2023-05-24 09:31:04', '2023-05-26 04:31:08');

-- --------------------------------------------------------



CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'web', '2023-03-29 01:48:13', '2023-03-30 08:47:07'),
(3, 'Nhân viên lễ tân', 'web', '2023-03-29 02:20:58', '2023-05-26 03:46:35'),
(7, 'Nhân viên phục vụ', 'web', '2023-03-30 09:10:50', '2023-03-30 09:10:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 7),
(2, 2),
(2, 7),
(3, 2),
(3, 7),
(4, 2),
(4, 7),
(8, 2),
(8, 3),
(8, 7),
(9, 2),
(9, 3),
(10, 2),
(11, 2),
(12, 2),
(14, 2),
(14, 3),
(15, 2),
(16, 2),
(17, 2),
(17, 3),
(18, 2),
(19, 2),
(20, 2);

-- --------------------------------------------------------


CREATE TABLE `sudungdichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `thuephong_id` int(10) UNSIGNED DEFAULT NULL,
  `dichvu_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `sudungdichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sudungdichvu_dichvu_id_foreign` (`dichvu_id`),
  ADD KEY `sudungdichvu_thuephong_id_foreign` (`thuephong_id`),
  ADD KEY `sudungdichvu_user_id_foreign` (`user_id`);
  
ALTER TABLE `sudungdichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

INSERT INTO `sudungdichvu` (`id`, `thuephong_id`, `dichvu_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(57, 14, 2, 28, 1, '2023-04-09 00:21:08', '2023-04-09 00:21:08'),
(60, 22, 7, 28, 1, '2023-05-20 01:15:15', '2023-05-20 01:15:15'),
(61, 26, 2, 28, 2, '2023-05-20 23:59:11', '2023-05-20 23:59:14'),
(66, 29, 7, 28, 2, '2023-05-25 09:10:38', '2023-05-25 09:10:40'),
(67, 31, 2, 28, 2, '2023-05-27 02:26:31', '2023-05-27 02:26:36'),
(71, 34, 6, 28, 1, '2023-05-27 18:20:30', '2023-05-27 18:20:30'),
(73, 40, 6, 28, 1, '2023-05-27 19:22:42', '2023-05-27 19:22:42'),
(75, 35, 6, 28, 1, '2023-07-18 01:30:24', '2023-07-18 01:30:24');


-- --------------------------------------------------------


CREATE TABLE `thuephong` (
  `id` int(10) UNSIGNED NOT NULL,
  `phong_id` int(10) UNSIGNED NOT NULL,
  `khachhang_id` int(10) UNSIGNED NOT NULL,
  `ngaydat` datetime NOT NULL,
  `ngaytra` datetime NOT NULL,
  `trangthai` int(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `thuephong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuephong_phong_id_foreign` (`phong_id`),
  ADD KEY `thuephong_khachhang_id_foreign` (`khachhang_id`),
  ADD KEY `thuephong_user_id_foreign` (`user_id`);
  
ALTER TABLE `thuephong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

INSERT INTO `thuephong` (`id`, `phong_id`, `khachhang_id`, `ngaydat`, `ngaytra`, `trangthai`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 60, 42, '2023-04-26 12:24:34', '2023-05-25 12:24:36', 1, 28, '2023-04-03 22:24:38', '2023-04-12 01:32:19'),
(22, 65, 32, '2023-05-19 00:00:00', '2023-05-22 00:00:00', 1, 28, '2023-05-18 21:38:54', '2023-05-20 23:56:13'),
(25, 62, 32, '2023-05-20 00:00:00', '2023-05-21 00:00:00', 1, 28, '2023-05-20 10:13:44', '2023-05-20 23:54:15'),
(26, 65, 32, '2023-05-21 00:00:00', '2023-05-22 00:00:00', 1, 28, '2023-05-20 23:58:42', '2023-05-25 05:55:07'),
(27, 66, 50, '2023-05-24 00:00:00', '2023-05-30 00:00:00', 1, 28, '2023-05-25 05:55:23', '2023-05-25 06:30:17'),
(28, 58, 51, '2023-05-25 00:00:00', '2023-05-26 00:00:00', 1, 28, '2023-05-25 06:31:23', '2023-05-25 06:31:31'),
(29, 61, 52, '2023-05-25 00:00:00', '2023-05-26 00:00:00', 1, 28, '2023-05-25 06:32:04', '2023-05-25 09:10:50'),
(30, 61, 32, '2023-05-27 00:00:00', '2023-05-28 00:00:00', 1, 28, '2023-05-26 03:10:42', '2023-05-26 04:09:58'),
(31, 58, 32, '2023-05-27 00:00:00', '2023-05-28 00:00:00', 1, 28, '2023-05-27 02:18:54', '2023-05-27 02:27:42'),
(33, 58, 60, '2023-05-28 00:00:00', '2023-05-31 00:00:00', 1, 28, '2023-05-27 09:50:44', '2023-05-27 09:51:09'),
(34, 67, 60, '2023-05-29 00:00:00', '2023-05-31 00:00:00', 1, 28, '2023-05-27 09:51:01', '2023-07-18 01:29:05'),
(35, 61, 32, '2023-05-28 00:00:00', '2023-05-30 00:00:00', 0, 28, '2023-05-27 10:04:11', '2023-05-27 10:04:11'),
(36, 58, 65, '2023-05-28 00:05:14', '2023-05-28 00:05:15', 1, 28, '2023-05-27 10:05:16', '2023-05-27 10:07:49'),
(37, 62, 66, '2023-05-28 00:07:23', '2023-05-28 00:07:23', 1, 28, '2023-05-27 10:07:24', '2023-05-27 10:07:44'),
(38, 66, 60, '2023-05-29 00:00:00', '2023-05-31 00:00:00', 1, 28, '2023-05-27 17:59:38', '2023-05-27 17:59:49'),
(39, 62, 32, '2023-05-28 00:00:00', '2023-05-31 00:00:00', 0, 28, '2023-05-27 18:13:49', '2023-05-27 18:13:49'),
(40, 58, 60, '2023-05-28 00:00:00', '2023-05-31 00:00:00', 1, 28, '2023-05-27 19:22:10', '2023-05-27 19:23:27');

-- --------------------------------------------------------


CREATE TABLE `thuvienhinhanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phong_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `thuvienhinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuvienhinhanh_phong_id_foreign` (`phong_id`);
  
ALTER TABLE `thuvienhinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


INSERT INTO `thuvienhinhanh` (`id`, `type`, `mime`, `path`, `phong_id`, `created_at`, `updated_at`) VALUES
(10, 'image', 'image/jpeg', '2023-04/ebd29f74a6f7e592bd271f2ed3572df5.jpg', 60, '2023-04-08 21:00:47', '2023-04-08 21:00:47'),
(11, 'image', 'image/png', '2023-04/e686faf75777c475dfb89f7de5fea662.png', 60, '2023-04-08 21:00:47', '2023-04-08 21:00:47'),
(12, 'image', 'image/jpeg', '2023-05/e86bd290b47a8008a7da8a62b014e969.jpg', 68, '2023-05-24 09:31:04', '2023-05-24 09:31:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
  
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'Nguyễn Thiện Tâm', 'admin@gmail.com', NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', 'uO6kqEopt5afwNRDvj033Y9NAYRDkCTraWJiKmwLilwrlZ7HDAC9Ll4GAKze', '2019-03-11 03:33:52', '2019-05-27 18:13:22'),
(30, 'Trịnh Ngọc Toàn', 'masterofwar1012@gmail.com', NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', 'dhgTaivlJajKWqRcpmIUS9NegXCHLSCAxHJfv602C8r40hHWuIPIOnthPtmb', '2019-03-12 03:50:41', '2019-03-12 03:50:41'),
(32, 'Phạm Ngọc Tùng Lâm', 'masterofwar199711@yahoo.com.vn', NULL, '$2y$10$yyIi5SDXM5uSuZq9lLNqOexjXfPjl99ImfEPb76EKy3nOJ8WpWop6', NULL, '2019-03-12 03:51:57', '2019-03-12 03:51:57');


ALTER TABLE `datphong`
  ADD CONSTRAINT `datphong_khachhang_id_foreign` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datphong_phong_id_foreign` FOREIGN KEY (`phong_id`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_loaiphong_id_foreign` FOREIGN KEY (`loaiphong_id`) REFERENCES `loaiphong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phong_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sudungdichvu`
--
ALTER TABLE `sudungdichvu`
  ADD CONSTRAINT `sudungdichvu_dichvu_id_foreign` FOREIGN KEY (`dichvu_id`) REFERENCES `dichvu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudungdichvu_thuephong_id_foreign` FOREIGN KEY (`thuephong_id`) REFERENCES `thuephong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sudungdichvu_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thuephong`
--
ALTER TABLE `thuephong`
  ADD CONSTRAINT `thuephong_khachhang_id_foreign` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thuephong_phong_id_foreign` FOREIGN KEY (`phong_id`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thuephong_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thuvienhinhanh`
--
ALTER TABLE `thuvienhinhanh`
  ADD CONSTRAINT `thuvienhinhanh_phong_id_foreign` FOREIGN KEY (`phong_id`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
