-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 08:41 PM
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
  `artist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_name`, `artist_id`) VALUES
(1, 'Aashiqui 2', 1),
(2, 'Dil Se', 2),
(3, 'Kal Ho Naa Ho', 3),
(4, 'Yeh Jawaani Hai Deewani', 4),
(5, 'Race 2', 5),
(6, 'Rab Ne Bana Di Jodi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`) VALUES
(1, 'Arijit Singh'),
(2, 'Sukhwinder Singh'),
(3, 'Sonu Nigam'),
(4, 'Tochi Raina'),
(5, 'Benny Dayal'),
(6, 'Roop Kumar Rathod');

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
(2, 'Browse', 'browse.html', 'sort'),
(3, 'Trending', 'chart.html', 'trending_up'),
(4, 'Artist', 'artist.html', 'portrait'),
(5, 'Search', '#search-modal', 'search');

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
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `image_path`, `artist_id`, `genre_id`, `album_id`) VALUES
(1, 'Tum Hi Ho', 'images/songs/Tum_Hi_Ho_cover.jpeg', 1, 1, 1),
(2, 'Chahun Main Ya Naa', 'images/songs/Chahun Main Ya Naa.jpeg', 1, 1, 1),
(3, 'Milne Hai Mujhse Aayi', 'images/songs/Milne Hai Mujhse Aayi.jpeg', 1, 1, 1),
(4, 'Meri Aashiqui', 'images/songs/Meri Aashiqui.jpeg', 1, 1, 1),
(5, 'Piya Aaye Na', 'images/songs/Piya Aaye Na.jpeg', 1, 1, 1),
(6, 'Jiya Jale', 'images/songs/Jiya Jale.jpeg', 2, 2, 2),
(7, 'Satrangi Re', 'images/songs/Satrangi Re.jpeg', 2, 2, 2),
(8, 'Dil Se Re', 'images/songs/Dil Se Re.jpeg', 2, 2, 2),
(9, 'Ae Ajnabi', 'images/songs/Ae Ajnabi.jpeg', 2, 2, 2),
(10, 'Chaiyya Chaiyya', 'images/songs/Chaiyya Chaiyya.jpeg', 2, 3, 2),
(11, 'Kuch To Hua Hai', 'images/songs/Kuch To Hua Hai.jpeg', 3, 4, 3),
(12, 'Pretty Woman', 'images/songs/Pretty Woman.jpeg', 3, 4, 3),
(13, 'Mahi Ve', 'images/songs/Mahi Ve.jpeg', 3, 1, 3),
(14, 'It\'s The Time to Disco', 'images/songs/It\'s The Time to Disco.jpeg', 3, 3, 3),
(15, 'Kal Ho Naa Ho', 'images/songs/Kal Ho Naa Ho.jpeg', 3, 4, 3),
(16, 'Kabira', 'images/songs/Kabira.jpeg', 4, 5, 4),
(17, 'Dilliwaali Girlfriend', 'images/songs/Dilliwaali Girlfriend.jpeg', 4, 4, 4),
(18, 'Balam Pichkari', 'images/songs/Balam Pichkari.jpeg', 4, 4, 4),
(19, 'Ilahi', 'images/songs/Ilahi.jpeg', 4, 4, 4),
(20, 'Badtameez Dil', 'images/songs/Badtameez Dil.jpeg', 4, 4, 4),
(21, 'Lat Lag Gayee', 'images/songs/Lat Lag Gayee.jpeg', 5, 1, 5),
(22, 'Party on My Mind', 'images/songs/Party on My Mind.jpeg', 5, 3, 5),
(23, 'Allah Duhai Hai', 'images/songs/Allah Duhai Hai.jpeg', 5, 4, 5),
(24, 'Be Intehaan', 'images/songs/Be Intehaan.jpeg', 5, 6, 5),
(25, 'Race Saanson Ki', 'images/songs/Race Saanson Ki.jpeg', 5, 4, 5),
(26, 'Phir Le Aya Dil', 'images/songs/Phir Le Aya Dil.jpeg', 1, 2, NULL),
(27, 'Tujh Mein Rab Dikhta Hai', 'images/songs/Tujh Mein Rab Dikhta Hai.jpeg', 6, 1, 6),
(28, 'Haule Haule', 'images/songs/Haule Haule.jpeg', 6, 4, 6),
(29, 'Phir Milenge Chalte Chalte', 'images/songs/Phir Milenge Chalte Chalte.jpeg', 6, 5, 6),
(30, 'Dance Pe Chance', 'images/songs/Dance Pe Chance.jpeg', 6, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'images/default_profile_pic.jpg',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_pic`, `password`) VALUES
(1, 'John Doe', 'john@example.com', 'images/john.jpg', 'qwerty'),
(2, 'Rachel Platten', 'rachel@example.com', 'images/rachel.jpg', 'qwerty'),
(3, 'Mark Smith', 'mark@example.com', 'images/mark.jpg', 'qwerty'),
(4, 'Emily Stone', 'emily@example.com', 'images/emily.jpg', 'qwerty'),
(5, 'Guest User', 'guest@example.com', 'images/default_profile_pic.jpg', 'qwerty');

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
(1, 'pulse - Music, Audio and Radio', 'images/logo.png', 'pulse');

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
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `navbar_items`
--
ALTER TABLE `navbar_items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navbar_items`
--
ALTER TABLE `navbar_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
