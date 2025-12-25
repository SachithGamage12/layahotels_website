-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.38 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for layaleisure
CREATE DATABASE IF NOT EXISTS `layaleisure` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `layaleisure`;

-- Dumping structure for table layaleisure.beachbookings
CREATE TABLE IF NOT EXISTS `beachbookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mobile_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `email_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `booking_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachbookings: ~0 rows (approximately)
INSERT INTO `beachbookings` (`id`, `first_name`, `last_name`, `mobile_number`, `checkin_date`, `checkout_date`, `email_address`, `selected_rooms_html`, `created_at`, `booking_status`) VALUES
	(1, 'Sachith', 'Gamage', '+94725876139', '2024-12-16', '2024-12-17', 'udarasachith41@gmail.com', '\r\n            <div class="selected-room">\r\n                <strong>Room No1</strong><br>\r\n                Category: Deluxe-Single<br>\r\n                Basis: bed-and-breakfast<br>\r\n                Guests: 1<br><br>\r\n            </div>\r\n        ', NULL, 'Pending'),
	(2, 'Sachith', 'Gamage', '+94725876139', '2024-12-16', '2024-12-17', 'udarasachith41@gmail.com', '\r\n            <div class="selected-room">\r\n                <strong>Room No1</strong><br>\r\n                Category: Deluxe-Single<br>\r\n                Basis: bed-and-breakfast<br>\r\n                Guests: 1<br><br>\r\n            </div>\r\n        ', NULL, 'Pending');

-- Dumping structure for table layaleisure.beachbookings_archive
CREATE TABLE IF NOT EXISTS `beachbookings_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `booking_status` enum('Pending','Confirmed','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachbookings_archive: ~0 rows (approximately)

-- Dumping structure for table layaleisure.beachgallery
CREATE TABLE IF NOT EXISTS `beachgallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachgallery: ~9 rows (approximately)
INSERT INTO `beachgallery` (`id`, `image_url`) VALUES
	(1, 'img/3.jpeg'),
	(2, 'img/4.jpeg'),
	(3, 'img/6.jpg'),
	(4, 'img/7.jpg'),
	(5, 'img/8.jpg'),
	(6, 'img/10.jpeg'),
	(7, 'img/11.JPG'),
	(8, 'img/9.jpeg'),
	(9, 'img/12.jpeg');

-- Dumping structure for table layaleisure.beachpromo
CREATE TABLE IF NOT EXISTS `beachpromo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachpromo: ~8 rows (approximately)
INSERT INTO `beachpromo` (`id`, `image_url`) VALUES
	(1, 'img\\promo\\1.jpg'),
	(2, 'img\\promo\\2.jpg'),
	(3, 'img\\promo\\3.jpg'),
	(4, 'img\\promo\\4.jpg'),
	(5, 'img\\promo\\1.jpg'),
	(6, 'img\\promo\\2.jpg'),
	(7, 'img\\promo\\3.jpg'),
	(8, 'img\\promo\\4.jpg');

-- Dumping structure for table layaleisure.beachroomprices
CREATE TABLE IF NOT EXISTS `beachroomprices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `basis_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weekday` decimal(10,2) NOT NULL,
  `weekend` decimal(10,2) NOT NULL,
  `holiday` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachroomprices: ~9 rows (approximately)
INSERT INTO `beachroomprices` (`id`, `room_type`, `basis_type`, `weekday`, `weekend`, `holiday`) VALUES
	(1, 'Deluxe-Single', 'bb', 15400.00, 16500.00, 16500.00),
	(2, 'Deluxe-Single', 'hb', 17550.00, 18800.00, 18800.00),
	(3, 'Deluxe-Single', 'fb', 19800.00, 21250.00, 21250.00),
	(4, 'Deluxe-Double', 'bb', 18200.00, 19500.00, 19500.00),
	(5, 'Deluxe-Double', 'hb', 20650.00, 22150.00, 22150.00),
	(6, 'Deluxe-Double', 'fb', 24500.00, 26250.00, 26250.00),
	(7, 'Deluxe-Triple', 'bb', 20850.00, 22350.00, 22350.00),
	(8, 'Deluxe-Triple', 'hb', 26100.00, 27950.00, 27950.00),
	(9, 'Deluxe-Triple', 'fb', 30950.00, 33150.00, 33150.00);

-- Dumping structure for table layaleisure.beachrooms
CREATE TABLE IF NOT EXISTS `beachrooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachrooms: ~6 rows (approximately)
INSERT INTO `beachrooms` (`id`, `title`, `description`, `image`) VALUES
	(1, 'Deluxe SGL Room', 'Experience luxury in our Deluxe Single Room. Perfect for solo travelers, this room offers a comfortable and spacious environment with modern amenities. Enjoy a restful night\'s sleep in a cozy bed and wake up refreshed for the day ahead.', 'uploads/sgl.jpeg'),
	(2, 'Deluxe DBL Room', 'Indulge in luxury with our Deluxe Double Room. Ideal for couples or those seeking extra space, this room offers a serene ambiance and modern comforts for a relaxing stay. Unwind in the comfort of a plush double bed and enjoy your stay with well-appointed amenities.', 'img/dbl.jpeg'),
	(3, 'Deluxe TPL Room', 'Experience luxury in our Deluxe Single Room. Perfect for solo travelers, this room offers a comfortable and spacious environment with modern amenities. Enjoy a restful night\'s sleep in a cozy bed and wake up refreshed for the day ahead.', 'img/tpl.jpeg'),
	(4, 'Deluxe SGL Room (TWIN)', 'Experience unparalleled comfort and luxury in our Deluxe TWIN SGL room.our TWIN SGL room offers the ultimate blend of relaxation and sophistication. Indulge in the plush bedding and modern amenities, ensuring a restful night\'s sleep and a rejuvenating stay.', 'img/sgl.jpeg'),
	(5, 'Deluxe DBL Room (TWIN)', 'Ideal for couples or small families, this spacious room offers the perfect blend of comfort and style. Enjoy the flexibility of twin beds, providing the utmost relaxation for a restful night\'s sleep,With modern amenities and thoughtful touches.', 'img/d.jpeg'),
	(6, 'Deluxe TPL Room (TWIN)', 'Designed for small families, this spacious accommodation offers the perfect blend of convenience and relaxation. Featuring twin beds and an additional pull-out bed, our TWIN TPL room ensures everyone enjoys a peaceful night\'s sleep. With modern amenities.', 'img/t.jpeg');

-- Dumping structure for table layaleisure.beachservices
CREATE TABLE IF NOT EXISTS `beachservices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.beachservices: ~6 rows (approximately)
INSERT INTO `beachservices` (`id`, `image_url`, `description`) VALUES
	(1, 'img/1.jpg', 'swimming pool'),
	(2, 'img/11.JPG', 'indoor dining'),
	(3, 'img/10.jpeg', 'Banquet Hall'),
	(4, 'img/12.jpeg', 'seafood restaurant & Bar'),
	(5, 'img/13.jpg', 'Beach'),
	(6, 'img/2.jpeg', 'Parking');

-- Dumping structure for table layaleisure.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `civil_army_selection` enum('civil','army') NOT NULL,
  `selected_rooms_html` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` varchar(255) DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.bookings: ~0 rows (approximately)

-- Dumping structure for table layaleisure.gallery_images
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.gallery_images: ~17 rows (approximately)
INSERT INTO `gallery_images` (`id`, `image_url`) VALUES
	(2, 'layaleisureimages/2.jpg'),
	(3, 'layaleisureimages/3.jpg'),
	(4, 'layaleisureimages/4.jpg'),
	(5, 'layaleisureimages/5.jpg'),
	(6, 'layaleisureimages/6.jpg'),
	(7, 'layaleisureimages/7.jpg'),
	(8, 'layaleisureimages/8.jpg'),
	(9, 'layaleisureimages/9.jpg'),
	(10, 'layaleisureimages/10.jpg'),
	(11, 'layaleisureimages/11.jpg'),
	(12, 'layaleisureimages/12.jpg'),
	(13, 'layaleisureimages/13.jpg'),
	(14, 'layaleisureimages/14.jpg'),
	(15, 'layaleisureimages/15.jpg'),
	(16, 'layaleisureimages/16.jpg'),
	(17, 'layaleisureimages/18.jpg'),
	(23, 'layaleisureimages/1.jpg');

-- Dumping structure for table layaleisure.leisurebookings_archive
CREATE TABLE IF NOT EXISTS `leisurebookings_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `booking_status` enum('Pending','Confirmed','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.leisurebookings_archive: ~0 rows (approximately)

-- Dumping structure for table layaleisure.leisurevideos
CREATE TABLE IF NOT EXISTS `leisurevideos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.leisurevideos: ~2 rows (approximately)
INSERT INTO `leisurevideos` (`id`, `video_name`, `video_path`) VALUES
	(1, 'leisure', 'layaleisureimages/laya leisure.mp4'),
	(2, 'sea.mp4', 'uploads/sea.mp4'),
	(3, 'laya leisure.mp4', 'uploads/laya leisure.mp4');

-- Dumping structure for table layaleisure.promo_images
CREATE TABLE IF NOT EXISTS `promo_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.promo_images: ~8 rows (approximately)
INSERT INTO `promo_images` (`id`, `image_url`) VALUES
	(1, 'layaleisureimages/pomo/1.jpeg'),
	(2, 'layaleisureimages/pomo/2.jpeg'),
	(3, 'layaleisureimages/pomo/3.jpeg'),
	(4, 'layaleisureimages/pomo/4.jpeg'),
	(5, 'layaleisureimages/pomo/5.jpeg'),
	(6, 'layaleisureimages/pomo/6.jpeg'),
	(7, 'layaleisureimages/pomo/7.jpeg'),
	(8, 'layaleisureimages/pomo/8.jpeg');

-- Dumping structure for table layaleisure.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.rooms: ~6 rows (approximately)
INSERT INTO `rooms` (`id`, `title`, `description`, `image`) VALUES
	(14, 'Deluxe Single Room Apartment', 'Experience comfort and style in our Deluxe Single Room Apartment, featuring a spacious layout, modern amenities, and elegant décor. Perfect for solo travelers or couples seeking a cozy retreat with stunning views.', 'layaleisureimages\\single.jpg'),
	(15, 'Deluxe Double Room Apartment', 'Experience luxury and comfort in our Deluxe Double Room Apartment, perfect for up to 4 guests. Enjoy modern amenities, elegant décor, and stunning views, ensuring a memorable stay for families or small groups.', 'layaleisureimages\\Dbl\\2.jpg'),
	(16, 'Deluxe Triple Room Apartment', 'Experience luxury and comfort in our Deluxe Triple Room Apartment, perfect for up to 6 guests. Enjoy modern amenities, elegant décor, and stunning views, ensuring a memorable stay for families or groups.', 'layaleisureimages\\Tpl\\5.jpg'),
	(17, 'Deluxe Single Room Apartment', 'Experience comfort and style in our Deluxe Single Room Apartment, featuring a spacious layout, modern amenities, and elegant décor. Perfect for solo travelers or couples seeking a cozy retreat with stunning views.', 'layaleisureimages\\single.jpg'),
	(18, 'Deluxe Double Room Apartment', 'Experience luxury and comfort in our Deluxe Double Room Apartment, perfect for up to 4 guests. Enjoy modern amenities, elegant décor, and stunning views, ensuring a memorable stay for families or small groups.', 'layaleisureimages\\Dbl\\2.jpg'),
	(19, 'Deluxe Triple Room Apartment', 'Experience luxury and comfort in our Deluxe Triple Room Apartment, perfect for up to 6 guests. Enjoy modern amenities, elegant décor, and stunning views, ensuring a memorable stay for families or groups.', 'layaleisureimages\\Tpl\\5.jpg');

-- Dumping structure for table layaleisure.room_prices
CREATE TABLE IF NOT EXISTS `room_prices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) NOT NULL,
  `basis_type` varchar(50) NOT NULL,
  `weekday` decimal(10,2) NOT NULL,
  `weekend` decimal(10,2) NOT NULL,
  `holiday` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.room_prices: ~9 rows (approximately)
