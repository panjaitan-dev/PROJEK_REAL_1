-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2026 at 04:07 PM
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
-- Database: `pa1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin GeoToba', 'adminsimanindobatuhoda@gmail.com', NULL, '$2y$12$RfYoy5qp8UxIeTIgabkszuKFJugAi9kgiOhln3Sa7S74jnl.88K5W', NULL, '2026-05-25 02:50:57', '2026-05-31 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1,
  `gambar` longtext DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinasis`
--

CREATE TABLE `destinasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_utama` longtext DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `kategori` varchar(100) NOT NULL,
  `jam_buka` varchar(255) DEFAULT NULL,
  `harga_tiket` varchar(255) DEFAULT NULL,
  `fasilitas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fasilitas`)),
  `umkm_terdekat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`umkm_terdekat`)),
  `informasi_tambahan` text DEFAULT NULL,
  `maps` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tampil_di_home` tinyint(1) NOT NULL DEFAULT 0,
  `urutan_home` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasis`
--

INSERT INTO `destinasis` (`id`, `nama`, `slug`, `lokasi`, `deskripsi`, `gambar_utama`, `tags`, `kategori`, `jam_buka`, `harga_tiket`, `fasilitas`, `umkm_terdekat`, `informasi_tambahan`, `maps`, `status`, `tampil_di_home`, `urutan_home`, `created_at`, `updated_at`, `admin_id`) VALUES
(13, 'Batu Hoda', 'batu-hoda', 'Simanindo, Samosir', 'Batu Hoda merupakan salah satu destinasi wisata alam yang berada di Simanindo, Kabupaten Samosir. Tempat ini terkenal dengan batu unik berbentuk kuda serta pemandangan indah Danau Toba yang menarik wisatawan.', 'destinasi/K1PN7jEg2mtHMzsRgsEGe4EZzcEmhkw1DHGUDLoY.jpg', '[\"Batu Hoda\",\"Simanindo\",\"Danau Toba\",\"Wisata Alam\"]', 'Alam', NULL, NULL, '[]', '[]', NULL, NULL, 1, 0, 0, '2026-06-01 20:19:57', '2026-06-01 20:19:57', 1),
(14, 'Batu Pasa', 'batu-pasa', 'Simanindo, Samosir', 'Batu Pasa merupakan salah satu destinasi wisata alam di Kecamatan Simanindo, Kabupaten Samosir. Tempat ini dikenal karena hamparan bebatuan alami yang unik di tepi Danau Toba serta panorama danau yang indah. Batu Pasa menjadi daya tarik wisata yang menawarkan suasana tenang, pemandangan alam yang memukau, dan pengalaman menikmati keindahan Geopark Kaldera Toba.', 'destinasi/wWeez3cUV04barLUBDXtNOb2guh85W3FzD5NCL7d.png', '[\"Batu Pasa\",\"Simanindo\",\"Danau Toba\",\"Wisata Alam\"]', 'Alam', NULL, NULL, '[]', '[]', NULL, NULL, 1, 0, 0, '2026-06-01 20:21:50', '2026-06-01 20:21:50', 1),
(15, 'Museum Huta Bolon', 'museum-huta-bolon', 'Simanindo, Samosir', 'Museum Huta Bolon merupakan salah satu destinasi wisata budaya di Kecamatan Simanindo, Kabupaten Samosir. Museum ini menyimpan berbagai peninggalan sejarah dan budaya Batak Toba, seperti rumah adat tradisional, benda pusaka, serta koleksi yang menggambarkan kehidupan masyarakat Batak pada masa lampau. Museum Huta Bolon menjadi tempat yang tepat untuk mengenal sejarah, adat istiadat, dan warisan budaya Batak Toba secara lebih dekat.', 'destinasi/eMd5DT7JWBowt8ZGyfjjVaUgHPPjHGrcOzBt7qKJ.jpg', '[\"Museum Huta Bolon\",\"Simanindo\",\"Danau Toba\",\"Wisata Alam\"]', 'Budaya', NULL, NULL, '[]', '[]', NULL, NULL, 1, 0, 0, '2026-06-01 20:26:22', '2026-06-01 20:26:22', 1),
(17, 'Rumah Kaca Simanindo', 'rumah-kaca-simanindo', 'Simanindo, Samosir', 'Rumah Kaca Simanindo adalah destinasi wisata edukasi dan rekreasi yang menawarkan koleksi tanaman hias, suasana asri, serta berbagai spot menarik untuk bersantai dan berfoto di Kabupaten Samosir.', 'destinasi/9uK8ndKeHyuHAVX1baKhXIY42BRq3OlDL0gzvVwZ.jpg', '[\"Batu Hoda\",\"Simanindo\",\"Danau Toba\",\"Wisata Alam\"]', 'Buatan', NULL, NULL, '[]', '[]', NULL, NULL, 1, 0, 0, '2026-06-01 20:40:00', '2026-06-02 02:15:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_geosites`
--

