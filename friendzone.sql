-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2023 at 12:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `friendzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` varchar(280) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author_id`, `content`, `created_at`) VALUES
(1, 26, 16, 'This is a good post!', '2023-01-08 12:04:45'),
(2, 26, 12, 'Cool post!', '2023-01-08 12:05:13'),
(3, 26, 12, 'eee', '2023-01-09 10:54:35'),
(5, 15, 12, 'awesome!!!', '2023-01-09 10:55:09'),
(6, 5, 12, 'cool\r\n', '2023-01-09 11:39:54'),
(13, 14, 12, 'hi', '2023-01-10 12:06:08'),
(15, 31, 19, 'Cool', '2023-01-11 12:53:23'),
(18, 35, 20, 'nice try', '2023-01-16 20:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` varchar(280) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `author_id`, `content`) VALUES
(4, '2023-01-05 12:36:51', 11, 'This is my first post!'),
(5, '2023-01-05 12:37:09', 11, 'This is my second post!'),
(14, '2023-01-05 21:44:15', 13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci neque blanditiis enim tempora quis, laudantium vero esse quia, doloribus ut eius aspernatur eos quaerat sapiente minima explicabo consectetur laborum suscipit?'),
(15, '2023-01-05 21:44:23', 13, 'This is my second post!!!!!!'),
(26, '2023-01-07 13:21:01', 18, 'Hellooooooooo!!!! ^^'),
(31, '2023-01-11 12:53:18', 19, 'For this assessment you are tasked with creating a specialised version of Facebook called “Friendzone” that allows users to create an account and post messages that other people can read.'),
(33, '2023-01-15 13:31:31', 19, 'Hello everyone!'),
(35, '2023-01-15 13:37:41', 19, '&lt;h2&gt;hi&lt;/h2&gt;'),
(36, '2023-01-16 20:23:34', 20, 'This discussion forum is a place for you to ask the module tutors questions about the module content and assessment. By asking questions in the discussion forum, you are helping to develop a bank of ‘frequently asked questions’ that will be of benefit to you and other students.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `biography` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `biography`) VALUES
(11, 'Thomas', 'Buckleyy', 'buckleythomas92@gmail.com', '$2y$10$hmdQV3Of8.IF7Bp8N78bdOBbbkwRBa7NVl.JaPNpxb.4W4L8SsoJ.', '07764998447', 'My name is Tomas, I am 30 years old and I am studying computer science!!!'),
(12, 'Hannah', 'Smith', 'hannah@test.com', '$2y$10$4pWDUtCQg/dRFnfUFkeg9uRntOsEfDVW5tT.HeXS/KKispHygJibW', '07432421286', 'Hello my name is Hannah!'),
(13, 'Ki', 'Na', 'nagajuda@test.com', '$2y$10$FwpM6e71rII7ROOFMFBMx.0jmiYbyBm7NZUACYOCb17r.Et2.keSm', '010748364827', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci neque blanditiis enim tempora quis, laudantium vero esse quia, doloribus ut eius aspernatur eos quaerat sapiente minima explicabo consectetur laborum suscipit?'),
(15, 'Toffee', 'Oakes', 'toffee@test.com', '$2y$10$snKg.VriqlY5Yh8vX2fUZu7K.IRZBPqC/54.aU.HLf1z.SwkYSVdu', '01093844857', 'I am a dog woof woof!'),
(16, 'Andrew', 'Kim', 'andrew@test.com', '$2y$10$dLYQGF7ubXnTJYleZdlKMOQZzcxHOLoiky9DYv1TFufIsb6UsCGM.', '01074857383', 'I am Andrew, nice to meet you!'),
(17, 'Snow', 'White', 'snow@test.com', '$2y$10$osa8tAO2YR9ygw3uwiGPUON84bzNg3Nb48q8ZD0VSck.qnpDyamHW', '019384756', 'I am snow white'),
(18, 'Laura', 'Bux', 'laura@test.com', '$2y$10$tIFNapSB3pav/4J1SdBapuzWM3VaCgId3pSDU.JVmzem073jtKiU.', '0778654665', 'Hello'),
(19, 'Thomas', 'Oakes', 'tessst@test.com', '$2y$10$XPF4u17LRJ3dnhcpkJ/Z6eDiqchisfmZ6gl3UPHBCyFCjY4tkuB4S', '01068445418', 'Hello I am Thomabbb'),
(20, 'Heather', 'Oakes', 'heather@test.com', '$2y$10$7t54mOWshVV.1Kidunzr4OHKNrlf361B.U3tTP2Ic4PdlUfsYJiX2', '0101019029', 'I am heather!!!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
