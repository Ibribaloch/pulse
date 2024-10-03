-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 05:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulse`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `album_cover` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_name`, `artist_id`, `album_cover`) VALUES
(1, 'Aashiqui 2', 1, 'images/albums/Aashiqui 2.jpeg'),
(2, 'Dil Se', 2, 'images/albums/DilSe.jpg'),
(3, 'Kal Ho Naa Ho', 3, 'images/albums/Kal Ho Naa Ho.jpeg'),
(4, 'Yeh Jawaani Hai Deewani', 4, 'images/albums/Yeh Jawaani Hai Deewani.jpeg'),
(5, 'Race 2', 5, 'images/albums/Race 2.jpeg'),
(6, 'Rab Ne Bana Di Jodi', 6, 'images/albums/Rab Ne Bana Di Jodi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_plus_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `image_path`, `description`, `website`, `facebook_link`, `twitter_link`, `google_plus_link`) VALUES
(1, 'Arijit Singh', 'images/artists/arijit_singh.jpeg', 'Arijit Singh is a popular Indian playback singer known for his soulful voice and romantic ballads.', 'http://arijitsingh.com', 'https://www.facebook.com/arijitsingh', 'https://twitter.com/arijitsingh', 'https://plus.google.com/arijitsingh'),
(2, 'Sukhwinder Singh', 'images/artists/sukhwinder_singh.jpeg', 'Sukhwinder Singh is an acclaimed Indian playback singer famous for his powerful vocals and energetic performances.', 'http://sukhwindersingh.com', 'https://www.facebook.com/sukhwindersingh', 'https://twitter.com/sukhwindersingh', 'https://plus.google.com/sukhwindersingh'),
(3, 'Sonu Nigam', 'images/artists/sonu_nigam.jpeg', 'Sonu Nigam is a versatile Indian singer, music director, and actor, celebrated for his melodious voice and diverse musical style.', 'http://sonunigam.com', 'https://www.facebook.com/sonunigam', 'https://twitter.com/sonunigam', 'https://plus.google.com/sonunigam'),
(4, 'Tochi Raina', 'images/artists/tochi_raina.jpeg', 'Tochi Raina is an Indian playback singer known for his unique voice and contribution to various film soundtracks.', 'http://tochiraina.com', 'https://www.facebook.com/tochiraina', 'https://twitter.com/tochiraina', 'https://plus.google.com/tochiraina'),
(5, 'Benny Dayal', 'images/artists/benny_dayal.jpeg', 'Benny Dayal is an Indian playback singer noted for his work in Hindi, Tamil, Telugu, and Malayalam films.', 'http://bennydayal.com', 'https://www.facebook.com/bennydayal', 'https://twitter.com/bennydayal', 'https://plus.google.com/bennydayal'),
(6, 'Roop Kumar Rathod', 'images/artists/roop_kumar_rathod.jpeg', 'Roop Kumar Rathod is an Indian playback singer and music director known for his soulful singing and contributions to Indian music.', 'http://roopkumarrathod.com', 'https://www.facebook.com/roopkumarrathod', 'https://twitter.com/roopkumarrathod', 'https://plus.google.com/roopkumarrathod');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `song_id`, `user_id`, `comment`, `created_at`) VALUES
(181, 1, 1, 'Great song!', '2024-10-01 15:10:04'),
(182, 1, 2, 'I love this track!', '2024-10-01 15:10:04'),
(183, 1, 3, 'My favorite song!', '2024-10-01 15:10:04'),
(184, 2, 1, 'Amazing vocals!', '2024-10-01 15:10:04'),
(185, 2, 2, 'So catchy!', '2024-10-01 15:10:04'),
(186, 2, 4, 'I can’t stop listening!', '2024-10-01 15:10:04'),
(187, 3, 1, 'This is a masterpiece!', '2024-10-01 15:10:04'),
(188, 3, 3, 'Brilliant composition!', '2024-10-01 15:10:04'),
(189, 3, 2, 'The rhythm is perfect!', '2024-10-01 15:10:04'),
(190, 4, 1, 'Incredible!', '2024-10-01 15:10:04'),
(191, 4, 2, 'This artist is amazing!', '2024-10-01 15:10:04'),
(192, 4, 4, 'Such a vibe!', '2024-10-01 15:10:04'),
(193, 5, 1, 'Fantastic beat!', '2024-10-01 15:10:04'),
(194, 5, 3, 'This makes me so happy!', '2024-10-01 15:10:04'),
(195, 5, 2, 'Perfect for a party!', '2024-10-01 15:10:04'),
(196, 6, 1, 'I can’t get enough!', '2024-10-01 15:10:04'),
(197, 6, 2, 'Love the lyrics!', '2024-10-01 15:10:04'),
(198, 6, 4, 'This song speaks to me!', '2024-10-01 15:10:04'),
(199, 7, 1, 'Pure gold!', '2024-10-01 15:10:04'),
(200, 7, 3, 'This track is timeless!', '2024-10-01 15:10:04'),
(201, 7, 4, 'One of the best!', '2024-10-01 15:10:04'),
(202, 8, 1, 'So uplifting!', '2024-10-01 15:10:04'),
(203, 8, 2, 'Great vibes!', '2024-10-01 15:10:04'),
(204, 8, 3, 'Perfect for my playlist!', '2024-10-01 15:10:04'),
(205, 9, 1, 'Such a beautiful song!', '2024-10-01 15:10:04'),
(206, 9, 4, 'A true classic!', '2024-10-01 15:10:04'),
(207, 9, 2, 'Simply amazing!', '2024-10-01 15:10:04'),
(208, 10, 1, 'I could listen to this all day!', '2024-10-01 15:10:04'),
(209, 10, 2, 'Wonderful melody!', '2024-10-01 15:10:04'),
(210, 10, 3, 'Incredible production!', '2024-10-01 15:10:04'),
(211, 11, 1, 'This is on repeat!', '2024-10-01 15:10:04'),
(212, 11, 4, 'What a fantastic track!', '2024-10-01 15:10:04'),
(213, 11, 3, 'One of my favorites!', '2024-10-01 15:10:04'),
(214, 12, 1, 'Such emotion!', '2024-10-01 15:10:04'),
(215, 12, 2, 'Great lyrics!', '2024-10-01 15:10:04'),
(216, 12, 3, 'Beautifully done!', '2024-10-01 15:10:04'),
(217, 13, 1, 'This song is everything!', '2024-10-01 15:10:04'),
(218, 13, 4, 'So relatable!', '2024-10-01 15:10:04'),
(219, 13, 2, 'Perfect for a road trip!', '2024-10-01 15:10:04'),
(220, 15, 1, 'So catchy!', '2024-10-01 15:10:04'),
(221, 15, 4, 'Love the energy!', '2024-10-01 15:10:04'),
(222, 15, 2, 'Danceable tune!', '2024-10-01 15:10:04'),
(223, 16, 1, 'One of the best!', '2024-10-01 15:10:04'),
(224, 16, 3, 'Fantastic sound!', '2024-10-01 15:10:04'),
(225, 16, 2, 'This is a vibe!', '2024-10-01 15:10:04'),
(226, 17, 1, 'Brilliant!', '2024-10-01 15:10:04'),
(227, 17, 4, 'Love this song!', '2024-10-01 15:10:04'),
(228, 17, 3, 'Perfect mood setter!', '2024-10-01 15:10:04'),
(229, 18, 1, 'So good!', '2024-10-01 15:10:04'),
(230, 18, 2, 'This is great!', '2024-10-01 15:10:04'),
(231, 18, 4, 'Timeless classic!', '2024-10-01 15:10:04'),
(232, 19, 1, 'Obsessed!', '2024-10-01 15:10:04'),
(233, 19, 3, 'What a tune!', '2024-10-01 15:10:04'),
(234, 19, 2, 'One for the ages!', '2024-10-01 15:10:04'),
(235, 20, 1, 'This track rocks!', '2024-10-01 15:10:04'),
(236, 20, 4, 'Awesome!', '2024-10-01 15:10:04'),
(237, 20, 2, 'A must-listen!', '2024-10-01 15:10:04'),
(238, 21, 1, 'So nice!', '2024-10-01 15:10:04'),
(239, 21, 3, 'Love this vibe!', '2024-10-01 15:10:04'),
(240, 21, 2, 'Fantastic!', '2024-10-01 15:10:04'),
(241, 22, 1, 'Chill and amazing!', '2024-10-01 15:10:04'),
(242, 22, 2, 'Beautiful sounds!', '2024-10-01 15:10:04'),
(243, 22, 4, 'Perfect for relaxing!', '2024-10-01 15:10:04'),
(244, 23, 1, 'So unique!', '2024-10-01 15:10:04'),
(245, 23, 3, 'What a sound!', '2024-10-01 15:10:04'),
(246, 23, 2, 'Incredible music!', '2024-10-01 15:10:04'),
(247, 24, 1, 'Really good!', '2024-10-01 15:10:04'),
(248, 24, 2, 'Very catchy!', '2024-10-01 15:10:04'),
(249, 24, 4, 'Perfect!', '2024-10-01 15:10:04'),
(250, 25, 1, 'I love this song!', '2024-10-01 15:10:04'),
(251, 25, 3, 'So much feeling!', '2024-10-01 15:10:04'),
(252, 25, 2, 'What an artist!', '2024-10-01 15:10:04'),
(253, 26, 1, 'This is fire!', '2024-10-01 15:10:04'),
(254, 26, 2, 'Absolutely stunning!', '2024-10-01 15:10:04'),
(255, 26, 4, 'This track is lit!', '2024-10-01 15:10:04'),
(256, 27, 1, 'Best song ever!', '2024-10-01 15:10:04'),
(257, 27, 3, 'I can’t get enough of this!', '2024-10-01 15:10:04'),
(258, 27, 2, 'A masterpiece!', '2024-10-01 15:10:04'),
(259, 28, 1, 'Truly amazing!', '2024-10-01 15:10:04'),
(260, 28, 4, 'One of a kind!', '2024-10-01 15:10:04'),
(261, 28, 2, 'So emotional!', '2024-10-01 15:10:04'),
(262, 29, 1, 'Perfectly done!', '2024-10-01 15:10:04'),
(263, 29, 3, 'So melodic!', '2024-10-01 15:10:04'),
(264, 29, 4, 'Great job!', '2024-10-01 15:10:04'),
(265, 30, 1, 'This is my anthem!', '2024-10-01 15:10:04'),
(266, 30, 2, 'Absolutely fabulous!', '2024-10-01 15:10:04'),
(267, 30, 3, 'Such a great message!', '2024-10-01 15:10:04'),
(268, 30, 1, 'nice\r\n', '2024-10-01 15:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Romantic'),
(2, 'Filmi'),
(3, 'Rock'),
(4, 'Pop'),
(5, 'Folk Fusion'),
(6, 'Soft Rock');

