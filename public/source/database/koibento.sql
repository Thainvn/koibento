dd-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 03:01 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koibento`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'BIG BENTO', NULL, NULL, NULL),
(2, 'MINI BENTO', NULL, NULL, NULL),
(3, 'SUSHI', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `gender`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'male', '0976027854', 'Định Công Hoàng Mai Hà Nội', '2018-08-31 04:05:00', NULL),
(3, 'Nguyễn Văn Nam', 'minhnhoban070@gmail.com', 'male', '0976027865', 'Câu Lủ Hoàng Mai Hà Nội', '2018-08-31 04:15:00', NULL),
(4, 'Nguyễn Hoàng', 'toiyeuem@gmail.com', 'female', '0166519087', 'Đại La Hà Nội', '2018-08-31 03:37:00', NULL),
(5, 'Trần Hoa', 'thai@gmail.com', 'female', '0987543682', 'Hoang Nam ,Thanh Xuân ', '2018-08-19 23:18:19', NULL),
(6, 'Nguyễn Trang', 'thaiaaaa@gmail.com', 'female', '09765543682', 'Hoang Nam ,Thanh Xuân ', '2018-08-19 23:18:19', NULL),
(13, 'Nguyễn Văn Thái', 'vnibka.pasaml@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-06 15:07:37', '2018-09-06 15:07:37'),
(15, 'Nguyễn Văn Thái', 'vnibka.pasaml@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-06 15:13:28', '2018-09-06 15:13:28'),
(16, 'Nguyễn Văn Thái', 'vnibka.pasaml@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-06 15:16:19', '2018-09-06 15:16:19'),
(17, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-06 15:17:29', '2018-09-06 15:17:29'),
(18, 'Thainv', 'thainvnv@gmail.com', 'Nam', 'phone', 'house number and sheet name *', '2018-09-06 22:19:14', '2018-09-06 22:19:14'),
(19, 'Thainv', 'thainvnv@gmail.com', 'Nam', 'phone', 'house number and sheet name *', '2018-09-06 22:24:01', '2018-09-06 22:24:01'),
(20, 'HoaNguyen', 'hoanguyen@gmail.com', 'Nữ', '01665190051', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 09:25:04', '2018-09-09 09:25:04'),
(21, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:44:34', '2018-09-09 10:44:34'),
(22, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:47:35', '2018-09-09 10:47:35'),
(23, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:49:22', '2018-09-09 10:49:22'),
(24, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:52:58', '2018-09-09 10:52:58'),
(25, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:53:33', '2018-09-09 10:53:33'),
(26, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nam', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-09 10:54:58', '2018-09-09 10:54:58'),
(27, 'Nguyễn Văn Thái', 'hoanguyen@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-11 01:28:13', '2018-09-11 01:28:13'),
(28, 'Nguyễn Văn Thái', 'hoanguyen@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-11 01:29:14', '2018-09-11 01:29:14'),
(29, 'Nguyễn Văn Thái', 'hoanguyen@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-11 01:34:21', '2018-09-11 01:34:21'),
(30, 'Thainv', 'minhnhoban0707@gmail.com', 'female', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-11 02:59:36', '2018-09-11 02:59:36'),
(31, 'Nguyễn Thị Hoa', 'hoanguyen@gmail.com', 'Nữ', '01665190051', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(32, 'Nguyễn Văn Thái', 'minhnhoban0707@gmail.com', 'Nữ', '0976027866', 'Định Công-Hoàng Mai -Hà Nội', '2018-09-17 07:44:39', '2018-09-17 07:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `url_image` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `position` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `happy` varchar(11) COLLATE utf8_general_mysql500_ci NOT NULL,
  `recipes` varchar(11) COLLATE utf8_general_mysql500_ci NOT NULL,
  `work` varchar(11) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `description`, `url_image`, `position`, `happy`, `recipes`, `work`) VALUES
(1, 'Trần Đỉnh', 'Đầu bếp Nguyễn Đỉnh đã có hơn 12 năm kinh nghiệm làm việc tại nhiều nhà hàng Nhật Bản như Ohan, Nhân, … Là một cựu học viên của REACH, anh luôn mong muốn góp phần giúp đỡ các thanh niên có hoàn cảnh khó khăn. Với niềm đam mê ẩm thực Nhật Bản, anh luôn nỗ lực hết mình để mang tới những suất ăn tươi ngon và chuẩn Nhật tới thực khách.', 'chef2.png', 'Head Chef\r\n', '56%', '85%', '5%'),
(2, 'Nguyễn Dũng', 'Anh Dũng là một đầu bếp có hơn 4 năm kinh nghiệm với các món ăn Nhật Bản. Sau khi làm việc tại 3 nhà hàng Nhật tại Hà Nội, anh chuyển tới làm việc tại REACH với vai trò là giáo viên lớp bếp. Để nâng cao kỹ năng bếp Nhật, anh được cử sang Nhật học trực tiếp từ các đầu bếp tại đây hơn 1 tháng. Anh Dũng là một đầu bếp sáng tạo, luôn luôn trau dồi kỹ năng để mang tới những món ăn tuyệt vời nhất cho thực khách.', 'chef1.png', 'Chef', '56%', '45%', '9%'),
(3, 'Học Sinh Lớp Bếp Tại REACH\r\n', 'Những phụ bếp của KOI là những thanh niên có hoàn cảnh khó khăn đang theo học tại lớp bếp của REACH. Họ được đào tạo đa dạng các kỹ năng nấu ăn trong đó có đồ Nhật. Từ đó, các em giúp đỡ giáo viên của mình trong việc chuẩn bị những suất KOI tới khách hàng. Đây là cơ hội để các em nâng cao kỹ năng và thử sức làm việc tại môi trường doanh nghiệp sau này.', 'chef3.jpg', 'Chef\'s assistant\r\n', '10%', '10%', '10%');

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
(3, '2018_08_24_153911_create_slides_table', 1),
(4, '2018_08_24_154026_create_customers_table', 1),
(5, '2018_08_24_154351_create_categories_table', 1),
(6, '2018_08_24_154833_create_products_table', 1),
(7, '2018_08_24_155519_create_orders_table', 1),
(8, '2018_08_24_160349_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `date_ship` date DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `feeShip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `payment`, `date_order`, `date_ship`, `note`, `feeShip`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 320000, 'Tiền Mặt', '2018-08-31', '2018-09-01', 'Giao Hàng trước 10h sáng', '0', 1, '2018-08-31 04:26:00', '2018-08-31 09:44:29'),
(2, 3, 620000, 'Tiền Mặt', '2018-08-31', '2018-09-01', 'Giao Hàng trước 10h sáng', '0', 1, '2018-08-31 04:28:00', '2018-08-31 07:45:05'),
(3, 4, 160000, 'Tiền Mặt', '2018-07-26', '2018-07-27', NULL, '0', 1, '2018-07-26 00:12:20', NULL),
(4, 3, 260000, 'Tiền Mặt', '2018-07-24', '2018-07-25', NULL, '0', 1, '2018-07-24 00:12:20', NULL),
(5, 5, 120000, 'Tiền Mặt', '2018-06-20', '2018-06-21', NULL, '0', 1, '2018-06-20 01:18:18', NULL),
(6, 6, 360000, 'Tiền Mặt', '2018-05-20', '2018-05-21', NULL, '0', 1, '2018-05-20 01:18:18', NULL),
(7, 1, 120000, 'Tiền Mặt', '2018-09-02', '2018-09-07', NULL, '0', 1, NULL, '2018-09-07 09:41:49'),
(11, 13, 45000, 'COD', '2018-09-06', '2018-09-07', NULL, '0', 1, '2018-09-06 15:07:37', '2018-09-07 09:44:26'),
(12, 15, 210000, 'COD', '2018-09-06', '2018-09-07', NULL, '0', 1, '2018-09-06 15:13:28', '2018-09-07 09:46:23'),
(14, 17, 145000, 'COD', '2018-09-06', '2018-09-08', NULL, '0', 1, '2018-09-06 15:17:29', '2018-09-08 04:04:31'),
(15, 18, 145000, 'COD', '2018-09-07', '2018-09-08', NULL, '0', 1, '2018-09-06 22:19:15', '2018-09-08 04:05:44'),
(16, 19, 210000, 'COD', '2018-09-07', '2018-09-08', NULL, '0', 1, '2018-09-06 22:24:01', '2018-09-08 04:05:45'),
(17, 21, 145000, 'COD', '2018-09-09', '2018-09-11', NULL, '0', 1, '2018-09-09 10:44:34', '2018-09-11 02:23:49'),
(19, 23, 145000, 'COD', '2018-09-09', '2018-09-13', 'toiyeuem2606', '0', 1, '2018-09-09 10:49:22', '2018-09-13 08:06:30'),
(21, 25, 145000, 'COD', '2018-09-09', NULL, NULL, '0', 0, '2018-09-09 10:53:33', '2018-09-09 10:53:33'),
(22, 26, 145000, 'COD', '2018-09-09', NULL, NULL, '0', 0, '2018-09-09 10:54:58', '2018-09-09 10:54:58'),
(23, 27, 45000, 'COD', '2018-09-11', NULL, NULL, '0', 0, '2018-09-11 01:28:13', '2018-09-11 01:28:13'),
(25, 29, 225000, 'COD', '2018-09-11', NULL, NULL, '0', 0, '2018-09-11 01:34:21', '2018-09-11 01:34:21'),
(26, 30, 1495000, 'COD', '2018-09-11', NULL, NULL, '0', 0, '2018-09-11 02:59:36', '2018-09-11 02:59:36'),
(27, 31, 895000, 'COD', '2018-09-13', NULL, NULL, NULL, 0, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(28, 32, 4350000, 'COD', '2018-09-17', NULL, NULL, NULL, 0, '2018-09-17 07:44:39', '2018-09-17 07:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quanity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quanity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 230000, '2018-08-31 03:30:00', NULL),
(2, 2, 4, 3, 630000, '2018-08-31 03:37:00', NULL),
(3, 3, 8, 1, 45000, NULL, NULL),
(4, 4, 9, 1, 45000, NULL, NULL),
(5, 5, 13, 2, 45000, NULL, NULL),
(6, 6, 12, 2, 45000, NULL, NULL),
(7, 7, 3, 1, 120000, NULL, NULL),
(8, 7, 2, 1, 120000, NULL, NULL),
(9, 11, 5, 1, 45000, '2018-09-06 15:07:37', '2018-09-06 15:07:37'),
(10, 12, 1, 1, 210000, '2018-09-06 15:13:29', '2018-09-06 15:13:29'),
(11, 14, 2, 1, 145000, '2018-09-06 15:17:29', '2018-09-06 15:17:29'),
(12, 15, 2, 1, 145000, '2018-09-06 22:19:15', '2018-09-06 22:19:15'),
(13, 16, 1, 1, 210000, '2018-09-06 22:24:01', '2018-09-06 22:24:01'),
(14, 17, 2, 1, 145000, '2018-09-09 10:44:34', '2018-09-09 10:44:34'),
(15, 19, 2, 1, 145000, '2018-09-09 10:49:22', '2018-09-09 10:49:22'),
(16, 21, 2, 1, 145000, '2018-09-09 10:53:34', '2018-09-09 10:53:34'),
(17, 22, 2, 1, 145000, '2018-09-09 10:54:58', '2018-09-09 10:54:58'),
(18, 23, 14, 1, 45000, '2018-09-11 01:28:13', '2018-09-11 01:28:13'),
(19, 25, 6, 2, 45000, '2018-09-11 01:34:21', '2018-09-11 01:34:21'),
(20, 25, 7, 2, 45000, '2018-09-11 01:34:22', '2018-09-11 01:34:22'),
(21, 25, 11, 1, 45000, '2018-09-11 01:34:22', '2018-09-11 01:34:22'),
(22, 26, 2, 10, 145000, '2018-09-11 02:59:36', '2018-09-11 02:59:36'),
(23, 26, 5, 1, 45000, '2018-09-11 02:59:36', '2018-09-11 02:59:36'),
(24, 27, 5, 3, 45000, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(25, 27, 3, 1, 125000, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(26, 27, 2, 2, 145000, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(27, 27, 6, 1, 45000, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(28, 27, 14, 2, 45000, '2018-09-13 08:07:11', '2018-09-13 08:07:11'),
(29, 27, 1, 1, 210000, '2018-09-13 08:07:12', '2018-09-13 08:07:12'),
(30, 28, 2, 30, 145000, '2018-09-17 07:44:40', '2018-09-17 07:44:40');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `sale` double(8,2) DEFAULT '0.00',
  `url_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_en`, `description`, `unit_price`, `sale`, `url_image`, `unit`, `category_id`, `likes`, `created_at`, `updated_at`) VALUES
(1, 'LƯƠN NHẬT NƯỚNG SỐT TERI', 'luon nhat nuong sot teri', 'Lươn Nhật nướng sốt tery, Cơm trắng, Salad, Súp Miso và Tráng miệng', 210000, 0.00, 'Unagi-teyaki-Lươn-Nhật-3.png', 'hộp', 1, 0, NULL, '2018-09-12 13:04:35'),
(2, 'CÁ HỒI NƯỚNG SỐT BƠ TỎI\r\n', 'CA HOI NUONG SOT BO TOI', 'Cá hồi nướng sốt bơ tỏi, Cơm trắng, Bánh Korokke, Salad, Súp Miso và Tráng miệng', 145000, 0.00, 'Grilled-salmon-Cá-hồi-sốt-bơ-tỏi-1.png', 'hộp', 1, 0, NULL, NULL),
(3, 'SƯỜN BÒ MỸ SỐT\r\n', 'SUON BO MY SOT', 'Sườn bò mỹ sốt, Cơm trắng, Bánh Korokke, Salad, Súp Miso và Tráng miệng', 125000, 0.00, 'Grilled-American-Beef-Ribs-sườn-bò-sốt-Mỹ-1.png', 'hộp', 1, 0, NULL, NULL),
(4, 'CÁ SABA NƯỚNG MUỐI\r\n', 'CA SABA NUONG MUOI', 'Cá Saba nướng muối, Cơm trắng, Bánh Korokke, Salad, Súp Miso và Tráng miệng', 95000, 0.00, 'Baked-mackerel-with-salt-cá-saba-nướng-muối-1.png', 'hộp', 1, 0, NULL, NULL),
(5, 'CƠM CHAY NHẬT BẢN\r\n', 'COM CHAY NHAT BAN', 'Mỹ Ramen Xào sốt Nhật, Cơm cuộn chay, Cà Tím sốt, Đậu phụ Nhật, Súp Miso và Tráng miệng\r\n\r\n', 45000, 0.00, 'rsz_vegetarian-1.png', 'hộp', 2, 0, NULL, NULL),
(6, 'CƠM CÁ KHO SỐT NHẬT\r\n', 'COM CA KHO SOT NHAT', 'Cá Saba kho sốt Nhật, Cơm Trắng nén, Rau Củ Luộc chấm vừng, Súp Miso và Tráng miệng', 45000, 0.00, 'rsz_fish-1.png', 'hộp', 2, 0, NULL, NULL),
(7, 'CƠM THỊT LỢN KHO SỐT NHẬT\r\n', 'COM THIT LON KHO SOT NHAT', 'Thịt Lợn Kho Sốt Nhật, Cơm Trắng Nén, Bò Kho, Rau Củ Luộc Chấm Vừng, Súp Miso, Tráng Miệng', 45000, 0.00, 'rsz_pork-1.png', 'hộp', 2, 0, NULL, NULL),
(8, 'CƠM BÒ NƯỚNG\r\n', 'COM BO NUONG', 'Bò tảng nướng sốt Nhật, Cơm Trắng Nén, Rau củ luộc chấm vừng, Súp Miso và Tráng miệng\r\n\r\n', 45000, 0.00, 'rsz_beef-1.png', 'hộp', 2, 0, NULL, NULL),
(9, 'CƠM GÀ SỐT NẤM\r\n', 'COM GA SOT NAM', 'Gà sốt nấm, Cơm trắng nén, Trứng chiên, Rau củ luộc chấm muối vừng, Súp Miso và Tráng Miệng\r\n\r\n', 45000, 0.00, 'rsz_chicken.png', 'hộp', 2, 0, NULL, NULL),
(10, 'SUSHI RAU CỦ TẨM VỪNG\r\n', 'SUSHI RAU CU TAM VUNG', 'Cơm Sushi, Dưa Chuột, Rau Xanh, Củ Cải, Cà Rốt, Vừng và Mayonnaise\r\n\r\n', 45000, 0.00, 'Vegetarian.png', 'hộp', 3, 0, NULL, NULL),
(11, 'SUSHI TRỨNG TÔM\r\n', 'SUSHI TRUNG TOM', 'Cơm Sushi, Thanh Cua, Dưa Chuột, Trứng, Rau Xanh, Trứng Tôm và Mayonnaise\r\n\r\n', 45000, 0.00, 'Shrimp-Eggs-giam-size.png', 'hộp', 3, 0, NULL, NULL),
(12, 'SUSHI QUẢ BƠ\r\n', 'SUSHI QUA BO', 'Cơm sushi, Thanh Cua, Dưa Chuột, Trứng, Rau Xanh, Quả Bơ và Mayonnaise\r\n\r\n', 45000, 0.00, 'AVOCADO-1.png', 'hộp', 3, 0, NULL, NULL),
(13, 'SUSHI TỔNG HỢP\r\n', 'SUSHI TONG HOP', 'Cơm sushi, Thanh Cua, Dưa Chuột, Rau Xanh, Củ Cải và Mayonnaise\r\n\r\n', 45000, 0.00, 'SUSHI-MIXED-INGREDIENTS.png', 'hộp', 3, 0, NULL, NULL),
(14, 'SUSHI TÔM CHIÊN', 'SUSHI TOM CHIEN', 'Cơm sushi, tôm chiên bột Tempura', 45000, 0.00, 'Fried-Shrimp.jpg', 'hộp', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `link`, `url_image`, `created_at`, `updated_at`) VALUES
(3, NULL, 'anh1.png', NULL, NULL),
(4, NULL, 'anh2.png', NULL, NULL),
(5, NULL, 'anh3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `dec` int(11) NOT NULL DEFAULT '0',
  `url_image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `contactnumber`, `address`, `note`, `dec`, `url_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Văn Thái', 'thainvnv@gmail.com', '$2y$10$3n.X3mrj79mdMR3hJfGCYeKLMLh394PK8Z8bzUiSbjhEG/5ZCfMri', 'Nam', NULL, NULL, NULL, 1, NULL, 'yMzjKkGB2wNEA166xw7zTZuxIOX1AwGBptzW9hhoJAa0okdH2yqocJlEKiFP', '2018-09-17 07:46:36', '2018-09-17 07:46:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
