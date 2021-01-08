-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 08 Oca 2021, 11:05:46
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `serial_number` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `price` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `rank` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `title`, `serial_number`, `product_category`, `product_brand`, `price`, `rank`) VALUES
(5, 'kasa-45', 'ks127788', 2, 2, '78 tl', 0),
(2, 'raf-1', 'rf7711', 4, 1, '7.4 tl', 2),
(3, 'disk', 'ds0124', 1, 1, '18 tl', 3),
(4, 'kapak-01', 'kk43258', 1, 2, '0.5 tl', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_brand`
--

DROP TABLE IF EXISTS `product_brand`;
CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_brand`
--

INSERT INTO `product_brand` (`id`, `title`, `rank`, `isActive`) VALUES
(1, 'arçelik', 0, 1),
(2, 'beko', 0, 1),
(3, 'vestel', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rank` tinyint(4) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_category`
--

INSERT INTO `product_category` (`id`, `title`, `rank`, `isActive`) VALUES
(1, 'plastik', 0, 1),
(2, 'plastik-enjeksiyon', 2, 1),
(4, 'metal-pres', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `prod_image`
--

DROP TABLE IF EXISTS `prod_image`;
CREATE TABLE IF NOT EXISTS `prod_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `prod_image`
--

INSERT INTO `prod_image` (`id`, `img_id`, `product_id`, `rank`) VALUES
(3, 'a3c361d984b99e2922bcefcf5919d703.jpg', 4, 0),
(4, '0198e1db1c3706c8531288bca15cc215.jpg', 2, 0),
(5, '7b51b56b53fad30a5f6a7ece27c7bac6.jpg', 5, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `fullname` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `isActive`) VALUES
(1, 'aa@gmail.com', '123456', 'muhammed gunay', 1),
(2, 'bb@gmail.com', '123456', 'Ali yıldız', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