-- --------------------------------------------------------

--
-- Table structure for table `liked_songs`
--

CREATE TABLE `liked_songs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `liked_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `liked_songs`
--

INSERT INTO `liked_songs` (`id`, `user_id`, `song_id`, `liked_at`) VALUES
(1, 1, 2, '2024-10-01 16:06:05'),
(2, 1, 1, '2024-10-01 16:08:55'),
(3, 1, 2, '2024-10-01 16:08:55'),
(4, 1, 3, '2024-10-01 16:08:55'),
(5, 1, 4, '2024-10-01 16:08:55'),
(6, 1, 5, '2024-10-01 16:08:55'),
(7, 1, 6, '2024-10-01 16:08:55'),
(8, 1, 7, '2024-10-01 16:08:55'),
(9, 1, 8, '2024-10-01 16:08:55'),
(10, 1, 9, '2024-10-01 16:08:55'),
(11, 1, 10, '2024-10-01 16:08:55'),
(12, 1, 11, '2024-10-01 16:08:55'),
(13, 1, 12, '2024-10-01 16:08:55'),
(14, 1, 13, '2024-10-01 16:08:55'),
(15, 1, 15, '2024-10-01 16:08:55'),
(16, 1, 16, '2024-10-01 16:08:55'),
(17, 1, 17, '2024-10-01 16:08:55'),
(18, 1, 18, '2024-10-01 16:08:55'),
(19, 1, 19, '2024-10-01 16:08:55'),
(20, 1, 20, '2024-10-01 16:08:55'),
(21, 1, 21, '2024-10-01 16:08:55'),
(22, 1, 22, '2024-10-01 16:08:55'),
(23, 1, 23, '2024-10-01 16:08:55'),
(24, 1, 24, '2024-10-01 16:08:55'),
(25, 1, 25, '2024-10-01 16:08:55'),
(26, 1, 26, '2024-10-01 16:08:55'),
(27, 1, 27, '2024-10-01 16:08:55'),
(28, 1, 28, '2024-10-01 16:08:55'),
(29, 1, 29, '2024-10-01 16:08:55'),
(30, 1, 30, '2024-10-01 16:08:55'),
(31, 2, 1, '2024-10-01 16:08:55'),
(32, 2, 2, '2024-10-01 16:08:55'),
(33, 2, 3, '2024-10-01 16:08:55'),
(34, 2, 4, '2024-10-01 16:08:55'),
(35, 2, 5, '2024-10-01 16:08:55'),
(36, 2, 6, '2024-10-01 16:08:55'),
(37, 2, 7, '2024-10-01 16:08:55'),
(38, 2, 8, '2024-10-01 16:08:55'),
(39, 2, 9, '2024-10-01 16:08:55'),
(40, 2, 10, '2024-10-01 16:08:55'),
(41, 2, 11, '2024-10-01 16:08:55'),
(42, 2, 12, '2024-10-01 16:08:55'),
(43, 2, 13, '2024-10-01 16:08:55'),
(44, 2, 15, '2024-10-01 16:08:55'),
(45, 2, 16, '2024-10-01 16:08:55'),
(46, 2, 17, '2024-10-01 16:08:55'),
(47, 2, 18, '2024-10-01 16:08:55'),
(48, 2, 19, '2024-10-01 16:08:55'),
(49, 2, 20, '2024-10-01 16:08:55'),
(50, 2, 21, '2024-10-01 16:08:55'),
(51, 2, 22, '2024-10-01 16:08:55'),
(52, 2, 23, '2024-10-01 16:08:55'),
(53, 2, 24, '2024-10-01 16:08:55'),
(54, 2, 25, '2024-10-01 16:08:55'),
(55, 2, 26, '2024-10-01 16:08:55'),
(56, 2, 27, '2024-10-01 16:08:55'),
(57, 2, 28, '2024-10-01 16:08:55'),
(58, 2, 29, '2024-10-01 16:08:55'),
(59, 2, 30, '2024-10-01 16:08:55'),
(60, 3, 1, '2024-10-01 16:08:55'),
(61, 3, 2, '2024-10-01 16:08:55'),
(62, 3, 3, '2024-10-01 16:08:55'),
(63, 3, 4, '2024-10-01 16:08:55'),
(64, 3, 5, '2024-10-01 16:08:55'),
(65, 3, 6, '2024-10-01 16:08:55'),
(66, 3, 7, '2024-10-01 16:08:55'),
(67, 3, 8, '2024-10-01 16:08:55'),
(68, 3, 9, '2024-10-01 16:08:55'),
(69, 3, 10, '2024-10-01 16:08:55'),
(70, 3, 11, '2024-10-01 16:08:55'),
(71, 3, 12, '2024-10-01 16:08:55'),
(72, 3, 13, '2024-10-01 16:08:55'),
(73, 3, 15, '2024-10-01 16:08:55'),
(74, 3, 16, '2024-10-01 16:08:55'),
(75, 3, 17, '2024-10-01 16:08:55'),
(76, 3, 18, '2024-10-01 16:08:55'),
(77, 3, 19, '2024-10-01 16:08:55'),
(78, 3, 20, '2024-10-01 16:08:55'),
(79, 3, 21, '2024-10-01 16:08:55'),
(80, 3, 22, '2024-10-01 16:08:55'),
(81, 3, 23, '2024-10-01 16:08:55'),
(82, 3, 24, '2024-10-01 16:08:55'),
(83, 3, 25, '2024-10-01 16:08:55'),
(84, 3, 26, '2024-10-01 16:08:55'),
(85, 3, 27, '2024-10-01 16:08:55'),
(86, 3, 28, '2024-10-01 16:08:55'),
(87, 3, 29, '2024-10-01 16:08:55'),
(88, 3, 30, '2024-10-01 16:08:55'),
(89, 4, 1, '2024-10-01 16:08:55'),
(90, 4, 2, '2024-10-01 16:08:55'),
(91, 4, 3, '2024-10-01 16:08:55'),
(92, 4, 4, '2024-10-01 16:08:55'),
(93, 4, 5, '2024-10-01 16:08:55'),
(94, 4, 6, '2024-10-01 16:08:55'),
(95, 4, 7, '2024-10-01 16:08:55'),
(96, 4, 8, '2024-10-01 16:08:55'),
(97, 4, 9, '2024-10-01 16:08:55'),
(98, 4, 10, '2024-10-01 16:08:55'),
(99, 4, 11, '2024-10-01 16:08:55'),
(100, 4, 12, '2024-10-01 16:08:55'),
(101, 4, 13, '2024-10-01 16:08:55'),
(102, 4, 15, '2024-10-01 16:08:55'),
(103, 4, 16, '2024-10-01 16:08:55'),
(104, 4, 17, '2024-10-01 16:08:55'),
(105, 4, 18, '2024-10-01 16:08:55'),
(106, 4, 19, '2024-10-01 16:08:55'),
(107, 4, 20, '2024-10-01 16:08:55'),
(108, 4, 21, '2024-10-01 16:08:55'),
(109, 4, 22, '2024-10-01 16:08:55'),
(110, 4, 23, '2024-10-01 16:08:55'),
(111, 4, 24, '2024-10-01 16:08:55'),
(112, 4, 25, '2024-10-01 16:08:55'),
(113, 4, 26, '2024-10-01 16:08:55'),
(114, 4, 27, '2024-10-01 16:08:55'),
(115, 4, 28, '2024-10-01 16:08:55'),
(116, 4, 29, '2024-10-01 16:08:55'),
(117, 4, 30, '2024-10-01 16:08:55'),
(118, 1, 2, '2024-10-01 11:11:43'),
(119, 1, 2, '2024-10-01 11:13:21'),
(120, 1, 2, '2024-10-01 11:14:58'),
(121, 1, 2, '2024-10-01 11:14:59'),
(122, 1, 2, '2024-10-01 11:15:00'),
(123, 1, 2, '2024-10-01 11:15:00'),
(124, 1, 2, '2024-10-01 11:15:01'),
(125, 1, 2, '2024-10-01 11:16:41'),
(126, 1, 2, '2024-10-01 11:17:07'),
(127, 1, 2, '2024-10-01 11:17:08'),
(128, 1, 2, '2024-10-01 11:17:11'),
(129, 1, 3, '2024-10-02 10:16:57');

