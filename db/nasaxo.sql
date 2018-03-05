-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2017 lúc 05:38 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nasaxo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `Name`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', '', 0, NULL, '2017-12-21 04:40:52'),
(2, 'Dak Lak', 'none', 0, NULL, NULL),
(3, 'Tân An', 'Tân An Thành phố', 0, '2017-12-21 04:48:45', '2017-12-21 04:49:01'),
(4, 'Đà Nẵng', 'Thành Phố ĐÀ NẴNG', 0, '2017-12-21 04:49:31', '2017-12-21 04:49:31'),
(5, 'Gia Lai', '', 0, '2017-12-21 05:03:24', '2017-12-21 05:03:24'),
(6, 'Đà Lạt', '', 0, '2017-12-21 05:03:39', '2017-12-21 05:03:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `Description`, `Color`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'trắng', 'ffffff', 0, NULL, '2017-12-20 00:34:39'),
(2, 'màu đỏ', 'FF000B', 0, NULL, '2017-12-19 10:17:12'),
(3, 'xanh', '0099DE', 0, NULL, '2017-12-19 10:17:15'),
(4, 'hồng', 'ebaff3', 0, NULL, '2017-12-19 10:41:10'),
(5, 'Hồng', 'e49aa2', 0, '2017-12-19 10:39:54', '2017-12-19 10:40:14'),
(6, 'Đen', '030303', 0, '2017-12-19 10:40:29', '2017-12-19 10:40:29'),
(7, 'Tím', 'cc4ae8', 0, '2017-12-19 10:41:28', '2017-12-19 10:41:28'),
(8, 'Xanh lá', '7cf16b', 0, '2017-12-19 10:42:10', '2017-12-19 10:42:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deliveryplace`
--

CREATE TABLE `deliveryplace` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED NOT NULL,
  `ID_Ward` int(10) UNSIGNED NOT NULL,
  `ReceiveName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumberPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryPlaces` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `deliveryplace`
--

INSERT INTO `deliveryplace` (`id`, `ID_User`, `ID_Ward`, `ReceiveName`, `NumberPhone`, `DeliveryPlaces`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Nam Nguyễn', '123123123', 'UIT', 0, NULL, '2017-12-21 10:43:54'),
(2, 2, 1, 'ng', '123', 'UT', 0, '2017-11-29 21:26:44', '2017-11-29 21:26:44'),
(3, 11, 1, 'nguyễn', '12323123', 'văn', 0, '2017-12-13 10:17:40', '2017-12-13 10:17:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_City` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `Name`, `Description`, `ID_City`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'Thủ Đức', 'Mô tả nè', 1, 0, NULL, '2017-12-21 10:15:24'),
(2, 'Quận 1', '', 1, 0, '2017-12-21 10:17:03', '2017-12-21 10:17:03'),
(3, 'Quận 2', '', 1, 0, '2017-12-21 10:17:10', '2017-12-21 10:17:10'),
(4, 'Quận 3', '', 1, 0, '2017-12-21 10:17:12', '2017-12-21 10:17:12'),
(5, 'Quận 5', '', 1, 0, '2017-12-21 10:17:32', '2017-12-21 10:17:32'),
(6, 'Quận 11', '', 1, 1, '2017-12-21 10:19:00', '2017-12-21 10:19:47'),
(7, 'Quận 6', '', 1, 0, '2017-12-21 10:19:17', '2017-12-21 10:19:17'),
(8, 'Quận 7', '', 1, 0, '2017-12-21 10:19:19', '2017-12-21 10:19:19'),
(9, 'Quận 8', '', 1, 0, '2017-12-21 10:19:22', '2017-12-21 10:19:22'),
(10, 'Quận 9', '', 1, 0, '2017-12-21 10:19:25', '2017-12-21 10:19:25'),
(11, 'Quận 10', '', 1, 0, '2017-12-21 10:19:28', '2017-12-21 10:19:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Users` int(10) UNSIGNED NOT NULL,
  `CreateDate` date NOT NULL,
  `IsNotify` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `Description`, `ID_Users`, `CreateDate`, `IsNotify`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'Tin nhắn đến từ mặt trăng.', 1, '2017-12-05', 1, 0, NULL, '2017-12-19 11:24:08'),
(2, 'Tin nhắn đến từ người ngoài hành tinh', 1, '2017-12-05', 1, 0, NULL, '2017-12-19 11:24:08'),
(3, 'Notify was delete', 1, '2017-12-05', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_17_122656_create_Users_table', 1),
(2, '2017_11_17_130400_create_Picture_table', 1),
(3, '2017_11_17_130450_create_Role_table', 1),
(4, '2017_11_17_130548_create_User_Role_table', 1),
(5, '2017_11_17_130623_create_Message_table', 1),
(6, '2017_11_17_130749_create_ProductCategory_table', 1),
(7, '2017_11_17_130750_create_Product_table', 1),
(8, '2017_11_17_130755_create_Comment_table', 1),
(9, '2017_11_17_130756_create_Rating_table', 1),
(10, '2017_11_17_130800_create_ProductPicture_table', 1),
(11, '2017_11_17_130856_create_ProductPrice_table', 1),
(12, '2017_11_17_130950_create_Size_table', 1),
(13, '2017_11_17_130954_create_ProductSize_table', 1),
(14, '2017_11_17_131020_create_Color_table', 1),
(15, '2017_11_17_131031_create_ProductColor_table', 1),
(16, '2017_11_17_131040_create_Promotion_table', 1),
(17, '2017_11_17_131041_create_City_table', 1),
(18, '2017_11_17_131042_create_District_table', 1),
(19, '2017_11_17_131043_create_Ward_table', 1),
(20, '2017_11_17_131044_create_DeliveryPlace_table', 1),
(21, '2017_11_17_131110_create_Order_table', 1),
(22, '2017_11_17_131114_create_OrderProduct_table', 1),
(23, '2017_11_17_131507_create_PromotionPicture_table', 1),
(24, '2017_11_19_031920_create_UsersPicture_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Promotion` int(10) UNSIGNED NOT NULL,
  `ID_DeliveryPlace` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED NOT NULL,
  `CreateDate` date NOT NULL,
  `ConfirmDate` date DEFAULT NULL,
  `IsPaied` tinyint(1) NOT NULL,
  `IsDelivered` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `Description`, `ID_Promotion`, `ID_DeliveryPlace`, `ID_User`, `CreateDate`, `ConfirmDate`, `IsPaied`, `IsDelivered`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, '', 1, 1, 1, '2017-11-01', '2017-11-01', 1, 1, 0, NULL, NULL),
(4, '', 1, 1, 1, '2017-11-01', '2017-12-05', 1, 1, 0, '2017-11-30 03:44:56', '2017-11-30 03:44:56'),
(5, '', 2, 1, 1, '2017-11-30', '2017-12-13', 1, 1, 0, '2017-11-30 03:49:12', '2017-11-30 03:49:12'),
(6, '', 2, 1, 1, '2017-11-30', '2017-12-13', 1, 1, 0, '2017-11-30 03:51:45', '2017-11-30 03:51:45'),
(7, '', 2, 1, 1, '2017-11-30', '2017-12-06', 1, 1, 0, '2017-12-05 23:33:05', '2017-12-05 23:33:05'),
(8, '', 2, 1, 1, '2017-12-13', '2017-12-14', 1, 1, 0, '2017-12-13 08:30:02', '2017-12-13 08:30:02'),
(9, '', 2, 1, 1, '2017-12-13', '2017-12-14', 1, 1, 0, '2017-12-13 08:30:17', '2017-12-13 08:30:17'),
(10, '', 2, 1, 1, '2017-12-13', '2017-12-14', 1, 1, 0, '2017-12-13 08:30:39', '2017-12-13 08:30:39'),
(11, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-13 08:31:05', '2017-12-13 08:31:05'),
(12, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-13 08:31:19', '2017-12-13 08:31:19'),
(13, '', 2, 1, 1, '2017-12-13', '2017-12-13', 1, 1, 0, '2017-12-13 08:46:02', '2017-12-13 08:46:02'),
(14, '', 2, 1, 1, '2017-12-13', '2017-12-13', 1, 1, 0, '2017-12-13 08:46:49', '2017-12-13 08:46:49'),
(15, '', 2, 1, 1, '2017-12-13', '2017-12-13', 1, 1, 0, '2017-12-13 09:24:10', '2017-12-13 09:24:10'),
(16, '', 2, 3, 11, '2017-12-13', '2017-12-14', 1, 1, 0, '2017-12-13 10:17:47', '2017-12-13 10:17:47'),
(17, '', 2, 3, 11, '2017-12-14', NULL, 0, 0, 1, '2017-12-14 01:14:28', '2017-12-14 02:47:59'),
(18, '', 2, 3, 11, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:20:37', '2017-12-21 10:44:40'),
(19, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:29:45', '2017-12-21 10:44:42'),
(20, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:29:55', '2017-12-21 10:44:44'),
(21, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:30:07', '2017-12-21 10:44:45'),
(22, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:30:16', '2017-12-21 10:44:47'),
(23, '', 2, 1, 1, '2017-12-14', '2017-12-14', 1, 1, 0, '2017-12-14 01:30:29', '2017-12-14 08:12:26'),
(24, '', 1, 1, 1, '2017-12-21', '2017-12-21', 1, 1, 0, '2017-12-21 10:43:59', '2017-12-21 10:44:48'),
(25, '', 1, 1, 1, '2017-12-21', '2017-12-21', 1, 1, 0, '2017-12-21 10:44:18', '2017-12-21 10:44:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderproduct`
--

CREATE TABLE `orderproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Order` int(11) DEFAULT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `ID_Size` int(10) UNSIGNED NOT NULL,
  `ID_Color` int(10) UNSIGNED NOT NULL,
  `ID_User` int(11) DEFAULT NULL,
  `IsInCart` tinyint(1) NOT NULL,
  `Count` int(11) NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderproduct`
--

INSERT INTO `orderproduct` (`id`, `ID_Order`, `ID_Product`, `ID_Size`, `ID_Color`, `ID_User`, `IsInCart`, `Count`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, 1, 0, 20, '', 0, NULL, NULL),
(2, 1, 14, 1, 1, 1, 0, 19, '', 0, NULL, NULL),
(3, 4, 1, 2, 3, 1, 0, 1, '', 0, '2017-11-27 06:53:57', '2017-11-30 03:44:56'),
(4, 4, 14, 3, 1, 1, 0, 3, '', 0, '2017-11-27 06:56:48', '2017-11-30 03:44:56'),
(5, 4, 2, 1, 1, 1, 0, 4, '', 0, '2017-11-27 06:57:03', '2017-11-30 03:44:56'),
(6, 4, 9, 1, 1, 1, 0, 5, '', 0, '2017-11-28 19:22:41', '2017-11-30 03:44:56'),
(7, 4, 12, 1, 1, 1, 0, 6, '', 0, '2017-11-28 21:19:27', '2017-11-30 03:44:56'),
(8, 9, 4, 1, 1, 1, 0, 1, '', 0, '2017-11-28 21:19:31', '2017-12-13 08:30:17'),
(9, 4, 3, 1, 1, 1, 0, 1, '', 0, '2017-11-29 19:43:37', '2017-11-30 03:44:56'),
(10, NULL, 2, 1, 1, 2, 1, 1, '', 0, '2017-11-29 21:07:07', '2017-11-29 21:07:07'),
(11, 5, 12, 1, 1, 1, 0, 1, '', 0, '2017-11-30 03:47:03', '2017-11-30 03:49:12'),
(12, 6, 14, 1, 1, 1, 0, 1, '', 0, '2017-11-30 03:51:38', '2017-11-30 03:51:45'),
(13, 8, 2, 1, 1, 1, 0, 2, '', 0, '2017-11-30 16:37:38', '2017-12-13 08:30:02'),
(14, 8, 3, 1, 1, 1, 0, 1, '', 0, '2017-11-30 16:37:40', '2017-12-13 08:30:02'),
(15, NULL, 1, 1, 3, 1, 1, 2, '', 1, '2017-11-30 16:37:49', '2017-12-02 00:04:11'),
(16, 7, 10, 1, 1, 1, 0, 99, '', 0, '2017-12-02 00:04:16', '2017-12-05 23:33:05'),
(17, 8, 10, 1, 1, 1, 0, 12, '', 0, '2017-12-05 23:41:48', '2017-12-13 08:30:02'),
(18, 9, 8, 1, 1, 1, 0, 1, '', 0, '2017-12-13 08:30:09', '2017-12-13 08:30:17'),
(19, 9, 7, 1, 1, 1, 0, 1, '', 0, '2017-12-13 08:30:10', '2017-12-13 08:30:17'),
(20, 10, 8, 1, 1, 1, 0, 1, '', 0, '2017-12-13 08:30:23', '2017-12-13 08:30:39'),
(21, 10, 7, 1, 1, 1, 0, 1, '', 0, '2017-12-13 08:30:24', '2017-12-13 08:30:40'),
(22, 10, 5, 1, 1, 1, 0, 3, '', 0, '2017-12-13 08:30:29', '2017-12-13 08:30:40'),
(23, 11, 5, 1, 1, 1, 0, 3, '', 0, '2017-12-13 08:30:52', '2017-12-13 08:31:06'),
(24, 12, 5, 1, 1, 1, 0, 2, '', 0, '2017-12-13 08:31:12', '2017-12-13 08:31:19'),
(25, 13, 14, 1, 1, 1, 0, 4, '', 0, '2017-12-13 08:45:49', '2017-12-13 08:46:02'),
(26, 14, 14, 1, 1, 1, 0, 1000, '', 0, '2017-12-13 08:46:38', '2017-12-13 08:46:49'),
(27, 15, 13, 1, 1, 1, 0, 1, '', 0, '2017-12-13 09:23:55', '2017-12-13 09:24:10'),
(28, 16, 3, 1, 1, 11, 0, 4, '', 0, '2017-12-13 10:16:55', '2017-12-13 10:17:47'),
(29, 17, 9, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:14:15', '2017-12-14 01:14:28'),
(30, 17, 10, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:14:16', '2017-12-14 01:14:28'),
(31, 17, 11, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:14:18', '2017-12-14 01:14:28'),
(32, 17, 12, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:14:19', '2017-12-14 01:14:28'),
(33, 18, 2, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:20:09', '2017-12-14 01:20:37'),
(34, 18, 7, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:20:10', '2017-12-14 01:20:37'),
(35, 18, 8, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:20:12', '2017-12-14 01:20:37'),
(36, 18, 6, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:20:13', '2017-12-14 01:20:37'),
(37, 18, 5, 1, 1, 11, 0, 1, '', 0, '2017-12-14 01:20:14', '2017-12-14 01:20:37'),
(38, 19, 2, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:29:38', '2017-12-14 01:29:45'),
(39, 20, 7, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:29:50', '2017-12-14 01:29:56'),
(40, 21, 4, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:30:01', '2017-12-14 01:30:07'),
(41, 22, 3, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:30:11', '2017-12-14 01:30:16'),
(42, 23, 9, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:30:22', '2017-12-14 01:30:29'),
(43, 23, 10, 1, 1, 1, 0, 1, '', 0, '2017-12-14 01:30:23', '2017-12-14 01:30:29'),
(44, 24, 9, 1, 1, 1, 0, 1, '', 0, '2017-12-14 15:31:45', '2017-12-21 10:43:59'),
(45, 24, 4, 1, 1, 1, 0, 2, '', 0, '2017-12-17 20:44:52', '2017-12-21 10:43:59'),
(46, 24, 14, 1, 2, 1, 0, 1, '', 0, '2017-12-17 20:45:22', '2017-12-21 10:43:59'),
(47, 24, 27, 3, 2, 1, 0, 1, '', 0, '2017-12-21 10:43:36', '2017-12-21 10:43:59'),
(48, 24, 7, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:43:38', '2017-12-21 10:43:59'),
(49, 25, 3, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:44:05', '2017-12-21 10:44:18'),
(50, 25, 2, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:44:06', '2017-12-21 10:44:18'),
(51, 25, 10, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:44:08', '2017-12-21 10:44:18'),
(52, 25, 11, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:44:09', '2017-12-21 10:44:18'),
(53, 25, 14, 1, 1, 1, 0, 1, '', 0, '2017-12-21 10:44:12', '2017-12-21 10:44:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture`
--

CREATE TABLE `picture` (
  `id` int(10) UNSIGNED NOT NULL,
  `Url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `picture`
--

INSERT INTO `picture` (`id`, `Url`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'products/1.jpg', 0, NULL, NULL),
(2, 'products/2.jpg', 0, NULL, NULL),
(3, 'products/3.jpg', 0, NULL, NULL),
(4, 'products/4.jpg', 0, NULL, NULL),
(5, 'products/5.jpg', 0, NULL, NULL),
(6, 'products/6.jpg', 0, NULL, NULL),
(7, 'products/7.jpg', 0, NULL, NULL),
(8, 'products/8.jpg', 0, NULL, NULL),
(9, 'products/9.jpg', 0, NULL, NULL),
(10, 'products/10.jpg', 0, NULL, NULL),
(11, 'products/11.jpg', 0, NULL, NULL),
(12, 'products/12.jpg', 0, NULL, NULL),
(13, 'products/13.jpg', 0, NULL, NULL),
(14, 'products/14.jpg', 0, NULL, NULL),
(15, 'promotions/1.jpg', 0, NULL, NULL),
(16, 'promotions/2.jpg', 0, NULL, NULL),
(17, 'promotions/3.jpg', 0, NULL, NULL),
(18, 'accounts/account.png', 0, NULL, NULL),
(19, 'accounts/account.png', 0, '2017-12-01 10:43:55', '2017-12-01 10:43:55'),
(20, 'accounts/account.png', 0, '2017-12-01 10:45:49', '2017-12-01 10:45:49'),
(21, 'accounts/account.png', 0, '2017-12-01 10:54:23', '2017-12-01 10:54:23'),
(22, 'accounts/account.png', 0, '2017-12-01 11:00:55', '2017-12-01 11:00:55'),
(23, 'accounts/account.png', 0, '2017-12-01 11:19:18', '2017-12-01 11:19:18'),
(24, 'accounts/account.png', 0, '2017-12-02 00:08:48', '2017-12-02 00:08:48'),
(25, 'products/15.jpg', 0, NULL, NULL),
(26, 'accounts/account.png', 0, '2017-12-10 07:51:30', '2017-12-10 07:51:30'),
(27, 'accounts/account.png', 0, '2017-12-11 09:08:53', '2017-12-11 09:08:53'),
(28, 'accounts/28.jpeg', 0, '2017-12-12 22:28:56', '2017-12-12 22:28:56'),
(29, 'accounts/account.png', 0, '2017-12-13 10:16:45', '2017-12-13 10:16:45'),
(30, 'accounts/30.png', 0, '2017-12-14 15:30:27', '2017-12-14 15:30:27'),
(31, 'accounts/31.jpeg', 0, '2017-12-17 10:45:13', '2017-12-17 10:45:13'),
(32, 'accounts/32.jpeg', 0, '2017-12-17 10:45:14', '2017-12-17 10:45:14'),
(33, 'accounts/33.jpeg', 0, '2017-12-17 10:58:00', '2017-12-17 10:58:00'),
(34, 'accounts/34.jpeg', 0, '2017-12-17 10:58:00', '2017-12-17 10:58:00'),
(35, 'products/35.jpeg', 0, '2017-12-17 10:59:19', '2017-12-17 10:59:19'),
(36, 'products/36.jpeg', 0, '2017-12-17 10:59:19', '2017-12-17 10:59:19'),
(37, 'products/37.jpeg', 0, '2017-12-17 11:13:31', '2017-12-17 11:13:31'),
(38, 'products/38.jpeg', 0, '2017-12-17 18:38:54', '2017-12-17 18:38:54'),
(39, 'products/39.jpeg', 0, '2017-12-17 18:38:55', '2017-12-17 18:38:55'),
(40, 'products/40.jpeg', 0, '2017-12-17 18:41:27', '2017-12-17 18:41:27'),
(41, 'products/41.jpeg', 0, '2017-12-17 18:41:27', '2017-12-17 18:41:27'),
(42, 'products/42.jpeg', 0, '2017-12-17 18:42:07', '2017-12-17 18:42:07'),
(43, 'products/43.jpeg', 0, '2017-12-17 18:42:07', '2017-12-17 18:42:07'),
(44, 'products/44.jpeg', 0, '2017-12-17 18:43:00', '2017-12-17 18:43:00'),
(45, 'products/45.jpeg', 0, '2017-12-17 18:43:00', '2017-12-17 18:43:00'),
(46, 'products/46.jpeg', 0, '2017-12-17 18:43:59', '2017-12-17 18:43:59'),
(47, 'products/47.jpeg', 0, '2017-12-17 18:43:59', '2017-12-17 18:43:59'),
(48, 'products/48.jpeg', 0, '2017-12-17 18:44:15', '2017-12-17 18:44:15'),
(49, 'products/49.jpeg', 0, '2017-12-17 18:44:15', '2017-12-17 18:44:15'),
(50, 'products/50.jpeg', 0, '2017-12-17 18:44:21', '2017-12-17 18:44:21'),
(51, 'products/51.jpeg', 0, '2017-12-17 18:44:21', '2017-12-17 18:44:21'),
(52, 'products/52.jpeg', 0, '2017-12-17 19:08:28', '2017-12-17 19:08:28'),
(53, 'products/53.jpeg', 0, '2017-12-17 19:08:28', '2017-12-17 19:08:28'),
(54, 'products/54.jpeg', 0, '2017-12-17 19:12:14', '2017-12-17 19:12:14'),
(55, 'products/55.jpeg', 0, '2017-12-17 19:12:14', '2017-12-17 19:12:14'),
(56, 'products/56.jpeg', 0, '2017-12-17 19:13:19', '2017-12-17 19:13:19'),
(57, 'products/57.jpeg', 0, '2017-12-17 19:13:19', '2017-12-17 19:13:19'),
(58, 'products/58.jpeg', 0, '2017-12-17 19:13:24', '2017-12-17 19:13:24'),
(59, 'products/59.jpeg', 0, '2017-12-17 19:13:24', '2017-12-17 19:13:24'),
(60, 'products/60.jpeg', 0, '2017-12-17 19:18:17', '2017-12-17 19:18:17'),
(61, 'products/61.jpeg', 0, '2017-12-17 19:19:35', '2017-12-17 19:19:35'),
(62, 'products/62.jpeg', 0, '2017-12-17 19:19:54', '2017-12-17 19:19:54'),
(63, 'products/63.jpeg', 0, '2017-12-17 19:20:38', '2017-12-17 19:20:38'),
(64, 'products/64.jpeg', 0, '2017-12-17 19:20:53', '2017-12-17 19:20:53'),
(65, 'products/65.jpeg', 0, '2017-12-17 19:21:18', '2017-12-17 19:21:18'),
(66, 'products/66.jpeg', 0, '2017-12-17 19:21:18', '2017-12-17 19:21:18'),
(67, 'products/67.jpeg', 0, '2017-12-17 19:21:24', '2017-12-17 19:21:24'),
(68, 'products/68.jpeg', 0, '2017-12-17 19:21:24', '2017-12-17 19:21:24'),
(69, 'products/69.jpeg', 0, '2017-12-17 19:22:34', '2017-12-17 19:22:34'),
(70, 'products/70.jpeg', 0, '2017-12-17 19:22:44', '2017-12-17 19:22:44'),
(71, 'products/71.jpeg', 0, '2017-12-17 19:22:45', '2017-12-17 19:22:45'),
(72, 'products/72.jpeg', 0, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(73, 'products/73.jpeg', 0, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(74, 'products/74.jpeg', 0, '2017-12-19 10:18:17', '2017-12-19 10:18:17'),
(75, 'products/75.jpeg', 0, '2017-12-19 10:18:17', '2017-12-19 10:18:17'),
(76, 'products/76.jpeg', 0, '2017-12-19 10:20:09', '2017-12-19 10:20:09'),
(77, 'products/77.jpeg', 0, '2017-12-19 10:20:09', '2017-12-19 10:20:09'),
(78, 'products/78.jpeg', 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(79, 'products/79.jpeg', 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(80, 'accounts/80.jpeg', 0, '2017-12-20 01:37:46', '2017-12-20 01:37:46'),
(81, 'accounts/81.jpeg', 0, '2017-12-20 01:39:01', '2017-12-20 01:39:01'),
(82, 'accounts/82.jpeg', 0, '2017-12-20 01:39:23', '2017-12-20 01:39:23'),
(83, 'accounts/83.jpeg', 0, '2017-12-20 01:41:17', '2017-12-20 01:41:17'),
(84, 'promotions/84.jpeg', 0, '2017-12-20 01:43:38', '2017-12-20 01:43:38'),
(85, 'promotions/85.jpeg', 0, '2017-12-20 01:45:01', '2017-12-20 01:45:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_ProductCategory` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `ID_ProductCategory`, `Name`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sơ mi Tay Dài Đen Slim Fit Japanese', 'Chất sơ mi Nhật, vải mềm, mịn tạo cảm giác thoải mái cho người mặc.', 0, NULL, '2017-12-15 09:41:01'),
(2, 1, 'Áo sơ mi tay dài 2 lớp trắng', 'Chất liệu lụa, vải mỏng, mềm mịn.', 0, NULL, '2017-12-15 09:41:04'),
(3, 1, 'Áo sơ mi tay ngắn cổ lông vũ', 'Chất liệu vải voan cao cấp giúp người mặc cảm thấy thoáng mát, thoải mái.', 0, NULL, NULL),
(4, 1, 'Áo sơ mi tay ngắn xếp ly xám', 'Chất liệu voan cao cấp, vải mỏng, mềm, mịn giúp người mặc cảm thấy thoải mái, thoáng mát.', 0, NULL, NULL),
(5, 1, 'Áo sơ mi Katto trắng', 'Chất liệu cotton, mềm mịn, thấm hút mồ hôi tốt.', 0, NULL, NULL),
(6, 1, 'Áo sơ mi họa tiết 1B trắng mũi tên', 'Chất liệu voan cát cao cấp giúp người mặc cảm thấy thoải mái. thoáng mát.', 0, NULL, NULL),
(7, 1, 'Áo sơ mi 1B trắng', 'Được may với 2 loại chất liệu: voan cát và lụa. Cả 2 chất liệu đều rất mỏng và mềm mịn.', 0, NULL, NULL),
(8, 1, 'Áo sơ mi tay ngắn form rộng trắng sọc viền đen', 'Chất liệu lụa Nhật cao cấp.', 0, NULL, NULL),
(9, 1, 'Áo sơ mi tay ngắn form rộng xanh navy viền trắng', 'Chất vải kate Nhật cao cấp. Vải mỏng, mềm mịn , độ thấm hút mồ hôi tốt mang ại cảm giác thoái mái thoáng mát cho người mặc.', 0, NULL, NULL),
(10, 1, 'Áo sơ mi tay dài cổ trụ xanh navy chấm bi', 'Fom châu Á, chất vải bố, dày giúp làm đứng fom áo hơn.', 0, NULL, NULL),
(11, 3, 'Men\'s Grain Leather', '', 0, NULL, '2017-12-14 09:42:41'),
(12, 3, 'Men\'s Muted Nylon', '', 0, NULL, '2017-12-14 09:42:41'),
(13, 3, 'PAIGE Men\'s Kenton Filled', '', 0, NULL, '2017-12-14 09:42:41'),
(14, 3, 'OBEY Men\'s Soto Varsity', '', 0, NULL, '2017-12-14 09:42:41'),
(27, 8, 'Áo thun mạnh mẽ', '123', 0, '2017-12-17 10:59:18', '2017-12-17 20:50:31'),
(28, 1, 'Áo thu cho nam', 'Mô tả', 0, '2017-12-17 11:13:30', '2017-12-17 11:13:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcategory`
--

INSERT INTO `productcategory` (`id`, `Name`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'T-SHIRT', 'T- Shirt description', 0, NULL, '2017-12-18 09:45:24'),
(2, 'SHIRT', '', 0, NULL, '2017-12-14 09:52:32'),
(3, 'COAT', '', 0, NULL, '2017-12-14 09:42:41'),
(4, 'TROUSERS', '', 0, NULL, NULL),
(5, 'SPORT CLOTHING', '', 0, NULL, NULL),
(6, 'VEST/BLAZER COAT', '', 0, NULL, NULL),
(7, 'Áo thun', 'Test thêm group', 0, '2017-12-15 06:58:25', '2017-12-15 06:58:35'),
(8, 'test', 'ádasd', 0, '2017-12-15 10:09:30', '2017-12-15 10:09:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcolor`
--

CREATE TABLE `productcolor` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `ID_Color` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcolor`
--

INSERT INTO `productcolor` (`id`, `ID_Product`, `ID_Color`, `IsDelete`, `created_at`, `updated_at`) VALUES
(47, 2, 1, 0, NULL, NULL),
(48, 3, 1, 0, NULL, NULL),
(49, 4, 1, 0, NULL, NULL),
(50, 5, 1, 0, NULL, NULL),
(51, 6, 1, 0, NULL, NULL),
(52, 7, 1, 0, NULL, NULL),
(53, 8, 1, 0, NULL, NULL),
(54, 9, 1, 0, NULL, NULL),
(55, 11, 1, 0, NULL, NULL),
(56, 10, 1, 0, NULL, NULL),
(57, 12, 1, 0, NULL, NULL),
(58, 13, 1, 0, NULL, NULL),
(59, 14, 1, 0, NULL, NULL),
(62, 14, 2, 0, NULL, NULL),
(72, 28, 2, 0, '2017-12-17 11:13:30', '2017-12-17 11:13:30'),
(73, 28, 3, 0, '2017-12-17 11:13:30', '2017-12-17 11:13:30'),
(122, 27, 2, 0, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(129, 1, 1, 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(130, 1, 2, 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(131, 1, 3, 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productpicture`
--

CREATE TABLE `productpicture` (
  `id` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `ID_Picture` int(10) UNSIGNED NOT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productpicture`
--

INSERT INTO `productpicture` (`id`, `IsDelete`, `ID_Picture`, `ID_Product`, `created_at`, `updated_at`) VALUES
(2, 0, 2, 2, NULL, NULL),
(3, 0, 3, 3, NULL, NULL),
(4, 0, 4, 4, NULL, NULL),
(5, 0, 5, 5, NULL, NULL),
(6, 0, 6, 6, NULL, NULL),
(7, 0, 7, 7, NULL, NULL),
(8, 0, 8, 8, NULL, NULL),
(9, 0, 9, 9, NULL, NULL),
(10, 0, 10, 10, NULL, NULL),
(11, 0, 11, 11, NULL, NULL),
(12, 0, 12, 12, NULL, NULL),
(13, 0, 13, 13, NULL, NULL),
(14, 0, 14, 14, NULL, NULL),
(15, 0, 2, 4, NULL, NULL),
(23, 0, 37, 28, '2017-12-17 11:13:31', '2017-12-17 11:13:31'),
(58, 0, 72, 27, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(59, 0, 73, 27, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(64, 0, 78, 1, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(65, 0, 79, 1, '2017-12-19 10:23:58', '2017-12-19 10:23:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productprice`
--

CREATE TABLE `productprice` (
  `id` int(10) UNSIGNED NOT NULL,
  `Price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `Discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productprice`
--

INSERT INTO `productprice` (`id`, `Price`, `StartDate`, `EndDate`, `IsDelete`, `ID_Product`, `Discount`, `created_at`, `updated_at`) VALUES
(1, '450000', '2017-11-01', '2017-12-16', 0, 1, '10', NULL, NULL),
(2, '440000', '2017-11-01', NULL, 0, 2, '10', NULL, NULL),
(3, '320000', '2017-11-01', NULL, 0, 3, '10', NULL, NULL),
(4, '320000', '2017-11-01', NULL, 0, 4, '10', NULL, NULL),
(5, '430000', '2017-11-01', NULL, 0, 5, '10', NULL, NULL),
(6, '440000', '2017-11-01', NULL, 0, 6, '10', NULL, NULL),
(7, '460000', '2017-11-01', NULL, 0, 7, '10', NULL, NULL),
(8, '440000', '2017-11-01', NULL, 0, 8, '10', NULL, NULL),
(9, '440000', '2017-11-01', NULL, 0, 9, '10', NULL, NULL),
(10, '400000', '2017-11-01', NULL, 0, 10, '10', NULL, NULL),
(11, '400000', '2017-11-01', NULL, 0, 11, '10', NULL, NULL),
(12, '400000', '2017-11-01', NULL, 0, 12, '10', NULL, NULL),
(13, '400000', '2017-11-01', NULL, 0, 13, '10', NULL, NULL),
(14, '400000', '2017-11-01', NULL, 0, 14, '10', NULL, NULL),
(15, '30000', '2017-12-16', '2017-12-19', 0, 1, '10', '2017-12-15 17:00:00', '2017-12-19 10:23:57'),
(24, '50000', '2017-12-17', NULL, 0, 27, '20', '2017-12-17 10:59:18', '2017-12-17 10:59:18'),
(25, '50000', '2017-12-17', NULL, 0, 28, '15', '2017-12-17 11:13:30', '2017-12-17 11:13:30'),
(27, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:38:54', '2017-12-17 18:38:54'),
(28, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:41:27', '2017-12-17 18:41:27'),
(29, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:42:06', '2017-12-17 18:42:06'),
(30, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:42:59', '2017-12-17 18:42:59'),
(31, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:43:59', '2017-12-17 18:43:59'),
(32, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:44:15', '2017-12-17 18:44:15'),
(33, '40000', '2017-12-18', NULL, 0, 27, '15', '2017-12-17 18:44:21', '2017-12-17 18:44:21'),
(34, '35000', '2017-12-18', NULL, 0, 27, '12', '2017-12-17 19:08:27', '2017-12-17 19:08:27'),
(35, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:12:14', '2017-12-17 19:12:14'),
(36, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:13:18', '2017-12-17 19:13:18'),
(37, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:13:24', '2017-12-17 19:13:24'),
(38, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:18:17', '2017-12-17 19:18:17'),
(39, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:19:35', '2017-12-17 19:19:35'),
(40, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:19:54', '2017-12-17 19:19:54'),
(41, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:20:38', '2017-12-17 19:20:38'),
(42, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:20:53', '2017-12-17 19:20:53'),
(43, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:21:17', '2017-12-17 19:21:17'),
(44, '33333', '2017-12-18', NULL, 0, 27, '13', '2017-12-17 19:21:24', '2017-12-17 19:21:24'),
(45, '33000', '2017-12-18', NULL, 0, 27, '12', '2017-12-17 19:22:34', '2017-12-17 19:22:34'),
(46, '33000', '2017-12-18', NULL, 0, 27, '12', '2017-12-17 19:22:44', '2017-12-17 19:22:44'),
(47, '50000', '2017-12-18', NULL, 0, 27, '20', '2017-12-17 20:50:31', '2017-12-17 20:50:31'),
(48, '30000', '2017-12-19', '2017-12-19', 0, 1, '10', '2017-12-19 10:18:16', '2017-12-19 10:23:57'),
(49, '30000', '2017-12-19', '2017-12-19', 0, 1, '10', '2017-12-19 10:20:09', '2017-12-19 10:23:57'),
(50, '30000', '2017-12-19', NULL, 0, 1, '10', '2017-12-19 10:23:57', '2017-12-19 10:23:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productsize`
--

CREATE TABLE `productsize` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Size` int(10) UNSIGNED NOT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productsize`
--

INSERT INTO `productsize` (`id`, `ID_Size`, `ID_Product`, `IsDelete`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 0, NULL, NULL),
(3, 1, 3, 0, NULL, NULL),
(4, 1, 4, 0, NULL, NULL),
(5, 1, 5, 0, NULL, NULL),
(6, 1, 6, 0, NULL, NULL),
(7, 1, 7, 0, NULL, NULL),
(8, 1, 8, 0, NULL, NULL),
(9, 1, 9, 0, NULL, NULL),
(10, 1, 10, 0, NULL, NULL),
(11, 1, 11, 0, NULL, NULL),
(12, 1, 12, 0, NULL, NULL),
(13, 1, 13, 0, NULL, NULL),
(14, 1, 14, 0, NULL, NULL),
(16, 3, 14, 0, NULL, NULL),
(25, 1, 28, 0, '2017-12-17 11:13:30', '2017-12-17 11:13:30'),
(26, 3, 28, 0, '2017-12-17 11:13:30', '2017-12-17 11:13:30'),
(27, 2, 28, 0, '2017-12-17 11:13:31', '2017-12-17 11:13:31'),
(77, 3, 27, 0, '2017-12-17 20:50:32', '2017-12-17 20:50:32'),
(82, 1, 1, 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58'),
(83, 2, 1, 0, '2017-12-19 10:23:58', '2017-12-19 10:23:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(10) UNSIGNED NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Discount` int(11) NOT NULL,
  `BasePurchase` double(8,2) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `Description`, `Name`, `Discount`, `BasePurchase`, `StartDate`, `EndDate`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'giảm 30%', '4', 30, 12000.00, '2017-12-20', '2017-12-22', 0, NULL, '2017-12-20 01:45:01'),
(2, '', '2', 11, 100000.00, '2017-02-01', NULL, 0, NULL, NULL),
(3, '', '3', 10, 200000.00, '2017-03-01', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotionpicture`
--

CREATE TABLE `promotionpicture` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Picture` int(10) UNSIGNED NOT NULL,
  `ID_Promotion` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotionpicture`
--

INSERT INTO `promotionpicture` (`id`, `ID_Picture`, `ID_Promotion`, `IsDelete`, `created_at`, `updated_at`) VALUES
(2, 16, 2, 0, NULL, NULL),
(3, 17, 3, 0, NULL, NULL),
(9, 85, 1, 0, '2017-12-20 01:45:01', '2017-12-20 01:45:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `Point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Product` int(10) UNSIGNED NOT NULL,
  `ID_Users` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `Point`, `ID_Product`, `ID_Users`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, '3', 1, 1, 0, '2017-12-06 21:57:25', '2017-12-06 22:09:44'),
(2, '5', 1, 2, 0, '2017-12-06 22:09:13', '2017-12-06 22:10:08'),
(3, '5', 2, 1, 0, '2017-12-15 22:37:53', '2017-12-15 22:37:53'),
(4, '2', 3, 1, 0, '2017-12-15 22:38:04', '2017-12-15 22:38:04'),
(5, '2', 27, 1, 0, '2017-12-17 18:46:21', '2017-12-17 18:46:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `Name`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 0, NULL, NULL),
(2, 'customer', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `Sizes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `Sizes`, `Description`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'M', 'Size M', 0, NULL, '2017-12-18 09:52:24'),
(2, 'L', 'size L', 0, NULL, NULL),
(3, 'S', 'size s', 0, NULL, '2017-12-18 09:17:30'),
(6, 'XLL', 'Size XLL', 0, '2017-12-18 09:41:08', '2017-12-18 09:52:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `Username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `Description`, `IsDelete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '7488e331b8b64e5794da3fa4eb10ad5d', '15520515@gm.uit.edu.vn', 'mô tả admin', 0, '4a626da792f2a597a9edf597143545c0', NULL, '2017-12-12 08:35:32'),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'admin2@gmail.com', '.', 0, '9d3b7a7354472583b280f622d3c411ed', NULL, '2017-12-06 01:04:01'),
(3, 'nonono', '21232f297a57a5a743894a0e4a801fc3', 'nonono@gmail.com', '', 0, NULL, '2017-12-01 10:43:54', '2017-12-01 10:43:54'),
(4, 'admin123', '25d55ad283aa400af464c76d713c07ad', 'admin123@gmail.com', '', 0, NULL, '2017-12-01 10:45:49', '2017-12-01 10:45:49'),
(5, 'ahihi', '0192023a7bbd73250516f069df18b500', 'ahihi@gmail.com', '', 0, NULL, '2017-12-01 10:54:23', '2017-12-01 10:54:23'),
(6, 'a', '70b03db954aa45fc2559e85f5d5bd13e', 'a@gmail.com', '', 0, NULL, '2017-12-01 11:00:54', '2017-12-01 11:00:54'),
(7, 'aa', '3979576bcdcbd166d005a5b225e1bc52', 'aa@gmail.com', '', 0, NULL, '2017-12-01 11:19:18', '2017-12-01 11:19:18'),
(8, 'admin1111', 'f5bb0c8de146c67b44babbf4e6584cc0', 'email@gmail.com', '', 0, NULL, '2017-12-02 00:08:48', '2017-12-02 00:08:48'),
(9, 'namnh', 'f5bb0c8de146c67b44babbf4e6584cc0', 'namnh@gmail.com', '', 0, NULL, '2017-12-10 07:51:30', '2017-12-10 07:51:30'),
(10, 'aaa', '7488e331b8b64e5794da3fa4eb10ad5d', 'anh@gmail.com', '', 0, NULL, '2017-12-11 09:08:53', '2017-12-11 09:08:53'),
(11, 'nothatsad', '7488e331b8b64e5794da3fa4eb10ad5d', '123123@gm.uit.edu.vn', '', 0, NULL, '2017-12-13 10:16:45', '2017-12-13 10:16:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userspicture`
--

CREATE TABLE `userspicture` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Users` int(10) UNSIGNED NOT NULL,
  `ID_Picture` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `userspicture`
--

INSERT INTO `userspicture` (`id`, `ID_Users`, `ID_Picture`, `IsDelete`, `created_at`, `updated_at`) VALUES
(2, 3, 19, 0, '2017-12-01 10:43:55', '2017-12-01 10:43:55'),
(3, 4, 20, 0, '2017-12-01 10:45:49', '2017-12-01 10:45:49'),
(4, 5, 21, 0, '2017-12-01 10:54:23', '2017-12-01 10:54:23'),
(5, 6, 22, 0, '2017-12-01 11:00:55', '2017-12-01 11:00:55'),
(6, 7, 23, 0, '2017-12-01 11:19:18', '2017-12-01 11:19:18'),
(7, 8, 24, 0, '2017-12-02 00:08:48', '2017-12-02 00:08:48'),
(8, 9, 26, 0, '2017-12-10 07:51:30', '2017-12-10 07:51:30'),
(9, 10, 27, 0, '2017-12-11 09:08:53', '2017-12-11 09:08:53'),
(11, 11, 29, 0, '2017-12-13 10:16:45', '2017-12-13 10:16:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_Users` int(10) UNSIGNED NOT NULL,
  `ID_Role` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `ID_Users`, `ID_Role`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, NULL),
(2, 2, 1, 0, NULL, NULL),
(3, 2, 2, 0, NULL, NULL),
(4, 3, 2, 0, NULL, NULL),
(5, 4, 2, 0, NULL, NULL),
(6, 5, 2, 0, '2017-12-01 10:54:23', '2017-12-01 10:54:23'),
(7, 6, 2, 0, '2017-12-01 11:00:55', '2017-12-01 11:00:55'),
(8, 7, 2, 0, '2017-12-01 11:19:18', '2017-12-01 11:19:18'),
(9, 8, 2, 0, '2017-12-02 00:08:49', '2017-12-02 00:08:49'),
(10, 9, 2, 0, '2017-12-10 07:51:30', '2017-12-10 07:51:30'),
(11, 10, 2, 0, '2017-12-11 09:08:54', '2017-12-11 09:08:54'),
(12, 11, 2, 0, '2017-12-13 10:16:45', '2017-12-13 10:16:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ward`
--

CREATE TABLE `ward` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_District` int(10) UNSIGNED NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ward`
--

INSERT INTO `ward` (`id`, `Name`, `Description`, `ID_District`, `IsDelete`, `created_at`, `updated_at`) VALUES
(1, 'Làng Đại Học', '', 1, 0, NULL, '2017-12-22 09:25:46'),
(2, 'Tân Lập', '123', 1, 0, '2017-12-22 09:31:18', '2017-12-22 09:31:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `deliveryplace`
--
ALTER TABLE `deliveryplace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveryplace_id_user_foreign` (`ID_User`),
  ADD KEY `deliveryplace_id_ward_foreign` (`ID_Ward`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id_city_foreign` (`ID_City`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id_users_foreign` (`ID_Users`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_promotion_foreign` (`ID_Promotion`),
  ADD KEY `order_id_deliveryplace_foreign` (`ID_DeliveryPlace`),
  ADD KEY `order_id_user_foreign` (`ID_User`);

--
-- Chỉ mục cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderproduct_id_product_foreign` (`ID_Product`),
  ADD KEY `orderproduct_id_size_foreign` (`ID_Size`),
  ADD KEY `orderproduct_id_color_foreign` (`ID_Color`);

--
-- Chỉ mục cho bảng `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_productcategory_foreign` (`ID_ProductCategory`);

--
-- Chỉ mục cho bảng `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productcolor_id_product_foreign` (`ID_Product`),
  ADD KEY `productcolor_id_color_foreign` (`ID_Color`);

--
-- Chỉ mục cho bảng `productpicture`
--
ALTER TABLE `productpicture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productpicture_id_picture_foreign` (`ID_Picture`),
  ADD KEY `productpicture_id_product_foreign` (`ID_Product`);

--
-- Chỉ mục cho bảng `productprice`
--
ALTER TABLE `productprice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productprice_id_product_foreign` (`ID_Product`);

--
-- Chỉ mục cho bảng `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productsize_id_size_foreign` (`ID_Size`),
  ADD KEY `productsize_id_product_foreign` (`ID_Product`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotionpicture`
--
ALTER TABLE `promotionpicture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotionpicture_id_picture_foreign` (`ID_Picture`),
  ADD KEY `promotionpicture_id_promotion_foreign` (`ID_Promotion`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id_product_foreign` (`ID_Product`),
  ADD KEY `rating_id_users_foreign` (`ID_Users`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `userspicture`
--
ALTER TABLE `userspicture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userspicture_id_users_foreign` (`ID_Users`),
  ADD KEY `userspicture_id_picture_foreign` (`ID_Picture`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_id_users_foreign` (`ID_Users`),
  ADD KEY `user_role_id_role_foreign` (`ID_Role`);

--
-- Chỉ mục cho bảng `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ward_id_district_foreign` (`ID_District`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `deliveryplace`
--
ALTER TABLE `deliveryplace`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT cho bảng `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT cho bảng `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT cho bảng `productpicture`
--
ALTER TABLE `productpicture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT cho bảng `productprice`
--
ALTER TABLE `productprice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT cho bảng `productsize`
--
ALTER TABLE `productsize`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `promotionpicture`
--
ALTER TABLE `promotionpicture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `userspicture`
--
ALTER TABLE `userspicture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `deliveryplace`
--
ALTER TABLE `deliveryplace`
  ADD CONSTRAINT `deliveryplace_id_user_foreign` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deliveryplace_id_ward_foreign` FOREIGN KEY (`ID_Ward`) REFERENCES `ward` (`id`);

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_id_city_foreign` FOREIGN KEY (`ID_City`) REFERENCES `city` (`id`);

--
-- Các ràng buộc cho bảng `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_id_users_foreign` FOREIGN KEY (`ID_Users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_deliveryplace_foreign` FOREIGN KEY (`ID_DeliveryPlace`) REFERENCES `deliveryplace` (`id`),
  ADD CONSTRAINT `order_id_promotion_foreign` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `order_id_user_foreign` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD CONSTRAINT `orderproduct_id_color_foreign` FOREIGN KEY (`ID_Color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `orderproduct_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orderproduct_id_size_foreign` FOREIGN KEY (`ID_Size`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_productcategory_foreign` FOREIGN KEY (`ID_ProductCategory`) REFERENCES `productcategory` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  ADD CONSTRAINT `productcolor_id_color_foreign` FOREIGN KEY (`ID_Color`) REFERENCES `color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productcolor_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `productpicture`
--
ALTER TABLE `productpicture`
  ADD CONSTRAINT `productpicture_id_picture_foreign` FOREIGN KEY (`ID_Picture`) REFERENCES `picture` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productpicture_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `productprice`
--
ALTER TABLE `productprice`
  ADD CONSTRAINT `productprice_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `productsize`
--
ALTER TABLE `productsize`
  ADD CONSTRAINT `productsize_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productsize_id_size_foreign` FOREIGN KEY (`ID_Size`) REFERENCES `size` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `promotionpicture`
--
ALTER TABLE `promotionpicture`
  ADD CONSTRAINT `promotionpicture_id_picture_foreign` FOREIGN KEY (`ID_Picture`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `promotionpicture_id_promotion_foreign` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`id`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_id_product_foreign` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_id_users_foreign` FOREIGN KEY (`ID_Users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `userspicture`
--
ALTER TABLE `userspicture`
  ADD CONSTRAINT `userspicture_id_picture_foreign` FOREIGN KEY (`ID_Picture`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `userspicture_id_users_foreign` FOREIGN KEY (`ID_Users`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_id_role_foreign` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_id_users_foreign` FOREIGN KEY (`ID_Users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `ward_id_district_foreign` FOREIGN KEY (`ID_District`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
