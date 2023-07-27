-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 27 日 15:01
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
(17, '帽子３', '64a91dfa4f444_ss2_2362fd02-3fc3-472e-ace3-dfde93458147_large.webp', 'outer', 300, '冬用', '2023-07-08 17:27:38', '2023-07-08 17:27:38', '2023-07-08 17:41:25'),
(18, 'サングラス', '64b21a83aa92c_sn_6f46ec99-5c6c-49ae-9340-aea2988ddd7e_large.webp', 'other', 24, '晴れの日用', '2023-07-15 13:03:15', '2023-07-15 13:03:15', '2023-07-15 14:06:06'),
(19, 'HOUDINI コスモシャツ', '64b21ab20ccd6_sn_9750802b-c28f-45fe-bc0e-645a7e0fbdf9_large.webp', 'middle_layer', 123, '🤩', '2023-07-15 13:04:02', '2023-07-15 13:04:02', '2023-07-15 13:51:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gear_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `gear_id`, `created_at`) VALUES
(8, 1, 15, '2023-07-27 21:46:34'),
(9, 1, 14, '2023-07-27 21:46:35'),
(10, 1, 13, '2023-07-27 21:46:36'),
(11, 1, 12, '2023-07-27 21:46:38'),
(12, 2, 15, '2023-07-27 21:46:46'),
(14, 2, 13, '2023-07-27 21:46:48'),
(15, 2, 12, '2023-07-27 21:46:49'),
(16, 2, 14, '2023-07-27 21:46:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `height` int(128) NOT NULL,
  `weight` int(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `height`, `weight`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testuser01', '111111', 1, 0, 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(2, 'testuser02', '222222', 0, 0, 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(3, 'testuser03', '333333', 0, 0, 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(4, 'testuser04', '444444', 0, 0, 0, '2023-07-08 17:01:01', '2023-07-08 17:01:01', NULL),
(5, '山田', '123', 1, 0, 0, '2023-07-15 12:04:50', '2023-07-15 12:04:50', NULL),
(6, 'aaa', '111', 1, 0, 0, '2023-07-15 12:04:56', '2023-07-15 12:04:56', NULL),
(7, '山下', '123', 1, 158, 56, '2023-07-15 12:58:43', '2023-07-15 12:58:43', NULL),
(8, '山田次郎', '111', 1, 158, 56, '2023-07-15 12:58:59', '2023-07-15 12:58:59', NULL),
(9, '田中たろう', '11111', 1, 158, 56, '2023-07-15 13:50:23', '2023-07-15 13:50:23', NULL),
(10, '田中', '111', 1, 158, 56, '2023-07-15 14:06:59', '2023-07-15 14:06:59', NULL);

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
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
