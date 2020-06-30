-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2020 lúc 06:41 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booktour`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_06_15_013536_create_tours_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typetour` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `name`, `image`, `typetour`, `schedule`, `depart`, `number`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Tour Miền Trung: Đà Nẵng - Bà Nà - Hội An - Huế - Động Phong Nha', 'public/img/tour-mien-trung.png', 'Từ Hồ Chí Minh', '4 ngày 3 đêm', '02/07/2020', '9', 4999999, NULL, NULL),
(3, 'Tour Borerfort', 'public/img/tour-mien-trung.png', 'Từ North Jefferey', '4 ngày 3 đêm', '15-06-20', '9', 5866398, NULL, NULL),
(4, 'Tour Nelliefort', 'public/img/tour-mien-trung.png', 'Từ Lake Raeburgh', '4 ngày 3 đêm', '15-06-20', '9', 4948682, NULL, NULL),
(5, 'Tour East Annalisefort', 'public/img/tour-mien-trung.png', 'Từ East Virgilport', '4 ngày 3 đêm', '15-06-20', '9', 3704939, NULL, NULL),
(6, 'Tour South Chad', 'public/img/tour-mien-trung.png', 'Từ Lake Aurelia', '4 ngày 3 đêm', '15-06-20', '9', 1317411, NULL, NULL),
(7, 'Tour Port Fostertown', 'public/img/tour-mien-trung.png', 'Từ Avatown', '4 ngày 3 đêm', '15-06-20', '9', 9280241, NULL, NULL),
(8, 'Tour Funkfort', 'public/img/tour-mien-trung.png', 'Từ Thieltown', '4 ngày 3 đêm', '15-06-20', '9', 4145258, NULL, NULL),
(9, 'Tour Svenborough', 'public/img/tour-mien-trung.png', 'Từ West Bernice', '4 ngày 3 đêm', '15-06-20', '9', 6440665, NULL, NULL),
(10, 'Tour East Jeffreyland', 'public/img/tour-mien-trung.png', 'Từ Sabrinatown', '4 ngày 3 đêm', '15-06-20', '9', 1305843, NULL, NULL),
(11, 'Tour Lake Amy', 'public/img/tour-mien-trung.png', 'Từ Port Darrionland', '4 ngày 3 đêm', '15-06-20', '9', 7773108, NULL, NULL),
(13, 'M', 'public/img/pnv.jpg', 'aa', '1 ngày 2 đêm', '22/09/2021', '9', 99999, '2020-06-14 21:35:13', '2020-06-14 21:35:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
