-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Şub 2024, 12:36:48
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `karavan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(250) NOT NULL,
  `about_content` text NOT NULL,
  `about_image` varchar(250) NOT NULL,
  `about_image_alt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_title`, `about_content`, `about_image`, `about_image_alt`) VALUES
(0, '\"ULUSLARARASI STANDARTLARDA\"', '<p style=\"text-align:justify;\"><i>\"<strong>Projelerinizi tüm detayları ile teslim ediyoruz.</strong>\"</i></p><p style=\"text-align:justify;\">ELMA KARAVAN &amp; TİNYHOUSE, 2019 yılında 60m² bir tesiste başladığı serüvende bugün, 1200 m² faal kapalı alana sahip, toplam 20’ den fazla çalışanı, bugün Türkiye\' nin tamamına <strong>karavan</strong> ve <strong>tinyhouse</strong> sektörünün öncülerinden biri olarak hizmet vermektedir.</p><p style=\"text-align:justify;\"><strong>İnovasyon ve Ar-Ge’ye verdiği önem,</strong></p><p style=\"text-align:justify;\"><strong>Modern, teknolojik ve doğaya zarar vermeyen üretim tesisleri,</strong></p><p style=\"text-align:justify;\"><strong>Kurum içi eğitim, özlük haklarında titizlik, “doğru işe doğru insan” ve sosyal sorumluluk bilincini de içine alan kapsamlı İK Politikaları,</strong></p><p style=\"text-align:justify;\"><strong>Gelişime ve sürekli iyileştirmeye açık kalite anlayışı,</strong></p><p style=\"text-align:justify;\"><strong>Çevre dostu ürünleri,</strong></p><p style=\"text-align:justify;\"><strong>Koşulsuz müşteri destek hizmeti ve yetkili servisleri ile hayata geçirdiği gerçek müşteri memnuniyeti bütününde çalışmalarını sürdürür.</strong></p><p style=\"text-align:justify;\">Ayrıca ELMA KARAVAN, etkin ve çözüm odaklı çevre politikaları, zorunluluktan öte “sorumluluk” olarak gördüğü sosyal projeler ile ülkemizin ve dünyamızın geleceğine dair bir duyarlılık oluşturmak ve bu duyarlılığı mümkün olduğunca daha geniş çevrelere yaymak konusunda da adından söz ettirmektedir.</p>', 'hakkimizda-foto-aciklama_2023-12-18_110447.jpg', 'Karavan Tinyhouse');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activation_codes`
--

