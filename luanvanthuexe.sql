-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2025 lúc 02:31 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luanvanthuexe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `USERNAME` char(20) NOT NULL,
  `PASWORD` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASWORD`) VALUES
('thao1711', 'b2011992');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conversations`
--

CREATE TABLE `conversations` (
  `ID_HT` int(11) NOT NULL,
  `IDTK1` int(11) NOT NULL,
  `IDTK2` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `conversations`
--

INSERT INTO `conversations` (`ID_HT`, `IDTK1`, `IDTK2`, `created_at`) VALUES
(8, 4, 12, '2024-11-05 05:58:50'),
(9, 4, 3, '2024-11-05 06:01:34'),
(10, 4, 5, '2024-11-05 06:02:45'),
(11, 12, 12, '2024-11-09 07:28:22'),
(24, 5, 12, '2024-11-16 05:44:02'),
(25, 1, 1, '2024-11-24 07:08:31'),
(26, 2, 5, '2024-11-25 02:38:31'),
(27, 1, 2, '2024-11-25 05:30:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cotc`
--

CREATE TABLE `cotc` (
  `STT` int(11) NOT NULL,
  `MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia_nguoithue`
--

CREATE TABLE `danhgia_nguoithue` (
  `MA` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `ID_ORDER` int(11) NOT NULL,
  `MUCDO` int(11) DEFAULT NULL,
  `BINHLUAN` char(250) DEFAULT NULL,
  `anhdg` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia_thuexe`
--

CREATE TABLE `danhgia_thuexe` (
  `ID_THUE` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `ID_TIN` int(11) NOT NULL,
  `MUCDO` int(11) NOT NULL,
  `BINHLUAN` char(250) DEFAULT NULL,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `THAIDOPV` int(11) DEFAULT NULL,
  `DGCHUXE` varchar(200) DEFAULT NULL,
  `DOCHINHXAC` int(11) DEFAULT NULL,
  `anhdg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia_thuexe`
--

INSERT INTO `danhgia_thuexe` (`ID_THUE`, `IDTK`, `ID_TIN`, `MUCDO`, `BINHLUAN`, `TIME`, `THAIDOPV`, `DGCHUXE`, `DOCHINHXAC`, `anhdg`) VALUES
(4, 3, 2, 5, 'ffg', '2024-11-12 15:30:15', NULL, 'gg', NULL, 'images/danhgia/1730219534.jpg'),
(5, 3, 9, 5, 'Xe này êm lắm', '2024-11-12 15:41:33', NULL, 'đ', NULL, 'images/danhgia/1730219636.jpg'),
(6, 3, 2, 5, 'bgbgh', '2024-11-12 15:30:15', NULL, 'hnnn', NULL, 'images/danhgia/1730220130.jpg'),
(7, 3, 2, 4, 'Xe chạy rất thích, lần sau sẽ thuê tiếp', '2024-11-12 15:30:15', NULL, 'Thân thiện', NULL, NULL),
(8, 1, 4, 4, 'Rất hài lòng', '2024-11-12 15:30:15', NULL, 'Thân thiện', NULL, 'images/danhgia/1730719383.png'),
(9, 1, 4, 5, 'Rất oke ạ', '2024-11-12 15:30:15', NULL, 'Thân thiện', NULL, 'images/danhgia/1730963343.jpg'),
(10, 5, 2, 3, 'Xe mau hết xăng', '2024-11-12 17:41:14', 5, NULL, NULL, NULL),
(11, 4, 2, 1, 'Rất chi là oke la', '2024-11-12 17:41:54', NULL, NULL, NULL, NULL),
(12, 1, 5, 4, 'Rấ', '2024-11-18 04:33:16', NULL, 'Thân thiện', NULL, 'images/danhgia/1731904396.jpg'),
(13, 1, 3, 5, 'Rất hài lòng', '2024-11-26 09:21:39', NULL, 'Hỗ trợ nhiệt tình', NULL, 'images/danhgia/1732612899.jpg'),
(14, 12, 11, 5, 'Xe chạy rất thích!', '2024-12-03 07:49:49', NULL, 'Thân thiện, hỗ trợ nhiệt tình', NULL, 'images/danhgia/1733212189.jpg'),
(15, 4, 20, 5, 'Xe chạy thích lắm', '2024-12-03 09:41:27', NULL, 'Chủ xe thân thiện', NULL, 'images/danhgia/1733218887.jpg'),
(16, 2, 10, 5, NULL, '2024-12-06 06:05:24', NULL, 'Thân thiện', NULL, NULL),
(17, 2, 9, 5, NULL, '2024-12-06 06:18:36', NULL, 'Thân thiện', NULL, 'images/danhgia/1733465916.jpg'),
(18, 1, 20, 5, 'Rất hài lòng', '2024-12-06 06:23:54', NULL, 'Thân thiện', NULL, 'images/danhgia/1733466234.png'),
(19, 2, 11, 4, NULL, '2024-12-06 06:37:17', NULL, 'Thân thiện', NULL, 'images/danhgia/1733467037.jpg'),
(20, 1, 8, 4, NULL, '2024-12-06 07:15:01', NULL, 'Thân thiện', NULL, 'images/danhgia/1733469301.jpg'),
(21, 2, 11, 4, NULL, '2024-12-06 07:28:55', NULL, 'Thân thiện', NULL, 'images/danhgia/1733470135.png'),
(22, 1, 17, 4, NULL, '2024-12-06 07:47:35', NULL, 'Hỗ trợ nhiệt tình', NULL, 'images/danhgia/1733471255.jpg'),
(23, 1, 15, 4, NULL, '2024-12-06 07:48:13', NULL, 'Hỗ trợ nhiệt tình', NULL, NULL),
(24, 1, 17, 3, 'Rất hài lòng', '2024-12-06 07:49:04', NULL, 'Hỗ trợ nhiệt tình', NULL, 'images/danhgia/1733471344.jpg'),
(25, 4, 12, 5, 'Xe chạy rất thích', '2024-12-09 16:36:44', NULL, 'Hỗ trợ nhiệt tình', NULL, 'images/danhgia/1733762204.jpg'),
(26, 4, 20, 4, 'Sẽ thuê lại', '2024-12-09 16:37:14', NULL, 'Tư vấn nhanh chống', NULL, 'images/danhgia/1733762234.jpg'),
(27, 4, 20, 3, 'Xe mau hết xăng', '2024-12-09 16:37:30', NULL, 'Thân thiện', NULL, 'images/danhgia/1733762250.jpg'),
(28, 5, 16, 4, 'Xe hơi ồn', '2024-12-09 16:42:24', NULL, 'Thân thiện\r\nTư vấn nhanh chống\r\nHỗ trợ nhiệt tình', NULL, 'images/danhgia/1733762544.jpg'),
(29, 1, 11, 5, 'Xe chạy rất mượt, không có vấn đề gì', '2024-12-11 18:56:57', NULL, 'Thân thiện\r\nHỗ trợ nhiệt tình\r\nTư vấn nhanh chống', NULL, 'images/danhgia/1733943417.jpg'),
(30, 4, 4, 5, 'Xe chạy rất êm', '2024-12-12 03:03:58', NULL, 'Thân thiện\r\nTư vấn nhanh chống\r\nHỗ trợ nhiệt tình', NULL, 'images/danhgia/1733972638.jpg'),
(31, 2, 11, 5, 'Xe chạy rất thích', '2025-03-03 09:39:53', NULL, 'Thân thiện\r\nTư vấn nhanh chống\r\nHỗ trợ nhiệt tình', NULL, 'images/danhgia/1740994793.jpg'),
(32, 1, 11, 4, 'Xe chạy rất thích', '2025-03-04 13:34:58', NULL, 'Thân thiện\r\nTư vấn nhanh chống\r\nHỗ trợ nhiệt tình', NULL, 'images/danhgia/1741095298.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `IDGD` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `SODU` int(11) NOT NULL,
  `NOSAN` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`IDGD`, `IDTK`, `SODU`, `NOSAN`, `time`) VALUES
(1, 2, 0, 0, '2024-12-06 06:12:43'),
(2, 1, 0, 0, '2024-12-11 11:18:09'),
(3, 3, 0, 64000, '2024-12-12 03:03:33'),
(4, 4, 0, 0, '2025-03-04 13:43:12'),
(5, 5, 0, 0, '2024-12-08 16:00:08'),
(6, 12, 600, 0, '2024-11-28 13:37:38'),
(7, 13, 0, 0, '2024-11-28 10:36:59'),
(8, 14, 0, 0, '2024-11-28 10:37:05'),
(9, 15, 0, 0, '2024-11-28 10:37:13'),
(11, 18, 0, 0, '2024-12-09 16:18:48'),
(12, 19, 0, 0, '2025-02-26 17:11:20'),
(13, 20, 0, 0, '2025-03-03 07:08:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `ID_HD` int(11) NOT NULL,
  `ID_ORDER` int(11) NOT NULL,
  `TENHOPDONG` char(200) DEFAULT NULL,
  `NGAYLAP` date DEFAULT NULL,
  `THONGTIN` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `ID_IMAGE` int(11) NOT NULL,
  `ID_XE` int(11) NOT NULL,
  `TEN_IMAGE` char(50) DEFAULT NULL,
  `DUONGDAN` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`ID_IMAGE`, `ID_XE`, `TEN_IMAGE`, `DUONGDAN`) VALUES
(1, 1, 'airb', 'images/xe/ab1.jpg'),
(2, 3, 'Xe Vison', 'images/xe/vs1.jpg'),
(3, 3, '', 'images/xe/xevang.jpg'),
(4, 2, '', 'images/xe/wave1.jpg'),
(5, 5, '', 'images/xe/vs2.jpg'),
(6, 4, NULL, 'images/xe/Dream.jpg'),
(7, 6, NULL, 'images/xe/xedien1.jpg'),
(8, 7, NULL, 'images/xe/bmw.jpg'),
(9, 10, NULL, 'images/xe/1729528502.jpg'),
(10, 11, NULL, 'images/xe/1729611871.png'),
(11, 12, NULL, 'images/xe/1729700410.jpg'),
(12, 13, NULL, 'images/xe/1729754106.jpg'),
(17, 18, NULL, 'images/xe/1731082423.jpg'),
(20, 21, NULL, 'images/xe/1731133271.jpg'),
(21, 22, NULL, 'images/xe/1731133549.jpg'),
(22, 23, NULL, 'images/xe/1731421098.png'),
(23, 24, NULL, 'images/xe/1731736588.png'),
(24, 25, NULL, 'images/xe/1732502184.jpg'),
(25, 26, NULL, 'images/xe/1733914640.png'),
(26, 27, NULL, 'images/xe/1733972007.jpg'),
(27, 28, NULL, 'images/xe/1740995002.jpg'),
(28, 29, NULL, 'images/xe/1741095477.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_giayxe`
--

CREATE TABLE `image_giayxe` (
  `ID_GIAY` int(11) NOT NULL,
  `ID_XE` int(11) NOT NULL,
  `DUONGDAN` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_giayxe`
--

INSERT INTO `image_giayxe` (`ID_GIAY`, `ID_XE`, `DUONGDAN`) VALUES
(1, 21, 'images/giayxe/1731133271_giayxe.jpg'),
(2, 22, 'images/giayxe/1731133549_giayxe.jpg'),
(3, 23, 'images/giayxe/1731421098_giayxe.jpg'),
(4, 24, 'images/giayxe/1731736588_giayxe.jpg'),
(5, 25, 'images/giayxe/1732502184_giayxe.jpg'),
(6, 26, 'images/giayxe/1733914640_giayxe.jpg'),
(7, 27, 'images/giayxe/1733972007_giayxe.jpg'),
(8, 28, 'images/giayxe/1740995002_giayxe.jpg'),
(9, 29, 'images/giayxe/1741095477_giayxe.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
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
-- Cấu trúc bảng cho bảng `job_batches`
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
-- Cấu trúc bảng cho bảng `lichsuthanhtoan`
--

CREATE TABLE `lichsuthanhtoan` (
  `ID_LSTT` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `TIEN` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` enum('trừ','cộng') NOT NULL DEFAULT 'trừ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsuthanhtoan`
--

INSERT INTO `lichsuthanhtoan` (`ID_LSTT`, `IDTK`, `TIEN`, `time`, `trangthai`) VALUES
(4, 2, 100000, '2024-11-28 11:12:13', 'trừ'),
(13, 12, 150000, '2024-11-28 13:37:38', 'cộng'),
(14, 2, 10000, '2024-12-03 08:34:18', 'cộng'),
(23, 2, 10000, '2024-12-06 06:12:43', 'trừ'),
(24, 5, 2800000, '2024-12-06 06:14:29', 'cộng'),
(26, 4, 490000, '2024-12-12 03:06:21', 'trừ'),
(27, 4, 1080000, '2025-03-04 13:43:12', 'cộng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `ID_LIKE` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`ID_LIKE`, `IDTK`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(7, 12),
(8, 13),
(9, 14),
(11, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixe`
--

CREATE TABLE `loaixe` (
  `ID_LOAI` int(11) NOT NULL,
  `TEN_LOAI` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`ID_LOAI`, `TEN_LOAI`) VALUES
(1, ''),
(2, 'Xe Số'),
(3, 'Xe Ô Tô'),
(4, 'Xe Điện'),
(5, 'Xe Tay Ga'),
(6, 'Xe Đạp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lydohuy`
--

CREATE TABLE `lydohuy` (
  `ID_LDH` int(11) NOT NULL,
  `ID_ORDER` int(11) NOT NULL,
  `NOIDUNG` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lydohuy`
--

INSERT INTO `lydohuy` (`ID_LDH`, `ID_ORDER`, `NOIDUNG`, `time`) VALUES
(1, 82, 'Không có nhu cầu thuê', '2024-12-05 07:27:35'),
(2, 45, 'Đặt nhầm', '2024-12-05 10:21:47'),
(3, 73, 'Đặt nhầm ngày', '2024-12-11 19:02:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `ID_MESS` int(11) NOT NULL,
  `ID_HT` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`ID_MESS`, `ID_HT`, `IDTK`, `content`, `timestamp`, `is_read`) VALUES
(39, 10, 4, 'Chào bạn', '2024-11-07 09:56:00', 0),
(40, 10, 4, 'hãy đưa tiền cho mình', '2024-11-07 09:57:27', 0),
(42, 11, 12, 'hi bạn', '2024-11-09 07:28:35', 0),
(43, 11, 12, 'mình là bạn đấy', '2024-11-09 07:28:44', 0),
(46, 25, 1, 'Tôi muốn xem giấy tờ xe', '2024-11-24 07:08:49', 0),
(48, 26, 2, 'Chào', '2024-11-25 02:38:36', 0),
(54, 27, 2, 'Bạn liên hê với mình nhé', '2024-12-06 06:06:15', 0),
(59, 25, 1, 'helooo', '2025-03-03 06:59:16', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_17_160415_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('75c5f762-8caf-11ef-8ba0-004238be8a06', 'HHJFHFH', 'GGGG', 12, 'FVBB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ID_ORDER` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `ID_PTTT` int(11) NOT NULL DEFAULT 1,
  `ID_TT` int(11) NOT NULL DEFAULT 1,
  `ID_TIN` int(11) NOT NULL,
  `TGTHUE` date DEFAULT NULL,
  `TGTRA` date DEFAULT NULL,
  `LOINHAN` varchar(200) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `timepost` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ttgiaodich` enum('chưa thanh toán','thành công','lỗi') DEFAULT 'chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`ID_ORDER`, `IDTK`, `ID_PTTT`, `ID_TT`, `ID_TIN`, `TGTHUE`, `TGTRA`, `LOINHAN`, `TOTAL`, `timepost`, `ttgiaodich`) VALUES
(34, 3, 1, 4, 2, '2024-10-01', '2024-10-09', NULL, 1200000, '2024-11-25 09:16:01', 'thành công'),
(35, 3, 1, 5, 9, '2024-10-15', '2024-10-31', '0786912545', 4000000, '2024-12-05 15:44:56', 'chưa thanh toán'),
(36, 1, 2, 5, 1, '2024-10-01', '2024-10-10', NULL, 1125000, '2024-12-05 05:07:15', 'thành công'),
(37, 3, 1, 3, 11, '2024-10-24', '2024-10-30', NULL, 4900000, '2024-12-11 11:22:22', 'chưa thanh toán'),
(38, 1, 1, 4, 4, '2024-10-03', '2024-10-11', NULL, 640000, '2024-12-08 17:12:24', 'chưa thanh toán'),
(39, 2, 2, 4, 10, '2024-11-01', '2024-11-07', NULL, 3000000, '2024-12-06 06:05:24', 'thành công'),
(40, 1, 1, 4, 5, '2024-10-10', '2024-10-18', NULL, 720000, '2024-08-13 09:17:05', 'thành công'),
(41, 4, 1, 4, 12, '2024-10-25', '2024-10-31', NULL, 1194000, '2024-12-09 16:36:44', 'thành công'),
(42, 1, 1, 4, 8, '2024-10-29', '2024-10-31', NULL, 1000000, '2024-12-06 07:15:01', 'thành công'),
(43, 1, 2, 4, 17, '2024-11-11', '2024-11-16', NULL, 250000, '2024-12-06 07:47:35', 'thành công'),
(45, 1, 1, 5, 2, '2024-10-01', '2024-10-09', NULL, 1200000, '2024-12-05 10:21:47', 'chưa thanh toán'),
(55, 2, 1, 2, 15, '2024-11-10', '2024-11-23', NULL, 260000, '2024-12-11 11:32:11', 'chưa thanh toán'),
(56, 2, 1, 5, 2, '2024-10-01', '2024-10-04', NULL, 450000, '2024-12-03 08:02:10', 'chưa thanh toán'),
(57, 5, 2, 5, 12, '2024-10-24', '2024-10-30', NULL, 1194000, '2024-11-25 09:17:53', 'chưa thanh toán'),
(62, 1, 2, 4, 15, '2024-11-24', '2024-11-26', NULL, 40000, '2024-12-06 07:48:13', 'thành công'),
(65, 2, 1, 4, 11, '2024-11-02', '2024-11-04', NULL, 300000, '2024-12-06 07:28:55', 'chưa thanh toán'),
(66, 2, 1, 5, 1, '2024-10-11', '2024-10-11', NULL, 125000, '2024-12-03 08:02:28', 'chưa thanh toán'),
(67, 5, 2, 4, 16, '2024-11-10', '2024-11-11', NULL, 50000, '2024-12-09 16:42:24', 'thành công'),
(68, 1, 1, 1, 19, '2024-11-19', '2024-11-29', NULL, 80000, '2024-11-28 14:23:31', 'chưa thanh toán'),
(69, 5, 1, 1, 19, '2024-11-18', '2024-11-18', NULL, 80000, '2024-11-25 09:18:16', 'chưa thanh toán'),
(70, 1, 1, 1, 19, '2024-11-21', '2024-11-30', NULL, 80000, '2024-11-28 14:16:18', 'chưa thanh toán'),
(71, 1, 1, 1, 11, '2024-11-06', '2024-11-06', NULL, 150000, '2024-12-03 09:11:13', 'chưa thanh toán'),
(73, 1, 2, 5, 11, '2024-11-05', '2024-11-05', NULL, 150000, '2024-12-11 19:02:55', 'thành công'),
(74, 1, 2, 1, 13, '2024-10-27', '2024-10-27', '0786912545', 500000, '2024-11-25 10:02:02', 'thành công'),
(75, 1, 2, 4, 17, '2024-11-17', '2024-11-17', NULL, 50000, '2024-12-06 07:49:04', ''),
(76, 2, 2, 5, 19, '2024-11-23', '2024-11-23', NULL, 80000, '2024-12-03 08:02:16', ''),
(77, 2, 2, 5, 6, '2024-11-01', '2024-11-04', NULL, 180000, '2024-12-03 08:02:30', ''),
(78, 2, 1, 5, 11, '2024-11-01', '2024-11-01', NULL, 150000, '2024-12-05 09:31:46', ''),
(79, 2, 1, 4, 9, '2024-11-27', '2024-11-27', '0786912545', 1000000, '2024-12-06 06:18:36', 'chưa thanh toán'),
(80, 2, 1, 5, 10, '2024-11-27', '2024-11-27', NULL, 500000, '2024-12-03 08:02:00', 'chưa thanh toán'),
(81, 12, 1, 4, 11, '2024-12-05', '2024-12-06', NULL, 150000, '2024-12-03 07:49:49', 'chưa thanh toán'),
(82, 1, 1, 5, 11, '2024-12-07', '2024-12-07', '0786912545', 150000, '2024-12-05 07:37:35', 'chưa thanh toán'),
(83, 2, 1, 1, 11, '2024-12-08', '2024-12-09', NULL, 150000, '2024-12-03 08:00:13', 'chưa thanh toán'),
(84, 2, 2, 1, 11, '2024-12-10', '2024-12-11', '0786912545', 150000, '2024-12-03 08:14:55', 'thành công'),
(85, 4, 1, 4, 20, '2024-12-04', '2024-12-06', NULL, 100000, '2024-12-09 16:37:14', 'chưa thanh toán'),
(86, 4, 2, 4, 20, '2024-12-07', '2024-12-07', NULL, 50000, '2024-12-09 16:37:30', 'thành công'),
(87, 4, 2, 4, 20, '2024-12-08', '2024-12-14', NULL, 300000, '2024-12-03 09:41:27', 'thành công'),
(88, 1, 1, 4, 20, '2024-12-16', '2024-12-17', '0786912545', 50000, '2024-12-06 06:23:54', 'chưa thanh toán'),
(89, 1, 2, 4, 11, '2024-12-16', '2024-12-17', NULL, 150000, '2024-12-11 18:56:57', 'thành công'),
(90, 4, 1, 4, 4, '2024-12-12', '2024-12-12', NULL, 640000, '2024-12-12 03:03:58', 'chưa thanh toán'),
(91, 2, 1, 1, 10, '2025-02-27', '2025-02-27', NULL, 500000, '2025-02-26 17:05:01', 'chưa thanh toán'),
(92, 19, 1, 2, 11, '2025-02-27', '2025-02-27', NULL, 150000, '2025-03-03 07:10:42', 'chưa thanh toán'),
(93, 20, 1, 2, 11, '2025-03-04', '2025-03-05', NULL, 150000, '2025-03-03 07:10:06', 'chưa thanh toán'),
(94, 2, 2, 4, 11, '2025-03-03', '2025-03-03', NULL, 150000, '2025-03-03 09:39:53', 'thành công'),
(95, 1, 2, 4, 11, '2025-03-06', '2025-03-04', NULL, 1050000, '2025-03-04 13:34:58', 'thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_views`
--

CREATE TABLE `page_views` (
  `IDP` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `times` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `page_views`
--

INSERT INTO `page_views` (`IDP`, `views`, `times`) VALUES
(1, 1075, '2025-03-04 13:46:42'),
(2, 274, '2025-03-04 13:27:52'),
(3, 130, '2025-03-04 13:25:25'),
(4, 490, '2025-03-04 13:47:02'),
(5, 65, '2025-03-04 13:47:38'),
(6, 159, '2025-03-04 13:47:26'),
(7, 429, '2025-03-04 13:24:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthuc_tt`
--

CREATE TABLE `phuongthuc_tt` (
  `ID_PPTT` int(11) NOT NULL,
  `TEN_PPTT` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongthuc_tt`
--

INSERT INTO `phuongthuc_tt` (`ID_PPTT`, `TEN_PPTT`) VALUES
(1, 'Thanh toán khi nhận xe'),
(2, 'Thanh toán bằng VNPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongxa`
--

CREATE TABLE `phuongxa` (
  `id` int(11) NOT NULL,
  `ten_phuong_xa` varchar(100) NOT NULL,
  `loai` varchar(10) NOT NULL,
  `id_quan_huyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongxa`
--

INSERT INTO `phuongxa` (`id`, `ten_phuong_xa`, `loai`, `id_quan_huyen`) VALUES
(1, 'An Cư', 'Phường', 1),
(2, 'An Hòa', 'Phường', 1),
(3, 'An Khánh', 'Phường', 1),
(4, 'An Nghiệp', 'Phường', 1),
(5, 'An Phú', 'Phường', 1),
(6, 'Cái Khế', 'Phường', 1),
(7, 'Hưng Lợi', 'Phường', 1),
(8, 'Tân An', 'Phường', 1),
(9, 'Thới Bình', 'Phường', 1),
(10, 'Xuân Khánh', 'Phường', 1),
(11, 'An Thới', 'Phường', 2),
(12, 'Bình Thủy', 'Phường', 2),
(13, 'Bùi Hữu Nghĩa', 'Phường', 2),
(14, 'Long Hòa', 'Phường', 2),
(15, 'Long Tuyền', 'Phường', 2),
(16, 'Thới An Đông', 'Phường', 2),
(17, 'Trà An', 'Phường', 2),
(18, 'Ba Láng', 'Phường', 3),
(19, 'Hưng Phú', 'Phường', 3),
(20, 'Hưng Thạnh', 'Phường', 3),
(21, 'Lê Bình', 'Phường', 3),
(22, 'Phú Thứ', 'Phường', 3),
(23, 'Tân Phú', 'Phường', 3),
(24, 'Thường Thạnh', 'Phường', 3),
(25, 'Châu Văn Liêm', 'Phường', 4),
(26, 'Long Hưng', 'Phường', 4),
(27, 'Phước Thới', 'Phường', 4),
(28, 'Thới An', 'Phường', 4),
(29, 'Thới Hòa', 'Phường', 4),
(30, 'Thới Long', 'Phường', 4),
(31, 'Trường Lạc', 'Phường', 4),
(32, 'Tân Hưng', 'Phường', 5),
(33, 'Thạnh Hòa', 'Phường', 5),
(34, 'Thạnh Lộc', 'Phường', 5),
(35, 'Thốt Nốt', 'Phường', 5),
(36, 'Thuận An', 'Phường', 5),
(37, 'Thuận Hưng', 'Phường', 5),
(38, 'Trung Kiên', 'Phường', 5),
(39, 'Trung Nhứt', 'Phường', 5),
(40, 'Giai Xuân', 'Xã', 6),
(41, 'Mỹ Khánh', 'Xã', 6),
(42, 'Nhơn Ái', 'Xã', 6),
(43, 'Nhơn Nghĩa', 'Xã', 6),
(44, 'Tân Thới', 'Xã', 6),
(45, 'Trường Long', 'Xã', 6),
(46, 'Đông Hiệp', 'Xã', 7),
(47, 'Đông Thắng', 'Xã', 7),
(48, 'Thạnh Phú', 'Xã', 7),
(49, 'Thới Đông', 'Xã', 7),
(50, 'Thới Hưng', 'Xã', 7),
(51, 'Thới Xuân', 'Xã', 7),
(52, 'Trung An', 'Xã', 7),
(53, 'Trung Hưng', 'Xã', 7),
(54, 'Trung Thạnh', 'Xã', 7),
(55, 'Thới Lai', 'Thị trấn', 8),
(56, 'Đông Bình', 'Xã', 8),
(57, 'Đông Thuận', 'Xã', 8),
(58, 'Tân Thạnh', 'Xã', 8),
(59, 'Thạnh Lộc', 'Xã', 8),
(60, 'Thới Tân', 'Xã', 8),
(61, 'Trường Thành', 'Xã', 8),
(62, 'Trường Thắng', 'Xã', 8),
(63, 'Trường Xuân', 'Xã', 8),
(64, 'Trường Xuân A', 'Xã', 8),
(65, 'Trường Xuân B', 'Xã', 8),
(66, 'Vĩnh Thạnh', 'Thị trấn', 9),
(67, 'Thạnh An', 'Thị trấn', 9),
(68, 'Thạnh Mỹ', 'Xã', 9),
(69, 'Thạnh Quới', 'Xã', 9),
(70, 'Thạnh Tiến', 'Xã', 9),
(71, 'Thạnh Thắng', 'Xã', 9),
(72, 'Thạnh Xuân', 'Xã', 9),
(73, 'Vĩnh Bình', 'Xã', 9),
(74, 'Vĩnh Trinh', 'Xã', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `id` int(11) NOT NULL,
  `ten_quan_huyen` varchar(100) NOT NULL,
  `loai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`id`, `ten_quan_huyen`, `loai`) VALUES
(1, 'Ninh Kiều', 'Quận'),
(2, 'Bình Thủy', 'Quận'),
(3, 'Cái Răng', 'Quận'),
(4, 'Ô Môn', 'Quận'),
(5, 'Thốt Nốt', 'Quận'),
(6, 'Phong Điền', 'Huyện'),
(7, 'Cờ Đỏ', 'Huyện'),
(8, 'Thới Lai', 'Huyện'),
(9, 'Vĩnh Thạnh', 'Huyện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `search`
--

CREATE TABLE `search` (
  `IDS` int(11) NOT NULL,
  `WORD` varchar(250) NOT NULL,
  `IDTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `search`
--

INSERT INTO `search` (`IDS`, `WORD`, `IDTK`) VALUES
(1, 'thue xe', 1),
(2, 'thuê xe vision', 2),
(3, 'thue', 5),
(4, 'thuê xe sinh viên', 5),
(5, 'xe đạp', 2),
(6, 'xe giá rẻ', 2),
(7, 'thuê xe đạp', 4),
(8, 'thue xe', 3),
(9, 'xe máy', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `ID_TT` int(11) NOT NULL,
  `TEN_TT` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`ID_TT`, `TEN_TT`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Hoàn tất'),
(4, 'Đã đánh giá'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_tin`
--

CREATE TABLE `status_tin` (
  `IDTTT` int(11) NOT NULL,
  `TENTTT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status_tin`
--

INSERT INTO `status_tin` (`IDTTT`, `TENTTT`) VALUES
(1, 'Chờ duyệt'),
(2, 'Đang hiển thị'),
(3, 'Bị từ chối'),
(4, 'Đã ẩn'),
(5, 'Hết hạn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_sinhvien`
--

CREATE TABLE `taikhoan_sinhvien` (
  `IDTK` int(11) NOT NULL,
  `MSSV` varchar(10) DEFAULT NULL,
  `PASSWORD` char(8) NOT NULL,
  `HOTEN` char(100) DEFAULT NULL,
  `CCCD` bigint(18) DEFAULT NULL,
  `KHOA` char(3) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `SDT` int(11) DEFAULT NULL,
  `DIACHI` char(150) DEFAULT NULL,
  `EMAIL` char(200) NOT NULL,
  `avt` varchar(200) DEFAULT NULL,
  `id_google` varchar(1000) DEFAULT NULL,
  `time_create` datetime DEFAULT NULL,
  `trangthaihoatdong` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_sinhvien`
--

INSERT INTO `taikhoan_sinhvien` (`IDTK`, `MSSV`, `PASSWORD`, `HOTEN`, `CCCD`, `KHOA`, `NGAYSINH`, `SDT`, `DIACHI`, `EMAIL`, `avt`, `id_google`, `time_create`, `trangthaihoatdong`) VALUES
(1, 'B2000000', 'b2011992', 'Thao Phan', 2036383933, '46', '2002-11-17', 786912545, 'Hậu Giang', 'thao0939340810@gmail.com', 'images/avt/1733390420.png', '103316656265153560082', '2024-09-09 23:30:33', '2025-03-04 13:33:02'),
(2, 'B2011992', 'b2011992', 'Thu Thao', 2147483647, '46', '2002-11-17', 786912545, 'Hau Giang', 'thaob2011992@student.ctu.edu.vn', 'images/avt/avt1.png', '102777770859932012291', '2024-10-13 23:30:49', '2024-12-13 12:05:05'),
(3, 'B2003793', 'b2011992', 'Kim Ngân', 2147483647, '46', '2002-08-17', 786912545, 'Kiên Giang', 'nganb2003793@student.ctu.edu.vn', 'images/avt/avt3.png', NULL, '2024-11-17 23:30:55', '2025-03-04 13:46:32'),
(4, 'B2003796', 'b2011992', 'Thảo Nguyên', 2147483647, '46', '2012-07-05', 786912545, 'Vĩnh Long', 'nguyenb2003796@student.ctu.edu.vn', 'images/avt/1729668489.png', NULL, '2024-12-04 23:31:03', '2025-03-04 13:40:33'),
(5, 'B2003808', 'b2011992', 'Trần Trang Thi', 1905958585, '46', '2002-04-17', 786912545, 'Sóc Trăng', 'thib2003808@student.ctu.edu.vn', 'images/avt/avt5.png', NULL, '2024-11-22 23:31:13', '2025-03-03 09:50:32'),
(12, 'B2011000', 'b2011992', 'Thanh Thảo', 2147483647, '46', '2002-11-17', 786912545, 'Vĩnh Long', 'phanthithuthao171102@gmail.com', 'images/avt/1729700107.png', '109211895877910124572', '2024-12-05 23:31:19', '2024-12-06 14:33:46'),
(13, 'B2011001', 'b2011992', 'Thúy Ngân', 1245689899, '48', '2005-10-30', 786912545, 'Cần Thơ', 'thuyngan301005@gmail.com', 'images/avt/1729746915.png', NULL, '2024-08-08 23:31:39', '2024-12-05 16:31:52'),
(14, 'B2011964', 'b2011992', 'Ngọc Hân', 0, '46', '2002-02-20', 786912345, 'Cần Thơ', 'hanb2011964@student.ctu.edu.vn', 'images/avt/1732076077.png', NULL, '2024-11-17 23:31:53', '2024-12-05 16:32:07'),
(15, 'B2009999', 'b2011992', 'Trần Ngọc Trầm', 0, '46', '2002-08-14', 786912545, NULL, 'thuyngan301005cute@gmail.com', 'images/avt/1732641899.jpg', NULL, '2024-12-01 23:32:09', '2024-12-05 16:32:16'),
(18, NULL, 'b2011992', NULL, NULL, NULL, '2002-11-17', NULL, NULL, 'ptthao171102@gmail.com', '', '108793537999576570220', NULL, '2024-12-11 09:28:55'),
(19, NULL, 'b2011992', NULL, NULL, NULL, NULL, NULL, NULL, 'pttngan-kt18@tdu.edu.vn', NULL, NULL, NULL, '2025-02-26 17:11:20'),
(20, NULL, 'b2011992', 'Phạm Huỳnh', 97657584785, '47', '2002-03-03', 786912545, 'Hậu Giang', '2153010680@student.ctump.edu.vn', 'images/avt/1740986062.JPG', NULL, NULL, '2025-03-03 07:50:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_status`
--

CREATE TABLE `taikhoan_status` (
  `IDTK` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'offline',
  `last_active` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtintaikhoan`
--

CREATE TABLE `thongtintaikhoan` (
  `MA` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `BANK` varchar(100) NOT NULL,
  `STK` int(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `MONEY` int(11) NOT NULL,
  `TRANGTHAI` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtintaikhoan`
--

INSERT INTO `thongtintaikhoan` (`MA`, `IDTK`, `BANK`, `STK`, `NAME`, `MONEY`, `TRANGTHAI`) VALUES
(1, 1, 'bidv', 786912545, 'PHAN THI THU THAO', 72000000, 2),
(5, 5, 'bidv', 786912545, 'PHAN THI THU THAO', 2800000, 2),
(6, 1, 'bidv', 786912545, 'PHAN THI THU THAO', 73000000, 2),
(7, 12, 'bidv', 786912545, 'Phan Thi Thu Thao', 150000, 2),
(8, 2, 'bidv', 786912545, 'Phan Thi Thu Thao', 10000, 2),
(9, 4, 'bidv', 786912545, 'PHAN THI THU THAO', 1080000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc_like`
--

CREATE TABLE `thuoc_like` (
  `ID_LIKE` int(11) NOT NULL,
  `ID_TIN` int(11) NOT NULL,
  `time_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc_like`
--

INSERT INTO `thuoc_like` (`ID_LIKE`, `ID_TIN`, `time_add`) VALUES
(1, 6, '2024-12-11 18:32:18'),
(1, 10, '2024-12-11 18:32:18'),
(1, 20, '2024-12-11 18:32:18'),
(2, 15, '2024-12-11 18:32:18'),
(2, 17, '2024-12-11 18:32:18'),
(4, 4, '2024-12-11 18:32:18'),
(4, 7, '2024-12-11 18:32:18'),
(5, 6, '2024-12-11 18:32:18'),
(7, 12, '2024-12-11 18:32:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi_dvthue`
--

CREATE TABLE `tieuchi_dvthue` (
  `ID_TCT` int(11) NOT NULL,
  `TENTIEUCHI` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuchi_dvthue`
--

INSERT INTO `tieuchi_dvthue` (`ID_TCT`, `TENTIEUCHI`) VALUES
(1, 'Thân thiện'),
(2, 'Hỗ trợ nhiệt tình'),
(3, 'Tư vấn nhanh chống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi_ngthue`
--

CREATE TABLE `tieuchi_ngthue` (
  `STT` int(11) NOT NULL,
  `TENTC` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuchi_ngthue`
--

INSERT INTO `tieuchi_ngthue` (`STT`, `TENTC`) VALUES
(1, 'Trả xe đúng hạn'),
(2, 'Bảo quản phương tiện tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangxe`
--

CREATE TABLE `tinhtrangxe` (
  `ID_TTX` int(11) NOT NULL,
  `TenTTX` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrangxe`
--

INSERT INTO `tinhtrangxe` (`ID_TTX`, `TenTTX`) VALUES
(1, ''),
(2, 'Mới trên 90%'),
(3, 'Mới trên 80%'),
(4, 'Mới trên 70%'),
(5, 'Cũ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinthuexe`
--

CREATE TABLE `tinthuexe` (
  `ID_TIN` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `ID_XE` int(11) NOT NULL,
  `IDTTT` int(11) NOT NULL DEFAULT 1,
  `TIEUDE` char(100) DEFAULT NULL,
  `THONGTIN` char(250) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `VITRI` char(250) DEFAULT NULL,
  `ID_XA` int(11) DEFAULT NULL,
  `TGTHUE` date NOT NULL,
  `TGTRA` date NOT NULL,
  `time_create` datetime DEFAULT NULL,
  `timepost` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinthuexe`
--

INSERT INTO `tinthuexe` (`ID_TIN`, `IDTK`, `ID_XE`, `IDTTT`, `TIEUDE`, `THONGTIN`, `PRICE`, `VITRI`, `ID_XA`, `TGTHUE`, `TGTRA`, `time_create`, `timepost`) VALUES
(1, 3, 1, 5, 'CHO THUÊ XE', 'SDT: 0789999999 \r\nEMAIL: thao0939340810@gmail.com \r\nTình trạng mới 95% \r\nXe chính chủ \r\nGiao nhận xe miễn phí tận nơi \r\nMiễn phí 1 lít xăng \r\nCó sẵn 2 nón bảo hiểm', 125000, '', 6, '2024-11-28', '2024-12-19', '2024-05-02 22:36:54', '2025-03-03 09:33:24'),
(2, 3, 2, 5, 'Cho Thuê Xe Nhe', 'SDT\r\nEMAIL\r\nMiễn phí 1 lít xăng \r\nCó nón bảo hiểm \r\n', 150000, '', 12, '2024-11-27', '2024-12-12', '2024-12-06 22:37:29', '2024-12-12 02:58:02'),
(3, 1, 3, 5, 'CHO THUÊ XE LÂU DÀI', 'Email SDT', 200000, NULL, 21, '2024-12-10', '2024-12-27', '2024-06-13 22:37:34', '2025-03-03 09:33:24'),
(4, 3, 1, 5, 'Cho thuê xe giá rẻ', NULL, 80000, NULL, 1, '2024-12-13', '2024-12-20', '2024-07-24 22:37:42', '2025-03-03 09:33:24'),
(5, 4, 5, 5, 'Cho thuê xe giá sinh viên', NULL, 90000, '', 41, '2024-10-09', '2024-10-23', '2024-09-16 22:37:51', '2024-12-12 02:58:02'),
(6, 5, 4, 5, 'Xe này cho thuê giá rẻ', 'Xe này', 60000, '', 8, '2024-12-12', '2024-12-31', '2024-10-22 22:38:00', '2025-03-03 09:33:24'),
(7, 5, 4, 5, 'Xe này dành cho các bạn sinh viên', 'Email\r\nSDT ...', 60000, '', 18, '2024-12-12', '2024-12-18', '2024-10-15 22:38:05', '2025-03-03 09:33:24'),
(8, 2, 6, 5, 'Xe điện cho thuê một tháng', 'Sạc 1 lần chạy được 50KM', 30000, '21', 40, '2024-12-08', '2024-12-12', '2024-06-15 22:38:13', '2024-12-12 02:58:02'),
(9, 1, 7, 5, 'Cho thuê xe BMW hợp đồng', 'Cho thuê 1 tháng ....', 1000000, NULL, 7, '2024-12-12', '2024-12-27', '2024-11-17 22:38:18', '2025-03-03 09:33:24'),
(10, 5, 10, 2, 'Có ai thuê xe không', 'Miễn phí xăng trọn đời', 500000, '', 7, '2025-02-26', '2025-03-31', '2024-11-22 22:38:28', '2025-02-26 16:59:22'),
(11, 4, 11, 4, 'XE CHO THUÊ, XE VESPA, XE TAY GA', 'Miễn phí xăng trọn đời', 150000, '391, đường 30 tháng 4', 10, '2025-02-26', '2025-03-31', '2024-12-04 22:38:42', '2025-02-26 17:00:47'),
(12, 12, 12, 5, 'Xe Này Cho Thuê', 'Cho thuê trọ đời', 199000, '22', 15, '2024-12-07', '2024-12-14', '2024-08-03 22:38:52', '2025-03-03 09:33:24'),
(13, 4, 13, 5, 'XE NÀY CHO MƯƠN', 'vv', 500000, '', 21, '2024-12-07', '2024-12-18', '2024-10-10 22:39:02', '2025-03-03 09:33:24'),
(15, 1, 18, 5, 'Xe đạp này cho thuê', 'Tôi muốn bán nó', 20000, NULL, 21, '2024-12-11', '2024-12-31', '2024-02-02 22:39:13', '2025-03-03 09:33:24'),
(16, 1, 21, 5, 'Giá siêu rẽ cho chiếc xe này', 'Miễn phí xăng 1 lít khi thuê từ 2 ngày', 50000, '', 18, '2024-11-10', '2024-11-24', '2024-12-12 22:39:29', '2024-12-12 02:58:02'),
(17, 12, 22, 5, 'Xe này chỉ cho nữ thuê', 'Miễn phí xăng cho các bạn thuê 1 ngày. Miễn phí xăng cho các bạn thuê 1 ngày. Miễn phí xăng cho các bạn thuê 1 ngày. Miễn phí xăng cho các bạn thuê 1 ngày . Miễn phí xăng cho các bạn thuê 1 ngày. Miễn phí xăng cho các bạn thuê 1 ngày.', 50000, '', 25, '2024-11-11', '2024-12-27', '2024-11-17 22:39:35', '2025-03-03 09:33:24'),
(18, 1, 23, 5, 'Xe chỉ cho sinh viên thuê', 'Đã sử dụng 2 năm', 59000, '228,đường 3 tháng 2', 10, '2024-12-09', '2024-12-17', '2024-12-30 22:39:45', '2025-03-03 09:33:24'),
(19, 5, 24, 5, 'Cần cho thuê chiếc xe này', 'Giao xe tận nơi, miễn phí 1 lít xăng', 80000, '228, đường 3 tháng 2', 10, '2024-11-18', '2024-11-23', '2024-10-13 22:39:51', '2024-12-12 02:58:02'),
(20, 2, 25, 5, 'CHO THUÊ XE 50', 'Giao xe tận nơi.', 50000, 'Đại học cần thơ,đường 3 tháng 2', 10, '2024-12-06', '2024-12-15', '2024-12-05 22:39:59', '2025-03-03 09:33:24'),
(21, 1, 26, 5, 'Xe wave cho thuê ở Cần Thơ', 'Giao xe tận nơi, miễn phí 1 lít xăng', 70000, NULL, 45, '2024-12-12', '2024-12-20', NULL, '2025-03-03 09:33:24'),
(22, 4, 27, 5, 'Cho thuê xe, chỉ cho nữ thuê', 'Miễn phí 1 lít xăng, có mũ bảo hiểm, giao xe tận nơi', 80000, 'Đại học cần thơ, đường 3 tháng  2', 10, '2024-12-12', '2024-12-26', NULL, '2025-03-03 09:33:24'),
(23, 2, 28, 5, 'CHO THUÊ XE VESPA GIÁ RẺ', 'Có nón bảo hiểm , miễn phí xăng ngày đầu', 100000, 'Đại học cần thơ, đường 3 tháng  2', 10, '2025-03-04', '2025-03-03', NULL, '2025-03-04 13:27:29'),
(24, 1, 29, 1, 'CHO THUÊ XE ĐIỆN GIÁ RẺ', 'Sạc mỗi ngày một lần, chạy được 30km', 50000, 'Đại học cần thơ, đường 3 tháng  2', 10, '2025-03-04', '2025-03-14', NULL, '2025-03-04 13:39:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `ID_XE` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `ID_LOAI` int(11) NOT NULL,
  `TENXE` char(100) DEFAULT NULL,
  `BIENSO` varchar(10) DEFAULT NULL,
  `MAUXE` varchar(100) NOT NULL,
  `ID_TTX` int(11) NOT NULL,
  `NGAYMUA` date DEFAULT NULL,
  `PHANKHOI` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`ID_XE`, `IDTK`, `ID_LOAI`, `TENXE`, `BIENSO`, `MAUXE`, `ID_TTX`, `NGAYMUA`, `PHANKHOI`) VALUES
(1, 3, 5, 'Xe AirBlack Đỏ', '95H160760', 'Đỏ', 2, NULL, '125cc'),
(2, 3, 2, 'Xe Jenus màu xanh', '95H1-60760', 'Xanh dương', 2, '0000-00-00', '110cc'),
(3, 1, 5, 'Xe vison', '95H1-31666', 'Xám', 3, NULL, '125cc'),
(4, 5, 2, 'Xe Dream', '95H1-11111', 'Vàng', 5, NULL, '110cc'),
(5, 4, 5, NULL, '95H1-67890', '', 4, NULL, NULL),
(6, 2, 4, 'Xe đạp điện', NULL, 'Đen', 4, NULL, NULL),
(7, 1, 3, 'Xe BMW', '65A-12345', 'Đen', 2, NULL, NULL),
(10, 5, 2, 'Xe future', '65D1-12345', 'Trang', 2, NULL, '125 cc'),
(11, 4, 2, 'Xe vespa', '64H1-66666', 'Nâu', 2, NULL, '125 cc'),
(12, 12, 5, 'Xe vespa', '65H1-99999', 'Đen', 5, NULL, '150 cc'),
(13, 4, 2, 'Xe future', '95H1-99999', 'TRANG', 2, NULL, '125 cc'),
(18, 1, 6, 'Xe đạp màu đen', 'Không có', 'Đen', 3, NULL, '0cc'),
(21, 1, 5, 'Xe jenus', '95H1-60760', 'Vàng', 3, NULL, '110cc'),
(22, 12, 5, 'Xe jenus Xanh', '95H1-60760', 'Xanh', 4, NULL, '110cc'),
(23, 1, 5, 'Xe airblack', '95H1-12345', 'Đỏ', 5, NULL, '125cc'),
(24, 5, 2, 'Xe blade đỏ', '95H1-12345', 'Đỏ', 3, NULL, '110cc'),
(25, 2, 5, 'Xe 55cc', '95H1-60760', 'Xanh Trắng', 3, '2022-11-18', '50cc'),
(26, 1, 5, 'Wave', '95H1-60760', 'Xanh lá nhạt', 5, NULL, '110cc'),
(27, 4, 5, 'Xe scoopy', '95H1-60760', 'Màu trắng', 3, NULL, '110cc'),
(28, 2, 5, 'Xe vespa cam', '95H1-23456', 'Cam', 2, NULL, '125cc'),
(29, 1, 4, 'Xe điện', '95H11234', 'Hồng', 4, NULL, '50cc');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`ID_HT`),
  ADD UNIQUE KEY `unique_taikhoan_sinhvien` (`IDTK1`,`IDTK2`),
  ADD KEY `IDTK2` (`IDTK2`);

--
-- Chỉ mục cho bảng `cotc`
--
ALTER TABLE `cotc`
  ADD PRIMARY KEY (`STT`,`MA`),
  ADD KEY `FK_COTC2` (`MA`);

--
-- Chỉ mục cho bảng `danhgia_nguoithue`
--
ALTER TABLE `danhgia_nguoithue`
  ADD PRIMARY KEY (`MA`),
  ADD KEY `FK_DANHGIA_KH` (`IDTK`),
  ADD KEY `ID_ORDER` (`ID_ORDER`);

--
-- Chỉ mục cho bảng `danhgia_thuexe`
--
ALTER TABLE `danhgia_thuexe`
  ADD PRIMARY KEY (`ID_THUE`),
  ADD KEY `FK_CO_DANHGIA` (`ID_TIN`),
  ADD KEY `FK_DANHGIA_DV` (`IDTK`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`IDGD`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`ID_HD`),
  ADD KEY `FK_CO_HOPDONG` (`ID_ORDER`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID_IMAGE`),
  ADD KEY `FK_CO_ANH` (`ID_XE`);

--
-- Chỉ mục cho bảng `image_giayxe`
--
ALTER TABLE `image_giayxe`
  ADD PRIMARY KEY (`ID_GIAY`),
  ADD KEY `ID_XE` (`ID_XE`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsuthanhtoan`
--
ALTER TABLE `lichsuthanhtoan`
  ADD PRIMARY KEY (`ID_LSTT`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID_LIKE`),
  ADD KEY `FK_CO_LIKE2` (`IDTK`);

--
-- Chỉ mục cho bảng `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`ID_LOAI`);

--
-- Chỉ mục cho bảng `lydohuy`
--
ALTER TABLE `lydohuy`
  ADD PRIMARY KEY (`ID_LDH`),
  ADD KEY `ID_ORDER` (`ID_ORDER`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID_MESS`),
  ADD KEY `idx_ID_HT` (`ID_HT`),
  ADD KEY `idx_IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_ORDER`),
  ADD KEY `FK_CO_DON` (`IDTK`),
  ADD KEY `FK_CO_TT` (`ID_TT`),
  ADD KEY `FK_RENT` (`ID_TIN`),
  ADD KEY `FK_THUOC_DONHANG` (`ID_PTTT`);

--
-- Chỉ mục cho bảng `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`IDP`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `phuongthuc_tt`
--
ALTER TABLE `phuongthuc_tt`
  ADD PRIMARY KEY (`ID_PPTT`);

--
-- Chỉ mục cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quan_huyen` (`id_quan_huyen`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`IDS`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_TT`);

--
-- Chỉ mục cho bảng `status_tin`
--
ALTER TABLE `status_tin`
  ADD PRIMARY KEY (`IDTTT`);

--
-- Chỉ mục cho bảng `taikhoan_sinhvien`
--
ALTER TABLE `taikhoan_sinhvien`
  ADD PRIMARY KEY (`IDTK`);

--
-- Chỉ mục cho bảng `taikhoan_status`
--
ALTER TABLE `taikhoan_status`
  ADD PRIMARY KEY (`IDTK`);

--
-- Chỉ mục cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  ADD PRIMARY KEY (`MA`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `thuoc_like`
--
ALTER TABLE `thuoc_like`
  ADD PRIMARY KEY (`ID_LIKE`,`ID_TIN`),
  ADD KEY `FK_THUOC_LIKE2` (`ID_TIN`);

--
-- Chỉ mục cho bảng `tieuchi_dvthue`
--
ALTER TABLE `tieuchi_dvthue`
  ADD PRIMARY KEY (`ID_TCT`);

--
-- Chỉ mục cho bảng `tieuchi_ngthue`
--
ALTER TABLE `tieuchi_ngthue`
  ADD PRIMARY KEY (`STT`);

--
-- Chỉ mục cho bảng `tinhtrangxe`
--
ALTER TABLE `tinhtrangxe`
  ADD PRIMARY KEY (`ID_TTX`);

--
-- Chỉ mục cho bảng `tinthuexe`
--
ALTER TABLE `tinthuexe`
  ADD PRIMARY KEY (`ID_TIN`),
  ADD KEY `FK_CO_BAIVIET` (`IDTK`),
  ADD KEY `FK_THUOC_TIN` (`ID_XE`),
  ADD KEY `ID_XA` (`ID_XA`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`ID_XE`),
  ADD KEY `FK_RELATIONSHIP_20` (`IDTK`),
  ADD KEY `FK_THUOC_LOAI` (`ID_LOAI`),
  ADD KEY `ID_TTX` (`ID_TTX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `conversations`
--
ALTER TABLE `conversations`
  MODIFY `ID_HT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `danhgia_thuexe`
--
ALTER TABLE `danhgia_thuexe`
  MODIFY `ID_THUE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `IDGD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `ID_IMAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `image_giayxe`
--
ALTER TABLE `image_giayxe`
  MODIFY `ID_GIAY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsuthanhtoan`
--
ALTER TABLE `lichsuthanhtoan`
  MODIFY `ID_LSTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaixe`
--
ALTER TABLE `loaixe`
  MODIFY `ID_LOAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lydohuy`
--
ALTER TABLE `lydohuy`
  MODIFY `ID_LDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `ID_MESS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ID_ORDER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `page_views`
--
ALTER TABLE `page_views`
  MODIFY `IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phuongthuc_tt`
--
ALTER TABLE `phuongthuc_tt`
  MODIFY `ID_PPTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `search`
--
ALTER TABLE `search`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `status_tin`
--
ALTER TABLE `status_tin`
  MODIFY `IDTTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `taikhoan_sinhvien`
--
ALTER TABLE `taikhoan_sinhvien`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  MODIFY `MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tinhtrangxe`
--
ALTER TABLE `tinhtrangxe`
  MODIFY `ID_TTX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tinthuexe`
--
ALTER TABLE `tinthuexe`
  MODIFY `ID_TIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `ID_XE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`IDTK1`) REFERENCES `taikhoan_sinhvien` (`IDTK`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`IDTK2`) REFERENCES `taikhoan_sinhvien` (`IDTK`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cotc`
--
ALTER TABLE `cotc`
  ADD CONSTRAINT `FK_COTC` FOREIGN KEY (`STT`) REFERENCES `tieuchi_ngthue` (`STT`),
  ADD CONSTRAINT `FK_COTC2` FOREIGN KEY (`MA`) REFERENCES `danhgia_nguoithue` (`MA`);

--
-- Các ràng buộc cho bảng `danhgia_nguoithue`
--
ALTER TABLE `danhgia_nguoithue`
  ADD CONSTRAINT `FK_DANHGIA_KH` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`),
  ADD CONSTRAINT `danhgia_nguoithue_ibfk_1` FOREIGN KEY (`ID_ORDER`) REFERENCES `orders` (`ID_ORDER`);

--
-- Các ràng buộc cho bảng `danhgia_thuexe`
--
ALTER TABLE `danhgia_thuexe`
  ADD CONSTRAINT `FK_CO_DANHGIA` FOREIGN KEY (`ID_TIN`) REFERENCES `tinthuexe` (`ID_TIN`),
  ADD CONSTRAINT `FK_DANHGIA_DV` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `giaodich_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `FK_CO_HOPDONG` FOREIGN KEY (`ID_ORDER`) REFERENCES `orders` (`ID_ORDER`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_CO_ANH` FOREIGN KEY (`ID_XE`) REFERENCES `xe` (`ID_XE`);

--
-- Các ràng buộc cho bảng `image_giayxe`
--
ALTER TABLE `image_giayxe`
  ADD CONSTRAINT `image_giayxe_ibfk_1` FOREIGN KEY (`ID_XE`) REFERENCES `xe` (`ID_XE`);

--
-- Các ràng buộc cho bảng `lichsuthanhtoan`
--
ALTER TABLE `lichsuthanhtoan`
  ADD CONSTRAINT `lichsuthanhtoan_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_CO_LIKE2` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `lydohuy`
--
ALTER TABLE `lydohuy`
  ADD CONSTRAINT `lydohuy_ibfk_1` FOREIGN KEY (`ID_ORDER`) REFERENCES `orders` (`ID_ORDER`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ID_HT`) REFERENCES `conversations` (`ID_HT`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_CO_DON` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`),
  ADD CONSTRAINT `FK_CO_TT` FOREIGN KEY (`ID_TT`) REFERENCES `status` (`ID_TT`),
  ADD CONSTRAINT `FK_RENT` FOREIGN KEY (`ID_TIN`) REFERENCES `tinthuexe` (`ID_TIN`),
  ADD CONSTRAINT `FK_THUOC_DONHANG` FOREIGN KEY (`ID_PTTT`) REFERENCES `phuongthuc_tt` (`ID_PPTT`);

--
-- Các ràng buộc cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD CONSTRAINT `phuongxa_ibfk_1` FOREIGN KEY (`id_quan_huyen`) REFERENCES `quanhuyen` (`id`);

--
-- Các ràng buộc cho bảng `search`
--
ALTER TABLE `search`
  ADD CONSTRAINT `search_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `taikhoan_status`
--
ALTER TABLE `taikhoan_status`
  ADD CONSTRAINT `taikhoan_status_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  ADD CONSTRAINT `thongtintaikhoan_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`);

--
-- Các ràng buộc cho bảng `thuoc_like`
--
ALTER TABLE `thuoc_like`
  ADD CONSTRAINT `FK_THUOC_LIKE` FOREIGN KEY (`ID_LIKE`) REFERENCES `likes` (`ID_LIKE`),
  ADD CONSTRAINT `FK_THUOC_LIKE2` FOREIGN KEY (`ID_TIN`) REFERENCES `tinthuexe` (`ID_TIN`);

--
-- Các ràng buộc cho bảng `tinthuexe`
--
ALTER TABLE `tinthuexe`
  ADD CONSTRAINT `FK_CO_BAIVIET` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`),
  ADD CONSTRAINT `FK_THUOC_TIN` FOREIGN KEY (`ID_XE`) REFERENCES `xe` (`ID_XE`),
  ADD CONSTRAINT `tinthuexe_ibfk_1` FOREIGN KEY (`ID_XA`) REFERENCES `phuongxa` (`id`);

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_sinhvien` (`IDTK`),
  ADD CONSTRAINT `FK_THUOC_LOAI` FOREIGN KEY (`ID_LOAI`) REFERENCES `loaixe` (`ID_LOAI`),
  ADD CONSTRAINT `ID_TTX` FOREIGN KEY (`ID_TTX`) REFERENCES `tinhtrangxe` (`ID_TTX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
