-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2024 at 06:05 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songs-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs_table`
--

DROP TABLE IF EXISTS `songs_table`;
CREATE TABLE IF NOT EXISTS `songs_table` (
  `id` int NOT NULL,
  `title` varchar(25) NOT NULL,
  `artist` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `genre` varchar(20) NOT NULL,
  `price` int NOT NULL,
  `audio_path` varchar(165) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon_path` varchar(150) NOT NULL,
  `duration` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs_table`
--

INSERT INTO `songs_table` (`id`, `title`, `artist`, `genre`, `price`, `audio_path`, `icon_path`, `duration`) VALUES
(1, 'Error', 'Tokoyami Towa', 'Alternative rock', 15, 'assets\\songs\\tokoyami-towa\\error.mp3', 'assets\\songs\\tokoyami-towa\\error-icon.png', '3:59'),
(2, 'Palette', 'Tokoyami Towa', 'Alternative rock', 35, 'assets\\songs\\tokoyami-towa\\palette.mp3', 'assets\\songs\\tokoyami-towa\\palette-icon.png', '3:41'),
(3, 'Kaisou ressha', 'Minato Aqua', 'Acoustic', 20, 'assets\\songs\\minato-aqua\\kaisou-ressha.mp3', 'assets\\songs\\minato-aqua\\kaisou-ressha-icon.png', '4:10'),
(4, 'Hearts', 'Tokoyami Towa', 'Alternative rock', 25, 'assets\\songs\\tokoyami-towa\\hearts.mp3', 'assets\\songs\\tokoyami-towa\\hearts-icon.png', '3:46'),
(5, 'Aqua iro palette', 'Minato Aqua', 'Ayaya', 50, 'assets\\songs\\minato-aqua\\aqua-iro-palette.mp3', 'assets\\songs\\minato-aqua\\aqua-iro-palette-icon.png', '4:30'),
(6, 'Overdose', 'Murasaki Shion', 'Pop', 10, 'assets\\songs\\murasaki-shion\\overdose.mp3', 'assets\\songs\\murasaki-shion\\overdose-icon.png', '3:13'),
(7, 'Stellar stellar', 'Hoshimachi Suisei', 'Pop', 20, 'assets\\songs\\hoshimachi-suisei\\stellar-stellar.mp3', 'assets\\songs\\hoshimachi-suisei\\stellar-stellar-icon.png', '5:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
