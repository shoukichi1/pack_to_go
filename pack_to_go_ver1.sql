-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 13 日 15:18
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `pack_to_go_ver1`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `equipment_table`
--

CREATE TABLE `equipment_table` (
  `id` int(11) NOT NULL,
  `equipment_name` varchar(64) NOT NULL,
  `equipment_item` varchar(255) NOT NULL,
  `equipment_gram` int(11) NOT NULL,
  `equipment_text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `gear_table`
--

CREATE TABLE `gear_table` (
  `id` int(11) NOT NULL,
  `gear_name` varchar(128) NOT NULL,
  `gear_image` varchar(128) NOT NULL,
  `gear_kind` varchar(128) NOT NULL,
  `gear_gram` int(11) NOT NULL,
  `gear_text` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `gear_table`
--

INSERT INTO `gear_table` (`id`, `gear_name`, `gear_image`, `gear_kind`, `gear_gram`, `gear_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '帽子しんき', '64a0e81fd1e52_Ciele-Go-Cap--Athletics_large.webp', 'head_gear', 60, 'テスト', '2023-07-02 11:59:43', '2023-07-02 11:59:43', NULL),
(13, 'ふく', '64a0e84565ffb_ss2_2362fd02-3fc3-472e-ace3-dfde93458147_large.webp', 'middle_layer', 300, 'ああああ', '2023-07-02 12:00:21', '2023-07-02 12:48:37', NULL),
(14, '帽子２', '64a43fe4a79b8_sn_dc9f4128-7a7a-491a-a788-5a2f59e8c264_large.jpg', 'head_gear', 30, 'aaaa', '2023-07-05 00:51:00', '2023-07-05 00:51:00', NULL),
(15, 'バックパック', '64a4402472b83_sn_acd68913-7103-46d4-b92c-50f67cb24d9a_large.webp', 'backpack', 950, '40リットル', '2023-07-05 00:52:04', '2023-07-05 00:52:04', NULL),
(16, '2023/07/08手袋更新更新２', '64a8e6bab74f2_Ciele-Go-Cap--Athletics_large.webp', 'other', 80, 'お気に入り', '2023-07-08 13:27:52', '2023-07-08 13:31:54', '2023-07-08 13:36:29'),
(17, '帽子３', '64a91dfa4f444_ss2_2362fd02-3fc3-472e-ace3-dfde93458147_large.webp', 'outer', 300, '冬用', '2023-07-08 17:27:38', '2023-07-08 17:27:38', '2023-07-08 17:41:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testuser01', '111111', 1, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(2, 'testuser02', '222222', 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(3, 'testuser03', '333333', 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(4, 'testuser04', '444444', 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `equipment_table`
--
ALTER TABLE `equipment_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gear_table`
--
ALTER TABLE `gear_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `equipment_table`
--
ALTER TABLE `equipment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `gear_table`
--
ALTER TABLE `gear_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
