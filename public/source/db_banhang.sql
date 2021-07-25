-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 05:18 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', '000000', '0774156841', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'xử lí đơn(0=chưa xử lí)	',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', 2, '2020-06-08 10:51:36', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 2, '2020-06-08 10:51:29', '2020-06-05 18:55:01'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng giao hàng trước 5h', 2, '2020-06-08 13:02:20', '2020-06-05 18:55:50'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', 2, '2020-06-08 10:51:34', '2020-06-07 13:05:10'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', 1, '2020-06-07 13:05:16', '2020-06-07 13:05:16'),
(23, 26, '2020-05-25', 160000, 'ATM', 'test2', 1, '2020-06-08 12:48:33', '2020-06-08 12:48:33'),
(22, 25, '2020-05-25', 310000, 'ATM', NULL, 0, '2020-05-25 12:39:39', '2020-05-25 12:39:39'),
(24, 27, '2020-05-25', 300000, 'COD', 'test3', 0, '2020-05-25 13:14:36', '2020-05-25 13:14:36'),
(25, 28, '2020-05-25', 120000, 'ATM', 'test4', 0, '2020-05-25 13:17:50', '2020-05-25 13:17:50'),
(26, 29, '2020-05-28', 480000, 'ATM', 'testAuth', 0, '2020-05-28 04:07:04', '2020-05-28 04:07:04'),
(27, 30, '2020-05-28', 150000, 'COD', NULL, 0, '2020-05-28 15:35:22', '2020-05-28 15:35:22'),
(28, 31, '2020-05-28', 280000, 'COD', 'lân', 0, '2020-06-02 13:51:38', '2020-05-28 15:40:17'),
(29, 32, '2020-05-28', 300000, 'COD', 'test5', 0, '2020-05-28 15:47:38', '2020-05-28 15:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 15, 62, 5, 220000, '2020-05-25 13:16:42', '2017-03-24 07:14:32'),
(8, 14, 2, 1, 160000, '2020-05-25 13:17:06', '2017-03-23 04:46:05'),
(7, 13, 60, 1, 200000, '2020-05-25 13:17:03', '2017-03-21 07:29:31'),
(6, 13, 59, 1, 200000, '2020-05-25 13:17:00', '2017-03-21 07:29:31'),
(5, 12, 60, 2, 200000, '2020-05-25 13:16:57', '2017-03-21 07:20:07'),
(4, 12, 61, 1, 120000, '2020-05-25 13:16:52', '2017-03-21 07:20:07'),
(3, 11, 61, 1, 120000, '2020-05-25 13:16:50', '2017-03-21 07:16:09'),
(2, 11, 57, 2, 150000, '2020-05-25 13:16:46', '2017-03-21 07:16:09'),
(11, 23, 27, 2, 80000, '2020-05-25 13:17:12', '2020-05-25 13:01:26'),
(10, 22, 22, 1, 150000, '2020-05-25 13:17:10', '2020-05-25 12:39:39'),
(9, 22, 7, 1, 160000, '2020-05-25 13:17:08', '2020-05-25 12:39:39'),
(12, 24, 22, 2, 150000, '2020-05-25 13:17:15', '2020-05-25 13:14:36'),
(27, 25, 1, 1, 120000, '2020-05-25 13:17:50', '2020-05-25 13:17:50'),
(28, 26, 2, 3, 160000, '2020-05-28 04:07:04', '2020-05-28 04:07:04'),
(29, 27, 22, 1, 150000, '2020-05-28 15:35:22', '2020-05-28 15:35:22'),
(30, 28, 13, 1, 280000, '2020-05-28 15:40:17', '2020-05-28 15:40:17'),
(31, 29, 22, 2, 150000, '2020-05-28 15:47:38', '2020-05-28 15:47:38');

--
-- Triggers `bill_detail`
--
DELIMITER $$
CREATE TRIGGER `QuantityAfterCancelOrder` AFTER DELETE ON `bill_detail` FOR EACH ROW BEGIN
DECLARE idFood INT(11);
DECLARE orderedQuantity INT(11);

SET idFood = old.id_product;
SET orderedQuantity = old.quantity;

UPDATE products SET quantity = quantity + orderedQuantity WHERE id = idFood;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QuantityControl` AFTER INSERT ON `bill_detail` FOR EACH ROW BEGIN
DECLARE idFood INT(11);
DECLARE orderedQuantity INT(11);

SET idFood = new.id_product;
SET orderedQuantity = new.quantity;

UPDATE products SET quantity = quantity - orderedQuantity WHERE id = idFood;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', '0987654321', '2020-06-02 14:42:06', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '0775487645', '2020-06-02 14:41:31', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '0123456789', '2020-06-02 14:41:45', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '0938255195', '2020-06-02 14:40:20', '2017-03-21 07:16:09'),
(25, 'james', 'nam', 'wedx8199@gmail.com', '108 An Dương Vương', '0774186811', '2020-05-25 12:39:39', '2020-05-25 12:39:39'),
(26, 'GamingStore', 'nam', 'awpareshan@gmail.com', '108 An Dương Vương', '0774186811', '2020-05-25 13:01:26', '2020-05-25 13:01:26'),
(27, 'greenwood', 'nam', 'awpareshan@gmail.com', '106 doan van bo p2 q5', '0774567891', '2020-05-25 13:14:36', '2020-05-25 13:14:36'),
(28, 'dean', 'nam', 'awpareshan1@gmail.com', '106 doan van bo p2 q5', '0774186811', '2020-05-25 13:17:50', '2020-05-25 13:17:50'),
(29, 'james', 'nam', 'awpareshan@gmail.com', '108 An Dương Vương P9 Q5', '0774186855', '2020-05-28 04:07:04', '2020-05-28 04:07:04'),
(30, 'greenwood', 'nam', 'wwedx8199@gmail.com', '108 An Dương Vương', '0774567891', '2020-05-28 15:35:22', '2020-05-28 15:35:22'),
(31, 'dean', 'nam', 'clish1991@naver.com', '106 doan van bo p2 q5', '0774186855', '2020-05-28 15:40:17', '2020-05-28 15:40:17'),
(32, 'woodward', 'nam', 'awpareshan@gmail.com', '104 An Dương Vương P9 Q5', '0774186855', '2020-05-28 15:47:38', '2020-05-28 15:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT '50' COMMENT 'số lg tồn',
  `new` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `quantity`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Crepe Sầu riêng', 5, 'Bánh crepe sầu riêng nhà làm', 150000, 120000, '1430967449-pancake-sau-rieng-6.jpg', 50, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, '', 150000, 120000, 'crepe-chuoi.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Bánh Crepe Đào', 5, '', 160000, 0, 'crepe-dao.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Bánh Crepe Dâu', 5, '', 160000, 0, 'crepedau.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Bánh Crepe Pháp', 5, '', 200000, 180000, 'crepe-phap.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Bánh Crepe Táo', 5, '', 160000, 0, 'crepe-tao.jpg', 50, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bánh Crepe Trà xanh', 5, '', 160000, 150000, 'crepe-traxanh.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 160000, 150000, 'saurieng-dua.jpg', 50, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Bánh Gato Trái cây Việt Quất', 3, '', 250000, 0, '544bc48782741.png', 50, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, '', 200000, 180000, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 50, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Bánh kem Chocolate Dâu', 3, '', 300000, 280000, 'banh kem sinh nhat.jpg', 50, 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Bánh kem Dâu III', 3, '', 300000, 280000, 'Banh-kem (6).jpg', 50, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Bánh kem Dâu I', 3, '', 350000, 320000, 'banhkem-dau.jpg', 50, 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Bánh trái cây II', 3, '', 150000, 120000, 'banhtraicay.jpg', 50, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, '', 250000, 240000, 'Fruit-Cake_7979.jpg', 50, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Bánh ngọt nhân cream táo', 2, '', 180000, 0, '20131108144733.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, '', 150000, 0, 'Fruit-Cake_7976.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, '', 150000, 0, 'Fruit-Cake_7981.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, '', 160000, 150000, 'Peach-Cake_3294.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, 'test1', 160000, 150000, 'banhbonglantrung.jpg', 3, 1, '2016-10-13 02:20:00', '2020-06-09 13:35:48'),
(23, 'Bánh bông lan trứng muối II', 1, 'viết j đó', 180000, 0, 'banhbonglantrungmuoi.jpg', 4, 0, '2016-10-13 02:20:00', '2020-06-09 19:11:26'),
(24, 'Bánh French', 1, '', 180000, 0, 'banh-man-thu-vi-nhat-1.jpg', 5, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, '', 80000, 70000, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, '', 50000, 0, 'Fruit-Cake.png', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, '', 100000, 80000, 'maxresdefault.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 0, 'Peach-Cake_3300.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, '', 100000, 0, 'sli12.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 380000, 350000, 'sli12.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 350000, 'Fruit-Cake.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 350000, 'Fruit-Cake_7971.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, '', 280000, 250000, 'p1392962167_banh74.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 0, 'Caramen-pudding636099031482099583.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 300000, 'chocolate-fruit636098975917921990.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 320000, 300000, 'COFFE-CHOCOLATE636098977566220885.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, 'mango-mousse-cake.jpg', 50, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, 'MATCHA-MOUSSE.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, 'flower-fruits636102461981788938.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, 'raspberry.jpg', 50, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, 'Macaron9.jpg', 50, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, '234.jpg', 50, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, 0, '1234.jpg', 50, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'banner1.jpg', NULL, NULL),
(2, '', 'banner2.jpg', NULL, NULL),
(3, '', 'banner3.jpg', NULL, NULL),
(4, '', 'banner4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'áo', 'banh-man-thu-vi-nhat-1.jpg', NULL, '2020-06-02 19:14:55'),
(2, 'Bánh ngọt', 'quần', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'giay', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'khoác', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'bla', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '0774174593', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33'),
(7, 'ed woodward', 'awpareshan@gmail.com', '$2y$10$BMMq3yY0mXWx1XAQdDwSk.UuLvSkAvCc70aq59gpmRPUUr55.MzGS', '0774186855', '104 An Dương Vương P9 Q5', NULL, '2020-05-25 14:35:52', '2020-05-29 17:21:12'),
(9, 'dean', 'clish1991@naver.com', '$2y$10$7EpXL6e5VjPUlp7bHyJ5CuHUFkwg3CmKI3pdw/Wej6D4ml5huATl.', '0774186855', '123 doan van bo p5 q10', NULL, '2020-06-03 19:13:22', '2020-06-03 19:13:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