CREATE TABLE `detail_geosites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `geosite` varchar(255) NOT NULL,
  `maps_url` text DEFAULT NULL,
  `jam_buka` varchar(255) DEFAULT NULL,
  `harga_tiket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_geosites`
--

INSERT INTO `detail_geosites` (`id`, `geosite`, `maps_url`, `jam_buka`, `harga_tiket`, `created_at`, `updated_at`) VALUES
(1, 'batu_hoda_beach', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.1906229135784!2d98.72283907423697!3d2.759850355423893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031c715b0bed547%3A0x346964c80c83147!2sPantai%20Batuhoda!5e0!3m2!1sid!2sid!4v1780475601619!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', NULL, NULL, '2026-06-03 01:32:57', '2026-06-03 01:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` longtext DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `geosite` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `geosite`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(10, 'Rumah Adat Autentik', 'Kompleks rumah bolon peninggalan Raja Sidaurak yang didalamnya terdapat koleksi artefak, senjata kuno, alat musik tradisional, dan kain ulos.', 'fasilitas/kYbn8U7fZndeH8Vgje8psOe1y2ktUQLoLCXwXMhv.jpg', 'Huta Bolon, Simanindo', 'museum_huta_bolon', 1, '2026-06-02 02:58:00', '2026-06-02 02:58:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1,
  `galeri_geosite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tanggal_foto` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `kategori`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `admin_id`, `galeri_geosite_id`, `lokasi`, `tanggal_foto`, `status`) VALUES
