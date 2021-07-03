-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 7 朁E03 日 10:20
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `arsenal_member_table`
--

CREATE TABLE IF NOT EXISTS `arsenal_member_table` (
`id` int(11) NOT NULL,
  `number` tinyint(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `age` tinyint(2) DEFAULT NULL,
  `country` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `arsenal_member_table`
--

INSERT INTO `arsenal_member_table` (`id`, `number`, `name`, `birth`, `age`, `country`, `position`, `value`, `comment`) VALUES
(1, 1, 'B.Leno', '1992-05-04', 29, 'DEU', 'GK', '2200万€', 'アーセナルの正守護神'),
(2, 13, 'R.Runarsson', '1995-02-18', 26, 'NOR', 'GK', '150万€', '得になし'),
(3, 33, 'M.Ryan', '1992-08-08', 29, 'AUS', 'GK', '600万€', '特になし'),
(8, 6, 'Gabriel', '1997-02-18', 23, 'BRA', 'DF', '2500万€', '特になし'),
(9, 16, 'R.Holding', '1995-09-20', 25, 'ENG', 'DF', '1800万€', '特になし'),
(24, 21, 'C.Chambers', '1995-01-20', 26, 'ENG', 'DF', '1200万€', '特になし'),
(25, 22, 'P.Mari', '1993-08-31', 27, 'SPN', 'DF', '700', '特になし'),
(27, 3, 'K.Tierney', '1997-06-05', 24, 'SCT', 'DF', '3200', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `arsenal_transfer_table`
--

CREATE TABLE IF NOT EXISTS `arsenal_transfer_table` (
`id` int(11) NOT NULL,
  `indate` date NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `age` tinyint(2) NOT NULL,
  `country` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(12) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `arsenal_transfer_table`
--

INSERT INTO `arsenal_transfer_table` (`id`, `indate`, `name`, `birth`, `age`, `country`, `position`, `value`, `comment`, `like`) VALUES
(4, '2021-06-25', 'B.White', '1997-10-08', 23, 'ENG', 'DF', 4500, 'ユーロ2021　イングランド代表', 0),
(6, '2021-07-03', 'Tatsuyaanno', '1897-10-10', 123, 'NOR', 'FW', 2333, '', 0),
(7, '2021-07-03', 'test', '1999-02-03', 22, 'tes', 'FW', 1234, 'test', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `arsenal_user_table`
--

CREATE TABLE IF NOT EXISTS `arsenal_user_table` (
`id` int(12) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_birth` date NOT NULL,
  `u_age` tinyint(3) NOT NULL,
  `u_player` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL,
  `u_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `u_img` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `arsenal_user_table`
--

INSERT INTO `arsenal_user_table` (`id`, `u_name`, `u_id`, `u_pw`, `u_birth`, `u_age`, `u_player`, `life_flg`, `indate`, `u_comment`, `u_img`) VALUES
(1, '山田太郎2', 'tatsuyaanno', 'test', '2000-09-10', 27, 'ベルカンプ', 0, '2021-06-29 15:06:57', 'はじめまして！', 'profphoto2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsenal_member_table`
--
ALTER TABLE `arsenal_member_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsenal_transfer_table`
--
ALTER TABLE `arsenal_transfer_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsenal_user_table`
--
ALTER TABLE `arsenal_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsenal_member_table`
--
ALTER TABLE `arsenal_member_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `arsenal_transfer_table`
--
ALTER TABLE `arsenal_transfer_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `arsenal_user_table`
--
ALTER TABLE `arsenal_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
