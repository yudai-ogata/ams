-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 9 朁E25 日 11:32
-- サーバのバージョン： 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `t_contents`
--

CREATE TABLE `t_contents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_kana` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `param` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `number1` int(11) DEFAULT NULL,
  `number2` int(11) DEFAULT NULL,
  `number3` int(11) DEFAULT NULL,
  `detail1` text,
  `detail2` text,
  `detail3` text,
  `detail4` text,
  `detail5` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_contents`
--

INSERT INTO `t_contents` (`id`, `name`, `name_kana`, `age`, `gender`, `tel`, `zip`, `address`, `email`, `domain`, `param`, `product_name`, `number1`, `number2`, `number3`, `detail1`, `detail2`, `detail3`, `detail4`, `detail5`, `created`, `modified`, `deleted`) VALUES
(1, '中村大輔', 'ナカムラダイスケ', '28', 1, '0364471359', '106-0031', '1-14-5 永都ビル503', 'nakamura@gmail.com', 'test.jp', 'awserdtfyguhi', '中古車', 1, 2, 3, '123123123\r\n123\r\n123\r\n123', '2', '3', '1234', '5', '2018-09-19 17:13:42', '2018-09-25 16:32:29', 0),
(2, 'test', 'テスト', '', 0, '0364471359', '106-0031', '1-14-5 永都ビル503', '', 'test2.jp', 'zsxdcfvgbhnjmkl,', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-09-19 12:08:53', '2018-09-19 17:26:17', 0),
(3, 'testuser', 'テストユーザー', '', 0, '0364471359', '106-0031', '1-14-5 永都ビル503', 'youdietagao@gmail.com', 'admin.co.jp', 'awsedrtfguhio', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-09-19 18:37:48', '2018-09-19 18:39:12', 0),
(4, 'asd', '', '', 0, '', '', '', '', 'asdddasd', 'asdasdaqwrsdfzxcvrwf', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-09-24 19:23:52', '2018-09-24 19:23:59', 1),
(5, 'wer', '', '', NULL, NULL, '', '', '', '127.0.0.1', 'asdqwe', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2018-09-24 19:24:13', '2018-09-25 16:02:08', 1),
(6, 'ZiQ', 'ZiQ', '', NULL, NULL, '106-0031', '西麻布1-14-5, 永都ビル西麻布503', 'youdietagao@gmail.com', 'localhost', 'sedrftgyhujik', '', 1, 2, 3, '123', '234', '345', '456', '567', '2018-09-25 16:37:00', '2018-09-25 16:37:00', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_domains`
--

CREATE TABLE `t_domains` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_domains`
--

INSERT INTO `t_domains` (`id`, `name`, `created`, `modified`, `deleted`) VALUES
(1, 'admin.co.jp', '2018-09-18 03:48:08', '2018-09-19 17:15:31', 0),
(2, 'test.jp', '2018-09-18 13:43:49', '2018-09-18 14:02:15', 0),
(3, 'test2.jp', '2018-09-18 17:49:37', '2018-09-18 18:19:32', 0),
(4, 'localhost', '2018-09-25 16:57:55', '2018-09-25 16:57:55', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `t_domain_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_users`
--

INSERT INTO `t_users` (`id`, `name`, `password`, `admin`, `t_domain_id`, `created`, `modified`, `deleted`) VALUES
(1, '管理者', '$2y$10$G20Pqw3Q3JT8cDLK.rUWZeX3RlvrETSxaJCUR4KIARy24ttOz4xW6', 1, 1, '2018-09-18 13:28:47', '2018-09-25 16:16:10', 0),
(2, 'test_user', '$2y$10$UkXxgh2r7HXC7W.CmDHue.chOIfQH.5fVisA7nnJkPrPeBsY3tWQa', 0, 2, '2018-09-18 17:49:23', '2018-09-24 13:24:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_contents`
--
ALTER TABLE `t_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_domains`
--
ALTER TABLE `t_domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_contents`
--
ALTER TABLE `t_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_domains`
--
ALTER TABLE `t_domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