(11, 'Foto Batu Hoda Beach', 'galeri', 'Foto dari batu hoda beach', 'galeri-geosite/tYMfXSIESgpbEivTzg6vG540vVGUGLXwViZh13ey.jpg', '2026-06-01 21:30:08', '2026-06-01 21:30:08', 1, 13, 'batu hoda beach', NULL, 1),
(12, 'Foto Batu Hoda Beach', 'galeri', 'Foto dari batu hoda beach', 'galeri-geosite/2v6hFVkyW3qVD8BHVfTBYpXhoAE5VFFmwX87hT6J.jpg', '2026-06-01 21:30:18', '2026-06-01 21:30:18', 1, 14, 'batu hoda beach', NULL, 1),
(13, 'Foto Batu Hoda Beach', 'galeri', 'Foto dari batu hoda beach', 'galeri-geosite/dYsfeJiosEC52biIEU0Svp91riPY6nBKbpuHyKBc.jpg', '2026-06-01 21:30:27', '2026-06-01 21:30:27', 1, 15, 'batu hoda beach', NULL, 1),
(14, 'Foto Batu Hoda Beach', 'galeri', 'Foto dari batu hoda beach', 'galeri-geosite/3xGUh2Ig7gkRG3qyjHQVzEeqJATuaR5rKK9dxI3T.jpg', '2026-06-01 21:30:35', '2026-06-01 21:30:35', 1, 16, 'batu hoda beach', NULL, 1),
(15, 'Foto Batu Pasa Pantai', 'galeri', 'Foto dari batu pasa pantai', 'galeri-geosite/E4LfzNjRAtXQuAX4BYw26NSwuAYBIHuggXGqhUUf.png', '2026-06-01 21:31:00', '2026-06-01 21:31:00', 1, 17, 'batu pasa pantai', NULL, 1),
(16, 'Foto Batu Pasa Pantai', 'galeri', 'Foto dari batu pasa pantai', 'galeri-geosite/N1LIJP1w47GY3IjFcvq31v5FHcBHatTz6Cab9q5q.jpg', '2026-06-01 21:31:10', '2026-06-01 21:31:10', 1, 18, 'batu pasa pantai', NULL, 1),
(17, 'Foto Batu Pasa Pantai', 'galeri', 'Foto dari batu pasa pantai', 'galeri-geosite/4F1htVWnNnCOaZJkzuuRKgD5nkEhip4mdKffKDrn.png', '2026-06-01 21:31:29', '2026-06-01 21:31:29', 1, 19, 'batu pasa pantai', NULL, 1),
(18, 'Foto Batu Pasa Pantai', 'galeri', 'Foto dari batu pasa pantai', 'galeri-geosite/12dqG44VWiDWKNEcg17wsCsnQZGMXcUZ1WpKMSun.jpg', '2026-06-01 21:31:38', '2026-06-01 21:31:38', 1, 20, 'batu pasa pantai', NULL, 1),
(19, 'Foto Museum Huta Bolon', 'galeri', 'Foto dari museum huta bolon', 'galeri-geosite/Q5h32iIjVhG1MuJOdTfIaaaAiX7uFFATfvlUU7z7.jpg', '2026-06-01 21:31:49', '2026-06-01 21:31:49', 1, 21, 'museum huta bolon', NULL, 1),
(20, 'Foto Museum Huta Bolon', 'galeri', 'Foto dari museum huta bolon', 'galeri-geosite/Dy2IMaalikW5qGcJKeLkXrHADsF8aG7KmiaHs69O.jpg', '2026-06-01 21:32:02', '2026-06-01 21:32:02', 1, 22, 'museum huta bolon', NULL, 1),
(21, 'Foto Museum Huta Bolon', 'galeri', 'Foto dari museum huta bolon', 'galeri-geosite/SgbTqk8fv12r1Z2r5p4xHWHbbWO84We9nwxRZBqs.jpg', '2026-06-01 21:32:15', '2026-06-01 21:32:15', 1, 23, 'museum huta bolon', NULL, 1),
(22, 'Foto Museum Huta Bolon', 'Simanindo', 'Foto dari museum huta bolon', 'galeri-geosite/6OJs2bvzmR0WvyTD80YG5yMumk5y2hMhMocqkssy.jpg', '2026-06-01 21:32:23', '2026-06-02 01:55:51', 1, 24, 'museum huta bolon', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri_geosite`
--

CREATE TABLE `galeri_geosite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` longtext DEFAULT NULL,
  `geosite` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri_geosite`
--

INSERT INTO `galeri_geosite` (`id`, `judul`, `kategori`, `gambar`, `geosite`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(13, 'Foto Batu Hoda Beach', 'galeri', 'galeri-geosite/tYMfXSIESgpbEivTzg6vG540vVGUGLXwViZh13ey.jpg', 'batu_hoda_beach', 1, '2026-06-01 21:30:08', '2026-06-01 21:30:08', 1),
(14, 'Foto Batu Hoda Beach', 'galeri', 'galeri-geosite/2v6hFVkyW3qVD8BHVfTBYpXhoAE5VFFmwX87hT6J.jpg', 'batu_hoda_beach', 1, '2026-06-01 21:30:18', '2026-06-01 21:30:18', 1),
(15, 'Foto Batu Hoda Beach', 'galeri', 'galeri-geosite/dYsfeJiosEC52biIEU0Svp91riPY6nBKbpuHyKBc.jpg', 'batu_hoda_beach', 1, '2026-06-01 21:30:27', '2026-06-01 21:30:27', 1),
(16, 'Foto Batu Hoda Beach', 'galeri', 'galeri-geosite/3xGUh2Ig7gkRG3qyjHQVzEeqJATuaR5rKK9dxI3T.jpg', 'batu_hoda_beach', 1, '2026-06-01 21:30:35', '2026-06-01 21:30:35', 1),
(17, 'Foto Batu Pasa Pantai', 'galeri', 'galeri-geosite/E4LfzNjRAtXQuAX4BYw26NSwuAYBIHuggXGqhUUf.png', 'batu_pasa_pantai', 1, '2026-06-01 21:31:00', '2026-06-01 21:31:00', 1),
(18, 'Foto Batu Pasa Pantai', 'galeri', 'galeri-geosite/N1LIJP1w47GY3IjFcvq31v5FHcBHatTz6Cab9q5q.jpg', 'batu_pasa_pantai', 1, '2026-06-01 21:31:10', '2026-06-01 21:31:10', 1),
(19, 'Foto Batu Pasa Pantai', 'galeri', 'galeri-geosite/4F1htVWnNnCOaZJkzuuRKgD5nkEhip4mdKffKDrn.png', 'batu_pasa_pantai', 1, '2026-06-01 21:31:29', '2026-06-01 21:31:29', 1),
(20, 'Foto Batu Pasa Pantai', 'galeri', 'galeri-geosite/12dqG44VWiDWKNEcg17wsCsnQZGMXcUZ1WpKMSun.jpg', 'batu_pasa_pantai', 1, '2026-06-01 21:31:38', '2026-06-01 21:31:38', 1),
(21, 'Foto Museum Huta Bolon', 'galeri', 'galeri-geosite/Q5h32iIjVhG1MuJOdTfIaaaAiX7uFFATfvlUU7z7.jpg', 'museum_huta_bolon', 1, '2026-06-01 21:31:49', '2026-06-01 21:31:49', 1),
(22, 'Foto Museum Huta Bolon', 'galeri', 'galeri-geosite/Dy2IMaalikW5qGcJKeLkXrHADsF8aG7KmiaHs69O.jpg', 'museum_huta_bolon', 1, '2026-06-01 21:32:02', '2026-06-01 21:32:02', 1),
(23, 'Foto Museum Huta Bolon', 'galeri', 'galeri-geosite/SgbTqk8fv12r1Z2r5p4xHWHbbWO84We9nwxRZBqs.jpg', 'museum_huta_bolon', 1, '2026-06-01 21:32:15', '2026-06-01 21:32:15', 1),
(24, 'Foto Museum Huta Bolon', 'galeri', 'galeri-geosite/6OJs2bvzmR0WvyTD80YG5yMumk5y2hMhMocqkssy.jpg', 'museum_huta_bolon', 1, '2026-06-01 21:32:23', '2026-06-01 21:32:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'hero_subtitle', 'Global Geopark', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(2, 'hero_title', 'Simanindo - Batu Hoda', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(3, 'stat_geosites', '16', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(4, 'stat_geosites_label', 'GEOSITES', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(5, 'stat_sejarah', '74.000', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(6, 'stat_sejarah_label', 'TAHUN SEJARAH', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(7, 'stat_warisan', '15+', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(8, 'stat_warisan_label', 'WARISAN BUDAYA', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(9, 'stat_umkm', '100+', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(10, 'stat_umkm_label', 'UMKM LOKAL', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(11, 'warisan_judul', 'Warisan Geologi Kelas Dunia', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(12, 'warisan_paragraf_1', 'Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(13, 'warisan_paragraf_2', 'Kawasan Simanindo - Batu Hoda menyimpan pesona pantai eksotis, museum budaya Batak, serta formasi batu unik yang menjadi ikon geopark Danau Toba.', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(14, 'warisan_gambar', 'home/cuKojm8IwWWYORvRfXb04UJnrRDnj0dl8TGdHJeq.png', '2026-05-25 02:50:57', '2026-05-25 06:04:31'),
(15, 'destinasi_judul', 'Destinasi Unggulan', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(16, 'destinasi_subjudul', 'Wisata eksotis di kawasan Simanindo - Batu Hoda, Pulau Samosir', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(17, 'cta_judul', 'Mulai Petualangan Anda', '2026-05-25 02:50:57', '2026-05-25 02:50:57'),
(18, 'cta_deskripsi', 'Temukan keindahan Pantai Batu Hoda, belajar budaya Batak di Museum Huta Bolon, dan abadikan momen di Batu Pasa Pantai.', '2026-05-25 02:50:57', '2026-05-25 02:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1,
  `gambar` longtext DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `slug`, `konten`, `admin_id`, `gambar`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Letusan Supervolcano Toba', 'letusan-supervolcano-toba', '<p>Danau Toba terbentuk akibat letusan gunung berapi super (supervolcano) yang terjadi sekitar 74.000 tahun lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi yang meninggalkan kaldera raksasa yang kini dikenal sebagai Danau Toba. Material vulkanik dari letusan ini tersebar hingga ke berbagai belahan dunia, termasuk India dan Afrika.</p>', 1, NULL, 1, 1, '2026-05-31 07:23:13', '2026-05-31 07:23:13'),
(2, 'Kaldera Toba', 'kaldera-toba', '<p>Letusan supervolcano Toba menghasilkan kaldera dengan panjang 100 km dan lebar 30 km. Setelah letusan, kaldera perlahan terisi air dan membentuk Danau Toba yang kita kenal sekarang. Proses pengangkatan kembali dasar kaldera kemudian menciptakan Pulau Samosir di tengah danau, yang menjadikan Danau Toba unik di dunia.</p>', 1, NULL, 2, 1, '2026-05-31 07:23:13', '2026-05-31 07:23:13'),
(3, 'UNESCO Global Geopark', 'unesco-global-geopark', '<p>Kawasan Danau Toba kini diakui UNESCO sebagai Global Geopark pada tahun 2020. Pengakuan ini diberikan karena nilai geologi yang luar biasa, keanekaragaman hayati, serta warisan budaya Batak yang masih terjaga hingga saat ini.</p>', 1, NULL, 3, 1, '2026-05-31 07:23:13', '2026-05-31 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_geosite`
--

CREATE TABLE `informasi_geosite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `geosite` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_geosite`
--

INSERT INTO `informasi_geosite` (`id`, `geosite`, `judul`, `konten`, `gambar`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'batu_hoda_beach', '📜 Sejarah Batu Hoda', 'Batu Hoda merupakan sebuah kawasan yang namanya berasal dari gabungan kata \"batu\" dan \"hoda\" (kuda) dalam bahasa Batak. Kawasan ini berada di wilayah Tugu 0 KM Pulau Samosir, yang dikenal sebagai titik pusat dan arah penting dalam peta budaya dan wisata Danau Toba.\n\nDahulu, wilayah ini merupakan bagian dari kehidupan masyarakat Batak Toba yang hidup berdampingan dengan alam. Mereka memanfaatkan tanah untuk pertanian, dan perairan Danau Toba untuk kehidupan sehari-hari. Seiring waktu, kawasan ini berkembang menjadi salah satu destinasi wisata yang dikenal karena keindahan alam dan nilai budayanya.', NULL, 1, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(2, 'batu_hoda_beach', '🐎 Legenda Batu Hoda', 'Menurut cerita yang berkembang di masyarakat, dahulu terdapat sepasang kuda yang hidup di kawasan Batu Hoda. Keduanya hidup berdampingan dengan penuh kasih, dan memiliki harapan untuk membangun kehidupan serta keturunan bersama.\n\nNamun suatu hari, salah satu kuda pergi meninggalkan pasangannya tanpa kembali. Kuda yang ditinggalkan tetap setia menunggu di tempat itu. Hari berganti hari, bulan berganti bulan, bahkan tahun berganti tahun, namun ia tetap menunggu dengan penuh harapan.\n\nKesetiaan dan penantian yang begitu lama membuat kuda tersebut akhirnya berubah menjadi batu. Dari peristiwa inilah masyarakat percaya bahwa terbentuknya \"Batu Hoda\" merupakan simbol dari kuda yang setia menunggu hingga menjadi batu.', NULL, 2, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(3, 'museum_huta_bolon', 'Sejarah Museum Huta Bolon', 'Museum Huta Bolon merupakan desa tua yang terkenal sebagai pusat pemerintahan Raja Siallagan pada masa lalu. Desa ini dikenal karena adanya kursi batu dan meja persidangan batu yang digunakan sebagai tempat pengadilan adat masyarakat Batak Toba.', NULL, 1, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(4, 'museum_huta_bolon', 'Budaya Museum Huta Bolon', 'Budaya di Museum Huta Bolon masih sangat kental dengan tradisi Batak Toba. Rumah adat tradisional, tarian tortor, dan penggunaan ulos masih dijaga oleh masyarakat setempat. Cerita rakyat dan sejarah kerajaan Batak juga diwariskan secara turun-temurun.', NULL, 2, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(5, 'museum_huta_bolon', 'Daya Tarik Wisata Museum Huta Bolon', 'Museum Huta Bolon terkenal dengan situs Batu Persidangan Raja Siallagan yang menjadi daya tarik utama wisatawan. Selain melihat peninggalan sejarah, pengunjung juga dapat menikmati suasana desa tradisional Batak dan menyaksikan pertunjukan budaya khas Batak Toba.', NULL, 3, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(6, 'batu_pasa_pantai', 'Sejarah Pantai Batu Pasa', 'Pantai Batu Pasa merupakan salah satu destinasi wisata di kawasan Simanindo, Pulau Samosir, yang dikenal dengan keindahan alam Danau Toba serta batu-batu alami di sekitar pantai. Tempat ini menjadi salah satu lokasi wisata yang sering dikunjungi wisatawan untuk menikmati suasana tenang dan panorama alam khas Danau Toba.', NULL, 1, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(7, 'batu_pasa_pantai', 'Budaya Pantai Batu Pasa', 'Masyarakat di sekitar Batu Pasa masih mempertahankan budaya Batak Toba yang diwariskan secara turun-temurun. Tradisi adat, penggunaan kain ulos, musik tradisional, dan keramahan masyarakat menjadi bagian dari kehidupan sehari-hari yang dapat dirasakan langsung oleh wisatawan.', NULL, 2, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31'),
(8, 'batu_pasa_pantai', 'Daya Tarik Wisata Pantai Batu Pasa', 'Pantai Batu Pasa menawarkan pemandangan Danau Toba yang indah dengan suasana yang sejuk dan nyaman. Wisatawan dapat menikmati panorama alam, bersantai di tepi pantai, berfoto dengan latar batu-batu alami, serta menikmati suasana khas wisata Pulau Samosir yang masih alami dan asri.', NULL, 3, 1, '2026-06-03 02:47:31', '2026-06-03 02:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_04_26_080338_create_admin_table', 1),
(2, '2026_04_08_071800_create_informasis_table', 1),
(3, '2026_04_08_071801_create_galeri_table', 1),
(4, '2026_04_08_071802_create_berita_table', 1),
(5, '2026_05_07_100001_create_umkm_table', 1),
(6, '2026_05_07_100002_create_penginapan_table', 1),
(7, '2026_05_07_100003_create_fasilitas_table', 1),
(8, '2026_05_07_100004_create_galeri_geosite_table', 1),
(9, '2026_05_11_014318_create_sessions_table', 1),
(10, '2026_05_11_032412_create_destinasis_table', 1),
(11, '2026_05_12_020106_create_cache_table', 1),
(12, '2026_05_19_031131_create_navbar_items_table', 1),
(13, '2026_05_19_081600_create_home_settings_table', 1),
(14, '2026_05_19_081700_add_home_fields_to_destinasis', 1),
(15, '2026_05_23_030224_create_password_otp_table', 1),
(16, '2026_05_23_103000_add_galeri_geosite_id_to_galeri_table', 1),
(17, '2026_06_03_000001_create_detail_geosites_table', 2),
(18, '2026_06_03_100000_create_informasi_geosite_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `navbar_items`
--

CREATE TABLE `navbar_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `geosite` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_otps`
--

CREATE TABLE `password_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` longtext DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `geosite` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `kontak`, `geosite`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(10, 'Home Stay', 'Home Stay bernuansa alam dengan desain yang astetik dan lingkungan yang dipenuhi oleh taman yang indah.', 'penginapan/MgHWTfVFLsAJZtAwpn4UXnG9QwzbNSHYYPVh1lA4.jpg', 'Rp 250.000/ malam', NULL, 'museum_huta_bolon', 1, '2026-06-02 02:37:23', '2026-06-02 02:37:23', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` longtext DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `geosite` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `nama`, `deskripsi`, `gambar`, `lokasi`, `kontak`, `geosite`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(10, 'Area Kuliner', 'Area Kuliner yang bisa kamu cobain pada setiap kios dan memiliki harga yang terjangkau dan enak', 'umkm/zCIqvaUcO63bb7tXNMe3KFQiTN93MieDqEY1Lp9W.jpg', 'Batu Hoda,Simanindo', NULL, 'batu_hoda_beach', 1, '2026-06-02 01:41:27', '2026-06-02 01:41:51', 1),
(11, 'Food Court', 'Warung makan dengan menu yang lezat dan harga yang terjangkau', 'umkm/M2Nx3ThmUbTjn7gkMTPvSxS077x8ZVGEglPENEV6.jpg', 'Batu Hoda,Simanindo', NULL, 'batu_hoda_beach', 1, '2026-06-02 01:42:58', '2026-06-02 01:42:58', 1),
(12, 'Souvenir', 'Menjual berbagai macam barang kenang-kenangan, seperti kerajinan tangan , aksesoris, dan pakaian yang ada di Batu Hoda', 'umkm/1qolQsTAOWmqiS67Pgr0fGKqQxMqifv7wnKd3tyx.jpg', 'Batu Hoda,Simanindo', NULL, 'batu_hoda_beach', 1, '2026-06-02 01:44:34', '2026-06-02 01:44:34', 1),
(13, 'Cafe House', 'Kedai kopi  special yang menyajikan biji kopi Arabika Samosir', 'umkm/GYkJBvtlOKwMtnDW3qF9XtsGcBaP6OAcrrfUV40L.jpg', 'Huta Bolon, Simanindo', NULL, 'museum_huta_bolon', 1, '2026-06-02 01:46:41', '2026-06-02 01:46:41', 1),
(14, 'Souvenir', 'Menjual berbagai macam baranh kenang-kenangan, seperti aksesoris, pakaian yang ada di Huta Bolon', 'umkm/kD73pnpxQfiStj5nRT1iAliW04IgSuAOmNVL0dki.jpg', 'Huta Bolon, Simanindo', NULL, 'museum_huta_bolon', 1, '2026-06-02 01:48:18', '2026-06-02 01:48:18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `berita_slug_unique` (`slug`),
  ADD KEY `berita_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinasis_slug_unique` (`slug`),
  ADD KEY `destinasis_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `detail_geosites`
--
ALTER TABLE `detail_geosites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_geosites_geosite_unique` (`geosite`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_admin_id_foreign` (`admin_id`),
  ADD KEY `fasilitas_geosite_index` (`geosite`),
  ADD KEY `fasilitas_status_index` (`status`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_admin_id_foreign` (`admin_id`),
  ADD KEY `galeri_kategori_index` (`kategori`),
  ADD KEY `galeri_status_index` (`status`),
  ADD KEY `galeri_galeri_geosite_id_index` (`galeri_geosite_id`);

--
-- Indexes for table `galeri_geosite`
--
ALTER TABLE `galeri_geosite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_geosite_admin_id_foreign` (`admin_id`),
  ADD KEY `galeri_geosite_geosite_index` (`geosite`),
  ADD KEY `galeri_geosite_kategori_index` (`kategori`),
  ADD KEY `galeri_geosite_status_index` (`status`);

--
-- Indexes for table `home_settings`
--
ALTER TABLE `home_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `home_settings_key_unique` (`key`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `informasi_slug_unique` (`slug`),
  ADD KEY `informasi_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `informasi_geosite`
--
ALTER TABLE `informasi_geosite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_geosite_geosite_index` (`geosite`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar_items`
--
ALTER TABLE `navbar_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_otps`
--
ALTER TABLE `password_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_otps_email_index` (`email`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penginapan_admin_id_foreign` (`admin_id`),
  ADD KEY `penginapan_geosite_index` (`geosite`),
  ADD KEY `penginapan_status_index` (`status`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umkm_admin_id_foreign` (`admin_id`),
  ADD KEY `umkm_geosite_index` (`geosite`),
  ADD KEY `umkm_status_index` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_geosites`
--
ALTER TABLE `detail_geosites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `galeri_geosite`
--
ALTER TABLE `galeri_geosite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `home_settings`
--
ALTER TABLE `home_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi_geosite`
--
ALTER TABLE `informasi_geosite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `navbar_items`
--
ALTER TABLE `navbar_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_otps`
--
ALTER TABLE `password_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD CONSTRAINT `destinasis_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `galeri_geosite`
--
ALTER TABLE `galeri_geosite`
  ADD CONSTRAINT `galeri_geosite_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD CONSTRAINT `penginapan_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
