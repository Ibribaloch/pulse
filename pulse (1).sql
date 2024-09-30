-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:05 PM
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
(1, 1, 2, '2024-09-22 19:21:19'),
(2, 1, 3, '2024-09-22 19:21:19'),
(3, 2, 1, '2024-09-22 19:21:19'),
(4, 2, 4, '2024-09-22 19:21:19'),
(5, 2, 5, '2024-09-22 19:21:19'),
(6, 3, 6, '2024-09-22 19:21:19'),
(7, 4, 7, '2024-09-22 19:21:19'),
(8, 4, 8, '2024-09-22 19:21:19');

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
(1, 'Tum Hi Ho', 'images/songs/Tum_Hi_Ho_cover.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 2, 1, 'audio/Tum Hi Ho - Aashiqui 2 128 Kbps.mp3'),
(2, 'Chahun Main Ya Naa', 'images/songs/Chahun Main Ya Naa.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 2, 1, 'audio/Chahun Main Ya Naa - Aashiqui 2 128 Kbps (1).mp3'),
(3, 'Milne Hai Mujhse Aayi', 'images/songs/Milne Hai Mujhse Aayi.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 2, 1, 'audio/Milne Hai Mujhse Aayi - Aashiqui 2 128 Kbps.mp3'),
(4, 'Meri Aashiqui', 'images/songs/Meri Aashiqui.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 3, 1, 'audio/Meri Aashiqui - Jubin Nautiyal 128 Kbps.mp3'),
(5, 'Piya Aaye Na', 'images/songs/Piya Aaye Na.jpeg', 1, 1, 1, '2024-09-22 12:24:03', 1, 1, 'audio/Piya Aaye Na - Aashiqui 2 128 Kbps.mp3'),
(6, 'Jiya Jale', 'images/songs/Jiya Jale.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 1, 1, 'audio/Jiya Jale - Dil Se 128 Kbps.mp3'),
(7, 'Satrangi Re', 'images/songs/Satrangi Re.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 1, 1, 'audio/Satarangi Re - Dil Se 128 Kbps.mp3'),
(8, 'Dil Se Re', 'images/songs/Dil Se Re.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 1, 1, 'audio/Dil Se Re - Dil Se 128 Kbps.mp3'),
(9, 'Ae Ajnabi', 'images/songs/Ae Ajnabi.jpeg', 2, 2, 2, '2024-09-22 12:24:03', 2, 0, 'audio/Ae Ajnabi - Dil Se 128 Kbps.mp3'),
(10, 'Chaiyya Chaiyya', 'images/songs/Chaiyya Chaiyya.jpeg', 2, 3, 2, '2024-09-22 12:24:03', 0, 0, 'audio/Chaiyya Chaiyya - Dil Se 128 Kbps.mp3'),
(11, 'Kuch To Hua Hai', 'images/songs/Kuch To Hua Hai.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 0, 0, 'audio/Kuch To Hua Hai - Kal Ho Naa Ho 128 Kbps.mp3'),
(12, 'Pretty Woman', 'images/songs/Pretty Woman.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 0, 0, 'audio/Pretty Woman - Kal Ho Naa Ho 128 Kbps.mp3'),
(13, 'Mahi Ve', 'images/songs/Mahi Ve.jpeg', 3, 1, 3, '2024-09-22 12:24:03', 0, 0, 'audio/Maahi Ve - Kal Ho Naa Ho 128 Kbps.mp3'),
(15, 'Kal Ho Naa Ho', 'images/songs/Kal Ho Naa Ho.jpeg', 3, 4, 3, '2024-09-22 12:24:03', 0, 0, 'audio/Kal Ho Naa Ho - My Name Is Khan 128 Kbps.mp3'),
(16, 'Kabira', 'images/songs/Kabira.jpeg', 4, 5, 4, '2024-09-22 12:24:03', 0, 0, 'audio/Kabira - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(17, 'Dilliwaali Girlfriend', 'images/songs/Dilliwaali Girlfriend.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 0, 0, 'audio/Dilliwaali Girlfriend - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(18, 'Balam Pichkari', 'images/songs/Balam Pichkari.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 0, 0, 'audio/Balam Pichkari - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(19, 'Ilahi', 'images/songs/Ilahi.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 0, 0, 'audio/Ilahi - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(20, 'Badtameez Dil', 'images/songs/Badtameez Dil.jpeg', 4, 4, 4, '2024-09-22 12:24:03', 0, 0, 'audio/Badtameez Dil - Yeh Jawaani Hai Deewani 128 Kbps.mp3'),
(21, 'Lat Lag Gayee', 'images/songs/Lat Lag Gayee.jpeg', 5, 1, 5, '2024-09-22 12:24:03', 0, 0, 'audio/Lat Lag Gayee - Race 2 128 Kbps.mp3'),
(22, 'Party on My Mind', 'images/songs/Party on My Mind.jpeg', 5, 3, 5, '2024-09-22 12:24:03', 0, 0, 'audio/Party On My Mind  -  Remix By DJ Jay Dabhi - Race 2 128 Kbps.mp3'),
(23, 'Allah Duhai Hai', 'images/songs/Allah Duhai Hai.jpeg', 5, 4, 5, '2024-09-22 12:24:03', 0, 0, 'audio/Allah Duhai Hai - Race 3 128 Kbps.mp3'),
(24, 'Be Intehaan', 'images/songs/Be Intehaan.jpeg', 5, 6, 5, '2024-09-22 12:24:03', 0, 0, 'audio/Be Intehaan - Race 2 128 Kbps.mp3'),
(25, 'Race Saanson Ki', 'images/songs/Race Saanson Ki.jpeg', 5, 4, 5, '2024-09-22 12:24:03', 0, 0, 'audio/Race Saanson Ki - Race 128 Kbps.mp3'),
(26, 'Phir Le Aya Dil', 'images/songs/Phir Le Aya Dil.jpeg', 1, 2, NULL, '2024-09-22 12:24:03', 0, 0, 'audio/Phir-Le-Aya-Dil-Reprise-Arijit-Singh.mp3'),
(27, 'Tujh Mein Rab Dikhta Hai', 'images/songs/Tujh Mein Rab Dikhta Hai.jpeg', 6, 1, 6, '2024-09-22 12:24:03', 0, 0, 'audio/Tujh Mein Rab Dikhta Hai II - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(28, 'Haule Haule', 'images/songs/Haule Haule.jpeg', 6, 4, 6, '2024-09-22 12:24:03', 0, 0, 'audio/Haule Haule - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(29, 'Phir Milenge Chalte Chalte', 'images/songs/Phir Milenge Chalte Chalte.jpeg', 6, 5, 6, '2024-09-22 12:24:03', 0, 0, 'audio/Phir Milenge Chalte Chalte - Rab Ne Bana Di Jodi 128 Kbps.mp3'),
(30, 'Dance Pe Chance', 'images/songs/Dance Pe Chance.jpeg', 6, 3, 6, '2024-09-22 12:24:03', 1, 0, 'audio/Dance Pe Chance - Rab Ne Bana Di Jodi 128 Kbps.mp3');

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
(4, 'Emily Stone', 'emily@example.com', 'images/emily.jpg', 'qwerty', 'A professional vocalist with a deep appreciation for classical and contemporary music.');

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
(31, 1, 7, '2024-09-30 17:29:42');

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
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `liked_songs`
--
ALTER TABLE `liked_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viewed_songs`
--
ALTER TABLE `viewed_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
