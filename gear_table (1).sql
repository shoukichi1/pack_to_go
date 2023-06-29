-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 6 月 29 日 16:27
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
(8, '帽子', '6498487c6364a_Ciele-Go-Cap--Athletics_large.webp', 'head_gear', 100, '説明', '2023-06-25 23:00:28', '2023-06-25 23:00:28', NULL),
(9, 'ふく更新', '649aed09dba4f_sn_acd68913-7103-46d4-b92c-50f67cb24d9a_large.webp', 'bottoms', 241, '夏用のギア更新', '2023-06-25 23:31:58', '2023-06-27 23:07:05', NULL),
(10, '手袋更新', '649d92fdcee15_Ciele-Go-Cap--Athletics_large.webp', 'other', 70, '冬用の手袋', '2023-06-29 23:18:09', '2023-06-29 23:19:41', '2023-06-29 23:20:10');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gear_table`
--
ALTER TABLE `gear_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gear_table`
--
ALTER TABLE `gear_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