INSERT INTO `room_prices` (`id`, `room_type`, `basis_type`, `weekday`, `weekend`, `holiday`) VALUES
	(4, 'deluxe_single', 'bb', 16250.00, 17300.00, 17300.00),
	(5, 'deluxe_single', 'hb', 21000.00, 22500.00, 22500.00),
	(6, 'deluxe_single', 'fb', 25750.00, 27500.00, 27500.00),
	(10, 'deluxe_double', 'bb', 25750.00, 27500.00, 27500.00),
	(11, 'deluxe_double', 'hb', 35500.00, 38000.00, 38000.00),
	(12, 'deluxe_double', 'fb', 45000.00, 48000.00, 48000.00),
	(16, 'deluxe_triple', 'bb', 37000.00, 39500.00, 39500.00),
	(17, 'deluxe_triple', 'hb', 51500.00, 55000.00, 55000.00),
	(18, 'deluxe_triple', 'fb', 65500.00, 70000.00, 70000.00);

-- Dumping structure for table layaleisure.safaribookings
CREATE TABLE IF NOT EXISTS `safaribookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mobile_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `email_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `booking_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safaribookings: ~0 rows (approximately)

-- Dumping structure for table layaleisure.safaribooking_archive
CREATE TABLE IF NOT EXISTS `safaribooking_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `booking_status` enum('Pending','Confirmed','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safaribooking_archive: ~0 rows (approximately)

-- Dumping structure for table layaleisure.safarigallery
CREATE TABLE IF NOT EXISTS `safarigallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safarigallery: ~8 rows (approximately)
INSERT INTO `safarigallery` (`id`, `image_url`) VALUES
	(1, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.55 (1).jpeg'),
	(2, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.55.jpeg'),
	(3, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.56 (1).jpeg'),
	(4, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.57 (1).jpeg'),
	(5, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.58.jpeg'),
	(6, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.02.52.jpeg'),
	(7, 'layasafariimages\\WhatsApp Image 2024-07-05 at 09.07.11 (1).jpeg'),
	(8, 'layasafariimages\\WhatsApp Image 2024-06-27 at 14.00.54.jpeg');

-- Dumping structure for table layaleisure.safaripromo
CREATE TABLE IF NOT EXISTS `safaripromo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safaripromo: ~8 rows (approximately)
INSERT INTO `safaripromo` (`id`, `image_url`) VALUES
	(2, 'layasafariimages/promo/allinclusive.jpg'),
	(3, 'layasafariimages/promo/couple_dayout.jpg'),
	(4, 'layasafariimages/promo/laya_safari_banner.jpg'),
	(5, 'layasafariimages/promo/regular_Guest.jpg'),
	(6, 'layasafariimages/promo/allinclusive.jpg'),
	(7, 'layasafariimages/promo/couple_dayout.jpg'),
	(8, 'layasafariimages/promo/laya_safari_banner.jpg'),
	(9, 'layasafariimages/promo/regular_Guest.jpg');

-- Dumping structure for table layaleisure.safariroomprices
CREATE TABLE IF NOT EXISTS `safariroomprices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `basis_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weekday` decimal(10,2) NOT NULL,
  `weekend` decimal(10,2) NOT NULL,
  `holiday` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safariroomprices: ~18 rows (approximately)
INSERT INTO `safariroomprices` (`id`, `room_type`, `basis_type`, `weekday`, `weekend`, `holiday`) VALUES
	(1, 'deluxe sgl', 'bb', 35000.00, 35000.00, 35000.00),
	(2, 'deluxe sgl', 'hb', 38500.00, 38500.00, 38500.00),
	(3, 'deluxe sgl', 'fb', 41500.00, 41500.00, 41500.00),
	(4, 'deluxe dbl', 'bb', 38500.00, 38500.00, 38500.00),
	(5, 'deluxe dbl', 'hb', 43500.00, 43500.00, 43500.00),
	(6, 'deluxe dbl', 'fb', 49500.00, 49500.00, 49500.00),
	(7, 'deluxe tpl', 'bb', 41000.00, 41000.00, 41000.00),
	(8, 'deluxe tpl', 'hb', 49000.00, 49000.00, 49000.00),
	(9, 'deluxe tpl', 'fb', 57500.00, 57500.00, 57500.00),
	(10, 'jungle sgl', 'bb', 35000.00, 35000.00, 35000.00),
	(11, 'jungle sgl', 'hb', 38500.00, 38500.00, 38500.00),
	(12, 'jungle sgl', 'fb', 41500.00, 41500.00, 41500.00),
	(13, 'jungle dbl', 'bb', 38500.00, 38500.00, 38500.00),
	(14, 'jungle dbl', 'hb', 43500.00, 43500.00, 43500.00),
	(15, 'jungle dbl', 'fb', 49500.00, 49500.00, 49500.00),
	(16, 'jungle tpl', 'bb', 41000.00, 41000.00, 41000.00),
	(17, 'jungle tpl', 'hb', 49000.00, 49000.00, 49000.00),
	(18, 'jungle tpl', 'fb', 57500.00, 57500.00, 57500.00);

-- Dumping structure for table layaleisure.safarirooms
CREATE TABLE IF NOT EXISTS `safarirooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safarirooms: ~6 rows (approximately)
INSERT INTO `safarirooms` (`id`, `title`, `description`, `image`) VALUES
	(1, 'Deluxe Sea view', 'With a breathtaking view of the azure sea, our deluxe sea view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.\n\n', 'layasafariimages\\seaview.JPG'),
	(2, 'Jungle Villa', 'With a captivating view of the lush jungle, our jungle view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.\n\n', 'layasafariimages\\jungleview.jpg'),
	(3, 'Deluxe Sea View', 'With a breathtaking view of the azure sea, our deluxe sea view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.', 'layasafariimages\\seaview.JPG'),
	(4, 'Jungle Villa', 'With a captivating view of the lush jungle, our jungle view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.', 'uploads/jungleview.jpg'),
	(5, 'Deluxe Sea View', 'With a breathtaking view of the azure sea, our deluxe sea view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.', 'layasafariimages\\seaview.JPG'),
	(6, 'Jungle Villa', 'With a captivating view of the lush jungle, our jungle view rooms are adorned with luxurious finishes and equipped with every modern convenience to ensure your utmost comfort and relaxation.', 'layasafariimages\\jungleview.jpg');

-- Dumping structure for table layaleisure.safariservices
CREATE TABLE IF NOT EXISTS `safariservices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safariservices: ~3 rows (approximately)
INSERT INTO `safariservices` (`id`, `image_url`, `description`) VALUES
	(3, 'layasafariimages/WhatsApp Image 2024-06-27 at 14.00.54.jpeg', 'Swimming Pool'),
	(4, 'layasafariimages/WhatsApp Image 2024-06-27 at 14.00.57 (1).jpeg', 'Beach Bar'),
	(5, 'layasafariimages/WhatsApp Image 2024-06-27 at 14.02.14.jpeg', 'Swing Bar');

-- Dumping structure for table layaleisure.safarivideos
CREATE TABLE IF NOT EXISTS `safarivideos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.safarivideos: ~2 rows (approximately)
INSERT INTO `safarivideos` (`id`, `video_name`, `video_path`) VALUES
	(1, 'safari.mp4', 'uploads/safari.mp4'),
	(2, 'sea.mp4', 'uploads/sea.mp4'),
	(3, 'safari.mp4', 'uploads/safari.mp4');

-- Dumping structure for table layaleisure.saved_bookings
CREATE TABLE IF NOT EXISTS `saved_bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.saved_bookings: ~0 rows (approximately)
INSERT INTO `saved_bookings` (`id`, `booking_name`, `created_at`) VALUES
	(1, 'july', '2024-07-16 17:26:19');

-- Dumping structure for table layaleisure.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.services: ~12 rows (approximately)
INSERT INTO `services` (`id`, `image_url`, `description`) VALUES
	(1, 'layaleisureimages/pool.jpg', 'Pool'),
	(2, 'layaleisureimages/dining.jpg', 'Indoor Dining'),
	(3, 'layaleisureimages/spa.jpg', 'Spa'),
	(4, 'layaleisureimages/gym.jpg', 'Gymnasium'),
	(5, 'layaleisureimages/pooltable.jpg', 'Pool Table'),
	(6, 'layaleisureimages/bkeriding.jpg', 'Mountain Biking'),
	(7, 'layaleisureimages/archarey.jpg', 'Archery'),
	(8, 'layaleisureimages/airrifle.jpg', 'Air Rifle Shooting'),
	(9, 'layaleisureimages/bar.jpg', 'Bar Area'),
	(10, 'layaleisureimages/tennis.JPG', 'Tennis Court'),
	(11, 'layaleisureimages/pony.jpg', 'Pony Rides'),
	(12, 'layaleisureimages/adventure.jpg', 'Adventure');

-- Dumping structure for table layaleisure.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.users: ~0 rows (approximately)

-- Dumping structure for table layaleisure.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.videos: ~8 rows (approximately)
INSERT INTO `videos` (`id`, `video_name`, `video_path`) VALUES
	(1, 'beach', 'hotel.mp4'),
	(6, 'hotel.mp4', 'uploads/hotel.mp4'),
	(7, 'sea.mp4', 'uploads/sea.mp4'),
	(8, 'hotel.mp4', 'uploads/hotel.mp4'),
	(9, 'sea.mp4', 'uploads/sea.mp4'),
	(10, 'hotel.mp4', 'uploads/hotel.mp4'),
	(11, 'sea.mp4', 'uploads/sea.mp4'),
	(12, 'hotel.mp4', 'uploads/hotel.mp4');

-- Dumping structure for table layaleisure.wavesbookings
CREATE TABLE IF NOT EXISTS `wavesbookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mobile_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `email_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `selected_rooms_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `booking_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesbookings: ~0 rows (approximately)

-- Dumping structure for table layaleisure.wavesbooking_archive
CREATE TABLE IF NOT EXISTS `wavesbooking_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `selected_rooms_html` text NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `booking_status` enum('Pending','Confirmed','Cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesbooking_archive: ~0 rows (approximately)

-- Dumping structure for table layaleisure.wavesgallery
CREATE TABLE IF NOT EXISTS `wavesgallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesgallery: ~16 rows (approximately)
INSERT INTO `wavesgallery` (`id`, `image_url`) VALUES
	(1, 'layawavesimages/1.jpg'),
	(2, 'layawavesimages/2.jpg'),
	(3, 'layawavesimages/3.jpg'),
	(4, 'layawavesimages/4.jpg'),
	(5, 'layawavesimages/5.jpeg'),
	(6, 'layawavesimages/6.jpg'),
	(7, 'layawavesimages/7.jpg'),
	(8, 'layawavesimages/8.jpg'),
	(9, 'layawavesimages/9.jpg'),
	(10, 'layawavesimages/10.jpg'),
	(11, 'layawavesimages/11.jpg'),
	(12, 'layawavesimages/13.jpg'),
	(13, 'layawavesimages/14.jpg'),
	(14, 'layawavesimages/15.jpg'),
	(15, 'layawavesimages/16.jpg'),
	(16, 'layawavesimages/12.jpeg');

-- Dumping structure for table layaleisure.wavespromo
CREATE TABLE IF NOT EXISTS `wavespromo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavespromo: ~8 rows (approximately)
INSERT INTO `wavespromo` (`id`, `image_url`) VALUES
	(1, 'layawavesimages/promo/1.jpeg'),
	(2, 'layawavesimages/promo/2.jpeg'),
	(3, 'layawavesimages/promo/3.jpeg'),
	(4, 'layawavesimages/promo/4.jpeg'),
	(5, 'layawavesimages/promo/1.jpeg'),
	(6, 'layawavesimages/promo/2.jpeg'),
	(7, 'layawavesimages/promo/3.jpeg'),
	(8, 'layawavesimages/promo/4.jpeg');

-- Dumping structure for table layaleisure.wavesroomprices
CREATE TABLE IF NOT EXISTS `wavesroomprices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `basis_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weekday` decimal(10,2) NOT NULL,
  `weekend` decimal(10,2) NOT NULL,
  `holiday` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesroomprices: ~9 rows (approximately)
INSERT INTO `wavesroomprices` (`id`, `room_type`, `basis_type`, `weekday`, `weekend`, `holiday`) VALUES
	(4, 'deluxe', 'bb', 20000.00, 20000.00, 20000.00),
	(5, 'deluxe', 'hb', 22000.00, 22000.00, 22000.00),
	(6, 'deluxe', 'fb', 26000.00, 26000.00, 26000.00),
	(10, 'family', 'bb', 44000.00, 44000.00, 44000.00),
	(11, 'family', 'hb', 48000.00, 48000.00, 48000.00),
	(12, 'family', 'fb', 56000.00, 56000.00, 56000.00),
	(16, 'suite', 'bb', 72000.00, 72000.00, 72000.00),
	(17, 'suite', 'hb', 78000.00, 78000.00, 78000.00),
	(18, 'suite', 'fb', 90000.00, 90000.00, 90000.00);

-- Dumping structure for table layaleisure.wavesrooms
CREATE TABLE IF NOT EXISTS `wavesrooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesrooms: ~6 rows (approximately)
INSERT INTO `wavesrooms` (`id`, `title`, `description`, `image`) VALUES
	(1, 'Suite Rooms', 'With a commanding view of the pristine east coast, the suites are complete with fine trimmings, elegant décor, and every amenity necessary to keep you comfortable and relaxed.', 'uploads/suite.jpg'),
	(2, 'Deluxe Rooms', 'Each room offers a stunning view of the Indian Ocean and changing sky. Inside, you\'re welcomed by a warm ambiance and comfortable upholstery, creating a perfect retreat.', 'layawavesimages\\deluxe.jpg'),
	(3, 'Family Rooms', 'Traveling with family? We have special accommodation just for you, with spacious two level rooms where the attic contains two extra beds and can even make room for a third.', 'layawavesimages\\family.jpg'),
	(4, 'Suite Rooms', 'With a commanding view of the pristine east coast, the suites are complete with fine trimmings, elegant décor, and every amenity necessary to keep you comfortable and relaxed.', 'layawavesimages\\suite.jpg'),
	(5, 'Deluxe Rooms', 'Each room offers a stunning view of the Indian Ocean and changing sky. Inside, you\'re welcomed by a warm ambiance and comfortable upholstery, creating a perfect retreat.', 'layawavesimages\\deluxe.jpg'),
	(6, 'Family Rooms', 'Traveling with family? We have special accommodation just for you, with spacious two level rooms where the attic contains two extra beds and can even make room for a third.', 'layawavesimages\\family.jpg');

-- Dumping structure for table layaleisure.wavesservices
CREATE TABLE IF NOT EXISTS `wavesservices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesservices: ~6 rows (approximately)
INSERT INTO `wavesservices` (`id`, `image_url`, `description`) VALUES
	(1, 'layawavesimages/pool.jpg', 'swimming pool'),
	(2, 'layawavesimages/Restaurant.jpg', 'indoor dining'),
	(3, 'layawavesimages/bar.jpg', 'Bar'),
	(4, 'layawavesimages/spa.webp', 'Ayurvedic spa'),
	(5, 'layawavesimages/beach.jpg', 'Beach'),
	(6, 'layawavesimages/sun.jpg', 'Sun Beds');

-- Dumping structure for table layaleisure.wavesvideos
CREATE TABLE IF NOT EXISTS `wavesvideos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.wavesvideos: ~2 rows (approximately)
INSERT INTO `wavesvideos` (`id`, `video_name`, `video_path`) VALUES
	(1, 'sea.mp4', 'uploads/sea.mp4'),
	(2, 'laya waves.mp4', 'uploads/laya waves.mp4');

-- Dumping structure for table layaleisure.workers
CREATE TABLE IF NOT EXISTS `workers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table layaleisure.workers: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