--
-- Triggers `liked_songs`
--
DELIMITER $$
CREATE TRIGGER `after_delete_liked_songs` AFTER DELETE ON `liked_songs` FOR EACH ROW BEGIN
    UPDATE songs
    SET likes = likes - 1
    WHERE song_id = OLD.song_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_liked_songs` AFTER INSERT ON `liked_songs` FOR EACH ROW BEGIN
    UPDATE songs
    SET likes = likes + 1
    WHERE song_id = NEW.song_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `navbar_items`
--

CREATE TABLE `navbar_items` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar_items`
--

INSERT INTO `navbar_items` (`id`, `label`, `link`, `icon`) VALUES
(1, 'Discover', 'player.php', 'play_circle_outline'),
(2, 'Browse', 'browse.php', 'sort'),
(3, 'Trending', 'chart.php', 'trending_up'),
(4, 'Artist', 'artist.php', 'portrait'),
(5, 'Search', 'search.php', 'search');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT 'images/default_playlist_cover.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`, `name`, `cover_image`, `created_at`) VALUES
(1, 1, 'Chill Vibes', 'images/playlist_chill_vibes.jpg', '2024-09-25 18:51:51'),
(2, 1, 'Workout Tunes', 'images/playlist_workout_tunes.jpg', '2024-09-25 18:51:51'),
(3, 1, 'Study Focus', 'images/playlist_study_focus.jpg', '2024-09-25 18:51:51'),
(4, 2, 'Road Trip', 'images/playlist_road_trip.jpg', '2024-09-25 18:51:51'),
(5, 2, 'Relaxing Jazz', 'images/playlist_relaxing_jazz.jpg', '2024-09-25 18:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `views` int(11) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `audio_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `image_path`, `artist_id`, `genre_id`, `album_id`, `created_at`, `views`, `likes`, `audio_path`) VALUES
(1, 'Tum Hi Ho', 'images/songs/Tum_Hi_Ho_cover.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 6, 5, 'audio/Tum Hi Ho - Aashiqui 2 128 Kbps.mp3'),
(2, 'Chahun Main Ya Naa', 'images/songs/Chahun Main Ya Naa.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 6, 17, 'audio/Chahun Main Ya Naa - Aashiqui 2 128 Kbps (1).mp3'),
(3, 'Milne Hai Mujhse Aayi', 'images/songs/Milne Hai Mujhse Aayi.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 6, 6, 'audio/Milne Hai Mujhse Aayi - Aashiqui 2 128 Kbps.mp3'),
(4, 'Meri Aashiqui', 'images/songs/Meri Aashiqui.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 7, 5, 'audio/Meri Aashiqui - Jubin Nautiyal 128 Kbps.mp3'),
(5, 'Piya Aaye Na', 'images/songs/Piya Aaye Na.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 5, 5, 'audio/Piya Aaye Na - Aashiqui 2 128 Kbps.mp3'),
(6, 'Jiya Jale', 'images/songs/Jiya Jale.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 5, 5, 'audio/Jiya Jale - Dil Se 128 Kbps.mp3'),
(7, 'Satrangi Re', 'images/songs/Satrangi Re.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 5, 5, 'audio/Satarangi Re - Dil Se 128 Kbps.mp3'),
(8, 'Dil Se Re', 'images/songs/Dil Se Re.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 5, 5, 'audio/Dil Se Re - Dil Se 128 Kbps.mp3'),
(9, 'Ae Ajnabi', 'images/songs/Ae Ajnabi.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 6, 4, 'audio/Ae Ajnabi - Dil Se 128 Kbps.mp3'),
(10, 'Chaiyya Chaiyya', 'images/songs/Chaiyya Chaiyya.jpeg', 2, 3, 2, '2024-09-22 12:24:03', 4, 4, 'audio/Chaiyya Chaiyya - Dil Se 128 Kbps.mp3'),
(11, 'Kuch To Hua Hai', 'images/songs/Kuch To Hua Hai.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 4, 4, 'audio/Kuch To Hua Hai - Kal Ho Naa Ho 128 Kbps.mp3'),
(12, 'Pretty Woman', 'images/songs/Pretty Woman.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 4, 4, 'audio/Pretty Woman - Kal Ho Naa Ho 128 Kbps.mp3'),
(13, 'Mahi Ve', 'images/songs/Mahi Ve.jpeg', 3, 1, 3, '2024-09-22 12:24:03', 4, 4, 'audio/Maahi Ve - Kal Ho Naa Ho 128 Kbps.mp3'),
(15, 'Kal Ho Naa Ho', 'images/songs/Kal Ho Naa Ho.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 4, 4, 'audio/Kal Ho Naa Ho - My Name Is Khan 128 Kbps.mp3'),
(16, 'Kabira', 'images/songs/Kabira.jpeg', 4, 5, 4, '2024-09-22 12:24:03', 4, 4, 'audio/Kabira - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(17, 'Dilliwaali Girlfriend', 'images/songs/Dilliwaali Girlfriend.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 4, 4, 'audio/Dilliwaali Girlfriend - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(18, 'Balam Pichkari', 'images/songs/Balam Pichkari.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 4, 4, 'audio/Balam Pichkari - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(19, 'Ilahi', 'images/songs/Ilahi.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 4, 4, 'audio/Ilahi - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(20, 'Badtameez Dil', 'images/songs/Badtameez Dil.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 4, 4, 'audio/Badtameez Dil - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(21, 'Lat Lag Gayee', 'images/songs/Lat Lag Gayee.jpeg', 5, 1, 5, '2024-09-22 12:24:03', 4, 4, 'audio/Lat Lag Gayee - Race 2 128 Kbps.mp3'),
(22, 'Party on My Mind', 'images/songs/Party on My Mind.jpeg', 5, 3, 5, '2024-09-22 12:24:03', 4, 4, 'audio/Party On My Mind  -  Remix By DJ Jay Dabhi - Race 2 128 Kbps.mp3'),
(23, 'Allah Duhai Hai', 'images/songs/Allah Duhai Hai.jpeg', 5, 4, 5, '2024-09-22 12:24:03', 4, 4, 'audio/Allah Duhai Hai - Race 3 128 Kbps.mp3'),
(24, 'Be Intehaan', 'images/songs/Be Intehaan.jpeg', 5, 6, 5, '2024-09-22 12:24:03', 4, 4, 'audio/Be Intehaan - Race 2 128 Kbps.mp3'),
(25, 'Race Saanson Ki', 'images/songs/Race Saanson Ki.jpeg', 5, 4, 5, '2024-09-22 12:24:03', 4, 4, 'audio/Race Saanson Ki - Race 128 Kbps.mp3'),
(26, 'Phir Le Aya Dil', 'images/songs/Phir Le Aya Dil.jpeg', 1, 2, NULL, '2024-09-22 12:24:03', 4, 4, 'audio/Phir-Le-Aya-Dil-Reprise-Arijit-Singh.mp3'),
(27, 'Tujh Mein Rab Dikhta Hai', 'images/songs/Tujh Mein Rab Dikhta Hai.jpeg', 6, 1, 6, '2024-09-22 12:24:03', 4, 4, 'audio/Tujh Mein Rab Dikhta Hai II - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(28, 'Haule Haule', 'images/songs/Haule Haule.jpeg', 6, 4, 6, '2024-09-22 12:24:03', 4, 4, 'audio/Haule Haule - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(29, 'Phir Milenge Chalte Chalte', 'images/songs/Phir Milenge Chalte Chalte.jpeg', 6, 5, 6, '2024-09-22 12:24:03', 4, 4, 'audio/Phir Milenge Chalte Chalte - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(30, 'Dance Pe Chance', 'images/songs/Dance Pe Chance.jpeg', 6, 3, 6, '2024-09-22 12:24:03', 5, 4, 'audio/Dance Pe Chance - Rab Ne Bana Di Jodi 128 Kbps.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'images/default_profile_pic.jpg',
  `password` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_pic`, `password`, `description`) VALUES
(1, 'John Doe', 'john@example.com', 'images/john.jpg', 'qwerty', 'A passionate music lover and content creator with a knack for discovering new talent.'),
(2, 'Rachel Platten', 'rachel@example.com', 'images/rachel.jpg', 'qwerty', 'An experienced DJ who enjoys mixing various genres and creating a unique sound.'),
(3, 'Mark Smith', 'mark@example.com', 'images/mark.jpg', 'qwerty', 'A music enthusiast who loves attending concerts and writing reviews about new albums.'),
(4, 'Emily Stone', 'emily@example.com', 'images/emily.jpg', 'qwerty', 'A professional vocalist with a deep appreciation for classical and contemporary music.'),
(6, 'ibrahimburhani', 'ibribaloch123@gmail.com', 'images/default_profile_pic.jpg', '$2y$10$O3048X43iy7Mj9G63pVKUeoQuxuQb4gqgin03x3PJLfKGQtpckAJS', NULL),
(8, 'alikhan', 'alikhan@example.com', 'images/default_profile_pic.jpg', '$2y$10$DRGU2iuKZsXZACJOkC4Z9uM29ABBciGW1bSHkNZQdtutSQyyMnN.m', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `viewed_songs`
--

CREATE TABLE `viewed_songs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewed_songs`
--

INSERT INTO `viewed_songs` (`id`, `user_id`, `song_id`, `viewed_at`) VALUES
(1, 1, 30, '2024-09-22 13:45:48'),
(2, 1, 4, '2024-09-22 13:46:55'),
(3, 1, 1, '2024-09-10 05:00:00'),
(4, 1, 2, '2024-09-10 05:30:00'),
(5, 2, 1, '2024-09-10 06:00:00'),
(6, 2, 3, '2024-09-10 06:30:00'),
(7, 3, 2, '2024-09-10 07:00:00'),
(8, 1, 3, '2024-09-11 04:00:00'),
(9, 1, 4, '2024-09-11 04:30:00'),
(10, 3, 4, '2024-09-11 05:00:00'),
(11, 2, 5, '2024-09-11 05:30:00'),
(12, 3, 6, '2024-09-11 06:00:00'),
(13, 2, 7, '2024-09-11 06:30:00'),
(14, 3, 8, '2024-09-11 07:00:00'),
(15, 1, 9, '2024-09-11 07:30:00'),
(16, 2, 9, '2024-09-10 20:00:00'),
(17, 1, 4, '2024-09-25 06:35:37'),
(18, 1, 4, '2024-09-26 15:33:48'),
(19, 1, 1, '2024-09-26 15:36:02'),
(20, 1, 11, '2024-09-26 15:54:56'),
(21, 1, 12, '2024-09-26 16:06:01'),
(22, 1, 13, '2024-09-26 16:06:07'),
(23, 1, 21, '2024-09-29 09:37:37'),
(24, 1, 17, '2024-09-29 12:25:32'),
(25, 1, 19, '2024-09-29 12:26:23'),
(26, 1, 10, '2024-09-29 12:29:13'),
(27, 1, 20, '2024-09-29 12:31:51'),
(28, 1, 5, '2024-09-29 12:41:26'),
(29, 2, 30, '2024-09-30 05:23:53'),
(30, 1, 6, '2024-09-30 17:29:10'),
(31, 1, 7, '2024-09-30 17:29:42'),
(32, 1, 1, '2024-10-01 16:11:25'),
(33, 1, 2, '2024-10-01 16:11:25'),
(34, 1, 3, '2024-10-01 16:11:25'),
(35, 1, 4, '2024-10-01 16:11:25'),
(36, 1, 5, '2024-10-01 16:11:25'),
(37, 1, 6, '2024-10-01 16:11:25'),
(38, 1, 7, '2024-10-01 16:11:25'),
(39, 1, 8, '2024-10-01 16:11:25'),
(40, 1, 9, '2024-10-01 16:11:25'),
(41, 1, 10, '2024-10-01 16:11:25'),
(42, 1, 11, '2024-10-01 16:11:25'),
(43, 1, 12, '2024-10-01 16:11:25'),
(44, 1, 13, '2024-10-01 16:11:25'),
(45, 1, 15, '2024-10-01 16:11:25'),
(46, 1, 16, '2024-10-01 16:11:25'),
(47, 1, 17, '2024-10-01 16:11:25'),
(48, 1, 18, '2024-10-01 16:11:25'),
(49, 1, 19, '2024-10-01 16:11:25'),
(50, 1, 20, '2024-10-01 16:11:25'),
(51, 1, 21, '2024-10-01 16:11:25'),
(52, 1, 22, '2024-10-01 16:11:25'),
(53, 1, 23, '2024-10-01 16:11:25'),
(54, 1, 24, '2024-10-01 16:11:25'),
(55, 1, 25, '2024-10-01 16:11:25'),
(56, 1, 26, '2024-10-01 16:11:25'),
(57, 1, 27, '2024-10-01 16:11:25'),
(58, 1, 28, '2024-10-01 16:11:25'),
(59, 1, 29, '2024-10-01 16:11:25'),
(60, 1, 30, '2024-10-01 16:11:25'),
(61, 2, 1, '2024-10-01 16:11:25'),
(62, 2, 2, '2024-10-01 16:11:25'),
(63, 2, 3, '2024-10-01 16:11:25'),
(64, 2, 4, '2024-10-01 16:11:25'),
(65, 2, 5, '2024-10-01 16:11:25'),
(66, 2, 6, '2024-10-01 16:11:25'),
(67, 2, 7, '2024-10-01 16:11:25'),
(68, 2, 8, '2024-10-01 16:11:25'),
(69, 2, 9, '2024-10-01 16:11:25'),
(70, 2, 10, '2024-10-01 16:11:25'),
(71, 2, 11, '2024-10-01 16:11:25'),
(72, 2, 12, '2024-10-01 16:11:25'),
(73, 2, 13, '2024-10-01 16:11:25'),
(74, 2, 15, '2024-10-01 16:11:25'),
(75, 2, 16, '2024-10-01 16:11:25'),
(76, 2, 17, '2024-10-01 16:11:25'),
(77, 2, 18, '2024-10-01 16:11:25'),
(78, 2, 19, '2024-10-01 16:11:25'),
(79, 2, 20, '2024-10-01 16:11:25'),
(80, 2, 21, '2024-10-01 16:11:25'),
(81, 2, 22, '2024-10-01 16:11:25'),
(82, 2, 23, '2024-10-01 16:11:25'),
(83, 2, 24, '2024-10-01 16:11:25'),
(84, 2, 25, '2024-10-01 16:11:25'),
(85, 2, 26, '2024-10-01 16:11:25'),
(86, 2, 27, '2024-10-01 16:11:25'),
(87, 2, 28, '2024-10-01 16:11:25'),
(88, 2, 29, '2024-10-01 16:11:25'),
(89, 2, 30, '2024-10-01 16:11:25'),
(90, 3, 1, '2024-10-01 16:11:25'),
(91, 3, 2, '2024-10-01 16:11:25'),
(92, 3, 3, '2024-10-01 16:11:25'),
(93, 3, 4, '2024-10-01 16:11:25'),
(94, 3, 5, '2024-10-01 16:11:25'),
(95, 3, 6, '2024-10-01 16:11:25'),
(96, 3, 7, '2024-10-01 16:11:25'),
(97, 3, 8, '2024-10-01 16:11:25'),
(98, 3, 9, '2024-10-01 16:11:25'),
(99, 3, 10, '2024-10-01 16:11:25'),
(100, 3, 11, '2024-10-01 16:11:25'),
(101, 3, 12, '2024-10-01 16:11:25'),
(102, 3, 13, '2024-10-01 16:11:25'),
(103, 3, 15, '2024-10-01 16:11:25'),
(104, 3, 16, '2024-10-01 16:11:25'),
(105, 3, 17, '2024-10-01 16:11:25'),
(106, 3, 18, '2024-10-01 16:11:25'),
(107, 3, 19, '2024-10-01 16:11:25'),
(108, 3, 20, '2024-10-01 16:11:25'),
(109, 3, 21, '2024-10-01 16:11:25'),
(110, 3, 22, '2024-10-01 16:11:25'),
(111, 3, 23, '2024-10-01 16:11:25'),
(112, 3, 24, '2024-10-01 16:11:25'),
(113, 3, 25, '2024-10-01 16:11:25'),
(114, 3, 26, '2024-10-01 16:11:25'),
(115, 3, 27, '2024-10-01 16:11:25'),
(116, 3, 28, '2024-10-01 16:11:25'),
(117, 3, 29, '2024-10-01 16:11:25'),
(118, 3, 30, '2024-10-01 16:11:25'),
(119, 4, 1, '2024-10-01 16:11:25'),
(120, 4, 2, '2024-10-01 16:11:25'),
(121, 4, 3, '2024-10-01 16:11:25'),
(122, 4, 4, '2024-10-01 16:11:25'),
(123, 4, 5, '2024-10-01 16:11:25'),
(124, 4, 6, '2024-10-01 16:11:25'),
(125, 4, 7, '2024-10-01 16:11:25'),
(126, 4, 8, '2024-10-01 16:11:25'),
(127, 4, 9, '2024-10-01 16:11:25'),
(128, 4, 10, '2024-10-01 16:11:25'),
(129, 4, 11, '2024-10-01 16:11:25'),
(130, 4, 12, '2024-10-01 16:11:25'),
(131, 4, 13, '2024-10-01 16:11:25'),
(132, 4, 15, '2024-10-01 16:11:25'),
(133, 4, 16, '2024-10-01 16:11:25'),
(134, 4, 17, '2024-10-01 16:11:25'),
(135, 4, 18, '2024-10-01 16:11:25'),
(136, 4, 19, '2024-10-01 16:11:25'),
(137, 4, 20, '2024-10-01 16:11:25'),
(138, 4, 21, '2024-10-01 16:11:25'),
(139, 4, 22, '2024-10-01 16:11:25'),
(140, 4, 23, '2024-10-01 16:11:25'),
(141, 4, 24, '2024-10-01 16:11:25'),
(142, 4, 25, '2024-10-01 16:11:25'),
(143, 4, 26, '2024-10-01 16:11:25'),
(144, 4, 27, '2024-10-01 16:11:25'),
(145, 4, 28, '2024-10-01 16:11:25'),
(146, 4, 29, '2024-10-01 16:11:25'),
(147, 4, 30, '2024-10-01 16:11:25');

--
-- Triggers `viewed_songs`
--
DELIMITER $$
CREATE TRIGGER `after_delete_viewed_songs` AFTER DELETE ON `viewed_songs` FOR EACH ROW BEGIN
    UPDATE songs
    SET views = views - 1
    WHERE song_id = OLD.song_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_viewed_songs` AFTER INSERT ON `viewed_songs` FOR EACH ROW BEGIN
    UPDATE songs
    SET views = views + 1
    WHERE song_id = NEW.song_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `site_name`, `logo_url`, `name`) VALUES
(1, 'pulse - Music, Audio and Radio', 'images/logo/logo.png', 'pulse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `liked_songs`
--
ALTER TABLE `liked_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `navbar_items`
--
ALTER TABLE `navbar_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `viewed_songs`
--
ALTER TABLE `viewed_songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `liked_songs`
--
ALTER TABLE `liked_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `navbar_items`
--
ALTER TABLE `navbar_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `viewed_songs`
--
ALTER TABLE `viewed_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `liked_songs`
--
ALTER TABLE `liked_songs`
  ADD CONSTRAINT `liked_songs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `liked_songs_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`) ON DELETE CASCADE;

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`);

--
-- Constraints for table `viewed_songs`
--
ALTER TABLE `viewed_songs`
  ADD CONSTRAINT `viewed_songs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `viewed_songs_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