CREATE TABLE `activation_codes` (
  `code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activation_code` text NOT NULL,
  `code_type` enum('Register','Change Password') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `account_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_iban` varchar(30) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_branch_code` int(11) DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `currency_type` enum('TRY','USD','EUR') NOT NULL,
  `account_enabled` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cart_approval` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_items`
--

CREATE TABLE `gallery_items` (
  `item_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `k_categories`
--

CREATE TABLE `k_categories` (
  `k_category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(250) NOT NULL,
  `category_type` enum('tinyhouse','tinyticari','karavan','romork','marin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `k_products`
--

CREATE TABLE `k_products` (
  `k_product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_short_description` varchar(500) NOT NULL,
  `product_description` text NOT NULL,
  `product_properties` text NOT NULL,
  `product_url` varchar(255) NOT NULL,
  `product_link` varchar(255) NOT NULL,
  `detail_pdf` varchar(255) DEFAULT NULL,
  `main_photo_id` int(11) DEFAULT NULL,
  `k_category_id` int(11) NOT NULL,
  `product_featured` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `k_product_photos`
--

CREATE TABLE `k_product_photos` (
  `k_photo_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `k_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `magaza_sliders`
--

CREATE TABLE `magaza_sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_path` varchar(255) NOT NULL,
  `slider_url` varchar(255) NOT NULL DEFAULT '''#''',
  `order_priority` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mision_vision`
--

CREATE TABLE `mision_vision` (
  `mv_id` int(11) NOT NULL,
  `mv_image` varchar(255) NOT NULL,
  `mv_title` varchar(150) DEFAULT NULL,
  `mv_content` text NOT NULL,
  `mv_type` enum('mision','vision') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mision_vision`
--

INSERT INTO `mision_vision` (`mv_id`, `mv_image`, `mv_title`, `mv_content`, `mv_type`, `created_at`, `updated_at`) VALUES
(0, 'misyon-vizyon_2024-01-12_142938.jpg', 'Seyahat Tutkusu İçin Destek', '<p><strong>MİSYONUMUZ;</strong></p><p style=\"text-align:justify;\">Uzman kadromuzla doğru, güvenilir ve etik değerlere uygun, çözüm odaklı Karavan ve Tinyhouse üretimi hizmeti vermektir. <strong>Kalite</strong>yi bir yaşam biçimi olarak benimseyen, doğruluk ve <strong>güven</strong>i en önemli değerleri olarak koruyan ELMA Karavan &amp; Tinyhouse kuruluşundan bu yana \"insana saygı\" ya dayanan yönetim anlayışı ile taahhüt ederek yürüttüğü karavan, tinyhouse, taşıyıcı römork sistemleri ve <strong>marin</strong> ekipmanlarının üreim, bakım ve nakliye işleri ile sektörün saygın şirketleri arasında adını farklı bir konuma yerleştirmiştir.</p><p style=\"text-align:justify;\">ELMA Karavan &amp; <strong>Tinyhouse</strong>\' da istihdamdan işletmeye kadar her şey vizyon ve değerler tarafından tanımlanır. <strong>Yaratıcı</strong>lığa, verimliliğe ve katılımcılığa bağlı bir kurum kültürü oluşturarak iş ortaklarımız, çalışanlarımız ve ülkemiz için <strong>fırsat</strong>ları başarıya dönüştürmek, beklentilerin üzerinde ürün ve hizmet çözümleri ile artan sayıda sadık müşteriler <strong>yarat</strong>mak ve müşterilerimize güveni hissettirmektir.</p>', 'mision', '2023-11-14 13:34:36', '2024-01-12 11:31:41'),
(1, 'misyon-vizyon_2023-12-18_103337.jpg', 'Öncü Karavan Deneyimi', '<p><strong>VİZYONUMUZ;</strong></p><p>Müşterilerimizin beklentilerini <strong>istikrar</strong>lı kalite anlayışı ile karşılayarak değer <strong>yarat</strong>mayı esas alan yapımız müşteri odaklı çalışma <strong>strateji</strong>miz ve rekabetçi büyüme potansiyelimiz ile \"en iyi\" şekilde değerleri yönetmek. <strong>Mühendis</strong>lik ve yönetim bilimlerindeki en son teknolojik olanakları kullanılarak daima yüksek kalite sağlayan Elma Karavan &amp; Tinyhouse standartları uluslararası kabul görmüş <strong>kalite</strong> standartlarına dayanmaktadır. Müşteri memnuniyetini ön planda tutmak ve mükemmelleşme anlayışını esas alarak, insana, doğaya, <strong>çevre</strong>ye ve topluma saygılı olarak sürdürmek, üstün nitelikli yapı anlayışını, <strong>kusursuz</strong> altyapı sistemleriyle birleştirme hedefini&nbsp;taşımaktadır.</p>', 'vision', '2023-12-18 08:23:51', '2024-01-12 11:34:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_tracking_number` varchar(50) DEFAULT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Payment Status',
  `order_status` enum('Onay Bekliyor','Hazırlanıyor','Kargoda','Teslim Edildi','İptal Edildi') NOT NULL DEFAULT 'Onay Bekliyor' COMMENT 'Order Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_shipping_info`
--

CREATE TABLE `order_shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `recipient_name` varchar(100) NOT NULL,
  `recipient_surname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_city` varchar(50) NOT NULL,
  `recipient_district` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `shipping_type` enum('Ürün','Fatura') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `our_brands`
--

CREATE TABLE `our_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `our_documents`
--

CREATE TABLE `our_documents` (
  `document_id` int(11) NOT NULL,
  `document_title` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `discount_rate` decimal(5,2) NOT NULL DEFAULT 0.00,
  `discounted_price` decimal(10,2) NOT NULL,
  `product_description` text NOT NULL,
  `product_detail` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_featured` enum('0','1') NOT NULL DEFAULT '0',
  `product_promotion` enum('0','1') NOT NULL DEFAULT '0',
  `product_status` enum('0','1') NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `main_photo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_photos`
--

CREATE TABLE `product_photos` (
  `photo_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_admin`
--

CREATE TABLE `site_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_admin`
--

INSERT INTO `site_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(0, 'admin', '$2y$10$W6792yH.Usx8B5GoMXiJ6ehvrMh51V6UKRwl59XwC5qrVdGeNW.2K');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_contact_information`
--

CREATE TABLE `site_contact_information` (
  `site_id` int(11) NOT NULL,
  `site_contact_text` varchar(500) NOT NULL,
  `site_city` varchar(250) NOT NULL,
  `site_district` varchar(250) NOT NULL,
  `site_address` varchar(250) NOT NULL,
  `site_maps` text NOT NULL,
  `site_tel` varchar(250) NOT NULL,
  `site_whatsapp` varchar(250) NOT NULL,
  `site_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_contact_information`
--

INSERT INTO `site_contact_information` (`site_id`, `site_contact_text`, `site_city`, `site_district`, `site_address`, `site_maps`, `site_tel`, `site_whatsapp`, `site_email`) VALUES
(0, 'Bize Ulaşabilirsiniz', 'Kocaeli', 'İzmit', 'Erenler Mah. Erenler Cedit Sitesi Erenler Mah. Erenler Cedit Sitesi', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.239888522251!2d29.937042076520264!3d40.778740033526404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cb4f977eeba6f7%3A0xa122d1b5de23c58f!2sErenler%20Cedit%20Konutlar%C4%B1!5e0!3m2!1str!2str!4v1704637739956!5m2!1str!2str', '+90 532 528 02 45', '+90 532 528 02 45', 'info@elmakaravan.com.tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_email`
--

CREATE TABLE `site_email` (
  `site_id` int(11) NOT NULL,
  `site_smtpEmail` varchar(250) NOT NULL,
  `site_smtpHost` varchar(50) NOT NULL,
  `site_smtpUser` varchar(50) NOT NULL,
  `site_smtpPassword` varchar(50) NOT NULL,
  `site_smtpPort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_email`
--

INSERT INTO `site_email` (`site_id`, `site_smtpEmail`, `site_smtpHost`, `site_smtpUser`, `site_smtpPassword`, `site_smtpPort`) VALUES
(0, 'info@elmakaravan.com.tr', 'mail.erdalfidan.site', 'erd980941@erdalfidan.site', 'Erdal.123.', '587');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_settings`
--

CREATE TABLE `site_settings` (
  `site_id` int(11) NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_title` varchar(250) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  `site_description` varchar(250) NOT NULL,
  `site_keywords` varchar(250) NOT NULL,
  `site_author` varchar(250) NOT NULL,
  `site_zopim` varchar(250) NOT NULL,
  `site_maps` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_settings`
--

INSERT INTO `site_settings` (`site_id`, `site_logo`, `site_title`, `site_url`, `site_description`, `site_keywords`, `site_author`, `site_zopim`, `site_maps`) VALUES
(0, '657e2bbf39e53-logo.png', 'Elma Karavan', 'http://localhost/karavan/', 'descriptiopn', 'keyword', 'author', 'zopim', 'maps');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_items`
--

CREATE TABLE `slider_items` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_path` varchar(255) NOT NULL,
  `slider_type` enum('image','video') NOT NULL DEFAULT 'image',
  `order_priority` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider_items`
--

INSERT INTO `slider_items` (`slider_id`, `slider_title`, `slider_path`, `slider_type`, `order_priority`, `created_at`, `updated_at`) VALUES
(22, '\"ULUSLARARASI STANDARTLARDA\" - \"Projelerinizi tüm detayları ile teslim ediyoruz.\"', 'slider_20240111185957.mp4', 'video', 1, '2024-01-11 15:59:57', '2024-01-12 11:44:28'),
(23, 'ELMA KARAVAN & TİNYHOUSE - 2019 yılında 60m² bir tesiste başladığı serüvende bugün, 1200 m² faal kapalı alana sahip, toplam 20’ den fazla çalışanı, bugün Türkiye\' nin tamamına karavan ve tinyhouse sektörünün öncülerinden biri olarak hizmet vermektedir.', 'slider_20240111190053.jpg', 'image', 2, '2024-01-11 16:00:53', '2024-01-12 11:45:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social_media`
--

CREATE TABLE `social_media` (
  `social_media_id` int(11) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `hepsiburada` varchar(250) NOT NULL,
  `n11` varchar(250) NOT NULL,
  `sahibinden` varchar(250) NOT NULL,
  `trendyol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `social_media`
--

INSERT INTO `social_media` (`social_media_id`, `instagram`, `facebook`, `linkedin`, `youtube`, `hepsiburada`, `n11`, `sahibinden`, `trendyol`) VALUES
(0, 'https://www.instagram.com/elma.karavan/', 'https://www.facebook.com/elmakaravan', '', '', 'www.hepsiburada.com/magaza/elma-karavan', 'n11', 'sahibinden', 'https://www.trendyol.com/magaza/elma-karavan-m-874604?sst=0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_phone_number` varchar(20) DEFAULT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '1',
  `email_verified` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_first_name`, `user_last_name`, `user_phone_number`, `user_status`, `email_verified`, `created_at`, `updated_at`) VALUES
(2, 'elif@ornek.com', 'parola456', 'Elif', 'Demir', '5412223344', '1', '0', '2023-11-09 12:25:08', '2023-12-20 15:14:19'),
(3, 'mehmet@ornek.com', 'guvenliSifre', 'Mehmet', 'Aydın', '5423334455', '1', '1', '2023-11-09 12:25:08', '2023-11-10 12:58:40'),
(4, 'ayse@ornek.com', 'gizliParola', 'Ayşe', 'Kaya', '5414445566', '1', '1', '2023-11-09 12:25:08', '2023-11-10 12:58:40'),
(5, 'emre@ornek.com', 'sifre1234', 'Emre', 'Toprak', '5325556677', '1', '1', '2023-11-09 12:25:08', '2023-11-10 12:58:39'),
(6, 'deniz@ornek.com', 'parola12345', 'Deniz', 'Yıldız', '5356667788', '1', '1', '2023-11-09 12:25:08', '2023-11-15 13:11:34'),
(11, 'erdal318@gmail.com', '$2y$10$pHEBreceA/aT0VwM9xcZqOmC/j0r3f2P2YhRKb0NjlwsD9xay7ARi', 'Erdal', 'Fidan', '+90 541 520 44 41', '1', '1', '2023-11-20 08:50:21', '2023-12-28 15:19:05'),
(34, 'kahhramanozan@gmail.com', '$2y$10$VCW9SzWdF229e3fdTiP7tOC5Htt0eu.iRtTF0lx4ZAdQNSPubvfVm', NULL, NULL, NULL, '1', '0', '2024-01-27 10:13:56', '2024-01-27 10:13:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_contact`
--

CREATE TABLE `user_contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_city` varchar(50) DEFAULT NULL,
  `contact_district` varchar(50) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `contact_favorite` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_contact`
--

INSERT INTO `user_contact` (`contact_id`, `user_id`, `contact_title`, `contact_city`, `contact_district`, `contact_address`, `postal_code`, `contact_favorite`, `created_at`, `updated_at`) VALUES
(36, 11, 'er', 'asd', 'asd', 'asd', 113, '0', '2024-01-12 18:19:36', '2024-01-27 10:16:30'),
(37, 11, 'ev adresi', 'asd', 'asd', 'asd', 411356, '1', '2024-01-17 15:00:32', '2024-01-27 10:16:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `why_us`
--

CREATE TABLE `why_us` (
  `why_us_id` int(11) NOT NULL,
  `why_us_title` varchar(255) NOT NULL,
  `why_us_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `why_us`
--

INSERT INTO `why_us` (`why_us_id`, `why_us_title`, `why_us_content`) VALUES
(3, 'Özelleştirilebilir Tasarımlar', 'Her müşterimiz benzersizdir. Karavanlarımızı tamamen özelleştirilebilir olarak tasarlıyor, sizin ihtiyaçlarınız ve istekleriniz doğrultusunda üretiyoruz.'),
(4, 'Kalite ve Güven', 'Firmamız, en kaliteli malzemeleri kullanarak dayanıklı ve güvenilir karavanlar üretmektedir.'),
(5, 'Mükemmel Müşteri Hizmeti:', 'Müşteri memnuniyeti bizim için önceliktir. Profesyonel ve samimi ekibimizle, size en iyi müşteri hizmetini sunuyoruz.'),
(6, 'Uzmanlık ve Tecrübe', 'Karavan dünyasında yıllardır biriktirdiğimiz uzmanlık ve deneyimle, sizlere kaliteli ve özel tasarımlar sunuyoruz.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Tablo için indeksler `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `fk_user_id_ac` (`user_id`);

--
-- Tablo için indeksler `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Tablo için indeksler `gallery_items`
--
ALTER TABLE `gallery_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Tablo için indeksler `k_categories`
--
ALTER TABLE `k_categories`
  ADD PRIMARY KEY (`k_category_id`),
  ADD UNIQUE KEY `category_url` (`category_url`);

--
-- Tablo için indeksler `k_products`
--
ALTER TABLE `k_products`
  ADD PRIMARY KEY (`k_product_id`),
  ADD KEY `fk_k_category_id` (`k_category_id`),
  ADD KEY `fk_k_main_photo_id` (`main_photo_id`);

--
-- Tablo için indeksler `k_product_photos`
--
ALTER TABLE `k_product_photos`
  ADD PRIMARY KEY (`k_photo_id`),
  ADD KEY `fk_k_product_id` (`k_product_id`);

--
-- Tablo için indeksler `magaza_sliders`
--
ALTER TABLE `magaza_sliders`
  ADD PRIMARY KEY (`slider_id`),
  ADD UNIQUE KEY `order_priority` (`order_priority`);

--
-- Tablo için indeksler `mision_vision`
--
ALTER TABLE `mision_vision`
  ADD PRIMARY KEY (`mv_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_orders_order_id_od` (`order_id`),
  ADD KEY `fk_orders_order_number_od` (`order_number`),
  ADD KEY `fk_product_product_id_od` (`product_id`);

--
-- Tablo için indeksler `order_shipping_info`
--
ALTER TABLE `order_shipping_info`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `fk_orders_order_id_osi` (`order_id`);

--
-- Tablo için indeksler `our_brands`
--
ALTER TABLE `our_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Tablo için indeksler `our_documents`
--
ALTER TABLE `our_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `main_photo_id` (`main_photo_id`);

--
-- Tablo için indeksler `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `fk_product_photos_product` (`product_id`);

--
-- Tablo için indeksler `site_admin`
--
ALTER TABLE `site_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `site_contact_information`
--
ALTER TABLE `site_contact_information`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `site_email`
--
ALTER TABLE `site_email`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `slider_items`
--
ALTER TABLE `slider_items`
  ADD PRIMARY KEY (`slider_id`),
  ADD UNIQUE KEY `order_priority` (`order_priority`);

--
-- Tablo için indeksler `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Tablo için indeksler `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Tablo için indeksler `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`why_us_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `activation_codes`
--
ALTER TABLE `activation_codes`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_items`
--
ALTER TABLE `gallery_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `k_categories`
--
ALTER TABLE `k_categories`
  MODIFY `k_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `k_products`
--
ALTER TABLE `k_products`
  MODIFY `k_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `k_product_photos`
--
ALTER TABLE `k_product_photos`
  MODIFY `k_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `magaza_sliders`
--
ALTER TABLE `magaza_sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Tablo için AUTO_INCREMENT değeri `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `order_shipping_info`
--
ALTER TABLE `order_shipping_info`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `our_brands`
--
ALTER TABLE `our_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `our_documents`
--
ALTER TABLE `our_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Tablo için AUTO_INCREMENT değeri `slider_items`
--
ALTER TABLE `slider_items`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `why_us`
--
ALTER TABLE `why_us`
  MODIFY `why_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD CONSTRAINT `fk_user_id_ac` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `k_products`
--
ALTER TABLE `k_products`
  ADD CONSTRAINT `fk_k_category_id` FOREIGN KEY (`k_category_id`) REFERENCES `k_categories` (`k_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_k_main_photo_id` FOREIGN KEY (`main_photo_id`) REFERENCES `k_product_photos` (`k_photo_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `k_product_photos`
--
ALTER TABLE `k_product_photos`
  ADD CONSTRAINT `fk_k_product_id` FOREIGN KEY (`k_product_id`) REFERENCES `k_products` (`k_product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orders_order_id_od` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_order_number_od` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_product_id_od` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `order_shipping_info`
--
ALTER TABLE `order_shipping_info`
  ADD CONSTRAINT `fk_orders_order_id_osi` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`main_photo_id`) REFERENCES `product_photos` (`photo_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `fk_product_photos_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `user_contact`
--
ALTER TABLE `user_contact`
  ADD CONSTRAINT `fk_user_contact_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
